<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor image box widget.
 *
 * Elementor widget that displays an image, a headline and a text.
 *
 * @since 1.0.0
 */
class aThemes_Category_Grid extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve image box widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'athemes-categories-grid';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve image box widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'aThemes: Shop category grid', 'airi' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve image box widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the icon list widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'airi-elements' ];
	}	

	/**
	 * Register image box widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {


		//Box 1
		$this->start_controls_section(
			'section_box_1',
			[
				'label' => __( 'Box 1', 'airi' ),
			]
		);

		$this->add_control(
			'image1',
			[
				'label' => __( 'Choose Image', 'airi' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'title1',
			[
				'label' => __( 'Label title', 'airi' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Shoes', 'airi' ),
				'placeholder' => __( 'Enter your label', 'airi' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link1',
			[
				'label' => __( 'Link to', 'airi' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '#',
				],
				'placeholder' => __( 'https://your-link.com', 'airi' ),
				'separator' => 'before',
				'show_external' => false
			]
		);

		$this->end_controls_section();


		//Box 2
		$this->start_controls_section(
			'section_box_2',
			[
				'label' => __( 'Box 2', 'airi' ),
			]
		);

		$this->add_control(
			'image2',
			[
				'label' => __( 'Choose Image', 'airi' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'title2',
			[
				'label' => __( 'Label title', 'airi' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Bags', 'airi' ),
				'placeholder' => __( 'Enter your label', 'airi' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link2',
			[
				'label' => __( 'Link to', 'airi' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '#',
				],				
				'placeholder' => __( 'https://your-link.com', 'airi' ),
				'separator' => 'before',
				'show_external' => false				
			]
		);

		$this->end_controls_section();


		//Box 3
		$this->start_controls_section(
			'section_box_3',
			[
				'label' => __( 'Box 3', 'airi' ),
			]
		);

		$this->add_control(
			'image3',
			[
				'label' => __( 'Choose Image', 'airi' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'title3',
			[
				'label' => __( 'Label title', 'airi' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Pants', 'airi' ),
				'placeholder' => __( 'Enter your label', 'airi' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link3',
			[
				'label' => __( 'Link to', 'airi' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '#',
				],				
				'placeholder' => __( 'https://your-link.com', 'airi' ),
				'separator' => 'before',
				'show_external' => false
			]
		);

		$this->end_controls_section();

		//Box 4
		$this->start_controls_section(
			'section_box_4',
			[
				'label' => __( 'Box 4 (CTA)', 'airi' ),
			]
		);

		$this->add_control(
			'text4',
			[
				'label' => __( 'Text', 'airi' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Spring collection', 'airi' ),
				'placeholder' => __( 'Enter your label', 'airi' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title4',
			[
				'label' => __( 'Label title', 'airi' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'New arrivals', 'airi' ),
				'placeholder' => __( 'Enter your label', 'airi' ),
				'label_block' => true,
			]
		);		
		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button text', 'airi' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Shop now', 'airi' ),				
				'placeholder' => __( 'Button text', 'airi' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'link4',
			[
				'label' => __( 'Link to', 'airi' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '#',
				],				
				'placeholder' => __( 'https://your-link.com', 'airi' ),
				'separator' => 'before',
				'show_external' => false
			]
		);

		$this->end_controls_section();	

		//Box 5
		$this->start_controls_section(
			'section_box_5',
			[
				'label' => __( 'Box 5', 'airi' ),
			]
		);

		$this->add_control(
			'image5',
			[
				'label' => __( 'Choose Image', 'airi' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'title5',
			[
				'label' => __( 'Label title', 'airi' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Dresses', 'airi' ),
				'placeholder' => __( 'Enter your label', 'airi' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link5',
			[
				'label' => __( 'Link to', 'airi' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '#',
				],				
				'placeholder' => __( 'https://your-link.com', 'airi' ),
				'separator' => 'before',
				'show_external' => false
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_shop_cats',
			[
				'label' => __( 'Style', 'airi' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'box_title_bg',
			[
				'label' => __( 'Box title background color', 'airi' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .shop-cats-grid .cats-grid-item .grid-item-label' => 'background-color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_control(
			'box_title_color',
			[
				'label' => __( 'Box title background color', 'airi' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#191919',
				'selectors' => [
					'{{WRAPPER}} .shop-cats-grid .cats-grid-item .grid-item-label' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);		


		$this->add_control(
			'main_color',
			[
				'label' => __( 'Main color', 'airi' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#e55454',
				'selectors' => [
					'{{WRAPPER}} .shop-cats-grid .cats-grid-item.item4' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .shop-cats-grid .cats-grid-item .grid-item-inner h4' => 'color: {{VALUE}};',
					'{{WRAPPER}} .shop-cats-grid .cats-grid-item .elementor-button' => 'background-color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);	

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => __( 'Box titles', 'airi' ),
				'name' => 'labels_typography',
				'selector' => '{{WRAPPER}} .shop-cats-grid .cats-grid-item .grid-item-label',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);		

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => __( 'CTA box titles', 'airi' ),
				'name' => 'cta_box_typography',
				'selector' => '{{WRAPPER}} .shop-cats-grid .cats-grid-item .grid-item-inner h5, {{WRAPPER}} .shop-cats-grid .cats-grid-item.item4 .grid-item-inner h4',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);	

		$this->end_controls_section();

	}

	/**
	 * Render image box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		
		<div class="shop-cats-grid">
			<div class="cats-grid-item item1" style="background-image:url(<?php echo esc_url( $settings['image1']['url'] ); ?>)">
				<a class="grid-item-label" href="<?php echo esc_url( $settings['link1']['url'] ); ?>"><?php echo esc_html( $settings['title1']); ?></a>
			</div>	
			<div class="cats-grid-item item2" style="background-image:url(<?php echo esc_url( $settings['image2']['url'] ); ?>)">
				<a class="grid-item-label" href="<?php echo esc_url( $settings['link2']['url'] ); ?>"><?php echo esc_html( $settings['title2']); ?></a>
			</div>	
			<div class="cats-grid-item item3" style="background-image:url(<?php echo esc_url( $settings['image3']['url'] ); ?>)">
				<a class="grid-item-label" href="<?php echo esc_url( $settings['link3']['url'] ); ?>"><?php echo esc_html( $settings['title3']); ?></a>
			</div>	
			<div class="cats-grid-item item4">
				<div class="grid-item-inner">
					<h5><?php echo esc_html( $settings['text4']); ?></h5>
					<h4><?php echo esc_html( $settings['title4']); ?></h4>
					<a href="<?php echo esc_url( $settings['link4']['url'] ); ?>" class="elementor-button-link elementor-button elementor-size-sm"><?php echo esc_html( $settings['button_text']); ?></a>	
				</div>			
			</div>	
			<div class="cats-grid-item item5" style="background-image:url(<?php echo esc_url( $settings['image5']['url'] ); ?>)">
				<a class="grid-item-label" href="<?php echo esc_url( $settings['link5']['url'] ); ?>"><?php echo esc_html( $settings['title5']); ?></a>
			</div>		
		</div>

		<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new aThemes_Category_Grid() );