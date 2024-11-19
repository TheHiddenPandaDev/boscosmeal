<?php

if ( ! defined( 'ABSPATH' ) ) exit;


if ( ! class_exists( 'Taiowcp_Cart_Fragment' ) ):

    class Taiowcp_Cart_Fragment {

        /**
         * Member Variable
         *
         * @var object instance
         */
        private static $instance;

        /**
         * Initiator
         */
        public static function get_instance() {

            if ( ! isset( self::$instance ) ) {

                self::$instance = new self();

            }

            return self::$instance;

        }

        /**
         * Constructor
         */

        public function __construct(){

            add_action( 'wc_ajax_get_refreshed_fragments', array( $this, 'taiowcp_get_refreshed_fragments' ) );
     
            add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'taiowcp_cart_show' ));
            add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'taiowcp_cart_item_show' ));
               
        }

        public function taiowcp_get_refreshed_fragments(){
            
        WC_AJAX::get_refreshed_fragments();

        }


        public function taiowcp_cart_show($fragments){

             ob_start();

             if (  WC()->cart && ! WC()->cart->is_empty() ) { 
            
             $showCls = "taiowcp_cart_not_empty";

             }else{

                $showCls = "taiowcp_cart_empty";

             }


            ?>
                       <a class="taiowcp-content <?php echo esc_attr($showCls); ?>" href="#">
                        
                          <?php if(taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_hd' )!==''){ ?>

                            <h4>

                            <?php echo esc_html(taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_hd' ));?>
                                
                            </h4>

                            <?php } ?>

                            <?php if ( ! WC()->cart->is_empty() ) { ?>

                            <div class="cart-count-item">

                            <?php echo wp_kses_post(taiowcp_main()->taiowcp_get_cart_count()); ?>
                                    
                            </div>

                            <?php } ?>
                           
                            <div class="taiowcp-cart-item">

                                <div class="taiowcp-icon">

                                    <?php do_action('taiowcp_cart_show_icon'); ?>

                                 </div>

                                 <?php if ( ! WC()->cart->is_empty() ) { 

                                  if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_price' ) == true){ 
                                    ?>

                                 <div class="taiowcp-total">

                                        <span>
                                        <?php echo wp_kses_post( WC()->cart->get_total() ); ?>
                                        </span>

                                </div>

                                <?php } } ?>

                            </div>

                        </a>
                

        <?php 
                    $fragments['a.taiowcp-content'] = ob_get_clean();
                    
                    return $fragments;


      }



     public function taiowcp_cart_item_show($fragments){ 
              
               ob_start();   

            ?>
               
               <div class="taiowcp-cart-model-wrap">

               <?php taiowcp_main()->taiowcp_print_notices_html('cart');?>

                <?php taiowcp_markup_pro()->taiowcp_cart_header();?>

                
                    <div class="taiowcp-cart-model-body">
                        
                        <?php 

                        do_action('taiowcp_mini_cart'); 

                        taiowcp_markup_pro()->taiowcp_get_suggest_product();

                        ?>

                    </div>

                    <div class="taiowcp-cart-model-footer">

                     <?php 

                     if ( ! WC()->cart->is_empty() ) {

                     WC()->cart->calculate_totals();

                     taiowcp_markup_pro()->taiowcp_cart_footer(); 

                     }
                    
                    ?>

                   </div> 

               </div>

               <?php 


               $fragments['div.taiowcp-cart-model-wrap'] = ob_get_clean();
                    
                return $fragments;

            
        }


    }


endif; 

Taiowcp_Cart_Fragment::get_instance();