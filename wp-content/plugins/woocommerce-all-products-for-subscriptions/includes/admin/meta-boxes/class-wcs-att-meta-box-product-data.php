<?php
/**
 * WCS_ATT_Meta_Box_Product_Data class
 *
 * @package  WooCommerce All Products for Subscriptions
 * @since    2.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Product meta-box data for SATT-enabled product types.
 *
 * @class    WCS_ATT_Meta_Box_Product_Data
 * @version  6.0.0
 */
class WCS_ATT_Meta_Box_Product_Data {

	/**
	 * Initialize.
	 */
	public static function init() {
		self::add_hooks();
	}

	/**
	 * Add hooks.
	 */
	private static function add_hooks() {

		// Create the SATT Subscriptions tab.
		add_action( 'woocommerce_product_data_tabs', array( __CLASS__, 'satt_product_data_tab' ) );

		// Create the SATT Subscriptions tab panel.
		add_action( 'woocommerce_product_data_panels', array( __CLASS__, 'product_data_panel' ) );

		// Subscription scheme markup added on the 'wcsatt_subscription_scheme' action.
		add_action( 'wcsatt_subscription_scheme', array( __CLASS__, 'subscription_scheme' ), 10, 3 );

		// Subscription scheme options displayed on the 'wcsatt_subscription_scheme_content' action.
		add_action( 'wcsatt_subscription_scheme_content', array( __CLASS__, 'subscription_scheme_content' ), 10, 3 );

		// Product-specific subscription scheme options displayed on the 'wcsatt_subscription_scheme_content' action.
		add_action( 'wcsatt_subscription_scheme_content', array( __CLASS__, 'subscription_scheme_product_content_display' ), 100, 3 );

		// Product-specific subscription scheme options content.
		add_action( 'wcsatt_subscription_scheme_product_content', array( __CLASS__, 'subscription_scheme_product_content' ), 10, 3 );

		// Cart subscription scheme options content.
		add_action( 'wcsatt_subscription_scheme_global_content', array( __CLASS__, 'subscription_scheme_global_content' ), 10, 2 );

		// Process and save the necessary meta.
		add_action( 'woocommerce_admin_process_product_object', array( __CLASS__, 'save_subscription_data' ), 10, 1 );
	}

	/**
	 * Add Subscriptions tab.
	 *
	 * @param  array $tabs
	 * @return void
	 */
	public static function satt_product_data_tab( $tabs ) {

		$tabs['satt'] = array(
			'label'    => __( 'Subscriptions', 'woocommerce-all-products-for-subscriptions' ),
			'target'   => 'wcsatt_data',
			'priority' => 100,
			'class'    => array( 'cart_subscription_options', 'cart_subscriptions_tab', 'show_if_simple', 'show_if_variable', 'show_if_bundle', 'hide_if_subscription', 'hide_if_variable-subscription' ),
		);

		return $tabs;
	}

