<?php
/**
 * Active Callbacks
 */


/**
 * Callback to display fields only if Menu 1 selected
 */
if ( ! function_exists( 'airi_section_menu_menu1_conditional_display' ) ) {
	function airi_section_menu_menu1_conditional_display() {
		$test_menu_type = get_theme_mod( 'test_menu_type' );
		if ( ( $test_menu_type === 'menuStyle1' ) ) {
			return true;
		}
		return false;
	}
}

/**
 * Callback to display fields only if Menu 2 selected
 */
if ( ! function_exists( 'airi_section_menu_menu2_conditional_display' ) ) {
	function airi_section_menu_menu2_conditional_display() {
		$test_menu_type = get_theme_mod( 'test_menu_type' );
		if ( ( $test_menu_type === 'menuStyle2' ) ) {
			return true;
		}
		return false;
	}
}

/**
 * Callback to display fields only if Menu 3 selected
 */
if ( ! function_exists( 'airi_section_menu_menu3_conditional_display' ) ) {
	function airi_section_menu_menu3_conditional_display() {
		$test_menu_type = get_theme_mod( 'test_menu_type' );
		if ( ( $test_menu_type === 'menuStyle3' ) ) {
			return true;
		}
		return false;
	}
}

/**
 * Callback to display fields only if Menu 4 selected
 */
if ( ! function_exists( 'airi_section_menu_menu4_conditional_display' ) ) {
	function airi_section_menu_menu4_conditional_display() {
		$test_menu_type = get_theme_mod( 'test_menu_type' );
		if ( ( $test_menu_type === 'menuStyle4' ) ) {
			return true;
		}
		return false;
	}
}

/**
 * Callback to display fields only if Menu 5 selected
 */
if ( ! function_exists( 'airi_section_menu_menu5_conditional_display' ) ) {
	function airi_section_menu_menu5_conditional_display() {
		$test_menu_type = get_theme_mod( 'test_menu_type' );
		if ( ( $test_menu_type === 'menuStyle5' ) ) {
			return true;
		}
		return false;
	}
}
