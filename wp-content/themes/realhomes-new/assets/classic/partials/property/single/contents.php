<?php
/**
 * Single Property Contents
 *
 * @package    realhomes
 * @subpackage classic
 */

?>

<article class="property-item clearfix">
	<div class="wrap clearfix">
		<?php
		$address_display = get_option( 'inspiry_display_property_address', 'true' );
		if ( 'true' === $address_display ) {
			?>
			<address class="title">
				<?php
				/* Property Address if exists */
				$property_address = get_post_meta( $post->ID, 'REAL_HOMES_property_address', true );
				if ( ! empty( $property_address ) ) {
					echo esc_html( $property_address );
				}
				?>
			</address>
			<?php
		}
		?>
		<h5 class="price">
			<span class="status-label">
				<?php
				/* Property Status. For example: For Sale, For Rent */
				$status_terms = get_the_terms( $post->ID, 'property-status' );
				if ( ! empty( $status_terms ) ) {
					$status_count = 0;
					foreach ( $status_terms as $term ) {
						if ( $status_count > 0 ) {
							echo ', ';
						}
						echo esc_html( $term->name );
						$status_count ++;
					}
				} else {
					echo '&nbsp;';
				}
				?>
			</span>
			<span>
				<?php
				/* Property Price */
				property_price();

				/* Property Type. For example: Villa, Single Family Home */
				echo inspiry_get_property_types( $post->ID );
				?>
			</span>
		</h5>
	</div>

	<div class="property-meta clearfix">
		<?php
		// Property meta.
		get_template_part( 'assets/classic/partials/property/single/metas' );
		?>
	</div>

	<div class="content clearfix">
		<?php
		// Contents from WordPress editor.
		the_content();

		// Property additional details from meta boxes.
		get_template_part( 'assets/classic/partials/property/single/additional-details' );

		// Common note from theme options.
		get_template_part( 'assets/classic/partials/property/single/common-note' );
		?>
	</div>


	<?php
	/* Property Features */
	$features_terms = get_the_terms( $post->ID, 'property-feature' );
	if ( ! empty( $features_terms ) ) {
		?>
		<div class="features">
			<?php
			$property_features_title = get_option( 'theme_property_features_title' );
			if ( ! empty( $property_features_title ) ) {
				?><h4 class="title"><?php echo esc_html( $property_features_title ); ?></h4><?php
			}
			?>
			<ul class="arrow-bullet-list clearfix">
				<?php
				foreach ( $features_terms as $fet_trms ) {
					echo '<li id="rh_property__feature_' . esc_attr( $fet_trms->term_id ) . '"><a href="' . esc_url( get_term_link( $fet_trms->slug, 'property-feature' ) ) . '">' . esc_html( $fet_trms->name ) . '</a></li>';
				}
				?>
			</ul>
		</div>
		<?php
	}
	?>
</article>
