<?php
/**
 * Single Property: Views
 *
 * Views of the single property.
 *
 * @since    3.1.0
 * @package RH/classic
 */

$display_views = get_option( 'inspiry_display_property_views', 'false' );
$views_title   = get_option( 'inspiry_property_views_title', esc_html__( 'Property Views', 'framework' ) );

if ( 'true' == $display_views ) {
	?>
	<div class="property-views">
		<?php
			if ( ! empty( $views_title ) ) {
				echo "<span class='views-label'>{$views_title}</span>";
			}
		?>
		<div class="viewChart-wrap">
			<canvas id="viewsChart" width="818px" height="450px"></canvas>
		</div>
	</div>
	<?php
}
?>
