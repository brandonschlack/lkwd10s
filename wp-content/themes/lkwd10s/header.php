<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lakewood_Tennis_Center
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<nav id="site-navigation" class="main-navigation navbar navbar-<?php echo get_theme_mod( 'navbar_style' ); ?>" role="navigation">
	<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo home_url(); ?>">
				<img src="<?php bloginfo('template_directory'); ?>/images/navbar/navbar-brand-<?php echo get_theme_mod( 'navbar_style' ); ?>.svg" height="50" width="129" alt="Home | Lakewood Tennis Center">
			</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<?php
			wp_nav_menu( array(
				'menu'              => 'navbar',
				'theme_location'    => 'primary',
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'navbar',
				'menu_class'        => 'nav navbar-nav'
			) );
		?><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav><!-- #site-navigation -->
<div id="page" class="site">
	<div id="content" class="site-content">
