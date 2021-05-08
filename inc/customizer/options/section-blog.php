<?php
/**
 * Customizer Blog Controls
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class Airi_Initialise_Customizer_Blog_Settings {

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
		 * Add our Blogs Panel
		 */
		$wp_customize->add_panel(
			'airi_panel_blog',
			array(
				'priority' => 9,
				'title'    => __( 'Blog', 'airi' ),
			)
		);
	}


	/**
	 * Register the Customizer sections
	 */
	public function airi_add_customizer_sections( $wp_customize ) {
		/**
		 * Add Blog Section
		 */
		$wp_customize->add_section(
			'airi_section_blog_index',
			array(
				'title'    => __( 'Index&amp;archives', 'airi' ),
				'priority' => 16,
				'panel'    => 'airi_panel_blog',
			)
		);

		$wp_customize->add_section(
			'airi_section_blog_single',
			array(
				'title'    => __( 'Single posts', 'airi' ),
				'priority' => 17,
				'panel'    => 'airi_panel_blog',
			)
		);

	}

	/**
	 * Register our Blog Controls
	 */
	public function airi_register_controls( $wp_customize ) {

		/**
		 * Index
		 */

		$wp_customize->add_setting(
			'blog_layout',
			array(
				'default'           => $this->defaults['blog_layout'],
				'sanitize_callback' => 'airi_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'blog_layout',
			array(
				'type'     => 'radio',
				'label'    => __( 'Blog layout', 'airi' ),
				'section'  => 'airi_section_blog_index',
				'priority' => 10,
				'choices'  => array(
					'layout-default'     => esc_attr__( 'Default', 'airi' ),
					'layout-grid'        => esc_attr__( 'Grid', 'airi' ),
					'layout-list-2'      => esc_attr__( 'Classic', 'airi' ),
					'layout-two-columns' => esc_attr__( 'Two Columns', 'airi' ),
				),
			)
		);

		$wp_customize->add_setting(
			'excerpt_length',
			array(
				'default'           => $this->defaults['excerpt_length'],
				'transport'         => 'postMessage',
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new Airi_Slider_Custom_Control(
				$wp_customize,
				'excerpt_length',
				array(
					'label'       => esc_attr__( 'Excerpt length', 'airi' ),
					'section'     => 'airi_section_blog_index',
					'input_attrs' => array(
						'min'     => 5,
						'max'     => 60,
						'step'    => 1,
						'default' => $this->defaults['excerpt_length'],
					),
				)
			)
		);

		$wp_customize->add_setting(
			'read_more_text',
			array(
				'default'           => $this->defaults['read_more_text'],
				'sanitize_callback' => 'airi_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'read_more_text',
			array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Read more text', 'airi' ),
				'description' => esc_attr__( 'Leave empty to hide', 'airi' ),
				'section'     => 'airi_section_blog_index',
				'priority'    => 10,
			)
		);

		$wp_customize->add_setting(
			'index_hide_thumb',
			array(
				'default'           => $this->defaults['index_hide_thumb'],
				'sanitize_callback' => 'airi_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			'index_hide_thumb',
			array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Hide post thumbnail?', 'airi' ),
				'section'  => 'airi_section_blog_index',
				'priority' => 10,
			)
		);

		$wp_customize->add_setting(
			'index_hide_date',
			array(
				'default'           => $this->defaults['index_hide_date'],
				'sanitize_callback' => 'airi_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			'index_hide_date',
			array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Hide post date?', 'airi' ),
				'section'  => 'airi_section_blog_index',
				'priority' => 10,
			)
		);

		$wp_customize->add_setting(
			'index_hide_cats',
			array(
				'default'           => $this->defaults['index_hide_cats'],
				'sanitize_callback' => 'airi_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			'index_hide_cats',
			array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Hide post categories?', 'airi' ),
				'section'  => 'airi_section_blog_index',
				'priority' => 10,
			)
		);

		$wp_customize->add_setting(
			'index_hide_author',
			array(
				'default'           => $this->defaults['index_hide_author'],
				'sanitize_callback' => 'airi_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			'index_hide_author',
			array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Hide post author?', 'airi' ),
				'section'  => 'airi_section_blog_index',
				'priority' => 10,
			)
		);

		$wp_customize->add_setting(
			'index_hide_comments',
			array(
				'default'           => $this->defaults['index_hide_comments'],
				'sanitize_callback' => 'airi_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			'index_hide_comments',
			array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Hide comments number?', 'airi' ),
				'section'  => 'airi_section_blog_index',
				'priority' => 10,
			)
		);

		/**
		 * Single posts
		 */

		$wp_customize->add_setting(
			'single_post_layout',
			array(
				'default'           => $this->defaults['single_post_layout'],
				'sanitize_callback' => 'airi_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'single_post_layout',
			array(
				'type'    => 'radio',
				'label'   => __( 'Single post layout', 'airi' ),
				'section' => 'airi_section_blog_single',
				'choices' => array(
					'layout-default' => esc_attr__( 'Default', 'airi' ),
					'layout-full'    => esc_attr__( 'No sidebar', 'airi' ),
				),
			)
		);

		$wp_customize->add_setting(
			'single_post_content_layout',
			array(
				'default'           => $this->defaults['single_post_content_layout'],
				'sanitize_callback' => 'airi_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'single_post_content_layout',
			array(
				'type'    => 'radio',
				'label'   => __( 'Content layout', 'airi' ),
				'section' => 'airi_section_blog_single',
				'choices' => array(
					'layout-default' => esc_attr__( 'Default', 'airi' ),
					'layout-2'       => esc_attr__( 'Layout 2', 'airi' ),
					'layout-3'       => esc_attr__( 'Layout 3', 'airi' ),
				),
			)
		);

		$wp_customize->add_setting(
			'single_comment_form_layout',
			array(
				'default'           => $this->defaults['single_comment_form_layout'],
				'sanitize_callback' => 'airi_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'single_comment_form_layout',
			array(
				'type'    => 'radio',
				'label'   => __( 'Comment Form Layout', 'airi' ),
				'section' => 'airi_section_blog_single',
				'choices' => array(
					'layout-default' => esc_attr__( 'Default', 'airi' ),
					'layout-2'       => esc_attr__( 'Layout 2', 'airi' ),
					'layout-3'       => esc_attr__( 'Layout 3', 'airi' ),
				),
			)
		);

		$wp_customize->add_setting(
			'single_hide_thumb',
			array(
				'default'           => $this->defaults['single_hide_thumb'],
				'sanitize_callback' => 'airi_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			'single_hide_thumb',
			array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Hide post thumbnail?', 'airi' ),
				'section'  => 'airi_section_blog_single',
				'priority' => 10,
			)
		);

		$wp_customize->add_setting(
			'single_hide_date',
			array(
				'default'           => $this->defaults['single_hide_date'],
				'sanitize_callback' => 'airi_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			'single_hide_date',
			array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Hide post date?', 'airi' ),
				'section'  => 'airi_section_blog_single',
				'priority' => 10,
			)
		);

		$wp_customize->add_setting(
			'single_hide_cats',
			array(
				'default'           => $this->defaults['single_hide_cats'],
				'sanitize_callback' => 'airi_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			'single_hide_cats',
			array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Hide post categories?', 'airi' ),
				'section'  => 'airi_section_blog_single',
				'priority' => 10,
			)
		);

		$wp_customize->add_setting(
			'single_hide_author',
			array(
				'default'           => $this->defaults['single_hide_author'],
				'sanitize_callback' => 'airi_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			'single_hide_author',
			array(
				'type'     => 'checkbox',
				'label'    => esc_attr__( 'Hide post author?', 'airi' ),
				'section'  => 'airi_section_blog_single',
				'priority' => 10,
			)
		);

	}

}


/**
 * Initialise our Customizer settings
 */
$airi_settings = new Airi_Initialise_Customizer_Blog_Settings(
	array(
		'blog_layout'                => 'layout-default',
		'excerpt_length'             => 20,
		'read_more_text'             => esc_attr__( 'Read more', 'airi' ),
		'index_hide_thumb'           => '0',
		'index_hide_date'            => '0',
		'index_hide_cats'            => '0',
		'index_hide_author'          => '0',
		'index_hide_comments'        => '0',
		'single_post_layout'         => 'layout-default',
		'single_post_content_layout' => 'layout-default',
		'single_comment_form_layout' => 'layout-default',
		'single_hide_thumb'          => '0',
		'single_hide_date'           => '0',
		'single_hide_cats'           => '0',
		'single_hide_author'         => '0',
	)
);

