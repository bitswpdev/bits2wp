<?php
/**
 * Template Name: Home Template
 *
 * @package RH
 */

$rh_design_variation = INSPIRY_DESIGN_VARIATION;

if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
    get_template_part( 'assets/' . $rh_design_variation . '/partials/home/home' );
} elseif ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
    get_template_part( 'assets/' . $rh_design_variation . '/partials/home/home' );
}
