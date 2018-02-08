<div class="rh_form__item rh_form--2-column rh_form--columnAlign agent-fields-wrapper">
	<label for="property_views"><?php esc_html_e( 'Property Views', 'framework' ); ?></label>
	<?php
		global $edit_property_id;
		$property_views = new Inspiry_Page_Views( $edit_property_id );
		$property_views = $property_views->get_page_views_list();
		$dates_list     = json_encode( array_keys( $property_views ) );
		$counts_list    = json_encode( array_values( $property_views ) );
		$chart_type     = get_option( 'inspiry_property_views_type', 'bar' );

		$backgroundColor = 'rgba(30, 166, 154, 0.2)';
		$borderColor     = 'rgba(30, 166, 154, 1)';

		// Localize the script with page views data
		$translation_array = array(
			'dates'           => $dates_list,
			'counts'          => $counts_list,
			'type'            => $chart_type,
			'backgroundColor' => $backgroundColor,
			'borderColor'     => $borderColor,
		);

		// property views graph
	?>
	<div class="property-views">
		<div class="viewChart-wrap">
			<canvas id="viewsChart" width="818px" height="450px"></canvas>
		</div>
	</div>
	<script type="text/javascript">
		(function ($) {
			$(document).ready(function () {
				var ctx = document.getElementById("viewsChart").getContext('2d');
				var myChart = new Chart(ctx, {
					type: '<?php echo $translation_array['type']; ?>',
					data: {
						labels: JSON.parse('<?php echo $translation_array['dates']; ?>'),
						datasets: [{
							label: 'Views',
							data: JSON.parse('<?php echo $translation_array['counts']; ?>'),
							backgroundColor: '<?php echo $translation_array['backgroundColor']; ?>',
							borderColor: '<?php echo $translation_array['borderColor']; ?>',
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							xAxes: [{
								barPercentage: 0.9
							}],
							yAxes: [{
								ticks: {
									beginAtZero: true
								},
							}]
						},
						tooltips: {
							displayColors: false
						},
						legend: {
							display: false
						},
					}
				});
			});
		})(jQuery);
	</script>
</div>