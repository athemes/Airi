<?php
/**
 * Colors Customizer panel
 *
 * @package Airi
 */

/**
 * Colors panel
 */
Airi_Kirki::add_panel( 'airi_panel_colors', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Colors', 'airi' ),
) );

/**
 * General
 */
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_primary',
	'label'       => esc_attr__( 'Primary color', 'airi' ),
	'section'     => 'colors',
	'default'     => '#f0437e',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.product div.entry-summary p.price, .product div.entry-summary span.price,.athemes-blog:not(.airi_athemes_blog_skin) .posted-on a,.athemes-blog:not(.airi_athemes_blog_skin) .byline a:hover,.testimonials-section.style1:before,.single-post .read-more-link .gt,.blog-loop .read-more-link .gt,.single-post .posted-on a,.blog-loop .posted-on a,.entry-title a:hover,.airi_recent_entries .post-date,.menuStyle3 .top-bar .contact-item .fa,.menuStyle4 .contact-area .contact-block .contact-icon,.widget_categories li:hover::before,.widget_categories li:hover a',
			'property' => 'color',
		),
		array(
			'element'  => '.product .single_add_to_cart_button.button.alt,.menuStyle4 .contact-area .contact-block .contact-icon,button,.button,input[type="button"],input[type="reset"],input[type="submit"]',
			'property' => 'border-color',
		),		
		array(
			'element'  => '.woocommerce-checkout button.button.alt,.woocommerce-checkout button.button.alt:hover,.woocommerce-cart .cart-collaterals .cart_totals .button:hover,.woocommerce-cart .cart-collaterals .cart_totals .button,.product .single_add_to_cart_button.button.alt:hover,.product .single_add_to_cart_button.button.alt,.woocommerce ul.products li.product .button,.menuStyle2 .main-navigation a:hover:after, .menuStyle2 .main-navigation .current-menu-item:after,.comments-area .comment-reply-link:hover,.menuStyle4 .main-navigation .header-cta:before,.menuStyle4 .main-navigation .header-cta,button,.button,input[type="button"],input[type="reset"],input[type="submit"],.menuStyle3 .main-navigation a:hover:after,.menuStyle3 .main-navigation .current-menu-item:after',
			'property' => 'background-color',
		),		
	),			
) );

/**
 * Header colors
 */
Airi_Kirki::add_section( 'airi_section_colors_header', array(
    'title'       	 => esc_attr__( 'Header', 'airi' ),
	'panel'          => 'airi_panel_colors',
	'description'    => esc_attr__( 'Different color options show up here, based on the type of menu you select from the Header > Menu section', 'airi' ),
    'priority'       => 11,
) );

