<?php
/**
 * Customizer Footer Controls
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class Airi_Initialise_Customizer_Footer_Settings {

	/**
	 * @var array $defaults Get our default values.
	 */
	private $defaults;

	/**
	 * Construct
	 */
	public function __construct( $defaults ) {
		// Get our Customizer defaults.
		$this->defaults = $defaults;

		// Register our sections.
		add_action( 'customize_register', array( $this, 'airi_add_customizer_sections' ) );

		// Register our controls.
		add_action( 'customize_register', array( $this, 'airi_register_controls' ) );

	}

	/**
	 * Register the Customizer sections
	 */
	public function airi_add_customizer_sections( $wp_customize ) {
		/**
		 * Add Footer Section
		 */
		$wp_customize->add_section(
			'test_airi_section_footer',
			array(
				'title'    => __( 'Footer V2', 'airi' ),
				'priority' => 16,
			)
		);

	}

	/**
	 * Register our Footer Controls
	 */
	public function airi_register_controls( $wp_customize ) {

		// Menu Type.
		$wp_customize->add_setting(
			'test_footer_widget_areas',
			array(
				'default'           => $this->defaults['test_footer_widget_areas'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'test_footer_widget_areas',
			array(
				'label'    => __( 'Footer widget areas', 'airi' ),
				'section'  => 'test_airi_section_footer',
				'type'     => 'radio',
				'priority' => 10,
				'choices'  => array(
					'1' => esc_attr__( '1', 'airi' ),
					'2' => esc_attr__( '2', 'airi' ),
					'3' => esc_attr__( '3', 'airi' ),
					'4' => esc_attr__( '4', 'airi' ),
				),
			)
		);

	}

}

/**
 * Initialise our Customizer settings
 */
$airi_settings = new Airi_Initialise_Customizer_Footer_Settings(
	array(
		'test_footer_widget_areas' => '4',

	)
);

