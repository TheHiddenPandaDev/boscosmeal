<?php
/**
 * Class WC_Gateway_Paygold_Support
 *
 * @package WooCommerce\Payments
 */

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

/**
 * Dummy Payments Blocks integration
 *
 * @since 1.0.3
 */
final class WC_Gateway_Paygold_Support extends AbstractPaymentMethodType {

	/**
	 * The gateway instance.
	 *
	 * @var WC_Gateway_Paygold_Redsys
	 */
	private $gateway;

	/**
	 * Payment method name/id/slug.
	 *
	 * @var string
	 */
	protected $name = 'paygold';

	/**
	 * Initializes the payment method type.
	 */
	public function initialize() {
		$this->settings = get_option( 'woocommerce_paygold_settings', array() );
	}

	/**
	 * Returns if this payment method should be active. If false, the scripts will not be enqueued.
	 *
	 * @return boolean
	 */
	public function is_active() {
		return WCRed()->is_gateway_enabled( 'paygold' );
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
			'wc-paygold-payments-blocks',
			$script_url,
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'wc-paygold-payments-blocks', 'woocommerce-redsys', REDSYS_PLUGIN_PATH_P . 'languages/' );
		}

		return array( 'wc-paygold-payments-blocks' );
	}

	/**
	 * Returns an array of key=>value pairs of data made available to the payment methods script.
	 *
	 * @return array
	 */
	public function get_payment_method_data() {
		if ( ! empty( WCRed()->get_redsys_option( 'logo', 'paygold' ) ) ) {
			$logo_url = WCRed()->get_redsys_option( 'logo', 'paygold' );
			$icon     = apply_filters( 'woocommerce_paygold_icon', $logo_url );
		} else {
			$icon = apply_filters( 'woocommerce_paygold_icon', REDSYS_PLUGIN_URL_P . 'assets/images/paygold.png' );
		}
		if ( '' === $icon ) {
			$icon = false;
		}
		if ( WCRed()->get_redsys_option( 'showcheckout', 'paygold' ) === 'yes' ) {
			$show_gateway = true;
		} else {
			$show_gateway = false;
		}
		return array(
			'enabled'           => $this->is_active(),
			'title'             => WCRed()->get_redsys_option( 'title', 'paygold' ),
			'description'       => WCRed()->get_redsys_option( 'description', 'paygold' ),
			'logodisplayoption' => get_option( 'redsys_logo_display_option', 'right' ), // left", right, afterText, iconOnly.
			'icon'              => $icon,
			'show'              => $show_gateway,
			'supports'          => array(
				'products',
				'refunds',
			),
		);
	}
}
