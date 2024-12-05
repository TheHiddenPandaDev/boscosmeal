<?php
/**
 * Redsys API Class for WooCommerce
 *
 * This class provides the functions to manage encryption and handle parameters
 * for communicating with the Redsys payment gateway in WooCommerce.
 *
 * @package WooRedsysAPI
 */

// Avoid direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * WooRedsysAPI class
 * Handles encryption and communication with Redsys payment gateway.
 */
class WooRedsysAPI {

	/**
	 * Holds the payment variables.
	 *
	 * @var array
	 */
	private $vars_pay = array();

	/**
	 * Set a parameter for the payment.
	 *
	 * @param string $key   The parameter key.
	 * @param mixed  $value The parameter value.
	 */
	public function set_parameter( $key, $value ) {
		$this->vars_pay[ $key ] = $value;
	}

	/**
	 * Get a parameter value.
	 *
	 * @param string $key The parameter key.
	 * @return mixed      The parameter value.
	 */
	public function get_parameter( $key ) {
		return isset( $this->vars_pay[ $key ] ) ? $this->vars_pay[ $key ] : null;
	}

	/**
	 * Encrypt data using 3DES.
	 *
	 * @param string $message The message to encrypt.
	 * @param string $key     The key used for encryption.
	 * @return string         The encrypted message.
	 */
	public function encrypt_3des( $message, $key ) {
		$l = ceil( strlen( $message ) / 8 ) * 8;
		return substr( openssl_encrypt( $message . str_repeat( "\0", $l - strlen( $message ) ), 'des-ede3-cbc', $key, OPENSSL_RAW_DATA, "\0\0\0\0\0\0\0\0" ), 0, $l );
	}

