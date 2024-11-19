<?php

if ( ! defined( 'ABSPATH' ) ) exit;

$uniqueID   = ++ taiowcp_main()->taiowcp_cartInstances;

$layoutType = !empty($args['layout'])  ? $args['layout'] : '';

if($layoutType =='cart_fixed_2'){

$cartStyle = '';

}elseif($layoutType =='cart_fixed_1'){

		if(taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_effect' ) == 'taiowcp-click-dropdown'){

          $cartStyle = '';

		}else{

          $cartStyle = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_effect' );
          
		}


}else{

$cartStyle = taiowcp_main()->taiowcp_get_option( 'taiowcp-cart_effect' );	

}


?>

<div id="<?php echo esc_attr($uniqueID); ?>" class="taiowcp-wrap  <?php echo esc_attr($cartStyle); ?>  <?php echo esc_attr($layoutType); ?>">
			
			<?php 

            taiowcp_markup_pro()->taiowcp_cart_show();
    
			taiowcp_markup_pro()->taiowcp_cart_item_show();

			?>
</div>