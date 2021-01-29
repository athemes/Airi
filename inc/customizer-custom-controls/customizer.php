<?php
/**
 * Customizer Setup and Custom Controls
 *
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class Airi_initialise_customizer_settings
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

        // Register our Font Families controls
        add_action('customize_register', array( $this, 'airi_register_typography_font_families_controls' ));

        // Register our Font Sizes controls
        add_action('customize_register', array( $this, 'airi_register_typography_font_sizes_controls' ));

    }


    /**
     * Register the Customizer panels
     */
    public function airi_add_customizer_panels($wp_customize)
    {
        /**
         * Add our Header & Navigation Panel
         */
        $wp_customize->add_panel(
            'airi_typography_panel',
            array(
                'priority' => 11,
                'title' => __('Typography', 'airi')
            )
        );
    }


    /**
     * Register the Customizer sections
     */
    public function airi_add_customizer_sections($wp_customize)
    {
        /**
         * Add our section that contains examples of our Custom Controls
         */
        $wp_customize->add_section(
            'typography_custom_controls_section',
            array(
                'title' => __('Typography Controls Test', 'airi'),
                'description' => esc_html__('These are an example of Customizer Custom Controls.', 'airi')
            )
        );

        /**
         * Add Font Families Section
         */
        $wp_customize->add_section(
            'typography_font_families_section',
            array(
                'title' => __('Font families', 'airi'),
                'panel' => 'airi_typography_panel'
            )
        );
        
        /**
         * Add Font Families Section
         */
        $wp_customize->add_section(
            'typography_font_sizes_section',
            array(
                'title' => __('Font sizes', 'airi'),
                'panel' => 'airi_typography_panel'
            )
        );
    }

    /**
     * Register our Typography Font Families Controls
     */
    public function airi_register_typography_font_families_controls($wp_customize)
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


    /**
     * Register our Typography Font Sizes Controls
     */
    public function airi_register_typography_font_sizes_controls($wp_customize)
    {

        // General Label
        $wp_customize->add_setting(
            'typography_general_section_label',
            array(
                'sanitize_callback' => 'esc_html'
            )
        );
        $wp_customize->add_control(new Airi_Label_Custom_Control(
            $wp_customize,
            'typography_general_section_label',
            array(
                'label' => __('General', 'airi'),
                'section' => 'typography_font_sizes_section',
            )
        ));
        
        // Body Font Size Slider Control
        $wp_customize->add_setting(
            'font_size_body',
            array(
                'default' => $this->defaults['font_size_body'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Airi_Slider_Custom_Control(
            $wp_customize,
            'font_size_body',
            array(
                'label' => __('Body', 'airi'),
                'section' => 'typography_font_sizes_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 180,
                    'step' => 1,
                    'default' => $this->defaults['font_size_body'],
                ),
            )
        ));

        
        // Header Area Label
        $wp_customize->add_setting(
            'typography_header_area_section_label',
            array(
                'sanitize_callback' => 'esc_html'
            )
        );
        $wp_customize->add_control(new Airi_Label_Custom_Control(
            $wp_customize,
            'typography_header_area_section_label',
            array(
                'label' => __('Header Area', 'airi'),
                'section' => 'typography_font_sizes_section',
            )
        ));


        // Site Title Font Size Slider Control
        $wp_customize->add_setting(
            'font_size_site_title',
            array(
                'default' => $this->defaults['font_size_site_title'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Airi_Slider_Custom_Control(
            $wp_customize,
            'font_size_site_title',
            array(
                'label' => __('Site title', 'airi'),
                'section' => 'typography_font_sizes_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 180,
                    'step' => 1,
                    'default' => $this->defaults['font_size_site_title'],
                ),
            )
        ));

        // Site description Font Size Slider Control
        $wp_customize->add_setting(
            'font_size_site_desc',
            array(
                'default' => $this->defaults['font_size_site_desc'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Airi_Slider_Custom_Control(
            $wp_customize,
            'font_size_site_desc',
            array(
                'label' => __('Site description', 'airi'),
                'section' => 'typography_font_sizes_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 180,
                    'step' => 1,
                    'default' => $this->defaults['font_size_site_desc'],
                ),
            )
        ));

        // Top Menu Items Font Size Slider Control
        $wp_customize->add_setting(
            'font_size_menu_top_items',
            array(
                'default' => $this->defaults['font_size_menu_top_items'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Airi_Slider_Custom_Control(
            $wp_customize,
            'font_size_menu_top_items',
            array(
                'label' => __('Top menu items', 'airi'),
                'section' => 'typography_font_sizes_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 180,
                    'step' => 1,
                    'default' => $this->defaults['font_size_menu_top_items'],
                ),
            )
        ));

        // Sub Menu Items Font Size Slider Control
        $wp_customize->add_setting(
            'font_size_menu_sub_items',
            array(
                'default' => $this->defaults['font_size_menu_sub_items'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Airi_Slider_Custom_Control(
            $wp_customize,
            'font_size_menu_sub_items',
            array(
                'label' => __('Submenu items', 'airi'),
                'section' => 'typography_font_sizes_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 180,
                    'step' => 1,
                    'default' => $this->defaults['font_size_menu_sub_items'],
                ),
            )
        ));


        // Blog Label
        $wp_customize->add_setting(
            'typography_blog_section_label',
            array(
                'sanitize_callback' => 'esc_html'
            )
        );
        $wp_customize->add_control(new Airi_Label_Custom_Control(
            $wp_customize,
            'typography_blog_section_label',
            array(
                'label' => __('Blog', 'airi'),
                'section' => 'typography_font_sizes_section',
            )
        ));


        // Post titles (archives) Font Size Slider Control
        $wp_customize->add_setting(
            'font_size_index_title',
            array(
                'default' => $this->defaults['font_size_index_title'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Airi_Slider_Custom_Control(
            $wp_customize,
            'font_size_index_title',
            array(
                'label' => __('Post titles (archives)', 'airi'),
                'section' => 'typography_font_sizes_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 180,
                    'step' => 1,
                    'default' => $this->defaults['font_size_index_title'],
                ),
            )
        ));

        // Post titles (singles) Font Size Slider Control
        $wp_customize->add_setting(
            'font_size_single_title',
            array(
                'default' => $this->defaults['font_size_single_title'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Airi_Slider_Custom_Control(
            $wp_customize,
            'font_size_single_title',
            array(
                'label' => __('Post titles (singles)', 'airi'),
                'section' => 'typography_font_sizes_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 180,
                    'step' => 1,
                    'default' => $this->defaults['font_size_single_title'],
                ),
            )
        ));


        // Sidebar Label
        $wp_customize->add_setting(
            'typography_sidebar_section_label',
            array(
                'sanitize_callback' => 'esc_html'
            )
        );
        $wp_customize->add_control(new Airi_Label_Custom_Control(
            $wp_customize,
            'typography_sidebar_section_label',
            array(
                'label' => __('Sidebar', 'airi'),
                'section' => 'typography_font_sizes_section',
            )
        ));


        // Widget titles Font Size Slider Control
        $wp_customize->add_setting(
            'font_size_widget_title',
            array(
                'default' => $this->defaults['font_size_widget_title'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Airi_Slider_Custom_Control(
            $wp_customize,
            'font_size_widget_title',
            array(
                'label' => __('Widget titles', 'airi'),
                'section' => 'typography_font_sizes_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 180,
                    'step' => 1,
                    'default' => $this->defaults['font_size_widget_title'],
                ),
            )
        ));

        // Widget text Font Size Slider Control
        $wp_customize->add_setting(
            'font_size_widgets',
            array(
                'default' => $this->defaults['font_size_widgets'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Airi_Slider_Custom_Control(
            $wp_customize,
            'font_size_widgets',
            array(
                'label' => __('Widget text', 'airi'),
                'section' => 'typography_font_sizes_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 180,
                    'step' => 1,
                    'default' => $this->defaults['font_size_widgets'],
                ),
            )
        ));


        // Footer Area Label
        $wp_customize->add_setting(
            'typography_footer_area_section_label',
            array(
                'sanitize_callback' => 'esc_html'
            )
        );
        $wp_customize->add_control(new Airi_Label_Custom_Control(
            $wp_customize,
            'typography_footer_area_section_label',
            array(
                'label' => __('Footer Area', 'airi'),
                'section' => 'typography_font_sizes_section',
            )
        ));


        // Footer widget titles Font Size Slider Control
        $wp_customize->add_setting(
            'font_size_footer_widget_titles',
            array(
                'default' => $this->defaults['font_size_footer_widget_titles'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Airi_Slider_Custom_Control(
            $wp_customize,
            'font_size_footer_widget_titles',
            array(
                'label' => __('Footer widget titles', 'airi'),
                'section' => 'typography_font_sizes_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 180,
                    'step' => 1,
                    'default' => $this->defaults['font_size_footer_widget_titles'],
                ),
            )
        ));

        // Footer widget text Font Size Slider Control
        $wp_customize->add_setting(
            'font_size_footer_widgets',
            array(
                'default' => $this->defaults['font_size_footer_widgets'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Airi_Slider_Custom_Control(
            $wp_customize,
            'font_size_footer_widgets',
            array(
                'label' => __('Footer widget text', 'airi'),
                'section' => 'typography_font_sizes_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 180,
                    'step' => 1,
                    'default' => $this->defaults['font_size_footer_widgets'],
                ),
            )
        ));

        // Footer credits Font Size Slider Control
        $wp_customize->add_setting(
            'font_size_footer_credits',
            array(
                'default' => $this->defaults['font_size_footer_credits'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Airi_Slider_Custom_Control(
            $wp_customize,
            'font_size_footer_credits',
            array(
                'label' => __('Footer credits', 'airi'),
                'section' => 'typography_font_sizes_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 180,
                    'step' => 1,
                    'default' => $this->defaults['font_size_footer_credits'],
                ),
            )
        ));
    }
}

/**
 * Google Font sanitization
 *
 * @param  string	JSON string to be sanitized
 * @return string	Sanitized input
 */
if (! function_exists('airi_google_font_sanitization')) {
    function airi_google_font_sanitization($input)
    {
        $val =  json_decode($input, true);
        if (is_array($val)) {
            foreach ($val as $key => $value) {
                $val[$key] = sanitize_text_field($value);
            }
            $input = json_encode($val);
        } else {
            $input = json_encode(sanitize_text_field($val));
        }
        return $input;
    }
}

/**
 * Load all our Customizer Custom Controls
 */
require_once trailingslashit(dirname(__FILE__)) . 'custom-controls/class-airi-custom-control.php';
require_once trailingslashit(dirname(__FILE__)) . 'custom-controls/class-airi-google-font-select-custom-control.php';
require_once trailingslashit(dirname(__FILE__)) . 'custom-controls/class-airi-slider-custom-control.php';
require_once trailingslashit(dirname(__FILE__)) . 'custom-controls/class-airi-label-custom-control.php';

/**
 * Initialise our Customizer settings
 */
$airi_settings = new Airi_initialise_customizer_settings(
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



/**
 * Enqueue Font scripts and styles.
 *
 * @return void
 */
if (! function_exists('airi_font_scripts')) {
	function airi_font_scripts()
	{
		$fonts = "";
		$headings_font = get_theme_mod('headings_font');
        $body_font = get_theme_mod('body_font');

        if ($headings_font) {
            $font_pieces = airi_process_font($headings_font);
            $fonts .= $font_pieces[0] . ":" . $font_pieces[1];
        }

        $fonts .= $fonts ? "|" : "";

        if ($body_font) {
            $font_pieces = airi_process_font($body_font);
            $fonts .= $font_pieces[0] . ":" . $font_pieces[1];
        }

        if ($fonts) {
            wp_enqueue_style('airi-typography-fonts', '//fonts.googleapis.com/css?family='. htmlspecialchars_decode($fonts), array(), null);
        } else {
            wp_enqueue_style('airi-typography-fonts', '//fonts.googleapis.com/css?family=Work+Sans:400,500,600'. htmlspecialchars_decode($fonts), array(), null);
		}
		
    }
}
add_action('wp_enqueue_scripts', 'airi_font_scripts');



if (! function_exists('airi_font_styles')) {
    function airi_font_styles()
    {
        $custom_styles = '';
        $custom_styles .= airi_font_family_styles();
        $custom_styles .= airi_font_sizes_styles();

        // Output all styles.
        echo '<style id="airi-font-css">' . esc_html($custom_styles) . '</style>';
    }
}
add_action('wp_head', 'airi_font_styles', 9999);


/**
 * Gutenberg
 */
if (! function_exists('airi_gutenberg_editor_font_styles')) {
    function airi_gutenberg_editor_font_styles()
    {
        airi_font_scripts();

        $custom_styles = airi_font_family_styles(true);
        wp_add_inline_style('airi-block-editor-styles', $custom_styles);
    }
}
add_action('enqueue_block_editor_assets', 'airi_gutenberg_editor_font_styles');



/**
 * Enqueue scripts for our Customizer preview
 *
 * @return void
 */
if (! function_exists('airi_customizer_preview_scripts')) {
    function airi_customizer_preview_scripts()
    {
        wp_enqueue_script('airi-customizer-preview-js', trailingslashit(get_template_directory_uri()) . 'inc/customizer-custom-controls/assets/js/customizer-preview.js', array( 'customize-preview', 'jquery' ), time(), false);
    }
}
add_action('customize_preview_init', 'airi_customizer_preview_scripts');



if (! function_exists('airi_font_family_styles')) {
    function airi_font_family_styles($gutenberg = false)
    {
        $custom_styles = '';

        $headings_font = get_theme_mod('headings_font');
        $body_font = get_theme_mod('body_font');

        if ($headings_font) {
            $font_pieces = airi_process_font($headings_font);
            $headings_font_val = $font_pieces[0];
        }

        if ($body_font) {
            $font_pieces = airi_process_font($body_font);
            $body_font_val = $font_pieces[0];
        }

        // If not gutenberg editor.
        if (! $gutenberg) {
            if ($headings_font) {
                $custom_styles .= "h1, h2, h3, h4, h5, h6, .site-title { font-family: $headings_font_val; }"."\n";
            }

            if ($body_font) {
                $custom_styles .= "body, button, input, select, textarea { font-family: $body_font_val; }"."\n";
            }
            return $custom_styles;
        }

        if ($headings_font) {
            $custom_styles .= ".editor-block-list__layout h1,.editor-block-list__layout h2,.editor-block-list__layout h3,.editor-block-list__layout h4,.editor-block-list__layout h5,.editor-block-list__layout h6,.editor-post-title__block .editor-post-title__input { font-family: $headings_font_val; }"."\n";
        }

        if ($body_font) {
            $custom_styles .= ".editor-block-list__layout,.editor-block-list__layout .editor-block-list__block { font-family: $body_font_val; }"."\n";
        }

        return $custom_styles;
    }
}



if (! function_exists('airi_font_sizes_styles')) {
    function airi_font_sizes_styles()
    {
        $custom_styles = '';

        $font_size_body = get_theme_mod('font_size_body');
        if ($font_size_body) {
            $custom_styles .= "body { font-size: ". absint($font_size_body) . "px; }"."\n";
        }
        
        $font_size_site_title = get_theme_mod('font_size_site_title');
        if ($font_size_site_title) {
            $custom_styles .= ".site-title { font-size: ". absint($font_size_site_title) . "px; }"."\n";
        }

        $font_size_site_desc = get_theme_mod('font_size_site_desc');
        if ($font_size_site_desc) {
            $custom_styles .= ".site-description { font-size: ". absint($font_size_site_desc) . "px; }"."\n";
        }

        $font_size_menu_top_items = get_theme_mod('font_size_menu_top_items');
        if ($font_size_menu_top_items) {
            $custom_styles .= ".main-navigation li { font-size: ". absint($font_size_menu_top_items) . "px; }"."\n";
        }
        
        $font_size_menu_sub_items = get_theme_mod('font_size_menu_sub_items');
        if ($font_size_menu_sub_items) {
            $custom_styles .= ".main-navigation ul ul li { font-size: ". absint($font_size_menu_sub_items) . "px; }"."\n";
        }
        
        $font_size_index_title = get_theme_mod('font_size_index_title');
        if ($font_size_index_title) {
            $custom_styles .= ".blog-loop .entry-title { font-size: ". absint($font_size_index_title) . "px; }"."\n";
        }
        
        $font_size_single_title = get_theme_mod('font_size_single_title');
        if ($font_size_single_title) {
            $custom_styles .= ".single-post .entry-title { font-size: ". absint($font_size_single_title) . "px; }"."\n";
        }
        
        $font_size_widget_title = get_theme_mod('font_size_widget_title');
        if ($font_size_widget_title) {
            $custom_styles .= ".widget-area .widget-title { font-size: ". absint($font_size_widget_title) . "px; }"."\n";
        }
        
        $font_size_widgets = get_theme_mod('font_size_widgets');
        if ($font_size_widgets) {
            $custom_styles .= ".widget-area .widget { font-size: ". absint($font_size_widgets) . "px; }"."\n";
        }
        
        $font_size_footer_widget_titles = get_theme_mod('font_size_footer_widget_titles');
        if ($font_size_footer_widget_titles) {
            $custom_styles .= ".sidebar-column .widget-title { font-size: ". absint($font_size_footer_widget_titles) . "px; }"."\n";
        }
        
        $font_size_footer_widgets = get_theme_mod('font_size_footer_widgets');
        if ($font_size_footer_widgets) {
            $custom_styles .= ".sidebar-column .widget { font-size: ". absint($font_size_footer_widgets) . "px; }"."\n";
        }
        
        $font_size_footer_credits = get_theme_mod('font_size_footer_credits');
        if ($font_size_footer_credits) {
            $custom_styles .= ".site-info { font-size: ". absint($font_size_footer_credits) . "px; }"."\n";
        }

        return $custom_styles;
    }
}



if (! function_exists('airi_process_font')) {
    function airi_process_font($font_mod)
    {
        $font_mod = esc_html($font_mod);
        $font_pieces = explode(",", str_replace(array("{", "}"), "", $font_mod));
        $font_family = explode(":", $font_pieces[0]);
        $font_variant = explode(":", $font_pieces[1]);

        return array(preg_replace('/[^\w\d\s]*/', '', htmlspecialchars_decode($font_family[1])), $font_variant[1]);
    }
}