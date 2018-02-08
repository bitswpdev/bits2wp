<?php
/**
 * Sidebar: dsIDX
 *
 * @since 1.0.0
 * @package RH/classic
 */

?>

<div class="span3 sidebar-wrap">

    <!-- Sidebar -->
    <aside id="dsidx-sidebar" class="sidebar">
        <?php
        if ( ! dynamic_sidebar( 'dsidx-sidebar' ) ) :
        endif;
        ?>
    </aside><!-- End Sidebar -->

</div>
