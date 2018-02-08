<?php
/**
 * Contains content header for multiple properties pages
 */
?>

<div class="rh_page__head">

	<?php
	/*
	 * list layout header variation
	 */
	$header_variation = get_option( 'inspiry_listing_header_variation' );
	if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) {
		?>
		<h2 class="rh_page__title rh_page__title_pad">
			<?php
			// Display title.
			global $post;
			$page_title = get_the_title( get_the_ID() );
			$page_title = explode( ' ', $page_title, 2 );

			if ( ! empty( $page_title ) && ( 1 < count( $page_title ) ) ) {
				?>
				<span class="sub"><?php echo esc_html( $page_title[0] ); ?></span>
				<span class="title"><?php echo esc_html( $page_title[1] ); ?></span>
				<?php
			} else {
				?>
				<span class="title"><?php echo esc_html( $page_title[0] ); ?></span>
				<?php
			}
			?>
		</h2>
		<!-- /.rh_page__title -->
		<?php
	}
	?>

	<div class="rh_page__controls">
		<?php get_template_part( 'assets/modern/partials/properties/sort-controls' ); ?>
		<?php if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) : ?>
			<?php get_template_part( 'assets/modern/partials/properties/view-buttons' ); ?>
		<?php endif; ?>
	</div>
	<!-- /.rh_page__controls -->

</div>
<!-- /.rh_page__head -->
