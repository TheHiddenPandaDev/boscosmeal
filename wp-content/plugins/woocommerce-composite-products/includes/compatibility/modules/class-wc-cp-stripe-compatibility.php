<?php
/**
 * WC_CP_Stripe_Compatibility class
 *
 * @package  WooCommerce Composite Products
 * @since    7.1.4
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Stripe Compatibility.
 *
 * @version  9.0.5
 */
class WC_CP_Stripe_Compatibility {

	public static function init() {
		add_filter( 'wc_stripe_hide_payment_request_on_product_page', array( __CLASS__, 'hide_stripe_quickpay' ), 10, 2 );
	}

	/**
	 * Hide Stripe Quick-pay buttons for non-static Composites.
	 *
	 * @since 7.1.4
	 */
	public static function hide_stripe_quickpay( $hide_button, $post ) {

		global $product;

		// If the button is already hidden by some other plugin, respect that.
		if ( $hide_button ) {
			return $hide_button;
		}

		$the_product = $product && is_a( $product, 'WC_Product' ) ? $product : wc_get_product( $post->ID );

		if ( $the_product && $the_product->is_type( 'composite' ) ) {
			$hide_button = true;
		}

		return $hide_button;
	}
}

WC_CP_Stripe_Compatibility::init();
