<?php
/**
 * Single Property
 *
 * @since 2.7.0
 * @package RH/classic
 */

$rh_design_variation = INSPIRY_DESIGN_VARIATION;

if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
	get_template_part( 'assets/' . $rh_design_variation . '/partials/property/single/single', 'property' );
} elseif ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
	get_template_part( 'assets/' . $rh_design_variation . '/partials/property/single/single', 'property' );
}
