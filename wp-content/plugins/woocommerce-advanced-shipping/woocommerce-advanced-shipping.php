<?php
/**
 * Plugin Name:    WooCommerce Advanced Shipping
 * Plugin URI:     https://jeroensormani.com/woocommerce-advanced-shipping/
 * Description:    With Advanced Shipping for WooCommerce setting up conditional shipping rates is easier and more flexible than ever!
 * Version:        1.1.4
 * Author:         Jeroen Sormani
 * Author URI:     https://jeroensormani.com/
 * Text Domain:    woocommerce-advanced-shipping
 * WC requires at least: 7.0
 * WC tested up to:      9.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class WooCommerce_Advanced_Shipping
 *
 * Main WAS class, add filters and handling all other files
 *
 * @class		WooCommerce_Advanced_Shipping
 * @version		1.0.0
 * @author		Jeroen Sormani
 */
class WooCommerce_Advanced_Shipping {


	/**
	 * Version.
	 *
	 * @since 1.0.1
	 * @var string $version Plugin version number.
	 */
	public $version = '1.1.4';


	/**
	 * File.
	 *
	 * @since 1.0.5
	 * @var string $file Plugin __FILE__ path.
	 */
	public $file = __FILE__;


	/**
	 * Instance of WooCommerce_Advanced_Shipping.
	 *
	 * @since 1.0.1
	 * @access private
	 * @var object $instance The instance of WAS.
	 */
	private static $instance;

	/**
	 * @var WAS_Match_Conditions
	 */
	public $matcher;

	/**
	 * @var WAS_Post_Type
	 */
	public $post_type;

	/**
	 * @var WAS_Ajax
	 */
	public $ajax;

	/**
	 * @var WAS_Admin
	 */
	public $admin;

	/**
	 * @var WAS_Advanced_Shipping_Method
	 */
	public $was_method;

	/**
	 * @var WAS_Advanced_Shipping_Method_Legacy
	 */
	public $legacy_method;


	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		// Check if WooCommerce is active
		if ( ! function_exists( 'is_plugin_active' ) ) require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) && ! function_exists( 'WC' ) ) {
			add_action( 'admin_notices', array( $this, 'woocommerce_required_notice' ) );
			return;
		}

		// Initialize plugin parts
		$this->init();

		do_action( 'woocommerce_advanced_shipping_init' );

	}


	/**
	 * Instance.
	 *
	 * An global instance of the class. Used to retrieve the instance
	 * to use on other files/plugins/themes.
	 *
	 * @since 1.0.1
	 *
	 * @return object Instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * Init.
	 *
	 * Initialize plugin parts.
	 *
	 * @since 1.0.1
	 */
	public function init() {

		// Initialize shipping method class
		add_action( 'woocommerce_shipping_init', array( $this, 'init_shipping_method' ) );

		// Add shipping method
		add_filter( 'woocommerce_shipping_methods', array( $this, 'add_shipping_method' ) );

		// Load textdomain
		$this->load_textdomain();

		require_once plugin_dir_path( __FILE__ ) . '/includes/core-functions.php';
		require_once plugin_dir_path( __FILE__ ) . '/libraries/wp-conditions/functions.php';

		/**
		 * Require matching conditions hooks.
		 */
		require_once plugin_dir_path( __FILE__ ) . '/includes/class-was-match-conditions.php';
		$this->matcher = new WAS_Match_Conditions();

		require_once plugin_dir_path( __FILE__ ) . 'includes/class-was-post-type.php';
		$this->post_type = new WAS_Post_Type();

		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			require_once plugin_dir_path( __FILE__ ) . '/includes/class-was-ajax.php';
			$this->ajax = new WAS_Ajax();
		}

		if ( is_admin() ) {
			require_once plugin_dir_path( __FILE__ ) . '/includes/admin/class-was-admin.php';
			$this->admin = new WAS_Admin();
		}

		// Declare HPOS compatibility
		add_action( 'before_woocommerce_init', function () {
			if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
				\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
			}
		} );
	}


	/**
	 * Textdomain.
	 *
	 * Load the textdomain based on WP language.
	 *
	 * @since 1.0.1
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'woocommerce-advanced-shipping', false, basename( dirname( __FILE__ ) ) . '/languages' );
	}


	/**
	 * Add shipping method.
	 *
	 * Configure and add all the shipping methods available.
	 *
	 * @since 1.0.0
	 */
	public function init_shipping_method() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-advanced-shipping-method.php';
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-advanced-shipping-method-legacy.php';
		$this->was_method = new WAS_Advanced_Shipping_Method();
		$this->legacy_method = new WAS_Advanced_Shipping_Method_Legacy();
	}


	/**
	 * Add shipping method.
	 *
	 * Add configured methods to available shipping methods.
	 *
	 * @since 1.0.0
	 *
	 * @param  array $methods List of existing shipping methods.
	 * @return array          List of modified shipping methods.
	 */
	public function add_shipping_method( $methods ) {

		if ( class_exists( 'WAS_Advanced_Shipping_Method' ) ) {
			$methods['advanced_shipping'] = 'WAS_Advanced_Shipping_Method';
		}

		if ( class_exists( 'WAS_Advanced_Shipping_Method_Legacy' ) && apply_filters( 'was_enable_legacy_shipping_rates', true ) ) {
			$methods['advanced_shipping_legacy'] = 'WAS_Advanced_Shipping_Method_Legacy';
		}

		return $methods;

	}


	/**
	 * WooCommerce required notice.
	 *
	 * @since 1.1.0
	 */
	public function woocommerce_required_notice() {
		?><div class='updated'>
			<p><?php echo __( 'Advanced Shipping requires WooCommerce to be activated.', 'woocommerce-advanced-shipping' ); ?></p>
		</div><?php
	}


}


if ( ! function_exists( 'WooCommerce_Advanced_Shipping' ) ) :

	/**
	 * The main function responsible for returning the WooCommerce_Advanced_Shipping object.
	 *
	 * Use this function like you would a global variable, except without needing to declare the global.
	 *
	 * Example: <?php WooCommerce_Advanced_Shipping()->method_name(); ?>
	 *
	 * @since 1.0.1
	 *
	 * @return object WooCommerce_Advanced_Shipping class object.
	 */
	function WooCommerce_Advanced_Shipping() {
		return WooCommerce_Advanced_Shipping::instance();

	}


endif;

// Backwards compatibility
if ( ! function_exists( 'WAS' ) ) :
	function WAS() {
		_deprecated_function( 'WAS', '1.0.14', 'WooCommerce_Advanced_Shipping' );
		return WooCommerce_Advanced_Shipping();

	}
endif;

add_action( 'plugins_loaded', 'WooCommerce_Advanced_Shipping' );
