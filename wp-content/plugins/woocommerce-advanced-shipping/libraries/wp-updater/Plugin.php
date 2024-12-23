<?php
namespace JeroenSormani\WP_Updater;

use JeroenSormani\WP_Updater\Clients\EDD;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Plugin {


	/**
	 * Plugin base name.
	 *
	 * Used to identify the plugin in several locations.
	 *
	 * @var string plugin base name based on the plugin_basename() function and plugin file.
	 */
	public $plugin_basename = '';
	public $option_prefix = '';
	/**
	 * @var string
	 */
	public $name;
	/**
	 * @var array|string|string[]|null
	 */
	public $version;
	/**
	 * @var EDD
	 */
	public $client;
	/**
	 * @var mixed|string
	 */
	public $license_option_name;


	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args List of arguments.
	 */
	public function __construct( $args ) {

		$this->name                = esc_html( $args['name'] );
		$this->client              = new EDD( $args['api_url'], $this, array() );
		$this->version             = preg_replace( '/[^\.0-9]/', '', $args['version'] );
		$this->plugin_basename     = plugin_basename( $args['file'] );
		$this->license_option_name = isset( $args['license_option_name'] ) ? $args['license_option_name'] : '';

		$this->option_prefix = dirname( $this->plugin_basename );
	}


	/**
	 * Get plugin name.
	 *
	 * Get the name of the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return string Name of the plugin.
	 */
	public function get_name() {
		return $this->name;
	}


	/**
	 * Plugin slug.
	 *
	 * The plugin slug is mainly used at the 'view details' part of the plugins site.
	 * By normal w.org plugin this is based on the URL slug of the plugin.
	 * @todo Not confirmed whether this part should remain.
	 *
	 * @since 1.0.0
	 *
	 * @return string The slug of the plugin.
	 */
	public function get_slug() {

		$plugin_data = $this->client->get_plugin_update_info();
		$slug = $plugin_data->slug ?? '';

		return $slug;

	}


	/**
	 * Set the license key.
	 *
	 * Set the license key in the database.
	 *
	 * @since 1.0.0
	 *
	 * @param string $license License key to set.
	 * @return bool True on success, false otherwise.
	 */
	public function set_license_key( $license ) {
		$license = sanitize_text_field( $license );

		// Allow license keys to be saved in custom option fields
		if ( ! empty( $this->license_option_name ) ) {
			return update_option( $this->license_option_name, $license );
		}

		return update_option( $this->option_prefix . '_license',  $license );
	}


	/**
	 * Get the license key.
	 *
	 * Get the license key from the database.
	 *
	 * @since 1.0.0
	 *
	 * @return string License key if available, empty string otherwise.
	 */
	public function get_license_key() {
		// Allow license keys to be saved in custom option fields
		if ( ! empty( $this->license_option_name ) ) {
			return get_option( $this->license_option_name, '' );
		}

		return get_option( $this->option_prefix . '_license', '' );
	}


	/**
	 * Get plugin version.
	 *
	 * Get the current version installed of the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return string Plugin version number.
	 */
	public function get_version() {
		return $this->version;
	}


	/**
	 * Get license status.
	 *
	 * Get the current status of the license. This does not retrieve it
	 * directly from the server but rather a DB saved value.
	 *
	 * @since 1.0.0
	 *
	 * @return string Current license status.
	 */
	public function get_license_status() {
		$status = get_option( $this->option_prefix . '_license_status', 'pending' );
		$status = empty( $status ) ? 'pending' : $status;
		return $status;
	}


	/**
	 * Set license status.
	 *
	 * @since 1.0.0
	 *
	 * @param string $status The status to update to.
	 */
	public function set_license_status( $status ) {

		// Don't update if the status is the same
		if ( $this->get_license_status() == $status ) {
			return;
		}

		update_option( $this->option_prefix . '_license_status', sanitize_text_field( $status ) );

		do_action( 'wp_updater\update_license_status', $status, $this );

	}


	/**
	 * Check and update license status.
	 *
	 * Do a check for the license status on the server and update the
	 * license status accordingly.
	 *
	 * @since 1.0.0
	 */
	public function check_and_update_license_status() {

		switch ( $status = $this->client->get_status() ) {

			case 'valid' :
			case 'expired' :
				$this->set_license_status( $status );
				break;
			case 'site_inactive' :
				if ( ! is_wp_error( $this->client->activate() ) ) {
					$this->set_license_status( 'valid' );
				} else {
					$this->set_license_status( $status );
				}
				break;
			default :
				$this->set_license_status( 'invalid' );
				break;

		}

	}


}
