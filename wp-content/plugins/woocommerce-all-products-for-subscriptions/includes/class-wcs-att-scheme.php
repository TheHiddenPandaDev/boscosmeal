<?php
/**
 * WCS_ATT_Scheme class
 *
 * @package  WooCommerce All Products for Subscriptions
 * @since    2.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Subscription scheme object. May extend the WC_Data class or handle CRUD in the future, if schemes are moved out of meta.
 *
 * @class    WCS_ATT_Scheme
 * @version  4.0.2
 */
class WCS_ATT_Scheme implements ArrayAccess {

	/**
	 * Scheme data.
	 *
	 * @var array
	 */
	private $data = array();

	/**
	 * Scheme key - a string representation of the scheme details.
	 *
	 * @var array
	 */
	private $key = '';

	/**
	 * Maps meta array key names to object data keys for back-compat.
	 *
	 * @var array
	 */
	private $offset_map = array(
		'subscription_period'            => 'period',
		'subscription_period_interval'   => 'interval',
		'subscription_length'            => 'length',
		'subscription_payment_sync_date' => 'sync_date',
		'subscription_trial_period'      => 'trial_period',
		'subscription_trial_length'      => 'trial_length',
		'subscription_pricing_method'    => 'pricing_mode',
		'subscription_discount'          => 'discount',
		'subscription_regular_price'     => 'regular_price',
		'subscription_sale_price'        => 'sale_price',
		'subscription_price'             => 'price',
	);

	/**
	 * Constructor. Currently only initializes the object from raw data.
	 * Later, it could initialize using other source data, such as a DB ID.
	 *
	 * @param  array $args
	 */
	public function __construct( $args ) {

		if ( isset( $args['data'] ) ) {

			$this->data['period']   = isset( $args['data']['subscription_period'] ) ? strval( $args['data']['subscription_period'] ) : '';
			$this->data['interval'] = isset( $args['data']['subscription_period_interval'] ) ? absint( $args['data']['subscription_period_interval'] ) : '';
			$this->data['length']   = isset( $args['data']['subscription_length'] ) ? absint( $args['data']['subscription_length'] ) : '';

			$this->data['trial_period'] = isset( $args['data']['subscription_trial_period'] ) ? strval( $args['data']['subscription_trial_period'] ) : '';
			$this->data['trial_length'] = isset( $args['data']['subscription_trial_length'] ) ? absint( $args['data']['subscription_trial_length'] ) : '';

			$this->data['pricing_mode'] = isset( $args['data']['subscription_pricing_method'] ) && in_array( $args['data']['subscription_pricing_method'], array( 'inherit', 'override' ) ) ? strval( $args['data']['subscription_pricing_method'] ) : 'inherit';

			if ( 'override' === $this->data['pricing_mode'] ) {

				$this->data['regular_price'] = isset( $args['data']['subscription_regular_price'] ) ? wc_format_decimal( $args['data']['subscription_regular_price'] ) : '';
				$this->data['sale_price']    = isset( $args['data']['subscription_sale_price'] ) ? wc_format_decimal( $args['data']['subscription_sale_price'] ) : '';
				$this->data['price']         = '' !== $this->data['sale_price'] && $this->data['sale_price'] < $this->data['regular_price'] ? $this->data['sale_price'] : $this->data['regular_price'];

				if ( '' === $this->data['price'] && '' === $this->data['regular_price'] ) {
					$this->data['pricing_mode'] = 'inherit';
				}
			}

			if ( 'inherit' === $this->data['pricing_mode'] ) {
				$this->data['discount'] = isset( $args['data']['subscription_discount'] ) ? wc_format_decimal( $args['data']['subscription_discount'] ) : '';
			}

			$this->data['sync_date'] = 0;

			if ( isset( $args['data']['subscription_payment_sync_date'] ) ) {

				if ( is_array( $args['data']['subscription_payment_sync_date'] ) ) {

					if ( ! empty( $args['data']['subscription_payment_sync_date']['day'] ) && ! empty( $args['data']['subscription_payment_sync_date']['month'] ) ) {

						$this->data['sync_date'] = array(
							'day'   => $args['data']['subscription_payment_sync_date']['day'],
							'month' => $args['data']['subscription_payment_sync_date']['month'],
						);
					}
				} else {
					$this->data['sync_date'] = absint( $args['data']['subscription_payment_sync_date'] );
				}
			}
		}

		$this->data['context'] = isset( $args['context'] ) ? strval( $args['context'] ) : 'product';

		$this->key = implode( '_', array_filter( array( $this->data['interval'], $this->data['period'], $this->data['length'] ) ) );

		$this->data['key'] = $this->data['id'] = $this->key;

		$this->update_sync_status();
	}

