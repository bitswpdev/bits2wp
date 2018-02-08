<?php
/**
 * Footer template
 *
 * @package realhomes
 * @subpackage modern
 */

?>

<footer class="rh_footer <?php echo ( ! is_page_template( 'templates/home.php' ) ) ? 'rh_footer__before_fix' : false; ?>">

	<div class="rh_footer__wrap rh_footer--alignCenter rh_footer--paddingBottom">

		<div class="rh_footer__logo">
			<?php
			$logo_enabled = get_option( 'inspiry_enable_footer_logo', 'true' );
			$logo_path    = get_option( 'inspiry_footer_logo' );
			if ( 'true' === $logo_enabled && ! empty( $logo_path ) ) {
				?>
				<a title="<?php bloginfo( 'name' ); ?>" href="<?php echo esc_url( home_url() ); ?>">
					<img src="<?php echo esc_url( $logo_path ); ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>
				<?php
			} elseif ( 'true' === $logo_enabled ) {
				?>
				<h2 class="rh_footer__heading">
					<a href="<?php echo esc_url( home_url() ); ?>"  title="<?php bloginfo( 'name' ); ?>">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h2>
				<?php
			}
			$desc_enabled = get_option( 'inspiry_enable_footer_tagline', 'true' );
			$description  = get_option( 'inspiry_footer_tagline' );
			if ( 'true' === $desc_enabled && $description ) {
				echo '<p class="tag-line"><span class="separator">/</span><span class="text">';
					echo esc_html( $description );
				echo '</span></p>';
			}
			?>
		</div>
		<!-- /.rh_footer__logo -->

		<div class="rh_footer__social">
			<?php
			$show_social_menu = get_option( 'theme_show_social_menu' );
			if ( ! empty( $show_social_menu ) && 'true' === $show_social_menu ) {
				get_template_part( 'assets/modern/partials/footer/social-nav' );
			}
			?>
		</div>
		<!-- /.rh_footer__social -->

	</div>
	<!-- /.rh_footer__wrap -->

	<div class="rh_footer__wrap rh_footer--alignTop rh_footer--paddingBottom">

		<div class="rh_footer__widgets">
			<?php get_template_part( 'assets/modern/partials/footer/first-column' ); ?>
		</div>
		<!-- /.rh_footer__widgets -->

		<div class="rh_footer__widgets">
			<?php get_template_part( 'assets/modern/partials/footer/second-column' ); ?>
		</div>
		<!-- /.rh_footer__widgets -->

		<div class="rh_footer__widgets">
			<?php get_template_part( 'assets/modern/partials/footer/third-column' ); ?>
		</div>
		<!-- /.rh_footer__widgets -->

	</div>
	<!-- /.rh_footer__wrap -->

	<div class="rh_footer__wrap rh_footer--space_between">
		<p class="copyrights">
			<?php
			$copyrights = get_option( 'theme_copyright_text' );
			echo ( ! empty( $copyrights ) ) ? $copyrights : false;
			?>
		</p>
		<!-- /.copyrights -->

		<p class="designed-by">
			<?php
			$designed_by = get_option( 'theme_designed_by_text' );
			echo ( ! empty( $designed_by ) ) ? $designed_by : false;
			?>
		</p>
		<!-- /.copyrights -->
	</div>
	<!-- /.rh_footer__wrap -->

</footer>
<!-- /.rh_footer -->

<?php
/**
 * Display link to previous and next entry
 */
inspiry_post_nav();
?>

</div>
<!-- /.rh_wrap -->
