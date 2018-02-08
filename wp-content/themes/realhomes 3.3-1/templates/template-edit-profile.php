<?php
/**
 * Template Name: Edit Profile
 *
 * Allow users to update their profile information from front end.
 *
 * @since 1.0.0
 * @package RH
 */

$rh_design_variation = INSPIRY_DESIGN_VARIATION;

if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
	get_template_part( 'assets/' . $rh_design_variation . '/partials/page/page', 'edit-profile' );
} elseif ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
	get_template_part( 'assets/' . $rh_design_variation . '/partials/page/page', 'edit-profile' );
}
