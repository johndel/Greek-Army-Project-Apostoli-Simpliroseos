<?php 
error_reporting(E_ERROR);

function select_table($pinakas) {
	$function_query = "SELECT * FROM $pinakas";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}

function select_ordered_table($pinakas, $order) {
	$function_query = "SELECT * FROM $pinakas ORDER BY $order";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}

function select_one_table($pinakas) {
	$function_query = "SELECT * FROM `$pinakas`;";
	$metavliti = mysql_query($function_query);
	/*$pinakas = array();
	while($tmp = mysql_fetch_assoc($metavliti)) {
		$pinakas[] = $tmp;
	}*/
	return $metavliti;
}

function select_record($pinakas, $id) {
	$function_query = "SELECT * FROM $pinakas WHERE id=$id";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	return $tmp;
}

function select_record_column($pinakas, $id, $column) {
	$function_query = "SELECT $column FROM $pinakas WHERE id=$id";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	return $tmp;
}

function select_warehouse($material_type, $material_id) {
	$function_query = "SELECT name FROM warehouses, warehouse_material_mappings WHERE warehouse_material_mappings.material_type = $material_type AND warehouse_material_mappings.material_id = $material_id AND warehouse_material_mappings.warehouse_id = warehouses.id";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	return $tmp[0];
}

function check_size($letter, $material_id) {
	$function_query = "SELECT * FROM ".$letter."_sizes WHERE material_id = $material_id LIMIT 1";
	$material_tmp = mysql_query($function_query);
	$material = mysql_fetch_row($material_tmp);
	if(is_array($material)) {
		return $material;
	} else {
		return false;
	}
}

function select_all_records($pinakas, $column, $id) {
	$function_query = "SELECT * FROM $pinakas WHERE $column=$id";
	$metavliti = mysql_query($function_query);
	$pinakas = array();
	while($tmp = mysql_fetch_assoc($metavliti)) {
		$pinakas[] = $tmp;
	}
	return $pinakas;
}

function select_all_records_a_order($pinakas, $column, $id) {
	$function_query = "SELECT * FROM $pinakas WHERE $column=$id order by id in (30, 31) desc, id asc";
	$metavliti = mysql_query($function_query);
	$pinakas = array();
	while($tmp = mysql_fetch_assoc($metavliti)) {
		$pinakas[] = $tmp;
	}
	return $pinakas;
}

function select_a_materials_no_size() {
	$function_query = "SELECT * FROM `a_materials` WHERE id != 30 AND id != 31 ORDER BY `a_materials`.`name`";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}

function select_a_materials_size() {
	$function_query = "SELECT * FROM `a_materials` WHERE id = 30 OR id = 31 ORDER BY `a_materials`.`name`";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}

function select_b_materials_no_size() {
	$function_query = "SELECT * FROM `b_materials` WHERE id = 7 OR id = 9 ORDER BY `b_materials`.`name`";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}

function select_b_materials_simple_size() {
	$function_query = "SELECT * FROM `b_materials` WHERE id = 1 OR id = 2 OR id = 3 OR id = 8 OR id = 12 ORDER BY `b_materials`.`name`";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}

function select_b_materials_multiple_size() {
	$function_query = "SELECT * FROM `b_materials` WHERE id = 4 OR id = 5 OR id = 6 OR id = 10 OR id = 11 OR id = 13 ORDER BY `b_materials`.`name`";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}

function select_atable_package_id($id) {
	$function_query = "SELECT * FROM `a_packages` INNER JOIN `subunits` WHERE `subunits`.`id`=`a_packages`.`subunit_id` AND `a_packages`.`id`=$id";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_assoc($metavliti);
	return $tmp;
	}
	
function select_btable_package_id($id) {
	$function_query = "SELECT * FROM `b_packages` INNER JOIN `subunits` WHERE `subunits`.`id`=`b_packages`.`subunit_id` AND `b_packages`.`id`=$id";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_assoc($metavliti);
	return $tmp;
	}
	
function select_atable_material_size($material_id, $package_id) {
	$function_query = "SELECT size FROM `a_materials_packages` WHERE `material_id` = $material_id AND `package_id` = $package_id";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	$second_query = "SELECT size FROM `a_sizes` WHERE id = $tmp[0]";
	$metavliti2 = mysql_query($second_query);
	$tmp2 = mysql_fetch_row($metavliti2);
	return $tmp2;
}

function select_btable_material_size($material_id, $package_id) {
	$function_query = "SELECT size_id FROM `b_materials_packages` WHERE `material_id` = $material_id AND `package_id` = $package_id";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	$second_query = "SELECT size_id FROM `b_sizes` WHERE id = $tmp[0]";
	$metavliti2 = mysql_query($second_query);
	$tmp2 = mysql_fetch_row($metavliti2);
	return $tmp2;
}

	
function select_package_id($id) {
	$function_query = "SELECT * FROM `oplismou_packages` INNER JOIN `subunits` WHERE `subunits`.`id`=`oplismou_packages`.`subunit_id` AND `oplismou_packages`.`id`=$id";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_assoc($metavliti);
	return $tmp;
	}
	
