<?php
	$logistiko_value = logistiko($material['id'], $material['pinakas_type'], $size['id']);
 ?>

	<tr id="<?php echo $material['id']; ?>-<?php echo $material['pinakas_type']; ?>-<?php echo $size['id']; ?>">
		<td style="text-align: center;"><?php echo $a_a = $a_a + 1; ?> <?php echo $sizes_num; ?></td>
		<td style="text-align: center;"><span class="editable" style="width: 40px;" id="am-<?php echo $material['id']; ?>-<?php echo $material['pinakas_type']; ?>-<?php echo $size['id']; ?>"><?php echo merida($material['id'],     $material['pinakas_type'], $size['id']); ?></span></td>
		<td style="text-align: center;"><span class="editable" style="width: 40px;" id="ao-<?php echo $material['id']; ?>-<?php echo $material['pinakas_type']; ?>-<?php echo $size['id']; ?>"><?php echo onomastiko($material['id'], $material['pinakas_type'], $size['id']); ?></span></td>
		<td style="text-align: left;">&nbsp; - <?php echo $material['name']; ?></td>
		<td style="text-align: center;"><?php $tmp_size = monada_metrisis_size($material['id'], $material['pinakas_type'], $size['id']); echo $tmp_size[2]; ?></td>
		<td style="text-align: center;"><span class="editable logistiko" style="width: 40px;" id="ly-<?php echo $material['id']; ?>-<?php echo $material['pinakas_type']; ?>-<?php echo $size['id']; ?>"><?php echo $logistiko_value; ?></span></td>
		<td style="text-align: center;"><?php echo apografi_material_count_size($material['id'], $material['pinakas_type'], $size['id']); ?></td>
		<td style="text-align: center;" class="diafora"></td>
	</tr>

