<?php
/**
 * Load all our Customizer Custom Controls
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer/custom-controls/class-airi-custom-control.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/custom-controls/class-airi-slider-custom-control.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/custom-controls/class-airi-alpha-color-custom-control.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/custom-controls/class-airi-google-font-select-custom-control.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/custom-controls/class-airi-label-custom-control.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/custom-controls/class-airi-html-divider-custom-control.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/custom-controls/class-airi-sortable-repeater-custom-control.php';


/**
 * Customizer Setup Controls
 * Load options and sanitizers files
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer/sanitizers.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/active-callbacks.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/section-typography.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/section-header.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/section-colors.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/section-footer.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/options/section-blog.php';


/**
 * Airi Theme Customizer
 *
 * @package Airi
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function airi_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'airi_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'airi_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'airi_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function airi_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function airi_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


if ( ! function_exists( 'airi_custom_styles' ) ) {
	function airi_custom_styles() {
		$custom_styles  = '';
		$custom_styles .= airi_font_family_styles();
		$custom_styles .= airi_font_sizes_styles();
		$custom_styles .= airi_custom_colors_styles();

		// Output all styles.
		echo '<style id="airi-custom-css">' . esc_html( $custom_styles ) . '</style>';
	}
}
add_action( 'wp_head', 'airi_custom_styles', 9999 );

/**
 * Enqueue scripts for our Customizer preview
 *
 * @return void
 */
if ( ! function_exists( 'airi_customizer_preview_scripts' ) ) {
	function airi_customizer_preview_scripts() {
		airi_font_scripts();
		wp_enqueue_script( 'airi-customizer-preview-js', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/js/customizer-preview.js', array( 'customize-preview', 'jquery' ), time(), false );
	}
}
add_action( 'customize_preview_init', 'airi_customizer_preview_scripts' );
