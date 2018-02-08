<?php
/**
 * Page: Favorites Page Template
 *
 * Page template for favorites page template.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

get_header();

// Page Head.
$header_variation = get_option( 'inspiry_member_pages_header_variation' );

if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/banner', 'header' );
} elseif ( ! empty( $header_variation ) && ( 'banner' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/banner', 'image' );
}

if ( inspiry_show_header_search_form() ) {
	get_template_part( 'assets/modern/partials/property/search/search', 'advance' );
}

get_template_part( 'assets/modern/partials/property/listing/listing', 'favorites' );

get_footer();
