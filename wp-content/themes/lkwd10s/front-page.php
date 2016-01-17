<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lakewood_Tennis_Center
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section id="home-header" class="section-bg-primary section-pad-bottom">
				<div id="masthead" class="site-header container" role="banner">
					<div class="row">
						<div class="site-branding col-xs-12">
							<?php if ( get_header_image() ) : ?>
								<img src="<?php header_image(); ?>" class="img-responsive" alt="">
							<?php endif; // End header image check. ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->			
					</div>	
				</div><!-- #masthead -->
			</section>
			<?php get_sidebar('home'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
