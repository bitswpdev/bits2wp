<?php
/**
 * Property meta of single property template.
 *
 * @package    realhomes
 * @subpackage modern
 */

global $post;
$property_size       = get_post_meta( get_the_ID(), 'REAL_HOMES_property_size', true );
$size_postfix        = get_post_meta( get_the_ID(), 'REAL_HOMES_property_size_postfix', true );
$lot_size            = get_post_meta( get_the_ID(), 'REAL_HOMES_property_lot_size', true );
$lot_size_postfix    = get_post_meta( get_the_ID(), 'REAL_HOMES_property_lot_size_postfix', true );
$property_bedrooms   = get_post_meta( get_the_ID(), 'REAL_HOMES_property_bedrooms', true );
$property_bathrooms  = get_post_meta( get_the_ID(), 'REAL_HOMES_property_bathrooms', true );
$property_garage     = get_post_meta( get_the_ID(), 'REAL_HOMES_property_garage', true );
$property_year_built = get_post_meta( get_the_ID(), 'REAL_HOMES_property_year_built', true );

?>

<div class="rh_property__row rh_property__meta_wrap">

	<?php if ( ! empty( $property_bedrooms ) ) : ?>
		<div class="rh_property__meta">
			<h4><?php esc_html_e( 'Bedrooms', 'framework' ); ?></h4>
			<div>
				<?php include INSPIRY_THEME_DIR . '/images/icons/icon-bed.svg'; ?>
				<span class="figure"><?php echo esc_html( $property_bedrooms ); ?></span>
			</div>
		</div>
		<!-- /.rh_property__meta -->
	<?php endif; ?>

	<?php if ( ! empty( $property_bathrooms ) ) : ?>
		<div class="rh_property__meta">
			<h4><?php esc_html_e( 'Bathrooms', 'framework' ); ?></h4>
			<div>
				<?php include INSPIRY_THEME_DIR . '/images/icons/icon-shower.svg'; ?>
				<span class="figure"><?php echo esc_html( $property_bathrooms ); ?></span>
			</div>
		</div>
		<!-- /.rh_property__meta -->
	<?php endif; ?>

	<?php if ( ! empty( $property_garage ) ) : ?>
		<div class="rh_property__meta">
			<h4><?php esc_html_e( 'Garage', 'framework' ); ?></h4>
			<div>
				<?php include INSPIRY_THEME_DIR . '/images/icons/icon-garage.svg'; ?>
				<span class="figure">
					<?php echo esc_html( $property_garage ); ?>
				</span>
			</div>
		</div>
		<!-- /.rh_property__meta -->
	<?php endif; ?>

	<?php if ( ! empty( $property_size ) ) : ?>
		<div class="rh_property__meta">
			<h4><?php esc_html_e( 'Area', 'framework' ); ?></h4>
			<div>
				<?php include INSPIRY_THEME_DIR . '/images/icons/icon-area.svg'; ?>
				<span class="figure">
					<?php echo esc_html( $property_size ); ?>
				</span>
				<?php if ( ! empty( $size_postfix ) ) : ?>
					<span class="label">
						<?php echo esc_html( $size_postfix ); ?>
					</span>
				<?php endif; ?>
			</div>
		</div>
		<!-- /.rh_property__meta -->
	<?php endif; ?>

	<?php if ( ! empty( $property_year_built ) ) : ?>
		<div class="rh_property__meta">
			<h4><?php esc_html_e( 'Year Built', 'framework' ); ?></h4>
			<div>
				<?php include INSPIRY_THEME_DIR . '/images/icons/icon-calendar.svg'; ?>
				<span class="figure">
					<?php echo esc_html( $property_year_built ); ?>
				</span>
			</div>
		</div>
		<!-- /.rh_property__meta -->
	<?php endif; ?>

	<?php if ( ! empty( $lot_size ) ) : ?>
		<div class="rh_property__meta">
			<h4><?php esc_html_e( 'Lot Size', 'framework' ); ?></h4>
			<div>
				<?php include INSPIRY_THEME_DIR . '/images/icons/icon-lot.svg'; ?>
				<span class="figure">
					<?php echo esc_html( $lot_size ); ?>
				</span>
				<?php if ( ! empty( $lot_size_postfix ) ) : ?>
					<span class="label">
						<?php echo esc_html( $lot_size_postfix ); ?>
					</span>
				<?php endif; ?>
			</div>
		</div>
		<!-- /.rh_property__meta -->
	<?php endif; ?>

	<?php
	/**
	 * Custom property fields
	 */
	if ( is_singular( 'property' ) ) {

		$post_meta_data = get_post_custom( get_the_ID() );
		$custom_fields  = apply_filters(
			'inspiry_property_custom_fields', array(
				array(
					'tab'    => array(),
					'fields' => array(),
				),
			)
		);

		if ( isset( $custom_fields['fields'] ) && ! empty( $custom_fields['fields'] ) ) {

			$prefix    = 'REAL_HOMES_';
			$icons_dir = INSPIRY_THEME_DIR . '/icons/';
			$icons_uri = INSPIRY_DIR_URI . '/icons/';

			foreach ( $custom_fields['fields'] as $field ) {

				if ( isset( $field['display'] ) && true === $field['display'] ) {

					$meta_key = $prefix . inspiry_backend_safe_string( $field['name'] );

					if ( isset( $post_meta_data[ $meta_key ] ) && ! empty( $post_meta_data[ $meta_key ][0] ) ) {

						$field_label = ( ! empty( $field['postfix'] ) ) ? $field['postfix'] : '';
						?>
						<div class="rh_property__meta">
							<h4><?php echo esc_html( $field['name'] ); ?></h4>
							<div>
								<?php
								if ( file_exists( $icons_dir . $field['icon'] . '.png' ) ) {

									$data_rjs = ( file_exists( $icons_dir . $field['icon'] . '@2x.png' ) ) ? '2' : '';

									echo '<img src="' . esc_url( $icons_uri . $field['icon'] ) . '.png" alt="icon" data-rjs="' . esc_attr( $data_rjs ) . '">';
								}
								?>

								<span class="figure">
									<?php echo esc_html( $post_meta_data[ $meta_key ][0] ); ?>
								</span>
								<?php if ( ! empty( $field_label ) ) : ?>
									<span class="label">
										<?php echo esc_html( $field_label ); ?>
									</span>
								<?php endif; ?>
							</div>
						</div>
						<!-- /.rh_property__meta -->
						<?php
					}
				}
			}
		}
	}
	?>

</div>
<!-- /.rh_property__row rh_property__meta -->