/*function materials($id) {
	$function_query = "SELECT * FROM $pinakas";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}*/

function count_op_mat_quantity_per_subunit($mat_id, $subunit_id) {
	$function_query = "SELECT SUM(quantity) FROM `oplismou_materials`, `oplismou_packages`, `oplismou_materials_packages` WHERE `oplismou_materials`.`id` = $mat_id AND 
`oplismou_materials`.`id` = `oplismou_materials_packages`.`material_id` AND `oplismou_materials_packages`.`package_id` = `oplismou_packages`.`id` AND 
`oplismou_packages`.`subunit_id` = $subunit_id";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	if (is_numeric($tmp[0])) {
		return $tmp[0]; 
	} else { return "0";
	}
}

function count_op_mat_quantity_pirinwn($mat_id) {
	$function_query = "SELECT SUM(quantity) FROM `oplismou_materials`, `oplismou_packages`, `oplismou_materials_packages` WHERE `oplismou_materials`.`id` = $mat_id AND 
`oplismou_materials`.`id` = `oplismou_materials_packages`.`material_id` AND `oplismou_materials_packages`.`package_id` = `oplismou_packages`.`id` AND 
(`oplismou_packages`.`subunit_id` = 2 OR `oplismou_packages`.`subunit_id` = 4 OR `oplismou_packages`.`subunit_id` = 6 OR `oplismou_packages`.`subunit_id` = 8 OR `oplismou_packages`.`subunit_id` = 10)";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	if (is_numeric($tmp[0])) {
		return $tmp[0]; 
	} else { return "0"; }
}

function count_sum_a_materials2($mat_id, $efedroi) {
	$function_query = "SELECT SUM(quantity) FROM `a_materials_packages` WHERE `material_id`= ".$mat_id;
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	
	$function_query2 = "SELECT COUNT(*) FROM `a_packages`";
	$metavliti2 = mysql_query($function_query2);
	$tmp2 = mysql_fetch_row($metavliti2);

	$function_query3 = "SELECT * FROM `a_materials_packages`, `a_packages` WHERE `a_materials_packages`.`package_id` = `a_packages`.`id` AND `a_packages`.`subunit_id` = 11 GROUP by `a_packages`.`number`";
	$metavliti3 = mysql_query($function_query3);
	$row_number = mysql_num_rows($metavliti3);
	
	$material_query = "SELECT * FROM `a_materials` WHERE id = $mat_id";
	$material = mysql_fetch_assoc(mysql_query($material_query));
	
	if($efedroi == 1) {
		$function_query4 = "SELECT provlepomeni_dinami FROM subunits WHERE id = 11";
		$tmp4 = mysql_query($function_query4);
		$efedroi = mysql_fetch_row($tmp4);
	} 
	
	if($mat_id != 30 && $mat_id != 31) {
		if($material['quantity'] < 1) { return $tmp2[0] * 1 - $tmp[0]; }
		else { return $efedroi[0]*2 + $tmp2[0]*$material['quantity'] - $tmp[0] - $row_number * $material['quantity']; }
	} else {
		if (is_numeric($tmp[0])) {
			return $tmp[0]; 
		} else { return "0";
		}
	}
}







function count_sum_a_materials($mat_id) {
	$function_query = "SELECT SUM(quantity) FROM `a_materials_packages` WHERE `material_id`= ".$mat_id;
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	
	$function_query2 = "SELECT COUNT(*) FROM `a_packages`";
	$metavliti2 = mysql_query($function_query2);
	$tmp2 = mysql_fetch_row($metavliti2);

	$function_query3 = "SELECT * FROM `a_materials_packages`, `a_packages` WHERE `a_materials_packages`.`package_id` = `a_packages`.`id` AND `a_packages`.`subunit_id` = 11 GROUP by `a_packages`.`number`";
	$metavliti3 = mysql_query($function_query3);
	$row_number = mysql_num_rows($metavliti3);
	
	$material_query = "SELECT * FROM `a_materials` WHERE id = $mat_id";
	$material = mysql_fetch_assoc(mysql_query($material_query));
	

	$efedroi_query = "SELECT * FROM `a_materials` WHERE `id` = ".$mat_id;
	$efedroi_tmp = mysql_query($efedroi_query); 
	$efedroi_row = mysql_fetch_row($efedroi_tmp);
	
	$efedroi = $efedroi_row[3];
	
	if(isset($efedroi_test) && $efedroi_test == 1) {
		$function_query4 = "SELECT provlepomeni_dinami FROM subunits WHERE id = 11";
		$tmp4 = mysql_query($function_query4);
		$efedroi = mysql_fetch_row($tmp4);
	} 
	
	if($mat_id != 30 && $mat_id != 31) {
		if($material['quantity'] < 1) { return $tmp2[0] * 1 - $tmp[0]; }
		else { return $efedroi[0]*2 + $tmp2[0]*$material['quantity'] - $tmp[0] - $row_number * $material['quantity']; }
	} else {
		if (is_numeric($tmp[0])) {
			return $tmp[0]; 
		} else { return "0";
		}
	}
}













