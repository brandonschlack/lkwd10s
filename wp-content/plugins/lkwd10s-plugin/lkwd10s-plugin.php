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

// Plugin Path
if ( ! defined( 'LKWD10SP_DIR' ) ) {
	define( 'LKWD10SP_DIR', plugin_dir_path( __FILE__ ) );
}

// Plugin URL
if ( ! defined( 'LKWD10SP_URL' ) ) {
	define( 'LKWD10SP_URL', plugin_dir_url( __FILE__ ) );
}

// Google API src
if ( ! defined( 'LKWD10SP_GA_SRC' ) ) {
	define( 'LKWD10SP_GA_SRC', dirname( __FILE__ ) . '/vendor/google/apiclient/src/Google/' );
}

include_once __DIR__ . '/event-post.php';
global $lkwd10s_event_post_type;
$lkwd10s_event_post_type = new Lkwd10s_Event_Post_Type;

include_once __DIR__ . '/admin/lkwd10s-options.php';

include_once __DIR__ . '/includes/class-google-api.php';
global $gclient;
$gclient = new Lkwd10s_Google_API;