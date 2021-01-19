<?php
/**
 * Airi Customizer Custom Controls
 *
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Custom Control Base Class
	 */
	class Airi_Custom_Control extends WP_Customize_Control {
		protected function get_airi_resource_url() {
			return trailingslashit( get_template_directory_uri() . '/inc/customizer-custom-controls/');
		}
	}
    
    /**
	 * Google Font Select Custom Control
	 */
	class Airi_Google_Font_Select_Custom_Control extends Airi_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'google_fonts';
		/**
		 * The list of Google Fonts
		 */
		private $fontList = false;
		/**
		 * The saved font values decoded from json
		 */
		private $fontValues = [];
		/**
		 * The index of the saved font within the list of Google fonts
		 */
		private $fontListIndex = 0;
		/**
		 * The number of fonts to display from the json file. Either positive integer or 'all'. Default = 'all'
		 */
		private $fontCount = 'all';
		/**
		 * The font list sort order. Either 'alpha' or 'popular'. Default = 'alpha'
		 */
		private $fontOrderBy = 'alpha';
		/**
		 * Get our list of fonts from the json file
		 */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
			// Get the font sort order
			if ( isset( $this->input_attrs['orderby'] ) && strtolower( $this->input_attrs['orderby'] ) === 'popular' ) {
				$this->fontOrderBy = 'popular';
			}
			// Get the list of Google fonts
			if ( isset( $this->input_attrs['font_count'] ) ) {
				if ( 'all' != strtolower( $this->input_attrs['font_count'] ) ) {
					$this->fontCount = ( abs( (int) $this->input_attrs['font_count'] ) > 0 ? abs( (int) $this->input_attrs['font_count'] ) : 'all' );
				}
			}
			$this->fontList = $this->airi_getGoogleFonts( 'all' );
			// Decode the default json font value
			$this->fontValues = json_decode( $this->value() );
			// Find the index of our default font within our list of Google fonts
			$this->fontListIndex = $this->airi_getFontIndex( $this->fontList, $this->fontValues->font );
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
			$this->json['airifontslist'] = $this->fontList;
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$fontCounter = 0;
			$isFontInList = false;
			$fontListStr = '';

			if( !empty($this->fontList) ) {
				?>
				<div class="google_fonts_select_control">
					<?php if( !empty( $this->label ) ) { ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php } ?>
					<?php if( !empty( $this->description ) ) { ?>
						<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php } ?>
					<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-google-font-selection" <?php $this->link(); ?> />
					<div class="google-fonts">
						<select class="google-fonts-list" control-name="<?php echo esc_attr( $this->id ); ?>">
							<?php
								foreach( $this->fontList as $key => $value ) {
									$fontCounter++;
									$fontListStr .= '<option value="' . $value->family . '" ' . selected( $this->fontValues->font, $value->family, false ) . '>' . $value->family . '</option>';
									if ( $this->fontValues->font === $value->family ) {
										$isFontInList = true;
									}
									if ( is_int( $this->fontCount ) && $fontCounter === $this->fontCount ) {
										break;
									}
								}
								if ( !$isFontInList && $this->fontListIndex ) {
									// If the default or saved font value isn't in the list of displayed fonts, add it to the top of the list as the default font
									$fontListStr = '<option value="' . $this->fontList[$this->fontListIndex]->family . '" ' . selected( $this->fontValues->font, $this->fontList[$this->fontListIndex]->family, false ) . '>' . $this->fontList[$this->fontListIndex]->family . ' (default)</option>' . $fontListStr;
								}
								// Display our list of font options
								echo $fontListStr;
							?>
						</select>
					</div>
					<div class="customize-control-description"><?php esc_html_e( 'Select weight & style for regular text', 'airi' ) ?></div>
					<div class="weight-style">
						<select class="google-fonts-regularweight-style">
							<?php
								foreach( $this->fontList[$this->fontListIndex]->variants as $key => $value ) {
									echo '<option value="' . $value . '" ' . selected( $this->fontValues->regularweight, $value, false ) . '>' . $value . '</option>';
								}
							?>
						</select>
					</div>
					<div class="customize-control-description"><?php esc_html_e( 'Select weight for', 'airi' ) ?> <italic><?php esc_html_e( 'italic text', 'airi' ) ?></italic></div>
					<div class="weight-style">
						<select class="google-fonts-italicweight-style" <?php disabled( in_array( 'italic', $this->fontList[$this->fontListIndex]->variants ), false ); ?>>
							<?php
								$optionCount = 0;
								foreach( $this->fontList[$this->fontListIndex]->variants as $key => $value ) {
									// Only add options that are italic
									if( strpos( $value, 'italic' ) !== false ) {
										echo '<option value="' . $value . '" ' . selected( $this->fontValues->italicweight, $value, false ) . '>' . $value . '</option>';
										$optionCount++;
									}
								}
								if( $optionCount == 0 ) {
									echo '<option value="">Not Available for this font</option>';
								}
							?>
						</select>
					</div>
					<div class="customize-control-description"><?php esc_html_e( 'Select weight for', 'airi' ) ?> <strong><?php esc_html_e( 'bold text', 'airi' ) ?></strong></div>
					<div class="weight-style">
						<select class="google-fonts-boldweight-style">
							<?php
								$optionCount = 0;
								foreach( $this->fontList[$this->fontListIndex]->variants as $key => $value ) {
									// Only add options that aren't italic
									if( strpos( $value, 'italic' ) === false ) {
										echo '<option value="' . $value . '" ' . selected( $this->fontValues->boldweight, $value, false ) . '>' . $value . '</option>';
										$optionCount++;
									}
								}
								// This should never evaluate as there'll always be at least a 'regular' weight
								if( $optionCount == 0 ) {
									echo '<option value="">Not Available for this font</option>';
								}
							?>
						</select>
					</div>
					<input type="hidden" class="google-fonts-category" value="<?php echo $this->fontValues->category; ?>">
				</div>
				<?php
			}
		}

		/**
		 * Find the index of the saved font in our multidimensional array of Google Fonts
		 */
		public function airi_getFontIndex( $haystack, $needle ) {
			foreach( $haystack as $key => $value ) {
				if( $value->family == $needle ) {
					return $key;
				}
			}
			return false;
		}

		/**
		 * Return the list of Google Fonts from our json file. Unless otherwise specfied, list will be limited to 30 fonts.
		 */
		public function airi_getGoogleFonts( $count = 30 ) {
			// Google Fonts json generated from https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=YOUR-API-KEY
			$fontFile = $this->get_airi_resource_url() . 'assets/google-fonts-alphabetical.json';
			if ( $this->fontOrderBy === 'popular' ) {
				$fontFile = $this->get_airi_resource_url() . 'assets/google-fonts-popularity.json';
			}

			$request = wp_remote_get( $fontFile );
			if( is_wp_error( $request ) ) {
				return "";
			}

			$body = wp_remote_retrieve_body( $request );
			$content = json_decode( $body );

			if( $count == 'all' ) {
				return $content->items;
			} else {
				return array_slice( $content->items, 0, $count );
			}
		}
    }

	/**
	 * Slider Custom Control
	 */
	class Airi_Slider_Custom_Control extends Airi_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'slider_control';
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
			<div class="slider-custom-control">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />
				<div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
			</div>
		<?php
		}
	}

	/**
	 * Google Font sanitization
	 *
	 * @param  string	JSON string to be sanitized
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'airi_google_font_sanitization' ) ) {
		function airi_google_font_sanitization( $input ) {
			$val =  json_decode( $input, true );
			if( is_array( $val ) ) {
				foreach ( $val as $key => $value ) {
					$val[$key] = sanitize_text_field( $value );
				}
				$input = json_encode( $val );
			}
			else {
				$input = json_encode( sanitize_text_field( $val ) );
			}
			return $input;
		}
	}

    /**
	 * Slider sanitization
	 *
	 * @param  string	Slider value to be sanitized
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'airi_range_sanitization' ) ) {
		function airi_range_sanitization( $input, $setting ) {
			$attrs = $setting->manager->get_control( $setting->id )->input_attrs;

			$min = ( isset( $attrs['min'] ) ? $attrs['min'] : $input );
			$max = ( isset( $attrs['max'] ) ? $attrs['max'] : $input );
			$step = ( isset( $attrs['step'] ) ? $attrs['step'] : 1 );

			$number = floor( $input / $attrs['step'] ) * $attrs['step'];

			return airi_in_range( $number, $min, $max );
		}
	}
}