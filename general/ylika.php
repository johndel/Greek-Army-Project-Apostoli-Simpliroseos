<?php
	$logistiko_value = logistiko($material['id'], $material['pinakas_type'], "all");
 ?>
	
	<tr id="<?php echo $material['id']; ?>-<?php echo $material['pinakas_type']; ?>-all">
		<td style="text-align: center;"><?php echo $a_a = $a_a + 1; ?></td>
		<td style="text-align: center;"><span class="editable" style="width: 40px;" id="am-<?php echo $material['id']; ?>-<?php echo $material['pinakas_type']; ?>-all"><?php echo merida($material['id'],     $material['pinakas_type'], "all"); ?></span></td>
		<td style="text-align: center;"><span class="editable" style="width: 40px;" id="ao-<?php echo $material['id']; ?>-<?php echo $material['pinakas_type']; ?>-all"><?php echo onomastiko($material['id'], $material['pinakas_type'], "all"); ?></span></td>
		<td style="text-align: left;"><?php echo $material['name']; ?></td>
		<td style="text-align: center; font-weight: bold;"><?php echo monada_metrisis($material['id'], $material['pinakas_type']); ?></td>
		<td style="text-align: center;"><span class="editable logistiko" style="width: 40px;" id="ly-<?php echo $material['id']; ?>-<?php echo $material['pinakas_type']; ?>-all"><?php echo $logistiko_value; ?></span></td>
		<td style="text-align: center;"><?php echo apografi_material_count($material['id'], $material['pinakas_type']); ?></td>
		<td style="text-align: center;" class="diafora"></td>
	</tr>
	
	<?php $count = mysql_num_rows(check_mat_size($material['id'], $material['pinakas_type'])); ?>
	<?php if( $count > 0) { ?>
		<?php $size_tmp = check_mat_size($material['id'], $material['pinakas_type']); ?>	
		
		<?php while($size = mysql_fetch_assoc($size_tmp)) { 
			include("ylika_sizes.php"); 
		} ?>
	
	<?php } ?>

