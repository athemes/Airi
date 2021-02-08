<?php
/**
 * Label Custom Control
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Airi_Custom_HTML_Custom_Control extends Airi_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'custom_html_control';
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
			<div class="custom-html-custom-control">
				<?php echo esc_html( $this->label ); ?>
			</div>
			<?php
		}
	}
}
