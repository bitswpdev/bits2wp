<?php
/**
 * Blog Loop File
 *
 * Loop file of blog.
 *
 * @since 	2.7.0
 * @package RH/classic
 */

if ( have_posts() ) :
	while ( have_posts() ) :
	    the_post();
	    get_template_part( 'assets/classic/partials/blog/blog', 'article' );
	endwhile;
	theme_pagination( $wp_query->max_num_pages );
else :
	?><p class="nothing-found"><?php esc_html_e( 'No Posts Found!', 'framework' ); ?></p><?php
endif;
?>