function count_subunit_a_materials($mat_id, $subunit_id) {
	$function_query = "SELECT SUM(quantity) FROM `a_materials_packages`, `a_packages` WHERE `a_materials_packages`.`material_id`= $mat_id AND `a_packages`.`subunit_id` = $subunit_id AND `a_packages`.`id` = `a_materials_packages`.`package_id`";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	
	$function_query2 = "SELECT COUNT(*) FROM `a_packages` WHERE `subunit_id` = $subunit_id";
	$metavliti2 = mysql_query($function_query2);
	$tmp2 = mysql_fetch_row($metavliti2);
	
	$material_query = "SELECT * FROM `a_materials` WHERE id = $mat_id";
	$material = mysql_fetch_assoc(mysql_query($material_query));
	
	if($mat_id != 30 && $mat_id != 31 && $material['quantity'] >= 1) {
		return $tmp2[0]*$material['quantity'] - $tmp[0];
	} else {
		if (is_numeric($tmp[0])) {
			return $tmp[0]; 
		} else { return "0";
		}
	}
}


function calculate_sum_a_materials($mat_id) {
	$function_query = "SELECT SUM(quantity) FROM `a_materials_packages` WHERE `material_id`= ".$mat_id;
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	
	$function_query2 = "SELECT COUNT(*) FROM `a_packages`";
	$metavliti2 = mysql_query($function_query2);
	$tmp2 = mysql_fetch_row($metavliti2);
	
	$material_query = "SELECT * FROM `a_materials` WHERE id = $mat_id";
	$material = mysql_fetch_assoc(mysql_query($material_query));
	
	if($mat_id != 30 && $mat_id != 31 && $material['quantity'] >= 1) {
		return $tmp2[0]*$material['quantity'] - $tmp[0];
	} else {
		if (is_numeric($tmp[0])) {
			return $tmp[0]; 
		} else { return "0";
		}
	}
}

function get_quantity_type($material_type, $mat_id) {
	$function_query = "SELECT quantity_type from `".$material_type."_materials` WHERE `id`= ".$mat_id;
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	
	$function_query2 = "SELECT name from `quantity_type` WHERE `id` = ".$tmp[0];
	$metavliti2 = mysql_query($function_query2);
	$tmp2 = mysql_fetch_row($metavliti2);
	return $tmp2[0]; 
}

function count_sum_b_materials($mat_id) {
	$function_query = "SELECT SUM(quantity) FROM `b_materials_packages` WHERE `material_id`=".$mat_id;
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);

	
	$function_query_efedroi1 = "SELECT * FROM b_materials WHERE id =".$mat_id;
	$tmp_metavliti_efedroi1 = mysql_query($function_query_efedroi1);
	$metavliti_efedroi1 = mysql_fetch_row($tmp_metavliti_efedroi1);
	
	if($metavliti_efedroi1[3] == 1) { 
		$function_efedroi_query4 = "SELECT provlepomeni_dinami FROM subunits WHERE id = 11";
		$tmp_efedroi4 = mysql_query($function_efedroi_query4);
		$efedroi = mysql_fetch_row($tmp_efedroi4);
		
		if($metavliti_efedroi1[2] > 1) {
			$meion_efedroi = $efedroi[0] * $metavliti_efedroi1[2] - $efedroi[0];
		}
	}
	
	if (is_numeric($tmp[0])) {
		//return $efedroi[0];
		return $tmp[0]; 
	} else { return "0";
	}
}

function select_all_packages() {
	$function_query = "(SELECT *, 'a' as package_letter FROM `a_packages`) UNION (SELECT *, 'b' as package_letter FROM `b_packages`) ORDER BY `number` ASC";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}

function select_next_packages($start_id) {
	$function_query = "(SELECT *, 'a' as package_letter FROM `a_packages`) UNION (SELECT *, 'b' as package_letter FROM `b_packages`) ORDER BY `number` ASC LIMIT 7 OFFSET $start_id";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}

function find_subunit($start_id) {
	$function_query = "SELECT * FROM subunits WHERE start_package <= $start_id AND end_package >= $start_id";
	return $metavliti = mysql_fetch_assoc(mysql_query($function_query));
}

function material_count($package_id, $package_letter) {
	$function_query = "SELECT COUNT(*) FROM `".$package_letter."_materials_packages` WHERE package_id =".$package_id.";";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	return $tmp[0];
}

function iparxonta_b_packages($material_id, $size_id) {
	$function_query = "SELECT `subunits`.`subunits`, `b_packages`.`id`, `b_packages`.`number` , `b_materials_packages`.`quantity` FROM `subunits`, `b_materials_packages` , `b_packages` WHERE `material_id` =".$material_id." AND `size_id` =".$size_id." AND `b_packages`.`id` = `b_materials_packages`.`package_id` AND `b_packages`.`subunit_id` = `subunits`.`id` ORDER BY `b_packages`.`number` ";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}

function iparxonta_b_packages_subunit($material_id, $size_id, $subunit_id) {
	$function_query = "SELECT `subunits`.`subunits`, `b_packages`.`id`, `b_packages`.`number` , `b_materials_packages`.`quantity` FROM `subunits`, `b_materials_packages` , `b_packages` WHERE `material_id` =".$material_id." AND `size_id` =".$size_id." AND `b_packages`.`id` = `b_materials_packages`.`package_id` AND `b_packages`.`subunit_id` = `subunits`.`id` AND `subunits`.`id`=".$subunit_id." ORDER BY `b_packages`.`number` ";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}


