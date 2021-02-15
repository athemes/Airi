<?php
/**
 * Sortable Repeater Custom Control
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Airi_Sortable_Repeater_Custom_Control extends Airi_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'sortable_repeater';
		/**
		 * Button labels
		 */
		public $button_labels = array();
		/**
		 * Social Icons Array
		 */
		public $social_icons = array();
		/**
		 * Current values
		 */
		public $current_values = '';
		/**
		 * Constructor
		 */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
			// Merge the passed button labels with our default labels
			$this->button_labels = wp_parse_args(
				$this->button_labels,
				array(
					'add' => __( 'Add', 'airi' ),
				)
			);

			$this->social_icons = wp_parse_args(
				$this->social_icons,
				array(
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
				)
			);

		}


		public function create_social_icons_dropdown() {
			$dropdown  = '';
			$dropdown .= '<select name="repeater-icon-select" class="repeater-icon-select">';
			$dropdown .= '<option value="">' . __( 'Select icon', 'aria' ) . '</option>';

			foreach ( $this->social_icons as $icon => $name ) {
				$dropdown .= '<option value="' . $icon . '">' . $name . '</option>';
			}

			$dropdown .= '</select>';
			return $dropdown;
		}


		public function social_icons_json() {
			return json_encode( $this->social_icons );
		}

		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'airi-custom-controls-js', $this->get_airi_resource_url() . 'assets/js/customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.0', true );
			wp_enqueue_style( 'airi-custom-controls-css', $this->get_airi_resource_url() . 'assets/css/customizer.css', array(), '1.0', 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
			<div class="sortable_repeater_control">
			<?php if ( ! empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
			<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-sortable-repeater" <?php $this->link(); ?> data-social-icons="<?php echo esc_attr( $this->social_icons_json() ); ?>" />

				<div class="sortable_repeater sortable">
					<div class="repeater">
					<?php echo $this->create_social_icons_dropdown(); ?>
						<br/>
						<input type="text" value="" class="repeater-input-url" placeholder="https://" />
						<span class="dashicons dashicons-sort"></span>
						<a class="customize-control-sortable-repeater-delete" href="#">
							<span class="dashicons dashicons-no-alt"></span>
						</a>
					</div>
				</div>
				<button class="button customize-control-sortable-repeater-add" type="button"><?php echo $this->button_labels['add']; ?></button>
			</div>
			<?php
		}
	}
}
