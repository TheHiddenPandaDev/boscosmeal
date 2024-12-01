<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.6.14' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.6.5' );

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_PRO_UPGRADE_URL', astra_get_pro_url( 'https://wpastra.com/pro/', 'dashboard', 'free-theme', 'upgrade-now' ) );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', astra_get_pro_url( 'https://wpastra.com/pro/', 'customizer', 'free-theme', 'upgrade' ) );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';

/**
 * Calculator
 */
function my_enqueue_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-datepicker');

    wp_enqueue_style('jquery-ui-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
    wp_enqueue_style('select2-css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css');
    wp_enqueue_script('select2-js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');


add_action('wp_ajax_process_subscription', 'process_subscription');
add_action('wp_ajax_nopriv_process_subscription', 'process_subscription');

wp_enqueue_style( 'calculadora', get_template_directory_uri() . '/inc/assets/css/calculadora.css', false, '1.1', 'all');
wp_enqueue_script( 'calculadora_script', get_template_directory_uri() . '/inc/assets/js/calculadora.js', array( 'jquery' ), 1.1, true);
wp_localize_script('calculadora_script', 'ajax_object', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'cart_url'    => wc_get_cart_url(),
));

function process_subscription() {
    if (!isset($_POST['calculadora']) || empty($_POST['calculadora'])) {
        wp_send_json_error(['message' => 'Datos de la calculadora no válidos.']);
    }

    $calculator = $_POST['calculadora'];
    $products = $calculator['productsSelected'];

    if (empty($products)) {
        wp_send_json_error(['message' => 'No se seleccionaron productos.']);
    }

    $product_id = 3988; // ID PRODUCT SUBSCRIPTION
    $base_price = 0;
    $selected_products = [];

    foreach ($products as $product) {
        $variation_id = intval($product['variant_id']);
        $quantity = intval($product['quantity']);

        $custom_price = get_post_meta($variation_id, '_custom_price', true);
        $custom_price = str_replace(',', '.', $custom_price);
        $product_price = $custom_price ? floatval($custom_price) : 0;

        $base_price += $product_price * $quantity;

        // Obtener el nombre del producto principal
        $main_product = wc_get_product(intval($product['product_id']));
        $product_name = $main_product ? $main_product->get_name() : 'Producto desconocido';

        // Añadir los detalles del producto al array
        $selected_products[] = sprintf(
            '%s, precio: %.2f€, cantidad: %d, total: %.2f€',
            $product_name,
            $product_price,
            $quantity,
            $product_price * $quantity
        );
    }

    $cart_item_data = [
        'custom_price' => $base_price,
        'Nombre' => ucfirst(sanitize_text_field($calculator['animal']['name'])),
        'Tipo de animal' => sanitize_text_field($calculator['animal']['type']) == 'dog' ? 'Perro' : 'Gato',
        'Genero' => sanitize_text_field($calculator['animal']['gender']) == 'male' ? 'Macho' : 'Hembra',
        'Raza' => sanitize_text_field($calculator['animal']['race']),
        'Edad en meses' => sanitize_text_field($calculator['animal']['ageInMonth']),
        'Peso en gramos' => sanitize_text_field($calculator['animal']['weightInGrams']),
        '¿Está castrad@?' => sanitize_text_field($calculator['animal']['isNeutered']) ? 'Sí' : 'No',
        'Estado físico' => ucfirst(sanitize_text_field($calculator['animal']['physicalState'])),
        'Actividad física' => ucfirst(sanitize_text_field($calculator['animal']['physicalActivity'])),
        'Enfermedades' => ucfirst(sanitize_text_field($calculator['animal']['diseases'])),
        'Fecha de entrega' => sanitize_text_field($calculator['selectedDay']."/".$calculator['selectedMonth']."/".$calculator['selectedYear']),
        'Cantidad de comida al mes' => (float) (sanitize_text_field($calculator['monthlyQuantity']) / 1000) . 'kg',
        'Cantidad de comida diaria' => sanitize_text_field($calculator['dailyQuantity']).'gr',
        'Productos seleccionados' => "\n".implode("\n", $selected_products), // Lista de productos seleccionados como un string
    ];

    $cart_item_key = WC()->cart->add_to_cart($product_id, 1, 0, [], $cart_item_data);

    if (!$cart_item_key) {
        wp_send_json_error(['message' => 'No se pudo agregar la suscripción al carrito.']);
    }

    foreach (WC()->cart->get_cart() as $key => $item) {
        if ($key === $cart_item_key) {
            $item['data']->set_price($base_price);
        }
    }

    wp_send_json_success(['redirect_url' => wc_get_checkout_url()]);
}

