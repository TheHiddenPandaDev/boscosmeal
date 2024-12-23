<?php
/**
 * WCS_ATT_Management class
 *
 * @package  WooCommerce All Products for Subscriptions
 * @since    2.1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles subscription object management functions, e.g. add, edit/switch, delete.
 *
 * @class    WCS_ATT_Management
 * @version  3.2.0
 */
class WCS_ATT_Management extends WCS_ATT_Abstract_Module {

	/**
	 * Register modules.
	 */
	protected function register_modules() {

		// Line item switching module.
		require_once WCS_ATT_ABSPATH . 'includes/modules/management/class-wcs-att-manage-switch.php';
		// Add-to-subscription module.
		require_once WCS_ATT_ABSPATH . 'includes/modules/management/class-wcs-att-manage-add.php';

		// Initialize modules.
		$this->modules = apply_filters(
			'wcsatt_management_modules',
			array(
				'manage_add'    => 'WCS_ATT_Manage_Add',
				'manage_switch' => 'WCS_ATT_Manage_Switch',
			)
		);
	}
}
