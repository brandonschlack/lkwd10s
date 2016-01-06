<?php
/**
 * Lakewood Tennis Center functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lakewood_Tennis_Center
 */

if ( ! function_exists( 'lkwd10s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lkwd10s_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Lakewood Tennis Center, use a find and replace
	 * to change 'lkwd10s' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lkwd10s', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'lkwd10s' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lkwd10s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'lkwd10s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lkwd10s_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lkwd10s_content_width', 640 );
}
add_action( 'after_setup_theme', 'lkwd10s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lkwd10s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Home', 'lkwd10s' ),
		'id'            => 'sidebar-home',
		'description'   => 'Home Page widgets',
		'before_widget' => '<section id="%1$s" class="widget %2$s section-pad-both">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'lkwd10s_widgets_init' );

/**
 * Register Google Fonts
 */
function lkwd10s_fonts_url() {
	$fonts_url = '';

	$montserrat = _x( 'on', 'Montserrat font: on or off', 'lkwd10s' );
	$lato = _x( 'on', 'Lato font: on or off', 'lkwd10s' );

	if ( 'off' !== $montserrat || 'off' !== $lato ) {
		$font_families = array();
	 
		if ( 'off' !== $montserrat ) {
			$font_families[] = 'Montserrat:400,700';
		}
	 
		if ( 'off' !== $lato ) {
			$font_families[] = 'Lato:400,300,700,300italic';
		}
	 
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' )
		);
	 
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function lkwd10s_scripts() {
	// Styles
	// Fonts
	wp_enqueue_style( 'lkwd10s-fonts', lkwd10s_fonts_url(), array(), null );
	// Icons
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), '4.5.0' );
	// Bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/bootstrap/css/bootstrap-lkwd10s.css', array(), '3.3.6' );
	wp_enqueue_style( 'lkwd10s-style', get_stylesheet_uri() );

	// Scripts
	// Google Maps
	wp_register_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyApnjw6gwUOnyUsUGrHZzj9AYxS5ykdxHc', array(), '3.22', false );
	wp_enqueue_script( 'google-maps-api' );
	// Bootstrap
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/inc/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );	
	wp_enqueue_script( 'bootstrap' );
	// Navigation
	wp_enqueue_script( 'lkwd10s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true );
	wp_enqueue_script( 'lkwd10s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0.0', true );
	// Theme Scripts
	wp_register_script( 'lkwd10s-scripts', get_template_directory_uri() . '/js/lkwd10s-scripts.js', array( 'jquery', 'google-maps-api', 'bootstrap' ), '1.0.0', true );	
	wp_enqueue_script( 'lkwd10s-scripts' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lkwd10s_scripts' );

/**
 * Remove WordPress.org Links
 */
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
} 
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

/**
 * Load Advanced Custom Fields Pro
 */
require get_template_directory() . '/inc/acf-loader.php';

/**
 * Register Custom Widgets
 */
require get_template_directory() . '/inc/widgets/lkwd10s-map-widget.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Settings page
 */
require get_template_directory() . '/inc/lkwd10s-options.php';