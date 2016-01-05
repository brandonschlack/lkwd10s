<?php 

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
	// update path
	$path = get_stylesheet_directory() . '/acf/';
	
	// return
	return $path;
	
}
 

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
	// update path
	$dir = get_stylesheet_directory_uri() . '/acf/';
	
	// return
	return $dir;
	
}
 

// 3. Hide ACF field group menu item
// add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );


// 5. Exported fields groups
if( function_exists('acf_add_local_field_group') ):
	// Home Page Google Map
	acf_add_local_field_group(array (
		'key' => 'group_568c27d3a5501',
		'title' => 'Address',
		'fields' => array (
			array (
				'key' => 'field_568b15b74fbcd',
				'label' => 'Google Map',
				'name' => 'google_map',
				'type' => 'google_map',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'center_lat' => '33.8352114',
				'center_lng' => '-118.1568118',
				'zoom' => 15,
				'height' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'widget',
					'operator' => '==',
					'value' => 'lkwd10s-map-widget',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

endif;

?>