	/**
	 * Updates the 'is_synced' prop.
	 *
	 * @return void
	 */
	protected function update_sync_status() {

		$this->data['is_synced'] = false;

		if ( 'day' !== $this->data['period'] && WC_Subscriptions_Synchroniser::is_syncing_enabled() ) {
			$this->data['is_synced'] = ( ! is_array( $this->data['sync_date'] ) && $this->data['sync_date'] > 0 ) || ( isset( $this->data['sync_date']['day'] ) && $this->data['sync_date']['day'] > 0 );
		}
	}

	/**
	 * Returns a string representation of the scheme details.
	 *
	 * @return string  A string representation of the entire scheme.
	 */
	public function get_key() {
		return $this->key;
	}

	/**
	 * Returns the raw scheme data array.
	 *
	 * @return array
	 */
	public function get_data() {
		return $this->data;
	}

	/**
	 * Returns a md5 hash of the scheme's data array.
	 *
	 * @since  2.1.1
	 *
	 * @return array
	 */
	public function get_hash() {
		return md5( json_encode( $this->data ) );
	}

	/**
	 * Gets the scheme context. Expected values: 'product', 'cart'.
	 *
	 * @return string
	 */
	public function get_context() {
		return $this->data['context'];
	}

	/**
	 * Returns the period of the subscription scheme.
	 *
	 * @return string  A string representation of the period, either Day, Week, Month or Year.
	 */
	public function get_period() {
		return $this->data['period'];
	}

	/**
	 * Returns the interval of the subscription scheme.
	 *
	 * @return int  Interval of subscription scheme, or an empty string if the product has not been associated with a subscription scheme.
	 */
	public function get_interval() {
		return $this->data['interval'];
	}

	/**
	 * Returns the length of the subscription scheme.
	 *
	 * @return int  An integer representing the length of the subscription scheme.
	 */
	public function get_length() {
		return $this->data['length'];
	}

	/**
	 * Returns the trial period of the subscription scheme.
	 *
	 * @return string  A string representation of the trial period, either Day, Week, Month or Year.
	 */
	public function get_trial_period() {
		return $this->data['trial_period'];
	}

	/**
	 * Returns the trial length of the subscription scheme.
	 *
	 * @return int  An integer representing the trial length of the subscription scheme.
	 */
	public function get_trial_length() {
		return $this->data['trial_length'];
	}

	/**
	 * Returns the sync day (integer) or sync month/day (array) of this scheme.
	 *
	 * @since  2.1.0
	 *
	 * @return mixed
	 */
	public function get_sync_date() {
		return $this->data['sync_date'];
	}

	/**
	 * Whether the first payment is processed at the time of sign-up but prorated to the sync day.
	 *
	 * @since  2.1.0
	 */
	public function is_prorated() {
		return $this->data['is_prorated'];
	}

	/**
	 * Whether the first payment needs to be processed on a specific day (instead of at the time of sign-up).
	 *
	 * @since  2.1.0
	 */
	public function is_synced() {
		return $this->data['is_synced'];
	}

