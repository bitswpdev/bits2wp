<?php
/**
 * Price Range Fields
 */

$inspiry_min_price_label = get_option('inspiry_min_price_label');
$inspiry_max_price_label = get_option('inspiry_max_price_label');

$price_range = '';
if ( isset( $_GET[ 'price-range' ] ) ) {
    $price_range = $_GET[ 'price-range' ];
}
$minimum_price = '';
if ( isset( $_GET[ 'min-price' ] ) ) {
    $minimum_price = doubleval( $_GET[ 'min-price' ] );
}
$maximum_price = '';
if ( isset( $_GET[ 'max-price' ] ) ) {
    $maximum_price = doubleval( $_GET[ 'max-price' ] );
}
$price_range_val_array = array( "0-25000", "25000-50000", "50000-75000", "75000-100000", "100000-150000", "150000-200000", "200000-500000", "500000-99999999" );
$price_range_txt_array = array( "0 - 25k", "25k - 50k", "50k - 75k", "75k - 100k", "100k - 150k", "150k - 200k", "200k - 500k", "500k and more" );
?>
    <div class="option-bar small price-for-others">
        <label for="select-price-range">
		  Price Range
	   </label>
        <span class="selectwrap">
            <select name="price-range" id="select-price-range" class="search-select">                
                <option value="any">Any</option>
                <?php
                for($i = 0; $i < count($price_range_val_array); ++$i) {
                    if ( $price_range == $price_range_val_array[$i] ) {
                        echo '<option value="' . $price_range_val_array[$i] . '" selected="selected">' . $price_range_txt_array[$i] . '</option>';
                    } else {
                        echo '<option value="' . $price_range_val_array[$i] . '">' . $price_range_txt_array[$i] . '</option>';
                    }
                }
                ?>
            </select>
        </span>
    </div>
    <input type="hidden" name="min-price" value="<?php echo $minimum_price ?>" />
    <input type="hidden" name="max-price" value="<?php echo $maximum_price ?>" />
    <script>
        jQuery('#select-price-range').change(function(e) {
            // this function runs when a user selects an option from a <select> element
            var priceRange = jQuery("#select-price-range option:selected").attr('value');
            var prices = priceRange.split("-");
            jQuery('input[name="min-price"]').val(prices[0]);
            jQuery('input[name="max-price"]').val(prices[1]);
        });

    </script>
