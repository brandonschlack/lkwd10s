<?php
/**
 * Lakewood Tennis Center Theme Customizer.
 *
 * @package Lakewood_Tennis_Center
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lkwd10s_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	// Navbar Customizer
	$wp_customize->add_section( 'lkwd10s_navbar' , array(
		'title'      => __( 'Navbar', 'lkwd10s' ),
		'priority'   => 30,
		'description' => __( 'Change navbar style between light and dark', 'lkwd10s' )
	) );
	$wp_customize->add_setting( 'navbar_style' , array( 'default' => 'inverse' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize,
		'navbar_style',
		array(
			'label' => __( 'Navbar Style', 'lkwd10s' ),
			'section' => 'lkwd10s_navbar',
			'settings' => 'navbar_style',
			'type' => 'radio',
			'choices' => array (
				'inverse' => 'dark',
				'default' => 'light'
	) ) ) );
}
add_action( 'customize_register', 'lkwd10s_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lkwd10s_customize_preview_js() {
	wp_enqueue_script( 'lkwd10s_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'lkwd10s_customize_preview_js' );
