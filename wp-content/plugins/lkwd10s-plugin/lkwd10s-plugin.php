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

// require __DIR__ . '/plugins/autoload.php';
// define('APPLICATION_NAME', 'Lakewood Tennis Center Apps Script API');
// define('CREDENTIALS_PATH', '~/.credentials/script-php-quickstart.json');
// define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
// define('SCOPES', implode(' ', array(
// 	"https://www.googleapis.com/auth/drive")
// ));

require_once __DIR__ . '/event-post.php';
$lkwd10s_event_post_type = new Lkwd10s_Event_Post_Type;
