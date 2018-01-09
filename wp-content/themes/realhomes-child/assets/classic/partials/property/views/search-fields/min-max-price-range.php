<?php
/**
 * Price Range Fields
 */

$inspiry_min_price_label = get_option('inspiry_min_price_label');
$inspiry_max_price_label = get_option('inspiry_max_price_label');
?>
    <div class="option-bar small price-for-others">
        <label for="select-price-range">
		  Price Range
	   </label>
        <span class="selectwrap">
            <select name="price-range" id="select-price-range" class="search-select">                
                <option value="any">Any</option>
                <option value="2">25k - 50k</option>
                <option value="3">50k - 75k</option>
                <option value="4">75k - 100k</option>
                <option value="5">100k - 150k</option>
                <option value="6">150k - 200k</option>
                <option value="7">200K - 500k</option>
                <option value="8">500k - And More</option>
            </select>
        </span>
    </div>
