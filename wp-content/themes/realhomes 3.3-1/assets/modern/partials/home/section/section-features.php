<?php
/**
 * Section: Features
 *
 * Features section of the homepage.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

global $post;
$inspiry_features = get_post_meta( get_the_ID(), 'inspiry_features', true );

?>

<section class="rh_section rh_section__features">

	<?php
	$inspiry_home_features_subtitle = get_option( 'inspiry_home_features_sub_title' );
	$inspiry_home_features_title 	= get_option( 'inspiry_home_features_title' );
	$inspiry_home_features_desc 	= get_option( 'inspiry_home_features_desc' );
	inspiry_modern_home_heading( $inspiry_home_features_subtitle, $inspiry_home_features_title, $inspiry_home_features_desc );
	?>

	<?php if ( ! empty( $inspiry_features ) ) : ?>

		<div class="rh_section__features_wrap">

			<?php foreach ( $inspiry_features as $inspiry_feature => $feature ) : ?>
				<div class="rh_feature">
					<?php
					$icon_id = $feature[ 'inspiry_feature_icon' ][ 0 ];
					if ( $icon_id ) {
						$icon_url = wp_get_attachment_image_url( $icon_id, 'full' );
						if ( $icon_url ) {
							?>
							<div class="rh_feature__icon">
								<img src="<?php echo esc_url( $icon_url ); ?>" alt="">
							</div>
							<!-- /.rh_feature__icon -->
							<?php
						}
					}
					?>
					<div class="rh_feature__title">
						<h4><?php echo ( isset( $feature['inspiry_feature_name'] ) ) ? esc_html( $feature['inspiry_feature_name'] ) : false; ?></h4>
					</div>
					<!-- /.rh_feature__title -->
					<div class="rh_feature__desc">
						<p><?php echo ( isset( $feature['inspiry_feature_desc'] ) ) ? esc_html( $feature['inspiry_feature_desc'] ) : false; ?></p>
					</div>
					<!-- /.rh_feature__desc -->
				</div>
				<!-- /.rh_feature -->
			<?php endforeach; ?>

		</div>
		<!-- /.rh_section__features_wrap -->

	<?php endif; ?>

</section>
<!-- /.rh_section rh_section__features -->
