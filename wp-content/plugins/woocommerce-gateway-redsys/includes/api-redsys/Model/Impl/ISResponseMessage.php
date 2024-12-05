<?php // phpcs:disable
if ( ! class_exists( 'ISResponseMessage' ) ) {
	include_once $GLOBALS['REDSYS_API_PATH'] . '/model/class-isgenericxml.php';
	include_once $GLOBALS['REDSYS_API_PATH'] . '/model/impl/ISOperationElement.php';
	include_once $GLOBALS['REDSYS_API_PATH'] . '/model/ISResponseInterface.php';

	/**
	 * @XML_ELEM=RETORNOXML
	 */
	class ISResponseMessage extends ISGenericXml implements ISResponseInterface {
		private $result;

		/**
		 * @XML_CLASS=ISOperationElement
		 */
		private $operation;
		public function getResult() {
			return $this->result;
		}
		public function setResult( $result ) {
			$this->result = $result;
			return $this;
		}
		public function getOperation() {
			return $this->operation;
		}
		public function setOperation( $operation ) {
			$this->operation = $operation;
			return $this;
		}
		public function __toString() {
			$string  = 'ISResponseMessage{';
			$string .= 'result: ' . $this->getResult() . ', ';
			$string .= 'operation: ' . $this->getOperation() . '';
			return $string . '}';
		}
		public function get_tansaction_type() {
			if ( $this->getOperation() !== null ) {
				return $this->getOperation()->get_tansaction_type();
			} else {
				return null;
			}
		}
	}
}
