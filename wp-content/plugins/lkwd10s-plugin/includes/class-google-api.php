<?php
/**
 * Plugin Name: Lakewood Tennis Center Plugin
 * Description: Functions for Lakewood Tennis Center, include the Google API
 * Version:     1.0.0
 * Author:      Brandon Schlack
 * Author URI:  http://github.com/brandonschlack
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: lkwd10s-plugin
 */

class Lkwd10s_Google_API {

	/**
	 * Init function for the settings of GA
	 */
	public function init_settings() {
		$this->options = $this->get_options();

		new Lkwd10s_Api_Lib();

		// Listener for reconnecting with google analytics
		$this->google_drive_listener();

		/**
		 * Show the notifications if we have one
		 */
		$this->show_notification( 'ga_notifications' );
	}

	/**
	 * Checks if there is a callback to get token from Google Drive API
	 */
	private function google_drive_listener() {
		$google_auth_code = filter_input( INPUT_POST, 'google_auth_code' );
		if ( $google_auth_code && current_user_can( 'manage_options' ) && wp_verify_nonce( filter_input( INPUT_POST, 'lkwd10s_ga_nonce' ), 'save_settings' ) ) {
			self::analytics_api_clean_up();

			Lkwd10s_Google_Drive::get_instance()->authenticate( trim( $google_auth_code ) );
		}
	}
}