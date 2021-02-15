<?php
/**
 * Label Custom Control
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Airi_Label_Custom_Control extends Airi_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'label_control';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'airi-custom-controls-js', $this->get_airi_resource_url() . 'assets/js/customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.0', true );
			wp_enqueue_style( 'airi-custom-controls-css', $this->get_airi_resource_url() . 'assets/css/customizer.css', array(), '1.0', 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
			<div class="label-custom-control">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			</div>
			<?php
		}
	}
}
