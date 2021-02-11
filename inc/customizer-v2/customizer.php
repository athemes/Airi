<?php
/**
 * Customizer Setup Controls
 * Load options and sanitizers files
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/sanitizers.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/active-callbacks.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/custom-controls/class-airi-custom-control.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/options/section-typography.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/options/section-header.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/options/section-colors.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/options/section-footer.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/options/section-blog.php';

if (! function_exists('airi_custom_styles')) {
    function airi_custom_styles()
    {
        $custom_styles = '';
        $custom_styles .= airi_font_family_styles();
        $custom_styles .= airi_font_sizes_styles();
        $custom_styles .= airi_custom_colors_styles();

        // Output all styles.
        echo '<style id="airi-custom-css">' . esc_html($custom_styles) . '</style>';
    }
}
add_action('wp_head', 'airi_custom_styles', 9999);