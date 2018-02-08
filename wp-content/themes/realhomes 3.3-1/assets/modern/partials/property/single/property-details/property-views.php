<?php
/**
 * Single Property: Views
 *
 * Views of the single property.
 *
 * @since    3.1.0
 * @package RH/modern
 */

$display_views = get_option( 'inspiry_display_property_views', 'false' );
$views_title   = get_option( 'inspiry_property_views_title', esc_html__( 'Property Views', 'framework' ) );

if ( 'true' == $display_views ) {
	?>
	<div class="rh_property__views">
		<?php
			if ( ! empty( $views_title ) ) {
				echo "<h4 class='rh_property__heading'>{$views_title}</h4>";
			}
		?>
		<canvas id="viewsChart" width="787px" height="450px"></canvas>
	</div>
	<?php
}
?>
