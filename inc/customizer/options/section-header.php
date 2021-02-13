<?php
/**
 * Header Customizer panel
 *
 * @package Airi
 */




$airi_social_networks = array(
	'fa-facebook'      => 'Facebook',
	'fa-twitter'       => 'Twitter',
	'fa-linkedin'      => 'Linkedin',
	'fa-dribbble'      => 'Dribbble',
	'fa-google-plus-g' => 'Twitter',
	'fa-xing'          => 'Xing',
	'fa-weibo'         => 'Weibo',
	'fa-vimeo'         => 'Vimeo',
	'fa-youtube'       => 'YouTube',
	'fa-vk'            => 'VK',
	'fa-pinterest-p'   => 'Pinterest',
	'fa-instagram'     => 'Instagram',
	'fa-github'        => 'GitHub',
	'fa-bandcamp'      => 'Bandcamp',
	'fa-behance'       => 'Behance',
	'fa-foursquare'    => 'Foursquare',
	'fa-reddit'        => 'Reddit',
	'fa-spotify'       => 'Spotify',
	'fa-soundcloud'    => 'Soundcloud',
	'fa-telegram'      => 'telegram',
);
Airi_Kirki::add_field(
	'airi',
	array(
		'type'        => 'repeater',
		'settings'    => 'x1_header_social',
		'label'       => __( 'Social links', 'airi' ),
		'description' => __( 'Available for menu types Extended 1', 'airi' ),
		'section'     => 'airi_section_menu',
		'row_label'   => array(
			'type'  => 'field',
			'value' => esc_attr__( 'Social network', 'airi' ),
			'field' => 'icon',
		),
		'required'    => array(
			array(
				'setting'  => 'menu_type',
				'value'    => 'menuStyle3',
				'operator' => '==',
			),
		),
		'default'     => array(
			array(
				'icon'     => 'fa-facebook',
				'link_url' => 'https://facebook.com/yourprofile',
			),
			array(
				'icon'     => 'fa-twitter',
				'link_url' => 'https://twitter.com/yourprofile',
			),
		),
		'fields'      => array(
			'icon'     => array(
				'type'    => 'select',
				'label'   => __( 'Social network', 'airi' ),
				'choices' => $airi_social_networks,
			),
			'link_url' => array(
				'type'    => 'text',
				'label'   => esc_attr__( 'Social profile URL', 'airi' ),
				'default' => '',
			),
		),
	)
);
