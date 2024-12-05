<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class WAS_Match_Conditions.
 *
 * The WAS Match Conditions class handles the matching rules for Shipping methods.
 *
 * @class		WAS_Match_Conditions
 * @author		Jeroen Sormani
 * @package 	WooCommerce Advanced Shipping
 * @version	1.0.0
 */
class WAS_Match_Conditions {


	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		add_filter( 'was_match_condition_subtotal', array( $this, 'was_match_condition_subtotal' ), 10, 4 );
		add_filter( 'was_match_condition_subtotal_ex_tax', array( $this, 'was_match_condition_subtotal_ex_tax' ), 10, 4 );
		add_filter( 'was_match_condition_tax', array( $this, 'was_match_condition_tax' ), 10, 4 );
		add_filter( 'was_match_condition_quantity', array( $this, 'was_match_condition_quantity' ), 10, 4 );
		add_filter( 'was_match_condition_contains_product', array( $this, 'was_match_condition_contains_product' ), 10, 4 );
		add_filter( 'was_match_condition_weight', array( $this, 'was_match_condition_weight' ), 10, 4 );
		add_filter( 'was_match_condition_contains_shipping_class', array( $this, 'was_match_condition_contains_shipping_class' ), 10, 4 );

		add_filter( 'was_match_condition_zipcode', array( $this, 'was_match_condition_zipcode' ), 10, 4 );

	}


	/**
	 * Use WPC Condition with filtered value.
	 */
	public function was_match_condition_subtotal( $match, $operator, $value, $package ) {
		// WPML multi-currency support
		$value = apply_filters( 'wcml_shipping_price_amount', $value );

		$condition = wpc_get_condition( 'subtotal' );
		return $condition->match( $match, $operator, $value );
	}


	/**
	 * Use WPC Condition with filtered value.
	 */
	public function was_match_condition_subtotal_ex_tax( $match, $operator, $value, $package ) {
		// WPML multi-currency support
		$value = apply_filters( 'wcml_shipping_price_amount', $value );

		$condition = wpc_get_condition( 'subtotal_ex_tax' );
		return $condition->match( $match, $operator, $value );
	}


	/**
	 * Use WPC Condition with filtered value.
	 */
	public function was_match_condition_tax( $match, $operator, $value, $package ) {
		// WPML multi-currency support
		$value = apply_filters( 'wcml_shipping_price_amount', $value );

		$condition = wpc_get_condition( 'tax' );
		return $condition->match( $match, $operator, $value );
	}


	/**
	 * Quantity.
	 *
	 * Match the condition value against the cart quantity.
	 * This also includes product quantities.
	 *
	 * @since 1.0.0
	 *
	 * @param  bool   $match    Current match value.
	 * @param  string $operator Operator selected by the user in the condition row.
	 * @param  mixed  $value    Value given by the user in the condition row.
	 * @param  array  $package  List of shipping package details.
	 * @return BOOL             Matching result, TRUE if results match, otherwise FALSE.
	 */
	public function was_match_condition_quantity( $match, $operator, $value, $package ) {

		$quantity = 0;
		foreach ( $package['contents'] as $item_key => $item ) :
			$quantity += $item['quantity'];
		endforeach;

		if ( '==' == $operator ) :
			$match = ( $quantity == $value );
		elseif ( '!=' == $operator ) :
			$match = ( $quantity != $value );
		elseif ( '>=' == $operator ) :
			$match = ( $quantity >= $value );
		elseif ( '<=' == $operator ) :
			$match = ( $quantity <= $value );
		endif;

		return $match;

	}


	/**
	 * Contains product.
	 *
	 * Matches if the condition value product is in the cart.
	 *
	 * @since 1.0.0
	 *
	 * @param  bool   $match    Current match value.
	 * @param  string $operator Operator selected by the user in the condition row.
	 * @param  mixed  $value    Value given by the user in the condition row.
	 * @param  array  $package  List of shipping package details.
	 * @return BOOL             Matching result, TRUE if results match, otherwise FALSE.
	 */
	public function was_match_condition_contains_product( $match, $operator, $value, $package ) {

		$value       = apply_filters( 'wpml_object_id', $value, 'product', true );
		$product_ids = array();
		foreach ( $package['contents'] as $product ) :
			$product_ids[] = apply_filters( 'wpml_object_id', $product['product_id'], 'product', true );

			if ( isset( $product['variation_id'] ) && $product['variation_id'] ) {
				$product_ids[] = apply_filters( 'wpml_object_id', $product['product_id'], 'product', true );
			}
		endforeach;

		if ( '==' == $operator ) :
			$match = ( in_array( $value, $product_ids ) );
		elseif ( '!=' == $operator ) :
			$match = ( ! in_array( $value, $product_ids ) );
		endif;

		return $match;

	}


	/**
	 * Weight.
	 *
	 * Match the condition value against the cart weight.
	 *
	 * @since 1.0.0
	 *
	 * @param  bool   $match    Current match value.
	 * @param  string $operator Operator selected by the user in the condition row.
	 * @param  mixed  $value    Value given by the user in the condition row.
	 * @param  array  $package  List of shipping package details.
	 * @return BOOL             Matching result, TRUE if results match, otherwise FALSE.
	 */
	public function was_match_condition_weight( $match, $operator, $value, $package ) {

		$weight = 0;
		foreach ( $package['contents'] as $key => $item ) :
			/** @var $product WC_Product */
			$product = $item['data'];
			$weight += ( (float) $product->get_weight() * (int) $item['quantity'] );
		endforeach;

		// Make sure its formatted correct
		$value = (float) str_replace( ',', '.', $value );

		// #107 - Rounding here due to PHP weirdness. 0.1+0.2 != 0.3 apparently.. :o
		$value  = (float) number_format( $value, 5, '.', '' );
		$weight = (float) number_format( $weight, 5, '.', '' );

		if ( '==' == $operator ) :
			$match = ( $weight == $value );
		elseif ( '!=' == $operator ) :
			$match = ( $weight != $value );
		elseif ( '>=' == $operator ) :
			$match = ( $weight >= $value );
		elseif ( '<=' == $operator ) :
			$match = ( $weight <= $value );
		endif;

		return $match;

	}


	/**
	 * Shipping class.
	 *
	 * Matches if the condition value shipping class is in the cart.
	 *
	 * @since 1.0.1
	 *
	 * @param  bool   $match    Current match value.
	 * @param  string $operator Operator selected by the user in the condition row.
	 * @param  mixed  $value    Value given by the user in the condition row.
	 * @param  array  $package  List of shipping package details.
	 * @return BOOL             Matching result, TRUE if results match, otherwise FALSE.
	 */
	public function was_match_condition_contains_shipping_class( $match, $operator, $value, $package ) {

		// True until proven false
		if ( $operator == '!=' ) :
			$match = true;
		endif;

		$value_term = get_term_by( 'slug', $value, 'product_shipping_class' );
		$value      = apply_filters( 'wpml_object_id', $value_term->term_id ?? null, 'product_shipping_class', true );

		foreach ( $package['contents'] as $key => $product ) :

			$id      = ! empty( $product['variation_id'] ) ? $product['variation_id'] : $product['product_id'];
			$product = wc_get_product( $id );
			$shipping_class_id = apply_filters( 'wpml_object_id', $product->get_shipping_class_id(), 'product_shipping_class', true );

			if ( $operator == '==' ) :
				if ( $shipping_class_id == $value ) :
					return true;
				endif;
			elseif ( $operator == '!=' ) :
				if ( $shipping_class_id == $value ) :
					return false;
				endif;
			endif;

		endforeach;

		return $match;

	}


