<?php
/**
 * Load all our Customizer Custom Controls
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/custom-controls/class-airi-custom-control.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/custom-controls/class-airi-slider-custom-control.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/custom-controls/class-airi-alpha-color-custom-control.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/custom-controls/class-airi-google-font-select-custom-control.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/custom-controls/class-airi-label-custom-control.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/custom-controls/class-airi-html-divider-custom-control.php';

/**
 * Customizer Setup Controls
 * Load options and sanitizers files
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/sanitizers.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/active-callbacks.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/options/section-typography.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/options/section-header.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/options/section-colors.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/options/section-footer.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/options/section-blog.php';

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
		wp_enqueue_script( 'airi-customizer-preview-js', trailingslashit( get_template_directory_uri() ) . 'inc/customizer-v2/assets/js/customizer-preview.js', array( 'customize-preview', 'jquery' ), time(), false );
	}
}
add_action( 'customize_preview_init', 'airi_customizer_preview_scripts' );
