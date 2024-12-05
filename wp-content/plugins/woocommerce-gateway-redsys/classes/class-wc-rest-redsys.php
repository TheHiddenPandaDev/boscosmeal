<?php
/**
 * Class WC Rest Redsys
 *
 * @package WooCommerce Redsys Gateway
 * @since 13.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class WC_REST_Redsys
 */
class WC_REST_Redsys {
	/**
	 * Namespace for the API.
	 *
	 * @var string
	 */
	protected $namespace = 'wc/v3';

	/**
	 * Rest base for the API.
	 *
	 * @var string
	 */
	protected $rest_base = 'redsys'; // phpcs:ignore Squiz.Commenting.VariableComment.Missing

	/**
	 * Get custom data.
	 *
	 * @param WP_REST_Request $data Request.
	 *
	 * @return array
	 */
	public function get_custom( $data ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.Found
		return array( 'redsys' => 'Data' );
	}

	/**
	 * Register the routes API for Redsys.
	 */
	public function register_routes() {
		register_rest_route(
			$this->namespace,
			'/' . $this->rest_base,
			array(
				'methods'             => 'GET',
				'callback'            => array( $this, 'get_custom' ),
				'permission_callback' => array( $this, 'check_permissions' ),
			)
		);
	}

	/**
	 * Check permissions for the REST API request.
	 *
	 * @return bool
	 */
	public function check_permissions() {

		if ( current_user_can( 'manage_woocommerce' ) ) {
			return true;
		}

		return false;
	}
}

/**
 * Add custom API to WooCommerce REST namespaces.
 *
 * @param array $controllers Controllers.
 *
 * @return array
 */
function redsys_custom_api( $controllers ) { // phpcs:ignore Universal.Files.SeparateFunctionsFromOO.Mixed
	$controllers['wc/v3']['redsys'] = 'WC_REST_Redsys';

	return $controllers;
}
add_filter( 'woocommerce_rest_api_get_rest_namespaces', 'redsys_custom_api' );
