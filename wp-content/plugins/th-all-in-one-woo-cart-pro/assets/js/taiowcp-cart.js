(function ($){

    "use strict";

    var taiowcpscriptLib = {
        init: function (){
            this.bindEvents();
        },
        bindEvents: function (){
           var $this = this;
            $this.cartopen();
            $this.cartclose();
            $this.AddCartProduct();
            $this.ShippingCartProduct();
            $this.UpdateCart();
            $this.refreshMyFragments();
        },
        cartopen: function (){
            $(document).on('click','a.taiowcp-content',function(e){
                e.preventDefault();
                $(this).closest("div").toggleClass('model-cart-active'); 
            });
        },
        cartclose: function (){   
            $(document).on('click','a.taiowcp-cart-close',function(e){
                e.preventDefault();
                $('.taiowcp-wrap').removeClass('model-cart-active'); 
            });

           $(document).on('click','body', function(evt){ 
                if($(evt.target).closest('a.taiowcp-content, .taiowcp-cart-model').length)
                  return;             
                  $('.taiowcp-wrap').removeClass('model-cart-active'); 
                 
            });
        },

        refreshMyFragments:function (){
            $.ajax({
                url:taiowcp_param.wc_ajax_url.toString().replace( '%%endpoint%%', 'get_refreshed_fragments' ),
                type: 'POST',
                data: {},
                success: function( response ){
                     if(response.fragments){
                        var fragments = response.fragments,
                            cart_hash =  response.cart_hash;

                        //Set fragments
                        $.each( response.fragments, function( key, value ) {
                            $( key ).replaceWith( value );
                            $( key ).stop( true ).css( 'opacity', '1' ).unblock();
                        });

                        if( typeof wc_cart_fragments_params !== 'undefined' && ( 'sessionStorage' in window && window.sessionStorage !== null ) ){

                            sessionStorage.setItem( wc_cart_fragments_params.fragment_name, JSON.stringify( response.fragments ) );
                            localStorage.setItem( wc_cart_fragments_params.cart_hash_key, response.cart_hash );
                            sessionStorage.setItem( wc_cart_fragments_params.cart_hash_key, response.cart_hash );

                            if ( response.cart_hash ) {
                                sessionStorage.setItem( 'wc_cart_created', ( new Date() ).getTime() );
                            }

                        }

                        $(document.body).trigger('wc_fragments_loaded');

                        //Refresh checkout page
                            // if( window.wc_checkout_params && wc_checkout_params.is_checkout === "1" ){
                            //     if( $( 'form.checkout' ).length === 0 ){
                            //         location.reload();
                            //         return;
                            //     }
                            //     $(document.body).trigger("update_checkout");
                            // }

                            // //Refresh Cart page
                            // if( window.wc_add_to_cart_params && window.wc_add_to_cart_params.is_cart && wc_add_to_cart_params.is_cart === "1" ){
                            //     $(document.body).trigger("wc_update_cart");
                            // }
                      }
                },
                
            })

        },

        AddCartProduct: function (){

               // remove item from cart

               $(document).on('click','a.taiowcp-remove-item',function(e){

                 updateItemQty( $( e.currentTarget ).data('key'), 0 );
               
               });

                // quantity add update cart

                $( document ).on('change','input.taiowcp-quantity', function(e){
                    
                    var quantity = $(this).val();

                    updateItemQty( $( e.currentTarget ).data('key'), quantity );

                });

                // related product add cart

                $( document ).on('click','.taiowcp-related-product-item .th-button', function(e){
                    
                    e.preventDefault();

                    var quantity = $(this).val();

                    AddItem( $( e.currentTarget ).data('product_id'), quantity );

                });


               // undo item

               $(document).on('click','.taiowcp-undo-item',function(e){

                  show_loader();

                    var $undo       = $(e.currentTarget),
                        formData    = {
                            cart_key: $undo.data('key')
                        }

                    $.ajax({
                        url:taiowcp_param.wc_ajax_url.toString().replace( '%%endpoint%%', 'taiowcp_undo_item' ),
                        type: 'POST',
                        data: formData,
                        success: function(response){
                            hide_loader();
                            show_custom_notice();
                            if(response.fragments){
                                $( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash] );
                            }
                        }

                    })
                });

               // add item 
              function AddItem( product_id, qty ){
                  
                if( !product_id || qty === undefined ) return;

                show_loader();

                $.ajax({
                    url:taiowcp_param.wc_ajax_url.toString().replace( '%%endpoint%%', 'taiowcp_add_item_cart' ),
                    type: 'POST',
                    data: {
                            product_id: product_id,
                            new_qty: qty
                          },
                    success: function(response){ 

                    hide_loader();
                    show_custom_notice();

                    if(response.fragments){
                        var fragments = response.fragments,
                            cart_hash =  response.cart_hash;

                        //Set fragments
                        $.each( response.fragments, function( key, value ) {
                            $( key ).replaceWith( value );
                            $( key ).stop( true ).css( 'opacity', '1' ).unblock();
                        });

                        if(wc_cart_fragments_params){
                            var cart_hash_key = wc_cart_fragments_params.ajax_url.toString() + '-wc_cart_hash';
                            //Set cart hash
                            sessionStorage.setItem( wc_cart_fragments_params.fragment_name, JSON.stringify( fragments ) );
                            localStorage.setItem( cart_hash_key, cart_hash );
                            sessionStorage.setItem( cart_hash_key, cart_hash );
                        }

                        $(document.body).trigger('wc_fragments_loaded');
                        //Refresh checkout page
                            if( window.wc_checkout_params && wc_checkout_params.is_checkout === "1" ){
                                if( $( 'form.checkout' ).length === 0 ){
                                    location.reload();
                                    return;
                                }
                                $(document.body).trigger("update_checkout");
                            }

                            //Refresh Cart page
                            if( window.wc_add_to_cart_params && window.wc_add_to_cart_params.is_cart && wc_add_to_cart_params.is_cart === "1" ){
                                $(document.body).trigger("wc_update_cart");
                            }
                      }

                  }

                })

             }

               // update item 
              function updateItemQty( cart_key, qty ){

                if( !cart_key || qty === undefined ) return;

                show_loader();

                $.ajax({
                    url:taiowcp_param.wc_ajax_url.toString().replace( '%%endpoint%%', 'taiowcp_update_item_quantity' ),
                    type: 'POST',
                    data: {
                            cart_key: cart_key,
                            new_qty: qty
                          },
                    success: function(response){ 
                    hide_loader();
                    show_custom_notice();

                    if(response.fragments){
                        var fragments = response.fragments,
                            cart_hash =  response.cart_hash;

                        //Set fragments
                        $.each( response.fragments, function( key, value ) {
                            $( key ).replaceWith( value );
                            $( key ).stop( true ).css( 'opacity', '1' ).unblock();
                        });

                        if(wc_cart_fragments_params){
                            var cart_hash_key = wc_cart_fragments_params.ajax_url.toString() + '-wc_cart_hash';
                            //Set cart hash
                            sessionStorage.setItem( wc_cart_fragments_params.fragment_name, JSON.stringify( fragments ) );
                            localStorage.setItem( cart_hash_key, cart_hash );
                            sessionStorage.setItem( cart_hash_key, cart_hash );
                        }

                        $(document.body).trigger('wc_fragments_loaded');
                        //Refresh checkout page
                            if( window.wc_checkout_params && wc_checkout_params.is_checkout === "1" ){
                                if( $( 'form.checkout' ).length === 0 ){
                                    location.reload();
                                    return;
                                }
                                $(document.body).trigger("update_checkout");
                            }

                            //Refresh Cart page
                            if( window.wc_add_to_cart_params && window.wc_add_to_cart_params.is_cart && wc_add_to_cart_params.is_cart === "1" ){
                                $(document.body).trigger("wc_update_cart");
                            }
                      }

                  }

                })

             }

           
            // add coupon

            $(document).on('click','.taiowcp-coupon-submit',function(e){

                var coupon_code = $('#taiowcp-coupon-code').val().trim();

                if(!coupon_code.length){

                    return;
                }

                show_loader();

                $(this).addClass('active');

                var data = {

                    security: taiowcp_param.apply_coupon_nonce,
                    coupon_code: coupon_code
                }

                $.ajax({
                    url: taiowcp_param.wc_ajax_url.toString().replace( '%%endpoint%%', 'apply_coupon' ),
                    type: 'POST',
                    data: data,
                    success: function(response){

                         hide_loader();  

                        $( document.body ).trigger( 'applied_coupon', [ coupon_code ] );

                        $( document.body ).trigger( 'wc_fragment_refresh' );

                        show_notice('error',response);

                    },
                    complete: function(){
                       
                    }
                });
            });

            // add coupon in list
             $(document).on('click','.taiowcp-coupon-apply-btn',function(e){

                var coupon_code      = $(this).val().trim();

                if(!coupon_code.length){

                    return;
                }

                show_loader();

                $(this).addClass('added');

                var data = {

                    security: taiowcp_param.apply_coupon_nonce,
                    coupon_code: coupon_code
                }

                $.ajax({
                    url: taiowcp_param.wc_ajax_url.toString().replace( '%%endpoint%%', 'apply_coupon' ),
                    type: 'POST',
                    data: data,
                    success: function(response){

                        hide_loader();

                       

                        $( document.body ).trigger( 'applied_coupon', [ coupon_code ] );

                        $( document.body ).trigger( 'wc_fragment_refresh' );

                          show_notice('error',response);

                    },
                    complete: function(){
                       
                    }

                });

            });

             //coupon toggle
             
            $(document).ready(function() {

            $('body').on( 'click', '.taiowcp-show-coupon', function(){

                $('.taiowcp-coupon-list-content').toggleClass('taiowcp-cpnactive').slideToggle( 'slow' );

               } );
            } );
            // remove coupon

            $(document).on('click','.taiowcp-coupon-remove-coupon',function(e){

                var coupon = $(this).attr('data-coupon');

                if(!coupon.length){
                    e.preventDefault();
                }

             show_loader();

             $(this).css("pointer-events","none");


                var data = {
                    security: taiowcp_param.remove_coupon_nonce,
                    coupon: coupon
                }

            $.ajax({
                url: taiowcp_param.wc_ajax_url.toString().replace( '%%endpoint%%', 'remove_coupon' ),
                type: 'POST',
                data: data,
                success: function(response){

                   hide_loader();

                    $( document.body ).trigger( 'removed_coupon', [ coupon ] );

                    $( document.body ).trigger( 'wc_fragment_refresh' );

                    show_notice('error',response);
                    
                },
                complete: function(){
                    
                }
            })

        });

             
               //loader show
               function show_loader(){
                   
                   $('.taiowcp-cart-model-body').addClass('loading');

               }
               //hide loader
                function hide_loader(){

                   $('.taiowcp-cart-model-body').removeClass('loading');
               }

               //Notice Function

                function show_notice(notice_type,notice){

                $('.taiowcp-notice').html(notice).attr('class','taiowcp-notice').addClass('taiowcp-nt-'+notice_type);
                $('.taiowcp-notice-box').fadeIn('fast');

                clearTimeout(fadenotice);

                var fadenotice = setTimeout(function(){

                    $('.taiowcp-notice-box').fadeOut('slow');

                 },3000);
             };

             //custom Notic add header
            
                function show_custom_notice(){

                     $( document ).ready(function() {

                     $('.taiowcp-notice-container').fadeIn('fast');

                       clearTimeout(fadenotice);

                       var fadenotice = setTimeout(function(){

                       $('.taiowcp-notice-container').fadeOut('slow');

                       },3000);
                     });
                 };


          },

        ShippingCartProduct: function (){

            $(document).ready(function() {

            /**
             * Object to handle AJAX calls for cart shipping changes.
             */
            var cart_shipping = {

                 /**
                 * Initialize event handlers and UI state.
                 */
                init: function() {
                    this.toggle_shipping            = this.toggle_shipping.bind( this );
                    this.shipping_method_selected   = this.shipping_method_selected.bind( this );
                    this.shipping_calculator_submit = this.shipping_calculator_submit.bind( this );

                    $( document ).on(
                        'click',
                        '.shipping-calculator-button',
                        this.toggle_shipping
                    );
                    $( document ).on(
                        'change',
                        'select.shipping_method, :input[name^=shipping_method]',
                        this.shipping_method_selected
                    );
                    $( document ).on(
                        'submit',
                        'form.woocommerce-shipping-calculator',
                        this.shipping_calculator_submit
                    );

                    $( '.shipping-calculator-form' ).hide();
                },

                /**
                 * Toggle Shipping Calculator panel
                 */
                toggle_shipping: function() {
                    $( '.shipping-calculator-form' ).slideToggle( 'slow' );
                    $( document.body ).trigger( 'country_to_state_changed' ); // Trigger select2 to load.
                    return false;
                },

                /**
                 * Handles when a shipping method is selected.
                 */
                shipping_method_selected: function() {
                    
                    var shipping_methods = {};

                    $( 'select.shipping_method, :input[name^=shipping_method][type=radio]:checked, :input[name^=shipping_method][type=hidden]' ).each( function() {
                        shipping_methods[ $( this ).data( 'index' ) ] = $( this ).val();
                    } );

                    $('.taiowcp-cart-model-body').addClass('loading');

                    var data = {
                        security: taiowcp_param.update_shipping_method_nonce,
                        shipping_method: shipping_methods
                    };

                    $.ajax( {
                        type:     'post',
                        url:       taiowcp_param.wc_ajax_url.toString().replace( '%%endpoint%%', 'update_shipping_method' ),
                        data:      data,
                        dataType: 'html',
                        success:  function( response ) {
                            $( document.body ).trigger( 'wc_fragment_refresh' );    
                        },
                        complete: function() {
                            $( document.body ).trigger( 'updated_shipping_method' );
                            $('.taiowcp-cart-model-body').removeClass('loading');
                          }
                      } );
                   },

                    /**
                     * Handles a shipping calculator form submit.
                     *
                     * @param {Object} evt The JQuery event.
                     */
                    shipping_calculator_submit: function( evt ) {

                        evt.preventDefault();

                        var $form = $( evt.currentTarget );

                        $('.taiowcp-cart-model-body').addClass('loading');

                        // Provide the submit button value because wc-form-handler expects it.
                        $( '<input />' ).attr( 'type', 'hidden' )
                                        .attr( 'name', 'calc_shipping' )
                                        .attr( 'value', 'x' )
                                        .appendTo( $form );

                        // Make call to actual form post URL.
                        $.ajax( {
                            type:     $form.attr( 'method' ),
                            url:      $form.attr( 'action' ),
                            data:     $form.serialize(),
                            dataType: 'html',
                            success:  function( response ) {

                                // console(response);
                                $( document.body ).trigger( 'wc_fragment_refresh' );
                                $('.taiowcp-cart-model-body').removeClass('loading');
                            }
                        } );
                    }


            }



            if( !(window.wc_checkout_params && wc_checkout_params.is_checkout === "1") && !window.wc_cart_params ){
                
                cart_shipping.init();

            }

            $( document.body ).on( 'updated_shipping_method', function(){
                $( document.body ).trigger( 'wc_fragment_refresh' );
            } );
            
            //Shipping toggle

            $('body').on( 'click', '.taiowcp-shipping .pencil , .taiowcp-shp-tgle', function(){
                $('.taiowcp-shptgl-cont').toggleClass('taiowcp-shipactive').slideToggle( 'slow' );
            } );

           } );

        },

       UpdateCart: function (){
                     
        $(document).on('added_to_cart',function(event,fragments,hash,atc_btn){
               
               //Auto open with ajax

                var opensidecart = function(){
                       
                               $('a.taiowcp-content').closest("div.taiowcp-slide-right, div.taiowcp-slide-left").toggleClass('model-cart-active');
                               $('.cart_fixed_2 .taiowcp-content').css('padding-bottom','0.75rem');
                               $( document.body ).trigger( 'wc_fragment_refresh' );
                        
                }

                if(taiowcp_param.taiowcp_cart_open == 'simple-open'){

                     opensidecart();

                }

                if(taiowcp_param.taiowcp_cart_open == 'fly-image-open'){

                  fly_to_cart(atc_btn,opensidecart); 

                }

                //Copuon nonce fix
                if( !taiowcp_param.apply_coupon_nonce ){
                        //Send ajax request to set coupon
                        create_coupon_nonce();
                }
                 
                //Refresh checkout page
                if( window.wc_checkout_params && wc_checkout_params.is_checkout === "1" ){
                    if( $( 'form.checkout' ).length === 0 ){
                        location.reload();
                        return;
                    }
                    $(document.body).trigger("update_checkout");
                }

                //Refresh Cart page
                if( window.wc_add_to_cart_params && window.wc_add_to_cart_params.is_cart && wc_add_to_cart_params.is_cart === "1" ){
                    $(document.body).trigger("wc_update_cart");
                }

                    function fly_to_cart(atc_btn,callback){ 

                    var cart = $('.cart_fixed_1 .taiowcp-cart-item, .cart_fixed_2 .taiowcp-cart-item');

                    var imgtodrag = false;

                    if( atc_btn.parents('.taiowcp-fly-cart').length ){

                        var $product = atc_btn.closest('.taiowcp-fly-cart');

                        if($product.find("img").length){

                        var imgtodrag  = $product.find("img");


                        }else if( $product.find('.woocommerce-product-gallery').length  ){
                                imgtodrag = $product.find('.woocommerce-product-gallery');
                                
                        }else{

                            imgtodrag = $product;
                        }

                    }
               

                    if( !imgtodrag || imgtodrag.length === 0 || cart.length === 0){
                        callback();
                        return;
                    } // Exit if image/cart not found

                   
                    var imgclone = imgtodrag.clone()
                        .offset({
                        top: imgtodrag.offset().top,
                        left: imgtodrag.offset().left
                    })
                     
                        .css({
                                'opacity': '0.8',
                                'position': 'absolute',
                                'height': '150px',
                                'width': '150px',
                                'z-index': '1000'
                           })
                        .appendTo($('body'))
                        .animate({
                        'top': cart.offset().top - 10,
                            'left': cart.offset().left - 10,
                            'width': 75,
                            'height': 75
                    }, 1000, 'easeInOutExpo');
                    
                    setTimeout(function () {
                        cart.effect("shake", {
                            times: 1
                        }, 200, setTimeout(function(){
                            callback();
                        },200));
                    }, 1500);

                    imgclone.animate({
                        'width': 0,
                            'height': 0
                    }, function () {
                        $(this).detach();
                    });

                }

        });


         function create_coupon_nonce(){
            $.ajax({
                url: taiowcp_param.ajax_url,
                type: 'POST',
                data: {
                    action: 'taiowcp_create_nonces'
                },
                success: function(response){

                    if( response['apply-coupon'] ){
                        taiowcp_param.apply_coupon_nonce = response['apply-coupon'];
                    }

                    if( response['remove-coupon'] ){
                        taiowcp_param.remove_coupon_nonce = response['remove-coupon'];
                    }

                    if( response['update-shipping-method'] ){
                        taiowcp_param.update_shipping_method_nonce = response['update-shipping-method'];
                    }
                }
            })
        }

       
        }
   
}

taiowcpscriptLib.init();

})(jQuery);