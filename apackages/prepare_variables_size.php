<?php 
	$pleonazon_sum = 0;
	$elipon_sum = 0;
	$efedroi_select = "SELECT * FROM subunits WHERE id=11";
	$efedroi_result = mysql_query($efedroi_select);
	while($efedroi_row = mysql_fetch_assoc($efedroi_result)) { $efedroi = $efedroi_row['provlepomeni_dinami']; }
	if($row['efedroi']) { $prov_efedroi = $efedroi; } else { $prov_efedroi = 0; }
?>
<?php $material_prov_power = ($pirxia_power*$row['quantity'] + $prov_efedroi); ?>


<?php 
	$sum_query = "SELECT SUM(quantity) FROM `a_materials_packages` WHERE material_id = ".$row['id'];
	$sum_result = mysql_query($sum_query);
	$sum_iparxon = mysql_fetch_row($sum_result); 

	//$elipon_sum = $material_prov_power - $sum_iparxon[0];
	//$pleonazon_sum = $sum_iparxon[0] - $material_prov_power;
?>