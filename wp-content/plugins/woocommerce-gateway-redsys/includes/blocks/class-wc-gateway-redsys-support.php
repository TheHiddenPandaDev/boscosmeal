<?php
/**
 * WC_Gateway_Redsys_Support class
 *
 * @package WooCommerce\Payments
 */

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

/**
 * Dummy Payments Blocks integration
 *
 * @since 25.0.0
 */
final class WC_Gateway_Redsys_Support extends AbstractPaymentMethodType {

	/**
	 * The gateway instance.
	 *
	 * @var WC_Gateway_Redsys_Redsys
	 */
	private $gateway;

	/**
	 * Payment method name/id/slug.
	 *
	 * @var string
	 */
	protected $name = 'redsys';

	/**
	 * Initializes the payment method type.
	 */
	public function initialize() {
		$this->settings = get_option( 'woocommerce_redsys_settings', array() );
	}
	/**
	 * Constructor
	 */
	public function __construct() {
		// Enganchar la función 'filtrar_metodos_de_pago_guardados' al filtro 'woocommerce_saved_payment_methods_list'.
		add_filter( 'woocommerce_saved_payment_methods_list', array( $this, 'filter_tokens' ), 10, 2 );
	}
	/**
	 * Returns if this payment method should be active. If false, the scripts will not be enqueued.
	 *
	 * @return boolean
	 */
	public function is_active() {
		return WCRed()->is_gateway_enabled( 'redsys' );
	}
	/**
	 * Returns an array of scripts/handles to be registered for this payment method.
	 *
	 * @return array
	 */
	public function get_payment_method_script_handles() {
		$script_path       = 'assets/js/frontend/blocks.js';
		$script_asset_path = REDSYS_PLUGIN_PATH_P . 'assets/js/frontend/blocks.asset.php';
		$script_asset      = file_exists( $script_asset_path )
			? require $script_asset_path
			: array(
				'dependencies' => array(),
				'version'      => '1.2.0',
			);
		$script_url        = REDSYS_PLUGIN_URL_P . $script_path;

		wp_register_script(
			'wc-redsys-payments-blocks',
			$script_url,
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'wc-redsys-payments-blocks', 'woocommerce-redsys', REDSYS_PLUGIN_PATH_P . 'languages/' );
		}

		return array( 'wc-redsys-payments-blocks' );
	}
	/**
	 * Return if the current payment method is a subscription
	 *
	 * @return bool
	 */
	public function is_subscription() {
		if ( ( ! is_checkout() && ! is_cart() ) || ! is_object( WC()->cart ) || WC()->cart->is_empty() || is_admin() ) {
			return;
		}
		$the_card = WC()->cart->get_cart();
		if ( 'R' === WCRed()->check_card_for_subscription( $the_card ) ) {
			return true;
		}
		return false;
	}
	/**
	 * Return if the current payment method is a preauth
	 *
	 * @return bool
	 */
	public function is_preauth() {
		if ( ( ! is_checkout() && ! is_cart() ) || ! is_object( WC()->cart ) || WC()->cart->is_empty() || is_admin() ) {
			return;
		}
		$the_card = WC()->cart->get_cart();
		if ( WCRed()->check_card_preauth( $the_card ) ) {
			return true;
		}
		return false;
	}
	/**
	 * Filter the list of saved payment methods to only include tokens for the current payment method needed.
	 *
	 * @param array $list_v List of saved payment methods.
	 * @param int   $customer_id Customer ID.
	 * @return array
	 */
	public function filter_tokens( $list_v, $customer_id ) {
		if ( is_checkout() ) {
			WCRed()->log( 'redsys', print_r( $list_v, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r

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
	 * Returns an array of key=>value pairs of data made available to the payment methods script.
	 *
	 * @return array
	 */
	public function get_payment_method_data() {
		$tokens      = false;
		$descripcion = WCRed()->get_redsys_option( 'description', 'redsys' );
		if ( 'yes' === WCRed()->get_redsys_option( 'usetokens', 'redsys' ) ) {
			$tokens = true;
		}
		if ( $this->is_subscription() ) {
			$text              = __( 'We need to store your credit card for future payments. It will be stored by our bank, so it is totally safe.', 'woocommerce-redsys' );
			$text_filter       = apply_filters( 'redsys_text_get_token', $text );
			$descripcion_final = $descripcion . ' ' . $text_filter;
			$tokens            = false;
		} elseif ( $this->is_preauth() ) {
			$text              = __( 'We will preauthorize the Order and will be charge later when we know the final cost.', 'woocommerce-redsys' );
			$text_filter       = apply_filters( 'redsys_text_preauth', $text );
			$descripcion_final = $descripcion . ' ' . $text_filter;
		} else {
			$descripcion_final = $descripcion;
		}
		if ( ! empty( WCRed()->get_redsys_option( 'logo', 'redsys' ) ) ) {
			$logo_url = WCRed()->get_redsys_option( 'logo', 'redsys' );
			$icon     = apply_filters( 'woocommerce_redsys_icon', $logo_url );
		} else {
			$icon = apply_filters( 'woocommerce_redsys_icon', REDSYS_PLUGIN_URL_P . 'assets/images/visa-mastercard.svg' );
		}
		if ( '' === $icon ) {
			$icon = false;
		}
		return array(
			'enabled'           => $this->is_active(),
			'title'             => WCRed()->get_redsys_option( 'title', 'redsys' ),
			'description'       => $descripcion_final,
			'logodisplayoption' => get_option( 'redsys_logo_display_option', 'right' ), // left", right, afterText, iconOnly.
			'tokens'            => $tokens,
			'icon'              => $icon,
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
