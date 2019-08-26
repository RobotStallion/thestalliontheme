<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Stallion
 */

?>

	

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'the-stallion' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'the-stallion' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'the-stallion' ), 'the-stallion', '<a href="http://underscores.me/">Joseph Goh</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	</div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php get_template_part('template-parts/dialogue-parts/share-fallback', 'none'); ?>


</body>
</html>