function iparxonta_b_packages_no_size($material_id) {
	$function_query = "SELECT `subunits`.`subunits`, `b_packages`.`id`, `b_packages`.`number` , `b_materials_packages`.`quantity` FROM `subunits`, `b_materials_packages` , `b_packages` WHERE `material_id` =".$material_id." AND `b_packages`.`id` = `b_materials_packages`.`package_id` AND `b_packages`.`subunit_id` = `subunits`.`id` ORDER BY `b_packages`.`number` ";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}

function iparxonta_b_packages_no_size_subunit($material_id, $subunit_id) {
	$function_query = "SELECT `subunits`.`subunits`, `b_packages`.`id`, `b_packages`.`number` , `b_materials_packages`.`quantity` FROM `subunits`, `b_materials_packages` , `b_packages` WHERE `material_id` =".$material_id." AND `b_packages`.`id` = `b_materials_packages`.`package_id` AND `b_packages`.`subunit_id` = `subunits`.`id` AND `subunits`.`id`=".$subunit_id." ORDER BY `b_packages`.`number` ";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}

function iparxonta_a_packages($material_id, $size_id) {
	$function_query = "SELECT `subunits`.`subunits`, `a_packages`.`id`, `a_packages`.`number` , `a_materials_packages`.`quantity` FROM `subunits`, `a_materials_packages` , `a_packages` WHERE `material_id` =".$material_id." AND `size` =".$size_id." AND `a_packages`.`id` = `a_materials_packages`.`package_id` AND `a_packages`.`subunit_id` = `subunits`.`id` ORDER BY `a_packages`.`number`";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}

function iparxonta_a_packages_subunit($material_id, $size_id, $subunit_id) {
	if($size_id == "all") {
		$function_query = "SELECT `subunits`.`subunits` , `a_packages`.`id` , `a_packages`.`number` , `a_materials_packages`.`quantity` FROM `subunits` , `a_materials_packages` , `a_packages` WHERE `material_id` =".$material_id." AND `a_packages`.`id` = `a_materials_packages`.`package_id` AND `a_packages`.`subunit_id` = `subunits`.`id` AND `subunits`.`id` =".$subunit_id." ORDER BY `a_packages`.`number`;";
	} else {
		$function_query = "SELECT `subunits`.`subunits` , `a_packages`.`id` , `a_packages`.`number` , `a_materials_packages`.`quantity` FROM `subunits` , `a_materials_packages` , `a_packages` WHERE `material_id` =".$material_id." AND `size` =".$size_id." AND `a_packages`.`id` = `a_materials_packages`.`package_id` AND `a_packages`.`subunit_id` = `subunits`.`id` AND `subunits`.`id` =".$subunit_id." ORDER BY `a_packages`.`number`;";
	}
	$metavliti = mysql_query($function_query);
	return $metavliti;	
}

function iparxonta_a_packages_no_size($material_id) {
	$function_query = "SELECT `subunits`.`subunits`, `a_packages`.`id`, `a_packages`.`number` , `a_materials_packages`.`quantity` FROM `subunits`, `a_materials_packages` , `a_packages` WHERE `material_id` =".$material_id." AND `a_packages`.`id` = `a_materials_packages`.`package_id` AND `a_packages`.`subunit_id` = `subunits`.`id` ORDER BY `a_packages`.`number`";
	$metavliti = mysql_query($function_query);
	return $metavliti;
}


function select_materials_by_package($package_id, $package_letter) {
	if($package_letter == "a") 	   { $package = "a_packages"; } 
	elseif($package_letter == "b") { $package = "b_packages"; }
	
	$function_query = "SELECT * FROM ".$package."";
}

function all_package_material($package_id, $package_letter) {
	if($package_letter == "a") { $function_query = "SELECT `".$package_letter."_materials`.`name`, `".$package_letter."_materials_packages`.`quantity`, `".$package_letter."_sizes`.`size` as `size`, `".$package_letter."_materials`.`id` as material_id FROM `".$package_letter."_materials`, `".$package_letter."_materials_packages`, `".$package_letter."_sizes`  WHERE `".$package_letter."_materials_packages`.`package_id` = ".$package_id." AND `".$package_letter."_materials`.`id` = `".$package_letter."_materials_packages`.`material_id` AND `".$package_letter."_materials_packages`.`size` = `".$package_letter."_sizes`.`id` ORDER BY `".$package_letter."_materials`.`name`;";
	} else { $function_query = "SELECT `".$package_letter."_materials`.`name`, `".$package_letter."_materials_packages`.`quantity`, `".$package_letter."_sizes`.`size_id` as `size`, `".$package_letter."_materials`.`id` as material_id FROM `".$package_letter."_materials`, `".$package_letter."_materials_packages`, `".$package_letter."_sizes`  WHERE `".$package_letter."_materials_packages`.`package_id` = ".$package_id." AND `".$package_letter."_materials`.`id` = `".$package_letter."_materials_packages`.`material_id` AND `".$package_letter."_materials_packages`.`size_id` = `".$package_letter."_sizes`.`id` ORDER BY `".$package_letter."_materials`.`name`;"; }	

	$metavliti = mysql_query($function_query);
	while($material_array = mysql_fetch_assoc($metavliti)) {
		$pinakas[] = $material_array;
	}
	return $pinakas;
	//return $function_query;
}

