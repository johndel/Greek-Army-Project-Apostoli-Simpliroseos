	<tr class="mini-header">
		<td class="bold">ΕΙΔΗ ΙΜΑΤΙΣΜΟΥ</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
	</tr>
	
	<?php 
	$imatismou_materials = mysql_query("SELECT * FROM `b_materials` ORDER BY name;");	
	while($imatismou_row = mysql_fetch_assoc($imatismou_materials)) { ?>
	<div style="display: none;">
	<?php
		$prov_material = provlepomeno_b_material($imatismou_row['id']);
		$tmp_prov = $prov_material + 34*$imatismou_row['quantity'];
		$tmp_sum = count_sum_b_materials($imatismou_row['id']);
		$tmp_total_sum = count_sum_b_materials($imatismou_row['id']);
	?>
	</div>
	
	<tr class="<?php $tmp_counter = $tmp_counter + 1; if($tmp_counter % 2 == 0) { ?>even<?php } else { ?>odd<?php } ?>">
		<td class="text-left-header"><?php echo $imatismou_row['name']; ?></td>
		<td><?php echo $prov_material; ?></td>
		<td><?php echo $apomiwsi*$imatismou_row['quantity']; ?></td>
		<td><?php echo $prov_material + $apomiwsi*$imatismou_row['quantity']; ?></td><td <?php materials_check($tmp_prov, $tmp_sum); ?>><?php echo $tmp_sum; // count_sum_b_materials($imatismou_row['id']); ?></td><td class="header-center">Αποθήκη ΑΣ</td>
		<td><?php $a_subunit = subunit(1); echo $a_subunit['provlepomeni_dinami'] * $imatismou_row['quantity']; ?></td><td <?php materials_check($a_subunit['provlepomeni_dinami'] * $imatismou_row['quantity'], select_b_material_sum_ana_pirxia($imatismou_row['id'], 1)); ?>><?php echo select_b_material_sum_ana_pirxia($imatismou_row['id'], 1); ?></td>
		<td><?php $a_subunit = subunit(3); echo $a_subunit['provlepomeni_dinami'] * $imatismou_row['quantity']; ?></td><td <?php materials_check($a_subunit['provlepomeni_dinami'] * $imatismou_row['quantity'], select_b_material_sum_ana_pirxia($imatismou_row['id'], 3)); ?>><?php echo select_b_material_sum_ana_pirxia($imatismou_row['id'], 3); ?></td>
		<td><?php $a_subunit = subunit(5); echo $a_subunit['provlepomeni_dinami'] * $imatismou_row['quantity']; ?></td><td <?php materials_check($a_subunit['provlepomeni_dinami'] * $imatismou_row['quantity'], select_b_material_sum_ana_pirxia($imatismou_row['id'], 5)); ?>><?php echo select_b_material_sum_ana_pirxia($imatismou_row['id'], 5); ?></td>
		<td><?php $a_subunit = subunit(7); echo $a_subunit['provlepomeni_dinami'] * $imatismou_row['quantity']; ?></td><td <?php materials_check($a_subunit['provlepomeni_dinami'] * $imatismou_row['quantity'], select_b_material_sum_ana_pirxia($imatismou_row['id'], 7)); ?>><?php echo select_b_material_sum_ana_pirxia($imatismou_row['id'], 7); ?></td>
		<td><?php $a_subunit = subunit(9); echo $a_subunit['provlepomeni_dinami'] * $imatismou_row['quantity']; ?></td><td <?php materials_check($a_subunit['provlepomeni_dinami'] * $imatismou_row['quantity'], select_b_material_sum_ana_pirxia($imatismou_row['id'], 9)); ?>><?php echo select_b_material_sum_ana_pirxia($imatismou_row['id'], 9); ?></td>
		<td><?php echo all_pirines() * $imatismou_row['quantity']; ?></td><td <?php materials_check(all_pirines() * $imatismou_row['quantity'], select_b_material_sum_pirines($imatismou_row['id'])); ?>><?php echo select_b_material_sum_pirines($imatismou_row['id']); ?></td>
		<td><?php if($imatismou_row['efedroi'] == 1) { $anapl_subunit = subunit(11); $prov_sum_material = $anapl_subunit['provlepomeni_dinami']; echo $anapl_subunit['provlepomeni_dinami']; } else { $prov_sum_material = 0; echo "0"; } ?></td><td <?php if($imatismou_row['efedroi'] == 1) { materials_check($prov_sum_material, select_b_material_sum_ana_pirxia($imatismou_row['id'], 11)); } ?>><?php if($imatismou_row['efedroi'] == 1) { echo select_b_material_sum_ana_pirxia($imatismou_row['id'], 11); } else { echo "0";} ?></td>
		<td><?php echo $tmp_prov_total_sum = $prov_sum_material + $prov_material + $apomiwsi*$imatismou_row['quantity']; ?></td><td <?php materials_check($tmp_prov_total_sum, $tmp_total_sum); ?>><?php echo $tmp_sum; // count_sum_b_materials($imatismou_row['id']); ?></td>
		<td>&nbsp;</td>	
	</tr>
	<?php } ?>