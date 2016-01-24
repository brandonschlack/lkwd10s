<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Lakewood_Tennis_Center
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lkwd10s_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'lkwd10s_body_classes' );

/**
 * Removes Admin Bar for users who aren't admins
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
/*
add_action('set_current_user', 'cc_hide_admin_bar');
function lkwd10s_hide_admin_bar() {
	if ( !current_user_can( 'edit_posts' ) ) {
		show_admin_bar( false );
	}
}
*/
