<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

/***Front Custom Style********/

function taiowcp_style_pro($taiowcp_custom_css=''){

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_cart' ) == true){

	$taiowcp_custom_css.=".cart_fixed_2 .taiowcp-content h4{display:block}";
}

// top cart 
$taiowcp_tpcrt_prc_font_size    = taiowcp_main()->taiowcp_get_option( 'taiowcp-prc_font_size' );
$taiowcp_tpcrt_icon_size        = taiowcp_main()->taiowcp_get_option( 'taiowcp-icon_size' );
$taiowcp_tpcrt_bg_clr           = taiowcp_main()->taiowcp_get_option( 'taiowcp-bg_clr' );
$taiowcp_tpcrt_price_clr        = taiowcp_main()->taiowcp_get_option( 'taiowcp-price_clr' );
$taiowcp_tpcrt_quantity_bg_clr  = taiowcp_main()->taiowcp_get_option( 'taiowcp-quantity_bg_clr' );
$taiowcp_tpcrt_quantity_clr     = taiowcp_main()->taiowcp_get_option( 'taiowcp-quantity_clr' );
$taiowcp_tpcrt_cart_icon_clr    = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_icon_clr' );

$taiowcp_custom_css.=".taiowcp-cart-item{background-color:{$taiowcp_tpcrt_bg_clr}} .taiowcp-content .taiowcp-total{color:{$taiowcp_tpcrt_price_clr}; font-size:{$taiowcp_tpcrt_prc_font_size}px;} .cart-count-item,.cart_fixed_2 .taiowcp-cart-model .taiowcp-cart-close:after{background-color:{$taiowcp_tpcrt_quantity_bg_clr}; color:{$taiowcp_tpcrt_quantity_clr};} .taiowcp-icon img{width:{$taiowcp_tpcrt_icon_size}px;} .taiowcp-icon .th-icon{color:{$taiowcp_tpcrt_cart_icon_clr};} .taiowcp-icon .th-icon{font-size:{$taiowcp_tpcrt_icon_size}px;}";

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_quantity' )== true){

  $taiowcp_custom_css.=".cart-count-item{display:block;}";

}else{

 $taiowcp_custom_css.=".cart-count-item{display:none;}";

}

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-icon_bold' )== true){

 $taiowcp_custom_css.=".taiowcp-icon .th-icon,.cart-heading .th-icon{font-weight:bold}"; 

}

// fixed cart 

$taiowcp_fxcrt_icon_brd_rds         = taiowcp_main()->taiowcp_get_option( 'taiowcp-fxcrt_icon_brd_rds' );
$taiowcp_fxcrt_icon_brd_rds      = taiowcp_main()->taiowcp_get_option( 'taiowcp-fxcrt_icon_brd_rds' );
$taiowcp_fxcrt_cart_bg_clr       = taiowcp_main()->taiowcp_get_option( 'taiowcp-fxcrt_cart_bg_clr' );
$taiowcp_fxcrt_cart_icon_clr     = taiowcp_main()->taiowcp_get_option( 'taiowcp-fxcrt_cart_icon_clr' );
$taiowcp_fxcrt_qnty_bg_clr       = taiowcp_main()->taiowcp_get_option( 'taiowcp-fxcrt_qnty_bg_clr' );
$taiowcp_fxcrt_qnty_clr          = taiowcp_main()->taiowcp_get_option( 'taiowcp-fxcrt_qnty_clr' );

