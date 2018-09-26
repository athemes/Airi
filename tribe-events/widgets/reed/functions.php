<?php
/**
 * TheFuture functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TheFuture
 */

if ( ! function_exists( 'thefuture_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress feairires.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some feairires, such
	 * as indicating support for post thumbnails.
	 */
	function thefuture_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TheFuture, use a find and replace
		 * to change 'thefuture' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'thefuture', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

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
		 * @link https://developer.wordpress.org/themes/functionality/feairired-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'left-menu' 	=> esc_html__( 'Left header menu (use only if you want your logo in the middle, between Left and Right menus)', 'thefuture' ),
			'right-menu' 	=> esc_html__( 'Right header menu', 'thefuture' ),			
			'footer-menu' 	=> esc_html__( 'Footer menu', 'thefuture' ),			
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

		// Set up the WordPress core custom background feairire.
		add_theme_support( 'custom-background', apply_filters( 'thefuture_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

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
add_action( 'after_setup_theme', 'thefuture_setup' );

 /**
 * Enqueue Bootstrap
 */
function thefuture_bootstrap() {
	wp_enqueue_style( 'thefuture-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap-grid.min.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'thefuture_bootstrap', 9 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thefuture_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'thefuture_content_width', 640 );
}
add_action( 'after_setup_theme', 'thefuture_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function thefuture_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'thefuture' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'thefuture' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	//Footer widget areas
	$widget_areas = get_theme_mod( 'footer_widget_areas', 3 );
	for ( $i = 1; $i <= $widget_areas; $i++ ) { 
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Footer area %s', 'thefuture' ), $i ),
			'id'            => 'footer-' . $i,
			'description'   => esc_html__( 'Add widgets here.', 'thefuture' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}

}
add_action( 'widgets_init', 'thefuture_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function thefuture_scripts() {
	wp_enqueue_style( 'thefuture-style', get_stylesheet_uri() );

	wp_enqueue_style( 'thefuture-fonts', '//fonts.googleapis.com/css?family=Josefin+Sans:100,400,400i,600,600i|Open+Sans:400,400i,600,600i', array(), null );	

	wp_enqueue_script( 'thefuture-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'thefuture-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'thefuture-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thefuture_scripts' );

/**
 * Disable Elementor global color schemes and typography
 */
function thefuture_disable_elementor_globals () {
	update_option( 'elementor_disable_color_schemes', 'yes' );
	update_option( 'elementor_disable_typography_schemes', 'yes' );
}
add_action('after_switch_theme', 'thefuture_disable_elementor_globals');

/**
 * Implement the Custom Header feairire.
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
 * Helper functions
 */
require get_template_directory() . '/inc/functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Functions hooked into theme defined action hooks
 */
require get_template_directory() . '/inc/hooks.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}