<?php 
	$size_quantity = 0;
	$iparxonta_query = "SELECT * FROM `b_materials_packages`, `b_packages` WHERE `material_id`= ".$row['id']." AND `size_id`= ".$size_row['id']." AND `b_packages`.`subunit_id` = ".$_GET['subunit']." AND `b_packages`.`id` = `b_materials_packages`.`package_id`";
	$iparxonta_result = mysql_query($iparxonta_query);
	while($row_iparxonta = mysql_fetch_assoc($iparxonta_result)) {
		$size_quantity = $size_quantity + $row_iparxonta['quantity'];
	}
?>
	

 <?php $sum_iparxonta = $sum_iparxonta + $size_quantity; ?>
 <?php echo "<a href='iparxonta-positions.php?material=".$row['id']."&size=".$size_row['id']."&subunit=".$_GET[subunit]."'>".$size_quantity."</a>"; ?>