add_action('woocommerce_before_calculate_totals', 'update_pricing_cart', 10, 1);

function update_pricing_cart($cart) {
    if (is_admin() && !defined('DOING_AJAX')) {
        return;
    }

    foreach ($cart->get_cart() as $cart_item) {
        if (isset($cart_item['custom_price'])) {
            $cart_item['data']->set_price($cart_item['custom_price']);
        }
    }
}

add_filter('woocommerce_get_item_data', 'show_metadata_cart', 10, 2);

function show_metadata_cart($item_data, $cart_item) {
    if (isset($cart_item['Nombre'])) {
        $item_data[] = [
            'name' => 'Nombre',
            'value' => sanitize_text_field($cart_item['Nombre']),
        ];
    }

    if (isset($cart_item['Tipo de animal'])) {
        $item_data[] = [
            'name' => 'Tipo de Animal',
            'value' => sanitize_text_field($cart_item['Tipo de animal']),
        ];
    }

    if (isset($cart_item['Raza'])) {
        $item_data[] = [
            'name' => 'Raza',
            'value' => sanitize_text_field($cart_item['Raza']),
        ];
    }

    return $item_data;
}

add_filter('woocommerce_cart_item_price', 'display_dynamic_price', 10, 3);

function display_dynamic_price($price, $cart_item, $cart_item_key) {
    if (isset($cart_item['custom_price'])) {
        $custom_price = wc_price($cart_item['custom_price']);
        return $custom_price . ' / month';
    }
    return $price;
}

add_action('woocommerce_checkout_create_order_line_item', 'ensure_dynamic_price_in_order', 10, 4);

function ensure_dynamic_price_in_order($item, $cart_item_key, $values, $order) {
    if (isset($values['custom_price']) && $values['custom_price'] > 0) {
        $item->set_subtotal($values['custom_price']);
        $item->set_total($values['custom_price']);
    }

    foreach ($values as $key => $value) {
        if (!in_array($key, ['custom_price', 'data'])) {
            $item->add_meta_data($key, $value, true);
        }
    }
}

add_action('woocommerce_subscription_cart_before_calculate_totals', 'set_subscription_price', 10, 1);

function set_subscription_price($cart) {
    foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
        if (isset($cart_item['custom_price'])) {
            $cart_item['data']->set_price($cart_item['custom_price']);
        }
    }
}


