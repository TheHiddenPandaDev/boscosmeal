<?php
/**
 * Class WC Gateway Bank Transfer Support
 *
 * @package WooCommerce Redsys Gateway
 * @since 1.0.3
 * @link https://joseconti.com
 * @link https://plugins.joseconti.com
 * @link https://woocommerce.com/products/redsys-gateway/
 * @license GNU General Public License v3.0
 * @license URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

/**
 * Dummy Payments Blocks integration
 *
 * @since 1.0.3
 */
final class WC_Gateway_Redsysbank_Support extends AbstractPaymentMethodType {

	/**
	 * The gateway instance.
	 *
	 * @var WC_Gateway_Redsysbank_Redsys
	 */
	private $gateway;

	/**
	 * Payment method name/id/slug.
	 *
	 * @var string
	 */
	protected $name = 'redsysbank';

	/**
	 * Initializes the payment method type.
	 */
	public function initialize() {
		$this->settings = get_option( 'woocommerce_redsysbank_settings', array() );
	}

	/**
	 * Returns if this payment method should be active. If false, the scripts will not be enqueued.
	 *
	 * @return boolean
	 */
	public function is_active() {
		return WCRed()->is_gateway_enabled( 'redsysbank' );
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
			'wc-redsysbank-payments-blocks',
			$script_url,
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'wc-redsysbank-payments-blocks', 'woocommerce-redsys', REDSYS_PLUGIN_PATH_P . 'languages/' );
		}

		return array( 'wc-redsysbank-payments-blocks' );
	}

	/**
	 * Returns an array of key=>value pairs of data made available to the payment methods script.
	 *
	 * @return array
	 */
	public function get_payment_method_data() {
		if ( ! empty( WCRed()->get_redsys_option( 'logo', 'redsysbank' ) ) ) {
			$logo_url = WCRed()->get_redsys_option( 'logo', 'redsysbank' );
			$icon     = apply_filters( 'woocommerce_bank_redsys_icon', $logo_url );
		} else {
			$icon = apply_filters( 'woocommerce_bank_redsys_icon', REDSYS_PLUGIN_URL_P . 'assets/images/redsys.svg' );
		}
		if ( '' === $icon ) {
			$icon = false;
		}
		return array(
			'enabled'           => $this->is_active(),
			'title'             => WCRed()->get_redsys_option( 'title', 'redsysbank' ),
			'description'       => WCRed()->get_redsys_option( 'description', 'redsysbank' ),
			'logodisplayoption' => get_option( 'redsys_logo_display_option', 'right' ), // left", right, afterText, iconOnly.
			'icon'              => $icon,
			'supports'          => array(
				'products',
			),
		);
	}
}