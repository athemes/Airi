<?php
/**
 * TheFuture Theme Customizer
 *
 * @package TheFuture
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function thefuture_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'thefuture_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'thefuture_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'thefuture_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function thefuture_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function thefuture_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Load Kirki
 */
require get_template_directory() . '/inc/kirki/include-kirki.php';
require get_template_directory() . '/inc/kirki/class-reed-kirki.php';

Reed_Kirki::add_config( 'reed', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/* Typography */
Reed_Kirki::add_panel( 'reed_typography', array(
    'priority'    => 21,
    'title'       => esc_attr__( 'Typography', 'reed' ),
) );
Reed_Kirki::add_section( 'reed_font_families', array(
    'title'          => esc_attr__( 'Font families', 'reed' ),
    'priority'       => 31,
    'panel'			 => 'reed_typography'
) );

if ( class_exists( 'Kirki_Fonts' ) ) {
	Reed_Kirki::add_field( 'reed', array(
		'type'        => 'select',
		'settings'    => 'reed_body_fonts',
		'label'       => __( 'Body fonts', 'reed' ),
		'section'     => 'reed_font_families',
		'default'     => 'Open Sans',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => Kirki_Fonts::get_font_choices(),
		'transport'	  => 'refresh',
	    'output'      => array(
	        array(
	            'element'  => 'body',
	            'property' => 'font-family',
	        ),
	    ),	
	) );
	Reed_Kirki::add_field( 'reed', array(
		'type'        => 'select',
		'settings'    => 'reed_headings_fonts',
		'label'       => __( 'Headings fonts', 'reed' ),
		'section'     => 'reed_font_families',
		'default'     => 'Josefin Sans',
		'priority'    => 11,
		'multiple'    => 1,
		'choices'     => Kirki_Fonts::get_font_choices(),
		'transport'	  => 'refresh',
	    'output'      => array(
	        array(
	            'element'  => 'h1,h2,h3,h4,h5,h6,.site-title',
	            'property' => 'font-family',
	        ),
	    ),	
	) );
}





/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function thefuture_customize_preview_js() {
	wp_enqueue_script( 'thefuture-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'thefuture_customize_preview_js' );
