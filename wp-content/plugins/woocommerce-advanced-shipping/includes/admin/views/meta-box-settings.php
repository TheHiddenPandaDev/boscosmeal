<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * WAS meta box settings.
 *
 * Display the shipping settings in the meta box.
 *
 * @author		Jeroen Sormani
 * @package		WooCommerce Advanced Shipping
 * @version		1.0.0
 */


?><div class='was was_settings was_meta_box was_settings_meta_box'>

	<p class='was-option was-shipping-title'>
		<label for='shipping_title'><?php _e( 'Shipping title', 'woocommerce-advanced-shipping' ); ?></label>
		<input
			type='text'
			class=''
			id='shipping_title'
			name='_was_shipping_method[shipping_title]'
			style='width: 190px;'
			value='<?php echo esc_attr( $shipping_title ); ?>' placeholder='<?php _e( 'E.g. Expedited shipping', 'woocommerce-advanced-shipping' ); ?>'
		>
	</p>


	<p class='was-option'>
		<label for='cost'><?php _e( 'Shipping cost', 'woocommerce-advanced-shipping' ); ?></label>
		<span class='wpc-currency'><?php echo get_woocommerce_currency_symbol(); ?></span>
		<input
			type='text'
			step='any'
			class='wc_input_price'
			id='cost'
			name='_was_shipping_method[shipping_cost]'
			value='<?php echo esc_attr( wc_format_localized_price( $shipping_cost ) ); ?>'
			placeholder='<?php _e( 'Shipping cost', 'woocommerce-advanced-shipping' ); ?>'>
	</p>


	<p class='was-option'>
		<label for='handling_fee'><?php _e( 'Handling fee', 'woocommerce-advanced-shipping' ); ?></label>
		<span class='wpc-currency'><?php echo get_woocommerce_currency_symbol(); ?></span>
		<input
			type='text'
			class='wc_input_price'
			id='handling_fee'
			name='_was_shipping_method[handling_fee]'
			value='<?php echo esc_attr( wc_format_localized_price( $handling_fee ) ); ?>'
			placeholder='<?php _e( 'Fixed or percentage', 'woocommerce-advanced-shipping' ); ?>'
		><img class='help_tip' src='<?php echo WC()->plugin_url(); ?>/assets/images/help.png' height='16' width='16' data-tip="<?php _e( 'A fixed amount (e.g. 5) or percentage (e.g. 5%) which will always be charged.', 'woocommerce-advanced-shipping' ); ?>">
	</p>


	<p class='was-option'>
		<label for='cost-per-item'><?php _e( 'Cost per item', 'woocommerce-advanced-shipping' ); ?></label>
		<span class='wpc-currency'><?php echo get_woocommerce_currency_symbol(); ?></span>
		<input
			type='text'
			class='wc_input_price'
			id='cost-per-item'
			name='_was_shipping_method[cost_per_item]'
			value='<?php echo esc_attr( wc_format_localized_price( $cost_per_item ) ); ?>'
			placeholder='<?php _e( 'Fixed or percentage', 'woocommerce-advanced-shipping' ); ?>'
		><img class='help_tip' src='<?php echo WC()->plugin_url(); ?>/assets/images/help.png' height='16' width='16' data-tip="<?php _e( 'Add a fee for each item that is in the cart. <br/>Quantity is also calculated', 'woocommerce-advanced-shipping' ); ?>">
	</p>


	<p class='was-option'>
		<label for='cost-per-weight'><?php _e( 'Cost per weight', 'woocommerce-advanced-shipping' ); ?> (<?php echo get_option( 'woocommerce_weight_unit' ); ?>)</label>
		<span class='wpc-currency'><?php echo get_woocommerce_currency_symbol(); ?></span>
		<input
			type='text'
			class='wc_input_price'
			id='cost-per-weight'
			name='_was_shipping_method[cost_per_weight]'
			value='<?php echo esc_attr( wc_format_localized_price( $cost_per_weight ) ); ?>'
			placeholder='<?php _e( '0', 'woocommerce-advanced-shipping' ); ?>'
		><img class='help_tip' src='<?php echo WC()->plugin_url(); ?>/assets/images/help.png' height='16' width='16' data-tip="<?php echo sprintf( __( 'Add a fee multiplied by the amount of %s', 'woocommerce-advanced-shipping' ), get_option( 'woocommerce_weight_unit' ) ); ?>">
	</p>


	<p class='was-option'>
		<label for='tax'><?php _e( 'Tax status', 'woocommerce-advanced-shipping' ); ?></label>
		<select name='_was_shipping_method[tax]' style='width: 189px;'>
			<option value='taxable' <?php selected( $tax, 'taxable' ); ?>><?php _e( 'Taxable', 'woocommerce-advanced-shipping' ); ?></option>
			<option value='not_taxable' <?php selected( $tax, 'not_taxable' ); ?>><?php _e( 'Not taxable', 'woocommerce-advanced-shipping' ); ?></option>
		</select>
	</p><?php

	do_action( 'was_after_meta_box_settings', compact( 'shipping_title', 'shipping_cost', 'handling_fee', 'cost_per_item', 'cost_per_weight', 'tax' ), $this );

?></div>
