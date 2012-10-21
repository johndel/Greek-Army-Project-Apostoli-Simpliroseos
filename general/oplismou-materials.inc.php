	<tr class="mini-header">
		<td class="bold">ΟΠΛΙΣΜΟΣ</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
	</tr>
	
	<?php 
	$oplismou_materials = mysql_query("SELECT * FROM `oplismou_materials` ORDER BY yliko;");
	$tmp_counter = 0; ?>
	<?php while($oplismou_row = mysql_fetch_assoc($oplismou_materials)) { 
	?>
	<?php 
		$tmp = oplismou_materials_sum($oplismou_row['id']);	
		$a_pirxia = count_op_mat_quantity_per_subunit($oplismou_row['id'], 1);
		$b_pirxia = count_op_mat_quantity_per_subunit($oplismou_row['id'], 3);
		$c_pirxia = count_op_mat_quantity_per_subunit($oplismou_row['id'], 5);
		$d_pirxia = count_op_mat_quantity_per_subunit($oplismou_row['id'], 7);
		$pd_pirxia = count_op_mat_quantity_per_subunit($oplismou_row['id'], 9);
		// $pirines_pirxia = count_op_mat_quantity_pirinwn($oplismou_row['id']);
		// $anapl_pirxia = count_op_mat_quantity_per_subunit($oplismou_row['id'], 11);
		
		$a_prov_pirxia = select_dinami_oplismou_ana_pirxia($oplismou_row['id'], 1);
		$b_prov_pirxia = select_dinami_oplismou_ana_pirxia($oplismou_row['id'], 3);
		$c_prov_pirxia = select_dinami_oplismou_ana_pirxia($oplismou_row['id'], 5);
		$d_prov_pirxia = select_dinami_oplismou_ana_pirxia($oplismou_row['id'], 7);
		$pd_prov_pirxia = select_dinami_oplismou_ana_pirxia($oplismou_row['id'], 9);
		// $pirines_prov_pirxia = ;
		// $anapl_prov_pirxia= ;
	?>
		
	<tr class="<?php $tmp_counter = $tmp_counter + 1; if($tmp_counter % 2 == 0) { ?>even<?php } else { ?>odd<?php } ?>">
		<td class="text-left-header"><?php echo $oplismou_row['yliko']; ?></td><td><?php echo select_dinami_oplismou_sum($oplismou_row['id']); ?></td><td>0</td><td><?php echo select_dinami_oplismou_sum($oplismou_row['id']); ?></td>
		<td <?php materials_check(select_dinami_oplismou_sum($oplismou_row['id']), $tmp[0]); ?>><?php echo $tmp[0];?></td>
		<td class="header-center">Αποθήκη Οπλισμού<?php //echo select_warehouse("oplismou", $oplismou_row['id']); ?></td><td><?php echo select_dinami_oplismou_ana_pirxia($oplismou_row['id'], 1); ?></td><td <?php materials_check($a_prov_pirxia, $a_pirxia); ?> ><?php echo count_op_mat_quantity_per_subunit($oplismou_row['id'], 1); ?></td><td><?php echo select_dinami_oplismou_ana_pirxia($oplismou_row['id'], 3); ?></td><td <?php materials_check($b_prov_pirxia, $b_pirxia); ?> ><?php echo count_op_mat_quantity_per_subunit($oplismou_row['id'], 3); ?></td>
		<td><?php echo select_dinami_oplismou_ana_pirxia($oplismou_row['id'], 5); ?></td><td <?php materials_check($c_prov_pirxia, $c_pirxia); ?> ><?php echo count_op_mat_quantity_per_subunit($oplismou_row['id'], 5); ?></td><td><?php echo select_dinami_oplismou_ana_pirxia($oplismou_row['id'], 7); ?></td><td <?php materials_check($d_prov_pirxia, $d_pirxia); ?> ><?php echo count_op_mat_quantity_per_subunit($oplismou_row['id'], 7); ?></td><td><?php echo select_dinami_oplismou_ana_pirxia($oplismou_row['id'], 9); ?></td><td <?php materials_check($pd_prov_pirxia, $pd_pirxia); ?> ><?php echo count_op_mat_quantity_per_subunit($oplismou_row['id'], 9); ?></td><td>0</td><td><?php echo count_op_mat_quantity_pirinwn($oplismou_row['id']); ?></td><td>0</td><td><?php echo count_op_mat_quantity_per_subunit($oplismou_row['id'], 11); ?></td><td><?php echo select_dinami_oplismou_sum($oplismou_row['id']); ?></td><td <?php materials_check(select_dinami_oplismou_sum($oplismou_row['id']), $tmp[0]); ?>><?php echo $tmp[0]; ?></td><td>&nbsp;</td>	
	</tr>
	<?php } ?>