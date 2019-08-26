<?php
if ( ! is_active_sidebar( 'homepage-1' ) ) {
	return;
}
?>
<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8">
<?php dynamic_sidebar( 'homepage-1' );?>
</div>