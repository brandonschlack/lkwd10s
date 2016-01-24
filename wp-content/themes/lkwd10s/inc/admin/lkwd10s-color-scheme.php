<?php

class Lkwd10s_Color_Scheme {

	private $colors = array( 'lkwd10s' );

	function __construct() {
		add_action( 'admin_init' , array( $this, 'add_color_scheme' ) );
		add_filter('get_user_option_admin_color', 'change_admin_color');
			function change_admin_color($result) {
			    return 'lkwd10s';
		}
	}

	/**
	 * Register color schemes.
	 */
	function add_color_scheme() {
		wp_admin_css_color(
			'lkwd10s', __( 'Lakewood Tennis Center', 'admin_schemes' ),
			get_stylesheet_directory_uri() . '/inc/admin/colors.css',
			array( '#16355a', '#046a38', '#dde66a', '#fff' ),
			array( 'base' => '#fff', 'focus' => '#000', 'current' => '#fff' )
		);

	}
}
global $lkwd10s_color_scheme;
$lkwd10s_color_scheme = new Lkwd10s_Color_Scheme;

