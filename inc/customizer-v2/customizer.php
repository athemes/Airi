<?php
/**
 * Customizer Setup Controls
 * Load options and sanitizers files
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/sanitizers.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/custom-controls/class-airi-custom-control.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/options/section-typography.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/options/section-header.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer-v2/options/section-footer.php';
