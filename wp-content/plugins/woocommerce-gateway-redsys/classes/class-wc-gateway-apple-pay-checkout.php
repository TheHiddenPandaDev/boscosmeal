<?php
/**
 * Apple Pay Gateway
 *
 * @package WooCommerce Redsys Gateway
 * @since 23.0.0
 * @author José Conti.
 * @link https://joseconti.com
 * @link https://plugins.joseconti.com
 * @link https://woocommerce.com/products/redsys-gateway/
 * @license GNU General Public License v3.0
 * @license URI: http://www.gnu.org/licenses/gpl-3.0.html
 * @copyright 2013-2024 José Conti.
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_Gateway_Google_Pay_Checkout class.
 *
 * @extends WC_Payment_Gateway
 */
class WC_Gateway_Apple_Pay_Checkout extends WC_Payment_Gateway {

	/**
	 * The ID of the gateway.
	 *
	 * @var string
	 */
	public $id;

	/**
	 * The icon of the gateway.
	 *
	 * @var string
	 */
	public $icon;

	/**
	 * Indicates if the gateway has fields.
	 *
	 * @var bool
	 */
	public $has_fields;

	/**
	 * The live URL for the gateway.
	 *
	 * @var string
	 */
	public $liveurl;

	/**
	 * The test URL for the gateway.
	 *
	 * @var string
	 */
	public $testurl;

	/**
	 * The test SHA256 for the gateway.
	 *
	 * @var string
	 */
	public $testsha256;

	/**
	 * Indicates if the gateway is in test mode.
	 *
	 * @var bool
	 */
	public $testmode;

	/**
	 * The title of the gateway.
	 *
	 * @var string
	 */
	public $method_title;

	/**
	 * The description of the gateway.
	 *
	 * @var string
	 */
	public $method_description;

	/**
	 * Indicates if the gateway does not use HTTPS.
	 *
	 * @var bool
	 */
	public $not_use_https;

	/**
	 * The notify URL for the gateway.
	 *
	 * @var string
	 */
	public $notify_url;

	/**
	 * The notify URL without HTTPS for the gateway.
	 *
	 * @var string
	 */
	public $notify_url_not_https;

	/**
	 * The merchant ID for the gateway.
	 *
	 * @var string
	 */
	public $g_merchant_id;

	/**
	 * The XPay type for the gateway.
	 *
	 * @var string
	 */
	public $xpay_type;

	/**
	 * The XPay origin for the gateway.
	 *
	 * @var string
	 */
	public $xpay_origen;

	/**
	 * The title of the gateway.
	 *
	 * @var string
	 */
	public $title;

	/**
	 * The description of the gateway.
	 *
	 * @var string
	 */
	public $description;

	/**
	 * The customer for the gateway.
	 *
	 * @var string
	 */
	public $customer;

	/**
	 * The commerce name for the gateway.
	 *
	 * @var string
	 */
	public $commercename;

	/**
	 * The terminal for the gateway.
	 *
	 * @var string
	 */
	public $terminal;

	/**
	 * The secret SHA256 for the gateway.
	 *
	 * @var string
	 */
	public $secretsha256;

	/**
	 * The custom test SHA256 for the gateway.
	 *
	 * @var string
	 */
	public $customtestsha256;

	/**
	 * The Redsys language for the gateway.
	 *
	 * @var string
	 */
	public $redsyslanguage;

	/**
	 * Indicates if the gateway is in debug mode.
	 *
	 * @var bool
	 */
	public $debug;

	/**
	 * Indicates if the gateway is for testing purposes.
	 *
	 * @var bool
	 */
	public $testforuser;

	/**
	 * The user ID for testing purposes.
	 *
	 * @var int
	 */
	public $testforuserid;

	/**
	 * The checkout button text for the gateway.
	 *
	 * @var string
	 */
	public $buttoncheckout;

	/**
	 * The button background color for the gateway.
	 *
	 * @var string
	 */
	public $butonbgcolor;

	/**
	 * The button text color for the gateway.
	 *
	 * @var string
	 */
	public $butontextcolor;

	/**
	 * The description of the gateway for Redsys.
	 *
	 * @var string
	 */
	public $descripredsys;

	/**
	 * Indicates if the gateway should be shown for testing purposes.
	 *
	 * @var bool
	 */
	public $testshowgateway;

	/**
	 * The merchant ID PEM for the gateway.
	 *
	 * @var string
	 */
	public $merchant_id_pem;

	/**
	 * The merchant ID key for the gateway.
	 *
	 * @var string
	 */
	public $merchant_id_key;

	/**
	 * The log for the gateway.
	 *
	 * @var string
	 */
	public $log;

	/**
	 * The supported features for the gateway.
	 *
	 * @var array
	 */
	public $supports;

	/**
	 * Indicates if the gateway is enabled.
	 *
	 * @var bool
	 */
	public $enabled;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->id = 'applepayredsys';
		if ( ! empty( WCRed()->get_redsys_option( 'logo', 'applepayredsys' ) ) ) {
			$logo_url   = WCRed()->get_redsys_option( 'logo', 'applepayredsys' );
			$this->icon = apply_filters( 'woocommerce_' . $this->id . '_iconn', $logo_url );
		} else {
			$this->icon = apply_filters( 'woocommerce_' . $this->id . '_icon', REDSYS_PLUGIN_URL_P . 'assets/images/apple-pay.svg' );
		}
		$this->has_fields           = true;
		$this->liveurl              = 'https://sis.redsys.es/sis/rest/trataPeticionREST';
		$this->testurl              = 'https://sis-t.redsys.es:25443/sis/rest/trataPeticionREST';
		$this->testsha256           = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';
		$this->testmode             = WCRed()->get_redsys_option( 'testmode', 'applepayredsys' );
		$this->method_title         = __( 'Apple Pay Checkout (by José Conti)', 'woocommerce-redsys' );
		$this->method_description   = __( 'Apple Pay Checkout adding the Gpay Button in the checkout.', 'woocommerce-redsys' );
		$this->not_use_https        = WCRed()->get_redsys_option( 'not_use_https', 'applepayredsys' );
		$this->notify_url           = add_query_arg( 'wc-api', 'WC_Gateway_' . $this->id, home_url( '/' ) );
		$this->notify_url_not_https = str_replace( 'https:', 'http:', add_query_arg( 'wc-api', 'WC_Gateway_' . $this->id, home_url( '/' ) ) );
		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();
		// Define user set variables.
		$this->g_merchant_id    = WCRed()->get_redsys_option( 'g_merchant_id', 'applepayredsys' );
		$this->xpay_type        = 'Apple';
		$this->xpay_origen      = 'WEB';
		$this->title            = WCRed()->get_redsys_option( 'title', 'applepayredsys' );
		$this->description      = WCRed()->get_redsys_option( 'description', 'applepayredsys' );
		$this->customer         = WCRed()->get_redsys_option( 'customer', 'applepayredsys' );
		$this->commercename     = WCRed()->get_redsys_option( 'commercename', 'applepayredsys' );
		$this->terminal         = WCRed()->get_redsys_option( 'terminal', 'applepayredsys' );
		$this->secretsha256     = WCRed()->get_redsys_option( 'secretsha256', 'applepayredsys' );
		$this->customtestsha256 = WCRed()->get_redsys_option( 'customtestsha256', 'applepayredsys' );
		$this->redsyslanguage   = WCRed()->get_redsys_option( 'redsyslanguage', 'applepayredsys' );
		$this->debug            = WCRed()->get_redsys_option( 'debug', 'applepayredsys' );
		$this->testforuser      = WCRed()->get_redsys_option( 'testforuser', 'applepayredsys' );
		$this->testforuserid    = WCRed()->get_redsys_option( 'testforuserid', 'applepayredsys' );
		$this->buttoncheckout   = WCRed()->get_redsys_option( 'buttoncheckout', 'applepayredsys' );
		$this->butonbgcolor     = WCRed()->get_redsys_option( 'butonbgcolor', 'applepayredsys' );
		$this->butontextcolor   = WCRed()->get_redsys_option( 'butontextcolor', 'applepayredsys' );
		$this->descripredsys    = WCRed()->get_redsys_option( 'descripredsys', 'applepayredsys' );
		$this->testshowgateway  = WCRed()->get_redsys_option( 'testshowgateway', 'applepayredsys' );
		$this->merchant_id_pem  = WCRed()->get_redsys_option( 'merchant_id_pem', 'applepayredsys' );
		$this->merchant_id_key  = WCRed()->get_redsys_option( 'merchant_id_key', 'applepayredsys' );
		$this->supports         = array(
			'products',
			'refunds',
		);
		add_action( 'valid_' . $this->id . '_standard_ipn_request', array( $this, 'successful_request' ) );

