<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$methods           = get_posts( array( 'posts_per_page' => '-1', 'post_type' => 'was', 'post_status' => array( 'draft', 'publish', 'future' ), 'orderby' => 'menu_order date', 'order' => 'ASC' ) );
$wc_status_options = wp_parse_args( get_option( 'woocommerce_status_options', array() ), array( 'shipping_debug_mode' => 0 ) );

?><tr valign="top">
	<th scope="row" class="titledesc"><?php
		_e( 'Shipping rates', 'woocommerce-advanced-shipping' ); ?>:<br />
	</th>
	<td class="forminp" id="<?php echo esc_attr( $this->id ); ?>_shipping_methods">

		<table class='wpc-conditions-post-table wpc-sortable-post-table widefat'>

			<thead>
				<tr>
					<th style='width: 17px;' class="column-sort column-cb check-column"></th>
					<th style='padding-left: 0;' class="column-primary"><?php _e( 'Title', 'woocommerce-advanced-shipping' ); ?></th>
					<th style='padding-left: 10px;' class="column-title"><?php _e( 'Shipping title', 'woocommerce-advanced-shipping' ); ?></th>
					<th style='padding-left: 10px; width: 100px;' class="column-cost"><?php _e( 'Shipping cost', 'woocommerce-advanced-shipping' ); ?></th>
					<th style='width: 70px;' class="column-conditions"><?php _e( '# Groups', 'woocommerce-advanced-shipping' ); ?></th>
				</tr>
			</thead>
			<tbody><?php

				$i = 0;
				foreach ( $methods as $method ) :

					$method_details = get_post_meta( $method->ID, '_was_shipping_method', true );
					$conditions     = get_post_meta( $method->ID, '_was_shipping_method_conditions', true );

					$alt = ( $i++ ) % 2 == 0 ? 'alternate' : '';
					?><tr class='<?php echo $alt; ?>'>

						<th class='sort check-column' width="1%">
							<input type='hidden' name='sort[]' value='<?php echo absint( $method->ID ); ?>' />
						</th>
						<td class="column-primary">
							<strong>
								<a href='<?php echo get_edit_post_link( $method->ID ); ?>' class='row-title' title='<?php _e( 'Edit Method', 'woocommerce-advanced-shipping' ); ?>'><?php
									if ( $wc_status_options['shipping_debug_mode'] ) {
										echo '<small>#' . absint( $method->ID ) . '</small> - ';
									}
									echo _draft_or_post_title( $method->ID );
								?></a><?php
								_post_states( $method );
							?></strong>
							<div class='row-actions'>
								<span class='edit'>
									<a href='<?php echo get_edit_post_link( $method->ID ); ?>' title='<?php _e( 'Edit Method', 'woocommerce-advanced-shipping' ); ?>'>
										<?php _e( 'Edit', 'woocommerce-advanced-shipping' ); ?>
									</a>
									|
								</span>
								<span class='trash'>
									<a href='<?php echo get_delete_post_link( $method->ID ); ?>' title='<?php _e( 'Delete Method', 'woocommerce-advanced-shipping' ); ?>'>
										<?php _e( 'Delete', 'woocommerce-advanced-shipping' ); ?>
									</a>
								</span>
							</div>
						</td>
						<td class="column-title" data-colname="<?php _e( 'Shipping', 'woocommerce-advanced-shipping' ); ?>"><?php
							if ( empty( $method_details['shipping_title'] ) ) :
								_e( 'Shipping', 'woocommerce-advanced-shipping' );
							else :
								echo wp_kses_post( $method_details['shipping_title'] );
							endif;
						?></td>
						<td class="column-cost" data-colname="<?php _e( 'Shipping cost', 'woocommerce-advanced-shipping' ); ?>"><?php
							$amount = str_replace( ',', '.', $method_details['shipping_cost'] );
							echo isset( $method_details['shipping_cost'] ) ? wp_kses_post( wc_price( $amount ) ) : '';
						?></td>
						<td  class="column-conditions" data-colname="<?php _e( 'Condition groups', 'woocommerce-advanced-shipping' ); ?>"><?php
							echo count( (array) $conditions );
						?></td>

					</tr><?php

				endforeach;

				if ( empty( $method ) ) :
					?><tr>
						<td colspan='5' style="display: table-cell;"><?php _e( 'There are no Advanced Shipping rates. Yet...', 'woocommerce-advanced-shipping' ); ?></td>
					</tr><?php
				endif;

			?></tbody>
			<tfoot>
				<tr>
					<th colspan='5' style='padding-left: 10px; display: table-cell;'>
						<a href='<?php echo admin_url( 'post-new.php?post_type=was' ); ?>' class='add button'><?php _e( 'Add Shipping Rate', 'woocommerce-advanced-shipping' ); ?></a>
					</th>
				</tr>
			</tfoot>
		</table>
	</td>
</tr>
