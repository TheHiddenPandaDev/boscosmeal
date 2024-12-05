/**
 * Define Constants needed by the Apple Pay API
 */
var VarmerchantId = apple_redsys.merchantId;
var VarmerchantName = apple_redsys.merchantName;
var VarcountryCode = apple_redsys.countryCode;
var VarcurrencyCode = apple_redsys.currencyCode;
var url_site = apple_redsys.url_site;
var nonce = apple_redsys.nonce;

/**
 * Convierte una cadena a su representación hexadecimal.
 * @param {string} str - La cadena a convertir.
 * @return {string} - La representación hexadecimal de la cadena.
 */
function stringToHex(str) {
	var hex = '';
	for (var i = 0; i < str.length; i++) {
		hex += str.charCodeAt(i).toString(16).padStart(2, '0');
	}
	return hex;
}

/**
 * Maneja el clic en el botón de Apple Pay.
 */
function onApplePayClicked() {
	console.log('Botón de Apple Pay clickeado.');

	if (!ApplePaySession) {
		console.error('ApplePaySession no está disponible en este navegador.');
		return;
	}

	// Asumiendo un valor inicial, este valor se actualizará en onpaymentmethodselected
	var AmountApplePay = '0.00';

	var request = {
		countryCode: VarcountryCode,
		currencyCode: VarcurrencyCode,
		supportedNetworks: ['visa', 'masterCard', 'amex', 'discover'],
		merchantCapabilities: ['supports3DS'],
		requiredShippingContactFields: [
			'postalAddress',
			'name',
			'phone',
			'email'
		],
		requiredBillingContactFields: [
			'postalAddress',
			'name',
			'phone',
			'email'
		],
		total: { label: VarmerchantName, amount: AmountApplePay },
	};

	console.log('Creando ApplePaySession con request:', request);
	var session = new ApplePaySession(3, request);
	session.begin();
	console.log('ApplePaySession iniciado.');

	/**
	 * Maneja la selección de la dirección de envío.
	 */
	session.onshippingcontactselected = function (event) {
		console.log("El evento onshippingcontactselected se está ejecutando");
		console.log("Datos de shippingContact:", event.shippingContact);
		console.log("Evento completo:", event);

		// Extraemos los datos parciales disponibles de shippingContact
		const shippingContact = event.shippingContact;
		const { administrativeArea, locality, postalCode, countryCode } = shippingContact;

		// Obtener el store de checkout utilizando CHECKOUT_STORE_KEY
		const { CHECKOUT_STORE_KEY } = window.wc.wcBlocksData;
		const store = wp.data.select(CHECKOUT_STORE_KEY);
		const RedsysOrderID = store.getOrderId();
		console.log('Order ID obtenido del store:', RedsysOrderID);

		// Prepara los datos para enviarlos al servidor
		const shippingData = {
			action: 'redsys_update_checkout_address', // Nombre del gancho de acción que manejarás en el backend
			nonce: nonce, // Envía el nonce por seguridad
			state: administrativeArea,
			city: locality,
			postcode: postalCode,
			country: countryCode,
			order_id: RedsysOrderID
		};

		console.log('Datos de envío preparados para AJAX:', shippingData);

		// Llamada AJAX al backend de WordPress para actualizar la sesión de WooCommerce con los detalles de envío parciales
		jQuery.ajax({
			url: apple_redsys.ajax_url,
			type: 'POST',
			data: shippingData,
			success: function (response) {
				console.log("shippingData success");
				console.log("Respuesta completa del servidor:", response);
				// Manejar la respuesta del servidor
				if (response.success) {
					// Asigna los nuevos métodos de envío y el total actualizado basado en la respuesta
					const newShippingMethods = [{
						label: "Virtual Delivery",
						detail: "Delivered electronically",
						amount: "0.00",
						identifier: "virtual-delivery"
					}];

					const newTotal = {
						label: VarmerchantName,
						amount: String(response.data.total),
						type: "final"
					};

					console.log("newTotal:", JSON.stringify(newTotal, null, 2));

					// Si no necesitas newLineItems, puedes omitir este paso o pasar un arreglo vacío
					const newLineItems = [];

					session.completeShippingContactSelection(
						ApplePaySession.STATUS_SUCCESS,
						newShippingMethods,
						newTotal,
						newLineItems
					);
				} else {
					console.error('Error en la respuesta del servidor:', response);
					session.completeShippingContactSelection(ApplePaySession.STATUS_FAILURE);
				}
			},
			error: function (error) {
				console.error('Error al actualizar la dirección de envío:', error);
				session.completeShippingContactSelection(ApplePaySession.STATUS_FAILURE);
			}
		});
	};

	/**
	 * Maneja la validación del comerciante.
	 */
	session.onvalidatemerchant = function (event) {
		console.log('Evento onvalidatemerchant recibido:', event);
		fetch(apple_redsys.ajax_url, {
			method: 'POST',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
			},
			body: 'action=validate_merchant&validationURL=' + encodeURIComponent(event.validationURL) + '&nonce=' + encodeURIComponent(nonce)
		})
			.then(function (response) {
				console.log('Respuesta del servidor para validación del comerciante:', response);
				if (!response.ok) {
					throw new Error('Network response was not ok');
				}
				return response.json();
			})
			.then(function (merchantSession) {
				console.log('Merchant Session recibido:', merchantSession);
				if (merchantSession.success && merchantSession.data) {
					session.completeMerchantValidation(merchantSession.data);
					console.log('Validación del comerciante completada.');
				} else {
					console.error('Error en la validación del comerciante:', merchantSession);
					session.completeMerchantValidation(); // Completa sin datos si hay errores
				}
			})
			.catch(function (error) {
				console.error('Merchant Validation Error:', error);
				session.completeMerchantValidation(); // Completa la sesión sin datos de validación
			});
	};

	/**
	 * Maneja la selección del método de pago.
	 */
	session.onpaymentmethodselected = function (event) {
		console.log('Evento onpaymentmethodselected recibido:', event);
		getAppleTransactionInfo().then(function (AmountApplePay) {
			const update = {
				newTotal: {
					"label": VarmerchantName,
					"type": "final",
					"amount": AmountApplePay
				}
			};
			session.completePaymentMethodSelection(update);
			console.log('Pago actualizado con el nuevo monto:', update);
		}).catch(function (error) {
			console.error('Error obteniendo el total del carrito:', error);
			// Puedes decidir cómo manejar el error, por ejemplo, fallar la selección del método de pago
			session.completePaymentMethodSelection({
				newTotal: {
					label: VarmerchantName,
					type: 'final',
					amount: '0.00'
				}
			});
		});
	};

	/**
 * Maneja la autorización del pago.
 */
	session.onpaymentauthorized = function (event) {
		console.log('Evento onpaymentauthorized recibido:', event);

		// Obtener el store de checkout utilizando CHECKOUT_STORE_KEY
		const { CHECKOUT_STORE_KEY } = window.wc.wcBlocksData;
		const store = wp.data.select(CHECKOUT_STORE_KEY);
		const RedsysOrderID = store.getOrderId();

		console.log("Order ID obtenido del store para pago autorizado:", RedsysOrderID);

		// Capturando los datos de shippingContact
		var shippingContact = event.payment.shippingContact;
		var billingContact = event.payment.billingContact;

		// Capturar los datos de la transacción de Apple Pay
		var paymentData = event.payment.token.paymentData;
		var paymentDataJsonStr = JSON.stringify(paymentData);
		var paymentDataHexStr = stringToHex(paymentDataJsonStr); // Convertir a hexadecimal

		console.log('Datos de pago convertidos a Hex:', paymentDataHexStr);

		// Generar una referencia única para la transacción de Apple Pay
		var appleReferenciaRedsys = Math.random().toString(36).substring(2, 11) + '_applepay';
		console.log('Referencia única generada para el pago:', appleReferenciaRedsys);

		// Extraer todos los datos disponibles, incluyendo nombre, apellidos, correo, teléfono y direcciones
		const shippingData = {
			first_name: shippingContact.givenName || '',
			last_name: shippingContact.familyName || '',
			email: shippingContact.emailAddress || '',
			phone: shippingContact.phoneNumber || '',
			address_1: shippingContact.addressLines[0] || '',
			address_2: shippingContact.addressLines.length > 1 ? shippingContact.addressLines.slice(1).join(', ') : '',
			city: shippingContact.locality || '',
			state: shippingContact.administrativeArea || '',
			postcode: shippingContact.postalCode || '',
			country: shippingContact.countryCode || ''
		};

		const billingData = {
			first_name: billingContact.givenName || '',
			last_name: billingContact.familyName || '',
			email: billingContact.emailAddress || '',
			phone: billingContact.phoneNumber || '',
			address_1: billingContact.addressLines[0] || '',
			address_2: billingContact.addressLines.length > 1 ? billingContact.addressLines.slice(1).join(', ') : '',
			city: billingContact.locality || '',
			state: billingContact.administrativeArea || '',
			postcode: billingContact.postalCode || '',
			country: billingContact.countryCode || ''
		};

		// Muestra los datos en la consola para verificar su correcto envío
		console.log('Datos de envío:', shippingData);
		console.log('Datos de facturación:', billingData);

		// Prepara los datos para enviarlos al backend
		var data = {
			action: 'save_all_order_data_applepay',
			order_id: RedsysOrderID,
			shippingData: shippingData,
			billingData: billingData,
			nonce: nonce,
			apple_referencia_redsys: appleReferenciaRedsys, // Añadir referencia de Apple Pay
			apple_token_redsys: paymentDataHexStr           // Añadir token de Apple Pay
		};

		// Envío de los datos a tu servidor mediante AJAX
		jQuery.ajax({
			url: apple_redsys.ajax_url,
			type: 'POST',
			data: data,
			success: function (response) {
				console.log('Datos enviados con éxito:', response);

				if (response.success) {
					// Llamar a la función pay_order() después de guardar los datos correctamente
					pay_order(appleReferenciaRedsys, session);
				} else {
					console.error('Error al guardar los datos del pedido:', response);
					session.completePayment(ApplePaySession.STATUS_FAILURE);
				}
			},
			error: function (error) {
				console.error('Error al enviar los datos:', error);
				session.completePayment(ApplePaySession.STATUS_FAILURE);
			}
		});
	};



	/**
 * Maneja el pago de la orden.
 * @param {string} appleRefereciaRedsys - Referencia única de Apple Pay.
 * @param {ApplePaySession} session - Instancia de ApplePaySession.
 */
	function pay_order(appleReferenciaRedsys, session) {
		console.log('Iniciando pay_order con referencia:', appleReferenciaRedsys);
		const { CHECKOUT_STORE_KEY } = window.wc.wcBlocksData;
		const store = wp.data.select(CHECKOUT_STORE_KEY);
		const RedsysOrderID = store.getOrderId();
		console.log('Order ID obtenido del store para pay_order:', RedsysOrderID);

		jQuery.ajax({
			url: apple_redsys.ajax_url,
			type: 'POST',
			data: {
				action: 'pay_order_applepay',
				apple_referencia_redsys: appleReferenciaRedsys,
				order_id: RedsysOrderID,
				nonce: apple_redsys.nonce // Enviar el nonce para validar la solicitud
			},
			success: function (response) {
				console.log('Respuesta del servidor para pay_order:', response);
				if (response && response.success) {
					// Asumimos que si response.success es true, el pago fue exitoso
					session.completePayment(ApplePaySession.STATUS_SUCCESS);
					window.location.href = response.data.redirect; // Redireccionar a la página de agradecimiento
				} else {
					console.error('Error en la respuesta de pay_order:', response);
					session.completePayment(ApplePaySession.STATUS_FAILURE);
				}
			},
			error: function (error) {
				console.error('Error en pay_order:', error);
				session.completePayment(ApplePaySession.STATUS_FAILURE);
			}
		});
	}


	/**
	 * Verifica el estado del pago.
	 * @param {string} appleRefereciaRedsys - Referencia única de Apple Pay.
	 * @param {ApplePaySession} session - Instancia de ApplePaySession.
	 */
	function check_payment_status(appleRefereciaRedsys, session) {
		console.log('Iniciando check_payment_status con referencia:', appleRefereciaRedsys);
		var retries = 5; // Número de intentos (cada 2 segundos, 5 intentos = 10 segundos mínimo)
		var attempt = 0;
		const { CHECKOUT_STORE_KEY } = window.wc.wcBlocksData;
		const store = wp.data.select(CHECKOUT_STORE_KEY);
		const RedsysOrderID = store.getOrderId();
		console.log('Order ID obtenido del store para check_payment_status:', RedsysOrderID);

		var check_status_interval = setInterval(function () {
			attempt++;
			console.log('Intento de verificacion de estado:', attempt);
			jQuery.ajax({
				url: apple_redsys.ajax_url,
				type: 'POST',
				data: {
					action: 'check_payment_status',
					apple_referencia_redsys: appleRefereciaRedsys,
					order_id: RedsysOrderID
				},
				success: function (response) {
					console.log('Respuesta del servidor para check_payment_status:', response);
					if (response && response.status && (response.status === 'processing' || response.status === 'completed')) {
						clearInterval(check_status_interval);
						session.completePayment(ApplePaySession.STATUS_SUCCESS);
					} else if (attempt >= retries) {
						console.error('Se alcanzaron los intentos máximos para check_payment_status:', response);
						clearInterval(check_status_interval);
						session.completePayment(ApplePaySession.STATUS_FAILURE);
					}
				},
				error: function (error) {
					console.error('Error al verificar el estado del pago:', error);
					if (attempt >= retries) {
						console.error('Se alcanzaron los intentos máximos tras error en check_payment_status');
						clearInterval(check_status_interval);
						session.completePayment(ApplePaySession.STATUS_FAILURE);
					}
				}
			});
		}, 2000);  // Comprobar cada 2 segundos
	}

	/**
	 * Obtiene la información de la transacción de Apple Pay.
	 * @return {Promise<string>} - Una promesa que resuelve con el total del carrito.
	 */
	function getAppleTransactionInfo() {
		console.log('Iniciando getAppleTransactionInfo');
		return new Promise((resolve, reject) => {
			jQuery.ajax({
				url: url_site + '/?wc-api=WC_Gateway_applepayredsys&checkout-price=true',
				method: 'GET',
				dataType: 'json',
				success: function (response) {
					console.log('Respuesta del servidor para getAppleTransactionInfo:', response);
					if (response && response.total) {
						console.log('Total obtenido del carrito:', response.total);
						resolve(response.total);  // Resuelve la promesa con el valor total
					} else {
						console.error('No se pudo obtener el total del carrito. Respuesta del servidor:', response);
						reject(new Error('No se pudo obtener el total del carrito'));
					}
				},
				error: function (error) {
					console.error('Error al obtener la información de la transacción de Apple Pay:', error);
					reject(error);  // Rechaza la promesa con el error
				}
			});
		});
	}
	/**
 * Añade el listener al botón de Apple Pay una vez que el DOM esté cargado.
 */
	document.addEventListener('DOMContentLoaded', function () {
		console.log('DOM completamente cargado y parseado.');
		var applePayButton = document.querySelector('#apple-pay-button'); // Asegúrate de que el selector es correcto.

		if (applePayButton) {
			applePayButton.addEventListener('click', onApplePayClicked);
			console.log('Listener para el botón de Apple Pay añadido.');
		} else {
			console.warn('No se encontró el botón de Apple Pay en el DOM.');
		}
	});
}