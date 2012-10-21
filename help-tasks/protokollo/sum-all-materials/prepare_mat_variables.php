<?php 
	$pleonazon_sum = 0;
	$elipon_sum = 0;
	$efedroi_select = "SELECT * FROM subunits WHERE id=11";
	$efedroi_result = mysql_query($efedroi_select);
	while($efedroi_row = mysql_fetch_assoc($efedroi_result)) { $efedroi = $efedroi_row['provlepomeni_dinami']; }
	if($row['efedroi']) { $prov_efedroi = $efedroi; } else { $prov_efedroi = 0; }
?>
<?php $material_prov_power = (($pirxia_power - $efedroi)*$row['quantity'] + $prov_efedroi); ?>
<?php $sum_provlepomeno = 0; ?>
<?php $sum_iparxon = 0; ?>
<?php // echo $size_row['percentage']; ?> 