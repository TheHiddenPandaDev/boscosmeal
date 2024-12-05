<?php
/**
 * Apple Pay support for WooCommerce Blocks.
 *
 * @package WooCommerce\Blocks
 */

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

/**
 * Apple Pay Redsys Support Blocks integration
 *
 * @since 1.0.3
 */
final class WC_Gateway_Apple_Pay_Redsys_Support extends AbstractPaymentMethodType {

	/**
	 * The gateway instance.
	 *
	 * @var WC_Gateway_Apple_Pay_Checkout
	 */
	private $gateway;

	/**
	 * Payment method name/id/slug.
	 *
	 * @var string
	 */
	protected $name = 'applepayredsys';

	/**
	 * Initializes the payment method type.
	 */
	public function initialize() {
		// Ensure settings are only retrieved if the plugin is active.
		if ( function_exists( 'WCRed' ) ) {
			$this->settings = get_option( 'woocommerce_applepayredsys_settings', array() );
		}
	}

	/**
	 * Returns if this payment method should be active. If false, the scripts will not be enqueued.
	 *
	 * @return boolean
	 */
	public function is_active() {
		return function_exists( 'WCRed' ) && WCRed()->is_gateway_enabled( 'applepayredsys' );
	}

	/**
	 * Returns an array of scripts/handles to be registered for this payment method.
	 *
	 * @return array
	 */
	public function get_payment_method_script_handles() {
		// Ensure the script is only enqueued if the gateway is active.
		if ( ! $this->is_active() ) {
			return array();
		}

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
			'wc-applepayredsys-payments-blocks',
			$script_url,
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		// Diferir la llamada a `all_virtual_products()` con un hook.
		add_action(
			'wp_loaded',
			function () {
				wp_localize_script(
					'wc-applepayredsys-payments-blocks',
					'applePayRedsysParams',
					array(
						'productosVirtuales' => function_exists( 'WCRed' ) ? WCRed()->all_virtual_products() : false,
						'nonce'              => wp_create_nonce( 'applepay_redsys_nonce' ),
					)
				);
			}
		);

		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'wc-applepayredsys-payments-blocks', 'woocommerce-redsys', REDSYS_PLUGIN_PATH_P . 'languages/' );
		}

		return array( 'wc-applepayredsys-payments-blocks' );
	}

	/**
	 * Returns an array of key=>value pairs of data made available to the payment methods script.
	 *
	 * @return array
	 */
	public function get_payment_method_data() {
		if ( ! function_exists( 'WCRed' ) ) {
			return array();
		}

		$icon = false;
		if ( ! empty( WCRed()->get_redsys_option( 'logo', 'applepayredsys' ) ) ) {
			$logo_url = WCRed()->get_redsys_option( 'logo', 'applepayredsys' );
			$icon     = apply_filters( 'woocommerce_applepayredsys_icon', $logo_url );
		} else {
			$icon = apply_filters( 'woocommerce_applepayredsys_icon', REDSYS_PLUGIN_URL_P . 'assets/images/GPay.svg' );
		}

		if ( '' === $icon ) {
			$icon = false;
		}

		return array(
			'enabled'           => $this->is_active(),
			'title'             => WCRed()->get_redsys_option( 'title', 'applepayredsys' ),
			'description'       => WCRed()->get_redsys_option( 'description', 'applepayredsys' ),
			'icon'              => '' !== $icon ? $icon : false,
			'logodisplayoption' => get_option( 'redsys_logo_display_option', 'right' ), // left", right, afterText, iconOnly.
			'supports'          => array(
				'products',
				'refunds',
			),
		);
	}
}
