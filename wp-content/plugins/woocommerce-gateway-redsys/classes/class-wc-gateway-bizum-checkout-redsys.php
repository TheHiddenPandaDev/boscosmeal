<?php
/**
 * Bizum Checkout Gateway
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
 */

defined( 'ABSPATH' ) || exit;
/**
 * WC_Gateway_Bizum_Checkout_Redsys Class.
 */
class WC_Gateway_Bizum_Checkout_Redsys extends WC_Payment_Gateway {

	/**
	 * The ID of the gateway.
	 *
	 * @var string
	 */
	public $id;

	/**
	 * Indicates if the gateway has fields on the checkout form.
	 *
	 * @var bool
	 */
	public $has_fields;

	/**
	 * The live URL for making payments.
	 *
	 * @var string
	 */
	public $liveurl;

	/**
	 * The test URL for making payments.
	 *
	 * @var string
	 */
	public $testurl;

	/**
	 * The live URL for the web service.
	 *
	 * @var string
	 */
	public $liveurlws;

	/**
	 * The test URL for the web service.
	 *
	 * @var string
	 */
	public $testurlws;

	/**
	 * The test URL for checking Bizum.
	 *
	 * @var string
	 */
	public $checkbizumtesturl;

	/**
	 * The live URL for checking Bizum.
	 *
	 * @var string
	 */
	public $checkbizum;

	/**
	 * The test URL for checking Bizum payments.
	 *
	 * @var string
	 */
	public $checkbizumtesturlpay;

	/**
	 * The live URL for checking Bizum payments.
	 *
	 * @var string
	 */
	public $checkbizumpay;

	/**
	 * The test SHA256 for testing purposes.
	 *
	 * @var string
	 */
	public $testsha256;

	/**
	 * The test mode for the gateway.
	 *
	 * @var string
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
	 * Indicates if HTTPS is not used.
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
	 * The notify URL for the gateway without HTTPS.
	 *
	 * @var string
	 */
	public $notify_url_not_https;

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
	 * The customer name for the gateway.
	 *
	 * @var string
	 */
	public $customer;

	/**
	 * The transaction limit for the gateway.
	 *
	 * @var string
	 */
	public $transactionlimit;

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
	 * The custom test SHA256 for testing purposes.
	 *
	 * @var string
	 */
	public $customtestsha256;

	/**
	 * The language for the gateway.
	 *
	 * @var string
	 */
	public $redsyslanguage;

	/**
	 * Indicates if debug mode is enabled.
	 *
	 * @var bool
	 */
	public $debug;

	/**
	 * Indicates if the gateway is for testing a specific user.
	 *
	 * @var bool
	 */
	public $testforuser;

	/**
	 * The user ID for testing a specific user.
	 *
	 * @var int
	 */
	public $testforuserid;

	/**
	 * The button text for checkout.
	 *
	 * @var string
	 */
	public $buttoncheckout;

	/**
	 * The background color for the button.
	 *
	 * @var string
	 */
	public $butonbgcolor;

	/**
	 * The text color for the button.
	 *
	 * @var string
	 */
	public $butontextcolor;

	/**
	 * The description for the gateway.
	 *
	 * @var string
	 */
	public $descripredsys;

