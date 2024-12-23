<?php
/**
 * WCS_ATT_Core_Compatibility class
 *
 * @package  WooCommerce All Products for Subscriptions
 * @since    1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WC Core compatibility functions.
 *
 * @class    WCS_ATT_Core_Compatibility
 * @version  6.0.0
 */
class WCS_ATT_Core_Compatibility {

	/**
	 * Cache 'gte' comparison results.
	 *
	 * @var array
	 */
	private static $is_wc_version_gte = array();

	/**
	 * Cache 'gt' comparison results.
	 *
	 * @var array
	 */
	private static $is_wc_version_gt = array();

	/**
	 * Cache 'gt' comparison results for WP version.
	 *
	 * @since  2.4.3
	 * @var    array
	 */
	private static $is_wp_version_gt = array();

	/**
	 * Cache 'gte' comparison results for WP version.
	 *
	 * @since  2.4.3
	 * @var    array
	 */
	private static $is_wp_version_gte = array();

	/**
	 * Cache wc admin status result.
	 *
	 * @since  3.1.5
	 * @var    bool
	 */
	private static $is_wc_admin_enabled = null;

	/**
	 * Cache subscriptions template directory
	 *
	 * @since  3.2.0
	 * @var    string
	 */
	private static $subscriptions_template_dir = '';

	/**
	 * Current REST request stack.
	 * An array containing WP_REST_Request instances.
	 *
	 * @since 5.0.3
	 *
	 * @var array
	 */
	private static $requests = array();

	/**
	 * Constructor.
	 */
	public static function init() {
		// Save current rest request. Is there a better way to get it?
		add_filter( 'rest_pre_dispatch', array( __CLASS__, 'save_rest_request' ), 10, 3 );
		add_filter( 'woocommerce_hydration_dispatch_request', array( __CLASS__, 'save_hydration_request' ), 10, 2 );
		add_filter( 'rest_request_after_callbacks', array( __CLASS__, 'pop_rest_request' ), PHP_INT_MAX );
		add_filter( 'woocommerce_hydration_request_after_callbacks', array( __CLASS__, 'pop_rest_request' ), PHP_INT_MAX );
	}

	/*
	|--------------------------------------------------------------------------
	| Callbacks.
	|--------------------------------------------------------------------------
	*/

	/**
	 * Pops the current request from the execution stack.
	 *
	 * @since  5.0.3
	 *
	 * @param  WP_REST_Response     $response
	 * @param  WP_REST_Server|array $handler
	 * @param  WP_REST_Request      $request
	 * @return mixed
	 */
	public static function pop_rest_request( $response ) {
		if ( ! empty( self::$requests ) && is_array( self::$requests ) ) {
			array_pop( self::$requests );
		}

		return $response;
	}

	/**
	 * Saves the current hydration request.
	 *
	 * @since  5.0.3
	 *
	 * @param  mixed           $result
	 * @param  WP_REST_Request $request
	 * @return mixed
	 */
	public static function save_hydration_request( $result, $request ) {
		if ( ! is_array( self::$requests ) ) {
			self::$requests = array();
		}

		self::$requests[] = $request;
		return $result;
	}

	/**
	 * Saves the current rest request.
	 *
	 * @since  3.3.2
	 *
	 * @param  mixed           $result
	 * @param  WP_REST_Server  $server
	 * @param  WP_REST_Request $request
	 * @return mixed
	 */
	public static function save_rest_request( $result, $server, $request ) {
		if ( ! is_array( self::$requests ) ) {
			self::$requests = array();
		}

		self::$requests[] = $request;
		return $result;
	}

	/*
	|--------------------------------------------------------------------------
	| WC version getters.
	|--------------------------------------------------------------------------
	*/

	/**
	 * Helper method to get the version of the currently installed WooCommerce
	 *
	 * @since  1.0.0
	 * @return string woocommerce version number or null
	 */
	private static function get_wc_version() {
		return defined( 'WC_VERSION' ) && WC_VERSION ? WC_VERSION : null;
	}

	/**
	 * Returns true if the installed version of WooCommerce is greater than or equal to $version.
	 *
	 * @since  2.0.0
	 *
	 * @param  string $version
	 * @return boolean
	 */
	public static function is_wc_version_gte( $version ) {
		if ( ! isset( self::$is_wc_version_gte[ $version ] ) ) {
			self::$is_wc_version_gte[ $version ] = self::get_wc_version() && version_compare( self::get_wc_version(), $version, '>=' );
		}
		return self::$is_wc_version_gte[ $version ];
	}

	/**
	 * Returns true if the installed version of WooCommerce is greater than $version.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $version
	 * @return boolean
	 */
	public static function is_wc_version_gt( $version ) {
		if ( ! isset( self::$is_wc_version_gt[ $version ] ) ) {
			self::$is_wc_version_gt[ $version ] = self::get_wc_version() && version_compare( self::get_wc_version(), $version, '>' );
		}
		return self::$is_wc_version_gt[ $version ];
	}