	/**
	 * Returns the pricing mode of the scheme - 'inherit' or 'override'.
	 * Indicates how the subscription scheme modifies the price of a product when active.
	 *
	 * @return string  String with values 'inherit' or 'override'.
	 */
	public function get_pricing_mode() {
		return $this->data['pricing_mode'];
	}

	/**
	 * Returns the price discount applied by the scheme when its pricing mode is 'inherit'.
	 *
	 * @return mixed
	 */
	public function get_discount() {
		$discount = false;

		if ( 'inherit' === $this->get_pricing_mode() ) {
			$discount = ! empty( $this->data['discount'] ) ? (float) $this->data['discount'] : false;
		}

		return $discount;
	}

	/**
	 * Returns the overridden regular price applied by the scheme when its pricing mode is 'override'.
	 *
	 * @return mixed
	 */
	public function get_regular_price() {
		return 'override' === $this->get_pricing_mode() ? $this->data['regular_price'] : null;
	}

	/**
	 * Returns the overridden sale price applied by the scheme when its pricing mode is 'override'.
	 *
	 * @return mixed
	 */
	public function get_sale_price() {
		return 'override' === $this->get_pricing_mode() ? $this->data['sale_price'] : null;
	}

	/**
	 * Returns modified prices based on subscription scheme settings.
	 *
	 * @param  array $raw_prices
	 * @return string
	 */
	public function get_prices( $raw_prices ) {

		$prices = $raw_prices;

		if ( 'override' === $this->get_pricing_mode() ) {

			$prices['regular_price'] = $this->get_regular_price();
			$prices['sale_price']    = $this->get_sale_price();

			if ( '' !== $prices['sale_price'] && $prices['sale_price'] < $prices['regular_price'] ) {
				$prices['price'] = $prices['sale_price'];
			} else {
				$prices['price'] = $prices['regular_price'];
			}

			if ( ! empty( $raw_prices['offset_price'] ) ) {
				$prices['price']         = '' !== $prices['price'] ? $prices['price'] + $raw_prices['offset_price'] : $prices['price'];
				$prices['regular_price'] = '' !== $prices['regular_price'] ? $prices['regular_price'] + $raw_prices['offset_price'] : $prices['regular_price'];
				$prices['sale_price']    = '' !== $prices['sale_price'] ? $prices['sale_price'] + $raw_prices['offset_price'] : $prices['sale_price'];
			}
		} elseif ( 'inherit' === $this->get_pricing_mode() && $this->get_discount() > 0 ) {

			$populate_prices = true;

			if ( '' === $prices['regular_price'] && '' === $prices['price'] ) {
				$populate_prices = false;
			}

			if ( $populate_prices ) {

				if ( '' === $prices['regular_price'] ) {
					$prices['regular_price'] = $prices['price'];
				} elseif ( '' === $prices['price'] ) {
					$prices['price'] = $prices['regular_price'];
				}

				$prices['price'] = $this->get_discounted_price( $prices );

				if ( $prices['price'] < $prices['regular_price'] ) {
					$prices['sale_price'] = $prices['price'];
				}
			}
		}

		return apply_filters( 'wcsatt_subscription_scheme_prices', $prices, $this );
	}

	/**
	 * Get price after discount.
	 *
	 * @param  array  $raw_prices
	 * @param  string $discount
	 * @return mixed
	 */
	protected function get_discounted_price( $raw_prices ) {

		$price = $raw_prices['price'];

		if ( $price === '' ) {
			return $price;
		}

		if ( $discount = $this->get_discount() ) {

			if ( apply_filters( 'wcsatt_discount_from_regular', false ) ) {
				$regular_price = empty( $raw_prices['regular_price'] ) ? $raw_prices['price'] : $raw_prices['regular_price'];
			} else {
				$regular_price = $price;
			}

			$offset_price = ! empty( $raw_prices['offset_price'] ) ? $raw_prices['offset_price'] : false;

			if ( $offset_price ) {
				$regular_price = $regular_price - $offset_price;
			}

			$price = empty( $regular_price ) ? $regular_price : round( (float) $regular_price * ( 100 - $discount ) / 100, wc_get_price_decimals() );

			if ( $offset_price ) {
				$price = $price + $offset_price;
			}
		}

		return $price;
	}