$taiowcp_custom_css.=".cart_fixed_1 .taiowcp-content .taiowcp-icon .th-icon{font-size:{$taiowcp_fxcrt_icon_brd_rds}px;} .cart_fixed_1 .taiowcp-content .taiowcp-icon img{width:{$taiowcp_fxcrt_icon_brd_rds}px;} .cart_fixed_1 .taiowcp-cart-item{border-radius:{$taiowcp_fxcrt_icon_brd_rds}%;} .cart_fixed_1 .taiowcp-cart-item{background-color:{$taiowcp_fxcrt_cart_bg_clr};} .cart_fixed_1 .taiowcp-content .taiowcp-icon .th-icon,.cart_fixed_2 .taiowcp-icon .th-icon{color:{$taiowcp_fxcrt_cart_icon_clr};} .cart_fixed_1 .cart-count-item{background-color:{$taiowcp_fxcrt_qnty_bg_clr}; color:{$taiowcp_fxcrt_qnty_clr};}";

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-fxcrt_show_quantity' )== true){
  $taiowcp_custom_css.=".cart_fixed_1 .cart-count-item{display:block;}";
}else{
 $taiowcp_custom_css.=".cart_fixed_1 .cart-count-item{display:none;}";

}

// cart panel style

$taiowcp_cart_pan_icon_shw    = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_icon_shw' );
$taiowcp_cart_pan_icon_clr    = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_icon_clr' );
$taiowcp_cart_pan_hd_clr      = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_hd_clr' );
$taiowcp_cart_pan_cls_clr     = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_cls_clr' );
$taiowcp_cart_pan_hdr_bg_clr  = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_hdr_bg_clr' );

$taiowcp_custom_css.=".cart-heading,.cart_fixed_2 .taiowcp-content{background-color:{$taiowcp_cart_pan_hdr_bg_clr};} .cart-heading .th-icon{color:{$taiowcp_cart_pan_icon_clr};} .cart-heading h4,.cart_fixed_2 .taiowcp-content h4,.cart_fixed_2 .taiowcp-content .taiowcp-total{color:{$taiowcp_cart_pan_hd_clr};} .taiowcp-cart-close:after{color:{$taiowcp_cart_pan_cls_clr};}";

$taiowcp_cart_pan_bg_clr   = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_bg_clr' );
$taiowcp_custom_css.=".taiowcp-cart-model-body,.taiowcp-related-product-cont{background-color:{$taiowcp_cart_pan_bg_clr};}";

$taiowcp_cart_pan_prd_bg_clr   = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_prd_bg_clr' );
$taiowcp_cart_pan_prd_tle_clr  = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_prd_tle_clr' );
$taiowcp_cart_pan_prd_rat_clr  = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_prd_rat_clr' );
$taiowcp_cart_pan_prd_dlt_clr  = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_prd_dlt_clr' );
$taiowcp_cart_pan_prd_txt_clr  = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_prd_txt_clr' );
$taiowcp_cart_pan_prd_brd_clr  = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_prd_brd_clr' );

$taiowcp_custom_css.=".taiowcp .taiowcp-cart-model-body div.taiowcp-woocommerce-mini-cart-item,input[type=number].taiowcp-quantity{background-color:{$taiowcp_cart_pan_prd_bg_clr};} .taiowcp-cart-model-body div.taiowcp-woocommerce-mini-cart-item .item-product-wrap a{color:{$taiowcp_cart_pan_prd_tle_clr};} .taiowcp-cart-model-body .item-product-wrap .star-rating{color:{$taiowcp_cart_pan_prd_rat_clr};} .taiowcp-cart-model-body div.taiowcp-woocommerce-mini-cart-item .item-product-wrap a.taiowcp-remove-item{color:{$taiowcp_cart_pan_prd_dlt_clr};} .quantity-text,input[type=number].taiowcp-quantity,.quantity .amount{color:{$taiowcp_cart_pan_prd_txt_clr};}  .item-product-quantity{border-top:1px solid {$taiowcp_cart_pan_prd_brd_clr};} input[type=number].taiowcp-quantity{border:1px solid {$taiowcp_cart_pan_prd_brd_clr};}";

// related product

