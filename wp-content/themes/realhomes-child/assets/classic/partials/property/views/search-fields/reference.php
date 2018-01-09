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
                global $wpdb;
                $results = $wpdb->get_results( 'SELECT DISTINCT meta_value FROM wp_postmeta WHERE meta_key LIKE "'.$field_key.'" ORDER BY meta_value ASC' );
                
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
