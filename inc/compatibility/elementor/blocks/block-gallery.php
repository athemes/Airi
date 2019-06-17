<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Blog block
 *
 * @since 1.0.0
 */
class Airi_Gallery extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve blog widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'athemes-gallery';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve blog widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'aThemes: Gallery', 'airi' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve blog widget icon.
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
	 * Register blog widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_gallery_settings',
			[
				'label' => __( 'Gallery', 'airi' ),
			]
		);

		$this->add_control(
			'images',
			[
				'label' => __( 'Add Images', 'airi' ),
				'type' => Controls_Manager::GALLERY,
				'show_label' => false,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->end_controls_section();
	}

	public function add_lightbox_data_to_image_link( $link_html ) {
		return preg_replace( '/^<a/', '<a ' . $this->get_render_attribute_string( 'link' ), $link_html );
	}

	/**
	 * Render blog widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( ! $settings['images'] ) {
			return;
		}

		$ids = wp_list_pluck( $settings['images'], 'id' );

		$this->add_render_attribute( 'shortcode', 'ids', implode( ',', $ids ) );
		$this->add_render_attribute( 'shortcode', 'size', 'full' );


		$this->add_render_attribute( 'shortcode', 'link', 'file' );
		?>
		<div class="airi-image-gallery">
			<?php
			add_filter( 'wp_get_attachment_link', [ $this, 'add_lightbox_data_to_image_link' ] );

			$id = uniqid();

			$count = 0;
			$args = [
				'image_size'    =>  'custom',
			];
			foreach ( $settings['images'] as $img )
			{
				if ( 0 == $count || 5 == $count || 11 == $count )
				{
					$class_item = 'item1';
					$args['image_custom_dimension'] = [
						'width' =>  716,
						'height' =>  348,
					];
				}
				elseif ( 8 == $count )
				{
					$class_item = 'item3';
					$args['image_custom_dimension'] = [
						'width' =>  716,
						'height' =>  716,
					];
				}
				elseif ( 12 == $count )
				{
					$class_item = 'item4';
					$args['image_custom_dimension'] = [
						'width' =>  348,
						'height' =>  716,
					];
				}
				else
				{
					$class_item = 'item2';
					$args['image_custom_dimension'] = [
						'width' =>  348,
						'height' =>  348,
					];
				}
				$image_id = $img['id'];
				$image_src = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image', $args );
				$image_src_full = wp_get_attachment_image_src( $image_id, 'full' );
				$image_output = sprintf( '<img src="%s" />', esc_url( $image_src ));
				if ( 9 == $count )
				{
					$items[] = "<div class='group'>";
					$items[] = "<div class='inner-group d-flex'>";
				}
				$items[] = "<div class='gallery-item landscape " . esc_attr( $class_item ) . "'>
					<a data-elementor-open-lightbox='yes' data-elementor-lightbox-slideshow='" . $this->get_id() . "' href='" . $image_src_full[0] . "'>
						$image_output
						<i class='fa fa-search' aria-hidden='true'></i>
					</a>
				</div>";
				if ( 10 == $count )
				{
					$items[] = "</div>";
				}
				if ( 11 == $count )
				{
					$items[] = "</div>";
				}
				$count++;
				if ( 12 < $count )
				{
					$count = 0;
				}
			}
			$output = "<div id='" . esc_attr( $id ) . "' class='gallery galleryid-{$id} d-flex'>";
			$output .= implode( ' ', $items );
			$output .= "</div>";
			echo $output;
			?>

			<?php
			remove_filter( 'wp_get_attachment_link', [ $this, 'add_lightbox_data_to_image_link' ] );
			?>
		</div>
		<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Airi_Gallery() );