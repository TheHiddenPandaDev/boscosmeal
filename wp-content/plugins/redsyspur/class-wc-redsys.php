<?php

/**
 * NOTA SOBRE LA LICENCIA DE USO DEL SOFTWARE
 *
 * El uso de este software está sujeto a las Condiciones de uso de software que
 * se incluyen en el paquete en el documento "Aviso Legal.pdf". También puede
 * obtener una copia en la siguiente url:
 * http://www.redsys.es/wps/portal/redsys/publica/areadeserviciosweb/descargaDeDocumentacionYEjecutables
 *
 * Redsys es titular de todos los derechos de propiedad intelectual e industrial
 * del software.
 *
 * Quedan expresamente prohibidas la reproducción, la distribución y la
 * comunicación pública, incluida su modalidad de puesta a disposición con fines
 * distintos a los descritos en las Condiciones de uso.
 *
 * Redsys se reserva la posibilidad de ejercer las acciones legales que le
 * correspondan para hacer valer sus derechos frente a cualquier infracción de
 * los derechos de propiedad intelectual y/o industrial.
 *
 * Redsys Servicios de Procesamiento, S.L., CIF B85955367
 */

/**
 * Plugin Name: Pasarela Unificada de Redsys para WooCommerce
 * Plugin URI: https://pagosonline.redsys.es/
 * Description: Acepta pagos con tarjeta o con BIZUM utilizando los servicios de Redsys.
 * Version: 1.5.1
 * Author: Redsys Servicios de Procesamiento S.L.
 * Author URI: http://www.redsys.es/
 */

add_action( 'init', 'init_redsys' );
add_action( 'plugins_loaded', 'load_redsys' );
add_action( 'activate_plugin', 'activate_redsyspur' , 10, 2);

$plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
$plugin_version = $plugin_data['Version'];

if ( ! defined( 'MODULE_VERSION' ) )
    define( 'MODULE_VERSION', $plugin_version );

if ( ! defined( 'REDSYSPUR_PLUGIN_FILE' ) )
    define( 'REDSYSPUR_PLUGIN_FILE', __FILE__ );

if ( ! defined( 'REDSYSPUR_PLUGIN_BASENAME' ) )
    define( 'REDSYSPUR_PLUGIN_BASENAME', plugin_basename( REDSYSPUR_PLUGIN_FILE ) );


function init_redsys() {
    load_plugin_textdomain( "redsys", false, dirname( plugin_basename( __FILE__ ) ));
}

function load_redsys() {
    if ( !class_exists( 'WC_Payment_Gateway' ) ) 
        exit;
   
    include_once ('wc-redsys.php');
    include_once ('wc-redsys-bizum.php');
    include_once ('wc-redsys-insite.php');
    include_once ('class-plugin-list-links.php');
   
    global $payment_methods;
   
    $payment_methods = array(
        new WC_Redsys(),
        new WC_Redsys_Bizum(),
        new WC_Redsys_Insite(),
    );
    
    add_filter( 'woocommerce_payment_gateways', 'anadir_pago_woocommerce_redsys' );
    add_action( 'woocommerce_blocks_loaded', 'anadir_pago_woocommerce_redsys_block' );
}

function anadir_pago_woocommerce_redsys($methods) {
    global $payment_methods;
    return array_merge($methods, $payment_methods);
}

function anadir_pago_woocommerce_redsys_block() {
    global $payment_methods;

	if ( class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
		require_once 'wc-redsys-block.php';
		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			function( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
				$payment_method_registry->register( new WC_Gateway_Redsys_Block('redsys') );
                $payment_method_registry->register( new WC_Gateway_Redsys_Block('redsys_bizum') );
                $payment_method_registry->register( new WC_Gateway_Redsys_Block('redsys_insite') );
			}
		);
	}
}

function activate_redsyspur($plugin, $network_wide) {
    if (!defined('WC_VERSION')) {
        wp_die('El plugin WooCommerce no esta activo');
    }
    deleteCustomerZero();
}

function deleteCustomerZero(){
    global $wpdb;
    $tableName=$wpdb->prefix."redsys_reference";

    $tablas=$wpdb->get_results( "SHOW TABLES LIKE '".$tableName."'" );
    if(sizeof($tablas)>0){
        $sql = "DELETE FROM `".$tableName."` WHERE id_customer = 0";
        $wpdb->get_results( $sql );
    }
}