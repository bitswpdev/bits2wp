<?php
/**
 * Property: Virtual Tour
 *
 * Virtual tour of the property.
 *
 * @since 	3.0.1
 * @package RH/classic
 */

$inspiry_display_virtual_tour = get_option( 'inspiry_display_virtual_tour' );
if ( 'true' == $inspiry_display_virtual_tour ) {
	$rh_360_virtual_tour = get_post_meta( $post->ID, 'REAL_HOMES_360_virtual_tour', true );

	if ( ! empty( $rh_360_virtual_tour ) ) {
	    ?>
	    <div class="property-virtual-tour">
	        <?php
	        $inspiry_virtual_tour_title = get_option( 'inspiry_virtual_tour_title' );
	        if ( ! empty( $inspiry_virtual_tour_title ) ) {
	            ?><span class="virtual-tour-label"><?php echo esc_html( $inspiry_virtual_tour_title ); ?></span><?php
	        }
	        echo $rh_360_virtual_tour;
	        ?>
	    </div>
	    <?php
	}
}
