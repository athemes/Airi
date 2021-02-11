<?php
/**
 * Sanitizer functions
 */

if ( ! function_exists( 'airi_text_sanitization' ) ) {
	/**
	 * Text sanitization
	 *
	 * @var string $input   Input to be sanitized (either a string containing a single string or multiple, separated by commas)
	 * @return string   Sanitized input
	 */
	function airi_text_sanitization( $input ) {
		if ( strpos( $input, ',' ) !== false ) {
			$input = explode( ',', $input );
		}
		if ( is_array( $input ) ) {
			foreach ( $input as $key => $value ) {
				$input[ $key ] = sanitize_text_field( $value );
			}
			$input = implode( ',', $input );
		} else {
			$input = sanitize_text_field( $input );
		}
		return $input;
	}
}


if ( ! function_exists( 'airi_radio_sanitization' ) ) {
	/**
	 * Radio Button and Select sanitization
	 *
	 * @var string $input   Radio Button value
	 * @return integer  Sanitized value
	 */
	function airi_radio_sanitization( $input, $setting ) {
		// Get the list of possible radio box or select options.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		if ( array_key_exists( $input, $choices ) ) {
			return $input;
		} else {
			return $setting->default;
		}
	}
}


if ( ! function_exists( 'airi_switch_sanitization' ) ) {
	/**
	 * Switch sanitization
	 *
	 * @var string $input       Switch value
	 * @return integer  Sanitized value
	 */
	function airi_switch_sanitization( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}


if ( ! function_exists( 'airi_google_font_sanitization' ) ) {
	/**
	 * Google Font sanitization
	 *
	 * @var string $input  JSON string to be sanitized
	 * @return string   Sanitized input
	 */
	function airi_google_font_sanitization( $input ) {
		$val = json_decode( $input, true );
		if ( is_array( $val ) ) {
			foreach ( $val as $key => $value ) {
				$val[ $key ] = sanitize_text_field( $value );
			}
			$input = json_encode( $val );
		} else {
			$input = json_encode( sanitize_text_field( $val ) );
		}
		return $input;
	}
}

	/**
	 * Alpha Color (Hex & RGBa) sanitization
	 *
	 * @param  string	Input to be sanitized
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'airi_hex_rgba_sanitization' ) ) {
		function airi_hex_rgba_sanitization( $input, $setting ) {
			if ( empty( $input ) || is_array( $input ) ) {
				return $setting->default;
			}

			if ( false === strpos( $input, 'rgba' ) ) {
				// If string doesn't start with 'rgba' then santize as hex color
				$input = sanitize_hex_color( $input );
			} else {
				// Sanitize as RGBa color
				$input = str_replace( ' ', '', $input );
				sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
				$input = 'rgba(' . airi_in_range( $red, 0, 255 ) . ',' . airi_in_range( $green, 0, 255 ) . ',' . airi_in_range( $blue, 0, 255 ) . ',' . airi_in_range( $alpha, 0, 1 ) . ')';
			}
			return $input;
		}
	}

		/**
	 * Only allow values between a certain minimum & maxmium range
	 *
	 * @param  number	Input to be sanitized
	 * @return number	Sanitized input
	 */
	if ( ! function_exists( 'airi_in_range' ) ) {
		function airi_in_range( $input, $min, $max ){
			if ( $input < $min ) {
				$input = $min;
			}
			if ( $input > $max ) {
				$input = $max;
			}
			return $input;
		}
	}