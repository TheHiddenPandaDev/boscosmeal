<?php
/**
 * Clase WC_Gateway_InSite_Support
 * Clase de soporte para el método de pago InSite de WooCommerce, con integración.
 *
 * @package WooCommerce\Redsys
 * @since 25.2.0
 * @version 25.2.0
 */

defined( 'ABSPATH' ) || exit;

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

/**
 * Clase WC_Gateway_InSite_Support
 *
 * Clase de soporte para el método de pago InSite de WooCommerce, con integración
 * en bloques de pago y funcionalidad extendida.
 */
final class WC_Gateway_InSite_Support extends AbstractPaymentMethodType {

	/**
	 * Nombre interno del método de pago.
	 *
	 * @var string
	 */
	protected $name = 'insite';

	/**
	 * Inicializa el método de pago.
	 */
	public function initialize() {
		$this->settings = get_option( 'woocommerce_insite_settings', array() );
	}

	/**
	 * Constructor de la clase.
	 *
	 * Registra filtros y hooks necesarios.
	 */
	public function __construct() {

		// Filtrar tokens de pago guardados específicos de InSite.
		add_filter( 'woocommerce_saved_payment_methods_list', array( $this, 'filter_tokens' ), 10, 2 );

		// Registrar el endpoint REST.
		add_action( 'rest_api_init', array( $this, 'register_prepare_order_number_endpoint' ) );
		add_action( 'rest_api_init', array( $this, 'register_save_order_data_endpoint' ) ); // Aquí se registra el nuevo endpoint.
	}

	/**
	 * Verifica si el método de pago InSite está activo.
	 *
	 * @return bool True si está activo, de lo contrario False.
	 */
	public function is_active() {
		return WCRed()->is_gateway_enabled( 'insite' );
	}

	/**
	 * Obtiene el identificador de los scripts del método de pago.
	 *
	 * @return array Lista de handles de scripts para el método de pago.
	 */
	public function get_payment_method_script_handles() {
		$script_path       = 'assets/js/frontend/blocks.js';
		$script_asset_path = REDSYS_PLUGIN_PATH_P . 'assets/js/frontend/blocks.asset.php';
		$script_asset      = file_exists( $script_asset_path ) ? require $script_asset_path : array(
			'dependencies' => array(),
			'version'      => '1.2.0',
		);

		wp_register_script(
			'wc-insite-payments-blocks',
			REDSYS_PLUGIN_URL_P . $script_path,
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'wc-insite-payments-blocks', 'woocommerce-redsys', REDSYS_PLUGIN_PATH_P . 'languages/' );
		}

		wp_localize_script(
			'wc-insite-payments-blocks',
			'insite_params',
			array(
				'name'        => $this->name,
				'title'       => WCRed()->get_redsys_option( 'title', 'insite' ),
				'description' => esc_html( WCRed()->get_redsys_option( 'description', 'insite' ) ),
				'icon'        => apply_filters( 'woocommerce_insite_icon', REDSYS_PLUGIN_URL_P . 'assets/images/visa-mastercard.svg' ),
				'terminal'    => WCRed()->get_redsys_option( 'terminal', 'insite' ),
				'fuc'         => WCRed()->get_redsys_option( 'customer', 'insite' ),
			)
		);

