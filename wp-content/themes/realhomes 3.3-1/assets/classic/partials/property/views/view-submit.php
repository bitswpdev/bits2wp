<?php
/**
 * View: Submit Property View
 *
 * View for property submit on front-end.
 * This file is only to be used with in template-submit-property.php
 *
 * @since   2.7.0
 * @package RH/classic
 */

if ( is_page_template( 'templates/template-submit-property.php' ) ) {
	$inspiry_submit_fields = inspiry_get_submit_fields(); ?>
	<form id="submit-property-form" class="submit-form" enctype="multipart/form-data" method="post">

		<div class="row-fluid">

			<div class="span6">
				<?php
				/**
				 * Property Title
				 */
				if ( in_array( 'title', $inspiry_submit_fields ) ) {
					get_template_part( 'assets/classic/partials/property/views/submit-fields/title' );
				}

				/**
				 * Property Description
				 */
				if ( in_array( 'description', $inspiry_submit_fields ) ) {
					get_template_part( 'assets/classic/partials/property/views/submit-fields/description' );
				}
				?>
				<div class="form-options-container clearfix">
					<?php
					/**
					 * Property Type
					 */
					if ( in_array( 'property-type', $inspiry_submit_fields ) ) {
						get_template_part( 'assets/classic/partials/property/views/submit-fields/property-type' );
					}

					/**
					 * Property Status
					 */
					if ( in_array( 'property-status', $inspiry_submit_fields ) ) {
						get_template_part( 'assets/classic/partials/property/views/submit-fields/property-status' );
					}
					?>
					<div class="clearfix"></div>
					<?php
					/**
					 * Locations
					 */
					if ( in_array( 'locations', $inspiry_submit_fields ) ) {
						get_template_part( 'assets/classic/partials/property/views/submit-fields/locations' );
					}
					?>
					<div class="clearfix"></div>
					<?php
					/**
					 * Bedrooms
					 */
					if ( in_array( 'bedrooms', $inspiry_submit_fields ) ) {
						get_template_part( 'assets/classic/partials/property/views/submit-fields/bedrooms' );
					}

					/**
					 * Bathrooms
					 */
					if ( in_array( 'bathrooms', $inspiry_submit_fields ) ) {
						get_template_part( 'assets/classic/partials/property/views/submit-fields/bathrooms' );
					}
					?>
					<div class="clearfix"></div>
					<?php
					/**
					 * Garages
					 */
					if ( in_array( 'garages', $inspiry_submit_fields ) ) {
						get_template_part( 'assets/classic/partials/property/views/submit-fields/garages' );
					}

					/**
					 * Property ID
					 */
					if ( in_array( 'property-id', $inspiry_submit_fields ) ) {
						get_template_part( 'assets/classic/partials/property/views/submit-fields/property-id' );
					}
					?>
					<div class="clearfix"></div>
					<?php
					/**
					 * Property Price
					 */
					if ( in_array( 'price', $inspiry_submit_fields ) ) {
						get_template_part( 'assets/classic/partials/property/views/submit-fields/price' );
					}

					/**
					 * Property Price Postfix
					 */
					if ( in_array( 'price-postfix', $inspiry_submit_fields ) ) {
						get_template_part( 'assets/classic/partials/property/views/submit-fields/price-postfix' );
					}
					?>
					<div class="clearfix"></div>
					<?php
					/**
					 * Property Area
					 */
					if ( in_array( 'area', $inspiry_submit_fields ) ) {
						get_template_part( 'assets/classic/partials/property/views/submit-fields/area' );
					}

					/**
					 * Property Area Postfix
					 */
					if ( in_array( 'area-postfix', $inspiry_submit_fields ) ) {
						get_template_part( 'assets/classic/partials/property/views/submit-fields/area-postfix' );
					}
					?>
					<div class="clearfix"></div>
					<?php
					/**
					 * Property Video
					 */
					if ( in_array( 'video', $inspiry_submit_fields ) ) {
						get_template_part( 'assets/classic/partials/property/views/submit-fields/video' );
					}

					/**
					 * Property Year Built
					 */
					if ( in_array( 'year-built', $inspiry_submit_fields, true ) ) {
						get_template_part( 'assets/classic/partials/property/views/submit-fields/year-built' );
					}
					?>
				</div>
				<?php
				/**
				 * Gallery Images
				 */
				if ( in_array( 'images', $inspiry_submit_fields ) ) {
					get_template_part( 'assets/classic/partials/property/views/submit-fields/images' );
				}
				?>
			</div>

			<div class="span6">
				<?php
				/**
				 * Address and Google Map
				 */
				if ( in_array( 'address-and-map', $inspiry_submit_fields ) ) {
					get_template_part( 'assets/classic/partials/property/views/submit-fields/address-and-map' );
				}

				/**
				 * Additional Details
				 */
				if ( in_array( 'additional-details', $inspiry_submit_fields ) ) {
					get_template_part( 'assets/classic/partials/property/views/submit-fields/additional-details' );
				}
				?>
				<hr/>
				<?php
				/**
				 * Featured Property
				 */
				if ( in_array( 'featured', $inspiry_submit_fields ) ) {
					get_template_part( 'assets/classic/partials/property/views/submit-fields/featured' );
				}

				/**
				 * Property Features
				 */
				if ( in_array( 'features', $inspiry_submit_fields ) ) {
					get_template_part( 'assets/classic/partials/property/views/submit-fields/features' );
				}

				/**
				 * Property Agent
				 */
				if ( in_array( 'agent', $inspiry_submit_fields ) ) {
					get_template_part( 'assets/classic/partials/property/views/submit-fields/agent' );
				}

				/**
				 * Parent Property
				 */
				if ( in_array( 'parent', $inspiry_submit_fields ) ) {
					get_template_part( 'assets/classic/partials/property/views/submit-fields/parent' );
				}

				/**
				 * Reviewer Message
				 */
				if ( in_array( 'reviewer-message', $inspiry_submit_fields ) ) {
					get_template_part( 'assets/classic/partials/property/views/submit-fields/reviewer-message' );
				}

				/**
				 * Terms & Conditions
				 */
				if ( in_array( 'terms-conditions', $inspiry_submit_fields ) ) {
					get_template_part( 'assets/classic/partials/property/views/submit-fields/terms-conditions' );
				}

				/**
				 * Submit Button
				 */
				get_template_part( 'assets/classic/partials/property/views/submit-fields/submit-button' );
				?>
			</div>

		</div>

	</form>
	<?php
}
