<?php
/**
 * Search Form
 *
 * This file contains search form code.
 *
 * @since  2.7.0
 * @package RH/classic
 */

if ( inspiry_is_search_fields_configured() ) :
	$theme_search_fields = inspiry_get_search_fields();
	?>
	<div class="as-form-wrap">
		<form class="advance-search-form clearfix" action="<?php echo esc_url( inspiry_get_search_page_url() ); ?>" method="get">
		<?php

		/*
		 * Keyword Field
		 */
		if ( in_array( 'keyword-search', $theme_search_fields ) ) {
			get_template_part( 'assets/classic/partials/property/views/search-fields/keyword' );
		}


		/*
		 * Property ID Field
		 */
		if ( in_array( 'property-id', $theme_search_fields ) ) {
			get_template_part( 'assets/classic/partials/property/views/search-fields/property-id' );
		}


		/*
		 * Location Field
		 */
		if ( in_array( 'location', $theme_search_fields ) ) {
			get_template_part( 'assets/classic/partials/property/views/search-fields/location' );
		}


		/*
		 * Property Status Field
		 */
		if ( in_array( 'status', $theme_search_fields ) ) {
			get_template_part( 'assets/classic/partials/property/views/search-fields/status' );
		}


		/*
		 * Property Type Field
		 */
		if ( in_array( 'type', $theme_search_fields ) ) {
			get_template_part( 'assets/classic/partials/property/views/search-fields/type' );
		}


		/*
		 * Min Beds Field
		 */
		if ( in_array( 'min-beds', $theme_search_fields ) ) {
			get_template_part( 'assets/classic/partials/property/views/search-fields/min-beds' );
		}


		/*
		 * Min Baths Field
		 */
		if ( in_array( 'min-baths', $theme_search_fields ) ) {
			get_template_part( 'assets/classic/partials/property/views/search-fields/min-baths' );
		}


		/*
		 * Min Garages Field
		 */
		if ( in_array( 'min-garages', $theme_search_fields ) ) {
			get_template_part( 'assets/classic/partials/property/views/search-fields/min-garages' );
		}


		/*
		 * Min & Max Price
		 */
		if ( in_array( 'min-max-price', $theme_search_fields ) ) {
			get_template_part( 'assets/classic/partials/property/views/search-fields/min-max-price' );
		}


		/*
		 * Min & Max Area
		 */
		if ( in_array( 'min-max-area', $theme_search_fields ) ) {
			get_template_part( 'assets/classic/partials/property/views/search-fields/min-max-area' );
		}


		/*
		 * Search Button
		 */
		get_template_part( 'assets/classic/partials/property/views/search-fields/button' );


		if ( isset( $_GET['sortby'] ) ) {
			?><input type="hidden" name="sortby" value="<?php echo $_GET['sortby']; ?>" /><?php

		}


		/*
		 * Features
		 */
		if ( in_array( 'features', $theme_search_fields ) ) {
			get_template_part( 'assets/classic/partials/property/views/search-fields/features' );
		}

		?>
		</form>
	</div>
	<?php
endif;