$taiowcp_cart_pan_rltd_hd_bg_clr   = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_rltd_hd_bg_clr' );
$taiowcp_cart_pan_rltd_hd_clr      = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_rltd_hd_clr' );
$taiowcp_cart_pan_rltd_prd_bg_clr  = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_rltd_prd_bg_clr' );
$taiowcp_cart_pan_rltd_prd_tle_clr      = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_rltd_prd_tle_clr' );
$taiowcp_cart_pan_rltd_prd_rat_clr      = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_rltd_prd_rat_clr' );
$taiowcp_cart_pan_rltd_prd_prc_clr      = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_rltd_prd_prc_clr' );
$taiowcp_cart_pan_rltd_prd_add_bg_clr   = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_rltd_prd_add_bg_clr' );
$taiowcp_cart_pan_rltd_prd_add_clr      = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_rltd_prd_add_clr' );
$taiowcp_custom_css.=".taiowcp-related-product-title{background-color:{$taiowcp_cart_pan_rltd_hd_bg_clr};} .taiowcp-related-product-title{color:{$taiowcp_cart_pan_rltd_hd_clr};} .taiowcp-related-product-cont ul li{background-color:{$taiowcp_cart_pan_rltd_prd_bg_clr};} .taiowcp-related-product-right-area h4 a{color:{$taiowcp_cart_pan_rltd_prd_tle_clr};} .taiowcp-related-product-right-area .price{color:{$taiowcp_cart_pan_rltd_prd_prc_clr};} .taiowcp-related-product-right-area .star-rating{color:{$taiowcp_cart_pan_rltd_prd_rat_clr};} .taiowcp-related-product-right-area a.th-button{background-color:{$taiowcp_cart_pan_rltd_prd_add_bg_clr}!important;color:{$taiowcp_cart_pan_rltd_prd_add_clr}!important;}";

// payment color option

$taiowcp_cart_pan_pay_hd_bg_clr   = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_pay_hd_bg_clr' );
$taiowcp_cart_pan_pay_hd_clr      = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_pay_hd_clr' );
$taiowcp_cart_pan_pay_bg_clr      = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_pay_bg_clr' );
$taiowcp_cart_pan_pay_txt_clr     = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_pay_txt_clr' );
$taiowcp_cart_pan_pay_link_clr    = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_pay_link_clr' );
$taiowcp_cart_pan_pay_btn_bg_clr     = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_pay_btn_bg_clr' );
$taiowcp_cart_pan_pay_btn_clr    = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_pay_btn_clr' );

$taiowcp_custom_css.=".taiowcp-payment-title{background:{$taiowcp_cart_pan_pay_hd_bg_clr};color:{$taiowcp_cart_pan_pay_hd_clr};} .taiowcp-cart-model{background-color:{$taiowcp_cart_pan_pay_bg_clr};} .taiowcp-total-wrap{color:{$taiowcp_cart_pan_pay_txt_clr};} .taiowcp-total-wrap a{color:{$taiowcp_cart_pan_pay_link_clr};} .taiowcp-cart-model-footer .cart-button .buttons a,.taiowcp-shptgl-cont .woocommerce-shipping-calculator .shipping-calculator-form button{background-color:{$taiowcp_cart_pan_pay_btn_bg_clr}!important;color:{$taiowcp_cart_pan_pay_btn_clr}!important; border-color:{$taiowcp_cart_pan_pay_btn_bg_clr};} .taiowcp-cart-model-footer .cart-button .button:first-child{color: {$taiowcp_cart_pan_pay_btn_bg_clr}!important; border: 1px solid {$taiowcp_cart_pan_pay_btn_bg_clr};}";

