<?php
/**
 * Template part for displaying page content in About Us page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lakewood_Tennis_Center
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header row">
		<div class="col-xs-12">
			<img class="img-responsive" src="<?php the_field('hero_image'); ?>" alt="Lakewood Tennis Center" />
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>				
		</div>
	</header><!-- .entry-header -->

	<section class="entry-content">
		<div class="row">
			<div class="col-xs-12">
				<?php
					the_content();
				?>
			</div>
		</div>
	</section><!-- .entry-content -->

	<section class="entry-content">
		<div class="row">
			<div class="col-xs-12">
				<h2>Services Offered</h2>
				<?php if( have_rows('services_list') ): ?>
					<ul>
						<?php while( have_rows('services_list') ): the_row(); ?>
							<li><?php the_sub_field('service_title'); ?></li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</section><!-- .entry-content -->

	<section class="entry-content">
		<div class="row">
			<div class="col-xs-12">
				<?php
					the_content();
				?>
			</div>
		</div>
	</section><!-- .entry-content -->
</div><!-- #post-## -->
