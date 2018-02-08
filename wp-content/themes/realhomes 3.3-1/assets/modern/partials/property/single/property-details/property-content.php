<?php
/**
 * Single Property: Content
 *
 * Property slider of the single property template.
 *
 * @since   3.0.0
 * @package RH/modern
 */

global $post;

$property_id = get_post_meta( get_the_ID(), 'REAL_HOMES_property_id', true );
$theme_property_detail_variation = get_option( 'theme_property_detail_variation' ); ?>

<div class="rh_property__content">

	<div class="rh_property__row rh_property__meta rh_property--borderBottom">

		<div class="rh_property__id">
			<p class="title"><?php esc_html_e( 'Property ID', 'framework' ); ?> :</p>
			<!-- /.title -->
			<?php if ( ! empty( $property_id ) ) : ?>
				<p class="id">&nbsp;<?php echo esc_html( $property_id ); ?></p>
				<!-- /.id -->
			<?php else : ?>
				<p class="id">&nbsp;<?php esc_html_e( 'None', 'framework' ); ?></p>
				<!-- /.id -->
			<?php endif; ?>
		</div>
		<!-- /.rh_property__id -->

		<div class="rh_property__print">

			<a href="#" class="share" id="social-share">
				<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-share-2.svg' ); ?>
			</a>
			<div id="share-button-title" class="hide"><?php esc_html_e( 'Share', 'framework' ); ?></div>
			<div class="share-this"></div>

			<?php
			$fav_button = get_option( 'theme_enable_fav_button' );
			if ( 'true' === $fav_button ) {
				$property_id = get_the_ID();
				if ( is_added_to_favorite( $property_id ) ) {
					?>
					<span class="favorite-placeholder highlight__red">
						<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-favorite.svg' ); ?>
						<span class="rh_tooltip">
							<p class="label">
								<?php esc_html_e( 'Added to Favorite', 'framework' ); ?>
							</p>
							<!-- /.label -->
						</span>
					</span>
					<?php
				} else {
					?>
					<form action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="post" class="add-to-favorite-form">
						<input type="hidden" name="property_id" value="<?php echo esc_attr( $property_id ); ?>" />
						<input type="hidden" name="action" value="add_to_favorite" />
					</form>
					<span class="favorite-placeholder highlight__red hide">
						<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-favorite.svg' ); ?>
						<span class="rh_tooltip">
							<p class="label">
								<?php esc_html_e( 'Added to Favorite', 'framework' ); ?>
							</p>
							<!-- /.label -->
						</span>
					</span>
					<a href="#" class="favorite add-to-favorite">
						<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-favorite.svg' ); ?>
						<span class="rh_tooltip">
							<p class="label">
								<?php esc_html_e( 'Favorite', 'framework' ); ?>
							</p>
							<!-- /.label -->
						</span>
					</a>
					<?php
				}
			}
			?>

			<a href="javascript:window.print()" class="print">
				<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-printer.svg' ); ?>
				<span class="rh_tooltip">
					<p class="label">
						<?php esc_html_e( 'Print', 'framework' ); ?>
					</p>
				</span>
			</a>
		</div>
		<!-- /.rh_property__print -->

	</div>
	<!-- /.rh_property__wrap -->

	<?php get_template_part( 'assets/modern/partials/property/single/property-details/property', 'meta' ); ?>

	<h4 class="rh_property__heading"><?php esc_html_e( 'Description', 'framework' ); ?></h4>
	<!-- /.rh_property__heading -->

	<div class="rh_content">
		<?php the_content(); ?>
	</div>
	<!-- /.rh_content -->

	<?php get_template_part( 'assets/modern/partials/property/single/property-details/property', 'additional-details' ); ?>

	<?php get_template_part( 'assets/modern/partials/property/single/property-details/property', 'common-note' ); ?>

	<?php get_template_part( 'assets/modern/partials/property/single/property-details/property', 'features' ); ?>

	<?php get_template_part( 'assets/modern/partials/property/single/property-details/property', 'attachments' ); ?>

	<?php get_template_part( 'assets/modern/partials/property/single/property-details/property', 'floor-plans' ); ?>

	<?php get_template_part( 'assets/modern/partials/property/single/property-details/property', 'video' ); ?>

	<?php get_template_part( 'assets/modern/partials/property/single/property-details/property', 'virtual-tour' ); ?>

	<?php get_template_part( 'assets/modern/partials/property/single/property-details/property', 'map' ); ?>

	<?php get_template_part( 'assets/modern/partials/property/single/property-details/property', 'views' ); ?>

	<?php get_template_part( 'assets/modern/partials/property/single/property-details/property', 'children' ); ?>

	<?php if ( 'agent-in-sidebar' !== $theme_property_detail_variation ) : ?>

		<?php get_template_part( 'assets/modern/partials/property/single/property-details/property', 'agent' ); ?>

	<?php endif; ?>

</div>
<!-- /.rh_property__content -->

<?php get_template_part( 'assets/modern/partials/property/single/single', 'similar-properties' ); ?>

<section class="rh_property__comments">
	<?php
	/**
	 * Comments
	 * If comments are open or we have at least one comment, load up the comment template.
	 */
	if ( comments_open() || get_comments_number() ) {
		?>
		<div class="property-comments">
			<?php comments_template(); ?>
		</div>
		<?php
	}
	?>
</section>
<!-- /.rh_property__comments -->
