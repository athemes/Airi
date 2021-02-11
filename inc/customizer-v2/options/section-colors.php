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
			'test_airi_panel_colors',
			array(
				'priority' => 9,
				'title'    => __( 'Colors V2', 'airi' ),
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
			'test_airi_section_colors_header',
			array(
				'title'       => esc_attr__( 'Header', 'airi' ),
				'panel'       => 'test_airi_panel_colors',
				'description' => esc_attr__( 'Different color options show up here, based on the type of menu you select from the Header > Menu section', 'airi' ),
				'priority'    => 11,
			)
		);

		/**
		 * Blog colors
		 */
		$wp_customize->add_section(
			'test_airi_section_colors_blog',
			array(
				'title'    => esc_attr__( 'Blog', 'airi' ),
				'panel'    => 'test_airi_panel_colors',
				'priority' => 12,
			)
		);

		/**
		 * Widgets
		 */
		$wp_customize->add_section(
			'test_airi_section_colors_widgets',
			array(
				'title'    => esc_attr__( 'Sidebar&amp;footer widgets', 'airi' ),
				'panel'    => 'test_airi_panel_colors',
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
		// $wp_customize->add_setting(
		// 	'test_color_primary',
		// 	array(
		// 		'default'           => $this->defaults['test_color_primary'],
		// 		'transport'         => 'postmessage',
		// 		'sanitize_callback' => 'airi_hex_rgba_sanitization',
		// 	)
		// );
		// $wp_customize->add_control(
		// 	new Airi_Alpha_Color_Custom_Control(
		// 		$wp_customize,
		// 		'test_color_primary',
		// 		array(
		// 			'label'        => esc_attr__( 'Primary color', 'airi' ),
		// 			'section'      => 'colors',
		// 			'show_opacity' => true,
		// 			'palette'      => $this->default_palette,
		// 		)
		// 	)
		// );

		/**
		 * Header colors
		 */

		// Menu 1.
		$wp_customize->add_setting(
			'test_color_mt1_site_title',
			array(
				'default'           => $this->defaults['test_color_mt1_site_title'],
				'transport'         => 'postmessage',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'test_color_mt1_site_title',
				array(
					'label'           => esc_attr__( 'Site title', 'airi' ),
					'section'         => 'test_airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'test_color_mt1_site_title_sticky',
			array(
				'default'           => $this->defaults['test_color_mt1_site_title_sticky'],
				'transport'         => 'postmessage',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'test_color_mt1_site_title_sticky',
				array(
					'label'           => esc_attr__( 'Site title (sticky)', 'airi' ),
					'section'         => 'test_airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'test_color_mt1_site_desc',
			array(
				'default'           => $this->defaults['test_color_mt1_site_desc'],
				'transport'         => 'postmessage',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'test_color_mt1_site_desc',
				array(
					'label'           => esc_attr__( 'Site description', 'airi' ),
					'section'         => 'test_airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'test_color_mt1_site_desc_sticky',
			array(
				'default'           => $this->defaults['test_color_mt1_site_desc_sticky'],
				'transport'         => 'postmessage',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'test_color_mt1_site_desc_sticky',
				array(
					'label'           => esc_attr__( 'Site description (sticky)', 'airi' ),
					'section'         => 'test_airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'test_color_mt1_top_menu_items',
			array(
				'default'           => $this->defaults['test_color_mt1_top_menu_items'],
				'transport'         => 'postmessage',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'test_color_mt1_top_menu_items',
				array(
					'label'           => esc_attr__( 'Top level menu items', 'airi' ),
					'section'         => 'test_airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'test_color_mt1_top_menu_items_sticky',
			array(
				'default'           => $this->defaults['test_color_mt1_top_menu_items_sticky'],
				'transport'         => 'postmessage',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'test_color_mt1_top_menu_items_sticky',
				array(
					'label'           => esc_attr__( 'Top level menu items (sticky)', 'airi' ),
					'section'         => 'test_airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'test_color_mt1_bg_color',
			array(
				'default'           => $this->defaults['test_color_mt1_bg_color'],
				'transport'         => 'postmessage',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'test_color_mt1_bg_color',
				array(
					'label'           => esc_attr__( 'Background color', 'airi' ),
					'section'         => 'test_airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		$wp_customize->add_setting(
			'test_color_mt1_bg_color_sticky',
			array(
				'default'           => $this->defaults['test_color_mt1_bg_color_sticky'],
				'transport'         => 'postmessage',
				'sanitize_callback' => 'airi_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Airi_Alpha_Color_Custom_Control(
				$wp_customize,
				'test_color_mt1_bg_color_sticky',
				array(
					'label'           => esc_attr__( 'Background color (sticky)', 'airi' ),
					'section'         => 'test_airi_section_colors_header',
					'show_opacity'    => true,
					'palette'         => $this->default_palette,
					'active_callback' => 'airi_section_menu_menu1_conditional_display',
				)
			)
		);

		// Menu 2.

		/**
		 * Blog colors
		 */

		/**
		 * Widget colors
		 */

	}

}


/**
 * Load all our Customizer Custom Controls
 */
require_once trailingslashit( get_template_directory() ) . 'inc/customizer-v2/custom-controls/class-airi-alpha-color-custom-control.php';


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
		'test_color_primary'                   => '#f0437e',
		'test_color_mt1_site_title'            => '#ffffff',
		'test_color_mt1_site_title_sticky'     => '#191919',
		'test_color_mt1_site_desc'             => '#ffffff',
		'test_color_mt1_site_desc_sticky'      => '#191919',
		'test_color_mt1_top_menu_items'        => '#ffffff',
		'test_color_mt1_top_menu_items_sticky' => '#191919',
		'test_color_mt1_bg_color'              => '',
		'test_color_mt1_bg_color_sticky'       => '#ffffff',
		'test_color_mt2_site_title'            => '#191919',
		'test_color_mt2_site_title_sticky'     => '#191919',
		'test_color_mt2_site_desc'             => '#707070',
		'test_color_mt2_site_desc_sticky'      => '#707070',
		'test_color_mt2_top_menu_items'        => '#191919',
		'test_color_mt2_top_menu_items_sticky' => '#191919',
		'test_color_mt2_bg_color'              => '#fff',
		'test_color_mt2_bg_color_sticky'       => '#ffffff',
		'test_color_mt3_top_bar'               => '#fff',
		'test_color_mt3_top_bar_color'         => '#191919',
		'test_color_mt3_site_title'            => '#ffffff',
		'test_color_mt3_site_title_sticky'     => '#191919',
		'test_color_mt3_site_desc'             => '#ffffff',
		'test_color_mt3_site_desc_sticky'      => '#191919',
		'test_color_mt3_top_menu_items'        => '#ffffff',
		'test_color_mt3_top_menu_items_sticky' => '#191919',
		'test_color_mt3_bg_color'              => 'transparent',
		'test_color_mt3_bg_color_sticky'       => '#ffffff',
		'test_color_mt4_site_title'            => '#191919',
		'test_color_mt4_site_desc'             => '#707070',
		'test_color_mt4_menu_bg_color'         => '#0e304e',
		'test_color_mt4_top_menu_items'        => '#fff',
		'test_color_mt4_bg_color'              => '#fff',
		'test_color_mt4_top_line'              => '#595959',
		'test_color_mt4_bottom_line'           => '#0e304e',
		'test_color_submenu_items'             => '#1c1c1c',
		'test_color_submenu_bg'                => '#f7f7f7',
		'test_mobile_toggle_color'             => '',

	),
	$default_palette,
);

if ( ! function_exists( 'airi_custom_colors_styles' ) ) {
	function airi_custom_colors_styles() {
		$custom_styles = '';

		$test_color_primary                   = get_theme_mod( 'test_color_primary' );
		$test_color_mt1_site_title            = get_theme_mod( 'test_color_mt1_site_title' );
		$test_color_mt1_site_title_sticky     = get_theme_mod( 'test_color_mt1_site_title_sticky' );
		$test_color_mt1_site_desc             = get_theme_mod( 'test_color_mt1_site_desc' );
		$test_color_mt1_site_desc_sticky      = get_theme_mod( 'test_color_mt1_site_desc_sticky' );
		$test_color_mt1_top_menu_items        = get_theme_mod( 'test_color_mt1_top_menu_items' );
		$test_color_mt1_top_menu_items_sticky = get_theme_mod( 'test_color_mt1_top_menu_items_sticky' );
		$test_color_mt1_bg_color              = get_theme_mod( 'test_color_mt1_bg_color' );
		$test_color_mt1_bg_color_sticky       = get_theme_mod( 'test_color_mt1_bg_color_sticky' );
		$test_color_mt2_site_title            = get_theme_mod( 'test_color_mt2_site_title' );
		$test_color_mt2_site_title_sticky     = get_theme_mod( 'test_color_mt2_site_title_sticky' );
		$test_color_mt2_site_desc             = get_theme_mod( 'test_color_mt2_site_desc' );
		$test_color_mt2_site_desc_sticky      = get_theme_mod( 'test_color_mt2_site_desc_sticky' );
		$test_color_mt2_top_menu_items        = get_theme_mod( 'test_color_mt2_top_menu_items' );
		$test_color_mt2_top_menu_items_sticky = get_theme_mod( 'test_color_mt2_top_menu_items_sticky' );
		$test_color_mt2_bg_color              = get_theme_mod( 'test_color_mt2_bg_color' );
		$test_color_mt2_bg_color_sticky       = get_theme_mod( 'test_color_mt2_bg_color_sticky' );
		$test_color_mt3_top_bar               = get_theme_mod( 'test_color_mt3_top_bar' );
		$test_color_mt3_top_bar_color         = get_theme_mod( 'test_color_mt3_top_bar_color' );
		$test_color_mt3_site_title            = get_theme_mod( 'test_color_mt3_site_title' );
		$test_color_mt3_site_title_sticky     = get_theme_mod( 'test_color_mt3_site_title_sticky' );
		$test_color_mt3_site_desc             = get_theme_mod( 'test_color_mt3_site_desc' );
		$test_color_mt3_site_desc_sticky      = get_theme_mod( 'test_color_mt3_site_desc_sticky' );
		$test_color_mt3_top_menu_items        = get_theme_mod( 'test_color_mt3_top_menu_items' );
		$test_color_mt3_top_menu_items_sticky = get_theme_mod( 'test_color_mt3_top_menu_items_sticky' );
		$test_color_mt3_bg_color              = get_theme_mod( 'test_color_mt3_bg_color' );
		$test_color_mt3_bg_color_sticky       = get_theme_mod( 'test_color_mt3_bg_color_sticky' );
		$test_color_mt4_site_title            = get_theme_mod( 'test_color_mt4_site_title' );
		$test_color_mt4_site_desc             = get_theme_mod( 'test_color_mt4_site_desc' );
		$test_color_mt4_menu_bg_color         = get_theme_mod( 'test_color_mt4_menu_bg_color' );
		$test_color_mt4_top_menu_items        = get_theme_mod( 'test_color_mt4_top_menu_items' );
		$test_color_mt4_bg_color              = get_theme_mod( 'test_color_mt4_bg_color' );
		$test_color_mt4_top_line              = get_theme_mod( 'test_color_mt4_top_line' );
		$test_color_mt4_bottom_line           = get_theme_mod( 'test_color_mt4_bottom_line' );
		$test_color_submenu_items             = get_theme_mod( 'test_color_submenu_items' );
		$test_color_submenu_bg                = get_theme_mod( 'test_color_submenu_bg' );
		$test_mobile_toggle_color             = get_theme_mod( 'test_mobile_toggle_color' );

		if ( $test_color_primary ) {
			$custom_styles .= ".woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.product div.entry-summary p.price, .product div.entry-summary span.price,.athemes-blog:not(.airi_athemes_blog_skin) .posted-on a,.athemes-blog:not(.airi_athemes_blog_skin) .byline a:hover,.testimonials-section.style1:before,.single-post .read-more-link .gt,.blog-loop .read-more-link .gt,.single-post .posted-on a,.blog-loop .posted-on a,.entry-title a:hover,.airi_recent_entries .post-date,.menuStyle3 .top-bar .contact-item .fa,.menuStyle4 .contact-area .contact-block .contact-icon,.widget_categories li:hover::before,.widget_categories li:hover a {color: $test_color_primary; }";
			$custom_styles .= ".product .single_add_to_cart_button.button.alt,.menuStyle4 .contact-area .contact-block .contact-icon,button,.button,input[type=\"button\"],input[type=\"reset\"],input[type=\"submit\"] { border-color: $test_color_primary; }";
			$custom_styles .= ".woocommerce-checkout button.button.alt,.woocommerce-checkout button.button.alt:hover,.woocommerce-cart .cart-collaterals .cart_totals .button:hover,.woocommerce-cart .cart-collaterals .cart_totals .button,.product .single_add_to_cart_button.button.alt:hover,.product .single_add_to_cart_button.button.alt,.woocommerce ul.products li.product .button,.menuStyle2 .main-navigation a:hover:after, .menuStyle2 .main-navigation .current-menu-item:after,.comments-area .comment-reply-link:hover,.menuStyle4 .main-navigation .header-cta:before,.menuStyle4 .main-navigation .header-cta,button,.button,input[type=\"button\"],input[type=\"reset\"],input[type=\"submit\"],.menuStyle3 .main-navigation a:hover:after,.menuStyle3 .main-navigation .current-menu-item:after { background-color: $test_color_primary; }";
		}
		if ( $test_color_mt1_site_title ) {
			$custom_styles .= ".menuStyle1 .site-title a { color: $test_color_mt1_site_title; }";
		}
		if ( $test_color_mt1_site_title_sticky ) {
			$custom_styles .= ".menuStyle1 .sticky-wrapper.is-sticky .site-title a { color: $test_color_mt1_site_title_sticky; }";
		}
		if ( $test_color_mt1_site_desc ) {
			$custom_styles .= ".menuStyle1 .sticky-wrapper.is-sticky .site-description { color: $test_color_mt1_site_desc; }";
		}
		if ( $test_color_mt1_site_desc_sticky ) {
			$custom_styles .= ".menuStyle1 .sticky-wrapper.is-sticky .site-description { color:$test_color_mt1_site_desc_sticky; }";
		}
		if ( $test_color_mt1_top_menu_items ) {
			$custom_styles .= ".menuStyle1 .main-navigation a, .menuStyle1 .fa-search { color: $test_color_mt1_top_menu_items; }";
		}
		if ( $test_color_mt1_top_menu_items_sticky ) {
			$custom_styles .= ".menuStyle1 .sticky-wrapper.is-sticky .main-navigation a, .menuStyle1 .sticky-wrapper.is-sticky .fa-search { $test_color_mt1_top_menu_items_sticky; }";
		}
		if ( $test_color_mt1_bg_color ) {
			$custom_styles .= ".menuStyle1 .site-header, .menuStyle1.page-template-template_page-builder .site-header { background-color: $test_color_mt1_bg_color; }";
		}
		if ( $test_color_mt1_bg_color_sticky ) {
			$custom_styles .= ".menuStyle1 .is-sticky .site-header { background-color:$test_color_mt1_bg_color_sticky ; }";
		}
		if ( $test_color_mt2_site_title ) {
			$custom_styles .= ".menuStyle2 .site-title a { color:$test_color_mt2_site_title; }";
		}

		if ( $test_color_mt2_site_title_sticky ) {
			$custom_styles .= ".menuStyle2 .sticky-wrapper.is-sticky .site-title a { color:$test_color_mt2_site_title_sticky; }";
		}

		if ( $test_color_mt2_site_desc ) {
			$custom_styles .= ".menuStyle2 .site-description { color:$test_color_mt2_site_desc; }";
		}

		if ( $test_color_mt2_site_desc_sticky ) {
			$custom_styles .= ".menuStyle2 .sticky-wrapper.is-sticky .site-description { color:$test_color_mt2_site_desc_sticky; }";
		}

		if ( $test_color_mt2_top_menu_items ) {
			$custom_styles .= ".menuStyle2 .main-navigation a { color:$test_color_mt2_top_menu_items; }";
		}

		if ( $test_color_mt2_top_menu_items_sticky ) {
			$custom_styles .= ".menuStyle2 .sticky-wrapper.is-sticky .main-navigation a { color:$test_color_mt2_top_menu_items_sticky; }";
		}

		if ( $test_color_mt2_bg_color ) {
			$custom_styles .= ".menuStyle2 .site-header { background-color:$test_color_mt2_bg_color; }";
		}

		if ( $test_color_mt2_bg_color_sticky ) {
			$custom_styles .= ".menuStyle2 .is-sticky .site-header { background-color:$test_color_mt2_bg_color_sticky; }";
		}

		if ( $test_color_mt3_top_bar ) {
			$custom_styles .= ".menuStyle3 .top-bar { background-color:$test_color_mt3_top_bar; }";
		}

		if ( $test_color_mt3_top_bar_color ) {
			$custom_styles .= ".menuStyle3 .top-bar a, .menuStyle3 .top-bar .contact-item.header-social .fa, .menuStyle3 .top-bar .contact-item.header-social a { color:$test_color_mt3_top_bar_color; }";
		}

		if ( $test_color_mt3_site_title ) {
			$custom_styles .= ".menuStyle3 .site-title a { color:$test_color_mt3_site_title; }";
		}

		if ( $test_color_mt3_site_title_sticky ) {
			$custom_styles .= ".menuStyle3 .sticky-wrapper.is-sticky .site-title a { color:$test_color_mt3_site_title_sticky; }";
		}

		if ( $test_color_mt3_site_desc ) {
			$custom_styles .= ".menuStyle3 .site-description { color:$test_color_mt3_site_desc; }";
		}

		if ( $test_color_mt3_site_desc_sticky ) {
			$custom_styles .= ".menuStyle3 .sticky-wrapper.is-sticky .site-description { color:$test_color_mt3_site_desc_sticky; }";
		}

		if ( $test_color_mt3_top_menu_items ) {
			$custom_styles .= ".menuStyle3 .main-navigation a { color:$test_color_mt3_top_menu_items; }";
		}

		if ( $test_color_mt3_top_menu_items_sticky ) {
			$custom_styles .= ".menuStyle3 .sticky-wrapper.is-sticky .main-navigation a { color:$test_color_mt3_top_menu_items_sticky; }";
		}

		if ( $test_color_mt3_bg_color ) {
			$custom_styles .= ".menuStyle3 .bottom-bar, .menuStyle3.page-template-template_page-builder .bottom-bar { background-color:$test_color_mt3_bg_color; }";
		}

		if ( $test_color_mt3_bg_color_sticky ) {
			$custom_styles .= ".menuStyle3 .is-sticky .bottom-bar { background-color:$test_color_mt3_bg_color_sticky; }";
		}

		if ( $test_color_mt4_site_title ) {
			$custom_styles .= ".menuStyle4 .site-title a { color:$test_color_mt4_site_title; }";
		}

		if ( $test_color_mt4_site_desc ) {
			$custom_styles .= ".menuStyle4 .site-description { color:$test_color_mt4_site_desc; }";
		}

		if ( $test_color_mt4_menu_bg_color ) {
			$custom_styles .= ".menuStyle4 .main-navigation { background-color:$test_color_mt4_menu_bg_color; }";
		}

		if ( $test_color_mt4_top_menu_items ) {
			$custom_styles .= ".menuStyle4 .main-navigation li a { color:$test_color_mt4_top_menu_items; }";
		}

		if ( $test_color_mt4_bg_color ) {
			$custom_styles .= ".menuStyle4 .site-header { background-color:$test_color_mt4_bg_color; }";
		}

		if ( $test_color_mt4_top_line ) {
			$custom_styles .= ".menuStyle4 .contact-area .contact-block span:first-of-type { color:$test_color_mt4_top_line; }";
		}

		if ( $test_color_mt4_bottom_line ) {
			$custom_styles .= ".menuStyle4 .contact-area .contact-block span:last-of-type { color:$test_color_mt4_bottom_line; }";
		}

		if ( $test_color_submenu_items ) {
			$custom_styles .= "#site-navigation ul ul li a { color:$test_color_submenu_items; }";
		}

		if ( $test_color_submenu_bg ) {
			$custom_styles .= "#site-navigation ul ul li { background-color:$test_color_submenu_bg; }";
		}

		if ( $test_mobile_toggle_color ) {
			$custom_styles .= ".menuStyle1 .mobile-menu-toggle_lines, .menuStyle1 .mobile-menu-toggle_lines:before, .menuStyle1 .mobile-menu-toggle_lines:after,.menuStyle1 .mobile-menu-toggle_lines,.mobile-menu-toggle_lines:before, .mobile-menu-toggle_lines:after,.mobile-menu-toggle_lines,.menuStyle3 .mobile-menu-toggle_lines,.menuStyle3 .mobile-menu-toggle_lines:before, .menuStyle3 .mobile-menu-toggle_lines:after { background-color:$test_mobile_toggle_color; }";
		}

		return $custom_styles;
	}
}
