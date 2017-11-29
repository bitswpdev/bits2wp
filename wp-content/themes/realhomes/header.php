<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="format-detection" content="telephone=no">

    <?php
    if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
	    $favicon = get_option( 'theme_favicon' );
	    if ( ! empty( $favicon ) ) {
		    ?><link rel="shortcut icon" href="<?php echo esc_url( $favicon ); ?>" /><?php
	    }
    }

    if ( is_singular() && pings_open( get_queried_object() ) ) {
	    ?><link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php
    }

    wp_head();
    ?>
</head>
<body <?php body_class(); ?>>

    <?php
    $rh_design_variation = INSPIRY_DESIGN_VARIATION;

    if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
        get_template_part( 'assets/' . $rh_design_variation . '/partials/header/header' );
    } elseif ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
        get_template_part( 'assets/' . $rh_design_variation . '/partials/header/header' );
    }
    ?>
