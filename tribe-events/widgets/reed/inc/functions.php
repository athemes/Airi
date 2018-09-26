<?php
/**
 * Functions
 *
 * @package TheFuture
 */


/*----------------------------------
I. Header
----------------------------------*/

/**
 * Main container
 */
if ( !function_exists( 'thefuture_main_container_start' ) ) {
	function thefuture_main_container_start() {
		if ( !is_page_template( 'page-templates/template_page-builder.php') ) {
			echo '<div class="container">';
			echo 	'<div class="row">';
		}
	}
}
if ( !function_exists( 'thefuture_main_container_end' ) ) {
	function thefuture_main_container_end() {

		if ( !is_page_template( 'page-templates/template_page-builder.php') ) {
			echo 	'</div>';
			echo '</div>';
		}
	}
}

/*----------------------------------
I. Blog
----------------------------------*/

/**
 * Blog layout
 */
 if ( !function_exists( 'thefuture_blog_layout' ) ) {
 	function thefuture_blog_layout() {

		/*
		layout-grid-2cols-sidebar
		layout-grid-3cols
		layout-list
		layout-classic
		*/

 		$layout = get_theme_mod( 'blog_layout', 'layout-grid-3cols' );

 		if ( $layout == 'layout-grid-3cols' ) {
 			$cols = 'col-md-12';
 		} else {
 			$cols = 'col-md-8';
 		}

 		$layout_data = array( 
 			'type' => $layout,
 			'cols' => $cols,
 		);

 		return $layout_data;
 	}
 }

