<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Stallion
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area mdc-layout-grid__cell mdc-layout-grid__cell--span-4">
		<div class="theiaStickySidebar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
</aside><!-- #secondary -->