function smallsubunit($subunit) {
	if($subunit == "ΠΥΡΧΙΑ ΔΚΣΕΩΣ") {
		return "Π/Δ";
	}elseif($subunit == "ΠΥΡΧΙΑ ΔΚΣΕΩΣ ΠΥΡΗΝΕΣ") {
		return "Π/Δ ΠΥΡΗΝΕΣ";
	} else {
		return $subunit;
	}
	
}

function check_material_sizes($material_id, $table) {
	$function_query = "SELECT * FROM ".$table."_sizes WHERE material_id=".$material_id;
	$metavliti = mysql_query($function_query);
	$rows = mysql_num_rows($metavliti);
	if($rows > 0) {
		$metavliti = "true";
	} else { $metavliti = "false"; }
	return $metavliti;
}

function all_subunits() {
	$function_query = "SELECT `provlepomeni_dinami` FROM `subunits` WHERE id = 1 OR id = 3 OR id = 5 OR id = 7 OR id = 9";
	$metavliti = mysql_query($function_query);
	while($tmp = mysql_fetch_assoc($metavliti)) {
		$subunits_power = $subunits_power + $tmp["provlepomeni_dinami"];
	}
	return $subunits_power;
}

function all_pirines() {
	$function_query = "SELECT `provlepomeni_dinami` FROM `subunits` WHERE id = 2 OR id = 4 OR id = 6 OR id = 8 OR id = 10";
	$metavliti = mysql_query($function_query);
	while($tmp = mysql_fetch_assoc($metavliti)) {
		$pirines_power = $pirines_power + $tmp["provlepomeni_dinami"];
	}
	return $pirines_power;
}

function anapliromatikoi() {
	$function_query = "SELECT `provlepomeni_dinami` FROM `subunits` WHERE id = 11";
	$metavliti = mysql_query($function_query);
	return mysql_fetch_assoc($metavliti);
}

function select_dinami_oplismou_ana_pirxia($material_id, $subunit_id) {
	$function_query = "SELECT `quantity` FROM `dinami_oplismou` WHERE `subunit_id` = $subunit_id AND `oplismou_materials_id` = $material_id";
	$metavliti = mysql_query($function_query);
	$power = mysql_fetch_row($metavliti);
	return $power[0];
}

function select_dinami_oplismou_sum($material_id) {
	$function_query = "SELECT SUM(`quantity`) FROM `dinami_oplismou` WHERE `oplismou_materials_id` = $material_id";
	$metavliti = mysql_query($function_query);
	$power = mysql_fetch_row($metavliti);
	return $power[0];
}

function select_a_material_sum_ana_pirxia($material_id, $subunit_id) {
	$function_query = "SELECT SUM(`a_materials_packages`.`quantity` ) FROM `a_materials`, `a_packages`, `a_materials_packages` WHERE `a_materials`.`id` = $material_id AND 
`a_materials`.`id` = `a_materials_packages`.`material_id` AND `a_materials_packages`.`package_id` = `a_packages`.`id` AND 
`a_packages`.`subunit_id` = $subunit_id";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	
	$function_query2 = "SELECT COUNT(*) FROM `a_packages` WHERE subunit_id = $subunit_id";
	$metavliti2 = mysql_query($function_query2);
	$tmp2 = mysql_fetch_row($metavliti2);
	
	$material_query = "SELECT * FROM `a_materials` WHERE id = $material_id";
	$material = mysql_fetch_assoc(mysql_query($material_query));
	
	
	if($material_id != 30 && $material_id != 31 ) {
		if(is_numeric($tmp2[0])) {
			if($material['quantity'] < 1) { return $tmp2[0] * 1 - $tmp[0]; } 
			else { return $tmp2[0] * $material['quantity'] - $tmp[0]; }		
		}
	} else {
		if (is_numeric($tmp[0])) {
			return $tmp[0]; 
		} else { return "0"; }
	}
}

function select_a_material_efedroi($material_id, $subunit_id) {
	$function_query = "SELECT SUM(`a_materials_packages`.`quantity` ) FROM `a_materials`, `a_packages`, `a_materials_packages` WHERE `a_materials`.`id` = $material_id AND 
`a_materials`.`id` = `a_materials_packages`.`material_id` AND `a_materials_packages`.`package_id` = `a_packages`.`id` AND 
`a_packages`.`subunit_id` = $subunit_id";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	
	$function_query2 = "SELECT COUNT(*) FROM `a_packages` WHERE subunit_id = $subunit_id";
	$metavliti2 = mysql_query($function_query2);
	$tmp2 = mysql_fetch_row($metavliti2);
	
	$material_query = "SELECT * FROM `a_materials` WHERE id = $material_id";
	$material = mysql_fetch_assoc(mysql_query($material_query));
	
	
	if($material_id != 30 && $material_id != 31 ) {
		if(is_numeric($tmp2[0])) {
			if($material['quantity'] < 1) { return $tmp[0]; } 
			else { return $tmp[0]; }		
		}
	} else {
		if (is_numeric($tmp[0])) {
			return $tmp[0]; 
		} else { return "0"; }
	}
}

