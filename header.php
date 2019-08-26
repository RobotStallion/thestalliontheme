<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Stallion
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<script type="module" src="https://unpkg.com/dark-mode-toggle"></script>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text"
			href="#content"><?php esc_html_e( 'Skip to content', 'the-stallion' ); ?></a>

		<header class="mdc-top-app-bar app-bar site-header mdc-top-app-bar--short" id="app-bar masthead">

			<?php
if(is_front_page() && is_home() && false):
	?>

			<div class="site-branding mdc-elevation--z4">
				<?php
the_custom_logo();
if ( is_front_page() && is_home() ) :
	?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
						rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
else :
	?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
						rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
endif;
$the_stallion_description = get_bloginfo( 'description', 'display' );
if ( $the_stallion_description || is_customize_preview() ) :
	?>
				<p class="site-description"><?php echo $the_stallion_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
			<?php endif; ?>

			<div class="mdc-top-app-bar__row">
				<section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
					<a href="#" class="demo-menu material-icons mdc-top-app-bar__navigation-icon">menu</a>
					<?php //the_custom_logo()?>

					<span class="mdc-top-app-bar__title site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
						rel="home"><?php bloginfo( 'name' ); ?></a></span>
				</section>
				<section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
      <a href="#" class="material-icons mdc-top-app-bar__action-item" id="sharebutton" aria-label="Bookmark this page">share</a>
    </section>
			</div>
		</header>

		<aside class="mdc-drawer mdc-drawer--modal mdc-top-app-bar--fixed-adjust">

			<div class="mdc-drawer__content">
				<nav id="site-navigation" class="main-navigation">
					<?php
		wp_nav_menu( array(
			'theme_location' => 'menu-1',
		'menu_id'        => 'primary-menu',
		) );
		?>
		<dark-mode-toggle
		id="dark-mode-toggle"
      appearance="toggle"
      dark="Dark"
      light="Light"
      permanent
		></dark-mode-toggle>
				</nav><!-- #site-navigation -->
			</div>

		</aside>
		<div class="mdc-drawer-scrim"></div>



		<div id="content" class="site-content mdc-drawer-app-content main-content">
		<div class="mdc-layout-grid mdc-top-app-bar--fixed-adjust site-container">
	<div class="mdc-layout-grid__inner">
		<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
			<?php
		get_template_part( 'template-parts/catagory-chips');

		if ( is_front_page() && is_home() ) :
			get_sidebar("home");
		endif;
		?>

		
	</div>
	<div class="mdc-layout-grid__inner">
		<div id="primary" class="content-area mdc-layout-grid__cell mdc-layout-grid__cell--span-8">