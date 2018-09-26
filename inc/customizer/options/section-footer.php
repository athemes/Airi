<?php
/**
 * Footer Customizer panel
 *
 * @package Airi
 */


Airi_Kirki::add_section( 'airi_section_footer', array(
    'title'       	 => __( 'Footer', 'airi' ),
    'priority'       => 16,
) );
Airi_Kirki::add_field( 'airi', array(
	'type'       		=> 'image',
	'settings'    		=> 'footer_background_image',
	'label'       		=> __( 'Background image', 'airi' ),
	'section'     		=> 'airi_section_footer',
	'default'     		=> '',
	'transport'			=> 'auto',
    'output'      		=> array(
        array(
            'element'  => '.footer-widgets',
            'property' => 'background-image',
        ),
    ),		
) );

Airi_Kirki::add_field( 'airi', array(
	'type'        => 'radio',
	'settings'    => 'footer_widget_areas',
	'label'       => __( 'Footer widget areas', 'airi' ),
	'section'     => 'airi_section_footer',
	'default'     => '4',
	'priority'    => 10,
	'choices'     => array(
		'1'   	=> esc_attr__( '1', 'airi' ),
		'2'   	=> esc_attr__( '2', 'airi' ),
		'3'	 	=> esc_attr__( '3', 'airi' ),
		'4'  	=> esc_attr__( '4', 'airi' ),
	),
) );

Airi_Kirki::add_field( 'airi', array(
	'type'        		=> 'text',
	'settings'    		=> 'footer_credits',
	'label'       		=> esc_attr__( 'Footer credits', 'airi' ),
	'section'    		=> 'airi_section_footer',
	'sanitize_callback' => 'airi_sanitize_text',
	'default'     		=> '',
	'priority'    		=> 10,
) );

//Santize function
function airi_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}