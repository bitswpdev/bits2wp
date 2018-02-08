<?php
/**
 * Property Listing Template
 *
 * Page template for property listing.
 *
 * @since 	2.7.0
 * @package RH/classic
 */

get_header();

/* Theme Listing Page Module */
$theme_listing_module = get_option( 'theme_listing_module' );

/* Only for demo purpose only */
if ( isset( $_GET['module'] ) ) {
    $theme_listing_module = $_GET['module'];
}

switch ( $theme_listing_module ) {
    case 'properties-map':
        get_template_part( 'assets/classic/partials/banners/banner', 'map' );
        break;

    default:
        get_template_part( 'assets/classic/partials/banners/banner', 'default' );
        break;
}
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
    get_template_part( 'assets/classic/partials/property/listing/listing', 'grid-container' );
} else {
    get_template_part( 'assets/classic/partials/property/listing/listing', 'container' );
}
?>
<!-- End Content -->

<?php get_footer(); ?>
