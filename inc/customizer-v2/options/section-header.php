<?php
/**
 * Customizer Header Controls
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class Airi_Initialise_Customizer_Header_Settings {

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

		// Register our Panels.
		add_action( 'customize_register', array( $this, 'airi_add_customizer_panels' ) );

		// Register our sections.
		add_action( 'customize_register', array( $this, 'airi_add_customizer_sections' ) );

		// Register our controls.
		add_action( 'customize_register', array( $this, 'airi_register_controls' ) );

	}


	/**
	 * Register the Customizer panels
	 */
	public function airi_add_customizer_panels( $wp_customize ) {
		/**
		 * Add our Header Panel
		 */
		$wp_customize->add_panel(
			'test_airi_panel_header',
			array(
				'priority' => 9,
				'title'    => __( 'Header V2', 'airi' ),
			)
		);
	}


	/**
	 * Register the Customizer sections
	 */
	public function airi_add_customizer_sections( $wp_customize ) {
		/**
		 * Add Menu Section
		 */
		$wp_customize->add_section(
			'test_airi_section_menu',
			array(
				'title' => __( 'Menu', 'airi' ),
				'panel' => 'test_airi_panel_header',
			)
		);

	}

	/**
	 * Register our Header Controls
	 */
	public function airi_register_controls( $wp_customize ) {

		// Menu Type.
		$wp_customize->add_setting(
			'test_menu_type',
			array(
				'default'           => $this->defaults['test_menu_type'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'test_menu_type',
			array(
				'label'   => __( 'Menu Type', 'airi' ),
				'section' => 'test_airi_section_menu',
				'type'    => 'radio',
				'choices' => array(
					'menuStyle1' => esc_attr__( 'Basic 1 - inside header', 'airi' ),
					'menuStyle2' => esc_attr__( 'Basic 2 - outside header', 'airi' ),
					'menuStyle5' => esc_attr__( 'Basic 3 - inside header', 'airi' ),
					'menuStyle6' => esc_attr__( 'Basic 4 - inside header', 'airi' ),
				),
			)
		);

		// Menu Container.
		$wp_customize->add_setting(
			'test_menu_container',
			array(
				'default'           => $this->defaults['test_menu_container'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'test_menu_container',
			array(
				'label'           => __( 'Menu Width', 'airi' ),
				'section'         => 'test_airi_section_menu',
				'type'            => 'radio',
				'choices'         => array(
					'menuContained'    => esc_attr__( 'Contained', 'airi' ),
					'menuNotContained' => esc_attr__( 'Not contained', 'airi' ),
				),
				'active_callback' => function () {
					$test_menu_type = get_theme_mod( 'test_menu_type' );
					if ( ( $test_menu_type === 'menuStyle5' ) || ( $test_menu_type === 'menuStyle6' ) ) {
						return false;
					}
					return true;
				},
			)
		);

		// Sticky Header.
		$wp_customize->add_setting(
			'test_sticky_menu',
			array(
				'default'           => $this->defaults['test_sticky_menu'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'test_sticky_menu',
			array(
				'label'   => __( 'Sticky menu', 'airi' ),
				'section' => 'test_airi_section_menu',
				'type'    => 'radio',
				'choices' => array(
					'sticky-header' => esc_attr__( 'Sticky menu', 'airi' ),
					'static-header' => esc_attr__( 'Static menu', 'airi' ),
				),
			)
		);

		// Header Search.
		$wp_customize->add_setting(
			'test_disable_header_search',
			array(
				'default'           => $this->defaults['test_disable_header_search'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			'test_disable_header_search',
			array(
				'label'   => __( 'Disable header search icon?', 'airi' ),
				'section' => 'test_airi_section_menu',
				'type'    => 'checkbox',
			)
		);

		// Menu 5 conditional fields.
		$wp_customize->add_setting(
			'test_menu5_custom_text',
			array(
				'default'           => $this->defaults['test_menu5_custom_text'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'test_menu5_custom_text',
			array(
				'label'           => __( 'Custom Text', 'airi' ),
				'section'         => 'test_airi_section_menu',
				'type'            => 'text',
				'active_callback' => 'airi_section_menu_menu5_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'test_menu5_facebook',
			array(
				'default'           => $this->defaults['test_menu5_facebook'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'test_menu5_facebook',
			array(
				'label'           => __( 'Facebook', 'airi' ),
				'section'         => 'test_airi_section_menu',
				'type'            => 'text',
				'active_callback' => 'airi_section_menu_menu5_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'test_menu5_twitter',
			array(
				'default'           => $this->defaults['test_menu5_twitter'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'test_menu5_twitter',
			array(
				'label'           => __( 'Twitter', 'airi' ),
				'section'         => 'test_airi_section_menu',
				'type'            => 'text',
				'active_callback' => 'airi_section_menu_menu5_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'test_menu5_google',
			array(
				'default'           => $this->defaults['test_menu5_google'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'test_menu5_google',
			array(
				'label'           => __( 'Google +', 'airi' ),
				'section'         => 'test_airi_section_menu',
				'type'            => 'text',
				'active_callback' => 'airi_section_menu_menu5_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'test_menu5_linkedin',
			array(
				'default'           => $this->defaults['test_menu5_linkedin'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'test_menu5_linkedin',
			array(
				'label'           => __( 'Linkedin', 'airi' ),
				'section'         => 'test_airi_section_menu',
				'type'            => 'text',
				'active_callback' => 'airi_section_menu_menu5_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'test_menu5_skype',
			array(
				'default'           => $this->defaults['test_menu5_skype'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'test_menu5_skype',
			array(
				'label'           => __( 'Skype', 'airi' ),
				'section'         => 'test_airi_section_menu',
				'type'            => 'text',
				'active_callback' => 'airi_section_menu_menu5_conditional_display',
			)
		);

	}

}

/**
 * Initialise our Customizer settings
 */
$airi_settings = new Airi_Initialise_Customizer_Header_Settings(
	array(
		'test_menu_type'             => 'menuStyle2',
		'test_menu_container'        => 'menuNotContained',
		'test_sticky_menu'           => 'sticky-header',
		'test_disable_header_search' => '',
		'test_menu5_custom_text'     => __( 'Call Us', 'airi' ),
		'test_menu5_facebook'        => '',
		'test_menu5_twitter'         => '',
		'test_menu5_google'          => '',
		'test_menu5_linkedin'        => '',
		'test_menu5_skype'           => '',
	)
);

/**
 * Callback to display fields only if Menu 5 selected
 */
if ( ! function_exists( 'airi_section_menu_menu5_conditional_display' ) ) {
	function airi_section_menu_menu5_conditional_display() {
		$test_menu_type = get_theme_mod( 'test_menu_type' );
		if ( ( $test_menu_type === 'menuStyle5' ) ) {
			return true;
		}
		return false;
	}
}
