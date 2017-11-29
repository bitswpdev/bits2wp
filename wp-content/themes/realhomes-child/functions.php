<?php
/*-----------------------------------------------------------------------------------*/
/*	Enqueue Styles in Child Theme
/*-----------------------------------------------------------------------------------*/
if (!function_exists('inspiry_enqueue_child_styles')) {
    function inspiry_enqueue_child_styles(){
        if ( !is_admin() ) {
            // dequeue and deregister parent default css
            wp_dequeue_style( 'parent-default' );
            wp_deregister_style( 'parent-default' );

            // dequeue parent custom css
            wp_dequeue_style( 'parent-custom' );

            // parent default css
            wp_enqueue_style( 'parent-default', get_template_directory_uri().'/style.css' );

            // parent custom css
            wp_enqueue_style( 'parent-custom' );

            // child default css
            wp_enqueue_style('child-default', get_stylesheet_uri(), array('parent-default'), '1.0', 'all' );

            // child custom css
            wp_enqueue_style('child-custom',  get_stylesheet_directory_uri() . '/child-custom.css', array('child-default'), '1.0', 'all' );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'inspiry_enqueue_child_styles', PHP_INT_MAX );


if ( !function_exists( 'inspiry_load_translation_from_child' ) ) {
    /**
     * Load translation files from child theme
     */
    function inspiry_load_translation_from_child() {
        load_child_theme_textdomain ( 'framework', get_stylesheet_directory () . '/languages' );
    }
    add_action ( 'after_setup_theme', 'inspiry_load_translation_from_child' );
}

// Added by Oisin


/**
 * Add property custom meta fields
 */
function add_property_custom_fields( $new_fields ) {
 
    $new_fields['tab'] = array(
        'label' => 'BarInTheSun Fields', // tab name
        'icon'  => 'dashicons-editor-bold' // tab icon class (of dashicon). See all dashicons here: https://developer.wordpress.org/resource/dashicons
    );
 
    $new_fields['fields'] = array(
        array(
            'name'    => 'Bar Size', // field name
            'desc'    => 'Example Value: 70', // field description
            'postfix' => 'm2', // field postfix (if any)
            'icon'    => 'size', // Place “png” icon in "rea	lhomes/assets/(variation you are using)/icons" directory. Retina (double sized) icons should use @2x as postfix with icon name. E.g: year.png, year@2x.png
            'columns' => 6, // use ‘6’ for two fields in one row and ’12’ for one field in one row
            'display' => true // true to display field value on property detail page, otherwise false
        ),
        array(
            'name'    => 'Terrace Size', // field name
            'desc'    => 'Example Value: 300', // field description
            'postfix' => 'm2', // field postfix (if any)
            'icon'    => 'year', // Place “png” icon in "realhomes/assets/(variation you are using)/icons" directory. Retina (double sized) icons should use @2x as postfix with icon name. E.g: year.png, year@2x.png
            'columns' => 6, // use ‘6’ for two fields in one row and ’12’ for one field in one row
            'display' => true // true to display field value on property detail page, otherwise false
        ),
		array(
            'name'    => 'Chairs Inside', // field name
            'desc'    => 'Example Value: 20', // field description
            'postfix' => '', // field postfix (if any)
            'icon'    => 'size', // Place “png” icon in "realhomes/assets/(variation you are using)/icons" directory. Retina (double sized) icons should use @2x as postfix with icon name. E.g: year.png, year@2x.png
            'columns' => 6, // use ‘6’ for two fields in one row and ’12’ for one field in one row
            'display' => true // true to display field value on property detail page, otherwise false
        ),
		array(
            'name'    => 'Chairs Outside', // field name
            'desc'    => 'Example Value: 50', // field description
            'postfix' => '', // field postfix (if any)
            'icon'    => 'size', // Place “png” icon in "realhomes/assets/(variation you are using)/icons" directory. Retina (double sized) icons should use @2x as postfix with icon name. E.g: year.png, year@2x.png
            'columns' => 6, // use ‘6’ for two fields in one row and ’12’ for one field in one row
            'display' => true // true to display field value on property detail page, otherwise false
        ),
		array(
            'name'    => 'Tables Inside', // field name
            'desc'    => 'Example Value: 15', // field description
            'postfix' => '', // field postfix (if any)
            'icon'    => 'size', // Place “png” icon in "realhomes/assets/(variation you are using)/icons" directory. Retina (double sized) icons should use @2x as postfix with icon name. E.g: year.png, year@2x.png
            'columns' => 6, // use ‘6’ for two fields in one row and ’12’ for one field in one row
            'display' => true // true to display field value on property detail page, otherwise false
        ),
		array(
            'name'    => 'Tables Outside', // field name
            'desc'    => 'Example Value: 10', // field description
            'postfix' => '', // field postfix (if any)
            'icon'    => 'size', // Place “png” icon in "realhomes/assets/(variation you are using)/icons" directory. Retina (double sized) icons should use @2x as postfix with icon name. E.g: year.png, year@2x.png
            'columns' => 6, // use ‘6’ for two fields in one row and ’12’ for one field in one row
            'display' => true // true to display field value on property detail page, otherwise false
        ),
		array(
            'name'    => 'Kitchen Contents', // field name
            'desc'    => 'Example Value: Fully Equipped Kitchen', // field description
            'postfix' => '', // field postfix (if any)
            'icon'    => 'size', // Place “png” icon in "realhomes/assets/(variation you are using)/icons" directory. Retina (double sized) icons should use @2x as postfix with icon name. E.g: year.png, year@2x.png
            'columns' => 6, // use ‘6’ for two fields in one row and ’12’ for one field in one row
            'display' => true // true to display field value on property detail page, otherwise false
        ),
		array(
            'name'    => 'Bar Contents', // field name
            'desc'    => 'Example Value: Fully Equipped Bar', // field description
            'postfix' => '', // field postfix (if any)
            'icon'    => 'size', // Place “png” icon in "realhomes/assets/(variation you are using)/icons" directory. Retina (double sized) icons should use @2x as postfix with icon name. E.g: year.png, year@2x.png
            'columns' => 6, // use ‘6’ for two fields in one row and ’12’ for one field in one row
            'display' => true // true to display field value on property detail page, otherwise false
        ),
		array(
            'name'    => 'Monthly Rental', // field name
            'desc'    => 'Example Value: 600', // field description
            'postfix' => '&euro;', // field postfix (if any)
            'icon'    => 'size', // Place “png” icon in "realhomes/assets/(variation you are using)/icons" directory. Retina (double sized) icons should use @2x as postfix with icon name. E.g: year.png, year@2x.png
            'columns' => 6, // use ‘6’ for two fields in one row and ’12’ for one field in one row
            'display' => true // true to display field value on property detail page, otherwise false
        ),
		array(
            'name'    => 'Heating / Aircon', // field name
            'desc'    => 'Example Value: Fans Only', // field description
            'postfix' => '', // field postfix (if any)
            'icon'    => 'size', // Place “png” icon in "realhomes/assets/(variation you are using)/icons" directory. Retina (double sized) icons should use @2x as postfix with icon name. E.g: year.png, year@2x.png
            'columns' => 6, // use ‘6’ for two fields in one row and ’12’ for one field in one row
            'display' => true // true to display field value on property detail page, otherwise false
        ),
		array(
            'name'    => 'Terrace Tax', // field name
            'desc'    => 'Example Value: 200', // field description
            'postfix' => '&euro;', // field postfix (if any)
            'icon'    => 'size', // Place “png” icon in "realhomes/assets/(variation you are using)/icons" directory. Retina (double sized) icons should use @2x as postfix with icon name. E.g: year.png, year@2x.png
            'columns' => 6, // use ‘6’ for two fields in one row and ’12’ for one field in one row
            'display' => true // true to display field value on property detail page, otherwise false
        ),
		array(
            'name'    => 'Other Costs', // field name
            'desc'    => 'Example Value: Spotify', // field description
            'postfix' => '', // field postfix (if any)
            'icon'    => 'size', // Place “png” icon in "realhomes/assets/(variation you are using)/icons" directory. Retina (double sized) icons should use @2x as postfix with icon name. E.g: year.png, year@2x.png
            'columns' => 6, // use ‘6’ for two fields in one row and ’12’ for one field in one row
            'display' => true // true to display field value on property detail page, otherwise false
        ),
    );
 
    return $new_fields;
}
 
add_filter( 'inspiry_property_custom_fields', 'add_property_custom_fields' );