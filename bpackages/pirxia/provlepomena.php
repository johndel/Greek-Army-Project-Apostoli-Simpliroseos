<?php 
	$sum_quantity = 0;	
	$tmp_index = 0;
	$tmp_max = 0;
	$tmp_max_index = 0;
	$sizes = array();

	    $sizes_query2 = "SELECT * FROM b_sizes WHERE material_id=".$row['id']; 
		$sizes_result2 = mysql_query($sizes_query) or die(mysql_error());	

	while($size_row = mysql_fetch_assoc($sizes_result2)) {
		$provlepomeno_value = round($material_prov_power * $size_row['percentage']/100);
		$sizes[$tmp_index] = $provlepomeno_value;
		
		if($tmp_max <= $provlepomeno_value) {
			$tmp_max_index = $tmp_index;
			$tmp_max = $provlepomeno_value;
		}
		$sum_quantity = $sum_quantity + $provlepomeno_value;
		$tmp_index++;
	}

	// echo $material_prov_power." ".$sum_quantity;
	if($material_prov_power > $sum_quantity) {
	
		$tmp_more_quantity = $material_prov_power - $sum_quantity;
		$sizes[$tmp_max_index] = $sizes[$tmp_max_index] + $tmp_more_quantity;
		$sum_quantity = $sum_quantity + $tmp_more_quantity;
	} elseif($material_prov_power < $sum_quantity) {
		$tmp_more_quantity = $sum_quantity - $material_prov_power;
		$sizes[$tmp_max_index] = $sizes[$tmp_max_index] - $tmp_more_quantity;
		$sum_quantity = $sum_quantity - $tmp_more_quantity;
	}
	// else { echo "fgkl"; }
?>


