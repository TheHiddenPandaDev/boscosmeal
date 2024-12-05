<?php
/**
 * Google Pay redirection Gateway
 *
 * @package WooCommerce Redsys Gateway
 * @since 21.2.0
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
 * WC_Gateway_GooglePay_Redirection_Redsys Class.
 */
class WC_Gateway_GooglePay_Redirection_Redsys extends WC_Payment_Gateway {

	/**
	 * Gateway ID.
	 *
	 * @var string $id
	 */
	public $id;

	/**
	 * Gateway icon URL.
	 *
	 * @var string $icon
	 */
	public $icon;

	/**
	 * Whether the gateway has fields.
	 *
	 * @var bool $has_fields
	 */
	public $has_fields;

	/**
	 * Live URL for payment.
	 *
	 * @var string $liveurl
	 */
	public $liveurl;

	/**
	 * Test URL for payment.
	 *
	 * @var string $testurl
	 */
	public $testurl;

	/**
	 * Live URL for web service.
	 *
	 * @var string $liveurlws
	 */
	public $liveurlws;

	/**
	 * Test URL for web service.
	 *
	 * @var string $testurlws
	 */
	public $testurlws;

	/**
	 * Test SHA-256 key.
	 *
	 * @var string $testsha256
	 */
	public $testsha256;

	/**
	 * Whether the gateway is in test mode.
	 *
	 * @var bool $testmode
	 */
	public $testmode;

	/**
	 * Title of the payment method.
	 *
	 * @var string $method_title
	 */
	public $method_title;

	/**
	 * Description of the payment method.
	 *
	 * @var string $method_description
	 */
	public $method_description;

	/**
	 * Whether to use HTTPS.
	 *
	 * @var bool $not_use_https
	 */
	public $not_use_https;

	/**
	 * Notification URL.
	 *
	 * @var string $notify_url
	 */
	public $notify_url;

	/**
	 * Notification URL without HTTPS.
	 *
	 * @var string $notify_url_not_https
	 */
	public $notify_url_not_https;

	/**
	 * Logger instance.
	 *
	 * @var WC_Logger $log
	 */
	public $log;

	/**
	 * Supported features.
	 *
	 * @var array $supports
	 */
	public $supports;

	/**
	 * Title of the gateway.
	 *
	 * @var string $title
	 */
	public $title;

	/**
	 * Description of the gateway.
	 *
	 * @var string $description
	 */
	public $description;

	/**
	 * Customer ID.
	 *
	 * @var string $customer
	 */
	public $customer;

	/**
	 * Transaction limit.
	 *
	 * @var int $transactionlimit
	 */
	public $transactionlimit;

	/**
	 * Commerce name.
	 *
	 * @var string $commercename
	 */
	public $commercename;

	/**
	 * Terminal ID.
	 *
	 * @var string $terminal
	 */
	public $terminal;

	/**
	 * Secret SHA-256 key.
	 *
	 * @var string $secretsha256
	 */
	public $secretsha256;

	/**
	 * Custom test SHA-256 key.
	 *
	 * @var string $customtestsha256
	 */
	public $customtestsha256;

	/**
	 * Language for Redsys.
	 *
	 * @var string $redsyslanguage
	 */
	public $redsyslanguage;

	/**
	 * Whether debugging is enabled.
	 *
	 * @var bool $debug
	 */
	public $debug;

	/**
	 * Whether test mode is enabled for a user.
	 *
	 * @var bool $testforuser
	 */
	public $testforuser;

	/**
	 * User IDs for test mode.
	 *
	 * @var array $testforuserid
	 */
	public $testforuserid;

	/**
	 * Button text at checkout.
	 *
	 * @var string $buttoncheckout
	 */
	public $buttoncheckout;

	/**
	 * Button background color.
	 *
	 * @var string $butonbgcolor
	 */
	public $butonbgcolor;

	/**
	 * Button text color.
	 *
	 * @var string $butontextcolor
	 */
	public $butontextcolor;

	/**
	 * Description for Redsys.
	 *
	 * @var string $descripredsys
	 */
	public $descripredsys;

	/**
	 * User IDs to show gateway in test mode.
	 *
	 * @var array $testshowgateway
	 */
	public $testshowgateway;

	/**
	 * Whether the gateway is enabled.
	 *
	 * @var bool $enabled
	 */
	public $enabled;

