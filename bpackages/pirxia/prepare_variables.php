<?php 
	$pleonazon_sum = 0;
	$elipon_sum = 0;
?>

<?php $material_prov_power = $pirxia_power*$row['quantity']; ?>


<?php 
	$sum_query = "SELECT SUM(quantity) FROM `a_materials_packages` WHERE material_id = ".$row['id'];
	$sum_result = mysql_query($sum_query);
	$sum_iparxon = mysql_fetch_row($sum_result); 

	$elipon_sum = $material_prov_power - count_subunit_a_materials($row['id'], $_GET['subunit']);
	$pleonazon_sum = count_subunit_a_materials($row['id'], $_GET['subunit']) - $material_prov_power;
?>