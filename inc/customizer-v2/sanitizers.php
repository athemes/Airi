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
