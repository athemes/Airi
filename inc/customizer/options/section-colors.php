<?php
/**
 * Customizer Colors Controls
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class Airi_Initialise_Customizer_Colors_Settings {

	/**
	 * @var array $defaults Get our default values.
	 */
	private $defaults;

	/**
	 * @var array $default_palette
	 */
	private $default_palette;

	/**
	 * Construct
	 */
	public function __construct( $defaults, $default_palette = array() ) {
		// Get our Customizer defaults.
		$this->defaults = $defaults;

		$this->default_palette = $default_palette;

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
		 * Add our Colors Panel
		 */
		$wp_customize->add_panel(
			'airi_panel_colors',
			array(
				'priority' => 9,
				'title'    => __( 'Colors', 'airi' ),
			)
		);
	}


	/**
	 * Register the Customizer sections
	 */
	public function airi_add_customizer_sections( $wp_customize ) {
		/**
		 * Header colors
		 */
		$wp_customize->add_section(
			'airi_section_colors_header',
			array(
				'title'       => esc_attr__( 'Header', 'airi' ),
				'panel'       => 'airi_panel_colors',
				'description' => esc_attr__( 'Different color options show up here, based on the type of menu you select from the Header > Menu section', 'airi' ),
				'priority'    => 11,
			)
		);

		/**
		 * Blog colors
		 */
		$wp_customize->add_section(
			'airi_section_colors_blog',
			array(
				'title'    => esc_attr__( 'Blog', 'airi' ),
				'panel'    => 'airi_panel_colors',
				'priority' => 12,
			)
		);

		/**
		 * Widgets
		 */
		$wp_customize->add_section(
			'airi_section_colors_widgets',
			array(
				'title'    => esc_attr__( 'Sidebar&amp;footer widgets', 'airi' ),
				'panel'    => 'airi_panel_colors',
				'priority' => 12,
			)
		);

	}


	/**
	 * Register our Colors Controls
	 */
	public function airi_register_controls( $wp_customize ) {

		/**
		 * General
		 */
		$wp_customize->add_setting(
			'color_primary',
			array(
				'default'           => $this->defaults['color_primary'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_primary',
				array(
					'label'        => esc_attr__( 'Primary color', 'airi' ),
					'section'      => 'colors',
					'show_opacity' => true,
					'palette'      => $this->default_palette,
				)
			)
		);

		/**
		 * Header colors
		 */

		// Menu 1.
		$wp_customize->add_setting(
			'color_mt1_site_title',
			array(
				'default'           => $this->defaults['color_mt1_site_title'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt1_site_title',
				array(
					'label'           => esc_attr__( 'Site title', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt1_site_title_sticky',
			array(
				'default'           => $this->defaults['color_mt1_site_title_sticky'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt1_site_title_sticky',
				array(
					'label'           => esc_attr__( 'Site title (sticky)', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt1_site_desc',
			array(
				'default'           => $this->defaults['color_mt1_site_desc'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt1_site_desc',
				array(
					'label'           => esc_attr__( 'Site description', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt1_site_desc_sticky',
			array(
				'default'           => $this->defaults['color_mt1_site_desc_sticky'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt1_site_desc_sticky',
				array(
					'label'           => esc_attr__( 'Site description (sticky)', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt1_top_menu_items',
			array(
				'default'           => $this->defaults['color_mt1_top_menu_items'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt1_top_menu_items',
				array(
					'label'           => esc_attr__( 'Top level menu items', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt1_top_menu_items_sticky',
			array(
				'default'           => $this->defaults['color_mt1_top_menu_items_sticky'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt1_top_menu_items_sticky',
				array(
					'label'           => esc_attr__( 'Top level menu items (sticky)', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt1_bg_color',
			array(
				'default'           => $this->defaults['color_mt1_bg_color'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt1_bg_color',
				array(
					'label'           => esc_attr__( 'Background color', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt1_bg_color_sticky',
			array(
				'default'           => $this->defaults['color_mt1_bg_color_sticky'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt1_bg_color_sticky',
				array(
					'label'           => esc_attr__( 'Background color (sticky)', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		// Menu 2.
		$wp_customize->add_setting(
			'color_mt2_site_title',
			array(
				'default'           => $this->defaults['color_mt2_site_title'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt2_site_title',
				array(
					'label'           => esc_attr__(
						'Site title',
						'airi'
					),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu2_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt2_site_title_sticky',
			array(
				'default'           => $this->defaults['color_mt2_site_title_sticky'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt2_site_title_sticky',
				array(
					'label'           => esc_attr__( 'Site title (sticky)', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu2_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt2_site_desc',
			array(
				'default'           => $this->defaults['color_mt2_site_desc'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt2_site_desc',
				array(
					'label'           => esc_attr__( 'Site description', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu2_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt2_site_desc_sticky',
			array(
				'default'           => $this->defaults['color_mt2_site_desc_sticky'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt2_site_desc_sticky',
				array(
					'label'           => esc_attr__( 'Site description (sticky)', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu2_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt2_top_menu_items',
			array(
				'default'           => $this->defaults['color_mt2_top_menu_items'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt2_top_menu_items',
				array(
					'label'           => esc_attr__( 'Top level menu items', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu2_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt2_top_menu_items_sticky',
			array(
				'default'           => $this->defaults['color_mt2_top_menu_items_sticky'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt2_top_menu_items_sticky',
				array(
					'label'           => esc_attr__( 'Top level menu items (sticky)', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu2_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt2_bg_color',
			array(
				'default'           => $this->defaults['color_mt2_bg_color'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt2_bg_color',
				array(
					'label'           => esc_attr__( 'Background color', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu2_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt2_bg_color_sticky',
			array(
				'default'           => $this->defaults['color_mt2_bg_color_sticky'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt2_bg_color_sticky',
				array(
					'label'           => esc_attr__( 'Background color (sticky)', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu2_conditional_display',
				)
			)
		);

		// Menu 3.
		$wp_customize->add_setting(
			'color_mt3_top_bar',
			array(
				'default'           => $this->defaults['color_mt3_top_bar'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt3_top_bar',
				array(
					'label'           => esc_attr__( 'Top bar background', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt3_top_bar_color',
			array(
				'default'           => $this->defaults['color_mt3_top_bar_color'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt3_top_bar_color',
				array(
					'label'           => esc_attr__( 'Top bar color', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt3_site_title',
			array(
				'default'           => $this->defaults['color_mt3_site_title'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt3_site_title',
				array(
					'label'           => esc_attr__( 'Site title', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt3_site_title_sticky',
			array(
				'default'           => $this->defaults['color_mt3_site_title_sticky'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt3_site_title_sticky',
				array(
					'label'           => esc_attr__( 'Site title (sticky)', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt3_site_desc',
			array(
				'default'           => $this->defaults['color_mt3_site_desc'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt3_site_desc',
				array(
					'label'           => esc_attr__( 'Site description', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt3_site_desc_sticky',
			array(
				'default'           => $this->defaults['color_mt3_site_desc_sticky'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt3_site_desc_sticky',
				array(
					'label'           => esc_attr__( 'Site description (sticky)', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt3_top_menu_items',
			array(
				'default'           => $this->defaults['color_mt3_top_menu_items'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt3_top_menu_items',
				array(
					'label'           => esc_attr__( 'Top level menu items', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt3_top_menu_items_sticky',
			array(
				'default'           => $this->defaults['color_mt3_top_menu_items_sticky'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt3_top_menu_items_sticky',
				array(
					'label'           => esc_attr__( 'Top level menu items (sticky)', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt3_bg_color',
			array(
				'default'           => $this->defaults['color_mt3_bg_color'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt3_bg_color',
				array(
					'label'           => esc_attr__( 'Background color', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt3_bg_color_sticky',
			array(
				'default'           => $this->defaults['color_mt3_bg_color_sticky'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt3_bg_color_sticky',
				array(
					'label'           => esc_attr__( 'Background color (sticky)', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu3_conditional_display',
				)
			)
		);

		// Menu 4.
		$wp_customize->add_setting(
			'color_mt4_site_title',
			array(
				'default'           => $this->defaults['color_mt4_site_title'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt4_site_title',
				array(
					'label'           => esc_attr__( 'Site title', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu4_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt4_site_desc',
			array(
				'default'           => $this->defaults['color_mt4_site_desc'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt4_site_desc',
				array(
					'label'           => esc_attr__( 'Site description', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu4_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt4_menu_bg_color',
			array(
				'default'           => $this->defaults['color_mt4_menu_bg_color'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt4_menu_bg_color',
				array(
					'label'           => esc_attr__( 'Menu background color', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu4_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt4_top_menu_items',
			array(
				'default'           => $this->defaults['color_mt4_top_menu_items'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt4_top_menu_items',
				array(
					'label'           => esc_attr__( 'Top level menu items', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu4_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt4_bg_color',
			array(
				'default'           => $this->defaults['color_mt4_bg_color'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt4_bg_color',
				array(
					'label'           => esc_attr__( 'Background color', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu4_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt4_top_line',
			array(
				'default'           => $this->defaults['color_mt4_top_line'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt4_top_line',
				array(
					'label'           => esc_attr__( 'Contact blocks - top line', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu4_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'color_mt4_bottom_line',
			array(
				'default'           => $this->defaults['color_mt4_bottom_line'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_mt4_bottom_line',
				array(
					'label'           => esc_attr__( 'Contact blocks - bottom line', 'airi' ),
					'section'         => 'airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu4_conditional_display',
				)
			)
		);

		// Submenu.
		$wp_customize->add_setting(
			'color_submenu_items',
			array(
				'default'           => $this->defaults['color_submenu_items'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_submenu_items',
				array(
					'label'        => esc_attr__( 'Submenu items', 'airi' ),
					'section'      => 'airi_section_colors_header',
					'show_opacity' => true,
					'palette'      => $this->default_palette,
				)
			)
		);

		$wp_customize->add_setting(
			'color_submenu_bg',
			array(
				'default'           => $this->defaults['color_submenu_bg'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_submenu_bg',
				array(
					'label'        => esc_attr__( 'Submenu background', 'airi' ),
					'section'      => 'airi_section_colors_header',
					'show_opacity' => true,
					'palette'      => $this->default_palette,
				)
			)
		);

		$wp_customize->add_setting(
			'mobile_toggle_color',
			array(
				'default'           => $this->defaults['mobile_toggle_color'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'mobile_toggle_color',
				array(
					'label'        => esc_attr__( 'Mobile toggle color', 'airi' ),
					'section'      => 'airi_section_colors_header',
					'show_opacity' => true,
					'palette'      => $this->default_palette,
				)
			)
		);

		/**
		 * Blog colors
		 */
		$wp_customize->add_setting(
			'color_index_post_title',
			array(
				'default'           => $this->defaults['color_index_post_title'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_index_post_title',
				array(
					'label'        => esc_attr__( 'Post title (archives)', 'airi' ),
					'section'      => 'airi_section_colors_blog',
					'show_opacity' => true,
					'palette'      => $this->default_palette,
				)
			)
		);

		$wp_customize->add_setting(
			'color_single_post_title',
			array(
				'default'           => $this->defaults['color_single_post_title'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_single_post_title',
				array(
					'label'        => esc_attr__( 'Post title (single)', 'airi' ),
					'section'      => 'airi_section_colors_blog',
					'show_opacity' => true,
					'palette'      => $this->default_palette,
				)
			)
		);

		$wp_customize->add_setting(
			'color_meta_cat_bg',
			array(
				'default'           => $this->defaults['color_meta_cat_bg'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_meta_cat_bg',
				array(
					'label'        => esc_attr__( 'Categories (single and archives)', 'airi' ),
					'section'      => 'airi_section_colors_blog',
					'show_opacity' => true,
					'palette'      => $this->default_palette,
				)
			)
		);

		$wp_customize->add_setting(
			'color_meta_text',
			array(
				'default'           => $this->defaults['color_meta_text'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_meta_text',
				array(
					'label'        => esc_attr__( 'Meta text', 'airi' ),
					'section'      => 'airi_section_colors_blog',
					'show_opacity' => true,
					'palette'      => $this->default_palette,
				)
			)
		);

		$wp_customize->add_setting(
			'color_meta_links',
			array(
				'default'           => $this->defaults['color_meta_links'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_meta_links',
				array(
					'label'        => esc_attr__( 'Meta links', 'airi' ),
					'section'      => 'airi_section_colors_blog',
					'show_opacity' => true,
					'palette'      => $this->default_palette,
				)
			)
		);

		$wp_customize->add_setting(
			'color_post_text',
			array(
				'default'           => $this->defaults['color_post_text'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_post_text',
				array(
					'label'        => esc_attr__( 'Body text', 'airi' ),
					'section'      => 'airi_section_colors_blog',
					'show_opacity' => true,
					'palette'      => $this->default_palette,
				)
			)
		);

		/**
		 * Widget colors
		 */
		$wp_customize->add_setting(
			'color_widgets_title',
			array(
				'default'           => $this->defaults['color_widgets_title'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_widgets_title',
				array(
					'label'        => esc_attr__( 'Widget titles', 'airi' ),
					'section'      => 'airi_section_colors_widgets',
					'show_opacity' => true,
					'palette'      => $this->default_palette,
				)
			)
		);

		$wp_customize->add_setting(
			'color_widgets_text',
			array(
				'default'           => $this->defaults['color_widgets_text'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_widgets_text',
				array(
					'label'        => esc_attr__( 'Widget text', 'airi' ),
					'section'      => 'airi_section_colors_widgets',
					'show_opacity' => true,
					'palette'      => $this->default_palette,
				)
			)
		);

		$wp_customize->add_setting(
			'color_widgets_links',
			array(
				'default'           => $this->defaults['color_widgets_links'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'color_widgets_links',
				array(
					'label'        => esc_attr__( 'Widget links', 'airi' ),
					'section'      => 'airi_section_colors_widgets',
					'show_opacity' => true,
					'palette'      => $this->default_palette,
				)
			)
		);

		$wp_customize->get_section( 'colors' )->title 				= esc_attr__( 'General', 'airi' );
		$wp_customize->get_section( 'colors' )->panel 				= 'airi_panel_colors';
		$wp_customize->get_section( 'colors' )->priority 			= '10';

	}

}


/**
 * Initialise our Customizer settings
 */
$default_palette = array(
	'#000',
	'#fff',
	'#df312c',
	'#df9a23',
	'#eef000',
	'#7ed934',
	'#1571c1',
	'#8309e7',
);

$airi_settings = new Airi_Initialise_Customizer_Colors_Settings(
	array(
		'color_primary'                   => '#f0437e',
		'color_mt1_site_title'            => '#ffffff',
		'color_mt1_site_title_sticky'     => '#191919',
		'color_mt1_site_desc'             => '#ffffff',
		'color_mt1_site_desc_sticky'      => '#191919',
		'color_mt1_top_menu_items'        => '#ffffff',
		'color_mt1_top_menu_items_sticky' => '#191919',
		'color_mt1_bg_color'              => '',
		'color_mt1_bg_color_sticky'       => '#ffffff',
		'color_mt2_site_title'            => '#191919',
		'color_mt2_site_title_sticky'     => '#191919',
		'color_mt2_site_desc'             => '#707070',
		'color_mt2_site_desc_sticky'      => '#707070',
		'color_mt2_top_menu_items'        => '#191919',
		'color_mt2_top_menu_items_sticky' => '#191919',
		'color_mt2_bg_color'              => '#fff',
		'color_mt2_bg_color_sticky'       => '#ffffff',
		'color_mt3_top_bar'               => '#fff',
		'color_mt3_top_bar_color'         => '#191919',
		'color_mt3_site_title'            => '#ffffff',
		'color_mt3_site_title_sticky'     => '#191919',
		'color_mt3_site_desc'             => '#ffffff',
		'color_mt3_site_desc_sticky'      => '#191919',
		'color_mt3_top_menu_items'        => '#ffffff',
		'color_mt3_top_menu_items_sticky' => '#191919',
		'color_mt3_bg_color'              => 'transparent',
		'color_mt3_bg_color_sticky'       => '#ffffff',
		'color_mt4_site_title'            => '#191919',
		'color_mt4_site_desc'             => '#707070',
		'color_mt4_menu_bg_color'         => '#0e304e',
		'color_mt4_top_menu_items'        => '#fff',
		'color_mt4_bg_color'              => '#fff',
		'color_mt4_top_line'              => '#595959',
		'color_mt4_bottom_line'           => '#0e304e',
		'color_submenu_items'             => '#1c1c1c',
		'color_submenu_bg'                => '#f7f7f7',
		'mobile_toggle_color'             => '',
		'color_index_post_title'          => '#191919',
		'color_single_post_title'         => '#191919',
		'color_meta_cat_bg'               => '#eff1f4',
		'color_meta_text'                 => '#bfbfbf',
		'color_meta_links'                => '#595959',
		'color_post_text'                 => '#595959',
		'color_widgets_title'             => '#191919',
		'color_widgets_text'              => '#707070',
		'color_widgets_links'             => '#595959',
	),
	$default_palette,
);

if ( ! function_exists( 'airi_custom_colors_styles' ) ) {
	function airi_custom_colors_styles() {
		$custom_styles = '';

		$color_primary                   = get_theme_mod( 'color_primary' );
		$color_mt1_site_title            = get_theme_mod( 'color_mt1_site_title' );
		$color_mt1_site_title_sticky     = get_theme_mod( 'color_mt1_site_title_sticky' );
		$color_mt1_site_desc             = get_theme_mod( 'color_mt1_site_desc' );
		$color_mt1_site_desc_sticky      = get_theme_mod( 'color_mt1_site_desc_sticky' );
		$color_mt1_top_menu_items        = get_theme_mod( 'color_mt1_top_menu_items' );
		$color_mt1_top_menu_items_sticky = get_theme_mod( 'color_mt1_top_menu_items_sticky' );
		$color_mt1_bg_color              = get_theme_mod( 'color_mt1_bg_color' );
		$color_mt1_bg_color_sticky       = get_theme_mod( 'color_mt1_bg_color_sticky' );
		$color_mt2_site_title            = get_theme_mod( 'color_mt2_site_title' );
		$color_mt2_site_title_sticky     = get_theme_mod( 'color_mt2_site_title_sticky' );
		$color_mt2_site_desc             = get_theme_mod( 'color_mt2_site_desc' );
		$color_mt2_site_desc_sticky      = get_theme_mod( 'color_mt2_site_desc_sticky' );
		$color_mt2_top_menu_items        = get_theme_mod( 'color_mt2_top_menu_items' );
		$color_mt2_top_menu_items_sticky = get_theme_mod( 'color_mt2_top_menu_items_sticky' );
		$color_mt2_bg_color              = get_theme_mod( 'color_mt2_bg_color' );
		$color_mt2_bg_color_sticky       = get_theme_mod( 'color_mt2_bg_color_sticky' );
		$color_mt3_top_bar               = get_theme_mod( 'color_mt3_top_bar' );
		$color_mt3_top_bar_color         = get_theme_mod( 'color_mt3_top_bar_color' );
		$color_mt3_site_title            = get_theme_mod( 'color_mt3_site_title' );
		$color_mt3_site_title_sticky     = get_theme_mod( 'color_mt3_site_title_sticky' );
		$color_mt3_site_desc             = get_theme_mod( 'color_mt3_site_desc' );
		$color_mt3_site_desc_sticky      = get_theme_mod( 'color_mt3_site_desc_sticky' );
		$color_mt3_top_menu_items        = get_theme_mod( 'color_mt3_top_menu_items' );
		$color_mt3_top_menu_items_sticky = get_theme_mod( 'color_mt3_top_menu_items_sticky' );
		$color_mt3_bg_color              = get_theme_mod( 'color_mt3_bg_color' );
		$color_mt3_bg_color_sticky       = get_theme_mod( 'color_mt3_bg_color_sticky' );
		$color_mt4_site_title            = get_theme_mod( 'color_mt4_site_title' );
		$color_mt4_site_desc             = get_theme_mod( 'color_mt4_site_desc' );
		$color_mt4_menu_bg_color         = get_theme_mod( 'color_mt4_menu_bg_color' );
		$color_mt4_top_menu_items        = get_theme_mod( 'color_mt4_top_menu_items' );
		$color_mt4_bg_color              = get_theme_mod( 'color_mt4_bg_color' );
		$color_mt4_top_line              = get_theme_mod( 'color_mt4_top_line' );
		$color_mt4_bottom_line           = get_theme_mod( 'color_mt4_bottom_line' );
		$color_submenu_items             = get_theme_mod( 'color_submenu_items' );
		$color_submenu_bg                = get_theme_mod( 'color_submenu_bg' );
		$mobile_toggle_color             = get_theme_mod( 'mobile_toggle_color' );
		$color_index_post_title          = get_theme_mod( 'color_index_post_title' );
		$color_single_post_title         = get_theme_mod( 'color_single_post_title' );
		$color_meta_cat_bg               = get_theme_mod( 'color_meta_cat_bg' );
		$color_meta_text                 = get_theme_mod( 'color_meta_text' );
		$color_meta_links                = get_theme_mod( 'color_meta_links' );
		$color_post_text                 = get_theme_mod( 'color_post_text' );
		$color_widgets_title             = get_theme_mod( 'color_widgets_title' );
		$color_widgets_text              = get_theme_mod( 'color_widgets_text' );
		$color_widgets_links             = get_theme_mod( 'color_widgets_links' );

		if ( $color_primary ) {
			$custom_styles .= ".woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.product div.entry-summary p.price, .product div.entry-summary span.price,.athemes-blog:not(.airi_athemes_blog_skin) .posted-on a,.athemes-blog:not(.airi_athemes_blog_skin) .byline a:hover,.testimonials-section.style1:before,.single-post .read-more-link .gt,.blog-loop .read-more-link .gt,.single-post .posted-on a,.blog-loop .posted-on a,.entry-title a:hover,.airi_recent_entries .post-date,.menuStyle3 .top-bar .contact-item .fa,.menuStyle4 .contact-area .contact-block .contact-icon,.widget_categories li:hover::before,.widget_categories li:hover a {color: $color_primary; }";
			$custom_styles .= ".product .single_add_to_cart_button.button.alt,.menuStyle4 .contact-area .contact-block .contact-icon,button,.button,input[type=\"button\"],input[type=\"reset\"],input[type=\"submit\"] { border-color: $color_primary; }";
			$custom_styles .= ".woocommerce-checkout button.button.alt,.woocommerce-checkout button.button.alt:hover,.woocommerce-cart .cart-collaterals .cart_totals .button:hover,.woocommerce-cart .cart-collaterals .cart_totals .button,.product .single_add_to_cart_button.button.alt:hover,.product .single_add_to_cart_button.button.alt,.woocommerce ul.products li.product .button,.menuStyle2 .main-navigation a:hover:after, .menuStyle2 .main-navigation .current-menu-item:after,.comments-area .comment-reply-link:hover,.menuStyle4 .main-navigation .header-cta:before,.menuStyle4 .main-navigation .header-cta,button,.button,input[type=\"button\"],input[type=\"reset\"],input[type=\"submit\"],.menuStyle3 .main-navigation a:hover:after,.menuStyle3 .main-navigation .current-menu-item:after { background-color: $color_primary; }";
		}
		if ( $color_mt1_site_title ) {
			$custom_styles .= ".menuStyle1 .site-title a { color: $color_mt1_site_title; }";
		}
		if ( $color_mt1_site_title_sticky ) {
			$custom_styles .= ".menuStyle1 .sticky-wrapper.is-sticky .site-title a { color: $color_mt1_site_title_sticky; }";
		}
		if ( $color_mt1_site_desc ) {
			$custom_styles .= ".menuStyle1 .sticky-wrapper.is-sticky .site-description { color: $color_mt1_site_desc; }";
		}
		if ( $color_mt1_site_desc_sticky ) {
			$custom_styles .= ".menuStyle1 .sticky-wrapper.is-sticky .site-description { color:$color_mt1_site_desc_sticky; }";
		}
		if ( $color_mt1_top_menu_items ) {
			$custom_styles .= ".menuStyle1 .main-navigation a, .menuStyle1 .fa-search { color: $color_mt1_top_menu_items; }";
		}
		if ( $color_mt1_top_menu_items_sticky ) {
			$custom_styles .= ".menuStyle1 .sticky-wrapper.is-sticky .main-navigation a, .menuStyle1 .sticky-wrapper.is-sticky .fa-search { $color_mt1_top_menu_items_sticky; }";
		}
		if ( $color_mt1_bg_color ) {
			$custom_styles .= ".menuStyle1 .site-header, .menuStyle1.page-template-template_page-builder .site-header { background-color: $color_mt1_bg_color; }";
		}
		if ( $color_mt1_bg_color_sticky ) {
			$custom_styles .= ".menuStyle1 .is-sticky .site-header { background-color:$color_mt1_bg_color_sticky ; }";
		}
		if ( $color_mt2_site_title ) {
			$custom_styles .= ".menuStyle2 .site-title a { color:$color_mt2_site_title; }";
		}

		if ( $color_mt2_site_title_sticky ) {
			$custom_styles .= ".menuStyle2 .sticky-wrapper.is-sticky .site-title a { color:$color_mt2_site_title_sticky; }";
		}

		if ( $color_mt2_site_desc ) {
			$custom_styles .= ".menuStyle2 .site-description { color:$color_mt2_site_desc; }";
		}

		if ( $color_mt2_site_desc_sticky ) {
			$custom_styles .= ".menuStyle2 .sticky-wrapper.is-sticky .site-description { color:$color_mt2_site_desc_sticky; }";
		}

		if ( $color_mt2_top_menu_items ) {
			$custom_styles .= ".menuStyle2 .main-navigation a { color:$color_mt2_top_menu_items; }";
		}

		if ( $color_mt2_top_menu_items_sticky ) {
			$custom_styles .= ".menuStyle2 .sticky-wrapper.is-sticky .main-navigation a { color:$color_mt2_top_menu_items_sticky; }";
		}

		if ( $color_mt2_bg_color ) {
			$custom_styles .= ".menuStyle2 .site-header { background-color:$color_mt2_bg_color; }";
		}

		if ( $color_mt2_bg_color_sticky ) {
			$custom_styles .= ".menuStyle2 .is-sticky .site-header { background-color:$color_mt2_bg_color_sticky; }";
		}

		if ( $color_mt3_top_bar ) {
			$custom_styles .= ".menuStyle3 .top-bar { background-color:$color_mt3_top_bar; }";
		}

		if ( $color_mt3_top_bar_color ) {
			$custom_styles .= ".menuStyle3 .top-bar a, .menuStyle3 .top-bar .contact-item.header-social .fa, .menuStyle3 .top-bar .contact-item.header-social a { color:$color_mt3_top_bar_color; }";
		}

		if ( $color_mt3_site_title ) {
			$custom_styles .= ".menuStyle3 .site-title a { color:$color_mt3_site_title; }";
		}

		if ( $color_mt3_site_title_sticky ) {
			$custom_styles .= ".menuStyle3 .sticky-wrapper.is-sticky .site-title a { color:$color_mt3_site_title_sticky; }";
		}

		if ( $color_mt3_site_desc ) {
			$custom_styles .= ".menuStyle3 .site-description { color:$color_mt3_site_desc; }";
		}

		if ( $color_mt3_site_desc_sticky ) {
			$custom_styles .= ".menuStyle3 .sticky-wrapper.is-sticky .site-description { color:$color_mt3_site_desc_sticky; }";
		}

		if ( $color_mt3_top_menu_items ) {
			$custom_styles .= ".menuStyle3 .main-navigation a { color:$color_mt3_top_menu_items; }";
		}

		if ( $color_mt3_top_menu_items_sticky ) {
			$custom_styles .= ".menuStyle3 .sticky-wrapper.is-sticky .main-navigation a { color:$color_mt3_top_menu_items_sticky; }";
		}

		if ( $color_mt3_bg_color ) {
			$custom_styles .= ".menuStyle3 .bottom-bar, .menuStyle3.page-template-template_page-builder .bottom-bar { background-color:$color_mt3_bg_color; }";
		}

		if ( $color_mt3_bg_color_sticky ) {
			$custom_styles .= ".menuStyle3 .is-sticky .bottom-bar { background-color:$color_mt3_bg_color_sticky; }";
		}

		if ( $color_mt4_site_title ) {
			$custom_styles .= ".menuStyle4 .site-title a { color:$color_mt4_site_title; }";
		}

		if ( $color_mt4_site_desc ) {
			$custom_styles .= ".menuStyle4 .site-description { color:$color_mt4_site_desc; }";
		}

		if ( $color_mt4_menu_bg_color ) {
			$custom_styles .= ".menuStyle4 .main-navigation { background-color:$color_mt4_menu_bg_color; }";
		}

		if ( $color_mt4_top_menu_items ) {
			$custom_styles .= ".menuStyle4 .main-navigation li a { color:$color_mt4_top_menu_items; }";
		}

		if ( $color_mt4_bg_color ) {
			$custom_styles .= ".menuStyle4 .site-header { background-color:$color_mt4_bg_color; }";
		}

		if ( $color_mt4_top_line ) {
			$custom_styles .= ".menuStyle4 .contact-area .contact-block span:first-of-type { color:$color_mt4_top_line; }";
		}

		if ( $color_mt4_bottom_line ) {
			$custom_styles .= ".menuStyle4 .contact-area .contact-block span:last-of-type { color:$color_mt4_bottom_line; }";
		}

		if ( $color_submenu_items ) {
			$custom_styles .= "#site-navigation ul ul li a { color:$color_submenu_items; }";
		}

		if ( $color_submenu_bg ) {
			$custom_styles .= "#site-navigation ul ul li { background-color:$color_submenu_bg; }";
		}

		if ( $mobile_toggle_color ) {
			$custom_styles .= ".menuStyle1 .mobile-menu-toggle_lines, .menuStyle1 .mobile-menu-toggle_lines:before, .menuStyle1 .mobile-menu-toggle_lines:after,.menuStyle1 .mobile-menu-toggle_lines,.mobile-menu-toggle_lines:before, .mobile-menu-toggle_lines:after,.mobile-menu-toggle_lines,.menuStyle3 .mobile-menu-toggle_lines,.menuStyle3 .mobile-menu-toggle_lines:before, .menuStyle3 .mobile-menu-toggle_lines:after { background-color:$mobile_toggle_color; }";
		}

		if ( $color_index_post_title ) {
			$custom_styles .= ".entry-title a { color: $color_index_post_title; }";
		}

		if ( $color_single_post_title ) {
			$custom_styles .= ".single-post .entry-title { color: $color_single_post_title; }";
		}

		if ( $color_meta_cat_bg ) {
			$custom_styles .= ".single-post .post-cat, .blog-loop .post-cat { background-color: $color_meta_cat_bg; }";
		}

		if ( $color_meta_text ) {
			$custom_styles .= ".single-post .entry-meta, .blog-loop .entry-meta { color: $color_meta_text; }";
		}

		if ( $color_meta_links ) {
			$custom_styles .= ".single-post .entry-meta .byline a, .blog-loop .entry-meta .byline a { color: $color_meta_links; }";
		}

		if ( $color_post_text ) {
			$custom_styles .= ".single-post .entry-content, .blog-loop .entry-content { color: $color_post_text; }";
			$custom_styles .= ".editor-block-list__layout, .editor-block-list__layout .editor-block-list__block { color: $color_post_text; }";
		}

		if ( $color_widgets_title ) {
			$custom_styles .= ".widget .widget-title { color: $color_widgets_title; }";
		}

		if ( $color_widgets_text ) {
			$custom_styles .= ".widget { color: $color_widgets_text; }";
		}

		if ( $color_widgets_links ) {
			$custom_styles .= ".widget a { color: $color_widgets_links; }";
		}

		return $custom_styles;
	}
}
