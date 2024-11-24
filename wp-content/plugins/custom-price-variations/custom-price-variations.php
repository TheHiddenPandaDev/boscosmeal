<?php
/**
 * Plugin Name: Custom Price for Product Variations
 * Plugin URI: https://thehiddenpanda.com/
 * Description: Adds a custom price field to WooCommerce product variations for more flexibility in pricing.
 * Version: 1.3
 * Author: Dani Roman Martinez
 * Author URI: https://thehiddenpanda.com/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: custom-price-variations
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Add custom price field to variation options
add_action('woocommerce_variation_options_pricing', 'add_custom_price_field', 10, 3);
function add_custom_price_field($loop, $variation_data, $variation) {
    // Get the saved custom price for this variation
    $custom_price = get_post_meta($variation->ID, '_custom_price', true);

    // Generate the field with the correct paragraph wrapper
    echo '<p class="form-row form-field">';
    echo '<label for="_custom_price_' . esc_attr($variation->ID) . '">' . __('Custom Price (€)', 'custom-price-variations') . '</label>';
    echo '<input type="text" class="short" id="_custom_price_' . esc_attr($variation->ID) . '" name="_custom_price[' . esc_attr($variation->ID) . ']" value="' . esc_attr($custom_price) . '" placeholder="' . __('Enter custom price', 'custom-price-variations') . '" />';
    echo '<span class="description">' . __('Set a specific custom price for this variation.', 'custom-price-variations') . '</span>';
    echo '</p>';
}

// Save custom price field
add_action('woocommerce_save_product_variation', 'save_custom_price_field', 10, 2);
function save_custom_price_field($variation_id, $i) {
    if (isset($_POST['_custom_price'][$variation_id])) {
        $custom_price = sanitize_text_field($_POST['_custom_price'][$variation_id]);
        update_post_meta($variation_id, '_custom_price', $custom_price);
    }
}

// Load custom price field in variations data
add_filter('woocommerce_available_variation', 'load_custom_price_field');
function load_custom_price_field($variation) {
    $variation['custom_price'] = get_post_meta($variation['variation_id'], '_custom_price', true);
    return $variation;
}
