<?php
/**
 * WooCommerce Redsys Gateway InSite Class.
 *
 * @package WooCommerce Redsys Gateway
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
 * Gateway class
 */
class WC_Gateway_InSite_Redsys extends WC_Payment_Gateway {

	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $id;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $icon;
	/**
	 * Description of the variable.
	 *
	 * @var bool
	 */
	public $has_fields;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $liveurl;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $testurl;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $liveurlws2;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $testurlws2;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $liveurlws;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $testurlws;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $testsha256;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $testmode;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $method_title;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $method_description;
	/**
	 * Description of the variable.
	 *
	 * @var bool
	 */
	public $not_use_https;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $notify_url;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $notify_url_not_https;
	/**
	 * Description of the variable.
	 *
	 * @var mixed
	 */
	public $log;
	/**
	 * Description of the variable.
	 *
	 * @var array
	 */
	public $supports;
	/**
	 * Description of the variable.
	 *
	 * @var bool
	 */
	public $is_valid_for_use;
	/**
	 * Description of the variable.
	 *
	 * @var array
	 */
	public $settings;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $title;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $logo;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $description;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $textnotfillfilds;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $customer;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $terminal;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $customfieldname;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $secretsha256;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $pay1clic;
	/**
	 * Description of the variable.
	 *
	 * @var bool
	 */
	public $debug;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $hashtype;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $insitelanguage;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $wooinsiteurlko;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $commercename;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $insitetype;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $lwvactive;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $traactive;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $traamount;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $colorbutton;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $colorfieldtext;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $colortextbutton;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $textcolor;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $buttontext;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $butonbgcolor;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $butontextcolor;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $cvvboxcolor;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $button_heigth;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $button_width;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $descripredsys;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $customtestsha256;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $testforuser;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $testforuserid;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $testshowgateway;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $moveterms;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $notiemail;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $merchantgroup;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $disablesubscrippaid;
	/**
	 * Description of the variable.
	 *
	 * @var string
	 */
	public $enabled;


	/**
	 * Constructor for the gateway.
	 *
	 * @return void
	 */
	public function __construct() {
		global $woocommerce;

		$this->id = 'insite';

		if ( ! empty( WCRed()->get_redsys_option( 'logo', 'insite' ) ) ) {
			$logo_url   = WCRed()->get_redsys_option( 'logo', 'insite' );
			$this->icon = apply_filters( 'woocommerce_insite_icon', $logo_url );
		} else {
			$this->icon = apply_filters( 'woocommerce_insite_icon', REDSYS_PLUGIN_URL_P . 'assets/images/redsys.png' );
		}

		$this->has_fields           = true;
		$this->liveurl              = 'https://sis.redsys.es/sis/services/SerClsWSEntrada';
		$this->testurl              = 'https://sis-i.redsys.es:25443/sis/services/SerClsWSEntrada';
		$this->liveurlws2           = 'https://sis.redsys.es:443/sis/services/SerClsWSEntradaV2?wsdl';
		$this->testurlws2           = 'https://sis-t.redsys.es:25443/sis/services/SerClsWSEntradaV2?wsdl';
		$this->liveurlws            = 'https://sis.redsys.es/sis/rest/trataPeticionREST';
		$this->testurlws            = 'https://sis-t.redsys.es:25443/sis/rest/trataPeticionREST';
		$this->testsha256           = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';
		$this->testmode             = WCRed()->get_redsys_option( 'testmode', 'insite' );
		$this->method_title         = __( 'Redsys in Checkout (by José Conti)', 'woocommerce-redsys' );
		$this->method_description   = __( 'Redsys in Checkout use InSite for add a Credit Card Form in the checkout. InSite is needed for use this payment form.', 'woocommerce-redsys' );
		$this->not_use_https        = WCRed()->get_redsys_option( 'not_use_https', 'insite' );
		$this->notify_url           = add_query_arg( 'wc-api', 'WC_Gateway_insiteredsys', home_url( '/' ) );
		$this->notify_url_not_https = str_replace( 'https:', 'http:', add_query_arg( 'wc-api', 'WC_Gateway_insiteredsys', home_url( '/' ) ) );

		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();

		// Define user set variables.
		$this->title               = WCRed()->get_redsys_option( 'title', 'insite' );
		$this->logo                = WCRed()->get_redsys_option( 'logo', 'insite' );
		$this->description         = WCRed()->get_redsys_option( 'description', 'insite' );
		$this->textnotfillfilds    = WCRed()->get_redsys_option( 'textnotfillfilds', 'insite' );
		$this->customer            = WCRed()->get_redsys_option( 'customer', 'insite' );
		$this->terminal            = WCRed()->get_redsys_option( 'terminal', 'insite' );
		$this->customfieldname     = WCRed()->get_redsys_option( 'customfieldname', 'insite' );
		$this->secretsha256        = WCRed()->get_redsys_option( 'secretsha256', 'insite' );
		$this->pay1clic            = WCRed()->get_redsys_option( 'pay1clic', 'insite' );
		$this->debug               = WCRed()->get_redsys_option( 'debug', 'insite' );
		$this->hashtype            = WCRed()->get_redsys_option( 'hashtype', 'insite' );
		$this->insitelanguage      = WCRed()->get_redsys_option( 'insitelanguage', 'insite' );
		$this->wooinsiteurlko      = WCRed()->get_redsys_option( 'wooinsiteurlko', 'insite' );
		$this->commercename        = WCRed()->get_redsys_option( 'wooinsitecomercename', 'insite' );
		$this->insitetype          = WCRed()->get_redsys_option( 'insitetype', 'insite' );
		$this->lwvactive           = WCRed()->get_redsys_option( 'lwvactive', 'insite' );
		$this->traactive           = WCRed()->get_redsys_option( 'traactive', 'insite' );
		$this->traamount           = WCRed()->get_redsys_option( 'traamount', 'insite' );
		$this->colorbutton         = WCRed()->get_redsys_option( 'colorbutton', 'insite' );
		$this->colorfieldtext      = WCRed()->get_redsys_option( 'colorfieldtext', 'insite' );
		$this->colortextbutton     = WCRed()->get_redsys_option( 'colortextbutton', 'insite' );
		$this->textcolor           = WCRed()->get_redsys_option( 'textcolor', 'insite' );
		$this->buttontext          = WCRed()->get_redsys_option( 'buttontext', 'insite' );
		$this->butonbgcolor        = WCRed()->get_redsys_option( 'butonbgcolor', 'insite' );
		$this->butontextcolor      = WCRed()->get_redsys_option( 'butontextcolor', 'insite' );
		$this->cvvboxcolor         = WCRed()->get_redsys_option( 'cvvboxcolor', 'insite' );
		$this->button_heigth       = WCRed()->get_redsys_option( 'button_heigth', 'insite' );
		$this->button_width        = WCRed()->get_redsys_option( 'button_width', 'insite' );
		$this->descripredsys       = WCRed()->get_redsys_option( 'descripredsys', 'insite' );
		$this->customtestsha256    = WCRed()->get_redsys_option( 'customtestsha256', 'insite' );
		$this->testforuser         = WCRed()->get_redsys_option( 'testforuser', 'insite' );
		$this->testforuserid       = WCRed()->get_redsys_option( 'testforuserid', 'insite' );
		$this->testshowgateway     = WCRed()->get_redsys_option( 'testshowgateway', 'insite' );
		$this->moveterms           = WCRed()->get_redsys_option( 'moveterms', 'insite' );
		$this->notiemail           = WCRed()->get_redsys_option( 'notiemail', 'insite' );
		$this->merchantgroup       = WCRed()->get_redsys_option( 'merchantgroup', 'insite' );
		$this->disablesubscrippaid = WCRed()->get_redsys_option( 'disablesubscrippaid', 'insite' );
		$this->supports            = array(
			'products',
			'tokenization',
			'refunds',
			'subscriptions',
			'subscription_cancellation',
			'subscription_suspension',
			'subscription_reactivation',
			'subscription_amount_changes',
			'subscription_date_changes',
			'subscription_payment_method_change',
			'subscription_payment_method_change_customer',
			'subscription_payment_method_change_admin',
			'multiple_subscriptions',
			'yith_subscriptions',
			'yith_subscriptions_scheduling',
			'yith_subscriptions_pause',
			'yith_subscriptions_multiple',
			'yith_subscriptions_payment_date',
			'yith_subscriptions_recurring_amount',
			'redsys_preauth',
			'redsys_token_r',
		);
		if ( ! $this->insitetype ) {
			$this->insitetype = 'intindepenelements';
		}
		// Actions.
		add_action( 'woocommerce_before_checkout_form', array( $this, 'add_error_to_checkout' ) );
		add_action( 'valid_' . $this->id . '_standard_ipn_request', array( $this, 'successful_request' ) );
		add_action( 'woocommerce_receipt_insite', array( $this, 'receipt_page' ) );
		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		// Payment listener/API hook.
		add_action( 'woocommerce_api_wc_gateway_insiteredsys', array( $this, 'check_ipn_response' ) );
		add_action( 'woocommerce_checkout_update_order_meta', array( $this, 'save_field_update_order_meta' ) );
		// WooCommerce Subscriptions.
		if ( class_exists( 'WC_Subscriptions_Order' ) ) {
			add_action( 'woocommerce_scheduled_subscription_payment_' . $this->id, array( $this, 'doing_scheduled_subscription_payment' ), 10, 2 );
		}
		if ( ! $this->is_valid_for_use() ) {
			$this->enabled = false;
		}
		add_action( 'ywsbs_pay_renew_order_with_' . $this->id, array( $this, 'renew_yith_subscription' ), 10, 1 );
		add_filter( 'woocommerce_checkout_fields', array( $this, 'update_checkout_on_change' ), 999 );
		add_action( 'wp_head', array( $this, 'add_insite_redsys2' ) );
		add_filter( 'woocommerce_available_payment_gateways', array( $this, 'show_payment_method' ) );
		add_filter( 'woocommerce_available_payment_gateways', array( $this, 'hide_payment_method_add_method' ) );
		if ( 'yes' === $this->moveterms ) {
			add_filter( 'woocommerce_checkout_show_terms', '__return_false' );
			add_action( 'woocommerce_review_order_before_payment', array( $this, 'move_terms_and_conditions' ), 90 );
		}

		// Sumo subscriptions.

		add_filter( 'sumosubscriptions_available_payment_gateways', __CLASS__ . '::add_subscription_supports' );
	}
	/**
	 * Check if this gateway is enabled and available in the user's country
	 *
	 * @return bool
	 */
	public function is_valid_for_use() {

		include_once REDSYS_PLUGIN_DATA_PATH_P . 'allowed-currencies.php';

		if ( ! in_array( get_woocommerce_currency(), redsys_return_allowed_currencies(), true ) ) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Admin Panel Options
	 *
	 * @since 1.0.0
	 */
	public function admin_options() {
		?>
			<h3><?php esc_html_e( 'Redsys in Checkout (by José Conti) - InSite', 'woocommerce-redsys' ); ?></h3>
			<p><?php esc_html_e( 'InSite works by adding a Credit Card Form in the WooCommerce Checkout.', 'woocommerce-redsys' ); ?></p>
			<?php if ( class_exists( 'SitePress' ) ) { ?>
				<div class="updated fade"><h4><?php esc_html_e( 'Attention! WPML detected.', 'woocommerce-redsys' ); ?></h4>
					<p><?php esc_html_e( 'The Gateway will be shown in the customer language. The option "Language Gateway" is not taken into consideration', 'woocommerce-redsys' ); ?></p>
				</div>
				<?php
			}
			if ( ! class_exists( 'SOAPClient' ) ) {
				?>
				<div class="notice notice-error"><h4><?php esc_html_e( 'Attention! Problem with SOAP.', 'woocommerce-redsys' ); ?></h4>
					<?php esc_html_e( 'SOAP is needed for Pay with InSite. Ask to your hosting to enable it. Without active SOAP on the server, the functionality of the plugin is very limited.', 'woocommerce-redsys' ); ?>
				</div>
				<?php
			}
			WCRed()->return_help_notice();
			if ( $this->is_valid_for_use() ) :
				?>
				<table class="form-table">
					<?php
					// Generate the HTML For the settings form.
					$this->generate_settings_html();
					?>
				</table><!--/.form-table-->
				<?php
			else :
				include_once REDSYS_PLUGIN_DATA_PATH_P . 'allowed-currencies.php';
				$currencies          = redsys_return_allowed_currencies();
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
		$selections = (array) WCRed()->get_redsys_option( 'testforuserid', 'insite' );

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
		$selections_show = (array) WCRed()->get_redsys_option( 'testshowgateway', 'insite' );
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
			'enabled'             => array(
				'title'   => __( 'Enable/Disable', 'woocommerce-redsys' ),
				'type'    => 'checkbox',
				'label'   => __( 'Enable InSite', 'woocommerce-redsys' ),
				'default' => 'no',
			),
			'insitetype'          => array(
				'title'       => __( 'Select InSite Type', 'woocommerce-redsys' ),
				'type'        => 'select',
				'description' => __( 'Select Independent elements (default) o Integrated form.', 'woocommerce-redsys' ),
				'default'     => 'intindepenelements',
				'options'     => array(
					'intindepenelements' => __( 'Integration by independent elements (Default)', 'woocommerce-redsys' ),
					'unifiedintegration' => __( 'Unified integration', 'woocommerce-redsys' ),
				),
			),
			'pay1clic'            => array(
				'title'   => __( 'Pay with 1click', 'woocommerce-redsys' ),
				'type'    => 'checkbox',
				'label'   => __( 'Enable Pay with 1click', 'woocommerce-redsys' ),
				'default' => 'no',
			),
			'title'               => array(
				'title'       => __( 'Title', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce-redsys' ),
				'default'     => __( 'InSite', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'description'         => array(
				'title'       => __( 'Description', 'woocommerce-redsys' ),
				'type'        => 'textarea',
				'description' => __( 'This controls the description which the user sees during checkout.', 'woocommerce-redsys' ),
				'default'     => __( 'Pay via InSite; you can pay with your credit card.', 'woocommerce-redsys' ),
			),
			'logo'                => array(
				'title'       => __( 'Gateway logo at checkout', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Add link to image logo for Gateway at checkout.', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'textnotfillfilds'    => array(
				'title'       => __( 'Text when the customer', 'woocommerce-redsys' ),
				'type'        => 'textarea',
				'description' => __( 'Text when the customer has not yet filled in the required billing fields for InSite.', 'woocommerce-redsys' ),
				'default'     => __( 'Please fill in the billing fields of the checkout form. After filling them, the credit card form will appear.', 'woocommerce-redsys' ),
			),
			'lwvactive'           => array(
				'title'   => __( 'Enable LWV', 'woocommerce-redsys' ),
				'type'    => 'checkbox',
				'label'   => __( 'Enable LWV. WARNING, your bank has to enable it before you use it.', 'woocommerce-redsys' ),
				'default' => 'no',
			),
			'traactive'           => array(
				'title'   => __( 'Enable TRA', 'woocommerce-redsys' ),
				'type'    => 'checkbox',
				'label'   => __( 'Enable TRA. WARNING, your bank has to enable it before you use it.', 'woocommerce-redsys' ),
				'default' => 'no',
			),
			'traamount'           => array(
				'title'       => __( 'Limit import for TRA', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'TRA will be sent when the amount is inferior to what you specify here. Write the amount without the currency sign, i.e. if it is 250€, ONLY write 250', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'notiemail'           => array(
				'title'       => __( 'Notification email', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Email errors will arrive to this email', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'commercename'        => array(
				'title'       => __( 'Commerce Name', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Commerce Name', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'customer'            => array(
				'title'       => __( 'Commerce number (FUC)', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Commerce number (FUC) provided by your bank.', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'merchantgroup'       => array(
				'title'       => __( 'Merchant Group Number', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'It is an identifier for sharing tokens between websites of the same company', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'terminal'            => array(
				'title'       => __( 'Terminal number', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Terminal number provided by your bank.', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'descripredsys'       => array(
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
			'disablesubscrippaid' => array(
				'title'       => __( 'Disable mark as paid Subscriptions by plugin', 'woocommerce-redsys' ),
				'type'        => 'checkbox',
				'description' => __( 'You should only check this option if subscription renewals are marked twice as paid.', 'woocommerce-redsys' ),
				'label'       => __( 'Disable Subscription paid, it is enabled by default', 'woocommerce-redsys' ),
				'default'     => 'no',
			),
			'secretsha256'        => array(
				'title'       => __( 'Encryption secret passphrase SHA-256', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Encryption secret passphrase SHA-256 provided by your bank.', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'customtestsha256'    => array(
				'title'       => __( 'TEST MODE: Encryption secret passphrase SHA-256', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'Encryption secret passphrase SHA-256 provided by your bank for test mode.', 'woocommerce-redsys' ),
				'desc_tip'    => true,
			),
			'insitelanguage'      => array(
				'title'       => __( 'Language Gateway', 'woocommerce-redsys' ),
				'type'        => 'select',
				'description' => __( 'Choose the language for the Gateway. Not all Banks accept all languages', 'woocommerce-redsys' ),
				'default'     => '001',
				'options'     => array(),
			),
			'wooinsiteurlko'      => array(
				'title'       => __( 'Return URL (Redsys Error button)', 'woocommerce-redsys' ),
				'type'        => 'select',
				'description' => __( 'When the user press the return button at Redsys Gateway (Ex: The user type an incorrect credit cart), you can redirect the user to My Cart page canceling the order, or you can redirect the user to Checkput page without cancel the order.', 'woocommerce-redsys' ),
				'default'     => 'returncancel',
				'options'     => array(
					'returncancel'   => __( 'Cancel the order and return to My Cart page', 'woocommerce-redsys' ),
					'returnnocancel' => __( 'Don\'t cancel the order and return to Checkout page', 'woocommerce-redsys' ),
				),
			),
			'not_use_https'       => array(
				'title'       => __( 'HTTPS SNI Compatibility', 'woocommerce-redsys' ),
				'type'        => 'checkbox',
				'label'       => __( 'Activate SNI Compatibility (only activate it if José Conti indicate you).', 'woocommerce-redsys' ),
				'default'     => 'no',
				'description' => sprintf( __( 'Only use it if José Conti indicate you. WARNING: If you are forcing redirection to HTTPS with htaccess, you need to add an exception for notification URL', 'woocommerce-redsys' ) ),
			),
			'moveterms'           => array(
				'title'       => __( 'Move Terms and conditions', 'woocommerce-redsys' ),
				'type'        => 'checkbox',
				'label'       => __( 'Move terms and Conditions above gateways.', 'woocommerce-redsys' ),
				'default'     => 'no',
				'description' => sprintf( __( 'This option move terms and Conditions above gateways. Recomended when InSite is active', 'woocommerce-redsys' ) ),
			),
			'customfieldname'     => array(
				'title'       => __( 'Custom "Name" field', 'woocommerce-redsys' ),
				'type'        => 'text',
				'default'     => '',
				'description' => __( 'In some cases you modify the billing field "Name" in the checkout. If you do this, add the custom name field or InSite will not work, example billing_first_name', 'woocommerce-redsys' ),
			),
			'buttontext'          => array(
				'title'       => __( 'Button Text', 'woocommerce-redsys' ),
				'type'        => 'text',
				'default'     => 'Realizar pago',
				'description' => __( 'Add the Button Text.', 'woocommerce-redsys' ),
			),
			'textcolor'           => array(
				'title'       => __( 'General Color Text', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'This is the General text color added by InSite. Default #2e3131', 'woocommerce-redsys' ),
				'default'     => '#2e3131',
				'class'       => 'colorpick',
			),
			'colorbutton'         => array(
				'title'       => __( 'Color Button', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'This if button color. Default #f39c12', 'woocommerce-redsys' ),
				'default'     => '#f39c12',
				'class'       => 'colorpick',
			),
			'colortextbutton'     => array(
				'title'       => __( 'Color text Button', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'This if button text color. Default #ffffff', 'woocommerce-redsys' ),
				'default'     => '#ffffff',
				'class'       => 'colorpick',
			),
			'colorfieldtext'      => array(
				'title'       => __( 'Color Fields Text', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'This the text color of the field text. Default #95a5a6', 'woocommerce-redsys' ),
				'default'     => '#95a5a6',
				'class'       => 'colorpick',
			),
			'cvvboxcolor'         => array(
				'title'       => __( 'CVV box background color', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'This the background color of CVV field. Default #d5d5d5', 'woocommerce-redsys' ),
				'default'     => '#d5d5d5',
				'class'       => 'colorpick',
			),
			'button_heigth'       => array(
				'title'       => __( 'Button Pay Now heigth', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'The heigth os Pay now button. Default 85px (you can use px or %)', 'woocommerce-redsys' ),
				'default'     => '85px',
			),
			'button_width'        => array(
				'title'       => __( 'Button Pay Now width', 'woocommerce-redsys' ),
				'type'        => 'text',
				'description' => __( 'The width os Pay now button. Default 100% (you can use px or %)', 'woocommerce-redsys' ),
				'default'     => '100%',
			),
			'testmode'            => array(
				'title'       => __( 'Running in test mode', 'woocommerce-redsys' ),
				'type'        => 'checkbox',
				'label'       => __( 'Running in test mode', 'woocommerce-redsys' ),
				'default'     => 'yes',
				'description' => sprintf( __( 'Select this option for the initial testing required by your bank, deselect this option once you pass the required test phase and your production environment is active.', 'woocommerce-redsys' ) ),
			),
			'testshowgateway'     => array(
				'title'       => __( 'Show to this users', 'woocommerce-redsys' ),
				'type'        => 'multiselect',
				'label'       => __( 'Show the gateway in the chcekout when it is in test mode', 'woocommerce-redsys' ),
				'class'       => 'js-woo-show-gateway-test-settings',
				'id'          => 'woocommerce_redsys_showtestforuserid',
				'options'     => $options_show,
				'default'     => '',
				'description' => sprintf( __( 'Select users that will see the gateway when it is in test mode. If no users are selected, will be shown to all users', 'woocommerce-redsys' ) ),
			),
			'testforuser'         => array(
				'title'       => __( 'Running in test mode for a user', 'woocommerce-redsys' ),
				'type'        => 'checkbox',
				'label'       => __( 'Running in test mode for a user', 'woocommerce-redsys' ),
				'default'     => '',
				'description' => sprintf( __( 'The user selected below will use the terminal in test mode. Other users will continue to use live mode unless you have the "Running in test mode" option checked.', 'woocommerce-redsys' ) ),
			),
			'testforuserid'       => array(
				'title'       => __( 'Users', 'woocommerce-redsys' ),
				'type'        => 'multiselect',
				'label'       => __( 'Users running in test mode', 'woocommerce-redsys' ),
				'class'       => 'js-woo-allowed-users-settings',
				'id'          => 'woocommerce_redsys_testforuserid',
				'options'     => $options,
				'default'     => '',
				'description' => sprintf( __( 'Select users running in test mode', 'woocommerce-redsys' ) ),
			),
			'debug'               => array(
				'title'       => __( 'Debug Log', 'woocommerce-redsys' ),
				'type'        => 'checkbox',
				'label'       => __( 'Enable logging', 'woocommerce-redsys' ),
				'default'     => 'no',
				'description' => __( 'Log InSite events, such as notifications requests, inside <code>WooCommerce > Status > Logs > insite-{date}-{number}.log</code>', 'woocommerce-redsys' ),
			),
		);
		$redsyslanguages   = WCRed()->get_redsys_languages();

		foreach ( $redsyslanguages as $redsyslanguage => $valor ) {
			$this->form_fields['insitelanguage']['options'][ $redsyslanguage ] = $valor;
		}
	}
	/**
	 * Move terms and conditions checkbox to the bottom of the checkout form.
	 */
	public function move_terms_and_conditions() {

		if ( function_exists( 'wc_terms_and_conditions_checkbox_enabled' ) && wc_terms_and_conditions_checkbox_enabled() ) {
			do_action( 'woocommerce_checkout_before_terms_and_conditions' );
			?>
			<p class="form-row validate-required">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
				<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); // phpcs:ignore WordPress.Security.NonceVerification.Missing ?> id="terms" />
					<span class="woocommerce-terms-and-conditions-checkbox-text"><?php wc_terms_and_conditions_checkbox_text(); ?></span>&nbsp;<span class="required">*</span>
				</label>
				<input type="hidden" name="terms-field" value="1" />
			</p>
			<?php
			do_action( 'woocommerce_checkout_after_terms_and_conditions' );
		}
	}
	/**
	 * Add the InSite JS to the checkout page.
	 */
	public function add_insite_redsys2() {

		if ( is_wc_endpoint_url( 'order-pay' ) || is_checkout() ) {

			if ( is_user_logged_in() ) {
				$user_id = get_current_user_id();
			} else {
				$user_id = '0';
			}
			echo '<!-- Comienza JS para InSite añadido por WooCommerce Redsys Gateway https://woocommerce.com/products/redsys-gateway/ -->';
			echo '<script type="text/javascript">var ajaxurl = "' . esc_url( admin_url( 'admin-ajax.php' ) ) . '";</script>';
			$this->get_js_header( $user_id );
			echo '<!-- Finaliza JS para InSite añadido por WooCommerce Redsys Gateway https://woocommerce.com/products/redsys-gateway/ -->';
		}
	}
	/**
	 * Get JS Header
	 *
	 * @param int $user_id User ID.
	 */
	public function get_js_header( $user_id = false ) {

		if ( WCRed()->is_gateway_enabled( 'insite' ) && ! WCRed()->checkout_use_block() ) {
			if ( 'yes' === $this->testmode ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '          URL Test        ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				echo '<script src="https://sis-t.redsys.es:25443/sis/NC/sandbox/redsysV3.js"></script>'; // phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedScript
			} else {
				$user_test = $this->check_user_test_mode( $user_id );
				if ( $user_test ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '          URL Test WD         ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}
					echo '<script src="https://sis-t.redsys.es:25443/sis/NC/sandbox/redsysV3.js"></script>'; // phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedScript
				} else {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '          URL Live WD         ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}
					echo '<script src="https://sis.redsys.es/sis/NC/redsysV3.js"></script>'; // phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedScript
				}
			}
		} else {
			echo '';
		}
	}
	/**
	 * Get Redsys URL Gateway
	 *
	 * @param int $user_id User ID.
	 */
	public function get_redsys_url_gateway( $user_id = false ) {

		if ( WCRed()->is_gateway_enabled( 'insite' ) ) {
			if ( 'yes' === $this->testmode ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '          URL Test        ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				$url = $this->testurlws;
			} else {
				$user_test = $this->check_user_test_mode( $user_id );
				if ( $user_test ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '          URL Test RD         ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}
					$url = $this->testurlws;
				} else {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '          URL Live RD         ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}
					$url = $this->liveurlws;
				}
			}
			return $url;
		}
	}
	/**
	 * Get Redsys URL Gateway WS
	 *
	 * @param int $user_id User ID.
	 */
	public function get_redsys_url_gateway_ws( $user_id = false ) {

		if ( WCRed()->is_gateway_enabled( 'insite' ) ) {
			if ( 'yes' === $this->testmode ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '          URL Test        ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				$url = $this->testurlws2;
			} else {
				$user_test = $this->check_user_test_mode( $user_id );
				if ( $user_test ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '          URL Test RD         ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}
					$url = $this->testurlws2;
				} else {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '          URL Live RD         ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}
					$url = $this->liveurlws2;
				}
			}
			return $url;
		}
	}
	/**
	 * Check if user is in test mode
	 *
	 * @param int $userid User ID.
	 */
	public function check_user_show_payment_method( $userid = false ) {

		$test_mode  = $this->testmode;
		$selections = (array) WCRed()->get_redsys_option( 'testshowgateway', 'insite' );

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
	 * Check if user is in test mode
	 *
	 * @param array $available_gateways Available Gateways.
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
	 * Check if user is in test mode
	 *
	 * @param array $available_gateways Available Gateways.
	 */
	public function hide_payment_method_add_method( $available_gateways ) {

		if ( ! is_admin() && is_wc_endpoint_url( 'add-payment-method' ) ) {
			unset( $available_gateways[ $this->id ] );
		}
		return $available_gateways;
	}
	/**
	 * Check if user is in test mode
	 *
	 * @param int $userid User ID.
	 */
	public function check_user_test_mode( $userid = false ) {

		if ( ! $userid ) {
			return false;
		}
		$usertest_active = $this->testforuser;
		$selections      = (array) WCRed()->get_redsys_option( 'testforuserid', 'insite' );
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '     Checking user test       ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
		}

		if ( 'yes' === $usertest_active ) {

			if ( ! empty( $selections ) ) {
				foreach ( $selections as $user_id ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '   Checking user ' . $userid );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '  User in forach ' . $user_id );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( (string) $user_id === (string) $userid ) {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', ' ' );
							WCRed()->log( 'insite', '/****************************/' );
							WCRed()->log( 'insite', '   Checking user test TRUE    ' );
							WCRed()->log( 'insite', '/****************************/' );
							WCRed()->log( 'insite', ' ' );
							WCRed()->log( 'insite', ' ' );
							WCRed()->log( 'insite', '/********************************************/' );
							WCRed()->log( 'insite', '  User ' . $userid . ' is equal to ' . $user_id );
							WCRed()->log( 'insite', '/********************************************/' );
							WCRed()->log( 'insite', ' ' );
						}
						return true;
					}
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '  Checking user test continue ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}
					continue;
				}
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '  Checking user test FALSE    ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				return false;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '  Checking user test FALSE    ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				return false;
			}
		} else {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '     User test Disabled.      ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
			}
			return false;
		}
	}
	/**
	 * Get SHA256.
	 *
	 * @param  bool $user_id User ID.
	 * @return string
	 */
	public function get_redsys_sha256( $user_id = false ) {

		if ( 'yes' === $this->testmode ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '         SHA256 Test.         ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
			}
			$customtestsha256 = mb_convert_encoding( $this->customtestsha256, 'ISO-8859-1', 'UTF-8' );
			if ( ! empty( $customtestsha256 ) ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '      SHA256 Test Custom.     ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				$sha256 = $customtestsha256;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '     SHA256 Test Standard.    ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				$sha256 = mb_convert_encoding( $this->testsha256, 'ISO-8859-1', 'UTF-8' );
			}
		} elseif ( '0' === $user_id || ! $user_id ) {
			if ( 'yes' === $this->testmode ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '         SHA256 Test.         ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				$customtestsha256 = mb_convert_encoding( $this->customtestsha256, 'ISO-8859-1', 'UTF-8' );
				if ( ! empty( $customtestsha256 ) ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '      SHA256 Test Custom.     ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}
					$sha256 = $customtestsha256;
				} else {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '     SHA256 Test Standard.    ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}
					$sha256 = mb_convert_encoding( $this->testsha256, 'ISO-8859-1', 'UTF-8' );
				}
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '     USER SHA256 NOT Test.    ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				$sha256 = mb_convert_encoding( $this->secretsha256, 'ISO-8859-1', 'UTF-8' );
			}
		} else {
			$user_test = $this->check_user_test_mode( $user_id );
			if ( $user_test ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '      USER SHA256 Test.       ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				$customtestsha256 = mb_convert_encoding( $this->customtestsha256, 'ISO-8859-1', 'UTF-8' );
				if ( ! empty( $customtestsha256 ) ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '      SHA256 Test Custom.     ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}
					$sha256 = $customtestsha256;
				} else {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '     SHA256 Test Standard.    ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}
					$sha256 = mb_convert_encoding( $this->testsha256, 'ISO-8859-1', 'UTF-8' );
				}
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '     USER SHA256 NOT Test.    ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				$sha256 = mb_convert_encoding( $this->secretsha256, 'ISO-8859-1', 'UTF-8' );
			}
		}
		return $sha256;
	}
	/**
	 * Update checkout on change.
	 *
	 * @param array $fields Fields.
	 */
	public function update_checkout_on_change( $fields ) {

		if ( isset( $this->customfieldname ) && $this->customfieldname ) {
			$customfieldname = $this->customfieldname;
		} else {
			$customfieldname = 'billing_first_name';
		}
		if ( ! empty( $customfieldname ) || '' !== $customfieldname ) {
			$fields['billing'][ $customfieldname ]['class'][] = 'update_totals_on_change';
		} else {
			$fields['billing']['billing_first_name']['class'][] = 'update_totals_on_change';

		}
		return $fields;
	}
	/**
	 * Add gateway to support subscriptions.
	 *
	 * @param array $subscription_gateways Subscription gateways.
	 * @return array
	 */
	public static function add_subscription_supports( $subscription_gateways ) {
		$subscription_gateways[] = 'insite';
		return $subscription_gateways;
	}
	/**
	 * Charge a WooCommerce subscription.
	 *
	 * @param float    $amount_to_charge Amount to charge.
	 * @param WC_Order $renewal_order Order.
	 */
	public function doing_scheduled_subscription_payment( $amount_to_charge, $renewal_order ) {

		$order_id    = $renewal_order->get_id();
		$redsys_done = WCRed()->get_order_meta( $order_id, '_redsys_done', true );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '       Once upon a time       ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/***************************************/' );
			WCRed()->log( 'insite', '  Doing scheduled_subscription_payment   ' );
			WCRed()->log( 'insite', '/***************************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/***************************************/' );
			WCRed()->log( 'insite', '      $order_id = ' . $order_id . '      ' );
			WCRed()->log( 'insite', '/***************************************/' );
			WCRed()->log( 'insite', ' ' );
		}

		if ( 'yes' === $redsys_done ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/***************************************/' );
				WCRed()->log( 'insite', '       Payment is complete EXIT          ' );
				WCRed()->log( 'insite', '/***************************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/******************************************/' );
				WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
				WCRed()->log( 'insite', '/******************************************/' );
			}
			return;
		} else {

			$order  = $renewal_order;
			$amount = $amount_to_charge;

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/**********************************************/' );
				WCRed()->log( 'insite', '  Function  doing_scheduled_subscription_payment' );
				WCRed()->log( 'insite', '/**********************************************/' );
				WCRed()->log( 'insite', ' ' );
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/***************************************/' );
				WCRed()->log( 'insite', '   scheduled charge Amount: ' . $amount );
				WCRed()->log( 'insite', '/***************************************/' );
				WCRed()->log( 'insite', ' ' );
			}

			$order_total_sign     = '';
			$transaction_id2      = '';
			$transaction_type     = '';
			$ds_merchant_terminal = '';
			$final_notify_url     = '';
			$returnfromredsys     = '';
			$gatewaylanguage      = '';
			$currency             = '';
			$secretsha256         = '';
			$customer             = '';
			$url_ok               = '';
			$product_description  = '';
			$merchant_name        = '';

			$order_id = $order->get_id();
			$user_id  = $order->get_user_id();

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '  Generating Tokenized call   ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$order_id: ' . $order_id );
				WCRed()->log( 'insite', '$user_id: ' . $user_id );
				WCRed()->log( 'insite', ' ' );
			}

			$type       = 'ws';
			$order      = WCRed()->get_order( $order_id );
			$redsys_adr = $this->get_redsys_url_gateway_ws( $user_id, $type );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Using WS URL: ' . $redsys_adr );
				WCRed()->log( 'insite', ' ' );
			}

			$currency_codes = WCRed()->get_currencies();

			$transaction_id2  = WCRed()->prepare_order_number( $order_id );
			$order_total_sign = WCRed()->redsys_amount_format( $order->get_total() );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$order_total_sign: ' . $order_total_sign );
				WCRed()->log( 'insite', ' ' );
			}

			$transaction_type = '0';

			$gatewaylanguage = $this->redsyslanguage;

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$gatewaylanguage: ' . $order_total_sign );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$transaction_type: ' . $transaction_type );
			}

			if ( $this->wooredsysurlko ) {
				if ( 'returncancel' === $this->wooredsysurlko ) {
					$returnfromredsys = $order->get_cancel_order_url();
				} else {
					$returnfromredsys = wc_get_checkout_url();
				}
			} else {
				$returnfromredsys = $order->get_cancel_order_url();
			}
			if ( 'yes' === $this->useterminal2 ) {
				$toamount  = number_format( $this->toamount, 2, '', '' );
				$terminal  = $this->terminal;
				$terminal2 = $this->terminal2;
				if ( $order_total_sign <= $toamount ) {
					$ds_merchant_terminal = $terminal2;
				} else {
					$ds_merchant_terminal = $terminal;
				}
			} else {
				$ds_merchant_terminal = $this->terminal;
			}

			if ( 'yes' === $this->not_use_https ) {
				$final_notify_url = $this->notify_url_not_https;
			} else {
				$final_notify_url = $this->notify_url;
			}
			$customer_token    = WCRed()->get_users_token_bulk( $user_id, 'R' );
			$customer_token_id = WCRed()->get_users_token_bulk( $user_id, 'R', 'id' );
			$txnid             = WCRed()->get_txnid( $customer_token_id );
			if ( ! $customer_token || empty( $customer_token ) || '' === trim( $customer_token ) ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '$customer_token: NO Token or expired Credit Card' );
					WCRed()->log( 'insite', ' ' );
				}
				$url = 'URL: ' . WCRed()->get_order_edit_url( $order_id );
				$order->add_order_note( esc_html__( 'No credit card or expired', 'woocommerce-redsys' ) );
				$message = __( '⚠️ No credit card or expired', 'woocommerce-redsys' );
				WCRed()->add_subscription_note( $message, $order_id );
				WCRed()->push( $message . ' ' . $url );
				$renewal_order->update_status( 'failed' );
			}

			$use_token = WCRed()->maybe_use_token( $customer_token_id );

			if ( ! $use_token ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'redsys', 'Waiting 72h' );
				}
				$url   = 'URL: ' . WCRed()->get_order_edit_url( $order_id );
				$error = esc_html__( '⚠️ Subscription Payment failed. Credit card blocked for 72h', 'woocommerce-redsys' );
				$order->add_order_note( __( 'Customer Credit Card Blocked for 72h', 'woocommerce-redsys' ) );
				$message = __( '⚠️ Subscription Payment failed. Credit card blocked for 72h. ', 'woocommerce-redsys' ) . 'URL: ' . WCRed()->get_order_edit_url( $order_id );
				WCRed()->add_subscription_note( $message, $order_id );
				WCRed()->push( $message . ' ' . $url );
				$renewal_order->update_status( 'failed' );
				do_action( 'redsys_post_payment_error', $order->get_id(), $error );
				return false;
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$customer_token: ' . $customer_token );
				WCRed()->log( 'insite', ' ' );
			}

			$redsys_data_send = array();

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', 'Order Currency: ' . get_woocommerce_currency() );
				WCRed()->log( 'insite', ' ' );
			}
			$currency            = $currency_codes[ get_woocommerce_currency() ];
			$secretsha256        = $this->get_redsys_sha256( $user_id );
			$customer            = $this->customer;
			$url_ok              = add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) );
			$product_description = WCRed()->product_description( $order, 'redsys' );
			$merchant_name       = $this->commercename;
			$redsys_data_send    = array(
				'order_total_sign'    => $order_total_sign,
				'transaction_id2'     => $transaction_id2,
				'transaction_type'    => $transaction_type,
				'DSMerchantTerminal'  => $ds_merchant_terminal,
				'final_notify_url'    => $final_notify_url,
				'returnfromredsys'    => $returnfromredsys,
				'gatewaylanguage'     => $gatewaylanguage,
				'currency'            => $currency,
				'secretsha256'        => $secretsha256,
				'customer'            => $customer,
				'url_ok'              => $url_ok,
				'product_description' => $product_description,
				'merchant_name'       => $merchant_name,
			);
			if ( has_filter( 'redsys_modify_data_to_send' ) ) {

				$redsys_data_send = apply_filters( 'redsys_modify_data_to_send', $redsys_data_send );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', 'Using filter redsys_modify_data_to_send' );
					WCRed()->log( 'insite', ' ' );
				}
			}
			$secretsha256     = $redsys_data_send['secretsha256'];
			$order_total_sign = $redsys_data_send['order_total_sign'];
			$orderid2         = $redsys_data_send['transaction_id2'];
			$customer         = $redsys_data_send['customer'];
			$currency         = $redsys_data_send['currency'];
			$transaction_type = $redsys_data_send['transaction_type'];
			$terminal         = $redsys_data_send['DSMerchantTerminal'];
			$final_notify_url = $redsys_data_send['final_notify_url'];
			$url_ok           = $redsys_data_send['url_ok'];
			$gatewaylanguage  = $redsys_data_send['gatewaylanguage'];
			$merchant_name    = $redsys_data_send['merchant_name'];
			$merchan_name2    = WCRed()->get_order_meta( $order_id, '_billing_first_name', true );
			$merchant_lastnme = WCRed()->get_order_meta( $order_id, '_billing_last_name', true );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$order_total_sign: ' . $order_total_sign );
				WCRed()->log( 'insite', '$order: ' . $orderid2 );
				WCRed()->log( 'insite', '$customer: ' . $customer );
				WCRed()->log( 'insite', '$currency: ' . $currency );
				WCRed()->log( 'insite', '$transaction_type: 0' );
				WCRed()->log( 'insite', '$terminal: ' . $terminal );
				WCRed()->log( 'insite', '$url_ok: ' . $url_ok );
				WCRed()->log( 'insite', '$gatewaylanguage: ' . $gatewaylanguage );
				WCRed()->log( 'insite', '$final_notify_url: ' . $final_notify_url );
				WCRed()->log( 'insite', ' ' );
			}

			$mi_obj = new WooRedsysAPIWS();
			if ( ! empty( $this->merchantgroup ) ) {
				$ds_merchant_group = '<DS_MERCHANT_GROUP>' . $this->merchantgroup . '</DS_MERCHANT_GROUP>';
			} else {
				$ds_merchant_group = '';
			}

			$datos_entrada  = '<DATOSENTRADA>';
			$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
			$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
			$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
			$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
			$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
			$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
			$datos_entrada .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
			$datos_entrada .= '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
			$datos_entrada .= '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
			$datos_entrada .= '<DS_MERCHANT_COF_TXNID>' . $txnid . '</DS_MERCHANT_COF_TXNID>';
			$datos_entrada .= '<DS_MERCHANT_EXCEP_SCA>MIT</DS_MERCHANT_EXCEP_SCA>';
			$datos_entrada .= '<DS_MERCHANT_DIRECTPAYMENT>TRUE</DS_MERCHANT_DIRECTPAYMENT>';
			$datos_entrada .= '<DS_MERCHANT_MERCHANTURL>' . $final_notify_url . '</DS_MERCHANT_MERCHANTURL>';
			$datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name2 ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
			$datos_entrada .= '<DS_MERCHANT_EMV3DS>{"threeDSInfo":"CardData"}</DS_MERCHANT_EMV3DS>';
			$datos_entrada .= '</DATOSENTRADA>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The call 1          ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', $datos_entrada );
				WCRed()->log( 'insite', ' ' );
			}

			$xml  = '<REQUEST>';
			$xml .= $datos_entrada;
			$xml .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
			$xml .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
			$xml .= '</REQUEST>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The XML 1            ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', $xml );
				WCRed()->log( 'insite', ' ' );
			}

			$cliente    = new SoapClient( $redsys_adr );
			$responsews = $cliente->iniciaPeticion( array( 'datoEntrada' => $xml ) );

			if ( isset( $responsews->iniciaPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$xml_retorno = new SimpleXMLElement( $responsews->iniciaPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$respuesta   = json_decode( $xml_retorno->INFOTARJETA->Ds_EMV3DS ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$xml_retorno 1 IniciaPeticion: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}

			$ds_emv3ds_json         = $xml_retorno->INFOTARJETA->Ds_EMV3DS; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$ds_emv3ds              = json_decode( $ds_emv3ds_json );
			$protocol_version       = $ds_emv3ds->protocolVersion; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$three_dsserver_transid = $ds_emv3ds->threeDSServerTransID; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$three_ds_info          = $ds_emv3ds->threeDSInfo; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$ds_emv3ds_json: ' . $ds_emv3ds_json );
				WCRed()->log( 'insite', '$ds_emv3ds: ' . print_r( $ds_emv3ds, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', '$three_dsserver_transid: ' . $three_dsserver_transid );
				WCRed()->log( 'insite', '$three_ds_info: ' . $three_ds_info );
			}

			if ( '2.1.0' === $protocol_version || '2.2.0' === $protocol_version ) {

				$datos_entrada  = '<DATOSENTRADA>';
				$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
				$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
				$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
				$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
				$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
				$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
				$datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name2 ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
				$datos_entrada .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
				$datos_entrada .= '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
				$datos_entrada .= '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
				$datos_entrada .= '<DS_MERCHANT_COF_TXNID>' . $txnid . '</DS_MERCHANT_COF_TXNID>';
				$datos_entrada .= '<DS_MERCHANT_EXCEP_SCA>MIT</DS_MERCHANT_EXCEP_SCA>';
				$datos_entrada .= '<DS_MERCHANT_DIRECTPAYMENT>TRUE</DS_MERCHANT_DIRECTPAYMENT>';
				$datos_entrada .= '<DS_MERCHANT_MERCHANTURL>' . $final_notify_url . '</DS_MERCHANT_MERCHANTURL>';
				$datos_entrada .= '</DATOSENTRADA>';
				$xml            = '<REQUEST>';
				$xml           .= $datos_entrada;
				$xml           .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
				$xml           .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
				$xml           .= '</REQUEST>';

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '          The XML 2             ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', 'trataPeticion 1: ' . $xml );
					WCRed()->log( 'insite', ' ' );
				}
				$cliente    = new SoapClient( $redsys_adr );
				$responsews = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

				if ( isset( $responsews->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$xml_retorno       = new SimpleXMLElement( $responsews->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$authorisationcode = (string) $xml_retorno->OPERACION->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$codigo            = (string) $xml_retorno->CODIGO; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$redsys_order      = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$terminal          = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$currency_code     = (string) $xml_retorno->OPERACION->Ds_Currency; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$response          = (string) $xml_retorno->OPERACION->Ds_Response; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				}

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '$xml_retorno 2: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
					WCRed()->log( 'insite', 'Ds_AuthorisationCode: ' . $authorisationcode );
				}
				if ( $authorisationcode ) {
					$data                 = array();
					$data['_redsys_done'] = 'yes';
					$dsdate               = date( 'd/m/Y', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
					$dshour               = date( 'H:i', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'payment_complete() 1' );
					}
					if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
						if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
							sumo_save_subscription_payment_info(
								$order->get_id(),
								array(
									'payment_type'         => 'auto',
									'payment_method'       => 'insite',
									'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
									'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_order_amount' => $order->get_total(),
								)
							);
						}
					}
					if ( 'yes' !== $this->disablesubscrippaid ) {
						$order->payment_complete();
					}
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '      Saving Order Meta       ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}

					if ( ! empty( $redsys_order ) ) {
						$data['_payment_order_number_redsys'] = $redsys_order;
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_order_number_redsys saved: ' . $redsys_order );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_order_number_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $terminal ) ) {
						$data['_payment_terminal_redsys'] = $terminal;
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_terminal_redsys saved: ' . $terminal );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_terminal_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $authorisationcode ) ) {
						$data['_authorisation_code_redsys'] = $authorisationcode;
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_authorisation_code_redsys saved: ' . $authorisationcode );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_authorisation_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $currency_code ) ) {
						$data['_corruncy_code_redsys'] = $currency_code;
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_corruncy_code_redsys saved: ' . $currency_code );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_corruncy_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $secretsha256 ) ) {
						$data['_redsys_secretsha256'] = $secretsha256;
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_redsys_secretsha256 saved: ' . $secretsha256 );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_redsys_secretsha256 NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '/******************************************/' );
						WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
						WCRed()->log( 'insite', '/******************************************/' );
					}
					WCRed()->update_order_meta( $order->get_id(), $data );
					do_action( 'insite_post_payment_complete', $order->get_id() );
					return true;
				} elseif ( ! WCRed()->is_paid( $order->get_id() ) ) {
					$url         = 'URL: ' . WCRed()->get_order_edit_url( $order_id );
					$error       = WCRed()->get_error( $response );
					$resul_error = WCRed()->check_token_error( $order, $customer_token_id, $response );
					$order->add_order_note( __( 'There wasn\'t respond from Redsys', 'woocommerce-redsys' ) );
					if ( 'delete_token' === $result_error ) {
						$order->add_order_note( __( 'Customer Token Removed, error ', 'woocommerce-redsys' ) . $response );
					} else {
						$order->add_order_note( __( 'There was and error. The error was: ', 'woocommerce-redsys' ) . $error );
					}
					$message = __( '⚠️ Subscription Payment failed. Error: ', 'woocommerce-redsys' ) . $error . '. URL: ' . WCRed()->get_order_edit_url( $order_id );
					WCRed()->add_subscription_note( $message, $order_id );
					WCRed()->push( $message . ' ' . $url );
					$renewal_order->update_status( 'failed' );
					do_action( 'insite_post_payment_error', $order->get_id(), $error );
				}
			} else {
				$protocol_version = '1.0.2';
				$need             = wp_json_encode( $data );
				$acctinfo         = WCPSD2()->get_acctinfo( $order, $datos_usuario );
				$datos_entrada    = '<DATOSENTRADA>';
				$datos_entrada   .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
				$datos_entrada   .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
				$datos_entrada   .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
				$datos_entrada   .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
				$datos_entrada   .= '<DS_MERCHANT_TRANSACTIONTYPE>0</DS_MERCHANT_TRANSACTIONTYPE>';
				$datos_entrada   .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
				$datos_entrada   .= '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
				$datos_entrada   .= '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
				$datos_entrada   .= $ds_merchant_group;
				$datos_entrada   .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
				$datos_entrada   .= '<DS_MERCHANT_COF_TXNID>' . $txnid . '</DS_MERCHANT_COF_TXNID>';
				$datos_entrada   .= '<DS_MERCHANT_EXCEP_SCA>MIT</DS_MERCHANT_EXCEP_SCA>';
				$datos_entrada   .= '<DS_MERCHANT_DIRECTPAYMENT>TRUE</DS_MERCHANT_DIRECTPAYMENT>';
				$datos_entrada   .= '<DS_MERCHANT_MERCHANTURL>' . $final_notify_url . '</DS_MERCHANT_MERCHANTURL>';
				// $datos_entrada .= '<DS_MERCHANT_EMV3DS>' . $acctinfo . '</DS_MERCHANT_EMV3DS>';
				// $datos_entrada .= "<DS_MERCHANT_MERCHANTURL>" . $final_notify_url . "</DS_MERCHANT_MERCHANTURL>";
				$datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name2 ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
				$datos_entrada .= '</DATOSENTRADA>';
				$xml            = '<REQUEST>';
				$xml           .= $datos_entrada;
				$xml           .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
				$xml           .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
				$xml           .= '</REQUEST>';

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '          The XML 3             ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', 'trataPeticion 2: ' . $xml );
					WCRed()->log( 'insite', ' ' );
				}
				$cliente    = new SoapClient( $redsys_adr );
				$responsews = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

				if ( isset( $responsews->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$xml_retorno = new SimpleXMLElement( $responsews->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				}

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '$responsews: ' . print_r( $responsews, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
					WCRed()->log( 'insite', '$xml_retorno 3: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				}
				$authorisationcode = (string) $xml_retorno->OPERACION->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$codigo            = (string) $xml_retorno->CODIGO; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$redsys_order      = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$terminal          = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$currency_code     = (string) $xml_retorno->OPERACION->Ds_Currency; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$response          = (string) $xml_retorno->OPERACION->Ds_Response; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

				if ( $authorisationcode ) {
					$data                 = array();
					$data['_redsys_done'] = 'yes';
					$dsdate               = date( 'd/m/Y', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
					$dshour               = date( 'H:i', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'payment_complete() 2' );
					}
					if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
						if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
							sumo_save_subscription_payment_info(
								$order->get_id(),
								array(
									'payment_type'         => 'auto',
									'payment_method'       => 'insite',
									'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
									'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_order_amount' => $order->get_total(),
								)
							);
						}
					}
					if ( 'yes' !== $this->disablesubscrippaid ) {
						$order->payment_complete();
					}
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '      Saving Order Meta       ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $redsys_order ) ) {
						$data['_payment_order_number_redsys'] = $redsys_order;
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_order_number_redsys saved: ' . $redsys_order );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_order_number_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $terminal ) ) {
						$data['_payment_terminal_redsys'] = $terminal;
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_terminal_redsys saved: ' . $terminal );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_terminal_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $authorisationcode ) ) {
						$data['_authorisation_code_redsys'] = $authorisationcode;
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_authorisation_code_redsys saved: ' . $authorisationcode );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_authorisation_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $currency_code ) ) {
						$data['_corruncy_code_redsys'] = $currency_code;
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_corruncy_code_redsys saved: ' . $currency_code );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_corruncy_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $secretsha256 ) ) {
						$data['_redsys_secretsha256'] = $secretsha256;
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_redsys_secretsha256 saved: ' . $secretsha256 );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_redsys_secretsha256 NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '/******************************************/' );
						WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
						WCRed()->log( 'insite', '/******************************************/' );
					}
					WCRed()->update_order_meta( $order->get_id(), $data );
					do_action( 'insite_post_payment_complete', $order->get_id() );
					return true;
				} elseif ( ! WCRed()->is_paid( $order->get_id() ) ) {
					// TO-DO: Enviar un correo con el problema al administrador.
					$url         = 'URL: ' . WCRed()->get_order_edit_url( $order_id );
					$error       = WCRed()->get_error( $response );
					$resul_error = WCRed()->check_token_error( $order, $customer_token_id, $response );
					if ( 'delete_token' === $result_error ) {
						$order->add_order_note( __( 'Customer Token Removed, error ', 'woocommerce-redsys' ) . $response );
					} else {
						$order->add_order_note( __( 'There was and error. The error was: ', 'woocommerce-redsys' ) . $error );
					}
					$message = __( '⚠️ Subscription Payment failed. Error: ', 'woocommerce-redsys' ) . $error . '. URL: ' . WCRed()->get_order_edit_url( $order_id );
					WCRed()->add_subscription_note( $message, $order_id );
					WCRed()->push( $message . ' ' . $url );
					$renewal_order->update_status( 'failed' );
					do_action( 'insite_post_payment_error', $order->get_id(), $error );
				}
			}
		}
	}
	/**
	 * Process Yith subscription
	 *
	 * @param WC_Order $renewal_order Order object.
	 * @param bool     $is_manual_renew Is manual renew.
	 */
	public function renew_yith_subscription( $renewal_order = null, $is_manual_renew = null ) {

		$order_id         = $renewal_order->get_id();
		$amount_to_charge = $renewal_order->get_total();
		$redsys_done      = WCRed()->get_order_meta( $order_id, '_redsys_done', true );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '       Once upon a time       ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/***************************************/' );
			WCRed()->log( 'insite', '  Doing scheduled_subscription_payment   ' );
			WCRed()->log( 'insite', '/***************************************/' );
			WCRed()->log( 'insite', ' ' );
		}

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/***************************************/' );
			WCRed()->log( 'insite', '      $order_id = ' . $order_id . '      ' );
			WCRed()->log( 'insite', '/***************************************/' );
			WCRed()->log( 'insite', ' ' );
		}

		if ( 'yes' === $redsys_done ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/***************************************/' );
				WCRed()->log( 'insite', '       Payment is complete EXIT          ' );
				WCRed()->log( 'insite', '/***************************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/******************************************/' );
				WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
				WCRed()->log( 'insite', '/******************************************/' );
			}
			return;
		} else {

			$order  = $renewal_order;
			$amount = $amount_to_charge;

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/**********************************************/' );
				WCRed()->log( 'insite', '  Function  doing_scheduled_subscription_payment' );
				WCRed()->log( 'insite', '/**********************************************/' );
				WCRed()->log( 'insite', ' ' );
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/***************************************/' );
				WCRed()->log( 'insite', '   scheduled charge Amount: ' . $amount );
				WCRed()->log( 'insite', '/***************************************/' );
				WCRed()->log( 'insite', ' ' );
			}

			$order_total_sign     = '';
			$transaction_id2      = '';
			$transaction_type     = '';
			$ds_merchant_terminal = '';
			$final_notify_url     = '';
			$returnfromredsys     = '';
			$gatewaylanguage      = '';
			$currency             = '';
			$secretsha256         = '';
			$customer             = '';
			$url_ok               = '';
			$product_description  = '';
			$merchant_name        = '';

			$order_id = $order->get_id();
			$user_id  = $order->get_user_id();

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '  Generating Tokenized call   ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$order_id: ' . $order_id );
				WCRed()->log( 'insite', '$user_id: ' . $user_id );
				WCRed()->log( 'insite', ' ' );
			}

			$type       = 'ws';
			$order      = WCRed()->get_order( $order_id );
			$redsys_adr = $this->get_redsys_url_gateway_ws( $user_id, $type );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Using WS URL: ' . $redsys_adr );
				WCRed()->log( 'insite', ' ' );
			}
			$currency_codes   = WCRed()->get_currencies();
			$transaction_id2  = WCRed()->prepare_order_number( $order_id );
			$order_total_sign = WCRed()->redsys_amount_format( $order->get_total() );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$order_total_sign: ' . $order_total_sign );
				WCRed()->log( 'insite', ' ' );
			}

			$transaction_type = '0';

			$gatewaylanguage = $this->redsyslanguage;

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$gatewaylanguage: ' . $order_total_sign );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$transaction_type: ' . $transaction_type );
			}

			if ( $this->wooredsysurlko ) {
				if ( 'returncancel' === $this->wooredsysurlko ) {
					$returnfromredsys = $order->get_cancel_order_url();
				} else {
					$returnfromredsys = wc_get_checkout_url();
				}
			} else {
				$returnfromredsys = $order->get_cancel_order_url();
			}
			if ( 'yes' === $this->useterminal2 ) {
				$toamount  = number_format( $this->toamount, 2, '', '' );
				$terminal  = $this->terminal;
				$terminal2 = $this->terminal2;
				if ( $order_total_sign <= $toamount ) {
					$ds_merchant_terminal = $terminal2;
				} else {
					$ds_merchant_terminal = $terminal;
				}
			} else {
				$ds_merchant_terminal = $this->terminal;
			}

			if ( 'yes' === $this->not_use_https ) {
				$final_notify_url = $this->notify_url_not_https;
			} else {
				$final_notify_url = $this->notify_url;
			}
			$customer_token    = WCRed()->get_users_token_bulk( $user_id, 'R' );
			$customer_token_id = WCRed()->get_users_token_bulk( $user_id, 'R', 'id' );
			$txnid             = WCRed()->get_txnid( $customer_token_id );

			if ( ! $customer_token ) {
				if ( function_exists( 'ywsbs_register_failed_payment' ) ) {
					ywsbs_register_failed_payment( $renewal_order, 'Error: No user token' );
				}
				return false;
			}

			$use_token = WCRed()->maybe_use_token( $customer_token_id );

			if ( ! $use_token ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'redsys', 'Waiting 72h' );
				}
				$url     = 'URL: ' . WCRed()->get_order_edit_url( $order_id );
				$error   = esc_html__( '⚠️ Subscription Payment failed. Credit card blocked for 72h', 'woocommerce-redsys' );
				$message = __( '⚠️ Subscription Payment failed. Credit card blocked for 72h. ', 'woocommerce-redsys' ) . 'URL: ' . WCRed()->get_order_edit_url( $order_id );
				WCRed()->push( $message . ' ' . $url );
				ywsbs_register_failed_payment( $renewal_order, 'Error: Waiting 72h' );
				do_action( 'redsys_post_payment_error', $order->get_id(), $error );
				return false;
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$customer_token: ' . $customer_token );
				WCRed()->log( 'insite', ' ' );
			}

			$redsys_data_send = array();

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', 'Order Currency: ' . get_woocommerce_currency() );
				WCRed()->log( 'insite', ' ' );
			}

			$currency            = $currency_codes[ get_woocommerce_currency() ];
			$secretsha256        = $this->get_redsys_sha256( $user_id );
			$customer            = $this->customer;
			$url_ok              = add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) );
			$product_description = WCRed()->product_description( $order, 'redsys' );
			$merchant_name       = $this->commercename;

			$redsys_data_send = array(
				'order_total_sign'    => $order_total_sign,
				'transaction_id2'     => $transaction_id2,
				'transaction_type'    => $transaction_type,
				'DSMerchantTerminal'  => $ds_merchant_terminal,
				'final_notify_url'    => $final_notify_url,
				'returnfromredsys'    => $returnfromredsys,
				'gatewaylanguage'     => $gatewaylanguage,
				'currency'            => $currency,
				'secretsha256'        => $secretsha256,
				'customer'            => $customer,
				'url_ok'              => $url_ok,
				'product_description' => $product_description,
				'merchant_name'       => $merchant_name,
			);

			if ( has_filter( 'redsys_modify_data_to_send' ) ) {

				$redsys_data_send = apply_filters( 'redsys_modify_data_to_send', $redsys_data_send );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', 'Using filter redsys_modify_data_to_send' );
					WCRed()->log( 'insite', ' ' );
				}
			}

			$secretsha256     = $redsys_data_send['secretsha256'];
			$order_total_sign = $redsys_data_send['order_total_sign'];
			$orderid2         = $redsys_data_send['transaction_id2'];
			$customer         = $redsys_data_send['customer'];
			$currency         = $redsys_data_send['currency'];
			$transaction_type = $redsys_data_send['transaction_type'];
			$terminal         = $redsys_data_send['DSMerchantTerminal'];
			$final_notify_url = $redsys_data_send['final_notify_url'];
			$url_ok           = $redsys_data_send['url_ok'];
			$gatewaylanguage  = $redsys_data_send['gatewaylanguage'];
			$merchant_name    = $redsys_data_send['merchant_name'];
			$merchan_name     = WCRed()->get_order_meta( $order_id, '_billing_first_name', true );
			$merchant_lastnme = WCRed()->get_order_meta( $order_id, '_billing_last_name', true );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$order_total_sign: ' . $order_total_sign );
				WCRed()->log( 'insite', '$order: ' . $orderid2 );
				WCRed()->log( 'insite', '$customer: ' . $customer );
				WCRed()->log( 'insite', '$currency: ' . $currency );
				WCRed()->log( 'insite', '$transaction_type: 0' );
				WCRed()->log( 'insite', '$terminal: ' . $terminal );
				WCRed()->log( 'insite', '$url_ok: ' . $url_ok );
				WCRed()->log( 'insite', '$gatewaylanguage: ' . $gatewaylanguage );
				WCRed()->log( 'insite', '$final_notify_url: ' . $final_notify_url );
				WCRed()->log( 'insite', ' ' );
			}

			$mi_obj = new WooRedsysAPIWS();
			if ( ! empty( $this->merchantgroup ) ) {
				$ds_merchant_group = '<DS_MERCHANT_GROUP>' . $this->merchantgroup . '</DS_MERCHANT_GROUP>';
			} else {
				$ds_merchant_group = '';
			}
			$datos_usuario  = array(
				'threeDSInfo'         => 'AuthenticationData',
				'protocolVersion'     => $protocol_version,
				'browserAcceptHeader' => $http_accept,
				'browserColorDepth'   => WCPSD2()->get_profundidad_color( $order_id ),
				'browserIP'           => $browser_ip,
				'browserJavaEnabled'  => WCPSD2()->get_browserjavaenabled( $order_id ),
				'browserLanguage'     => WCPSD2()->get_idioma_navegador( $order_id ),
				'browserScreenHeight' => WCPSD2()->get_altura_pantalla( $order_id ),
				'browserScreenWidth'  => WCPSD2()->get_anchura_pantalla( $order_id ),
				'browserTZ'           => WCPSD2()->get_tz_horaria( $order_id ),
				'browserUserAgent'    => WCPSD2()->get_agente_navegador( $order_id ),
				'notificationURL'     => $final_notify_url,
			);
			$datos_entrada  = '<DATOSENTRADA>';
			$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
			$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
			$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
			$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
			$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
			$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
			$datos_entrada .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
			$datos_entrada .= '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
			$datos_entrada .= '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
			$datos_entrada .= '<DS_MERCHANT_COF_TXNID>' . $txnid . '</DS_MERCHANT_COF_TXNID>';
			$datos_entrada .= '<DS_MERCHANT_EXCEP_SCA>MIT</DS_MERCHANT_EXCEP_SCA>';
			$datos_entrada .= '<DS_MERCHANT_DIRECTPAYMENT>TRUE</DS_MERCHANT_DIRECTPAYMENT>';
			$datos_entrada .= '<DS_MERCHANT_EMV3DS>{"threeDSInfo":"CardData"}</DS_MERCHANT_EMV3DS>';
			$datos_entrada .= '</DATOSENTRADA>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The call  2          ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', $datos_entrada );
				WCRed()->log( 'insite', ' ' );
			}

				$xml  = '<REQUEST>';
				$xml .= $datos_entrada;
				$xml .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
				$xml .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
				$xml .= '</REQUEST>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The XML 4            ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', $xml );
				WCRed()->log( 'insite', ' ' );
			}

			$cliente    = new SoapClient( $redsys_adr );
			$responsews = $cliente->iniciaPeticion( array( 'datoEntrada' => $xml ) );

			if ( isset( $responsews->iniciaPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$xml_retorno = new SimpleXMLElement( $responsews->iniciaPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$respuesta   = json_decode( $xml_retorno->INFOTARJETA->Ds_EMV3DS ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$xml_retorno 4 IniciaPeticion: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}

				$ds_emv3ds_json         = $xml_retorno->INFOTARJETA->Ds_EMV3DS; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$ds_emv3ds              = json_decode( $ds_emv3ds_json );
				$protocol_version       = $ds_emv3ds->protocolVersion; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$three_dsserver_transid = $ds_emv3ds->threeDSServerTransID; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$three_ds_info          = $ds_emv3ds->threeDSInfo; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$ds_emv3ds_json: ' . $ds_emv3ds_json );
				WCRed()->log( 'insite', '$ds_emv3ds: ' . print_r( $ds_emv3ds, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', '$three_dsserver_transid: ' . $three_dsserver_transid );
				WCRed()->log( 'insite', '$three_ds_info: ' . $three_ds_info );
			}

			if ( '2.1.0' === $protocol_version || '2.2.0' === $protocol_version ) {

				$datos_entrada  = '<DATOSENTRADA>';
				$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
				$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
				$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
				$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
				$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
				$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
				$datos_entrada .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
				$datos_entrada .= '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
				$datos_entrada .= '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
				$datos_entrada .= '<DS_MERCHANT_COF_TXNID>' . $txnid . '</DS_MERCHANT_COF_TXNID>';
				$datos_entrada .= '<DS_MERCHANT_EXCEP_SCA>MIT</DS_MERCHANT_EXCEP_SCA>';
				$datos_entrada .= '<DS_MERCHANT_DIRECTPAYMENT>TRUE</DS_MERCHANT_DIRECTPAYMENT>';
				$datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
				$datos_entrada .= '</DATOSENTRADA>';
				$xml            = '<REQUEST>';
				$xml           .= $datos_entrada;
				$xml           .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
				$xml           .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
				$xml           .= '</REQUEST>';

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '          The XML 5            ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', 'trataPeticion 3: ' . $xml );
					WCRed()->log( 'insite', ' ' );
				}
				$cliente    = new SoapClient( $redsys_adr );
				$responsews = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

				if ( isset( $responsews->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$xml_retorno       = new SimpleXMLElement( $responsews->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$authorisationcode = (string) $xml_retorno->OPERACION->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$codigo            = (string) $xml_retorno->CODIGO; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$redsys_order      = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$terminal          = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$currency_code     = (string) $xml_retorno->OPERACION->Ds_Currency; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$response          = (string) $xml_retorno->OPERACION->Ds_Response; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				}

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '$xml_retorno 5: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
					WCRed()->log( 'insite', 'Ds_AuthorisationCode: ' . $authorisationcode );
				}
				if ( $authorisationcode ) {
					WCRed()->update_order_meta( $order->get_id(), '_redsys_done', 'yes' );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'payment_complete() 3' );
					}
					if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
						if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
							sumo_save_subscription_payment_info(
								$order->get_id(),
								array(
									'payment_type'         => 'auto',
									'payment_method'       => 'insite',
									'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
									'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_order_amount' => $order->get_total(),
								)
							);
						}
					}
					$order->payment_complete();
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '      Saving Order Meta       ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}

					if ( ! empty( $redsys_order ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $redsys_order );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_order_number_redsys saved: ' . $redsys_order );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_order_number_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $terminal ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $terminal );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_terminal_redsys saved: ' . $terminal );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_terminal_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $authorisationcode ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisationcode );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_authorisation_code_redsys saved: ' . $authorisationcode );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_authorisation_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $currency_code ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_corruncy_code_redsys', $currency_code );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_corruncy_code_redsys saved: ' . $currency_code );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_corruncy_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $secretsha256 ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_redsys_secretsha256', $secretsha256 );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_redsys_secretsha256 saved: ' . $secretsha256 );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_redsys_secretsha256 NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '/******************************************/' );
						WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
						WCRed()->log( 'insite', '/******************************************/' );
					}
					do_action( 'insite_post_payment_complete', $order->get_id() );
					return true;
				} elseif ( ! WCRed()->check_order_is_paid_loop( $order->get_id() ) ) {
					// TO-DO: Enviar un correo con el problema al administrador.
					$order_id    = $order->get_id();
					$url         = 'URL: ' . WCRed()->get_order_edit_url( $order_id );
					$error       = WCRed()->get_error( $response );
					$resul_error = WCRed()->check_token_error( $order, $customer_token_id, $response );
					if ( 'delete_token' === $result_error ) {
						$order->add_order_note( __( 'Customer Token Removed, error ', 'woocommerce-redsys' ) . $response );
					} else {
						$order->add_order_note( __( 'There was and error. The error was: ', 'woocommerce-redsys' ) . $error );
					}
					$message = __( '⚠️ Subscription Payment failed. Error: ', 'woocommerce-redsys' ) . $error . '. URL: ' . WCRed()->get_order_edit_url( $order_id );
					WCRed()->add_subscription_note( $message, $order_id );
					WCRed()->push( $message . ' ' . $url );
					if ( function_exists( 'ywsbs_register_failed_payment' ) ) {
						ywsbs_register_failed_payment( $renewal_order, 'Error' );
					}
					do_action( 'insite_post_payment_error', $order->get_id(), $error );
					return false;
				} else {
					return true;
				}
			} else {
				$protocol_version = '1.0.2';
				$acctinfo         = WCPSD2()->get_acctinfo( $order, $datos_usuario );
				$datos_entrada    = '<DATOSENTRADA>';
				$datos_entrada   .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
				$datos_entrada   .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
				$datos_entrada   .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
				$datos_entrada   .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
				$datos_entrada   .= '<DS_MERCHANT_TRANSACTIONTYPE>0</DS_MERCHANT_TRANSACTIONTYPE>';
				$datos_entrada   .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
				$datos_entrada   .= '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
				$datos_entrada   .= '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
				$datos_entrada   .= $ds_merchant_group;
				$datos_entrada   .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
				$datos_entrada   .= '<DS_MERCHANT_COF_TXNID>' . $txnid . '</DS_MERCHANT_COF_TXNID>';
				$datos_entrada   .= '<DS_MERCHANT_EXCEP_SCA>MIT</DS_MERCHANT_EXCEP_SCA>';
				$datos_entrada   .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
				$datos_entrada   .= '<DS_MERCHANT_DIRECTPAYMENT>TRUE</DS_MERCHANT_DIRECTPAYMENT>';
				$datos_entrada   .= '</DATOSENTRADA>';
				$xml              = '<REQUEST>';
				$xml             .= $datos_entrada;
				$xml             .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
				$xml             .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
				$xml             .= '</REQUEST>';

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '          The XML 6             ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', 'trataPeticion 4: ' . $xml );
					WCRed()->log( 'insite', ' ' );
				}
				$cliente    = new SoapClient( $redsys_adr );
				$responsews = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

				if ( isset( $responsews->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$xml_retorno = new SimpleXMLElement( $responsews->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				}

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '$responsews: ' . print_r( $responsews, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
					WCRed()->log( 'insite', '$xml_retorno 6: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				}
				$authorisationcode = (string) $xml_retorno->OPERACION->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$codigo            = (string) $xml_retorno->CODIGO; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$redsys_order      = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$terminal          = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$currency_code     = (string) $xml_retorno->OPERACION->Ds_Currency; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$response          = (string) $xml_retorno->OPERACION->Ds_Response; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

				if ( $authorisationcode ) {
					WCRed()->update_order_meta( $order_id, '_redsys_done', 'yes' );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'payment_complete() 4' );
					}
					if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
						if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
							sumo_save_subscription_payment_info(
								$order->get_id(),
								array(
									'payment_type'         => 'auto',
									'payment_method'       => 'insite',
									'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
									'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_order_amount' => $order->get_total(),
								)
							);
						}
					}
					$order->payment_complete();
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '      Saving Order Meta       ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}

					if ( ! empty( $redsys_order ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $redsys_order );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_order_number_redsys saved: ' . $redsys_order );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_order_number_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $terminal ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $terminal );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_terminal_redsys saved: ' . $terminal );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_terminal_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $authorisationcode ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisationcode );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_authorisation_code_redsys saved: ' . $authorisationcode );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_authorisation_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $currency_code ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_corruncy_code_redsys', $currency_code );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_corruncy_code_redsys saved: ' . $currency_code );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_corruncy_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $secretsha256 ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_redsys_secretsha256', $secretsha256 );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_redsys_secretsha256 saved: ' . $secretsha256 );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_redsys_secretsha256 NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '/******************************************/' );
						WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
						WCRed()->log( 'insite', '/******************************************/' );
					}
					do_action( 'insite_post_payment_complete', $order->get_id() );
					return true;
				} elseif ( ! WCRed()->check_order_is_paid_loop( $order->get_id() ) ) {
					// TO-DO: Enviar un correo con el problema al administrador.
					$order_id    = $order->get_id();
					$url         = 'URL: ' . WCRed()->get_order_edit_url( $order_id );
					$error       = WCRed()->get_error( $response );
					$resul_error = WCRed()->check_token_error( $order, $customer_token_id, $response );
					if ( 'delete_token' === $result_error ) {
						$order->add_order_note( __( 'Customer Token Removed, error ', 'woocommerce-redsys' ) . $response );
					} else {
						$order->add_order_note( __( 'There was and error. The error was: ', 'woocommerce-redsys' ) . $error );
					}
					$message = __( '⚠️ Subscription Payment failed. Error: ', 'woocommerce-redsys' ) . $error . '. URL: ' . WCRed()->get_order_edit_url( $order_id );
					WCRed()->add_subscription_note( $message, $order_id );
					WCRed()->push( $message . ' ' . $url );
					if ( function_exists( 'ywsbs_register_failed_payment' ) ) {
						ywsbs_register_failed_payment( $renewal_order, 'Error: No user token' );
					}
					do_action( 'insite_post_payment_error', $order->get_id(), $error );
					return false;
				} else {
					return true;
				}
			}
		}
	}
	/**
	 * Renew SUMO Subscriptions
	 *
	 * @param bool $bool True or false.
	 * @param int  $subscription_id Subscription ID.
	 * @param obj  $renewal_order Renewal Order.
	 * @param bool $retry True or false.
	 *
	 * @return bool
	 */
	public function renew_sumo_subscription( $bool, $subscription_id, $renewal_order, $retry = false ) { // phpcs:ignore Universal.NamingConventions.NoReservedKeywordParameterNames.boolFound

		$order_id         = $renewal_order->get_id();
		$amount_to_charge = $renewal_order->get_total();
		$redsys_done      = WCRed()->get_order_meta( $order_id, '_redsys_done', true );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '       Once upon a time       ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/********************************************/' );
			WCRed()->log( 'insite', '  Doing SUMO scheduled_subscription_payment   ' );
			WCRed()->log( 'insite', '/********************************************/' );
			WCRed()->log( 'insite', ' ' );
		}

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/***************************************/' );
			WCRed()->log( 'insite', '      $order_id = ' . $order_id . '      ' );
			WCRed()->log( 'insite', '/***************************************/' );
			WCRed()->log( 'insite', ' ' );
		}

		if ( 'yes' === $redsys_done ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/***************************************/' );
				WCRed()->log( 'insite', '       Payment is complete EXIT          ' );
				WCRed()->log( 'insite', '/***************************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/******************************************/' );
				WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
				WCRed()->log( 'insite', '/******************************************/' );
			}
			return;
		} else {

			$order  = $renewal_order;
			$amount = $amount_to_charge;

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/**********************************************/' );
				WCRed()->log( 'insite', '  Function  doing_scheduled_subscription_payment' );
				WCRed()->log( 'insite', '/**********************************************/' );
				WCRed()->log( 'insite', ' ' );
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/***************************************/' );
				WCRed()->log( 'insite', '   scheduled charge Amount: ' . $amount );
				WCRed()->log( 'insite', '/***************************************/' );
				WCRed()->log( 'insite', ' ' );
			}

			$order_total_sign     = '';
			$transaction_id2      = '';
			$transaction_type     = '';
			$ds_merchant_terminal = '';
			$final_notify_url     = '';
			$returnfromredsys     = '';
			$gatewaylanguage      = '';
			$currency             = '';
			$secretsha256         = '';
			$customer             = '';
			$url_ok               = '';
			$product_description  = '';
			$merchant_name        = '';

			$order_id = $order->get_id();
			$user_id  = $order->get_user_id();

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '  Generating Tokenized call   ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$order_id: ' . $order_id );
				WCRed()->log( 'insite', '$user_id: ' . $user_id );
				WCRed()->log( 'insite', ' ' );
			}

			$type       = 'ws';
			$order      = WCRed()->get_order( $order_id );
			$redsys_adr = $this->get_redsys_url_gateway_ws( $user_id, $type );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Using WS URL: ' . $redsys_adr );
				WCRed()->log( 'insite', ' ' );
			}
			$currency_codes   = WCRed()->get_currencies();
			$transaction_id2  = WCRed()->prepare_order_number( $order_id );
			$order_total_sign = WCRed()->redsys_amount_format( $order->get_total() );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$order_total_sign: ' . $order_total_sign );
				WCRed()->log( 'insite', ' ' );
			}

			$transaction_type = '0';

			$gatewaylanguage = $this->redsyslanguage;

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$gatewaylanguage: ' . $order_total_sign );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$transaction_type: ' . $transaction_type );
			}

			if ( $this->wooredsysurlko ) {
				if ( 'returncancel' === $this->wooredsysurlko ) {
					$returnfromredsys = $order->get_cancel_order_url();
				} else {
					$returnfromredsys = wc_get_checkout_url();
				}
			} else {
				$returnfromredsys = $order->get_cancel_order_url();
			}
			if ( 'yes' === $this->useterminal2 ) {
				$toamount  = number_format( $this->toamount, 2, '', '' );
				$terminal  = $this->terminal;
				$terminal2 = $this->terminal2;
				if ( $order_total_sign <= $toamount ) {
					$ds_merchant_terminal = $terminal2;
				} else {
					$ds_merchant_terminal = $terminal;
				}
			} else {
				$ds_merchant_terminal = $this->terminal;
			}

			if ( 'yes' === $this->not_use_https ) {
				$final_notify_url = $this->notify_url_not_https;
			} else {
				$final_notify_url = $this->notify_url;
			}
			$customer_token    = WCRed()->get_users_token_bulk( $user_id, 'R' );
			$customer_token_id = WCRed()->get_users_token_bulk( $user_id, 'R', 'id' );
			$txnid             = WCRed()->get_txnid( $customer_token_id );

			if ( ! $customer_token ) {
				if ( function_exists( 'ywsbs_register_failed_payment' ) ) {
					ywsbs_register_failed_payment( $renewal_order, 'Error: No user token' );
				}
				return false;
			}

			$use_token = WCRed()->maybe_use_token( $customer_token_id );

			if ( ! $use_token ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'redsys', 'Waiting 72h' );
				}
				$url     = 'URL: ' . WCRed()->get_order_edit_url( $order_id );
				$error   = esc_html__( '⚠️ Subscription Payment failed. Credit card blocked for 72h', 'woocommerce-redsys' );
				$message = __( '⚠️ Subscription Payment failed. Credit card blocked for 72h. ', 'woocommerce-redsys' ) . 'URL: ' . WCRed()->get_order_edit_url( $order_id );
				WCRed()->push( $message . ' ' . $url );
				do_action( 'redsys_post_payment_error', $order->get_id(), $error );
				return false;
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$customer_token: ' . $customer_token );
				WCRed()->log( 'insite', ' ' );
			}

			$redsys_data_send = array();

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', 'Order Currency: ' . get_woocommerce_currency() );
				WCRed()->log( 'insite', ' ' );
			}

			$currency            = $currency_codes[ get_woocommerce_currency() ];
			$secretsha256        = $this->get_redsys_sha256( $user_id );
			$customer            = $this->customer;
			$url_ok              = add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) );
			$product_description = WCRed()->product_description( $order, 'redsys' );
			$merchant_name       = $this->commercename;

			$redsys_data_send = array(
				'order_total_sign'    => $order_total_sign,
				'transaction_id2'     => $transaction_id2,
				'transaction_type'    => $transaction_type,
				'DSMerchantTerminal'  => $ds_merchant_terminal,
				'final_notify_url'    => $final_notify_url,
				'returnfromredsys'    => $returnfromredsys,
				'gatewaylanguage'     => $gatewaylanguage,
				'currency'            => $currency,
				'secretsha256'        => $secretsha256,
				'customer'            => $customer,
				'url_ok'              => $url_ok,
				'product_description' => $product_description,
				'merchant_name'       => $merchant_name,
			);

			if ( has_filter( 'redsys_modify_data_to_send' ) ) {

				$redsys_data_send = apply_filters( 'redsys_modify_data_to_send', $redsys_data_send );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', 'Using filter redsys_modify_data_to_send' );
					WCRed()->log( 'insite', ' ' );
				}
			}

			$secretsha256     = $redsys_data_send['secretsha256'];
			$order_total_sign = $redsys_data_send['order_total_sign'];
			$orderid2         = $redsys_data_send['transaction_id2'];
			$customer         = $redsys_data_send['customer'];
			$currency         = $redsys_data_send['currency'];
			$transaction_type = $redsys_data_send['transaction_type'];
			$terminal         = $redsys_data_send['DSMerchantTerminal'];
			$final_notify_url = $redsys_data_send['final_notify_url'];
			$url_ok           = $redsys_data_send['url_ok'];
			$gatewaylanguage  = $redsys_data_send['gatewaylanguage'];
			$merchant_name    = $redsys_data_send['merchant_name'];
			$merchan_name     = WCRed()->get_order_meta( $order_id, '_billing_first_name', true );
			$merchant_lastnme = WCRed()->get_order_meta( $order_id, '_billing_last_name', true );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$order_total_sign: ' . $order_total_sign );
				WCRed()->log( 'insite', '$order: ' . $orderid2 );
				WCRed()->log( 'insite', '$customer: ' . $customer );
				WCRed()->log( 'insite', '$currency: ' . $currency );
				WCRed()->log( 'insite', '$transaction_type: 0' );
				WCRed()->log( 'insite', '$terminal: ' . $terminal );
				WCRed()->log( 'insite', '$url_ok: ' . $url_ok );
				WCRed()->log( 'insite', '$gatewaylanguage: ' . $gatewaylanguage );
				WCRed()->log( 'insite', '$final_notify_url: ' . $final_notify_url );
				WCRed()->log( 'insite', ' ' );
			}

			$mi_obj = new WooRedsysAPIWS();
			if ( ! empty( $this->merchantgroup ) ) {
				$ds_merchant_group = '<DS_MERCHANT_GROUP>' . $this->merchantgroup . '</DS_MERCHANT_GROUP>';
			} else {
				$ds_merchant_group = '';
			}
			$datos_usuario  = array(
				'threeDSInfo'         => 'AuthenticationData',
				'protocolVersion'     => $protocol_version,
				'browserAcceptHeader' => $http_accept,
				'browserColorDepth'   => WCPSD2()->get_profundidad_color( $order_id ),
				'browserIP'           => $browser_ip,
				'browserJavaEnabled'  => WCPSD2()->get_browserjavaenabled( $order_id ),
				'browserLanguage'     => WCPSD2()->get_idioma_navegador( $order_id ),
				'browserScreenHeight' => WCPSD2()->get_altura_pantalla( $order_id ),
				'browserScreenWidth'  => WCPSD2()->get_anchura_pantalla( $order_id ),
				'browserTZ'           => WCPSD2()->get_tz_horaria( $order_id ),
				'browserUserAgent'    => WCPSD2()->get_agente_navegador( $order_id ),
				'notificationURL'     => $final_notify_url,
			);
			$datos_entrada  = '<DATOSENTRADA>';
			$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
			$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
			$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
			$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
			$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
			$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
			$datos_entrada .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
			$datos_entrada .= '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
			$datos_entrada .= '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
			$datos_entrada .= '<DS_MERCHANT_COF_TXNID>' . $txnid . '</DS_MERCHANT_COF_TXNID>';
			$datos_entrada .= '<DS_MERCHANT_EXCEP_SCA>MIT</DS_MERCHANT_EXCEP_SCA>';
			$datos_entrada .= '<DS_MERCHANT_DIRECTPAYMENT>TRUE</DS_MERCHANT_DIRECTPAYMENT>';
			$datos_entrada .= '<DS_MERCHANT_EMV3DS>{"threeDSInfo":"CardData"}</DS_MERCHANT_EMV3DS>';
			$datos_entrada .= '</DATOSENTRADA>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The call  2          ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', $datos_entrada );
				WCRed()->log( 'insite', ' ' );
			}

				$xml  = '<REQUEST>';
				$xml .= $datos_entrada;
				$xml .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
				$xml .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
				$xml .= '</REQUEST>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The XML 7             ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', $xml );
				WCRed()->log( 'insite', ' ' );
			}

			$cliente    = new SoapClient( $redsys_adr );
			$responsews = $cliente->iniciaPeticion( array( 'datoEntrada' => $xml ) );

			if ( isset( $responsews->iniciaPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$xml_retorno = new SimpleXMLElement( $responsews->iniciaPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$respuesta   = json_decode( $xml_retorno->INFOTARJETA->Ds_EMV3DS ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$xml_retorno 4 IniciaPeticion: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}

				$ds_emv3ds_json         = $xml_retorno->INFOTARJETA->Ds_EMV3DS; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$ds_emv3ds              = json_decode( $ds_emv3ds_json );
				$protocol_version       = $ds_emv3ds->protocolVersion; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$three_dsserver_transid = $ds_emv3ds->threeDSServerTransID; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$three_ds_info          = $ds_emv3ds->threeDSInfo; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$ds_emv3ds_json: ' . $ds_emv3ds_json );
				WCRed()->log( 'insite', '$ds_emv3ds: ' . print_r( $ds_emv3ds, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', '$three_dsserver_transid: ' . $three_dsserver_transid );
				WCRed()->log( 'insite', '$three_ds_info: ' . $three_ds_info );
			}

			if ( '2.1.0' === $protocol_version || '2.2.0' === $protocol_version ) {

				$datos_entrada  = '<DATOSENTRADA>';
				$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
				$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
				$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
				$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
				$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
				$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
				$datos_entrada .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
				$datos_entrada .= '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
				$datos_entrada .= '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
				$datos_entrada .= '<DS_MERCHANT_COF_TXNID>' . $txnid . '</DS_MERCHANT_COF_TXNID>';
				$datos_entrada .= '<DS_MERCHANT_EXCEP_SCA>MIT</DS_MERCHANT_EXCEP_SCA>';
				$datos_entrada .= '<DS_MERCHANT_DIRECTPAYMENT>TRUE</DS_MERCHANT_DIRECTPAYMENT>';
				$datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
				$datos_entrada .= '</DATOSENTRADA>';
				$xml            = '<REQUEST>';
				$xml           .= $datos_entrada;
				$xml           .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
				$xml           .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
				$xml           .= '</REQUEST>';

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '          The XML 8            ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', 'trataPeticion 3: ' . $xml );
					WCRed()->log( 'insite', ' ' );
				}
				$cliente    = new SoapClient( $redsys_adr );
				$responsews = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

				if ( isset( $responsews->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$xml_retorno       = new SimpleXMLElement( $responsews->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$authorisationcode = (string) $xml_retorno->OPERACION->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$codigo            = (string) $xml_retorno->CODIGO; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$redsys_order      = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$terminal          = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$currency_code     = (string) $xml_retorno->OPERACION->Ds_Currency; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$response          = (string) $xml_retorno->OPERACION->Ds_Response; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				}

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '$xml_retorno 5: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
					WCRed()->log( 'insite', 'Ds_AuthorisationCode: ' . $authorisationcode );
				}
				if ( $authorisationcode ) {
					WCRed()->update_order_meta( $order->get_id(), '_redsys_done', 'yes' );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'payment_complete() 3' );
					}
					if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
						if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
							sumo_save_subscription_payment_info(
								$order->get_id(),
								array(
									'payment_type'         => 'auto',
									'payment_method'       => 'insite',
									'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
									'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_order_amount' => $order->get_total(),
								)
							);
						}
					}
					$order->payment_complete();
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '      Saving Order Meta       ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}

					if ( ! empty( $redsys_order ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $redsys_order );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_order_number_redsys saved: ' . $redsys_order );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_order_number_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $terminal ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $terminal );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_terminal_redsys saved: ' . $terminal );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_terminal_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $authorisationcode ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisationcode );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_authorisation_code_redsys saved: ' . $authorisationcode );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_authorisation_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $currency_code ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_corruncy_code_redsys', $currency_code );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_corruncy_code_redsys saved: ' . $currency_code );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_corruncy_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $secretsha256 ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_redsys_secretsha256', $secretsha256 );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_redsys_secretsha256 saved: ' . $secretsha256 );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_redsys_secretsha256 NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '/******************************************/' );
						WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
						WCRed()->log( 'insite', '/******************************************/' );
					}
					do_action( 'insite_post_payment_complete', $order->get_id() );
					return true;
				} elseif ( ! WCRed()->check_order_is_paid_loop( $order->get_id() ) ) {
					// TO-DO: Enviar un correo con el problema al administrador.
					$order_id    = $order->get_id();
					$url         = 'URL: ' . WCRed()->get_order_edit_url( $order_id );
					$error       = WCRed()->get_error( $response );
					$resul_error = WCRed()->check_token_error( $order, $customer_token_id, $response );
					if ( 'delete_token' === $result_error ) {
						$order->add_order_note( __( 'Customer Token Removed, error ', 'woocommerce-redsys' ) . $response );
					} else {
						$order->add_order_note( __( 'There was and error. The error was: ', 'woocommerce-redsys' ) . $error );
					}
					$message = __( '⚠️ Subscription Payment failed. Error: ', 'woocommerce-redsys' ) . $error . '. URL: ' . WCRed()->get_order_edit_url( $order_id );
					WCRed()->add_subscription_note( $message, $order_id );
					WCRed()->push( $message . ' ' . $url );
					if ( function_exists( 'ywsbs_register_failed_payment' ) ) {
						ywsbs_register_failed_payment( $renewal_order, 'Error' );
					}
					do_action( 'insite_post_payment_error', $order->get_id(), $error );
					return false;
				} else {
					return true;
				}
			} else {
				$protocol_version = '1.0.2';
				$acctinfo         = WCPSD2()->get_acctinfo( $order, $datos_usuario );
				$datos_entrada    = '<DATOSENTRADA>';
				$datos_entrada   .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
				$datos_entrada   .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
				$datos_entrada   .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
				$datos_entrada   .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
				$datos_entrada   .= '<DS_MERCHANT_TRANSACTIONTYPE>0</DS_MERCHANT_TRANSACTIONTYPE>';
				$datos_entrada   .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
				$datos_entrada   .= '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
				$datos_entrada   .= '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
				$datos_entrada   .= $ds_merchant_group;
				$datos_entrada   .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
				$datos_entrada   .= '<DS_MERCHANT_COF_TXNID>' . $txnid . '</DS_MERCHANT_COF_TXNID>';
				$datos_entrada   .= '<DS_MERCHANT_EXCEP_SCA>MIT</DS_MERCHANT_EXCEP_SCA>';
				$datos_entrada   .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
				$datos_entrada   .= '<DS_MERCHANT_DIRECTPAYMENT>TRUE</DS_MERCHANT_DIRECTPAYMENT>';
				$datos_entrada   .= '</DATOSENTRADA>';
				$xml              = '<REQUEST>';
				$xml             .= $datos_entrada;
				$xml             .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
				$xml             .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
				$xml             .= '</REQUEST>';

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '          The XML 9            ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', 'trataPeticion 4: ' . $xml );
					WCRed()->log( 'insite', ' ' );
				}
				$cliente    = new SoapClient( $redsys_adr );
				$responsews = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

				if ( isset( $responsews->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$xml_retorno = new SimpleXMLElement( $responsews->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				}

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '$responsews: ' . print_r( $responsews, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
					WCRed()->log( 'insite', '$xml_retorno 6: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				}
				$authorisationcode = (string) $xml_retorno->OPERACION->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$codigo            = (string) $xml_retorno->CODIGO; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$redsys_order      = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$terminal          = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$currency_code     = (string) $xml_retorno->OPERACION->Ds_Currency; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$response          = (string) $xml_retorno->OPERACION->Ds_Response; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

				if ( $authorisationcode ) {
					WCRed()->update_order_meta( $order_id, '_redsys_done', 'yes' );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'payment_complete() 4' );
					}
					if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
						if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
							sumo_save_subscription_payment_info(
								$order->get_id(),
								array(
									'payment_type'         => 'auto',
									'payment_method'       => 'insite',
									'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
									'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_order_amount' => $order->get_total(),
								)
							);
						}
					}
					$order->payment_complete();
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '      Saving Order Meta       ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}

					if ( ! empty( $redsys_order ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $redsys_order );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_order_number_redsys saved: ' . $redsys_order );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_order_number_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $terminal ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $terminal );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_terminal_redsys saved: ' . $terminal );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_terminal_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $authorisationcode ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisationcode );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_authorisation_code_redsys saved: ' . $authorisationcode );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_authorisation_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $currency_code ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_corruncy_code_redsys', $currency_code );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_corruncy_code_redsys saved: ' . $currency_code );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_corruncy_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $secretsha256 ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_redsys_secretsha256', $secretsha256 );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_redsys_secretsha256 saved: ' . $secretsha256 );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_redsys_secretsha256 NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '/******************************************/' );
						WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
						WCRed()->log( 'insite', '/******************************************/' );
					}
					do_action( 'insite_post_payment_complete', $order->get_id() );
					if ( function_exists( 'sumosubs_set_transaction_id' ) ) {
						sumosubs_set_transaction_id( $renewal_order->get_id(), $redsys_order, true );
					}
					return true;
				} elseif ( ! WCRed()->check_order_is_paid_loop( $order->get_id() ) ) {
					// TO-DO: Enviar un correo con el problema al administrador.
					$order_id    = $order->get_id();
					$url         = 'URL: ' . WCRed()->get_order_edit_url( $order_id );
					$error       = WCRed()->get_error( $response );
					$resul_error = WCRed()->check_token_error( $order, $customer_token_id, $response );
					if ( 'delete_token' === $result_error ) {
						$order->add_order_note( __( 'Customer Token Removed, error ', 'woocommerce-redsys' ) . $response );
					} else {
						$order->add_order_note( __( 'There was and error. The error was: ', 'woocommerce-redsys' ) . $error );
					}
					$message = __( '⚠️ Subscription Payment failed. Error: ', 'woocommerce-redsys' ) . $error . '. URL: ' . WCRed()->get_order_edit_url( $order_id );
					WCRed()->add_subscription_note( $message, $order_id );
					WCRed()->push( $message . ' ' . $url );
					if ( function_exists( 'ywsbs_register_failed_payment' ) ) {
						ywsbs_register_failed_payment( $renewal_order, 'Error: No user token' );
					}
					do_action( 'insite_post_payment_error', $order->get_id(), $error );
					return false;
				} else {
					if ( function_exists( 'sumosubs_set_transaction_id' ) ) {
						sumosubs_set_transaction_id( $renewal_order->get_id(), $redsys_order, true );
					}
					do_action( 'insite_post_payment_complete', $order->get_id() );
					return true;
				}
			}
		}
	}
	/**
	 * Add payment fields on checkout page.
	 */
	public function payment_fields() {
		global $woocommerce;

		echo '<script type="text/javascript">
					if (typeof(receive) !== "undefined"){
						window.removeEventListener("message", receive );
					}
				</script>';
		$minheigh       = '';
		$margintop      = '';
		$colorbutton    = '';
		$colorfieldtext = '';
		$terminal       = $this->terminal;
		$fuc            = $this->customer;
		if ( is_user_logged_in() ) {
			$user_id = get_current_user_id();
		} else {
			$user_id = '0';
		}
		if ( isset( $_POST['post_data'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			parse_str( $_POST['post_data'], $post_data ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.MissingUnslash,WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		}
		if ( isset( $post_data['woocommerce-process-checkout-nonce'] ) && wp_verify_nonce( $post_data['woocommerce-process-checkout-nonce'], 'woocommerce-process_checkout' ) ) {

			if ( ! WC()->cart->prices_include_tax ) {
				$order_total = WC()->cart->cart_contents_total;
			} else {
				$order_total = WC()->cart->cart_contents_total + WC()->cart->tax_total;
			}
			$order_total = WC()->cart->total;
			$the_card    = WC()->cart->get_cart();

			if ( isset( $post_data['billing_first_name'] ) ) {
				$billing_first_name = $post_data['billing_first_name'];
			} else {
				$billing_first_name = false;
			}

			$customfieldname = $this->customfieldname;
			if ( ! empty( $customfieldname ) || ( '' !== $customfieldname && $customfieldname ) ) {
				if ( isset( $post_data[ $customfieldname ] ) ) {
					$billing_first_name = $post_data[ $customfieldname ];
				} else {
					$billing_first_name = false;
				}
			}

			if ( isset( $post_data['billing_last_name'] ) ) {
				$billing_last_name = $post_data['billing_last_name'];
			} else {
				$billing_last_name = false;
			}

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
			);
			$allowed_html_filter = apply_filters( 'redsys_kses_descripcion', $allowed_html );

			$colorbutton = $this->colorbutton;

			if ( ! empty( $colorbutton ) ) {
				$colorbutton = $colorbutton;
			} else {
				$colorbutton = '#f39c12';
			}

			$colorfieldtext = $this->colorfieldtext;

			if ( ! empty( $colorfieldtext ) ) {
				$colorfieldtext = $colorfieldtext;
			} else {
				$colorfieldtext = '#43454b';
			}

			$colortextbutton = $this->colortextbutton;

			if ( ! empty( $colortextbutton ) ) {
				$colortextbutton = $colortextbutton;
			} else {
				$colortextbutton = '#ffffff';
			}

			$textcolor = $this->textcolor;

			if ( ! empty( $textcolor ) ) {
				$textcolor = $textcolor;
			} else {
				$textcolor = '#2e3131';
			}

			$cvvbox = $this->cvvboxcolor;
			if ( ! empty( $cvvbox ) ) {
				$cvvbox = $cvvbox;
			} else {
				$cvvbox = '#d5d5d5';
			}

			$buttontext = $this->buttontext;

			if ( ! empty( $buttontext ) ) {
				$buttontext = $buttontext;
			} else {
				$buttontext = __( 'Pay Now', 'woocommerce-redsys' );
			}

			$button_heigth = $this->button_heigth;

			if ( ! empty( $button_heigth ) ) {
				$button_heigth = $button_heigth;
			} else {
				$button_heigth = '85px';
			}

			$button_width = $this->button_width;

			if ( ! empty( $button_width ) ) {
				$button_width = $button_width;
			} else {
				$button_width = '100%';
			}

			if ( isset( $_SERVER['HTTP_ACCEPT'] ) ) {
				$http_accept = $_SERVER['HTTP_ACCEPT']; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized,WordPress.Security.ValidatedSanitizedInput.MissingUnslash,WordPress.Security.ValidatedSanitizedInput.MissingUnslash
			} else {
				$http_accept = 'false';
			}

			$token_type_needed = 'no';
			$need_token        = 'no';
			$there_are_tokens  = false;

			$nonce      = wp_create_nonce( 'redsys_insite_nonce' );
			$order_id_2 = WCRed()->create_checkout_insite_number();

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/*******************************************/' );
				WCRed()->log( 'insite', '  Cargamos el formulario InSite sencillo    ' );
				WCRed()->log( 'insite', '/*******************************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$order_id_2: ' . $order_id_2 );
				WCRed()->log( 'insite', '$order_total: ' . $order_total );
				WCRed()->log( 'insite', '$billing_first_name: ' . $billing_first_name );
				WCRed()->log( 'insite', '$billing_last_name: ' . $billing_last_name );
				WCRed()->log( 'insite', '$http_accept: ' . $http_accept );
				WCRed()->log( 'insite', ' ' );
			}
			echo '
			<style>
				.payment_method_insite .input-wrap {
					height: 60px !important;
					margin-left: 0px;
				}
				.payment_method_insite .input-wrap#card-number {
					margin-right: 0px;
				}
				.payment_method_insite .date-wrap {
					display: flex;
				}
				.payment_method_insite .date-wrap > div {
					width: 100%;
					display: flex;
					flex-direction: column;
					justify-content: flex-end;
				}
				.payment_method_insite .date-wrap > div label, fieldset.redsys-new-card-data .cardinfo-label  {
					line-height: 1.2em;
					width: 100%;
					font-size: 13px;
    				font-weight: 600;
					transition: transform 0.5s cubic-bezier(0.19, 1, 0.22, 1), opacity 0.5s cubic-bezier(0.19, 1, 0.22, 1);
					line-height: 26px;
					text-decoration: none solid rgb(84, 84, 84);
					text-shadow: none;
					text-transform: uppercase;
					color: rgb(84, 84, 84);
    				font-family: NeueEinstellung, -apple-system, BlinkMacSystemFont, Arial, Helvetica, "Helvetica Neue", Verdana, sans-serif;
    				letter-spacing: normal;
					margin-left: 8px !important;
				}
				.payment_method_insite .date-wrap .cvv-wrap {
					padding-top: 2px;
					width: 100%;
					margin-left: 8px;
				}
				#payment .payment_methods li .payment_box fieldset .cvv-wrap label {
					width: 100%;
					margin-left: 8px !important;
				}
				#payment .payment_methods li .payment_box fieldset .cvv-wrap #cvv {
					width: 100% !important;
					margin-left: auto;
					margin-right: auto;
				}
				#payment .payment_methods li .payment_box {
					padding-top: 5px;
				}
				#payment .payment_methods li .payment_box fieldset.card-saved {
					padding-top: 0;
					padding-bottom: 15px;
					font-size: .875em;
					line-height: 1.4em;
				}
				#payment .payment_methods li .payment_box fieldset input[type="radio"] + label,
				#payment .payment_methods li .payment_box fieldset input[type="checkbox"] + label {
					margin-left: 6px;
				}
				.payment_box fieldset.card-saved div {
					padding-bottom: 5px;
				}
				.token-wrap {
					margin: 15px 0 15px;
				}
				#redsys-submit {
					margin: 0 auto;
					max-height: 100px;
					max-width: 100%;
				}
				.insite-unificado, .insite-unificado #card-form {
					height: 350px;
					margin-bottom: 35px;
				}
				fieldset.redsys-new-card-data {
					max-width: 70%;
					margin: 0 auto !important;
				}
				fieldset.redsys-new-card-data-uni {
					margin: 0 auto !important;
				}
			</style>

				<div class="payment_method_insite">
					<fieldset class="card-saved">
						<p>' . wp_kses( $this->description, $allowed_html_filter ) . '</p>';
			if ( ( 'yes' === $this->pay1clic && is_user_logged_in() ) || 'R' === WCRed()->check_card_for_subscription( $the_card ) ) {
				$user_id           = get_current_user_id();
				$token_type_needed = WCRed()->check_card_for_subscription( $the_card );
				if ( WCRed()->check_tokens_exist( $user_id, $token_type_needed ) ) {
					$there_are_tokens = true;
					if ( 'R' === $token_type_needed ) {
						$need_token = 'yes';
					} else {
						$need_token = 'no';
					}
				} else {
					$there_are_tokens = false;
					if ( 'R' === $token_type_needed ) {
						$need_token = 'yes';
					} else {
						$need_token = 'no';
					}
				}
				if ( $there_are_tokens ) {
					echo '<div>';
					echo '<ul>';
					WCRed()->get_all_tokens_checkout( $user_id, $token_type_needed );
					echo '<input class="input-radio" type="radio" id="new" name="token" value="add" checked>';
					echo '<label for="new">' . esc_html__( 'Use a new payment method', 'woocommerce-redsys' ) . '</label>';
					echo '<input type="hidden" id="_redsys_token_type" name="_redsys_token_type" value="' . esc_html( $token_type_needed ) . '"></>';
					echo '</ul>';
					echo '</div>';
				}
				if ( ( ( 'yes' === $this->pay1clic && is_user_logged_in() ) || 'no' !== $need_token ) ) {
					if ( 'no' === $need_token ) {
						echo '
								<div id="redsys_save_token">
									<label><input type="checkbox" id="_redsys_save_token" name="_redsys_save_token" onclick="redysTokenCheck(this);" value="yes"> ' . esc_html__( 'Save payment information to my account for future purchases.', 'woocommerce-redsys' ) . '</label>
								</div>';
					} else {
						$text        = __( 'We need to store your credit card for future payments. It will be stored by our bank, so it is totally safe.', 'woocommerce-redsys' );
						$text_filter = apply_filters( 'redsys_text_get_token', $text );
						echo '
							<div id="redsys_save_token">
								' . esc_html( $text_filter ) . '
								<input type="hidden" id="_redsys_save_token" name="_redsys_save_token" value="yes">
							</div>';
					}
				}
			}
			// Preauthotization.
			if ( WCRed()->check_card_preauth( $the_card ) ) {
				$text        = __( 'We will preauthorize the Order and will be charge later when we know the final cost.', 'woocommerce-redsys' );
				$text_filter = apply_filters( 'redsys_text_preauth', $text );
				$preauth     = 'yes';
				echo '
					<div id="redsys_preauth_message">
						<p><br />
						' . esc_html( $text_filter ) . '
						</p>
					</div>';
			} else {
				$preauth = 'no';
			}
			if ( 'intindepenelements' === $this->insitetype ) { // Integration by independent elements.
				echo '
				</fieldset>
				<fieldset class="redsys-new-card-data">
					<div>
						<label class="cardinfo-label" for="card-number">' . esc_html__( 'CREDIT CARD NUMBER', 'woocommerce-redsys' ) . '</label>
						<div class="input-wrap" id="card-number" autocomplete="cc-number" x-autocompletetype="cc-number"></div>
					</div>
					<div class="date-wrap">
						<div>
							<label class="cardinfo-label" for="expiration-date">' . esc_html__( 'EXPIRATION', 'woocommerce-redsys' ) . '</label>
							<div class="input-wrap" id="expiration-month" autocomplete="cc-exp" x-autocompletetype="cc-exp"></div>
						</div>
						<div class="cvv-wrap">
							<label class="cardinfo-label" for="cvv">' . esc_html__( 'CVC', 'woocommerce-redsys' ) . '</label>
							<div class="input-wrap" id="cvv" autocomplete="cc-csc" x-autocompletetype="cc-csc"></div>
						</div>
					</div>
					<div class="input-wrapper" id="redsys-submit"></div>
				</fieldset>';
			} else {
				// Campo unificado.
				echo '
				<div>
					<fieldset class="redsys-new-card-data-uni insite-unificado">
						<div id="card-form"/></div>
					</fieldset>
				</div>';
			}
			echo '
				<input type="hidden" id="token" ></input>
					<input type="hidden" id="errorCode" ></input>
					<input type="hidden" name="_temp_redsys_order_number" id="_temp_redsys_order_number" value="' . esc_html( $order_id_2 ) . '"></input>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">	
					console.log("Start" );
					var Redsysc = new Date();';
			if ( 'yes' === $need_token ) {
				echo '
					var save = "yes";';
			} else {
				echo '
					var save = "no";';
			}
			if ( 'no' === $need_token ) {
				echo '
					function redysTokenCheck( cb ) {
						if (cb.checked) {
							delete save;
							save = "yes";
							console.log("save:", save );
						} else {
							delete save;
							save = "no";
							console.log("save:", save );
						}
					}
					console.log("save:", save );';
			}
			if ( 'intindepenelements' === $this->insitetype ) { // Integration by independent elements.
				if ( 'yes' === $this->testmode ) {
					$link_rear_card     = 'https://sis-t.redsys.es:25443/sis/NC/assets/images/cc-back.svg';
					$link_calendar_card = 'https://sis-t.redsys.es:25443/sis/NC/assets/images/cc-calendar.svg';
				} else {
					if ( is_user_logged_in() ) {
						$user_id = get_current_user_id();
					} else {
						$user_id = '0';
					}
					$user_test = $this->check_user_test_mode( $user_id );
					if ( $user_test ) {
						$link_rear_card     = 'https://sis-t.redsys.es:25443/sis/NC/assets/images/cc-back.svg';
						$link_calendar_card = 'https://sis-t.redsys.es:25443/sis/NC/assets/images/cc-calendar.svg';
					} else {
						$link_rear_card     = 'https://sis.redsys.es/sis/NC/assets/images/cc-back.svg';
						$link_calendar_card = 'https://sis.redsys.es/sis/NC/assets/images/cc-calendar.svg';
					}
				}
					echo '
					// Listener
					var receive = function receiveMessage(event) {
						storeIdOper(event,"token", "errorCode");
						console.log("pre check token" );
						if ( token.value ) {
							console.log(event);
							console.log("Order Id token:", token.value );
							console.log("Error:", errorCode.value);
							console.log("Ajax URL:", ajaxurl);
							if ( token.value ) {
								jQuery(document).ready( function() {
									console.log("llega Ajax");
									if ( token.value ) {
										console.log("se defino token.value:", token.value );
										console.log("El numero de pedido es:", ' . esc_html( $order_id_2 ) . ' );
										jQuery.ajax({
											type : "post",
											url : ajaxurl,
											data : {
												"action": "check_token_insite_from_action_checkout",
												"token" : token.value,
												"order_id" : "' . esc_html( $order_id_2 ) . '",
												"order_total" : "' . esc_html( $order_total ) . '",
												"billing_first_name" : "' . esc_html( $billing_first_name ) . '",
												"billing_last_name" : "' . esc_html( $billing_last_name ) . '",
												"user_id" : "' . esc_html( $user_id ) . '",
												"redsysnonce"  : "' . esc_html( $nonce ) . '",
												"userAgent"    : navigator.userAgent,
												"language"     : navigator.language,
												"height"       : screen.height,
												"width"        : screen.width,
												"colorDepth"   : screen.colorDepth,
												"Timezone"     : Redsysc.getTimezoneOffset(),
												"http_accept"  : "' . esc_html( $http_accept ) . '",
												"need_token"   : "' . esc_html( $need_token ) . '",
												"token_needed" : "' . esc_html( $token_type_needed ) . '",
												"preauth"      : "' . esc_html( $preauth ) . '",
												"saved"        : save
											},
											success: function(response) {
												console.log("response:", response, "type of:", typeof response);
												if(response=="success") {
													document.getElementById("place_order").click();
												} else if ( response=="ChallengeRequest" ) {
													document.getElementById("place_order").click();
												} else {
													location.reload();
													if ( "La firma no coincide" == response ) {
														alert("' . esc_html__( 'Error: Please make sure that everything is filled in and enter your card details again.', 'woocommerce-redsys' ) . '");
													} else {
														alert("Error: " + response );
													}
												}
											}
										})
									}
								});
							}	
						}
						console.log("No hay token" );
						console.log("Error:", errorCode.value );
					};

					window.addEventListener("message", receive );

					getCardInput(
						"card-number",
						"background-color: rgb(255, 255, 255);width: 100%;border-radius: 5px;transition: background 0.15s ease, border 0.15s ease,box-shadow 0.15s ease,color 0.15s ease;border: 1px solid #e6e6e6;box-shadow: none;border-bottom-color: rgba(84, 84, 84, 0.1);border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;border-bottom-style: solid;border-bottom-width: 0.761905px;border-left-color: rgba(84, 84, 84, 0.1);border-left-style: solid;border-left-width: 0.761905px;border-right-color: rgba(84, 84, 84, 0.1);border-right-style: solid;border-right-width: 0.761905px;border-top-color: rgba(84, 84, 84, 0.1);border-top-left-radius: 0px;border-top-right-radius: 0px;border-top-style: solid;border-top-width: 0.761905px;color: rgb(68, 68, 68);font-family: Radnika, -apple-system, BlinkMacSystemFont, Arial, Helvetica, Verdana, sans-serif;font-size: 14px;font-weight: 400;letter-spacing: normal;line-height: normal;outline-offset: 0px;padding-bottom: 8px;padding-left: 8px;padding-right: 8px;padding-top: 8px;text-decoration: none solid rgb(68, 68, 68);text-shadow: none;text-transform: none;outline: 0px none rgb(68, 68, 68);", "' . esc_html__( '1234 1234 1234 1234', 'woocommerce-redsys' ) . '"
					);
					getExpirationInput(
						"expiration-month",
						"padding-right: 0px!important;background: url(' . esc_url( $link_calendar_card ) . ') no-repeat center right;background-color: rgb(255, 255, 255);width: 100%;border-radius: 5px;transition: background 0.15s ease, border 0.15s ease,box-shadow 0.15s ease,color 0.15s ease;border: 1px solid #e6e6e6;box-shadow: none;border-bottom-color: rgba(84, 84, 84, 0.1);border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;border-bottom-style: solid;border-bottom-width: 0.761905px;border-left-color: rgba(84, 84, 84, 0.1);border-left-style: solid;border-left-width: 0.761905px;border-right-color: rgba(84, 84, 84, 0.1);border-right-style: solid;border-right-width: 0.761905px;border-top-color: rgba(84, 84, 84, 0.1);border-top-left-radius: 0px;border-top-right-radius: 0px;border-top-style: solid;border-top-width: 0.761905px;color: rgb(68, 68, 68);font-family: Radnika, -apple-system, BlinkMacSystemFont, Arial, Helvetica, Verdana, sans-serif;font-size: 14px;font-weight: 400;letter-spacing: normal;line-height: normal;outline-offset: 0px;padding-bottom: 8px;padding-left: 8px;padding-right: 8px;padding-top: 8px;text-decoration: none solid rgb(68, 68, 68);text-shadow: none;text-transform: none;outline: 0px none rgb(68, 68, 68);", "' . esc_html__( 'MM / YY', 'woocommerce-redsys' ) . '"
					);
					getCVVInput(
						"cvv",
						"padding-right: 0px!important;background: url(' . esc_url( $link_rear_card ) . ') no-repeat center right;background-color: rgb(255, 255, 255);width: 100%;border-radius: 5px;transition: background 0.15s ease, border 0.15s ease,box-shadow 0.15s ease,color 0.15s ease;border: 1px solid #e6e6e6;box-shadow: none;border-bottom-color: rgba(84, 84, 84, 0.1);border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;border-bottom-style: solid;border-bottom-width: 0.761905px;border-left-color: rgba(84, 84, 84, 0.1);border-left-style: solid;border-left-width: 0.761905px;border-right-color: rgba(84, 84, 84, 0.1);border-right-style: solid;border-right-width: 0.761905px;border-top-color: rgba(84, 84, 84, 0.1);border-top-left-radius: 0px;border-top-right-radius: 0px;border-top-style: solid;border-top-width: 0.761905px;color: rgb(68, 68, 68);font-family: Radnika, -apple-system, BlinkMacSystemFont, Arial, Helvetica, Verdana, sans-serif;font-size: 14px;font-weight: 400;letter-spacing: normal;line-height: normal;outline-offset: 0px;padding-bottom: 8px;padding-left: 8px;padding-right: 8px;padding-top: 8px;text-decoration: none solid rgb(68, 68, 68);text-shadow: none;text-transform: none;outline: 0px none rgb(68, 68, 68);", "' . esc_html__( 'CVC', 'woocommerce-redsys' ) . '"
					);
					getPayButton(
						"redsys-submit",
						"padding: 10px;font-size: 1.41575em; width: ' . esc_html( $button_width ) . '; vertical-align: baseline; background-color:' . esc_html( $colorbutton ) . '; color:' . esc_html( $colortextbutton ) . '; border-width: 0px; cursor: pointer; ",
						"' . esc_html( $buttontext ) . '",
						"' . esc_html( $fuc ) . '",
						"' . esc_html( $terminal ) . '",
						"' . esc_html( $order_id_2 ) . '"
					);
				</script>
				<style>
					#redsys-hosted-pay-button {height: ' . esc_html( $button_heigth ) . '!important; }
				</style>';
			} else {
				// Campos unificados.
				echo '
					<!-- Listener -->
					window.addEventListener("message", function receiveMessage(event) {
						storeIdOper(event,"token", "errorCode");
						if ( token.value ) {
							console.log(event);
							console.log("Order Id token:", token.value );
							console.log("Error:", errorCode.value);
							console.log("Ajax URL:", ajaxurl);
							if ( token.value ) {
								jQuery(document).ready( function() {
									console.log("llega Ajax");
									if ( token.value ) {
										console.log("se defino token.value:", token.value );
										console.log("El numero de pedido es:", ' . esc_html( $order_id_2 ) . ' );
										jQuery.ajax({
											type : "post",
											url : ajaxurl,
											data : {
												"action": "check_token_insite_from_action_checkout",
												"token" : token.value,
												"order_id" : "' . esc_html( $order_id_2 ) . '",
												"order_total" : "' . esc_html( $order_total ) . '",
												"billing_first_name" : "' . esc_html( $billing_first_name ) . '",
												"billing_last_name" : "' . esc_html( $billing_last_name ) . '",
												"user_id" : "' . esc_html( $user_id ) . '",
												"redsysnonce"  : "' . esc_html( $nonce ) . '",
												"userAgent"    : navigator.userAgent,
												"language"     : navigator.language,
												"height"       : screen.height,
												"width"        : screen.width,
												"colorDepth"   : screen.colorDepth,
												"Timezone"     : Redsysc.getTimezoneOffset(),
												"http_accept"  : "' . esc_html( $http_accept ) . '",
												"need_token"   : "' . esc_html( $need_token ) . '",
												"token_needed" : "' . esc_html( $token_type_needed ) . '",
												"preauth"      : "' . esc_html( $preauth ) . '",
												"saved"        : save
											},
											success: function(response) {
												console.log("response:", response, "type of:", typeof response);
												if(response=="success") {
													document.getElementById("place_order").click();
												} else if ( response=="ChallengeRequest" ) {
													document.getElementById("place_order").click();
												} else {
													location.reload();
													if ( "La firma no coincide" == response ) {
														alert("' . esc_html__( 'Error: Please make sure that everything is filled in and enter your card details again.', 'woocommerce-redsys' ) . '");
													} else {
														alert("Error: " + response );
													}
												}
											}
										})
									}
								});
							}	
						}
					});
					getInSiteForm(
						"card-form",
						"background-color:' . esc_html( $colorbutton ) . '; color:' . esc_html( $colortextbutton ) . '",
						"color:' . esc_html( $textcolor ) . '; max-width: 300px;",
						"color:' . esc_html( $colorfieldtext ) . ';",
						";",
						"' . esc_html( $buttontext ) . '",
						"' . esc_html( $fuc ) . '",
						"' . esc_html( $terminal ) . '",
						"' . esc_html( $order_id_2 ) . '",
						"ES",
						"false"
					);

				</script>
				<style>
				#redsys-hosted-pay-button {min-height: ' . esc_html( $minheigh ) . 'px;}
				</style>';
			}
		}
	}
	/**
	 * Process the payment and return the result
	 *
	 * @param int    $order_id Order ID.
	 * @param string $token_id Token ID.
	 *
	 * @return array
	 */
	public function pay_with_token_r( $order_id, $token_id ) {

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', 'There is Token R: ' . $customer_token_r );
		}
		$order            = WCRed()->get_order( $order_id );
		$customer_token   = WCRed()->get_token_by_id( $token_id );
		$cof_txnid        = WCRed()->get_txnid( $token_id );
		$mi_obj           = new WooRedsysAPIWS();
		$order_total_sign = WCRed()->redsys_amount_format( $order->get_total() );
		$orderid2         = WCRed()->prepare_order_number( $order_id );
		set_transient( $orderid2 . '_insite_redsys_number', $order_id, 3600 );
		$user_id             = $order->get_user_id();
		$customer            = $this->customer;
		$transaction_type    = '0';
		$currency_codes      = WCRed()->get_currencies();
		$currency            = $currency_codes[ get_woocommerce_currency() ];
		$cof_ini             = 'N';
		$cof_type            = 'R';
		$secretsha256        = $this->get_redsys_sha256( $user_id );
		$url_ok              = add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) );
		$product_description = WCRed()->product_description( $order, 'redsys' );
		$merchant_name       = $this->commercename;
		$type                = 'ws';
		$redsys_adr          = $this->get_redsys_url_gateway_ws( $user_id, $type );
		$terminal            = $this->terminal;
		$description         = WCRed()->product_description( $order, $order_id );
		$merchan_name2       = WCRed()->get_order_meta( $order_id, '_billing_first_name', true );
		$merchant_lastnme    = WCRed()->get_order_meta( $order_id, '_billing_last_name', true );

		$use_token = WCRed()->maybe_use_token( $token_id );
		if ( ! $use_token ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'redsys', 'Waiting 72h' );
			}
			$order->add_order_note( __( 'There was and error. Credit card blocked for 72h', 'woocommerce-redsys' ) );
			return false;
		}

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', '$order_total_sign: ' . $order_total_sign );
			WCRed()->log( 'insite', '$orderid2: ' . $orderid2 );
			WCRed()->log( 'insite', '$user_id: ' . $user_id );
			WCRed()->log( 'insite', '$transaction_type: ' . $transaction_type );
			WCRed()->log( 'insite', '$currency: ' . $currency );
			WCRed()->log( 'insite', '$cof_ini: ' . $cof_ini );
			WCRed()->log( 'insite', '$cof_type: ' . $cof_type );
			WCRed()->log( 'insite', '$cof_txnid: ' . $cof_txnid );
			WCRed()->log( 'insite', '$product_description: ' . $product_description );
			WCRed()->log( 'insite', '$secretsha256: ' . $secretsha256 );
			WCRed()->log( 'insite', '$url_ok: ' . $url_ok );
			WCRed()->log( 'insite', '$merchant_name: ' . $merchant_name );
			WCRed()->log( 'insite', '$type: ' . $type );
			WCRed()->log( 'insite', '$redsys_adr: ' . $redsys_adr );
			WCRed()->log( 'insite', '$ds_merchant_terminal: ' . $ds_merchant_terminal );
			WCRed()->log( 'insite', '$description: ' . $description );
			WCRed()->log( 'insite', ' ' );
		}

		if ( '000' === $order_total_sign || '0' === $order_total_sign || 0 === $order_total_sign ) {
			return true;
		}

		$datos_entrada  = '<DATOSENTRADA>';
		$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
		$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
		$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
		$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
		$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
		$datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name2 ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
		$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
		$datos_entrada .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
		$datos_entrada .= '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
		$datos_entrada .= '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
		$datos_entrada .= '<DS_MERCHANT_COF_TXNID>' . $cof_txnid . '</DS_MERCHANT_COF_TXNID>';
		$datos_entrada .= '<DS_MERCHANT_PRODUCTDESCRIPTION>' . WCRed()->clean_data( $description ) . '</DS_MERCHANT_PRODUCTDESCRIPTION>';
		$datos_entrada .= '<DS_MERCHANT_EXCEP_SCA>MIT</DS_MERCHANT_EXCEP_SCA>';
		$datos_entrada .= '<DS_MERCHANT_DIRECTPAYMENT>TRUE</DS_MERCHANT_DIRECTPAYMENT>';
		$datos_entrada .= '<DS_MERCHANT_EMV3DS>{"threeDSInfo":"CardData"}</DS_MERCHANT_EMV3DS>';
		$datos_entrada .= '</DATOSENTRADA>';

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '          The call  3          ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', $datos_entrada );
			WCRed()->log( 'insite', ' ' );
		}

		$xml  = '<REQUEST>';
		$xml .= $datos_entrada;
		$xml .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
		$xml .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
		$xml .= '</REQUEST>';

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '          The XML 10             ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', $xml );
			WCRed()->log( 'insite', ' ' );
		}

		$cliente  = new SoapClient( $redsys_adr );
		$response = $cliente->iniciaPeticion( array( 'datoEntrada' => $xml ) );

		if ( isset( $response->iniciaPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$xml_retorno = new SimpleXMLElement( $response->iniciaPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$respuesta   = json_decode( $xml_retorno->INFOTARJETA->Ds_EMV3DS ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$xml_retorno 7 IniciaPeticion: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
		}

		$ds_emv3ds_json         = $xml_retorno->INFOTARJETA->Ds_EMV3DS; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		$ds_emv3ds              = json_decode( $ds_emv3ds_json );
		$protocol_version       = $ds_emv3ds->protocolVersion; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		$three_dsserver_transid = $ds_emv3ds->threeDSServerTransID; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		$three_ds_info          = $ds_emv3ds->threeDSInfo; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$ds_emv3ds_json: ' . $ds_emv3ds_json );
			WCRed()->log( 'insite', '$ds_emv3ds: ' . print_r( $ds_emv3ds, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'insite', '$three_dsserver_transid: ' . $three_dsserver_transid );
			WCRed()->log( 'insite', '$three_ds_info: ' . $three_ds_info );
		}

		if ( '2.1.0' === $protocol_version || '2.2.0' === $protocol_version ) {

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', 'threeDSInfo: AuthenticationData' );
				WCRed()->log( 'insite', 'protocolVersion: ' . $protocol_version );
			}
			$datos_entrada  = '<DATOSENTRADA>';
			$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
			$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
			$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
			$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
			$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
			$datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name2 ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
			$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
			$datos_entrada .= '<DS_MERCHANT_PRODUCTDESCRIPTION>' . WCRed()->clean_data( $description ) . '</DS_MERCHANT_PRODUCTDESCRIPTION>';
			$datos_entrada .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
			$datos_entrada .= '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
			$datos_entrada .= '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
			$datos_entrada .= '<DS_MERCHANT_COF_TXNID>' . $cof_txnid . '</DS_MERCHANT_COF_TXNID>';
			$datos_entrada .= '<DS_MERCHANT_EXCEP_SCA>MIT</DS_MERCHANT_EXCEP_SCA>';
			$datos_entrada .= '<DS_MERCHANT_DIRECTPAYMENT>TRUE</DS_MERCHANT_DIRECTPAYMENT>';
			$datos_entrada .= '</DATOSENTRADA>';
			$xml            = '<REQUEST>';
			$xml           .= $datos_entrada;
			$xml           .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
			$xml           .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
			$xml           .= '</REQUEST>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The XML 11            ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', 'trataPeticion 6: ' . $xml );
				WCRed()->log( 'insite', ' ' );
			}
			$cliente  = new SoapClient( $redsys_adr );
			$response = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

			if ( isset( $response->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$xml_retorno       = new SimpleXMLElement( $response->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$authorisationcode = (string) $xml_retorno->OPERACION->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$codigo            = (string) $xml_retorno->CODIGO; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$redsys_order      = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$terminal          = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$currency_code     = (string) $xml_retorno->OPERACION->Ds_Currency; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$xml_retorno 8: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', 'Ds_AuthorisationCode: ' . $authorisationcode );
			}
			if ( $authorisationcode ) {
				$dsdate = date( 'd/m/Y', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
				$dshour = date( 'H:i', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
				WCRed()->update_order_meta( $order->get_id(), '_redsys_done', 'yes' );
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'payment_complete() 5' );
				}
				if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
					if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
						sumo_save_subscription_payment_info(
							$order->get_id(),
							array(
								'payment_type'         => 'auto',
								'payment_method'       => 'insite',
								'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
								'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_order_amount' => $order->get_total(),
							)
						);
					}
				}
				$order->payment_complete();
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '      Saving Order Meta       ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}

				if ( ! empty( $redsys_order ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $redsys_order );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_payment_order_number_redsys saved: ' . $redsys_order );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_payment_order_number_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $terminal ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $terminal );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_payment_terminal_redsys saved: ' . $terminal );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_payment_terminal_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $authorisationcode ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisationcode );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_authorisation_code_redsys saved: ' . $authorisationcode );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_authorisation_code_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $currency_code ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_corruncy_code_redsys', $currency_code );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_corruncy_code_redsys saved: ' . $currency_code );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_corruncy_code_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $secretsha256 ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_redsys_secretsha256', $secretsha256 );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_redsys_secretsha256 saved: ' . $secretsha256 );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_redsys_secretsha256 NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '/******************************************/' );
					WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
					WCRed()->log( 'insite', '/******************************************/' );
				}
				do_action( 'insite_post_payment_complete', $order->get_id() );
				return true;
			} else {
				$error = 'Unknown';
				do_action( 'insite_post_payment_error', $order->get_id(), $error );
				return false;
			}
		} else {
			$protocol_version = '1.0.2';
			$data             = array(
				'threeDSInfo'     => 'AuthenticationData',
				'protocolVersion' => '1.0.2',
			);
			$need             = wp_json_encode( $data );
			$acctinfo         = WCPSD2()->get_acctinfo( $order, $datos_usuario );
			$datos_entrada    = '<DATOSENTRADA>';
			$datos_entrada   .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
			$datos_entrada   .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
			$datos_entrada   .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
			$datos_entrada   .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
			$datos_entrada   .= '<DS_MERCHANT_TRANSACTIONTYPE>0</DS_MERCHANT_TRANSACTIONTYPE>';
			$datos_entrada   .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name2 ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
			$datos_entrada   .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
			$datos_entrada   .= '<DS_MERCHANT_PRODUCTDESCRIPTION>' . WCRed()->clean_data( $description ) . '</DS_MERCHANT_PRODUCTDESCRIPTION>';
			$datos_entrada   .= '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
			$datos_entrada   .= '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
			$datos_entrada   .= $ds_merchant_group;
			$datos_entrada   .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
			$datos_entrada   .= '<DS_MERCHANT_COF_TXNID>' . $cof_txnid . '</DS_MERCHANT_COF_TXNID>';
			$datos_entrada   .= '<DS_MERCHANT_EXCEP_SCA>MIT</DS_MERCHANT_EXCEP_SCA>';
			$datos_entrada   .= '<DS_MERCHANT_DIRECTPAYMENT>TRUE</DS_MERCHANT_DIRECTPAYMENT>';
			$datos_entrada   .= '</DATOSENTRADA>';
			$xml              = '<REQUEST>';
			$xml             .= $datos_entrada;
			$xml             .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
			$xml             .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
			$xml             .= '</REQUEST>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The XML 12            ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', 'trataPeticion 7: ' . $xml );
				WCRed()->log( 'insite', ' ' );
			}
			$cliente  = new SoapClient( $redsys_adr );
			$response = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

			if ( isset( $response->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$xml_retorno = new SimpleXMLElement( $response->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$response: ' . print_r( $response, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', '$xml_retorno 9: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}
			$authorisationcode = (string) $xml_retorno->OPERACION->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$codigo            = (string) $xml_retorno->CODIGO; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$redsys_order      = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$terminal          = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$currency_code     = (string) $xml_retorno->OPERACION->Ds_Currency; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

			if ( $authorisationcode ) {
				$dsdate = date( 'd/m/Y', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
				$dshour = date( 'H:i', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
				WCRed()->update_order_meta( $order_id, '_redsys_done', 'yes' );
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'payment_complete() 6' );
				}
				if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
					if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
						sumo_save_subscription_payment_info(
							$order->get_id(),
							array(
								'payment_type'         => 'auto',
								'payment_method'       => 'insite',
								'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
								'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_order_amount' => $order->get_total(),
							)
						);
					}
				}
				$order->payment_complete();
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '      Saving Order Meta       ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}

				if ( ! empty( $redsys_order ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $redsys_order );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_payment_order_number_redsys saved: ' . $redsys_order );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_payment_order_number_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $terminal ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $terminal );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_payment_terminal_redsys saved: ' . $terminal );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_payment_terminal_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $authorisationcode ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisationcode );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_authorisation_code_redsys saved: ' . $authorisationcode );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_authorisation_code_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $currency_code ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_corruncy_code_redsys', $currency_code );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_corruncy_code_redsys saved: ' . $currency_code );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_corruncy_code_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $secretsha256 ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_redsys_secretsha256', $secretsha256 );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_redsys_secretsha256 saved: ' . $secretsha256 );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_redsys_secretsha256 NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '/******************************************/' );
					WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
					WCRed()->log( 'insite', '/******************************************/' );
				}
				do_action( 'insite_post_payment_complete', $order->get_id() );
				return true;
			} else {
				$error = 'Unknown';
				do_action( 'insite_post_payment_error', $order->get_id(), $error );
				return false;
			}
		}
	}
	/**
	 * Process the payment and return the result.
	 *
	 * @param int    $order_id Order ID.
	 * @param string $token_id Token ID.
	 *
	 * @return array
	 */
	public function pay_with_token_c( $order_id, $token_id ) {

		$customer_token_c = WCRed()->get_token_by_id( $token_id );
		$order            = WCRed()->get_order( $order_id );
		$currency_codes   = WCRed()->get_currencies();

		// Pay with 1 clic & token exist.
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$customer_token_c exist' );
			WCRed()->log( 'insite', '$customer_token_c: ' . $customer_token_c );
			WCRed()->log( 'insite', ' ' );
		}

		$mi_obj           = new WooRedsysAPIWS();
		$order_total_sign = WCRed()->redsys_amount_format( $order->get_total() );
		$orderid2         = WCRed()->prepare_order_number( $order_id );
		set_transient( $orderid2 . '_insite_redsys_number', $order_id, 3600 );
		$user_id  = $order->get_user_id();
		$customer = $this->customer;
		if ( WCRed()->order_needs_preauth( $order_id ) ) {
			$transaction_type = '1';
		} else {
			$transaction_type = '0';
		}
		$currency_codes       = WCRed()->get_currencies();
		$currency             = $currency_codes[ get_woocommerce_currency() ];
		$cof_ini              = 'N';
		$cof_type             = 'C';
		$cof_txnid            = WCRed()->get_txnid( $token_id );
		$secretsha256         = $this->get_redsys_sha256( $user_id );
		$url_ok               = add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) );
		$product_description  = WCRed()->product_description( $order, 'redsys' );
		$merchant_name        = $this->commercename;
		$type                 = 'ws';
		$redsys_adr           = $this->get_redsys_url_gateway_ws( $user_id, $type );
		$http_accept          = WCRed()->get_order_meta( $order_id, '_accept_headers', true );
		$ds_merchant_terminal = $this->terminal;
		$description          = WCRed()->product_description( $order, $order_id );
		$merchan_name2        = WCRed()->clean_data( WCRed()->get_order_meta( $order_id, '_billing_first_name', true ) );
		$merchant_lastnme     = WCRed()->clean_data( WCRed()->get_order_meta( $order_id, '_billing_last_name', true ) );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', '$order_total_sign: ' . $order_total_sign );
			WCRed()->log( 'insite', '$orderid2: ' . $orderid2 );
			WCRed()->log( 'insite', '$user_id: ' . $user_id );
			WCRed()->log( 'insite', '$transaction_type: ' . $transaction_type );
			WCRed()->log( 'insite', '$currency: ' . $currency );
			WCRed()->log( 'insite', '$cof_ini: ' . $cof_ini );
			WCRed()->log( 'insite', '$cof_type: ' . $cof_type );
			WCRed()->log( 'insite', '$cof_txnid: ' . $cof_txnid );
			WCRed()->log( 'insite', '$product_description: ' . $product_description );
			WCRed()->log( 'insite', '$secretsha256: ' . $secretsha256 );
			WCRed()->log( 'insite', '$url_ok: ' . $url_ok );
			WCRed()->log( 'insite', '$merchant_name: ' . $merchant_name );
			WCRed()->log( 'insite', '$type: ' . $type );
			WCRed()->log( 'insite', '$redsys_adr: ' . $redsys_adr );
			WCRed()->log( 'insite', '$ds_merchant_terminal: ' . $ds_merchant_terminal );
			WCRed()->log( 'insite', 'Amount for use TRA: ' . $this->traamount );
			WCRed()->log( 'insite', 'Amount to compare: ' . 100 * (int) $this->traamount );
			WCRed()->log( 'insite', '$description: ' . $description );
			WCRed()->log( 'insite', ' ' );
		}
		if ( $order_total_sign <= 3000 && 'yes' === $this->lwvactive ) {
			$lwv = '<DS_MERCHANT_EXCEP_SCA>LWV</DS_MERCHANT_EXCEP_SCA>';
			set_transient( $order_id . '_ds_merchant_excep_sca', 'LWV', 3600 );
		} else {
			$lwv = '';
		}
		if ( 'yes' === $this->traactive && $order_total_sign > 3000 && $order_total_sign <= ( 100 * (int) $this->traamount ) ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', 'Using TRA' );
				WCRed()->log( 'insite', ' ' );
			}
			$lwv = '<DS_MERCHANT_EXCEP_SCA>TRA</DS_MERCHANT_EXCEP_SCA>';
			set_transient( $order_id . '_ds_merchant_excep_sca', 'TRA', 3600 );
		}

		set_transient( $order_id . '_ds_merchant_cof_ini', $cof_ini, 3600 );
		set_transient( $order_id . '_ds_merchant_cof_type', $cof_type, 3600 );
		set_transient( $order_id . '_insite_token_redsys', $customer_token_c, 3600 );
		set_transient( $order_id . '_insite_token_txnid', $cof_txnid, 3600 );

		set_transient( $order_id . '_insite_merchant_amount', $order_total_sign, 3600 );
		set_transient( $order_id . '_insite_merchant_order', $orderid2, 3600 );
		set_transient( $order_id . '_insite_merchantcode', $customer, 3600 );
		set_transient( $order_id . '_insite_terminal', $ds_merchant_terminal, 3600 );
		set_transient( $order_id . '_insite_transaction_type', $transaction_type, 3600 );
		set_transient( $order_id . '_insite_currency', $currency, 3600 );

		$datos_entrada  = '<DATOSENTRADA>';
		$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
		$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
		$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
		$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $ds_merchant_terminal . '</DS_MERCHANT_TERMINAL>';
		$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
		$datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name2 ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
		$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
		$datos_entrada .= '<DS_MERCHANT_PRODUCTDESCRIPTION>' . WCRed()->clean_data( $description ) . '</DS_MERCHANT_PRODUCTDESCRIPTION>';
		$datos_entrada .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token_c . '</DS_MERCHANT_IDENTIFIER>';
		$datos_entrada .= '<DS_MERCHANT_COF_INI>' . $cof_ini . '</DS_MERCHANT_COF_INI>';
		$datos_entrada .= '<DS_MERCHANT_COF_TYPE>' . $cof_type . '</DS_MERCHANT_COF_TYPE>';
		$datos_entrada .= '<DS_MERCHANT_COF_TXNID>' . $cof_txnid . '</DS_MERCHANT_COF_TXNID>';
		$datos_entrada .= $lwv;
		$datos_entrada .= '<DS_MERCHANT_EMV3DS>{"threeDSInfo":"CardData"}</DS_MERCHANT_EMV3DS>';
		$datos_entrada .= '</DATOSENTRADA>';

		$xml  = '<REQUEST>';
		$xml .= $datos_entrada;
		$xml .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
		$xml .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
		$xml .= '</REQUEST>';

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$datos_entrada 1: ' . $datos_entrada );
			WCRed()->log( 'insite', '$xml IniciaPeticion 1: ' . $xml );
			WCRed()->log( 'insite', ' ' );
		}

		$cliente  = new SoapClient( $redsys_adr );
		$response = $cliente->iniciaPeticion( array( 'datoEntrada' => $xml ) );

		if ( isset( $response->iniciaPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$xml_retorno = new SimpleXMLElement( $response->iniciaPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$respuesta   = json_decode( $xml_retorno->INFOTARJETA->Ds_EMV3DS ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		$protocol_version       = '';
		$ds_card_psd2           = '';
		$three_dsserver_transid = '';
		$three_ds_info          = '';
		$three_ds_method_url    = '';
		if ( isset( $respuesta->protocolVersion ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$protocol_version = (string) $respuesta->protocolVersion; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		if ( isset( $xml_retorno->INFOTARJETA->Ds_Card_PSD2 ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$ds_card_psd2 = trim( $xml_retorno->INFOTARJETA->Ds_Card_PSD2 ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		if ( isset( $respuesta->threeDSServerTransID ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$three_dsserver_transid = trim( $respuesta->threeDSServerTransID ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		if ( isset( $respuesta->threeDSInfo ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$three_ds_info = trim( $respuesta->threeDSInfo ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		if ( isset( $respuesta->threeDSMethodURL ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$three_ds_method_url = trim( $respuesta->threeDSMethodURL ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$xml_retorno 10 IniciaPeticion: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'insite', '$respuesta: ' . print_r( $respuesta, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'insite', 'protocolVersion: ' . $protocol_version );
			WCRed()->log( 'insite', 'threeDSServerTransID: ' . $three_dsserver_transid );
			WCRed()->log( 'insite', 'threeDSInfo: ' . $three_ds_info );
			WCRed()->log( 'insite', 'threeDSMethodURL: ' . $three_ds_method_url );
			WCRed()->log( 'insite', 'Ds_Card_PSD2: ' . $ds_card_psd2 );
			WCRed()->log( 'insite', ' ' );
		}

		if ( ( 'NO_3DS_v2' === $protocol_version || ( '1.0.2' === $protocol_version ) ) ) {
			// Es protocolo 1.0.2.
			$protocol_version = '1.0.2';
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Es Protocolo NO_3DS_v2 (1.0.2) y PSD2' );
			}
			if ( 'yes' === $this->not_use_https ) {
				$final_notify_url = $this->notify_url_not_https;
			} else {
				$final_notify_url = $this->notify_url;
			}
			$browser_ip    = WCRed()->get_the_ip();
			$datos_usuario = array(
				'threeDSInfo'         => 'AuthenticationData',
				'protocolVersion'     => $protocol_version,
				'browserAcceptHeader' => $http_accept,
				'browserColorDepth'   => WCPSD2()->get_profundidad_color( $order_id ),
				'browserIP'           => $browser_ip,
				'browserJavaEnabled'  => WCPSD2()->get_browserjavaenabled( $order_id ),
				'browserLanguage'     => WCPSD2()->get_idioma_navegador( $order_id ),
				'browserScreenHeight' => WCPSD2()->get_altura_pantalla( $order_id ),
				'browserScreenWidth'  => WCPSD2()->get_anchura_pantalla( $order_id ),
				'browserTZ'           => WCPSD2()->get_tz_horaria( $order_id ),
				'browserUserAgent'    => WCPSD2()->get_agente_navegador( $order_id ),
				'notificationURL'     => $final_notify_url,
			);
			$needed        = wp_json_encode(
				array(
					'threeDSInfo'         => 'AuthenticationData',
					'protocolVersion'     => $protocol_version,
					'browserAcceptHeader' => $http_accept,
					'browserUserAgent'    => WCPSD2()->get_agente_navegador( $order_id ),
				)
			);
			$acctinfo      = WCPSD2()->get_acctinfo( $order, $datos_usuario );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$acctinfo: ' . $acctinfo );
			}
			if ( $order_total_sign <= 3000 && 'yes' === $this->lwvactive ) {
				$lwv = '<DS_MERCHANT_EXCEP_SCA>LWV</DS_MERCHANT_EXCEP_SCA>';
			} else {
				$lwv = '';
			}
			if ( 'yes' === $this->traactive && $order_total_sign <= ( 100 * (int) $this->traamount ) && $order_total_sign > 3000 ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', 'Using TRA' );
					WCRed()->log( 'insite', ' ' );
				}
				$lwv = '<DS_MERCHANT_EXCEP_SCA>TRA</DS_MERCHANT_EXCEP_SCA>';
			}
			$datos_entrada  = '<DATOSENTRADA>';
			$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
			$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
			$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
			$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $ds_merchant_terminal . '</DS_MERCHANT_TERMINAL>';
			$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
			$datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name2 ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
			$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
			$datos_entrada .= '<DS_MERCHANT_PRODUCTDESCRIPTION>' . WCRed()->clean_data( $description ) . '</DS_MERCHANT_PRODUCTDESCRIPTION>';
			$datos_entrada .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token_c . '</DS_MERCHANT_IDENTIFIER>';
			$datos_entrada .= '<DS_MERCHANT_COF_INI>' . $cof_ini . '</DS_MERCHANT_COF_INI>';
			$datos_entrada .= '<DS_MERCHANT_COF_TYPE>' . $cof_type . '</DS_MERCHANT_COF_TYPE>';
			$datos_entrada .= '<DS_MERCHANT_COF_TXNID>' . $cof_txnid . '</DS_MERCHANT_COF_TXNID>';
			$datos_entrada .= $lwv;
			$datos_entrada .= '<DS_MERCHANT_EMV3DS>' . $needed . '</DS_MERCHANT_EMV3DS>';
			$datos_entrada .= '</DATOSENTRADA>';

			$xml  = '<REQUEST>';
			$xml .= $datos_entrada;
			$xml .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
			$xml .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
			$xml .= '</REQUEST>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$datos_entrada 3: ' . $datos_entrada );
				WCRed()->log( 'insite', 'trataPeticion 8: ' . $xml );
				WCRed()->log( 'insite', ' ' );
			}

			$cliente  = new SoapClient( $redsys_adr );
			$response = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

			if ( isset( $response->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$xml_retorno       = new SimpleXMLElement( $response->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$codigo            = trim( $xml_retorno->CODIGO ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$respuestaeds      = json_decode( $xml_retorno->OPERACION->Ds_EMV3DS ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$three_ds_info     = trim( $respuestaeds->threeDSInfo ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$protocol_version  = trim( $respuestaeds->protocolVersion ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$acs_url           = trim( $respuestaeds->acsURL ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$par_eq            = trim( $respuestaeds->{ 'PAReq'} );
				$md                = trim( $respuestaeds->MD ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$authorisationcode = trim( $xml_retorno->OPERACION->Ds_AuthorisationCode ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

			}
			if ( 'yes' === $this->debug && ! $authorisationcode ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$response: ' . print_r( $response, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', '$xml_retorno 11: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', '$codigo: ' . $codigo );
				WCRed()->log( 'insite', '$respuesta: ' . print_r( $respuestaeds, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', 'protocolVersion: ' . $protocol_version );
				if ( ! empty( $respuestaeds->threeDSServerTransID ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					WCRed()->log( 'insite', 'threeDSServerTransID: ' . $respuestaeds->threeDSServerTransID ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				}
				WCRed()->log( 'insite', 'threeDSInfo: ' . $three_ds_info );
				if ( ! empty( $respuestaeds->threeDSMethodURL ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					WCRed()->log( 'insite', 'threeDSMethodURL: ' . $respuestaeds->threeDSMethodURL ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				}
				WCRed()->log( 'insite', 'Ds_Card_PSD2: ' . $ds_card_psd2 );
				WCRed()->log( 'insite', '$three_ds_info: ' . $three_ds_info );
				WCRed()->log( 'insite', '$protocol_version: ' . $protocol_version );
				WCRed()->log( 'insite', '$acs_url: ' . $acs_url );
				WCRed()->log( 'insite', '$par_eq: ' . $par_eq );
				WCRed()->log( 'insite', '$md: ' . $md );
				WCRed()->log( 'insite', ' ' );
			}

			if ( 'ChallengeRequest' === $three_ds_info ) {
				// hay challenge.
				// Guardamos todo en transciends.
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '/***************/' );
					WCRed()->log( 'insite', '     1.0.2' );
					WCRed()->log( 'insite', '  Hay Challenge  ' );
					WCRed()->log( 'insite', '/***************/' );
				}
				set_transient( 'threeDSInfo_' . $order_id, $three_ds_info, 300 );
				set_transient( 'protocolVersion_' . $order_id, $protocol_version, 300 );
				set_transient( 'acsURL_' . $order_id, $acs_url, 300 );
				set_transient( 'PAReq_' . $order_id, $par_eq, 300 );
				set_transient( 'MD_' . $order_id, $md, 300 );
				set_transient( $md, $order_id, 300 );
				set_transient( 'amount_' . $md, $order_total_sign, 300 );
				set_transient( 'order_' . $md, $orderid2, 300 );
				set_transient( 'merchantcode_' . $md, $customer, 300 );
				set_transient( 'terminal_' . $md, $ds_merchant_terminal, 300 );
				set_transient( 'currency_' . $md, $currency, 300 );
				set_transient( 'identifier_' . $md, $customer_token_c, 300 );
				set_transient( 'cof_ini_' . $md, $cof_ini, 300 );
				set_transient( 'cof_type_' . $md, $cof_type, 300 );
				set_transient( 'cof_txnid_' . $md, $cof_txnid, 300 );
				return 'ChallengeRequest';
			} elseif ( ! empty( $authorisationcode ) ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '/***************/' );
					WCRed()->log( 'insite', '  Paid  ' );
					WCRed()->log( 'insite', '/***************/' );
				}
				$ds_order         = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$ds_merchant_code = (string) $xml_retorno->OPERACION->Ds_MerchantCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$ds_terminal      = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$dsdate           = date( 'd/m/Y', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
				$dshour           = date( 'H:i', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
				WCRed()->update_order_meta( $order->get_id(), '_redsys_done', 'yes' );
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'payment_complete() 7' );
				}
				if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
					if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
						sumo_save_subscription_payment_info(
							$order->get_id(),
							array(
								'payment_type'         => 'auto',
								'payment_method'       => 'insite',
								'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
								'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_order_amount' => $order->get_total(),
							)
						);
					}
				}
				$order->payment_complete();
				$needs_preauth = WCRed()->order_needs_preauth( $order->get_id() );
				if ( $needs_preauth ) {
					$order->update_status( 'redsys-pre', __( 'Preauthorized by Redsys', 'woocommerce-redsys' ) );
				}
				$order->add_order_note( __( 'HTTP Notification received - Payment completed', 'woocommerce-redsys' ) );
				$order->add_order_note( __( 'Authorization code: ', 'woocommerce-redsys' ) . $authorisationcode );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '      Saving Order Meta       ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}

				if ( ! empty( $ds_order ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $ds_order );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_payment_order_number_redsys saved: ' . $ds_order );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_payment_order_number_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $dsdate ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_date_redsys', $dsdate );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_payment_date_redsys saved: ' . $dsdate );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_payment_date_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $ds_terminal ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $ds_terminal );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_payment_terminal_redsys saved: ' . $ds_terminal );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_payment_terminal_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $dshour ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_hour_redsys', $dshour );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_payment_hour_redsys saved: ' . $dshour );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_payment_hour_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $authorisationcode ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisationcode );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_authorisation_code_redsys saved: ' . $authorisationcode );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_authorisation_code_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $currency ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_corruncy_code_redsys', $currency );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_corruncy_code_redsys saved: ' . $currency );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_corruncy_code_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				// This meta is essential for later use.
				if ( ! empty( $secretsha256 ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_redsys_secretsha256', $secretsha256 );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_redsys_secretsha256 saved: ' . $secretsha256 );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_redsys_secretsha256 NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				do_action( 'insite_post_payment_complete', $order->get_id() );
				return 'success';
			}
		} elseif ( ( ( '2.1.0' === $protocol_version ) || ( '2.2.0' === $protocol_version ) ) ) {
			// Es protocolo 2.1.0.
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Es Protocolo 2.1.0 y PSD2' );
			}

			$http_accept = WCPSD2()->get_accept_headers( $order_id );

			if ( 'yes' === $this->not_use_https ) {
				$final_notify_url = $this->notify_url_not_https;
			} else {
				$final_notify_url = $this->notify_url;
			}
			$browser_ip = WCRed()->get_the_ip();

			set_transient( 'threeDSInfo_' . $order_id, $three_ds_info, 300 );
			set_transient( 'accept_headers_' . $order_id, $http_accept, 300 );
			set_transient( 'protocolVersion_' . $order_id, $protocol_version, 300 );
			if ( ! empty( $acs_url ) ) {
				set_transient( 'acsURL_' . $order_id, $acs_url, 300 );
			}
			set_transient( 'threeDSServerTransID_' . $order_id, $three_dsserver_transid, 300 );
			set_transient( 'threeDSMethodURL_' . $order_id, $three_ds_method_url, 300 );
			set_transient( 'amount_' . $order_id, $order_total_sign, 300 );
			set_transient( 'order_' . $order_id, $orderid2, 300 );
			set_transient( 'terminal_' . $order_id, $ds_merchant_terminal, 300 );
			set_transient( 'currency_' . $order_id, $currency, 300 );
			set_transient( 'identifier_' . $order_id, $customer_token_c, 300 );
			set_transient( 'cof_ini_' . $order_id, $cof_ini, 300 );
			set_transient( 'cof_type_' . $order_id, $cof_type, 300 );
			set_transient( 'cof_txnid_' . $order_id, $cof_txnid, 300 );
			set_transient( 'final_notify_url_' . $order_id, $final_notify_url, 300 );
			set_transient( $three_dsserver_transid, $order_id, 300 );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$three_dsserver_transid: ' . $three_dsserver_transid );
				WCRed()->log( 'insite', '$final_notify_url: ' . $final_notify_url );
				WCRed()->log( 'insite', '$three_ds_method_url: ' . $three_ds_method_url );
			}

			if ( ! empty( $three_ds_method_url ) ) {
				if ( 'yes' === $this->debug && ! empty( $json_pre ) ) {
					WCRed()->log( 'insite', 'There is threeDSMethodURL, contnue with PSD2 Autentification' . $json_pre );
				}
				return 'threeDSMethodURL';
			}
			$data     = array();
			$data     = array(
				'threeDSServerTransID'         => $three_dsserver_transid,
				'threeDSMethodNotificationURL' => $final_notify_url,
			);
			$json_pre = wp_json_encode( $data );
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$json_pre: ' . $json_pre );
			}
			$json = base64_encode( $json_pre ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_encode
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$json: ' . $json );
			}

			$body    = array(
				'threeDSMethodData' => $json,
			);
			$options = array(
				'method'  => 'POST',
				'header'  => array(
					'Content-type' => 'application/x-www-form-urlencoded',
				),
				'body'    => $body,
				'timeout' => 45,
			);
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$body: ' . print_r( $body, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}
			$response      = wp_remote_post( $three_ds_method_url, $options );
			$response_code = wp_remote_retrieve_response_code( $response );
			$response_body = wp_remote_retrieve_body( $response );
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$response_body: ' . $response_body );
			}

			if ( strpos( $response_body, $final_notify_url ) !== false ) {
				$url = true;
			} else {
				$url = false;
			}
			if ( strpos( $response_body, $json ) !== false ) {
				$three_ds_method_datatest = true;
			} else {
				$three_ds_method_datatest = false;
			}
			if ( $url && $three_ds_method_datatest ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'URL y threeDSMethodData coinciden' );
				}
				$three_ds_comp_ind = 'Y';
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'URL y threeDSMethodData NO coinciden' );
				}
				$three_ds_comp_ind = 'N';
			}

			if ( '2.2.0' === $protocol_version ) {
				$datos_usuario = array(
					'threeDSInfo'              => 'AuthenticationData',
					'protocolVersion'          => $protocol_version,
					'browserAcceptHeader'      => $http_accept,
					'browserColorDepth'        => WCPSD2()->get_profundidad_color( $order_id ),
					'browserIP'                => $browser_ip,
					'browserJavascriptEnabled' => WCPSD2()->get_browserjavaenabled( $order_id ),
					'browserJavaEnabled'       => WCPSD2()->get_browserjavaenabled( $order_id ),
					'browserLanguage'          => WCPSD2()->get_idioma_navegador( $order_id ),
					'browserScreenHeight'      => WCPSD2()->get_altura_pantalla( $order_id ),
					'browserScreenWidth'       => WCPSD2()->get_anchura_pantalla( $order_id ),
					'browserTZ'                => WCPSD2()->get_tz_horaria( $order_id ),
					'browserUserAgent'         => WCPSD2()->get_agente_navegador( $order_id ),
					'threeDSServerTransID'     => $three_dsserver_transid,
					'notificationURL'          => $final_notify_url,
					'threeDSCompInd'           => $three_ds_comp_ind,
				);
			} else {
				$datos_usuario = array(
					'threeDSInfo'          => 'AuthenticationData',
					'protocolVersion'      => $protocol_version,
					'browserAcceptHeader'  => $http_accept,
					'browserColorDepth'    => WCPSD2()->get_profundidad_color( $order_id ),
					'browserIP'            => $browser_ip,
					'browserJavaEnabled'   => WCPSD2()->get_browserjavaenabled( $order_id ),
					'browserLanguage'      => WCPSD2()->get_idioma_navegador( $order_id ),
					'browserScreenHeight'  => WCPSD2()->get_altura_pantalla( $order_id ),
					'browserScreenWidth'   => WCPSD2()->get_anchura_pantalla( $order_id ),
					'browserTZ'            => WCPSD2()->get_tz_horaria( $order_id ),
					'browserUserAgent'     => WCPSD2()->get_agente_navegador( $order_id ),
					'threeDSServerTransID' => $three_dsserver_transid,
					'notificationURL'      => $final_notify_url,
					'threeDSCompInd'       => $three_ds_comp_ind,
				);
			}
			$acctinfo = WCPSD2()->get_acctinfo( $order, $datos_usuario, $user_id );
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$user_id: ' . $user_id );
				WCRed()->log( 'insite', '$order_id: ' . $order_id );
				WCRed()->log( 'insite', 'threeDSInfo: AuthenticationData' );
				WCRed()->log( 'insite', 'protocolVersion: ' . $protocol_version );
				WCRed()->log( 'insite', 'threeDSServerTransID: ' . $three_dsserver_transid );
				WCRed()->log( 'insite', 'notificationURL: ' . $final_notify_url );
				WCRed()->log( 'insite', 'threeDSCompInd: ' . $three_ds_comp_ind );
				WCRed()->log( 'insite', 'acctInfo: : ' . $acctinfo );
			}
			$order_total_sign     = get_transient( 'amount_' . $order_id );
			$orderid2             = get_transient( 'order_' . $order_id );
			$customer             = $this->customer;
			$ds_merchant_terminal = get_transient( 'terminal_' . $order_id );
			$currency             = get_transient( 'currency_' . $order_id );
			$customer_token_c     = get_transient( 'identifier_' . $order_id );
			$cof_ini              = get_transient( 'cof_ini_' . $order_id );
			$cof_type             = get_transient( 'cof_type_' . $order_id );
			$cof_txnid            = get_transient( 'cof_txnid_' . $order_id );

			if ( $order_total_sign <= 3000 && 'yes' === $this->lwvactive ) {
				$lwv = '<DS_MERCHANT_EXCEP_SCA>LWV</DS_MERCHANT_EXCEP_SCA>';
			} else {
				$lwv = '';
			}
			if ( 'yes' === $this->traactive && $order_total_sign <= ( 100 * (int) $this->traamount ) && $order_total_sign > 3000 ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', 'Using TRA' );
					WCRed()->log( 'insite', ' ' );
				}
				$lwv = '<DS_MERCHANT_EXCEP_SCA>TRA</DS_MERCHANT_EXCEP_SCA>';
			}
			$mi_obj = new WooRedsysAPIWS();

			if ( ! empty( $this->merchantgroup ) ) {
				$ds_merchant_group = '<DS_MERCHANT_GROUP>' . $this->merchantgroup . '</DS_MERCHANT_GROUP>';
			} else {
				$ds_merchant_group = '';
			}

			$secretsha256   = $this->get_redsys_sha256( $user_id );
			$datos_entrada  = '<DATOSENTRADA>';
			$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
			$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
			$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
			$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $ds_merchant_terminal . '</DS_MERCHANT_TERMINAL>';
			$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>0</DS_MERCHANT_TRANSACTIONTYPE>';
			$datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name2 ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
			$datos_entrada .= '<DS_MERCHANT_PRODUCTDESCRIPTION>' . WCRed()->clean_data( $description ) . '</DS_MERCHANT_PRODUCTDESCRIPTION>';
			$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
			$datos_entrada .= $ds_merchant_group;
			$datos_entrada .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token_c . '</DS_MERCHANT_IDENTIFIER>';
			$datos_entrada .= '<DS_MERCHANT_COF_INI>' . $cof_ini . '</DS_MERCHANT_COF_INI>';
			$datos_entrada .= '<DS_MERCHANT_COF_TYPE>' . $cof_type . '</DS_MERCHANT_COF_TYPE>';
			$datos_entrada .= '<DS_MERCHANT_COF_TXNID>' . $cof_txnid . '</DS_MERCHANT_COF_TXNID>';
			$datos_entrada .= $lwv;
			$datos_entrada .= '<DS_MERCHANT_EMV3DS>' . $acctinfo . '</DS_MERCHANT_EMV3DS>';
			$datos_entrada .= '</DATOSENTRADA>';
			$xml            = '<REQUEST>';
			$xml           .= $datos_entrada;
			$xml           .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
			$xml           .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
			$xml           .= '</REQUEST>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'trataPeticion 9: ' . $xml );
			}

			$cliente  = new SoapClient( $redsys_adr );
			$response = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

			if ( isset( $response->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$xml_retorno = new SimpleXMLElement( $response->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			}
			$ds_emv3ds         = $xml_retorno->OPERACION->Ds_EMV3DS; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$json_decode       = json_decode( $ds_emv3ds );
			$three_ds_info     = $json_decode->threeDSInfo; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$protocol_version  = $json_decode->protocolVersion; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$acs_url           = $json_decode->acsURL; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$par_eq            = trim( $json_decode->{ 'PAReq'} );
			$creq              = trim( $json_decode->{ 'creq'} );
			$md                = $json_decode->MD; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$authorisationcode = trim( $xml_retorno->OPERACION->Ds_AuthorisationCode ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$xml_retorno 12: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', 'Ds_EMV3DS: ' . $ds_emv3ds );
				WCRed()->log( 'insite', '$three_ds_info: ' . $three_ds_info );
				WCRed()->log( 'insite', ' ' );
			}

			if ( 'ChallengeRequest' === $three_ds_info ) {
				// hay challenge.
				// Guardamos todo en transciends.
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '/***************/' );
					WCRed()->log( 'insite', '  2.2.0 y 2.2.1' );
					WCRed()->log( 'insite', 'pay_with_token_c()' );
					WCRed()->log( 'insite', '  Hay Challenge  ' );
					WCRed()->log( 'insite', '/***************/' );
				}
				set_transient( 'threeDSInfo_' . $order_id, $three_ds_info, 300 );
				set_transient( 'protocolVersion_' . $order_id, $protocol_version, 300 );
				set_transient( 'acsURL_' . $order_id, $acs_url, 300 );
				set_transient( 'PAReq_' . $order_id, $par_eq, 300 );
				set_transient( 'MD_' . $order_id, $md, 300 );
				set_transient( $md, $order_id, 300 );
				set_transient( 'creq_' . $order_id, $creq, 300 );
				set_transient( 'amount_' . $md, $order_total_sign, 300 );
				set_transient( 'order_' . $md, $orderid2, 300 );
				set_transient( 'merchantcode_' . $md, $customer, 300 );
				set_transient( 'terminal_' . $md, $ds_merchant_terminal, 300 );
				set_transient( 'currency_' . $md, $currency, 300 );
				set_transient( 'identifier_' . $md, $customer_token_c, 300 );
				set_transient( 'cof_ini_' . $md, $cof_ini, 300 );
				set_transient( 'cof_type_' . $md, $cof_type, 300 );
				set_transient( 'cof_txnid_' . $md, $cof_txnid, 300 );
				return 'ChallengeRequest';
			} elseif ( ! empty( $authorisationcode ) ) {
				// Pago directo sin challenge.
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '/***************/' );
					WCRed()->log( 'insite', '  Paid  ' );
					WCRed()->log( 'insite', '/***************/' );
				}
				$ds_order         = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$ds_merchant_code = (string) $xml_retorno->OPERACION->Ds_MerchantCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$ds_terminal      = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$dsdate           = date( 'd/m/Y', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
				$dshour           = date( 'H:i', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date

				WCRed()->update_order_meta( $order->get_id(), '_redsys_done', 'yes' );
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'payment_complete() 8' );
				}
				if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
					if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
						sumo_save_subscription_payment_info(
							$order->get_id(),
							array(
								'payment_type'         => 'auto',
								'payment_method'       => 'insite',
								'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
								'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_order_amount' => $order->get_total(),
							)
						);
					}
				}
				$order->payment_complete();
				$needs_preauth = WCRed()->order_needs_preauth( $order->get_id() );
				if ( $needs_preauth ) {
					$order->update_status( 'redsys-pre', __( 'Preauthorized by Redsys', 'woocommerce-redsys' ) );
				}
				$order->add_order_note( __( 'HTTP Notification received - Payment completed', 'woocommerce-redsys' ) );
				$order->add_order_note( __( 'Authorization code: ', 'woocommerce-redsys' ) . $authorisationcode );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '      Saving Order Meta       ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}

				if ( ! empty( $ds_order ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $ds_order );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_payment_order_number_redsys saved: ' . $ds_order );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_payment_order_number_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $dsdate ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_date_redsys', $dsdate );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_payment_date_redsys saved: ' . $dsdate );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_payment_date_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $ds_terminal ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $ds_terminal );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_payment_terminal_redsys saved: ' . $ds_terminal );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_payment_terminal_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $dshour ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_hour_redsys', $dshour );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_payment_hour_redsys saved: ' . $dshour );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_payment_hour_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $authorisationcode ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisationcode );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_authorisation_code_redsys saved: ' . $authorisationcode );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_authorisation_code_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				if ( ! empty( $currency ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_corruncy_code_redsys', $currency );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_corruncy_code_redsys saved: ' . $currency );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_corruncy_code_redsys NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				// This meta is essential for later use.
				if ( ! empty( $secretsha256 ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_redsys_secretsha256', $secretsha256 );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '_redsys_secretsha256 saved: ' . $secretsha256 );
					}
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '_redsys_secretsha256 NOT SAVED!!!' );
					WCRed()->log( 'insite', ' ' );
				}
				do_action( 'insite_post_payment_complete', $order->get_id() );
				return 'success';
			}
		}
	}
	/**
	 * Check token insite from action checkout block.
	 *
	 * @param array $data Data.
	 */
	public function check_token_insite_from_action_checkout_block( $data = array() ) {

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/*************************************************/' );
			WCRed()->log( 'insite', '  Start check_token_insite_from_action_checkout()  ' );
			WCRed()->log( 'insite', '/*************************************************/' );
			WCRed()->log( 'insite', ' ' );
		}

		if (
			! isset( $data['token'] ) ||
			! isset( $data['order_id'] ) ||
			! isset( $data['order_total'] ) ||
			! isset( $data['user_id'] ) ||
			! isset( $data['userAgent'] ) ||
			! isset( $data['http_accept'] )
		) {
			wc_add_notice( __( 'Some Payments required fields are missing. Please, try again', 'woocommerce-redsys' ), 'error' );
			wp_exit();
		}

		$mi_obj = new WooRedsysAPIWS();

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/******************************/' );
			WCRed()->log( 'insite', '  Llega a la función de InSite  ' );
			WCRed()->log( 'insite', '/******************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', 'El token que hay que enviar a Redsys es:' . sanitize_text_field( $data['token'] ) );
			WCRed()->log( 'insite', 'El Order ID que hay que enviar a Redsys es:' . sanitize_text_field( $data['order_id'] ) );
			WCRed()->log( 'insite', 'El userAgent que hay que enviar a Redsys es:' . sanitize_text_field( $data['userAgent'] ) );
			WCRed()->log( 'insite', 'El language que hay que enviar a Redsys es:' . sanitize_text_field( $data['language'] ) );
			WCRed()->log( 'insite', 'El height que hay que enviar a Redsys es:' . sanitize_text_field( $data['height'] ) );
			WCRed()->log( 'insite', 'El width que hay que enviar a Redsys es:' . sanitize_text_field( $data['width'] ) );
			WCRed()->log( 'insite', 'El colorDepth que hay que enviar a Redsys es:' . sanitize_text_field( $data['colorDepth'] ) );
			WCRed()->log( 'insite', 'El Timezone que hay que enviar a Redsys es:' . sanitize_text_field( $data['Timezone'] ) );
			WCRed()->log( 'insite', 'Los HTTP Accept headers son:' . sanitize_text_field( $data['http_accept'] ) );
			WCRed()->log( 'insite', 'Necesita token:' . sanitize_text_field( $data['need_token'] ) );
			WCRed()->log( 'insite', 'Tipo de token:' . sanitize_text_field( $data['token_needed'] ) );
			WCRed()->log( 'insite', 'Save:' . sanitize_text_field( $data['saved'] ) );
		}

		$currency_codes    = WCRed()->get_currencies();
		$customer          = $this->customer;
		$terminal          = $this->terminal;
		$currency          = $currency_codes[ get_woocommerce_currency() ];
		$final_notify_url  = $this->notify_url;
		$redsys_token      = sanitize_text_field( $data['token'] );
		$order_id          = sanitize_text_field( $data['order_id'] );
		$amount            = sanitize_text_field( $data['order_total'] );
		$user_id           = sanitize_text_field( $data['user_id'] );
		$usr_agent         = sanitize_text_field( $data['userAgent'] );
		$http_accept       = sanitize_text_field( $data['http_accept'] );
		$save              = sanitize_text_field( $data['saved'] );
		$redsys_amount     = WCRed()->redsys_amount_format( $amount );
		$secretsha256      = $this->get_redsys_sha256( $user_id );
		$redsys_adr        = $this->get_redsys_url_gateway( $user_id );
		$redsys_adrws      = $this->get_redsys_url_gateway_ws( $user_id );
		$need_token        = sanitize_text_field( $data['need_token'] );
		$token_type_needed = sanitize_text_field( $data['token_needed'] );
		$merchant_module   = 'WooCommerce_Redsys_Gateway_' . REDSYS_VERSION . '_WooCommerce.com';
		$preauth           = sanitize_text_field( $data['preauth'] );
		$merchant_data     = false;
		$identifier        = false;
		$cof_ini           = false;
		$cof_type          = false;
		$lwv               = false;
		$tra               = false;
		if ( $preauth ) {
			$transaction_type = '1';
		} else {
			$transaction_type = '0';
		}

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$currency: ' . $currency );
		}

		if ( ( ( 'yes' === $this->pay1clic && ( 'yes' === $save ) ) || 'yes' === $need_token ) ) {
			if ( 'R' === $token_type_needed ) {
				$merchant_data = '<DS_MERCHANT_MERCHANTDATA>0</DS_MERCHANT_MERCHANTDATA>';
				$identifier    = '<DS_MERCHANT_IDENTIFIER>REQUIRED</DS_MERCHANT_IDENTIFIER>';
				$cof_ini       = '<DS_MERCHANT_COF_INI>S</DS_MERCHANT_COF_INI>';
				$cof_type      = '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
				set_transient( $order_id . '_ds_merchant_cof_ini', 'S', 3600 );
				set_transient( $order_id . '_ds_merchant_cof_type', 'R', 3600 );
			} else {
				$merchant_data = '<DS_MERCHANT_MERCHANTDATA>0</DS_MERCHANT_MERCHANTDATA>';
				$identifier    = '<DS_MERCHANT_IDENTIFIER>REQUIRED</DS_MERCHANT_IDENTIFIER>';
				$cof_ini       = '<DS_MERCHANT_COF_INI>S</DS_MERCHANT_COF_INI>';
				$cof_type      = '<DS_MERCHANT_COF_TYPE>C</DS_MERCHANT_COF_TYPE>';
				set_transient( $order_id . '_ds_merchant_cof_ini', 'S', 3600 );
				set_transient( $order_id . '_ds_merchant_cof_type', 'C', 3600 );
			}
		}

		if ( (int) $redsys_amount < 3000 && 'yes' === $this->lwvactive ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Apply SCA: LWV' );
			}
			$lwv = '<DS_MERCHANT_EXCEP_SCA>LWV</DS_MERCHANT_EXCEP_SCA>';
			$tra = false;
			set_transient( $order_id . '_ds_merchant_excep_sca', 'LWV', 3600 );
		} elseif ( $redsys_amount <= ( 100 * (int) $this->traamount ) && 'yes' === $this->traactive ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Apply SCA: TRA' );
			}
			$tra = '<DS_MERCHANT_EXCEP_SCA>TRA</DS_MERCHANT_EXCEP_SCA>';
			$lwv = false;
			set_transient( $order_id . '_ds_merchant_excep_sca', 'TRA', 3600 );

		} else {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Apply SCA: NO' );
			}
			$tra = false;
			$lwv = false;
		}

		$datos_entrada  = '<DATOSENTRADA>';
		$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $redsys_amount . '</DS_MERCHANT_AMOUNT>';
		$datos_entrada .= '<DS_MERCHANT_ORDER>' . $order_id . '</DS_MERCHANT_ORDER>';
		$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
		$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
		$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
		$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
		// phpcs:ignore Squiz.PHP.CommentedOutCode.Found
		// $datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
			$datos_entrada .= '<DS_MERCHANT_IDOPER>' . $redsys_token . '</DS_MERCHANT_IDOPER>';
		if ( $merchant_data ) {
			$datos_entrada .= $merchant_data;
		}
		if ( $identifier ) {
			$datos_entrada .= $identifier;
		}
		if ( $cof_ini ) {
			$datos_entrada .= $cof_ini;
		}
		if ( $cof_type ) {
			$datos_entrada .= $cof_type;
		}
		if ( $lwv ) {
			$datos_entrada .= $lwv;
		}
		if ( $tra ) {
			$datos_entrada .= $tra;
		}
		$datos_entrada .= '<DS_MERCHANT_EMV3DS>{"threeDSInfo":"CardData"}</DS_MERCHANT_EMV3DS>';
		$datos_entrada .= '</DATOSENTRADA>';

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '          The call  4          ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', $datos_entrada );
			WCRed()->log( 'insite', ' ' );
		}

		$xml  = '<REQUEST>';
		$xml .= $datos_entrada;
		$xml .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
		$xml .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
		$xml .= '</REQUEST>';

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '          The XML 13            ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', $xml );
			WCRed()->log( 'insite', ' ' );
		}

		$cliente  = new SoapClient( $redsys_adrws );
		$response = $cliente->iniciaPeticion( array( 'datoEntrada' => $xml ) );

		if ( isset( $response->iniciaPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$xml_retorno = new SimpleXMLElement( $response->iniciaPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$respuesta   = json_decode( $xml_retorno->INFOTARJETA->Ds_EMV3DS ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '          The XML 14             ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$XML: ' . ( isset( $xml ) ? $xml : 'Not Defined' ) );
			WCRed()->log( 'insite', '$xml_retorno 14 IniciaPeticion: ' . ( isset( $xml_retorno ) ? print_r( $xml_retorno, true ) : 'Not Defined' ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'insite', '$respuesta: ' . ( isset( $respuesta ) ? print_r( $respuesta, true ) : 'Not Defined' ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'insite', '$respuesta->protocolVersion: ' . ( isset( $respuesta->protocolVersion ) ? $respuesta->protocolVersion : 'Not Defined' ) ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			WCRed()->log( 'insite', '$respuesta->threeDSServerTransID: ' . ( isset( $respuesta->threeDSServerTransID ) ? $respuesta->threeDSServerTransID : 'Not Defined' ) ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			WCRed()->log( 'insite', '$respuesta->threeDSInfo: ' . ( isset( $respuesta->threeDSInfo ) ? $respuesta->threeDSInfo : 'Not Defined' ) ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			WCRed()->log( 'insite', '$respuesta->threeDSMethodURL: ' . ( isset( $respuesta->threeDSMethodURL ) ? $respuesta->threeDSMethodURL : 'Not Defined' ) ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			WCRed()->log( 'insite', ' ' );
		}
		if ( ! empty( $respuesta->protocolVersion ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			set_transient( $order_id . '_insite_protocolversion', trim( $respuesta->protocolVersion ), 46000 ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		if ( ! empty( $respuesta->threeDSServerTransID ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			set_transient( $order_id . '_insite_threeDSServerTransID', trim( $respuesta->threeDSServerTransID ), 46000 ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		if ( ! empty( $respuesta->threeDSInfo ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			set_transient( $order_id . '_insite_threeDSInfo', trim( $respuesta->threeDSInfo ), 46000 ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		if ( ! empty( $respuesta->threeDSMethodURL ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			set_transient( $order_id . '_insite_threeDSMethodURL', trim( $respuesta->threeDSMethodURL ), 46000 ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		if ( isset( $xml_retorno->INFOTARJETA->Ds_Card_PSD2 ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			set_transient( $order_id . '_insite_ds_card_psd2', trim( $xml_retorno->INFOTARJETA->Ds_Card_PSD2 ), 46000 ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}

		set_transient( $order_id . '_insite_token', $redsys_token, 46000 );
		set_transient( $order_id . '_insite_user_id', $user_id, 46000 );
		set_transient( $order_id . '_insite_token_need', $token_type_needed, 46000 );

		if ( 0 === (int) $redsys_amount ) {
			set_transient( $order_id . '_insite_needs_payment', 'yes', 46000 );
		}

		if ( ( 'yes' === $this->pay1clic || 'yes' === $save ) || 'yes' === $need_token ) {
			if ( 'R' === $token_type_needed ) {
				set_transient( $order_id . '_insite_Ds_Merchant_MerchantData', '0', 46000 );
				set_transient( $order_id . '_insite_Ds_MERCHANT_IDENTIFIER', 'REQUIRED', 46000 );
				set_transient( $order_id . '_insite_DS_MERCHANT_COF_INI', 'S', 46000 );
				set_transient( $order_id . '_insite_DS_MERCHANT_COF_TYPE', 'R', 46000 );
				set_transient( $order_id . '_ds_merchant_cof_ini', 'S', 3600 );
			} else {
				set_transient( $order_id . '_insite_Ds_Merchant_MerchantData', '0', 3600 );
				set_transient( $order_id . '_insite_Ds_MERCHANT_IDENTIFIER', 'REQUIRED', 3600 );
				set_transient( $order_id . '_insite_DS_MERCHANT_COF_INI', 'S', 3600 );
				set_transient( $order_id . '_insite_DS_MERCHANT_COF_TYPE', 'C', 3600 );
				set_transient( $order_id . '_ds_merchant_cof_ini', 'S', 3600 );
			}
		}

		if ( (int) $redsys_amount < 3000 && 'yes' === $this->lwvactive ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Apply SCA: LWV' );
			}
			set_transient( $order_id . '_insite_DS_MERCHANT_EXCEP_SCA', 'LWV', 3600 );
		} elseif ( $redsys_amount <= ( 100 * (int) $this->traamount ) && 'yes' === $this->traactive ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Apply SCA: TRA' );
			}
			set_transient( $order_id . '_insite_DS_MERCHANT_EXCEP_SCA', 'TRA', 3600 );
		} elseif ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', 'Apply SCA: NO' );
		}

		set_transient( $order_id . '_insite_user_id', $user_id, 3600 );
		set_transient( $order_id . '_insite_customer', $customer, 3600 );
		set_transient( $order_id . '_insite_terminal', $terminal, 3600 );
		set_transient( $order_id . '_insite_currency', $currency, 3600 );
		set_transient( $order_id . '_insite_transaction_type', $transaction_type, 3600 );
		set_transient( $order_id . '_insite_redsys_amount', $redsys_amount, 3600 );
		set_transient( $order_id . '_insite_redsys_token', $redsys_token, 3600 );
		set_transient( $order_id . '_insite_final_notify_url', $final_notify_url, 3600 );
		set_transient( $order_id . '_insite_redsys_adr', $redsys_adr, 3600 );
		set_transient( $order_id . '_insite_secretsha256', $secretsha256, 3600 );
		set_transient( $order_id . '_insite_save', $save, 3600 );

		if ( 'yes' === $this->debug ) {

			$insite_user_id                  = get_transient( $order_id . '_insite_user_id' );
			$insite_customer                 = get_transient( $order_id . '_insite_customer' );
			$insite_terminal                 = get_transient( $order_id . '_insite_terminal' );
			$insite_currency                 = get_transient( $order_id . '_insite_currency' );
			$insite_transaction_type         = get_transient( $order_id . '_insite_transaction_type' );
			$insite_redsys_amount            = get_transient( $order_id . '_insite_redsys_amount' );
			$insite_redsys_token             = get_transient( $order_id . '_insite_redsys_token' );
			$insite_final_notify_url         = get_transient( $order_id . '_insite_final_notify_url' );
			$insite_merchan_name             = get_transient( $order_id . '_insite_merchan_name' );
			$insite_merchant_lastnme         = get_transient( $order_id . '_insite_merchant_lastnme' );
			$insite_redsys_adr               = get_transient( $order_id . '_insite_redsys_adr' );
			$insite_secretsha256             = get_transient( $order_id . '_insite_secretsha256' );
			$insite_save                     = get_transient( $order_id . '_insite_save' );
			$insite_protocolversion          = get_transient( $order_id . '_insite_protocolversion' );
			$insite_three_ds_server_trans_id = get_transient( $order_id . '_insite_threeDSServerTransID' );
			$insite_three_ds_info            = get_transient( $order_id . '_insite_threeDSInfo' );
			$insite_three_ds_method_url      = get_transient( $order_id . '_insite_threeDSMethodURL' );
			$insite_ds_card_psd2             = get_transient( $order_id . '_insite_ds_card_psd2' );
			$insite_token                    = get_transient( $order_id . '_insite_token' );
			$insite_token_need               = get_transient( $order_id . '_insite_token_need' );
			$insite_needs_payment            = get_transient( $order_id . '_insite_needs_payment' );
			$insite_ds_merchant_merchantdata = get_transient( $order_id . '_insite_Ds_Merchant_MerchantData' );
			$insite_ds_merchant_identifier   = get_transient( $order_id . '_insite_Ds_MERCHANT_IDENTIFIER' );
			$insite_ds_merchant_cof_ini      = get_transient( $order_id . '_insite_DS_MERCHANT_COF_INI' );
			$insite_ds_merchant_cof_type     = get_transient( $order_id . '_insite_DS_MERCHANT_COF_TYPE' );
			$ds_merchant_cof_ini             = get_transient( $order_id . '_ds_merchant_cof_ini' );
			$insite_ds_merchant_excep_sca    = get_transient( $order_id . '_insite_DS_MERCHANT_EXCEP_SCA' );

			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$user_id: ' . $insite_user_id );
			WCRed()->log( 'insite', '$customer:' . $insite_customer );
			WCRed()->log( 'insite', '$terminal: ' . $insite_terminal );
			WCRed()->log( 'insite', '$currency: ' . $insite_currency );
			WCRed()->log( 'insite', '$transaction_type: ' . $insite_transaction_type );
			WCRed()->log( 'insite', '$redsys_amount: ' . $insite_redsys_amount );
			WCRed()->log( 'insite', '$redsys_order_id: ' . $order_id );
			WCRed()->log( 'insite', '$redsys_token: ' . $insite_redsys_token );
			WCRed()->log( 'insite', '$final_notify_url: ' . $insite_final_notify_url );
			WCRed()->log( 'insite', '$merchan_name: ' . $insite_merchan_name );
			WCRed()->log( 'insite', '$merchant_lastnme: ' . $insite_merchant_lastnme );
			WCRed()->log( 'insite', '$redsys_adr: ' . $insite_redsys_adr );
			WCRed()->log( 'insite', '$secretsha256: ' . $insite_secretsha256 );
			WCRed()->log( 'insite', '$save: ' . $insite_save );
			WCRed()->log( 'insite', '$insite_protocolversion: ' . $insite_protocolversion );
			WCRed()->log( 'insite', '$insite_three_ds_server_trans_id: ' . $insite_three_ds_server_trans_id );
			WCRed()->log( 'insite', '$insite_three_ds_info: ' . $insite_three_ds_info );
			WCRed()->log( 'insite', '$insite_three_ds_method_url: ' . $insite_three_ds_method_url );
			WCRed()->log( 'insite', '$insite_ds_card_psd2: ' . $insite_ds_card_psd2 );
			WCRed()->log( 'insite', '$insite_token: ' . $insite_token );
			WCRed()->log( 'insite', '$insite_user_id: ' . $insite_user_id );
			WCRed()->log( 'insite', '$insite_token_need: ' . $insite_token_need );
			WCRed()->log( 'insite', '$insite_needs_payment: ' . $insite_needs_payment );
			WCRed()->log( 'insite', '$insite_ds_merchant_merchantdata: ' . $insite_ds_merchant_merchantdata );
			WCRed()->log( 'insite', '$insite_ds_merchant_identifier: ' . $insite_ds_merchant_identifier );
			WCRed()->log( 'insite', '$insite_ds_merchant_cof_ini: ' . $insite_ds_merchant_cof_ini );
			WCRed()->log( 'insite', '$insite_ds_merchant_cof_type: ' . $insite_ds_merchant_cof_type );
			WCRed()->log( 'insite', '$ds_merchant_cof_ini: ' . $ds_merchant_cof_ini );
			WCRed()->log( 'insite', '$insite_ds_merchant_excep_sca: ' . $insite_ds_merchant_excep_sca );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/*************************************************/' );
			WCRed()->log( 'insite', '  END check_token_insite_from_action_checkout()  ' );
			WCRed()->log( 'insite', '/*************************************************/' );
			WCRed()->log( 'insite', ' ' );
		}
		return true;
	}
	/**
	 * Process the payment Block and return the result
	 *
	 * @param int $order_id Order ID.
	 */
	public function process_payment_block( $order_id ) {
		global $woocommerce;

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', __( 'Next Step, Call. process_payment() Block', 'woocommerce-redsys' ) );
		}
		$order = WCRed()->get_order( $order_id );

		$token_needed = 'C';
		$need_token   = false;
		if ( WCRed()->order_contains_subscription( $order_id ) ) {
			$token_needed = 'R';
			$need_token   = 'yes';
			WCRed()->update_order_meta( $order_id, '_redsys_need_token', 'yes' );
			WCRed()->update_order_meta( $order_id, '_redsys_save_token', 'yes' );
		}

		$token           = WCRed()->get_order_meta( $order_id, '_insite_token', true );
		$order_total     = $order->get_total();
		$user_id         = $order->get_user_id();
		$user_gent       = WCRed()->get_order_meta( $order_id, '_billing_agente_navegador_field', true );
		$http_accept     = WCRed()->get_order_meta( $order_id, '_accept_headers', true );
		$language        = WCRed()->get_order_meta( $order_id, '_billing_idioma_navegador_field', true );
		$height          = WCRed()->get_order_meta( $order_id, '_billing_altura_pantalla_field', true );
		$width           = WCRed()->get_order_meta( $order_id, '_billing_anchura_pantalla_field', true );
		$color_depth     = WCRed()->get_order_meta( $order_id, '_billing_profundidad_color_field', true );
		$time_zone       = WCRed()->get_order_meta( $order_id, '_billing_tz_horaria_field', true );
		$saved           = WCRed()->get_order_meta( $order_id, '_redsys_save_token' );
		$preauth         = WCRed()->order_needs_preauth( $order_id );
		$redsys_order_id = WCRed()->get_order_meta( $order_id, '_payment_order_number_redsys', true );
		$need_token      = WCRed()->update_order_meta( $order_id, '_redsys_need_token', 'yes' );
		$save_token      = WCRed()->update_order_meta( $order_id, '_redsys_save_token', 'yes' );

		$data = array(
			'token'        => $token,
			'order_id'     => $redsys_order_id,
			'order_total'  => $order_total,
			'user_id'      => $user_id,
			'userAgent'    => $user_gent,
			'http_accept'  => $http_accept,
			'language'     => $language,
			'height'       => $height,
			'width'        => $width,
			'colorDepth'   => $color_depth,
			'Timezone'     => $time_zone,
			'need_token'   => $need_token,
			'token_needed' => $token_needed,
			'saved'        => $saved,
			'preauth'      => $preauth,
		);

		$result = $this->check_token_insite_from_action_checkout_block( $data );

		$ordermi        = WCRed()->get_order_meta( $order_id, '_payment_order_number_redsys', true );
		$rneeds_payment = get_transient( $ordermi . '_insite_needs_payment' );
		$secretsha256   = $this->get_redsys_sha256( $user_id );
		$redsys_adr     = $this->get_redsys_url_gateway( $user_id );
		$tokennum       = get_transient( $order_id . '_insite_use_token' );
		$insite_user_id = get_transient( $order_id . '_insite_user_id' );
		if ( $user_id !== $insite_user_id && 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', 'El usuario ha cambiado' );
			WCRed()->log( 'insite', ' ' );
		}
		$insite_customer                 = get_transient( $ordermi . '_insite_customer' );
		$insite_terminal                 = get_transient( $ordermi . '_insite_terminal' );
		$insite_currency                 = get_transient( $ordermi . '_insite_currency' );
		$insite_transaction_type         = get_transient( $ordermi . '_insite_transaction_type' );
		$insite_redsys_amount            = get_transient( $ordermi . '_insite_redsys_amount' );
		$insite_redsys_token             = get_transient( $ordermi . '_insite_redsys_token' );
		$insite_final_notify_url         = get_transient( $ordermi . '_insite_final_notify_url' );
		$insite_merchan_name             = get_transient( $ordermi . '_insite_merchan_name' );
		$insite_merchant_lastnme         = get_transient( $ordermi . '_insite_merchant_lastnme' );
		$insite_redsys_adr               = get_transient( $ordermi . '_insite_redsys_adr' );
		$insite_secretsha256             = get_transient( $ordermi . '_insite_secretsha256' );
		$insite_save                     = WCRed()->get_order_meta( $order_id, '_redsys_save_token', true );
		$insite_protocolversion          = get_transient( $ordermi . '_insite_protocolversion' );
		$insite_three_ds_server_trans_id = get_transient( $ordermi . '_insite_threeDSServerTransID' );
		$insite_three_ds_info            = get_transient( $ordermi . '_insite_threeDSInfo' );
		$insite_three_ds_method_url      = get_transient( $ordermi . '_insite_threeDSMethodURL' );
		$insite_ds_card_psd2             = get_transient( $ordermi . '_insite_ds_card_psd2' );
		$insite_token                    = get_transient( $ordermi . '_insite_token' );
		$insite_token_need               = get_transient( $ordermi . '_insite_token_need' );
		$insite_needs_payment            = get_transient( $ordermi . '_insite_needs_payment' );
		$insite_ds_merchant_merchantdata = get_transient( $ordermi . '_insite_Ds_Merchant_MerchantData' );
		$insite_ds_merchant_identifier   = get_transient( $ordermi . '_insite_Ds_MERCHANT_IDENTIFIER' );
		$insite_ds_merchant_cof_ini      = get_transient( $ordermi . '_insite_DS_MERCHANT_COF_INI' );
		$insite_ds_merchant_cof_type     = get_transient( $ordermi . '_insite_DS_MERCHANT_COF_TYPE' );
		$ds_merchant_cof_ini             = get_transient( $ordermi . '_ds_merchant_cof_ini' );
		$insite_ds_merchant_excep_sca    = get_transient( $ordermi . '_insite_DS_MERCHANT_EXCEP_SCA' );
		$http_accept                     = WCRed()->get_order_meta( $order_id, '_accept_headers', true );
		$redsys_adr_ws                   = $this->get_redsys_url_gateway_ws( $user_id );
		$description                     = WCRed()->product_description( $order, $order_id );
		$merchan_name                    = $order->get_billing_first_name();
		$merchant_lastnme                = $order->get_billing_last_name();
		if ( ! $tokennum ) {
			$tokennum = 'no';
			set_transient( $order_id . '_insite_use_token', 'no', 3600 );
		}
		WCRed()->update_order_meta( $order_id, '_redsys_secretsha256', $secretsha256 );
		set_transient( $order_id . '_insite_token_redsys', $tokennum, 3600 );
		set_transient( $order_id . '_insite_token', $insite_redsys_token, 3600 );
		set_transient( $order_id . '_ds_merchant_cof_ini', $insite_ds_merchant_cof_ini, 3600 );
		set_transient( $order_id . '_ds_merchant_cof_type', $insite_ds_merchant_cof_type, 3600 );
		set_transient( $order_id . '_ds_merchant_excep_sca', $insite_ds_merchant_excep_sca, 3600 );
		set_transient( $order_id . '_insite_merchant_amount', $insite_redsys_amount, 3600 );
		set_transient( $order_id . '_insite_merchant_order', $ordermi, 3600 );
		set_transient( $order_id . '_insite_merchantcode', $insite_customer, 3600 );
		set_transient( $order_id . '_insite_terminal', $insite_terminal, 3600 );
		set_transient( $order_id . '_insite_transaction_type', $insite_transaction_type, 3600 );
		set_transient( $order_id . '_insite_currency', $insite_currency, 3600 );
		set_transient( $ordermi . '_insite_redsys_number', $order_id, 3600 );
		set_transient( $order_id . '_insite_merchan_name', $merchan_name, 3600 );
		set_transient( $order_id . '_insite_merchant_lastnme', $merchant_lastnme, 3600 );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$ordermi: ' . $ordermi );
			WCRed()->log( 'insite', '$user_id: ' . $user_id );
			WCRed()->log( 'insite', '$rneeds_payment: ' . $rneeds_payment );
			WCRed()->log( 'insite', '$secretsha256: ' . $secretsha256 );
			WCRed()->log( 'insite', '$redsys_adr: ' . $redsys_adr );
			WCRed()->log( 'insite', '$tokennum: ' . $tokennum );
			WCRed()->log( 'insite', '$user_id: ' . $insite_user_id );
			WCRed()->log( 'insite', '$customer:' . $insite_customer );
			WCRed()->log( 'insite', '$terminal: ' . $insite_terminal );
			WCRed()->log( 'insite', '$currency: ' . $insite_currency );
			WCRed()->log( 'insite', '$transaction_type: ' . $insite_transaction_type );
			WCRed()->log( 'insite', '$redsys_amount: ' . $insite_redsys_amount );
			WCRed()->log( 'insite', '$redsys_order_id: ' . $order_id );
			WCRed()->log( 'insite', '$redsys_token: ' . $insite_redsys_token );
			WCRed()->log( 'insite', '$final_notify_url: ' . $insite_final_notify_url );
			WCRed()->log( 'insite', '$merchan_name: ' . $insite_merchan_name );
			WCRed()->log( 'insite', '$merchant_lastnme: ' . $insite_merchant_lastnme );
			WCRed()->log( 'insite', '$redsys_adr: ' . $insite_redsys_adr );
			WCRed()->log( 'insite', '$secretsha256: ' . $insite_secretsha256 );
			WCRed()->log( 'insite', '$save: ' . $insite_save );
			WCRed()->log( 'insite', '$insite_protocolversion: ' . $insite_protocolversion );
			WCRed()->log( 'insite', '$insite_three_ds_server_trans_id: ' . $insite_three_ds_server_trans_id );
			WCRed()->log( 'insite', '$insite_three_ds_info: ' . $insite_three_ds_info );
			WCRed()->log( 'insite', '$insite_three_ds_method_url: ' . $insite_three_ds_method_url );
			WCRed()->log( 'insite', '$insite_ds_card_psd2: ' . $insite_ds_card_psd2 );
			WCRed()->log( 'insite', '$insite_token: ' . $insite_token );
			WCRed()->log( 'insite', '$insite_user_id: ' . $insite_user_id );
			WCRed()->log( 'insite', '$insite_token_need: ' . $insite_token_need );
			WCRed()->log( 'insite', '$insite_needs_payment: ' . $insite_needs_payment );
			WCRed()->log( 'insite', '$insite_ds_merchant_merchantdata: ' . $insite_ds_merchant_merchantdata );
			WCRed()->log( 'insite', '$insite_ds_merchant_identifier: ' . $insite_ds_merchant_identifier );
			WCRed()->log( 'insite', '$insite_ds_merchant_cof_ini: ' . $insite_ds_merchant_cof_ini );
			WCRed()->log( 'insite', '$insite_ds_merchant_cof_type: ' . $insite_ds_merchant_cof_type );
			WCRed()->log( 'insite', '$ds_merchant_cof_ini: ' . $ds_merchant_cof_ini );
			WCRed()->log( 'insite', '$insite_ds_merchant_excep_sca: ' . $insite_ds_merchant_excep_sca );
		}

		if ( 'no' !== $tokennum ) { // Using Token.
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Using Token' );
			}
			if ( $order->get_total() > 0 ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Order bigger 0' );
				}
				$token_type = get_transient( $order_id . '_redsys_token_type' );
				if ( 'R' === $token_type ) {
					$use_token = WCRed()->maybe_use_token( $tokennum );
					if ( ! $use_token ) {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'redsys', 'Waiting 72h' );
						}
						$order->add_order_note( esc_html__( 'There was and error. Credit card blocked for 72h', 'woocommerce-redsys' ) );
						do_action( 'redsys_post_payment_error', $order->get_id(), $error );
						wc_add_notice( esc_html__( 'There was and error. Credit card blocked for 72h', 'woocommerce-redsys' ), 'error' );
						return;
					}
					$result = $this->pay_with_token_r( $order_id, $tokennum );
					if ( $result ) {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', 'Pago mediante token CORRECTO' );
						}
						return array(
							'result'   => 'success',
							'redirect' => add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ),
						);
					} else {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', 'Pago mediante token FALLIDO' );
						}
						wc_add_notice( 'We are having trouble charging the card, please try another one. ', 'error' );
					}
				} else {
					$result = $this->pay_with_token_c( $order_id, $tokennum );
					if ( 'success' === $result ) {
						return array(
							'result'   => 'success',
							'redirect' => add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ),
						);
					} elseif ( 'ChallengeRequest' === $result ) {
						return array(
							'result'   => 'success',
							'redirect' => $order->get_checkout_payment_url( true ) . '#3DSform',
						);
					} elseif ( 'threeDSMethodURL' === $result ) {
						return array(
							'result'   => 'success',
							'redirect' => $this->notify_url . '&threeDSMethodURL=true&order=' . $order_id,
						);
					}
				}
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Token dont Needed, 0 card' );
					WCRed()->log( 'insite', 'payment_complete() 8' );
				}
				if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
					if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
						sumo_save_subscription_payment_info(
							$order->get_id(),
							array(
								'payment_type'         => 'auto',
								'payment_method'       => 'insite',
								'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
								'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_order_amount' => $order->get_total(),
							)
						);
					}
				}
				$order->payment_complete();
				$needs_preauth = WCRed()->order_needs_preauth( $order->get_id() );
				if ( $needs_preauth ) {
					$order->update_status( 'redsys-pre', __( 'Preauthorized by Redsys', 'woocommerce-redsys' ) );
				}
				do_action( 'insite_post_payment_complete', $order->get_id() );
				return array(
					'result'   => 'success',
					'redirect' => add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ),
				);
			}
		} else {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'NOT Using Token' );
			}
			if ( WCRed()->order_needs_preauth( $order->get_id() ) ) {
				$transaction_type = '1';
			} else {
				$transaction_type = '0';
			}

			if ( '2.1.0' === $insite_protocolversion || '2.2.0' === $insite_protocolversion ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Protocol ' . $insite_protocolversion );
				}

				$http_accept = WCPSD2()->get_accept_headers( $order_id );
				$browser_ip  = WCRed()->get_the_ip();

				set_transient( 'threeDSInfo_' . $order_id, $insite_three_ds_info, 300 );
				set_transient( 'fuc_' . $order_id, $insite_customer, 300 );
				set_transient( 'accept_headers_' . $order_id, $http_accept, 300 );
				set_transient( 'protocolVersion_' . $order_id, $insite_protocolversion, 300 );
				set_transient( 'threeDSServerTransID_' . $order_id, $insite_three_ds_server_trans_id, 300 );
				set_transient( 'threeDSMethodURL_' . $order_id, $insite_three_ds_method_url, 300 );
				set_transient( 'amount_' . $order_id, $insite_redsys_amount, 300 );
				set_transient( 'order_' . $order_id, $ordermi, 300 );
				set_transient( 'terminal_' . $order_id, $insite_terminal, 300 );
				set_transient( 'currency_' . $order_id, $insite_currency, 300 );
				set_transient( 'identifier_' . $order_id, $insite_ds_merchant_identifier, 300 );
				set_transient( 'cof_ini_' . $order_id, $ds_merchant_cof_ini, 300 );
				set_transient( 'cof_type_' . $order_id, $insite_ds_merchant_cof_type, 300 );
				// phpcs:ignore Squiz.PHP.CommentedOutCode.Found,Squiz.Commenting.InlineComment.InvalidEndChar
				// set_transient( 'cof_txnid_' . $order_id, $cof_txnid, 300 );
				set_transient( 'final_notify_url_' . $order_id, $insite_final_notify_url, 300 );
				set_transient( 'redys_token' . $order_id, $insite_redsys_token, 300 );
				set_transient( $insite_three_ds_server_trans_id, $order_id, 300 );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$three_dsserver_transid: ' . $insite_three_ds_server_trans_id );
					WCRed()->log( 'insite', '$final_notify_url: ' . $insite_final_notify_url );
					WCRed()->log( 'insite', '$three_ds_method_url: ' . $insite_three_ds_method_url );
				}

				if ( $insite_three_ds_method_url ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'There is $three_ds_method_url: ' . $insite_three_ds_method_url );
					}
					return array(
						'result'   => 'success',
						'redirect' => $this->notify_url . '&threeDSMethodURL=true&order=' . $order_id,
					);
				}
				$three_ds_comp_ind = 'Y';

				$datos_usuario = array(
					'threeDSInfo'              => 'AuthenticationData',
					'protocolVersion'          => $insite_protocolversion,
					'browserAcceptHeader'      => $http_accept,
					'browserColorDepth'        => WCPSD2()->get_profundidad_color( $order_id ),
					'browserIP'                => $browser_ip,
					'browserJavascriptEnabled' => WCPSD2()->get_browserjavaenabled( $order_id ),
					'browserJavaEnabled'       => WCPSD2()->get_browserjavaenabled( $order_id ),
					'browserLanguage'          => WCPSD2()->get_idioma_navegador( $order_id ),
					'browserScreenHeight'      => WCPSD2()->get_altura_pantalla( $order_id ),
					'browserScreenWidth'       => WCPSD2()->get_anchura_pantalla( $order_id ),
					'browserTZ'                => WCPSD2()->get_tz_horaria( $order_id ),
					'browserUserAgent'         => WCPSD2()->get_agente_navegador( $order_id ),
					'threeDSServerTransID'     => $insite_three_ds_server_trans_id,
					'notificationURL'          => $insite_final_notify_url,
					'threeDSCompInd'           => $three_ds_comp_ind,
				);

				WCRed()->update_order_meta( $order_id, '_accept_headers', $http_accept );
				WCRed()->update_order_meta( $order_id, '_billing_profundidad_color_field', WCPSD2()->get_profundidad_color( $order_id ) );
				WCRed()->update_order_meta( $order_id, '_billing_idioma_navegador_field', WCPSD2()->get_idioma_navegador( $order_id ) );
				WCRed()->update_order_meta( $order_id, '_billing_altura_pantalla_field', WCPSD2()->get_altura_pantalla( $order_id ) );
				WCRed()->update_order_meta( $order_id, '_billing_anchura_pantalla_field', WCPSD2()->get_anchura_pantalla( $order_id ) );
				WCRed()->update_order_meta( $order_id, '_billing_tz_horaria_field', WCPSD2()->get_tz_horaria( $order_id ) );
				WCRed()->update_order_meta( $order_id, '_billing_js_enabled_navegador_field', WCPSD2()->get_browserjavaenabled( $order_id ) );
				WCRed()->update_order_meta( $order_id, '_payment_order_number_redsys', $ordermi );
				$order    = WCRed()->get_order( $order_id );
				$acctinfo = WCPSD2()->get_acctinfo( $order, $datos_usuario, $user_id );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$user_id: ' . $user_id );
					WCRed()->log( 'insite', '$order_id: ' . $order_id );
					WCRed()->log( 'insite', 'threeDSInfo: AuthenticationData' );
					WCRed()->log( 'insite', 'protocolVersion: ' . $insite_protocolversion );
					WCRed()->log( 'insite', 'threeDSServerTransID: ' . $insite_three_ds_server_trans_id );
					WCRed()->log( 'insite', 'notificationURL: ' . $insite_final_notify_url );
					WCRed()->log( 'insite', 'threeDSCompInd: ' . $three_ds_comp_ind );
					WCRed()->log( 'insite', 'acctInfo: : ' . $acctinfo );
				}

				if ( $insite_redsys_amount < 3000 && 'yes' === $this->lwvactive ) {
					$lwv = '<DS_MERCHANT_EXCEP_SCA>LWV</DS_MERCHANT_EXCEP_SCA>';
				} else {
					$lwv = '';
				}
				if ( 'yes' === $this->traactive && $insite_redsys_amount <= ( 100 * (int) $this->traamount ) && $insite_redsys_amount > 3000 ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', 'Using TRA' );
						WCRed()->log( 'insite', ' ' );
					}
					$lwv = '<DS_MERCHANT_EXCEP_SCA>TRA</DS_MERCHANT_EXCEP_SCA>';
				}
				$mi_obj = new WooRedsysAPIWS();

				if ( ! empty( $this->merchantgroup ) ) {
					$ds_merchant_group = '<DS_MERCHANT_GROUP>' . $this->merchantgroup . '</DS_MERCHANT_GROUP>';
				} else {
					$ds_merchant_group = '';
				}

				if ( $insite_ds_merchant_cof_ini && 'yes' === $insite_save ) {
					$ini = '<DS_MERCHANT_IDENTIFIER>REQUIRED</DS_MERCHANT_IDENTIFIER><DS_MERCHANT_COF_INI>' . $insite_ds_merchant_cof_ini . '</DS_MERCHANT_COF_INI>';
				} else {
					$ini = '';
				}
				if ( $insite_ds_merchant_cof_type && 'yes' === $insite_save ) {
					$cof = '<DS_MERCHANT_COF_TYPE>' . $insite_ds_merchant_cof_type . '</DS_MERCHANT_COF_TYPE>';
				} else {
					$cof = '';
				}
				$dsmerchanem3 = '<DS_MERCHANT_EMV3DS>' . $acctinfo . '</DS_MERCHANT_EMV3DS>';

				$datos_entrada  = '<DATOSENTRADA>';
				$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $insite_redsys_amount . '</DS_MERCHANT_AMOUNT>';
				$datos_entrada .= '<DS_MERCHANT_ORDER>' . $ordermi . '</DS_MERCHANT_ORDER>';
				$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $insite_customer . '</DS_MERCHANT_MERCHANTCODE>';
				$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $insite_terminal . '</DS_MERCHANT_TERMINAL>';
				$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
				$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $insite_currency . '</DS_MERCHANT_CURRENCY>';
				$datos_entrada .= '<DS_MERCHANT_IDOPER>' . $insite_redsys_token . '</DS_MERCHANT_IDOPER>';
				$datos_entrada .= '<DS_MERCHANT_PRODUCTDESCRIPTION>' . WCRed()->clean_data( $description ) . '</DS_MERCHANT_PRODUCTDESCRIPTION>';
				$datos_entrada .= $ds_merchant_group;
				$datos_entrada .= $ini;
				$datos_entrada .= $cof;
				$datos_entrada .= $lwv;
				$datos_entrada .= $dsmerchanem3;
				$datos_entrada .= '</DATOSENTRADA>';
				$xml            = '<REQUEST>';
				$xml           .= $datos_entrada;
				$xml           .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
				$xml           .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $insite_secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
				$xml           .= '</REQUEST>';

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'trataPeticion 10: ' . $xml );
				}

				$cliente  = new SoapClient( $redsys_adr_ws );
				$response = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

				if ( isset( $response->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$xml_retorno = new SimpleXMLElement( $response->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				}
				// Comprobar si las propiedades existen antes de asignarlas a las variables.
				$ds_emv3ds         = isset( $xml_retorno->OPERACION->Ds_EMV3DS ) ? $xml_retorno->OPERACION->Ds_EMV3DS : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$ds_response       = isset( $xml_retorno->OPERACION->Ds_Response ) ? $xml_retorno->OPERACION->Ds_Response : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$codigo            = isset( $xml_retorno->CODIGO ) ? $xml_retorno->CODIGO : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$authorisationcode = isset( $xml_retorno->OPERACION->Ds_AuthorisationCode ) ? trim( $xml_retorno->OPERACION->Ds_AuthorisationCode ) : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

				// Comprobar si $ds_emv3ds es un JSON válido antes de intentar decodificarlo.
				$json_decode = ! empty( $ds_emv3ds ) ? json_decode( $ds_emv3ds ) : null;

				if ( ! is_null( $json_decode ) ) {
					$three_ds_info    = isset( $json_decode->threeDSInfo ) ? $json_decode->threeDSInfo : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$protocol_version = isset( $json_decode->protocolVersion ) ? $json_decode->protocolVersion : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$acs_url          = isset( $json_decode->acsURL ) ? $json_decode->acsURL : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$par_eq           = isset( $json_decode->{'PAReq'} ) ? trim( $json_decode->{'PAReq'} ) : null;
					$creq             = isset( $json_decode->{'creq'} ) ? trim( $json_decode->{'creq'} ) : null;
					$md               = isset( $json_decode->MD ) ? $json_decode->MD : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$three_ds_info    = null;
					$protocol_version = null;
					$acs_url          = null;
					$par_eq           = null;
					$creq             = null;
					$md               = null;
				}

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '$xml_retorno 13: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
					WCRed()->log( 'insite', 'Ds_EMV3DS: ' . $ds_emv3ds );
					WCRed()->log( 'insite', '$protocol_version: ' . $protocol_version );
					WCRed()->log( 'insite', '$ds_response: ' . $ds_response );
					WCRed()->log( 'insite', '$codigo: ' . $codigo );
					WCRed()->log( 'insite', '$acs_url: ' . $acs_url );
					WCRed()->log( 'insite', '$par_eq: ' . $par_eq );
					WCRed()->log( 'insite', '$creq: ' . $creq );
					WCRed()->log( 'insite', '$md: ' . $md );
					WCRed()->log( 'insite', '$authorisationcode: ' . $authorisationcode );
					WCRed()->log( 'insite', ' ' );
				}

				if ( isset( $ds_response ) && '' !== $ds_response ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '$ds_response set: ' . $ds_response );
					}
					if ( $ds_response >= 99 ) {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '$ds_response set >= 99: ' . $ds_response );
						}
						$error = WCRed()->get_error( $ds_response );
						wc_add_notice( $error, 'error' );
						$order->add_order_note( 'Error: ' . $error );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', 'Error en la operación: ' . $error );
						}
						do_action( 'insite_post_payment_error', $order->get_id(), $error );
						return;
					}
				}
				if ( isset( $codigo ) && '' !== $codigo ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '$codigo set: ' . $codigo );
					}
					if ( 0 !== (int) $codigo ) {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '$codigo set different to 0: ' . $codigo );
						}
						$error = WCRed()->get_error( $codigo );
						wc_add_notice( $error, 'error' );
						$order->add_order_note( 'Error: ' . $error );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', 'Error en la operación: ' . $error );
						}
						do_action( 'insite_post_payment_error', $order->get_id(), $error );
						return;
					}
				}
				if ( 'ChallengeRequest' === $three_ds_info ) {
					// hay challenge.
					// Guardamos todo en transciends.
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '/***************/' );
						WCRed()->log( 'insite', '  2.2.0 y 2.2.1' );
						WCRed()->log( 'insite', 'process_paymnt()' );
						WCRed()->log( 'insite', '  Hay Challenge  ' );
						WCRed()->log( 'insite', '/***************/' );
					}
					// Guardar transients solo si los valores existen y no son null.

					if ( ! is_null( $three_ds_info ) ) {
						set_transient( 'threeDSInfo_' . $order_id, $three_ds_info, 300 );
					}

					if ( ! is_null( $protocol_version ) ) {
						set_transient( 'protocolVersion_' . $order_id, $protocol_version, 300 );
					}

					if ( ! is_null( $acs_url ) ) {
						set_transient( 'acsURL_' . $order_id, $acs_url, 300 );
					}

					if ( ! is_null( $par_eq ) ) {
						set_transient( 'PAReq_' . $order_id, $par_eq, 300 );
					}

					if ( ! is_null( $md ) ) {
						set_transient( 'MD_' . $order_id, $md, 300 );
						set_transient( $md, $order_id, 300 );

						if ( ! is_null( $order_total_sign ) ) {
							set_transient( 'amount_' . $md, $order_total_sign, 300 );
						}

						if ( ! is_null( $orderid2 ) ) {
							set_transient( 'order_' . $md, $orderid2, 300 );
						}

						if ( ! is_null( $customer ) ) {
							set_transient( 'merchantcode_' . $md, $customer, 300 );
						}

						if ( ! is_null( $ds_merchant_terminal ) ) {
							set_transient( 'terminal_' . $md, $ds_merchant_terminal, 300 );
						}

						if ( ! is_null( $insite_currency ) ) {
							set_transient( 'currency_' . $md, $insite_currency, 300 );
						}

						if ( ! is_null( $customer_token_c ) ) {
							set_transient( 'identifier_' . $md, $customer_token_c, 300 );
						}

						if ( ! is_null( $cof_ini ) ) {
							set_transient( 'cof_ini_' . $md, $cof_ini, 300 );
						}

						if ( ! is_null( $cof_type ) ) {
							set_transient( 'cof_type_' . $md, $cof_type, 300 );
						}

						if ( ! is_null( $cof_txnid ) ) {
							set_transient( 'cof_txnid_' . $md, $cof_txnid, 300 );
						}
					}

					if ( ! is_null( $creq ) ) {
						set_transient( 'creq_' . $order_id, $creq, 300 );
					}
					if ( '1.0.2' === $protocol_version ) {
						// Fall Back.
						$acsurl = $acs_url;
						$pareq  = $par_eq;
						$md     = $md;
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '$acsurl: ' . $acsurl );
							WCRed()->log( 'insite', '$pareq: ' . $pareq );
							WCRed()->log( 'insite', '$md: ' . $md );
						}
						set_transient( $order_id . '_insite_acsurl', $acsurl, 300 );
						set_transient( $order_id . '_insite_pareq', $pareq, 300 );
						set_transient( $order_id . '_insite_md', $md, 300 );
						set_transient( $order_id . '_do_redsys_challenge', 'yes', 300 );
						set_transient( 'amount_' . $md, $insite_redsys_amount, 300 );
						set_transient( 'order_' . $md, $ordermi, 300 );
						set_transient( 'merchantcode_' . $md, $insite_customer, 300 );
						set_transient( 'terminal_' . $md, $insite_terminal, 300 );
						set_transient( 'currency_' . $md, $insite_currency, 300 );
						set_transient( 'identifier_' . $md, $insite_ds_merchant_identifier, 300 );
						set_transient( 'cof_ini_' . $md, $ds_merchant_cof_ini, 300 );
						set_transient( 'cof_type_' . $md, $insite_ds_merchant_cof_type, 300 );
						set_transient( 'cof_txnid_' . $md, $cof_txnid, 300 );

						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', 'ChallengeRequest: TRUE' );
						}
						$order = new WC_Order( $order_id );
						return array(
							'result'   => 'success',
							'redirect' => $order->get_checkout_payment_url( true ),
						);
					}
					return array(
						'result'   => 'success',
						'redirect' => $order->get_checkout_payment_url( true ) . '#3DSform',
					);
				} elseif ( ! empty( $authorisationcode ) ) {
					// Pago directo sin challenge.
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '/***************/' );
						WCRed()->log( 'insite', '  Paid  ' );
						WCRed()->log( 'insite', '/***************/' );
					}
					$ds_order         = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$ds_merchant_code = (string) $xml_retorno->OPERACION->Ds_MerchantCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$ds_terminal      = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					WCRed()->update_order_meta( $order->get_id(), '_redsys_done', 'yes' );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'payment_complete() 9' );
					}
					if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
						if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
							sumo_save_subscription_payment_info(
								$order->get_id(),
								array(
									'payment_type'         => 'auto',
									'payment_method'       => 'insite',
									'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
									'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_order_amount' => $order->get_total(),
								)
							);
						}
					}
					$order->payment_complete();
					$needs_preauth = WCRed()->order_needs_preauth( $order->get_id() );
					if ( $needs_preauth ) {
						$order->update_status( 'redsys-pre', __( 'Preauthorized by Redsys', 'woocommerce-redsys' ) );
					}
					$order->add_order_note( __( 'HTTP Notification received - Payment completed', 'woocommerce-redsys' ) );
					$order->add_order_note( __( 'Authorization code: ', 'woocommerce-redsys' ) . $authorisationcode );

					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '      Saving Order Meta       ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}

					if ( ! empty( $ds_order ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $ds_order );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_order_number_redsys saved: ' . $ds_order );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_order_number_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $dsdate ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_date_redsys', $dsdate );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_date_redsys saved: ' . $dsdate );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_date_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $ds_terminal ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $ds_terminal );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_terminal_redsys saved: ' . $ds_terminal );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_terminal_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $dshour ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_hour_redsys', $dshour );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_hour_redsys saved: ' . $dshour );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_hour_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $authorisationcode ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisationcode );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_authorisation_code_redsys saved: ' . $authorisationcode );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_authorisation_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $currency ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_corruncy_code_redsys', $currency );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_corruncy_code_redsys saved: ' . $currency );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_corruncy_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					// This meta is essential for later use.
					if ( ! empty( $secretsha256 ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_redsys_secretsha256', $secretsha256 );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_redsys_secretsha256 saved: ' . $secretsha256 );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_redsys_secretsha256 NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					do_action( 'insite_post_payment_complete', $order->get_id() );
					return array(
						'result'   => 'success',
						'redirect' => add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ),
					);
				}
				exit();
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Protocol ' . $insite_protocolversion );
				}

				$protocol_version = '1.0.2';

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Es Protocolo NO_3DS_v2 (1.0.2) y PSD2' );
				}

				$browser_ip    = WCRed()->get_the_ip();
				$datos_usuario = array(
					'threeDSInfo'         => 'AuthenticationData',
					'protocolVersion'     => $protocol_version,
					'browserAcceptHeader' => $http_accept,
					'browserColorDepth'   => WCPSD2()->get_profundidad_color( $order_id ),
					'browserIP'           => $browser_ip,
					'browserJavaEnabled'  => WCPSD2()->get_browserjavaenabled( $order_id ),
					'browserLanguage'     => WCPSD2()->get_idioma_navegador( $order_id ),
					'browserScreenHeight' => WCPSD2()->get_altura_pantalla( $order_id ),
					'browserScreenWidth'  => WCPSD2()->get_anchura_pantalla( $order_id ),
					'browserTZ'           => WCPSD2()->get_tz_horaria( $order_id ),
					'browserUserAgent'    => WCPSD2()->get_agente_navegador( $order_id ),
					'notificationURL'     => $insite_final_notify_url,
				);
				$needed        = wp_json_encode(
					array(
						'threeDSInfo'         => 'AuthenticationData',
						'protocolVersion'     => $protocol_version,
						'browserAcceptHeader' => $http_accept,
						'browserUserAgent'    => WCPSD2()->get_agente_navegador( $order_id ),
					)
				);
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '3DS Info:' . $needed );
				}
				$mi_obj = '';
				$mi_obj = new WooRedsysAPI();
				$mi_obj->set_parameter( 'DS_MERCHANT_MODULE', $insite_customer );
				$mi_obj->set_parameter( 'DS_MERCHANT_MERCHANTCODE', $insite_customer );
				$mi_obj->set_parameter( 'DS_MERCHANT_TERMINAL', $insite_terminal );
				$mi_obj->set_parameter( 'DS_MERCHANT_CURRENCY', $insite_currency );
				$mi_obj->set_parameter( 'DS_MERCHANT_TRANSACTIONTYPE', $insite_transaction_type );
				$mi_obj->set_parameter( 'DS_MERCHANT_AMOUNT', $insite_redsys_amount );
				$mi_obj->set_parameter( 'DS_MERCHANT_ORDER', $ordermi );
				$mi_obj->set_parameter( 'DS_MERCHANT_IDOPER', $insite_redsys_token );
				$mi_obj->set_parameter( 'DS_MERCHANT_MERCHANTURL', $insite_final_notify_url );
				$mi_obj->set_parameter( 'DS_MERCHANT_TITULAR', WCRed()->clean_data( $insite_merchan_name ) . ' ' . WCRed()->clean_data( $insite_merchant_lastnme ) );
				$mi_obj->set_parameter( 'DS_MERCHANT_PRODUCTDESCRIPTION', WCRed()->clean_data( $description ) );

				if ( 'yes' === $this->pay1clic && ( 'yes' === $insite_save || 'yes' === $need_token ) ) {
					if ( 'R' === $token_type_needed ) {
						$mi_obj->set_parameter( 'Ds_Merchant_MerchantData', '0' );
						$mi_obj->set_parameter( 'DS_MERCHANT_IDENTIFIER', 'REQUIRED' );
						$mi_obj->set_parameter( 'DS_MERCHANT_COF_INI', 'N' );
						$mi_obj->set_parameter( 'DS_MERCHANT_COF_TYPE', 'R' );
						set_transient( $order_id . '_ds_merchant_cof_ini', 'R', 3600 );
					} else {
						$mi_obj->set_parameter( 'Ds_Merchant_MerchantData', '0' );
						$mi_obj->set_parameter( 'DS_MERCHANT_IDENTIFIER', 'REQUIRED' );
						$mi_obj->set_parameter( 'DS_MERCHANT_COF_INI', 'S' );
						$mi_obj->set_parameter( 'DS_MERCHANT_COF_TYPE', 'R' );
						set_transient( $order_id . '_ds_merchant_cof_ini', 'C', 3600 );
					}
				}

				if ( (int) $insite_redsys_amount < 3000 && 'yes' === $this->lwvactive ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'Apply SCA: LWV' );
					}
					$mi_obj->set_parameter( 'DS_MERCHANT_EXCEP_SCA', 'LWV' );
				} elseif ( $insite_redsys_amount <= ( 100 * (int) $this->traamount ) && 'yes' === $this->traactive ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'Apply SCA: TRA' );
					}
					$mi_obj->set_parameter( 'DS_MERCHANT_EXCEP_SCA', 'TRA' );
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Apply SCA: NO' );
				}
				$mi_obj->set_parameter( 'DS_MERCHANT_EMV3DS', $needed );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'DS_MERCHANT_EMV3DS: ' . $needed );
				}

				$version   = 'HMAC_SHA256_V1';
				$request   = '';
				$params    = $mi_obj->create_merchant_parameters();
				$signature = $mi_obj->create_merchant_signature( $insite_secretsha256 );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$version: ' . $version );
					WCRed()->log( 'insite', '$params: ' . $params );
					WCRed()->log( 'insite', '$signature: ' . $signature );

				}
				$response = wp_remote_post(
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

				$response_code = wp_remote_retrieve_response_code( $response );
				$response_body = wp_remote_retrieve_body( $response );
				$result        = json_decode( $response_body );

				if ( empty( $response ) ) {
					wc_add_notice( 'Try again', 'error' );
					$error = 'Error No response (Try again)';
					do_action( 'insite_post_payment_error', $order->get_id(), $error );
					return;
				}

				if ( ! empty( $result ) && $result->errorCode ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$response = WCRed()->get_response_by_code( $result->errorCode ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$error    = WCRed()->get_error_by_code( $result->errorCode ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					if ( ! empty( $response ) ) {
						wc_add_notice( $response, 'error' );
					}
					if ( ! empty( $error ) ) {
						wc_add_notice( $error, 'error' );
					}
					return;
				}

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$response_body: ' . $response_body );
					WCRed()->log( 'insite', 'Ds_SignatureVersion: ' . $result->Ds_SignatureVersion ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					WCRed()->log( 'insite', 'Ds_MerchantParameters: ' . $result->Ds_MerchantParameters ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					WCRed()->log( 'insite', 'Ds_Signature: ' . $result->Ds_Signature ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				}
				$decodec             = $mi_obj->decode_merchant_parameters( $result->Ds_MerchantParameters ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$response            = $mi_obj->get_parameter( 'Ds_Response' );
				$decodec_array       = json_decode( $decodec );
				$signature_calculada = $mi_obj->create_merchant_signature_notif( $secretsha256, $result->Ds_MerchantParameters ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$response: ' . $response );
					WCRed()->log( 'insite', '$decodec_array: ' . print_r( $decodec_array, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
					WCRed()->log( 'insite', '$signature_calculada: ' . $signature_calculada );
					WCRed()->log( 'insite', 'Ds_Signature: ' . $result->Ds_Signature ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					WCRed()->log( 'insite', 'print_r: ' . print_r( $result, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				}
				if ( isset( $decodec_array->Ds_AuthorisationCode ) && ! empty( $decodec_array->Ds_AuthorisationCode ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase,WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$autorization        = (string) $decodec_array->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$total               = (string) $decodec_array->Ds_Amount; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$ordermi             = (string) $decodec_array->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dscode              = (string) $decodec_array->Ds_MerchantCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$currency_code       = (string) $decodec_array->Ds_Currency; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$response            = (string) $decodec_array->Ds_Response; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$id_trans            = (string) $decodec_array->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dstermnal           = (string) $decodec_array->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dsmerchandata       = (string) $decodec_array->Ds_MerchantData; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dscardcountry       = (string) $decodec_array->Ds_Card_Country; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$descardbrand        = (string) $decodec_array->Ds_Card_Brand; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$desprocesspaymethod = (string) $decodec_array->Ds_ProcessedPayMethod; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dsdate              = date( 'd/m/Y', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
					$dshour              = date( 'H:i', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date

					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '$autorization: ' . $autorization );
						WCRed()->log( 'insite', '$total: ' . $total );
						WCRed()->log( 'insite', '$ordermi: ' . $ordermi );
						WCRed()->log( 'insite', '$dscode: ' . $dscode );
						WCRed()->log( 'insite', '$currency_code: ' . $currency_code );
						WCRed()->log( 'insite', '$response: ' . $response );
						WCRed()->log( 'insite', '$id_trans: ' . $id_trans );
						WCRed()->log( 'insite', '$dstermnal: ' . $dstermnal );
						WCRed()->log( 'insite', '$dsmerchandata: ' . $dsmerchandata );
						WCRed()->log( 'insite', '$dscardcountry: ' . $dscardcountry );
						WCRed()->log( 'insite', '$descardbrand: ' . $descardbrand );
						WCRed()->log( 'insite', '$desprocesspaymethod: ' . $desprocesspaymethod );
						WCRed()->log( 'insite', '$dsdate: ' . $dsdate );
						WCRed()->log( 'insite', '$dshour: ' . $dshour );
					}

					$authorisation_code = $id_trans;

					if ( ! empty( $ordermi ) ) {
						WCRed()->update_order_meta( $order_id, '_payment_order_number_redsys', $ordermi );
					}
					if ( ! empty( $dscode ) ) {
						WCRed()->update_order_meta( $order_id, '_payment_merchant_code_redsys', $dscode );
					}
					if ( ! empty( $dstermnal ) ) {
						WCRed()->update_order_meta( $order_id, '_payment_terminal_redsys', $dstermnal );
					}
					if ( ! empty( $dsdate ) ) {
						WCRed()->update_order_meta( $order_id, '_payment_date_redsys', $dsdate );
					}
					if ( ! empty( $dshour ) ) {
						WCRed()->update_order_meta( $order_id, '_payment_hour_redsys', $dshour );
					}
					if ( ! empty( $id_trans ) ) {
						WCRed()->update_order_meta( $order_id, '_authorisation_code_redsys', $authorisation_code );
					}
					if ( ! empty( $dscardcountry ) ) {
						WCRed()->update_order_meta( $order_id, '_card_country_insite', $dscardcountry );
					}
					if ( ! empty( $sha256 ) ) {
						WCRed()->update_order_meta( $order_id, '_order_sha256_insite', $sha256 );
					}
					$order = WCRed()->get_order( $order_id );
					// Payment completed.
					$order->add_order_note( __( 'HTTP Notification received - payment completed', 'woocommerce-redsys' ) );
					$order->add_order_note( __( 'Authorization code: ', 'woocommerce-redsys' ) . $authorisation_code );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'payment_complete() 10' );
					}
					if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
						if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
							sumo_save_subscription_payment_info(
								$order->get_id(),
								array(
									'payment_type'         => 'auto',
									'payment_method'       => 'insite',
									'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
									'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_order_amount' => $order->get_total(),
								)
							);
						}
					}
					$order->payment_complete();
					$needs_preauth = WCRed()->order_needs_preauth( $order->get_id() );
					if ( $needs_preauth ) {
						$order->update_status( 'redsys-pre', __( 'Preauthorized by Redsys', 'woocommerce-redsys' ) );
					}
					do_action( 'insite_post_payment_complete', $order->get_id() );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'Payment complete.' );
					}
					$order = new WC_Order( $order_id );
					return array(
						'result'   => 'success',
						'redirect' => add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ),
					);
				}

				if ( isset( $decodec_array->Ds_EMV3DS->acsURL ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

					if ( 'yes' === $rneeds_payment ) {
						WCRed()->update_order_meta( $order_id, '_redsystokenr', 'yes' );
					}

					$response = (int) $decodec_array->Ds_Response; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'La respuesta es $response: ' . $response );
					}
					$threedsinfo = $decodec_array->Ds_EMV3DS->threeDSInfo; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					if ( ! empty( $threedsinfo ) && 'ChallengeRequest' === $threedsinfo ) {
						if ( 'yes' === $this->debug ) {
							if ( ! empty( $redsys_insite ) ) {
								WCRed()->log( 'insite', '$redsys_insite->secure3ds: ' . $redsys_insite->secure3ds );
							}
							WCRed()->log( 'insite', 'La respuesta es $response: ' . $response );
						}
						$acsurl = $decodec_array->Ds_EMV3DS->acsURL; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
						$pareq  = trim( $decodec_array->Ds_EMV3DS->{ 'PAReq'} ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
						$md     = $decodec_array->Ds_EMV3DS->MD; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '$acsurl: ' . $acsurl );
							WCRed()->log( 'insite', '$pareq: ' . $pareq );
							WCRed()->log( 'insite', '$md: ' . $md );
						}
						set_transient( $order_id . '_insite_acsurl', $acsurl, 36000 );
						set_transient( $order_id . '_insite_pareq', $pareq, 36000 );
						set_transient( $order_id . '_insite_md', $md, 36000 );
						set_transient( $order_id . '_do_redsys_challenge', 'yes', 36000 );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', 'ChallengeRequest: TRUE' );
						}
						$order = new WC_Order( $order_id );
						return array(
							'result'   => 'success',
							'redirect' => $order->get_checkout_payment_url( true ),
						);
					}
				}

				$order = new WC_Order( $order_id );
				return array(
					'result'   => 'success',
					'redirect' => $order->get_checkout_payment_url( true ),
				);
			}
		}
	}
	/**
	 * Process the payment and return the result
	 *
	 * @param int $order_id Order ID.
	 */
	public function process_payment( $order_id ) {
		global $woocommerce;

		if ( isset( $_POST['wc-redsys-new-payment-method'] ) && 1 === (int) $_POST['wc-redsys-new-payment-method'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'wc-redsys-new-payment-method: yes' );
			}
			$need_token = WCRed()->update_order_meta( $order_id, '_redsys_need_token', 'yes' );
			$save_token = WCRed()->update_order_meta( $order_id, '_redsys_save_token', 'yes' );
		}

		if ( WCRed()->checkout_use_block() ) {
			return $this->process_payment_block( $order_id );
		}
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', '$_POST process_paymen(): ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
		}

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', __( 'Next Step, Call. process_payment()', 'woocommerce-redsys' ) );
		}
		$ordermi        = WCRed()->get_order_meta( $order_id, '_temp_redsys_order_number', true );
		$order          = WCRed()->get_order( $order_id );
		$user_id        = $order->get_user_id();
		$rneeds_payment = get_transient( $ordermi . '_insite_needs_payment' );
		$secretsha256   = $this->get_redsys_sha256( $user_id );
		$redsys_adr     = $this->get_redsys_url_gateway( $user_id );
		$tokennum       = get_transient( $order_id . '_insite_use_token' );
		$user_id        = $order->get_user_id();
		$insite_user_id = get_transient( $order_id . '_insite_user_id' );
		if ( $user_id !== $insite_user_id && 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', 'El usuario ha cambiado' );
			WCRed()->log( 'insite', ' ' );
			$insite_user_id = $user_id;
		}
		$insite_customer                 = get_transient( $ordermi . '_insite_customer' );
		$insite_terminal                 = get_transient( $ordermi . '_insite_terminal' );
		$insite_currency                 = get_transient( $ordermi . '_insite_currency' );
		$insite_transaction_type         = get_transient( $ordermi . '_insite_transaction_type' );
		$insite_redsys_amount            = get_transient( $ordermi . '_insite_redsys_amount' );
		$insite_redsys_token             = get_transient( $ordermi . '_insite_redsys_token' );
		$insite_final_notify_url         = get_transient( $ordermi . '_insite_final_notify_url' );
		$insite_merchan_name             = get_transient( $ordermi . '_insite_merchan_name' );
		$insite_merchant_lastnme         = get_transient( $ordermi . '_insite_merchant_lastnme' );
		$insite_redsys_adr               = get_transient( $ordermi . '_insite_redsys_adr' );
		$insite_secretsha256             = get_transient( $ordermi . '_insite_secretsha256' );
		$insite_save                     = WCRed()->get_order_meta( $order_id, '_redsys_save_token', true );
		$insite_protocolversion          = get_transient( $ordermi . '_insite_protocolversion' );
		$insite_three_ds_server_trans_id = get_transient( $ordermi . '_insite_threeDSServerTransID' );
		$insite_three_ds_info            = get_transient( $ordermi . '_insite_threeDSInfo' );
		$insite_three_ds_method_url      = get_transient( $ordermi . '_insite_threeDSMethodURL' );
		$insite_ds_card_psd2             = get_transient( $ordermi . '_insite_ds_card_psd2' );
		$insite_token                    = get_transient( $ordermi . '_insite_token' );
		$insite_token_need               = get_transient( $ordermi . '_insite_token_need' );
		$insite_needs_payment            = get_transient( $ordermi . '_insite_needs_payment' );
		$insite_ds_merchant_merchantdata = get_transient( $ordermi . '_insite_Ds_Merchant_MerchantData' );
		$insite_ds_merchant_identifier   = get_transient( $ordermi . '_insite_Ds_MERCHANT_IDENTIFIER' );
		$insite_ds_merchant_cof_ini      = get_transient( $ordermi . '_insite_DS_MERCHANT_COF_INI' );
		$insite_ds_merchant_cof_type     = get_transient( $ordermi . '_insite_DS_MERCHANT_COF_TYPE' );
		$ds_merchant_cof_ini             = get_transient( $ordermi . '_ds_merchant_cof_ini' );
		$insite_ds_merchant_excep_sca    = get_transient( $ordermi . '_insite_DS_MERCHANT_EXCEP_SCA' );
		$http_accept                     = WCRed()->get_order_meta( $order_id, '_accept_headers', true );
		$redsys_adr_ws                   = $this->get_redsys_url_gateway_ws( $user_id );
		$description                     = WCRed()->product_description( $order, $order_id );
		$merchan_name                    = $order->get_billing_first_name();
		$merchant_lastnme                = $order->get_billing_last_name();
		if ( ! $tokennum ) {
			$tokennum = 'no';
			set_transient( $order_id . '_insite_use_token', 'no', 3600 );
		}
		WCRed()->update_order_meta( $order_id, '_redsys_secretsha256', $secretsha256 );
		set_transient( $order_id . '_insite_token_redsys', $tokennum, 3600 );
		set_transient( $order_id . '_insite_token', $insite_redsys_token, 3600 );
		set_transient( $order_id . '_ds_merchant_cof_ini', $insite_ds_merchant_cof_ini, 3600 );
		set_transient( $order_id . '_ds_merchant_cof_type', $insite_ds_merchant_cof_type, 3600 );
		set_transient( $order_id . '_ds_merchant_excep_sca', $insite_ds_merchant_excep_sca, 3600 );
		set_transient( $order_id . '_insite_merchant_amount', $insite_redsys_amount, 3600 );
		set_transient( $order_id . '_insite_merchant_order', $ordermi, 3600 );
		set_transient( $order_id . '_insite_merchantcode', $insite_customer, 3600 );
		set_transient( $order_id . '_insite_terminal', $insite_terminal, 3600 );
		set_transient( $order_id . '_insite_transaction_type', $insite_transaction_type, 3600 );
		set_transient( $order_id . '_insite_currency', $insite_currency, 3600 );
		set_transient( $ordermi . '_insite_redsys_number', $order_id, 3600 );
		set_transient( $order_id . '_insite_merchan_name', $merchan_name, 3600 );
		set_transient( $order_id . '_insite_merchant_lastnme', $merchant_lastnme, 3600 );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$ordermi: ' . $ordermi );
			WCRed()->log( 'insite', '$user_id: ' . $user_id );
			WCRed()->log( 'insite', '$rneeds_payment: ' . $rneeds_payment );
			WCRed()->log( 'insite', '$secretsha256: ' . $secretsha256 );
			WCRed()->log( 'insite', '$redsys_adr: ' . $redsys_adr );
			WCRed()->log( 'insite', '$tokennum: ' . $tokennum );
			WCRed()->log( 'insite', '$user_id: ' . $insite_user_id );
			WCRed()->log( 'insite', '$customer:' . $insite_customer );
			WCRed()->log( 'insite', '$terminal: ' . $insite_terminal );
			WCRed()->log( 'insite', '$currency: ' . $insite_currency );
			WCRed()->log( 'insite', '$transaction_type: ' . $insite_transaction_type );
			WCRed()->log( 'insite', '$redsys_amount: ' . $insite_redsys_amount );
			WCRed()->log( 'insite', '$redsys_order_id: ' . $order_id );
			WCRed()->log( 'insite', '$redsys_token: ' . $insite_redsys_token );
			WCRed()->log( 'insite', '$final_notify_url: ' . $insite_final_notify_url );
			WCRed()->log( 'insite', '$merchan_name: ' . $insite_merchan_name );
			WCRed()->log( 'insite', '$merchant_lastnme: ' . $insite_merchant_lastnme );
			WCRed()->log( 'insite', '$redsys_adr: ' . $insite_redsys_adr );
			WCRed()->log( 'insite', '$secretsha256: ' . $insite_secretsha256 );
			WCRed()->log( 'insite', '$save: ' . $insite_save );
			WCRed()->log( 'insite', '$insite_protocolversion: ' . $insite_protocolversion );
			WCRed()->log( 'insite', '$insite_three_ds_server_trans_id: ' . $insite_three_ds_server_trans_id );
			WCRed()->log( 'insite', '$insite_three_ds_info: ' . $insite_three_ds_info );
			WCRed()->log( 'insite', '$insite_three_ds_method_url: ' . $insite_three_ds_method_url );
			WCRed()->log( 'insite', '$insite_ds_card_psd2: ' . $insite_ds_card_psd2 );
			WCRed()->log( 'insite', '$insite_token: ' . $insite_token );
			WCRed()->log( 'insite', '$insite_user_id: ' . $insite_user_id );
			WCRed()->log( 'insite', '$insite_token_need: ' . $insite_token_need );
			WCRed()->log( 'insite', '$insite_needs_payment: ' . $insite_needs_payment );
			WCRed()->log( 'insite', '$insite_ds_merchant_merchantdata: ' . $insite_ds_merchant_merchantdata );
			WCRed()->log( 'insite', '$insite_ds_merchant_identifier: ' . $insite_ds_merchant_identifier );
			WCRed()->log( 'insite', '$insite_ds_merchant_cof_ini: ' . $insite_ds_merchant_cof_ini );
			WCRed()->log( 'insite', '$insite_ds_merchant_cof_type: ' . $insite_ds_merchant_cof_type );
			WCRed()->log( 'insite', '$ds_merchant_cof_ini: ' . $ds_merchant_cof_ini );
			WCRed()->log( 'insite', '$insite_ds_merchant_excep_sca: ' . $insite_ds_merchant_excep_sca );
		}

		if ( 'no' !== $tokennum ) { // Using Token.
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Using Token' );
			}
			if ( $order->get_total() > 0 ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Order bigger 0' );
				}
				$token_type = get_transient( $order_id . '_redsys_token_type' );
				if ( 'R' === $token_type ) {
					$use_token = WCRed()->maybe_use_token( $tokennum );
					if ( ! $use_token ) {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'redsys', 'Waiting 72h' );
						}
						$order->add_order_note( esc_html__( 'There was and error. Credit card blocked for 72h', 'woocommerce-redsys' ) );
						do_action( 'redsys_post_payment_error', $order->get_id(), $error );
						wc_add_notice( esc_html__( 'There was and error. Credit card blocked for 72h', 'woocommerce-redsys' ), 'error' );
						return;
					}
					$result = $this->pay_with_token_r( $order_id, $tokennum );
					if ( $result ) {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', 'Pago mediante token CORRECTO' );
						}
						return array(
							'result'   => 'success',
							'redirect' => add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ),
						);
					} else {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', 'Pago mediante token FALLIDO' );
						}
						wc_add_notice( 'We are having trouble charging the card, please try another one. ', 'error' );
					}
				} else {
					$result = $this->pay_with_token_c( $order_id, $tokennum );
					if ( 'success' === $result ) {
						return array(
							'result'   => 'success',
							'redirect' => add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ),
						);
					} elseif ( 'ChallengeRequest' === $result ) {
						return array(
							'result'   => 'success',
							'redirect' => $order->get_checkout_payment_url( true ) . '#3DSform',
						);
					} elseif ( 'threeDSMethodURL' === $result ) {
						return array(
							'result'   => 'success',
							'redirect' => $this->notify_url . '&threeDSMethodURL=true&order=' . $order_id,
						);
					}
				}
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Token dont Needed, 0 card' );
					WCRed()->log( 'insite', 'payment_complete() 8' );
				}
				if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
					if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
						sumo_save_subscription_payment_info(
							$order->get_id(),
							array(
								'payment_type'         => 'auto',
								'payment_method'       => 'insite',
								'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
								'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_order_amount' => $order->get_total(),
							)
						);
					}
				}
				$order->payment_complete();
				$needs_preauth = WCRed()->order_needs_preauth( $order->get_id() );
				if ( $needs_preauth ) {
					$order->update_status( 'redsys-pre', __( 'Preauthorized by Redsys', 'woocommerce-redsys' ) );
				}
				do_action( 'insite_post_payment_complete', $order->get_id() );
				return array(
					'result'   => 'success',
					'redirect' => add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ),
				);
			}
		} else {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'NOT Using Token' );
			}
			if ( WCRed()->order_needs_preauth( $order->get_id() ) ) {
				$transaction_type = '1';
			} else {
				$transaction_type = '0';
			}

			if ( '2.1.0' === $insite_protocolversion || '2.2.0' === $insite_protocolversion ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Protocol ' . $insite_protocolversion );
				}

				$http_accept = WCPSD2()->get_accept_headers( $order_id );
				$browser_ip  = WCRed()->get_the_ip();

				set_transient( 'threeDSInfo_' . $order_id, $insite_three_ds_info, 300 );
				set_transient( 'fuc_' . $order_id, $insite_customer, 300 );
				set_transient( 'accept_headers_' . $order_id, $http_accept, 300 );
				set_transient( 'protocolVersion_' . $order_id, $insite_protocolversion, 300 );
				set_transient( 'threeDSServerTransID_' . $order_id, $insite_three_ds_server_trans_id, 300 );
				set_transient( 'threeDSMethodURL_' . $order_id, $insite_three_ds_method_url, 300 );
				set_transient( 'amount_' . $order_id, $insite_redsys_amount, 300 );
				set_transient( 'order_' . $order_id, $ordermi, 300 );
				set_transient( 'terminal_' . $order_id, $insite_terminal, 300 );
				set_transient( 'currency_' . $order_id, $insite_currency, 300 );
				set_transient( 'identifier_' . $order_id, $insite_ds_merchant_identifier, 300 );
				set_transient( 'cof_ini_' . $order_id, $ds_merchant_cof_ini, 300 );
				set_transient( 'cof_type_' . $order_id, $insite_ds_merchant_cof_type, 300 );
				// phpcs:ignore Squiz.PHP.CommentedOutCode.Found,Squiz.Commenting.InlineComment.InvalidEndChar
				// set_transient( 'cof_txnid_' . $order_id, $cof_txnid, 300 );
				set_transient( 'final_notify_url_' . $order_id, $insite_final_notify_url, 300 );
				set_transient( 'redys_token' . $order_id, $insite_redsys_token, 300 );
				set_transient( $insite_three_ds_server_trans_id, $order_id, 300 );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$three_dsserver_transid: ' . $insite_three_ds_server_trans_id );
					WCRed()->log( 'insite', '$final_notify_url: ' . $insite_final_notify_url );
					WCRed()->log( 'insite', '$three_ds_method_url: ' . $insite_three_ds_method_url );
				}

				if ( $insite_three_ds_method_url ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'There is $three_ds_method_url: ' . $insite_three_ds_method_url );
					}
					return array(
						'result'   => 'success',
						'redirect' => $this->notify_url . '&threeDSMethodURL=true&order=' . $order_id,
					);
				}
				$three_ds_comp_ind = 'Y';

				$datos_usuario = array(
					'threeDSInfo'              => 'AuthenticationData',
					'protocolVersion'          => $insite_protocolversion,
					'browserAcceptHeader'      => $http_accept,
					'browserColorDepth'        => WCPSD2()->get_profundidad_color( $order_id ),
					'browserIP'                => $browser_ip,
					'browserJavascriptEnabled' => WCPSD2()->get_browserjavaenabled( $order_id ),
					'browserJavaEnabled'       => WCPSD2()->get_browserjavaenabled( $order_id ),
					'browserLanguage'          => WCPSD2()->get_idioma_navegador( $order_id ),
					'browserScreenHeight'      => WCPSD2()->get_altura_pantalla( $order_id ),
					'browserScreenWidth'       => WCPSD2()->get_anchura_pantalla( $order_id ),
					'browserTZ'                => WCPSD2()->get_tz_horaria( $order_id ),
					'browserUserAgent'         => WCPSD2()->get_agente_navegador( $order_id ),
					'threeDSServerTransID'     => $insite_three_ds_server_trans_id,
					'notificationURL'          => $insite_final_notify_url,
					'threeDSCompInd'           => $three_ds_comp_ind,
				);

				WCRed()->update_order_meta( $order_id, '_accept_headers', $http_accept );
				WCRed()->update_order_meta( $order_id, '_billing_profundidad_color_field', WCPSD2()->get_profundidad_color( $order_id ) );
				WCRed()->update_order_meta( $order_id, '_billing_idioma_navegador_field', WCPSD2()->get_idioma_navegador( $order_id ) );
				WCRed()->update_order_meta( $order_id, '_billing_altura_pantalla_field', WCPSD2()->get_altura_pantalla( $order_id ) );
				WCRed()->update_order_meta( $order_id, '_billing_anchura_pantalla_field', WCPSD2()->get_anchura_pantalla( $order_id ) );
				WCRed()->update_order_meta( $order_id, '_billing_tz_horaria_field', WCPSD2()->get_tz_horaria( $order_id ) );
				WCRed()->update_order_meta( $order_id, '_billing_js_enabled_navegador_field', WCPSD2()->get_browserjavaenabled( $order_id ) );
				WCRed()->update_order_meta( $order_id, '_payment_order_number_redsys', $ordermi );
				$order    = WCRed()->get_order( $order_id );
				$acctinfo = WCPSD2()->get_acctinfo( $order, $datos_usuario, $user_id );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$user_id: ' . $user_id );
					WCRed()->log( 'insite', '$order_id: ' . $order_id );
					WCRed()->log( 'insite', 'threeDSInfo: AuthenticationData' );
					WCRed()->log( 'insite', 'protocolVersion: ' . $insite_protocolversion );
					WCRed()->log( 'insite', 'threeDSServerTransID: ' . $insite_three_ds_server_trans_id );
					WCRed()->log( 'insite', 'notificationURL: ' . $insite_final_notify_url );
					WCRed()->log( 'insite', 'threeDSCompInd: ' . $three_ds_comp_ind );
					WCRed()->log( 'insite', 'acctInfo: : ' . $acctinfo );
				}

				if ( $insite_redsys_amount < 3000 && 'yes' === $this->lwvactive ) {
					$lwv = '<DS_MERCHANT_EXCEP_SCA>LWV</DS_MERCHANT_EXCEP_SCA>';
				} else {
					$lwv = '';
				}
				if ( 'yes' === $this->traactive && $insite_redsys_amount <= ( 100 * (int) $this->traamount ) && $insite_redsys_amount > 3000 ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', 'Using TRA' );
						WCRed()->log( 'insite', ' ' );
					}
					$lwv = '<DS_MERCHANT_EXCEP_SCA>TRA</DS_MERCHANT_EXCEP_SCA>';
				}
				$mi_obj = new WooRedsysAPIWS();

				if ( ! empty( $this->merchantgroup ) ) {
					$ds_merchant_group = '<DS_MERCHANT_GROUP>' . $this->merchantgroup . '</DS_MERCHANT_GROUP>';
				} else {
					$ds_merchant_group = '';
				}

				if ( $insite_ds_merchant_cof_ini && 'yes' === $insite_save ) {
					$ini = '<DS_MERCHANT_IDENTIFIER>REQUIRED</DS_MERCHANT_IDENTIFIER><DS_MERCHANT_COF_INI>' . $insite_ds_merchant_cof_ini . '</DS_MERCHANT_COF_INI>';
				} else {
					$ini = '';
				}
				if ( $insite_ds_merchant_cof_type && 'yes' === $insite_save ) {
					$cof = '<DS_MERCHANT_COF_TYPE>' . $insite_ds_merchant_cof_type . '</DS_MERCHANT_COF_TYPE>';
				} else {
					$cof = '';
				}
				$dsmerchanem3 = '<DS_MERCHANT_EMV3DS>' . $acctinfo . '</DS_MERCHANT_EMV3DS>';

				$datos_entrada  = '<DATOSENTRADA>';
				$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $insite_redsys_amount . '</DS_MERCHANT_AMOUNT>';
				$datos_entrada .= '<DS_MERCHANT_ORDER>' . $ordermi . '</DS_MERCHANT_ORDER>';
				$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $insite_customer . '</DS_MERCHANT_MERCHANTCODE>';
				$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $insite_terminal . '</DS_MERCHANT_TERMINAL>';
				$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
				$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $insite_currency . '</DS_MERCHANT_CURRENCY>';
				$datos_entrada .= '<DS_MERCHANT_IDOPER>' . $insite_redsys_token . '</DS_MERCHANT_IDOPER>';
				$datos_entrada .= '<DS_MERCHANT_PRODUCTDESCRIPTION>' . WCRed()->clean_data( $description ) . '</DS_MERCHANT_PRODUCTDESCRIPTION>';
				$datos_entrada .= $ds_merchant_group;
				$datos_entrada .= $ini;
				$datos_entrada .= $cof;
				$datos_entrada .= $lwv;
				$datos_entrada .= $dsmerchanem3;
				$datos_entrada .= '</DATOSENTRADA>';
				$xml            = '<REQUEST>';
				$xml           .= $datos_entrada;
				$xml           .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
				$xml           .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $insite_secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
				$xml           .= '</REQUEST>';

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'trataPeticion 10: ' . $xml );
				}

				$cliente  = new SoapClient( $redsys_adr_ws );
				$response = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

				if ( isset( $response->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$xml_retorno = new SimpleXMLElement( $response->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				}
				// Comprobar si las propiedades existen antes de asignarlas a las variables.
				$ds_emv3ds         = isset( $xml_retorno->OPERACION->Ds_EMV3DS ) ? $xml_retorno->OPERACION->Ds_EMV3DS : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$ds_response       = isset( $xml_retorno->OPERACION->Ds_Response ) ? $xml_retorno->OPERACION->Ds_Response : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$codigo            = isset( $xml_retorno->CODIGO ) ? $xml_retorno->CODIGO : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$authorisationcode = isset( $xml_retorno->OPERACION->Ds_AuthorisationCode ) ? trim( $xml_retorno->OPERACION->Ds_AuthorisationCode ) : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

				// Comprobar si $ds_emv3ds es un JSON válido antes de intentar decodificarlo.
				$json_decode = ! empty( $ds_emv3ds ) ? json_decode( $ds_emv3ds ) : null;

				if ( ! is_null( $json_decode ) ) {
					$three_ds_info    = isset( $json_decode->threeDSInfo ) ? $json_decode->threeDSInfo : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$protocol_version = isset( $json_decode->protocolVersion ) ? $json_decode->protocolVersion : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$acs_url          = isset( $json_decode->acsURL ) ? $json_decode->acsURL : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$par_eq           = isset( $json_decode->{'PAReq'} ) ? trim( $json_decode->{'PAReq'} ) : null;
					$creq             = isset( $json_decode->{'creq'} ) ? trim( $json_decode->{'creq'} ) : null;
					$md               = isset( $json_decode->MD ) ? $json_decode->MD : null; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$three_ds_info    = null;
					$protocol_version = null;
					$acs_url          = null;
					$par_eq           = null;
					$creq             = null;
					$md               = null;
				}

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '$xml_retorno 13: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
					WCRed()->log( 'insite', 'Ds_EMV3DS: ' . $ds_emv3ds );
					WCRed()->log( 'insite', '$protocol_version: ' . $protocol_version );
					WCRed()->log( 'insite', '$ds_response: ' . $ds_response );
					WCRed()->log( 'insite', '$codigo: ' . $codigo );
					WCRed()->log( 'insite', '$acs_url: ' . $acs_url );
					WCRed()->log( 'insite', '$par_eq: ' . $par_eq );
					WCRed()->log( 'insite', '$creq: ' . $creq );
					WCRed()->log( 'insite', '$md: ' . $md );
					WCRed()->log( 'insite', '$authorisationcode: ' . $authorisationcode );
					WCRed()->log( 'insite', ' ' );
				}

				if ( isset( $ds_response ) && '' !== $ds_response ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '$ds_response set: ' . $ds_response );
					}
					if ( $ds_response >= 99 ) {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '$ds_response set >= 99: ' . $ds_response );
						}
						$error = WCRed()->get_error( $ds_response );
						wc_add_notice( $error, 'error' );
						$order->add_order_note( 'Error: ' . $error );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', 'Error en la operación: ' . $error );
						}
						do_action( 'insite_post_payment_error', $order->get_id(), $error );
						return;
					}
				}
				if ( isset( $codigo ) && '' !== $codigo ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '$codigo set: ' . $codigo );
					}
					if ( 0 !== (int) $codigo ) {
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '$codigo set different to 0: ' . $codigo );
						}
						$error = WCRed()->get_error( $codigo );
						wc_add_notice( $error, 'error' );
						$order->add_order_note( 'Error: ' . $error );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', 'Error en la operación: ' . $error );
						}
						do_action( 'insite_post_payment_error', $order->get_id(), $error );
						return;
					}
				}
				if ( 'ChallengeRequest' === $three_ds_info ) {
					// hay challenge.
					// Guardamos todo en transciends.
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '/***************/' );
						WCRed()->log( 'insite', '  2.2.0 y 2.2.1' );
						WCRed()->log( 'insite', 'process_paymnt()' );
						WCRed()->log( 'insite', '  Hay Challenge  ' );
						WCRed()->log( 'insite', '/***************/' );
					}
					// Guardar transients solo si los valores existen y no son null.

					if ( ! is_null( $three_ds_info ) ) {
						set_transient( 'threeDSInfo_' . $order_id, $three_ds_info, 300 );
					}

					if ( ! is_null( $protocol_version ) ) {
						set_transient( 'protocolVersion_' . $order_id, $protocol_version, 300 );
					}

					if ( ! is_null( $acs_url ) ) {
						set_transient( 'acsURL_' . $order_id, $acs_url, 300 );
					}

					if ( ! is_null( $par_eq ) ) {
						set_transient( 'PAReq_' . $order_id, $par_eq, 300 );
					}

					if ( ! is_null( $md ) ) {
						set_transient( 'MD_' . $order_id, $md, 300 );
						set_transient( $md, $order_id, 300 );

						if ( ! is_null( $order_total_sign ) ) {
							set_transient( 'amount_' . $md, $order_total_sign, 300 );
						}

						if ( ! is_null( $orderid2 ) ) {
							set_transient( 'order_' . $md, $orderid2, 300 );
						}

						if ( ! is_null( $customer ) ) {
							set_transient( 'merchantcode_' . $md, $customer, 300 );
						}

						if ( ! is_null( $ds_merchant_terminal ) ) {
							set_transient( 'terminal_' . $md, $ds_merchant_terminal, 300 );
						}

						if ( ! is_null( $insite_currency ) ) {
							set_transient( 'currency_' . $md, $insite_currency, 300 );
						}

						if ( ! is_null( $customer_token_c ) ) {
							set_transient( 'identifier_' . $md, $customer_token_c, 300 );
						}

						if ( ! is_null( $cof_ini ) ) {
							set_transient( 'cof_ini_' . $md, $cof_ini, 300 );
						}

						if ( ! is_null( $cof_type ) ) {
							set_transient( 'cof_type_' . $md, $cof_type, 300 );
						}

						if ( ! is_null( $cof_txnid ) ) {
							set_transient( 'cof_txnid_' . $md, $cof_txnid, 300 );
						}
					}

					if ( ! is_null( $creq ) ) {
						set_transient( 'creq_' . $order_id, $creq, 300 );
					}
					if ( '1.0.2' === $protocol_version ) {
						// Fall Back.
						$acsurl = $acs_url;
						$pareq  = $par_eq;
						$md     = $md;
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '$acsurl: ' . $acsurl );
							WCRed()->log( 'insite', '$pareq: ' . $pareq );
							WCRed()->log( 'insite', '$md: ' . $md );
						}
						set_transient( $order_id . '_insite_acsurl', $acsurl, 300 );
						set_transient( $order_id . '_insite_pareq', $pareq, 300 );
						set_transient( $order_id . '_insite_md', $md, 300 );
						set_transient( $order_id . '_do_redsys_challenge', 'yes', 300 );
						set_transient( 'amount_' . $md, $insite_redsys_amount, 300 );
						set_transient( 'order_' . $md, $ordermi, 300 );
						set_transient( 'merchantcode_' . $md, $insite_customer, 300 );
						set_transient( 'terminal_' . $md, $insite_terminal, 300 );
						set_transient( 'currency_' . $md, $insite_currency, 300 );
						set_transient( 'identifier_' . $md, $insite_ds_merchant_identifier, 300 );
						set_transient( 'cof_ini_' . $md, $ds_merchant_cof_ini, 300 );
						set_transient( 'cof_type_' . $md, $insite_ds_merchant_cof_type, 300 );
						set_transient( 'cof_txnid_' . $md, $cof_txnid, 300 );

						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', 'ChallengeRequest: TRUE' );
						}
						$order = new WC_Order( $order_id );
						return array(
							'result'   => 'success',
							'redirect' => $order->get_checkout_payment_url( true ),
						);
					}
					return array(
						'result'   => 'success',
						'redirect' => $order->get_checkout_payment_url( true ) . '#3DSform',
					);
				} elseif ( ! empty( $authorisationcode ) ) {
					// Pago directo sin challenge.
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '/***************/' );
						WCRed()->log( 'insite', '  Paid  ' );
						WCRed()->log( 'insite', '/***************/' );
					}
					$ds_order         = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$ds_merchant_code = (string) $xml_retorno->OPERACION->Ds_MerchantCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$ds_terminal      = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					WCRed()->update_order_meta( $order->get_id(), '_redsys_done', 'yes' );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'payment_complete() 9' );
					}
					if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
						if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
							sumo_save_subscription_payment_info(
								$order->get_id(),
								array(
									'payment_type'         => 'auto',
									'payment_method'       => 'insite',
									'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
									'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_order_amount' => $order->get_total(),
								)
							);
						}
					}
					$order->payment_complete();
					$needs_preauth = WCRed()->order_needs_preauth( $order->get_id() );
					if ( $needs_preauth ) {
						$order->update_status( 'redsys-pre', __( 'Preauthorized by Redsys', 'woocommerce-redsys' ) );
					}
					$order->add_order_note( __( 'HTTP Notification received - Payment completed', 'woocommerce-redsys' ) );
					$order->add_order_note( __( 'Authorization code: ', 'woocommerce-redsys' ) . $authorisationcode );

					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', '      Saving Order Meta       ' );
						WCRed()->log( 'insite', '/****************************/' );
						WCRed()->log( 'insite', ' ' );
					}

					if ( ! empty( $ds_order ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $ds_order );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_order_number_redsys saved: ' . $ds_order );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_order_number_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $dsdate ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_date_redsys', $dsdate );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_date_redsys saved: ' . $dsdate );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_date_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $ds_terminal ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $ds_terminal );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_terminal_redsys saved: ' . $ds_terminal );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_terminal_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $dshour ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_payment_hour_redsys', $dshour );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_payment_hour_redsys saved: ' . $dshour );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_payment_hour_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $authorisationcode ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisationcode );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_authorisation_code_redsys saved: ' . $authorisationcode );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_authorisation_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					if ( ! empty( $currency ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_corruncy_code_redsys', $currency );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_corruncy_code_redsys saved: ' . $currency );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_corruncy_code_redsys NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					// This meta is essential for later use.
					if ( ! empty( $secretsha256 ) ) {
						WCRed()->update_order_meta( $order->get_id(), '_redsys_secretsha256', $secretsha256 );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '_redsys_secretsha256 saved: ' . $secretsha256 );
						}
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', '_redsys_secretsha256 NOT SAVED!!!' );
						WCRed()->log( 'insite', ' ' );
					}
					do_action( 'insite_post_payment_complete', $order->get_id() );
					return array(
						'result'   => 'success',
						'redirect' => add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ),
					);
				}
				exit();
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Protocol ' . $insite_protocolversion );
				}

				$protocol_version = '1.0.2';

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Es Protocolo NO_3DS_v2 (1.0.2) y PSD2' );
				}

				$browser_ip    = WCRed()->get_the_ip();
				$datos_usuario = array(
					'threeDSInfo'         => 'AuthenticationData',
					'protocolVersion'     => $protocol_version,
					'browserAcceptHeader' => $http_accept,
					'browserColorDepth'   => WCPSD2()->get_profundidad_color( $order_id ),
					'browserIP'           => $browser_ip,
					'browserJavaEnabled'  => WCPSD2()->get_browserjavaenabled( $order_id ),
					'browserLanguage'     => WCPSD2()->get_idioma_navegador( $order_id ),
					'browserScreenHeight' => WCPSD2()->get_altura_pantalla( $order_id ),
					'browserScreenWidth'  => WCPSD2()->get_anchura_pantalla( $order_id ),
					'browserTZ'           => WCPSD2()->get_tz_horaria( $order_id ),
					'browserUserAgent'    => WCPSD2()->get_agente_navegador( $order_id ),
					'notificationURL'     => $insite_final_notify_url,
				);
				$needed        = wp_json_encode(
					array(
						'threeDSInfo'         => 'AuthenticationData',
						'protocolVersion'     => $protocol_version,
						'browserAcceptHeader' => $http_accept,
						'browserUserAgent'    => WCPSD2()->get_agente_navegador( $order_id ),
					)
				);
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '3DS Info:' . $needed );
				}
				$mi_obj = '';
				$mi_obj = new WooRedsysAPI();
				$mi_obj->set_parameter( 'DS_MERCHANT_MODULE', $insite_customer );
				$mi_obj->set_parameter( 'DS_MERCHANT_MERCHANTCODE', $insite_customer );
				$mi_obj->set_parameter( 'DS_MERCHANT_TERMINAL', $insite_terminal );
				$mi_obj->set_parameter( 'DS_MERCHANT_CURRENCY', $insite_currency );
				$mi_obj->set_parameter( 'DS_MERCHANT_TRANSACTIONTYPE', $insite_transaction_type );
				$mi_obj->set_parameter( 'DS_MERCHANT_AMOUNT', $insite_redsys_amount );
				$mi_obj->set_parameter( 'DS_MERCHANT_ORDER', $ordermi );
				$mi_obj->set_parameter( 'DS_MERCHANT_IDOPER', $insite_redsys_token );
				$mi_obj->set_parameter( 'DS_MERCHANT_MERCHANTURL', $insite_final_notify_url );
				$mi_obj->set_parameter( 'DS_MERCHANT_TITULAR', WCRed()->clean_data( $insite_merchan_name ) . ' ' . WCRed()->clean_data( $insite_merchant_lastnme ) );
				$mi_obj->set_parameter( 'DS_MERCHANT_PRODUCTDESCRIPTION', WCRed()->clean_data( $description ) );

				if ( 'yes' === $this->pay1clic && ( 'yes' === $insite_save || 'yes' === $need_token ) ) {
					if ( 'R' === $token_type_needed ) {
						$mi_obj->set_parameter( 'Ds_Merchant_MerchantData', '0' );
						$mi_obj->set_parameter( 'DS_MERCHANT_IDENTIFIER', 'REQUIRED' );
						$mi_obj->set_parameter( 'DS_MERCHANT_COF_INI', 'N' );
						$mi_obj->set_parameter( 'DS_MERCHANT_COF_TYPE', 'R' );
						set_transient( $order_id . '_ds_merchant_cof_ini', 'R', 3600 );
					} else {
						$mi_obj->set_parameter( 'Ds_Merchant_MerchantData', '0' );
						$mi_obj->set_parameter( 'DS_MERCHANT_IDENTIFIER', 'REQUIRED' );
						$mi_obj->set_parameter( 'DS_MERCHANT_COF_INI', 'S' );
						$mi_obj->set_parameter( 'DS_MERCHANT_COF_TYPE', 'R' );
						set_transient( $order_id . '_ds_merchant_cof_ini', 'C', 3600 );
					}
				}

				if ( (int) $insite_redsys_amount < 3000 && 'yes' === $this->lwvactive ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'Apply SCA: LWV' );
					}
					$mi_obj->set_parameter( 'DS_MERCHANT_EXCEP_SCA', 'LWV' );
				} elseif ( $insite_redsys_amount <= ( 100 * (int) $this->traamount ) && 'yes' === $this->traactive ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'Apply SCA: TRA' );
					}
					$mi_obj->set_parameter( 'DS_MERCHANT_EXCEP_SCA', 'TRA' );
				} elseif ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Apply SCA: NO' );
				}
				$mi_obj->set_parameter( 'DS_MERCHANT_EMV3DS', $needed );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'DS_MERCHANT_EMV3DS: ' . $needed );
				}

				$version   = 'HMAC_SHA256_V1';
				$request   = '';
				$params    = $mi_obj->create_merchant_parameters();
				$signature = $mi_obj->create_merchant_signature( $insite_secretsha256 );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$version: ' . $version );
					WCRed()->log( 'insite', '$params: ' . $params );
					WCRed()->log( 'insite', '$signature: ' . $signature );

				}
				$response = wp_remote_post(
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

				$response_code = wp_remote_retrieve_response_code( $response );
				$response_body = wp_remote_retrieve_body( $response );
				$result        = json_decode( $response_body );

				if ( empty( $response ) ) {
					wc_add_notice( 'Try again', 'error' );
					$error = 'Error No response (Try again)';
					do_action( 'insite_post_payment_error', $order->get_id(), $error );
					return;
				}

				if ( ! empty( $result ) && $result->errorCode ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$response = WCRed()->get_response_by_code( $result->errorCode ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$error    = WCRed()->get_error_by_code( $result->errorCode ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					if ( ! empty( $response ) ) {
						wc_add_notice( $response, 'error' );
					}
					if ( ! empty( $error ) ) {
						wc_add_notice( $error, 'error' );
					}
					return;
				}

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$response_body: ' . $response_body );
					WCRed()->log( 'insite', 'Ds_SignatureVersion: ' . $result->Ds_SignatureVersion ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					WCRed()->log( 'insite', 'Ds_MerchantParameters: ' . $result->Ds_MerchantParameters ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					WCRed()->log( 'insite', 'Ds_Signature: ' . $result->Ds_Signature ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				}
				$decodec             = $mi_obj->decode_merchant_parameters( $result->Ds_MerchantParameters ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$response            = $mi_obj->get_parameter( 'Ds_Response' );
				$decodec_array       = json_decode( $decodec );
				$signature_calculada = $mi_obj->create_merchant_signature_notif( $secretsha256, $result->Ds_MerchantParameters ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$response: ' . $response );
					WCRed()->log( 'insite', '$decodec_array: ' . print_r( $decodec_array, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
					WCRed()->log( 'insite', '$signature_calculada: ' . $signature_calculada );
					WCRed()->log( 'insite', 'Ds_Signature: ' . $result->Ds_Signature ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					WCRed()->log( 'insite', 'print_r: ' . print_r( $result, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				}
				if ( isset( $decodec_array->Ds_AuthorisationCode ) && ! empty( $decodec_array->Ds_AuthorisationCode ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase,WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$autorization        = (string) $decodec_array->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$total               = (string) $decodec_array->Ds_Amount; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$ordermi             = (string) $decodec_array->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dscode              = (string) $decodec_array->Ds_MerchantCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$currency_code       = (string) $decodec_array->Ds_Currency; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$response            = (string) $decodec_array->Ds_Response; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$id_trans            = (string) $decodec_array->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dstermnal           = (string) $decodec_array->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dsmerchandata       = (string) $decodec_array->Ds_MerchantData; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dscardcountry       = (string) $decodec_array->Ds_Card_Country; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$descardbrand        = (string) $decodec_array->Ds_Card_Brand; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$desprocesspaymethod = (string) $decodec_array->Ds_ProcessedPayMethod; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dsdate              = date( 'd/m/Y', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
					$dshour              = date( 'H:i', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date

					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '$autorization: ' . $autorization );
						WCRed()->log( 'insite', '$total: ' . $total );
						WCRed()->log( 'insite', '$ordermi: ' . $ordermi );
						WCRed()->log( 'insite', '$dscode: ' . $dscode );
						WCRed()->log( 'insite', '$currency_code: ' . $currency_code );
						WCRed()->log( 'insite', '$response: ' . $response );
						WCRed()->log( 'insite', '$id_trans: ' . $id_trans );
						WCRed()->log( 'insite', '$dstermnal: ' . $dstermnal );
						WCRed()->log( 'insite', '$dsmerchandata: ' . $dsmerchandata );
						WCRed()->log( 'insite', '$dscardcountry: ' . $dscardcountry );
						WCRed()->log( 'insite', '$descardbrand: ' . $descardbrand );
						WCRed()->log( 'insite', '$desprocesspaymethod: ' . $desprocesspaymethod );
						WCRed()->log( 'insite', '$dsdate: ' . $dsdate );
						WCRed()->log( 'insite', '$dshour: ' . $dshour );
					}

					$authorisation_code = $id_trans;

					if ( ! empty( $ordermi ) ) {
						WCRed()->update_order_meta( $order_id, '_payment_order_number_redsys', $ordermi );
					}
					if ( ! empty( $dscode ) ) {
						WCRed()->update_order_meta( $order_id, '_payment_merchant_code_redsys', $dscode );
					}
					if ( ! empty( $dstermnal ) ) {
						WCRed()->update_order_meta( $order_id, '_payment_terminal_redsys', $dstermnal );
					}
					if ( ! empty( $dsdate ) ) {
						WCRed()->update_order_meta( $order_id, '_payment_date_redsys', $dsdate );
					}
					if ( ! empty( $dshour ) ) {
						WCRed()->update_order_meta( $order_id, '_payment_hour_redsys', $dshour );
					}
					if ( ! empty( $id_trans ) ) {
						WCRed()->update_order_meta( $order_id, '_authorisation_code_redsys', $authorisation_code );
					}
					if ( ! empty( $dscardcountry ) ) {
						WCRed()->update_order_meta( $order_id, '_card_country_insite', $dscardcountry );
					}
					if ( ! empty( $sha256 ) ) {
						WCRed()->update_order_meta( $order_id, '_order_sha256_insite', $sha256 );
					}
					$order = WCRed()->get_order( $order_id );
					// Payment completed.
					$order->add_order_note( __( 'HTTP Notification received - payment completed', 'woocommerce-redsys' ) );
					$order->add_order_note( __( 'Authorization code: ', 'woocommerce-redsys' ) . $authorisation_code );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'payment_complete() 10' );
					}
					if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
						if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
							sumo_save_subscription_payment_info(
								$order->get_id(),
								array(
									'payment_type'         => 'auto',
									'payment_method'       => 'insite',
									'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
									'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_order_amount' => $order->get_total(),
								)
							);
						}
					}
					$order->payment_complete();
					$needs_preauth = WCRed()->order_needs_preauth( $order->get_id() );
					if ( $needs_preauth ) {
						$order->update_status( 'redsys-pre', __( 'Preauthorized by Redsys', 'woocommerce-redsys' ) );
					}
					do_action( 'insite_post_payment_complete', $order->get_id() );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'Payment complete.' );
					}
					$order = new WC_Order( $order_id );
					return array(
						'result'   => 'success',
						'redirect' => add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ),
					);
				}

				if ( isset( $decodec_array->Ds_EMV3DS->acsURL ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase

					if ( 'yes' === $rneeds_payment ) {
						WCRed()->update_order_meta( $order_id, '_redsystokenr', 'yes' );
					}

					$response = (int) $decodec_array->Ds_Response; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'La respuesta es $response: ' . $response );
					}
					$threedsinfo = $decodec_array->Ds_EMV3DS->threeDSInfo; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					if ( ! empty( $threedsinfo ) && 'ChallengeRequest' === $threedsinfo ) {
						if ( 'yes' === $this->debug ) {
							if ( ! empty( $redsys_insite ) ) {
								WCRed()->log( 'insite', '$redsys_insite->secure3ds: ' . $redsys_insite->secure3ds );
							}
							WCRed()->log( 'insite', 'La respuesta es $response: ' . $response );
						}
						$acsurl = $decodec_array->Ds_EMV3DS->acsURL; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
						$pareq  = trim( $decodec_array->Ds_EMV3DS->{ 'PAReq'} ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
						$md     = $decodec_array->Ds_EMV3DS->MD; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', '$acsurl: ' . $acsurl );
							WCRed()->log( 'insite', '$pareq: ' . $pareq );
							WCRed()->log( 'insite', '$md: ' . $md );
						}
						set_transient( $order_id . '_insite_acsurl', $acsurl, 36000 );
						set_transient( $order_id . '_insite_pareq', $pareq, 36000 );
						set_transient( $order_id . '_insite_md', $md, 36000 );
						set_transient( $order_id . '_do_redsys_challenge', 'yes', 36000 );
						if ( 'yes' === $this->debug ) {
							WCRed()->log( 'insite', 'ChallengeRequest: TRUE' );
						}
						$order = new WC_Order( $order_id );
						return array(
							'result'   => 'success',
							'redirect' => $order->get_checkout_payment_url( true ),
						);
					}
				}

				$order = new WC_Order( $order_id );
				return array(
					'result'   => 'success',
					'redirect' => $order->get_checkout_payment_url( true ),
				);
			}
		}
	}
	/**
	 * Check for valid token & prepare payment form.
	 */
	public static function check_token_insite_from_action_checkout() {

		$redsys_insite = new WC_Gateway_InSite_Redsys();

		if ( 'yes' === $redsys_insite->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/*************************************************/' );
			WCRed()->log( 'insite', '  Start check_token_insite_from_action_checkout()  ' );
			WCRed()->log( 'insite', '/*************************************************/' );
			WCRed()->log( 'insite', ' ' );
		}

		if ( ! isset( $_POST['redsysnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['redsysnonce'] ) ), 'redsys_insite_nonce' ) ) {
			wp_die( 'Error - Verificación nonce no válida ✋' );
		}

		if (
			! isset( $_POST['token'] ) ||
			! isset( $_POST['order_id'] ) ||
			! isset( $_POST['order_total'] ) ||
			// phpcs:ignore Squiz.PHP.CommentedOutCode.Found
			// ! isset( $_POST['billing_first_name'] ) ||
			// ! isset( $_POST['billing_last_name'] ) ||
			! isset( $_POST['user_id'] ) ||
			! isset( $_POST['userAgent'] ) ||
			! isset( $_POST['http_accept'] )
		) {
			wc_add_notice( __( 'Some Payments required fields are missing. Please, try again', 'woocommerce-redsys' ), 'error' );
			wp_exit();
		}
		$mi_obj = new WooRedsysAPIWS();

		if ( 'yes' === $redsys_insite->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/******************************/' );
			WCRed()->log( 'insite', '  Llega a la función de InSite  ' );
			WCRed()->log( 'insite', '/******************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', 'El token que hay que enviar a Redsys es:' . sanitize_text_field( wp_unslash( $_POST['token'] ) ) );
			WCRed()->log( 'insite', 'El Order ID que hay que enviar a Redsys es:' . sanitize_text_field( wp_unslash( $_POST['order_id'] ) ) );
			WCRed()->log( 'insite', 'El userAgent que hay que enviar a Redsys es:' . sanitize_text_field( wp_unslash( $_POST['userAgent'] ) ) );
			WCRed()->log( 'insite', 'El language que hay que enviar a Redsys es:' . sanitize_text_field( wp_unslash( $_POST['language'] ) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			WCRed()->log( 'insite', 'El height que hay que enviar a Redsys es:' . sanitize_text_field( wp_unslash( $_POST['height'] ) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			WCRed()->log( 'insite', 'El width que hay que enviar a Redsys es:' . sanitize_text_field( wp_unslash( $_POST['width'] ) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			WCRed()->log( 'insite', 'El colorDepth que hay que enviar a Redsys es:' . sanitize_text_field( wp_unslash( $_POST['colorDepth'] ) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			WCRed()->log( 'insite', 'El Timezone que hay que enviar a Redsys es:' . sanitize_text_field( wp_unslash( $_POST['Timezone'] ) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			WCRed()->log( 'insite', 'Los HTTP Accept headers son:' . sanitize_text_field( wp_unslash( $_POST['http_accept'] ) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			WCRed()->log( 'insite', 'Necesita token:' . sanitize_text_field( wp_unslash( $_POST['need_token'] ) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			WCRed()->log( 'insite', 'Tipo de token:' . sanitize_text_field( wp_unslash( $_POST['token_needed'] ) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			WCRed()->log( 'insite', 'Save:' . sanitize_text_field( wp_unslash( $_POST['saved'] ) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		}

		$currency_codes    = WCRed()->get_currencies();
		$customer          = $redsys_insite->customer;
		$terminal          = $redsys_insite->terminal;
		$currency          = $currency_codes[ get_woocommerce_currency() ];
		$final_notify_url  = $redsys_insite->notify_url;
		$redsys_token      = sanitize_text_field( wp_unslash( $_POST['token'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		$order_id          = sanitize_text_field( wp_unslash( $_POST['order_id'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		$amount            = sanitize_text_field( wp_unslash( $_POST['order_total'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		$user_id           = sanitize_text_field( wp_unslash( $_POST['user_id'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		$usr_agent         = sanitize_text_field( wp_unslash( $_POST['userAgent'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		$http_accept       = sanitize_text_field( wp_unslash( $_POST['http_accept'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		$save              = sanitize_text_field( wp_unslash( $_POST['saved'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		$redsys_amount     = WCRed()->redsys_amount_format( $amount );
		$secretsha256      = $redsys_insite->get_redsys_sha256( $user_id );
		$redsys_adr        = $redsys_insite->get_redsys_url_gateway( $user_id );
		$redsys_adrws      = $redsys_insite->get_redsys_url_gateway_ws( $user_id );
		$need_token        = sanitize_text_field( wp_unslash( $_POST['need_token'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		$token_type_needed = sanitize_text_field( wp_unslash( $_POST['token_needed'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		$merchant_module   = 'WooCommerce_Redsys_Gateway_' . REDSYS_VERSION . '_WooCommerce.com';
		$preauth           = sanitize_text_field( wp_unslash( $_POST['preauth'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
		$merchant_data     = false;
		$identifier        = false;
		$cof_ini           = false;
		$cof_type          = false;
		$lwv               = false;
		$tra               = false;
		if ( 'yes' === $preauth ) {
			$transaction_type = '1';
		} else {
			$transaction_type = '0';
		}

		if ( 'yes' === $redsys_insite->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$currency: ' . $currency );
		}

		if ( ( ( 'yes' === $redsys_insite->pay1clic && ( 'yes' === $save ) ) || 'yes' === $need_token ) ) {
			if ( 'R' === $token_type_needed ) {
				$merchant_data = '<DS_MERCHANT_MERCHANTDATA>0</DS_MERCHANT_MERCHANTDATA>';
				$identifier    = '<DS_MERCHANT_IDENTIFIER>REQUIRED</DS_MERCHANT_IDENTIFIER>';
				$cof_ini       = '<DS_MERCHANT_COF_INI>S</DS_MERCHANT_COF_INI>';
				$cof_type      = '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
				set_transient( $order_id . '_ds_merchant_cof_ini', 'S', 3600 );
				set_transient( $order_id . '_ds_merchant_cof_type', 'R', 3600 );
			} else {
				$merchant_data = '<DS_MERCHANT_MERCHANTDATA>0</DS_MERCHANT_MERCHANTDATA>';
				$identifier    = '<DS_MERCHANT_IDENTIFIER>REQUIRED</DS_MERCHANT_IDENTIFIER>';
				$cof_ini       = '<DS_MERCHANT_COF_INI>S</DS_MERCHANT_COF_INI>';
				$cof_type      = '<DS_MERCHANT_COF_TYPE>C</DS_MERCHANT_COF_TYPE>';
				set_transient( $order_id . '_ds_merchant_cof_ini', 'S', 3600 );
				set_transient( $order_id . '_ds_merchant_cof_type', 'C', 3600 );
			}
		}

		if ( (int) $redsys_amount < 3000 && 'yes' === $redsys_insite->lwvactive ) {
			if ( 'yes' === $redsys_insite->debug ) {
				WCRed()->log( 'insite', 'Apply SCA: LWV' );
			}
			$lwv = '<DS_MERCHANT_EXCEP_SCA>LWV</DS_MERCHANT_EXCEP_SCA>';
			$tra = false;
			set_transient( $order_id . '_ds_merchant_excep_sca', 'LWV', 3600 );
		} elseif ( $redsys_amount <= ( 100 * (int) $redsys_insite->traamount ) && 'yes' === $redsys_insite->traactive ) {
			if ( 'yes' === $redsys_insite->debug ) {
				WCRed()->log( 'insite', 'Apply SCA: TRA' );
			}
			$tra = '<DS_MERCHANT_EXCEP_SCA>TRA</DS_MERCHANT_EXCEP_SCA>';
			$lwv = false;
			set_transient( $order_id . '_ds_merchant_excep_sca', 'TRA', 3600 );

		} else {
			if ( 'yes' === $redsys_insite->debug ) {
				WCRed()->log( 'insite', 'Apply SCA: NO' );
			}
			$tra = false;
			$lwv = false;
		}

		$datos_entrada  = '<DATOSENTRADA>';
		$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $redsys_amount . '</DS_MERCHANT_AMOUNT>';
		$datos_entrada .= '<DS_MERCHANT_ORDER>' . $order_id . '</DS_MERCHANT_ORDER>';
		$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
		$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
		$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
		$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
		// phpcs:ignore Squiz.PHP.CommentedOutCode.Found
		// $datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $merchan_name ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
		$datos_entrada .= '<DS_MERCHANT_IDOPER>' . $redsys_token . '</DS_MERCHANT_IDOPER>';
		if ( $merchant_data ) {
			$datos_entrada .= $merchant_data;
		}
		if ( $identifier ) {
			$datos_entrada .= $identifier;
		}
		if ( $cof_ini ) {
			$datos_entrada .= $cof_ini;
		}
		if ( $cof_type ) {
			$datos_entrada .= $cof_type;
		}
		if ( $lwv ) {
			$datos_entrada .= $lwv;
		}
		if ( $tra ) {
			$datos_entrada .= $tra;
		}
		$datos_entrada .= '<DS_MERCHANT_EMV3DS>{"threeDSInfo":"CardData"}</DS_MERCHANT_EMV3DS>';
		$datos_entrada .= '</DATOSENTRADA>';

		if ( 'yes' === $redsys_insite->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '          The call  4          ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', $datos_entrada );
			WCRed()->log( 'insite', ' ' );
		}

		$xml  = '<REQUEST>';
		$xml .= $datos_entrada;
		$xml .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
		$xml .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
		$xml .= '</REQUEST>';

		if ( 'yes' === $redsys_insite->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '          The XML 13            ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', $xml );
			WCRed()->log( 'insite', ' ' );
		}

		$cliente  = new SoapClient( $redsys_adrws );
		$response = $cliente->iniciaPeticion( array( 'datoEntrada' => $xml ) );

		if ( isset( $response->iniciaPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$xml_retorno = new SimpleXMLElement( $response->iniciaPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$respuesta   = json_decode( $xml_retorno->INFOTARJETA->Ds_EMV3DS ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}

		if ( 'yes' === $redsys_insite->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '          The XML 14             ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$XML: ' . $xml );
			WCRed()->log( 'insite', '$xml_retorno 14 IniciaPeticion: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'insite', '$respuesta: ' . print_r( $respuesta, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'insite', '$respuesta->protocolVersion: ' . $respuesta->protocolVersion ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			WCRed()->log( 'insite', '$respuesta->threeDSServerTransID: ' . $respuesta->threeDSServerTransID ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			WCRed()->log( 'insite', '$respuesta->threeDSInfo: ' . $respuesta->threeDSInfo ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			WCRed()->log( 'insite', '$respuesta->threeDSMethodURL: ' . $respuesta->threeDSMethodURL ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			WCRed()->log( 'insite', ' ' );
		}
		if ( ! empty( $respuesta->protocolVersion ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			set_transient( $order_id . '_insite_protocolversion', trim( $respuesta->protocolVersion ), 46000 ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		if ( ! empty( $respuesta->threeDSServerTransID ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			set_transient( $order_id . '_insite_threeDSServerTransID', trim( $respuesta->threeDSServerTransID ), 46000 ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		if ( ! empty( $respuesta->threeDSInfo ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			set_transient( $order_id . '_insite_threeDSInfo', trim( $respuesta->threeDSInfo ), 46000 ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		if ( ! empty( $respuesta->threeDSMethodURL ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			set_transient( $order_id . '_insite_threeDSMethodURL', trim( $respuesta->threeDSMethodURL ), 46000 ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}
		if ( isset( $xml_retorno->INFOTARJETA->Ds_Card_PSD2 ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			set_transient( $order_id . '_insite_ds_card_psd2', trim( $xml_retorno->INFOTARJETA->Ds_Card_PSD2 ), 46000 ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		}

		set_transient( $order_id . '_insite_token', $redsys_token, 46000 );
		set_transient( $order_id . '_insite_user_id', $user_id, 46000 );
		set_transient( $order_id . '_insite_token_need', $token_type_needed, 46000 );

		if ( 0 === (int) $redsys_amount ) {
			set_transient( $order_id . '_insite_needs_payment', 'yes', 46000 );
		}

		if ( ( 'yes' === $redsys_insite->pay1clic || 'yes' === $save ) || 'yes' === $need_token ) {
			if ( 'R' === $token_type_needed ) {
				set_transient( $order_id . '_insite_Ds_Merchant_MerchantData', '0', 46000 );
				set_transient( $order_id . '_insite_Ds_MERCHANT_IDENTIFIER', 'REQUIRED', 46000 );
				set_transient( $order_id . '_insite_DS_MERCHANT_COF_INI', 'S', 46000 );
				set_transient( $order_id . '_insite_DS_MERCHANT_COF_TYPE', 'R', 46000 );
				set_transient( $order_id . '_ds_merchant_cof_ini', 'S', 3600 );
			} else {
				set_transient( $order_id . '_insite_Ds_Merchant_MerchantData', '0', 3600 );
				set_transient( $order_id . '_insite_Ds_MERCHANT_IDENTIFIER', 'REQUIRED', 3600 );
				set_transient( $order_id . '_insite_DS_MERCHANT_COF_INI', 'S', 3600 );
				set_transient( $order_id . '_insite_DS_MERCHANT_COF_TYPE', 'C', 3600 );
				set_transient( $order_id . '_ds_merchant_cof_ini', 'S', 3600 );
			}
		}

		if ( (int) $redsys_amount < 3000 && 'yes' === $redsys_insite->lwvactive ) {
			if ( 'yes' === $redsys_insite->debug ) {
				WCRed()->log( 'insite', 'Apply SCA: LWV' );
			}
			set_transient( $order_id . '_insite_DS_MERCHANT_EXCEP_SCA', 'LWV', 3600 );
		} elseif ( $redsys_amount <= ( 100 * (int) $redsys_insite->traamount ) && 'yes' === $redsys_insite->traactive ) {
			if ( 'yes' === $redsys_insite->debug ) {
				WCRed()->log( 'insite', 'Apply SCA: TRA' );
			}
			set_transient( $order_id . '_insite_DS_MERCHANT_EXCEP_SCA', 'TRA', 3600 );
		} elseif ( 'yes' === $redsys_insite->debug ) {
			WCRed()->log( 'insite', 'Apply SCA: NO' );
		}

		set_transient( $order_id . '_insite_user_id', $user_id, 3600 );
		set_transient( $order_id . '_insite_customer', $customer, 3600 );
		set_transient( $order_id . '_insite_terminal', $terminal, 3600 );
		set_transient( $order_id . '_insite_currency', $currency, 3600 );
		set_transient( $order_id . '_insite_transaction_type', $transaction_type, 3600 );
		set_transient( $order_id . '_insite_redsys_amount', $redsys_amount, 3600 );
		set_transient( $order_id . '_insite_redsys_token', $redsys_token, 3600 );
		set_transient( $order_id . '_insite_final_notify_url', $final_notify_url, 3600 );
		set_transient( $order_id . '_insite_redsys_adr', $redsys_adr, 3600 );
		set_transient( $order_id . '_insite_secretsha256', $secretsha256, 3600 );
		set_transient( $order_id . '_insite_save', $save, 3600 );

		if ( 'yes' === $redsys_insite->debug ) {

			$insite_user_id                  = get_transient( $order_id . '_insite_user_id' );
			$insite_customer                 = get_transient( $order_id . '_insite_customer' );
			$insite_terminal                 = get_transient( $order_id . '_insite_terminal' );
			$insite_currency                 = get_transient( $order_id . '_insite_currency' );
			$insite_transaction_type         = get_transient( $order_id . '_insite_transaction_type' );
			$insite_redsys_amount            = get_transient( $order_id . '_insite_redsys_amount' );
			$insite_redsys_token             = get_transient( $order_id . '_insite_redsys_token' );
			$insite_final_notify_url         = get_transient( $order_id . '_insite_final_notify_url' );
			$insite_merchan_name             = get_transient( $order_id . '_insite_merchan_name' );
			$insite_merchant_lastnme         = get_transient( $order_id . '_insite_merchant_lastnme' );
			$insite_redsys_adr               = get_transient( $order_id . '_insite_redsys_adr' );
			$insite_secretsha256             = get_transient( $order_id . '_insite_secretsha256' );
			$insite_save                     = get_transient( $order_id . '_insite_save' );
			$insite_protocolversion          = get_transient( $order_id . '_insite_protocolversion' );
			$insite_three_ds_server_trans_id = get_transient( $order_id . '_insite_threeDSServerTransID' );
			$insite_three_ds_info            = get_transient( $order_id . '_insite_threeDSInfo' );
			$insite_three_ds_method_url      = get_transient( $order_id . '_insite_threeDSMethodURL' );
			$insite_ds_card_psd2             = get_transient( $order_id . '_insite_ds_card_psd2' );
			$insite_token                    = get_transient( $order_id . '_insite_token' );
			$insite_token_need               = get_transient( $order_id . '_insite_token_need' );
			$insite_needs_payment            = get_transient( $order_id . '_insite_needs_payment' );
			$insite_ds_merchant_merchantdata = get_transient( $order_id . '_insite_Ds_Merchant_MerchantData' );
			$insite_ds_merchant_identifier   = get_transient( $order_id . '_insite_Ds_MERCHANT_IDENTIFIER' );
			$insite_ds_merchant_cof_ini      = get_transient( $order_id . '_insite_DS_MERCHANT_COF_INI' );
			$insite_ds_merchant_cof_type     = get_transient( $order_id . '_insite_DS_MERCHANT_COF_TYPE' );
			$ds_merchant_cof_ini             = get_transient( $order_id . '_ds_merchant_cof_ini' );
			$insite_ds_merchant_excep_sca    = get_transient( $order_id . '_insite_DS_MERCHANT_EXCEP_SCA' );

			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$user_id: ' . $insite_user_id );
			WCRed()->log( 'insite', '$customer:' . $insite_customer );
			WCRed()->log( 'insite', '$terminal: ' . $insite_terminal );
			WCRed()->log( 'insite', '$currency: ' . $insite_currency );
			WCRed()->log( 'insite', '$transaction_type: ' . $insite_transaction_type );
			WCRed()->log( 'insite', '$redsys_amount: ' . $insite_redsys_amount );
			WCRed()->log( 'insite', '$redsys_order_id: ' . $order_id );
			WCRed()->log( 'insite', '$redsys_token: ' . $insite_redsys_token );
			WCRed()->log( 'insite', '$final_notify_url: ' . $insite_final_notify_url );
			WCRed()->log( 'insite', '$merchan_name: ' . $insite_merchan_name );
			WCRed()->log( 'insite', '$merchant_lastnme: ' . $insite_merchant_lastnme );
			WCRed()->log( 'insite', '$redsys_adr: ' . $insite_redsys_adr );
			WCRed()->log( 'insite', '$secretsha256: ' . $insite_secretsha256 );
			WCRed()->log( 'insite', '$save: ' . $insite_save );
			WCRed()->log( 'insite', '$insite_protocolversion: ' . $insite_protocolversion );
			WCRed()->log( 'insite', '$insite_three_ds_server_trans_id: ' . $insite_three_ds_server_trans_id );
			WCRed()->log( 'insite', '$insite_three_ds_info: ' . $insite_three_ds_info );
			WCRed()->log( 'insite', '$insite_three_ds_method_url: ' . $insite_three_ds_method_url );
			WCRed()->log( 'insite', '$insite_ds_card_psd2: ' . $insite_ds_card_psd2 );
			WCRed()->log( 'insite', '$insite_token: ' . $insite_token );
			WCRed()->log( 'insite', '$insite_user_id: ' . $insite_user_id );
			WCRed()->log( 'insite', '$insite_token_need: ' . $insite_token_need );
			WCRed()->log( 'insite', '$insite_needs_payment: ' . $insite_needs_payment );
			WCRed()->log( 'insite', '$insite_ds_merchant_merchantdata: ' . $insite_ds_merchant_merchantdata );
			WCRed()->log( 'insite', '$insite_ds_merchant_identifier: ' . $insite_ds_merchant_identifier );
			WCRed()->log( 'insite', '$insite_ds_merchant_cof_ini: ' . $insite_ds_merchant_cof_ini );
			WCRed()->log( 'insite', '$insite_ds_merchant_cof_type: ' . $insite_ds_merchant_cof_type );
			WCRed()->log( 'insite', '$ds_merchant_cof_ini: ' . $ds_merchant_cof_ini );
			WCRed()->log( 'insite', '$insite_ds_merchant_excep_sca: ' . $insite_ds_merchant_excep_sca );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/*************************************************/' );
			WCRed()->log( 'insite', '  END check_token_insite_from_action_checkout()  ' );
			WCRed()->log( 'insite', '/*************************************************/' );
			WCRed()->log( 'insite', ' ' );
		}
		echo 'success';
		wp_die();
	}
	/**
	 * Receipt_page function.
	 *
	 * @param mixed $order Order.
	 * @return void
	 */
	public function receipt_page( $order ) {
		global $woocommerce;

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '       Once upon a time       ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '  Generating receipt_page     ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
		}

		if ( isset( $_GET['threeDSServerTransID'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$_GET["threeDSServerTransID"]' );
			}

			$ordermum             = sanitize_text_field( wp_unslash( $_GET['order'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$order                = WCRed()->get_order( $ordermum );
			$threeddservertransid = sanitize_text_field( wp_unslash( $_GET['threeDSServerTransID'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$ordermum: ' . $ordermum );
				WCRed()->log( 'insite', '$threeddservertransid: ' . $threeddservertransid );
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'HTTP Notification received POST: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', 'HTTP Notification received GET: ' . print_r( $_GET, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended,WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}
			if ( 'yes' === $this->not_use_https ) {
				$final_notify_url = $this->notify_url_not_https;
			} else {
				$final_notify_url = $this->notify_url;
			}

			if ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
				$browser_user_agent = $_SERVER['HTTP_USER_AGENT']; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash,WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			} else {
				$browser_user_agent = false;
			}

			$user_id                 = $order->get_user_id();
			$ordermum                = $ordermum;
			$browser_accept_header   = WCRed()->get_order_meta( $ordermum, '_accept_headers', true );
			$insite_save             = WCRed()->get_order_meta( $ordermum, '_redsys_save_token', true );
			$browser_color_depth     = WCPSD2()->get_profundidad_color( $ordermum );
			$browser_language        = WCRed()->get_order_meta( $ordermum, '_billing_idioma_navegador_field', true );
			$browser_screen_height   = WCRed()->get_order_meta( $ordermum, '_billing_altura_pantalla_field', true );
			$browser_screen_width    = WCRed()->get_order_meta( $ordermum, '_billing_anchura_pantalla_field', true );
			$browser_tz              = WCPSD2()->get_tz_horaria( $ordermum );
			$java_enabled            = WCRed()->get_order_meta( $ordermum, '_billing_js_enabled_navegador_field', true );
			$protocol_version        = get_transient( 'protocolVersion_' . $ordermum );
			$merchant_cof            = get_transient( $ordermum . '_ds_merchant_cof_ini' );
			$merchant_type           = get_transient( $ordermum . '_ds_merchant_cof_type' );
			$excep_sca               = get_transient( $ordermum . '_ds_merchant_excep_sca' );
			$token_ioper             = get_transient( $ordermum . '_insite_token' );
			$merchant_identifier     = get_transient( $ordermum . '_insite_token_redsys' );
			$merchant_txnid          = get_transient( $ordermum . '_insite_token_txnid' );
			$insite_merchan_name     = get_transient( $ordermum . '_insite_merchan_name' );
			$insite_merchant_lastnme = get_transient( $ordermum . '_insite_merchant_lastnme' );
			$redsys_adr              = $this->get_redsys_url_gateway_ws();
			$mi_obj                  = new WooRedsysAPIWS();
			$secretsha256            = $this->get_redsys_sha256( $user_id );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$merchant_cof: ' . $merchant_cof );
				WCRed()->log( 'insite', '$merchant_type: ' . $merchant_type );
				WCRed()->log( 'insite', '$excep_sca: ' . $excep_sca );
				WCRed()->log( 'insite', '$token_ioper: ' . $token_ioper );
				WCRed()->log( 'insite', '$merchant_identifier: ' . $merchant_identifier );
				WCRed()->log( 'insite', '$merchant_txnid: ' . $merchant_txnid );
				WCRed()->log( 'insite', '$user_id: ' . $user_id );
				WCRed()->log( 'insite', '$browser_accept_header: ' . WCRed()->clean_data( $browser_accept_header ) );
				WCRed()->log( 'insite', '$browser_color_depth: ' . $browser_color_depth );
				WCRed()->log( 'insite', '$browser_language: ' . WCRed()->clean_data( $browser_language ) );
				WCRed()->log( 'insite', '$browser_screen_height: ' . WCRed()->clean_data( $browser_screen_height ) );
				WCRed()->log( 'insite', '$browser_screen_width: ' . WCRed()->clean_data( $browser_screen_width ) );
				WCRed()->log( 'insite', '$browser_tz: ' . $browser_tz );
				WCRed()->log( 'insite', '$java_enabled: ' . WCRed()->clean_data( $java_enabled ) );
				WCRed()->log( 'insite', '$protocol_version: ' . $protocol_version );
				WCRed()->log( 'insite', '$insite_save: ' . $insite_save );
				WCRed()->log( 'insite', '$merchant_cof: ' . $merchant_cof );
				WCRed()->log( 'insite', '$merchant_type: ' . $merchant_type );
				WCRed()->log( 'insite', '$excep_sca: ' . $excep_sca );
				WCRed()->log( 'insite', '$token_ioper: ' . $token_ioper );
				WCRed()->log( 'insite', '$merchant_identifier: ' . $merchant_identifier );
				WCRed()->log( 'insite', '$merchant_txnid: ' . $merchant_txnid );
				WCRed()->log( 'insite', '$redsys_adr: ' . $redsys_adr );
				WCRed()->log( 'insite', '$secretsha256: ' . $secretsha256 );
				WCRed()->log( 'insite', '/****************************/' );
			}

			$order_total_sign = get_transient( $ordermum . '_insite_merchant_amount' );

			if ( $order_total_sign ) {
				$orderid2         = get_transient( $ordermum . '_insite_merchant_order' );
				$customer         = get_transient( $ordermum . '_insite_merchantcode' );
				$terminal         = get_transient( $ordermum . '_insite_terminal' );
				$transaction_type = get_transient( $ordermum . '_insite_transaction_type' );
				$currency         = get_transient( $ordermum . '_insite_currency' );
			} else {
				$orderid2                    = WCRed()->get_order_meta( $ordermum, '_temp_redsys_order_number', true );
				$customer                    = get_transient( $orderid2 . '_insite_customer' );
				$terminal                    = get_transient( $orderid2 . '_insite_terminal' );
				$currency                    = get_transient( $orderid2 . '_insite_currency' );
				$transaction_type            = get_transient( $orderid2 . '_insite_transaction_type' );
				$insite_ds_merchant_cof_ini  = get_transient( $orderid2 . '_insite_DS_MERCHANT_COF_INI' );
				$insite_ds_merchant_cof_type = get_transient( $orderid2 . '_insite_DS_MERCHANT_COF_TYPE' );
				$order_total_sign            = get_transient( $orderid2 . '_insite_redsys_amount' );

			}
			if ( 'yes' !== $insite_save && ( 'no' === $merchant_identifier || empty( $merchant_identifier ) ) ) {
				$merchant_cof   = false;
				$merchant_type  = false;
				$merchant_txnid = false;
			}
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$orderid2: ' . $orderid2 );
				WCRed()->log( 'insite', '$customer: ' . $customer );
				WCRed()->log( 'insite', '$terminal: ' . $terminal );
				WCRed()->log( 'insite', '$transaction_type: ' . $transaction_type );
				WCRed()->log( 'insite', '$currency: ' . $currency );
				if ( ! empty( $insite_ds_merchant_cof_ini ) ) {
					WCRed()->log( 'insite', '$insite_ds_merchant_cof_ini: ' . $insite_ds_merchant_cof_ini );
				}
				if ( ! empty( $insite_ds_merchant_cof_type ) ) {
					WCRed()->log( 'insite', '$insite_ds_merchant_cof_type: ' . $insite_ds_merchant_cof_type );
				}
				WCRed()->log( 'insite', '$token_ioper: ' . $token_ioper );
				WCRed()->log( 'insite', '$order_total_sign: ' . $order_total_sign );
				WCRed()->log( 'insite', '$merchant_cof: ' . $merchant_cof );
				WCRed()->log( 'insite', '$merchant_type: ' . $merchant_type );
			}
			if ( $order_total_sign <= 3000 && 'yes' === $this->lwvactive ) {
				$lwv = '<DS_MERCHANT_EXCEP_SCA>LWV</DS_MERCHANT_EXCEP_SCA>';
			} else {
				$lwv = '';
			}
			if ( 'yes' === $this->traactive && $order_total_sign <= ( 100 * (int) $this->traamount ) && $order_total_sign > 3000 ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', 'Using TRA' );
					WCRed()->log( 'insite', ' ' );
				}
				$lwv = '<DS_MERCHANT_EXCEP_SCA>TRA</DS_MERCHANT_EXCEP_SCA>';
			}

			if ( ( ( 'yes' === $insite_save && 'no' === $merchant_identifier ) || ( empty( $merchant_identifier ) && ! empty( $merchant_cof ) ) ) ) {
				$merchant_identifier = 'REQUIRED';
			}

			if ( $token_ioper ) {
				$insite_redsys_token = '<DS_MERCHANT_IDOPER>' . $token_ioper . '</DS_MERCHANT_IDOPER>';
			} else {
				$insite_redsys_token = '';
			}
			if ( 'no' !== $merchant_identifier && ! empty( $merchant_identifier ) ) {
				$merchant_identifier_d = '<DS_MERCHANT_IDENTIFIER>' . $merchant_identifier . '</DS_MERCHANT_IDENTIFIER>';
			} else {
				$merchant_identifier_d = '';
			}
			if ( $merchant_cof ) {
				$merchant_cof = '<DS_MERCHANT_COF_INI>' . $merchant_cof . '</DS_MERCHANT_COF_INI>';
			} else {
				$merchant_cof = '';
			}
			if ( $merchant_type ) {
				$merchant_type = '<DS_MERCHANT_COF_TYPE>' . $merchant_type . '</DS_MERCHANT_COF_TYPE>';
			} else {
				$merchant_type = '';
			}
			if ( $merchant_txnid ) {
				$merchant_txnid = '<DS_MERCHANT_COF_TXNID>' . $merchant_txnid . '</DS_MERCHANT_COF_TXNID>';
			} else {
				$merchant_txnid = '';
			}

			if ( 'yes' === $this->not_use_https ) {
				$final_notify_url = $this->notify_url_not_https;
			} else {
				$final_notify_url = $this->notify_url;
			}

			$datos_usuario = array(
				'threeDSInfo'              => 'AuthenticationData',
				'protocolVersion'          => $protocol_version,
				'browserAcceptHeader'      => WCRed()->clean_data( $browser_accept_header ),
				'browserColorDepth'        => $browser_color_depth,
				'browserIP'                => (string) WCRed()->get_the_ip(),
				'browserJavaEnabled'       => WCRed()->clean_data( $java_enabled ),
				'browserJavascriptEnabled' => 'enabled',
				'browserLanguage'          => WCRed()->clean_data( $browser_language ),
				'browserScreenHeight'      => WCRed()->clean_data( $browser_screen_height ),
				'browserScreenWidth'       => WCRed()->clean_data( $browser_screen_width ),
				'browserTZ'                => $browser_tz,
				'threeDSServerTransID'     => (string) $threeddservertransid,
				'browserUserAgent'         => $browser_user_agent,
				'notificationURL'          => (string) $final_notify_url,
				'threeDSCompInd'           => (string) 'Y',
			);
			if ( WCRed()->order_needs_preauth( $order->get_id() ) ) {
				$transaction_type = '1';
			} else {
				$transaction_type = '0';
			}
			$acctinfo       = WCPSD2()->get_acctinfo( $order, $datos_usuario );
			$datos_entrada  = '<DATOSENTRADA>';
			$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
			$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
			$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
			$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
			$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
			$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
			$datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $insite_merchan_name ) . ' ' . WCRed()->clean_data( $insite_merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
			$datos_entrada .= $insite_redsys_token;
			$datos_entrada .= $merchant_identifier_d; // '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
			$datos_entrada .= $merchant_cof; // '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
			$datos_entrada .= $merchant_type;// '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
			$datos_entrada .= $merchant_txnid;// '<DS_MERCHANT_COF_TXNID>' . $txnid . '</DS_MERCHANT_COF_TXNID>';
			 // phpcs:ignore Squiz.PHP.CommentedOutCode.Found
			$datos_entrada .= $lwv; // '<DS_MERCHANT_EXCEP_SCA>LWV o TRA</DS_MERCHANT_EXCEP_SCA>';
			// $datos_entrada .= '<DS_MERCHANT_MERCHANTURL>' . $final_notify_url . '</DS_MERCHANT_MERCHANTURL>';
			$datos_entrada .= '<DS_MERCHANT_EMV3DS>' . $acctinfo . '</DS_MERCHANT_EMV3DS>';
			$datos_entrada .= '</DATOSENTRADA>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The call  5          ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', $datos_entrada );
				WCRed()->log( 'insite', ' ' );
			}

			$xml  = '<REQUEST>';
			$xml .= $datos_entrada;
			$xml .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
			$xml .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
			$xml .= '</REQUEST>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The XML 15            ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', 'trataPeticion 11: ' . $xml );
				WCRed()->log( 'insite', ' ' );
			}

			$cliente    = new SoapClient( $redsys_adr );
			$responsews = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$responsews: ' . print_r( $responsews, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}

			if ( isset( $responsews->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$xml_retorno  = new SimpleXMLElement( $responsews->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$respuestaeds = json_decode( $xml_retorno->OPERACION->Ds_EMV3DS ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				if ( isset( $respuestaeds->threeDSInfo ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$three_ds_info = trim( $respuestaeds->threeDSInfo ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$three_ds_info = '';
				}
				if ( isset( $respuestaeds->protocolVersion ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$protocol_version = trim( $respuestaeds->protocolVersion ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$protocol_version = '';
				}
				if ( isset( $respuestaeds->acsURL ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$acs_url = trim( $respuestaeds->acsURL ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$acs_url = '';
				}
				if ( isset( $respuestaeds->{ 'PAReq'} ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$par_eq = trim( $respuestaeds->{ 'PAReq'} ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$par_eq = '';
				}
				if ( isset( $respuestaeds->MD ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$md = trim( $respuestaeds->MD ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$md = '';
				}
				if ( isset( $respuestaeds->{ 'creq'} ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$creq = trim( $respuestaeds->{ 'creq'} ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$creq = '';
				}
				if ( isset( $xml_retorno->OPERACION->Ds_AuthorisationCode ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$authorisationcode = trim( $xml_retorno->OPERACION->Ds_AuthorisationCode ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$authorisationcode = '';
				}
				if ( isset( $xml_retorno->OPERACION->Ds_Order ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$ordermi = trim( $xml_retorno->OPERACION->Ds_Order ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$ordermi = '';
				}
				if ( isset( $xml_retorno->OPERACION->Ds_Terminal ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dstermnal = trim( $xml_retorno->OPERACION->Ds_Terminal ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$dstermnal = '';
				}
				if ( isset( $xml_retorno->OPERACION->Ds_Card_Country ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dscardcountry = trim( $xml_retorno->OPERACION->Ds_Card_Country ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$dscardcountry = '';
				}
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$xml_retorno 15: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', 'Ds_EMV3DS: ' . $xml_retorno->OPERACION->Ds_EMV3DS ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				WCRed()->log( 'insite', 'threeDSInfo: ' . $three_ds_info );
				WCRed()->log( 'insite', '$protocol_version: ' . $protocol_version );
				WCRed()->log( 'insite', '$acs_url: ' . $acs_url );
				WCRed()->log( 'insite', '$par_eq: ' . $par_eq );
				WCRed()->log( 'insite', '$md: ' . $md );
				WCRed()->log( 'insite', '$creq: ' . $creq );
				WCRed()->log( 'insite', '$authorisationcode: ' . $authorisationcode );
			}
			if ( 'ChallengeRequest' === $three_ds_info ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Doing ChallengeRequest' );
				}
				if ( $par_eq ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'Doing ChallengeRequest: $par_eq' );
						WCRed()->log( 'insite', 'Doing ChallengeRequest $par_eq: ' . $acs_url );
					}
					?>
					<form method="POST" action="<?php echo esc_url( $acs_url ); ?>"  enctype="application/x-www-form-urlencoded">
						<input type="hidden" name="PaReq" value="<?php echo esc_html( $par_eq ); ?>" />
						<input type="hidden" name="MD" value="<?php echo esc_html( $md ); ?>" />
						<input type="hidden" name="TermUrl" value="<?php echo esc_attr( $final_notify_url ); ?>" />
						<input name="submit_3ds" type="submit" class="button-alt" id="submit_pareq" value="' . __( 'Press here if you are not redirected', 'woocommerce-redsys' ) . '" />
					</form>
					<script type="text/javascript">
						document.getElementById('submit_pareq').click();
					</script>
					<?php
				}
				if ( $creq ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'Doing ChallengeRequest: $creq' );
						WCRed()->log( 'insite', 'Doing ChallengeRequest $acs_url: ' . $acs_url );
					}
					?>
					<form method="POST" action="<?php echo esc_url( $acs_url ); ?>" enctype="application/x-www-form-urlencoded">
						<input type="hidden" name="creq" value="<?php echo esc_html( $creq ); ?>" />
						<input name="submit_3ds" type="submit" class="button-alt" id="submit_creq" value="<?php __( 'Press here if you are not redirected', 'woocommerce-redsys' ); ?>" />
					</form>
					<script type="text/javascript">
						document.getElementById('submit_creq').click();
					</script>
					<?php
				}
			}
			if ( ! empty( $authorisationcode ) ) {
				echo 'La operción ha sido aceptado y el número de autorización es: ' . esc_html( $authorisationcode );
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$ordermi: ' . $ordermi );
				}
				$order_id = get_transient( $ordermi . '_insite_redsys_number' );
				$order    = WCRed()->get_order( $order_id );
				$url_ok   = add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) );
				$url_ko   = $order->get_cancel_order_url();
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$url_ok: ' . $url_ok );
					WCRed()->log( 'insite', '$url_ko: ' . $url_ko );
				}
				if ( ! empty( $ordermi ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $ordermi );
				}
				if ( ! empty( $customer ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_customer_redsys', $customer );
				}
				if ( ! empty( $terminal ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $terminal );
				}
				if ( ! empty( $dsdate ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_date_redsys', $dsdate );
				}
				if ( ! empty( $dshour ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_hour_redsys', $dshour );
				}
				if ( ! empty( $authorisationcode ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisationcode );
				}
				if ( ! empty( $dscardcountry ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_card_country_insite', $dscardcountry );
				}
				if ( ! empty( $dscargtype ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_card_type_insite', 'C' === $dscargtype ? 'Credit' : 'Debit' );
				}
				if ( ! empty( $dstermnal ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $dstermnal );
				}
				// Payment completed.
				$order->add_order_note( __( 'HTTP Notification received - payment completed', 'woocommerce-redsys' ) );
				$order->add_order_note( __( 'Authorisation code: ', 'woocommerce-redsys' ) . $authorisationcode );
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'payment_complete() 11' );
				}
				if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
					if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
						sumo_save_subscription_payment_info(
							$order->get_id(),
							array(
								'payment_type'         => 'auto',
								'payment_method'       => 'insite',
								'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
								'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_order_amount' => $order->get_total(),
							)
						);
					}
				}
				$order->payment_complete();
				$needs_preauth = WCRed()->order_needs_preauth( $order->get_id() );
				if ( $needs_preauth ) {
					$order->update_status( 'redsys-pre', __( 'Preauthorized by Redsys', 'woocommerce-redsys' ) );
				}
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Payment complete.' );
				}
				do_action( 'insite_post_payment_complete', $order->get_id() );
				wp_safe_redirect( $url_ok );
				exit;
			}
		}

		$three_ds_info     = get_transient( 'threeDSInfo_' . $order );
		$protocol_version  = get_transient( 'protocolVersion_' . $order );
		$temp_order_number = WCRed()->get_order_meta( $order, '_temp_redsys_order_number', true );
		$do_challenge      = get_transient( $order . '_do_redsys_challenge' );

		if ( '2.1.0' === $protocol_version ) {

			$three_dsserver_transid = get_transient( 'threeDSServerTransID_' . $order );
			$final_notify_url       = get_transient( 'final_notify_url_' . $order );
			$three_ds_method_url    = get_transient( 'threeDSMethodURL_' . $order );
			$acsurl                 = get_transient( $order . '_insite_acsurl' );
			$data                   = array();
			$data                   = array(
				'threeDSServerTransID'         => $three_dsserver_transid,
				'threeDSMethodNotificationURL' => $final_notify_url,
			);
			$json                   = base64_encode( wp_json_encode( $data ) ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_encode
			$creq                   = trim( get_transient( 'creq_' . $order ) );
			$acsurl2                = get_transient( 'acsURL_' . $order );
			if ( $creq ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Doing Creq Form POST ' );
				}
				?>
				<form method="POST" action="<?php echo esc_url( $acsurl2 ); ?>" enctype="application/x-www-form-urlencoded">
					<input type="hidden" name="creq" value="<?php echo esc_html( $creq ); ?>" />
					<input name="submit_3ds" type="submit" class="button-alt" id="submit_creq" value="<?php __( 'Press here if you are not redirected', 'woocommerce-redsys' ); ?>" />
				</form>
				<script type="text/javascript">
					document.getElementById('submit_creq').click();
				</script>
				<?php
			} else {
				wc_enqueue_js(
					'$("body").block({
					message: "<img src=\"' . esc_url( apply_filters( 'woocommerce_ajax_loader_url', $woocommerce->plugin_url() . '/assets/images/select2-spinner.gif' ) ) . '\" alt=\"Redirecting&hellip;\" style=\"float:left; margin-right: 10px;\" />' . __( 'Thank you for your order. We are now redirecting you to 3DSecure Form.', 'woocommerce-redsys' ) . '",
					overlayCSS:
					{
						background: "#fff",
						opacity: 0.6
					},
					css: {
						padding:         20,
						textAlign:       "center",
						color:           "#555",
						border:          "3px solid #aaa",
						backgroundColor: "#fff",
						cursor:          "wait",
						lineHeight:      "32px"
					}
				});
				jQuery("#submit_redsys_payment_form_3").click();
				'
				);
				echo '<form id="3DSform" method="POST" action="' . esc_url( $three_ds_method_url ) . '" target="_top">
				<input type="hidden" name="threeDSMethodData" value="' . esc_html( $json ) . '" />
				<input type="submit" class="button-alt" id="submit_redsys_payment_form_3" value="' . esc_html__( 'Press here if you are not redirected', 'woocommerce-redsys' ) . '" />
				</form>';
			}
		} elseif ( 'ChallengeRequest' === $three_ds_info ) {
			if ( '2.2.0' === $protocol_version ) {
				$creq    = get_transient( 'creq_' . $order );
				$acsurl2 = get_transient( 'acsURL_' . $order );

				if ( $creq ) {
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'Doing Creq Form POST 2.2.0 ' );
						WCRed()->log( 'insite', '$acsurl2: ' . $acsurl2 );
						WCRed()->log( 'insite', '$creq: ' . $creq );
					}
					?>
				<form method="POST" action="<?php echo esc_url( $acsurl2 ); ?>" enctype="application/x-www-form-urlencoded">
					<input type="hidden" name="creq" value="<?php echo esc_html( $creq ); ?>" />
					<input name="submit_3ds" type="submit" class="button-alt" id="submit_creq" value="<?php __( 'Press here if you are not redirected', 'woocommerce-redsys' ); ?>" />
				</form>
				<script type="text/javascript">
					document.getElementById('submit_creq').click();
				</script>
					<?php
				}
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '         Hay Challenge        ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				// Hay challenge.
				$acs_url = trim( get_transient( 'acsURL_' . $order ) );
				$par_eq  = trim( get_transient( 'PAReq_' . $order ) );
				$md      = trim( get_transient( 'MD_' . $order ) );
				if ( 'yes' === $this->not_use_https ) {
					$final_notify_url = $this->notify_url_not_https;
				} else {
					$final_notify_url = $this->notify_url;
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
		jQuery("#submit_redsys_payment_form_2").click();
		'
				);
				echo '<form action="' . esc_url( $acs_url ) . '" method="post" id="redsys_payment_form" target="_top">
			<input type="hidden" name="PaReq" value="' . esc_attr( $par_eq ) . '" />
			<input type="hidden" name="MD" value="' . esc_attr( $md ) . '" />
			<input type="hidden" name="TermUrl" value="' . esc_attr( $final_notify_url ) . '" />
			<input type="submit" class="button-alt" id="submit_redsys_payment_form_2" value="' . esc_html__( 'Pay', 'woocommerce-redsys' ) . '" />
		</form>';
			}
		} else {

			WCRed()->update_order_meta( $order, '_order_number_redsys_woocommerce', $temp_order_number );
			set_transient( $temp_order_number . '_woocommrce_order_number_redsys', $order );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$temp_order_number: ' . $temp_order_number );
				WCRed()->log( 'insite', '$do_challenge: ' . $do_challenge );
				WCRed()->log( 'insite', '$_POST: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}

			if ( isset( $_GET['returnfronredsys'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended

				if ( isset( $_POST['MD'] ) && isset( $_POST['PaRes'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing

					$fuc               = $this->customer;
					$currency_codes    = WCRed()->get_currencies();
					$terminal          = $this->terminal;
					$currency          = $currency_codes[ get_woocommerce_currency() ];
					$transaction_type  = '0';
					$order_id          = $order;
					$merchan_name      = WCRed()->get_order_meta( $order_id, '_billing_first_name', true );
					$merchant_lastnme  = WCRed()->get_order_meta( $order_id, '_billing_last_name', true );
					$temp_order_number = WCRed()->get_order_meta( $order, '_temp_redsys_order_number', true );
					$redsys_order_id   = WCRed()->get_order_meta( $order_id, '_payment_order_number_redsys', true );
					$order             = WCRed()->get_order( $order_id );
					$amount            = $order->get_total();
					$redsys_amount     = WCRed()->redsys_amount_format( $amount );
					$merchant_module   = 'WooCommerce_Redsys_Gateway_' . REDSYS_VERSION . '_WooCommerce.com';
					$user_id           = $order->get_user_id();
					$secretsha256      = $this->get_redsys_sha256( $user_id );
					$redsys_adr        = $this->get_redsys_url_gateway( $user_id );

					$temp_order_number = WCRed()->get_order_meta( $order_id, '_temp_redsys_order_number', true );
					delete_transient( $temp_order_number . '_do_redsys_challenge' );
					$token = get_transient( $order_id . '_insite_token' );

					$md     = sanitize_text_field( wp_unslash( $_POST['MD'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
					$pares  = sanitize_text_field( wp_unslash( $_POST['PaRes'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
					$emv3ds = '{"threeDSInfo":"ChallengeResponse","protocolVersion":"1.0.2","PARes":"' . $pares . '","MD":"' . $md . '"}';

					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '$fuc: ' . $fuc );
						WCRed()->log( 'insite', '$terminal: ' . $terminal );
						WCRed()->log( 'insite', '$currency: ' . $currency );
						WCRed()->log( 'insite', '$transaction_type: ' . $transaction_type );
						WCRed()->log( 'insite', '$order_id: ' . $order_id );
						WCRed()->log( 'insite', '$merchan_name: ' . $merchan_name );
						WCRed()->log( 'insite', '$redsys_order_id: ' . $redsys_order_id );
						WCRed()->log( 'insite', '$temp_order_number: ' . $temp_order_number );
						WCRed()->log( 'insite', '$amount: ' . $amount );
						WCRed()->log( 'insite', '$redsys_amount: ' . $redsys_amount );
						WCRed()->log( 'insite', '$secretsha256: ' . $secretsha256 );
						WCRed()->log( 'insite', '$redsys_adr: ' . $redsys_adr );
						WCRed()->log( 'insite', '$md: ' . $md );
						WCRed()->log( 'insite', '$pares: ' . $pares );
						WCRed()->log( 'insite', '$emv3ds: ' . $emv3ds );
						WCRed()->log( 'insite', '$token: ' . $token );
					}
					if ( class_exists( 'ISAuthenticationMessage' ) ) {
						$request = new ISAuthenticationMessage();
					} elseif ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'ISAuthenticationMessage: NOT DEFINED' );
					}
					if ( 'yes' === $this->debug ) {
						$set_order            = method_exists( $request, 'set_order' );
						$set_amount           = method_exists( $request, 'set_amount' );
						$set_currency         = method_exists( $request, 'set_currency' );
						$set_merchant         = method_exists( $request, 'set_merchant' );
						$set_terminal         = method_exists( $request, 'set_terminal' );
						$set_transaction_type = method_exists( $request, 'set_transaction_type' );
						$add_emv_parameters   = method_exists( $request, 'add_emv_parameters' );
						$add_emv_parameter    = method_exists( $request, 'add_emv_parameter' );

						if ( $set_order ) {
							WCRed()->log( 'insite', 'METHOD $set_order: EXIST' );
						} else {
							WCRed()->log( 'insite', 'METHOD $set_order: NOT EXIST' );
						}

						if ( $set_amount ) {
							WCRed()->log( 'insite', 'METHOD $set_amount: EXIST' );
						} else {
							WCRed()->log( 'insite', 'METHOD $set_amount: NOT EXIST' );
						}

						if ( $set_currency ) {
							WCRed()->log( 'insite', 'METHOD $set_currency: EXIST' );
						} else {
							WCRed()->log( 'insite', 'METHOD $set_currency: NOT EXIST' );
						}

						if ( $set_merchant ) {
							WCRed()->log( 'insite', 'METHOD $set_merchant: EXIST' );
						} else {
							WCRed()->log( 'insite', 'METHOD $set_merchant: NOT EXIST' );
						}

						if ( $set_terminal ) {
							WCRed()->log( 'insite', 'METHOD $set_terminal: EXIST' );
						} else {
							WCRed()->log( 'insite', 'METHOD $set_terminal: NOT EXIST' );
						}

						if ( $set_transaction_type ) {
							WCRed()->log( 'insite', 'METHOD $set_transaction_type: EXIST' );
						} else {
							WCRed()->log( 'insite', 'METHOD $set_transaction_type: NOT EXIST' );
						}

						if ( $add_emv_parameters ) {
							WCRed()->log( 'insite', 'METHOD $add_emv_parameters: EXIST' );
						} else {
							WCRed()->log( 'insite', 'METHOD $add_emv_parameters: NOT EXIST' );
						}

						if ( $add_emv_parameter ) {
							WCRed()->log( 'insite', 'METHOD $add_emv_parameter: EXIST' );
						} else {
							WCRed()->log( 'insite', 'METHOD $add_emv_parameter: NOT EXIST' );
						}
					}

					$request->set_order( $temp_order_number );
					$request->set_amount( $redsys_amount );
					$request->set_currency( $currency );
					$request->set_merchant( $fuc );
					$request->set_terminal( $terminal );
					$request->set_transaction_type( $transaction_type );
					$request->add_emv_parameters(
						array(
							'threeDSInfo'     => 'ChallengeResponse',
							'protocolVersion' => '1.0.2',
							'PARes'           => $pares,
							'MD'              => $md,
						)
					);

					if ( 'yes' === $this->testmode ) {
						$entorno = '0';
					} else {
						$entorno = '1';
					}
					$service   = new ISAuthenticationService( $secretsha256, $entorno );
					$result    = $service->sendOperation( $request );
					$resultado = $result->getResult();

					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '$resultado: ' . $resultado );
					}

					if ( 'OK' === $resultado ) {
						$location = add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) );
						wp_safe_redirect( esc_url( $location ) );
						exit;
					} else {
						echo esc_html__( 'There was a problem:', 'woocommerce-redsys' ) . ' ' . esc_html( $resultado );
					}
				} else {
					echo 'Error';
				}
			}

			if ( isset( $_GET['challenge'] ) || 'yes' === $do_challenge ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				if ( isset( $_GET['challenge'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$challenge = sanitize_text_field( wp_unslash( $_GET['challenge'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '$_GET["challenge"]: is SET' );
					}
				} else {
					$challenge = 'no';
				}
				if ( 'yes' === $challenge || 'yes' === $do_challenge ) {
					$temp_order_number = WCRed()->get_order_meta( $order, '_temp_redsys_order_number', true );
					$order2            = WCRed()->get_order( $order );
					$redirectok        = $order2->get_checkout_payment_url( true ) . '&returnfronredsys=yes';
					$acsurl            = get_transient( $order . '_insite_acsurl' );
					$pareq             = get_transient( $order . '_insite_pareq' );
					$md                = get_transient( $order . '_insite_md' );

					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '$temp_order_number: ' . $temp_order_number );
						WCRed()->log( 'insite', '$order2: ' . $order2 );
						WCRed()->log( 'insite', '$redirectok: ' . $redirectok );
						WCRed()->log( 'insite', '$acsurl: ' . $acsurl );
						WCRed()->log( 'insite', '$pareq: ' . $pareq );
						WCRed()->log( 'insite', '$md: ' . $md );
					}

					wc_enqueue_js(
						'$("body").block({
					message: "<img src=\"' . esc_url( apply_filters( 'woocommerce_ajax_loader_url', $woocommerce->plugin_url() . '/assets/images/select2-spinner.gif' ) ) . '\" alt=\"Redirecting&hellip;\" style=\"float:left; margin-right: 10px;\" />' . __( 'Thank you for your order. We are now redirecting you to 3DSecure Form.', 'woocommerce-redsys' ) . '",
					overlayCSS:
					{
						background: "#fff",
						opacity: 0.6
					},
					css: {
						padding:         20,
						textAlign:       "center",
						color:           "#555",
						border:          "3px solid #aaa",
						backgroundColor: "#fff",
						cursor:          "wait",
						lineHeight:      "32px"
					}
				});
				jQuery("#submit_redsys_payment_form").click();
				'
					);
					echo '<form action="' . esc_url( $acsurl ) . '" method="post" id="redsys_payment_form" target="_top">
			<input type="hidden" name="PaReq" value="' . esc_attr( $pareq ) . '" />
			<input type="hidden" name="TermUrl" value="' . esc_attr( $redirectok ) . '">
			<input type="hidden" name="MD" value="' . esc_attr( $md ) . '" />
			<input type="submit" class="button-alt" id="submit_redsys_payment_form" value="' . esc_html__( 'Press here if you are not redirected', 'woocommerce-redsys' ) . '" />
			</form>';
				}
			}
		}
	}

	/**
	 * Check redsys IPN validity
	 */
	public function check_ipn_request_is_valid() {
		global $woocommerce;

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', 'HTTP Notification received 1: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
		}

		if ( isset( $_GET['threeDSMethodURL'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'check_ipn_request_is_valid > $_GET["threeDSMethodURL"]' );
			}
			$order_id               = sanitize_text_field( wp_unslash( $_GET['order'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$three_ds_info          = get_transient( 'threeDSInfo_' . $order_id );
			$accept_headers         = get_transient( 'accept_headers_' . $order_id );
			$protocol_version       = get_transient( 'protocolVersion_' . $order_id );
			$acs_url                = get_transient( 'acsURL_' . $order_id );
			$three_dsserver_transid = get_transient( 'threeDSServerTransID_' . $order_id );
			$three_ds_method_url    = get_transient( 'threeDSMethodURL_' . $order_id );
			$amount                 = get_transient( 'amount_' . $order_id );
			$order                  = get_transient( 'order_' . $order_id );
			$terminal               = get_transient( 'terminal_' . $order_id );
			$currency               = get_transient( 'currency_' . $order_id );
			$identifier             = get_transient( 'identifier_' . $order_id );
			$cof_ini                = get_transient( 'cof_ini_' . $order_id );
			$cof_type               = get_transient( 'cof_type_' . $order_id );
			$cof_txnid              = get_transient( 'cof_txnid_' . $order_id );
			$final_notify_url       = get_transient( 'final_notify_url_' . $order_id );
			$token_redsys           = get_transient( 'redys_token' . $order_id );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '     IS threeDSMethodURL      ' );
				WCRed()->log( 'insite', '$order_id: ' . $order_id );
				WCRed()->log( 'insite', '$three_ds_info: ' . $three_ds_info );
				WCRed()->log( 'insite', '$accept_headers: ' . $accept_headers );
				WCRed()->log( 'insite', '$protocol_version: ' . $protocol_version );
				WCRed()->log( 'insite', '$three_dsserver_transid: ' . $three_dsserver_transid );
				WCRed()->log( 'insite', '$three_ds_method_url: ' . $three_ds_method_url );
				WCRed()->log( 'insite', '$amount: ' . $amount );
				WCRed()->log( 'insite', '$order: ' . $order );
				WCRed()->log( 'insite', '$terminal: ' . $terminal );
				WCRed()->log( 'insite', '$currency: ' . $currency );
				WCRed()->log( 'insite', '$identifier: ' . $identifier );
				WCRed()->log( 'insite', '$cof_ini: ' . $cof_ini );
				WCRed()->log( 'insite', '$cof_type: ' . $cof_type );
				WCRed()->log( 'insite', '$cof_txnid: ' . $cof_txnid );
				WCRed()->log( 'insite', '$final_notify_url: ' . $final_notify_url );
				WCRed()->log( 'insite', '$token_redsys: ' . $token_redsys );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
			}
			if ( ! empty( $three_dsserver_transid ) && ! empty( $three_ds_method_url ) ) {

				WCRed()->do_make_3dmethod( $order_id );
				?>
				<script type="text/javascript">
					document.getElementById('submit_redsys_3ds_method').click();
				</script>
				<?php
				exit();
			}
			echo 'Es una llamada threeDSMethodURL';
		}

		if ( isset( $_POST['threeDSMethodData'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'check_ipn_request_is_valid > $_POST["threeDSMethodData"]' );
			}
			$json_datos_3d_secure = (string) sanitize_text_field( wp_unslash( $_POST['threeDSMethodData'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$decoded              = (string) rtrim( strtr( base64_decode( $json_datos_3d_secure ), '+/', '-_' ), '=' ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode
			$json_data            = stripslashes( html_entity_decode( $decoded, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401 ) );
			$deco_json            = json_decode( $json_data );
			$order_id             = get_transient( $deco_json->threeDSServerTransID ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$order                = WCRed()->get_order( $order_id );
			$url                  = $order->get_checkout_payment_url( true ) . '&threeDSServerTransID=' . $deco_json->threeDSServerTransID . '&order=' . $order_id; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$deco_json: ' . print_r( $deco_json, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', '$order_id: ' . $order_id );
				WCRed()->log( 'insite', '$url: ' . $url );
			}
			wp_safe_redirect( $url );
			exit;
		}

		if ( isset( $_POST['Ds_SignatureVersion'] ) && isset( $_POST['Ds_MerchantParameters'] ) && isset( $_POST['Ds_Signature'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$version           = sanitize_text_field( wp_unslash( $_POST['Ds_SignatureVersion'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$data              = sanitize_text_field( wp_unslash( $_POST['Ds_MerchantParameters'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$remote_sign       = sanitize_text_field( wp_unslash( $_POST['Ds_Signature'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$mi_obj            = new WooRedsysAPI();
			$decodedata        = $mi_obj->decode_merchant_parameters( $data );
			$ds_amount         = (int) $mi_obj->get_parameter( 'Ds_Amount' );
			$ds_order          = $mi_obj->get_parameter( 'Ds_Order' );
			$dscode            = $mi_obj->get_parameter( 'Ds_MerchantCode' );
			$currency_code     = $mi_obj->get_parameter( 'Ds_Currency' );
			$response          = $mi_obj->get_parameter( 'Ds_Response' );
			$id_trans          = $mi_obj->get_parameter( 'Ds_AuthorisationCode' );
			$dsdate            = $mi_obj->get_parameter( 'Ds_Date' );
			$dshour            = $mi_obj->get_parameter( 'Ds_Hour' );
			$dstermnal         = $mi_obj->get_parameter( 'Ds_Terminal' );
			$dsmerchandata     = $mi_obj->get_parameter( 'Ds_MerchantData' );
			$dssucurepayment   = $mi_obj->get_parameter( 'Ds_SecurePayment' );
			$dscardcountry     = $mi_obj->get_parameter( 'Ds_Card_Country' );
			$dsconsumercountry = $mi_obj->get_parameter( 'Ds_ConsumerLanguage' );
			$dscargtype        = $mi_obj->get_parameter( 'Ds_Card_Type' );
		} else {
			$ds_order  = sanitize_text_field( wp_unslash( $_POST['Ds_Order'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated,WordPress.Security.NonceVerification.Missing
			$ds_amount = (int) sanitize_text_field( wp_unslash( $_POST['Ds_Amount'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated,WordPress.Security.NonceVerification.Missing
		}
		if ( 900 === intval( $response ) ) {
			return true;
		}
		$order_id = get_transient( $ds_order . '_woocommrce_order_number_redsys' );
		$order    = WCRed()->get_order( $order_id );
		$amount   = (int) WCRed()->redsys_amount_format( $order->get_total() );
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', '$ds_order: ' . $ds_order );
			WCRed()->log( 'insite', '$order_id: ' . $order_id );
			WCRed()->log( 'insite', '$ds_amount: ' . $ds_amount );
			WCRed()->log( 'insite', '$amount: ' . $amount );
		}

		if ( $ds_amount === $amount ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Received valid notification from InSite' );
				WCRed()->log( 'insite', $data );
			}
			return true;
		} else {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Received Invalid notification from InSite' );
				WCRed()->log( 'insite', $data );
			}
			return false;
		}
		$user_id         = $order->get_user_id();
		$usesecretsha256 = $this->get_redsys_sha256( $user_id );
		if ( $usesecretsha256 ) {
			$version     = sanitize_text_field( wp_unslash( $_POST['Ds_SignatureVersion'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$data        = sanitize_text_field( wp_unslash( $_POST['Ds_MerchantParameters'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$remote_sign = sanitize_text_field( wp_unslash( $_POST['Ds_Signature'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$mi_obj      = new WooRedsysAPI();
			$localsecret = $mi_obj->create_merchant_signature( $usesecretsha256, $data );
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$localsecret: ' . $localsecret );
				WCRed()->log( 'insite', '$remote_sign: ' . $remote_sign );
			}
		} else {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' HTTP Notification received 2: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}
			if ( $dscode === $this->customer ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Received valid notification from InSite' );
				}
				return true;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Received INVALID notification from InSite' );
				}
				return false;
			}
		}
	}
	/**
	 * Check for InSite CRES
	 *
	 * @param array $post $_POST data.
	 */
	public function check_confirm_cres( $post ) {
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '           Is CRES            ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
		}
		$cres                   = sanitize_text_field( wp_unslash( $_POST['cres'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated,WordPress.Security.NonceVerification.Missing
		$decoded                = (string) rtrim( strtr( base64_decode( $cres ), '+/', '-_' ), '=' ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode
		$json_data              = stripslashes( html_entity_decode( $decoded, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401 ) );
		$deco_json              = json_decode( $json_data );
		$three_dsserver_transid = (string) $deco_json->threeDSServerTransID; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		$acs_trans_id           = (string) $deco_json->acsTransID; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		$message_type           = (string) $deco_json->messageType; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		$message_version        = (string) $deco_json->messageVersion; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		$trans_status           = (string) $deco_json->transStatus; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		$order_id               = get_transient( $three_dsserver_transid );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$cress: ' . $cres );
			WCRed()->log( 'insite', '$decoded: ' . $decoded );
			WCRed()->log( 'insite', '$json_data: ' . $json_data );
			WCRed()->log( 'insite', '$deco_json: ' . print_r( $deco_json, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'insite', '$three_dsserver_transid: ' . $three_dsserver_transid );
			WCRed()->log( 'insite', '$acs_trans_id: ' . $acs_trans_id );
			WCRed()->log( 'insite', '$message_type: ' . $message_type );
			WCRed()->log( 'insite', '$message_version: ' . $message_version );
			WCRed()->log( 'insite', '$trans_status: ' . $trans_status );
			WCRed()->log( 'insite', ' ' );
		}

		$user_id             = get_current_user_id();
		$protocol_version    = get_transient( 'protocolVersion_' . $order_id );
		$merchant_cof        = get_transient( $order_id . '_ds_merchant_cof_ini' );
		$merchant_type       = get_transient( $order_id . '_ds_merchant_cof_type' );
		$excep_sca           = get_transient( $order_id . '_ds_merchant_excep_sca' );
		$token_ioper         = get_transient( $order_id . '_insite_token' );
		$merchant_identifier = get_transient( $order_id . '_insite_token_redsys' );
		$merchant_txnid      = get_transient( $order_id . '_insite_token_txnid' );
		$redsys_adr          = $this->get_redsys_url_gateway_ws();
		$mi_obj              = new WooRedsysAPIWS();
		$secretsha256        = $this->get_redsys_sha256( $user_id );
		$order               = WCRed()->get_order( $order_id );
		$description         = WCRed()->product_description( $order, $order_id );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '           Is CRES            ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$protocol_version: ' . $protocol_version );
			WCRed()->log( 'insite', '$merchant_cof: ' . $merchant_cof );
			WCRed()->log( 'insite', '$merchant_type: ' . $merchant_type );
			WCRed()->log( 'insite', '$excep_sca: ' . $excep_sca );
			WCRed()->log( 'insite', '$token_ioper: ' . $token_ioper );
			WCRed()->log( 'insite', '$merchant_identifier: ' . $merchant_identifier );
			WCRed()->log( 'insite', '$merchant_txnid: ' . $merchant_txnid );
			WCRed()->log( 'insite', '$redsys_adr: ' . $redsys_adr );
			WCRed()->log( 'insite', '$secretsha256: ' . $secretsha256 );
			WCRed()->log( 'insite', '/****************************/' );
		}

		if ( $token_ioper ) {
			$token_ioper = '<DS_MERCHANT_IDOPER>' . $merchant_identifier . '</DS_MERCHANT_IDOPER>';
		} else {
			$token_ioper = '';
		}
		if ( 'no' !== $merchant_identifier && ! empty( $merchant_identifier ) ) {
			$merchant_identifier_d = '<DS_MERCHANT_IDENTIFIER>' . $merchant_identifier . '</DS_MERCHANT_IDENTIFIER>';
		} elseif ( 'S' === $merchant_cof ) {
			$merchant_identifier_d = '<DS_MERCHANT_IDENTIFIER>REQUIRED</DS_MERCHANT_IDENTIFIER>';
		} else {
			$merchant_identifier_d = '';
		}
		if ( $merchant_cof ) {
			$merchant_cof_d = '<DS_MERCHANT_COF_INI>' . $merchant_cof . '</DS_MERCHANT_COF_INI>';
		} else {
			$merchant_cof_d = '';
		}
		if ( $merchant_type ) {
			$merchant_type_d = '<DS_MERCHANT_COF_TYPE>' . $merchant_type . '</DS_MERCHANT_COF_TYPE>';
		} else {
			$merchant_type_d = '';
		}
		if ( 'no' !== $merchant_identifier && ! empty( $merchant_identifier && $merchant_txnid ) ) {
			$merchant_txnid_d = '<DS_MERCHANT_COF_TXNID>' . $merchant_txnid . '</DS_MERCHANT_COF_TXNID>';
		} else {
			$merchant_txnid_d = '';
		}

		$order_total_sign        = get_transient( $order_id . '_insite_merchant_amount' );
		$orderid2                = get_transient( $order_id . '_insite_merchant_order' );
		$customer                = get_transient( $order_id . '_insite_merchantcode' );
		$terminal                = get_transient( $order_id . '_insite_terminal' );
		$transaction_type        = get_transient( $order_id . '_insite_transaction_type' );
		$currency                = get_transient( $order_id . '_insite_currency' );
		$insite_merchan_name     = WCRed()->get_order_meta( $order_id, '_billing_first_name', true );
		$insite_merchant_lastnme = WCRed()->get_order_meta( $order_id, '_billing_last_name', true );

		if ( $order_total_sign <= 3000 && 'yes' === $this->lwvactive ) {
			$lwv = '<DS_MERCHANT_EXCEP_SCA>LWV</DS_MERCHANT_EXCEP_SCA>';
		} else {
			$lwv = '';
		}
		if ( 'yes' === $this->traactive && $order_total_sign <= ( 100 * (int) $this->traamount ) && $order_total_sign > 3000 ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', 'Using TRA' );
				WCRed()->log( 'insite', ' ' );
			}
			$lwv = '<DS_MERCHANT_EXCEP_SCA>TRA</DS_MERCHANT_EXCEP_SCA>';
		}

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '           Is CRES            ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$order_total_sign: ' . $order_total_sign );
			WCRed()->log( 'insite', '$orderid2: ' . $orderid2 );
			WCRed()->log( 'insite', '$customer: ' . $customer );
			WCRed()->log( 'insite', '$terminal: ' . $terminal );
			WCRed()->log( 'insite', '$transaction_type: ' . $transaction_type );
			WCRed()->log( 'insite', '$currency: ' . $currency );
			WCRed()->log( 'insite', '$insite_merchan_name: ' . $insite_merchan_name );
			WCRed()->log( 'insite', '$insite_merchant_lastnme: ' . $insite_merchant_lastnme );
		}
		if ( 'yes' === $this->not_use_https ) {
			$final_notify_url = $this->notify_url_not_https;
		} else {
			$final_notify_url = $this->notify_url;
		}

		$response3ds      = array(
			'threeDSInfo'     => 'ChallengeResponse',
			'protocolVersion' => $message_version,
			'cres'            => $cres,
		);
		$response3ds_json = wp_json_encode( $response3ds );

		if ( WCRed()->order_needs_preauth( $order_id ) ) {
			$transaction_type = '1';
		} else {
			$transaction_type = '0';
		}
		if ( $merchant_identifier && $merchant_txnid ) {
			$datos_entrada  = '<DATOSENTRADA>';
			$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
			$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
			$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
			$datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $insite_merchan_name ) . ' ' . WCRed()->clean_data( $insite_merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
			$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
			$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
			$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
			$datos_entrada .= '<DS_MERCHANT_PRODUCTDESCRIPTION>' . WCRed()->clean_data( $description ) . '</DS_MERCHANT_PRODUCTDESCRIPTION>';
			$datos_entrada .= $merchant_identifier_d; // '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
			$datos_entrada .= $merchant_cof_d; // '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
			$datos_entrada .= $merchant_type_d;// '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
			$datos_entrada .= $merchant_txnid_d;// '<DS_MERCHANT_COF_TXNID>' . $txnid . '</DS_MERCHANT_COF_TXNID>';
			$datos_entrada .= $lwv;
			// phpcs:ignore Squiz.PHP.CommentedOutCode.Found
			// $datos_entrada .= '<DS_MERCHANT_MERCHANTURL>' . $final_notify_url . '</DS_MERCHANT_MERCHANTURL>';
			$datos_entrada .= '<DS_MERCHANT_EMV3DS>' . $response3ds_json . '</DS_MERCHANT_EMV3DS>';
			$datos_entrada .= '</DATOSENTRADA>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The call  6          ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', $datos_entrada );
				WCRed()->log( 'insite', ' ' );
			}

			$xml  = '<REQUEST>';
			$xml .= $datos_entrada;
			$xml .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
			$xml .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
			$xml .= '</REQUEST>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The XML 16            ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', 'trataPeticion 12: ' . $xml );
				WCRed()->log( 'insite', ' ' );
			}

			$cliente    = new SoapClient( $redsys_adr );
			$responsews = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$responsews: ' . print_r( $responsews, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}

			if ( isset( $responsews->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$xml_retorno = new SimpleXMLElement( $responsews->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				if ( isset( $xml_retorno->OPERACION->Ds_EMV3DS ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$respuestaeds = json_decode( $xml_retorno->OPERACION->Ds_EMV3DS ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$respuestaeds = false;
				}
				if ( isset( $xml_retorno->CODIGO ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$codigo = (string) $xml_retorno->CODIGO; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$codigo = false;
				}
				if ( isset( $xml_retorno->OPERACION->Ds_Order ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$ordermi = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$ordermi = false;
				}
				if ( isset( $xml_retorno->OPERACION->Ds_Terminal ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dstermnal = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$dstermnal = false;
				}
				if ( isset( $respuestaeds->threeDSInfo ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$three_ds_info = trim( $respuestaeds->threeDSInfo ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$three_ds_info = false;
				}
				if ( isset( $respuestaeds->protocolVersion ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$protocol_version = trim( $respuestaeds->protocolVersion ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$protocol_version = false;
				}
				if ( isset( $respuestaeds->acsURL ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$acs_url = trim( $respuestaeds->acsURL ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$acs_url = false;
				}
				if ( isset( $respuestaeds->{ 'PAReq'} ) ) {
					$par_eq = trim( $respuestaeds->{ 'PAReq'} );
				} else {
					$par_eq = false;
				}
				if ( isset( $respuestaeds->MD ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$md = trim( $respuestaeds->MD ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$md = false;
				}
				if ( isset( $respuestaeds->{ 'creq'} ) ) {
					$creq = trim( $respuestaeds->{ 'creq'} );
				} else {
					$creq = false;
				}
				if ( isset( $xml_retorno->OPERACION->Ds_AuthorisationCode ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$authorisationcode = trim( $xml_retorno->OPERACION->Ds_AuthorisationCode ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$authorisationcode = false;
				}
				$dsdate = date( get_option( 'date_format' ) ); // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
				$dshour = date( 'H:i:s', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$xml_retorno 16: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', 'Ds_EMV3DS: ' . $xml_retorno->OPERACION->Ds_EMV3DS ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				WCRed()->log( 'insite', '$codigo: ' . $codigo );
				WCRed()->log( 'insite', 'threeDSInfo: ' . $three_ds_info );
				WCRed()->log( 'insite', '$protocol_version: ' . $protocol_version );
				WCRed()->log( 'insite', '$acs_url: ' . $acs_url );
				WCRed()->log( 'insite', '$par_eq: ' . $par_eq );
				WCRed()->log( 'insite', '$md: ' . $md );
				WCRed()->log( 'insite', '$creq: ' . $creq );
				WCRed()->log( 'insite', '$authorisationcode: ' . $authorisationcode );
			}

			if ( $authorisationcode ) {
				$order  = WCRed()->get_order( $order_id );
				$url_ok = add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) );
				$url_ko = $order->get_cancel_order_url();
				if ( ! empty( $ordermi ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $ordermi );
				}
				if ( ! empty( $dsdate ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_date_redsys', $dsdate );
				}
				if ( ! empty( $dshour ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_hour_redsys', $dshour );
				}
				if ( ! empty( $authorisationcode ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisationcode );
				}
				if ( ! empty( $dscardcountry ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_card_country_insite', $dscardcountry );
				}
				if ( ! empty( $dscargtype ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_card_type_insite', 'C' === $dscargtype ? 'Credit' : 'Debit' );
				}
				if ( ! empty( $dstermnal ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $dstermnal );
				}
				// Payment completed.
				$order->add_order_note( __( 'HTTP Notification received - payment completed', 'woocommerce-redsys' ) );
				$order->add_order_note( __( 'Authorisation code: ', 'woocommerce-redsys' ) . $authorisationcode );
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'payment_complete() 12' );
				}
				if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
					if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
						sumo_save_subscription_payment_info(
							$order->get_id(),
							array(
								'payment_type'         => 'auto',
								'payment_method'       => 'insite',
								'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
								'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_order_amount' => $order->get_total(),
							)
						);
					}
				}
				$order->payment_complete();
				$needs_preauth = WCRed()->order_needs_preauth( $order->get_id() );
				if ( $needs_preauth ) {
					$order->update_status( 'redsys-pre', __( 'Preauthorized by Redsys', 'woocommerce-redsys' ) );
				}
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Payment complete.' );
				}
				do_action( 'insite_post_payment_complete', $order->get_id() );
				wp_safe_redirect( $url_ok );
				exit;
			}
			if ( $codigo ) {
				$error = WCRed()->get_error( $codigo );
				$order->add_order_note( esc_html__( 'There was a problem with this order. The Error was ', 'woocommerce-redsys' ) . $error );
				do_action( 'insite_post_payment_error', $order->get_id(), $error );
				wp_safe_redirect( wc_get_checkout_url() . '?error=' . $error );
				exit;
			} else {
				$response = '0190';
				wp_safe_redirect( wc_get_checkout_url() . '?error=' . $response );
				exit;
			}
		} else {
			$datos_entrada  = '<DATOSENTRADA>';
			$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
			$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
			$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
			$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $terminal . '</DS_MERCHANT_TERMINAL>';
			$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
			$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
			$datos_entrada .= '<DS_MERCHANT_TITULAR>' . WCRed()->clean_data( $insite_merchan_name ) . ' ' . WCRed()->clean_data( $insite_merchant_lastnme ) . '</DS_MERCHANT_TITULAR>';
			$datos_entrada .= '<DS_MERCHANT_PRODUCTDESCRIPTION>' . WCRed()->clean_data( $description ) . '</DS_MERCHANT_PRODUCTDESCRIPTION>';
			$datos_entrada .= $merchant_identifier_d; // '<DS_MERCHANT_IDENTIFIER>' . $customer_token . '</DS_MERCHANT_IDENTIFIER>';
			$datos_entrada .= $merchant_cof_d; // '<DS_MERCHANT_COF_INI>N</DS_MERCHANT_COF_INI>';
			$datos_entrada .= $merchant_type_d;// '<DS_MERCHANT_COF_TYPE>R</DS_MERCHANT_COF_TYPE>';
			$datos_entrada .= $merchant_txnid_d;// '<DS_MERCHANT_COF_TXNID>' . $txnid . '</DS_MERCHANT_COF_TXNID>';
			$datos_entrada .= $lwv;
			// phpcs:ignore Squiz.PHP.CommentedOutCode.Found
			// $datos_entrada .= '<DS_MERCHANT_MERCHANTURL>' . $final_notify_url . '</DS_MERCHANT_MERCHANTURL>';
			$datos_entrada .= '<DS_MERCHANT_EMV3DS>' . $response3ds_json . '</DS_MERCHANT_EMV3DS>';
			$datos_entrada .= '</DATOSENTRADA>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The call  7          ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', $datos_entrada );
				WCRed()->log( 'insite', ' ' );
			}

			$xml  = '<REQUEST>';
			$xml .= $datos_entrada;
			$xml .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
			$xml .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
			$xml .= '</REQUEST>';

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', '          The XML 17            ' );
				WCRed()->log( 'insite', '/****************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', 'trataPeticion 13: ' . $xml );
				WCRed()->log( 'insite', ' ' );
			}

			$cliente    = new SoapClient( $redsys_adr );
			$responsews = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '$responsews: ' . print_r( $responsews, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}

			if ( isset( $responsews->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$xml_retorno       = new SimpleXMLElement( $responsews->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$authorisationcode = (string) $xml_retorno->OPERACION->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$codigo            = (string) $xml_retorno->CODIGO; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$redsys_order      = (string) $xml_retorno->OPERACION->Ds_Order; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$terminal          = (string) $xml_retorno->OPERACION->Ds_Terminal; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$currency_code     = (string) $xml_retorno->OPERACION->Ds_Currency; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$response          = (string) $xml_retorno->OPERACION->Ds_Response; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				if ( isset( $xml_retorno->OPERACION->Ds_Merchant_Identifier ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$xpiration_date = (string) $xml_retorno->OPERACION->Ds_ExpiryDate; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$identifier     = (string) $xml_retorno->OPERACION->Ds_Merchant_Identifier; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$dscardbrand    = (string) $xml_retorno->OPERACION->Ds_Card_Brand; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$txnid          = (string) $xml_retorno->OPERACION->Ds_Merchant_Cof_Txnid; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$number         = (string) $xml_retorno->OPERACION->Ds_Card_Number; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$number2        = (string) $xml_retorno->OPERACION->Ds_CardNumber; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				} else {
					$identifier = false;
				}
			}

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$xml_retorno 17: ' . print_r( $xml_retorno, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				WCRed()->log( 'insite', '$authorisationcode: ' . $authorisationcode );
				WCRed()->log( 'insite', '$codigo: ' . $codigo );
				WCRed()->log( 'insite', '$redsys_order: ' . $redsys_order );
				WCRed()->log( 'insite', '$terminal: ' . $terminal );
				WCRed()->log( 'insite', '$currency_code: ' . $currency_code );
				WCRed()->log( 'insite', '$response: ' . $response );
			}

			if ( $authorisationcode ) {
				$order  = WCRed()->get_order( $order_id );
				$url_ok = add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) );
				$url_ko = $order->get_cancel_order_url();
				$dsdate = date( 'd/m/Y', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
				$dshour = date( 'H:i', current_time( 'timestamp', 0 ) ); // phpcs:ignore WordPress.DateTime.CurrentTimeTimestamp.Requested,WordPress.DateTime.RestrictedFunctions.date_date
				if ( ! empty( $redsys_order ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $redsys_order );
				}
				if ( ! empty( $dsdate ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_date_redsys', $dsdate );
				}
				if ( ! empty( $dshour ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_hour_redsys', $dshour );
				}
				if ( ! empty( $authorisationcode ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisationcode );
				}
				if ( ! empty( $dscardcountry ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_card_country_insite', $dscardcountry );
				}
				if ( ! empty( $dscargtype ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_card_type_insite', 'C' === $dscargtype ? 'Credit' : 'Debit' );
				}
				if ( ! empty( $terminal ) ) {
					WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $terminal );
				}
				// Payment completed.
				$order->add_order_note( __( 'HTTP Notification received - payment completed', 'woocommerce-redsys' ) );
				$order->add_order_note( __( 'Authorisation code: ', 'woocommerce-redsys' ) . $authorisationcode );
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'payment_complete() 13' );
				}
				if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
					if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
						sumo_save_subscription_payment_info(
							$order->get_id(),
							array(
								'payment_type'         => 'auto',
								'payment_method'       => 'insite',
								'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
								'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
								'payment_order_amount' => $order->get_total(),
							)
						);
					}
				}
				$order->payment_complete();
				$needs_preauth = WCRed()->order_needs_preauth( $order->get_id() );
				if ( $needs_preauth ) {
					$order->update_status( 'redsys-pre', __( 'Preauthorized by Redsys', 'woocommerce-redsys' ) );
				}
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Payment complete.' );
				}
				if ( $identifier ) {
					$user_id       = $order->get_user_id();
					$dsexpiryyear  = '20' . substr( $xpiration_date, 0, 2 );
					$dsexpirymonth = substr( $xpiration_date, -2 );
					$dscardbrand   = WCRed()->get_card_brand( $dscardbrand );
					$dscardnumber4 = WCRed()->get_last_four( $number, $number2 );

					if ( 'C' === $merchant_type ) {
						$token_type = 'C';
					} else {
						$token_type = 'R';
					}

					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'Saving Credit Card $dsexpirymonth.' );
						WCRed()->log( 'insite', '$user_id: ' . $user_id );
						WCRed()->log( 'insite', '$dsexpirymonth: ' . $dsexpirymonth );
						WCRed()->log( 'insite', '$dsexpiryyear: ' . $dsexpiryyear );
						WCRed()->log( 'insite', '$dscardbrand: ' . $dscardbrand );
						WCRed()->log( 'insite', '$identifier: ' . $identifier );
						WCRed()->log( 'insite', '$txnid: ' . $txnid );
						WCRed()->log( 'insite', '$token_type: ' . $token_type );
						WCRed()->log( 'insite', '$dscardnumber4: ' . $dscardnumber4 );
					}

					$token = new WC_Payment_Token_CC();
					$token->set_token( $identifier );
					$token->set_gateway_id( 'redsys' );
					$token->set_user_id( $user_id );
					$token->set_card_type( $dscardbrand );
					$token->set_last4( $dscardnumber4 );
					$token->set_expiry_month( $dsexpirymonth );
					$token->set_expiry_year( $dsexpiryyear );
					$token->set_default( true );
					$token->save();
					$token_id = $token->get_id();
					WCRed()->set_txnid( $token_id, $txnid );
					WCRed()->set_token_type( $token_id, $token_type );
				}
				do_action( 'insite_post_payment_complete', $order->get_id() );
				wp_safe_redirect( $url_ok );
				exit;
			} elseif ( $response ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$order_id: ' . $order_id );
					WCRed()->log( 'insite', 'There is $response code' );
				}
				$order = WCRed()->get_order( $order_id );
				$error = WCRed()->get_error( $response );
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$error:' . $error );
				}
				$order->add_order_note( esc_html__( 'There was a problem with this order. The Error was ', 'woocommerce-redsys' ) . $error );
				do_action( 'insite_post_payment_error', $order->get_id(), $error );
				wp_safe_redirect( wc_get_checkout_url() . '?error=' . $error );
				exit;
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'There is NOT $response code' );
				}
				$order = WCRed()->get_order( $order_id );
				$error = 'Unknown: There is NOT $response code';
				do_action( 'insite_post_payment_error', $order->get_id(), $error );
				$error = '0190';
				wp_safe_redirect( wc_get_checkout_url() . '?error=' . $error );
				exit;
			}
		}
	}
	/**
	 * Check for PaRes
	 *
	 * @param array $post $_POST data.
	 */
	public function check_confirm_pares( $post ) {

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '           Is PaRes           ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
		}
		$pares                = sanitize_text_field( wp_unslash( $_POST['PaRes'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated,WordPress.Security.NonceVerification.Missing
		$md                   = sanitize_text_field( wp_unslash( $_POST['MD'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated,WordPress.Security.NonceVerification.Missing
		$order_id             = get_transient( $md );
		$order                = WCRed()->get_order( $order_id );
		$user_id              = $order->get_user_id();
		$type                 = 'ws';
		$redsys_adr           = $this->get_redsys_url_gateway_ws( $user_id, $type );
		$order_total_sign     = get_transient( 'amount_' . $md );
		$orderid2             = get_transient( 'order_' . $md );
		$customer             = get_transient( 'merchantcode_' . $md );
		$ds_merchant_terminal = get_transient( 'terminal_' . $md );
		$currency             = get_transient( 'currency_' . $md );
		$customer_token_c     = get_transient( 'identifier_' . $md );
		$cof_ini              = get_transient( 'cof_ini_' . $md );
		$cof_type             = get_transient( 'cof_type_' . $md );
		$cof_txnid            = get_transient( 'cof_txnid_' . $md );
		$mi_obj               = new WooRedsysAPIWS();
		$secretsha256         = $this->get_redsys_sha256( $user_id );
		$url_ok               = add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) );
		$description          = WCRed()->product_description( $order, $order_id );
		$needed               = wp_json_encode(
			array(
				'threeDSInfo'     => 'ChallengeResponse',
				'MD'              => $md,
				'protocolVersion' => '1.0.2',
				'PARes'           => $pares,
			)
		);
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$pares: ' . $pares );
			WCRed()->log( 'insite', '$md: ' . $md );
			WCRed()->log( 'insite', '$order_id: ' . $order_id );
			WCRed()->log( 'insite', '$user_id: ' . $user_id );
			WCRed()->log( 'insite', '$redsys_adr: ' . $redsys_adr );
			WCRed()->log( 'insite', '$order_total_sign: ' . $order_total_sign );
			WCRed()->log( 'insite', '$orderid2: ' . $orderid2 );
			WCRed()->log( 'insite', '$customer: ' . $customer );
			WCRed()->log( 'insite', '$ds_merchant_terminal: ' . $ds_merchant_terminal );
			WCRed()->log( 'insite', '$currency: ' . $currency );
			WCRed()->log( 'insite', '$parcustomer_token_ces: ' . $customer_token_c );
			WCRed()->log( 'insite', '$cof_ini: ' . $cof_ini );
			WCRed()->log( 'insite', '$cof_type: ' . $cof_type );
			WCRed()->log( 'insite', '$cof_txnid: ' . $cof_txnid );
			WCRed()->log( 'insite', '$secretsha256: ' . $secretsha256 );
			WCRed()->log( 'insite', '$url_ok: ' . $url_ok );
			WCRed()->log( 'insite', '$description: ' . $description );
			WCRed()->log( 'insite', '$type: ' . $type );
		}

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '$pares: ' . $pares );
			WCRed()->log( 'insite', '$order_id: ' . $order_id );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
		}

		if ( $order_total_sign <= 3000 && 'yes' === $this->lwvactive ) {
			$lwv = '<DS_MERCHANT_EXCEP_SCA>LWV</DS_MERCHANT_EXCEP_SCA>';
		} else {
			$lwv = '';
		}
		if ( 'yes' === $this->traactive && $order_total_sign <= ( 100 * (int) $this->traamount ) && $order_total_sign > 3000 ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', 'Using TRA' );
				WCRed()->log( 'insite', ' ' );
			}
			$lwv = '<DS_MERCHANT_EXCEP_SCA>TRA</DS_MERCHANT_EXCEP_SCA>';
		}
		if ( WCRed()->order_needs_preauth( $order_id ) ) {
			$transaction_type = '1';
		} else {
			$transaction_type = '0';
		}
		$datos_entrada  = '<DATOSENTRADA>';
		$datos_entrada .= '<DS_MERCHANT_AMOUNT>' . $order_total_sign . '</DS_MERCHANT_AMOUNT>';
		$datos_entrada .= '<DS_MERCHANT_ORDER>' . $orderid2 . '</DS_MERCHANT_ORDER>';
		$datos_entrada .= '<DS_MERCHANT_MERCHANTCODE>' . $customer . '</DS_MERCHANT_MERCHANTCODE>';
		$datos_entrada .= '<DS_MERCHANT_TERMINAL>' . $ds_merchant_terminal . '</DS_MERCHANT_TERMINAL>';
		$datos_entrada .= '<DS_MERCHANT_CURRENCY>' . $currency . '</DS_MERCHANT_CURRENCY>';
		$datos_entrada .= '<DS_MERCHANT_PRODUCTDESCRIPTION>' . WCRed()->clean_data( $description ) . '</DS_MERCHANT_PRODUCTDESCRIPTION>';
		$datos_entrada .= '<DS_MERCHANT_TRANSACTIONTYPE>' . $transaction_type . '</DS_MERCHANT_TRANSACTIONTYPE>';
		$datos_entrada .= '<DS_MERCHANT_IDENTIFIER>' . $customer_token_c . '</DS_MERCHANT_IDENTIFIER>';
		$datos_entrada .= '<DS_MERCHANT_COF_INI>' . $cof_ini . '</DS_MERCHANT_COF_INI>';
		$datos_entrada .= '<DS_MERCHANT_COF_TYPE>' . $cof_type . '</DS_MERCHANT_COF_TYPE>';
		$datos_entrada .= '<DS_MERCHANT_COF_TXNID>' . $cof_txnid . '</DS_MERCHANT_COF_TXNID>';
		$datos_entrada .= $lwv;
		$datos_entrada .= '<DS_MERCHANT_EMV3DS>' . $needed . '</DS_MERCHANT_EMV3DS>';
		$datos_entrada .= '</DATOSENTRADA>';
		$xml            = '<REQUEST>';
		$xml           .= $datos_entrada;
		$xml           .= '<DS_SIGNATUREVERSION>HMAC_SHA256_V1</DS_SIGNATUREVERSION>';
		$xml           .= '<DS_SIGNATURE>' . $mi_obj->create_merchant_signature_host_to_host( $secretsha256, $datos_entrada ) . '</DS_SIGNATURE>';
		$xml           .= '</REQUEST>';

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '$datos_entrada 4: ' . $datos_entrada );
			WCRed()->log( 'insite', 'trataPeticion 14: ' . $xml );
			WCRed()->log( 'insite', ' ' );
		}

		$cliente    = new SoapClient( $redsys_adr );
		$responsews = $cliente->trataPeticion( array( 'datoEntrada' => $xml ) );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' $responsews: ' . print_r( $responsews, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
		}

		if ( isset( $responsews->trataPeticionReturn ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$xml_retorno = new SimpleXMLElement( $responsews->trataPeticionReturn ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			if ( isset( $xml_retorno->OPERACION->Ds_Response ) ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				$respuesta = (int) $xml_retorno->OPERACION->Ds_Response; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
				if ( ( $respuesta >= 0 ) && ( $respuesta <= 99 ) ) {
					$auth_code = $xml_retorno->OPERACION->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', ' ' );
						WCRed()->log( 'insite', 'Response: Ok > ' . $respuesta );
						WCRed()->log( 'insite', 'Authorization code: ' . $auth_code );
						WCRed()->log( 'insite', ' ' );
					}
					$auth_code = (string) $xml_retorno->OPERACION->Ds_AuthorisationCode; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
					$order->add_order_note( __( 'HTTP Notification received - Payment completed', 'woocommerce-redsys' ) );
					$order->add_order_note( __( 'Authorization code: ', 'woocommerce-redsys' ) . $auth_code );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', '$order_id: ' . $order_id );
						WCRed()->log( 'insite', '_authorisation_code_redsys: ' . $auth_code );
						WCRed()->log( 'insite', '_redsys_done: yes' );
						WCRed()->log( 'insite', '_payment_terminal_redsys: ' . $ds_merchant_terminal );
						WCRed()->log( 'insite', '_payment_order_number_redsys: ' . $orderid2 );
					}
					WCRed()->update_order_meta( $order_id, '_authorisation_code_redsys', $auth_code );
					WCRed()->update_order_meta( $order_id, '_redsys_done', 'yes' );
					WCRed()->update_order_meta( $order_id, '_payment_terminal_redsys', $ds_merchant_terminal );
					WCRed()->update_order_meta( $order_id, '_payment_order_number_redsys', $orderid2 );
					if ( 'yes' === $this->debug ) {
						WCRed()->log( 'insite', 'payment_complete() 14' );
					}
					if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
						if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
							sumo_save_subscription_payment_info(
								$order->get_id(),
								array(
									'payment_type'         => 'auto',
									'payment_method'       => 'insite',
									'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
									'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
									'payment_order_amount' => $order->get_total(),
								)
							);
						}
					}
					$order->payment_complete();
					$needs_preauth = WCRed()->order_needs_preauth( $order->get_id() );
					if ( $needs_preauth ) {
						$order->update_status( 'redsys-pre', __( 'Preauthorized by Redsys', 'woocommerce-redsys' ) );
					}
					do_action( 'insite_post_payment_complete', $order->get_id() );
					return true;
				}
			}
		}
		return false;
	}
	/**
	 * Check for Servired/RedSys HTTP Notification
	 */
	public function check_ipn_response() {

		@ob_clean(); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged

		$_POST = stripslashes_deep( $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Missing

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', '      check_ipn_response() : ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
			WCRed()->log( 'insite', '/****************************/' );
			WCRed()->log( 'insite', ' ' );
		}

		if ( isset( $_POST['cres'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$this->check_confirm_cres( $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		}

		if ( isset( $_POST['PaRes'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$result = $this->check_confirm_pares( $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Missing

			if ( $result ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '      Pares confirmado        ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				$md       = sanitize_text_field( wp_unslash( $_POST['MD'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
				$order_id = get_transient( $md );
				$order    = WCRed()->get_order( $order_id );
				$url_ok   = add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) );
				echo '<script>window.top.location.href = "' . esc_url( $url_ok ) . '"</script>';
				exit();
			} else {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', '     Pares NO confirmado      ' );
					WCRed()->log( 'insite', '/****************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				$md       = sanitize_text_field( wp_unslash( $_POST['MD'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
				$order_id = get_transient( $md );
				$order    = WCRed()->get_order( $order_id );
				$url_ko   = $order->get_cancel_order_url();
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', '$order_id: ' . $order_id );
					WCRed()->log( 'insite', '$url_ko: ' . $url_ko );
				}
				$response = '0190';
				wp_safe_redirect( wc_get_checkout_url() . '?error=' . $response );
				exit();
			}
		} elseif ( $this->check_ipn_request_is_valid() ) {
			header( 'HTTP/1.1 200 OK' );
			do_action( 'valid_' . $this->id . '_standard_ipn_request', $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		} else {
			wp_die( esc_html( 'There is nothing to see here, do not access this page directly (InSite)' ), '', array( 'response' => 400 ) );
		}
	}
	/**
	 * Successful Payment.
	 *
	 * @param array $posted Post data after processing.
	 */
	public function successful_request( $posted ) {
		global $woocommerce;

		if ( isset( $_POST['Ds_SignatureVersion'] ) && isset( $_POST['Ds_MerchantParameters'] ) && isset( $_POST['Ds_Signature'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$version           = sanitize_text_field( wp_unslash( $_POST['Ds_SignatureVersion'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$data              = sanitize_text_field( wp_unslash( $_POST['Ds_MerchantParameters'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$remote_sign       = sanitize_text_field( wp_unslash( $_POST['Ds_Signature'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$mi_obj            = new WooRedsysAPI();
			$decodedata        = $mi_obj->decode_merchant_parameters( $data );
			$total             = (int) $mi_obj->get_parameter( 'Ds_Amount' );
			$ordermi           = $mi_obj->get_parameter( 'Ds_Order' );
			$dstransactiontype = $mi_obj->get_parameter( 'Ds_TransactionType' );
			$dscode            = $mi_obj->get_parameter( 'Ds_MerchantCode' );
			$currency_code     = $mi_obj->get_parameter( 'Ds_Currency' );
			$response          = $mi_obj->get_parameter( 'Ds_Response' );
			$id_trans          = $mi_obj->get_parameter( 'Ds_AuthorisationCode' );
			$dsdate            = $mi_obj->get_parameter( 'Ds_Date' );
			$dshour            = $mi_obj->get_parameter( 'Ds_Hour' );
			$dstermnal         = $mi_obj->get_parameter( 'Ds_Terminal' );
			$dsmerchandata     = $mi_obj->get_parameter( 'Ds_MerchantData' );
			$dssucurepayment   = $mi_obj->get_parameter( 'Ds_SecurePayment' );
			$dscardcountry     = $mi_obj->get_parameter( 'Ds_Card_Country' );
			$dsconsumercountry = $mi_obj->get_parameter( 'Ds_ConsumerLanguage' );
			$dscargtype        = $mi_obj->get_parameter( 'Ds_Card_Type' );
			$tokennum          = $mi_obj->get_parameter( 'Ds_Merchant_Identifier' );
			$card_brand        = $mi_obj->get_parameter( 'Ds_Card_Brand' );
			$card_txnid        = $mi_obj->get_parameter( 'Ds_Merchant_Cof_Txnid' );
			$expiry_date       = $mi_obj->get_parameter( 'Ds_ExpiryDate' );
			$order2            = get_transient( $ordermi . '_woocommrce_order_number_redsys' );

			if ( ! $order2 ) {
				$order2 = WCRed()->clean_order_number( $ordermi );
			}
			sleep( 3 );
			$order   = WCRed()->get_order( (int) $order2 );
			$is_paid = WCRed()->is_paid( $order2 );
		} else {
			$total             = sanitize_text_field( wp_unslash( $_POST['Ds_Amount'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$ordermi           = sanitize_text_field( wp_unslash( $_POST['Ds_Order'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$dscode            = sanitize_text_field( wp_unslash( $_POST['Ds_MerchantCode'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$currency_code     = sanitize_text_field( wp_unslash( $_POST['Ds_Currency'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$response          = sanitize_text_field( wp_unslash( $_POST['Ds_Response'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$id_trans          = sanitize_text_field( wp_unslash( $_POST['Ds_AuthorisationCode'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$dsdate            = sanitize_text_field( wp_unslash( $_POST['Ds_Date'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$dshour            = sanitize_text_field( wp_unslash( $_POST['Ds_Hour'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$dstermnal         = sanitize_text_field( wp_unslash( $_POST['Ds_Terminal'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$dsmerchandata     = sanitize_text_field( wp_unslash( $_POST['Ds_MerchantData'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$dssucurepayment   = sanitize_text_field( wp_unslash( $_POST['Ds_SecurePayment'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$dscardcountry     = sanitize_text_field( wp_unslash( $_POST['Ds_SignatureVersion'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$tokennum          = sanitize_text_field( wp_unslash( $_POST['Ds_Merchant_Identifier'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$card_brand        = sanitize_text_field( wp_unslash( $_POST['Ds_Card_Brand'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$expiry_date       = sanitize_text_field( wp_unslash( $_POST['Ds_ExpiryDate'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$card_txnid        = sanitize_text_field( wp_unslash( $_POST['Ds_Merchant_Cof_Txnid'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$dstransactiontype = sanitize_text_field( wp_unslash( $_POST['Ds_TransactionType'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotValidated
			$order2            = get_transient( $ordermi . '_woocommrce_order_number_redsys' );
			if ( ! $order2 ) {
				$order2 = WCRed()->clean_order_number( $ordermi );
			}
			$order = WCRed()->get_order( (int) $order2 );
			sleep( 3 );
			$is_paid = WCRed()->is_paid( $order2 );
		}
		$user_id           = $order->get_user_id();
		$ds_merchant_cof   = get_transient( $ordermi . '_ds_merchant_cof_ini' );
		$save_token        = WCRed()->get_order_meta( $order2, '_redsys_save_token', true );
		$token_type_needed = get_transient( $ordermi . '_insite_token_need' );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', '$ds_merchant_cof: ' . $ds_merchant_cof );
			WCRed()->log( 'insite', '$save_token: ' . $save_token );
			WCRed()->log( 'insite', 'Ds_Amount: ' . $total . ', Ds_Order: ' . $ordermi . ',  Ds_MerchantCode: ' . $dscode . ', Ds_Currency: ' . $currency_code . ', Ds_Response: ' . $response . ', Ds_AuthorisationCode: ' . $id_trans . ', $order2: ' . $order2 );
			WCRed()->log( 'insite', '$dstransactiontype: ' . $dstransactiontype );
			WCRed()->log( 'insite', '$response: ' . $response );
			WCRed()->log( 'insite', 'print_r $_POST: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
		}

		if ( 3 === intval( $dstransactiontype ) || 900 === intval( $response ) ) {
			if ( 900 === intval( $response ) ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Response 900 (refund)' );
					WCRed()->log( 'insite', '$order->get_id(): ' . $order->get_id() );
				}
				set_transient( $order->get_id() . '_redsys_refund', 'yes' );

				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'WCRed()->update_order_meta to "refund yes"' );
				}
				$status = $order->get_status();
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'New Status in request: ' . $status );
				}
				$order->add_order_note( __( 'Order Payment refunded by Redsys', 'woocommerce-redsys' ) );
				return;
			}
			$order->add_order_note( __( 'There was an error refunding', 'woocommerce-redsys' ) );
			exit;
		}

		if ( $is_paid ) {
			exit();
		}

		if ( ! empty( $expiry_date ) ) {
			$dsexpiryyear  = '20' . substr( $expiry_date, 0, 2 );
			$dsexpirymonth = substr( $expiry_date, -2 );
		} else {
			$dsexpiryyear  = '99';
			$dsexpirymonth = '12';
		}

		if ( ! empty( $dscardnumber4 ) ) {
			$dscardnumber4 = substr( $dscardnumbercompl, -4 );
		} else {
			$dscardnumber4 = '0000';
		}

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', '$tokennum: ' . $tokennum );
			WCRed()->log( 'insite', '$card_txnid: ' . $card_txnid );
			WCRed()->log( 'insite', '$user_id: ' . $user_id );
			WCRed()->log( 'insite', '$card_brand: ' . WCRed()->get_card_brand( $card_brand ) );
			WCRed()->log( 'insite', '$dscardnumber4: ' . $dscardnumber4 );
			WCRed()->log( 'insite', '$dsexpirymonth: ' . $dsexpirymonth );
			WCRed()->log( 'insite', '$dsexpiryyear: ' . $dsexpiryyear );
		}

		if ( ( 'yes' === $save_token && ! empty( $tokennum ) ) || ( 'yes' === $token_type_needed && 'R' === $ds_merchant_cof ) ) {
			$token = new WC_Payment_Token_CC();
			$token->set_token( $tokennum );
			$token->set_gateway_id( 'redsys' );
			$token->set_user_id( $user_id );
			$token->set_card_type( WCRed()->get_card_brand( $card_brand ) );
			$token->set_last4( $dscardnumber4 );
			$token->set_expiry_month( $dsexpirymonth );
			$token->set_expiry_year( $dsexpiryyear );
			$token->set_default( true );
			$token->save();
			$token_id = $token->get_id();
			WCRed()->set_txnid( $token_id, $card_txnid );
			WCRed()->set_token_type( $token_id, $ds_merchant_cof );
		} else {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Removing Token' );
			}
			$data = array(
				'merchant_code'       => $dscode,
				'merchant_identifier' => $tokennum,
				'order_id'            => $ordermi,
				'terminal'            => $dstermnal,
				'sha256'              => $this->get_redsys_sha256( $user_id ),
				'redsys_adr'          => $this->get_redsys_url_gateway( $user_id ),
			);
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', '$data remove: ' . print_r( $data, true ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}
			$result = WCRed()->remove_token( $data );

			if ( 'yes' === $this->debug ) {
				if ( $result ) {
					WCRed()->log( 'insite', 'Result Token Removed: OK' );
				} else {
					WCRed()->log( 'insite', 'Result Token Removed: ERROR' );
				}
			}
		}

		$response = intval( $response );
		if ( $response <= 99 ) {
			// authorized.
			$order_total_compare = number_format( $order->get_total(), 2, '', '' );
			if ( $order_total_compare !== $total ) {
				// amount does not match.
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', 'Payment error: Amounts do not match (order: ' . $order_total_compare . ' - received: ' . $total . ')' );
				}

				// Put this order on-hold for manual checking.
				$order->update_status( 'on-hold', sprintf( __( 'Validation error: Order vs. Notification amounts do not match (order: %1$s - received: %2$s).', 'woocommerce-redsys' ), $order_total_compare, $total ) ); // phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
				wp_die( 'InSite Notification Request Failure' );
				exit;
			}
			$authorisation_code = $id_trans;
			if ( ! empty( $ordermi ) ) {
				WCRed()->update_order_meta( $order->get_id(), '_payment_order_number_redsys', $ordermi );
			}
			if ( ! empty( $dsdate ) ) {
				WCRed()->update_order_meta( $order->get_id(), '_payment_date_redsys', $dsdate );
			}
			if ( ! empty( $dshour ) ) {
				WCRed()->update_order_meta( $order->get_id(), '_payment_hour_redsys', $dshour );
			}
			if ( ! empty( $id_trans ) ) {
				WCRed()->update_order_meta( $order->get_id(), '_authorisation_code_redsys', $authorisation_code );
			}
			if ( ! empty( $dscardcountry ) ) {
				WCRed()->update_order_meta( $order->get_id(), '_card_country_insite', $dscardcountry );
			}
			if ( ! empty( $dscargtype ) ) {
				WCRed()->update_order_meta( $order->get_id(), '_card_type_insite', 'C' === $dscargtype ? 'Credit' : 'Debit' );
			}
			if ( ! empty( $dstermnal ) ) {
				WCRed()->update_order_meta( $order->get_id(), '_payment_terminal_redsys', $dstermnal );
			}
			// Payment completed.
			$order->add_order_note( __( 'HTTP Notification received - payment completed', 'woocommerce-redsys' ) );
			$order->add_order_note( __( 'Authorisation code: ', 'woocommerce-redsys' ) . $authorisation_code );
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'payment_complete() 15' );
			}
			if ( WCRed()->check_order_has_sumo_subscriptions( $order->get_id() ) ) {
				if ( function_exists( 'sumo_save_subscription_payment_info' ) ) {
					sumo_save_subscription_payment_info(
						$order->get_id(),
						array(
							'payment_type'         => 'auto',
							'payment_method'       => 'insite',
							'payment_key'          => $order->get_user_id(), // Optional. Default it is empty for Manual Payments. Required for Automatic payments(In order to capture the future payments).
							'payment_start_date'   => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
							'payment_end_date'     => '', // Optional. Default empty. Use only if it is needed by Payment Gateway.
							'payment_order_amount' => $order->get_total(),
						)
					);
				}
			}
			$order->payment_complete();
			$needs_preauth = WCRed()->order_needs_preauth( $order->get_id() );
			if ( $needs_preauth ) {
				$order->update_status( 'redsys-pre', __( 'Preauthorized by Redsys', 'woocommerce-redsys' ) );
			}
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Payment complete.' );
			}
			do_action( 'insite_post_payment_complete', $order->get_id() );
		} else {
			$ds_responses = WCRed()->get_ds_response();
			$ds_errors    = WCRed()->get_ds_error();

			if ( ! empty( $ds_responses ) ) {
				foreach ( $ds_responses as $ds_response => $value ) {
					if ( $ds_response === $response ) {
						$ds_response_value = $value;
						$order->add_order_note( __( 'Order cancelled by Redsys: ', 'woocommerce-redsys' ) . $ds_response_value );
						WCRed()->update_order_meta( $order_id, '_redsys_error_payment_ds_response_value', $ds_response_value );
					}
				}
			}

			if ( ! empty( $ds_errors ) ) {
				foreach ( $ds_errors as $ds_error => $value ) {
					if ( $ds_error === $dserrorcode ) {
						$ds_error_value = $value;
						$order->add_order_note( __( 'Order cancelled by Redsys: ', 'woocommerce-redsys' ) . $ds_error_value );
						WCRed()->update_order_meta( $order_id, '_redsys_error_payment_ds_error_value', $ds_error_value );
					}
				}
			}

			// Tarjeta caducada.
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'Pedido cancelado por InSite' );
			}

			if ( 'yes' === $this->debug ) {
				if ( ! empty( $ds_responses ) ) {
					WCRed()->log( 'insite', 'Error: ' . $ds_response_value );
				}
				if ( ! empty( $ds_errors ) ) {
					WCRed()->log( 'insite', 'Error: ' . $ds_error_value );
				}
			}

			// Order cancelled.
			$order->update_status( 'cancelled', __( 'Cancelled by InSite', 'woocommerce-redsys' ) );
			$order->add_order_note( __( 'Order canceled by InSite', 'woocommerce-redsys' ) );
			WC()->cart->empty_cart();
			$error = 'Order cancelled by Redsys: ' . $ds_error_value . ' ' . $ds_response_value;
			do_action( 'insite_post_payment_error', $order->get_id(), $error );
		}
	}
	/**
	 * Ask for refund
	 *
	 * @param  int    $order_id Order ID.
	 * @param  string $transaction_id Transaction ID.
	 * @param  float  $amount Amount.
	 * @return bool
	 */
	public function ask_for_refund( $order_id, $transaction_id, $amount ) {

		// post code to REDSYS.
		$order            = WCRed()->get_order( $order_id );
		$terminal         = WCRed()->get_order_meta( $order_id, '_payment_terminal_redsys', true );
		$currency_codes   = WCRed()->get_currencies();
		$user_id          = $order->get_user_id();
		$secretsha256     = $this->get_redsys_sha256( $user_id );
		$merchan_name     = WCRed()->get_order_meta( $order_id, '_billing_first_name', true );
		$merchant_lastnme = WCRed()->get_order_meta( $order_id, '_billing_last_name', true );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', '/**************************/' );
			WCRed()->log( 'insite', __( 'Starting asking for Refund', 'woocommerce-redsys' ) );
			WCRed()->log( 'insite', '/**************************/' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', __( 'Terminal : ', 'woocommerce-redsys' ) . $terminal );
		}
		$transaction_type  = '3';
		$secretsha256_meta = WCRed()->get_order_meta( $order_id, '_redsys_secretsha256', true );
		if ( $secretsha256_meta ) {
			$secretsha256 = $secretsha256_meta;
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', __( 'Using meta for SHA256', 'woocommerce-redsys' ) );
				WCRed()->log( 'insite', __( 'The SHA256 Meta is: ', 'woocommerce-redsys' ) . $secretsha256 );
			}
		} else {
			$secretsha256 = $secretsha256;
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', __( 'Using settings for SHA256', 'woocommerce-redsys' ) );
				WCRed()->log( 'insite', __( 'The SHA256 settings is: ', 'woocommerce-redsys' ) . $secretsha256 );
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
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', __( 'All data from meta', 'woocommerce-redsys' ) );
			WCRed()->log( 'insite', '**********************' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', __( 'If something is empty, the data was not saved', 'woocommerce-redsys' ) );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', __( 'All data from meta', 'woocommerce-redsys' ) );
			WCRed()->log( 'insite', __( 'Authorization Code : ', 'woocommerce-redsys' ) . $autorization_code );
			WCRed()->log( 'insite', __( 'Authorization Date : ', 'woocommerce-redsys' ) . $autorization_date );
			WCRed()->log( 'insite', __( 'Currency Codey : ', 'woocommerce-redsys' ) . $currencycode );
			WCRed()->log( 'insite', __( 'Terminal : ', 'woocommerce-redsys' ) . $terminal );
			WCRed()->log( 'insite', __( 'SHA256 : ', 'woocommerce-redsys' ) . $secretsha256_meta );
			WCRed()->log( 'insite', __( 'FUC : ', 'woocommerce-redsys' ) . $order_fuc );

		}

		if ( ! empty( $currencycode ) ) {
			$currency = $currencycode;
		} elseif ( ! empty( $currency_codes ) ) {
			$currency = $currency_codes[ get_woocommerce_currency() ];
		}
		set_transient( $transaction_id . '_woocommrce_order_number_redsys', $order_id, 3500 );

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
		$mi_obj->set_parameter( 'DS_MERCHANT_TITULAR', WCRed()->clean_data( $merchan_name ) . ' ' . WCRed()->clean_data( $merchant_lastnme ) );
		$mi_obj->set_parameter( 'DS_MERCHANT_MERCHANTNAME', $this->commercename );

		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', __( 'Data sent to Redsys for refund', 'woocommerce-redsys' ) );
			WCRed()->log( 'insite', '*********************************' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', __( 'URL to Redsys : ', 'woocommerce-redsys' ) . $redsys_adr );
			WCRed()->log( 'insite', __( 'DS_MERCHANT_AMOUNT : ', 'woocommerce-redsys' ) . $amount );
			WCRed()->log( 'insite', __( 'DS_MERCHANT_ORDER : ', 'woocommerce-redsys' ) . $transaction_id );
			WCRed()->log( 'insite', __( 'DS_MERCHANT_MERCHANTCODE : ', 'woocommerce-redsys' ) . $order_fuc );
			WCRed()->log( 'insite', __( 'DS_MERCHANT_CURRENCY : ', 'woocommerce-redsys' ) . $currency );
			WCRed()->log( 'insite', __( 'DS_MERCHANT_TRANSACTIONTYPE : ', 'woocommerce-redsys' ) . $transaction_type );
			WCRed()->log( 'insite', __( 'DS_MERCHANT_TERMINAL : ', 'woocommerce-redsys' ) . $terminal );
			WCRed()->log( 'insite', __( 'DS_MERCHANT_MERCHANTURL : ', 'woocommerce-redsys' ) . $final_notify_url );
			WCRed()->log( 'insite', __( 'DS_MERCHANT_URLOK : ', 'woocommerce-redsys' ) . add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ) );
			WCRed()->log( 'insite', __( 'DS_MERCHANT_URLKO : ', 'woocommerce-redsys' ) . $order->get_cancel_order_url() );
			WCRed()->log( 'insite', __( 'DS_MERCHANT_CONSUMERLANGUAGE : 001', 'woocommerce-redsys' ) );
			WCRed()->log( 'insite', __( 'DS_MERCHANT_PRODUCTDESCRIPTION : ', 'woocommerce-redsys' ) . WCRed()->clean_data( WCRed()->product_description( $order, $this->id ) ) );
			WCRed()->log( 'insite', __( 'DS_MERCHANT_MERCHANTNAME : ', 'woocommerce-redsys' ) . $this->commercename );
			WCRed()->log( 'insite', __( 'DS_MERCHANT_AUTHORISATIONCODE : ', 'woocommerce-redsys' ) . $autorization_code );
			WCRed()->log( 'insite', __( 'Ds_Merchant_TransactionDate : ', 'woocommerce-redsys' ) . $autorization_date );
			WCRed()->log( 'insite', __( 'ask_for_refund Asking por order #: ', 'woocommerce-redsys' ) . $order_id );
			WCRed()->log( 'insite', ' ' );
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
				$error_string = $post_arg->get_error_message();
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', __( 'There is an error', 'woocommerce-redsys' ) );
				WCRed()->log( 'insite', '*********************************' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', __( 'The error is : ', 'woocommerce-redsys' ) . $error_string );
			}
			return $error_string;
		}
		return true;
	}
	/**
	 * Check if the pingback is valid
	 *
	 * @param string $order_id Order ID.
	 */
	public function check_redsys_refund( $order_id ) {
		// check postmeta.
		$order = WCRed()->get_order( (int) $order_id );
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', '$order_id: ' . $order_id );
			WCRed()->log( 'insite', '$order->get_id(): ' . $order->get_id() );
		}
		$order_refund = get_transient( $order_id . '_redsys_refund' );
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', __( 'Checking and waiting ping from Redsys', 'woocommerce-redsys' ) );
			WCRed()->log( 'insite', '*****************************************' );
			WCRed()->log( 'insite', ' ' );
			WCRed()->log( 'insite', __( 'Check order status #: ', 'woocommerce-redsys' ) . $order->get_id() );
			WCRed()->log( 'insite', __( 'Check order status with get_transient: ', 'woocommerce-redsys' ) . $order_refund );
		}
		if ( 'yes' === $order_refund ) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * Process a refund if supported
	 *
	 * @param int    $order_id Order ID.
	 * @param float  $amount Refund amount.
	 * @param string $reason Refund reason.
	 */
	public function process_refund( $order_id, $amount = null, $reason = '' ) {
		// Do your refund here. Refund $amount for the order with ID $order_id _transaction_id.
		set_time_limit( 0 );
		$order = wc_get_order( $order_id );

		$transaction_id = WCRed()->get_redsys_order_number( $order_id );
		if ( 'yes' === $this->debug ) {
			WCRed()->log( 'insite', __( '$order_id#: ', 'woocommerce-redsys' ) . $transaction_id );
		}
		if ( ! $amount ) {
			$order_total_sign = WCRed()->redsys_amount_format( $order->get_total() );
		} else {
			$order_total_sign = number_format( $amount, 2, '', '' );
		}

		if ( ! empty( $transaction_id ) ) {
			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', __( 'check_redsys_refund Asking for order #: ', 'woocommerce-redsys' ) . $order_id );
			}

			$refund_asked = $this->ask_for_refund( $order_id, $transaction_id, $order_total_sign );

			if ( is_wp_error( $refund_asked ) ) {
				if ( 'yes' === $this->debug ) {
					WCRed()->log( 'insite', __( 'Refund Failed: ', 'woocommerce-redsys' ) . $refund_asked->get_error_message() );
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
				WCRed()->log( 'insite', __( 'check_redsys_refund = true ', 'woocommerce-redsys' ) . $result );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/********************************/' );
				WCRed()->log( 'insite', '  Refund complete by Redsys   ' );
				WCRed()->log( 'insite', '/********************************/' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/******************************************/' );
				WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
				WCRed()->log( 'insite', '/******************************************/' );
				WCRed()->log( 'insite', ' ' );
			}
			if ( 'yes' === $this->debug && ! $result ) {
				WCRed()->log( 'insite', __( 'check_redsys_refund = false ', 'woocommerce-redsys' ) . $result );
			}
			if ( $result ) {
				delete_transient( $order->get_id() . '_redsys_refund' );
				return true;
			} else {
				if ( 'yes' === $this->debug && $result ) {
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!' );
					WCRed()->log( 'insite', __( '!!!!Refund Failed, please try again!!!!', 'woocommerce-redsys' ) );
					WCRed()->log( 'insite', '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!' );
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', ' ' );
					WCRed()->log( 'insite', '/******************************************/' );
					WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
					WCRed()->log( 'insite', '/******************************************/' );
					WCRed()->log( 'insite', ' ' );
				}
				return false;
			}
		} else {
			if ( 'yes' === $this->debug && $result ) {
				WCRed()->log( 'insite', __( 'Refund Failed: No transaction ID', 'woocommerce-redsys' ) );
				WCRed()->log( 'insite', ' ' );
				WCRed()->log( 'insite', '/******************************************/' );
				WCRed()->log( 'insite', '  The final has come, this story has ended  ' );
				WCRed()->log( 'insite', '/******************************************/' );
				WCRed()->log( 'insite', ' ' );
			}
			return new WP_Error( 'error', __( 'Refund Failed: No transaction ID', 'woocommerce-redsys' ) );
		}
	}
	/**
	 * Get insite order
	 *
	 * @param int $order_id Order ID.
	 */
	public function get_insite_order( $order_id ) {
		$order = new WC_Order( $order_id );
		return $order;
	}
	/**
	 * Save field update order meta.
	 *
	 * @param int $order_id Order ID.
	 */
	public function save_field_update_order_meta( $order_id ) {

		if ( isset( $_POST['payment_method'] ) && 'insite' === sanitize_text_field( wp_unslash( $_POST['payment_method'] ) ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$order   = WCRed()->get_order( $order_id );
			$user_id = $order->get_user_id();
			$data    = array();

			if ( 'yes' === $this->debug ) {
				WCRed()->log( 'insite', 'HTTP $_POST checkout received: ' . print_r( $_POST, true ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.PHP.DevelopmentFunctions.error_log_print_r
			}// phpcs:ignore WordPress.Security.NonceVerification.Missing
			if ( ! empty( $_POST['billing_http_accept_headers'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
				$headers                 = base64_decode( wp_unslash( $_POST['billing_http_accept_headers'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized,WordPress.Security.ValidatedSanitizedInput.InputNotSanitized,WordPress.Security.NonceVerification.Missing,WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode
				$data['_accept_headers'] = sanitize_text_field( $headers );
			}
			if ( ! empty( $_POST['billing_agente_navegador'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
				$agente                                  = base64_decode( wp_unslash( $_POST['billing_agente_navegador'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized,WordPress.Security.NonceVerification.Missing,WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode
				$data['_billing_agente_navegador_field'] = sanitize_text_field( $agente );
			}
			if ( ! empty( $_POST['billing_idioma_navegador'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
				$data['_billing_idioma_navegador_field'] = sanitize_text_field( wp_unslash( $_POST['billing_idioma_navegador'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			}
			if ( ! empty( $_POST['billing_altura_pantalla'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
				$data['_billing_altura_pantalla_field'] = sanitize_text_field( wp_unslash( $_POST['billing_altura_pantalla'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			}
			if ( ! empty( $_POST['billing_anchura_pantalla'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.NonceVerification.Missing
				$data['_billing_anchura_pantalla_field'] = sanitize_text_field( wp_unslash( $_POST['billing_anchura_pantalla'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			}
			if ( ! empty( $_POST['billing_profundidad_color'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.NonceVerification.Missing
				$data['_billing_profundidad_color_field'] = sanitize_text_field( wp_unslash( $_POST['billing_profundidad_color'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			}
			if ( ! empty( $_POST['billing_diferencia_horaria'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.NonceVerification.Missing
				$data['_billing_diferencia_horaria_field'] = sanitize_text_field( wp_unslash( $_POST['billing_diferencia_horaria'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			}
			if ( ! empty( $_POST['_temp_redsys_order_number'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.NonceVerification.Missing
				$data['_temp_redsys_order_number'] = sanitize_text_field( wp_unslash( $_POST['_temp_redsys_order_number'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			}
			if ( ! empty( $_POST['_redsys_save_token'] ) && 'yes' === $_POST['_redsys_save_token'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
				$data['_redsys_save_token'] = sanitize_text_field( wp_unslash( $_POST['_redsys_save_token'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			}
			if ( ! empty( $_POST['token'] ) && 'add' !== $_POST['token'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.NonceVerification.Missing
				set_transient( $order_id . '_insite_use_token', sanitize_text_field( wp_unslash( $_POST['token'] ), 36000 ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			} else {
				set_transient( $order_id . '_insite_use_token', 'no', 36000 );
			}
			if ( ! empty( $_POST['_redsys_token_type'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.NonceVerification.Missing
				set_transient( $order_id . '_redsys_token_type', sanitize_text_field( wp_unslash( $_POST['_redsys_token_type'] ), 36000 ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			} else {
				set_transient( $order_id . '_redsys_token_type', 'no', 36000 );
			}
			if ( ! empty( $_POST['billing_tz_horaria'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.NonceVerification.Missing
				$data['_billing_tz_horaria_field'] = sanitize_text_field( wp_unslash( $_POST['billing_tz_horaria'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			}
			if ( ! empty( $_POST['billing_js_enabled_navegador'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.NonceVerification.Missing
				$data['_billing_js_enabled_navegador_field'] = sanitize_text_field( wp_unslash( $_POST['billing_js_enabled_navegador'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			}
			WCRed()->update_order_meta( $order_id, $data );
			do_action( 'save_field_update_order_meta', $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
		}
	}
	/**
	 * Add error to checkout
	 */
	public function add_error_to_checkout() {
		$url        = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidatedNotSanitized,WordPress.Security.ValidatedSanitizedInput.InputNotValidatedNotSanitized
		$components = wp_parse_url( $url );
		if ( isset( $components['query'] ) ) {
			parse_str( $components['query'], $results );
			if ( isset( $results['error'] ) ) {
				$response = $results['error'];
				if ( $response ) {
					$error = WCRed()->get_error( $response );
					echo '<div class="checkout-message" style="
					background-color: #e2401c;
					padding: 1em 1.618em;
					margin-bottom: 2.617924em;
					margin-left: 0;
					border-radius: 2px;
					color: #fff;
					clear: both;
					border-left: 0.6180469716em solid rgba(0,0,0,.15);
					">';
					echo esc_html__( 'Transaction Error: ', 'woocommerce-redsys' ) . esc_html( $error );
					echo '</div>';
				}
			}
		}
	}
}
/**
 * Add the gateway to WooCommerce
 *
 * @param array $methods WooCommerce payment methods.
 */
function woocommerce_add_gateway_insite_gateway( $methods ) { // phpcs:ignore Universal.Files.SeparateFunctionsFromOO.Mixed
	$methods[] = 'WC_Gateway_InSite_Redsys';
	return $methods;
}
add_filter( 'woocommerce_payment_gateways', 'woocommerce_add_gateway_insite_gateway' );

/**
 * Check sutomer can pay for SUMO Subscriptions
 *
 * @param bool $can_charge True or false.
 * @param int  $subscription_id Subscription ID.
 * @param obj  $renewal_order Renewal Order.
 * @return bool
 */
function insite_can_charge_customer( $can_charge, $subscription_id, $renewal_order ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed
	return true;
}
add_filter( 'sumosubscriptions_is_insite_preapproval_status_valid', 'insite_can_charge_customer', 10, 3 );
/**
 * Renew SUMO Subscriptions
 *
 * @param bool $is_successful True or false.
 * @param int  $subscription_id Subscription ID.
 * @param obj  $renewal_order Renewal Order.
 * @param bool $retry True or false.
 */
function insite_renew_sumo_subscription( $is_successful, $subscription_id, $renewal_order, $retry = false ) {
	$redsys = new WC_Gateway_InSite_Redsys();
	$redsys->renew_sumo_subscription( $is_successful, $subscription_id, $renewal_order, $retry = false );
}
add_filter( 'sumosubscriptions_is_insite_preapproved_payment_transaction_success', 'insite_renew_sumo_subscription', 10, 3 );
