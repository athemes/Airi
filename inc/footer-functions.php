<?php
/**
 * Footer functions
 *
 * @package Atu
 */

/**
 * Return the name of the css class for the footer sidebar and the number of columns.
 * @return array
 */
function atu_check_footer_sidebar_columns(){
    $columns = get_theme_mod( 'footer_widgets_columns', 4 );
    $class_widget = 'col-sm-6 col-md-3 col-lg-3';

    if ( $columns === 3 ) {
        $class_widget = 'col-sm-4 col-md-4 col-lg-4';
    } elseif ( $columns === 2 ) {
        $class_widget = 'col-sm-6 col-md-6 col-ls-6';
    } elseif ( $columns === 1 ) {
        $class_widget = 'col-sm-12 col-md-12 col-ls-12';
    }

    return array(
        'footer_widget_class_name' => $class_widget,
        'footer_widget_columns' => $columns
    );
}