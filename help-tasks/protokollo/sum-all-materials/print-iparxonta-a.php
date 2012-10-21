<?php 
	$size_quantity = 0;
	$iparxonta_query = "SELECT * FROM a_materials_packages WHERE material_id='".$row['id']."' AND size='".$size_row['id']."';";
	$iparxonta_result = mysql_query($iparxonta_query);
	while($row_iparxonta = mysql_fetch_assoc($iparxonta_result)) {
		$size_quantity = $size_quantity + $row_iparxonta['quantity'];
	}
 ?>
 <?php $sum_iparxon = $sum_iparxon + $size_quantity; ?>
 <?php echo $size_quantity; ?>
