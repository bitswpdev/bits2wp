<?php
/**
 * My Properties Page
 *
 * Page template for my properties page.
 *
 * @since 2.7.0
 * @package RH/classic
 */

get_header(); 

if ( isset( $_GET['inactive'] ) ){
    $post_status_list = 'draft';
    $page_title_addon = 'Inactive Businesses';
}else{
    $post_status_list = 'publish';
    $page_title_addon = 'Active Businesses';
}
?>

    <!-- Content -->
    <div class="container contents single my-properties">
        <div class="row">
            <div class="span12 main-wrap">

                <?php
			if ( isset( $_GET['deleted'] ) && ( 1 == intval( $_GET['deleted'] ) ) ) {
				alert( __( 'Success:', 'framework' ), __( 'Property removed.', 'framework' ) );
			} elseif ( isset( $_GET['property-added'] ) && ( true == $_GET['property-added'] ) ) {
				alert( __( 'Success:', 'framework' ), __( 'Property Submitted.', 'framework' ) );
			} elseif ( isset( $_GET['property-updated'] ) && ( true == $_GET['property-updated'] ) ) {
				alert( __( 'Success:', 'framework' ), __( 'Property Updated.', 'framework' ) );
			} elseif ( isset( $_GET['payment'] ) && ( 'paid' == $_GET['payment'] ) ) {
				alert( __( 'Success:', 'framework' ), __( 'Payment Submitted.', 'framework' ) );
			} elseif ( isset( $_GET['payment'] ) && ( 'failed' == $_GET['payment'] ) ) {
				alert( __( 'Error:', 'framework' ), __( 'Payment Failed.', 'framework' ) );
			}

			global $post;
			$title_display = get_post_meta( $post->ID, 'REAL_HOMES_page_title_display', true );
			if ( 'hide' !== $title_display ) {
				?>
                    <h3><span>Barinthesun.com Retail Price List - <?php echo $page_title_addon; ?></span></h3>
                    <p style="padding: 4px;"><a href="/my-properties/" style="color: #000; font-weight: bold;">Active List</a> | <a href="/my-properties/?inactive=true" style="color: #000; font-weight: bold;">Inactive List</a></p>
                    <?php
			}
			?>

                    <!-- Main Content -->
                    <div class="main">

                        <?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();

						if ( ! empty( get_the_content() ) ) {
							?>
                            <div class="inner-wrapper my-properties-wrapper">
                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
                                    <?php the_content(); ?>
                                </article>
                            </div>
                            <!-- /.inner-wrapper -->
                            <?php
						}
					endwhile;
				endif;

				if ( is_user_logged_in() ) {

					global $paged;

					// Get current user.
					$current_user = wp_get_current_user();

					// My properties arguments.
					$my_props_args = array(
						'post_type' => 'property',
						'posts_per_page' => 1000,
						'paged' => $paged,
                        //'post_status' => array( 'pending', 'draft', 'publish', 'future' ),
						'post_status' => array( $post_status_list ),
					);

					$my_properties_query = new WP_Query( $my_props_args );
					if ( $my_properties_query->have_posts() ) :

                    ?>
                                <table width="100%" cellpadding="4" cellspace="0" border="0">
                                    <tr>
                                        <td class="cell bible-cell">
                                            Business Name
                                        </td>
                                        <td class="cell bible-cell">
                                            Rent
                                        </td>
                                        <td class="cell bible-cell">
                                            Advertised Price
                                        </td>
                                        <td class="cell bible-cell">
                                            Owner Name
                                        </td>
                                        <td class="cell bible-cell">
                                            Owner Tel/Mobile
                                        </td>
                                        <td class="cell bible-cell">
                                            Reference
                                        </td>
                                        <td class="cell bible-cell">
                                            Status
                                        </td>
                                    </tr>
                                    <?php

						while ( $my_properties_query->have_posts() ) :

							$my_properties_query->the_post();

							?>
                                        <tr>

                                            <td class="cell bible-cell">
                                                <?php echo get_post_meta($post->ID, 'REAL_HOMES_business_name', true); ?>
                                            </td>

                                            <td class="cell bible-cell">
                                                &euro;
                                                <?php echo get_post_meta($post->ID, 'REAL_HOMES_monthly_rental', true); ?>
                                            </td>

                                            <td class="cell bible-cell">
                                                &euro;
                                                <?php echo get_post_meta($post->ID, 'REAL_HOMES_property_price', true); ?>
                                            </td>

                                            <td class="cell bible-cell">
                                                <?php echo get_post_meta($post->ID, 'REAL_HOMES_owner_name', true); ?>
                                            </td>

                                            <td class="cell bible-cell">
                                                <?php echo get_post_meta($post->ID, 'REAL_HOMES_owner_telephone', true); ?>
                                            </td>

                                            <td class="cell bible-cell">
                                                <?php echo get_post_meta($post->ID, 'REAL_HOMES_reference', true); ?>
                                            </td>
                                            <td class="cell bible-cell" style="color: <?php echo (esc_html( get_post_status() ) == 'publish' ? 'green' : 'red'); ?>;">
                                                <?php echo (esc_html( get_post_status() ) == 'publish' ? 'ACTIVE' : 'INACTIVE'); ?>
                                            </td>
                                        </tr>

                                        <?php

						endwhile;

						wp_reset_postdata();

					else :
						alert( __( 'Note:', 'framework' ), __( 'No Properties Found!', 'framework' ) );
					endif;

					theme_pagination( $my_properties_query->max_num_pages );

				} else {
					alert( __( 'Login Required:', 'framework' ), __( 'Please, Login to view your properties!', 'framework' ) );
				}

				?>
                                </table>

                    </div>
                    <!-- End Main Content -->

            </div>
            <!-- End span12 -->

        </div>
        <!-- End contents row -->

    </div>
    <!-- End Content -->

    <?php get_footer(); ?>