/**
 * Menu type 1
 */
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_site_title',
	'label'       => esc_attr__( 'Site title', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle1',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle1 .site-title a',
			'property' => 'color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_site_title_sticky',
	'label'       => esc_attr__( 'Site title (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle1',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle1 .sticky-wrapper.is-sticky .site-title a',
			'property' => 'color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_site_desc',
	'label'       => esc_attr__( 'Site description', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle1',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle1 .site-description',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_site_desc_sticky',
	'label'       => esc_attr__( 'Site description (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle1',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle1 .sticky-wrapper.is-sticky .site-description',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_top_menu_items',
	'label'       => esc_attr__( 'Top level menu items', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle1',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle1 .main-navigation a, .menuStyle1 .fa-search, .menuStyle1 ul.header-search-cart li a',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_top_menu_items_sticky',
	'label'       => esc_attr__( 'Top level menu items (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle1',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle1 .sticky-wrapper.is-sticky .main-navigation a, .menuStyle1 .sticky-wrapper.is-sticky .fa-search, .menuStyle1 .is-sticky ul.header-search-cart li a',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_items_text_color_mobile',
	'label'       => esc_attr__( 'Top level menu items (Mobile)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#f85757',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle1',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle1 .main-navigation a, .menuStyle1 .main-navigation ul li a:hover, .menuStyle1 .main-navigation ul li.current_page_item > a, .menuStyle1 .main-navigation ul li.current-menu-item > a, .menuStyle1 .main-navigation ul li.current_page_ancestor > a, .menuStyle1 .main-navigation ul li.current-menu-ancestor > a, .menuStyle1 .main-navigation li.menu-item-has-children > a:hover + .subnav-toggle, .menuStyle1 .main-navigation ul .subnav-toggle:hover',
			'property' => 'color',
			'media_query' => '@media screen and (max-width: 1199px)'
		)
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_bg_color',
	'label'       => esc_attr__( 'Background color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle1',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle1 .site-header, .menuStyle1.page-template-template_page-builder .site-header',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_bg_color_sticky',
	'label'       => esc_attr__( 'Background color (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle1',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle1 .is-sticky .site-header',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_hamburguer_btn_mobile',
	'label'       => esc_attr__( 'Hamburguer Button (mobile)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle1',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle1 .mobile-menu-toggle_lines, .menuStyle1 .mobile-menu-toggle_lines:before, .menuStyle1 .mobile-menu-toggle_lines:after',
			'property' => 'background-color'
		),
	),
) );

/**
 * Menu type 2
 */
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt2_site_title',
	'label'       => esc_attr__( 'Site title', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle2',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle2 .site-title a',
			'property' => 'color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt2_site_title_sticky',
	'label'       => esc_attr__( 'Site title (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle2',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle2 .sticky-wrapper.is-sticky .site-title a',
			'property' => 'color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt2_site_desc',
	'label'       => esc_attr__( 'Site description', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#707070',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle2',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle2 .site-description',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt2_site_desc_sticky',
	'label'       => esc_attr__( 'Site description (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#707070',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle2',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle2 .sticky-wrapper.is-sticky .site-description',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt2_top_menu_items',
	'label'       => esc_attr__( 'Top level menu items', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle2',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle2 .main-navigation a, .menuStyle2 .header-search-toggle, .menuStyle2 .header-search-cart li a',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt2_top_menu_items_sticky',
	'label'       => esc_attr__( 'Top level menu items (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle2',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle2 .sticky-wrapper.is-sticky .main-navigation a, .menuStyle2 .is-sticky .header-search-toggle, .menuStyle2 .is-sticky .header-search-cart li a',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt2_items_text_color_mobile',
	'label'       => esc_attr__( 'Top level menu items (Mobile)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#f85757',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle2',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle2 .site-header .main-navigation .menu li a, .menuStyle2 .main-navigation li.menu-item-has-children > a:hover + .subnav-toggle, .menuStyle2 .main-navigation ul .subnav-toggle:hover',
			'property' => 'color',
			'media_query' => '@media screen and (max-width: 1199px)'
		),
		array(
			'element' => '.menuStyle2 .main-navigation a:hover:after, .menuStyle2 .main-navigation .current-menu-item:after',
			'property' => 'background-color',
			'media_query' => '@media screen and (max-width: 1199px)'
		)
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt2_bg_color',
	'label'       => esc_attr__( 'Background color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle2',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle2 .site-header',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt2_bg_color_sticky',
	'label'       => esc_attr__( 'Background color (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle2',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle2 .is-sticky .site-header',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt2_hamburguer_btn_mobile',
	'label'       => esc_attr__( 'Hamburguer Button (mobile)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#212121',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle2',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle2 .mobile-menu-toggle_lines, .menuStyle2 .mobile-menu-toggle_lines:before, .menuStyle2 .mobile-menu-toggle_lines:after',
			'property' => 'background-color'
		),
	),
) );

/**
 * Menu type 3
 */
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_top_bar',
	'label'       => esc_attr__( 'Top bar background', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .top-bar',
			'property' => 'background-color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_top_bar_color',
	'label'       => esc_attr__( 'Top bar color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .top-bar a, .menuStyle3 .top-bar .contact-item.header-social .fa, .menuStyle3 .top-bar .contact-item.header-social a',
			'property' => 'color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_top_bar_contact_icons_color',
	'label'       => esc_attr__( 'Top bar contact icons color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#f0437e',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .top-bar .contact-item .fa-envelope, .menuStyle3 .top-bar .contact-item .fa-phone',
			'property' => 'color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_top_bar_button_bg_color',
	'label'       => esc_attr__( 'Top bar button background color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#f0437e',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .top-bar .button',
			'property' => 'background-color'
		),
		array(
			'element'  => '.menuStyle3 .top-bar .button',
			'property' => 'border-color'
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_top_bar_button_bg_color_hover',
	'label'       => esc_attr__( 'Top bar button background color (hover)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => 'transparent',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .top-bar .button:hover',
			'property' => 'background-color'
		),
		array(
			'element'  => '.menuStyle3 .top-bar .button:hover',
			'property' => 'border-color'
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_top_bar_button_text_color',
	'label'       => esc_attr__( 'Top bar button text color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#FFF',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .top-bar .button',
			'property' => 'color'
		)
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_top_bar_button_text_color_hover',
	'label'       => esc_attr__( 'Top bar button text color (hover)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#000',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .top-bar .button:hover',
			'property' => 'color'
		)
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_site_title',
	'label'       => esc_attr__( 'Site title', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .site-title a',
			'property' => 'color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_site_title_sticky',
	'label'       => esc_attr__( 'Site title (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .sticky-wrapper.is-sticky .site-title a',
			'property' => 'color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_site_desc',
	'label'       => esc_attr__( 'Site description', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .site-description',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_site_desc_sticky',
	'label'       => esc_attr__( 'Site description (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .sticky-wrapper.is-sticky .site-description',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_top_menu_items',
	'label'       => esc_attr__( 'Top level menu items', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .main-navigation a, .menuStyle3 .header-search-wrapper .header-search-toggle a, .menuStyle3 ul.header-search-cart li a',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_top_menu_items_sticky',
	'label'       => esc_attr__( 'Top level menu items (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .sticky-wrapper.is-sticky .main-navigation a, .menuStyle3 .is-sticky .header-search-wrapper .header-search-toggle a, .menuStyle3 .is-sticky ul.header-search-cart li a',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_items_text_color_mobile',
	'label'       => esc_attr__( 'Top level menu items (Mobile)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fb397d',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .site-header .main-navigation .menu li a, .menuStyle3 .main-navigation li.menu-item-has-children > a:hover + .subnav-toggle, .menuStyle3 .main-navigation ul .subnav-toggle:hover',
			'property' => 'color',
			'media_query' => '@media screen and (max-width: 1199px)'
		),
		array(
			'element' => '.menuStyle3 .main-navigation a:hover:after, .menuStyle3 .main-navigation .current-menu-item:after',
			'property' => 'background-color',
			'media_query' => '@media screen and (max-width: 1199px)'
		)
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_bg_color',
	'label'       => esc_attr__( 'Background color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => 'transparent',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .bottom-bar, .menuStyle3.page-template-template_page-builder .bottom-bar',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_bg_color_sticky',
	'label'       => esc_attr__( 'Background color (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .is-sticky .bottom-bar',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt3_hamburguer_btn_mobile',
	'label'       => esc_attr__( 'Hamburguer Button (mobile)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle3',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle3 .site-header .mobile-menu-toggle_lines, .menuStyle3 .mobile-menu-active .mobile-menu-toggle .mobile-menu-toggle_lines, .menuStyle3 .site-header .mobile-menu-toggle_lines:before, .menuStyle3 .site-header .mobile-menu-toggle_lines:after',
			'property' => 'background-color'
		),
	),
) );

/**
 * Menu type 4
 */
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt4_site_title',
	'label'       => esc_attr__( 'Site title', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle4',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle4 .site-title a',
			'property' => 'color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt4_site_desc',
	'label'       => esc_attr__( 'Site description', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#707070',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle4',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle4 .site-description',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt4_menu_bg_color',
	'label'       => esc_attr__( 'Menu background color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#0e304e',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle4',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle4 .main-navigation',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt4_top_menu_items',
	'label'       => esc_attr__( 'Top level menu items', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle4',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle4 .main-navigation li a, .menuStyle4 .main-navigation .header-search-wrapper .header-search-toggle a',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt4_items_text_color_mobile',
	'label'       => esc_attr__( 'Top level menu items (Mobile)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fb397d',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle4',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle4 .site-header .main-navigation .menu li a, .menuStyle4 .main-navigation li.menu-item-has-children > a:hover + .subnav-toggle, .menuStyle4 .main-navigation ul .subnav-toggle:hover, .menuStyle4 .main-navigation .menu > li.menu-item-has-children > .subnav-toggle',
			'property' => 'color',
			'media_query' => '@media screen and (max-width: 1199px)'
		)
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt4_bg_color',
	'label'       => esc_attr__( 'Background color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle4',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle4 .site-header',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt4_top_icon_color',
	'label'       => esc_attr__( 'Contact blocks - icon', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#f89121',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle4',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle4 .contact-area .contact-block .contact-icon',
			'property' => 'color',
		),
		array(
			'element'  => '.menuStyle4 .contact-area .contact-block .contact-icon',
			'property' => 'border-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt4_top_line',
	'label'       => esc_attr__( 'Contact blocks - top line', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#595959',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle4',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle4 .contact-area .contact-block span:first-of-type',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt4_bottom_line',
	'label'       => esc_attr__( 'Contact blocks - bottom line', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#0e304e',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle4',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle4 .contact-area .contact-block span:last-of-type',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt4_cta_bakckground_color',
	'label'       => esc_attr__( 'Call to action - background', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#f89121',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle4',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle4 .main-navigation .header-cta, .menuStyle4 .main-navigation .header-cta:before',
			'property' => 'background-color'
		)
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt4_cta_text_color',
	'label'       => esc_attr__( 'Call to action - text', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#FFF',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle4',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle4 .main-navigation .header-cta a',
			'property' => 'color'
		)
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt4_hamburguer_btn_mobile',
	'label'       => esc_attr__( 'Hamburguer Button (mobile)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#212121',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle4',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle4 .mobile-menu-toggle_lines, .menuStyle4 .mobile-menu-toggle_lines:before, .menuStyle4 .mobile-menu-toggle_lines:after',
			'property' => 'background-color'
		),
	),
) );

//Menu Type 5
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_site_title',
	'label'       => esc_attr__( 'Site title', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .site-title a',
			'property' => 'color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_site_title_sticky',
	'label'       => esc_attr__( 'Site title (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .sticky-wrapper.is-sticky .site-title a',
			'property' => 'color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_site_desc',
	'label'       => esc_attr__( 'Site description', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .site-description',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_site_desc_sticky',
	'label'       => esc_attr__( 'Site description (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .sticky-wrapper.is-sticky .site-description',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_items_text_color',
	'label'       => esc_attr__( 'Top level menu items', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .site-header .main-navigation .menu li a, .menuStyle5 .header-search-toggle, .menuStyle5 ul.header-search-cart li a',
			'property' => 'color',
			'media_query' => '@media screen and (min-width: 1200px)'
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_items_text_color_sticky',
	'label'       => esc_attr__( 'Top level menu items (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .is-sticky .site-header .main-navigation .menu li a, .menuStyle5 .is-sticky .header-search-toggle, .menuStyle5 .is-sticky ul.header-search-cart li a',
			'property' => 'color',
			'media_query' => '@media screen and (min-width: 1200px)'
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_items_text_color_mobile',
	'label'       => esc_attr__( 'Top level menu items (Mobile)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .site-header .main-navigation .menu li a, .menuStyle5 .main-navigation li.menu-item-has-children > a:hover + .subnav-toggle, .menuStyle5 .main-navigation ul .subnav-toggle:hover',
			'property' => 'color',
			'media_query' => '@media screen and (max-width: 1199px)'
		),
	),
) );

Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_bg_color',
	'label'       => esc_attr__( 'Background color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#61a0ce',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .site-header',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_bg_color_sticky',
	'label'       => esc_attr__( 'Background color (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#61a0ce',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .is-sticky .site-header',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_border_bottom_color',
	'label'       => esc_attr__( 'Menu items border bottom color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#FFF',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .site-header .main-navigation ul li.current-menu-item > a, .menuStyle5 .site-header .main-navigation ul li a:hover',
			'property' => 'border-bottom-color',
			'media_query' => '@media screen and (min-width: 1200px)'
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_social_icons_color',
	'label'       => esc_attr__( 'Social icons color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .site-header .socials a',
			'property' => 'color'
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_social_icons_color_sticky',
	'label'       => esc_attr__( 'Social icons color (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .is-sticky .site-header .socials a',
			'property' => 'color'
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_custom_text_color',
	'label'       => esc_attr__( 'Custom text color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .site-header .contact-us',
			'property' => 'color'
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_custom_text_color_sticky',
	'label'       => esc_attr__( 'Custom text color (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .is-sticky .site-header .contact-us',
			'property' => 'color'
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt5_hamburguer_btn_mobile',
	'label'       => esc_attr__( 'Hamburguer Button (mobile)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#212121',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle5',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle5 .mobile-menu-toggle_lines, .menuStyle5 .mobile-menu-toggle_lines:before, .menuStyle5 .mobile-menu-toggle_lines:after',
			'property' => 'background-color'
		),
	),
) );


//Menu Type 6
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_top_text_color',
	'label'       => esc_attr__( 'Header top text color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .site-header .top-section',
			'property' => 'color'
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_top_line_color',
	'label'       => esc_attr__( 'Top line divider color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#303248',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .site-header .top-section',
			'property' => 'border-bottom-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_site_title',
	'label'       => esc_attr__( 'Site title', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .site-title a',
			'property' => 'color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_site_title_sticky',
	'label'       => esc_attr__( 'Site title (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .sticky-wrapper.is-sticky .site-title a',
			'property' => 'color',
		),
	),			
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_site_desc',
	'label'       => esc_attr__( 'Site description', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .site-description',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_site_desc_sticky',
	'label'       => esc_attr__( 'Site description (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .sticky-wrapper.is-sticky .site-description',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_items_text_color',
	'label'       => esc_attr__( 'Top level menu items', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .site-header .main-navigation .menu li a, .menuStyle6 .site-header .header-search-cart li, .menuStyle6 .site-header .header-search-wrapper .header-search-toggle a',
			'property' => 'color',
			'media_query' => '@media screen and (min-width: 1200px)'
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_items_text_color_sticky',
	'label'       => esc_attr__( 'Top level menu items (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .is-sticky .site-header .main-navigation .menu li a, .menuStyle6 .is-sticky .site-header .header-search-cart li, .menuStyle6 .is-sticky .site-header .header-search-wrapper .header-search-toggle a',
			'property' => 'color',
			'media_query' => '@media screen and (min-width: 1200px)'
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_items_text_color_mobile',
	'label'       => esc_attr__( 'Top level menu items (Mobile)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#191919',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .site-header .main-navigation .menu li a, .menuStyle6 .main-navigation li.menu-item-has-children > a:hover + .subnav-toggle, .menuStyle6 .main-navigation ul .subnav-toggle:hover',
			'property' => 'color',
			'media_query' => '@media screen and (max-width: 1199px)'
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_bg_color',
	'label'       => esc_attr__( 'Background color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#181b33',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .site-header',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_bg_color_sticky',
	'label'       => esc_attr__( 'Background color (sticky)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#171b6c',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .is-sticky .site-header',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_border_bottom_color',
	'label'       => esc_attr__( 'Menu items border bottom color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#948b3e',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .site-header .main-navigation .menu > li > a:after, .menuStyle6 .site-header .main-navigation .menu > ul > li > a:after',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_header_button_border_color',
	'label'       => esc_attr__( 'Header button border color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#948b3e',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .site-header .btn',
			'property' => 'border-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_mt6_hamburguer_btn_mobile',
	'label'       => esc_attr__( 'Hamburguer Button (mobile)', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#fff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'menuStyle6',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle6 .site-header .mobile-menu-toggle_lines, .menuStyle6 .mobile-menu-active .mobile-menu-toggle .mobile-menu-toggle_lines, .menuStyle6 .site-header .mobile-menu-toggle_lines:before, .menuStyle6 .site-header .mobile-menu-toggle_lines:after',
			'property' => 'background-color'
		),
	),
) );

//Submenu
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_submenu_items',
	'label'       => esc_attr__( 'Submenu items', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#1c1c1c',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '#site-navigation ul ul li a',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_submenu_bg',
	'label'       => esc_attr__( 'Submenu background', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '#f7f7f7',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '#site-navigation ul ul li',
			'property' => 'background-color',
		),
	),
) );

Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'mobile_toggle_color',
	'label'       => esc_attr__( 'Mobile toggle color', 'airi' ),
	'section'     => 'airi_section_colors_header',
	'default'     => '',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.menuStyle1 .mobile-menu-toggle_lines, .menuStyle1 .mobile-menu-toggle_lines:before, .menuStyle1 .mobile-menu-toggle_lines:after,.menuStyle1 .mobile-menu-toggle_lines,.mobile-menu-toggle_lines:before, .mobile-menu-toggle_lines:after,.mobile-menu-toggle_lines,.menuStyle3 .mobile-menu-toggle_lines,.menuStyle3 .mobile-menu-toggle_lines:before, .menuStyle3 .mobile-menu-toggle_lines:after',
			'property' => 'background',
		),
	),			
) );

/**
 * Blog colors
 */
Airi_Kirki::add_section( 'airi_section_colors_blog', array(
    'title'       	 => esc_attr__( 'Blog', 'airi' ),
	'panel'          => 'airi_panel_colors',
    'priority'       => 12,
) );

Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_index_post_title',
	'label'       => esc_attr__( 'Post title (archives)', 'airi' ),
	'section'     => 'airi_section_colors_blog',
	'default'     => '#191919',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.entry-title a',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_single_post_title',
	'label'       => esc_attr__( 'Post title (single)', 'airi' ),
	'section'     => 'airi_section_colors_blog',
	'default'     => '#191919',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.single-post .entry-title',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_meta_cat_bg',
	'label'       => esc_attr__( 'Categories (single and archives)', 'airi' ),
	'section'     => 'airi_section_colors_blog',
	'default'     => '#eff1f4',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.single-post .post-cat, .blog-loop .post-cat',
			'property' => 'background-color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_meta_text',
	'label'       => esc_attr__( 'Meta text', 'airi' ),
	'section'     => 'airi_section_colors_blog',
	'default'     => '#bfbfbf',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.single-post .entry-meta, .blog-loop .entry-meta',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_meta_links',
	'label'       => esc_attr__( 'Meta links', 'airi' ),
	'section'     => 'airi_section_colors_blog',
	'default'     => '#595959',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.single-post .entry-meta .byline a, .blog-loop .entry-meta .byline a',
			'property' => 'color',
		),
	),
) );
Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_post_text',
	'label'       => esc_attr__( 'Body text', 'airi' ),
	'section'     => 'airi_section_colors_blog',
	'default'     => '#595959',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.single-post .entry-content, .blog-loop .entry-content',
			'property' => 'color',
		),
		array(
			'element'  => '.editor-block-list__layout, .editor-block-list__layout .editor-block-list__block',
			'context'  => array( 'editor' ),
		),		
	),
) );



/**
 * Widgets
 */

Airi_Kirki::add_section( 'airi_section_colors_widgets', array(
    'title'       	 => esc_attr__( 'Sidebar&amp;footer widgets', 'airi' ),
	'panel'          => 'airi_panel_colors',
    'priority'       => 12,
) );

Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_widgets_title',
	'label'       => esc_attr__( 'Widget titles', 'airi' ),
	'section'     => 'airi_section_colors_widgets',
	'default'     => '#191919',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.widget .widget-title',
			'property' => 'color',
		),
	),
) );

Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_widgets_text',
	'label'       => esc_attr__( 'Widget text', 'airi' ),
	'section'     => 'airi_section_colors_widgets',
	'default'     => '#707070',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.widget',
			'property' => 'color',
		),
	),
) );

Airi_Kirki::add_field( 'airi', array(
	'type'        => 'color',
	'settings'    => 'color_widgets_links',
	'label'       => esc_attr__( 'Widget links', 'airi' ),
	'section'     => 'airi_section_colors_widgets',
	'default'     => '#595959',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.widget a',
			'property' => 'color',
		),
	),
) );