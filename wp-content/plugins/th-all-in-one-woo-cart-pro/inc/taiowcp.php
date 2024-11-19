<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Taiowcp_Main' ) ):

    class Taiowcp_Main {
        /**
         * Member Variable
         *
         * @var object instance
         */
       private static $instance;
       private $taiowcp_set_api;
       public  $taiowcp_cartInstances = 0 ;
       public  $taiowcp_notices = array();
       private $isSideCartPage;

       /**
         * Initiator
        */

        public static function instance() {

            if ( ! isset( self::$instance ) ) {

                self::$instance = new self();

            }

            return self::$instance;

        }

        /**
         * Constructor
         */
        public function __construct(){

       add_action( 'before_woocommerce_init', array( $this, 'hpos_compatibility') );

        $this->taiowcp_includes();

        $this->taiowcp_hooks();
        
        }

        public function taiowcp_includes() {
 
                require_once TAIOWCP_PLUGIN_PATH . '/inc/taiowcp-option.php';
                require_once TAIOWCP_PLUGIN_PATH . '/inc/taiowcp-nav-menu.php';
                require_once TAIOWCP_PLUGIN_PATH . '/inc/taiowcp-markup.php';
                require_once TAIOWCP_PLUGIN_PATH . '/inc/taiowcp-cart-fragment.php';
                require_once TAIOWCP_PLUGIN_PATH . '/inc/taiowcp-style.php';
                require_once TAIOWCP_PLUGIN_PATH . '/inc/taiowcp-admin-style.php';
                require_once TAIOWCP_PLUGIN_PATH . '/inc/taiowcp-setting.php';

        }

        public function taiowcp_hooks() {

                add_action( 'init', array( $this, 'taiowcp_settings_api' ), 5 );

                if($this->taiowcp_is_wc_active()){ 

                add_filter( 'body_class', array( $this, 'taiowcp_body_class' ) );

                add_filter( 'woocommerce_post_class',array( $this, 'taiowcp_woo_post_class' )  ); 

                add_shortcode( 'taiowcp', array( $this, 'taiowcp_addBody' ), 5 );

                add_action( 'wp_enqueue_scripts', array( $this, 'taiowcp_scripts' ), 1 );

                add_action('taiowcp_cart_show_icon',array( $this,'taiowcp_cart_icon'));

                add_action( 'wp_footer', array( $this, 'taiowcp_addcartBody' ) );

                add_action( 'taiowcp_mini_cart', array( $this, 'taiowcp_mini_cart_content' ) );

                add_action( 'taiowcp_mini_cart_empty', array( $this, 'taiowcp_mini_cart_empty_content' ) );
                
                add_action( 'wp_ajax_taiowcp_create_nonces', array( $this,'taiowcp_create_nonces'));
                add_action( 'wp_ajax_nopriv_taiowcp_create_nonces', array( $this,'taiowcp_create_nonces'));

                add_action( 'wc_ajax_taiowcp_update_item_quantity', array( $this,'taiowcp_update_item_quantity'));

                add_action( 'wc_ajax_taiowcp_add_item_cart', array( $this,'taiowcp_add_item_cart'));

                 add_action( 'wc_ajax_taiowcp_undo_item', array( $this,'taiowcp_undo_item'));
 
            }

        }
        
        public function taiowcp_is_wc_active() {

            return class_exists( 'WooCommerce' );

        }
        
        /**
     *  Declare the woo HPOS compatibility.
     */
    public function hpos_compatibility() {

            if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
                \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', TAIOWCP_PLUGIN_FILE, true );
            }
    }
    
        public function taiowcp_is_required_php_version() {

            return version_compare( PHP_VERSION, '5.6.0', '>=' );

        }

        public function taiowcp_settings_api() {

            if ( ! $this->taiowcp_set_api ){

                $this->taiowcp_set_api = new taiowcp_Set();

            }

            return $this->taiowcp_set_api;
        }

        public function taiowcp_get_option( $id ) {
           
            if ( ! $this->taiowcp_set_api ) {

                $this->taiowcp_settings_api();

            }
            
            return $this->taiowcp_set_api->taiowcp_get_option( $id );
        }

        public function taiowcp_get_options() {

            return get_option( 'taiowcp' );
            
        }

        public function taiowcp_body_class( $classes ) {
           
            $old_classes = $classes;

            if ( apply_filters( 'taiowcp_body_class_disable', false ) ) {

                return $classes;

            }

            array_push( $classes, 'taiowcp' );

            if ( wp_is_mobile() ) {

                array_push( $classes, 'taiowcp-on-mobile' );

            }
            
            return apply_filters(  'taiowcp_body_class_', array_unique( $classes ), $old_classes );
        }

        public function taiowcp_woo_post_class( $classes ) {

            $old_classes = $classes;

            if(taiowcp_main()->taiowcp_get_option('taiowcp-cart_open')=='fly-image-open'){

            array_push( $classes, 'taiowcp-fly-cart' );

            } 

            return apply_filters(  'taiowcp_woo_post_class_', array_unique( $classes ), $old_classes );
        }

        public function taiowcp_scripts(){

              wp_enqueue_style( 'taiowcp-style', TAIOWCP_PLUGIN_URI. '/assets/css/taiowcp-style.css', array(), TAIOWCP_VERSION );

             wp_enqueue_style( 'taiowcp-owl.carousel-style', TAIOWCP_PLUGIN_URI. '/assets/css/owl.carousel.css', array(), TAIOWCP_VERSION );

             wp_enqueue_style( 'th-icon', TAIOWCP_PLUGIN_URI. '/th-icon/style.css', array(), TAIOWCP_VERSION );

              wp_add_inline_style('taiowcp-style', taiowcp_style_pro());

              wp_enqueue_script( 'taiowcp-cart-script', TAIOWCP_PLUGIN_URI. '/assets/js/taiowcp-cart.js', array( 'jquery' ), true);

              wp_enqueue_script( 'taiowcp-owl.carousel-script', TAIOWCP_PLUGIN_URI. '/assets/js/owl.carousel.js', array( 'jquery' ),true);
               
              if(taiowcp_main()->taiowcp_get_option('taiowcp-cart_open')=='fly-image-open'){

               wp_enqueue_script( 'taiowcp-fly-cart-script', TAIOWCP_PLUGIN_URI. '/assets/js/taiowcp-flycart.js', array( 'jquery' ),true);

               wp_enqueue_script('taiowcp-jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js');

              }
                
              wp_enqueue_script( 'wc-cart-fragments' );
             
              $noticeMarkup = '<ul class="taiowcp-notices-msg">%s</ul>'; 

              wp_localize_script(

                'taiowcp-cart-script', 'taiowcp_param', array(

                    'ajax_url'             => esc_url(admin_url( 'admin-ajax.php' )),

                    'wc_ajax_url'          => esc_url(WC_Ajax::get_endpoint( "%%endpoint%%" )),

                    'apply_coupon_nonce'   => wp_create_nonce('apply-coupon'),

                    'remove_coupon_nonce'  => wp_create_nonce('remove-coupon'),

                    'update_shipping_method_nonce' => wp_create_nonce( 'update-shipping-method' ),    

                    'taiowcp_cart_open' => esc_html(taiowcp_main()->taiowcp_get_option('taiowcp-cart_open')),
                    
                    
                   
                )
            );
        }

        public function taiowcp_add_setting( $tab_id, $tab_title, $tab_sections, $active = false, $is_pro_tab = false, $is_new = false ) {
            add_filter(
                'taiowcp_settings', function ( $fields ) use ( $tab_id, $tab_title, $tab_sections, $active, $is_pro_tab, $is_new ) {
                array_push(
                    $fields, array(
                        'id'       => $tab_id,
                        'title'    => esc_html( $tab_title ),
                        'active'   => $active,
                        'sections' => $tab_sections,
                        'is_pro'   => $is_pro_tab,
                        'is_new'   => $is_new
                    )
                );

                return $fields;
            }
          );
        }
       
      /*****************/
      // ADD SHORTCODE
      /*****************/
       public function taiowcp_addBody( $atts, $content, $tag ) {

        $crtArgs = shortcode_atts( array(
            'layout'         => '',
        ), $atts, $tag );

        $args = apply_filters( 'taiowcp_shortcode_arg', $crtArgs );

        return self::taiowcp_getCart($args );

       }

       public function taiowcp_getCart( $args ) {

        if( !$this->taiowcp_HideCartPage() ) return;
       
        ob_start();

        $filename = apply_filters( 'taiowcp_path', TAIOWCP_PLUGIN_PATH . '/inc/taiowcp-cart.php' );

        if ( file_exists( $filename ) ) {

            include $filename;

            if ( function_exists( 'opcache_invalidate' ) ) {

                @opcache_invalidate( $filename, true );

            }

        }

        $html = ob_get_clean();

        return apply_filters( 'taiowcp_html', $html, $args );

       }

       public function taiowcp_cart_icon(){
              
              $icon_svg = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart-icon' );

              $icon_img_url = taiowcp_main()->taiowcp_get_option( 'taiowcp-icon_url' );
               
              if( $icon_svg=='icon-1' ){ ?>
                 
              <span class="th-icon th-icon-Shopping_icons-01"></span>

              <?php }elseif($icon_svg=='icon-2'){?>

              <span class="th-icon th-icon-Shopping_icons-11"></span>
               
              <?php }elseif($icon_svg=='icon-3'){?>

              <span class="th-icon th-icon-Shopping_icons-16"></span>

              <?php }elseif($icon_svg=='icon-4'){?>

             <span class="th-icon th-icon-Shopping-Bag-Cart-Icons-01"></span>

              <?php }elseif($icon_svg=='icon-5'){?>

             <span class="th-icon th-icon-Shopping-Bag-Cart-Icons-11"></span>

             <?php }elseif($icon_svg=='icon-6'){ ?>

             <span class="th-icon th-icon-Shopping-Bag-Cart-Icons-23"></span>
                
             <?php }elseif($icon_svg=='icon-7'){

                 if($icon_img_url!==''){

                    ?>

                <img src="<?php echo esc_url($icon_img_url); ?>" class="taiowcp-cart-icon-img">


             <?php } 

             }

         }


         public function taiowcp_addcartBody(){
            
            if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_cart' ) == true){
       
                if(taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_style' ) == 'style-1'){

                     echo do_shortcode('[taiowcp layout="cart_fixed_1"]');

                }elseif(taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_style' ) == 'style-2'){

                     echo do_shortcode('[taiowcp layout="cart_fixed_2"]');

                }

             }


         }


        public function taiowcp_get_cart_count(){

                if( taiowcp_main()->taiowcp_get_option( 'taiowcp-basket_count' ) == 'numb_prd' ){

                    return count( WC()->cart->get_cart() );
                }
                else{

                    return WC()->cart->get_cart_contents_count();
                }

            }

        public function taiowcp_mini_cart_content(){ ?>

        <?php if ( WC()->cart && ! WC()->cart->is_empty() ) : ?>     

        <div class="woocommerce-mini-cart cart_list taiowcp-mini-cart-list">

        <?php

        if( taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_item_order' ) == 'prd_first' ){

                 $get_cart_content =  array_reverse( WC()->cart->get_cart() );

            }else{

                $get_cart_content = WC()->cart->get_cart();

        }
       

        foreach ( $get_cart_content as $cart_item_key => $cart_item ) {

            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

                $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );

                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

                $rating_count   =  $_product->get_rating_count();

                $average        =  $_product->get_average_rating();

                $rating         = apply_filters( 'woocommerce_cart_item_rating', wc_get_rating_html( $average, $rating_count ), $cart_item, $cart_item_key );

                $quantity_text = esc_html__('Quantity','taiowcp');

                $quant = $this->taiowcp_mini_cart_add_quantity($_product,$cart_item_key,$cart_item);

                if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_prd_img' ) == false){

                $thumbnail ='';

                }

                if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_prd_title' ) == false){
                    
                $product_name ='';

                }

                if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_prd_price' ) == false){
                    
                $product_price ='';

                }
               
                if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_prd_quantity' ) == false){ 

                $quant = '';
                $quantity_text = '';

                }

                ?>
                <div class="taiowcp-woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">

                    <div class="item-product-wrap">

                    <?php
                    echo apply_filters( 
                        'woocommerce_cart_item_remove_link',
                        sprintf(
                            '<a class="taiowcp-remove-item taiowcp_remove_from_cart_button" aria-label="%s" data-product_id="%s" data-key="%s" data-product_sku="%s"><svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" alt="" title="" class="snipcart__icon"><path fill-rule="evenodd" clip-rule="evenodd" d="M22 4v6.47H12v3.236h40V10.47H42V4H22zm3.333 6.47V7.235H38.67v3.235H25.333zm20.001 9.707h3.333V59H15.334V20.177h3.333v35.588h26.667V20.177zm-15 29.116V23.412h3.334v25.881h-3.334z" fill="currentColor"></path></svg> </a>',
                            esc_attr__( 'Remove this item', 'woocommerce' ),
                            esc_attr( $product_id ),
                            esc_attr( $cart_item_key ),
                            esc_attr( $_product->get_sku() )
                        ),
                        $cart_item_key
                    );
                    
                    ?>

                    <?php

                     if ( empty( $product_permalink ) ) : ?>

                     <?php 

                        echo wp_kses_post($thumbnail);

                        echo esc_html($product_name); 

                        if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_prd_rating' ) == true){

                        echo wp_kses_post(apply_filters( 'woocommerce_cart_item_rating', wc_get_rating_html( $average, $rating_count ), $cart_item, $cart_item_key ));

                        }

                        echo wp_kses_post(wc_get_formatted_cart_item_data( $cart_item )); 
                        ?>

                    <?php else : ?>

                        <a href="<?php echo esc_url( $product_permalink ); ?>">

                        <?php 

                         

                        echo wp_kses_post($thumbnail);

                        echo esc_html($product_name);

                        if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_prd_rating' ) == true){

                        echo wp_kses_post(apply_filters( 'woocommerce_cart_item_rating', wc_get_rating_html( $average, $rating_count ), $cart_item, $cart_item_key ));
                         
                        }
                       

                        ?>

                        </a>

                         <?php echo wp_kses_post(wc_get_formatted_cart_item_data( $cart_item )); ?>

                    <?php endif; 

                     ?>
                </div>

                <?php if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_prd_quantity' ) || taiowcp_main()->taiowcp_get_option( 'taiowcp-show_prd_price' ) == true){ ?>
                
                <div class="item-product-quantity">

                 

                    <?php  

                    $taiowcp_allow_tag = array( 
                        
                        'input' => array( 
                               'id' => array(),
                               'class' => array(),
                               'name' => array(),
                               'value' => array(),
                               'step' => array(),
                               'max' => array(),
                               'min' => array(),
                               'data-key' => array(),
                               'title' => array(),
                               'size' => array(),
                               'type' => array(),
                              )
                        );


                       echo apply_filters('woocommerce_widget_cart_item_quantity',

                        sprintf('<span class="quantity"><span class="quantity-text">%1s</span>%2s %3s</span>',esc_html($quantity_text), wp_kses($quant,$taiowcp_allow_tag), wp_kses_post($product_price)),$cart_item, $cart_item_key);

                   ?>

               </div>

           <?php } ?>
          

            </div>

                <?php

            }
        }
        
        ?>
    </div>
     
    <?php else : 

    do_action('taiowcp_mini_cart_empty');

    endif;

  }    
 
    public function taiowcp_mini_cart_empty_content(){ 

             if(taiowcp_main()->taiowcp_get_option( 'taiowcp-empty_cart_url' )){
              
              $empty_btn_url = taiowcp_main()->taiowcp_get_option( 'taiowcp-empty_cart_url' );

             }else{

              $empty_btn_url = get_permalink( wc_get_page_id( 'shop' ) );

             }

        ?>
     
             <p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'Your Cart is Empty', 'taiowcp' ); ?></p>

             <a href="<?php echo esc_url($empty_btn_url);?>" class="woocommerce-back-to-shop"><?php echo esc_html(taiowcp_main()->taiowcp_get_option( 'taiowcp-empty_cart_txt' )); ?></a>

    <?php }

    public function taiowcp_mini_cart_add_quantity($_product,$cart_item_key,$cart_item){ 
                
                if ( $_product->is_sold_individually() ) {

                    $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );

                     } else {

                     $min = 0;

                     $max = $_product->get_max_purchase_quantity();

                    // Apply sanity to min/max args - min cannot be lower than 0.
                    $min = max( $min, 0 );

                    $max = 0 < $max ? $max : '';

                    // Max cannot be lower than min if defined.
                    if ( '' !== $max && $max < $min ) {

                      $max = $min;

                    }

                                    $input_id     = uniqid( 'quantity_' );
                                    $input_name   = "cart[{$cart_item_key}][qty]";
                                    $classes      = "taiowcp-quantity input-text qty text";
                                    $input_value  = $cart_item['quantity'];
                                    $max_value    = $max;
                                    $min_value    = $min;
                                    $product_id   = $cart_item_key;
                                    

                            $product_quantity = sprintf( '<input type="number" id="%s" class="%s" name="%s" value="%s" step="1" max="%s" min="%s" data-key="%s"  title="Qty" size="4" >',esc_attr($input_id), esc_attr($classes), esc_attr($input_name), esc_attr($input_value), esc_attr($max_value), esc_attr($min_value) , esc_attr($product_id));

                            

                        }

                        return $product_quantity;

     }    


    public function taiowcp_create_nonces(){

        $actions = array(
            'apply-coupon',
            'remove-coupon',
            'update-shipping-method'
        );

        $nonces = array();

        foreach ($actions as $action) {
            $nonces[$action] = wp_create_nonce( $action );
        }

        wp_send_json( $nonces );
    }

    //add item cart

        public function taiowcp_add_item_cart(){

        $product_id   = sanitize_text_field( $_POST['product_id'] );

        $new_qty      = (int) $_POST['new_qty'];
        

        $added = WC()->cart->add_to_cart( $product_id );

         if( $added ){

                $notice = esc_html__( 'Product Added', 'taiowcp' );

                $this->taiowcp_set_notice( $notice, 'success' );
           }


        WC_AJAX::get_refreshed_fragments();

        die();

      }

     // update quantity

        public function taiowcp_update_item_quantity(){

        $cart_key   = sanitize_text_field( $_POST['cart_key'] );

        $new_qty    = (float) $_POST['new_qty'];

        if( !is_numeric( $new_qty ) || $new_qty < 0 || !$cart_key ){

        $this->taiowcp_set_notice( esc_html__( 'Something went wrong', 'taiowcp' ) );

        }
        
        $validated = apply_filters( 'taiowcp_update_quantity', true, $cart_key, $new_qty );

        if( $validated && !empty( WC()->cart->get_cart_item( $cart_key ) ) ){

            $updated = $new_qty == 0 ? WC()->cart->remove_cart_item( $cart_key ) : WC()->cart->set_quantity( $cart_key, $new_qty );

            if( $updated ){

                if( $new_qty == 0 ){

                    $notice = esc_html__( 'Product removed', 'taiowcp' );

                    $notice .= ' <span class="taiowcp-undo-item" data-key="'.$cart_key.'">'.esc_html__('Undo?','taiowcp').'</span>';  

                }
                else{

                    $notice = esc_html__( 'Cart Updated', 'taiowcp' );
                }

                $this->taiowcp_set_notice( $notice, 'success' );
                
            }
        }

        WC_AJAX::get_refreshed_fragments();

        die();

      }

      //undo item

      public function taiowcp_undo_item(){

            $cart_key = sanitize_text_field($_POST['cart_key']);

            if(!$cart_key) return;

            $cart_success = WC()->cart->restore_cart_item($cart_key);

            if($cart_success){

                $notice = esc_html__( 'Product restore', 'taiowcp' );
                
                $this->taiowcp_set_notice( $notice, 'success' );

            }

            WC_AJAX::get_refreshed_fragments();
            
            die();

        }

        public function taiowcp_set_notice( $notice, $type = 'success' ){

        $this->taiowcp_notices[] = $this->taiowcp_notice_html( $notice, $type );

       }


       public function taiowcp_notice_html( $message, $notice_type = 'success' ){

        $taiowcp_allowed_tag = array(

                                'span' => array(
                                   
                                    'data-key' => array(),
                                    'class'=> array(),
                                    
                                ),
                                
                            );
        $classes = $notice_type === 'error' ? 'taiowcp-notice-error' : 'taiowcp-notice-success';
        
        $html = '<li class="'.esc_attr($classes).'">'.wp_kses($message,$taiowcp_allowed_tag).'</li>';
        
        return apply_filters( 'taiowcp_notice_html', $html, $message, $notice_type );

     }

     public function taiowcp_print_notices_html( $section = 'cart', $wc_cart_notices = true ){

        if( isset( $_POST['noticeSection'] ) && $_POST['noticeSection'] !== $section ) return;

        if( $wc_cart_notices ){

            do_action( 'woocommerce_check_cart_items' );

            $wc_notices = wc_get_notices( 'error' );

            foreach ( $wc_notices as $wc_notice ) {
                $this->taiowcp_set_notice( $wc_notice['notice'], 'error' );
            }

            wc_clear_notices();

        }

        $taiowcp_notices = apply_filters('taiowcp_notices_before_print', $this->taiowcp_notices, $section );

        $notices_html = sprintf('<div class="taiowcp-notice-container" data-section="%1$s"><ul class="taiowcp-notices">%2$s</ul></div>', $section, implode( '' , $taiowcp_notices )  );

        echo apply_filters('taiowcp_print_notices_html', $notices_html, $taiowcp_notices, $section );
        
        $this->taiowcp_notices = array();

       }


       public function taiowcp_HideCartPage() {

        if (isset($this->taiowcp_HideCartPage)) {
            return $this->taiowcp_HideCartPage;
        }
    
        if (!trim(taiowcp_main()->taiowcp_get_option('taiowcp-not_showing_page'))) {
            $hidePages = array();
        } else {
            $hidePages = array_map('trim', explode(',', taiowcp_main()->taiowcp_get_option('taiowcp-not_showing_page')));
        }
        
        if(is_shop()){
            $shopPageID = get_option('woocommerce_shop_page_id');
            $isShopPageHidden = false;
    
            if ($shopPageID) {
            $shopPage = get_post($shopPageID); 
            $isShopPageHidden = ($shopPage && in_array($shopPage->post_name, $hidePages));
            } 
        }else{
            $isShopPageHidden = false;  
        }
       
    
        $this->isSideCartPage = !( !empty($hidePages) && (
            (in_array('no-woocommerce', $hidePages) && !is_woocommerce() && !is_cart() && !is_checkout()) ||
            is_page($hidePages) ||
            (is_product() && in_array(get_the_id(), $hidePages)) || $isShopPageHidden
        ) );
    
        foreach ($hidePages as $page_id) {
            if (is_single($page_id)) {
                $this->isSideCartPage = false;
                break;
            }
        }
    
        return apply_filters('taiowcp_is_sidecart_page', $this->isSideCartPage, $hidePages);
    }
    



  }

// Load Plugin

function taiowcp_main(){

        return Taiowcp_Main::instance();
}

add_action( 'plugins_loaded', 'taiowcp_main', 25 );

endif; 