	/**
	 * Product writepanel for Subscriptions.
	 *
	 * @return void
	 */
	public static function product_data_panel() {

		global $post, $product_object;

		$schemes_disabled         = 'yes' === $product_object->get_meta( '_wcsatt_disabled', true );
		$has_subscription_schemes = ! $schemes_disabled && WCS_ATT_Product_Schemes::has_subscription_schemes( $product_object, 'local' );

		if ( $schemes_disabled ) {
			$global_schemes_status = 'disable';
		} elseif ( $has_subscription_schemes ) {
			$global_schemes_status = 'override';
		} else {
			$global_schemes_status = 'inherit';
		}

		$classes = 'status_' . $global_schemes_status;

		if ( ! $has_subscription_schemes ) {
			$classes .= ' planless onboarding';
		}

		?><div id="wcsatt_data" class="panel woocommerce_options_panel wc-metaboxes-wrapper <?php echo esc_attr( $classes ); ?>" style="display:none;">

			<div class="options_group global_scheme_options">
			<?php

				// Default Status.
				woocommerce_wp_select(
					array(
						'id'            => '_wcsatt_schemes_status',
						'wrapper_class' => 'wcsatt_schemes_status',
						'value'         => $global_schemes_status,
						'label'         => __( 'Sell on subscription?', 'woocommerce-all-products-for-subscriptions' ),
						'description'   => sprintf( __( 'Use this option to override your <a href="%s">global subscription plan settings</a>. Handy if you need to specify custom plans for this product, or make it available for one-time purchase only.', 'woocommerce-all-products-for-subscriptions' ), WCS_ATT()->get_resource_url( 'global-plan-settings' ) ),
						'options'       => array(
							'inherit'  => __( 'Use global subscription plans', 'woocommerce-all-products-for-subscriptions' ),
							'override' => __( 'Add custom subscription plans', 'woocommerce-all-products-for-subscriptions' ),
							'disable'  => __( 'Sell one-time only', 'woocommerce-all-products-for-subscriptions' ),
						),
					)
				);

			?>
			</div>
			<div class="hr-section hr-section-schemes"><?php echo esc_html__( 'Subscription Plans', 'woocommerce-all-products-for-subscriptions' ); ?></div>
			<div class="options_group subscription_schemes wc-metaboxes ui-sortable" data-count="">
			<?php

			if ( $has_subscription_schemes ) {

				$scheme_meta = $product_object->get_meta( '_wcsatt_schemes', true );
				$i           = 0;

				foreach ( $scheme_meta as $scheme ) {
					do_action( 'wcsatt_subscription_scheme', $i, $scheme, $post->ID );
					++$i;
				}
			}

			?>
				<div class="apfs_boarding__schemes">
					<div class="apfs_boarding__schemes__message">
						<p><?php esc_html_e( 'Add some custom subscription plans to this product.', 'woocommerce-all-products-for-subscriptions' ); ?>
						<br/><?php esc_html_e( 'These plans will override your global subscription plans.', 'woocommerce-all-products-for-subscriptions' ); ?>
						</p>
					</div>
				</div>
			</div>
			<div class="options_group subscription_schemes_add_wrapper">
				<button type="button" class="button add_subscription_scheme"><?php esc_html_e( 'Add Plan', 'woocommerce-all-products-for-subscriptions' ); ?></button>
			</div>
			<div class="hr-section hr-section-schemes-settings"><?php echo esc_html__( 'Advanced Settings', 'woocommerce-all-products-for-subscriptions' ); ?></div>
			<div class="options_group additional_scheme_options">
			<?php

				// Subscription Status.
				woocommerce_wp_checkbox(
					array(
						'id'          => '_wcsatt_allow_one_off',
						'label'       => __( 'One-time purchase', 'woocommerce-all-products-for-subscriptions' ),
						'value'       => 'yes' === $product_object->get_meta( '_wcsatt_force_subscription', true ) ? 'no' : 'yes',
						'desc_tip'    => true,
						'description' => __( 'Disable this option if you want to prevent one-time purchases of this product.', 'woocommerce-all-products-for-subscriptions' ),
					)
				);

																// Subscription Prompt.
																woocommerce_wp_textarea_input(
																	array(
																		'id'          => '_wcsatt_subscription_prompt',
																		'label'       => __( 'Prompt text', 'woocommerce-all-products-for-subscriptions' ),
																		'description' => __( 'Optional text/html to display above the available purchase plan options. Supports html and shortcodes.', 'woocommerce-all-products-for-subscriptions' ),
																		'placeholder' => __( 'e.g. "Choose a purchase plan:"', 'woocommerce-all-products-for-subscriptions' ),
																		'desc_tip'    => true,
																	)
																);

																$has_layout_meta = $product_object->meta_exists( '_wcsatt_layout' );

																// Backwards compatibility: Display layout option if meta exists already.
			if ( $has_layout_meta ) {

				// Plans layout.
				$current_layout = $product_object->get_meta( '_wcsatt_layout', true );
				$current_layout = in_array( $current_layout, array( 'flat', 'grouped' ) ) ? $current_layout : 'flat';

				// Available layouts.
				$layouts = array(
					'flat'    => array(
						'title'       => __( 'Flat', 'woocommerce-all-products-for-subscriptions' ),
						'description' => __( 'Renders all plan options as radio buttons.', 'woocommerce-all-products-for-subscriptions' ),
						'value'       => 'flat',
						'class'       => 'flat',
						'checked'     => 'flat' === $current_layout,
					),
					'grouped' => array(
						'title'       => __( 'Grouped', 'woocommerce-all-products-for-subscriptions' ),
						'description' => __( 'Renders a pair of radio buttons to prompt users to subscribe, or make a one-time purchase. Groups the available plan options in a drop-down menu.', 'woocommerce-all-products-for-subscriptions' ),
						'value'       => 'grouped',
						'class'       => 'grouped',
						'checked'     => 'grouped' === $current_layout,
					),
				);

				?>
					<div class="wcsatt_default_layout form-field _wcsatt_layout_field">
						<label for="_wcsatt_layout"><?php esc_html_e( 'Options layout', 'woocommerce-all-products-for-subscriptions' ); ?></label>
						<ul class="wcsatt_image_select__container">
																	<?php
																	foreach ( $layouts as $layout ) {
																		$classes = array( $layout['class'] );
																		if ( ! empty( $layout['checked'] ) ) {
																			$classes[] = 'selected';
																		}
																		?>
							<li class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" >
								<input type="radio"<?php echo $layout['checked'] ? ' checked' : ''; ?> name="_wcsatt_layout" id="_wcsatt_layout" value="<?php echo esc_attr( $layout['value'] ); ?>">
																														<?php echo wc_help_tip( '<strong>' . $layout['title'] . '</strong> &ndash; ' . $layout['description'] ); ?>
							</li>
																			<?php } ?>
						</ul>

					</div>
					<?php
			}

			?>
				<div class="wp-clearfix"></div>
			</div>
		</div>
		<?php
	}