	/**
	 * Returns true if the installed version of WooCommerce is greater than or equal to $version.
	 *
	 * @since  2.4.3
	 *
	 * @param  string $version
	 * @return boolean
	 */
	public static function is_wp_version_gt( $version ) {
		if ( ! isset( self::$is_wp_version_gt[ $version ] ) ) {
			global $wp_version;
			self::$is_wp_version_gt[ $version ] = $wp_version && version_compare( WCS_ATT()->plugin_version( true, $wp_version ), $version, '>=' );
		}
		return self::$is_wp_version_gt[ $version ];
	}

	/**
	 * Returns true if the installed version of WooCommerce is greater than or equal to $version.
	 *
	 * @since  2.4.3
	 *
	 * @param  string $version
	 * @return boolean
	 */
	public static function is_wp_version_gte( $version ) {
		if ( ! isset( self::$is_wp_version_gte[ $version ] ) ) {
			global $wp_version;
			self::$is_wp_version_gte[ $version ] = $wp_version && version_compare( WCS_ATT()->plugin_version( true, $wp_version ), $version, '>=' );
		}
		return self::$is_wp_version_gte[ $version ];
	}

	/*
	|--------------------------------------------------------------------------
	| Utilities.
	|--------------------------------------------------------------------------
	*/

	/**
	 * Returns true if the WC Admin feature is installed and enabled.
	 *
	 * @since  3.1.5
	 *
	 * @return boolean
	 */
	public static function is_wc_admin_enabled() {

		if ( is_null( self::$is_wc_admin_enabled ) ) {

			$enabled = false;

			if ( function_exists( 'wc_admin_connect_page' ) ) {

				$enabled = true;
				if ( apply_filters( 'woocommerce_admin_disabled', false ) ) {
					$enabled = false;
				}
			}

			self::$is_wc_admin_enabled = $enabled;
		}

		return self::$is_wc_admin_enabled;
	}

	/**
	 * Returns the directory where WooCommerce Subscriptions template files exist.
	 *
	 * @since  3.2.0
	 *
	 * @return string
	 */
	public static function get_subscriptions_template_directory() {

		if ( empty( self::$subscriptions_template_dir ) ) {

			if ( class_exists( 'WC_Subscriptions_Core_Plugin' ) ) {
				self::$subscriptions_template_dir = WC_Subscriptions_Core_Plugin::instance()->get_subscriptions_core_directory( 'templates/' );
			} else {
				self::$subscriptions_template_dir = plugin_dir_path( WC_Subscriptions::$plugin_file ) . 'templates/';
			}
		}
		return self::$subscriptions_template_dir;
	}

	/**
	 * Wrapper for 'get_parent_id' with fallback to 'get_id'.
	 *
	 * @since  2.0.0
	 *
	 * @param  WC_Product $product
	 * @return mixed
	 */
	public static function get_product_id( $product ) {
		$parent_id = $product->get_parent_id();
		return $parent_id ? $parent_id : $product->get_id();
	}

	/**
	 * Wrapper for 'WC_Product_Factory::get_product_type'.
	 *
	 * @since  2.0.0
	 *
	 * @param  mixed $product_id
	 * @return mixed
	 */
	public static function get_product_type( $product_id ) {
		$product_type = false;
		if ( $product_id ) {
			$product_type = WC_Product_Factory::get_product_type( $product_id );
		}
		return $product_type;
	}

	/**
	 * Get formatted screen id.
	 *
	 * @since  3.1.20
	 *
	 * @param  string $key
	 * @return string
	 */
	public static function get_formatted_screen_id( $screen_id ) {

		$prefix = sanitize_title( __( 'WooCommerce', 'woocommerce' ) );
		if ( 0 === strpos( $screen_id, 'woocommerce_' ) ) {
			$screen_id = str_replace( 'woocommerce_', $prefix . '_', $screen_id );
		}

		return $screen_id;
	}


	/**
	 * Whether this is a Store/REST API request.
	 *
	 * @since  3.3.2
	 *
	 * @return boolean
	 */
	public static function is_api_request() {
		return self::is_store_api_request() || self::is_rest_api_request();
	}

	/**
	 * Returns the current Store/REST API request or false.
	 *
	 * @since  3.3.2
	 *
	 * @return WP_REST_Request|false
	 */
	public static function get_api_request() {
		if ( empty( self::$requests ) || ! is_array( self::$requests ) ) {
			return false;
		}

		return end( self::$requests );
	}

	/**
	 * Whether this is a Store API request.
	 *
	 * @since  3.3.2
	 *
	 * @param  string $route
	 * @return boolean
	 */
	public static function is_store_api_request( $route = '' ) {

		// Check the request URI.
		$request = self::get_api_request();

		if ( false !== $request && strpos( $request->get_route(), 'wc/store' ) !== false ) {
			if ( '' === $route || strpos( $request->get_route(), $route ) !== false ) {
				return true;
			}
		}

		return false;
	}
}