		add_action( 'woocommerce_receipt_' . $this->id, array( $this, 'receipt_page' ) );
		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );

		// Payment listener/API hook.
		add_action( 'woocommerce_api_wc_gateway_' . $this->id, array( $this, 'check_ipn_response' ) );

		// Apple Pay JS.
		add_action( 'wp_enqueue_scripts', array( $this, 'load_apple_pay_js' ) );

		// Save checkout data form Apple Pay.
		add_action( 'woocommerce_checkout_update_order_meta', array( $this, 'save_field_update_order_meta' ) );

		if ( ! $this->is_valid_for_use() ) {
			$this->enabled = false;
		}
	}
	/**
	 * Check if this gateway is enabled and available with the current currency.
	 *
	 * @return bool
	 */
	public function is_valid_for_use() {
		if ( ! in_array( get_woocommerce_currency(), WCRed()->allowed_currencies(), true ) ) {
			return false;
		} else {
			return true;
		}
	}
	/**
	 * Admin Panel Options
	 *
	 * @since 6.0.0
	 */
	public function admin_options() {
		?>
		<h3><?php esc_html_e( 'Apple Pay', 'woocommerce-redsys' ); ?></h3>
		<p><?php esc_html_e( 'Apple Pay works by Showing an Apple Pay buttom at Checkout', 'woocommerce-redsys' ); ?></p>
		<?php
		WCRed()->return_help_notice();
		if ( class_exists( 'SitePress' ) ) {
			?>
			<div class="updated fade"><h4><?php esc_html_e( 'Attention! WPML detected.', 'woocommerce-redsys' ); ?></h4>
				<p><?php esc_html_e( 'The Gateway will be shown in the customer language. The option "Language Gateway" is not taken into consideration', 'woocommerce-redsys' ); ?></p>
			</div>
		<?php } ?>
		<?php if ( $this->is_valid_for_use() ) : ?>
			<table class="form-table">
				<?php
				// Generate the HTML For the settings form.
				$this->generate_settings_html();
				?>
			</table><!--/.form-table-->
			<?php
			else :
				$currencies          = WCRed()->allowed_currencies();
				$formated_currencies = '';

				foreach ( $currencies as $currency ) {
					$formated_currencies .= $currency . ', ';
				}
				?>
				<div class="inline error"><p><strong><?php esc_html_e( 'Gateway Disabled', 'woocommerce-redsys' ); ?></strong>: 
				<?php
				esc_html_e( 'Servired/RedSys only support ', 'woocommerce-redsys' );
				echo esc_html( $formated_currencies );
				?>
		</p></div>
				<?php
			endif;
	}
	/**
	 * Initialise Gateway Settings Form Fields
	 *
	 * @return void
	 */
	public function init_form_fields() {

		$options    = array();
		$selections = (array) WCRed()->get_redsys_option( 'testforuserid', 'applepayredsys' );

		if ( count( $selections ) !== 0 ) {
			foreach ( $selections as $user_id ) {
				if ( ! empty( $user_id ) ) {
					$user_data  = get_userdata( $user_id );
					$user_email = $user_data->user_email;
					if ( ! empty( esc_html( $user_email ) ) ) {
						$options[ esc_html( $user_id ) ] = esc_html( $user_email );
					}
				}
			}
		}

		$options_show    = array();
		$selections_show = (array) WCRed()->get_redsys_option( 'testshowgateway', 'applepayredsys' );
		if ( count( $selections_show ) !== 0 ) {
			foreach ( $selections_show as $user_id ) {
				if ( ! empty( $user_id ) ) {
					$user_data  = get_userdata( $user_id );
					$user_email = $user_data->user_email;
					if ( ! empty( esc_html( $user_email ) ) ) {
						$options_show[ esc_html( $user_id ) ] = esc_html( $user_email );
					}
				}
			}
		}

		$this->form_fields = array(
			'enabled'          => array(
				'title'   => __( 'Enable/Disable', 'woocommerce-redsys' ),
				'type'    => 'checkbox',
				'label'   => __( 'Enable Apple Pay', 'woocommerce-redsys' ),
				'default' => 'no',
			),
			'title'            => array(
				'title'       => __( 'Title', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce-redsys' ),
				'default'     => __( 'Apple Pay', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'description'      => array(
				'title'       => __( 'Description', 'woocommerce-redsys' ),
				'type'        => 'textarea',
				'description' => __( 'This controls the description which the user sees during checkout.', 'woocommerce-redsys' ),
				'default'     => __( 'Pay via Apple Pay With your Apple ID.', 'woocommerce-redsys' ),
			),
			'logo'             => array(
				'title'       => __( 'Gateway logo at checkout', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Add link to image logo for Gateway at checkout.', 'woocommerce-redsys' ),
			),
			'g_merchant_id'    => array(
				'title'       => __( 'Apple MerchantID Identifier', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Ex: merchant.com.tusitio.wwww', 'woocommerce-redsys' ),
			),
			'merchant_id_pem'  => array(
				'title'       => __( 'FULL Path to merchant_id.pem', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Ex: /home/account/public_html/wp-content/random-name-434934/merchant_id.pem', 'woocommerce-redsys' ),
			),
			'merchant_id_key'  => array(
				'title'       => __( 'FULL Path to merchant_id.key', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Ex: /home/account/public_html/wp-content/random-name-434934/merchant_id.key', 'woocommerce-redsys' ),
			),
			'customer'         => array(
				'title'       => __( 'Commerce number (FUC)', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Commerce number (FUC) provided by your bank.', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'commercename'     => array(
				'title'       => __( 'Commerce Name', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'WARNING: This field es mandatory with Apple Pay', 'woocommerce-redsys' ),
			),
			'terminal'         => array(
				'title'       => __( 'Terminal number', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Terminal number provided by your bank.', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'descripredsys'    => array(
				'title'       => __( 'Redsys description', 'woocommerce-redsys' ),
				'type'        => 'select',
				'description' => __( 'Chose what to show in Redsys as description.', 'woocommerce-redsys' ),
				'default'     => 'order',
				'options'     => array(
					'order' => __( 'Order ID', 'woocommerce-redsys' ),
					'id'    => __( 'List of products ID', 'woocommerce-redsys' ),
					'name'  => __( 'List of products name', 'woocommerce-redsys' ),
					'sku'   => __( 'List of products SKU', 'woocommerce-redsys' ),
				),
			),
			'not_use_https'    => array(
				'title'       => __( 'HTTPS SNI Compatibility', 'woocommerce-redsys' ),
				'type'        => 'checkbox',
				'label'       => __( 'Activate SNI Compatibility.', 'woocommerce-redsys' ),
				'default'     => 'no',
				'description' => sprintf( __( 'If you are using HTTPS and Redsys don\'t support your certificate, example Lets Encrypt, you can deactivate HTTPS notifications. WARNING: If you are forcing redirection to HTTPS with htaccess, you need to add an exception for notification URL', 'woocommerce-redsys' ) ),
			),
			'secretsha256'     => array(
				'title'       => __( 'Encryption secret passphrase SHA-256', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Encryption secret passphrase SHA-256 provided by your bank.', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'customtestsha256' => array(
				'title'       => __( 'TEST MODE: Encryption secret passphrase SHA-256', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Encryption secret passphrase SHA-256 provided by your bank for test mode.', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'testmode'         => array(
				'title'       => __( 'Running in test mode', 'woocommerce-redsys' ),
				'type'        => 'checkbox',
				'label'       => __( 'Running in test mode', 'woocommerce-redsys' ),
				'default'     => 'yes',
				'description' => sprintf( __( 'This is here for Apple Pay testing proupouse, but Apple Pay dont work with Redsys Test Terminal .', 'woocommerce-redsys' ) ),
			),
			'testshowgateway'  => array(
				'title'       => __( 'Show to this users', 'woocommerce-redsys' ),
				'type'        => 'multiselect',
				'label'       => __( 'Show the gateway in the chcekout when it is in test mode', 'woocommerce-redsys' ),
				'class'       => 'js-woo-show-gateway-test-settings',
				'id'          => 'woocommerce_redsys_showtestforuserid',
				'options'     => $options_show,
				'default'     => '',
				'description' => sprintf( __( 'Select users that will see the gateway when it is in test mode. If no users are selected, will be shown to all users', 'woocommerce-redsys' ) ),
			),
			'testforuser'      => array(
				'title'       => __( 'Running in test mode for a user', 'woocommerce-redsys' ),
				'type'        => 'checkbox',
				'label'       => __( 'Running in test mode for a user', 'woocommerce-redsys' ),
				'default'     => 'yes',
				'description' => sprintf( __( 'The user selected below will use the terminal in test mode. Other users will continue to use live mode unless you have the "Running in test mode" option checked.', 'woocommerce-redsys' ) ),
			),
			'testforuserid'    => array(
				'title'       => __( 'Users', 'woocommerce-redsys' ),
				'type'        => 'multiselect',
				'label'       => __( 'Users running in test mode', 'woocommerce-redsys' ),
				'class'       => 'js-woo-allowed-users-settings',
				'id'          => 'woocommerce_redsys_testforuserid',
				'options'     => $options,
				'default'     => '',
				'description' => sprintf( __( 'Select users running in test mode', 'woocommerce-redsys' ) ),
			),
			'debug'            => array(
				'title'       => __( 'Debug Log', 'woocommerce-redsys' ),
				'type'        => 'checkbox',
				'label'       => __( 'Enable logging', 'woocommerce-redsys' ),
				'default'     => 'no',
				'description' => __( 'Log Apple Pay events, such as notifications requests, inside <code>WooCommerce > Status > Logs > applepayredsys-{date}-{number}.log</code>', 'woocommerce-redsys' ),
			),
		);
	}
	/**
	 * Check if this gateway is enabled in test mode for a user
	 *
	 * @param int $userid User ID.
	 *
	 * @return bool
	 */
	public function check_user_test_mode( $userid ) {

		$usertest_active = $this->testforuser;
		$selections      = (array) WCRed()->get_redsys_option( 'testforuserid', 'applepayredsys' );
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', '/****************************/' );
			WCRed()->log( 'applepayredsys', '     Checking user test       ' );
			WCRed()->log( 'applepayredsys', '/****************************/' );
			WCRed()->log( 'applepayredsys', ' ' );
		}

		if ( 'yes' === $usertest_active ) {

			if ( ! empty( $selections ) ) {
				foreach ( $selections as $user_id ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'applepayredsys', ' ' );
						WCRed()->log( 'applepayredsys', '/****************************/' );
						WCRed()->log( 'applepayredsys', '   Checking user ' . $userid );
						WCRed()->log( 'applepayredsys', '/****************************/' );
						WCRed()->log( 'applepayredsys', ' ' );
						WCRed()->log( 'applepayredsys', ' ' );
						WCRed()->log( 'applepayredsys', '/****************************/' );
						WCRed()->log( 'applepayredsys', '  User in forach ' . $user_id );
						WCRed()->log( 'applepayredsys', '/****************************/' );
						WCRed()->log( 'applepayredsys', ' ' );
					}
					if ( (string) $user_id === (string) $userid ) {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'applepayredsys', ' ' );
							WCRed()->log( 'applepayredsys', '/****************************/' );
							WCRed()->log( 'applepayredsys', '   Checking user test TRUE    ' );
							WCRed()->log( 'applepayredsys', '/****************************/' );
							WCRed()->log( 'applepayredsys', ' ' );
							WCRed()->log( 'applepayredsys', ' ' );
							WCRed()->log( 'applepayredsys', '/********************************************/' );
							WCRed()->log( 'applepayredsys', '  User ' . $userid . ' is equal to ' . $user_id );
							WCRed()->log( 'applepayredsys', '/********************************************/' );
							WCRed()->log( 'applepayredsys', ' ' );
						}
						return true;
					}
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'applepayredsys', ' ' );
						WCRed()->log( 'applepayredsys', '/****************************/' );
						WCRed()->log( 'applepayredsys', '  Checking user test continue ' );
						WCRed()->log( 'applepayredsys', '/****************************/' );
						WCRed()->log( 'applepayredsys', ' ' );
					}
					continue;
				}
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', '  Checking user test FALSE    ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				return false;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', '  Checking user test FALSE    ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				return false;
			}
		} else {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'applepayredsys', ' ' );
				WCRed()->log( 'applepayredsys', '/****************************/' );
				WCRed()->log( 'applepayredsys', '     User test Disabled.      ' );
				WCRed()->log( 'applepayredsys', '/****************************/' );
				WCRed()->log( 'applepayredsys', ' ' );
			}
			return false;
		}
	}
	/**
	 * Get redsys URL
	 *
	 * @param int  $user_id User ID.
	 * @param bool $type Type.
	 *
	 * @return string
	 */
	public function get_redsys_url_gateway( $user_id, $type = 'rd' ) {

		if ( 'yes' === $this->testmode ) {
			if ( 'rd' === $type ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', '          URL Test RD         ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				$url = $this->testurl;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', '          URL Test WS         ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				$url = $this->testurlws;
			}
		} else {
			$user_test = $this->check_user_test_mode( $user_id );
			if ( $user_test ) {
				if ( 'rd' === $type ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'applepayredsys', ' ' );
						WCRed()->log( 'applepayredsys', '/****************************/' );
						WCRed()->log( 'applepayredsys', '          URL Test RD         ' );
						WCRed()->log( 'applepayredsys', '/****************************/' );
						WCRed()->log( 'applepayredsys', ' ' );
					}
					$url = $this->testurl;
				} else {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'applepayredsys', ' ' );
						WCRed()->log( 'applepayredsys', '/****************************/' );
						WCRed()->log( 'applepayredsys', '          URL Test WS         ' );
						WCRed()->log( 'applepayredsys', '/****************************/' );
						WCRed()->log( 'applepayredsys', ' ' );
					}
					$url = $this->testurlws;
				}
			} elseif ( 'rd' === $type ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', '          URL Live RD         ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				$url = $this->liveurl;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', '          URL Live WS         ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				$url = $this->liveurlws;
			}
		}
		return $url;
	}
	/**
	 * Get the SHA256 key based on the user and test mode.
	 *
	 * @param int $user_id User ID.
	 * @return string The SHA256 key.
	 */
	public function get_redsys_sha256( $user_id ) {
		if ( 'yes' === $this->testmode ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'applepayredsys', ' ' );
				WCRed()->log( 'applepayredsys', '/****************************/' );
				WCRed()->log( 'applepayredsys', '         SHA256 Test.         ' );
				WCRed()->log( 'applepayredsys', '/****************************/' );
				WCRed()->log( 'applepayredsys', ' ' );
			}

			$customtestsha256 = $this->customtestsha256 ? mb_convert_encoding( $this->customtestsha256, 'ISO-8859-1', 'UTF-8' ) : '';
			if ( ! empty( $customtestsha256 ) ) {
				$sha256 = $customtestsha256;
			} else {
				$sha256 = mb_convert_encoding( $this->testsha256, 'ISO-8859-1', 'UTF-8' );
			}
		} else {
			$user_test = $this->check_user_test_mode( $user_id );
			if ( $user_test ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', '      USER SHA256 Test.       ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', ' ' );
				}

				$customtestsha256 = $this->customtestsha256 ? mb_convert_encoding( $this->customtestsha256, 'ISO-8859-1', 'UTF-8' ) : '';
				if ( ! empty( $customtestsha256 ) ) {
					$sha256 = $customtestsha256;
				} else {
					$sha256 = mb_convert_encoding( $this->testsha256, 'ISO-8859-1', 'UTF-8' );
				}
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', '     USER SHA256 NOT Test.    ' );
					WCRed()->log( 'applepayredsys', '/****************************/' );
					WCRed()->log( 'applepayredsys', ' ' );
				}

				$sha256 = mb_convert_encoding( $this->secretsha256, 'ISO-8859-1', 'UTF-8' );
			}
		}
		return $sha256;
	}
	/**
	 * Get redsys Args for passing to PP
	 *
	 * @param WC_Order $order Order object.
	 *
	 * @return array
	 */
	public function get_redsys_args( $order ) {

		$order_id            = $order->get_id();
		$currency_codes      = WCRed()->get_currencies();
		$transaction_id2     = WCRed()->prepare_order_number( $order_id );
		$order_total_sign    = WCRed()->redsys_amount_format( $order->get_total() );
		$transaction_type    = '0';
		$user_id             = $order->get_user_id();
		$secretsha256        = $this->get_redsys_sha256( $user_id );
		$customer            = $this->customer;
		$url_ok              = add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) );
		$product_description = WCRed()->product_description( $order, $this->id );
		$merchant_name       = $this->commercename;
		$currency            = $currency_codes[ get_woocommerce_currency() ];
		$name                = WCRed()->get_order_meta( $order_id, '_billing_first_name', true );
		$lastname            = WCRed()->get_order_meta( $order_id, '_billing_last_name', true );

		if ( class_exists( 'SitePress' ) ) {
			$gatewaylanguage = WCRed()->get_lang_code( ICL_LANGUAGE_CODE );
		} elseif ( $this->redsyslanguage ) {
			$gatewaylanguage = $this->redsyslanguage;
		} else {
			$gatewaylanguage = '001';
		}
		$returnfromredsys   = $order->get_cancel_order_url();
		$dsmerchantterminal = $this->terminal;
		if ( 'yes' === $this->not_use_https ) {
				$final_notify_url = $this->notify_url_not_https;
		} else {
			$final_notify_url = $this->notify_url;
		}

		$gpay_data_send = array(
			'order_total_sign'    => $order_total_sign,
			'transaction_id2'     => $transaction_id2,
			'transaction_type'    => $transaction_type,
			'DSMerchantTerminal'  => $dsmerchantterminal,
			'final_notify_url'    => $final_notify_url,
			'returnfromredsys'    => $returnfromredsys,
			'gatewaylanguage'     => $gatewaylanguage,
			'currency'            => $currency,
			'secretsha256'        => $secretsha256,
			'customer'            => $customer,
			'url_ok'              => $url_ok,
			'product_description' => $product_description,
			'merchant_name'       => $merchant_name,
			'name'                => $name,
			'lastname'            => $lastname,
		);

		if ( has_filter( 'apple_modify_data_to_send' ) ) {

			$gpay_data_send = apply_filters( 'apple_modify_data_to_send', $gpay_data_send );

			if ( 'yes' === $redsys->debug ) {
				WCRed()->log( 'applepayredsys', ' ' );
				WCRed()->log( 'applepayredsys', 'Using filter gpay_modify_data_to_send' );
				WCRed()->log( 'applepayredsys', ' ' );
			}
		}

		if ( 'yes' === $redsys->debug ) {
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', 'Data sent to Gpay, $gpay_data_send: ' . print_r( $gpay_data_send, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'applepayredsys', ' ' );
		}

		// redsys Args.
		$miobj = new WooRedsysAPI();
		$miobj->set_parameter( 'DS_MERCHANT_AMOUNT', $gpay_data_send['order_total_sign'] );
		$miobj->set_parameter( 'DS_MERCHANT_ORDER', $gpay_data_send['transaction_id2'] );
		$miobj->set_parameter( 'DS_MERCHANT_MERCHANTCODE', $gpay_data_send['customer'] );
		$miobj->set_parameter( 'DS_MERCHANT_CURRENCY', $gpay_data_send['currency'] );
		$miobj->set_parameter( 'DS_MERCHANT_TITULAR', WCRed()->clean_data( $gpay_data_send['name'] ) . ' ' . WCRed()->clean_data( $gpay_data_send['lastname'] ) );
		$miobj->set_parameter( 'DS_MERCHANT_TRANSACTIONTYPE', $gpay_data_send['transaction_type'] );
		$miobj->set_parameter( 'DS_MERCHANT_TERMINAL', $gpay_data_send['DSMerchantTerminal'] );
		$miobj->set_parameter( 'DS_MERCHANT_MERCHANTURL', $gpay_data_send['final_notify_url'] );
		$miobj->set_parameter( 'DS_MERCHANT_URLOK', $gpay_data_send['url_ok'] );
		$miobj->set_parameter( 'DS_MERCHANT_URLKO', $gpay_data_send['returnfromredsys'] );
		$miobj->set_parameter( 'DS_MERCHANT_CONSUMERLANGUAGE', $gpay_data_send['gatewaylanguage'] );
		$miobj->set_parameter( 'DS_MERCHANT_PRODUCTDESCRIPTION', WCRed()->clean_data( $gpay_data_send['product_description'] ) );
		$miobj->set_parameter( 'DS_MERCHANT_MERCHANTNAME', $gpay_data_send['merchant_name'] );
		$miobj->set_parameter( 'DS_MERCHANT_PAYMETHODS', 'xpay' );

		$version = 'HMAC_SHA256_V1';
		// Se generan los parámetros de la petición.
		$request      = '';
		$params       = $miobj->create_merchant_parameters();
		$signature    = $miobj->create_merchant_signature( $gpay_data_send['secretsha256'] );
		$order_id_set = $gpay_data_send['transaction_id2'];
		set_transient( 'redsys_signature_' . sanitize_text_field( $order_id_set ), $gpay_data_send['secretsha256'], 3600 );
		$redsys_args = array(
			'Ds_SignatureVersion'   => $version,
			'Ds_MerchantParameters' => $params,
			'Ds_Signature'          => $signature,
		);
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'applepayredsys', 'Generating payment form for order ' . $order->get_order_number() . '. Sent data: ' . print_r( $redsys_args, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'applepayredsys', 'Helping to understand the encrypted code: ' );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_AMOUNT: ' . $gpay_data_send['order_total_sign'] );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_ORDER: ' . $gpay_data_send['transaction_id2'] );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_TITULAR: ' . WCRed()->clean_data( $gpay_data_send['name'] ) . ' ' . WCRed()->clean_data( $gpay_data_send['lastname'] ) );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_MERCHANTCODE: ' . $gpay_data_send['customer'] );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_CURRENCY' . $gpay_data_send['currency'] );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_TRANSACTIONTYPE: ' . $gpay_data_send['transaction_type'] );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_TERMINAL: ' . $gpay_data_send['DSMerchantTerminal'] );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_MERCHANTURL: ' . $gpay_data_send['final_notify_url'] );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_URLOK: ' . $gpay_data_send['url_ok'] );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_URLKO: ' . $gpay_data_send['returnfromredsys'] );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_CONSUMERLANGUAGE: ' . $gpay_data_send['gatewaylanguage'] );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_PRODUCTDESCRIPTION: ' . WCRed()->clean_data( $gpay_data_send['product_description'] ) );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_PAYMETHODS: xpay' );
		}
		/**
		 * Filter hook to allow 3rd parties to add more fields to the form
		 *
		 * @since 1.0.0
		 * @param array $redsys_args The arguments sent to Redsys.
		 */
		$redsys_args = apply_filters( 'woocommerce_' . $this->id . '_args', $redsys_args );
		return $redsys_args;
	}

	/**
	 * Generate the redsys form
	 *
	 * @param mixed $order_id Order ID.
	 */
	public function generate_redsys_form( $order_id ) {
		// NOT USED.
	}

	/**
	 * Process the payment and return the result
	 *
	 * @param int $order_id Order ID.
	 *
	 * @return array
	 * @throws Exception Exception.
	 */
	public function process_payment( $order_id ) {

		$order               = WCRed()->get_order( $order_id );
		$currency_codes      = WCRed()->get_currencies();
		$transaction_id2     = WCRed()->prepare_order_number( $order_id );
		$order_total_sign    = WCRed()->redsys_amount_format( $order->get_total() );
		$transaction_type    = '0';
		$user_id             = $order->get_user_id();
		$secretsha256        = $this->get_redsys_sha256( $user_id );
		$customer            = $this->customer;
		$url_ok              = add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) );
		$product_description = WCRed()->product_description( $order, $this->id );
		$merchant_name       = $this->commercename;
		$currency            = $currency_codes[ get_woocommerce_currency() ];
		$name                = WCRed()->get_order_meta( $order_id, '_billing_first_name', true );
		$lastname            = WCRed()->get_order_meta( $order_id, '_billing_last_name', true );
		if ( isset( $_POST['apple-referencia-redsys'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$apple_referencia_redsys = sanitize_text_field( wp_unslash( $_POST['apple-referencia-redsys'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		} else {
			$apple_referencia_redsys = '';
		}
		if ( isset( $_POST['apple-token-redsys'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$ds_xpay_data = sanitize_text_field( wp_unslash( $_POST['apple-token-redsys'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		} else {
			$ds_xpay_data = '';
		}
		$g_merchant_id                = $this->g_merchant_id;
		$ds_xpay_type                 = $this->xpay_type;
		$ds_xpay_origen               = $this->xpay_origen;
		$dsmerchantterminal           = $this->terminal;
		$ds_xpay_data_meta            = WCRed()->get_order_meta( $order_id, '_apple_token_redsys', true );
		$apple_referencia_redsys_meta = WCRed()->get_order_meta( $order_id, '_apple_referencia_redsys', true );

		if ( $ds_xpay_data_meta ) {
			$ds_xpay_data = $ds_xpay_data_meta;
		}
		if ( $apple_referencia_redsys_meta ) {
			$apple_referencia_redsys = $apple_referencia_redsys_meta;
		}

		WCRed()->update_order_meta( $order_id, $data );
		set_transient( $apple_referencia_redsys, $order_id, 3600 );

		if ( 'yes' === $this->testmode ) {
			$redsys_adr = $this->testurl;
		} else {
			$redsys_adr = $this->liveurl;
		}

		$miobj = new WooRedsysAPI();
		$miobj->set_parameter( 'DS_MERCHANT_AMOUNT', $order_total_sign );
		$miobj->set_parameter( 'DS_MERCHANT_ORDER', $transaction_id2 );
		$miobj->set_parameter( 'DS_MERCHANT_MERCHANTCODE', $customer );
		$miobj->set_parameter( 'DS_MERCHANT_CURRENCY', $currency );
		$miobj->set_parameter( 'DS_MERCHANT_TRANSACTIONTYPE', $transaction_type );
		$miobj->set_parameter( 'DS_MERCHANT_TERMINAL', $dsmerchantterminal );
		$miobj->set_parameter( 'DS_MERCHANT_TITULAR', WCRed()->clean_data( $name ) . ' ' . WCRed()->clean_data( $lastname ) );
		$miobj->set_parameter( 'DS_MERCHANT_PRODUCTDESCRIPTION', WCRed()->clean_data( $product_description ) );
		$miobj->set_parameter( 'DS_MERCHANT_MERCHANTNAME', $merchant_name );
		$miobj->set_parameter( 'DS_XPAYDATA', $ds_xpay_data );
		$miobj->set_parameter( 'DS_XPAYTYPE', $ds_xpay_type );
		$miobj->set_parameter( 'DS_XPAYORIGEN', $ds_xpay_origen );
		$miobj->set_parameter( 'DS_MERCHANT_DIRECTPAYMENT', 'TRUE' );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', '$apple_referencia_redsys: ' . $apple_referencia_redsys );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_AMOUNT: ' . $order_total_sign );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_CURRENCY: ' . $currency );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_MERCHANTCODE: ' . $customer );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_ORDER: ' . $transaction_id2 );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_TERMINAL: ' . $dsmerchantterminal );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_TRANSACTIONTYPE: ' . $transaction_type );
			WCRed()->log( 'applepayredsys', 'DS_XPAYDATA: ' . $ds_xpay_data );
			WCRed()->log( 'applepayredsys', 'DS_XPAYTYPE: ' . $ds_xpay_type );
			WCRed()->log( 'applepayredsys', 'DS_XPAYORIGEN: ' . $ds_xpay_origen );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_DIRECTPAYMENT: TRUE' );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_TITULAR: ' . WCRed()->clean_data( $name ) . ' ' . WCRed()->clean_data( $lastname ) );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_PRODUCTDESCRIPTION: ' . WCRed()->clean_data( $product_description ) );
			WCRed()->log( 'applepayredsys', 'DS_MERCHANT_MERCHANTNAME: ' . $merchant_name );
			WCRed()->log( 'applepayredsys', ' ' );
		}

		$version = 'HMAC_SHA256_V1';
		// Se generan los parámetros de la petición.
		$request       = '';
		$params        = $miobj->create_merchant_parameters();
		$signature     = $miobj->create_merchant_signature( $secretsha256 );
		$version       = 'HMAC_SHA256_V1';
		$response      = wp_remote_post(
			$redsys_adr,
			array(
				'method'      => 'POST',
				'timeout'     => 45,
				'httpversion' => '1.0',
				'user-agent'  => 'WooCommerce_Redsys_Gateway',
				'body'        => array(
					'Ds_SignatureVersion'   => $version,
					'Ds_MerchantParameters' => $params,
					'Ds_Signature'          => $signature,
				),
			)
		);
		$response_body = wp_remote_retrieve_body( $response );
		$result        = json_decode( $response_body, true );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', 'Response from Redsys: ' . print_r( $result, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'applepayredsys', ' ' );
		}
		if ( $result['Ds_MerchantParameters'] ) {
			$version     = $result['Ds_SignatureVersion']; // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$data        = $result['Ds_MerchantParameters']; // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$remote_sign = $result['Ds_Signature']; // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$decodec     = $miobj->decode_merchant_parameters( $data );
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'applepayredsys', ' ' );
				WCRed()->log( 'applepayredsys', '$decodec: ' . $decodec );
				WCRed()->log( 'applepayredsys', ' ' );
			}
			$decocec_json = json_decode( $decodec, true );
			if ( '0000' === $decocec_json['Ds_Response'] ) {
				$ds_authorisation_code = $decocec_json['Ds_AuthorisationCode'];
			} else {
				$ds_authorisation_code = false;
			}
			if ( $ds_authorisation_code ) {
				$data = array();
				$order->payment_complete();
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', 'payment_complete 1' );
				}
				if ( ! empty( $transaction_id2 ) ) {
					$data['_payment_order_number_redsys'] = $transaction_id2;
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'applepayredsys', '_payment_order_number_redsys saved: ' . $transaction_id2 );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '_payment_order_number_redsys NOT SAVED!!!' );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				if ( ! empty( $dsmerchantterminal ) ) {
					$data['_payment_terminal_redsys'] = $dsmerchantterminal;
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'applepayredsys', '_payment_terminal_redsys saved: ' . $dsmerchantterminal );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '_payment_terminal_redsys NOT SAVED!!!' );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				if ( ! empty( $ds_authorisation_code ) ) {
					$data['_authorisation_code_redsys'] = $ds_authorisation_code;
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'applepayredsys', '_authorisation_code_redsys saved: ' . $ds_authorisation_code );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '_authorisation_code_redsys NOT SAVED!!!' );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				if ( ! empty( $currency ) ) {
					$data['_corruncy_code_redsys'] = $currency;
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'applepayredsys', '_corruncy_code_redsys saved: ' . $currency );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '_corruncy_code_redsys NOT SAVED!!!' );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				if ( ! empty( $secretsha256 ) ) {
					$data['_redsys_secretsha256'] = $secretsha256;
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'applepayredsys', '_redsys_secretsha256 saved: ' . $secretsha256 );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '_redsys_secretsha256 NOT SAVED!!!' );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				WCRed()->update_order_meta( $order->get_id(), $data );
				do_action( $this->id . '_post_payment_complete', $order->get_id() );
				sleep( 5 );
				return array(
					'result'   => 'success',
					'redirect' => $this->get_return_url( $order ),
				);
			}
		}
		if ( isset( $result['errorCode'] ) ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'applepayredsys', ' ' );
				WCRed()->log( 'applepayredsys', 'Error: ' . $result['errorCode'] );
				WCRed()->log( 'applepayredsys', ' ' );
			}
			$error = WCRed()->get_error( $result['errorCode'] );
			do_action( $this->id . '_post_payment_error', $order->get_id(), $error );
			$order->add_order_note( __( 'Error en el pago: ', 'woocommerce-redsys' ) . $error );

			// Manejar el error para el bloque de checkout.
			wc_add_notice( $error, 'error' );
			wp_send_json_error(
				array(
					'message'   => $error,
					'result'    => 'failure',
					'errorCode' => $result['errorCode'],
				)
			);
			return array(
				'result'   => 'failure',
				'messages' => $error,
			);
		}
	}
	/**
	 * Output for the order received page.
	 *
	 * @param obj $order Order object.
	 */
	public function receipt_page( $order ) {
		// NOT USED.
	}

	/**
	 * Check redsys IPN validity
	 */
	public function check_ipn_request_is_valid() {

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'applepayredsys', 'HTTP Notification received 1: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
		}
		$usesecretsha256 = $this->secretsha256;
		if ( ! isset( $_POST['Ds_SignatureVersion'] ) || ! isset( $_POST['Ds_MerchantParameters'] ) || ! isset( $_POST['Ds_Signature'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			return false;
		}
		if ( $usesecretsha256 ) {
			$version           = sanitize_text_field( wp_unslash( $_POST['Ds_SignatureVersion'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$data              = sanitize_text_field( wp_unslash( $_POST['Ds_MerchantParameters'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$remote_sign       = sanitize_text_field( wp_unslash( $_POST['Ds_Signature'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$mi_obj            = new WooRedsysAPI();
			$decodec           = $mi_obj->decode_merchant_parameters( $data );
			$order_id          = $mi_obj->get_parameter( 'Ds_Order' );
			$ds_merchant_code  = $mi_obj->get_parameter( 'Ds_MerchantCode' );
			$secretsha256      = get_transient( 'redsys_signature_' . sanitize_text_field( $order_id ) );
			$order1            = $order_id;
			$order2            = WCRed()->clean_order_number( $order1 );
			$secretsha256_meta = WCRed()->get_order_meta( $order2, '_redsys_secretsha256', true );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'applepayredsys', ' ' );
				WCRed()->log( 'applepayredsys', 'Signature from Redsys: ' . $remote_sign );
				WCRed()->log( 'applepayredsys', 'Name transient remote: redsys_signature_' . sanitize_title( $order_id ) );
				WCRed()->log( 'applepayredsys', 'Secret SHA256 transcient: ' . $secretsha256 );
				WCRed()->log( 'applepayredsys', ' ' );
			}

			if ( 'yes' === $this->debug ) {
				$order_id = $mi_obj->get_parameter( 'Ds_Order' );
				WCRed()->log( 'applepayredsys', 'Order ID: ' . $order_id );
			}
			$order           = WCRed()->get_order( $order2 );
			$user_id         = $order->get_user_id();
			$usesecretsha256 = $this->get_redsys_sha256( $user_id );
			if ( empty( $secretsha256 ) && ! $secretsha256_meta ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', 'Using $usesecretsha256 Settings' );
					WCRed()->log( 'applepayredsys', 'Secret SHA256 Settings: ' . $usesecretsha256 );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				$usesecretsha256 = $usesecretsha256;
			} elseif ( $secretsha256_meta ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', 'Using $secretsha256_meta Meta' );
					WCRed()->log( 'applepayredsys', 'Secret SHA256 Meta: ' . $secretsha256_meta );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				$usesecretsha256 = $secretsha256_meta;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', 'Using $secretsha256 Transcient' );
					WCRed()->log( 'applepayredsys', 'Secret SHA256 Transcient: ' . $secretsha256 );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				$usesecretsha256 = $secretsha256;
			}
			$localsecret = $mi_obj->create_merchant_signature_notif( $usesecretsha256, $data );
			if ( $localsecret === $remote_sign ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', 'Received valid notification from Servired/RedSys' );
					WCRed()->log( 'applepayredsys', $data );
				}
				return true;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', 'Received INVALID notification from Servired/RedSys' );
				}
				delete_transient( 'redsys_signature_' . sanitize_title( $order_id ) );
				return false;
			}
		} else {
			$version           = sanitize_text_field( wp_unslash( $_POST['Ds_SignatureVersion'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$data              = sanitize_text_field( wp_unslash( $_POST['Ds_MerchantParameters'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$remote_sign       = sanitize_text_field( wp_unslash( $_POST['Ds_Signature'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$mi_obj            = new WooRedsysAPI();
			$decodec           = $mi_obj->decode_merchant_parameters( $data );
			$order_id          = $mi_obj->get_parameter( 'Ds_Order' );
			$ds_merchant_code  = $mi_obj->get_parameter( 'Ds_MerchantCode' );
			$secretsha256      = get_transient( 'redsys_signature_' . sanitize_text_field( $order_id ) );
			$order1            = $order_id;
			$order2            = WCRed()->clean_order_number( $order1 );
			$secretsha256_meta = WCRed()->get_order_meta( $order2, '_redsys_secretsha256', true );
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'applepayredsys', 'HTTP Notification received 2: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}
			if ( $ds_merchant_code === $this->customer ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', 'Received valid notification from Servired/RedSys' );
				}
				return true;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', 'Received INVALID notification from Servired/RedSys' );
					WCRed()->log( 'applepayredsys', '$remote_sign: ' . $remote_sign );
					WCRed()->log( 'applepayredsys', '$localsecret: ' . $localsecret );
				}
				return false;
			}
		}
	}

	/**
	 * Check for GPay HTTP Notification
	 */
	public function check_ipn_response() {

		@ob_clean(); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
		if ( isset( $_GET['checkout-price'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			WC()->frontend_includes();
			if ( null === WC()->cart && function_exists( 'wc_load_cart' ) ) {
				wc_load_cart();
			}
			$total = WC()->cart->total;
			echo wp_json_encode( array( 'total' => $total ) );
			exit;
		}

		$_POST = stripslashes_deep( $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		if ( $this->check_ipn_request_is_valid() ) {
			header( 'HTTP/1.1 200 OK' );
			do_action( 'valid_' . $this->id . '_standard_ipn_request', $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		} else {
			wp_die( 'There is nothing to see here, do not access this page directly (Apple Pay checkout)' );
		}
	}
	/**
	 * Successful Payment.
	 *
	 * @param array $posted Post data after notify.
	 */
	public function successful_request( $posted ) {

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', '/****************************/' );
			WCRed()->log( 'applepayredsys', '      successful_request      ' );
			WCRed()->log( 'applepayredsys', '/****************************/' );
			WCRed()->log( 'applepayredsys', ' ' );
		}

		if ( ! isset( $_POST['Ds_SignatureVersion'] ) || ! isset( $_POST['Ds_Signature'] ) || ! isset( $_POST['Ds_MerchantParameters'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			wp_die( 'Do not access this page directly ' );
		}

		$version     = sanitize_text_field( wp_unslash( $_POST['Ds_SignatureVersion'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		$data        = sanitize_text_field( wp_unslash( $_POST['Ds_MerchantParameters'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		$remote_sign = sanitize_text_field( wp_unslash( $_POST['Ds_Signature'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', '$version: ' . $version );
			WCRed()->log( 'applepayredsys', '$data: ' . $data );
			WCRed()->log( 'applepayredsys', '$remote_sign: ' . $remote_sign );
			WCRed()->log( 'applepayredsys', ' ' );
		}

		$mi_obj            = new WooRedsysAPI();
		$usesecretsha256   = $this->secretsha256;
		$dscardnumbercompl = '';
		$dsexpiration      = '';
		$dsmerchantidenti  = '';
		$dscardnumber4     = '';
		$dsexpiryyear      = '';
		$dsexpirymonth     = '';
		$decodedata        = $mi_obj->decode_merchant_parameters( $data );
		$localsecret       = $mi_obj->create_merchant_signature_notif( $usesecretsha256, $data );
		$total             = $mi_obj->get_parameter( 'Ds_Amount' );
		$ordermi           = $mi_obj->get_parameter( 'Ds_Order' );
		$dscode            = $mi_obj->get_parameter( 'Ds_MerchantCode' );
		$currency_code     = $mi_obj->get_parameter( 'Ds_Currency' );
		$response          = $mi_obj->get_parameter( 'Ds_Response' );
		$id_trans          = $mi_obj->get_parameter( 'Ds_AuthorisationCode' );
		$dsdate            = htmlspecialchars_decode( $mi_obj->get_parameter( 'Ds_Date' ), ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401 );
		$dshour            = htmlspecialchars_decode( $mi_obj->get_parameter( 'Ds_Hour' ), ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401 );
		$dstermnal         = $mi_obj->get_parameter( 'Ds_Terminal' );
		$dsmerchandata     = $mi_obj->get_parameter( 'Ds_MerchantData' );
		$dssucurepayment   = $mi_obj->get_parameter( 'Ds_SecurePayment' );
		$dscardcountry     = $mi_obj->get_parameter( 'Ds_Card_Country' );
		$dsconsumercountry = $mi_obj->get_parameter( 'Ds_ConsumerLanguage' );
		$dstransactiontype = $mi_obj->get_parameter( 'Ds_TransactionType' );
		$dsmerchantidenti  = $mi_obj->get_parameter( 'Ds_Merchant_Identifier' );
		$dscardbrand       = $mi_obj->get_parameter( 'Ds_Card_Brand' );
		$dsmechandata      = $mi_obj->get_parameter( 'Ds_MerchantData' );
		$dscargtype        = $mi_obj->get_parameter( 'Ds_Card_Type' );
		$dserrorcode       = $mi_obj->get_parameter( 'Ds_ErrorCode' );
		$dpaymethod        = $mi_obj->get_parameter( 'Ds_PayMethod' ); // D o R, D: Domiciliacion, R: Transferencia. Si se paga por Iupay o TC, no se utiliza.
		$response          = intval( $response );
		$secretsha256      = get_transient( 'redsys_signature_' . sanitize_text_field( $ordermi ) );
		$order1            = $ordermi;
		$order2            = WCRed()->clean_order_number( $order1 );
		$order             = WCRed()->get_order( (int) $order2 );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'applepayredsys', 'SHA256 Settings: ' . $usesecretsha256 );
			WCRed()->log( 'applepayredsys', 'SHA256 Transcient: ' . $secretsha256 );
			WCRed()->log( 'applepayredsys', 'decode_merchant_parameters: ' . $decodedata );
			WCRed()->log( 'applepayredsys', 'create_merchant_signature_notif: ' . $localsecret );
			WCRed()->log( 'applepayredsys', 'Ds_Amount: ' . $total );
			WCRed()->log( 'applepayredsys', 'Ds_Order: ' . $ordermi );
			WCRed()->log( 'applepayredsys', 'Ds_MerchantCode: ' . $dscode );
			WCRed()->log( 'applepayredsys', 'Ds_Currency: ' . $currency_code );
			WCRed()->log( 'applepayredsys', 'Ds_Response: ' . $response );
			WCRed()->log( 'applepayredsys', 'Ds_AuthorisationCode: ' . $id_trans );
			WCRed()->log( 'applepayredsys', 'Ds_Date: ' . $dsdate );
			WCRed()->log( 'applepayredsys', 'Ds_Hour: ' . $dshour );
			WCRed()->log( 'applepayredsys', 'Ds_Terminal: ' . $dstermnal );
			WCRed()->log( 'applepayredsys', 'Ds_MerchantData: ' . $dsmerchandata );
			WCRed()->log( 'applepayredsys', 'Ds_SecurePayment: ' . $dssucurepayment );
			WCRed()->log( 'applepayredsys', 'Ds_Card_Country: ' . $dscardcountry );
			WCRed()->log( 'applepayredsys', 'Ds_ConsumerLanguage: ' . $dsconsumercountry );
			WCRed()->log( 'applepayredsys', 'Ds_Card_Type: ' . $dscargtype );
			WCRed()->log( 'applepayredsys', 'Ds_TransactionType: ' . $dstransactiontype );
			WCRed()->log( 'applepayredsys', 'Ds_Merchant_Identifiers_Amount: ' . $response );
			WCRed()->log( 'applepayredsys', 'Ds_Card_Brand: ' . $dscardbrand );
			WCRed()->log( 'applepayredsys', 'Ds_MerchantData: ' . $dsmechandata );
			WCRed()->log( 'applepayredsys', 'Ds_ErrorCode: ' . $dserrorcode );
			WCRed()->log( 'applepayredsys', 'Ds_PayMethod: ' . $dpaymethod );
		}

		// refund.
		if ( '3' === $dstransactiontype ) {
			if ( 900 === $response ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', 'Response 900 (refund)' );
				}
				set_transient( $order->get_id() . '_redsys_refund', 'yes' );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', 'WCRed()->update_order_meta to "refund yes"' );
				}
				$status = $order->get_status();
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', 'New Status in request: ' . $status );
				}
				$order->add_order_note( __( 'Order Payment refunded by Redsys', 'woocommerce-redsys' ) );
				return;
			}
			$order->add_order_note( __( 'There was an error refunding', 'woocommerce-redsys' ) );
			exit;
		}
	}
	/**
	 * Ask for Refund
	 *
	 * @param  int    $order_id Order ID.
	 * @param  string $transaction_id Transaction ID.
	 * @param  float  $amount Amount.
	 * @return bool|WP_Error
	 */
	public function ask_for_refund( $order_id, $transaction_id, $amount ) {

		// post code to REDSYS.
		$order          = WCRed()->get_order( $order_id );
		$terminal       = WCRed()->get_order_meta( $order_id, '_payment_terminal_redsys', true );
		$currency_codes = WCRed()->get_currencies();
		$user_id        = $order->get_user_id();
		$secretsha256   = $this->get_redsys_sha256( $user_id );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', '/**************************/' );
			WCRed()->log( 'applepayredsys', __( 'Starting asking for Refund', 'woocommerce-redsys' ) );
			WCRed()->log( 'applepayredsys', '/**************************/' );
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', __( 'Terminal : ', 'woocommerce-redsys' ) . $terminal );
		}
		$transaction_type  = '3';
		$secretsha256_meta = WCRed()->get_order_meta( $order_id, '_redsys_secretsha256', true );
		if ( $secretsha256_meta ) {
			$secretsha256 = $secretsha256_meta;
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'applepayredsys', __( 'Using meta for SHA256', 'woocommerce-redsys' ) );
				WCRed()->log( 'applepayredsys', __( 'The SHA256 Meta is: ', 'woocommerce-redsys' ) . $secretsha256 );
			}
		} else {
			$secretsha256 = $secretsha256;
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'applepayredsys', __( 'Using settings for SHA256', 'woocommerce-redsys' ) );
				WCRed()->log( 'applepayredsys', __( 'The SHA256 settings is: ', 'woocommerce-redsys' ) . $secretsha256 );
			}
		}
		if ( 'yes' === $this->not_use_https ) {
			$final_notify_url = $this->notify_url_not_https;
		} else {
			$final_notify_url = $this->notify_url;
		}
		$redsys_adr        = $this->get_redsys_url_gateway( $user_id );
		$autorization_code = WCRed()->get_order_meta( $order_id, '_authorisation_code_redsys', true );
		$autorization_date = WCRed()->get_order_meta( $order_id, '_payment_date_redsys', true );
		$currencycode      = WCRed()->get_order_meta( $order_id, '_corruncy_code_redsys', true );
		$order_fuc         = WCRed()->get_order_meta( $order_id, '_order_fuc_redsys', true );

		if ( ! $order_fuc ) {
			$order_fuc = $this->customer;
		}

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', __( 'All data from meta', 'woocommerce-redsys' ) );
			WCRed()->log( 'applepayredsys', '**********************' );
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', __( 'If something is empty, the data was not saved', 'woocommerce-redsys' ) );
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', __( 'All data from meta', 'woocommerce-redsys' ) );
			WCRed()->log( 'applepayredsys', __( 'Authorization Code : ', 'woocommerce-redsys' ) . $autorization_code );
			WCRed()->log( 'applepayredsys', __( 'Authorization Date : ', 'woocommerce-redsys' ) . $autorization_date );
			WCRed()->log( 'applepayredsys', __( 'Currency Codey : ', 'woocommerce-redsys' ) . $currencycode );
			WCRed()->log( 'applepayredsys', __( 'Terminal : ', 'woocommerce-redsys' ) . $terminal );
			WCRed()->log( 'applepayredsys', __( 'SHA256 : ', 'woocommerce-redsys' ) . $secretsha256_meta );
			WCRed()->log( 'applepayredsys', __( 'FUC : ', 'woocommerce-redsys' ) . $order_fuc );
		}

		if ( ! empty( $currencycode ) ) {
			$currency = $currencycode;
		} elseif ( ! empty( $currency_codes ) ) {
			$currency = $currency_codes[ get_woocommerce_currency() ];
		}

		$mi_obj = new WooRedsysAPI();
		$mi_obj->set_parameter( 'DS_MERCHANT_AMOUNT', $amount );
		$mi_obj->set_parameter( 'DS_MERCHANT_ORDER', $transaction_id );
		$mi_obj->set_parameter( 'DS_MERCHANT_MERCHANTCODE', $order_fuc );
		$mi_obj->set_parameter( 'DS_MERCHANT_CURRENCY', $currency );
		$mi_obj->set_parameter( 'DS_MERCHANT_TRANSACTIONTYPE', $transaction_type );
		$mi_obj->set_parameter( 'DS_MERCHANT_TERMINAL', $terminal );
		$mi_obj->set_parameter( 'DS_MERCHANT_MERCHANTURL', $final_notify_url );
		$mi_obj->set_parameter( 'DS_MERCHANT_URLOK', add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ) );
		$mi_obj->set_parameter( 'DS_MERCHANT_URLKO', $order->get_cancel_order_url() );
		$mi_obj->set_parameter( 'DS_MERCHANT_CONSUMERLANGUAGE', '001' );
		$mi_obj->set_parameter( 'DS_MERCHANT_PRODUCTDESCRIPTION', WCRed()->clean_data( WCRed()->product_description( $order, $this->id ) ) );
		$mi_obj->set_parameter( 'DS_MERCHANT_MERCHANTNAME', $this->commercename );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', __( 'Data sent to Redsys for refund', 'woocommerce-redsys' ) );
			WCRed()->log( 'applepayredsys', '*********************************' );
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', __( 'URL to Redsys : ', 'woocommerce-redsys' ) . $redsys_adr );
			WCRed()->log( 'applepayredsys', __( 'DS_MERCHANT_AMOUNT : ', 'woocommerce-redsys' ) . $amount );
			WCRed()->log( 'applepayredsys', __( 'DS_MERCHANT_ORDER : ', 'woocommerce-redsys' ) . $transaction_id );
			WCRed()->log( 'applepayredsys', __( 'DS_MERCHANT_MERCHANTCODE : ', 'woocommerce-redsys' ) . $order_fuc );
			WCRed()->log( 'applepayredsys', __( 'DS_MERCHANT_CURRENCY : ', 'woocommerce-redsys' ) . $currency );
			WCRed()->log( 'applepayredsys', __( 'DS_MERCHANT_TRANSACTIONTYPE : ', 'woocommerce-redsys' ) . $transaction_type );
			WCRed()->log( 'applepayredsys', __( 'DS_MERCHANT_TERMINAL : ', 'woocommerce-redsys' ) . $terminal );
			WCRed()->log( 'applepayredsys', __( 'DS_MERCHANT_MERCHANTURL : ', 'woocommerce-redsys' ) . $final_notify_url );
			WCRed()->log( 'applepayredsys', __( 'DS_MERCHANT_URLOK : ', 'woocommerce-redsys' ) . add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ) );
			WCRed()->log( 'applepayredsys', __( 'DS_MERCHANT_URLKO : ', 'woocommerce-redsys' ) . $order->get_cancel_order_url() );
			WCRed()->log( 'applepayredsys', __( 'DS_MERCHANT_CONSUMERLANGUAGE : 001', 'woocommerce-redsys' ) );
			WCRed()->log( 'applepayredsys', __( 'DS_MERCHANT_PRODUCTDESCRIPTION : ', 'woocommerce-redsys' ) . WCRed()->clean_data( WCRed()->product_description( $order, $this->id ) ) );
			WCRed()->log( 'applepayredsys', __( 'DS_MERCHANT_MERCHANTNAME : ', 'woocommerce-redsys' ) . $this->commercename );
			WCRed()->log( 'applepayredsys', __( 'DS_MERCHANT_AUTHORISATIONCODE : ', 'woocommerce-redsys' ) . $autorization_code );
			WCRed()->log( 'applepayredsys', __( 'Ds_Merchant_TransactionDate : ', 'woocommerce-redsys' ) . $autorization_date );
			WCRed()->log( 'applepayredsys', __( 'ask_for_refund Asking por order #: ', 'woocommerce-redsys' ) . $order_id );
			WCRed()->log( 'applepayredsys', ' ' );
		}

		$version   = 'HMAC_SHA256_V1';
		$request   = '';
		$params    = $mi_obj->create_merchant_parameters();
		$signature = $mi_obj->create_merchant_signature( $secretsha256 );

		$post_arg = wp_remote_post(
			$redsys_adr,
			array(
				'method'      => 'POST',
				'timeout'     => 45,
				'httpversion' => '1.0',
				'user-agent'  => 'WooCommerce',
				'body'        => array(
					'Ds_SignatureVersion'   => $version,
					'Ds_MerchantParameters' => $params,
					'Ds_Signature'          => $signature,
				),
			)
		);
		if ( is_wp_error( $post_arg ) ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'applepayredsys', ' ' );
				WCRed()->log( 'applepayredsys', __( 'There is an error', 'woocommerce-redsys' ) );
				WCRed()->log( 'applepayredsys', '*********************************' );
				WCRed()->log( 'applepayredsys', ' ' );
				WCRed()->log( 'applepayredsys', __( 'The error is : ', 'woocommerce-redsys' ) . $post_arg );
			}
			return $post_arg;
		}
		return true;
	}
	/**
	 * Check if the ping is from Redsys
	 *
	 * @param  int $order_id Order ID.
	 * @return bool
	 */
	public function check_redsys_refund( $order_id ) {
		// check postmeta.
		$order        = WCRed()->get_order( (int) $order_id );
		$order_refund = get_transient( $order->get_id() . '_redsys_refund' );
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', __( 'Checking and waiting ping from Redsys', 'woocommerce-redsys' ) );
			WCRed()->log( 'applepayredsys', '*****************************************' );
			WCRed()->log( 'applepayredsys', ' ' );
			WCRed()->log( 'applepayredsys', __( 'Check order status #: ', 'woocommerce-redsys' ) . $order->get_id() );
			WCRed()->log( 'applepayredsys', __( 'Check order status with get_transient: ', 'woocommerce-redsys' ) . $order_refund );
		}
		if ( 'yes' === $order_refund ) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * Process a refund if supported.
	 *
	 * @param  int    $order_id Order ID.
	 * @param  float  $amount Refund amount.
	 * @param  string $reason Refund reason.
	 * @return bool True or false based on success, or a WP_Error object.
	 */
	public function process_refund( $order_id, $amount = null, $reason = '' ) {
		// Do your refund here. Refund $amount for the order with ID $order_id _transaction_id.
		set_time_limit( 0 );
		$order = wc_get_order( $order_id );

		$transaction_id = WCRed()->get_redsys_order_number( $order_id );
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'applepayredsys', __( '$order_id#: ', 'woocommerce-redsys' ) . $transaction_id );
		}
		if ( ! $amount ) {
			$order_total_sign = WCRed()->redsys_amount_format( $order->get_total() );
		} else {
			$order_total_sign = number_format( $amount, 2, '', '' );
		}

		if ( ! empty( $transaction_id ) ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'applepayredsys', __( 'check_redsys_refund Asking for order #: ', 'woocommerce-redsys' ) . $order_id );
			}

			$refund_asked = $this->ask_for_refund( $order_id, $transaction_id, $order_total_sign );

			if ( is_wp_error( $refund_asked ) ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'applepayredsys', __( 'Refund Failed: ', 'woocommerce-redsys' ) . $refund_asked->get_error_message() );
				}
				return new WP_Error( 'error', $refund_asked->get_error_message() );
			}
			$x = 0;
			do {
				sleep( 5 );
				$result = $this->check_redsys_refund( $order_id );
				++$x;
			} while ( $x <= 20 && false === $result );
			if ( 'yes' === $this->debug && $result ) {
				WCRed()->log( 'applepayredsys', __( 'check_redsys_refund = true ', 'woocommerce-redsys' ) . $result );
				WCRed()->log( 'applepayredsys', ' ' );
				WCRed()->log( 'applepayredsys', '/********************************/' );
				WCRed()->log( 'applepayredsys', '  Refund complete by Redsys   ' );
				WCRed()->log( 'applepayredsys', '/********************************/' );
				WCRed()->log( 'applepayredsys', ' ' );
				WCRed()->log( 'applepayredsys', ' ' );
				WCRed()->log( 'applepayredsys', '/******************************************/' );
				WCRed()->log( 'applepayredsys', '  The final has come, this story has ended  ' );
				WCRed()->log( 'applepayredsys', '/******************************************/' );
				WCRed()->log( 'applepayredsys', ' ' );
			}
			if ( 'yes' === $this->debug && ! $result ) {
				WCRed()->log( 'applepayredsys', __( 'check_redsys_refund = false ', 'woocommerce-redsys' ) . $result );
			}
			if ( $result ) {
				delete_transient( $order->get_id() . '_redsys_refund' );
				return true;
			} else {
				if ( 'yes' === $this->debug && $result ) {
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!' );
					WCRed()->log( 'applepayredsys', __( '!!!!Refund Failed, please try again!!!!', 'woocommerce-redsys' ) );
					WCRed()->log( 'applepayredsys', '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!' );
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', ' ' );
					WCRed()->log( 'applepayredsys', '/******************************************/' );
					WCRed()->log( 'applepayredsys', '  The final has come, this story has ended  ' );
					WCRed()->log( 'applepayredsys', '/******************************************/' );
					WCRed()->log( 'applepayredsys', ' ' );
				}
				return false;
			}
		} else {
			if ( 'yes' === $this->debug && $result ) {
				WCRed()->log( 'applepayredsys', __( 'Refund Failed: No transaction ID', 'woocommerce-redsys' ) );
				WCRed()->log( 'applepayredsys', ' ' );
				WCRed()->log( 'applepayredsys', '/******************************************/' );
				WCRed()->log( 'applepayredsys', '  The final has come, this story has ended  ' );
				WCRed()->log( 'applepayredsys', '/******************************************/' );
				WCRed()->log( 'applepayredsys', ' ' );
			}
			return new WP_Error( 'error', __( 'Refund Failed: No transaction ID', 'woocommerce-redsys' ) );
		}
	}
	/**
	 * Payment_fields function.
	 */
	public function payment_fields() {

		if ( is_checkout() && WCRed()->is_gateway_enabled( 'applepayredsys' ) ) {

			echo '<style>
					.payment_method_applepayredsys img {
						height: 25px;
					}
					apple-pay-button {
						--apple-pay-button-width: 300px;
						--apple-pay-button-height: 50px;
						--apple-pay-button-border-radius: 5px;
						--apple-pay-button-padding: 5px 0px;
						margin: 50px auto 0 auto;
						display: block;
					}
				</style>';
			$allowed_html = array(
				'br'     => array(),
				'p'      => array(
					'style' => array(),
					'class' => array(),
					'id'    => array(),
				),
				'span'   => array(
					'style' => array(),
					'class' => array(),
					'id'    => array(),
				),
				'strong' => array(),
				'a'      => array(
					'href'   => array(),
					'title'  => array(),
					'class'  => array(),
					'id'     => array(),
					'target' => array(),
				),
			);
			/**
			 * Filter to add more tags to the allowed html.
			 *
			 * @since 22.0.0
			 */
			$allowed_html_filter = apply_filters( 'redsys_kses_descripcion', $allowed_html );
			echo '<p>' . wp_kses( $this->description, $allowed_html_filter ) . '</p>';
			echo '<div id="apple"><apple-pay-button buttonstyle="black" type="buy" locale="es-ES"  onclick="onApplePayClicked()"></apple-pay-button> </div>';
			echo '<input type="hidden" id="apple-token-redsys" name="apple-token-redsys" value="" />';
			echo '<input type="hidden" id="apple-referencia-redsys" name="apple-referencia-redsys" value="" />';
			?>
			<script>
			jQuery(document).ready(function($) {
				if (window.ApplePaySession) {
					var promise = ApplePaySession.canMakePaymentsWithActiveCard(VarmerchantId);
					promise.then(function(canMakePayments) {
						$('li.payment_method_applepayredsys').css('display', 'list-item');
					}, function(rejection) {
						$('li.payment_method_applepayredsys').css('display', 'none');
					});
				} else {
					$('li.payment_method_applepayredsys').css('display', 'none');
				}
			});
			</script>
			<?php
		}
	}
	/**
	 * Load Apple Pay JS
	 *
	 * @param int $price Price.
	 */
	public function load_apple_pay_js( $price = false ) {
		if ( is_checkout() && WCRed()->is_gateway_enabled( 'applepayredsys' ) ) {
			$store_country        = wc_get_base_location()['country'];
			$time                 = time();
			$using_checkout_block = WCRed()->checkout_use_block(); // Verifica si se usa el bloque de checkout.

			// Desregistrar el script existente si es necesario.
			wp_deregister_script( 'applepay-redsys' );

			// Selecciona el script de JS basado en si se está utilizando el bloque de checkout o no.
			$applepay_script_filename = $using_checkout_block ? 'applepay-redsys-block.js' : 'applepay-redsys.js';

			// Registrar los scripts necesarios.
			wp_register_script( 'redsys-external-applepay-js', 'https://applepay.cdn-apple.com/jsapi/1.latest/apple-pay-sdk.js', array(), $time, false );
			wp_register_script( 'applepay-redsys', esc_url( REDSYS_PLUGIN_URL_P ) . 'assets/js/' . $applepay_script_filename, array( 'jquery', 'redsys-external-applepay-js' ), $time, false );

			// Crear un nonce para la seguridad en las solicitudes AJAX.
			$nonce = wp_create_nonce( 'applepay_redsys_nonce' );

			// Obtener el total del carrito.
			$total           = WC()->cart->get_total( 'edit' ); // Retorna el total sin formatear.
			$formatted_total = number_format( floatval( $total ), 2, '.', '' );

			// Datos a pasar al script JavaScript.
			$script_data_array = array(
				'merchantId'   => $this->g_merchant_id,
				'merchantName' => WCRed()->clean_data( $this->commercename ),
				'url_site'     => get_site_url(),
				'countryCode'  => $store_country,
				'currencyCode' => get_woocommerce_currency(),
				'ajax_url'     => admin_url( 'admin-ajax.php' ),
				'nonce'        => $nonce,
				'cart_total'   => $formatted_total, // Incluye el monto del carrito.
			);

			// Logs para depuración.
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'applepayredsys', '$script_data_array: ' . print_r( $script_data_array, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}

			// Localizar el script con los datos necesarios.
			wp_localize_script( 'applepay-redsys', 'apple_redsys', $script_data_array );

			// Encolar los scripts.
			wp_enqueue_script( 'redsys-external-applepay-js' );
			wp_enqueue_script( 'applepay-redsys' );
		}
	}

	/**
	 * Save fields to checkout (Gpay).
	 *
	 * @param int $order_id Order ID.
	 */
	public function save_field_update_order_meta( $order_id ) {

		if ( isset( $_POST['woocommerce-process-checkout-nonce'] ) &&
			wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['woocommerce-process-checkout-nonce'] ) ), 'woocommerce-process_checkout' ) &&
			isset( $_POST['payment_method'] ) &&
			'applepayredsys' === sanitize_text_field( wp_unslash( $_POST['payment_method'] ) ) ) {

			// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'applepayredsys', 'HTTP $_POST checkout received: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}

			$data = array(); // Inicializa el array antes de llenarlo con los valores.

			if ( ! empty( $_POST['apple-token-redsys'] ) ) {
				$apple_token                 = sanitize_text_field( wp_unslash( $_POST['apple-token-redsys'] ) );
				$data['_apple_token_redsys'] = sanitize_text_field( $apple_token );
			}
			if ( ! empty( $_POST['apple-referencia-redsys'] ) ) {
				$referencia_apple                 = sanitize_text_field( wp_unslash( $_POST['apple-referencia-redsys'] ) );
				$data['_apple_referencia_redsys'] = sanitize_text_field( $referencia_apple );
			}

			// Asegurarse de que $data no esté vacío antes de llamar a update_order_meta.
			if ( ! empty( $data ) ) {
				WCRed()->update_order_meta( $order_id, $data );
			}
		}
	}
	/**
	 * Handle_ajax_request_applepay function.
	 */
	public static function handle_ajax_request_applepay() {

		// Sanitiza la URL de validación.
		$validation_url = isset( $_POST['validationURL'] ) ? esc_url_raw( wp_unslash( $_POST['validationURL'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing
		if ( empty( $validation_url ) ) {
			wp_send_json_error( array( 'error' => 'Validation URL is missing or invalid' ) );
			wp_die();
		}

		WCRed()->log( 'applepayredsys', 'validationURL: ' . $validation_url );

		$apple  = new WC_Gateway_Apple_Pay_Checkout();
		$domain = sanitize_text_field( wp_unslash( $_SERVER['HTTP_HOST'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		WCRed()->log( 'applepayredsys', 'domain: ' . $domain );

		$data = array(
			'merchantIdentifier' => $apple->g_merchant_id,
			'displayName'        => $apple->commercename,
			'initiative'         => 'web',
			'initiativeContext'  => $domain,
		);

		$custom_curl_options = function ( $handle, $r, $url ) {
			$apple = new WC_Gateway_Apple_Pay_Checkout();
			$pem   = $apple->merchant_id_pem;
			$key   = $apple->merchant_id_key;
			WCRed()->log( 'applepayredsys', 'pem: ' . $pem );
			WCRed()->log( 'applepayredsys', 'key: ' . $key );

			// Utiliza los parámetros $r y $url de alguna manera para evitar la advertencia.
			if ( is_array( $r ) && ! empty( $url ) ) {
				// Puedes registrar $r y $url en el log para usarlos.
				WCRed()->log( 'applepayredsys', 'Request data: ' . print_r( $r, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'applepayredsys', 'Request URL: ' . $url );

				curl_setopt( $handle, CURLOPT_SSLCERT, $pem ); // phpcs:ignore WordPress.WP.AlternativeFunctions.curl_curl_setopt
				curl_setopt( $handle, CURLOPT_SSLKEY, $key );  // phpcs:ignore WordPress.WP.AlternativeFunctions.curl_curl_setopt
			}

			return $handle;
		};

		add_filter( 'http_api_curl', $custom_curl_options, 10, 3 );

		$response = wp_remote_post(
			$validation_url,
			array(
				'method'  => 'POST',
				'headers' => array(
					'Content-Type' => 'application/json',
				),
				'body'    => wp_json_encode( $data ),
			)
		);

		remove_filter( 'http_api_curl', $custom_curl_options, 10, 3 );

		WCRed()->log( 'applepayredsys', 'Response Code: ' . wp_remote_retrieve_response_code( $response ) );
		WCRed()->log( 'applepayredsys', 'Response Message: ' . wp_remote_retrieve_response_message( $response ) );

		if ( is_wp_error( $response ) ) {
			wp_send_json_error( array( 'error' => $response->get_error_message() ) );
		} else {
			wp_send_json_success( json_decode( $response['body'], true ) );
		}

		wp_die();
	}
	/**
	 * Handle_ajax_request_applepay function.
	 */
	public static function handle_update_checkout_address() {

		$apple = new WC_Gateway_Apple_Pay_Checkout();

		// Log the start of the function.
		WCRed()->log( 'applepayredsys', 'función handle_update_checkout_address() - INICIO' );

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'applepay_redsys_nonce' ) ) {
			WCRed()->log( 'applepayredsys', 'Nonce verification failed' );
			wp_die( 'La verificación de seguridad ha fallado' );
		}

		WCRed()->log( 'applepayredsys', 'Datos de $_POST: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r

		if ( isset( $_POST['order_id'] ) ) {
			$order_id = sanitize_text_field( wp_unslash( $_POST['order_id'] ) );
			WCRed()->log( 'applepayredsys', 'Order ID: ' . $order_id );
			$order = WCRed()->get_order( $order_id );
		} else {
			wp_die( 'No se ha proporcionado un ID de pedido' );
		}

		WCRed()->log( 'applepayredsys', 'Nonce Verificado' );

		$shipping_address = array();
		$billing_address  = array();

		// Process each field and log each update.
		if ( isset( $_POST['first_name'] ) ) {
			$first_name = sanitize_text_field( wp_unslash( $_POST['first_name'] ) );
			WCRed()->log( 'applepayredsys', 'First Name: ' . $first_name );
			WC()->customer->set_billing_first_name( $first_name );
			WC()->customer->set_shipping_first_name( $first_name );
			$shipping_address['first_name'] = $first_name;
			$billing_address['first_name']  = $first_name;
		}

		if ( isset( $_POST['last_name'] ) ) {
			$last_name = sanitize_text_field( wp_unslash( $_POST['last_name'] ) );
			WCRed()->log( 'applepayredsys', 'Last Name: ' . $last_name );
			WC()->customer->set_billing_last_name( $last_name );
			WC()->customer->set_shipping_last_name( $last_name );
			$shipping_address['last_name'] = $last_name;
			$billing_address['last_name']  = $last_name;
		}

		if ( isset( $_POST['email'] ) ) {
			$email = sanitize_text_field( wp_unslash( $_POST['email'] ) );
			WCRed()->log( 'applepayredsys', 'Email: ' . $email );
			WC()->customer->set_billing_email( $email );
			WC()->customer->set_shipping_email( $email );
			$shipping_address['email'] = $email;
			$billing_address['email']  = $email;
		}

		if ( isset( $_POST['phone'] ) ) {
			$phone = sanitize_text_field( wp_unslash( $_POST['phone'] ) );
			WCRed()->log( 'applepayredsys', 'Phone: ' . $phone );
			WC()->customer->set_billing_phone( $phone );
			WC()->customer->set_shipping_phone( $phone );
			$shipping_address['phone'] = $phone;
			$billing_address['phone']  = $phone;
		}

		if ( isset( $_POST['address_1'] ) ) {
			$address_1 = sanitize_text_field( wp_unslash( $_POST['address_1'] ) );
			WCRed()->log( 'applepayredsys', 'Address 1: ' . $address_1 );
			WC()->customer->set_billing_address_1( $address_1 );
			WC()->customer->set_shipping_address_1( $address_1 );
			$shipping_address['address_1'] = $address_1;
			$billing_address['address_1']  = $address_1;
		}

		if ( isset( $_POST['address_2'] ) ) {
			$address_2 = sanitize_text_field( wp_unslash( $_POST['address_2'] ) );
			WCRed()->log( 'applepayredsys', 'Address 2: ' . $address_2 );
			WC()->customer->set_billing_address_2( $address_2 );
			WC()->customer->set_shipping_address_2( $address_2 );
			$shipping_address['address_2'] = $address_2;
			$billing_address['address_2']  = $address_2;
		}

		if ( isset( $_POST['city'] ) ) {
			$city = sanitize_text_field( wp_unslash( $_POST['city'] ) );
			WCRed()->log( 'applepayredsys', 'City: ' . $city );
			WC()->customer->set_billing_city( $city );
			WC()->customer->set_shipping_city( $city );
			$shipping_address['city'] = $city;
			$billing_address['city']  = $city;
		}

		if ( isset( $_POST['postcode'] ) ) {
			$postcode = sanitize_text_field( wp_unslash( $_POST['postcode'] ) );
			WCRed()->log( 'applepayredsys', 'Postcode: ' . $postcode );
			WC()->customer->set_billing_postcode( $postcode );
			WC()->customer->set_shipping_postcode( $postcode );
			$shipping_address['postcode'] = $postcode;
			$billing_address['postcode']  = $postcode;
		}

		if ( isset( $_POST['state'] ) ) {
			$state = sanitize_text_field( wp_unslash( $_POST['state'] ) );
			WCRed()->log( 'applepayredsys', 'State: ' . $state );
			WC()->customer->set_billing_state( $state );
			WC()->customer->set_shipping_state( $state );
			$shipping_address['state'] = $state;
			$billing_address['state']  = $state;
		}

		if ( isset( $_POST['country'] ) ) {
			$country = sanitize_text_field( wp_unslash( $_POST['country'] ) );
			WCRed()->log( 'applepayredsys', 'Country: ' . $country );
			WC()->customer->set_billing_country( $country );
			WC()->customer->set_shipping_country( $country );
			$shipping_address['country'] = $country;
			$billing_address['country']  = $country;
		}

		// Save customer data.
		WC()->customer->save();
		$order->set_address( $billing_address, 'billing' );
		$order->set_address( $shipping_address, 'shipping' );
		$order->save();

		// Log the final addresses.
		WCRed()->log( 'applepayredsys', 'Billing Address: ' . print_r( $billing_address, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
		WCRed()->log( 'applepayredsys', 'Shipping Address: ' . print_r( $shipping_address, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r

		$needs_shipping = WC()->cart->needs_shipping();
		$total          = (string) $order->get_total();
		WCRed()->log( 'applepayredsys', 'Total: ' . $total );

		wp_send_json_success(
			array(
				'success'        => true,
				'total'          => $total,
				'needs_shipping' => $needs_shipping,
			)
		);
	}

	/**
	 * Save all order data from Apple Pay.
	 *
	 * @since 25.1.0
	 */
	public static function save_all_order_data_applepay() {

		WCRed()->log( 'applepayredsys', 'Iniciando save_all_order_data_applepay()' );

		// Verificar nonce para seguridad.
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'applepay_redsys_nonce' ) ) {
			WCRed()->log( 'applepayredsys', 'Fallo en la verificación del nonce' );
			wp_send_json_error( 'Nonce verification failed.' );
			wp_die();
		}

		// Log $_POST completo para revisar los datos.
		WCRed()->log( 'applepayredsys', 'Datos de $_POST: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r

		// Obtener y sanitizar 'order_id'.
		$order_id = isset( $_POST['order_id'] ) ? intval( sanitize_text_field( wp_unslash( $_POST['order_id'] ) ) ) : 0;

		WCRed()->log( 'applepayredsys', 'Order ID recibido: ' . $order_id );

		if ( ! $order_id ) {
			WCRed()->log( 'applepayredsys', 'ID de pedido no proporcionado.' );
			wp_send_json_error( 'ID de pedido no proporcionado.' );
			wp_die();
		}

		// Obtener el objeto del pedido.
		$order = wc_get_order( $order_id );
		if ( ! $order ) {
			WCRed()->log( 'applepayredsys', 'Pedido no válido. ID de pedido: ' . $order_id );
			wp_send_json_error( 'Pedido no válido.' );
			wp_die();
		}

		WCRed()->log( 'applepayredsys', 'Pedido encontrado: ' . $order->get_id() );

		// Obtener y sanitizar datos de Apple Pay.
		$apple_referencia_redsys = isset( $_POST['apple_referencia_redsys'] ) ? sanitize_text_field( wp_unslash( $_POST['apple_referencia_redsys'] ) ) : '';
		$apple_token_redsys      = isset( $_POST['apple_token_redsys'] ) ? sanitize_text_field( wp_unslash( $_POST['apple_token_redsys'] ) ) : '';

		WCRed()->log( 'applepayredsys', 'Apple Referencia Redsys: ' . $apple_referencia_redsys );
		WCRed()->log( 'applepayredsys', 'Apple Token Redsys: ' . $apple_token_redsys );

		if ( empty( $apple_referencia_redsys ) || empty( $apple_token_redsys ) ) {
			WCRed()->log( 'applepayredsys', 'Faltan datos de Apple Pay.' );
			wp_send_json_error( array( 'message' => 'Faltan datos de Apple Pay.' ) );
			wp_die();
		}

		// Guardar los metadatos de Apple Pay en la orden.
		$order->update_meta_data( '_apple_referencia_redsys', $apple_referencia_redsys );
		$order->update_meta_data( '_apple_token_redsys', $apple_token_redsys );

		WCRed()->log( 'applepayredsys', 'Metadatos de Apple Pay guardados.' );

		// Procesar los datos de facturación y envío desde los arrays `shippingData` y `billingData`.
		$shipping_data = isset( $_POST['shippingData'] ) ? array_map( 'sanitize_text_field', wp_unslash( $_POST['shippingData'] ) ) : array();
		$billing_data  = isset( $_POST['billingData'] ) ? array_map( 'sanitize_text_field', wp_unslash( $_POST['billingData'] ) ) : array();

		// Procesar dirección de envío.
		$shipping_address = array(
			'first_name' => isset( $shipping_data['first_name'] ) ? $shipping_data['first_name'] : '',
			'last_name'  => isset( $shipping_data['last_name'] ) ? $shipping_data['last_name'] : '',
			'email'      => isset( $shipping_data['email'] ) ? $shipping_data['email'] : '',
			'phone'      => isset( $shipping_data['phone'] ) ? $shipping_data['phone'] : '',
			'address_1'  => isset( $shipping_data['address_1'] ) ? $shipping_data['address_1'] : '',
			'address_2'  => isset( $shipping_data['address_2'] ) ? $shipping_data['address_2'] : '',
			'city'       => isset( $shipping_data['city'] ) ? $shipping_data['city'] : '',
			'state'      => isset( $shipping_data['state'] ) ? $shipping_data['state'] : '',
			'postcode'   => isset( $shipping_data['postcode'] ) ? $shipping_data['postcode'] : '',
			'country'    => isset( $shipping_data['country'] ) ? $shipping_data['country'] : '',
		);

		// Procesar dirección de facturación.
		$billing_address = array(
			'first_name' => isset( $billing_data['first_name'] ) ? $billing_data['first_name'] : '',
			'last_name'  => isset( $billing_data['last_name'] ) ? $billing_data['last_name'] : '',
			'email'      => isset( $billing_data['email'] ) ? $billing_data['email'] : '',
			'phone'      => isset( $billing_data['phone'] ) ? $billing_data['phone'] : '',
			'address_1'  => isset( $billing_data['address_1'] ) ? $billing_data['address_1'] : '',
			'address_2'  => isset( $billing_data['address_2'] ) ? $billing_data['address_2'] : '',
			'city'       => isset( $billing_data['city'] ) ? $billing_data['city'] : '',
			'state'      => isset( $billing_data['state'] ) ? $billing_data['state'] : '',
			'postcode'   => isset( $billing_data['postcode'] ) ? $billing_data['postcode'] : '',
			'country'    => isset( $billing_data['country'] ) ? $billing_data['country'] : '',
		);

		// Si faltan datos de facturación, copiar los de envío y viceversa.
		foreach ( $shipping_address as $key => $value ) {
			if ( empty( $billing_address[ $key ] ) ) {
				$billing_address[ $key ] = $value;
			}
		}

		foreach ( $billing_address as $key => $value ) {
			if ( empty( $shipping_address[ $key ] ) ) {
				$shipping_address[ $key ] = $value;
			}
		}

		WCRed()->log( 'applepayredsys', 'Dirección de envío procesada: ' . print_r( $shipping_address, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
		WCRed()->log( 'applepayredsys', 'Dirección de facturación procesada: ' . print_r( $billing_address, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r

		// Guardar las direcciones en el pedido.
		if ( ! empty( $billing_address ) ) {
			$order->set_address( $billing_address, 'billing' );
			WCRed()->log( 'applepayredsys', 'Dirección de facturación guardada.' );
		}
		if ( ! empty( $shipping_address ) ) {
			$order->set_address( $shipping_address, 'shipping' );
			WCRed()->log( 'applepayredsys', 'Dirección de envío guardada.' );
		}

		// Asociar el pedido a un usuario existente o al usuario autenticado.
		if ( is_user_logged_in() ) {
			$user_id = get_current_user_id();
			$order->set_customer_id( $user_id );
			WCRed()->log( 'applepayredsys', 'Asignado al usuario autenticado con ID: ' . $user_id );
		} else {
			$email_billing  = $billing_address['email'] ?? '';
			$email_shipping = $shipping_address['email'] ?? '';

			if ( ! empty( $email_billing ) && email_exists( $email_billing ) ) {
				$user_id = email_exists( $email_billing );
				$order->set_customer_id( $user_id );
				WCRed()->log( 'applepayredsys', 'Asignado al usuario con correo de facturación: ' . $email_billing );
			} elseif ( ! empty( $email_shipping ) && email_exists( $email_shipping ) ) {
				$user_id = email_exists( $email_shipping );
				$order->set_customer_id( $user_id );
				WCRed()->log( 'applepayredsys', 'Asignado al usuario con correo de envío: ' . $email_shipping );
			} else {
				$account_creation_enabled = 'yes' === get_option( 'woocommerce_enable_signup_and_login_from_checkout' );

				if ( $account_creation_enabled && ! empty( $email_billing ) ) {
					$username        = sanitize_user( current( explode( '@', $email_billing ) ) );
					$random_password = wp_generate_password( 12, false );
					$user_id         = wp_create_user( $username, $random_password, $email_billing );

					if ( ! is_wp_error( $user_id ) ) {
						$order->set_customer_id( $user_id );
						WCRed()->log( 'applepayredsys', 'Nuevo usuario creado con ID: ' . $user_id );

						// Guardar los datos de facturación y envío en el perfil del usuario.
						update_user_meta( $user_id, 'billing_first_name', $billing_address['first_name'] );
						update_user_meta( $user_id, 'billing_last_name', $billing_address['last_name'] );
						update_user_meta( $user_id, 'billing_address_1', $billing_address['address_1'] );
						update_user_meta( $user_id, 'billing_address_2', $billing_address['address_2'] );
						update_user_meta( $user_id, 'billing_city', $billing_address['city'] );
						update_user_meta( $user_id, 'billing_postcode', $billing_address['postcode'] );
						update_user_meta( $user_id, 'billing_country', $billing_address['country'] );
						update_user_meta( $user_id, 'billing_state', $billing_address['state'] );
						update_user_meta( $user_id, 'billing_email', $billing_address['email'] );
						update_user_meta( $user_id, 'billing_phone', $billing_address['phone'] );

						update_user_meta( $user_id, 'shipping_first_name', $shipping_address['first_name'] );
						update_user_meta( $user_id, 'shipping_last_name', $shipping_address['last_name'] );
						update_user_meta( $user_id, 'shipping_address_1', $shipping_address['address_1'] );
						update_user_meta( $user_id, 'shipping_address_2', $shipping_address['address_2'] );
						update_user_meta( $user_id, 'shipping_city', $shipping_address['city'] );
						update_user_meta( $user_id, 'shipping_postcode', $shipping_address['postcode'] );
						update_user_meta( $user_id, 'shipping_country', $shipping_address['country'] );
						update_user_meta( $user_id, 'shipping_state', $shipping_address['state'] );
						update_user_meta( $user_id, 'shipping_phone', $shipping_address['phone'] );

						WCRed()->log( 'applepayredsys', 'Datos de facturación y envío guardados en el perfil del usuario.' );
						wc_set_customer_auth_cookie( $user_id );
						WCRed()->log( 'applepayredsys', 'Usuario autenticado automáticamente: ' . $user_id );
					} else {
						WCRed()->log( 'applepayredsys', 'Error al crear el usuario: ' . print_r( $user_id->get_error_message(), true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
					}
				}
			}
		}

		// Asignar el método de pago.
		$order->set_payment_method( 'applepay_redsys' );
		$order->set_payment_method_title( 'Apple Pay' );
		WCRed()->log( 'applepayredsys', 'Método de pago asignado: Apple Pay' );

		// Guardar el pedido y los cambios.
		$order->save();
		WCRed()->log( 'applepayredsys', 'Pedido guardado correctamente.' );

		// Responder con éxito.
		wp_send_json_success( 'Pedido actualizado correctamente.' );
		wp_die();
	}



	/**
	 * Check payment status.
	 *
	 * @since 23.0.0
	 *
	 * @return void
	 */
	public static function check_payment_status() {
		$apple_referencia_redsys = sanitize_text_field( wp_unslash( $_POST['apple_referencia_redsys'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated,WordPress.Security.NonceVerification.Missing

		// Recuperar el ID del pedido usando la referencia.
		$order_id = get_transient( $apple_referencia_redsys );

		if ( $order_id ) {
			$order        = wc_get_order( $order_id );
			$order_status = $order->get_status();

			wp_send_json( array( 'status' => $order_status ) );
		} else {
			wp_send_json( null );
		}
		wp_die();
	}
	/**
	 * Check payment status.
	 *
	 * @since 23.0.0
	 *
	 * @return void
	 */
	public static function pay_order_applepay() {
		// Verificar nonce para seguridad.
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'applepay_redsys_nonce' ) ) {
			wp_send_json_error( array( 'message' => 'Nonce verification failed.' ) );
			wp_die();
		}

		// Sanitizar y obtener los datos del POST.
		$apple_referencia_redsys = isset( $_POST['apple_referencia_redsys'] ) ? sanitize_text_field( wp_unslash( $_POST['apple_referencia_redsys'] ) ) : '';
		$order_id                = isset( $_POST['order_id'] ) ? sanitize_text_field( wp_unslash( $_POST['order_id'] ) ) : '';

		// Instanciar la clase del gateway de Apple Pay.
		$apple_pay = new WC_Gateway_Apple_Pay_Checkout();

		// Procesar el pago.
		$result = $apple_pay->process_payment( $order_id );

		// Registrar logs para depuración.
		WCRed()->log( 'applepayredsys', '$apple_referencia_redsys: ' . $apple_referencia_redsys );
		WCRed()->log( 'applepayredsys', '$order_id: ' . $order_id );
		WCRed()->log( 'applepayredsys', '$result: ' . print_r( $result, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r

		// Comprobar el resultado y responder adecuadamente.
		if ( isset( $result['result'] ) && 'success' === $result['result'] ) {
			// Pago exitoso, enviar respuesta con redirect para redireccionar al frontend.
			wp_send_json_success(
				array(
					'message'  => 'Pago realizado correctamente.',
					'redirect' => $result['redirect'],
				)
			);
		} else {
			// Manejar el error en el pago.
			wp_send_json_error(
				array(
					'message' => 'Error procesando el pago.',
					'details' => isset( $result['errorCode'] ) ? WCRed()->get_error( $result['errorCode'] ) : 'Error desconocido.',
				)
			);
		}

		wp_die(); // Finalizar la ejecución del script.
	}


	/**
	 * Check order status.
	 *
	 * @since 23.0.0
	 *
	 * @return void
	 */
	public static function check_order_status_applepay() {
		$order_id = sanitize_text_field( wp_unslash( $_POST['order_id'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated,WordPress.Security.NonceVerification.Missing
		$order    = wc_get_order( $order_id );
		$status   = $order->get_status();
		wp_send_json_success( $status );
		wp_die();
	}
	/**
	 * Check order status.
	 *
	 * @since 25.1.0
	 *
	 * @return void
	 */
	public function validate_merchant() {
		// Verificar nonce si lo usas.
		check_ajax_referer( 'applepay_redsys_nonce', 'nonce' );

		$validation_url = isset( $_POST['validationURL'] ) ? esc_url_raw( wp_unslash( $_POST['validationURL'] ) ) : '';

		if ( empty( $validation_url ) ) {
			wp_send_json_error( 'URL de validación no proporcionada.' );
		}

		// Realiza una solicitud a la validationURL para obtener el merchant session.
		$response = wp_remote_post(
			$validation_url,
			array(
				'body'    => wp_json_encode(
					array(
						'merchantIdentifier' => $this->g_merchant_id, // Asegúrate de tener esta variable definida.
						'displayName'        => $this->commercename,        // Asegúrate de tener esta variable definida.
						'initiative'         => 'web',
						'initiativeContext'  => get_site_url(),
					)
				),
				'headers' => array(
					'Content-Type' => 'application/json',
				),
			)
		);

		if ( is_wp_error( $response ) ) {
			wp_send_json_error( 'Error al validar el comerciante: ' . $response->get_error_message() );
		}

		$body = wp_remote_retrieve_body( $response );
		$data = json_decode( $body, true );

		if ( 'OK' === $data['status'] && isset( $data['status'] ) ) {
			wp_send_json_success( array( 'data' => $data ) );
		} else {
			wp_send_json_error( 'Validación del comerciante fallida: ' . $body );
		}

		wp_die();
	}
	/**
	 * Get the checkout price.
	 *
	 * @since 25.1.0
	 *
	 * @return void
	 */
	public function get_checkout_price() {
		// Verificar nonce si lo usas.
		check_ajax_referer( 'applepay_redsys_nonce', 'nonce' );

		// Obtener el total del carrito.
		$total = WC()->cart->get_total( 'edit' ); // Retorna el total sin formatear.

		// Quitar cualquier símbolo de moneda y formatear a 'XX.XX'.
		$formatted_total = number_format( floatval( $total ), 2, '.', '' );

		if ( $formatted_total ) {
			wp_send_json_success( array( 'total' => $formatted_total ) );
		} else {
			wp_send_json_error( 'No se pudo obtener el total del carrito.' );
		}

		wp_die();
	}
}
/**
 * Add the gateway to WooCommerce
 *
 * @param array $methods WooCommerce payment methods.
 */
function woocommerce_add_gateway_applepay_redsys( $methods ) { // phpcs:ignore Universal.Files.SeparateFunctionsFromOO.Mixed
	$methods[] = 'WC_Gateway_Apple_Pay_Checkout';
	return $methods;
}
add_filter( 'woocommerce_payment_gateways', 'woocommerce_add_gateway_applepay_redsys' );
