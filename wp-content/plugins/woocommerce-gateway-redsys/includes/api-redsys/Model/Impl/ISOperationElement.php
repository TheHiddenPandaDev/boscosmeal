<?php // phpcs:disable
if (! class_exists ( 'ISOperationElement' )) {
	include_once $GLOBALS ["REDSYS_API_PATH"] . "/model/class-isgenericxml.php";
	
	/**
	 * @XML_ELEM=OPERACION
	 */
	class ISOperationElement extends ISGenericXml {
		/**
		 * @XML_ELEM=Ds_Amount
		 */
		private $amount;
		
		/**
		 * @XML_ELEM=Ds_Currency
		 */
		private $currency;
		
		/**
		 * @XML_ELEM=Ds_Order
		 */
		private $order;
		
		/**
		 * @XML_ELEM=Ds_Signature
		 */
		private $signature;
		
		/**
		 * @XML_ELEM=Ds_MerchantCode
		 */
		private $merchant;
		
		/**
		 * @XML_ELEM=Ds_Terminal
		 */
		private $terminal;
		
		/**
		 * @XML_ELEM=Ds_Response
		 */
		private $responseCode;
		
		/**
		 * @XML_ELEM=Ds_AuthorisationCode
		 */
		private $authCode;
		
		/**
		 * @XML_ELEM=Ds_TransactionType
		 */
		private $transaction_type;
		
		/**
		 * @XML_ELEM=Ds_SecurePayment
		 */
		private $securePayment;
		
		/**
		 * @XML_ELEM=Ds_Language
		 */
		private $language;
		
		/**
		 * @XML_ELEM=Ds_MerchantData
		 */
		private $merchantData;
		
		/**
		 * @XML_ELEM=Ds_Card_Country
		 */
		private $cardCountry;
		
		/**
		 * @XML_ELEM=Ds_Card_Number
		 */
		private $cardNumber;
		
		/**
		 * @XML_ELEM=Ds_ExpiryDate
		 */
		private $expiryDate;
		
		/**
		 * @XML_ELEM=Ds_Merchant_Identifier
		 */
		private $merchantIdentifier;
		
		/**
		 * @XML_ELEM=Ds_Card_Brand
		 */
		private $cardBrand;
		
		/**
		 * @XML_ELEM=Ds_Card_Type
		 */
		private $cardType;
		
		/**
		 * @XML_ELEM=Ds_EMV3DS
		 */
		private $emv;
		
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
		public function get_order() {
			return $this->order;
		}
		public function set_order($order) {
			$this->order = $order;
			return $this;
		}
		public function get_signature() {
			return $this->signature;
		}
		public function set_signature($signature) {
			$this->signature = $signature;
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
		public function getResponseCode() {
			return $this->responseCode;
		}
		public function setResponseCode($responseCode) {
			$this->responseCode = $responseCode;
			return $this;
		}
		public function getAuthCode() {
			return $this->authCode;
		}
		public function setAuthCode($authCode) {
			$this->authCode = $authCode;
			return $this;
		}
		public function get_tansaction_type() {
			return $this->transaction_type;
		}
		public function set_transaction_type($transaction_type) {
			$this->transaction_type = $transaction_type;
			return $this;
		}
		public function getSecurePayment() {
			return $this->securePayment;
		}
		public function setSecurePayment($securePayment) {
			$this->securePayment = $securePayment;
			return $this;
		}
		public function getLanguage() {
			return $this->language;
		}
		public function setLanguage($language) {
			$this->language = $language;
			return $this;
		}
		public function getMerchantData() {
			return $this->merchantData;
		}
		public function setMerchantData($merchantData) {
			$this->merchantData = $merchantData;
			return $this;
		}
		public function getCardCountry() {
			return $this->cardCountry;
		}
		public function setCardCountry($cardCountry) {
			$this->cardCountry = $cardCountry;
			return $this;
		}
		public function getCardNumber() {
			return $this->cardNumber;
		}
		public function setCardNumber($cardNumber) {
			$this->cardNumber = $cardNumber;
			return $this;
		}
		public function getExpiryDate() {
			return $this->expiryDate;
		}
		public function setExpiryDate($expiryDate) {
			$this->expiryDate = $expiryDate;
			return $this;
		}
		public function getMerchantIdentifier() {
			return $this->merchantIdentifier;
		}
		public function setMerchantIdentifier($merchantIdentifier) {
			$this->merchantIdentifier = $merchantIdentifier;
			return $this;
		}
		public function getCardBrand(){
			return $this->cardBrand;
		}
		public function setCardBrand($cardBrand){
			$this->cardBrand = $cardBrand;
			return $this;
		}
		public function getCardType(){
			return $this->cardType;
		}
		public function setCardType($cardType){
			$this->cardType = $cardType;
			return $this;
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
		public function getAcsUrl() {
			$val=null;

			if($this->emv!=null && array_key_exists(ISConstants::$response_json_acs_entry, $this->emv)){
				$val=$this->emv[ISConstants::$response_json_acs_entry];
			}
			
			return $val;
		}
		public function getPaRequest() {
			$val=null;
			
			if($this->emv!=null && array_key_exists(ISConstants::$response_json_pareq_entry, $this->emv)){
					$val=$this->emv[ISConstants::$response_json_pareq_entry];
			}
			
			return $val;
		}
		public function getAutSession() {
			$val=null;
			
			if($this->emv!=null && array_key_exists(ISConstants::$response_json_md_entry, $this->emv)){
				$val=$this->emv[ISConstants::$response_json_md_entry];
			}
			
			return $val;
		}
		public function getProtocolVersion() {
			$val=null;
			
			if($this->emv!=null && array_key_exists(ISConstants::$response_json_protocol_version_entry, $this->emv)){
				$val=$this->emv[ISConstants::$response_json_protocol_version_entry];
			}
			
			return $val;
		}
		public function getThreeDSInfo() {
			$val=null;
			
			if($this->emv!=null && array_key_exists(ISConstants::$response_json_threedsinfo_entry, $this->emv)){
				$val=$this->emv[ISConstants::$response_json_threedsinfo_entry];
			}
			
			return $val;
		}
		public function requires3DS1(){
			return $this->getThreeDSInfo()==ISConstants::$response_3ds_challenge_request 
				&& $this->getProtocolVersion()==ISConstants::$response_3ds_version_1; 
		}
		public function requires3DS2(){
			return $this->getThreeDSInfo()==ISConstants::$response_3ds_challenge_request 
				&& ($this->getProtocolVersion()!=NULL && strpos($this->getProtocolVersion(), ISConstants::$response_3ds_version_2_prefix) === 0); 
		}
		
		public function __toString() {
			$string = "ISOperationElement{";
			$string .= 'amount: ' . $this->get_amount () . ', ';
			$string .= 'currency: ' . $this->get_currency () . ', ';
			$string .= 'order: ' . $this->get_order () . ', ';
			$string .= 'signature: ' . $this->get_signature () . ', ';
			$string .= 'merchant: ' . $this->get_merchant () . ', ';
			$string .= 'terminal: ' . $this->get_terminal () . ', ';
			$string .= 'responseCode: ' . $this->getResponseCode () . ', ';
			$string .= 'authCode: ' . $this->getAuthCode () . ', ';
			$string .= 'transaction_type: ' . $this->get_tansaction_type () . ', ';
			$string .= 'securePayment: ' . $this->getSecurePayment () . ', ';
			$string .= 'language: ' . $this->getLanguage () . ', ';
			$string .= 'merchantData: ' . $this->getMerchantData () . ', ';
			$string .= 'cardCountry: ' . $this->getCardCountry () . ', ';
			$string .= 'cardNumber: ' . $this->getCardNumber () . ', ';
			$string .= 'expiryDate: ' . $this->getExpiryDate () . ', ';
			$string .= 'merchantIdentifier: ' . $this->getMerchantIdentifier () . ', ';
			$string .= 'emv: ' . $this->get_emv () . ', ';
			return $string . "}";
		}
	}

}