// Guardar los metadatos de la suscripción en el pedido
add_action('woocommerce_checkout_create_order_line_item', 'save_subscription_meta_data_to_order', 10, 4);
function save_subscription_meta_data_to_order($item, $cart_item_key, $values, $order) {
    if (isset($values['Nombre'])) {
        $item->add_meta_data('Nombre', $values['Nombre'], true);
    }
    if (isset($values['Tipo de animal'])) {
        $item->add_meta_data('Tipo de animal', $values['Tipo de animal'], true);
    }
    if (isset($values['Genero'])) {
        $item->add_meta_data('Genero', $values['Genero'], true);
    }
    if (isset($values['Raza'])) {
        $item->add_meta_data('Raza', $values['Raza'], true);
    }
    if (isset($values['Edad en meses'])) {
        $item->add_meta_data('Edad en meses', $values['Edad en meses'], true);
    }
    if (isset($values['Peso en gramos'])) {
        $item->add_meta_data('Peso en gramos', $values['Peso en gramos'], true);
    }
    if (isset($values['¿Está castrad@?'])) {
        $item->add_meta_data('¿Está castrad@?', $values['¿Está castrad@?'], true);
    }
    if (isset($values['Estado físico'])) {
        $item->add_meta_data('Estado físico', $values['Estado físico'], true);
    }
    if (isset($values['Actividad física'])) {
        $item->add_meta_data('Actividad física', $values['Actividad física'], true);
    }
    if (isset($values['Enfermedades'])) {
        $item->add_meta_data('Enfermedades', $values['Enfermedades'], true);
    }
    if (isset($values['Paquete de comida seleccionado'])) {
        $item->add_meta_data('Paquete de comida seleccionado', $values['Paquete de comida seleccionado'], true);
    }
    if (isset($values['Fecha de entrega'])) {
        $item->add_meta_data('Fecha de entrega', $values['Fecha de entrega'], true);
    }
    if (isset($values['Cantidad de comida al mes'])) {
        $item->add_meta_data('Cantidad de comida al mes', $values['Cantidad de comida al mes'], true);
    }
    if (isset($values['Cantidad de comida diaria'])) {
        $item->add_meta_data('Cantidad de comida diaria', $values['Cantidad de comida diaria'], true);
    }
    // Añadir los productos seleccionados al pedido
    if (isset($values['Productos seleccionados'])) {
        $item->add_meta_data('Productos seleccionados', $values['Productos seleccionados'], true);
    }
}

// Copiar los metadatos del pedido a la suscripción
add_action('woocommerce_subscription_created', 'copy_order_meta_to_subscription', 10, 3);
function copy_order_meta_to_subscription($subscription, $order, $order_items) {
    foreach ($order->get_items() as $item_id => $item) {
        if ($item->get_meta('Nombre')) {
            $subscription->update_meta_data('Nombre', $item->get_meta('Nombre'));
        }
        if ($item->get_meta('Tipo de animal')) {
            $subscription->update_meta_data('Tipo de animal', $item->get_meta('Tipo de animal'));
        }
        if ($item->get_meta('Genero')) {
            $subscription->update_meta_data('Genero', $item->get_meta('Genero'));
        }
        if ($item->get_meta('Raza')) {
            $subscription->update_meta_data('Raza', $item->get_meta('Raza'));
        }
        if ($item->get_meta('Edad en meses')) {
            $subscription->update_meta_data('Edad en meses', $item->get_meta('Edad en meses'));
        }
        if ($item->get_meta('Peso en gramos')) {
            $subscription->update_meta_data('Peso en gramos', $item->get_meta('Peso en gramos'));
        }
        if ($item->get_meta('¿Está castrad@?')) {
            $subscription->update_meta_data('¿Está castrad@?', $item->get_meta('¿Está castrad@?'));
        }
        if ($item->get_meta('Estado físico')) {
            $subscription->update_meta_data('Estado físico', $item->get_meta('Estado físico'));
        }
        if ($item->get_meta('Actividad física')) {
            $subscription->update_meta_data('Actividad física', $item->get_meta('Actividad física'));
        }
        if ($item->get_meta('Enfermedades')) {
            $subscription->update_meta_data('Enfermedades', $item->get_meta('Enfermedades'));
        }
        if ($item->get_meta('Paquete de comida seleccionado')) {
            $subscription->update_meta_data('Paquete de comida seleccionado', $item->get_meta('Paquete de comida seleccionado'));
        }
        if ($item->get_meta('Fecha de entrega')) {
            $subscription->update_meta_data('Fecha de entrega', $item->get_meta('Fecha de entrega'));
        }
        if ($item->get_meta('Cantidad de comida al mes')) {
            $subscription->update_meta_data('Cantidad de comida al mes', $item->get_meta('Cantidad de comida al mes'));
        }
        if ($item->get_meta('Cantidad de comida diaria')) {
            $subscription->update_meta_data('Cantidad de comida diaria', $item->get_meta('Cantidad de comida diaria'));
        }
        // Copiar los productos seleccionados a la suscripción
        if ($item->get_meta('Productos seleccionados')) {
            $subscription->update_meta_data('Productos seleccionados', $item->get_meta('Productos seleccionados'));
        }
    }
    $subscription->save();
}

