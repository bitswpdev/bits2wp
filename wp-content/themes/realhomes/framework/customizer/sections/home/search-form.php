<?php
/**
 * Section:	`Search Form`
 * Panel: 	`Home`
 *
 * @since 2.6.3
 */

if ( ! function_exists( 'inspiry_search_form_customizer' ) ) :

	/**
	 * inspiry_search_form_customizer.
	 *
	 * @param  WP_Customize_Manager $wp_customize
	 * @since  2.6.3
	 */

	function inspiry_search_form_customizer( WP_Customize_Manager $wp_customize ) {

		/**
		 * Home Search Section
		 */
		$wp_customize->add_section( 'inspiry_home_search', array(
			'title' 			=> __( 'Search Form', 'framework' ),
			'panel' 			=> 'inspiry_home_panel',
			'active_callback'	=> 'inspiry_no_search_form_over_image',
		) );

		/* Show/Hide Properties Search Form on Homepage */
		$wp_customize->add_setting( 'theme_show_home_search', array(
			'type' 		=> 'option',
			'default'	=> 'true',
		) );
		$wp_customize->add_control( 'theme_show_home_search', array(
			'label' 			=> __( 'Properties Search Form on Homepage', 'framework' ),
			'description' 		=> __( 'You can configure properties search form using related section.', 'framework' ),
			'type' 				=> 'radio',
			'section' 			=> 'inspiry_home_search',
			'active_callback'	=> 'inspiry_no_search_form_over_image',
			'choices' 	=> array(
				'true' 	=> __( 'Show', 'framework' ),
				'false'	=> __( 'Hide', 'framework' ),
			),
		) );

	}

	add_action( 'customize_register', 'inspiry_search_form_customizer' );
endif;


if ( ! function_exists( 'inspiry_search_form_defaults' ) ) :

	/**
	 * inspiry_search_form_defaults.
	 *
	 * @since  2.6.3
	 */

	function inspiry_search_form_defaults( WP_Customize_Manager $wp_customize ) {
		$search_form_settings_ids = array(
			'theme_show_home_search'
		);
		inspiry_initialize_defaults( $wp_customize, $search_form_settings_ids );
	}
	add_action( 'customize_save_after', 'inspiry_search_form_defaults' );
endif;


if ( ! function_exists( 'inspiry_no_search_form_over_image' ) ) {
	/**
	 * Checks if there is no search form over image
	 * @return true|false
	 */
	function inspiry_no_search_form_over_image(){
		$theme_homepage_module = get_option( 'theme_homepage_module');
		if( $theme_homepage_module == 'search-form-over-image' ) {
			return false;
		}
		return true;
	}
}