	/**
	 * Indicates if the gateway should be shown in the test mode.
	 *
	 * @var bool
	 */
	public $testshowgateway;

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
	 * Constructor for the gateway.
	 *
	 * @return void
	 */
	public function __construct() {

		$this->id = 'bizumcheckout';
		if ( ! empty( WCRed()->get_redsys_option( 'logo', 'bizumcheckout' ) ) ) {
			$logo_url   = WCRed()->get_redsys_option( 'logo', 'bizumcheckout' );
			$this->icon = apply_filters( 'woocommerce_' . $this->id . '_iconn', $logo_url );
		} else {
			$this->icon = apply_filters( 'woocommerce_' . $this->id . '_icon', REDSYS_PLUGIN_URL_P . 'assets/images/bizum.png' );
		}
		$this->has_fields           = true;
		$this->liveurl              = 'https://sis.redsys.es/sis/realizarPago';
		$this->testurl              = 'https://sis-t.redsys.es:25443/sis/realizarPago';
		$this->liveurlws            = 'https://sis.redsys.es:443/sis/services/SerClsWSEntrada?wsdl';
		$this->testurlws            = 'https://sis-t.redsys.es:25443/sis/services/SerClsWSEntrada?wsdl';
		$this->checkbizumtesturl    = 'https://sis-t.redsys.es:25443/sis/rest/RTP/checkRtpUsuario';
		$this->checkbizum           = 'https://sis.redsys.es/sis/rest/RTP/checkRtpUsuario';
		$this->checkbizumtesturlpay = 'https://sis-t.redsys.es:25443/sis/rest/entradaREST';
		$this->checkbizumpay        = 'https://sis.redsys.es/sis/rest/entradaREST';
		$this->testsha256           = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';
		$this->testmode             = WCRed()->get_redsys_option( 'testmode', 'bizumcheckout' );
		$this->method_title         = __( 'Bizum in the Checkout (by José Conti)', 'woocommerce-redsys' );
		$this->method_description   = __( 'The use of Bizum at the checkout involves integrating Bizum into the payment process or redirecting the user to the Bizum Gateway if they don\'t have the app authentication.', 'woocommerce-redsys' );
		$this->not_use_https        = WCRed()->get_redsys_option( 'not_use_https', 'bizumcheckout' );
		$this->notify_url           = add_query_arg( 'wc-api', 'WC_Gateway_' . $this->id, home_url( '/' ) );
		$this->notify_url_not_https = str_replace( 'https:', 'http:', add_query_arg( 'wc-api', 'WC_Gateway_' . $this->id, home_url( '/' ) ) );
		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();
		// Define user set variables.
		$this->title            = WCRed()->get_redsys_option( 'title', 'bizumcheckout' );
		$this->description      = WCRed()->get_redsys_option( 'description', 'bizumcheckout' );
		$this->customer         = WCRed()->get_redsys_option( 'customer', 'bizumcheckout' );
		$this->transactionlimit = WCRed()->get_redsys_option( 'transactionlimit', 'bizumcheckout' );
		$this->commercename     = WCRed()->get_redsys_option( 'commercename', 'bizumcheckout' );
		$this->terminal         = WCRed()->get_redsys_option( 'terminal', 'bizumcheckout' );
		$this->secretsha256     = WCRed()->get_redsys_option( 'secretsha256', 'bizumcheckout' );
		$this->customtestsha256 = WCRed()->get_redsys_option( 'customtestsha256', 'bizumcheckout' );
		$this->redsyslanguage   = WCRed()->get_redsys_option( 'redsyslanguage', 'bizumcheckout' );
		$this->debug            = WCRed()->get_redsys_option( 'debug', 'bizumcheckout' );
		$this->testforuser      = WCRed()->get_redsys_option( 'testforuser', 'bizumcheckout' );
		$this->testforuserid    = WCRed()->get_redsys_option( 'testforuserid', 'bizumcheckout' );
		$this->buttoncheckout   = WCRed()->get_redsys_option( 'buttoncheckout', 'bizumcheckout' );
		$this->butonbgcolor     = WCRed()->get_redsys_option( 'butonbgcolor', 'bizumcheckout' );
		$this->butontextcolor   = WCRed()->get_redsys_option( 'butontextcolor', 'bizumcheckout' );
		$this->descripredsys    = WCRed()->get_redsys_option( 'descripredsys', 'bizumcheckout' );
		$this->testshowgateway  = WCRed()->get_redsys_option( 'testshowgateway', 'bizumcheckout' );
		$this->supports         = array(
			'products',
			'refunds',
		);
		// Actions.
		add_action( 'valid_' . $this->id . '_standard_ipn_request', array( $this, 'successful_request' ) );
		add_action( 'woocommerce_receipt_' . $this->id, array( $this, 'receipt_page' ) );
		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		add_action( 'woocommerce_before_checkout_form', array( $this, 'warning_checkout_test_mode_bizum' ) );
		add_action( 'woocommerce_checkout_update_order_meta', array( $this, 'save_field_update_order_meta' ) );
		// Temporalmente desactivado mientras doy con el problema en esta función que ha dejado de funcionar.
		// add_filter( 'woocommerce_available_payment_gateways', array( $this, 'disable_bizum' ) );.
		add_filter( 'woocommerce_available_payment_gateways', array( $this, 'show_payment_method' ) );
		// La siguiente línea carga el JS para el iframe. Por si algun dia deja Bizum estar en un iframe
		// add_action( 'woocommerce_after_checkout_form', array( $this, 'custom_jquery_checkout' ) );.

		// Payment listener/API hook.
		add_action( 'woocommerce_api_wc_gateway_' . $this->id, array( $this, 'check_ipn_response' ) );
		add_action( 'woocommerce_after_checkout_form', array( $this, 'custom_jquery_checkout' ) );
		 // phpcs:ignore Squiz.PHP.CommentedOutCode.Found
		// add_action( 'wp_ajax_verificar_estado_pago', array( $this, 'verificar_estado_pago_ajax' ) );
		// add_action( 'wp_ajax_nopriv_verificar_estado_pago', array( $this, 'verificar_estado_pago_ajax' ) );.

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
		<h3><?php esc_html_e( 'Bizum in the Checkout', 'woocommerce-redsys' ); ?></h3>
		<p><?php esc_html_e( 'The use of Bizum at the checkout involves integrating Bizum into the payment process or redirecting the user to the Bizum Gateway if they don\'t have the app authentication.', 'woocommerce-redsys' ); ?></p>
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
		$selections = (array) WCRed()->get_redsys_option( 'testforuserid', 'bizumcheckout' );

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
		$selections_show = (array) WCRed()->get_redsys_option( 'testshowgateway', 'bizumcheckout' );
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
				'label'   => __( 'Enable Bizum', 'woocommerce-redsys' ),
				'default' => 'no',
			),
			'title'            => array(
				'title'       => __( 'Title', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce-redsys' ),
				'default'     => __( 'Bizum', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'description'      => array(
				'title'       => __( 'Description', 'woocommerce-redsys' ),
				'type'        => 'textarea',
				'description' => __( 'This controls the description which the user sees during checkout.', 'woocommerce-redsys' ),
				'default'     => __( 'Pay via Bizum you can pay with your Bizum account.', 'woocommerce-redsys' ),
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
				'description' => __( 'Log Bizum events, such as notifications requests, inside <code>WooCommerce > Status > Logs > bizum-{date}-{number}.log</code>', 'woocommerce-redsys' ),
			),
		);
		$redsyslanguages   = WCRed()->get_redsys_languages();

		foreach ( $redsyslanguages as $redsyslanguage => $valor ) {
			$this->form_fields['redsyslanguage']['options'][ $redsyslanguage ] = $valor;
		}
	}
	/**
	 * Check the Bizum phone nunmer.
	 *
	 * @param object $order Order object.
	 * @param string $phone Phone number.
	 */
	public function check_bizum_phone( $order, $phone ) {

		if ( 'yes' === $this->testmode ) {
			$resturl = $this->checkbizumtesturl;
		} else {
			$resturl = $this->checkbizum;
		}

		$order_id       = WCRed()->prepare_order_number( $order->get_id() );
		$fuc            = $this->customer;
		$terminal       = $this->terminal;
		$currency_codes = WCRed()->get_currencies();
		$currency       = $currency_codes[ get_woocommerce_currency() ];
		$amount         = WCRed()->redsys_amount_format( $order->get_total() );
		$user_id        = $order->get_user_id();
		$secretsha256   = $this->get_redsys_sha256( $user_id );
		WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $order_id );

		/**
		 * DS_MERCHANT_ORDER
		 * DS_MERCHANT_MERCHANTCODE
		 * DS_MERCHANT_TERMINAL
		 * DS_MERCHANT_CURRENCY
		 * DS_MERCHANT_AMOUNT
		 * DS_MERCHANT_BIZUM_MOBILENUMBER
		 */

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'bizumcheckout', '$order_id: ' . $order_id );
			WCRed()->log( 'bizumcheckout', '$fuc: ' . $fuc );
			WCRed()->log( 'bizumcheckout', '$terminal: ' . $terminal );
			WCRed()->log( 'bizumcheckout', '$currency: ' . $currency );
			WCRed()->log( 'bizumcheckout', '$amount: ' . $amount );
			WCRed()->log( 'bizumcheckout', '$phone: ' . $phone );
			WCRed()->log( 'bizumcheckout', '$resturl: ' . $resturl );
		}

		$mi_obj = new WooRedsysAPI();
		$mi_obj->set_parameter( 'DS_MERCHANT_ORDER', $order_id );
		$mi_obj->set_parameter( 'DS_MERCHANT_MERCHANTCODE', $fuc );
		$mi_obj->set_parameter( 'DS_MERCHANT_TERMINAL', $terminal );
		$mi_obj->set_parameter( 'DS_MERCHANT_CURRENCY', $currency );
		$mi_obj->set_parameter( 'DS_MERCHANT_AMOUNT', $amount );
		$mi_obj->set_parameter( 'DS_MERCHANT_BIZUM_MOBILENUMBER', $phone );

		$version   = 'HMAC_SHA256_V1';
		$post_arg  = '';
		$params    = $mi_obj->create_merchant_parameters();
		$signature = $mi_obj->create_merchant_signature( $secretsha256 );

		$post_arg = wp_remote_post(
			$resturl,
			array(
				'method'      => 'POST',
				'timeout'     => 45,
				'httpversion' => '1.0',
				'user-agent'  => 'Redsys Gateway ' . REDSYS_VERSION,
				'body'        => array(
					'Ds_SignatureVersion'   => $version,
					'Ds_MerchantParameters' => $params,
					'Ds_Signature'          => $signature,
				),
			)
		);
		if ( is_wp_error( $post_arg ) ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', __( 'There is an error', 'woocommerce-redsys' ) );
				WCRed()->log( 'bizumcheckout', '*********************************' );
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', __( 'The error is : ', 'woocommerce-redsys' ) . $post_arg );
			}
			 // phpcs:ignore Squiz.PHP.CommentedOutCode.Found
			// return $post_arg;.
		}
		$response_body       = wp_remote_retrieve_body( $post_arg );
		$json_decode_params  = json_decode( $response_body ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		$merchant_parameters = $json_decode_params->Ds_MerchantParameters; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		if ( 'yes' === $this->debug ) {
			 // phpcs:ignore Squiz.PHP.CommentedOutCode.Found
			// WCRed()->log( 'bizumcheckout', '$post_arg: ' . print_r( $post_arg, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r.
			// WCRed()->log( 'bizumcheckout', '$response_body: ' . $response_body );
			// WCRed()->log( 'bizumcheckout', '$json_decode_params: ' . print_r( $json_decode_params, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r.
			WCRed()->log( 'bizumcheckout', '$merchant_parameters: ' . $merchant_parameters ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
		}

		/**
		 * Return:
		 * Ds_RtpStatus
		 * Ds_RtpResponse
		 * Ds_RtpDescription
		 */

		$mi_obj->decode_merchant_parameters( $merchant_parameters );
		$ds_rtpstatus      = $mi_obj->get_parameter( 'Ds_RtpStatus' );
		$ds_rtpresponse    = $mi_obj->get_parameter( 'Ds_RtpResponse' );
		$ds_rtpdescription = $mi_obj->get_parameter( 'Ds_RtpDescription' );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'bizumcheckout', '$ds_rtpstatus: ' . $ds_rtpstatus );
			WCRed()->log( 'bizumcheckout', '$ds_rtpresponse: ' . $ds_rtpresponse );
			WCRed()->log( 'bizumcheckout', '$ds_rtpdescription: ' . $ds_rtpdescription );
		}

		if ( 'OK' === $ds_rtpstatus && 'BIZ00000' === $ds_rtpresponse ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', 'Es Bizum Rest' );
			}
			$order->add_order_note( __( 'The payment via Bizum must be authenticated through the bank\'s app.', 'woocommerce-redsys' ) );
			return 'rest';
		}
		if ( 'KO' === $ds_rtpstatus && 'BIZ00000' === $ds_rtpresponse ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', 'Es Bizum Redirección' );
			}
			$order->add_order_note( __( 'The customer has been redirected to the Bizum page.', 'woocommerce-redsys' ) );
			return 'redirect';
		}
		if ( 'KO' === $ds_rtpstatus && ( 'BIZ00209' === $ds_rtpresponse || 'BIZ00009' === $ds_rtpresponse ) ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', 'No tiene Bizum' );
			}
			$order->add_order_note( __( 'The user has selected Bizum as the payment method but does not have Bizum associated with their phone number.', 'woocommerce-redsys' ) );
			return false;
		}
		if ( $ds_rtpdescription ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', 'Ha habido un error: ' . $ds_rtpdescription );
			}
			return $ds_rtpdescription;
		}
		return 'error';
	}

	/**
	 * Check the Bizum phone nunmer.
	 *
	 * @param object $order Order object.
	 * @param string $phone Phone number.
	 */
	public function bizum_payment_rest( $order, $phone ) {

		if ( 'yes' === $this->testmode ) {
			$resturl = $this->checkbizumtesturlpay;
		} else {
			$resturl = $this->checkbizumpay;
		}

		if ( 'yes' === $this->not_use_https ) {
			$final_notify_url = $this->notify_url_not_https;
		} else {
			$final_notify_url = $this->notify_url;
		}

		if ( strpos( $phone, '+' ) !== 0 ) {
			$phone = '+34' . $phone;
		}

		$order_id       = WCRed()->get_redsys_order_number( $order->get_id() );
		$fuc            = $this->customer;
		$terminal       = $this->terminal;
		$currency_codes = WCRed()->get_currencies();
		$currency       = $currency_codes[ get_woocommerce_currency() ];
		$amount         = WCRed()->redsys_amount_format( $order->get_total() );
		$user_id        = $order->get_user_id();
		$secretsha256   = $this->get_redsys_sha256( $user_id );

		/**
		 * DS_MERCHANT_ORDER
		 * DS_MERCHANT_MERCHANTCODE
		 * DS_MERCHANT_TERMINAL
		 * DS_MERCHANT_CURRENCY
		 * DS_MERCHANT_AMOUNT
		 * DS_MERCHANT_BIZUM_MOBILENUMBER
		 */

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'bizumcheckout', '$order_id: ' . $order_id );
			WCRed()->log( 'bizumcheckout', '$fuc: ' . $fuc );
			WCRed()->log( 'bizumcheckout', '$terminal: ' . $terminal );
			WCRed()->log( 'bizumcheckout', '$currency: ' . $currency );
			WCRed()->log( 'bizumcheckout', '$amount: ' . $amount );
			WCRed()->log( 'bizumcheckout', '$phone: ' . $phone );
			WCRed()->log( 'bizumcheckout', '$resturl: ' . $resturl );
			WCRed()->log( 'bizumcheckout', 'Transaction Typme: 0' );
			WCRed()->log( 'bizumcheckout', 'Pay Method: z' );
			WCRed()->log( 'bizumcheckout', '$final_notify_url: ' . $final_notify_url );
		}

		$mi_obj = new WooRedsysAPI();
		$mi_obj->set_parameter( 'DS_MERCHANT_ORDER', $order_id );
		$mi_obj->set_parameter( 'DS_MERCHANT_MERCHANTCODE', $fuc );
		$mi_obj->set_parameter( 'DS_MERCHANT_TERMINAL', $terminal );
		$mi_obj->set_parameter( 'DS_MERCHANT_CURRENCY', $currency );
		$mi_obj->set_parameter( 'DS_MERCHANT_AMOUNT', $amount );
		$mi_obj->set_parameter( 'DS_MERCHANT_TRANSACTIONTYPE', '0' );
		$mi_obj->set_parameter( 'DS_MERCHANT_PAYMETHODS', 'z' );
		$mi_obj->set_parameter( 'DS_MERCHANT_MERCHANTURL', $final_notify_url );
		$mi_obj->set_parameter( 'DS_MERCHANT_BIZUM_MOBILENUMBER', $phone );

		$version   = 'HMAC_SHA256_V1';
		$post_arg  = '';
		$params    = $mi_obj->create_merchant_parameters();
		$signature = $mi_obj->create_merchant_signature( $secretsha256 );

		$post_arg = wp_remote_post(
			$resturl,
			array(
				'method'      => 'POST',
				'timeout'     => 45,
				'httpversion' => '1.0',
				'user-agent'  => 'Redsys Gateway ' . REDSYS_VERSION,
				'body'        => array(
					'Ds_SignatureVersion'   => $version,
					'Ds_MerchantParameters' => $params,
					'Ds_Signature'          => $signature,
				),
			)
		);
		if ( is_wp_error( $post_arg ) ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', __( 'There is an error', 'woocommerce-redsys' ) );
				WCRed()->log( 'bizumcheckout', '*********************************' );
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', __( 'The error is : ', 'woocommerce-redsys' ) . $post_arg );
			}
			 // phpcs:ignore Squiz.PHP.CommentedOutCode.Found
			// return $post_arg;.
		}
		$response_body       = wp_remote_retrieve_body( $post_arg );
		$json_decode_params  = json_decode( $response_body ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		$merchant_parameters = $json_decode_params->Ds_MerchantParameters; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'bizumcheckout', '$merchant_parameters: ' . $merchant_parameters ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
		}

		/**
		 * Return:
		 * Ds_RtpStatus
		 * Ds_RtpResponse
		 * Ds_RtpDescription
		 */

		$mi_obj->decode_merchant_parameters( $merchant_parameters );
		$ds_amount             = $mi_obj->get_parameter( 'Ds_Amount' );
		$ds_currency           = $mi_obj->get_parameter( 'Ds_Currency' );
		$ds_order              = $mi_obj->get_parameter( 'Ds_Order' );
		$ds_merchantcode       = $mi_obj->get_parameter( 'Ds_MerchantCode' );
		$ds_terminal           = $mi_obj->get_parameter( 'Ds_Terminal' );
		$ds_response           = $mi_obj->get_parameter( 'Ds_Response' );
		$ds_authorisationcode  = $mi_obj->get_parameter( 'Ds_AuthorisationCode' );
		$ds_transactiontype    = $mi_obj->get_parameter( 'Ds_TransactionType' );
		$ds_securepayment      = $mi_obj->get_parameter( 'Ds_SecurePayment' );
		$ds_language           = $mi_obj->get_parameter( 'Ds_Language' );
		$ds_merchantdata       = $mi_obj->get_parameter( 'Ds_MerchantData' );
		$ds_processedpaymethod = $mi_obj->get_parameter( 'Ds_ProcessedPayMethod' );
		$ds_rtpresponse        = $mi_obj->get_parameter( 'Ds_RtpResponse' );
		$ds_rtpdescription     = $mi_obj->get_parameter( 'Ds_RtpDescription' );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'bizumcheckout', '$ds_amount: ' . $ds_amount );
			WCRed()->log( 'bizumcheckout', '$ds_currency: ' . $ds_currency );
			WCRed()->log( 'bizumcheckout', '$ds_order: ' . $ds_order );
			WCRed()->log( 'bizumcheckout', '$ds_merchantcode: ' . $ds_merchantcode );
			WCRed()->log( 'bizumcheckout', '$ds_terminal: ' . $ds_terminal );
			WCRed()->log( 'bizumcheckout', '$ds_response: ' . $ds_response );
			WCRed()->log( 'bizumcheckout', '$ds_authorisationcode: ' . $ds_authorisationcode );
			WCRed()->log( 'bizumcheckout', '$ds_transactiontype: ' . $ds_transactiontype );
			WCRed()->log( 'bizumcheckout', '$ds_securepayment: ' . $ds_securepayment );
			WCRed()->log( 'bizumcheckout', '$ds_language: ' . $ds_language );
			WCRed()->log( 'bizumcheckout', '$ds_merchantdata: ' . $ds_merchantdata );
			WCRed()->log( 'bizumcheckout', '$ds_processedpaymethod: ' . $ds_processedpaymethod );
			WCRed()->log( 'bizumcheckout', '$ds_rtpresponse: ' . $ds_rtpresponse );
			WCRed()->log( 'bizumcheckout', '$ds_rtpdescription: ' . $ds_rtpdescription );
		}

		if ( '9998' === (string) $ds_response ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', 'Waiting Authorization' );
			}
			return 'waiting_authorisation';
		} else {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', 'Somethog Happened: ' . $ds_response );
			}
			return $ds_response;
		}
		return 'error';
	}

	/**
	 * Payment_fields function.
	 */
	public function payment_fields() {
		$allowed_html        = array(
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
		$allowed_html_filter = apply_filters( 'redsys_kses_descripcion', $allowed_html );
		echo '<style>
		#bizum-movil {
			display: flex;
			align-items: center;
		}
		#bizum-movil img.movil {
			float: left !important;
			border: 0 !important;
			padding: 5px !important;
			max-height: 2.8em !important;
		}
		</style>';
		echo '<p>' . wp_kses( $this->description, $allowed_html_filter ) . '</p>';
		echo '<p>' . esc_html__( 'Mobil number associated with Bizum. The format should be +345555555', 'woocommerce-redsys' ) . '</p>';
		echo '<div id="bizum-movil">';
		echo '<img class="movil" src="' . esc_url( REDSYS_PLUGIN_URL_P ) . 'assets/images/ico-movil.png" alt="Mobile Icon">';
		echo '<input class="input-movil" "type="text" pattern="\+\d{1,3}\d+" id="_bizum_phone" name="_bizum_phone" placeholder="' . esc_html__( 'Ex: +345555555', 'woocommerce-redsys' ) . '"  value="" required>';
		echo '</div>';
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
		$selections      = (array) WCRed()->get_redsys_option( 'testforuserid', 'bizumcheckout' );
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', '/****************************/' );
			WCRed()->log( 'bizumcheckout', '     Checking user test       ' );
			WCRed()->log( 'bizumcheckout', '/****************************/' );
			WCRed()->log( 'bizumcheckout', ' ' );
		}

		if ( 'yes' === $usertest_active ) {

			if ( ! empty( $selections ) ) {
				foreach ( $selections as $user_id ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'bizumcheckout', ' ' );
						WCRed()->log( 'bizumcheckout', '/****************************/' );
						WCRed()->log( 'bizumcheckout', '   Checking user ' . $userid );
						WCRed()->log( 'bizumcheckout', '/****************************/' );
						WCRed()->log( 'bizumcheckout', ' ' );
						WCRed()->log( 'bizumcheckout', ' ' );
						WCRed()->log( 'bizumcheckout', '/****************************/' );
						WCRed()->log( 'bizumcheckout', '  User in forach ' . $user_id );
						WCRed()->log( 'bizumcheckout', '/****************************/' );
						WCRed()->log( 'bizumcheckout', ' ' );
					}
					if ( (string) $user_id === (string) $userid ) {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'bizumcheckout', ' ' );
							WCRed()->log( 'bizumcheckout', '/****************************/' );
							WCRed()->log( 'bizumcheckout', '   Checking user test TRUE    ' );
							WCRed()->log( 'bizumcheckout', '/****************************/' );
							WCRed()->log( 'bizumcheckout', ' ' );
							WCRed()->log( 'bizumcheckout', ' ' );
							WCRed()->log( 'bizumcheckout', '/********************************************/' );
							WCRed()->log( 'bizumcheckout', '  User ' . $userid . ' is equal to ' . $user_id );
							WCRed()->log( 'bizumcheckout', '/********************************************/' );
							WCRed()->log( 'bizumcheckout', ' ' );
						}
						return true;
					}
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'bizumcheckout', ' ' );
						WCRed()->log( 'bizumcheckout', '/****************************/' );
						WCRed()->log( 'bizumcheckout', '  Checking user test continue ' );
						WCRed()->log( 'bizumcheckout', '/****************************/' );
						WCRed()->log( 'bizumcheckout', ' ' );
					}
					continue;
				}
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', '  Checking user test FALSE    ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', ' ' );
				}
				return false;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', '  Checking user test FALSE    ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', ' ' );
				}
				return false;
			}
		} else {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '/****************************/' );
				WCRed()->log( 'bizumcheckout', '     User test Disabled.      ' );
				WCRed()->log( 'bizumcheckout', '/****************************/' );
				WCRed()->log( 'bizumcheckout', ' ' );
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

		if ( ! is_admin() && WCRed()->is_gateway_enabled( 'bizumcheckout' ) ) {
			$total = (int) $woocommerce->cart->get_cart_total();
			$limit = (int) $this->transactionlimit;
			if ( ! empty( $limit ) && $limit > 0 ) {
				$result = $limit - $total;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', '$total: ' . $total );
					WCRed()->log( 'bizumcheckout', '$limit: ' . $limit );
					WCRed()->log( 'bizumcheckout', '$result: ' . $result );
					WCRed()->log( 'bizumcheckout', ' ' );
				}
				if ( $result > 0 ) {
					return $available_gateways;
				} else {
					unset( $available_gateways['bizumcheckout'] );
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
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', '          URL Test RD         ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', ' ' );
				}
				$url = $this->testurl;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', '          URL Test WS         ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', ' ' );
				}
				$url = $this->testurlws;
			}
		} else {
			$user_test = $this->check_user_test_mode( $user_id );
			if ( $user_test ) {
				if ( 'rd' === $type ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'bizumcheckout', ' ' );
						WCRed()->log( 'bizumcheckout', '/****************************/' );
						WCRed()->log( 'bizumcheckout', '          URL Test RD         ' );
						WCRed()->log( 'bizumcheckout', '/****************************/' );
						WCRed()->log( 'bizumcheckout', ' ' );
					}
					$url = $this->testurl;
				} else {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'bizumcheckout', ' ' );
						WCRed()->log( 'bizumcheckout', '/****************************/' );
						WCRed()->log( 'bizumcheckout', '          URL Test WS         ' );
						WCRed()->log( 'bizumcheckout', '/****************************/' );
						WCRed()->log( 'bizumcheckout', ' ' );
					}
					$url = $this->testurlws;
				}
			} elseif ( 'rd' === $type ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', '          URL Live RD         ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', ' ' );
				}
				$url = $this->liveurl;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', '          URL Live WS         ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', ' ' );
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
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '/****************************/' );
				WCRed()->log( 'bizumcheckout', '         SHA256 Test.         ' );
				WCRed()->log( 'bizumcheckout', '/****************************/' );
				WCRed()->log( 'bizumcheckout', ' ' );
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
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', '      USER SHA256 Test.       ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', ' ' );
				}

				$customtestsha256 = mb_convert_encoding( $this->customtestsha256, 'ISO-8859-1', 'UTF-8' );
				if ( ! empty( $customtestsha256 ) ) {
					$sha256 = $customtestsha256;
				} else {
					$sha256 = mb_convert_encoding( $this->testsha256, 'ISO-8859-1', 'UTF-8' );
				}
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', '     USER SHA256 NOT Test.    ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', ' ' );
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
		$phone               = WCRed()->get_order_meta( $order_id, '_bizum_phone', true );

		if ( strpos( $phone, '+' ) !== 0 ) {
			$phone = '+34' . $phone;
		}

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

		$bizum_data_send = array(
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

		if ( has_filter( 'bizum_modify_data_to_send' ) ) {

			$bizum_data_send = apply_filters( 'bizum_modify_data_to_send', $bizum_data_send );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', 'Using filter bizum_modify_data_to_send' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
		}

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', 'Data sent to Bizum, $bizum_data_send: ' . print_r( $bizum_data_send, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'bizumcheckout', ' ' );
		}

		// redsys Args.
		$miobj = new WooRedsysAPI();
		$miobj->set_parameter( 'DS_MERCHANT_AMOUNT', $bizum_data_send['order_total_sign'] );
		$miobj->set_parameter( 'DS_MERCHANT_ORDER', $bizum_data_send['transaction_id2'] );
		$miobj->set_parameter( 'DS_MERCHANT_MERCHANTCODE', $bizum_data_send['customer'] );
		$miobj->set_parameter( 'DS_MERCHANT_CURRENCY', $bizum_data_send['currency'] );
		$miobj->set_parameter( 'DS_MERCHANT_TITULAR', WCRed()->clean_data( $bizum_data_send['name'] ) . ' ' . WCRed()->clean_data( $bizum_data_send['lastname'] ) );
		$miobj->set_parameter( 'DS_MERCHANT_TRANSACTIONTYPE', $bizum_data_send['transaction_type'] );
		$miobj->set_parameter( 'DS_MERCHANT_TERMINAL', $bizum_data_send['DSMerchantTerminal'] );
		$miobj->set_parameter( 'DS_MERCHANT_MERCHANTURL', $bizum_data_send['final_notify_url'] );
		$miobj->set_parameter( 'DS_MERCHANT_URLOK', $bizum_data_send['url_ok'] );
		$miobj->set_parameter( 'DS_MERCHANT_URLKO', $bizum_data_send['returnfromredsys'] );
		$miobj->set_parameter( 'DS_MERCHANT_CONSUMERLANGUAGE', $bizum_data_send['gatewaylanguage'] );
		$miobj->set_parameter( 'DS_MERCHANT_PRODUCTDESCRIPTION', WCRed()->clean_data( $bizum_data_send['product_description'] ) );
		$miobj->set_parameter( 'DS_MERCHANT_MERCHANTNAME', $bizum_data_send['merchant_name'] );
		$miobj->set_parameter( 'DS_MERCHANT_BIZUM_MOBILENUMBER', $phone );
		$miobj->set_parameter( 'DS_MERCHANT_PAYMETHODS', 'z' );

		$version = 'HMAC_SHA256_V1';
		// Se generan los parámetros de la petición.
		$request      = '';
		$params       = $miobj->create_merchant_parameters();
		$signature    = $miobj->create_merchant_signature( $bizum_data_send['secretsha256'] );
		$order_id_set = $bizum_data_send['transaction_id2'];
		set_transient( 'redsys_signature_' . sanitize_text_field( $order_id_set ), $bizum_data_send['secretsha256'], 3600 );
		$redsys_args = array(
			'Ds_SignatureVersion'   => $version,
			'Ds_MerchantParameters' => $params,
			'Ds_Signature'          => $signature,
		);
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'bizumcheckout', 'Generating payment form for order ' . $order->get_order_number() . '. Sent data: ' . print_r( $redsys_args, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'bizumcheckout', 'Helping to understand the encrypted code: ' );
			WCRed()->log( 'bizumcheckout', 'DS_MERCHANT_AMOUNT: ' . $bizum_data_send['order_total_sign'] );
			WCRed()->log( 'bizumcheckout', 'DS_MERCHANT_ORDER: ' . $bizum_data_send['transaction_id2'] );
			WCRed()->log( 'bizumcheckout', 'DS_MERCHANT_TITULAR: ' . WCRed()->clean_data( $bizum_data_send['name'] ) . ' ' . WCRed()->clean_data( $bizum_data_send['lastname'] ) );
			WCRed()->log( 'bizumcheckout', 'DS_MERCHANT_MERCHANTCODE: ' . $bizum_data_send['customer'] );
			WCRed()->log( 'bizumcheckout', 'DS_MERCHANT_CURRENCY' . $bizum_data_send['currency'] );
			WCRed()->log( 'bizumcheckout', 'DS_MERCHANT_TRANSACTIONTYPE: ' . $bizum_data_send['transaction_type'] );
			WCRed()->log( 'bizumcheckout', 'DS_MERCHANT_TERMINAL: ' . $bizum_data_send['DSMerchantTerminal'] );
			WCRed()->log( 'bizumcheckout', 'DS_MERCHANT_MERCHANTURL: ' . $bizum_data_send['final_notify_url'] );
			WCRed()->log( 'bizumcheckout', 'DS_MERCHANT_URLOK: ' . $bizum_data_send['url_ok'] );
			WCRed()->log( 'bizumcheckout', 'DS_MERCHANT_URLKO: ' . $bizum_data_send['returnfromredsys'] );
			WCRed()->log( 'bizumcheckout', 'DS_MERCHANT_CONSUMERLANGUAGE: ' . $bizum_data_send['gatewaylanguage'] );
			WCRed()->log( 'bizumcheckout', 'DS_MERCHANT_PRODUCTDESCRIPTION: ' . WCRed()->clean_data( $bizum_data_send['product_description'] ) );
			WCRed()->log( 'bizumcheckout', 'DS_MERCHANT_PAYMETHODS: z' );
		}
		/**
		 * Filter hook to allow 3rd parties to add more fields to the form
		 *
		 * @since 1.0.0
		 * @param array $redsys_args The arguments sent to Redsys.
		 */
		$redsys_args = apply_filters( 'woocommerce_redsys_args', $redsys_args );
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
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', '/****************************/' );
			WCRed()->log( 'bizumcheckout', '   Generating Redsys Form     ' );
			WCRed()->log( 'bizumcheckout', '/****************************/' );
			WCRed()->log( 'bizumcheckout', ' ' );
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
			message: "<img src=\"' . esc_url( apply_filters( 'woocommerce_ajax_loader_url', $woocommerce->plugin_url() . '/assets/images/select2-spinner.gif' ) ) . '\" alt=\"Redirecting&hellip;\" style=\"float:left; margin-right: 10px;\" />' . __( 'Thank you for your order. We are now redirecting you to Bizum to make the payment.', 'woocommerce-redsys' ) . '",
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
		<input type="submit" class="button-alt" id="submit_redsys_payment_form" value="' . __( 'Pay with Bizum', 'woocommerce-redsys' ) . '" /> <a class="button cancel" href="' . esc_url( $order->get_cancel_order_url() ) . '">' . __( 'Cancel order &amp; restore cart', 'woocommerce-redsys' ) . '</a>
	</form>';
	}

	/**
	 * Process the payment and return the result
	 *
	 * @param int $order_id Order ID.
	 * @return array
	 */
	public function process_payment( $order_id ) {

		$order     = WCRed()->get_order( $order_id );
		$phone     = WCRed()->get_order_meta( $order_id, '_bizum_phone', true );
		$parent_id = $order->get_parent_id();
		if ( 0 !== $parent_id ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', '$parent_id: ' . $parent_id );
			}
			$phone_parent         = WCRed()->get_order_meta( $parent_id, '_bizum_phone', true );
			$data['_bizum_phone'] = sanitize_text_field( $phone_parent );
			WCRed()->update_order_meta( $order_id, $data );
		}

		if ( isset( $phone_parent ) && ! empty( $phone_parent ) ) {
			$phone = $phone_parent;
		}

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'bizumcheckout', 'process_payment' );
			WCRed()->log( 'bizumcheckout', '$order_id: ' . $order_id );
			WCRed()->log( 'bizumcheckout', '$order: ' . $order );
		}

		if ( 'yes' === $this->not_use_https ) {
			$final_notify_url = $this->notify_url_not_https;
		} else {
			$final_notify_url = $this->notify_url;
		}

		$respuesta = $this->check_bizum_phone( $order, $phone );
		if ( 'redirect' === $respuesta ) {
			return array(
				'result'   => 'success',
				'redirect' => $order->get_checkout_payment_url( true ),
			);
		}
		if ( 'rest' === $respuesta ) {
			return array(
				'result'   => 'success',
				'redirect' => '?order_id=' . $order_id . '&method=bizum#open-bizum-popup',
				'order_id' => $order_id,
				'method'   => 'bizum',
				'url'      => WCRed()->get_url_bizum_payment( $order_id, $final_notify_url ),
			);
		}
		if ( 'error' === $respuesta ) {
			wc_add_notice( __( 'Please, try again or use another payment method.', 'woocommerce-redsys' ), 'error' );
			return;
		}
		if ( ! $respuesta ) {
			wc_add_notice( __( 'Please, use another payment method, Your phone number is not associated with a Bizum account, or you have entered it incorrectly.', 'woocommerce-redsys' ), 'error' );
			return;
		}
		if ( $respuesta ) {
			wc_add_notice( __( 'There has been an error while trying to process the payment through Bizum: ', 'woocommerce-redsys' ) . $respuesta, 'error' );
			return;
		}
	}

	/**
	 * Output for the order received page.
	 *
	 * @param obj $order Order object.
	 */
	public function receipt_page( $order ) {
		echo '<p>' . esc_html__( 'Thank you for your order, please click the button below to pay with Bizum.', 'woocommerce-redsys' ) . '</p>';
		echo $this->generate_redsys_form( $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Check redsys IPN validity
	 */
	public function check_ipn_request_is_valid() {

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'bizumcheckout', 'HTTP Notification received 1: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
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
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', 'Signature from Redsys: ' . $remote_sign );
				WCRed()->log( 'bizumcheckout', 'Name transient remote: redsys_signature_' . sanitize_title( $order_id ) );
				WCRed()->log( 'bizumcheckout', 'Secret SHA256 transcient: ' . $secretsha256 );
				WCRed()->log( 'bizumcheckout', ' ' );
			}

			if ( 'yes' === $this->debug ) {
				$order_id = $mi_obj->get_parameter( 'Ds_Order' );
				WCRed()->log( 'bizumcheckout', 'Order ID: ' . $order_id );
			}
			$order           = WCRed()->get_order( $order2 );
			$user_id         = $order->get_user_id();
			$usesecretsha256 = $this->get_redsys_sha256( $user_id );
			if ( empty( $secretsha256 ) && ! $secretsha256_meta ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', 'Using $usesecretsha256 Settings' );
					WCRed()->log( 'bizumcheckout', 'Secret SHA256 Settings: ' . $usesecretsha256 );
					WCRed()->log( 'bizumcheckout', ' ' );
				}
				$usesecretsha256 = $usesecretsha256;
			} elseif ( $secretsha256_meta ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', 'Using $secretsha256_meta Meta' );
					WCRed()->log( 'bizumcheckout', 'Secret SHA256 Meta: ' . $secretsha256_meta );
					WCRed()->log( 'bizumcheckout', ' ' );
				}
				$usesecretsha256 = $secretsha256_meta;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', 'Using $secretsha256 Transcient' );
					WCRed()->log( 'bizumcheckout', 'Secret SHA256 Transcient: ' . $secretsha256 );
					WCRed()->log( 'bizumcheckout', ' ' );
				}
				$usesecretsha256 = $secretsha256;
			}
			$localsecret = $mi_obj->create_merchant_signature_notif( $usesecretsha256, $data );
			if ( $localsecret === $remote_sign ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', 'Received valid notification from Servired/RedSys' );
					WCRed()->log( 'bizumcheckout', $data );
				}
				return true;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', 'Received INVALID notification from Servired/RedSys' );
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
				WCRed()->log( 'bizumcheckout', 'HTTP Notification received 2: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}
			if ( $ds_merchant_code === $this->customer ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', 'Received valid notification from Servired/RedSys' );
				}
				return true;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', 'Received INVALID notification from Servired/RedSys' );
					WCRed()->log( 'bizumcheckout', '$remote_sign: ' . $remote_sign );
					WCRed()->log( 'bizumcheckout', '$localsecret: ' . $localsecret );
				}
				return false;
			}
		}
	}
	/**
	 * Check for Bizum HTTP Notification
	 *
	 * @param int $order_id Order ID.
	 */
	public function check_bizum_payment( $order_id ) {

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'bizumcheckout', 'Checking Payment: check_bizum_payment( $order_id ) $order_id: ' . $order_id );
		}

		$i = 0;
		while ( $i < 840 ) {
			$order        = WCRed()->get_order( $order_id );
			$order_status = get_transient( $order->get_id() . '_bizum_payment' );
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', 'get_trasient( $order->get_id() ."_bizum_payment" ): ' . $order_status );
			}
			if ( 'yes' === $order_status ) {
				return 'paid';
			}
			if ( '' !== $order_status || ! empty( $order_status ) ) {
				return $order_status;
			}
			if ( 'cancelled' === $order_status ) {
				return 'cancelled';
			}
			sleep( 5 );
			++$i;
		}
	}
	/**
	 * Check for Bizum HTTP Notification
	 */
	public function check_ipn_response() {
		@ob_clean(); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
		$_POST = stripslashes_deep( $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		if ( isset( $_GET['bizum-order-id'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$order_id = sanitize_text_field( wp_unslash( $_GET['bizum-order-id'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			wc_nocache_headers();
			$order       = WCRed()->get_order( $order_id );
			$user_id     = $order->get_user_id();
			$redsys_adr  = self::get_redsys_url_gateway( $user_id );
			$redsys_args = self::get_redsys_args( $order );
			$form_inputs = array();
			$aviso       = apply_filters( 'bizum_text_waiting_auth', __( 'You must confirm the transaction through your bank\'s mobile application.', 'woocommerce-redsys' ) );

			foreach ( $redsys_args as $key => $value ) {
				$form_inputs[] .= '<input type="hidden" name="' . $key . '" value="' . esc_attr( $value ) . '" />';
			}

			if ( isset( $_GET['bizum-iframe'] ) && 'yes' === $_GET['bizum-iframe'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$ajax_url = admin_url( 'admin-ajax.php' );
				$script   = "(function ($) {
					// Lógica para realizar la comprobación AJAX cada 5 segundos
					function verificarEstadoPago() {
						var count = 0;
						var interval = setInterval(function () {
							$.ajax({
								url: '" . $ajax_url . "',
								type: 'POST',
								dataType: 'json',
								data: {
									action: 'verificar_estado_pago',
									order_id: " . (int) $order_id . ",
									count: count++
								},
								success: function (response) {
									if (response.success) {
										// El pedido ha sido pagado, redirigir al usuario a la página de agradecimiento
										window.top.location.href = response.data;
									} else if (response.data === 'continue') {
										// Si aún no se ha pagado, continuar con la próxima comprobación
										console.log('Comprobación número: ' + count);
									} else {
										// Hubo un error en el pago, redirigir al usuario a la página de checkout
										window.top.location.href = response.data;
									}
								}
							});
						}, 5000); // Realizar la comprobación cada 5 segundos (5000 ms)
					}
				
					$(document).ready(function () {
						verificarEstadoPago();
					});
				})(jQuery);
				function updateCountdown() {
					var countdownElement = document.getElementById('countdown');
					var timeLeft = countdownElement.innerHTML;
				  
					// Dividir el tiempo en minutos y segundos
					var minutes = parseInt(timeLeft.split(':')[0]);
					var seconds = parseInt(timeLeft.split(':')[1]);
				  
					// Restar un segundo
					if (seconds > 0) {
					  seconds--;
					} else if (minutes > 0) {
					  minutes--;
					  seconds = 59;
					}
				  
					// Formatear los minutos y segundos para que siempre tengan dos dígitos
					var formattedMinutes = minutes.toString().padStart(2, '0');
					var formattedSeconds = seconds.toString().padStart(2, '0');
				  
					// Actualizar el elemento de la cuenta atrás
					countdownElement.innerHTML = formattedMinutes + ':' + formattedSeconds;
				  
					// Si el tiempo se ha agotado, detener la cuenta atrás
					if (minutes === 0 && seconds === 0) {
					  clearInterval(countdownInterval);
					  countdownElement.innerHTML = '¡Tiempo agotado!';
					}
				  }
				  
				  // Actualizar la cuenta atrás cada segundo
				  var countdownInterval = setInterval(updateCountdown, 1000);";
				echo '
				<!DOCTYPE html>
				<html>
					<head>
						<title>Esperando Autenticación</title>';
						// phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedScript
				echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>';
				echo '<script>';
				echo $script;// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo '</script>
						<style type="text/css">
							html, body {
								align-items: center;
								justify-content: center;
								background-color: #f8f8f8;
								width:100vw !important;
								height:1000px !important;
								margin:0 !important;
								padding:0 !important;
								position: absolute;
								left: 0px;
								display: block;
								text-align:center !important;
								max-width: 100vw !important;
								z-index: 999999999;
								}
							.container {
								text-align: center;
								position: absolute;
								left: 0px;
								display: block;
								border: none;
								width:100vw !important;
								height:1000px;
								margin:0 !important;
								padding:0 !important;
								text-align:center !important;
								margin-left: 0px !important;
								max-width: 100vw !important;
								z-index: 999999999;
							}
							.container img {
								padding-top: 50px;
								margin: 0 auto;
								display: block;
								width: 100%;
								max-width: 150px;
								height: auto;
							}
							.container h2 {
								font-size: 1.5em;
								font-weight: 400;
								margin: 0 auto;
								display: block;
								width: 100%;
								max-width: 300px;
								height: auto;
								padding-top: 20px;
								color: #777;
							}
							.container h1 {
								font-size: 3em;
								font-weight: 700;
								margin: 0 auto;
								display: block;
								width: 100%;
								max-width: 300px;
								height: auto;
								padding-top: 20px;
								color: #777;
							}
						</style>
					</head>
					<body>
						<div class="container">
							<img src="' . esc_html( REDSYS_PLUGIN_URL_P ) . 'assets/images/logo-bizum-insite.png" alt="Logo Bizum">
							<h2>' . esc_html( $aviso ) . '</h2>
							<h1 id="countdown">7:00</h1>
						</div>
					</body>
				</html>';
				$phone = WCRed()->get_order_meta( $order_id, '_bizum_phone', true );
				if ( strpos( $phone, '+' ) !== 0 ) {
					$phone = '+34' . $phone;
				}
				$result = $this->bizum_payment_rest( $order, $phone );
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', '   Bizum Payment Rest     ' );
					WCRed()->log( 'bizumcheckout', '/****************************/' );
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', 'Result: ' . $result );
					WCRed()->log( 'bizumcheckout', ' ' );
				}
				exit();
			}
		}
		if ( $this->check_ipn_request_is_valid() ) {
			header( 'HTTP/1.1 200 OK' );
			do_action( 'valid_' . $this->id . '_standard_ipn_request', $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		} else {
			wp_die( 'There is nothing to see here, do not access this page directly (Bizum checkout)' );
		}
	}
	/**
	 * Successful Payment.
	 *
	 * @param array $posted Post data after notify.
	 */
	public function successful_request( $posted ) {

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', '/****************************/' );
			WCRed()->log( 'bizumcheckout', '      successful_request      ' );
			WCRed()->log( 'bizumcheckout', '/****************************/' );
			WCRed()->log( 'bizumcheckout', ' ' );
		}

		if ( ! isset( $_POST['Ds_SignatureVersion'] ) || ! isset( $_POST['Ds_Signature'] ) || ! isset( $_POST['Ds_MerchantParameters'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			wp_die( 'Do not access this page directly ' );
		}

		$version     = sanitize_text_field( wp_unslash( $_POST['Ds_SignatureVersion'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		$data        = sanitize_text_field( wp_unslash( $_POST['Ds_MerchantParameters'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		$remote_sign = sanitize_text_field( wp_unslash( $_POST['Ds_Signature'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', '$version: ' . $version );
			WCRed()->log( 'bizumcheckout', '$data: ' . $data );
			WCRed()->log( 'bizumcheckout', '$remote_sign: ' . $remote_sign );
			WCRed()->log( 'bizumcheckout', ' ' );
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
			WCRed()->log( 'bizumcheckout', 'SHA256 Settings: ' . $usesecretsha256 );
			WCRed()->log( 'bizumcheckout', 'SHA256 Transcient: ' . $secretsha256 );
			WCRed()->log( 'bizumcheckout', 'decode_merchant_parameters: ' . $decodedata );
			WCRed()->log( 'bizumcheckout', 'create_merchant_signature_notif: ' . $localsecret );
			WCRed()->log( 'bizumcheckout', 'Ds_Amount: ' . $total );
			WCRed()->log( 'bizumcheckout', 'Ds_Order: ' . $ordermi );
			WCRed()->log( 'bizumcheckout', 'Ds_MerchantCode: ' . $dscode );
			WCRed()->log( 'bizumcheckout', 'Ds_Currency: ' . $currency_code );
			WCRed()->log( 'bizumcheckout', 'Ds_Response: ' . $response );
			WCRed()->log( 'bizumcheckout', 'Ds_AuthorisationCode: ' . $id_trans );
			WCRed()->log( 'bizumcheckout', 'Ds_Date: ' . $dsdate );
			WCRed()->log( 'bizumcheckout', 'Ds_Hour: ' . $dshour );
			WCRed()->log( 'bizumcheckout', 'Ds_Terminal: ' . $dstermnal );
			WCRed()->log( 'bizumcheckout', 'Ds_MerchantData: ' . $dsmerchandata );
			WCRed()->log( 'bizumcheckout', 'Ds_SecurePayment: ' . $dssucurepayment );
			WCRed()->log( 'bizumcheckout', 'Ds_Card_Country: ' . $dscardcountry );
			WCRed()->log( 'bizumcheckout', 'Ds_ConsumerLanguage: ' . $dsconsumercountry );
			WCRed()->log( 'bizumcheckout', 'Ds_Card_Type: ' . $dscargtype );
			WCRed()->log( 'bizumcheckout', 'Ds_TransactionType: ' . $dstransactiontype );
			WCRed()->log( 'bizumcheckout', 'Ds_Merchant_Identifiers_Amount: ' . $response );
			WCRed()->log( 'bizumcheckout', 'Ds_Card_Brand: ' . $dscardbrand );
			WCRed()->log( 'bizumcheckout', 'Ds_MerchantData: ' . $dsmechandata );
			WCRed()->log( 'bizumcheckout', 'Ds_ErrorCode: ' . $dserrorcode );
			WCRed()->log( 'bizumcheckout', 'Ds_PayMethod: ' . $dpaymethod );
		}

		// refund.
		if ( '3' === $dstransactiontype ) {
			if ( 900 === $response ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', 'Response 900 (refund)' );
				}
				set_transient( $order->get_id() . '_redsys_refund', 'yes' );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', 'WCRed()->update_order_meta to "refund yes"' );
				}
				$status = $order->get_status();
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', 'New Status in request: ' . $status );
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
					WCRed()->log( 'bizumcheckout', 'Payment error: Amounts do not match (order: ' . $order_total_compare . ' - received: ' . $total . ')' );
				}
				// Put this order on-hold for manual checking.
				/* translators: order an received are the amount */
				$order->update_status( 'on-hold', sprintf( __( 'Validation error: Order vs. Notification amounts do not match (order: %1$s - received: %2&s).', 'woocommerce-redsys' ), $order_total_compare, $total ) );
				exit;
			}
			$authorisation_code = $id_trans;

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '/****************************/' );
				WCRed()->log( 'bizumcheckout', '      Saving Order Meta       ' );
				WCRed()->log( 'bizumcheckout', '/****************************/' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			$data = array();
			if ( ! empty( $order1 ) ) {
				$data['_payment_order_number_redsys'] = $order1;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', '_payment_order_number_redsys saved: ' . $order1 );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '_payment_order_number_redsys NOT SAVED!!!' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			if ( ! empty( $dsdate ) ) {
				$data['_payment_date_redsys'] = $dsdate;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', '_payment_date_redsys saved: ' . $dsdate );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '_payment_date_redsys NOT SAVED!!!' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			if ( ! empty( $dsdate ) ) {
				$data['_payment_terminal_redsys'] = $dstermnal;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', '_payment_terminal_redsys saved: ' . $dstermnal );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '_payment_terminal_redsys NOT SAVED!!!' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			if ( ! empty( $dshour ) ) {
				$data['_payment_hour_redsys'] = $dshour;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', '_payment_hour_redsys saved: ' . $dshour );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '_payment_hour_redsys NOT SAVED!!!' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			if ( ! empty( $id_trans ) ) {
				$data['_authorisation_code_redsys'] = $authorisation_code;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', '_authorisation_code_redsys saved: ' . $authorisation_code );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '_authorisation_code_redsys NOT SAVED!!!' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			if ( ! empty( $currency_code ) ) {
				$data['_corruncy_code_redsys'] = $currency_code;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', '_corruncy_code_redsys saved: ' . $currency_code );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '_corruncy_code_redsys NOT SAVED!!!' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			if ( ! empty( $dscardcountry ) ) {
				$data['_card_country_redsys'] = $dscardcountry;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', '_card_country_redsys saved: ' . $dscardcountry );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '_card_country_redsys NOT SAVED!!!' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			// This meta is essential for later use.
			if ( ! empty( $secretsha256 ) ) {
				$data['_redsys_secretsha256'] = $secretsha256;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', '_redsys_secretsha256 saved: ' . $secretsha256 );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '_redsys_secretsha256 NOT SAVED!!!' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			if ( ! empty( $dscode ) ) {
				$data['_order_fuc_redsys'] = $dscode;
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', '_order_fuc_redsys: ' . $dscode );
				}
			} elseif ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '_order_fuc_redsys NOT SAVED!!!' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			WCRed()->update_order_meta( $order->get_id(), $data );
			// Payment completed.
			$order->add_order_note( __( 'HTTP Notification received - payment completed', 'woocommerce-redsys' ) );
			$order->add_order_note( __( 'Authorization code: ', 'woocommerce-redsys' ) . $authorisation_code );
			$order->payment_complete();

			set_transient( $order->get_id() . '_bizum_payment', 'yes', 3600 );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', 'Payment complete.' );
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '/******************************************/' );
				WCRed()->log( 'bizumcheckout', '  The final has come, this story has ended  ' );
				WCRed()->log( 'bizumcheckout', '/******************************************/' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			do_action( 'bizum_post_payment_complete', $order->get_id() );
		} else {
			$data              = array();
			$ds_response_value = WCRed()->get_error( $response );
			$ds_error_value    = WCRed()->get_error( $dserrorcode );

			if ( $ds_response_value ) {
				$order->add_order_note( __( 'Order cancelled by Redsys: ', 'woocommerce-redsys' ) . $ds_response_value );
				$data['_redsys_error_payment_ds_response_value'] = $ds_response_value;
				$error = $ds_response_value;
			}

			if ( $ds_error_value ) {
				$order->add_order_note( __( 'Order cancelled by Redsys: ', 'woocommerce-redsys' ) . $ds_error_value );
				$data['_redsys_error_payment_ds_response_value'] = $ds_error_value;
				$error = $ds_error_value;
			}
			WCRed()->update_order_meta( $order->get_id(), $data );
			if ( 'yes' === $this->debug ) {
				if ( $ds_response_value ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', $ds_response_value );
				}
				if ( $ds_error_value ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', $ds_error_value );
				}
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '/******************************************/' );
				WCRed()->log( 'bizumcheckout', '  The final has come, this story has ended  ' );
				WCRed()->log( 'bizumcheckout', '/******************************************/' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			// Order cancelled.
			$order->update_status( 'cancelled', __( 'Order cancelled by Redsys Bizum', 'woocommerce-redsys' ) );
			$order->add_order_note( __( 'Order cancelled by Redsys Bizum: ', 'woocommerce-redsys' ) . $error );
			WC()->cart->empty_cart();
			if ( ! $ds_response_value ) {
				$ds_response_value = '';
			}
			if ( ! $ds_error_value ) {
				$ds_error_value = '';
			}
			if ( $response ) {
				$error = $response;
			} elseif ( $dserrorcode ) {
				$error = $dserrorcode;
			} else {
				$error = __( 'Unknown error', 'woocommerce-redsys' );
			}
			set_transient( $order->get_id() . '_bizum_payment', $error, 3600 );
			$error = $ds_response_value . ' ' . $ds_error_value;
			do_action( 'bizum_post_payment_error', $order->get_id(), $error );
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
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', '/**************************/' );
			WCRed()->log( 'bizumcheckout', __( 'Starting asking for Refund', 'woocommerce-redsys' ) );
			WCRed()->log( 'bizumcheckout', '/**************************/' );
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', __( 'Terminal : ', 'woocommerce-redsys' ) . $terminal );
		}
		$transaction_type  = '3';
		$secretsha256_meta = WCRed()->get_order_meta( $order_id, '_redsys_secretsha256', true );
		if ( $secretsha256_meta ) {
			$secretsha256 = $secretsha256_meta;
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', __( 'Using meta for SHA256', 'woocommerce-redsys' ) );
				WCRed()->log( 'bizumcheckout', __( 'The SHA256 Meta is: ', 'woocommerce-redsys' ) . $secretsha256 );
			}
		} else {
			$secretsha256 = $secretsha256;
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', __( 'Using settings for SHA256', 'woocommerce-redsys' ) );
				WCRed()->log( 'bizumcheckout', __( 'The SHA256 settings is: ', 'woocommerce-redsys' ) . $secretsha256 );
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
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', __( 'All data from meta', 'woocommerce-redsys' ) );
			WCRed()->log( 'bizumcheckout', '**********************' );
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', __( 'If something is empty, the data was not saved', 'woocommerce-redsys' ) );
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', __( 'All data from meta', 'woocommerce-redsys' ) );
			WCRed()->log( 'bizumcheckout', __( 'Authorization Code : ', 'woocommerce-redsys' ) . $autorization_code );
			WCRed()->log( 'bizumcheckout', __( 'Authorization Date : ', 'woocommerce-redsys' ) . $autorization_date );
			WCRed()->log( 'bizumcheckout', __( 'Currency Codey : ', 'woocommerce-redsys' ) . $currencycode );
			WCRed()->log( 'bizumcheckout', __( 'Terminal : ', 'woocommerce-redsys' ) . $terminal );
			WCRed()->log( 'bizumcheckout', __( 'SHA256 : ', 'woocommerce-redsys' ) . $secretsha256_meta );
			WCRed()->log( 'bizumcheckout', __( 'FUC : ', 'woocommerce-redsys' ) . $order_fuc );
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
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', __( 'Data sent to Redsys for refund', 'woocommerce-redsys' ) );
			WCRed()->log( 'bizumcheckout', '*********************************' );
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', __( 'URL to Redsys : ', 'woocommerce-redsys' ) . $redsys_adr );
			WCRed()->log( 'bizumcheckout', __( 'DS_MERCHANT_AMOUNT : ', 'woocommerce-redsys' ) . $amount );
			WCRed()->log( 'bizumcheckout', __( 'DS_MERCHANT_ORDER : ', 'woocommerce-redsys' ) . $transaction_id );
			WCRed()->log( 'bizumcheckout', __( 'DS_MERCHANT_MERCHANTCODE : ', 'woocommerce-redsys' ) . $order_fuc );
			WCRed()->log( 'bizumcheckout', __( 'DS_MERCHANT_CURRENCY : ', 'woocommerce-redsys' ) . $currency );
			WCRed()->log( 'bizumcheckout', __( 'DS_MERCHANT_TRANSACTIONTYPE : ', 'woocommerce-redsys' ) . $transaction_type );
			WCRed()->log( 'bizumcheckout', __( 'DS_MERCHANT_TERMINAL : ', 'woocommerce-redsys' ) . $terminal );
			WCRed()->log( 'bizumcheckout', __( 'DS_MERCHANT_MERCHANTURL : ', 'woocommerce-redsys' ) . $final_notify_url );
			WCRed()->log( 'bizumcheckout', __( 'DS_MERCHANT_URLOK : ', 'woocommerce-redsys' ) . add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ) );
			WCRed()->log( 'bizumcheckout', __( 'DS_MERCHANT_URLKO : ', 'woocommerce-redsys' ) . $order->get_cancel_order_url() );
			WCRed()->log( 'bizumcheckout', __( 'DS_MERCHANT_CONSUMERLANGUAGE : 001', 'woocommerce-redsys' ) );
			WCRed()->log( 'bizumcheckout', __( 'DS_MERCHANT_PRODUCTDESCRIPTION : ', 'woocommerce-redsys' ) . WCRed()->clean_data( WCRed()->product_description( $order, $this->id ) ) );
			WCRed()->log( 'bizumcheckout', __( 'DS_MERCHANT_MERCHANTNAME : ', 'woocommerce-redsys' ) . $this->commercename );
			WCRed()->log( 'bizumcheckout', __( 'DS_MERCHANT_AUTHORISATIONCODE : ', 'woocommerce-redsys' ) . $autorization_code );
			WCRed()->log( 'bizumcheckout', __( 'Ds_Merchant_TransactionDate : ', 'woocommerce-redsys' ) . $autorization_date );
			WCRed()->log( 'bizumcheckout', __( 'ask_for_refund Asking por order #: ', 'woocommerce-redsys' ) . $order_id );
			WCRed()->log( 'bizumcheckout', ' ' );
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
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', __( 'There is an error', 'woocommerce-redsys' ) );
				WCRed()->log( 'bizumcheckout', '*********************************' );
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', __( 'The error is : ', 'woocommerce-redsys' ) . $post_arg );
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
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', __( 'Checking and waiting ping from Redsys', 'woocommerce-redsys' ) );
			WCRed()->log( 'bizumcheckout', '*****************************************' );
			WCRed()->log( 'bizumcheckout', ' ' );
			WCRed()->log( 'bizumcheckout', __( 'Check order status #: ', 'woocommerce-redsys' ) . $order->get_id() );
			WCRed()->log( 'bizumcheckout', __( 'Check order status with get_transient: ', 'woocommerce-redsys' ) . $order_refund );
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
			WCRed()->log( 'bizumcheckout', __( '$order_id#: ', 'woocommerce-redsys' ) . $transaction_id );
		}
		if ( ! $amount ) {
			$order_total_sign = WCRed()->redsys_amount_format( $order->get_total() );
		} else {
			$order_total_sign = number_format( $amount, 2, '', '' );
		}

		if ( ! empty( $transaction_id ) ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', __( 'check_redsys_refund Asking for order #: ', 'woocommerce-redsys' ) . $order_id );
			}

			$refund_asked = $this->ask_for_refund( $order_id, $transaction_id, $order_total_sign );

			if ( is_wp_error( $refund_asked ) ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', __( 'Refund Failed: ', 'woocommerce-redsys' ) . $refund_asked->get_error_message() );
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
				WCRed()->log( 'bizumcheckout', __( 'check_redsys_refund = true ', 'woocommerce-redsys' ) . $result );
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '/********************************/' );
				WCRed()->log( 'bizumcheckout', '  Refund complete by Redsys   ' );
				WCRed()->log( 'bizumcheckout', '/********************************/' );
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '/******************************************/' );
				WCRed()->log( 'bizumcheckout', '  The final has come, this story has ended  ' );
				WCRed()->log( 'bizumcheckout', '/******************************************/' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			if ( 'yes' === $this->debug && ! $result ) {
				WCRed()->log( 'bizumcheckout', __( 'check_redsys_refund = false ', 'woocommerce-redsys' ) . $result );
			}
			if ( $result ) {
				delete_transient( $order->get_id() . '_redsys_refund' );
				return true;
			} else {
				if ( 'yes' === $this->debug && $result ) {
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!' );
					WCRed()->log( 'bizumcheckout', __( '!!!!Refund Failed, please try again!!!!', 'woocommerce-redsys' ) );
					WCRed()->log( 'bizumcheckout', '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!' );
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', ' ' );
					WCRed()->log( 'bizumcheckout', '/******************************************/' );
					WCRed()->log( 'bizumcheckout', '  The final has come, this story has ended  ' );
					WCRed()->log( 'bizumcheckout', '/******************************************/' );
					WCRed()->log( 'bizumcheckout', ' ' );
				}
				return false;
			}
		} else {
			if ( 'yes' === $this->debug && $result ) {
				WCRed()->log( 'bizumcheckout', __( 'Refund Failed: No transaction ID', 'woocommerce-redsys' ) );
				WCRed()->log( 'bizumcheckout', ' ' );
				WCRed()->log( 'bizumcheckout', '/******************************************/' );
				WCRed()->log( 'bizumcheckout', '  The final has come, this story has ended  ' );
				WCRed()->log( 'bizumcheckout', '/******************************************/' );
				WCRed()->log( 'bizumcheckout', ' ' );
			}
			return new WP_Error( 'error', __( 'Refund Failed: No transaction ID', 'woocommerce-redsys' ) );
		}
	}
	/**
	 * Warning when Bizum is in test mode.
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
			echo esc_html__( 'Warning: WooCommerce Redsys Gateway Bizum is in test mode. Remember to uncheck it when you go live', 'woocommerce-redsys' );
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
		$selections = (array) WCRed()->get_redsys_option( 'testshowgateway', 'bizumcheckout' );

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
	/**
	 * Add custom jQuery to checkout page.
	 */
	public function custom_jquery_checkout() {

		if ( 'yes' === $this->not_use_https ) {
			$final_notify_url = $this->notify_url_not_https;
		} else {
			$final_notify_url = $this->notify_url;
		}
		if ( isset( $_GET['order_id'] ) && isset( $_GET['method'] ) && ! empty( $_GET['order_id'] && 'bizum' === $_GET['method'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$order_id     = sanitize_text_field( wp_unslash( $_GET['order_id'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$url          = $final_notify_url;
			$current_page = get_permalink( wc_get_page_id( 'checkout' ) );
			$order        = WCRed()->get_order( $order_id );
			?>
			<style>
				#open-bizum-popup {
					display: none;
					position: fixed;
					top: 0;
					bottom: 0;
					left: 0;
					right: 0;
					background-color: rgba(0, 0, 0, 0.5);
					z-index: 9999;
				}
				.bizum-popup-content {
					position: absolute;
					top: 50%;
					left: 50%;
					transform: translate(-50%, -50%);
					height: 550px;
					background-color: #fff;
				}
				iframe#bizum-iframe {
					width: 100%;
					height: 100%;
				}
				#close-popup {
					background-color: #2C3E50;
					color: #fff;
				}
				@media only screen and (min-width: 280px) {
					.bizum-popup-content {
						width: 270px;
					}
				}
				@media only screen and (min-width: 320px) {
					.bizum-popup-content {
						width: 300px;
					}
				}
				@media only screen and (min-width: 400px) {
					.bizum-popup-content {
						width: 380px;
					}
				}
				@media only screen and (min-width: 480px) {
					.bizum-popup-content {
						width: 470px;
					}
				}
				@media only screen and (min-width: 768px) {
					.bizum-popup-content {
						width: 760px;
					}
				}
				@media only screen and (min-width: 992px) {
					.bizum-popup-content {
						width: 900px;
					}
				}
				@media only screen and (min-width: 1200px) {
					.bizum-popup-content {
						width: 900px;
					}
				}
			</style>
			<div id="open-bizum-popup">
				<div class="bizum-popup-content">
					<iframe id="bizum-iframe" src="" frameborder="0"></iframe>
					<button id="bizum-close-popup"><?php esc_html_e( 'Close', 'woocommerce-redsys' ); ?></button>
				</div>
			</div>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$.urlParam = function(name){
						var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
						if (results==null){
						return null;
						}
						else{
						console.log('order_id = ' + results[1] || 0 + '');
						return results[1] || 0;
						}
					}
					$(document).ready(function() {
						if ( $( '#payment_method_bizumcheckout' ).is( ':checked' ) ) {
							var order_id = $.urlParam('order_id');
						var domain   = '<?php echo esc_url( $final_notify_url ); ?>';
						var url = domain + '&bizum-order-id=' + order_id + '&bizum-iframe=yes';
							if ( order_id != null ) {
								console.log('order_id = ' + order_id );
								$('#bizum-iframe').attr('src', url );
								$('#open-bizum-popup').fadeIn();
							}
						}
					});
					$(document).ready(function() {
						$( 'body' ).on( 'click', '#bizum-close-popup', function() {
							var url = '<?php echo esc_url( $current_page ); ?>';
							$('#open-bizum-popup').fadeOut();
							window.location.href = url;
						});
					});
				});
			</script>
			<?php
		}
	}
	/**
	 * Save fields to checkout (Bizum).
	 *
	 * @param int $order_id Order ID.
	 */
	public function save_field_update_order_meta( $order_id ) {

		// Verificar si el índice 'payment_method' está definido.
		if ( isset( $_POST['payment_method'] ) && 'bizumcheckout' === sanitize_text_field( wp_unslash( $_POST['payment_method'] ) ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$order   = WCRed()->get_order( $order_id );
			$user_id = $order->get_user_id();
			$data    = array();

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'bizumcheckout', 'HTTP $_POST checkout received: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'bizumcheckout', '$order_id: ' . $order_id );
				WCRed()->log( 'bizumcheckout', '$order: ' . $order );
			}

			// Verificar si el índice '_bizum_phone' está definido y no está vacío.
			if ( ! empty( $_POST['_bizum_phone'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
				if ( 'yes' === $this->debug ) {
					$bizum_phone = sanitize_text_field( wp_unslash( $_POST['_bizum_phone'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
					WCRed()->log( 'bizumcheckout', '$_POST["_bizum_phone"]: ' . $bizum_phone );
				}

				$phone = sanitize_text_field( wp_unslash( $_POST['_bizum_phone'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', '$phone: ' . $phone );
				}

				// Asegurarse de que el número de teléfono comienza con un '+' (si no, se añade el prefijo por defecto '+34').
				if ( strpos( $phone, '+' ) !== 0 ) {
					$phone = '+34' . $phone;
				}

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'bizumcheckout', '$phone con prefijo: ' . $phone );
				}

				$data['_bizum_phone'] = sanitize_text_field( $phone );
			}

			// Solo actualizamos los metadatos si hay datos que guardar.
			if ( ! empty( $data ) ) {
				WCRed()->update_order_meta( $order_id, $data );
			}
		}
	}
	/**
	 * Verificar estado pago AJAX.
	 */
	public static function verificar_estado_pago_ajax() {
		// Verificar si se ha proporcionado el ID del pedido.
		if ( isset( $_POST['order_id'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$order_id = intval( $_POST['order_id'] ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$bizum    = new WC_Gateway_Bizum_Checkout_Redsys();
			$paid     = get_transient( $order_id . '_bizum_payment' );
			if ( 'yes' === $bizum->debug ) {
				$bizum = new WC_Gateway_Bizum_Checkout_Redsys();
				WCRed()->log( 'bizumcheckout', '$order_id: ' . $order_id );
			}

			// Verificar si el pedido ha sido pagado.
			if ( 'yes' === $paid ) {
				// Redirigir al usuario a la página de agradecimiento de WooCommerce.
				if ( 'yes' === $bizum->debug ) {
					WCRed()->log( 'bizumcheckout', 'El pedido ha sido pagado' );
				}
				$order = WCRed()->get_order( $order_id );
				wp_send_json_success( $bizum->get_return_url( $order ) );
			} elseif ( $paid ) {
				$urlbase = wc_get_checkout_url();
				$url     = $urlbase . '?errorbizum=true&error=' . $paid;
				if ( 'yes' === $bizum->debug ) {
					WCRed()->log( 'bizumcheckout', 'Ha habido un error en el pago: ' . $paid );
					WCRed()->log( 'bizumcheckout', 'wc_get_checkout_url(): ' . $url );
				}
				wp_send_json_error( $url );
				// Verificar si ha pasado el tiempo límite de comprobación (7 minutos).(84 iteraciones * 5 segundos cada una = 7 minutos).
			} elseif ( $_POST['count'] >= 84 ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated,WordPress.Security.NonceVerification.Missing
				// Redirigir al usuario a la página de checkout.
				$url = wc_get_checkout_url();
				if ( 'yes' === $bizum->debug ) {
					WCRed()->log( 'bizumcheckout', 'Han pasado los 7 minutos' );
					WCRed()->log( 'bizumcheckout', 'wc_get_checkout_url(): ' . $url );
				}
				wp_send_json_error( $url );
			} else {
				// Si aún no ha pasado el tiempo límite, esperar 5 segundos y realizar otra comprobación.
				if ( 'yes' === $bizum->debug ) {
					WCRed()->log( 'bizumcheckout', 'Aún  no está pagado' );
				}
				sleep( 5 );
				wp_send_json_error( 'continue' );
			}
		}
		wp_die();
	}
}
/**
 * Add the gateway to WooCommerce
 *
 * @param array $methods WooCommerce payment methods.
 */
function woocommerce_add_gateway_bizum_checkout_redsys( $methods ) { // phpcs:ignore Universal.Files.SeparateFunctionsFromOO.Mixed
		$methods[] = 'WC_Gateway_Bizum_Checkout_Redsys';
		return $methods;
}
add_filter( 'woocommerce_payment_gateways', 'woocommerce_add_gateway_bizum_checkout_redsys' );
