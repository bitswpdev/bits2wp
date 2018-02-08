<?php
/**
 * Taxonomy: Property Feature
 *
 * @since 1.0.0
 * @package RH
 */

$rh_design_variation = INSPIRY_DESIGN_VARIATION;

if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
	get_template_part( 'assets/' . $rh_design_variation . '/partials/taxonomy/taxonomy', 'property-feature' );
} elseif ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
	get_template_part( 'assets/' . $rh_design_variation . '/partials/taxonomy/taxonomy', 'property-feature' );
}