		return array( 'wc-insite-payments-blocks' );
	}

	/**
	 * Registra el endpoint REST para obtener el número de pedido preparado.
	 */
	public function register_prepare_order_number_endpoint() {
		register_rest_route(
			'woocommerce-redsys/v1',
			'/prepare_order_number/(?P<order_id>\d+)',
			array(
				'methods'             => 'GET',
				'callback'            => array( $this, 'handle_prepare_order_number' ),
				'permission_callback' => '__return_true', // Agrega validación de permisos si es necesario.
			)
		);
	}

	/**
	 * Callback para manejar el endpoint REST de preparación del número de pedido.
	 *
	 * @param WP_REST_Request $request La solicitud REST, que contiene el ID del pedido.
	 * @return WP_REST_Response Respuesta REST con el número de pedido preparado o un mensaje de error.
	 */
	public function handle_prepare_order_number( $request ) {

		$order_id = $request['order_id'];

		// Verifica si la función WCRed está disponible.
		if ( function_exists( 'WCRed' ) ) {
			$prepared_order_number = WCRed()->prepare_order_number( $order_id, false );
			return new WP_REST_Response( $prepared_order_number, 200 );
		}

		return new WP_REST_Response( 'WCRed function not available', 500 );
	}

	/**
	 * Filtra la lista de métodos de pago guardados para incluir solo los tokens específicos de InSite.
	 *
	 * @param array $list_v Lista de métodos de pago guardados.
	 * @param int   $customer_id ID del cliente.
	 * @return array Lista filtrada de métodos de pago guardados.
	 */
	public function filter_tokens( $list_v, $customer_id ) {
		if ( is_checkout() ) {
			foreach ( $list_v as $payment_method_type => &$tokens ) {
				foreach ( $tokens as $key => $token ) {
					if ( 'redsys' === $token['method']['gateway'] ) {
						$token_type = WCRed()->get_token_type( $token['tokenId'] );
						if ( $this->is_subscription() ) {
							if ( 'R' !== $token_type ) {
								unset( $tokens[ $key ] );
							}
						} elseif ( 'R' === $token_type ) {
							unset( $tokens[ $key ] );
						}
					}
				}
				$tokens = array_values( $tokens );
			}
			return $list_v;
		}
		return $list_v;
	}

	/**
	 * Comprueba si el carrito actual contiene un producto de suscripción.
	 *
	 * @return bool True si hay una suscripción, de lo contrario False.
	 */
	public function is_subscription() {
		if ( ( ! is_checkout() && ! is_cart() ) || ! is_object( WC()->cart ) || WC()->cart->is_empty() || is_admin() ) {
			return false;
		}
		$the_card = WC()->cart->get_cart();
		return 'R' === WCRed()->check_card_for_subscription( $the_card );
	}

	/**
	 * Verifica si el método de pago actual es una preautorización.
	 *
	 * @return bool True si es preautorización, de lo contrario False.
	 */
	public function is_preauth() {
		if ( ( ! is_checkout() && ! is_cart() ) || ! is_object( WC()->cart ) || WC()->cart->is_empty() || is_admin() ) {
			return false;
		}
		$the_card = WC()->cart->get_cart();
		return WCRed()->check_card_preauth( $the_card );
	}

	/**
	 * Registra el endpoint REST para guardar datos del pedido.
	 */
	public function register_save_order_data_endpoint() {
		register_rest_route(
			'woocommerce-redsys/v1',
			'/save_order_data',
			array(
				'methods'             => 'POST',
				'callback'            => array( $this, 'save_insite_data' ),
				'permission_callback' => '__return_true', // Cambiar según la necesidad de seguridad.
			)
		);
	}

	/**
	 * Guarda los datos del pedido en la base de datos.
	 *
	 * @param WP_REST_Request $request La solicitud REST, que contiene los datos del pedido.
	 * @return WP_REST_Response Respuesta REST con el resultado de la operación.
	 */
	public function save_insite_data( $request ) {
		WCRed()->log( 'insite', 'save_insite_datae' );

		// Extraer datos de JSON en el cuerpo de la solicitud.
		$json_params           = $request->get_json_params();
		$order_id              = isset( $json_params['order_id'] ) ? $json_params['order_id'] : null;
		$modified_order_number = isset( $json_params['modified_order_number'] ) ? sanitize_text_field( $json_params['modified_order_number'] ) : '';
		$token                 = isset( $json_params['token'] ) ? sanitize_text_field( $json_params['token'] ) : '';

		WCRed()->log( 'insite', 'order_id: ' . $order_id );
		WCRed()->log( 'insite', '$modified_order_number: ' . $modified_order_number );
		WCRed()->log( 'insite', 'token: ' . $token );

		// Verificar si el pedido existe.
		if ( ! wc_get_order( $order_id ) ) {
			return new WP_Error( 'no_order', 'Invalid order', array( 'status' => 404 ) );
		}

		// Preparar los datos a guardar.
		$data['_payment_order_number_redsys'] = sanitize_text_field( $modified_order_number );
		$data['_insite_token']                = sanitize_text_field( $token );

		// Guardar los datos en el pedido utilizando WCRed.
		WCRed()->update_order_meta( $order_id, $data );

		return rest_ensure_response( array( 'success' => true ) );
	}

	/**
	 * Devuelve datos clave del método de pago que estarán disponibles en el script.
	 *
	 * @return array Datos clave del método de pago.
	 */
	public function get_payment_method_data() {
		$tokens      = 'yes' === WCRed()->get_redsys_option( 'pay1clic', 'insite' );
		$descripcion = esc_html( WCRed()->get_redsys_option( 'description', 'insite' ) );

		if ( $this->is_subscription() ) {
			$text              = __( 'We need to store your credit card for future payments. It will be stored by our bank, so it is totally safe.', 'woocommerce-redsys' );
			$descripcion_final = $descripcion . ' ' . apply_filters( 'redsys_text_get_token', $text );
			$tokens            = false;
		} elseif ( $this->is_preauth() ) {
			$text              = __( 'We will preauthorize the Order and will charge later when we know the final cost.', 'woocommerce-redsys' );
			$descripcion_final = $descripcion . ' ' . apply_filters( 'redsys_text_preauth', $text );
		} else {
			$descripcion_final = $descripcion;
		}

		$icon = ! empty( WCRed()->get_redsys_option( 'logo', 'insite' ) )
			? apply_filters( 'woocommerce_insite_icon', WCRed()->get_redsys_option( 'logo', 'insite' ) )
			: apply_filters( 'woocommerce_insite_icon', REDSYS_PLUGIN_URL_P . 'assets/images/visa-mastercard.svg' );

		// Determinar si el usuario está en modo de prueba basándonos en el ID de usuario si está identificado.
		$user_id          = is_user_logged_in() ? get_current_user_id() : false;
		$gateway_instance = new WC_Gateway_InSite_Redsys();

		// Verificar si el modo de prueba general está activado.
		$is_general_test_mode = 'yes' === WCRed()->get_redsys_option( 'testmode', 'insite' );

		// Determinar si estamos en modo de prueba basado en el modo general o específico para el usuario.
		if ( $is_general_test_mode ) {
			$is_test_mode = true;
		} else {
			$is_test_mode = $gateway_instance->check_user_test_mode( $user_id );
		}

		// Configurar la URL del script de Redsys en función del modo de prueba.
		if ( $is_test_mode ) {
			$script_url = 'https://sis-t.redsys.es:25443/sis/NC/sandbox/redsysV3.js';
		} else {
			$script_url = 'https://sis.redsys.es/sis/NC/redsysV3.js';
		}

		return array(
			'enabled'           => $this->is_active(),
			'title'             => WCRed()->get_redsys_option( 'title', 'insite' ),
			'description'       => $descripcion_final,
			'logodisplayoption' => get_option( 'redsys_logo_display_option', 'right' ), // left", right, afterText, iconOnly.
			'tokens'            => $tokens,
			'terminal'          => WCRed()->get_redsys_option( 'terminal', 'insite' ),
			'fuc'               => WCRed()->get_redsys_option( 'customer', 'insite' ),
			'name'              => $this->name,
			'icon'              => $icon,
			'script_url'        => $script_url,
			'alturaiframe'      => '300px',
			'insitetipo'        => 'inline', // 'twoRows'
			'buttonvalue'       => __( 'Pay', 'woocommerce-redsys' ),
			'supports'          => array(
				'products',
				'tokenization',
				'add_payment_method',
				'refunds',
				'pre-orders',
				'subscriptions',
				'subscription_cancellation',
				'subscription_suspension',
				'subscription_reactivation',
				'subscription_amount_changes',
				'subscription_date_changes',
				'subscription_payment_method_change',
				'subscription_payment_method_change_customer',
				'subscription_payment_method_change_admin',
				'multiple_subscriptions',
				'yith_subscriptions',
				'yith_subscriptions_scheduling',
				'yith_subscriptions_pause',
				'yith_subscriptions_multiple',
				'yith_subscriptions_payment_date',
				'yith_subscriptions_recurring_amount',
				'redsys_preauth',
				'redsys_token_r',
			),
		);
	}
}
