<?php
/**
 * Class ISRequestElement
 *
 * This class handles the request elements for the Redsys API.
 * It extends the ISGenericXml class and provides various methods
 * to set and get the request parameters.
 *
 * @package WooRedsysAPI
 * @since   1.0.0
 * @version 1.0.0
 */

// Avoid direct access..
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'ISRequestElement' ) ) {

	// Include required files for ISRequestElement.
	include_once $GLOBALS['REDSYS_API_PATH'] . '/model/class-isgenericxml.php';
	include_once $GLOBALS['REDSYS_API_PATH'] . '/model/impl/class-isoperationmessage.php';
	include_once $GLOBALS['REDSYS_API_PATH'] . '/constants/class-isconstants.php';

	/**
	 * Class ISRequestElement
	 *
	 * This class handles the request elements for the Redsys API.
	 * It extends the ISGenericXml class and provides various methods
	 * to set and get the request parameters.
	 *
	 * @package WooRedsysAPI
	 */
	class ISRequestElement extends ISGenericXml {

		/**
		 * Base64 encoded merchant parameters.
		 *
		 * @var string|null
		 */
		private $datos_entrada_b64 = null;

		/**
		 * Operation message data.
		 *
		 * @var ISOperationMessage|null
		 */
		private $datos_entrada = null;

		/**
		 * Signature version used for the request.
		 *
		 * @var string|null
		 */
		private $signature_version = null;

		/**
		 * Signature of the request.
		 *
		 * @var string|null
		 */
		private $signature = null;

		/**
		 * ISRequestElement constructor.
		 *
		 * Initializes the signature version to the default value from ISConstants.
		 */
		public function __construct() {
			$this->signature_version = ISConstants::$request_signatureversion_value;
		}

		/**
		 * Get the operation message data.
		 *
		 * @return ISOperationMessage|null The operation message data.
		 */
		public function get_datos_entrada() {
			return $this->datos_entrada;
		}

		/**
		 * Set the operation message data.
		 *
		 * @param ISOperationMessage $datos_entrada The operation message data.
		 * @return $this
		 */
		public function set_datos_entrada( $datos_entrada ) {
			$this->datos_entrada = $datos_entrada;
			// Encode the data in base64 format.
			$this->datos_entrada_b64 = base64_encode( $this->datos_entrada->to_json() ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_encode
			return $this;
		}

		/**
		 * Get the signature version.
		 *
		 * @return string|null The signature version.
		 */
		public function get_signature_version() {
			return $this->signature_version;
		}

		/**
		 * Set the signature version.
		 *
		 * @param string $signature_version The signature version.
		 * @return $this
		 */
		public function set_signature_version( $signature_version ) {
			$this->signature_version = $signature_version;
			return $this;
		}

		/**
		 * Get the signature.
		 *
		 * @return string|null The signature.
		 */
		public function get_signature() {
			return $this->signature;
		}

		/**
		 * Set the signature.
		 *
		 * @param string $signature The signature.
		 * @return $this
		 */
		public function set_signature( $signature ) {
			$this->signature = $signature;
			return $this;
		}

		/**
		 * Get the base64 encoded merchant parameters.
		 *
		 * @return string|null The base64 encoded merchant parameters.
		 */
		public function get_datos_entrada_b64() {
			return $this->datos_entrada_b64;
		}

		/**
		 * Set the base64 encoded merchant parameters.
		 *
		 * @param string $datos_entrada_b64 The base64 encoded merchant parameters.
		 * @return $this
		 */
		public function set_datos_entrada_b64( $datos_entrada_b64 ) {
			$this->datos_entrada_b64 = $datos_entrada_b64;
			return $this;
		}

		/**
		 * Convert the object to a string representation.
		 *
		 * @return string The string representation of the object.
		 */
		public function __toString() {
			$string  = 'ISRequestElement{';
			$string .= 'datosEntrada: ' . $this->get_datos_entrada() . ', ';
			$string .= 'signature_version: ' . $this->get_signature_version() . ', ';
			$string .= 'signature: ' . $this->get_signature();
			return $string . '}';
		}
	}

}
