<?php
	/**
	 * Section:    `Views`
	 * Panel:    `Property Detail Page`
	 *
	 * @since 3.1.0
	 */

	if ( ! function_exists( 'inspiry_property_views_customizer' ) ) :
		/**
		 * inspiry_property_views_customizer.
		 *
		 * @param  WP_Customize_Manager $wp_customize
		 *
		 * @since  3.1.0
		 */
		function inspiry_property_views_customizer( WP_Customize_Manager $wp_customize ) {

			/**
			 * Common Note Section
			 */

			$wp_customize->add_section( 'inspiry_property_views', array(
				'title' => esc_html__( 'Views', 'framework' ),
				'panel' => 'inspiry_property_panel',
			) );

			/* Show/Hide Views */
			$wp_customize->add_setting( 'inspiry_display_property_views', array(
				'type'    => 'option',
				'default' => 'false',
			) );
			$wp_customize->add_control( 'inspiry_display_property_views', array(
				'label'       => esc_html__( 'Property Views', 'framework' ),
				'description' => wp_kses( __( '<strong>Note: </strong>Enable this option only, if you are not using any type of site <a href="https://codex.wordpress.org/WordPress_Optimization/Caching" target="_blank">cache</a>.', 'framework' ), array(
					'a' => array(
						'href'   => array(),
						'target' => array(),
					),
					'strong' => array()
				) ),
				'type'        => 'radio',
				'section'     => 'inspiry_property_views',
				'choices'     => array(
					'true'  => esc_html__( 'Show', 'framework' ),
					'false' => esc_html__( 'Hide', 'framework' ),
				),
			) );

			/* Views Title */
			$wp_customize->add_setting( 'inspiry_property_views_title', array(
				'type'              => 'option',
				'default'           => esc_html__( 'Property Views', 'framework' ),
				'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control( 'inspiry_property_views_title', array(
				'label'   => esc_html__( 'Views Title', 'framework' ),
				'type'    => 'text',
				'section' => 'inspiry_property_views',
			) );

			/* Views Chart Type */
			$wp_customize->add_setting( 'inspiry_property_views_type', array(
				'type'    => 'option',
				'default' => 'bar',
			) );
			$wp_customize->add_control( 'inspiry_property_views_type', array(
				'label'   => esc_html__( 'Views Type', 'framework' ),
				'type'    => 'radio',
				'section' => 'inspiry_property_views',
				'choices' => array(
					'bar'  => esc_html__( 'Bar', 'framework' ),
					'line' => esc_html__( 'Line', 'framework' ),
				),
			) );
		}

		add_action( 'customize_register', 'inspiry_property_views_customizer' );
	endif;

