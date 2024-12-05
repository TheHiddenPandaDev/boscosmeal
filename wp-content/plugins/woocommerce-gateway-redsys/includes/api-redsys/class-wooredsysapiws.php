<?php
/**
 * Redsys API Class for WooCommerce Web Services (WS)
 *
 * This class provides the functions to manage encryption and handle parameters
 * for communicating with the Redsys payment gateway in WooCommerce through Web Services.
 *
 * @package WooRedsysAPIWS
 */

// Avoid direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * WooRedsysAPIWS class
 * Handles encryption and communication with Redsys payment gateway via Web Services.
 */
class WooRedsysAPIWS {

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
	 * @return mixed|null  The parameter value or null if not set.
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
	 * Extract the order number from the provided data.
	 *
	 * @param string $datos The data containing the order information.
	 * @return string       The order number.
	 */
	public function get_order( $datos ) {
		$pos_pedido_ini = strrpos( $datos, '<DS_MERCHANT_ORDER>' );
		$tam_pedido_ini = strlen( '<DS_MERCHANT_ORDER>' );
		$pos_pedido_fin = strrpos( $datos, '</DS_MERCHANT_ORDER>' );
		return substr( $datos, $pos_pedido_ini + $tam_pedido_ini, $pos_pedido_fin - ( $pos_pedido_ini + $tam_pedido_ini ) );
	}

	/**
	 * Get the content of a specific tag from the provided data.
	 *
	 * @param string $datos The data containing the tag.
	 * @param string $tag   The tag to retrieve the content from.
	 * @return string       The content inside the tag.
	 */
	public function get_tag_content( $datos, $tag ) {
		$pos_pedido_ini = strrpos( $datos, '<' . $tag . '>' );
		$tam_pedido_ini = strlen( '<' . $tag . '>' );
		$pos_pedido_fin = strrpos( $datos, '</' . $tag . '>' );
		return substr( $datos, $pos_pedido_ini + $tam_pedido_ini, $pos_pedido_fin - ( $pos_pedido_ini + $tam_pedido_ini ) );
	}

	/**
	 * Create the merchant signature for host-to-host communication.
	 *
	 * @param string $key The base64 encoded key.
	 * @param string $ent The data for signature creation.
	 * @return string     The base64 encoded signature.
	 */
	public function create_merchant_signature_host_to_host( $key, $ent ) {
		$key = $this->decode_base64( $key );
		$key = $this->encrypt_3des( $this->get_order( $ent ), $key );
		$res = $this->mac256( $ent, $key );
		return $this->encode_base64( $res );
	}

	/**
	 * Create the merchant signature for host-to-host response communication.
	 *
	 * @param string $key        The base64 encoded key.
	 * @param string $datos      The data for signature creation.
	 * @param string $num_pedido The order number.
	 * @return string            The base64 encoded signature.
	 */
	public function create_merchant_signature_response_host_to_host( $key, $datos, $num_pedido ) {
		$key = $this->decode_base64( $key );
		$key = $this->encrypt_3des( $num_pedido, $key );
		$res = $this->mac256( $datos, $key );
		return $this->encode_base64( $res );
	}
}