	/**
	 * Constructor for the gateway.
	 *
	 * @return void
	 */
	public function __construct() {

		$this->id = 'googlepayredirecredsys';
		if ( ! empty( WCRed()->get_redsys_option( 'logo', 'googlepayredirecredsys' ) ) ) {
			$logo_url   = WCRed()->get_redsys_option( 'logo', 'googlepayredirecredsys' );
			$this->icon = apply_filters( 'woocommerce_' . $this->id . '_iconn', $logo_url );
		} else {
			$this->icon = apply_filters( 'woocommerce_' . $this->id . '_icon', REDSYS_PLUGIN_URL_P . 'assets/images/googlepay.png' );
		}
		$this->has_fields           = false;
		$this->liveurl              = 'https://sis.redsys.es/sis/realizarPago';
		$this->testurl              = 'https://sis-t.redsys.es:25443/sis/realizarPago';
		$this->liveurlws            = 'https://sis.redsys.es:443/sis/services/SerClsWSEntrada?wsdl';
		$this->testurlws            = 'https://sis-t.redsys.es:25443/sis/services/SerClsWSEntrada?wsdl';
		$this->testsha256           = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';
		$this->testmode             = WCRed()->get_redsys_option( 'testmode', 'googlepayredirecredsys' );
		$this->method_title         = __( 'Google Pay redirection (by José Conti)', 'woocommerce-redsys' );
		$this->method_description   = __( 'Google Pay redirection works redirecting customers to Redsys.', 'woocommerce-redsys' );
		$this->not_use_https        = WCRed()->get_redsys_option( 'not_use_https', 'googlepayredirecredsys' );
		$this->notify_url           = add_query_arg( 'wc-api', 'WC_Gateway_' . $this->id, home_url( '/' ) );
		$this->notify_url_not_https = str_replace( 'https:', 'http:', add_query_arg( 'wc-api', 'WC_Gateway_' . $this->id, home_url( '/' ) ) );
		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();
		// Define user set variables.
		$this->title            = WCRed()->get_redsys_option( 'title', 'googlepayredirecredsys' );
		$this->description      = WCRed()->get_redsys_option( 'description', 'googlepayredirecredsys' );
		$this->customer         = WCRed()->get_redsys_option( 'customer', 'googlepayredirecredsys' );
		$this->transactionlimit = WCRed()->get_redsys_option( 'transactionlimit', 'googlepayredirecredsys' );
		$this->commercename     = WCRed()->get_redsys_option( 'commercename', 'googlepayredirecredsys' );
		$this->terminal         = WCRed()->get_redsys_option( 'terminal', 'googlepayredirecredsys' );
		$this->secretsha256     = WCRed()->get_redsys_option( 'secretsha256', 'googlepayredirecredsys' );
		$this->customtestsha256 = WCRed()->get_redsys_option( 'customtestsha256', 'googlepayredirecredsys' );
		$this->redsyslanguage   = WCRed()->get_redsys_option( 'redsyslanguage', 'googlepayredirecredsys' );
		$this->debug            = WCRed()->get_redsys_option( 'debug', 'googlepayredirecredsys' );
		$this->testforuser      = WCRed()->get_redsys_option( 'testforuser', 'googlepayredirecredsys' );
		$this->testforuserid    = WCRed()->get_redsys_option( 'testforuserid', 'googlepayredirecredsys' );
		$this->buttoncheckout   = WCRed()->get_redsys_option( 'buttoncheckout', 'googlepayredirecredsys' );
		$this->butonbgcolor     = WCRed()->get_redsys_option( 'butonbgcolor', 'googlepayredirecredsys' );
		$this->butontextcolor   = WCRed()->get_redsys_option( 'butontextcolor', 'googlepayredirecredsys' );
		$this->descripredsys    = WCRed()->get_redsys_option( 'descripredsys', 'googlepayredirecredsys' );
		$this->testshowgateway  = WCRed()->get_redsys_option( 'testshowgateway', 'googlepayredirecredsys' );
		$this->supports         = array(
			'products',
			'refunds',
		);
		// Actions.
		add_action( 'valid_' . $this->id . '_standard_ipn_request', array( $this, 'successful_request' ) );
		add_action( 'woocommerce_receipt_' . $this->id, array( $this, 'receipt_page' ) );
		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		add_action( 'woocommerce_before_checkout_form', array( $this, 'warning_checkout_test_mode_bizum' ) );
		// Temporalmente desactivado mientras doy con el problema en esta función que ha dejado de funcionar.
		// add_filter( 'woocommerce_available_payment_gateways', array( $this, 'disable_bizum' ) );.
		add_filter( 'woocommerce_available_payment_gateways', array( $this, 'show_payment_method' ) );
		// La siguiente línea carga el JS para el iframe. Por si algun dia deja Bizum estar en un iframe.

		// Payment listener/API hook.
		add_action( 'woocommerce_api_wc_gateway_' . $this->id, array( $this, 'check_ipn_response' ) );

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
		<h3><?php esc_html_e( 'Google Pay redirection', 'woocommerce-redsys' ); ?></h3>
		<p><?php esc_html_e( 'Google Pay redirection works by sending the user to Redsys Gateway', 'woocommerce-redsys' ); ?></p>
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
		$selections = (array) WCRed()->get_redsys_option( 'testforuserid', 'googlepayredirecredsys' );

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
		$selections_show = (array) WCRed()->get_redsys_option( 'testshowgateway', 'googlepayredirecredsys' );
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
				'label'   => __( 'Enable Google Pay redirection', 'woocommerce-redsys' ),
				'default' => 'no',
			),
			'title'            => array(
				'title'       => __( 'Title', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce-redsys' ),
				'default'     => __( 'GPay', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'description'      => array(
				'title'       => __( 'Description', 'woocommerce-redsys' ),
				'type'        => 'textarea',
				'description' => __( 'This controls the description which the user sees during checkout.', 'woocommerce-redsys' ),
				'default'     => __( 'Pay via GPay you can pay with your Google account.', 'woocommerce-redsys' ),
			),
			'logo'             => array(
				'title'       => __( 'Gateway logo at checkout', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Add link to image logo for Gateway at checkout.', 'woocommerce-redsys' ),
			),
			'buttoncheckout'   => array(
				'title'       => __( 'Button Checkout Text', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Add the button text at the checkout.', 'woocommerce-redsys' ),
			),
			'butonbgcolor'     => array(
				'title'       => __( 'Button Color Background', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'This if button Color Background Place Order at Checkout', 'woocommerce-redsys' ),
				'class'       => 'colorpick',
			),
			'butontextcolor'   => array(
				'title'       => __( 'Color text Button', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'This if button text color Place Order at Checkout', 'woocommerce-redsys' ),
				'class'       => 'colorpick',
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
				'description' => __( 'Commerce Name', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'terminal'         => array(
				'title'       => __( 'Terminal number', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Terminal number provided by your bank.', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'transactionlimit' => array(
				'title'       => __( 'Transaction Limit', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Maximum transaction price for the cart.', 'woocommerce-redsys' ),
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
			'redsyslanguage'   => array(
				'title'       => __( 'Language Gateway', 'woocommerce-redsys' ),
				'type'        => 'select',
				'description' => __( 'Choose the language for the Gateway. Not all Banks accept all languages', 'woocommerce-redsys' ),
				'default'     => '001',
				'options'     => array(),
			),
			'testmode'         => array(
				'title'       => __( 'Running in test mode', 'woocommerce-redsys' ),
				'type'        => 'checkbox',
				'label'       => __( 'Running in test mode', 'woocommerce-redsys' ),
				'default'     => 'yes',
				'description' => sprintf( __( 'Select this option for the initial testing required by your bank, deselect this option once you pass the required test phase and your production environment is active.', 'woocommerce-redsys' ) ),
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
				'description' => __( 'Log GPay events, such as notifications requests, inside <code>WooCommerce > Status > Logs > googlepayredirecredsys-{date}-{number}.log</code>', 'woocommerce-redsys' ),
			),
		);
		$redsyslanguages   = WCRed()->get_redsys_languages();

		foreach ( $redsyslanguages as $redsyslanguage => $valor ) {
			$this->form_fields['redsyslanguage']['options'][ $redsyslanguage ] = $valor;
		}
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
		$selections      = (array) WCRed()->get_redsys_option( 'testforuserid', 'googlepayredirecredsys' );
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
			WCRed()->log( 'googlepayredirecredsys', '     Checking user test       ' );
			WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
			WCRed()->log( 'googlepayredirecredsys', ' ' );
		}

		if ( 'yes' === $usertest_active ) {

			if ( ! empty( $selections ) ) {
				foreach ( $selections as $user_id ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'googlepayredirecredsys', ' ' );
						WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
						WCRed()->log( 'googlepayredirecredsys', '   Checking user ' . $userid );
						WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
						WCRed()->log( 'googlepayredirecredsys', ' ' );
						WCRed()->log( 'googlepayredirecredsys', ' ' );
						WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
						WCRed()->log( 'googlepayredirecredsys', '  User in forach ' . $user_id );
						WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
						WCRed()->log( 'googlepayredirecredsys', ' ' );
					}
					if ( (string) $user_id === (string) $userid ) {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'googlepayredirecredsys', ' ' );
							WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
							WCRed()->log( 'googlepayredirecredsys', '   Checking user test TRUE    ' );
							WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
							WCRed()->log( 'googlepayredirecredsys', ' ' );
							WCRed()->log( 'googlepayredirecredsys', ' ' );
							WCRed()->log( 'googlepayredirecredsys', '/********************************************/' );
							WCRed()->log( 'googlepayredirecredsys', '  User ' . $userid . ' is equal to ' . $user_id );
							WCRed()->log( 'googlepayredirecredsys', '/********************************************/' );
							WCRed()->log( 'googlepayredirecredsys', ' ' );
						}
						return true;
					}
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'googlepayredirecredsys', ' ' );
						WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
						WCRed()->log( 'googlepayredirecredsys', '  Checking user test continue ' );
						WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
						WCRed()->log( 'googlepayredirecredsys', ' ' );
					}
					continue;
				}
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', '  Checking user test FALSE    ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
				}
				return false;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', '  Checking user test FALSE    ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
				}
				return false;
			}
		} else {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
				WCRed()->log( 'googlepayredirecredsys', '     User test Disabled.      ' );
				WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			return false;
		}
	}
	/**
	 * Check if this gateway is enabled by price
	 *
	 * @param array $available_gateways Available gateways.
	 *
	 * @return bool
	 */
	public function disable_bizum( $available_gateways ) {
		global $woocommerce;

		if ( ! is_admin() && WCRed()->is_gateway_enabled( 'googlepayredirecredsys' ) ) {
			$total = (int) $woocommerce->cart->get_cart_total();
			$limit = (int) $this->transactionlimit;
			if ( ! empty( $limit ) && $limit > 0 ) {
				$result = $limit - $total;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', '$total: ' . $total );
					WCRed()->log( 'googlepayredirecredsys', '$limit: ' . $limit );
					WCRed()->log( 'googlepayredirecredsys', '$result: ' . $result );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
				}
				if ( $result > 0 ) {
					return $available_gateways;
				} else {
					unset( $available_gateways['googlepayredirecredsys'] );
				}
			}
		}
		return $available_gateways;
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
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', '          URL Test RD         ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
				}
				$url = $this->testurl;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', '          URL Test WS         ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
				}
				$url = $this->testurlws;
			}
		} else {
			$user_test = $this->check_user_test_mode( $user_id );
			if ( $user_test ) {
				if ( 'rd' === $type ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'googlepayredirecredsys', ' ' );
						WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
						WCRed()->log( 'googlepayredirecredsys', '          URL Test RD         ' );
						WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
						WCRed()->log( 'googlepayredirecredsys', ' ' );
					}
					$url = $this->testurl;
				} else {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'googlepayredirecredsys', ' ' );
						WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
						WCRed()->log( 'googlepayredirecredsys', '          URL Test WS         ' );
						WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
						WCRed()->log( 'googlepayredirecredsys', ' ' );
					}
					$url = $this->testurlws;
				}
			} elseif ( 'rd' === $type ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', '          URL Live RD         ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
				}
				$url = $this->liveurl;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', '          URL Live WS         ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
				}
				$url = $this->liveurlws;
			}
		}
		return $url;
	}
	/**
	 * Get redsys SHA256
	 *
	 * @param int $user_id User ID.
	 *
	 * @return string
	 */
	public function get_redsys_sha256( $user_id ) {

		if ( 'yes' === $this->testmode ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
				WCRed()->log( 'googlepayredirecredsys', '         SHA256 Test.         ' );
				WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			$customtestsha256 = mb_convert_encoding( $this->customtestsha256, 'ISO-8859-1', 'UTF-8' );
			if ( ! empty( $customtestsha256 ) ) {
				$sha256 = $customtestsha256;
			} else {
				$sha256 = mb_convert_encoding( $this->testsha256, 'ISO-8859-1', 'UTF-8' );
			}
		} else {
			$user_test = $this->check_user_test_mode( $user_id );
			if ( $user_test ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', '      USER SHA256 Test.       ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
				}
				$customtestsha256 = mb_convert_encoding( $this->customtestsha256, 'ISO-8859-1', 'UTF-8' );
				if ( ! empty( $customtestsha256 ) ) {
					$sha256 = $customtestsha256;
				} else {
					$sha256 = mb_convert_encoding( $this->testsha256, 'ISO-8859-1', 'UTF-8' );
				}
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', '     USER SHA256 NOT Test.    ' );
					WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
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

		if ( has_filter( 'gpay_modify_data_to_send' ) ) {

			$gpay_data_send = apply_filters( 'gpay_modify_data_to_send', $gpay_data_send );

			if ( 'yes' === $redsys->debug ) {
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', 'Using filter gpay_modify_data_to_send' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
		}

		if ( 'yes' === $redsys->debug ) {
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', 'Data sent to GPay, $gpay_data_send: ' . print_r( $gpay_data_send, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'googlepayredirecredsys', ' ' );
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
			WCRed()->log( 'googlepayredirecredsys', 'Generating payment form for order ' . $order->get_order_number() . '. Sent data: ' . print_r( $redsys_args, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'googlepayredirecredsys', 'Helping to understand the encrypted code: ' );
			WCRed()->log( 'googlepayredirecredsys', 'DS_MERCHANT_AMOUNT: ' . $gpay_data_send['order_total_sign'] );
			WCRed()->log( 'googlepayredirecredsys', 'DS_MERCHANT_ORDER: ' . $gpay_data_send['transaction_id2'] );
			WCRed()->log( 'googlepayredirecredsys', 'DS_MERCHANT_TITULAR: ' . WCRed()->clean_data( $gpay_data_send['name'] ) . ' ' . WCRed()->clean_data( $gpay_data_send['lastname'] ) );
			WCRed()->log( 'googlepayredirecredsys', 'DS_MERCHANT_MERCHANTCODE: ' . $gpay_data_send['customer'] );
			WCRed()->log( 'googlepayredirecredsys', 'DS_MERCHANT_CURRENCY' . $gpay_data_send['currency'] );
			WCRed()->log( 'googlepayredirecredsys', 'DS_MERCHANT_TRANSACTIONTYPE: ' . $gpay_data_send['transaction_type'] );
			WCRed()->log( 'googlepayredirecredsys', 'DS_MERCHANT_TERMINAL: ' . $gpay_data_send['DSMerchantTerminal'] );
			WCRed()->log( 'googlepayredirecredsys', 'DS_MERCHANT_MERCHANTURL: ' . $gpay_data_send['final_notify_url'] );
			WCRed()->log( 'googlepayredirecredsys', 'DS_MERCHANT_URLOK: ' . $gpay_data_send['url_ok'] );
			WCRed()->log( 'googlepayredirecredsys', 'DS_MERCHANT_URLKO: ' . $gpay_data_send['returnfromredsys'] );
			WCRed()->log( 'googlepayredirecredsys', 'DS_MERCHANT_CONSUMERLANGUAGE: ' . $gpay_data_send['gatewaylanguage'] );
			WCRed()->log( 'googlepayredirecredsys', 'DS_MERCHANT_PRODUCTDESCRIPTION: ' . WCRed()->clean_data( $gpay_data_send['product_description'] ) );
			WCRed()->log( 'googlepayredirecredsys', 'DS_MERCHANT_PAYMETHODS: xpay' );
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
	 * @return string
	 */
	public function generate_redsys_form( $order_id ) {
		global $woocommerce;

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
			WCRed()->log( 'googlepayredirecredsys', '   Generating Redsys Form     ' );
			WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
			WCRed()->log( 'googlepayredirecredsys', ' ' );
		}

		$order           = WCRed()->get_order( $order_id );
		$user_id         = $order->get_user_id();
		$usesecretsha256 = $this->get_redsys_sha256( $user_id );
		$redsys_adr      = $this->get_redsys_url_gateway( $user_id );
		$redsys_args     = $this->get_redsys_args( $order );
		$form_inputs     = array();

		foreach ( $redsys_args as $key => $value ) {
			$form_inputs[] .= '<input type="hidden" name="' . $key . '" value="' . esc_attr( $value ) . '" />';
		}
		wc_enqueue_js(
			'
		$("body").block({
			message: "<img src=\"' . esc_url( apply_filters( 'woocommerce_ajax_loader_url', $woocommerce->plugin_url() . '/assets/images/select2-spinner.gif' ) ) . '\" alt=\"Redirecting&hellip;\" style=\"float:left; margin-right: 10px;\" />' . __( 'Thank you for your order. We are now redirecting you to Redsys to make the payment.', 'woocommerce-redsys' ) . '",
			overlayCSS:
			{
				background: "#fff",
				opacity: 0.6
			},
			css: {
				padding:		20,
				textAlign:		"center",
				color:			"#555",
				border:			"3px solid #aaa",
				backgroundColor:"#fff",
				cursor:			"wait",
				lineHeight:		"32px"
			}
		});
	jQuery("#submit_redsys_payment_form").click();
	'
		);
		return '<form action="' . esc_url( $redsys_adr ) . '" method="post" id="redsys_payment_form" target="_top">
		' . implode( '', $form_inputs ) . '
		<input type="submit" class="button-alt" id="submit_redsys_payment_form" value="' . __( 'Pay with Gpay', 'woocommerce-redsys' ) . '" /> <a class="button cancel" href="' . esc_url( $order->get_cancel_order_url() ) . '">' . __( 'Cancel order &amp; restore cart', 'woocommerce-redsys' ) . '</a>
	</form>';
	}

	/**
	 * Process the payment and return the result
	 *
	 * @param int $order_id Order ID.
	 * @return array
	 */
	public function process_payment( $order_id ) {
		$order = WCRed()->get_order( $order_id );
		return array(
			'result'   => 'success',
			'redirect' => $order->get_checkout_payment_url( true ),
		);
	}

	/**
	 * Output for the order received page.
	 *
	 * @param obj $order Order object.
	 */
	public function receipt_page( $order ) {
		echo '<p>' . esc_html__( 'Thank you for your order, please click the button below to pay with Google Pay.', 'woocommerce-redsys' ) . '</p>';
		echo $this->generate_redsys_form( $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Check redsys IPN validity
	 */
	public function check_ipn_request_is_valid() {

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'googlepayredirecredsys', 'HTTP Notification received 1: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
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
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', 'Signature from Redsys: ' . $remote_sign );
				WCRed()->log( 'googlepayredirecredsys', 'Name transient remote: redsys_signature_' . sanitize_title( $order_id ) );
				WCRed()->log( 'googlepayredirecredsys', 'Secret SHA256 transcient: ' . $secretsha256 );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}

			if ( 'yes' === $this->debug ) {
				$order_id = $mi_obj->get_parameter( 'Ds_Order' );
				WCRed()->log( 'googlepayredirecredsys', 'Order ID: ' . $order_id );
			}
			$order           = WCRed()->get_order( $order2 );
			$user_id         = $order->get_user_id();
			$usesecretsha256 = $this->get_redsys_sha256( $user_id );
			if ( empty( $secretsha256 ) && ! $secretsha256_meta ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', 'Using $usesecretsha256 Settings' );
					WCRed()->log( 'googlepayredirecredsys', 'Secret SHA256 Settings: ' . $usesecretsha256 );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
				}
				$usesecretsha256 = $usesecretsha256;
			} elseif ( $secretsha256_meta ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', 'Using $secretsha256_meta Meta' );
					WCRed()->log( 'googlepayredirecredsys', 'Secret SHA256 Meta: ' . $secretsha256_meta );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
				}
				$usesecretsha256 = $secretsha256_meta;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', 'Using $secretsha256 Transcient' );
					WCRed()->log( 'googlepayredirecredsys', 'Secret SHA256 Transcient: ' . $secretsha256 );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
				}
				$usesecretsha256 = $secretsha256;
			}
			$localsecret = $mi_obj->create_merchant_signature_notif( $usesecretsha256, $data );
			if ( $localsecret === $remote_sign ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', 'Received valid notification from Servired/RedSys' );
					WCRed()->log( 'googlepayredirecredsys', $data );
				}
				return true;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', 'Received INVALID notification from Servired/RedSys' );
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
				WCRed()->log( 'googlepayredirecredsys', 'HTTP Notification received 2: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}
			if ( $ds_merchant_code === $this->customer ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', 'Received valid notification from Servired/RedSys' );
				}
				return true;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', 'Received INVALID notification from Servired/RedSys' );
					WCRed()->log( 'googlepayredirecredsys', '$remote_sign: ' . $remote_sign );
					WCRed()->log( 'googlepayredirecredsys', '$localsecret: ' . $localsecret );
				}
				return false;
			}
		}
	}

	/**
	 * Check for Gpay HTTP Notification
	 */
	public function check_ipn_response() {
		@ob_clean(); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
		$_POST = stripslashes_deep( $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		if ( $this->check_ipn_request_is_valid() ) {
			header( 'HTTP/1.1 200 OK' );
			do_action( 'valid_' . $this->id . '_standard_ipn_request', $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		} else {
			wp_die( 'There is nothing to see here, do not access this page directly (Google Pay redirection)' );
		}
	}
	/**
	 * Successful Payment.
	 *
	 * @param array $posted Post data after notify.
	 */
	public function successful_request( $posted ) {

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
			WCRed()->log( 'googlepayredirecredsys', '      successful_request      ' );
			WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
			WCRed()->log( 'googlepayredirecredsys', ' ' );
		}

		if ( ! isset( $_POST['Ds_SignatureVersion'] ) || ! isset( $_POST['Ds_Signature'] ) || ! isset( $_POST['Ds_MerchantParameters'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			wp_die( 'Do not access this page directly ' );
		}

		$version     = sanitize_text_field( wp_unslash( $_POST['Ds_SignatureVersion'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		$data        = sanitize_text_field( wp_unslash( $_POST['Ds_MerchantParameters'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		$remote_sign = sanitize_text_field( wp_unslash( $_POST['Ds_Signature'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', '$version: ' . $version );
			WCRed()->log( 'googlepayredirecredsys', '$data: ' . $data );
			WCRed()->log( 'googlepayredirecredsys', '$remote_sign: ' . $remote_sign );
			WCRed()->log( 'googlepayredirecredsys', ' ' );
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
			WCRed()->log( 'googlepayredirecredsys', 'SHA256 Settings: ' . $usesecretsha256 );
			WCRed()->log( 'googlepayredirecredsys', 'SHA256 Transcient: ' . $secretsha256 );
			WCRed()->log( 'googlepayredirecredsys', 'decode_merchant_parameters: ' . $decodedata );
			WCRed()->log( 'googlepayredirecredsys', 'create_merchant_signature_notif: ' . $localsecret );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_Amount: ' . $total );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_Order: ' . $ordermi );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_MerchantCode: ' . $dscode );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_Currency: ' . $currency_code );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_Response: ' . $response );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_AuthorisationCode: ' . $id_trans );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_Date: ' . $dsdate );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_Hour: ' . $dshour );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_Terminal: ' . $dstermnal );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_MerchantData: ' . $dsmerchandata );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_SecurePayment: ' . $dssucurepayment );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_Card_Country: ' . $dscardcountry );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_ConsumerLanguage: ' . $dsconsumercountry );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_Card_Type: ' . $dscargtype );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_TransactionType: ' . $dstransactiontype );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_Merchant_Identifiers_Amount: ' . $response );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_Card_Brand: ' . $dscardbrand );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_MerchantData: ' . $dsmechandata );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_ErrorCode: ' . $dserrorcode );
			WCRed()->log( 'googlepayredirecredsys', 'Ds_PayMethod: ' . $dpaymethod );
		}

		// refund.
		if ( '3' === $dstransactiontype ) {
			if ( 900 === $response ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', 'Response 900 (refund)' );
				}
				set_transient( $order->get_id() . '_redsys_refund', 'yes' );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', 'WCRed()->update_order_meta to "refund yes"' );
				}
				$status = $order->get_status();
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', 'New Status in request: ' . $status );
				}
				$order->add_order_note( __( 'Order Payment refunded by Redsys', 'woocommerce-redsys' ) );
				return;
			}
			$order->add_order_note( __( 'There was an error refunding', 'woocommerce-redsys' ) );
			exit;
		}

		$response = intval( $response );
		if ( $response <= 99 ) {
			// authorized.
			$order_total_compare = number_format( $order->get_total(), 2, '', '' );
			// remove 0 from bigining.
			$order_total_compare = ltrim( $order_total_compare, '0' );
			$total               = ltrim( $total, '0' );
			if ( $order_total_compare !== $total ) {
				// amount does not match.
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', 'Payment error: Amounts do not match (order: ' . $order_total_compare . ' - received: ' . $total . ')' );
				}
				// Put this order on-hold for manual checking.
				/* translators: order an received are the amount */
				$order->update_status( 'on-hold', sprintf( __( 'Validation error: Order vs. Notification amounts do not match (order: %1$s - received: %2&s).', 'woocommerce-redsys' ), $order_total_compare, $total ) );
				exit;
			}
			$authorisation_code = $id_trans;

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
				WCRed()->log( 'googlepayredirecredsys', '      Saving Order Meta       ' );
				WCRed()->log( 'googlepayredirecredsys', '/****************************/' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			$data = array();
			if ( ! empty( $order1 ) ) {
				$data['_payment_order_number_redsys'] = $order1;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', '_payment_order_number_redsys saved: ' . $order1 );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '_payment_order_number_redsys NOT SAVED!!!' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			if ( ! empty( $dsdate ) ) {
				$data['_payment_date_redsys'] = $dsdate;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', '_payment_date_redsys saved: ' . $dsdate );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '_payment_date_redsys NOT SAVED!!!' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			if ( ! empty( $dsdate ) ) {
				$data['_payment_terminal_redsys'] = $dstermnal;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', '_payment_terminal_redsys saved: ' . $dstermnal );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '_payment_terminal_redsys NOT SAVED!!!' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			if ( ! empty( $dshour ) ) {
				$data['_payment_hour_redsys'] = $dshour;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', '_payment_hour_redsys saved: ' . $dshour );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '_payment_hour_redsys NOT SAVED!!!' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			if ( ! empty( $id_trans ) ) {
				$data['_authorisation_code_redsys'] = $authorisation_code;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', '_authorisation_code_redsys saved: ' . $authorisation_code );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '_authorisation_code_redsys NOT SAVED!!!' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			if ( ! empty( $currency_code ) ) {
				$data['_corruncy_code_redsys'] = $currency_code;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', '_corruncy_code_redsys saved: ' . $currency_code );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '_corruncy_code_redsys NOT SAVED!!!' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			if ( ! empty( $dscardcountry ) ) {
				$data['_card_country_redsys'] = $dscardcountry;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', '_card_country_redsys saved: ' . $dscardcountry );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '_card_country_redsys NOT SAVED!!!' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			// This meta is essential for later use.
			if ( ! empty( $secretsha256 ) ) {
				$data['_redsys_secretsha256'] = $secretsha256;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', '_redsys_secretsha256 saved: ' . $secretsha256 );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '_redsys_secretsha256 NOT SAVED!!!' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			if ( ! empty( $dscode ) ) {
				$data['_order_fuc_redsys'] = $dscode;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', '_order_fuc_redsys: ' . $dscode );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '_order_fuc_redsys NOT SAVED!!!' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			WCRed()->update_order_meta( $order->get_id(), $data );
			// Payment completed.
			$order->add_order_note( __( 'HTTP Notification received - payment completed', 'woocommerce-redsys' ) );
			$order->add_order_note( __( 'Authorization code: ', 'woocommerce-redsys' ) . $authorisation_code );
			$order->payment_complete();

			if ( 'completed' === $this->orderdo ) {
				$order->update_status( 'completed', __( 'Order Completed by Gpay', 'woocommerce-redsys' ) );
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', 'Payment complete.' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '/******************************************/' );
				WCRed()->log( 'googlepayredirecredsys', '  The final has come, this story has ended  ' );
				WCRed()->log( 'googlepayredirecredsys', '/******************************************/' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			do_action( $this->id . '_post_payment_complete', $order->get_id() );
		} else {
			$data              = array();
			$ds_response_value = WCRed()->get_error( $response );
			$ds_error_value    = WCRed()->get_error( $dserrorcode );

			if ( $ds_response_value ) {
				$order->add_order_note( __( 'Order cancelled by Redsys: ', 'woocommerce-redsys' ) . $ds_response_value );
				$data['_redsys_error_payment_ds_response_value'] = $ds_response_value;
			}

			if ( $ds_error_value ) {
				$order->add_order_note( __( 'Order cancelled by Redsys: ', 'woocommerce-redsys' ) . $ds_error_value );
				$data['_redsys_error_payment_ds_response_value'] = $ds_error_value;
			}
			WCRed()->update_order_meta( $order->get_id(), $data );
			if ( 'yes' === $this->debug ) {
				if ( $ds_response_value ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', $ds_response_value );
				}
				if ( $ds_error_value ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', $ds_error_value );
				}
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '/******************************************/' );
				WCRed()->log( 'googlepayredirecredsys', '  The final has come, this story has ended  ' );
				WCRed()->log( 'googlepayredirecredsys', '/******************************************/' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			// Order cancelled.
			$order->update_status( 'cancelled', __( 'Order cancelled by Redsys Gpay', 'woocommerce-redsys' ) );
			$order->add_order_note( __( 'Order cancelled by Redsys Gpay', 'woocommerce-redsys' ) );
			WC()->cart->empty_cart();
			if ( ! $ds_response_value ) {
				$ds_response_value = '';
			}
			if ( ! $ds_error_value ) {
				$ds_error_value = '';
			}
			$error = $ds_response_value . ' ' . $ds_error_value;
			do_action( $this->id . '_post_payment_error', $order->get_id(), $error );
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
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', '/**************************/' );
			WCRed()->log( 'googlepayredirecredsys', __( 'Starting asking for Refund', 'woocommerce-redsys' ) );
			WCRed()->log( 'googlepayredirecredsys', '/**************************/' );
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', __( 'Terminal : ', 'woocommerce-redsys' ) . $terminal );
		}
		$transaction_type  = '3';
		$secretsha256_meta = WCRed()->get_order_meta( $order_id, '_redsys_secretsha256', true );
		if ( $secretsha256_meta ) {
			$secretsha256 = $secretsha256_meta;
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', __( 'Using meta for SHA256', 'woocommerce-redsys' ) );
				WCRed()->log( 'googlepayredirecredsys', __( 'The SHA256 Meta is: ', 'woocommerce-redsys' ) . $secretsha256 );
			}
		} else {
			$secretsha256 = $secretsha256;
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', __( 'Using settings for SHA256', 'woocommerce-redsys' ) );
				WCRed()->log( 'googlepayredirecredsys', __( 'The SHA256 settings is: ', 'woocommerce-redsys' ) . $secretsha256 );
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
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', __( 'All data from meta', 'woocommerce-redsys' ) );
			WCRed()->log( 'googlepayredirecredsys', '**********************' );
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', __( 'If something is empty, the data was not saved', 'woocommerce-redsys' ) );
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', __( 'All data from meta', 'woocommerce-redsys' ) );
			WCRed()->log( 'googlepayredirecredsys', __( 'Authorization Code : ', 'woocommerce-redsys' ) . $autorization_code );
			WCRed()->log( 'googlepayredirecredsys', __( 'Authorization Date : ', 'woocommerce-redsys' ) . $autorization_date );
			WCRed()->log( 'googlepayredirecredsys', __( 'Currency Codey : ', 'woocommerce-redsys' ) . $currencycode );
			WCRed()->log( 'googlepayredirecredsys', __( 'Terminal : ', 'woocommerce-redsys' ) . $terminal );
			WCRed()->log( 'googlepayredirecredsys', __( 'SHA256 : ', 'woocommerce-redsys' ) . $secretsha256_meta );
			WCRed()->log( 'googlepayredirecredsys', __( 'FUC : ', 'woocommerce-redsys' ) . $order_fuc );
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
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', __( 'Data sent to Redsys for refund', 'woocommerce-redsys' ) );
			WCRed()->log( 'googlepayredirecredsys', '*********************************' );
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', __( 'URL to Redsys : ', 'woocommerce-redsys' ) . $redsys_adr );
			WCRed()->log( 'googlepayredirecredsys', __( 'DS_MERCHANT_AMOUNT : ', 'woocommerce-redsys' ) . $amount );
			WCRed()->log( 'googlepayredirecredsys', __( 'DS_MERCHANT_ORDER : ', 'woocommerce-redsys' ) . $transaction_id );
			WCRed()->log( 'googlepayredirecredsys', __( 'DS_MERCHANT_MERCHANTCODE : ', 'woocommerce-redsys' ) . $order_fuc );
			WCRed()->log( 'googlepayredirecredsys', __( 'DS_MERCHANT_CURRENCY : ', 'woocommerce-redsys' ) . $currency );
			WCRed()->log( 'googlepayredirecredsys', __( 'DS_MERCHANT_TRANSACTIONTYPE : ', 'woocommerce-redsys' ) . $transaction_type );
			WCRed()->log( 'googlepayredirecredsys', __( 'DS_MERCHANT_TERMINAL : ', 'woocommerce-redsys' ) . $terminal );
			WCRed()->log( 'googlepayredirecredsys', __( 'DS_MERCHANT_MERCHANTURL : ', 'woocommerce-redsys' ) . $final_notify_url );
			WCRed()->log( 'googlepayredirecredsys', __( 'DS_MERCHANT_URLOK : ', 'woocommerce-redsys' ) . add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ) );
			WCRed()->log( 'googlepayredirecredsys', __( 'DS_MERCHANT_URLKO : ', 'woocommerce-redsys' ) . $order->get_cancel_order_url() );
			WCRed()->log( 'googlepayredirecredsys', __( 'DS_MERCHANT_CONSUMERLANGUAGE : 001', 'woocommerce-redsys' ) );
			WCRed()->log( 'googlepayredirecredsys', __( 'DS_MERCHANT_PRODUCTDESCRIPTION : ', 'woocommerce-redsys' ) . WCRed()->clean_data( WCRed()->product_description( $order, $this->id ) ) );
			WCRed()->log( 'googlepayredirecredsys', __( 'DS_MERCHANT_MERCHANTNAME : ', 'woocommerce-redsys' ) . $this->commercename );
			WCRed()->log( 'googlepayredirecredsys', __( 'DS_MERCHANT_AUTHORISATIONCODE : ', 'woocommerce-redsys' ) . $autorization_code );
			WCRed()->log( 'googlepayredirecredsys', __( 'Ds_Merchant_TransactionDate : ', 'woocommerce-redsys' ) . $autorization_date );
			WCRed()->log( 'googlepayredirecredsys', __( 'ask_for_refund Asking por order #: ', 'woocommerce-redsys' ) . $order_id );
			WCRed()->log( 'googlepayredirecredsys', ' ' );
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
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', __( 'There is an error', 'woocommerce-redsys' ) );
				WCRed()->log( 'googlepayredirecredsys', '*********************************' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', __( 'The error is : ', 'woocommerce-redsys' ) . $post_arg );
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
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', __( 'Checking and waiting ping from Redsys', 'woocommerce-redsys' ) );
			WCRed()->log( 'googlepayredirecredsys', '*****************************************' );
			WCRed()->log( 'googlepayredirecredsys', ' ' );
			WCRed()->log( 'googlepayredirecredsys', __( 'Check order status #: ', 'woocommerce-redsys' ) . $order->get_id() );
			WCRed()->log( 'googlepayredirecredsys', __( 'Check order status with get_transient: ', 'woocommerce-redsys' ) . $order_refund );
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
			WCRed()->log( 'googlepayredirecredsys', __( '$order_id#: ', 'woocommerce-redsys' ) . $transaction_id );
		}
		if ( ! $amount ) {
			$order_total_sign = WCRed()->redsys_amount_format( $order->get_total() );
		} else {
			$order_total_sign = number_format( $amount, 2, '', '' );
		}

		if ( ! empty( $transaction_id ) ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'googlepayredirecredsys', __( 'check_redsys_refund Asking for order #: ', 'woocommerce-redsys' ) . $order_id );
			}

			$refund_asked = $this->ask_for_refund( $order_id, $transaction_id, $order_total_sign );

			if ( is_wp_error( $refund_asked ) ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'googlepayredirecredsys', __( 'Refund Failed: ', 'woocommerce-redsys' ) . $refund_asked->get_error_message() );
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
				WCRed()->log( 'googlepayredirecredsys', __( 'check_redsys_refund = true ', 'woocommerce-redsys' ) . $result );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '/********************************/' );
				WCRed()->log( 'googlepayredirecredsys', '  Refund complete by Redsys   ' );
				WCRed()->log( 'googlepayredirecredsys', '/********************************/' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '/******************************************/' );
				WCRed()->log( 'googlepayredirecredsys', '  The final has come, this story has ended  ' );
				WCRed()->log( 'googlepayredirecredsys', '/******************************************/' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			if ( 'yes' === $this->debug && ! $result ) {
				WCRed()->log( 'googlepayredirecredsys', __( 'check_redsys_refund = false ', 'woocommerce-redsys' ) . $result );
			}
			if ( $result ) {
				delete_transient( $order->get_id() . '_redsys_refund' );
				return true;
			} else {
				if ( 'yes' === $this->debug && $result ) {
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!' );
					WCRed()->log( 'googlepayredirecredsys', __( '!!!!Refund Failed, please try again!!!!', 'woocommerce-redsys' ) );
					WCRed()->log( 'googlepayredirecredsys', '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!' );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
					WCRed()->log( 'googlepayredirecredsys', '/******************************************/' );
					WCRed()->log( 'googlepayredirecredsys', '  The final has come, this story has ended  ' );
					WCRed()->log( 'googlepayredirecredsys', '/******************************************/' );
					WCRed()->log( 'googlepayredirecredsys', ' ' );
				}
				return false;
			}
		} else {
			if ( 'yes' === $this->debug && $result ) {
				WCRed()->log( 'googlepayredirecredsys', __( 'Refund Failed: No transaction ID', 'woocommerce-redsys' ) );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
				WCRed()->log( 'googlepayredirecredsys', '/******************************************/' );
				WCRed()->log( 'googlepayredirecredsys', '  The final has come, this story has ended  ' );
				WCRed()->log( 'googlepayredirecredsys', '/******************************************/' );
				WCRed()->log( 'googlepayredirecredsys', ' ' );
			}
			return new WP_Error( 'error', __( 'Refund Failed: No transaction ID', 'woocommerce-redsys' ) );
		}
	}
	/**
	 * Warning when GPay is in test mode.
	 */
	public function warning_checkout_test_mode_bizum() {
		if ( 'yes' === $this->testmode && WCRed()->is_gateway_enabled( $this->id ) ) {
			echo '<div class="checkout-message" style="
			background-color: rgb(3, 166, 120);
			padding: 1em 1.618em;
			margin-bottom: 2.617924em;
			margin-left: 0;
			border-radius: 2px;
			color: #fff;
			clear: both;
			border-left: 0.6180469716em solid rgb(1, 152, 117);
			">';
			echo esc_html__( 'Warning: WooCommerce Redsys Gpay is in test mode. Remember to uncheck it when you go live', 'woocommerce-redsys' );
			echo '</div>';
		}
	}
	/**
	 * Check if user is in test mode
	 *
	 * @param int $userid User ID.
	 */
	public function check_user_show_payment_method( $userid = false ) {

		$test_mode  = $this->testmode;
		$selections = (array) WCRed()->get_redsys_option( 'testshowgateway', 'googlepayredirecredsys' );

		if ( 'yes' !== $test_mode ) {
			return true;
		}
		if ( '' !== $selections[0] || empty( $selections ) ) {
			if ( ! $userid ) {
				return false;
			}
			foreach ( $selections as $user_id ) {
				if ( (int) $user_id === (int) $userid ) {
					return true;
				}
				continue;
			}
			return false;
		} else {
			return true;
		}
	}
	/**
	 * Check if show gateway.
	 *
	 * @param array $available_gateways Available gateways.
	 */
	public function show_payment_method( $available_gateways ) {

		if ( ! is_admin() ) {
			if ( is_user_logged_in() ) {
				$user_id = get_current_user_id();
				$show    = $this->check_user_show_payment_method( $user_id );
				if ( ! $show ) {
					unset( $available_gateways[ $this->id ] );
				}
			} else {
				$show = $this->check_user_show_payment_method();
				if ( ! $show ) {
					unset( $available_gateways[ $this->id ] );
				}
			}
		}
		return $available_gateways;
	}
}
/**
 * Add the gateway to WooCommerce
 *
 * @param array $methods WooCommerce payment methods.
 */
function woocommerce_add_gateway_googlepay_redirection_redsys( $methods ) { // phpcs:ignore Universal.Files.SeparateFunctionsFromOO.Mixed
		$methods[] = 'WC_Gateway_GooglePay_Redirection_Redsys';
		return $methods;
}
add_filter( 'woocommerce_payment_gateways', 'woocommerce_add_gateway_googlepay_redirection_redsys' );
