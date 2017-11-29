<?php
/**
 * Map based Property Listing
 *
 * Page template for map based property listing.
 *
 * @since 	2.7.0
 * @package RH/classic
 */

get_header();

// Page Head.
get_template_part( 'assets/classic/partials/banners/banner-map' ); ?>

<!-- Content -->
<?php
if ( isset( $_GET['view'] ) ) {
    $view_type = $_GET['view'];
} else {
    /* Theme Options Listing Layout */
    $view_type = get_option( 'theme_listing_layout' );
}

if ( 'grid' === $view_type ) {
    get_template_part( 'assets/classic/partials/property/listing/listing', 'grid-container' );
} else {
    get_template_part( 'assets/classic/partials/property/listing/listing', 'container' );
}
?>
<!-- End Content -->

<?php get_footer(); ?>
