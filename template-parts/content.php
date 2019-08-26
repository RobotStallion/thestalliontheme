<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Stallion
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if(is_category() || is_archive() || is_home()): ?>
	<div class="mdc-card__primary-action" rel="bookmark" onclick="window.location='<?php echo esc_url(get_permalink());?>'">
<?php else:?>
	<div class="" rel="bookmark" href="<?php echo esc_url(get_permalink());?>">
<?php endif?>

	<?php the_stallion_post_thumbnail(); ?>

	<div class="entry-content">
	<?php the_stallion_post_cat(); ?>
	
	<?php
		if ( is_singular() ) :
			the_title( '<a href="' . esc_url(get_permalink()) . '"><h1 class="entry-title">', '</h1></a>' );
		else :
			the_title( '<a href="' . esc_url(get_permalink()) .'"><h2 class="entry-title">','</h2></a>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				the_stallion_posted_on();
				the_stallion_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php if(is_category() || is_archive() || is_home()):
		the_excerpt();
		else :
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'the-stallion' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		endif;

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-stallion' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->
	</div><!--MDCWrapper-->
<footer class="entry-footer">
		<?php the_stallion_entry_footer(); ?>
	</footer><!-- .entry-footer -->


</article><!-- #post-<?php the_ID(); ?> -->
