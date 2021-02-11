<?php
/**
 * Sortable Repeater Custom Control
 */
class Airi_Sortable_Repeater_Custom_Control extends Airi_Custom_Control {
	/**
	 * The type of control being rendered
	 */
	public $type = 'sortable_repeater';
	/**
	 * Social Icons Array
	 */
	public $social_icons = array();
	/**
	 * Button labels
	 */
	public $button_labels = array();
	/**
	 * Currently selected icon
	 */
	public $current_values = array();
	/**
	 * Constructor
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		parent::__construct( $manager, $id, $args );

		$this->current_values = json_decode( $this->values );
		var_dump( $this->current_values );

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

		$this->button_labels = wp_parse_args(
			$this->button_labels,
			array(
				'add' => __( 'Add', 'airi' ),
			)
		);
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
				<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-sortable-repeater" <?php $this->link(); ?> />
				<div class="sortable_repeater sortable">
					<div class="repeater">
						<select name="repeater-icon-select" class="repeater-icon-select">
							<option value=""><?php echo esc_html( __( 'Select icon', 'aria' ) ); ?></option>
							<?php foreach ( $this->social_icons as $icon => $name ) : ?>
									<option value="<?php echo esc_attr( $icon ); ?>" <?php // selected( $icon, '', false ); ?>><?php echo esc_html( $name ); ?></option>						
							<?php endforeach; ?>
						</select>
						<input type="text" value="" class="repeater-input" placeholder="https://" /><span class="dashicons dashicons-sort"></span><a class="customize-control-sortable-repeater-delete" href="#"><span class="dashicons dashicons-no-alt"></span></a>
					</div>
				</div>
				<button class="button customize-control-sortable-repeater-add" type="button"><?php echo esc_html( $this->button_labels['add'] ); ?></button>
			</div>
		<?php
	}
}