function select_b_material_sum_ana_pirxia($material_id, $subunit_id) {
	$function_query = "SELECT SUM(`b_materials_packages`.`quantity` ) FROM `b_materials`, `b_packages`, `b_materials_packages` WHERE `b_materials`.`id` = $material_id AND 
`b_materials`.`id` = `b_materials_packages`.`material_id` AND `b_materials_packages`.`package_id` = `b_packages`.`id` AND 
`b_packages`.`subunit_id` = $subunit_id";
	$metavliti = mysql_query($function_query);
	$tmp = mysql_fetch_row($metavliti);
	if (is_numeric($tmp[0])) {
		return $tmp[0]; 
	} else { return "0";
	}
}


function materials_check($provlepomeno, $iparxon) {
	if($provlepomeno > $iparxon) {
		echo "class='eliponta-materials'";
	}
	elseif($provlepomeno < $iparxon) {
		echo "class='pleonazonta-materials'";
	}
	else { echo "class=''"; }	
}


function oplismou_materials_sum($material_id) {
	$material_quantity = "SELECT SUM( quantity ) FROM `oplismou_materials_packages` WHERE `material_id` =".$material_id." GROUP BY material_id";
	$oplismou_quantity = mysql_query($material_quantity);
	$tmp = mysql_fetch_row($oplismou_quantity);
	return $tmp;
}

function provlepomeno_a_material($material_id) {
	$material_query = "SELECT * FROM `a_materials` WHERE id=".$material_id;
	$material_result = mysql_query($material_query);
	$material = mysql_fetch_assoc($material_result);
	
	$prov_mat_query = "SELECT SUM(provlepomeni_dinami) as provlepomeni_dinami FROM subunits WHERE id = 1 OR id = 3 OR id = 5 OR id = 7 OR id = 9";
	$prov_mat_result = mysql_query($prov_mat_query);
	$prov_material_assoc = mysql_fetch_assoc($prov_mat_result);
	
	$prov_material = $prov_material_assoc['provlepomeni_dinami'] * $material['quantity'];
	return $prov_material;
}

function provlepomeno_b_material($material_id) {
	$material_query = "SELECT * FROM `b_materials` WHERE id=".$material_id;
	$material_result = mysql_query($material_query);
	$material = mysql_fetch_assoc($material_result);
	
	$prov_mat_query = "SELECT SUM(provlepomeni_dinami) as provlepomeni_dinami FROM subunits WHERE id = 1 OR id = 3 OR id = 5 OR id = 7 OR id = 9";
	$prov_mat_result = mysql_query($prov_mat_query);
	$prov_material_assoc = mysql_fetch_assoc($prov_mat_result);
	
	$prov_material = $prov_material_assoc['provlepomeni_dinami'] * $material['quantity'];
	return $prov_material;
}

function subunit($subunit_id) {
	$subunit = mysql_fetch_assoc(mysql_query("SELECT * FROM subunits WHERE id = ".$subunit_id));
	return $subunit;
}

function select_a_material_sum_pirines($material_id) {
	$function_query = "SELECT SUM(`a_materials_packages`.`quantity` ) FROM `a_materials`, `a_packages`, `a_materials_packages` WHERE `a_materials`.`id` = $material_id AND 
`a_materials`.`id` = `a_materials_packages`.`material_id` AND `a_materials_packages`.`package_id` = `a_packages`.`id` AND 
(`a_packages`.`subunit_id` = 2 OR `a_packages`.`subunit_id` = 4 OR `a_packages`.`subunit_id` = 6 OR `a_packages`.`subunit_id` = 8 OR `a_packages`.`subunit_id` = 10)";
	$metavliti = mysql_query($function_query);

	$function_query2 = "SELECT COUNT(*) FROM `a_packages` WHERE subunit_id = 2 OR subunit_id = 4 OR subunit_id = 6 OR subunit_id = 8 OR subunit_id = 10";
	$metavliti2 = mysql_query($function_query2);
	$tmp2 = mysql_fetch_row($metavliti2);
	
	$material_query = "SELECT * FROM `a_materials` WHERE id = $material_id";
	$material = mysql_fetch_assoc(mysql_query($material_query));
	
	
	if($material_id != 30 && $material_id != 31) {
		if(is_numeric($tmp2[0])) {
			return $tmp2[0] * $material['quantity'] - $tmp[0];
		}
	} else {	
		if ($metavliti) {
			$tmp = mysql_fetch_row($metavliti);
			return $tmp[0]; 
		} else { return "0"; }
	}
}
	
