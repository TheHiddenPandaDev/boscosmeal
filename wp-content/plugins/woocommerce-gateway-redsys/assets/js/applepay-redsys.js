/**
 * Define Constants needed by the Apple Pay API
 */
var VarmerchantId        = apple_redsys.merchantId;
var VarmerchantName      = apple_redsys.merchantName;
var VarcountryCode       = apple_redsys.countryCode;
var VarcurrencyCode      = apple_redsys.currencyCode;
var url_site             = apple_redsys.url_site;
var cartTotal            = apple_redsys.cart_total; // Monto del carrito pre-cargado.

/**
 * Convierte una cadena a su representación hexadecimal.
 * @param {string} str - La cadena a convertir.
 * @return {string} - La representación hexadecimal de la cadena.
 */
function stringToHex(str) {
    var hex = '';
    for(var i = 0; i < str.length; i++) {
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

    // Define la configuración de la solicitud de Apple Pay utilizando el monto pre-cargado.
    var request = {
        countryCode: VarcountryCode,
        currencyCode: VarcurrencyCode,
        supportedNetworks: ['visa', 'masterCard', 'amex', 'discover'],
        merchantCapabilities: ['supports3DS'],
        total: { label: VarmerchantName, amount: cartTotal },
    };

    console.log('Configuración de la solicitud de Apple Pay:', request);

    var session = new ApplePaySession(3, request);
    session.begin();
    console.log('ApplePaySession iniciado.');

    /**
     * Maneja la validación del comerciante.
     */
    session.onvalidatemerchant = function(event) {
        console.log('Evento onvalidatemerchant recibido:', event);
        fetch(apple_redsys.ajax_url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=validate_merchant&validationURL=' + encodeURIComponent(event.validationURL) + '&nonce=' + apple_redsys.nonce
        })
        .then(function(response) {
            console.log('Respuesta de validate_merchant fetch:', response);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(function(merchantSession) {
            console.log('Merchant Session recibido:', merchantSession);
            if (merchantSession.success && merchantSession.data) {
                session.completeMerchantValidation(merchantSession.data);
                console.log('Validación del comerciante completada.');
            } else {
                console.error('Error en la validación del comerciante:', merchantSession);
            }
        })
        .catch(function(error) {
            console.error('Merchant Validation Error:', error);
        });
    };

    /**
     * Maneja la selección del método de pago.
     */
    session.onpaymentmethodselected = function(event) {
        console.log('Evento onpaymentmethodselected recibido:', event);
        var update = {
            newTotal: {
                "label": VarmerchantName,
                "type": "final",
                "amount": cartTotal
            }
        };
        session.completePaymentMethodSelection(update);
        console.log('Pago actualizado con el nuevo monto:', update);
    };

    /**
     * Maneja la autorización del pago.
     */
    session.onpaymentauthorized = function(event) {
        console.log('Evento onpaymentauthorized recibido:', event);

        // Genera una referencia única para el pago
        var appleReferenciaRedsys = Math.random().toString(36).substring(2, 11) + '_applepay';
        console.log('Referencia única generada para el pago:', appleReferenciaRedsys);

        // Asigna la referencia a un campo hidden
        var referenciaElement = document.getElementById('apple-referencia-redsys');
        if (referenciaElement) {
            referenciaElement.value = appleReferenciaRedsys;
            console.log('Valor asignado al campo "apple-referencia-redsys":', referenciaElement.value);
        } else {
            console.error('No se encontró el elemento con ID "apple-referencia-redsys".');
        }

        // Obtén y convierte los datos de pago
        var paymentData = event.payment.token.paymentData;
        console.log('Datos de pago de Apple Pay:', paymentData);
        var paymentDataJsonStr = JSON.stringify(paymentData);
        var paymentDataHexStr = stringToHex(paymentDataJsonStr);
        console.log('Datos de pago convertidos a Hex:', paymentDataHexStr);

        // Asigna el token a un campo hidden
        var tokenElement = document.getElementById('apple-token-redsys');
        if (tokenElement) {
            tokenElement.value = paymentDataHexStr;
            console.log('Valor asignado al campo "apple-token-redsys":', tokenElement.value);
        } else {
            console.error('No se encontró el elemento con ID "apple-token-redsys".');
        }

        // Guarda los datos y hace clic en el botón de pagar
        console.log('Guardando datos y haciendo clic en el botón de pagar.');
        document.getElementById("place_order").click();

        // Completa la autorización del pago
        session.completePayment(ApplePaySession.STATUS_SUCCESS);
        console.log('Autorización del pago completada con éxito.');
    };

    /**
     * Maneja la cancelación del pago.
     */
    session.oncancel = function(event) {
        console.log('Pago cancelado por el usuario:', event);
    };
}

/**
 * Añade el listener al botón de Apple Pay una vez que el DOM esté cargado.
 */
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM completamente cargado y parseado.');
    var applePayButton = document.querySelector('#apple-pay-button'); // Asegúrate de que el selector es correcto.

    if (applePayButton) {
        applePayButton.addEventListener('click', onApplePayClicked);
        console.log('Listener para el botón de Apple Pay añadido.');
    } else {
        console.warn('No se encontró el botón de Apple Pay en el DOM.');
    }
});