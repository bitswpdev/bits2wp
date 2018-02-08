<?php
/**
 * Content Section of homepage.
 *
 * @package    realhomes
 * @subpackage modern
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

// Home properties.
$inspiry_show_home_properties = get_option( 'theme_show_home_properties', 'true' );
$section_class                = ( 'false' === $inspiry_show_home_properties ) ? 'rh_section--content_padding' : false;

if ( get_the_content() && have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
		<section class="rh_section rh_section__content <?php echo esc_attr( $section_class ); ?>">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'rh_content' ); ?>>
				<?php the_content(); ?>
			</article>
		</section>
		<!-- /.rh_section rh_section--props_padding -->
		<?php
	endwhile;
elseif ( 'false' === $inspiry_show_home_properties ) :
	?>
	<section class="rh_section rh_section__content rh_section--content_padding">
		<article class="rh_content">
		</article>
	</section>
	<!-- /.rh_section rh_section--props_padding -->
	<?php
endif;
