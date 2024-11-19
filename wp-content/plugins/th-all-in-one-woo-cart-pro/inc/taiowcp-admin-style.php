<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

/***Admin Custom Style********/

function taiowcp_admin_style_pro(){ ?>

<style>

<?php 

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_cart' ) == false){ ?>

#taiowcp-cart_style-wrapper,#taiowcp-cart_open-wrapper,#taiowcp-cart_styletaiowcp-cart_style-section-1, .taiowcp-cart_styletaiowcp-cart_style-section-1{display:none;}

<?php }
?>

<?php 

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_style' ) == 'style-2'){ ?>

#taiowcp-fxd_cart_frm_left-wrapper,#taiowcp-fxd_cart_frm_right-wrapper,#taiowcp-fxd_cart_frm_btm-wrapper{display:none;}

<?php }
?>

<?php 

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-fxd_cart_position' ) == 'fxd-left'){ ?>

#taiowcp-fxd_cart_frm_right-wrapper{display:none;}

<?php }
?>
<?php 

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-fxd_cart_position' ) == 'fxd-right'){ ?>

#taiowcp-fxd_cart_frm_left-wrapper{display:none;}

<?php }
?>


<?php 

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-cart-icon' ) == 'icon-7'){ ?>

#taiowcp-icon_url-wrapper{display:contents;}

<?php }
?>


<?php 

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_rld_product' ) == false){ ?>

#taiowcp-product_may_like_tle-wrapper, #taiowcp-choose_prdct_like-wrapper, #taiowcp-product_may_like_id-wrapper, #taiowcp-cart_styletaiowcp-cart_style-section-3,.taiowcp-cart_styletaiowcp-cart_style-section-3{display:none;}

<?php }
?>

<?php 

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_shipping' ) == false){ ?>

#taiowcp-ship_txt-wrapper{display:none;}

<?php }
?>

<?php 

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_discount' ) == false){ ?>

#taiowcp-discount_txt-wrapper{display:none;}

<?php }

?>

<?php 

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-show_coupon' ) == false){ ?>

#taiowcp-coupon_plchdr_txt-wrapper, #taiowcp-coupon_aply_txt-wrapper, #taiowcp-show_coupon_list-wrapper, #taiowcp-coupon_btn_txt-wrapper,#taiowcp-show_added_coupon-wrapper,#taiowcp-cart_styletaiowcp-cart_style-section-5, .taiowcp-cart_styletaiowcp-cart_style-section-5{display:none;}

<?php }
?>


<?php 

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_notify_shw' ) == false){ ?>

#taiowcp-success_mgs_bg_clr-wrapper, #taiowcp-success_mgs_txt_clr-wrapper, #taiowcp-error_mgs_bg_clr-wrapper, #taiowcp-error_mgs_txt_clr-wrapper{display:none;}

<?php }

?>

<?php 

if(taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_pan_icon_shw' ) == false){ ?>
	
#taiowcp-cart_pan_icon_clr-wrapper{display:none;}

<?php }

?>

</style>
	
<?php }

add_action('admin_head', 'taiowcp_admin_style_pro');