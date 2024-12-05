<?php
/**
 * Class ISOperation.
 *
 * @package WooRedsysAPI
 */

if ( ! class_exists( 'ISOperationMessage' ) ) {
	include_once $GLOBALS['REDSYS_API_PATH'] . '/model/class-isgenericxml.php';
	include_once $GLOBALS['REDSYS_API_PATH'] . '/model/ISRequestInterface.php';
	include_once $GLOBALS['REDSYS_API_PATH'] . '/constants/class-isconstants.php';

	/**
	 * Class representing an operation message.
	 */
	class ISOperationMessage extends ISGenericXml implements ISRequestInterface {

		/**
		 * Merchant code (FUC).
		 *
		 * @var string
		 */
		private $merchant = null;

		/**
		 * Terminal code.
		 *
		 * @XML_ELEM=DS_MERCHANT_TERMINAL
		 * @var string
		 */
		private $terminal = null;

		/**
		 * Operation order code.
		 *
		 * @XML_ELEM=DS_MERCHANT_ORDER
		 * @var string
		 */
		private $order = null;

		/**
		 * Operation ID code.
		 *
		 * @XML_ELEM=DS_MERCHANT_IDOPER
		 * @var string
		 */
		private $oper_id = null;

		/**
		 * Operation type.
		 *
		 * @XML_ELEM=DS_MERCHANT_TRANSACTIONTYPE
		 * @var string
		 */
		private $transaction_type = null;

		/**
		 * Currency code (ISO 4217).
		 *
		 * @XML_ELEM=DS_MERCHANT_CURRENCY
		 * @var string
		 */
		private $currency = null;

		/**
		 * Operation amount, without decimal separation.
		 *
		 * @XML_ELEM=DS_MERCHANT_AMOUNT
		 * @var string
		 */
		private $amount = null;

		/**
		 * 3DSecure information.
		 *
		 * @XML_ELEM=DS_MERCHANT_EMV3DS
		 * @var array|null
		 */
		private $emv = null;

		/**
		 * DCC indicator for DCC appliance.
		 *
		 * @var bool
		 */
		private $dcc = false;

		/**
		 * Additional parameters.
		 *
		 * @var array
		 */
		private $parameters = array();

		/**
		 * Gets the merchant code (FUC).
		 *
		 * @return string the merchant code.
		 */
		public function get_merchant() {
			return $this->merchant;
		}

		/**
		 * Sets the merchant code.
		 *
		 * @param string $merchant merchant code.
		 * @return ISOperationMessage
		 */
		public function set_merchant( $merchant ) {
			$this->merchant = $merchant;
			return $this;
		}

		/**
		 * Gets the terminal code.
		 *
		 * @return string the terminal code.
		 */
		public function get_terminal() {
			return $this->terminal;
		}

		/**
		 * Sets the terminal code.
		 *
		 * @param string $terminal terminal code (max length 3).
		 * @return ISOperationMessage
		 */
		public function set_terminal( $terminal ) {
			$this->terminal = $terminal;
			return $this;
		}

		/**
		 * Gets the operation order code (max length 12).
		 *
		 * @return string the operation order (max length 12).
		 */
		public function get_order() {
			return $this->order;
		}

		/**
		 * Sets the operation order (max length 12).
		 *
		 * @param string $order (max length 12).
		 * @return ISOperationMessage
		 */
		public function set_order( $order ) {
			$this->order = $order;
			return $this;
		}

		/**
		 * Gets the operation ID.
		 *
		 * @return string the operation ID.
		 */
		public function get_oper_id() {
			return $this->oper_id;
		}

		/**
		 * Sets the operation ID.
		 *
		 * @param string $oper_id the operation ID.
		 * @return ISOperationMessage
		 */
		public function setOperID( $oper_id ) {
			$this->oper_id = $oper_id;
			return $this;
		}

		/**
		 * Gets the operation type.
		 *
		 * @return string the operation type.
		 */
		public function get_tansaction_type() {
			return $this->transaction_type;
		}

		/**
		 * Sets the operation type.
		 *
		 * @param string $transaction_type the operation type.
		 * @return ISOperationMessage
		 */
		public function set_transaction_type( $transaction_type ) {
			$this->transaction_type = $transaction_type;
			return $this;
		}

		/**
		 * Gets the currency code.
		 *
		 * @return string the currency code (numeric ISO_4217).
		 */
		public function get_currency() {
			return $this->currency;
		}

		/**
		 * Sets the currency code.
		 *
		 * @param string $currency the currency code (numeric ISO_4217).
		 * @return ISOperationMessage
		 */
		public function set_currency( $currency ) {
			$this->currency = $currency;
			return $this;
		}

		/**
		 * Gets the amount of the operation.
		 *
		 * @return string the operation amount.
		 */
		public function get_amount() {
			return $this->amount;
		}

		/**
		 * Sets the amount of the operation.
		 *
		 * @param string $amount without decimal separation.
		 * @return ISOperationMessage
		 */
		public function set_amount( $amount ) {
			$this->amount = $amount;
			return $this;
		}

		/**
		 * Gets the emv.
		 *
		 * @return string|null
		 */
		public function get_emv() {
			if ( null === $this->emv ) {
				return null;
			}

			return wp_json_encode( $this->emv );
		}

		/**
		 * Sets the emv.
		 *
		 * @param array $emv EMV parameters.
		 * @return ISOperationMessage
		 */
		public function set_emv( $emv ) {
			$this->emv = $emv;
			return $this;
		}

		/**
		 * Gets the DCC indicator.
		 *
		 * @return bool
		 */
		public function is_dcc() {
			return $this->dcc;
		}

		/**
		 * Sets the DCC indicator.
		 *
		 * @return bool
		 */
		public function with_dcc() {
			$this->dcc = true;
			return $this->dcc;
		}

		/**
		 * Gets the additional parameters.
		 *
		 * @return array
		 */
		public function get_parameters() {
			return $this->parameters;
		}

		/**
		 * Adds an additional parameter.
		 *
		 * @param string $key Parameter key.
		 * @param mixed  $value Parameter value.
		 */
		public function add_parameter( $key, $value ) {
			$this->parameters[ $key ] = $value;
		}

		/**
		 * Flag for reference creation (card token for merchant to use in other operations).
		 */
		public function create_reference() {
			$this->add_parameter( ISConstants::$request_merchant_identifier_tag, ISConstants::$request_merchant_identifier_required );
		}

		/**
		 * Method for using a reference created before for the operation.
		 *
		 * @param string $reference the reference string to be used.
		 */
		public function use_reference( $reference ) {
			$this->add_parameter( ISConstants::$request_merchant_identifier_tag, $reference );
		}

		/**
		 * Flag for direct payment operation.
		 * Direct payment operation implies:
		 * 1) No-secure operation
		 * 2) No-DCC operative appliance
		 */
		public function use_direct_payment() {
			$this->add_parameter( ISConstants::$request_merchant_directpayment_tag, ISConstants::$request_merchant_directpayment_true );
		}

		/**
		 * Adds multiple EMV parameters.
		 *
		 * @param array $parameters EMV parameters.
		 */
		public function add_emv_parameters( $parameters ) {
			if ( null === $this->emv ) {
				$this->emv = array();
			}

			foreach ( $parameters as $key => $value ) {
				$this->emv[ $key ] = $value;
			}
		}

		/**
		 * Adds a single EMV parameter.
		 *
		 * @param string $name Parameter name.
		 * @param mixed  $value Parameter value.
		 */
		public function add_emv_parameter( $name, $value ) {
			if ( null === $this->emv ) {
				$this->emv = array();
			}

			$this->emv[ $name ] = $value;
		}

		/**
		 * Converts the object to a string representation.
		 *
		 * @return string
		 */
		public function __toString() {
			$string  = 'ISOperationMessage{';
			$string .= 'merchant: ' . $this->get_merchant() . ', ';
			$string .= 'terminal: ' . $this->get_terminal() . ', ';
			$string .= 'order: ' . $this->get_order() . ', ';
			$string .= 'oper_id: ' . $this->get_oper_id() . ', ';
			$string .= 'transaction_type: ' . $this->get_tansaction_type() . ', ';
			$string .= 'currency: ' . $this->get_currency() . ', ';
			$string .= 'amount: ' . $this->get_amount() . ', ';
			$string .= 'parameters: ' . wp_json_encode( $this->get_parameters() ) . '';
			$string .= 'emv: ' . $this->get_emv() . '';
			return $string . '}';
		}
	}
}
