<?php
/**
 * Template Name: Memberships Template
 *
 * @since 3.0.0
 * @package RH
 */

$rh_design_variation = INSPIRY_DESIGN_VARIATION;

if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
	wp_safe_redirect( home_url() );
	exit();
} elseif ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
	get_template_part( 'assets/' . $rh_design_variation . '/partials/page/page', 'memberships' );
}
