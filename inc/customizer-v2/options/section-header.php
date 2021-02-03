<?php
/**
 * Customizer Header Controls
 *
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class Airi_Initialise_Customizer_Header_Settings
{
    // Get our default values
    private $defaults;

    public function __construct($defaults)
    {
        // Get our Customizer defaults
        $this->defaults = $defaults;

        // Register our Panels
        add_action('customize_register', array( $this, 'airi_add_customizer_panels' ));

        // Register our sections
        add_action('customize_register', array( $this, 'airi_add_customizer_sections' ));

        // Register our controls
        add_action('customize_register', array( $this, 'airi_register_controls' ));

    }


    /**
     * Register the Customizer panels
     */
    public function airi_add_customizer_panels($wp_customize)
    {
        /**
         * Add our Header Panel
         */
        $wp_customize->add_panel(
            'airi_header_panel',
            array(
                'priority' => 9,
                'title' => __('Header', 'airi')
            )
        );
    }


    /**
     * Register the Customizer sections
     */
    public function airi_add_customizer_sections($wp_customize)
    {
        /**
         * Add Menu Section
         */
        $wp_customize->add_section(
            'header_menu_section',
            array(
                'title' => __('Menu', 'airi'),
                'panel' => 'airi_header_panel'
            )
        );
        
    }

    /**
     * Register our Typography Font Families Controls
     */
    public function airi_register_controls($wp_customize)
    {
        $wp_customize->add_setting(
            'body_font',
            array(
                'default' => $this->defaults['body_font'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'airi_google_font_sanitization'
            )
        );
        $wp_customize->add_control(new Airi_Google_Font_Select_Custom_Control(
            $wp_customize,
            'body_font',
            array(
                'label' => __('Body', 'airi'),
                'section' => 'typography_font_families_section',
                'input_attrs' => array(
                    'font_count' => 'all',
                    'orderby' => 'alpha',
                ),
            )
        ));

        $wp_customize->add_setting(
            'headings_font',
            array(
                'default' => $this->defaults['headings_font'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'airi_google_font_sanitization'
            )
        );
        $wp_customize->add_control(new Airi_Google_Font_Select_Custom_Control(
            $wp_customize,
            'headings_font',
            array(
                'label' => __('Headings', 'airi'),
                'section' => 'typography_font_families_section',
                'input_attrs' => array(
                    'font_count' => 'all',
                    'orderby' => 'alpha',
                ),
            )
        ));
    }

}

/**
 * Initialise our Customizer settings
 */
$airi_settings = new Airi_Initialise_Customizer_Typography_Settings(
    array(
        'font_size_body' => 16,
        'font_size_site_title' => 36,
        'font_size_site_desc' => 16,
        'font_size_menu_top_items' => 13,
        'font_size_menu_sub_items' => 13,
        'font_size_index_title' => 30,
        'font_size_single_title' => 36,
        'font_size_widget_title' => 24,
        'font_size_widgets' => 16,
        'font_size_footer_widget_titles' => 20,
        'font_size_footer_widgets' => 16,
        'font_size_footer_credits' => 13,
        'body_font' => json_encode(
            array(
                'font' => 'Work Sans',
                'variant' => 'regular',
            )
        ),
        'headings_font' => json_encode(
            array(
                'font' => 'Work Sans',
                'variant' => 'regular',
            )
        ),
    )
);