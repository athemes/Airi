<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package TheFuture
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function thefuture_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	//Sticky nav
	$sticky = get_theme_mod( 'sticky_nav', 'is-sticky-nav' );
	$classes[] = esc_attr( $sticky );

	return $classes;
}
add_filter( 'body_class', 'thefuture_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function thefuture_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'thefuture_pingback_header' );

/**
 * Post classes based on layout type
 */
function thefuture_post_classes( $classes ) {

	$classes[] = '';

	if ( is_singular() ) {
		return $classes;
	}

	$layout = thefuture_blog_layout();

	if ( $layout['type'] == 'layout-grid-2cols-sidebar' ) {
		$classes[] = 'col-md-6';
	} elseif ( $layout['type'] == 'layout-grid-3cols' ) {
		$classes[] = 'col-md-4';
	} else {
		$classes[] = 'col-md-12';
	}

	return $classes;
}
add_filter( 'post_class', 'thefuture_post_classes' );

/**
 * Excerpt length
 */
function thefuture_excerpt_length( $length ) {

	if ( is_admin() ) {
		return $length;
	}

	//Get the excerpt length
	$excerpt = get_theme_mod( 'excerpt_length', '15' );
	
	return $excerpt;
}
add_filter( 'excerpt_length', 'thefuture_excerpt_length', 999 );