add_action('wp_ajax_update_subscription_meta', 'update_subscription_meta');
function update_subscription_meta() {
    $subscription_id = intval($_POST['subscription_id']);
    $meta_data = $_POST['meta_data'];

    $subscription = wcs_get_subscription($subscription_id);

    if ($subscription) {
        $old_meta_data = array(
            'animal_name' => $subscription->get_meta('Nombre'),
            'animal_type' => $subscription->get_meta('Tipo de animal'),
            'animal_gender' => $subscription->get_meta('Genero'),
            'animal_race' => $subscription->get_meta('Raza'),
            'animal_age' => $subscription->get_meta('Edad en meses'),
            'animal_weight' => $subscription->get_meta('Peso en gramos'),
        );

        $subscription->update_meta_data('Nombre', sanitize_text_field($meta_data['animal_name']));
        $subscription->update_meta_data('Tipo de animal', sanitize_text_field($meta_data['animal_type']));
        $subscription->update_meta_data('Genero', sanitize_text_field($meta_data['animal_gender']));
        $subscription->update_meta_data('Raza', sanitize_text_field($meta_data['animal_race']));
        $subscription->update_meta_data('Edad en meses', intval($meta_data['animal_age']));
        $subscription->update_meta_data('Peso en gramos', intval($meta_data['animal_weight']));

        $subscription->save();

        send_subscription_update_email($subscription_id, $old_meta_data, $meta_data);

        wp_send_json_success('Suscripción actualizada correctamente.');
    } else {
        wp_send_json_error('No se pudo actualizar la suscripción.');
    }
}

add_action('wp_ajax_get_variation_by_package_size', 'get_variation_by_package_size');
add_action('wp_ajax_nopriv_get_variation_by_package_size', 'get_variation_by_package_size');

function get_variation_by_package_size() {
    $package_size = isset($_POST['package_size']) ? intval($_POST['package_size']) : null;
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : null;

    if (!$package_size || !$product_id) {
        wp_send_json_error(['message' => 'Datos incompletos.']);
    }

    $product = wc_get_product($product_id);

    if (!$product || !$product->is_type('variable')) {
        wp_send_json_error(['message' => 'Producto no válido']);
    }

    $name = $product->get_name();
    $image_id = $product->get_image_id();
    $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');

    if($package_size === 1000){
        $package_size = 1;
    }

    foreach ($product->get_available_variations() as $variation) {
        $variation_id = $variation['variation_id'];
        $product_variation = new WC_Product_Variation($variation_id);

        $title = $product_variation->get_attribute('Formato');

        if (empty($title)) {
            continue;
        }

        $packageSizeVariation = str_replace('g', '', strtolower($title));
        $packageSizeVariation = str_replace('gr', '', strtolower($packageSizeVariation));
        $packageSizeVariation = str_replace('kg', '', strtolower($packageSizeVariation));

        if ((int) $packageSizeVariation === (int) $package_size) {
            $custom_price = get_post_meta($variation_id, '_custom_price', true);

            $price = $custom_price ? custom_floatval($custom_price) : 0;

            wp_send_json_success([
                'variation_id' => $variation_id,
                'name' => $name,
                'image' => $image_url,
                'title' => $title,
                'weight' => $package_size,
                'price' => $price,
            ]);
        }
    }

    wp_send_json_error(['message' => 'Variación no encontrada']);
}

