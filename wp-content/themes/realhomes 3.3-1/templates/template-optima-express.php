<?php
/**
 * Template Name: Optima Express Template
 *
 * @since 2.6.3
 * @package RH
 */

$rh_design_variation = INSPIRY_DESIGN_VARIATION;

if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
    get_template_part( 'assets/' . $rh_design_variation . '/partials/page/page', 'optima-express' );
}
