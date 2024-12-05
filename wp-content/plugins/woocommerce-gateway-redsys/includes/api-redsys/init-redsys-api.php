<?php
/**
 * Initialization for Redsys API
 *
 * This file sets up the necessary paths and includes for the Redsys API.
 * It also initializes logging if enabled.
 *
 * @package WooRedsysAPI
 */

// Avoid direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define the path to the Redsys API directory.
 */
$GLOBALS['REDSYS_API_PATH'] = __DIR__;

/**
 * Enable or disable logging.
 * Set to true to enable logging, false to disable it.
 */
$GLOBALS['REDSYS_LOG_ENABLED'] = false; // Set to false if you want to disable logging.

/**
 * Require the necessary files for Redsys API operations.
 */
require_once $GLOBALS['REDSYS_API_PATH'] . '/model/impl/class-isoperationmessage.php';
require_once $GLOBALS['REDSYS_API_PATH'] . '/model/impl/ISAuthenticationMessage.php';
require_once $GLOBALS['REDSYS_API_PATH'] . '/service/impl/ISService.php';
require_once $GLOBALS['REDSYS_API_PATH'] . '/service/impl/ISAuthenticationService.php';
