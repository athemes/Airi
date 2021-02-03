<?php
/**
 * Airi Customizer Custom Controls
 *
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Custom Control Base Class
	 */
	class Airi_Custom_Control extends WP_Customize_Control {
		protected function get_airi_resource_url() {
			return trailingslashit( get_template_directory_uri() . '/inc/customizer-v2/');
		}
	}
}