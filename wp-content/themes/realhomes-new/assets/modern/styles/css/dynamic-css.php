<?php
/**
 * Dynamic CSS File
 *
 * Dynamic css file for handling user options.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

add_action( 'wp_head', 'inspiry_generate_dynamic_css' );

if ( ! function_exists( 'inspiry_generate_dynamic_css' ) ) {

	/**
	 * Function: Generate Dynamic CSS.
	 *
	 * @since 3.0.0
	 */
	function inspiry_generate_dynamic_css() {

		$body_bg = get_background_color();

		// Header.
		$theme_header_bg_color = get_option( 'theme_header_bg_color', '#303030' );
		$theme_main_menu_text_color = get_option( 'theme_main_menu_text_color', '#fff' );
		$inspiry_main_menu_hover_bg = get_option( 'inspiry_main_menu_hover_bg', '#ea723d' );
		$theme_menu_bg_color = get_option( 'theme_menu_bg_color', '#fff' );
		$theme_menu_text_color = get_option( 'theme_menu_text_color', '#808080' );
		$theme_phone_text_color = get_option( 'theme_phone_text_color', '#ffffff' );
		$theme_banner_text_color = get_option( 'theme_banner_text_color', '#ffffff' );

		// Logo.
		$theme_logo_text_color 		= get_option( 'theme_logo_text_color', '#fff' );
		$theme_logo_text_hover_color	= get_option( 'theme_logo_text_hover_color', '#1ea69a' );

		// Home Sections.
		$inspiry_enable_search_label_image = get_option( 'inspiry_enable_search_label_image', 'true' );
		$inspiry_search_label_image = ( 'true' === $inspiry_enable_search_label_image ) ? 'url("' . get_option( 'inspiry_search_label_image', INSPIRY_DIR_URI . '/images/advance-search-arrow.png' ) . '")' : 'none';
		$inspiry_home_properties_title_span_color = get_option( 'inspiry_home_properties_title_span_color' );
		$inspiry_home_properties_title_color 	= get_option( 'inspiry_home_properties_title_color' );
		$inspiry_home_properties_desc_color 	= get_option( 'inspiry_home_properties_desc_color' );
		$theme_featured_prop_title_span_color 	= get_option( 'theme_featured_prop_title_span_color' );
		$theme_featured_prop_title_color 		= get_option( 'theme_featured_prop_title_color' );
		$theme_featured_prop_text_color 		= get_option( 'theme_featured_prop_text_color' );
		$inspiry_home_agents_title_span_color 	= get_option( 'inspiry_home_agents_title_span_color' );
		$inspiry_home_agents_title_color 		= get_option( 'inspiry_home_agents_title_color' );
		$inspiry_home_agents_desc_color 		= get_option( 'inspiry_home_agents_desc_color' );

		// Home Testimonial.
		$inspiry_testimonial_bg 		= get_option( 'inspiry_testimonial_bg' );
		$inspiry_testimonial_color		= get_option( 'inspiry_testimonial_color' );
		$inspiry_testimonial_name_color	= get_option( 'inspiry_testimonial_name_color' );
		$inspiry_testimonial_url_color	= get_option( 'inspiry_testimonial_url_color' );

		// Home CTA BG.
		$inspiry_cta_title_color		= get_option( 'inspiry_cta_title_color' );
		$inspiry_cta_desc_color			= get_option( 'inspiry_cta_desc_color' );
		$inspiry_cta_background_image	= get_option( 'inspiry_cta_background_image', get_template_directory_uri() . '/assets/modern/images/cta-bg.jpg' );
		$inspiry_cta_btn_one_color		= get_option( 'inspiry_cta_btn_one_color' );
		$inspiry_cta_btn_one_bg			= get_option( 'inspiry_cta_btn_one_bg', '#ea723d' );
		$inspiry_cta_btn_one_hover_bg	= inspiry_hex_to_rgba( $inspiry_cta_btn_one_bg, 0.8 );
		$inspiry_cta_btn_two_color		= get_option( 'inspiry_cta_btn_two_color' );
		$inspiry_cta_btn_two_bg			= get_option( 'inspiry_cta_btn_two_bg', '#ffffff' );
		$inspiry_cta_btn_two_bg_rgba	= inspiry_hex_to_rgba( $inspiry_cta_btn_two_bg, 0.25 );
		$inspiry_cta_btn_two_hover_bg 	= inspiry_hex_to_rgba( $inspiry_cta_btn_two_bg, 0.4 );

		// Home CTA Contact BG.
		$inspiry_cta_contact_title_color	= get_option( 'inspiry_cta_contact_title_color' );
		$inspiry_cta_contact_desc_color		= get_option( 'inspiry_cta_contact_desc_color' );
		$inspiry_home_cta_contact_bg_image	= get_option( 'inspiry_home_cta_contact_bg_image', get_template_directory_uri() . '/assets/modern/images/cta-above-footer.jpg' );
		$inspiry_home_cta_bg_color 			= get_option( 'inspiry_home_cta_bg_color' );
		$inspiry_home_cta_bg_color			= inspiry_hex_to_rgba( $inspiry_home_cta_bg_color, 0.8 );
		$inspiry_cta_contact_btn_one_color		= get_option( 'inspiry_cta_contact_btn_one_color' );
		$inspiry_cta_contact_btn_one_bg			= get_option( 'inspiry_cta_contact_btn_one_bg', '#303030' );
		$inspiry_cta_contact_btn_one_hover_bg	= inspiry_hex_to_rgba( $inspiry_cta_contact_btn_one_bg, 0.8 );
		$inspiry_cta_contact_btn_two_color		= get_option( 'inspiry_cta_contact_btn_two_color' );
		$inspiry_cta_contact_btn_two_bg			= get_option( 'inspiry_cta_contact_btn_two_bg', '#ffffff' );
		$inspiry_cta_contact_btn_two_hover_bg 	= inspiry_hex_to_rgba( $inspiry_cta_contact_btn_two_bg, 0.8 );

		// Home Agents.
		$inspiry_agents_title_color			= get_option( 'inspiry_agents_title_color' );
		$inspiry_agents_title_hover_color	= get_option( 'inspiry_agents_title_hover_color' );
		$inspiry_agents_text_color			= get_option( 'inspiry_agents_text_color' );
		$inspiry_agents_phone_color			= get_option( 'inspiry_agents_phone_color' );
		$inspiry_agents_listed_props_color	= get_option( 'inspiry_agents_listed_props_color' );

		// Home Features.
		$inspiry_home_features_title_span_color = get_option( 'inspiry_home_features_title_span_color' );
		$inspiry_home_features_title_color 	= get_option( 'inspiry_home_features_title_color' );
		$inspiry_home_features_desc_color 	= get_option( 'inspiry_home_features_desc_color' );
		$inspiry_home_feature_title_color 	= get_option( 'inspiry_home_feature_title_color' );
		$inspiry_home_feature_text_color 	= get_option( 'inspiry_home_feature_text_color' );

		// Home Partners.
		$inspiry_home_partners_title_span_color = get_option( 'inspiry_home_partners_title_span_color' );
		$inspiry_home_partners_title_color 	= get_option( 'inspiry_home_partners_title_color' );
		$inspiry_home_partners_desc_color 	= get_option( 'inspiry_home_partners_desc_color' );

		// Property item.
		$theme_property_item_bg_color 		= get_option( 'theme_property_item_bg_color' );
		$theme_property_title_color 		= get_option( 'theme_property_title_color' );
	    $theme_property_title_hover_color	= get_option( 'theme_property_title_hover_color' );
	    $theme_property_price_text_color 	= get_option( 'theme_property_price_text_color' );
	    $theme_property_desc_text_color 	= get_option( 'theme_property_desc_text_color' );
	    $theme_property_meta_text_color 	= get_option( 'theme_property_meta_text_color' );
	    $inspiry_property_meta_heading_color = get_option( 'inspiry_property_meta_heading_color' );
	    $inspiry_property_meta_icon_color	= get_option( 'inspiry_property_meta_icon_color' );
	    $inspiry_property_image_overlay		= get_option( 'inspiry_property_image_overlay', '#1ea69a' );
	    $inspiry_property_overlay_rgba		= inspiry_hex_to_rgba( $inspiry_property_image_overlay, 0.7 );
	    $inspiry_property_featured_label_bg = get_option( 'inspiry_property_featured_label_bg', '#ea723d' );
	    $featured_label_property 			= ( ! is_rtl() ) ? 'border-left-color' : 'border-right-color';

	    // Footer.
	    $inspiry_footer_bg	= get_option( 'inspiry_footer_bg' );
	    $theme_footer_widget_text_color		= get_option( 'theme_footer_widget_text_color' );
	    $theme_footer_widget_link_color 	= get_option( 'theme_footer_widget_link_color' );
	    $theme_footer_widget_link_hover_color = get_option( 'theme_footer_widget_link_hover_color' );

	    // Buttons.
	    $theme_button_text_color 	= get_option( 'theme_button_text_color' );
	    $theme_button_bg_color		= get_option( 'theme_button_bg_color' );
	    $theme_button_hover_text_color 	= get_option( 'theme_button_hover_text_color' );
	    $theme_button_hover_bg_color	= get_option( 'theme_button_hover_bg_color' );
	    $inspiry_advance_search_btn_bg 	= get_option( 'inspiry_advance_search_btn_bg' );
	    $inspiry_advance_search_btn_hover_bg = get_option( 'inspiry_advance_search_btn_hover_bg' );

	    // Gallery.
	    $inspiry_gallery_hover_color	= get_option( 'inspiry_gallery_hover_color' );
	    $inspiry_gallery_hover_color	= inspiry_hex_to_rgba( $inspiry_gallery_hover_color, 0.9 );

	    // News.
	    $inspiry_post_text_color	= get_option( 'inspiry_post_text_color' );
	    $inspiry_post_meta_bg		= get_option( 'inspiry_post_meta_bg' );

	    // Slider.
	    $theme_slide_title_color	= get_option( 'theme_slide_title_color' );
	    $theme_slide_title_hover_color 	= get_option( 'theme_slide_title_hover_color' );
	    $theme_slide_desc_text_color	= get_option( 'theme_slide_desc_text_color' );
	    $theme_slide_price_color	= get_option( 'theme_slide_price_color' );
	    $inspiry_slider_meta_heading_color = get_option( 'inspiry_slider_meta_heading_color' );
	    $inspiry_slider_meta_text_color	= get_option( 'inspiry_slider_meta_text_color' );
	    $inspiry_slider_meta_icon_color	= get_option( 'inspiry_slider_meta_icon_color' );
	    $inspiry_slider_featured_label_bg 	= get_option( 'inspiry_slider_featured_label_bg', '#ea723d' );
	    $slider_featured_label_property		= ( ! is_rtl() ) ? 'border-left-color' : 'border-right-color';

		$dynamic_css = array(
			array(
				'elements'	=> '.rh_banner',
		        'property'	=> 'background',
		        'value'		=> $theme_header_bg_color,
			),
			array(
				'elements'	=> '.rh_logo .rh_logo__heading a',
		        'property'	=> 'color',
		        'value'		=> $theme_logo_text_color,
			),
			array(
				'elements'	=> '.rh_logo .rh_logo__heading a:hover',
		        'property'	=> 'color',
		        'value'		=> $theme_logo_text_hover_color,
			),
			array(
				'elements'	=> 'ul.rh_menu__main li a',
		        'property'	=> 'color',
		        'value'		=> $theme_main_menu_text_color,
			),
			array(
				'elements'	=> 'ul.rh_menu__main li a:hover, ul.rh_menu__main > .current-menu-item > a, ul.rh_menu__main li:hover, .rh_menu--hover',
		        'property'	=> 'background',
		        'value'		=> $inspiry_main_menu_hover_bg,
			),
			array(
				'elements'	=> 'ul.rh_menu__main ul.sub-menu, ul.rh_menu__main ul.sub-menu ul.sub-menu',
		        'property'	=> 'background',
		        'value'		=> $theme_menu_bg_color,
			),
			array(
				'elements'	=> 'ul.rh_menu__main ul.sub-menu, ul.rh_menu__main ul.sub-menu ul.sub-menu',
		        'property'	=> 'border-top-color',
		        'value'		=> $inspiry_main_menu_hover_bg,
			),
			array(
				'elements'	=> 'ul.rh_menu__main ul.sub-menu li a, ul.rh_menu__main ul.sub-menu ul.sub-menu a',
		        'property'	=> 'color',
		        'value'		=> $theme_menu_text_color,
			),
			array(
				'elements'	=> '.rh_menu__user .rh_menu__user_phone .contact-number',
		        'property'	=> 'color',
		        'value'		=> $theme_phone_text_color,
			),
			array(
				'elements'	=> '.rh_menu__user .rh_menu__user_phone svg',
		        'property'	=> 'fill',
		        'value'		=> $theme_phone_text_color,
			),
			array(
				'elements'	=> '.rh_banner .rh_banner__title',
		        'property'	=> 'color',
		        'value'		=> $theme_banner_text_color,
			),
			array(
				'elements' => '.home .rh_prop_search__buttons:after',
				'property' => 'background-image',
				'value' => $inspiry_search_label_image,
			),
			array(
				'elements'	=> '.rh_section--props_padding .rh_section__head .rh_section__subtitle',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_properties_title_span_color,
			),
			array(
				'elements'	=> '.rh_section--props_padding .rh_section__head .rh_section__title',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_properties_title_color,
			),
			array(
				'elements'	=> '.rh_section--props_padding .rh_section__head .rh_section__desc',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_properties_desc_color,
			),
			array(
				'elements'	=> '.rh_section--featured .rh_section__head .rh_section__subtitle',
		        'property'	=> 'color',
		        'value'		=> $theme_featured_prop_title_span_color,
			),
			array(
				'elements'	=> '.rh_section--featured .rh_section__head .rh_section__title',
		        'property'	=> 'color',
		        'value'		=> $theme_featured_prop_title_color,
			),
			array(
				'elements'	=> '.rh_section--featured .rh_section__head .rh_section__desc',
		        'property'	=> 'color',
		        'value'		=> $theme_featured_prop_text_color,
			),
			array(
				'elements'	=> '.rh_section__agents .rh_section__head .rh_section__subtitle',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_agents_title_span_color,
			),
			array(
				'elements'	=> '.rh_section__agents .rh_section__head .rh_section__title',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_agents_title_color,
			),
			array(
				'elements'	=> '.rh_section__agents .rh_section__head .rh_section__desc',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_agents_desc_color,
			),
			array(
				'elements'	=> '.rh_section--props_padding:after,.rh_section__agents:after',
		        'property'	=> 'border-left-color',
		        'value'		=> '#' . $body_bg,
			),
			array(
				'elements'	=> '.rh_section__agents:before',
		        'property'	=> 'border-right-color',
		        'value'		=> '#' . $body_bg,
			),
			array(
				'elements'	=> '.rh_cta--featured .rh_cta',
		        'property'	=> 'background-image',
		        'value'		=> 'url("' . $inspiry_cta_background_image . '")',
			),
			array(
				'elements'	=> '.rh_cta--featured .rh_cta__title',
		        'property'	=> 'color',
		        'value'		=> $inspiry_cta_title_color,
			),
			array(
				'elements'	=> '.rh_cta--featured .rh_cta__quote',
		        'property'	=> 'color',
		        'value'		=> $inspiry_cta_desc_color,
			),
			array(
				'elements'	=> '.rh_cta__wrap .rh_cta__btns .rh_btn--secondary',
		        'property'	=> 'color',
		        'value'		=> $inspiry_cta_btn_one_color,
			),
			array(
				'elements'	=> '.rh_cta__wrap .rh_cta__btns .rh_btn--secondary',
		        'property'	=> 'background',
		        'value'		=> $inspiry_cta_btn_one_bg,
			),
			array(
				'elements'	=> '.rh_cta__wrap .rh_cta__btns .rh_btn--secondary:hover',
		        'property'	=> 'background',
		        'value'		=> $inspiry_cta_btn_one_hover_bg,
			),
			array(
				'elements'	=> '.rh_cta__wrap .rh_cta__btns .rh_btn--greyBG',
		        'property'	=> 'color',
		        'value'		=> $inspiry_cta_btn_two_color,
			),
			array(
				'elements'	=> '.rh_cta__wrap .rh_cta__btns .rh_btn--greyBG',
		        'property'	=> 'background',
		        'value'		=> $inspiry_cta_btn_two_bg_rgba,
			),
			array(
				'elements'	=> '.rh_cta__wrap .rh_cta__btns .rh_btn--greyBG:hover',
		        'property'	=> 'background',
		        'value'		=> $inspiry_cta_btn_two_hover_bg,
			),
			array(
				'elements'	=> '.rh_cta--contact .rh_cta',
		        'property'	=> 'background-image',
		        'value'		=> 'url("' . $inspiry_home_cta_contact_bg_image . '")',
			),
			array(
				'elements'	=> '.rh_cta--contact .rh_cta .rh_cta__overlay',
		        'property'	=> 'background-color',
		        'value'		=> $inspiry_home_cta_bg_color,
			),
			array(
				'elements'	=> '.rh_cta--contact .rh_cta__title',
		        'property'	=> 'color',
		        'value'		=> $inspiry_cta_contact_title_color,
			),
			array(
				'elements'	=> '.rh_cta--contact .rh_cta__quote',
		        'property'	=> 'color',
		        'value'		=> $inspiry_cta_contact_desc_color,
			),
			array(
				'elements'	=> '.rh_cta__wrap .rh_cta__btns .rh_btn--blackBG',
		        'property'	=> 'color',
		        'value'		=> $inspiry_cta_contact_btn_one_color,
			),
			array(
				'elements'	=> '.rh_cta__wrap .rh_cta__btns .rh_btn--blackBG',
		        'property'	=> 'background',
		        'value'		=> $inspiry_cta_contact_btn_one_bg,
			),
			array(
				'elements'	=> '.rh_cta__wrap .rh_cta__btns .rh_btn--blackBG:hover',
		        'property'	=> 'background',
		        'value'		=> $inspiry_cta_contact_btn_one_hover_bg,
			),
			array(
				'elements'	=> '.rh_cta__wrap .rh_cta__btns .rh_btn--whiteBG',
		        'property'	=> 'color',
		        'value'		=> $inspiry_cta_contact_btn_two_color,
			),
			array(
				'elements'	=> '.rh_cta__wrap .rh_cta__btns .rh_btn--whiteBG',
		        'property'	=> 'background',
		        'value'		=> $inspiry_cta_contact_btn_two_bg,
			),
			array(
				'elements'	=> '.rh_cta__wrap .rh_cta__btns .rh_btn--whiteBG:hover',
		        'property'	=> 'background',
		        'value'		=> $inspiry_cta_contact_btn_two_hover_bg,
			),
			array(
				'elements'	=> '.rh_section__testimonial',
		        'property'	=> 'background-color',
		        'value'		=> $inspiry_testimonial_bg,
			),
			array(
				'elements'	=> '.rh_section__testimonial:before',
		        'property'	=> 'border-bottom-color',
		        'value'		=> $inspiry_testimonial_bg,
			),
			array(
				'elements'	=> '.rh_section__testimonial:after',
		        'property'	=> 'border-top-color',
		        'value'		=> $inspiry_testimonial_bg,
			),
			array(
				'elements'	=> '.rh_testimonial .rh_testimonial__quote',
		        'property'	=> 'color',
		        'value'		=> $inspiry_testimonial_color,
			),
			array(
				'elements'	=> '.rh_testimonial .rh_testimonial__author .rh_testimonial__author_name',
		        'property'	=> 'color',
		        'value'		=> $inspiry_testimonial_name_color,
			),
			array(
				'elements'	=> '.rh_testimonial .rh_testimonial__author .rh_testimonial__author__link a',
		        'property'	=> 'color',
		        'value'		=> $inspiry_testimonial_url_color,
			),
			array(
				'elements'	=> '.rh_agent .rh_agent__details h3 a',
		        'property'	=> 'color',
		        'value'		=> $inspiry_agents_title_color,
			),
			array(
				'elements'	=> '.rh_agent .rh_agent__details h3 a:hover',
		        'property'	=> 'color',
		        'value'		=> $inspiry_agents_title_hover_color,
			),
			array(
				'elements'	=> '.rh_agent .rh_agent__details .rh_agent__email, .rh_agent .rh_agent__details .rh_agent__listed .heading',
		        'property'	=> 'color',
		        'value'		=> $inspiry_agents_text_color,
			),
			array(
				'elements'	=> '.rh_agent .rh_agent__details .rh_agent__phone, .rh_agent .rh_agent__details .rh_agent__email:hover',
		        'property'	=> 'color',
		        'value'		=> $inspiry_agents_phone_color,
			),
			array(
				'elements'	=> '.rh_agent .rh_agent__details .rh_agent__listed .figure',
		        'property'	=> 'color',
		        'value'		=> $inspiry_agents_listed_props_color,
			),
			array(
				'elements'	=> '.rh_section__features .rh_section__head .rh_section__subtitle',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_features_title_span_color,
			),
			array(
				'elements'	=> '.rh_section__features .rh_section__head .rh_section__title',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_features_title_color,
			),
			array(
				'elements'	=> '.rh_section__features .rh_section__head .rh_section__desc',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_features_desc_color,
			),
			array(
				'elements'	=> '.rh_feature h4.rh_feature__title, .rh_feature h4.rh_feature__title a',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_feature_title_color,
			),
			array(
				'elements'	=> '.rh_feature .rh_feature__desc p',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_feature_text_color,
			),
			array(
				'elements'	=> '.rh_section__partners .rh_section__head .rh_section__subtitle',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_partners_title_span_color,
			),
			array(
				'elements'	=> '.rh_section__partners .rh_section__head .rh_section__title',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_partners_title_color,
			),
			array(
				'elements'	=> '.rh_section__partners .rh_section__head .rh_section__desc',
		        'property'	=> 'color',
		        'value'		=> $inspiry_home_partners_desc_color,
			),
			array(
				'elements'	=> '.rh_prop_card .rh_prop_card__details, .rh_list_card__wrap .rh_list_card__details_wrap, .rh_list_card__wrap .rh_list_card__map_wrap',
		        'property'	=> 'background-color',
		        'value'		=> $theme_property_item_bg_color,
			),
			array(
				'elements'	=> '.rh_prop_card .rh_prop_card__details h3 a, .rh_list_card__wrap .rh_list_card__map_wrap h3 a, .rh_list_card__wrap .rh_list_card__details_wrap h3 a',
		        'property'	=> 'color',
		        'value'		=> $theme_property_title_color,
			),
			array(
				'elements'	=> '.rh_prop_card .rh_prop_card__details h3 a:hover, .rh_list_card__wrap .rh_list_card__map_wrap h3 a:hover, .rh_list_card__wrap .rh_list_card__details_wrap h3 a:hover',
		        'property'	=> 'color',
		        'value'		=> $theme_property_title_hover_color,
			),
			array(
				'elements'	=> '.rh_prop_card .rh_prop_card__details .rh_prop_card__priceLabel .rh_prop_card__price, .rh_list_card__wrap .rh_list_card__map_details .rh_list_card__priceLabel .rh_list_card__price .price, .rh_list_card__wrap .rh_list_card__priceLabel .rh_list_card__price .price',
		        'property'	=> 'color',
		        'value'		=> $theme_property_price_text_color,
			),
			array(
				'elements'	=> '.rh_list_card__wrap .rh_list_card__details_wrap .rh_list_card__excerpt, .rh_prop_card .rh_prop_card__details .rh_prop_card__excerpt',
		        'property'	=> 'color',
		        'value'		=> $theme_property_desc_text_color,
			),
			array(
				'elements'	=> '.rh_prop_card .rh_prop_card__details .rh_prop_card__meta .figure, .rh_prop_card .rh_prop_card__details .rh_prop_card__meta .label, .rh_list_card__meta div .label, .rh_list_card__meta div .figure',
		        'property'	=> 'color',
		        'value'		=> $theme_property_meta_text_color,
			),
			array(
				'elements'	=> '.rh_prop_card .rh_prop_card__details .rh_prop_card__meta h4, .rh_prop_card .rh_prop_card__details .rh_prop_card__priceLabel .rh_prop_card__status, .rh_list_card__wrap .rh_list_card__map_details .rh_list_card__priceLabel .rh_list_card__price .status, .rh_list_card__meta h4, .rh_list_card__wrap .rh_list_card__priceLabel .rh_list_card__price .status, .rh_list_card__wrap .rh_list_card__priceLabel .rh_list_card__author span',
		        'property'	=> 'color',
		        'value'		=> $inspiry_property_meta_heading_color,
			),
			array(
				'elements'	=> '.rh_prop_card .rh_prop_card__details .rh_prop_card__meta svg, .rh_list_card__meta div svg',
		        'property'	=> 'fill',
		        'value'		=> $inspiry_property_meta_icon_color,
			),
			array(
				'elements'	=> '.rh_overlay',
		        'property'	=> 'background',
		        'value'		=> $inspiry_property_overlay_rgba,
			),
			array(
				'elements'	=> '.rh_prop_card .rh_prop_card__thumbnail .rh_overlay__contents a:hover, .rh_list_card__wrap .rh_list_card__thumbnail .rh_overlay__contents a:hover, .rh_list_card__wrap .rh_list_card__map_thumbnail .rh_overlay__contents a:hover',
		        'property'	=> 'color',
		        'value'		=> $inspiry_property_image_overlay,
			),
			array(
				'elements'	=> '.rh_label',
		        'property'	=> 'background',
		        'value'		=> $inspiry_property_featured_label_bg,
			),
			array(
				'elements'	=> '.rh_label span',
		        'property'	=> $featured_label_property,
		        'value'		=> $inspiry_property_featured_label_bg,
			),
			array(
				'elements'	=> '.rh_footer',
		        'property'	=> 'background',
		        'value'		=> $inspiry_footer_bg,
			),
			array(
				'elements'	=> '.rh_footer:before',
		        'property'	=> 'border-right-color',
		        'value'		=> $inspiry_footer_bg,
			),
			array(
				'elements'	=> '.rh_footer .rh_footer__wrap .designed-by a, .rh_footer .rh_footer__wrap .copyrights a, .rh_footer .rh_footer__social a',
		        'property'	=> 'color',
		        'value'		=> $theme_footer_widget_link_color,
			),
			array(
				'elements'	=> '.rh_footer .rh_footer__wrap .designed-by a:hover, .rh_footer .rh_footer__wrap .copyrights a:hover, .rh_footer .rh_footer__social a:hover',
		        'property'	=> 'color',
		        'value'		=> $theme_footer_widget_link_hover_color,
			),
			array(
				'elements'	=> '.rh_footer .rh_footer__logo .tag-line, .rh_footer__widgets .textwidget p, .rh_footer__widgets .textwidget, .rh_footer .rh_footer__wrap .copyrights, .rh_footer .rh_footer__wrap .designed-by, .rh_contact_widget .rh_contact_widget__item .content',
		        'property'	=> 'color',
		        'value'		=> $theme_footer_widget_text_color,
			),
			array(
				'elements'	=> '.rh_contact_widget .rh_contact_widget__item .icon svg',
		        'property'	=> 'fill',
		        'value'		=> $theme_footer_widget_text_color,
			),
			array(
				'elements'	=> '.rh_menu__user .rh_menu__user_submit a, .rh_btn--primary, .post-password-form input[type="submit"], .widget .searchform input[type="submit"], .comment-form .form-submit .submit, .rh_memberships__selection .ims-stripe-button .stripe-button-el, .rh_memberships__selection #ims-free-button, .rh_contact__form .wpcf7-form input[type="submit"], .widget_mortgage-calculator .mc-wrapper p input[type="submit"], .rh_memberships__selection .ims-receipt-button #ims-receipt, .rh_contact__form .rh_contact__input input[type="submit"], .rh_form__item input[type="submit"], .rh_pagination__pages-nav a, .rh_prop_search__form .rh_prop_search__buttons .rh_prop_search__searchBtn .rh_btn__prop_search, .rh_modal .rh_modal__wrap button',
		        'property'	=> 'color',
		        'value'		=> $theme_button_text_color,
			),
			array(
				'elements'	=> '.rh_menu__user .rh_menu__user_submit a, .rh_btn--primary, .post-password-form input[type="submit"], .widget .searchform input[type="submit"], .comment-form .form-submit .submit, .rh_memberships__selection .ims-stripe-button .stripe-button-el, .rh_memberships__selection #ims-free-button, .rh_contact__form .wpcf7-form input[type="submit"], .widget_mortgage-calculator .mc-wrapper p input[type="submit"], .rh_memberships__selection .ims-receipt-button #ims-receipt, .rh_contact__form .rh_contact__input input[type="submit"], .rh_form__item input[type="submit"], .rh_pagination__pages-nav a, .rh_prop_search__form .rh_prop_search__buttons .rh_prop_search__searchBtn .rh_btn__prop_search, .rh_modal .rh_modal__wrap button',
		        'property'	=> 'background',
		        'value'		=> $theme_button_bg_color,
			),
			array(
				'elements'	=> '.rh_menu__user .rh_menu__user_submit a:hover, .rh_btn--primary:hover, .post-password-form input[type="submit"]:hover, .widget .searchform input[type="submit"]:hover, .comment-form .form-submit .submit:hover, .rh_memberships__selection .ims-stripe-button .stripe-button-el:hover, .rh_memberships__selection #ims-free-button:hover, .rh_contact__form .wpcf7-form input[type="submit"]:hover, .widget_mortgage-calculator .mc-wrapper p input[type="submit"]:hover, .rh_memberships__selection .ims-receipt-button #ims-receipt:hover, .rh_contact__form .rh_contact__input input[type="submit"]:hover, .rh_form__item input[type="submit"]:hover, .rh_pagination__pages-nav a:hover, .rh_prop_search__form .rh_prop_search__buttons .rh_prop_search__searchBtn .rh_btn__prop_search:hover, .rh_modal .rh_modal__wrap button:hover',
		        'property'	=> 'color',
		        'value'		=> $theme_button_hover_text_color,
			),
			array(
				'elements'	=> '.rh_menu__user .rh_menu__user_submit a:hover, .rh_btn--primary:hover, .post-password-form input[type="submit"]:hover, .widget .searchform input[type="submit"]:hover, .comment-form .form-submit .submit:hover, .rh_memberships__selection .ims-stripe-button .stripe-button-el:hover, .rh_memberships__selection #ims-free-button:hover, .rh_contact__form .wpcf7-form input[type="submit"]:hover, .widget_mortgage-calculator .mc-wrapper p input[type="submit"]:hover, .rh_memberships__selection .ims-receipt-button #ims-receipt:hover, .rh_contact__form .rh_contact__input input[type="submit"]:hover, .rh_form__item input[type="submit"]:hover, .rh_pagination__pages-nav a:hover, .rh_prop_search__form .rh_prop_search__buttons .rh_prop_search__searchBtn .rh_btn__prop_search:hover, .rh_modal .rh_modal__wrap button:hover',
		        'property'	=> 'background',
		        'value'		=> $theme_button_hover_bg_color,
			),
			array(
				'elements'	=> '.rh_prop_search__form .rh_prop_search__buttons .rh_prop_search__searchBtn .rh_btn__prop_search',
		        'property'	=> 'border-bottom-color',
		        'value'		=> $theme_button_bg_color,
			),
			array(
				'elements'	=> '.rh_prop_search__form .rh_prop_search__buttons .rh_prop_search__searchBtn .rh_btn__prop_search:hover',
		        'property'	=> 'border-bottom-color',
		        'value'		=> $theme_button_hover_bg_color,
			),
			array(
				'elements'	=> '.rh_prop_search__form .rh_prop_search__buttons .rh_prop_search__advance',
		        'property'	=> 'background',
		        'value'		=> $inspiry_advance_search_btn_bg,
			),
			array(
				'elements'	=> '.rh_prop_search__form .rh_prop_search__buttons .rh_prop_search__advance a:hover',
		        'property'	=> 'background',
		        'value'		=> $inspiry_advance_search_btn_hover_bg,
			),
			array(
				'elements'	=> '.rh_gallery__wrap .rh_gallery__item .media_container',
		        'property'	=> 'background',
		        'value'		=> $inspiry_gallery_hover_color,
			),
			array(
				'elements'	=> '.rh_blog__post .entry-summary p',
		        'property'	=> 'color',
		        'value'		=> $inspiry_post_text_color,
			),
			array(
				'elements'	=> '.rh_blog__post .entry-header',
		        'property'	=> 'background',
		        'value'		=> $inspiry_post_meta_bg,
			),
			array(
				'elements'	=> '.rh_slide__desc h3 .title, .rh_slide__desc h3',
		        'property'	=> 'color',
		        'value'		=> $theme_slide_title_color,
			),
			array(
				'elements'	=> '.rh_slide__desc h3 .title:hover',
		        'property'	=> 'color',
		        'value'		=> $theme_slide_title_hover_color,
			),
			array(
				'elements'	=> '.rh_slide__desc p',
		        'property'	=> 'color',
		        'value'		=> $theme_slide_desc_text_color,
			),
			array(
				'elements'	=> '.rh_slide__desc .rh_slide_prop_price span',
		        'property'	=> 'color',
		        'value'		=> $theme_slide_price_color,
			),
			array(
				'elements'	=> '.rh_slide__desc .rh_slide__meta_wrap .rh_slide__prop_meta h4, .rh_slide__desc .rh_slide_prop_price h4',
		        'property'	=> 'color',
		        'value'		=> $inspiry_slider_meta_heading_color,
			),
			array(
				'elements'	=> '.rh_slide__desc .rh_slide__meta_wrap .rh_slide__prop_meta span',
		        'property'	=> 'color',
		        'value'		=> $inspiry_slider_meta_text_color,
			),
			array(
				'elements'	=> '.rh_slide__prop_meta .rh_svg',
		        'property'	=> 'fill',
		        'value'		=> $inspiry_slider_meta_icon_color,
			),
			array(
				'elements'	=> '.rh_slide__desc .rh_label',
		        'property'	=> 'background',
		        'value'		=> $inspiry_slider_featured_label_bg,
			),
			array(
				'elements'	=> '.rh_slide__desc .rh_label span',
		        'property'	=> $slider_featured_label_property,
		        'value'		=> $inspiry_slider_featured_label_bg,
			),
		);

		/**
		 * Primary Heading Font
		 */
	    $inspiry_heading_font = get_option( 'inspiry_heading_font', 'Default' );
	    if ( 'Default' !== $inspiry_heading_font ) {
		    $dynamic_css[] = array(
			    'elements' => '
			    				h1, h2, h3, h4, h5, h6, .rh_logo .rh_logo__heading a, ul.rh_menu__main li a, .rh_menu__user .rh_menu__user_phone .contact-number,
			    				.rh_menu__user .rh_menu__user_submit a, .rh_user .rh_user__details .rh_user__msg,
			    				.rh_slide__desc h3 .title, .rh_section .rh_section__head .rh_section__subtitle,
			    				.rh_page__head .rh_page__title p.title, .rh_modal .rh_modal__wrap .rh_modal__dashboard .rh_modal__dash_link,
			    				.rh_page__head .rh_page__title p.sub, .rh_blog__post .entry-header .entry-title a,
			    				.rh_page__head .rh_page__title p.sub, .rh_agent_card__wrap .rh_agent_card__head .rh_agent_card__name .name a,
			    				.property-thumbnail .property-title a',
			    'property' => 'font-family',
			    'value'    => $inspiry_heading_font,
		    );
	    }

	    /**
	     * Secondary Heading Font
	     */
	    $inspiry_secondary_font = get_option( 'inspiry_secondary_font', 'Default' );
	    if ( 'Default' != $inspiry_secondary_font ) {
		    $dynamic_css[] = array(
			    'elements' => '
			                    .rh_form__item #drag-and-drop, .rh_slide__desc .rh_slide_prop_price span, .rh_feature .rh_feature__title h4,
			                    .rh_form__item #errors-log, .rh_slide__desc .rh_slide__meta_wrap .rh_slide__prop_meta span, .comment-form .comment-notes,
			                    .rh_content, .comment-form p textarea, .comment-form p input, .rh_prop_card .rh_prop_card__details .rh_prop_card__meta h4, .rh_prop_card .rh_prop_card__details .rh_prop_card__priceLabel .rh_prop_card__status,
			                    [data-tooltip]::after, .rh_prop_search__form .rh_prop_search__fields .rh_prop_search__option label, .rh_page .no-results,
			                    .rh_memberships__selection .ims-stripe-button .stripe-button-el span, .widget_mortgage-calculator .mc-wrapper p label,
			                    .rh_memberships__selection .ims-button-option.error, .widget_mortgage-calculator .mc-wrapper p input, .widget p, .rh_property_agent .rh_property_agent__link,
			                    .rh_blog__post .entry-header .entry-meta, .select2-container .select2-selection--single .select2-selection__rendered, .rh_list_card__meta div span,
			                    #message-container, .rh_prop_search__form .rh_prop_search__fields .rh_prop_search__option input, .rh_property_agent .rh_property_agent__title, .rh_compare .title, .rh_btn,
			                    .rh_prop_card .rh_prop_card__details h3, .rh_prop_card .rh_prop_card__details .rh_prop_card__meta .label, .rh_list_card__wrap .rh_list_card__map_wrap h3 a,
			                    .rh_prop_card .rh_prop_card__details .rh_prop_card__meta .figure, .rh_prop_card .rh_prop_card__details .rh_prop_card__priceLabel .rh_prop_card__price,
			                    .rh_label .rh_label__wrap, .rh_prop_card .rh_prop_card__thumbnail .rh_overlay__contents a, .rh_list_card__wrap .rh_list_card__details_wrap h3 a,
			                    .rh_testimonial .rh_testimonial__author .rh_testimonial__author_name, .rh_testimonial .rh_testimonial__author .rh_testimonial__author__link a,
			                    .rh_cta__wrap .rh_cta__title, .rh_cta__wrap .rh_cta__btns a, .rh_agent .rh_agent__details h3, .rh_agent .rh_agent__details .rh_agent__email,
			                    .rh_footer .rh_footer__logo .tag-line, .widget .title, .textwidget, .rh_widgets, .rh_footer .rh_footer__wrap, .rh_list_card__meta h4,
			                    .rh_page__property .rh_page__property_title .rh_page__property_address, .rh_page__property .rh_page__property_price, .rh_property__id .title,
			                    .rh_property__id .id, .rh_property__meta_wrap .rh_property__meta h4, .rh_property__meta_wrap .rh_property__meta span, .rh_property__heading,
			                    .rh_property__additional, .rh_property__common_note p, .rh_property__features_wrap .rh_property__features, .rh_property__attachments_wrap .rh_property__attachments,
			                    .floor-plans-accordions .floor-plan-title, .floor-plans-accordions .floor-plan-title .title h3, .floor-plans-accordions .floor-plan-content p,
			                    #comments #comments-title, .comment-respond .comment-reply-title, .comment-form .logged-in-as, .comment-form .form-submit .submit,
			                    .rh_list_card__wrap .rh_list_card__priceLabel .rh_list_card__price .status, .rh_list_card__wrap .rh_list_card__priceLabel .rh_list_card__price .price,
			                    .rh_list_card__wrap .rh_list_card__priceLabel .rh_list_card__author, .rh_list_card__wrap .rh_list_card__thumbnail .rh_overlay__contents a, .rh_pagination a, .widget ul, .widget ol,
			                    .rh_list_card__wrap .rh_list_card__map_thumbnail .rh_overlay__contents a, .rh_blog__post .entry-header .entry-title a, .widget .tagcloud a, .widget .searchform input,
			                    .widget *, .rh_blog__post .entry-header .entry-title, .rh_gallery__wrap .rh_gallery__item .item-title a, .rh_page__gallery_filters a, .rh_membership .rh_membership__title .title,
			                    .rh_membership .rh_membership__title .price, .rh_memberships__sidebar .title, .rh_memberships__sidebar .message, .rh_memberships__selection .form-option h4,
			                    .rh_checkbox span.rh_checkbox__title, .rh_memberships__selection #ims-free-button, .rh_memberships__selection .ims-wire-transfer h4, .rh_memberships__selection .ims-receipt-button #ims-receipt,
			                    .property-thumbnail .property-title a, .property-thumbnail .property-status, .property-thumbnail .property-price p, .rh_prop_compare__row .rh_prop_compare__column p,
			                    .rh_contact__form .contact-form, .rh_contact__details .rh_contact__item .content, .rh_page__head .rh_page__nav .rh_page__nav_item, .inspiry-message,
			                    .rh_my-property .rh_my-property__title h5, .rh_my-property .rh_my-property__publish .property-date h5, .rh_my-property .rh_my-property__publish .property-status h5,
			                    .rh_my-property .rh_my-property__controls a, .rh_form__item input, .rh_form__item textarea, .rh_property__agent_head .description .name, .rh_property__agent_head .description p,
			                    .rh_property__agent_head .contacts-list .contact, .rh_agent_form .rh_agent_form__text input, .rh_agent_form .rh_agent_form__textarea textarea,
			                    .rh_slide__desc .rh_slide__meta_wrap .rh_slide__prop_meta h4, .rh_modal .rh_modal__wrap input, .rh_modal .rh_modal__wrap button',
			    'property' => 'font-family',
			    'value'    => $inspiry_secondary_font,
		    );
	    }

		/**
		 * Body Font
		 */
		$inspiry_body_font = get_option( 'inspiry_body_font', 'Default' );
		if ( 'Default' !== $inspiry_body_font ) {
		    $dynamic_css[] = array(
			    'elements' => 'body, .entry-content',
			    'property' => 'font-family',
			    'value'    => $inspiry_body_font,
		    );
		}

		if ( is_singular( 'property' ) ) {
	    	global $post;
	    	/* Property Features */
			$features_terms = get_the_terms( get_the_ID(), 'property-feature' );

			if ( ! empty( $features_terms ) ) {
				foreach ( $features_terms as $feature_term ) {
					$feature_icon_id 	= get_term_meta( $feature_term->term_id, 'inspiry_property_feature_icon', true );
					$feature_icon 		= ! empty( $feature_icon_id ) ? wp_get_attachment_url( $feature_icon_id ) : false;
					if ( ! empty( $feature_icon ) ) {
						$dynamic_css[] = array(
						    'elements' => ".rh_property__features_wrap #rh_property__feature_$feature_term->term_id:before",
						    'property' => 'background-image',
						    'value'    => 'url("' . $feature_icon . '")',
					    );
					    $dynamic_css[] = array(
						    'elements' => ".rh_property__features_wrap #rh_property__feature_$feature_term->term_id:before",
						    'property' => 'background-size',
						    'value'    => 'cover',
					    );
					}
				}
			}
	    }

	    /* Property labels background color */
		$properties = get_posts( array(
			'post_type'      => 'property',
			'posts_per_page' => 100,
			'meta_query'     => array(
				array(
					'key'     => 'inspiry_property_label',
					'compare' => 'EXITS',
				),
				array(
					'key'     => 'inspiry_property_label_color',
					'compare' => 'EXITS',
				),
			),
		) );

		if ( ! empty( $properties ) && is_array( $properties ) ) {
			foreach ( $properties as $property ) {
				$post_id       = $property->ID;
				$color         = get_post_meta( $post_id, 'inspiry_property_label_color', true );
				$dynamic_css[] = array(
					'elements' => ".post-{$post_id} .property-label",
					'property' => 'background-color',
					'value'    => $color,
				);
			}
		}

		$dynamic_css_above_320px = array(
	        // Font family.
	        // array(
	        //     'elements'	=> 'p, .rh_agent_form .rh_agent_form__row, a',
	        //     'property'	=> 'font-family',
	        //     'value'		=> $inspiry_secondary_font,
	        // ),
	    );

	    $dynamic_css_above_480px = array(
	        // Font family.
	        // array(
	        //     'elements'	=> 'p, .rh_agent_form .rh_agent_form__row, a',
	        //     'property'	=> 'font-family',
	        //     'value'		=> $inspiry_secondary_font,
	        // ),
	    );

	    $dynamic_css_above_768px = array(
	        // Font family.
	        // array(
	        //     'elements'	=> 'p, .rh_agent_form .rh_agent_form__row, a',
	        //     'property'	=> 'font-family',
	        //     'value'		=> $inspiry_secondary_font,
	        // ),
	    );

	    $dynamic_css_above_1024px = array(
	        // Font family.
	        // array(
	        //     'elements'	=> 'p, .rh_agent_form .rh_agent_form__row, a',
	        //     'property'	=> 'font-family',
	        //     'value'		=> $inspiry_secondary_font,
	        // ),
	    );

	    $dynamic_css_above_1140px = array(
	        // Font family.
	        // array(
	        //     'elements'	=> 'p, .rh_agent_form .rh_agent_form__row, a',
	        //     'property'	=> 'font-family',
	        //     'value'		=> $inspiry_secondary_font,
	        // ),
	    );

	    $dynamic_css_above_1280px = array(
	        // Font family.
	        // array(
	        //     'elements'	=> 'p, .rh_agent_form .rh_agent_form__row, a',
	        //     'property'	=> 'font-family',
	        //     'value'		=> $inspiry_secondary_font,
	        // ),
	    );

		$prop_count = count( $dynamic_css );

		if ( $prop_count > 0 ) {
		    echo "<style type='text/css' id='dynamic-css'>\n\n";

		    foreach ( $dynamic_css as $css_unit ) {
		        if ( ! empty( $css_unit['value'] ) ) {
		            echo $css_unit['elements']."{\n";
		            echo $css_unit['property'].":".$css_unit['value'].";\n";
		            echo "}\n\n";
		        }
		    }

		    /* CSS For min-width: 320px */
		    if ( ! empty( $dynamic_css_above_320px ) ) {
		        echo "@media ( min-width: 320px ) {\n";
		        foreach ( $dynamic_css_above_320px as $css_unit ) {
		            if ( ! empty( $css_unit['value'] ) ) {
		                echo $css_unit['elements'] . "{\n";
		                echo $css_unit['property'] . ':' . $css_unit['value'] . ";\n";
		                echo "}\n\n";
		            }
		        }
		        echo "}\n";
		    }

	        /* CSS For min-width: 480px */
	        if ( ! empty( $dynamic_css_above_480px ) ) {
		        echo "@media ( min-width: 480px ) {\n";
		        foreach ( $dynamic_css_above_480px as $css_unit ) {
		            if ( ! empty( $css_unit['value'] ) ) {
		                echo $css_unit['elements'] . "{\n";
		                echo $css_unit['property'] . ':' . $css_unit['value'] . ";\n";
		                echo "}\n\n";
		            }
		        }
		        echo "}\n";
	        }

	        /* CSS For min-width: 768px */
	        if ( ! empty( $dynamic_css_above_768px ) ) {
		        echo "@media ( min-width: 768px ) {\n";
		        foreach ( $dynamic_css_above_768px as $css_unit ) {
		            if ( ! empty( $css_unit['value'] ) ) {
		                echo $css_unit['elements'] . "{\n";
		                echo $css_unit['property'] . ':' . $css_unit['value'] . ";\n";
		                echo "}\n\n";
		            }
		        }
		        echo "}\n";
		    }

	        /* CSS For min-width: 1024px */
	        if ( ! empty( $dynamic_css_above_1024px ) ) {
		        echo "@media ( min-width: 1024px ) {\n";
		        foreach ( $dynamic_css_above_1024px as $css_unit ) {
		            if ( ! empty( $css_unit['value'] ) ) {
		                echo $css_unit['elements'] . "{\n";
		                echo $css_unit['property'] . ':' . $css_unit['value'] . ";\n";
		                echo "}\n\n";
		            }
		        }
		        echo "}\n";
	        }

	        /* CSS For min-width: 1140px */
	        if ( ! empty( $dynamic_css_above_1140px ) ) {
		        echo "@media ( min-width: 1140px ) {\n";
		        foreach ( $dynamic_css_above_1140px as $css_unit ) {
		            if ( ! empty( $css_unit['value'] ) ) {
		                echo $css_unit['elements'] . "{\n";
		                echo $css_unit['property'] . ':' . $css_unit['value'] . ";\n";
		                echo "}\n\n";
		            }
		        }
		        echo "}\n";
	        }

	        /* CSS For min-width: 1280px */
	        if ( ! empty( $dynamic_css_above_1280px ) ) {
		        echo "@media ( min-width: 1280px ) {\n";
		        foreach ( $dynamic_css_above_1280px as $css_unit ) {
		            if ( ! empty( $css_unit['value'] ) ) {
		                echo $css_unit['elements'] . "{\n";
		                echo $css_unit['property'] . ':' . $css_unit['value'] . ";\n";
		                echo "}\n\n";
		            }
		        }
		        echo "}\n";
	        }

		    echo '</style>';
		}

	}
}