//Coupon Style
$taiowcp_cart_coupon_box_bg_clr       = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_box_bg_clr' );
$taiowcp_cart_coupon_box_brd_clr       = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_box_brd_clr' );
$taiowcp_cart_coupon_box_txt_clr      = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_box_txt_clr' );
$taiowcp_cart_coupon_box_submt_clr    = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_box_submt_clr' );
$taiowcp_cart_coupon_box_view_clr     = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_box_view_clr' );
$taiowcp_cart_coupon_code_bg_clr      = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_code_bg_clr' );
$taiowcp_cart_coupon_code_brd_clr     = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_code_brd_clr' );
$taiowcp_cart_coupon_code_txt_clr     = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_code_txt_clr' );
$taiowcp_cart_coupon_code_ofr_clr     = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_code_ofr_clr' );
$taiowcp_cart_coupon_code_btn_bg_clr  = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_code_btn_bg_clr' );
$taiowcp_cart_coupon_code_btn_txt_clr    = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_code_btn_txt_clr' );
$taiowcp_cart_coupon_code_add_bg_clr     = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_code_add_bg_clr' );
$taiowcp_cart_coupon_code_add_txt_clr    = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_code_add_txt_clr' );
$taiowcp_cart_coupon_code_add_dlt_clr    = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_coupon_code_add_dlt_clr' );

$taiowcp_custom_css.=".taiowcp-coupon-box{background:{$taiowcp_cart_coupon_box_bg_clr};border-color:{$taiowcp_cart_coupon_box_brd_clr};} .taiowcp-coupon input#taiowcp-coupon-code{color:{$taiowcp_cart_coupon_box_txt_clr};} .taiowcp-coupon input#taiowcp-coupon-code::placeholder {color:{$taiowcp_cart_coupon_box_txt_clr};} .taiowcp-coupon-submit{color:{$taiowcp_cart_coupon_box_submt_clr};} .taiowcp-show-coupon{color:{$taiowcp_cart_coupon_box_view_clr};} .coupon-list{background:{$taiowcp_cart_coupon_code_bg_clr}; border-color:{$taiowcp_cart_coupon_code_brd_clr};} .taiowcp-coupon-list .code{color:{$taiowcp_cart_coupon_code_txt_clr};border-color:{$taiowcp_cart_coupon_code_txt_clr};} .coupon-list .desc,.taiowcp-cart-model .taiowcp-coupon-list .owl-carousel .owl-nav .owl-next,.taiowcp-cart-model .taiowcp-coupon-list .owl-carousel .owl-nav .owl-prev{color:{$taiowcp_cart_coupon_code_txt_clr};} .coupon-list .off{color:{$taiowcp_cart_coupon_code_ofr_clr};} .coupon-list .taiowcp-coupon-apply-btn.button.added,.coupon-list .taiowcp-coupon-apply-btn.button{border-color:{$taiowcp_cart_coupon_code_btn_bg_clr}; background:{$taiowcp_cart_coupon_code_btn_bg_clr}!important;color:{$taiowcp_cart_coupon_code_btn_txt_clr};} .taiowcp-coupon-remove-coupon{background:{$taiowcp_cart_coupon_code_add_bg_clr};color:{$taiowcp_cart_coupon_code_add_txt_clr};} .taiowcp-coupon-remove-coupon span{color:{$taiowcp_cart_coupon_code_add_dlt_clr};}";

//notification sound
$taiowcp_success_mgs_bg_clr     = taiowcp_main()->taiowcp_get_option( 'taiowcp-success_mgs_bg_clr' );
$taiowcp_success_mgs_txt_clr    = taiowcp_main()->taiowcp_get_option( 'taiowcp-success_mgs_txt_clr' );
$taiowcp_error_mgs_bg_clr       = taiowcp_main()->taiowcp_get_option( 'taiowcp-error_mgs_bg_clr' );
$taiowcp_error_mgs_txt_clr      = taiowcp_main()->taiowcp_get_option( 'taiowcp-error_mgs_txt_clr' );

$taiowcp_custom_css.=".taiowcp-notice-box .woocommerce-message,
.taiowcp-notice-container .taiowcp-notices li{color:{$taiowcp_success_mgs_txt_clr};background:{$taiowcp_success_mgs_bg_clr};} .taiowcp-notice-box .woocommerce-error,
.taiowcp-notices li.taiowcp-notice-error{
color:{$taiowcp_error_mgs_txt_clr};background:{$taiowcp_error_mgs_bg_clr};}";