function select_b_material_sum_pirines($material_id) {
	$function_query = "SELECT SUM(`b_materials_packages`.`quantity` ) FROM `b_materials`, `b_packages`, `b_materials_packages` WHERE `b_materials`.`id` = $material_id AND 
`b_materials`.`id` = `b_materials_packages`.`material_id` AND `b_materials_packages`.`package_id` = `b_packages`.`id` AND 
(`b_packages`.`subunit_id` = 2 OR `b_packages`.`subunit_id` = 4 OR `b_packages`.`subunit_id` = 6 OR `b_packages`.`subunit_id` = 8 OR `b_packages`.`subunit_id` = 10)";
	$tmp = mysql_fetch_row(mysql_query($function_query));
	if (isset($tmp[0])) {
		return $tmp[0]; 
	} else { return "0"; }
} 

function min_max_package() {
	$function_query = "SELECT MIN(start_package) as minimum, MAX(end_package) as maximum FROM `subunits`";
	$range = mysql_fetch_assoc(mysql_query($function_query));
	return $range;
}

function fixname($name) {
	if(strlen($name) > 40) {
		$fixed_name = explode(" ", $name);

		for($i = 0; sizeof($fixed_name) > $i; $i++ ) {
			if(strlen($fixed_name[$i]) > 14) {
				$fixed_name[$i] = substr($fixed_name[$i], 0, 12).".";
			}
		}

		return implode(" ", $fixed_name);
	}
	else { return $name; }
}

function update_specific_subunit_value($id, $column, $value){
	$function_query = "UPDATE `diaxeirisi`.`subunits` SET `$column` = \"$value\" WHERE `subunits`.`id` =$id;";
	$metavliti = mysql_query($function_query);
	return $value;
}

function fixdate($date) {
	if($date == "0000-00-00" OR $date == "00-00-0000" OR $date == "--") {
		return "";
	} else {
		return $date;
	}
}

function set_month($month_number) {
 switch($month_number) {
	case 1: return "Ιανουαρίου"; break;
	case 2: return "Φεβρουαρίου"; break;
	case 3: return "Μαρτίου"; break;
	case 4: return "Απριλίου"; break;
	case 5: return "Μαϊου"; break;
	case 6: return "Ιουνίου"; break;
	case 7: return "Ιουλίου"; break;
	case 8: return "Αυγούστου"; break;
	case 9: return "Σεπτεμβρίου"; break;
	case 10: return "Οκτωβρίου"; break;
	case 11: return "Νοεμβρίου"; break;
	case 12: return "Δεκεμβρίου"; break;
 }
}


function reverse_date($date) {
	$tmp_date = explode("-", $date);
	return $tmp_date[2]."-".$tmp_date[1]."-".$tmp_date[0];
}

function show_today_date($from_package, $all) {
	$tmp_date = fixdate($from_package);
	if($tmp_date != "") {
		$tmp_date = explode("-", $tmp_date);
		
		return $tmp_date[2]." ".set_month($tmp_date[1])." ".$tmp_date[0];
	} else {
		return $all;
	}
}

function print_dema_date($package_date, $tmp_date) {
	if($package_date != "0000-00-00") {
		return $tmp_date[2]."/".$tmp_date[1]."/".$tmp_date[0];
	} 
}

function detailed_date($date) {
	$tmp_date = explode("-", $date);
	return $tmp_date[0]." ".set_month($tmp_date[1])." ".$tmp_date[2];
}

function check_package_number_existance($package_number) {
//	$function_query1 = "SELECT * FROM `a_packages` WHERE number =".$package_number;
//	if() {
		
//	}
	
//	$function_query2 = "SELECT * FROM `b_packages` WHERE number =".$package_number;

	
}



/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
  
  $link = mysql_connect($host,$user,$pass);
  mysql_select_db($name,$link);
  
  //get all of the tables
  if($tables == '*')
  {
    $tables = array();
    $result = mysql_query('SHOW TABLES');
    while($row = mysql_fetch_row($result))
    {
      $tables[] = $row[0];
    }
  }
  else
  {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }
  
  //cycle through
  foreach($tables as $table)
  {
    $result = mysql_query('SELECT * FROM '.$table);
    $num_fields = mysql_num_fields($result);
    
    $return.= 'DROP TABLE '.$table.';';
    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
    $return.= "\n\n".$row2[1].";\n\n";
    
    for ($i = 0; $i < $num_fields; $i++) 
    {
      while($row = mysql_fetch_row($result))
      {
        $return.= 'INSERT INTO '.$table.' VALUES(';
        for($j=0; $j<$num_fields; $j++) 
        {
          $row[$j] = addslashes($row[$j]);
          $row[$j] = ereg_replace("\n","\\n",$row[$j]);
          if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
          if ($j<($num_fields-1)) { $return.= ','; }
        }
        $return.= ");\n";
      }
    }
    $return.="\n\n\n";
  }
  
  //save file
  $backup_name = 'db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql';
  $handle = fopen($backup_name,'w+');
  fwrite($handle,$return);
  fclose($handle);
  return $backup_name;
}


