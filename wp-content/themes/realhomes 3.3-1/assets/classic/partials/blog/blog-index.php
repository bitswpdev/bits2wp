<?php
/**
 * Blog Index File
 *
 * Index file of blog.
 *
 * @since 	2.7.0
 * @package RH/classic
 */

get_header(); ?>

<!-- Page Head -->
<?php get_template_part( 'assets/classic/partials/banners/banner', 'blog-page' ); ?>

<!-- Content -->
<div class="container contents blog-page">
    <div class="row">
        <div class="span9 main-wrap">
            <!-- Main Content -->
            <div class="main">

                <div class="inner-wrapper">
                    <?php get_template_part( 'assets/classic/partials/blog/blog', 'loop' ); ?>
                </div>

            </div><!-- End Main Content -->

        </div> <!-- End span9 -->

        <?php get_sidebar(); ?>

    </div><!-- End contents row -->
</div><!-- End Content -->

<?php get_footer(); ?>
