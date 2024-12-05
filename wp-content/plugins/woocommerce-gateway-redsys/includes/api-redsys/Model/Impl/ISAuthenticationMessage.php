<?php // phpcs:disable
if (! class_exists ( 'ISAuthenticationMessage' )) {
	include_once $GLOBALS ["REDSYS_API_PATH"] . "/model/class-isgenericxml.php";
	include_once $GLOBALS ["REDSYS_API_PATH"] . "/model/ISRequestInterface.php";
	
	/**
	 * @XML_ELEM=DATOSENTRADA
	 */
	class ISAuthenticationMessage extends ISGenericXml implements ISRequestInterface {
		
		/**
		 * 3DSecure information
		 * @XML_ELEM=DS_MERCHANT_EMV3DS
		 */
		private $emv = null;
		
		/**
		 * @XML_ELEM=DS_MERCHANT_ORDER
		 */
		private $order;
		
		/**
		 * @XML_ELEM=DS_MERCHANT_AMOUNT
		 */
		private $amount;
		
		/**
		 * @XML_ELEM=DS_MERCHANT_CURRENCY
		 */
		private $currency;
		
		/**
		 * @XML_ELEM=DS_MERCHANT_MERCHANTCODE
		 */
		private $merchant;
		
		/**
		 * @XML_ELEM=DS_MERCHANT_TERMINAL
		 */
		private $terminal;
		
		/**
		 * @XML_ELEM=DS_MERCHANT_TRANSACTIONTYPE
		 */
		private $transaction_type;

		public function add_emv_parameters($parameters){
			if($this->emv==NULL)
				$this->emv=array();

			foreach ($parameters as $key => $value)
				$this->emv[$key]=$value;
		}

		public function add_emv_parameter($name, $value){
			if($this->emv==NULL)
				$this->emv=array();
			
			$this->emv[$name]=$value;
		}
		
		public function get_emv(){
			if($this->emv==NULL)
				return null;
			
			return wp_json_encode($this->emv);
		}
		public function set_emv($emv){
			$this->emv = $emv;
			return $this;
		}
		public function get_order() {
			return $this->order;
		}
		public function set_order($order) {
			$this->order = $order;
			return $this;
		}
		public function get_amount() {
			return $this->amount;
		}
		public function set_amount($amount) {
			$this->amount = $amount;
			return $this;
		}
		public function get_currency() {
			return $this->currency;
		}
		public function set_currency($currency) {
			$this->currency = $currency;
			return $this;
		}
		public function get_merchant() {
			return $this->merchant;
		}
		public function set_merchant($merchant) {
			$this->merchant = $merchant;
			return $this;
		}
		public function get_terminal() {
			return $this->terminal;
		}
		public function set_terminal($terminal) {
			$this->terminal = $terminal;
			return $this;
		}
		public function get_tansaction_type() {
			return $this->transaction_type;
		}
		public function set_transaction_type($transaction_type) {
			$this->transaction_type = $transaction_type;
			return $this;
		}
	}
}
