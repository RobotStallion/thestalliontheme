<?php
/**
 * The Stallion functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package The_Stallion
 */

if ( ! function_exists( 'the_stallion_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function the_stallion_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on The Stallion, use a find and replace
		 * to change 'the-stallion' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'the-stallion', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		//Admin Bar Customisation
		add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'the-stallion' ),
			'cat-menu' => esc_html__( 'Catagories', 'the-stallion'),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		/*add_theme_support( 'custom-background', apply_filters( 'the_stallion_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );*/

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'the_stallion_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function the_stallion_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'the_stallion_content_width', 640 );
}
add_action( 'after_setup_theme', 'the_stallion_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function the_stallion_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'the-stallion' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'the-stallion' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Page', 'the-stallion' ),
		'id'            => 'homepage-1',
		'description'   => esc_html__( 'Add widgets here.', 'the-stallion' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'the_stallion_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function the_stallion_scripts() {
	//wp_enqueue_style("mdc-style", 'https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css', 'all'); 
	//wp_enqueue_script('mdc-js', 'https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js', false);
	//wp_enqueue_style("mdc-style", get_template_directory_uri() . '/material/material-components-web.min.css', 'all'); 
	wp_enqueue_script('mdc-js', get_template_directory_uri() . '/material/material-components-web.min.js', false);
	wp_enqueue_style("mdc-icons", 'https://fonts.googleapis.com/icon?family=Material+Icons');
	wp_enqueue_style( 'the-stallion-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() .'/style.css'));
	wp_enqueue_style( 'the-stallion-style-dark', get_template_directory_uri() . '/dark.css', array(), filemtime(get_stylesheet_directory() .'/dark.css'), "(prefers-color-scheme: dark)");
	wp_enqueue_style( 'the-stallion-style-light', get_template_directory_uri() . '/light.css', array(), filemtime(get_stylesheet_directory() .'/light.css'), "(prefers-color-scheme: light), (prefers-color-scheme: no-preference)");

	wp_enqueue_script( 'the-stallion-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', false );

	wp_enqueue_script( 'the-stallion-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', false );

	wp_enqueue_script( 'the-stallion-custom', get_template_directory_uri() . '/js/stallion.js', array(), "12", false);
	wp_enqueue_script( 'the-stallion-theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.min.js', array('jquery'), "1", false);
	

	//wp_enqueue_script( 'the-stallion-material', get_template_directory_uri() . '/js/materialinit.js', array(), "28", true );

	//wp_enqueue_script( 'the-stallion-webshare', get_template_directory_uri() . '/js/webshare.js', array(), "5", true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'the_stallion_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//List Authors Shortcode

add_shortcode('list-contributors', "getContributors");
function getContributors(){
$authors = wp_list_authors(array(
    'orderby'       => 'name', 
    'order'         => 'ASC', 
    'number'        => null,
    'optioncount'   => false, 
    'exclude_admin' => true, 
    'show_fullname' => false,
    'hide_empty'    => true,
    'echo'          => false,
    'feed'          => [], 
    'feed_image'    => [],
    'feed_type'     => [],
    'style'         => 'list',
    'html'          => true,
    'exclude'       => [],
    'include'       => []) );
	
	return $authors;
}

