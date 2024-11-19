<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Taiowcp_Nav_Menu' ) ):

	class Taiowcp_Nav_Menu {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

            const SEARCH_PLACEHOLDER = 'taiowcp';
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

            if ( is_admin() ) {

                 add_action( 'admin_head-nav-menus.php', array( $this, 'taiowcp_addNavMenuMetaBoxes' ) );

                 add_action( 'wp_nav_menu_item_custom_fields', array( $this, 'taiowcp_addNavMenuItemCustomFields' ), 10, 2 );

                 add_action( 'wp_update_nav_menu_item', array( $this, 'taiowcp_updateNavMenuItem' ), 10, 3 );

		        add_action( 'admin_head', array( $this, 'taiowcp_navMenuStyle' ) );

		        add_action( 'admin_footer', array( $this, 'taiowcp_navMenuScripts' ) );

           }else{

	           	add_filter( 'walker_nav_menu_start_el', array( $this, 'taiowcp_processMenuItem' ), 50, 2 );

			     add_filter( 'megamenu_walker_nav_menu_start_el', array( $this, 'taiowcp_processMenuItem' ), 50, 2 );

           }

	}

		/**
		 * Check if nav-menus screen is active
		 *
		 * @return bool
		 */
		private function taiowcp_isNavMenuScreen() {

			$isNav  = false;

			$screen = get_current_screen();

			if ( ! empty( $screen->id ) && ( $screen->id === 'nav-menus' ) ) {

				$isNav = true;

			}

			return $isNav;

		}

            /**
		 * Add custom nav meta box.
		 *
		 * Adapted from http://www.johnmorrisonline.com/how-to-add-a-fully-functional-custom-meta-box-to-wordpress-navigation-menus/.
		 *
		 * @return void
		 */
		public function taiowcp_addNavMenuMetaBoxes() {

			add_meta_box( 'thaps_nav_link', esc_html__( 'TH All In One Woo Cart', 'taiowcp' ), array( $this, 'taiowcp_navMenuLinks' ), 'nav-menus', 'side',
				'low' );

		}

	    /**
		* Add custom fields to own menu item
		*/
		public function taiowcp_addNavMenuItemCustomFields( $item_id, $item ) { 

				if ( $item->post_title !== self::SEARCH_PLACEHOLDER ) {

					return;

				}
			}

			

	        /**
			 * Handle updates of custom fileds for own menu item
			 *
			 * @see wp_update_nav_menu_item()
			 */
			public function taiowcp_updateNavMenuItem( $menu_id, $menu_item_db_id, $args ) {

				if ( ! isset( $args['menu-item-title'] ) || $args['menu-item-title'] !== self::SEARCH_PLACEHOLDER ) {

					return;

				}

				$layout = isset( $layout_ ) ? $layout_ : '';


				update_post_meta($menu_item_db_id, '_menu_item_taiowcp_layout', $layout);


				
			}  

			/**
			 * Modifies the menu item display on frontend.
			 *
			 * @param string $itemOutput
			 *
			 * @return string
			 */
			public function taiowcp_processMenuItem( $itemOutput, $item ) {

				if (
					! empty( $itemOutput )
					&& is_string( $itemOutput )
					&& strpos( $itemOutput, self::SEARCH_PLACEHOLDER ) !== false
				) {
	
				
					$itemOutput = do_shortcode( '[taiowcp]');

				}

				return $itemOutput;

			} 

			/**
			 * Output menu links.
			 *
			 * @return void
			 */
			public function taiowcp_navMenuLinks() {

				?>

				<div id="posttype-taiowcp-endpoints" class="posttypediv">
					<p>

					<?php esc_html_e( 'Add TH All In One Woo Cart as a menu item.', 'taiowcp' ) ?>
						
					</p>

					<div id="tabs-panel-taiowcp-endpoints" class="tabs-panel tabs-panel-active">

						<ul id="taiowcp-endpoints-checklist" class="categorychecklist form-no-clear">

							<li>
		<label class="menu-item-title">
		<input type="checkbox" class="menu-item-checkbox" name="menu-item[-1][menu-item-object-id]" value="-1"/> 
		<?php esc_html_e( 'TH All In One Woo Cart', 'taiowcp' ); ?>
		</label>
								<input type="hidden" class="menu-item-type" name="menu-item[-1][menu-item-type]" value="custom"/>
								<input type="hidden" class="menu-item-title" name="menu-item[-1][menu-item-title]" value="<?php echo esc_attr(self::SEARCH_PLACEHOLDER); ?>"/>
								<input type="hidden" class="menu-item-classes" name="menu-item[-1][menu-item-classes]"/>
							</li>
						</ul>
					</div>
					<p class="button-controls">
		                <span class="add-to-menu">
							<button type="submit" class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e( 'Add to menu', 'taiowcp' ); ?>"
							        name="add-post-type-menu-item" id="submit-posttype-taiowcp-endpoints"><?php esc_html_e( 'Add to menu', 'taiowcp' ); ?></button>
							<span class="spinner"></span>
						</span>
					</p>
				</div>
				<?php
			}


		

		public function taiowcp_navMenuStyle() {

		if ( ! $this->taiowcp_isNavMenuScreen() ) {
			return;
		}
		

		?>
		<style>
			.taiowcp-admin-menu-item-desc {
				display: flex;
				flex-direction: row;
				justify-content: left;
				align-items: center;
				font-size: 0.87rem;
			}

			.taiowcp-description select {
				width: 100%;
				margin-top: 0.5rem;
			}
		</style>

		<?php

	}

		public function taiowcp_navMenuScripts() {

		if ( ! $this->taiowcp_isNavMenuScreen() ) {
			return;
		}

		?>

		<script>

			(function ($) {

				"use strict";

				function taiowcp_replaceLabels($menuItem) {

					var $menuItems = $('#menu-to-edit .menu-item-title');

					if ($menuItems.length > 0) {

						$menuItems.each(function () {

							if ($(this).text() === '<?php echo esc_html(self::SEARCH_PLACEHOLDER); ?>') {

								var $menuItem = $(this).closest('.menu-item');

								$menuItem.find('.menu-item-title').text(<?php esc_html_e('TH All In One Woo Cart', 'taiowcp');?>);

								$menuItem.find('.item-type').text('<?php esc_html_e( 'TH-Cart', 'taiowcp' ); ?>');

								$menuItem.find('.menu-item-settings .edit-menu-item-title').closest('label').hide();

								$menuItem.find('.field-url').hide();

							}
						});
					}
				}

				$(document).ready(function () {

					taiowcp_replaceLabels();

				});

				

				$(document).ajaxComplete(function (event, request, settings) {

					if (
						typeof settings != 'undefined'
						&& typeof settings.data == 'string'
						&& settings.data.indexOf('action=add-menu-item') !== -1
						&& settings.data.indexOf('taiowcp') !== -1
					) {
						taiowcp_replaceLabels();
						
						setTimeout(function () {

							taiowcp_replaceLabels();
							
						}, 500)

					}

				});

			}(jQuery));

		</script>

		<?php

	}

}

endif;	

Taiowcp_Nav_Menu::get_instance();