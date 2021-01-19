<?php
/**
 * Customizer Setup and Custom Controls
 *
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class Airi_initialise_customizer_settings {
	// Get our default values
	private $defaults;

	public function __construct() {
		// Get our Customizer defaults
		$this->defaults = airi_generate_defaults();

		// Register our sections
		add_action( 'customize_register', array( $this, 'airi_add_customizer_sections' ) );

		// Register our sample Custom Control controls
		add_action( 'customize_register', array( $this, 'airi_register_typography_custom_controls' ) );

		
	}

	/**
	 * Register the Customizer sections
	 */
	public function airi_add_customizer_sections( $wp_customize ) {
		/**
		 * Add our section that contains examples of our Custom Controls
		 */
		$wp_customize->add_section( 'typography_custom_controls_section',
			array(
				'title' => __( 'Typography Controls Test', 'airi' ),
				'description' => esc_html__( 'These are an example of Customizer Custom Controls.', 'airi'  )
			)
		);

	}

	/**
	 * Register our Typography Controls Test
	 */
	public function airi_register_typography_custom_controls( $wp_customize ) {

		// Test of Slider Custom Control
		$wp_customize->add_setting( 'typography_slider_control',
			array(
				'default' => $this->defaults['typography_slider_control'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Airi_Slider_Custom_Control( $wp_customize, 'typography_slider_control',
			array(
				'label' => __( 'Slider Control (px)', 'airi' ),
				'section' => 'typography_custom_controls_section',
				'input_attrs' => array(
					'min' => 10,
					'max' => 90,
					'step' => 1,
				),
			)
		) );


		// Test of Google Font Select Control
		$wp_customize->add_setting( 'typography_google_font_select',
			array(
				'default' => $this->defaults['typography_google_font_select'],
				'sanitize_callback' => 'airi_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new Airi_Google_Font_Select_Custom_Control( $wp_customize, 'typography_google_font_select',
			array(
				'label' => __( 'Google Font Control', 'airi' ),
				'description' => esc_html__( 'All Google Fonts sorted alphabetically', 'airi' ),
				'section' => 'typography_custom_controls_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'alpha',
				),
			)
		) );
	}

}

/**
 * Render Callback for displaying the footer credits
 */
function airi_get_credits_render_callback() {
	echo airi_get_credits();
}

/**
 * Load all our Customizer Custom Controls
 */
require_once trailingslashit( dirname(__FILE__) ) . 'custom-controls.php';

/**
 * Initialise our Customizer settings
 */
$airi_settings = new Airi_initialise_customizer_settings();
