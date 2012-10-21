<?php 
	$size_quantity = 0;
	$iparxonta_query = "SELECT * FROM `a_materials_packages`, `a_packages` WHERE `a_materials_packages`.`material_id`= ".$row['id']." AND `a_materials_packages`.`size`= ".$size_row['id']." AND `a_packages`.`subunit_id` = ".$_GET['subunit']." AND `a_packages`.`id` = `a_materials_packages`.`package_id`";
	$iparxonta_result = mysql_query($iparxonta_query);
	while($row_iparxonta = mysql_fetch_assoc($iparxonta_result)) {
		$size_quantity = $size_quantity + $row_iparxonta['quantity'];
	}
?>
	

 <?php $sum_iparxonta = $sum_iparxonta + $size_quantity; ?>
 <?php echo "<a href='iparxonta-positions-pirxia.php?material=".$row['id']."&size=".$size_row['id']."&subunit=".$_GET['subunit']."'>".$size_quantity."</a>"; ?>
