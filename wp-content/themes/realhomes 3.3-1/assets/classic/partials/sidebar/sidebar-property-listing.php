<?php
/**
 * Sidebar: Property Listing
 *
 * @since 1.0.0
 * @package RH/classic
 */

?>

<div class="span3 sidebar-wrap">

    <!-- Sidebar -->
    <aside class="sidebar">
        <?php
        if ( ! dynamic_sidebar( 'property-listing-sidebar' ) ) :
        endif;
        ?>
    </aside>
    <!-- End Sidebar -->

</div>
