<?php

/**
 * Include this class to use the Lkwd10s_Api_Libs, you can include this as a submodule in your project
 * and you just have to autoload this class
 *
 *
 * NAMING CONVENTIONS
 * - Register 'oauth' by using $this->register_api_library()
 * - Create folder 'oauth'
 * - Create file 'class-api-oauth.php'
 * - Class name should be 'Lkwd10s_Api_Oauth'
 */
class Lkwd10s_Api_Lib {

	public function __construct()  {
		$this->load_google();
	}

	/**
	 * Loading the google api library which will set the autoloader
	 */
	private function load_google() {
		if ( ! class_exists('Lkwd10s_Api_Google_Client', false) ) {
			// Require the file
			require_once LKWD10SP_DIR . '/vendor/autoload.php';

			// Initialize the Google API Class to set the autoloader
			new Lkwd10s_Api_Google_Client();
		}
	}

}
