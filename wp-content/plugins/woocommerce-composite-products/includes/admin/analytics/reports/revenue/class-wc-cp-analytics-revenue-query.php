<?php
/**
 * REST API Reports composites query
 *
 * Class for parameter-based Products Stats Report querying
 *
 * @package  WooCommerce Composite Products
 * @since    8.3.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WC_CP_Analytics_Revenue_Query class.
 *
 * @version 10.2.0
 */
class WC_CP_Analytics_Revenue_Query extends Automattic\WooCommerce\Admin\API\Reports\GenericQuery {

	/**
	 * Valid fields for Products report.
	 *
	 * @return array
	 */
	protected function get_default_query_vars() {
		return array();
	}

	/**
	 * Get product data based on the current query vars.
	 *
	 * @return array
	 */
	public function get_data() {
		$args = apply_filters( 'woocommerce_analytics_composites_query_args', $this->get_query_vars() );

		/* @var WC_CP_Analytics_Revenue_Data_Store $data_store */
		$data_store = WC_Data_Store::load( 'report-composites-revenue' );
		$results    = $data_store->get_data( $args );
		return apply_filters( 'woocommerce_analytics_composites_select_query', $results, $args );
	}
}
