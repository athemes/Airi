<?php
/**
 * Google Font Select Custom Control
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Airi_Google_Font_Select_Custom_Control extends Airi_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'google_fonts';
		/**
		 * The list of Google Fonts
		 */
		private $font_list = false;
		/**
		 * The saved font values decoded from json
		 */
		private $font_values = array();
		/**
		 * The index of the saved font within the list of Google fonts
		 */
		private $font_list_index = 0;
		/**
		 * The number of fonts to display from the json file. Either positive integer or 'all'. Default = 'all'
		 */
		private $font_count = 'all';
		/**
		 * Get our list of fonts from the json file
		 */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );

			// Get the list of Google fonts.
			if ( isset( $this->input_attrs['font_count'] ) ) {
				if ( 'all' != strtolower( $this->input_attrs['font_count'] ) ) {
					$this->font_count = ( abs( (int) $this->input_attrs['font_count'] ) > 0 ? abs( (int) $this->input_attrs['font_count'] ) : 'all' );
				}
			}
			$this->font_list = $this->airi_getGoogleFonts( 'all' );
			// Decode the default json font value.
			$this->font_values = json_decode( $this->value() );
			// Find the index of our default font within our list of Google fonts.
			$this->font_list_index = $this->airi_getFontIndex( $this->font_list, $this->font_values->font );
		}
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'airi-custom-controls-js', $this->get_airi_resource_url() . 'assets/js/customizer.js', array(), '1.0', true );
			wp_enqueue_style( 'airi-custom-controls-css', $this->get_airi_resource_url() . 'assets/css/customizer.css', array(), '1.1', 'all' );
		}
		/**
		 * Export our List of Google Fonts to JavaScript
		 */
		public function to_json() {
			parent::to_json();
			$this->json['airifontslist'] = $this->font_list;
		}
		/**
		 * Render the control in the customizer.
		 */
		public function render_content() {
			$font_counter    = 0;
			$is_font_in_list = false;
			$font_list_str   = '';

			if ( ! empty( $this->font_list ) ) {
				?>
				<div class="google_fonts_select_control">
					<?php if ( ! empty( $this->label ) ) { ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php } ?>
					<?php if ( ! empty( $this->description ) ) { ?>
						<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php } ?>
					<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-google-font-selection" <?php $this->link(); ?> />
					<div class="customize-control-description"><?php esc_html_e( 'Font Family', 'airi' ); ?></div>
					<div class="google-fonts">
						<select class="google-fonts-list" control-name="<?php echo esc_attr( $this->id ); ?>">
							<?php
							foreach ( $this->font_list as $key => $value ) {
								$font_counter++;
								$font_list_str .= '<option value="' . esc_attr( $value->family ) . '" ' . selected( esc_attr( $this->font_values->font ), esc_attr( $value->family ), false ) . '>' . esc_html( $value->family ) . '</option>';
								if ( $this->font_values->font === $value->family ) {
									$is_font_in_list = true;
								}
								if ( is_int( $this->font_count ) && $font_counter === $this->font_count ) {
									break;
								}
							}
							if ( ! $is_font_in_list && $this->font_list_index ) {
								// If the default or saved font value isn't in the list of displayed fonts, add it to the top of the list as the default font.
								$font_list_str = '<option value="' . esc_attr( $this->font_list[ $this->font_list_index ]->family ) . '" ' . selected( esc_attr( $this->font_values->font ), esc_attr( $this->font_list[ $this->font_list_index ]->family ), false ) . '>' . esc_hml( $this->font_list[ $this->font_list_index ]->family ) . ' (default)</option>' . $font_list_str;
							}
								// Display our list of font options.
								echo $font_list_str;
							?>
						</select>
					</div>
					<div class="customize-control-description"><?php esc_html_e( 'Variant', 'airi' ); ?></div>
					<div class="weight-style">
						<select class="google-fonts-regularweight-style">
							<?php
							foreach ( $this->font_list[ $this->font_list_index ]->variants as $key => $value ) {
								echo '<option value="' . esc_attr( $value ) . '" ' . selected( esc_attr( $this->font_values->variant ), esc_attr( $value ), false ) . '>' . esc_html( $value ) . '</option>';
							}
							?>
						</select>
					</div>
					<input type="hidden" class="google-fonts-category" value="<?php echo esc_attr( $this->font_values->category ); ?>">
				</div>
				<?php
			}
		}

		/**
		 * Find the index of the saved font in our multidimensional array of Google Fonts
		 */
		public function airi_getFontIndex( $haystack, $needle ) {
			foreach ( $haystack as $key => $value ) {
				if ( $value->family == $needle ) {
					return $key;
				}
			}
			return false;
		}

		/**
		 * Return the list of Google Fonts from our json file. Unless otherwise specfied, list will be limited to 30 fonts.
		 */
		public function airi_getGoogleFonts( $count = 30 ) {
			// Google Fonts json generated from https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=YOUR-API-KEY .
			$font_file = $this->get_airi_resource_url() . 'assets/google-fonts-alphabetical.json';

			$request = wp_remote_get( $font_file );
			if ( is_wp_error( $request ) ) {
				return '';
			}

			$body    = wp_remote_retrieve_body( $request );
			$content = json_decode( $body );

			if ( $count == 'all' ) {
				return $content->items;
			} else {
				return array_slice( $content->items, 0, $count );
			}
		}
	}
}
