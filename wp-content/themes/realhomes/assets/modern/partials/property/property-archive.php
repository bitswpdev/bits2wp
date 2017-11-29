<?php
/**
 * Property Archive
 *
 * Template for property archive.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

get_header();

// Page Head.
$header_variation = get_option( 'inspiry_listing_header_variation', 'none' );

if ( ! empty( $header_variation ) && ( 'banner' === $header_variation ) ) :
	get_template_part( 'assets/modern/partials/banner/banner', 'property-archive' );
elseif ( empty( $header_variation ) || ( 'none' === $header_variation ) ) :
	get_template_part( 'assets/modern/partials/banner/banner', 'header' );
endif;

?>

<!-- Content -->
<?php
if ( isset( $_GET['view'] ) ) {
	$view_type = $_GET['view'];
} else {
	/* Theme Options Listing Layout */
	$view_type = get_option( 'theme_listing_layout' );
}

if ( 'grid' === $view_type ) {
	get_template_part( 'assets/modern/partials/property/archive/archive', 'grid-container' );
} else {
	get_template_part( 'assets/modern/partials/property/archive/archive', 'container' );
}
?>
<!-- End Content -->

<?php
get_footer();
