<?php
/**
 * Add support for WooCommerce Blocks / Payments.
 *
 * @package WooCommerce Redsys Gateway
 * @since 21.0.0
 * @author José Conti.
 * @link https://joseconti.com
 * @link https://plugins.joseconti.com
 * @link https://woocommerce.com/products/redsys-gateway/
 * @license GNU General Public License v3.0
 * @license URI: http://www.gnu.org/licenses/gpl-3.0.html
 * @copyright 2013-2024 José Conti.
 * @internal This file is only used when WooCommerce Blocks is active.
 */

/**
 * Add support for WooCommerce Blocks / Payments.
 */
function woocommerce_gateway_redsys_block_support() {
	if ( class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
		require_once REDSYS_PLUGIN_PATH_P . 'includes/blocks/class-wc-gateway-bizum-support.php';
		require_once REDSYS_PLUGIN_PATH_P . 'includes/blocks/class-wc-gateway-paygold-support.php';
		require_once REDSYS_PLUGIN_PATH_P . 'includes/blocks/class-wc-gateway-masterpass-support.php';
		require_once REDSYS_PLUGIN_PATH_P . 'includes/blocks/class-wc-gateway-redsysbank-support.php';
		require_once REDSYS_PLUGIN_PATH_P . 'includes/blocks/class-wc-gateway-directdebitredsys-support.php';
		require_once REDSYS_PLUGIN_PATH_P . 'includes/blocks/class-wc-gateway-redsys-support.php';
		require_once REDSYS_PLUGIN_PATH_P . 'includes/blocks/class-wc-gateway-googlepay-redirection-redsys-support.php';

		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
				$payment_method_registry->register( new WC_Gateway_Bizum_Support() );
			}
		);
		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
				$payment_method_registry->register( new WC_Gateway_Paygold_Support() );
			}
		);
		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
				$payment_method_registry->register( new WC_Gateway_Masterpass_Support() );
			}
		);
		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
				$payment_method_registry->register( new WC_Gateway_Redsysbank_Support() );
			}
		);
		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
				$payment_method_registry->register( new WC_Gateway_Directdebitredsys_Support() );
			}
		);
		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
				$payment_method_registry->register( new WC_Gateway_Redsys_Support() );
			}
		);
		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
				$payment_method_registry->register( new WC_Gateway_GooglePay_Redirection_Redsys_Support() );
			}
		);
		if ( WCRed()->is_gateway_enabled( 'applepayredsys' ) ) {
			require_once REDSYS_PLUGIN_PATH_P . 'includes/blocks/class-wc-gateway-apple-pay-redsys-support.php';
			add_action(
				'woocommerce_blocks_payment_method_type_registration',
				function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
					$payment_method_registry->register( new WC_Gateway_Apple_Pay_Redsys_Support() );
				}
			);
		}
		if ( WCRed()->is_gateway_enabled( 'insite' ) ) {
			require_once REDSYS_PLUGIN_PATH_P . 'includes/blocks/class-wc-gateway-insite-support.php';
			add_action(
				'woocommerce_blocks_payment_method_type_registration',
				function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
					$payment_method_registry->register( new WC_Gateway_InSite_Support() );
				}
			);
		}
	}
}
add_action( 'woocommerce_blocks_loaded', 'woocommerce_gateway_redsys_block_support' );
