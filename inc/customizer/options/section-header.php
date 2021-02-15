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
			'airi_panel_header',
			array(
				'priority' => 9,
				'title'    => __( 'Header', 'airi' ),
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
			'airi_section_menu',
			array(
				'title' => __( 'Menu', 'airi' ),
				'panel' => 'airi_panel_header',
			)
		);

	}

	/**
	 * Register our Header Controls
	 */
	public function airi_register_controls( $wp_customize ) {

		// Menu Type.
		$wp_customize->add_setting(
			'menu_type',
			array(
				'default'           => $this->defaults['menu_type'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'menu_type',
			array(
				'label'   => __( 'Menu Type', 'airi' ),
				'section' => 'airi_section_menu',
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
			'menu_container',
			array(
				'default'           => $this->defaults['menu_container'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'menu_container',
			array(
				'label'           => __( 'Menu Width', 'airi' ),
				'section'         => 'airi_section_menu',
				'type'            => 'radio',
				'choices'         => array(
					'menuContained'    => esc_attr__( 'Contained', 'airi' ),
					'menuNotContained' => esc_attr__( 'Not contained', 'airi' ),
				),
				'active_callback' => function () {
					$menu_type = get_theme_mod( 'menu_type' );
					if ( ( $menu_type === 'menuStyle5' ) || ( $menu_type === 'menuStyle6' ) ) {
						return false;
					}
					return true;
				},
			)
		);

		// Sticky Header.
		$wp_customize->add_setting(
			'sticky_menu',
			array(
				'default'           => $this->defaults['sticky_menu'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'sticky_menu',
			array(
				'label'   => __( 'Sticky menu', 'airi' ),
				'section' => 'airi_section_menu',
				'type'    => 'radio',
				'choices' => array(
					'sticky-header' => esc_attr__( 'Sticky menu', 'airi' ),
					'static-header' => esc_attr__( 'Static menu', 'airi' ),
				),
			)
		);

		// Menu style 3 conditional options.
		$wp_customize->add_setting(
			'titleMenuStyle3'
		);
		$wp_customize->add_control(
			new Airi_Label_Custom_Control(
				$wp_customize,
				'titleMenuStyle3',
				array(
					'label'           => __( '*Extended 1* menu options', 'airi' ),
					'section'         => 'airi_section_menu',
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'dividerMenuStyle30'
		);
		$wp_customize->add_control(
			new Airi_HTML_Divider_Custom_Control(
				$wp_customize,
				'dividerMenuStyle30',
				array(
					'section'         => 'airi_section_menu',
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'x1_cta_text',
			array(
				'default'           => $this->defaults['x1_cta_text'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'x1_cta_text',
			array(
				'type'            => 'text',
				'label'           => __( 'Call to action text', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu3_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'x1_cta_url',
			array(
				'default'           => $this->defaults['x1_cta_url'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'x1_cta_url',
			array(
				'type'            => 'text',
				'label'           => __( 'Call to action URL', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu3_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'dividerMenuStyle31'
		);
		$wp_customize->add_control(
			new Airi_HTML_Divider_Custom_Control(
				$wp_customize,
				'dividerMenuStyle31',
				array(
					'section'         => 'airi_section_menu',
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		// Repeater.
		// Add our Sortable Repeater setting and Custom Control for Social media URLs
		$wp_customize->add_setting(
			'x1_header_social',
			array(
				'default'   => $this->defaults['x1_header_social'],
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new Airi_Sortable_Repeater_Custom_Control(
				$wp_customize,
				'x1_header_social',
				array(
					'label'           => __( 'Social links', 'airi' ),
					'description'     => __( 'Select social icons and insert links', 'airi' ),
					'section'         => 'airi_section_menu',
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
					'button_labels'   => array(
						'add' => __( 'Add Icon', 'airi' ),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'dividerMenuStyle32'
		);
		$wp_customize->add_control(
			new Airi_HTML_Divider_Custom_Control(
				$wp_customize,
				'dividerMenuStyle32',
				array(
					'section'         => 'airi_section_menu',
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'x1_email_address',
			array(
				'default'           => $this->defaults['x1_email_address'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'x1_email_address',
			array(
				'type'            => 'text',
				'label'           => __( 'Email address', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu3_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'dividerMenuStyle33'
		);
		$wp_customize->add_control(
			new Airi_HTML_Divider_Custom_Control(
				$wp_customize,
				'dividerMenuStyle33',
				array(
					'section'         => 'airi_section_menu',
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'x1_phone_number',
			array(
				'default'           => $this->defaults['x1_phone_number'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'x1_phone_number',
			array(
				'type'            => 'text',
				'label'           => __( 'Phone number', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu3_conditional_display',
			)
		);

		// Menu style 4 conditional options.
		$wp_customize->add_setting(
			'titleMenuStyle4'
		);
		$wp_customize->add_control(
			new Airi_Label_Custom_Control(
				$wp_customize,
				'titleMenuStyle4',
				array(
					'label'           => __( '*Extended 2* menu options', 'airi' ),
					'section'         => 'airi_section_menu',
					'active_callback' => 'airi_section_menu_menu4_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'dividerMenuStyle40'
		);
		$wp_customize->add_control(
			new Airi_HTML_Divider_Custom_Control(
				$wp_customize,
				'dividerMenuStyle40',
				array(
					'section'         => 'airi_section_menu',
					'active_callback' => 'airi_section_menu_menu4_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'cta_text_menustyle4',
			array(
				'default'           => $this->defaults['cta_text_menustyle4'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'cta_text_menustyle4',
			array(
				'type'            => 'text',
				'label'           => __( 'Call to action text', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu4_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'cta_url_menustyle4',
			array(
				'default'           => $this->defaults['cta_url_menustyle4'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'cta_url_menustyle4',
			array(
				'type'            => 'text',
				'label'           => __( 'Call to action URL', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu4_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'dividerMenuStyle41'
		);
		$wp_customize->add_control(
			new Airi_HTML_Divider_Custom_Control(
				$wp_customize,
				'dividerMenuStyle41',
				array(
					'section'         => 'airi_section_menu',
					'active_callback' => 'airi_section_menu_menu4_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'above_phone_number',
			array(
				'default'           => $this->defaults['above_phone_number'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'above_phone_number',
			array(
				'type'            => 'text',
				'label'           => __( 'Above phone number text', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu4_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'phone_number',
			array(
				'default'           => $this->defaults['phone_number'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'phone_number',
			array(
				'type'            => 'text',
				'label'           => __( 'Phone number', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu4_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'dividerMenuStyle42'
		);
		$wp_customize->add_control(
			new Airi_HTML_Divider_Custom_Control(
				$wp_customize,
				'dividerMenuStyle42',
				array(
					'section'         => 'airi_section_menu',
					'active_callback' => 'airi_section_menu_menu4_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'above_address',
			array(
				'default'           => $this->defaults['above_address'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'above_address',
			array(
				'type'            => 'text',
				'label'           => __( 'Above address text', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu4_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'address_details',
			array(
				'default'           => $this->defaults['address_details'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'address_details',
			array(
				'type'            => 'text',
				'label'           => __( 'Your address', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu4_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'dividerMenuStyle43'
		);
		$wp_customize->add_control(
			new Airi_HTML_Divider_Custom_Control(
				$wp_customize,
				'dividerMenuStyle43',
				array(
					'section'         => 'airi_section_menu',
					'active_callback' => 'airi_section_menu_menu4_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'above_opening',
			array(
				'default'           => $this->defaults['above_opening'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'above_opening',
			array(
				'type'            => 'text',
				'label'           => __( 'Above opening hours', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu4_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'opening_hours',
			array(
				'default'           => $this->defaults['opening_hours'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'opening_hours',
			array(
				'type'            => 'text',
				'label'           => __( 'Opening hours', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu4_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'dividerMenuStyle44'
		);
		$wp_customize->add_control(
			new Airi_HTML_Divider_Custom_Control(
				$wp_customize,
				'dividerMenuStyle44',
				array(
					'section'         => 'airi_section_menu',
					'active_callback' => 'airi_section_menu_menu4_conditional_display',
				)
			)
		);

		// Header Search.
		$wp_customize->add_setting(
			'disable_header_search',
			array(
				'default'           => $this->defaults['disable_header_search'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			'disable_header_search',
			array(
				'label'   => __( 'Disable header search icon?', 'airi' ),
				'section' => 'airi_section_menu',
				'type'    => 'checkbox',
			)
		);

		// Menu 5 conditional fields.
		$wp_customize->add_setting(
			'menu5_custom_text',
			array(
				'default'           => $this->defaults['menu5_custom_text'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'menu5_custom_text',
			array(
				'label'           => __( 'Custom Text', 'airi' ),
				'section'         => 'airi_section_menu',
				'type'            => 'text',
				'active_callback' => 'airi_section_menu_menu5_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'menu5_facebook',
			array(
				'default'           => $this->defaults['menu5_facebook'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'menu5_facebook',
			array(
				'label'           => __( 'Facebook', 'airi' ),
				'section'         => 'airi_section_menu',
				'type'            => 'text',
				'active_callback' => 'airi_section_menu_menu5_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'menu5_twitter',
			array(
				'default'           => $this->defaults['menu5_twitter'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'menu5_twitter',
			array(
				'label'           => __( 'Twitter', 'airi' ),
				'section'         => 'airi_section_menu',
				'type'            => 'text',
				'active_callback' => 'airi_section_menu_menu5_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'menu5_google',
			array(
				'default'           => $this->defaults['menu5_google'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'menu5_google',
			array(
				'label'           => __( 'Google +', 'airi' ),
				'section'         => 'airi_section_menu',
				'type'            => 'text',
				'active_callback' => 'airi_section_menu_menu5_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'menu5_linkedin',
			array(
				'default'           => $this->defaults['menu5_linkedin'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'menu5_linkedin',
			array(
				'label'           => __( 'Linkedin', 'airi' ),
				'section'         => 'airi_section_menu',
				'type'            => 'text',
				'active_callback' => 'airi_section_menu_menu5_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'menu5_skype',
			array(
				'default'           => $this->defaults['menu5_skype'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'menu5_skype',
			array(
				'label'           => __( 'Skype', 'airi' ),
				'section'         => 'airi_section_menu',
				'type'            => 'text',
				'active_callback' => 'airi_section_menu_menu5_conditional_display',
			)
		);

		// Menu Style 6 conditionals.
		$wp_customize->add_setting(
			'menu6_top_section_left',
			array(
				'default'           => $this->defaults['menu6_top_section_left'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'menu6_top_section_left',
			array(
				'type'            => 'textarea',
				'label'           => __( 'Block Top Left Content', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu6_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'menu6_top_section_right',
			array(
				'default'           => $this->defaults['menu6_top_section_right'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'menu6_top_section_right',
			array(
				'type'            => 'textarea',
				'label'           => __( 'Block Top Right Content', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu6_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'menu6_button_text',
			array(
				'default'           => $this->defaults['menu6_button_text'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'menu6_button_text',
			array(
				'type'            => 'text',
				'label'           => __( 'Button Text', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu6_conditional_display',
			)
		);

		$wp_customize->add_setting(
			'menu6_button_url',
			array(
				'default'           => $this->defaults['menu6_button_url'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'menu6_button_url',
			array(
				'type'            => 'text',
				'label'           => __( 'Button Url', 'airi' ),
				'section'         => 'airi_section_menu',
				'active_callback' => 'airi_section_menu_menu6_conditional_display',
			)
		);

	}

}

/**
 * Initialise our Customizer settings
 */
$airi_settings = new Airi_Initialise_Customizer_Header_Settings(
	array(
		'menu_type'               => 'menuStyle2',
		'menu_container'          => 'menuNotContained',
		'sticky_menu'             => 'sticky-header',
		'cta_text_menustyle4'     => esc_attr__( 'Get a quote', 'airi' ),
		'cta_url_menustyle4'      => esc_attr__( 'http://example.org/contact/', 'airi' ),
		'x1_header_social'        => array(
			array(
				'icon'     => 'fa-facebook',
				'link_url' => 'https://facebook.com/yourprofile',
			),
			array(
				'icon'     => 'fa-twitter',
				'link_url' => 'https://twitter.com/yourprofile',
			),
		),
		'x1_cta_text'             => esc_attr__( 'Get a quote', 'airi' ),
		'x1_cta_url'              => esc_attr__( 'http://example.org/contact/', 'airi' ),
		'x1_email_address'        => 'office@example.org',
		'x1_phone_number'         => '+333.222.111',
		'above_phone_number'      => esc_attr__( 'Call us', 'airi' ),
		'phone_number'            => '999.999.999',
		'above_address'           => esc_attr__( 'Address', 'airi' ),
		'address_details'         => esc_attr__( 'Brooklyn Street', 'airi' ),
		'above_opening'           => esc_attr__( 'Opening hours', 'airi' ),
		'opening_hours'           => esc_attr__( '9-18 Mon-Fri', 'airi' ),
		'disable_header_search'   => '',
		'menu5_custom_text'       => __( 'Call Us', 'airi' ),
		'menu5_facebook'          => '',
		'menu5_twitter'           => '',
		'menu5_google'            => '',
		'menu5_linkedin'          => '',
		'menu5_skype'             => '',
		'menu6_top_section_left'  => '',
		'menu6_top_section_right' => '',
		'menu6_button_text'       => '',
		'menu6_button_url'        => '',
	)
);
