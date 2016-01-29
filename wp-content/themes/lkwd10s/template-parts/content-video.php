<?php
/**
 * Template part for displaying Video posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lakewood_Tennis_Center
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<header class="entry-header col-xs-12">
			<?php
				if ( is_single() ) {
					?>
					<div class="page-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</div>
					<?php
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
			?>
		</header><!-- .entry-header -->

		<div class="entry-content col-xs-12">
			<?php
				$video_url = get_field( "match_video_url" );
				echo do_shortcode( '[videojs mp4="' . $video_url . '"]' );
			?>
			<a href="<?php echo $video_url; ?>" class="btn btn-primary" download><i class="fa fa-cloud-download"></i>Download</a>
		</div><!-- .entry-content -->

		<footer class="entry-footer col-xs-12">
			<?php lkwd10s_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
</div><!-- #post-## -->
