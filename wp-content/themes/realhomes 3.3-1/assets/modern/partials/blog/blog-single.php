<?php
/**
 * Single Blog Post
 *
 * Single blog post template.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

get_header();

$header_variation = get_option( 'inspiry_news_header_variation' );

if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/banner', 'header' );
} elseif ( ! empty( $header_variation ) && ( 'banner' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/banner', 'blog-page' );
}

if ( inspiry_show_header_search_form() ) {
	get_template_part( 'assets/modern/partials/property/search/search', 'advance' );
}

?>

<section class="rh_section rh_section--flex rh_wrap--padding rh_wrap--topPadding">

	<div class="rh_page rh_page__listing_page rh_page__news rh_page__main">

		<?php if ( have_posts() ) : ?>

			<div class="rh_blog rh_blog__listing rh_blog__single">

				<?php
				while ( have_posts() ) :
				    the_post();

					$format = get_post_format( get_the_ID() );
			        if ( false === $format ) {
			            $format = 'standard';
			        }

			        // Header margin fix in case of no thumbnail for a blog post.
			        $article_classes = 'rh_blog__post';
			        if ( ! has_post_thumbnail() ) {
			            $article_classes .= ' entry-header-margin-fix';
			        }
			        ?>
			        <article id="post-<?php the_ID(); ?>" <?php post_class( $article_classes ); ?> >

			            <?php
			            // Image, gallery or video based on format.
			            if ( in_array( $format, array( 'standard', 'image', 'gallery', 'video' ), true ) ) :
			                get_template_part( 'assets/modern/partials/blog/post/post-format', $format );
			            endif;
			            ?>

			            <div class="entry-header blog-post-entry-header">
			                <?php
			                // Post title.
			                get_template_part( 'assets/modern/partials/blog/post/post', 'title' );

			                // Post meta.
			                get_template_part( 'assets/modern/partials/blog/post/post', 'meta' );
			                ?>
			            </div>

			            <div class="rh_content entry-content">
			                <?php the_content(); ?>
			            </div>

			        </article>
			        <?php
			        wp_link_pages( array( 'before' => '<div class="rh_pagination__pages-nav">', 'after' => '</div>', 'next_or_number' => 'next' ) );
				endwhile;
				comments_template();
				?>

			</div>
			<!-- /.rh_blog rh_blog__listing -->

		<?php endif; ?>

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
