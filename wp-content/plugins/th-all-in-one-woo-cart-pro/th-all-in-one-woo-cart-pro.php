<?php
/**
 * Plugin Name:             TH All In One Woo Cart Pro
 * Plugin URI:              https://themehunk.com
 * Version:                 3.1.1
 * Description:             TH All In One Woo Cart is a perfect choice to display Cart on your WooCommerce website to improve your potential customer’s buying experience. This plugin will add Floating Cart in your website.  Customers can update or remove products from the cart without reloading the cart continuously. It is a fully Responsive, mobile friendly plugin and supports many advanced features.
 * Author:                  ThemeHunk
 * Author URI:              https://themehunk.com
 * Requires at least:       4.8
 * Tested up to:            6.4.2
 * WC requires at least:    3.2
 * WC tested up to:         8.2
 * Domain Path:             /languages
 * Text Domain:             taiowcp
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if (!defined('TAIOWCP_PLUGIN_FILE')) {
    define('TAIOWCP_PLUGIN_FILE', __FILE__);
}

if (!defined('TAIOWCP_PLUGIN_URI')) {
    define( 'TAIOWCP_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
}

if (!defined('TAIOWCP_PLUGIN_PATH')) {
    define( 'TAIOWCP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

if (!defined('TAIOWCP_PLUGIN_DIRNAME')) {
    define( 'TAIOWCP_PLUGIN_DIRNAME', dirname( plugin_basename( __FILE__ ) ) );
}

if (!defined('TAIOWCP_PLUGIN_BASENAME')) {
    define( 'TAIOWCP_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}

if (!defined('TAIOWCP_IMAGES_URI')) {
define( 'TAIOWCP_IMAGES_URI', trailingslashit( plugin_dir_url( __FILE__ ) . 'images' ) );
}

if (!defined('TAIOWCP_VERSION')) {

$plugin_data = get_file_data(__FILE__, array('version' => 'Version'), false);

define('TAIOWCP_VERSION', $plugin_data['version']);

} 

if (!class_exists('taiowcp')){
include_once(TAIOWCP_PLUGIN_PATH . 'inc/themehunk-menu/admin-menu.php');
require_once("inc/taiowcp.php");

}     

/**
 * Deactivate plugin example class.
 */

if (!class_exists('Taiowcp_Deactivate_Plugin')) {

class Taiowcp_Deactivate_Plugin{
    /**
     * Constructor.
     */
    public function __construct(){

        register_activation_hook( __FILE__, array( $this , 'deactivate' ) );

    }
    
    public function deactivate() {
       require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
       deactivate_plugins( plugin_basename('th-all-in-one-woo-cart/th-all-in-one-woo-cart.php' ) ); 
    }
}

new Taiowcp_Deactivate_Plugin(); 

}     


/****************/
//Block registered
/****************/

function taiowcp_register_blocks() {
    $blocks = array(
        array(
            'name'           => 'taiowcp/taiowcp',
            'script_handle'  => 'taiowcp',
            'editor_style'   => 'taiowcp-editor-style',
            'frontend_style' => 'taiowcp-frontend-style',
            'render_callback' => 'taiowcp_blocks_render_callback',
            'localize_data'  => array(
                'adminUrlsearchtaiowcp' => admin_url('admin.php?page=taiowcp'),
            ),
        ),
    );
  
    foreach ( $blocks as $block ) {
        // Register JavaScript file
        wp_register_script(
            $block['script_handle'],
            TAIOWCP_PLUGIN_URI . 'build/' . $block['script_handle'] . '.js',
            array( 'wp-blocks', 'wp-element', 'wp-editor' ),
            filemtime( TAIOWCP_PLUGIN_PATH . '/build/' . $block['script_handle'] . '.js' )
        );
  
        // Register editor style
        wp_register_style(
            $block['editor_style'],
            TAIOWCP_PLUGIN_URI . 'build/' . $block['script_handle'] . '.css',
            array( 'wp-edit-blocks' ),
            filemtime( TAIOWCP_PLUGIN_PATH . '/build/' . $block['script_handle'] . '.css' )
        );
  
        // Register front end block style
        wp_register_style(
            $block['frontend_style'],
            TAIOWCP_PLUGIN_URI . 'build/style-' . $block['script_handle'] . '.css',
            array(),
            filemtime( TAIOWCP_PLUGIN_PATH . '/build/style-' . $block['script_handle'] . '.css' )
        );
  
        // Localize the script with data
        if ( isset( $block['localize_data'] ) && ! is_null( $block['localize_data'] ) ) {
            wp_localize_script(
                $block['script_handle'],
                'ThBlockDatataiowcp',
                $block['localize_data']
            );
        }
  
        // Prepare the arguments for registering the block
        $block_args = array(
            'editor_script'   => $block['script_handle'],
            'editor_style'    => $block['editor_style'],
            'style'           => $block['frontend_style'],
        );
  
        // Check if the render callback is set and not null
        if ( isset( $block['render_callback'] ) && ! is_null( $block['render_callback'] ) ) {
            $block_args['render_callback'] = $block['render_callback'];
           
        }
  
        // Register each block
        register_block_type( $block['name'], $block_args );
    }
    
  }
  
  add_action( 'init', 'taiowcp_register_blocks' );
  
  function taiowcp_blocks_categories( $categories ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'taiowcp',
                'title' => __( 'All In One Woo Cart Pro', 'taiowcp' ),
            ],
        ]
    );
  }
  add_filter( 'block_categories_all', 'taiowcp_blocks_categories', 11, 2);
  
  function taiowcp_blocks_editor_assets(){
  
  $asset_file = require_once TAIOWCP_PLUGIN_PATH .'build/taiowcp-data.asset.php';
  
  wp_enqueue_script(
    'taiowcp-data-block',
    TAIOWCP_PLUGIN_URI . 'build/taiowcp-data.js',
    array_merge(
      $asset_file['dependencies']
    ),
    '1.0.0',
    true
  );
    wp_localize_script(
        'taiowcp-data-block',
        'thnkblock',
        array(
            'homeUrl' => plugins_url( '/', __FILE__ ),
            'showOnboarding' => '',
        )
    );
      
  }
  add_action( 'enqueue_block_editor_assets', 'taiowcp_blocks_editor_assets' );
  
  
  
  function taiowcp_blocks_render_callback( $attr ) {
  
      if ( function_exists( 'get_current_screen' ) && get_current_screen()->is_block_editor() ) {
          return;
      } 
     
    $block_content = '<div id="wp-block-taiowcp-' . esc_attr($attr['uniqueID']) . '"  class="wp-block-taiowcp">';
    
    $cartStyle = '[taiowcp]';
  
    $block_content .= ''.do_shortcode($cartStyle).'</div>';
    
    return $block_content;
    
  }