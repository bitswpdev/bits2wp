<?php
/**
 * Property Ref Dropdown (Admin Only)
 */
?>
    <div class="option-bar small price-for-others">
        <label for="select-reference-list">
		  Select by Reference
	   </label>
        <span class="selectwrap">
            <!--<select name="reference-list" id="select-reference-list" class="search-select" onchange="location = '/property-search/?keyword='+this.options[this.selectedIndex].value+'&reference-list='+this.options[this.selectedIndex].value+'&sortby=price-asc';">-->
            <select name="reference-list" id="select-reference-list" class="search-select">
                <option value="any">Any</option>
                <?php
                $field_key = "REAL_HOMES_reference";
                $ref_sql = "SELECT DISTINCT pm.meta_value FROM wp_postmeta pm INNER JOIN wp_posts p ON pm.post_id = p.ID INNER JOIN wp_postmeta pm2 ON pm2.post_id = p.ID WHERE pm.meta_key LIKE 'REAL_HOMES_reference' AND p.post_status = 'publish' ORDER BY pm2.meta_value ASC";
                global $wpdb;
                $results = $wpdb->get_results( $ref_sql );
                
                foreach ( $results as $k ) {
                    echo '<option value="' . $k->meta_value . '">' . $k->meta_value . '</option>';
                }
                
                ?>
            </select>
            <script>
               jQuery('#select-reference-list').change(function(e){
                  // this function runs when a user selects an option from a <select> element
                  window.location.href = '/property-search/?keyword='+jQuery("#select-reference-list option:selected").attr('value')+'&reference-list='+jQuery("#select-reference-list option:selected").attr('value')+'&sortby=price-asc';
               });
            </script>
        </span>
    </div>