	/*
	|--------------------------------------------------------------------------
	| Conditionals.
	|--------------------------------------------------------------------------
	*/

	/**
	 * Indicates whether the scheme modifies the price of the product it's attached onto when active.
	 *
	 * @return boolean
	 */
	public function has_price_filter() {
		return 'override' === $this->get_pricing_mode() || ( 'inherit' === $this->get_pricing_mode() && $this->get_discount() > 0 );
	}

	/**
	 * Indicates whether the billing details of a subscription match the billing details of this scheme.
	 *
	 * @since  2.1.0
	 *
	 * @param  WC_Subscription $subscription
	 * @param  array           $args
	 * @return boolean
	 */
	public function matches_subscription( $subscription, $args = array() ) {

		$period   = $subscription->get_billing_period();
		$interval = $subscription->get_billing_interval();

		// Period and interval must match.
		if ( $period !== $this->get_period() || absint( $interval ) !== $this->get_interval() ) {
			return false;
		}

		$default = array(
			'next_payment'      => true,
			'upcoming_renewals' => true,
			'payment_date'      => true,
		);

		$match = wp_parse_args( $args, $default );

		// The subscription must have an upcoming renewal.
		if ( $match['next_payment'] && ! $subscription->get_time( 'next_payment', '' ) ) {
			return false;
		}

		// The scheme length must match the remaining subscription renewals.
		if ( $match['upcoming_renewals'] && $this->get_length() ) {

			$subscription_next_payment = $subscription->get_time( 'next_payment', '' );
			$subscription_end          = $subscription->get_time( 'end', '' );

			// If the scheme has a length but the subscription is endless, dump it.
			if ( ! $subscription_end ) {
				return false;
			}

			$subscription_periods_left = wcs_estimate_periods_between( $subscription_next_payment, $subscription_end, $this->get_period() );

			if ( $subscription_periods_left !== $this->get_length() ) {
				return false;
			}
		}

		// If the scheme is synced, its payment day must match the next subscription renewal payment day.
		if ( $match['payment_date'] && $this->is_synced() ) {

			$scheme_sync_day           = $this->get_sync_date();
			$subscription_next_payment = $subscription->get_time( 'next_payment', '' );

			if ( 'week' === $period && $scheme_sync_day !== intval( gmdate( 'N', $subscription_next_payment ) ) ) {
				return false;
			}

			if ( 'month' === $period && $scheme_sync_day !== intval( gmdate( 'j', $subscription_next_payment ) ) ) {
				return false;
			}

			if ( 'year' === $period && ( $scheme_sync_day['day'] !== gmdate( 'd', $subscription_next_payment ) || $scheme_sync_day['month'] !== gmdate( 'm', $subscription_next_payment ) ) ) {
				return false;
			}
		}

		return true;
	}

	/*
	|--------------------------------------------------------------------------
	| Setters.
	|--------------------------------------------------------------------------
	*/

	/**
	 * Sets the scheme context. Expected values: 'product', 'cart'.
	 *
	 * @param  string $value
	 */
	public function set_context( $value ) {
		$this->data['context'] = strval( $value );
	}

	/**
	 * Sets the period of the subscription scheme. Does not validate input.
	 *
	 * @param  string $value
	 */
	public function set_period( $value ) {
		$this->data['period'] = strval( $value );
	}

	/**
	 * Sets the interval of the subscription scheme.
	 *
	 * @param  int $value
	 */
	public function set_interval( $value ) {
		$this->data['interval'] = absint( $value );
	}

	/**
	 * Sets the length of the subscription scheme.
	 *
	 * @param  int $value
	 */
	public function set_length( $value ) {
		$this->data['length'] = absint( $value );
	}