	/**
	 * Subscription scheme markup adeed on the 'wcsatt_subscription_scheme' action.
	 *
	 * @param  int   $index
	 * @param  array $scheme_data
	 * @param  int   $post_id
	 * @return void
	 */
	public static function subscription_scheme( $index, $scheme_data, $post_id ) {
		include WCS_ATT_ABSPATH . 'includes/admin/meta-boxes/views/subscription-scheme.php';
	}

	/**
	 * Subscription scheme options displayed on the 'wcsatt_subscription_scheme_content' action.
	 *
	 * @param  int   $index
	 * @param  array $scheme_data
	 * @param  int   $post_id
	 * @return void
	 */
	public static function subscription_scheme_content( $index, $scheme_data, $post_id ) {

		global $thepostid;

		if ( empty( $thepostid ) ) {
			$thepostid = '-1';
		}

		if ( ! empty( $scheme_data ) ) {
			$subscription_period          = $scheme_data['subscription_period'];
			$subscription_period_interval = $scheme_data['subscription_period_interval'];
			$subscription_length          = $scheme_data['subscription_length'];
		} else {
			$subscription_period          = 'month';
			$subscription_period_interval = '';
			$subscription_length          = '';
		}

		// Subscription Price, Interval and Period.
		?>
		<div class="satt_subscription_details">
			<p class="form-field _satt_subscription_details_<?php echo absint( $index ); ?>">
				<label for="_satt_subscription_details_<?php echo absint( $index ); ?>"><?php esc_html_e( 'Interval', 'woocommerce-all-products-for-subscriptions' ); ?></label>
				<span class="wrap">
					<label for="_satt_subscription_period_interval_<?php echo absint( $index ); ?>" class="wcs_hidden_label"><?php esc_html_e( 'Subscription interval', 'woocommerce-subscriptions' ); ?></label>
					<select id="_satt_subscription_period_interval_<?php echo absint( $index ); ?>" name="wcsatt_schemes[<?php echo absint( $index ); ?>][subscription_period_interval]" class="wc_input_subscription_period_interval">
					<?php foreach ( wcs_get_subscription_period_interval_strings() as $value => $label ) { ?>
						<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $subscription_period_interval, true ); ?>><?php echo esc_html( $label ); ?></option>
					<?php } ?>
					</select>
					<label for="_satt_subscription_period_<?php echo absint( $index ); ?>" class="wcs_hidden_label"><?php esc_html_e( 'Subscription period', 'woocommerce-subscriptions' ); ?></label>
					<select id="_satt_subscription_period_<?php echo absint( $index ); ?>" name="wcsatt_schemes[<?php echo absint( $index ); ?>][subscription_period]" class="wc_input_subscription_period last" >
					<?php foreach ( wcs_get_subscription_period_strings() as $value => $label ) { ?>
						<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $subscription_period, true ); ?>><?php echo esc_html( $label ); ?></option>
					<?php } ?>
					</select>
				</span>
				<?php echo wc_help_tip( __( 'Choose the subscription billing interval and period.', 'woocommerce-all-products-for-subscriptions' ) ); ?>
			</p>
		</div>
		<div class="satt_subscription_length">
		<?php

			// Subscription Length.
			woocommerce_wp_select(
				array(
					'id'          => '_satt_subscription_length_' . $index,
					'class'       => 'wc_input_subscription_length short',
					'label'       => __( 'Length', 'woocommerce-all-products-for-subscriptions' ),
					'value'       => $subscription_length,
					'options'     => wcs_get_subscription_ranges( $subscription_period ),
					'name'        => 'wcsatt_schemes[' . $index . '][subscription_length]',
					'description' => __( 'Choose the subscription billing length.', 'woocommerce-all-products-for-subscriptions' ),
					'desc_tip'    => true,
				)
			);

		?>
		</div>
		<?php
	}

	/**
	 * Show product-specific subscription scheme options on the 'wcsatt_subscription_scheme_content' action.
	 *
	 * @param  int   $index
	 * @param  array $scheme_data
	 * @param  int   $post_id
	 * @return void
	 */
	public static function subscription_scheme_product_content_display( $index, $scheme_data, $post_id ) {

		if ( $post_id > 0 ) {
			?>
			<div class="subscription_scheme_product_data">
			<?php
				do_action( 'wcsatt_subscription_scheme_product_content', $index, $scheme_data, $post_id );
			?>
			</div>
			<?php
		} else {
			?>
			<div class="subscription_scheme_global_data">
			<?php
				do_action( 'wcsatt_subscription_scheme_global_content', $index, $scheme_data );
			?>
			</div>
			<?php
		}
	}

	/**
	 * Product-specific subscription scheme options.
	 *
	 * @param  int   $index
	 * @param  array $scheme_data
	 * @param  int   $post_id
	 * @return void
	 */
	public static function subscription_scheme_product_content( $index, $scheme_data, $post_id ) {

		$subscription_pricing_method = '';
		$subscription_regular_price  = '';
		$subscription_sale_price     = '';
		$subscription_discount       = '';

		if ( ! empty( $scheme_data ) ) {
			$subscription_pricing_method = ! empty( $scheme_data['subscription_pricing_method'] ) ? $scheme_data['subscription_pricing_method'] : 'inherit';
			$subscription_regular_price  = isset( $scheme_data['subscription_regular_price'] ) ? $scheme_data['subscription_regular_price'] : '';
			$subscription_sale_price     = isset( $scheme_data['subscription_sale_price'] ) ? $scheme_data['subscription_sale_price'] : '';
			$subscription_discount       = isset( $scheme_data['subscription_discount'] ) && (float) $scheme_data['subscription_discount'] > 0 ? wc_format_localized_decimal( $scheme_data['subscription_discount'] ) : '';
		}

		// Subscription Price Override Method.
		woocommerce_wp_select(
			array(
				'id'            => '_subscription_pricing_method_input',
				'class'         => 'subscription_pricing_method_input short',
				'wrapper_class' => 'subscription_pricing_method_select',
				'label'         => __( 'Price', 'woocommerce-all-products-for-subscriptions' ),
				'value'         => $subscription_pricing_method,
				'options'       => array(
					'inherit'  => __( 'Inherit from product', 'woocommerce-all-products-for-subscriptions' ),
					'override' => __( 'Override product', 'woocommerce-all-products-for-subscriptions' ),
				),
				'name'          => 'wcsatt_schemes[' . $index . '][subscription_pricing_method]',
			)
		);

		?>
		<div class="subscription_pricing_method subscription_pricing_method_override">
		<?php

			// Price.
			woocommerce_wp_text_input(
				array(
					'id'            => '_override_subscription_regular_price',
					'name'          => 'wcsatt_schemes[' . $index . '][subscription_regular_price]',
					'value'         => $subscription_regular_price,
					'wrapper_class' => 'override_subscription_regular_price',
					'label'         => __( 'Regular Price', 'woocommerce' ) . ' (' . get_woocommerce_currency_symbol() . ')',
					'data_type'     => 'price',
				)
			);

			// Sale Price.
			woocommerce_wp_text_input(
				array(
					'id'            => '_override_subscription_sale_price',
					'name'          => 'wcsatt_schemes[' . $index . '][subscription_sale_price]',
					'value'         => $subscription_sale_price,
					'wrapper_class' => 'override_subscription_sale_price',
					'label'         => __( 'Sale Price', 'woocommerce' ) . ' (' . get_woocommerce_currency_symbol() . ')',
					'data_type'     => 'price',
				)
			);

		?>
		</div>
		<div class="subscription_pricing_method subscription_pricing_method_inherit">
		<?php

			// Discount.
			woocommerce_wp_text_input(
				array(
					'id'            => '_subscription_price_discount',
					'name'          => 'wcsatt_schemes[' . $index . '][subscription_discount]',
					'value'         => $subscription_discount,
					'wrapper_class' => 'subscription_price_discount',
					'label'         => __( 'Discount %', 'woocommerce-all-products-for-subscriptions' ),
					'description'   => __( 'Discount applied on the <strong>Regular Price</strong> of the product.', 'woocommerce-all-products-for-subscriptions' ),
					'desc_tip'      => true,
					'data_type'     => 'decimal',
				)
			);

		?>
		</div>
		<?php
	}

	/**
	 * Cart subscription scheme options.
	 *
	 * @since  2.2.0
	 *
	 * @param  int   $index
	 * @param  array $scheme_data
	 * @return void
	 */
	public static function subscription_scheme_global_content( $index, $scheme_data ) {

		$subscription_discount = ! empty( $scheme_data ) && isset( $scheme_data['subscription_discount'] ) ? $scheme_data['subscription_discount'] : '';

		?>
		<div class="subscription_pricing_method subscription_pricing_method_inherit">
		<?php

			// Discount.
			woocommerce_wp_text_input(
				array(
					'id'            => '_subscription_price_discount',
					'name'          => 'wcsatt_schemes[' . $index . '][subscription_discount]',
					'value'         => $subscription_discount,
					'wrapper_class' => 'subscription_price_discount',
					'label'         => __( 'Discount %', 'woocommerce-all-products-for-subscriptions' ),
					'description'   => __( 'Discount applied on the <strong>Regular Price</strong> of the product.', 'woocommerce-all-products-for-subscriptions' ),
					'desc_tip'      => true,
					'data_type'     => 'decimal',
				)
			);

		?>
		</div>
		<?php
	}

	/**
	 * Save subscription options.
	 *
	 * @param  WC_Product $product
	 * @return void
	 */
	public static function save_subscription_data( $product ) {

		if ( WCS_ATT_Product::supports_feature( $product, 'subscription_schemes' ) ) {

			$global_schemes_status = isset( $_POST['_wcsatt_schemes_status'] ) ? wc_clean( wp_unslash( $_POST['_wcsatt_schemes_status'] ) ) : 'inherit';
			$schemes               = array();

			// Process scheme options.
			if ( 'override' === $global_schemes_status ) {

				if ( isset( $_POST['wcsatt_schemes'] ) ) {

					$posted_schemes = stripslashes_deep( wc_clean( $_POST['wcsatt_schemes'] ) );

					$has_duplicated_schemes = false;
					foreach ( $posted_schemes as $posted_scheme ) {

						// Format subscription prices.
						if ( isset( $posted_scheme['subscription_regular_price'] ) ) {
							$posted_scheme['subscription_regular_price'] = ( $posted_scheme['subscription_regular_price'] === '' ) ? '' : wc_format_decimal( $posted_scheme['subscription_regular_price'] );
						}

						if ( isset( $posted_scheme['subscription_sale_price'] ) ) {
							$posted_scheme['subscription_sale_price'] = ( $posted_scheme['subscription_sale_price'] === '' ) ? '' : wc_format_decimal( $posted_scheme['subscription_sale_price'] );
						}

						if ( '' !== $posted_scheme['subscription_sale_price'] ) {
							$posted_scheme['subscription_price'] = $posted_scheme['subscription_sale_price'];
						} else {
							$posted_scheme['subscription_price'] = ( $posted_scheme['subscription_regular_price'] === '' ) ? '' : $posted_scheme['subscription_regular_price'];
						}

						// Save discount data. 0% discounts are skipped.
						if ( isset( $posted_scheme['subscription_discount'] ) && ! empty( $posted_scheme['subscription_discount'] ) ) {

							// wc_format_decimal returns an empty string if a string input is given.
							// Cast result to float to check that the discount value is between 0-100.
							// Casting empty strings to float returns 0.
							$discount = (float) wc_format_decimal( $posted_scheme['subscription_discount'] );

							// Throw error if discount is not within the 0-100 range or if a string was passed to wc_format_decimal.
							if ( empty( $discount ) || $discount < 0 || $discount > 100 ) {
								WC_Admin_Meta_Boxes::add_error( __( 'Please enter positive subscription discount values, between 0-100.', 'woocommerce-all-products-for-subscriptions' ) );
								$posted_scheme['subscription_discount'] = '';
							} else {
								$posted_scheme['subscription_discount'] = $discount;
							}
						} else {
							$posted_scheme['subscription_discount'] = '';
						}

						// Validate price override method.
						if ( isset( $posted_scheme['subscription_pricing_method'] ) && $posted_scheme['subscription_pricing_method'] === 'override' ) {
							if ( $posted_scheme['subscription_price'] === '' && $posted_scheme['subscription_regular_price'] === '' ) {
								$posted_scheme['subscription_pricing_method'] = 'inherit';
							}
						} else {
							$posted_scheme['subscription_pricing_method'] = 'inherit';
						}

						/**
						 * Allow third parties to add custom data to schemes.
						 *
						 * @since  2.1.0
						 *
						 * @param  array       $posted_scheme
						 * @param  WC_Product  $product
						 */
						$posted_scheme = apply_filters( 'wcsatt_processed_scheme_data', $posted_scheme, $product );

						// Don't store multiple schemes with the same billing schedule.
						$scheme_key = $posted_scheme['subscription_period_interval'] . '_' . $posted_scheme['subscription_period'] . '_' . $posted_scheme['subscription_length'];

						if ( isset( $schemes[ $scheme_key ] ) ) {
							$has_duplicated_schemes = true;
							continue;
						}

						$schemes[ $scheme_key ] = $posted_scheme;
					}

					if ( $has_duplicated_schemes ) {
						WCS_ATT_Admin_Notices::add_notice( __( 'Some subscription plans were not saved since there were duplicated intervals and lengths. Please check the Subscription Plans list.', 'woocommerce-all-products-for-subscriptions' ), 'error', true );
					}

					if ( WCS_ATT_Admin_Notices::is_maintenance_notice_visible( 'welcome' ) ) {

						// Clear onboarding "welcome" notice.
						WCS_ATT_Admin_Notices::remove_maintenance_notice( 'welcome' );

						if ( ! empty( $schemes ) ) {
							// Let user know about global plans (once!).
							WCS_ATT_Admin_Notices::add_global_plans_onboarding_notice();
						}
					}
				}

				if ( empty( $schemes ) ) {
					$global_schemes_status = 'disable';
					WC_Admin_Meta_Boxes::add_error( __( 'To make this product available on subscription, you must add at least one custom subscription plan when overriding the global plan settings. You did not add any plans, or a server error prevented them from being saved. This product is now available for one-time purchase only.', 'woocommerce-all-products-for-subscriptions' ) );
				}
			}

			if ( 'disable' === $global_schemes_status ) {
				$schemes = array();
				$product->update_meta_data( '_wcsatt_disabled', 'yes' );
			} else {
				$product->delete_meta_data( '_wcsatt_disabled' );
			}

			// Process one-time shipping option.
			$one_time_shipping = isset( $_POST['_subscription_one_time_shipping'] ) ? 'yes' : 'no';

			// Process force-sub status.
			$force_subscription = ! empty( $schemes ) && ! isset( $_POST['_wcsatt_allow_one_off'] ) ? 'yes' : 'no';

			// Process prompt text.
			$prompt = ! empty( $schemes ) && ! empty( $_POST['_wcsatt_subscription_prompt'] ) ? wp_kses_post( wp_unslash( $_POST['_wcsatt_subscription_prompt'] ) ) : false;

			// Process layout.
			$layout = isset( $_POST['_wcsatt_layout'] ) ? wc_clean( wp_unslash( $_POST['_wcsatt_layout'] ) ) : false;

			/*
			 * Add/update meta.
			 */

			// Save scheme options.
			if ( ! empty( $schemes ) ) {

				$product->update_meta_data( '_wcsatt_schemes', array_values( $schemes ) );

				// Set regular price to zero should the shop owner forget.
				if ( 'yes' === $force_subscription && empty( $_POST['_regular_price'] ) ) {
					$product->set_regular_price( 0 );
					$product->set_price( 0 );
				}
			} else {
				$product->delete_meta_data( '_wcsatt_schemes' );
			}

			// Save one-time shipping option.
			$product->update_meta_data( '_subscription_one_time_shipping', $one_time_shipping );

			// Save force-sub status.
			$product->update_meta_data( '_wcsatt_force_subscription', $force_subscription );

			// Save layout.
			if ( $layout ) {
				$product->update_meta_data( '_wcsatt_layout', $layout );
			}

			// Save prompt.
			if ( false === $prompt ) {
				$product->delete_meta_data( '_wcsatt_subscription_prompt' );
			} else {
				$product->update_meta_data( '_wcsatt_subscription_prompt', $prompt );
			}
		} else {

			$product->delete_meta_data( '_wcsatt_schemes' );
			$product->delete_meta_data( '_wcsatt_force_subscription' );
			$product->delete_meta_data( '_wcsatt_default_status' );
			$product->delete_meta_data( '_wcsatt_subscription_prompt' );
			$product->delete_meta_data( '_wcsatt_layout' );
		}
	}
}

WCS_ATT_Meta_Box_Product_Data::init();
