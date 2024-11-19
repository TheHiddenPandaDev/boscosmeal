<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Taiowcp_Set' ) ):

	class Taiowcp_Set {

        private $setting_name = 'taiowcp';
		private $setting_reset_name = 'reset';
		private $theme_feature_name = 'taiowcp';
		private $slug;
		private $plugin_class;
		private $defaults = array();
		private $fields = array();
		private $reserved_key = '';
		private $reserved_fields = array();
		
             public function __construct() {

			 $this->setting_name = apply_filters( 'taiowcp_settings_name', $this->setting_name );

             $this->fields          = apply_filters( 'taiowcp_settings', $this->fields );

             $this->reserved_key    = sprintf( '%s_reserved', $this->setting_name );

		     $this->reserved_fields = apply_filters( 'taiowcp_reserved_fields', array() );
 
             add_action( 'admin_menu', array( $this, 'taiowcp_add_menu' ) );

             add_action( 'init', array( $this, 'taiowcp_set_defaults' ), 8 );

             add_action( 'admin_init', array( $this, 'taiowcp_settings_init' ), 90 );

             add_action( 'admin_enqueue_scripts', array( $this, 'taiowcp_script_enqueue' ) );

             add_action('wp_ajax_taiowcp_form_setting', array($this, 'taiowcp_form_setting'));

			 add_action( 'wp_ajax_nopriv_taiowcp_form_setting', array($this, 'taiowcp_form_setting'));

            }
        

        public function taiowcp_add_menu(){

						$page_title = esc_html__( 'TH AIO Woo Cart Pro', 'taiowcp' );

						// $menu_title = esc_html__( 'TH All In One Woo Cart Pro', 'taiowcp' );

						// add_menu_page( $page_title, $menu_title, 'edit_theme_options', 'taiowcp', array(
						// 	$this,
						// 	'taiowcp_settings_form'
						// ),  esc_url(TAIOWCP_IMAGES_URI.'/taiowcp-icon.png'), 59 );

						add_submenu_page( 'themehunk-plugins', $page_title,$page_title, 'manage_options', 'taiowcp', array($this, 'taiowcp_settings_form'),10 );

					
		 }

		public function taiowcp_settings_form() {

			if ( ! current_user_can( 'manage_options' ) ) {

				wp_die( esc_html__( 'You do not have sufficient permissions to access this page.','taiowcp' ) );

			}

			if( ! class_exists( 'WooCommerce' ) ){

				   printf('<h2 class="requirement-notice">%s</h2>',esc_html__('TH All In One Woo Cart Pro requires WooCommerce to work. Make sure that you have installed and activated WooCommerce Plugin.','taiowcp' ) );

             return;

			}
		
			?>
			<div id="taiowcp" class="settings-wrap">
				
				<form method="post" action="" enctype="multipart/form-data" class="taiowcp-setting-form">

                 <input type="hidden" name="action" value="taiowcp_form_setting">

				 <?php $this->taiowcp_options_tabs(); ?>

                   <div class="setting-wrap">

                   <div class="setting-content"> 

					 <div id="settings-tabs">

						<?php foreach ( $this->fields as $tab ):

							if ( ! isset( $tab['active'] ) ) {
								$tab['active'] = false;
							}

							$is_active = ( $this->taiowcp_get_last_active_tab() == $tab['id'] );

							?>

							<div id="<?php echo esc_attr($tab['id']); ?>"
								 class="settings-tab taiowcp-setting-tab"
								 style="<?php echo ! esc_attr($is_active) ? 'display: none' : '' ?>">
								 
								<?php foreach ( $tab['sections'] as $section ):

					        	$this->taiowcp_do_settings_sections( $tab['id'] . $section['id'] );

								endforeach; ?>

							</div>

						<?php endforeach; ?>

					</div>

					<?php

					$this->taiowcp_last_tab_input();
					
					?>
					<p class="submit taiowcp-button-wrapper">
						
						<a onclick="return confirm('<?php esc_attr_e( 'Are you sure to reset current settings?', 'taiowcp' ) ?>')" class="reset" href="<?php echo esc_url($this->taiowcp_reset_url()); ?>"><?php esc_html_e( 'Reset all', 'taiowcp' ); ?>
						</a>

						 <button  disabled id="submit" class="button button-primary" value="<?php esc_html_e( 'Save Changes', 'taiowcp' ) ?>"><span class="dashicons dashicons-image-rotate spin"></span><span><?php esc_html_e( 'Save Changes', 'taiowcp' ) ?></span>
						 </button>
					</p>
			</div> 

            </div>

            <div class="taiowcp-notes-wrap">
            	
            	<div class="taiowcp-wrap-doc"><h4 class="wrp-title"><?php esc_html_e( 'Documentation', 'taiowcp' ) ?></h4><p><?php esc_html_e( 'Want to know how this plugin works. Read our Documentation.', 'taiowcp' ) ?></p><a target="_blank" href="<?php echo esc_url('https://themehunk.com/docs/th-all-in-one-woo-cart/');?>"><?php esc_html_e( 'Check Doc', 'taiowcp' ) ?></a>
            	</div>
           
            	<div class="taiowcp-wrap-doc"><h4 class="wrp-title"><?php esc_html_e( 'Join Group', 'taiowcp' ) ?></h4><p><?php esc_html_e( 'Get connected to our Facebook. Join our User friendly community.', 'taiowcp' ) ?></p><a target="_blank" href="<?php echo esc_url('https://www.facebook.com/groups/themehunk');?>"><span class="dashicons dashicons-facebook-alt"></span><?php esc_html_e( 'Join Facebook Group', 'taiowcp' ) ?></a>
            	</div>
            	
            	<div class="taiowcp-wrap-doc"><h4 class="wrp-title"><?php esc_html_e( 'Contact Support', 'taiowcp' ) ?></h4><p><?php esc_html_e( 'If you need any help you can contact to our support team', 'taiowcp' ) ?></p><a target="_blank" href="<?php echo esc_url('https://themehunk.com/contact-us/');?>"><?php esc_html_e( 'Need Help ?', 'taiowcp' ) ?></a>
            	</div>
            	
            	<div class="taiowcp-wrap-doc"><h4 class="wrp-title"><?php esc_html_e( 'Review', 'taiowcp' ) ?></h4><p><?php esc_html_e( 'Give us your valuable feedback', 'taiowcp' ) ?></p><a target="_blank" href="<?php echo esc_url('https://www.trustpilot.com/review/themehunk.com');?>"><?php esc_html_e( 'Submit a review', 'taiowcp' ) ?></a>
            	</div>

            </div>
           
				</form>
			</div>
			<?php
			
		}

	    public function taiowcp_form_setting(){  

	    	if ( ! current_user_can( 'administrator' ) ) {

		            wp_die( - 1, 403 );
		            
		      } 

		      check_ajax_referer( 'taiowcp_plugin_nonce','_wpnonce');

	             if( isset($_POST['taiowcp']) ){

	                      $sanitize_data_array = $this->taiowcp_form_sanitize($_POST['taiowcp']);

	                      update_option('taiowcp',$sanitize_data_array); 

		            }

		            die();  
	    }
        
	    public function taiowcp_form_sanitize( $input ){

				$new_input = array();

				foreach ( $input as $key => $val ){

					$new_input[ $key ] = ( isset( $input[ $key ] ) ) ? sanitize_text_field( $val ) :'';

		   }

		   return $new_input;

	    }

		public function taiowcp_options_tabs() {
			?>

			<div class="nav-tab-wrapper wp-clearfix">

				<div class="top-wrap"><div id="logo"><a href="<?php echo esc_url('https://themehunk.com/'); ?>" target="_blank"><img src='<?php echo esc_url(TAIOWCP_IMAGES_URI.'/th-logo.png') ?>' alt="th-logo"/></a>
				</div>

				  <h1><?php echo get_admin_page_title() ?></h1>

			     </div>

				<?php foreach ( $this->fields as $tabs ): 
					?>
							
					<a data-target="<?php echo esc_attr($tabs['id']); ?>"  class="taiowcp-setting-nav-tab nav-tab <?php echo esc_html($this->taiowcp_get_options_tab_css_classes( $tabs )); ?> " href="#<?php echo esc_attr($tabs['id']); ?>">
					<span class="dashicons <?php echo $this->icon_list($tabs['id']); ?>"></span><?php echo esc_html($tabs['title']); ?></a>

				<?php endforeach; ?>

			</div>

			<?php

		}

		function icon_list($id ='dashicons-menu'){
			$icon = array(
				'taiowcp_integration'=>'dashicons-admin-appearance',
				'taiowcp_general' => 'dashicons-admin-generic',
			'taiowcp_cart'=>'dashicons-cart',
			'taiowcp-cart_style_set'=>'dashicons-color-picker',
			'taiowcp_mobile_cart'=>'dashicons-smartphone',
			'taiowcp_reset'=>'dashicons-warning',
		);

			return $icon[$id];

		}

		private function taiowcp_get_last_active_tab() {

			$last_option_tab = '';

			$last_tab        = $last_option_tab;

			if ( isset( $_GET['tab'] ) && ! empty( $_GET['tab'] ) ) {

				$last_tab = trim( sanitize_key($_GET['tab']) );

			}

			if ( $last_option_tab ) {

				$last_tab = $last_option_tab;

			}

			$default_tab = '';

			foreach ( $this->fields as $tabs ) {

				if ( isset( $tabs['active'] ) && $tabs['active'] ) {

					$default_tab = sanitize_key($tabs['id']);

					break;

				}

			}

			return ! empty( $last_tab ) ? esc_html( $last_tab ) : esc_html( $default_tab );

		}

		private function taiowcp_do_settings_sections( $page ) {

			global $wp_settings_sections, $wp_settings_fields;

			if ( ! isset( $wp_settings_sections[ $page ] ) ) {
				return;
			}

			foreach ( (array) $wp_settings_sections[ $page ] as $section ) {

				if ( $section['title'] ) {

					echo "<h2 class=".esc_attr($section['id']).">".esc_html($section['title'])."</h2>";

				}
                
				if ( $section['callback'] ) {

					call_user_func( $section['callback'], $section );

				}

				if ( ! isset( $wp_settings_fields ) || ! isset( $wp_settings_fields[ $page ] ) || ! isset( $wp_settings_fields[ $page ][ $section['id'] ] ) ) {

					continue;

				}

				echo '<table class="form-table" id='.esc_attr($section['id']).'>';

				$this->taiowcp_do_settings_fields( $page, $section['id'] );

				echo '</table>';

			}
		}

		private function taiowcp_last_tab_input() {

			printf( '<input type="hidden" id="_last_active_tab" name="%s[_last_active_tab]" value="%s">', $this->setting_name, $this->taiowcp_get_last_active_tab() );

		}

		private function taiowcp_get_options_tab_css_classes( $tabs ) {

			$classes = array();

			$classes[] = ( $this->taiowcp_get_last_active_tab() == $tabs['id'] ) ? 'nav-tab-active' : '';

			return implode( ' ', array_unique( apply_filters( 'taiowcp_get_options_tab_css_classes', $classes ) ) );

		}

		private function taiowcp_do_settings_fields( $page, $section ) {

			global $wp_settings_fields;

			if ( ! isset( $wp_settings_fields[ $page ][ $section ] ) ) {
				return;
			}

			foreach ( (array) $wp_settings_fields[ $page ][ $section ] as $field ) {
				
				$custom_attributes = $this->taiowcp_array2html_attr( isset( $field['args']['attributes'] ) ? $field['args']['attributes'] : array() );

				$wrapper_id = ! empty( $field['args']['id'] ) ? esc_attr( $field['args']['id'] ) . '-wrapper' : '';
				$dependency = ! empty( $field['args']['require'] ) ? $this->taiowcp_build_dependency( $field['args']['require'] ) : '';

				printf( '<tr id="%s" %s %s>', $wrapper_id, $custom_attributes, $dependency );

				
					echo '<th scope="row" class="taiowcp-settings-label">';
					if ( ! empty( $field['args']['label_for'] ) ) {
						echo '<label for="' . esc_attr( $field['args']['label_for'] ) . '">' . esc_html($field['title']). '</label>';
					} else {
						echo esc_html($field['title']);
					}

					echo '</th>';
					echo '<td class="taiowcp-settings-field-content">';
					call_user_func( $field['callback'], $field['args'] );
					echo '</td>';
				
				   echo '</tr>';
			}
		}

        public function taiowcp_array2html_attr( $attributes, $do_not_add = array() ) {

			$attributes = wp_parse_args( $attributes, array() );

			if ( ! empty( $do_not_add ) and is_array( $do_not_add ) ) {

				foreach ( $do_not_add as $att_name ) {

					unset( $attributes[ $att_name ] );

				}

			}


			$attributes_array = array();

			foreach ( $attributes as $key => $value ) {

				if ( is_bool( $attributes[ $key ] ) and $attributes[ $key ] === true ) {

					return $attributes[ $key ] ? $key : '';

				} elseif ( is_bool( $attributes[ $key ] ) and $attributes[ $key ] === false ) {

					$attributes_array[] = '';

				} else {

					$attributes_array[] = $key . '="' . esc_attr($value) . '"';

				}
			}

			return implode( ' ', $attributes_array );
		}

		 private function taiowcp_build_dependency( $require_array ) {

			$b_array = array();

			foreach ( $require_array as $k => $v ) {

				$b_array[ '#' . esc_attr($k) . '-field' ] = $v;
			}

			return 'data-taiowcpdepends="[' . esc_attr( wp_json_encode( $b_array ) ) . ']"';
		}

		 public function taiowcp_make_implode_html_attributes( $attributes, $except = array( 'type', 'id', 'name', 'value' ) ) {

			$attrs = array();

			foreach ( $attributes as $name => $value ) {

				if ( in_array( $name, $except, true ) ) {

					continue;

				}

				$attrs[] = esc_attr( $name ) . '="' . esc_attr( $value ) . '"';

			}

			return implode( ' ', array_unique( $attrs ) );

		}

		/***************/
		// Field call back function
		/***************/

		public function taiowcp_field_callback( $field ) {

			switch ( $field['type'] ) {


				case 'checkbox':
					$this->taiowcp_checkbox_field_callback( $field );
					break;

				case 'select':
					$this->taiowcp_select_field_callback( $field );
					break;

				case 'number':
					$this->taiowcp_number_field_callback( $field );
					break;

			    case 'colorpkr':
					$this->taiowcp_colorpkr_field_callback( $field );
					break;		

				case 'html':
					$this->taiowcp_html_field_callback( $field );
					break;


			    case 'file':
					$this->taiowcp_file_field_callback( $field );
					break;	

				case 'radio-image':
					$this->taiowcp_radio_image_field_callback( $field );
					break;

			    case 'textarea':
					$this->taiowcp_textarea_field_callback( $field );
					break;						

				default:
					$this->taiowcp_text_field_callback( $field );
					break;
			}

			do_action( 'taiowcp_settings_field_callback', $field );

		}

     
      public function taiowcp_checkbox_field_callback( $args ) {
               
			$value = (bool)( $this->taiowcp_get_option( $args['id'] ) );

			$attrs = isset( $args['attrs'] ) ? $this->taiowcp_make_implode_html_attributes( $args['attrs'] ) : '';?>

            <fieldset>
            	<label>
            		<input <?php echo esc_attr($attrs); ?> type="checkbox" id="<?php echo esc_attr($args['id']); ?>-field" name="<?php echo esc_attr($this->setting_name);?>[<?php echo esc_attr($args['id']);?>]" value="1" <?php echo esc_attr(checked( $value, true, false ));?>> <?php if ( ! empty( $args['desc'] ) ) {  echo esc_html($args['desc']); } ?>
            	</label>     
            </fieldset>
			
		<?php }


		public function taiowcp_select_field_callback( $args ) {

			$options = apply_filters( "taiowcp_settings_{$args[ 'id' ]}_select_options", $args['options'] );

			$valuee   = $this->taiowcp_get_option( $args['id'] );

		
			$size    = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';

			$attrs = isset( $args['attrs'] ) ? $this->taiowcp_make_implode_html_attributes( $args['attrs'] ) : '';
			?>

			<select <?php echo esc_attr($attrs); ?> class="<?php echo esc_attr($size); ?>-text" id="<?php echo esc_attr($args['id']); ?>-field" name="<?php echo esc_attr($this->setting_name);?>[<?php echo esc_attr($args['id']);?>]">

				<?php foreach($options as $key => $value){ ?>

                <option <?php echo esc_attr(selected( $key, $valuee, false )) ;?> value="<?php echo esc_attr($key);?>">
                	
                	<?php echo esc_html($value);?> 	

                </option> 

               <?php } ?>

			</select>

			<?php if ( ! empty( $args['desc'] ) ) { ?>
            <p class="description"><?php echo esc_html($args['desc']);?></p>
		    <?php } }


        public function taiowcp_text_field_callback( $args ) {

			$value =  $this->taiowcp_get_option( $args['id'] );

			$size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';

			$attrs = isset( $args['attrs'] ) ? $this->taiowcp_make_implode_html_attributes( $args['attrs'] ) : '';?>

            <input type="text" class="<?php echo esc_attr($size); ?>-text" id="<?php echo esc_attr($args['id']); ?>-field" name="<?php echo esc_attr($this->setting_name);?>[<?php echo esc_attr($args['id']);?>]" value="<?php echo esc_attr($value); ?>"/>

            <?php if ( ! empty( $args['desc'] ) ) { ?>

            <p class="description"><?php echo esc_html($args['desc']);?></p>

	        <?php 

	           }
				
		}

		
		public function taiowcp_textarea_field_callback( $args ) {

			$value = $this->taiowcp_get_option( $args['id'] );

			$size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';

			$attrs = isset( $args['attrs'] ) ? $this->taiowcp_make_implode_html_attributes( $args['attrs'] ) : '';
			?>

           <textarea class="<?php echo esc_attr($size); ?>-text" id="<?php echo esc_attr($args['id']); ?>-field" name="<?php echo esc_attr($this->setting_name);?>[<?php echo esc_attr($args['id']);?>]"><?php echo esc_attr($value); ?></textarea>

          <?php if ( ! empty( $args['desc'] ) ) { ?>

           <p class="description"><?php echo esc_html($args['desc']);?></p>

	      <?php 
	           }
				
		}

		public function taiowcp_file_field_callback( $args ) {

        $value = $this->taiowcp_get_option( $args['id'] );

        $size = ( isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'regular' );

        $attrs = isset( $args['attrs'] ) ? $this->taiowcp_make_implode_html_attributes( $args['attrs'] ) : '';

        $label = ( isset( $args['options']['button_label'] ) ? $args['options']['button_label'] : esc_html__( 'Choose File','taiowcp' ) );?>

        <input %5$s type="text" class="<?php echo esc_attr($size); ?>-text <?php echo esc_attr($args['id']); ?>" id="<?php echo esc_attr($args['id']); ?>-field" name="<?php echo esc_attr($this->setting_name); ?>[<?php echo esc_attr($args['id']); ?>]" value="<?php echo esc_attr($value); ?>"/>

        <input type="button" class="button taiowcp_upload_image_button <?php echo esc_attr($this->setting_name); ?> browse" value="<?php echo esc_attr($label); ?>" />

         <?php if ( ! empty( $args['desc'] ) ) { ?>

           <p class="description"><?php echo esc_html($args['desc']);?></p>

	      <?php 

	     }

       }

        public function taiowcp_number_field_callback( $args ) {

			$value = $this->taiowcp_get_option( $args['id'] );

			$size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'small';

			$attrs = isset( $args['attrs'] ) ? $this->taiowcp_make_implode_html_attributes( $args['attrs'] ) : '';
            ?>

			<input type="number"  <?php echo esc_attr($attrs); ?> class="<?php echo esc_attr($size); ?>-text" id="<?php echo esc_attr($args['id']); ?>-field" name="<?php echo esc_attr($this->setting_name);?>[<?php echo esc_attr($args['id']);?>]" value="<?php echo esc_attr($value); ?>"  min="<?php echo esc_attr($args['min']); ?>" max="<?php echo esc_attr($args['max']); ?>" step="<?php  if ( ! empty($args['step']) ) { 
				echo esc_attr($args['step']); } ?>" />

              <?php if(isset( $args['suffix'] ) && ! is_null( $args['suffix'] ) ){ ?>

			<span><?php echo esc_attr($args['suffix']); ?></span>
         
             <?php

               }

           if ( ! empty( $args['desc'] ) ) { ?>

           <p class="description"><?php echo esc_html($args['desc']);?></p>    

		<?php 	

	         } 
		}

		public function taiowcp_colorpkr_field_callback( $args ){

			$value = $this->taiowcp_get_option( $args['id'] );
			
			?>

		  <input type="text" class="color_picker" id="<?php echo esc_attr($args['id']);?>" name="<?php echo esc_attr($this->setting_name);?>[<?php echo esc_attr($args['id']);?>]" value="<?php echo esc_attr($value); ?>" style="background:<?php echo esc_attr($value); ?>" />
          
          <?php if ( ! empty( $args['desc'] ) ) { ?>

           <p class="description"><?php echo esc_html($args['desc']);?></p>      

		<?php
	        }

		}


		public function taiowcp_radio_image_field_callback( $args ) {

			$options = apply_filters( "taiowcp_settings_{$args[ 'id' ]}_radio_options", $args['options'] );
			$value   = esc_attr( $this->taiowcp_get_option( $args['id'] ) );

			$attrs = isset( $args['attrs'] ) ? $this->taiowcp_make_implode_html_attributes( $args['attrs'] ) : '';

			return implode( '', array_map( function ( $key, $option ) use ( $attrs, $args, $value ) {
				echo sprintf( '<label class="radio-image"><input id="%2$s" %1$s type="radio"  name="%4$s[%2$s]" value="%3$s" %5$s/> <img src="%6$s"/> </label>', esc_attr($attrs), esc_attr($args['id']), esc_attr($key), esc_attr($this->setting_name), checked( esc_attr($value), esc_attr($key), false ), esc_attr($option));
			}, array_keys( $options ), $options ) );

		}


		public function taiowcp_html_field_callback( $args ) {

         if($args[ 'id' ]=='taiowcp-how-to-integrate'):

         	$taiowcp_karr = array( 
            'br' => array(),
            'strong' => array(),
            'code' => array(),
            'a' => array( 
                   'href' => array(),
                   'target' => array(),
                  )
            );

			?>
			
		   <h4><?php esc_html_e( 'Using these three methods you can display cart at your desired location.', 'taiowcp' ); ?>: </h4>
		   <ol>

		   	    <li>
		   	    <?php printf(wp_kses('%1$s <br /> <br /> %2$s <a target="_blank" href="%3$s">%4$s</a> %5$s',$taiowcp_karr),__('Display cart in the header menu.','taiowcp'),__('Go to the Appearance >','taiowcp'),admin_url( 'nav-menus.php' ),__('Menus','taiowcp'),__('Add menu items section click on the <b>“TH All In One Woo Cart”</b> and then Click on <b>“Add to menu” </b>button.','taiowcp'));
						?>

				</li>

				<li>
					<?php printf(wp_kses('%1$s <code>[taiowcp]</code><br /> %2$s',$taiowcp_karr),__('Using Shortcode -','taiowcp'),__('Add given shortcode at the desired location, You can use Shortcode block, Widget or any page builder shortcode add-on to display cart.','taiowcp'));
						?>
						
					</li>

			        <li>
					<?php printf(wp_kses('%1$s <code>&lt;?php echo do_shortcode(\'[taiowcp]\'); ?&gt;</code> %2$s ',$taiowcp_karr),__('Using php -','taiowcp'),__('Add this php code at the desired location in any php file.','taiowcp'));
						?>
						
					</li>		
				
			</ol>


		<?php 	

			endif;

		}
        
	 
	//*********************************/	
    // add ,delete ,get , reset, option
    /**********************************/

    public function taiowcp_set_defaults() {

			foreach ( $this->fields as $tab_key => $tab ) {

				$tab = apply_filters( 'taiowcp_settings_tab', $tab );

				foreach ( $tab['sections'] as $section_key => $section ) {

					$section = apply_filters( 'taiowcp_settings_section', $section, $tab );

					$section['id'] = ! isset( $section['id'] ) ? $tab['id'] . '-section' : $section['id'];

					$section['fields'] = apply_filters( 'taiowcp_settings_fields', $section['fields'], $section, $tab );

					foreach ( $section['fields'] as $field ) {

						if ( isset( $field['pro'] ) ) {
							continue;
						}

						$field['default'] = isset( $field['default'] ) ? $field['default'] : null;

						$this->taiowcp_set_default( $field['id'], $field['type'], $field['default'] );
					}
				}
			}
		}


		public function taiowcp_sanitize_callback( $options ) {

			foreach ( $this->taiowcp_get_defaults() as $opt ) {
				if ( $opt['type'] === 'checkbox' && ! isset( $options[ $opt['id'] ] ) ){
					$options[ $opt['id'] ] = 0;
				}
			}

			return $options;
		}

		public function taiowcp_settings_init() {

			if ( $this->taiowcp_is_reset_all() ) {

				 $this->taiowcp_delete_settings();

				 wp_redirect(esc_url($this->taiowcp_settings_url()));

			}
              
		  register_setting( $this->setting_name, $this->setting_name, array( $this, 'taiowcp_sanitize_callback' ) );

			foreach ( $this->fields as $tab_key => $tab ) {

				$tab = apply_filters( 'taiowcp_settings_tab', $tab );

				foreach ( $tab['sections'] as $section_key => $section ) {

					$section = apply_filters( 'taiowcp_settings_section', $section, $tab );

					$section['id'] = ! isset( $section['id'] ) ? $tab['id'] . '-section-' . $section_key : $section['id'];

					// Adding Settings section id
					$this->fields[ $tab_key ]['sections'][ $section_key ]['id'] = $section['id'];

					add_settings_section( $tab['id'] . $section['id'], $section['title'], function () use ( $section ) {
						if ( isset( $section['desc'] ) && ! empty( $section['desc'] ) ) {
							echo '<div class="inside">' . esc_html($section['desc']) . '</div>';
						}
					}, $tab['id'] . $section['id'] );

					$section['fields'] = apply_filters( 'taiowcp_settings_fields', $section['fields'], $section, $tab );

					foreach ( $section['fields'] as $field ) {

						$field['label_for'] = $field['id'] . '-field';
						$field['default']   = isset( $field['default'] ) ? $field['default'] : null;

						if ( $field['type'] == 'checkbox' || $field['type'] == 'radio' ) {
							unset( $field['label_for'] );
						}

						add_settings_field( $this->setting_name . '[' . $field['id'] . ']', $field['title'], array(
							$this,
							'taiowcp_field_callback'
						), $tab['id'] . $section['id'], $tab['id'] . $section['id'], $field );

					}
				}
			}
		}

		public function taiowcp_reset_url(){

			return add_query_arg( array( 'page' => 'taiowcp', 'reset' => 'reset','delete_wpnonce' => wp_create_nonce('delete_nonce') ), admin_url( 'admin.php' ) );

		}

		public function taiowcp_settings_url(){

			return add_query_arg( array( 'page' => 'taiowcp' ), admin_url( 'admin.php' ) );

		}

        private function taiowcp_set_default( $key, $type, $value ) {
		$this->defaults[ $key ] = array( 'id' => $key, 'type' => $type, 'value' => $value );
		}

		private function taiowcp_get_default( $key ) {
			return isset( $this->defaults[ $key ] ) ? $this->defaults[ $key ] : null;
		}

		public function taiowcp_get_defaults() {
			return $this->defaults;
		}


        public function taiowcp_is_reset_all() {
			return isset( $_GET['page'] ) && ( $_GET['page'] == 'taiowcp' ) && isset( $_GET[ $this->setting_reset_name ] );
		}  

        public function taiowcp_delete_settings() {

        	if ( ! current_user_can( 'administrator' ) ) {

            wp_die( - 1, 403 );

            }

            if (isset($_GET['delete_wpnonce']) || wp_verify_nonce($_REQUEST['delete_wpnonce'], 'delete_nonce' ) ) {

			do_action( sprintf( 'delete_%s_settings', $this->setting_name ), $this );

			// license_key should not updated

			return delete_option( $this->setting_name );

		   }

		}

		public function taiowcp_get_option( $option ) {

			$default = $this->taiowcp_get_default( $option );

			$options = get_option( $this->setting_name );

			$is_new = ( ! is_array( $options ) && is_bool( $options ) );

			// Theme Support

			if ( current_theme_supports( $this->theme_feature_name ) ) {

				$theme_support    = get_theme_support( $this->theme_feature_name );

				$default['value'] = isset( $theme_support[0][ $option ] ) ? $theme_support[0][ $option ] : $default['value'];

			}

			$default_value = isset( $default['value'] ) ? $default['value'] : null;

			if ( ! is_null( $this->taiowcp_get_reserved( $option ) ) ) {

				$default_value = $this->taiowcp_get_reserved( $option );

			}

			if ( $is_new ) {
			
				return $default_value;

			} else {
			
				return isset( $options[ $option ] ) ? $options[ $option ] : $default_value;

			}

		}

		public function taiowcp_get_options(){

			return taiowcp_get_option( $this->setting_name );

		}

		public function taiowcp_get_reserved( $key = false ){

			$data = (array) get_option( $this->reserved_key );
			if ( $key ) {
				return isset( $data[ $key ] ) ? $data[ $key ] : null;
			} else {
				return $data;
			}
		}
		
        public function taiowcp_script_enqueue(){
        
        	    // STYEL

			    if (isset($_GET['page']) && $_GET['page'] == 'taiowcp') {

				wp_enqueue_style( 'taiowcp-admin', TAIOWCP_PLUGIN_URI. '/assets/css/taiowcp-admin.css', array(), TAIOWCP_VERSION );

				wp_enqueue_style( 'taiowcp-pickr-nano-css', TAIOWCP_PLUGIN_URI. '/assets/css/nano.min.css', array(), TAIOWCP_VERSION );

				//SCRIPT

				wp_enqueue_script( 'tapsp-selectize-script', TAIOWCP_PLUGIN_URI. '/assets/js/selectize.min.js', array('jquery'),true);

				wp_enqueue_style( 'tapsp-selectize-css', TAIOWCP_PLUGIN_URI. '/assets/css/selectize.min.css', array(), TAIOWCP_VERSION );

				wp_enqueue_script( 'taiowcp-pickr-script', TAIOWCP_PLUGIN_URI. '/assets/js/pickr.min.js', array('jquery'),TAIOWCP_VERSION, true);

				wp_enqueue_script( 'taiowcp-setting-script', TAIOWCP_PLUGIN_URI. '/assets/js/taiowcp-setting.js', array('jquery'),TAIOWCP_VERSION, true);

				wp_enqueue_media();

				wp_localize_script(
					'taiowcp-setting-script', 'taiowcpluginObject', array(
						'media_title'   => esc_html__( 'Choose an Image', 'taiowcp' ),
						'button_title'  => esc_html__( 'Use Image', 'taiowcp' ),
						'add_media'     => esc_html__( 'Add Media', 'taiowcp' ),
						'ajaxurl'       => esc_url( admin_url( 'admin-ajax.php', 'relative' ) ),
						'taiowcp_nonce' => wp_create_nonce( 'taiowcp_plugin_nonce' ),
					)
				);
				
			}
			
		}

}

endif;