//fixed cart position
$taiowcp_fxd_cart_position  = taiowcp_main()->taiowcp_get_option( 'taiowcp-fxd_cart_position' );
$taiowcp_fxd_cart_frm_right  = taiowcp_main()->taiowcp_get_option( 'taiowcp-fxd_cart_frm_right' );
$taiowcp_fxd_cart_frm_left  = taiowcp_main()->taiowcp_get_option( 'taiowcp-fxd_cart_frm_left' );
$taiowcp_fxd_cart_frm_btm  = taiowcp_main()->taiowcp_get_option( 'taiowcp-fxd_cart_frm_btm' );

if($taiowcp_fxd_cart_position == 'fxd-left'){

    $taiowcp_custom_css.=".cart_fixed_1 .taiowcp-content{left:{$taiowcp_fxd_cart_frm_left}px; bottom:{$taiowcp_fxd_cart_frm_btm}px; right:auto} .cart_fixed_1 .cart-count-item{
       right: -18px;
       left:auto;
    }";
      
}

if($taiowcp_fxd_cart_position == 'fxd-right'){

    $taiowcp_custom_css.=".cart_fixed_1 .taiowcp-content{right:{$taiowcp_fxd_cart_frm_right}px; bottom:{$taiowcp_fxd_cart_frm_btm}px; left:auto} .taiowcp-wrap.cart_fixed_2{right:0;left:auto;}.cart_fixed_2 .taiowcp-content{
    border-radius: 5px 0px 0px 0px;} .cart_fixed_2 .taiowcp-cart-close{left:-20px;}";

}

if(taiowcp_main()->taiowcp_get_option('taiowcp-show_floatingcart')==false){

 $taiowcp_custom_css.=".cart_fixed_1 .taiowcp_cart_empty, .cart_fixed_2 .taiowcp_cart_empty{display:none;}";
  
}

//mobile disable option
if(wp_is_mobile()){

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-dsble_mnu_crt' )==true){

$taiowcp_custom_css.=".taiowcp-wrap:not(.cart_fixed_1){display:none;},.taiowcp-wrap:not(.cart_fixed_2){display:none;}";

}

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-dsble_mnu_crt_qnty' )==true){

$taiowcp_custom_css.=".taiowcp-wrap:not(.cart_fixed_1) .cart-count-item{display:none;},.taiowcp-wrap:not(.cart_fixed_2) .cart-count-item{display:none;}";

}

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-dsble_mnu_crt_price' )==true){

$taiowcp_custom_css.=".taiowcp-wrap:not(.cart_fixed_1) .taiowcp-total{display:none;},.taiowcp-wrap:not(.cart_fixed_2) .taiowcp-total{display:none;}";

}

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-dsble_fxd_crt' )==true){

$taiowcp_custom_css.=".taiowcp-wrap.cart_fixed_1,.taiowcp-wrap.cart_fixed_2{display:none;}";

}

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-dsble_fxd_crt_qnty' )==true){

$taiowcp_custom_css.=".taiowcp-wrap.cart_fixed_1 .cart-count-item,.taiowcp-wrap.cart_fixed_2 .cart-count-item{display:none;}";

}

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-dsble_mob_rel_prd_crt' )==true){

$taiowcp_custom_css.=".taiowcp-related-product-cont{display:none;}";

}

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-dsble_mob_ship' )==true){

$taiowcp_custom_css.=".taiowcp-shipping,.taiowcp-shptgl-cont{display:none;}";

}

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-dsble_mob_coupan' )==true){

$taiowcp_custom_css.=".taiowcp-coupon,.taiowcp-coupon-list-content{display:none;}";

}

}

return $taiowcp_custom_css;
}