<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TheFuture
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'thefuture' ); ?></a>

	<?php 
		
		/**
		 * @hooked thefuture_top_bar - 10
		 */
		do_action( 'thefuture_header_before' );

		/**
		 * @hooked thefuture_header - 10
		 */
		do_action( 'thefuture_header' );

		do_action( 'thefuture_header_after' );
	?>

	<div id="content" class="site-content">
		<?php thefuture_main_container_start(); ?>