function custom_floatval($value) {
    $value = str_replace(',', '.', $value);
    $float_value = floatval($value);
    return number_format($float_value, 2, ',', '');
}


// Esconde metadatos irrelevantes en los correos electrónicos de WooCommerce
add_filter('woocommerce_email_order_meta', function ($order, $sent_to_admin, $plain_text, $email) {
    foreach ($order->get_items() as $item_id => $item) {
        if ($item->get_product_id() == 3988) { // Solo para el producto con ID 3988
            $meta_data = $item->get_meta_data();
            $filtered_meta = [];
            foreach ($meta_data as $meta) {
                $key = $meta->key;
                // Incluir solo los metadatos relevantes
                if (in_array($key, [
                    'Nombre', 'Tipo de animal', 'Genero', 'Raza',
                    'Edad en meses', 'Peso en gramos', 'Estado físico',
                    'Actividad física', 'Enfermedades', 'Fecha de entrega',
                    'Cantidad de comida al mes', 'Cantidad de comida diaria',
                    'Platos seleccionados', 'Cantidad'
                ])) {
                    $filtered_meta[$key] = $meta->value;
                }
            }
            // Mostrar solo los datos relevantes
            echo '<h3>Detalles de la Suscripción</h3>';
            echo '<ul>';
            foreach ($filtered_meta as $key => $value) {
                echo '<li><strong>' . esc_html($key) . ':</strong> ' . esc_html($value) . '</li>';
            }
            echo '</ul>';
        }
    }
}, 10, 4);

add_filter('woocommerce_hidden_order_itemmeta', function ($hidden_meta) {
    $hidden_meta = array_merge($hidden_meta, [
        'key', 'product_id', 'variation_id', 'quantity', 'data_hash',
        'line_subtotal', 'line_subtotal_tax', 'line_total', 'line_tax'
    ]);
    return $hidden_meta;
});

add_filter('woocommerce_order_item_get_formatted_meta_data', function ($formatted_meta, $item) {
    if ($item->get_product_id() == 3988) { // Solo para el producto con ID 3988
        foreach ($formatted_meta as $key => $meta) {
            if (in_array($meta->key, [
                'key', 'product_id', 'variation_id', 'quantity',
                'data_hash', 'line_subtotal', 'line_subtotal_tax',
                'line_total', 'line_tax'
            ])) {
                unset($formatted_meta[$key]);
            }
        }
    }
    return $formatted_meta;
}, 10, 2);

add_filter('wcs_view_subscription_item_meta', function ($formatted_meta, $item) {
    if ($item->get_product_id() == 3988) { // Solo para el producto con ID 3988
        foreach ($formatted_meta as $key => $meta) {
            if (in_array($meta->key, [
                'key', 'product_id', 'variation_id', 'quantity',
                'data_hash', 'line_subtotal', 'line_subtotal_tax',
                'line_total', 'line_tax'
            ])) {
                unset($formatted_meta[$key]);
            }
        }
    }
    return $formatted_meta;
}, 10, 2);

add_filter('wcs_renewal_order_meta_query', function ($meta_query, $original_order_id, $renewal_order_id, $subscription) {
    foreach ($meta_query as $key => $meta) {
        if (in_array($meta['meta_key'], [
            'key', 'product_id', 'variation_id', 'quantity',
            'data_hash', 'line_subtotal', 'line_subtotal_tax',
            'line_total', 'line_tax'
        ])) {
            unset($meta_query[$key]);
        }
    }
    return $meta_query;
}, 10, 4);

add_filter('woocommerce_order_item_get_tax_class', function ($tax_class, $item) {
    if ($item->get_product_id() == 3988) { // ID del producto de suscripción
        return '';
    }
    return $tax_class;
}, 10, 2);

function replace_menu_item_with_svg($items, $args) {
    foreach ($items as $item) {
        if ($item->classes && in_array('menu-icon-user', $item->classes)) {
            $item->title = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'replace_menu_item_with_svg', 10, 2);