	/**
	 * Encode data to base64 URL-safe format.
	 *
	 * @param string $input The input data.
	 * @return string       The encoded data.
	 */
	public function base64_url_encode( $input ) {
		return strtr( base64_encode( $input ), '+/', '-_' ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_encode
	}

	/**
	 * Encode data to base64 format.
	 *
	 * @param string $data The input data.
	 * @return string      The base64 encoded data.
	 */
	public function encode_base64( $data ) {
		return base64_encode( $data ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_encode
	}

	/**
	 * Decode base64 URL-safe format to original data.
	 *
	 * @param string $input The encoded data.
	 * @return string       The decoded data.
	 */
	public function base64_url_decode( $input ) {
		return base64_decode( strtr( $input, '-_', '+/' ) ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode
	}

	/**
	 * Decode base64 data.
	 *
	 * @param string $data The encoded data.
	 * @return string      The decoded data.
	 */
	public function decode_base64( $data ) {
		return base64_decode( $data ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode
	}

	/**
	 * Create HMAC SHA256 signature.
	 *
	 * @param string $ent The string to hash.
	 * @param string $key The key used for the hash.
	 * @return string     The resulting hash.
	 */
	public function mac256( $ent, $key ) {
		return hash_hmac( 'sha256', $ent, $key, true );
	}

	/**
	 * Get the order number from payment variables.
	 *
	 * @return string The order number.
	 */
	public function get_order() {
		if ( empty( $this->vars_pay['DS_MERCHANT_ORDER'] ) ) {
			return $this->vars_pay['Ds_Merchant_Order'];
		}
		return $this->vars_pay['DS_MERCHANT_ORDER'];
	}

	/**
	 * Convert the payment array to JSON.
	 *
	 * @return string The JSON encoded payment data.
	 */
	public function array_to_json() {
		return wp_json_encode( $this->vars_pay );
	}

	/**
	 * Create the merchant parameters by encoding the payment data in base64.
	 *
	 * @return string The base64 encoded payment data.
	 */
	public function create_merchant_parameters() {
		$json = $this->array_to_json();
		return $this->encode_base64( $json );
	}

	/**
	 * Create the merchant signature for Redsys payment gateway.
	 *
	 * @param string $key The key for signature creation.
	 * @return string     The signature.
	 */
	public function create_merchant_signature( $key ) {
		$key = $this->decode_base64( $key );
		$ent = $this->create_merchant_parameters();
		$key = $this->encrypt_3des( $this->get_order(), $key );
		$res = $this->mac256( $ent, $key );
		return $this->encode_base64( $res );
	}

	/**
	 * Get the order number from notification data.
	 *
	 * @return string The order number.
	 */
	public function get_order_notif() {
		return empty( $this->vars_pay['Ds_Order'] ) ? $this->vars_pay['DS_ORDER'] : $this->vars_pay['Ds_Order'];
	}

	/**
	 * Extract order number from SOAP data.
	 *
	 * @param string $datos The SOAP data.
	 * @return string       The order number.
	 */
	public function get_order_notif_soap( $datos ) {
		$pos_pedido_ini = strrpos( $datos, '<Ds_Order>' );
		$tam_pedido_ini = strlen( '<Ds_Order>' );
		$pos_pedido_fin = strrpos( $datos, '</Ds_Order>' );
		return substr( $datos, $pos_pedido_ini + $tam_pedido_ini, $pos_pedido_fin - ( $pos_pedido_ini + $tam_pedido_ini ) );
	}

	/**
	 * Extract request data from SOAP.
	 *
	 * @param string $datos The SOAP data.
	 * @return string       The request data.
	 */
	public function get_request_notif_soap( $datos ) {
		$pos_req_ini = strrpos( $datos, '<Request' );
		$pos_req_fin = strrpos( $datos, '</Request>' );
		$tam_req_fin = strlen( '</Request>' );
		return substr( $datos, $pos_req_ini, ( $pos_req_fin + $tam_req_fin ) - $pos_req_ini );
	}

	/**
	 * Extract response data from SOAP.
	 *
	 * @param string $datos The SOAP data.
	 * @return string       The response data.
	 */
	public function get_response_notif_soap( $datos ) {
		$pos_req_ini = strrpos( $datos, '<Response' );
		$pos_req_fin = strrpos( $datos, '</Response>' );
		$tam_req_fin = strlen( '</Response>' );
		return substr( $datos, $pos_req_ini, ( $pos_req_fin + $tam_req_fin ) - $pos_req_ini );
	}

	/**
	 * Convert a string into an array.
	 *
	 * @param string $datos_decod The JSON string.
	 */
	public function string_to_array( $datos_decod ) {
		$this->vars_pay = json_decode( $datos_decod, true );
	}

	/**
	 * Decode merchant parameters from a base64-encoded string.
	 *
	 * @param string $datos The encoded data.
	 * @return string       The decoded data.
	 */
	public function decode_merchant_parameters( $datos ) {
		$decodec = $this->base64_url_decode( $datos );
		$this->string_to_array( $decodec );
		return $decodec;
	}

	/**
	 * Create merchant signature for notifications.
	 *
	 * @param string $key   The key for signature creation.
	 * @param string $datos The encoded data.
	 * @return string       The signature.
	 */
	public function create_merchant_signature_notif( $key, $datos ) {
		$key     = $this->decode_base64( $key );
		$decodec = $this->base64_url_decode( $datos );
		$this->string_to_array( $decodec );
		$key = $this->encrypt_3des( $this->get_order_notif(), $key );
		$res = $this->mac256( $datos, $key );
		return $this->base64_url_encode( $res );
	}

	/**
	 * Create merchant signature for SOAP request notifications.
	 *
	 * @param string $key   The key for signature creation.
	 * @param string $datos The encoded data.
	 * @return string       The signature.
	 */
	public function create_merchant_signature_notif_soap_request( $key, $datos ) {
		$key   = $this->decode_base64( $key );
		$datos = $this->get_request_notif_soap( $datos );
		$key   = $this->encrypt_3des( $this->get_order_notif_soap( $datos ), $key );
		$res   = $this->mac256( $datos, $key );
		return $this->encode_base64( $res );
	}

	/**
	 * Create merchant signature for SOAP response notifications.
	 *
	 * @param string $key        The key for signature creation.
	 * @param string $datos      The encoded data.
	 * @param string $num_pedido The order number.
	 * @return string            The signature.
	 */
	public function create_merchant_signature_notif_soap_response( $key, $datos, $num_pedido ) {

		$key   = $this->decode_base64( $key );
		$datos = $this->get_response_notif_soap( $datos );
		$key   = $this->encrypt_3des( $num_pedido, $key );
		$res   = $this->mac256( $datos, $key );

		return $this->encode_base64( $res );
	}
}
