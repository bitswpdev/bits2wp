<?php
/**
 * Blog: Index Template
 *
 * @package  realhomes
 * @subpackage modern
 */

global $post;

get_header();

$header_variation = get_option( 'inspiry_news_header_variation' );

if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/header' );
} elseif ( ! empty( $header_variation ) && ( 'banner' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/blog' );
}

if ( inspiry_show_header_search_form() ) {
	get_template_part( 'assets/modern/partials/properties/search/advance' );
}

?>

	<section class="rh_section rh_section--flex rh_wrap--padding rh_wrap--topPadding">

		<div class="rh_page rh_page__listing_page rh_page__news rh_page__main">

			<?php if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) : ?>
				<div class="rh_page__head">

					<h2 class="rh_page__title">
						<?php
						$banner_title = get_option( 'theme_news_banner_title' );
						$banner_title = empty( $banner_title ) ? esc_html__( 'News', 'framework' ) : $banner_title;

						$banner_title = explode( ' ', $banner_title, 2 );

						if ( ! empty( $banner_title ) && ( 1 < count( $banner_title ) ) ) {
							?>
							<span class="sub"><?php echo esc_html( $banner_title[0] ); ?></span>
							<span class="title"><?php echo esc_html( $banner_title[1] ); ?></span>
							<?php
						} else {
							?>
							<span class="title"><?php echo esc_html( $banner_title[0] ); ?></span>
							<?php
						}
						?>
					</h2>
					<!-- /.rh_page__title -->

				</div>
				<!-- /.rh_page__head -->
			<?php endif; ?>

			<?php get_template_part( 'assets/modern/partials/blog/loop' ); ?>

		</div>
		<!-- /.rh_page rh_page__main -->

		<div class="rh_page rh_page__sidebar">
			<?php get_sidebar(); ?>
		</div>
		<!-- /.rh_page rh_page__sidebar -->

	</section>
	<!-- /.rh_section rh_wrap rh_wrap--padding -->

<?php
get_footer();