/******************************************************
 * User conditions
 *****************************************************/


	/**
	 * Zipcode.
	 *
	 * Match the condition value against the users shipping zipcode.
	 *
	 * @since 1.0.0
	 * @since 1.0.9 - Add support for wildcards with asterisk (*)
	 *
	 * @param  bool   $match    Current match value.
	 * @param  string $operator Operator selected by the user in the condition row.
	 * @param  mixed  $value    Value given by the user in the condition row.
	 * @param  array  $package  List of shipping package details.
	 * @return BOOL             Matching result, TRUE if results match, otherwise FALSE.
	 */
	public function was_match_condition_zipcode( $match, $operator, $value, $package ) {

		$user_zipcode = $package['destination']['postcode'];

		// Prepare allowed values.
		$zipcodes = (array) preg_split( '/,+ */', $value );

		// Remove all non- letters and numbers
		foreach ( $zipcodes as $key => $zipcode ) :
			$zipcodes[ $key ] = preg_replace( '/[^0-9a-zA-Z\-\*]/', '', $zipcode );
		endforeach;

		if ( '==' == $operator ) :

			foreach ( $zipcodes as $zipcode ) :

				// @since 1.0.9 - Wildcard support (*)
				if ( strpos( $zipcode, '*' ) !== false ) :

					$user_zipcode = preg_replace( '/[^0-9a-zA-Z]/', '', $user_zipcode );
					$zipcode      = str_replace( '*', '', $zipcode );

					if ( empty( $zipcode ) ) continue;

					$parts = explode( '-', $zipcode );
					if ( count( $parts ) > 1 ) :
						$match = ( $user_zipcode >= min( $parts ) && $user_zipcode <= max( $parts ) );
					else :
						$match = preg_match( '/^' . preg_quote( $zipcode, '/' ) . '/i', $user_zipcode );
					endif;

				else :

					// BC when not using asterisk (wildcard)
					$match = ( (double) $user_zipcode == (double) $zipcode );

				endif;

				if ( $match == true ) {
					return true;
				}

			endforeach;

		elseif ( '!=' == $operator ) :

			// True until proven false
			$match = true;

			foreach ( $zipcodes as $zipcode ) :

				// @since 1.0.9 - Wildcard support (*)
				if ( strpos( $zipcode, '*' ) !== false ) :

					$user_zipcode = preg_replace( '/[^0-9a-zA-Z]/', '', $user_zipcode );
					$zipcode      = str_replace( '*', '', $zipcode );

					if ( empty( $zipcode ) ) continue;

					$parts = explode( '-', $zipcode );
					if ( count( $parts ) > 1 ) :
						$zipcode_match = ( $user_zipcode >= min( $parts ) && $user_zipcode <= max( $parts ) );
					else :
						$zipcode_match = preg_match( '/^' . preg_quote( $zipcode, '/' ) . '/i', $user_zipcode );
					endif;

					if ( $zipcode_match == true ) :
						return $match = false;
					endif;

				else :

					// BC when not using asterisk (wildcard)
					$zipcode_match = ( (double) $user_zipcode == (double) $zipcode );

					if ( $zipcode_match == true ) :
						return $match = false;
					endif;

				endif;

			endforeach;

		elseif ( '>=' == $operator ) :
			$match = ( (double) $user_zipcode >= (double) $value );
		elseif ( '<=' == $operator ) :
			$match = ( (double) $user_zipcode <= (double) $value );
		endif;

		return $match;

	}


}
