<?php // phpcs:disable
if (! class_exists ( 'ISDCCConfirmationMessage' )) {
	include_once $GLOBALS["REDSYS_API_PATH"] . "/model/class-isgenericxml.php";
	include_once $GLOBALS["REDSYS_API_PATH"] . "/model/ISRequestInterface.php";
	
	/**
	 * @XML_ELEM=DATOSENTRADA
	 */
	class ISDCCConfirmationMessage extends ISGenericXml implements ISRequestInterface {
		/**
		 * @XML_ELEM=DS_MERCHANT_ORDER
		 */
		private $order = null;
		
		/**
		 * @XML_ELEM=DS_MERCHANT_MERCHANTCODE
		 */
		private $merchant = null;
		
		/**
		 * @XML_ELEM=DS_MERCHANT_TERMINAL
		 */
		private $terminal = null;
		
		/**
		 * @XML_ELEM=Sis_Divisa
		 */
		private $currencyCode = null;
		
		/**
		 * @XML_ELEM=DS_MERCHANT_SESION
		 */
		private $sesion = null;
		public function get_order() {
			return $this->order;
		}
		public function set_order($order) {
			$this->order = $order;
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
		public function getCurrencyCode() {
			return $this->currencyCode;
		}
		public function setCurrencyCode($currency, $amount) {
			$this->currencyCode = $currency . "#" . $amount;
			return $this;
		}
		public function getSesion() {
			return $this->sesion;
		}
		public function setSesion($sesion) {
			$this->sesion = $sesion;
			return $this;
		}
		public function __toString() {
			$string = "ISDCCConfirmationMessage{";
			$string .= 'order: ' . $this->get_order () . ', ';
			$string .= 'merchant: ' . $this->get_merchant () . ', ';
			$string .= 'terminal: ' . $this->get_terminal () . ', ';
			$string .= 'currencyCode: ' . $this->getCurrencyCode () . ', ';
			$string .= 'sesion: ' . $this->getSesion () . '';
			return $string . "}";
		}
	}
}