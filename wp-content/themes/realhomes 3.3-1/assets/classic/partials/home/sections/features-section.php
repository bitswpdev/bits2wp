<?php
/**
 * Template: `Homepage Features`
 *
 * @package RH/classic
 * @since   2.6.2
 */

/**
 * Features Section Title and Description.
 */
$features_section_title	= get_option( 'inspiry_features_section_title' );
$features_section_desc 	= get_option( 'inspiry_features_section_desc' );

/**
 * First Feature Details
 */
$feature_image_first	= get_option( 'inspiry_first_feature_image' );
$feature_title_first	= get_option( 'inspiry_first_feature_title' );
$feature_desc_first		= get_option( 'inspiry_first_feature_desc' );

/**
 * Second Feature Details
 */
$feature_image_second	= get_option( 'inspiry_second_feature_image' );
$feature_title_second	= get_option( 'inspiry_second_feature_title' );
$feature_desc_second	= get_option( 'inspiry_second_feature_desc' );

/**
 * Third Feature Details
 */
$feature_image_third	= get_option( 'inspiry_third_feature_image' );
$feature_title_third	= get_option( 'inspiry_third_feature_title' );
$feature_desc_third 	= get_option( 'inspiry_third_feature_desc' );

global $inspiry_allowed_tags;

?>

<div class="container">

	<div class="row">

		<div class="span12">

			<div class="main">

				<section class="home-features-section">

					<div class="home-features-bg">

						<div class="headings">

							<?php
							if ( ! empty( $features_section_title ) ) {
								echo '<h2 id="features-title">' . esc_html( $features_section_title ) . '</h2>';
							}
							if ( ! empty( $features_section_desc ) ) {
								echo '<p id="features-desc">' . wp_kses( $features_section_desc, $inspiry_allowed_tags ) . '</p>';
							}
							?>

						</div>
						<!-- /.headings -->

						<div class="features-wrapper clearfix">

							<?php if ( ! empty( $feature_image_first ) || ! empty( $feature_title_first ) || ! empty( $feature_desc_first ) ) : ?>

								<div class="span3 features-single">

									<?php if ( ! empty( $feature_image_first ) ) :  ?>
										<div class="feature-img">
											<img src="<?php echo esc_attr( $feature_image_first ); ?>" alt="" />
										</div>
										<!-- /.feature-img -->
									<?php endif; ?>

									<div class="feature-content">
										<?php
										if ( ! empty( $feature_title_first ) ) {
											echo '<h4>' . esc_html( $feature_title_first ) . '</h4>';
										}
										if ( ! empty( $feature_desc_first ) ) {
											echo '<p>' . wp_kses( $feature_desc_first, $inspiry_allowed_tags ) . '</p>';
										}
										?>
									</div>
									<!-- /.feature-content -->

								</div>
								<!-- /.features-single -->

							<?php endif; ?>

							<?php if ( ! empty( $feature_image_second ) || ! empty( $feature_title_second ) || ! empty( $feature_desc_second ) ) : ?>

								<div class="span3 features-single">

									<?php if ( ! empty( $feature_image_second ) ) :  ?>
										<div class="feature-img">
											<img src="<?php echo esc_attr( $feature_image_second ); ?>" alt="" />
										</div>
										<!-- /.feature-img -->
									<?php endif; ?>

									<div class="feature-content">
										<?php
										if ( ! empty( $feature_title_second ) ) {
											echo '<h4>' . esc_html( $feature_title_second ) . '</h4>';
										}
										if ( ! empty( $feature_desc_second ) ) {
											echo '<p>' . wp_kses( $feature_desc_second, $inspiry_allowed_tags ) . '</p>';
										}
										?>
									</div>
									<!-- /.feature-content -->

								</div>
								<!-- /.features-single -->

							<?php endif; ?>

							<?php if ( ! empty( $feature_image_third ) || ! empty( $feature_title_third ) || ! empty( $feature_desc_third ) ) : ?>

								<div class="span3 features-single">

									<?php if ( ! empty( $feature_image_third ) ) :  ?>
										<div class="feature-img">
											<img src="<?php echo esc_attr( $feature_image_third ); ?>" alt="" />
										</div>
									<?php endif; ?>
									<!-- /.feature-img -->
									<div class="feature-content">
										<?php
										if ( ! empty( $feature_title_third ) ) {
											echo '<h4>' . esc_html( $feature_title_third ) . '</h4>';
										}
										if ( ! empty( $feature_desc_third ) ) {
											echo '<p>' . wp_kses( $feature_desc_third, $inspiry_allowed_tags ) . '</p>';
										}
										?>
									</div>
									<!-- /.feature-content -->

								</div>
								<!-- /.features-single -->

							<?php endif; ?>

						</div>
						<!-- /.features-wrapper -->

					</div>
					<!-- /.home-features-bg -->

				</section>
				<!-- /.home-features-section -->

			</div>
			<!-- /.main -->

		</div>
		<!-- /.span12 -->

	</div>
	<!-- /.row -->

</div>
<!-- /.container -->
