<?php
/**
 * Fullwidth Page Template
 *
 * Page template of full width.
 *
 * @since 	2.7.0
 * @package RH/classic
 */

get_header();
?>

<!-- Page Head -->
<?php get_template_part( 'assets/classic/partials/banners/banner', 'default' ); ?>

<!-- Content -->
<div class="container contents single">
    <div class="row">
        <div class="span12 main-wrap">
            <!-- Main Content -->
            <div class="main">

                <div class="inner-wrapper">
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) :
                            the_post();
                            ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
                                    <?php
                                    $title_display = get_post_meta( $post->ID, 'REAL_HOMES_page_title_display', true );
                                    if ( 'hide' !== $title_display ) {
                                        ?>
                                        <h3 class="post-title"><?php the_title(); ?></h3>
                                        <hr/>
                                        <?php
                                    }

                                    the_content();

                                    // WordPress Link Pages.
                                    wp_link_pages( array( 'before' => '<div class="pages-nav clearfix">', 'after' => '</div>', 'next_or_number' => 'next' ) );
                                    ?>
                            </article>
                            <?php
                        endwhile;
                        comments_template();
                    endif;
                    ?>
                </div>

            </div><!-- End Main Content -->

        </div> <!-- End span12 -->

    </div><!-- End contents row -->

</div><!-- End Content -->

<?php get_footer(); ?>
