<?php 
	$pleonazon_sum = 0;
	$elipon_sum = 0;
    $material_prov_power = $pirxia_power * $row['quantity']; 
$sum_query = "SELECT SUM(quantity) FROM `a_materials_packages`, `a_packages`, `subunits` WHERE material_id = ".$row['id']." AND `a_materials_packages`.`package_id` = `a_packages`.`id` AND `a_packages`.`subunit_id` = `subunits`.`id` AND `subunits`.`id` =  ".$_GET['subunit'];
$sum_result = mysql_query($sum_query);
$sum_iparxon = mysql_fetch_row($sum_result); 

$elipon_sum = $material_prov_power - $sum_iparxon[0];
$pleonazon_sum = $sum_iparxon[0] - $material_prov_power;
?>
<?php // echo $size_row['percentage']; ?> 