function dokimi($mat_id) {
	$sum = 0;

	$dokimi_query = "SELECT  `subunits`.`subunits` ,  `b_materials_packages`.`quantity` 
	FROM  `b_materials_packages` ,  `b_packages` ,  `subunits` 
	WHERE  `material_id` =".$mat_id."
	AND  `b_packages`.`id` =  `b_materials_packages`.`package_id` 
	AND  `subunits`.`id` =  `b_packages`.`subunit_id` AND `subunits`.`id` = 11";
	$result = mysql_query($dokimi_query);
		while($tmp = mysql_fetch_assoc($result)) {
			$sum = $sum + $tmp['quantity'];
		}
	return $sum;
}

function apografi_ylikwn() {
	$function_query = 'select distinct *, "a" as "pinakas_type" from a_materials 
			 union 
			select distinct *, "b" as "pinakas_type" from b_materials
			ORDER BY name';
	$metavliti = mysql_query($function_query);
	return $metavliti;
			
}

function monada_metrisis($material_id, $table_letter) {
	if($table_letter == "a" || $table_letter == "b") {
		$table = $table_letter."_materials";
		$quantity_type_id = select_record_column($table, $material_id, "quantity_type");
		$quantity_type = select_record_column("quantity_type", $quantity_type_id[0], "name");
		return $quantity_type[0];
	}
}


function apografi_material_count($material_id, $pinakas_type) {
	if($pinakas_type == "a") {
		$count = count_sum_a_materials($material_id);
	} else {
		$count = count_sum_b_materials($material_id);
	}
	return $count;
}

function update_apografi($datatype, $id, $pinakas_type, $value, $size) {
	//$function_query = "select * from apografi_ylikwn WHERE material_id = $id AND pinakas_letter = $pinakas_type";
	//$material_result = mysql_query($function_query);
	//$material = mysql_fetch_row($material_result);
	
	if($datatype == "am")     { $function_query2 = "UPDATE `diaxeirisi`.`apografi_ylikwn` SET `merida`     = '$value' WHERE `apografi_ylikwn`.`material_id` = '$id' AND `pinakas_letter` = '$pinakas_type'  AND `size` = '$size'; "; }
	elseif($datatype == "ao") { $function_query2 = "UPDATE `diaxeirisi`.`apografi_ylikwn` SET `onomastiko` = '$value' WHERE `apografi_ylikwn`.`material_id` = '$id' AND `pinakas_letter` = '$pinakas_type'  AND `size` = '$size'; "; }
	elseif($datatype == "ly") { $function_query2 = "UPDATE `diaxeirisi`.`apografi_ylikwn` SET `logistiko`  = '$value' WHERE `apografi_ylikwn`.`material_id` = '$id' AND `pinakas_letter` = '$pinakas_type'  AND `size` = '$size'; "; }
	$tmp = mysql_query($function_query2);
	return $tmp;
}

function merida($material_id, $pinakas_type, $size) {
	$function_query = "select merida from `apografi_ylikwn` WHERE `material_id` = $material_id AND `pinakas_letter` = '$pinakas_type' AND `size` = '$size'";
	$material_result = mysql_query($function_query);
	$material = mysql_fetch_row($material_result);
	return $material[0];
}

function onomastiko($material_id, $pinakas_type, $size) {
	$function_query = "select onomastiko from `apografi_ylikwn` WHERE `material_id` = $material_id AND `pinakas_letter` = '$pinakas_type' AND `size` = '$size'";
	$material_result = mysql_query($function_query);
	$material = mysql_fetch_row($material_result);
	return $material[0];
}

function logistiko($material_id, $pinakas_type, $size) {
	$function_query = "select logistiko from `apografi_ylikwn` WHERE `material_id` = $material_id AND `pinakas_letter` = '$pinakas_type' AND `size` = '$size'";
	$material_result = mysql_query($function_query);
	$material = mysql_fetch_row($material_result);
	return $material[0];
}

function check_mat_size($material_id, $pinakas_type) {
	if($pinakas_type == "b") { $tmp_string = "_id"; } else { $tmp_string = ""; }
	$function_query = "select * from ".$pinakas_type."_sizes WHERE material_id = $material_id ORDER BY size".$tmp_string;
	$material_result = mysql_query($function_query);
	return $material_result;
}

function monada_metrisis_size($material_id, $table_letter, $size) {
	if($table_letter == "a" || $table_letter == "b") {
		if($table_letter == "a") { $tmp_size_column = "size"; } else { $tmp_size_column = "size_id"; }
		$table = $table_letter."_sizes";
		$function_query = "select * from ".$table." where material_id = ".$material_id." AND id = ".$size;
		$size_result = mysql_query($function_query);
		$sizef = mysql_fetch_row($size_result);
		return $sizef;
	}
}

function apografi_material_count_size($material_id, $table_letter, $size) {
	if($table_letter == "a") {
		$function_query = "SELECT * FROM a_materials_packages WHERE material_id= $material_id AND size = $size";
	} else {
		$function_query = "SELECT * FROM b_materials_packages WHERE material_id= $material_id AND size_id = $size";
	}
	$quantity_result = mysql_query($function_query);
	while($quantity_tmp = mysql_fetch_assoc($quantity_result)) {
		$quantity = $quantity + $quantity_tmp['quantity'];
	}
	//$count = mysql_num_rows($count_result);
	if(isset($quantity)){ return $quantity; } else { return "0"; }
}
