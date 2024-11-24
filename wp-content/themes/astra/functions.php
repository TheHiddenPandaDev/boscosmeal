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
wp_enqueue_style( 'calculadora', get_template_directory_uri() . '/inc/assets/css/calculadora.css', false, '1.1', 'all');
wp_enqueue_script( 'calculadora_script', get_template_directory_uri() . '/inc/assets/js/calculadora.js', array( 'jquery' ), 1.1, true);
wp_localize_script('calculadora_script', 'ajax_object', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'cart_url'    => wc_get_cart_url(),
));

function process_subscription() {
    if ($_POST['calculadora']) {
        $calculator = $_POST['calculadora'];
        $packageSelected = sanitize_text_field($calculator['packageSelected']);

        $parent_product_id = 3800;

        if($packageSelected == 250){
            $packageSelectedValue = '250gr';
            $product_id = 3805;
        } else if($packageSelected == 500){
            $packageSelectedValue = '500gr';
            $product_id = 3806;
        } else {
            $packageSelectedValue = '1kg';
            $product_id = 3804;
        }

        $product = wc_get_product($parent_product_id);

        $variation_attributes = array(
            'tamano-del-paquete' => $packageSelectedValue,
        );

        if ($product && $product->is_type('variable-subscription')) {
            $cart_item_data = array(
                'Nombre' => ucfirst(sanitize_text_field($calculator['animal']['name'])),
                'Tipo de animal' => sanitize_text_field($calculator['animal']['type']) == 'dog' ? 'Perro' : 'Gato',
                'Genero' => sanitize_text_field($calculator['animal']['gender']) == 'male' ? 'Macho' : 'Hembra',
                'Raza' => sanitize_text_field($calculator['animal']['race']),
                'Edad en meses' => sanitize_text_field($calculator['animal']['ageInMonth']),
                'Peso en gramos' => sanitize_text_field($calculator['animal']['weightInGrams']),
                '¿Esta castrad@?' => sanitize_text_field($calculator['animal']['isNeutered']) ? 'Si' : 'No',
                'Estado físico' => ucfirst(sanitize_text_field($calculator['animal']['physicalState'])),
                'Actividad física' => ucfirst(sanitize_text_field($calculator['animal']['physicalActivity'])),
                'Enfermedades' => ucfirst(sanitize_text_field($calculator['animal']['diseases'])),
                'Paquete de comida seleccionado' => $packageSelected,
                'Fecha de entrega' => sanitize_text_field($calculator['selectedDay']."/".$calculator['selectedMonth']."/".$calculator['selectedYear']),
                'Cantidad de comida al mes' => (float) (sanitize_text_field($calculator['monthlyQuantity']) / 1000) . 'kg',
                'Cantidad de comida diaria' => sanitize_text_field($calculator['dailyQuantity']).'gr',
            );

            $added_to_cart = WC()->cart->add_to_cart($parent_product_id, 1, $product_id, $variation_attributes, $cart_item_data);

            if ($added_to_cart) {
                wp_send_json_success(array('redirect_url' => wc_get_checkout_url()));
            } else {
                wp_send_json_error('Error al añadir el producto al carrito');
            }
        } else {
            wp_send_json_error('El producto no es una suscripción válida');
        }
    } else {
        wp_send_json_error('No se recibieron productos');
    }
}

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
    if (isset($values['¿Esta castrad@?'])) {
        $item->add_meta_data('¿Esta castrad@?', $values['¿Esta castrad@?'], true);
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
}

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
        if ($item->get_meta('¿Esta castrad@?')) {
            $subscription->update_meta_data('¿Esta castrad@?', $item->get_meta('¿Esta castrad@?'));
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


/****
 EDIT SUSCRIPTION
 ****/