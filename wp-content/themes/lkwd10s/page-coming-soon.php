<?php
/**
 * Template Name: Coming Soon
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
<div id="page" class="site coming-soon">
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main container" role="main">

				<?php
				while ( have_posts() ) : the_post();
				?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'row' ); ?>>
						<div class="entry-content col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
							<img src="<?php the_field( 'hero_image' ); ?>" class="img-responsive" />
							<?php
								the_content();
							?>
						</div><!-- .entry-content -->
					</article><!-- #post-## -->
				<?php					
				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>