(function ($){

  "use strict";
  
    var taiowcpsettingLib = {
        init: function (){
            this.bindEvents();
        },
        bindEvents: function (){
          var $this = this;
            $this.SettingTab();
            $this.ColorPickr();
            $this.ImageAdd();
            $this.SaveSetting();
            $this.ChangeSettinghideshow();
        },
        SettingTab: function (){
          $(document).ready(function(){ 
                  $('#taiowcp').on('click', '.nav-tab', function (event){
                  event.preventDefault()
                  var target = $(this).data('target')
                  $(this).addClass('nav-tab-active').siblings().removeClass('nav-tab-active')
                  $('#' + target).show().siblings().hide()
                  $('#_last_active_tab').val(target)
                  if ($("a[data-target='taiowcp_style']").hasClass('nav-tab-active')){
                         $('.setting-preview-wrap').show();
                    }else{
                         $('.setting-preview-wrap').hide();
                    }
                  if ($("a[data-target='taiowcp_reset']").hasClass('nav-tab-active')){
                        $('a.reset').show();
                        $('button#submit').hide();
                  }else{
                       $('a.reset').hide();
                       $('button#submit').show();

                  }

                });
             });
        },
       
        ColorPickr: function () {
            function myColorPicker() {
              let value_ = this;
              const inputElement = $(value_);
              const defaultColor = inputElement.css("background-color");
              const pickr = new Pickr({
                el: value_,
                useAsButton: true,
                default: defaultColor,
                theme: "nano", // or 'monolith', or 'nano'
                swatches: [
                  "rgba(244, 67, 54, 1)",
                  "rgba(233, 30, 99, 0.95)",
                  "rgba(156, 39, 176, 0.9)",
                  "rgba(103, 58, 183, 0.85)",
                  "rgba(63, 81, 181, 0.8)",
                  "rgba(33, 150, 243, 0.75)",
                  "rgba(255, 193, 7, 1)",
                ],
                components: {
                  preview: true,
                  opacity: true,
                  hue: true,
                  interaction: {
                    input: true,
                  },
                },
              })
                .on("change", (color, instance) => {
                  let color_ = color.toRGBA().toString(0);
                  // preview css on input editor item
                  inputElement.css("background-color", color_);
                  // apply color on selected item
                  inputElement.val(color_);
                  //save button active
                  $("#submit").removeAttr("disabled");
                })
                .on("init", (instance) => {
                  $(instance._root.app).addClass("visible");
                })
                .on("hide", (instance) => {
                  instance._root.app.remove();
                });
            }
            $(document).on("click", "input.color_picker", myColorPicker);
          },
          
        ImageAdd:function (){
            
           $(document).on('click', '.button.taiowcp_upload_image_button', function (event){
                  
                    event.preventDefault();

                    var attachment;

                    var self = $(this);

                    // Create the media frame.
                    
                    var file_frame = wp.media.frames.file_frame = wp.media({
                        title: self.data('uploader_title'),
                        button: {
                            text: self.data('uploader_button_text'),
                        },
                        multiple: false
                    });
                    file_frame.on('select', function () {
                        attachment = file_frame.state().get('selection').first().toJSON();

                        self.prev('.taiowcp-icon_url').val(attachment.url);
                    });

                    // Finally, open the modal
                    file_frame.open();

                    $('#submit').removeAttr("disabled");

          });
        },
        SaveSetting:function(){

        $(document).on('keyup change paste', '.taiowcp-setting-form input, .taiowcp-setting-form select, .taiowcp-setting-form textarea', function () {
        
              $('#submit').removeAttr("disabled");
              
        }); 

        $(document).on("click", ".taiowcp-setting-form #submit", function (e) {

        e.preventDefault();

        $(this).addClass('loader');
        
        var form_settting = $(".taiowcp-setting-form").serialize();
        $.ajax({

          url: taiowcpluginObject.ajaxurl,

          type: "POST",

          data: form_settting +'&_wpnonce=' + taiowcpluginObject.taiowcp_nonce +'',

          success: function (response) {
           
            $('#submit').removeClass('loader');

            $('#submit').attr("disabled","disabled");

          }

        });

      });
    },
    ChangeSettinghideshow:function(){
        
           $(document).on('click', '#taiowcp-show_cart-field', function (event){

                    if($(this).is(':checked')){

                      $('#taiowcp-cart_style-wrapper, #taiowcp-cart_open-wrapper, #taiowcp-cart_styletaiowcp-cart_style-section-1, .taiowcp-cart_styletaiowcp-cart_style-section-1').show(500);

                    }else{

                      $('#taiowcp-cart_style-wrapper, #taiowcp-cart_open-wrapper, #taiowcp-cart_styletaiowcp-cart_style-section-1, .taiowcp-cart_styletaiowcp-cart_style-section-1').hide(500);

                   }
                   
             });

           $(document).on('click', '#taiowcp-cart_style', function (event){

                    if($("input[id=taiowcp-cart_style]:checked").val() == "style-1"){

                      if($('#taiowcp-fxd_cart_position-field').find("option:selected").val() == "fxd-left"){

                          $('#taiowcp-fxd_cart_frm_left-wrapper,#taiowcp-fxd_cart_frm_btm-wrapper').show(500);
                          $('#taiowcp-fxd_cart_frm_right-wrapper').hide(500);

                      }else{

                         $('#taiowcp-fxd_cart_frm_right-wrapper,#taiowcp-fxd_cart_frm_btm-wrapper').show(500);
                         $('#taiowcp-fxd_cart_frm_left-wrapper').hide(500);
                      }
                      
             
                    }else{

                      $('#taiowcp-fxd_cart_frm_right-wrapper,#taiowcp-fxd_cart_frm_left-wrapper,#taiowcp-fxd_cart_frm_btm-wrapper').hide(500);

                   }
                   
             });

           $(document).on('change', '#taiowcp-fxd_cart_position-field', function (event){

                    if($(this).find("option:selected").val() == "fxd-left"){

                       if($("input[id=taiowcp-cart_style]:checked").val() == "style-1"){
                          $('#taiowcp-fxd_cart_frm_left-wrapper').show(500);
                          $('#taiowcp-fxd_cart_frm_btm-wrapper').show(500);
                          $('#taiowcp-fxd_cart_frm_right-wrapper').hide(500);
                        }

                    }else{

                          if($("input[id=taiowcp-cart_style]:checked").val() == "style-1"){
                          $('#taiowcp-fxd_cart_frm_left-wrapper').hide(500);
                          $('#taiowcp-fxd_cart_frm_right-wrapper').show(500);
                          $('#taiowcp-fxd_cart_frm_btm-wrapper').show(500);
                        }
                        

                   }
                   
             });

           $(document).on('click', '#taiowcp-cart-icon', function (event){

                    if($("input[id=taiowcp-cart-icon]:checked").val() == "icon-7"){

                      $('#taiowcp-icon_url-wrapper').show(500);

                    }else{

                      $('#taiowcp-icon_url-wrapper').hide(500);

                   }
                   
             });


            $(document).on('click', '#taiowcp-show_rld_product-field', function (event){

                    if($(this).is(':checked')){

                      $('#taiowcp-product_may_like_tle-wrapper, #taiowcp-choose_prdct_like-wrapper, #taiowcp-product_may_like_id-wrapper, #taiowcp-cart_styletaiowcp-cart_style-section-3, .taiowcp-cart_styletaiowcp-cart_style-section-3').show(500);

                    }else{

                      $('#taiowcp-product_may_like_tle-wrapper, #taiowcp-choose_prdct_like-wrapper, #taiowcp-product_may_like_id-wrapper, #taiowcp-cart_styletaiowcp-cart_style-section-3, .taiowcp-cart_styletaiowcp-cart_style-section-3').hide(500);

                   }
                   
             });

            $(document).on('click', '#taiowcp-show_shipping-field', function (event){

                    if($(this).is(':checked')){

                      $('#taiowcp-ship_txt-wrapper').show(500);

                    }else{

                      $('#taiowcp-ship_txt-wrapper').hide(500);

                   }
                   
             });

            $(document).on('click', '#taiowcp-show_discount-field', function (event){

                    if($(this).is(':checked')){

                      $('#taiowcp-discount_txt-wrapper').show(500);

                    }else{

                      $('#taiowcp-discount_txt-wrapper').hide(500);

                   }
                   
             });

            $(document).on('click', '#taiowcp-show_coupon-field', function (event){

                    if($(this).is(':checked')){

                      $('#taiowcp-coupon_plchdr_txt-wrapper, #taiowcp-coupon_aply_txt-wrapper, #taiowcp-show_coupon_list-wrapper, #taiowcp-coupon_btn_txt-wrapper, #taiowcp-show_added_coupon-wrapper, #taiowcp-cart_styletaiowcp-cart_style-section-5, .taiowcp-cart_styletaiowcp-cart_style-section-5').show(500);

                    }else{

                      $('#taiowcp-coupon_plchdr_txt-wrapper, #taiowcp-coupon_aply_txt-wrapper, #taiowcp-show_coupon_list-wrapper, #taiowcp-coupon_btn_txt-wrapper, #taiowcp-show_added_coupon-wrapper, #taiowcp-cart_styletaiowcp-cart_style-section-5, .taiowcp-cart_styletaiowcp-cart_style-section-5').hide(500);

                   }
                   
             });

            $(document).on('click', '#taiowcp-cart_pan_notify_shw-field', function (event){

                    if($(this).is(':checked')){

                      $('#taiowcp-success_mgs_bg_clr-wrapper, #taiowcp-success_mgs_txt_clr-wrapper, #taiowcp-error_mgs_bg_clr-wrapper, #taiowcp-error_mgs_txt_clr-wrapper').show(500);

                    }else{

                      $('#taiowcp-success_mgs_bg_clr-wrapper, #taiowcp-success_mgs_txt_clr-wrapper, #taiowcp-error_mgs_bg_clr-wrapper, #taiowcp-error_mgs_txt_clr-wrapper').hide(500);

                   }
                   
             });

            $(document).on('click', '#taiowcp-cart_pan_icon_shw-field', function (event){

                    if($(this).is(':checked')){

                      $('#taiowcp-cart_pan_icon_clr-wrapper').show(500);

                    }else{

                      $('#taiowcp-cart_pan_icon_clr-wrapper').hide(500);

                   }
                   
             });


        },
  

}
taiowcpsettingLib.init();
})(jQuery);