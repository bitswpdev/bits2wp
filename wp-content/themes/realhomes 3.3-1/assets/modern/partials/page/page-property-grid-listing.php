<?php
/**
 * Page: Property Grid Listing
 *
 * Property grid listing page of the theme.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

get_header();

// Page Head.
$header_variation = get_option( 'inspiry_listing_header_variation' );

if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/banner', 'header' );
} elseif ( ! empty( $header_variation ) && ( 'banner' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/banner', 'image' );
}

if ( inspiry_show_header_search_form() ) {
	get_template_part( 'assets/modern/partials/property/search/search', 'advance' );
}

?>

<!-- Content -->
<?php
if ( isset( $_GET['view'] ) ) {
	$view_type = $_GET['view'];
} else {
	/* Theme Options Listing Layout */
	$view_type = '';
}

if ( 'list' === $view_type ) {
	get_template_part( 'assets/modern/partials/property/listing/listing', 'container' );
} else {
	get_template_part( 'assets/modern/partials/property/listing/listing', 'grid-container' );
}
?>
<!-- End Content -->

<?php
get_footer();
