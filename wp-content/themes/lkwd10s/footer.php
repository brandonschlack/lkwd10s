<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lakewood_Tennis_Center
 */

?>

	</div><!-- #content -->
</div><!-- #page -->
<footer id="footer" class="site-footer footer" role="contentinfo">
	<div id="footer-content" class="site-info container">
		<div class="row">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'lkwd10s' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'lkwd10s' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'lkwd10s' ), 'lkwd10s', '<a href="http://underscores.me/" rel="designer">Lakewood Tennis Center</a>' ); ?>				
		</div>
	</div><!-- #footer-content -->
</footer><!-- #footer -->

<?php wp_footer(); ?>

</body>
</html>