	/**
	 * Sets the trial period of the subscription scheme.
	 *
	 * @param  string $value
	 */
	public function set_trial_period( $value ) {
		$this->data['trial_period'] = strval( $value );
	}

	/**
	 * Sets the trial length of the subscription scheme.
	 *
	 * @param  int $value
	 */
	public function set_trial_length( $value ) {
		$this->data['trial_length'] = absint( $value );
	}

	/**
	 * Sets the pricing mode of the scheme - 'inherit' or 'override'.
	 * Indicates how the subscription scheme modifies the price of a product when active.
	 *
	 * @param  string $value
	 */
	public function set_pricing_mode( $value ) {
		$this->data['pricing_mode'] = in_array( $value, array( 'inherit', 'override' ) ) ? $value : 'inherit';
	}

	/**
	 * Sets the price discount applied by the scheme when its pricing mode is 'inherit'.
	 *
	 * @param  mixed $value
	 */
	public function set_discount( $value ) {
		if ( 'inherit' === $this->get_pricing_mode() ) {
			$this->data['discount'] = wc_format_decimal( $value );
		}
	}

	/**
	 * Sets the overridden regular price applied by the scheme when its pricing mode is 'override'.
	 *
	 * @param  mixed $value
	 */
	public function set_regular_price( $value ) {
		if ( 'override' === $this->get_pricing_mode() ) {
			$this->data['regular_price'] = wc_format_decimal( $value );
			$this->data['price']         = '' !== $this->data['sale_price'] && $this->data['sale_price'] < $this->data['regular_price'] ? $this->data['sale_price'] : $this->data['regular_price'];
		}
	}

	/**
	 * Sets the overridden sale price applied by the scheme when its pricing mode is 'override'.
	 *
	 * @param  mixed $value
	 */
	public function set_sale_price( $value ) {
		if ( 'override' === $this->get_pricing_mode() ) {
			$this->data['sale_price'] = wc_format_decimal( $value );
			$this->data['price']      = '' !== $this->data['sale_price'] && $this->data['sale_price'] < $this->data['regular_price'] ? $this->data['sale_price'] : $this->data['regular_price'];
		}
	}

	/**
	 * Sets the sync date.
	 *
	 * @param  mixed $value
	 */
	public function set_sync_date( $value ) {

		if ( is_array( $value ) ) {

			if ( ! empty( $value['day'] ) && ! empty( $value['month'] ) ) {

				$this->data['sync_date'] = array(
					'day'   => $value['day'],
					'month' => $value['month'],
				);
			}
		} else {
			$this->data['sync_date'] = absint( $value );
		}

		$this->update_sync_status();
	}

	/*
	|--------------------------------------------------------------------------
	| Array access methods.
	|--------------------------------------------------------------------------
	*/

	#[\ReturnTypeWillChange]
	public function offsetGet( $offset ) {
		$key = isset( $this->offset_map[ $offset ] ) ? $this->offset_map[ $offset ] : false;
		return $key ? $this->data[ $key ] : null;
	}

	#[\ReturnTypeWillChange]
	public function offsetExists( $offset ) {
		$key = isset( $this->offset_map[ $offset ] ) ? $this->offset_map[ $offset ] : false;
		return $key ? isset( $this->data[ $key ] ) : false;
	}

	#[\ReturnTypeWillChange]
	public function offsetSet( $offset, $value ) {
		if ( is_null( $offset ) ) {
			$this->data[] = $value;
		} else {
			$key = isset( $this->offset_map[ $offset ] ) ? $this->offset_map[ $offset ] : false;
			if ( $key ) {
				$this->data[ $key ] = $value;
			} else {
				$this->data[ $offset ] = $value;
			}
		}
	}

	#[\ReturnTypeWillChange]
	public function offsetUnset( $offset ) {
		$key = isset( $this->offset_map[ $offset ] ) ? $this->offset_map[ $offset ] : false;
		if ( $key ) {
			unset( $this->data[ $key ] );
		} else {
			unset( $this->data[ $offset ] );
		}
	}
}
