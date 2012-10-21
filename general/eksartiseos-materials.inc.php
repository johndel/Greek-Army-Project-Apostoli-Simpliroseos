	<tr class="mini-header">
		<td class="bold">ΕΙΔΗ ΕΞΑΡΤΗΣΕΩΣ</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
	</tr>
	
	<?php 

	$eksartiseos_materials = mysql_query("SELECT * FROM `a_materials` ORDER BY name;");	
	while($eksartiseos_row = mysql_fetch_assoc($eksartiseos_materials)) { ?>
	
	<div style="display: none;">
	<?php
		$prov_material = provlepomeno_a_material($eksartiseos_row['id']);
		$tmp_prov = $prov_material + $apomiwsi*$eksartiseos_row['quantity'];
		$tmp_sum = count_sum_a_materials2($eksartiseos_row['id'], $eksartiseos_row['efedroi']);
		$tmp_total_sum = count_sum_a_materials2($eksartiseos_row['id'], $eksartiseos_row['efedroi']);
		
	?>
	</div>
	
	<tr class="<?php $tmp_counter = $tmp_counter + 1; if($tmp_counter % 2 == 0) { ?>even<?php } else { ?>odd<?php } ?>">
		<td class="text-left-header"><?php echo $eksartiseos_row['name']; ?></td>
		<td><?php echo floor($prov_material); ?></td><td><?php echo floor($apomiwsi*$eksartiseos_row['quantity']); ?></td><td><?php echo floor($prov_material + $apomiwsi * $eksartiseos_row['quantity']); ?></td><td <?php materials_check($tmp_prov, $tmp_sum); ?>><?php echo $tmp_sum;// count_sum_a_materials2($eksartiseos_row['id']); ?></td><td class="header-center">Αποθήκη ΑΣ</td>
		<td><?php $a_subunit = subunit(1); echo floor($a_subunit['provlepomeni_dinami'] * $eksartiseos_row['quantity']); ?></td><td <?php materials_check(floor($a_subunit['provlepomeni_dinami'] * $eksartiseos_row['quantity']), select_a_material_sum_ana_pirxia($eksartiseos_row['id'], 1)); ?>><?php echo floor(select_a_material_sum_ana_pirxia($eksartiseos_row['id'], 1)); ?></td>
		<td><?php $a_subunit = subunit(3); echo floor($a_subunit['provlepomeni_dinami'] * $eksartiseos_row['quantity']); ?></td><td <?php materials_check(floor($a_subunit['provlepomeni_dinami'] * $eksartiseos_row['quantity']), select_a_material_sum_ana_pirxia($eksartiseos_row['id'], 3)); ?>><?php echo floor(select_a_material_sum_ana_pirxia($eksartiseos_row['id'], 3)); ?></td>
		<td><?php $a_subunit = subunit(5); echo floor($a_subunit['provlepomeni_dinami'] * $eksartiseos_row['quantity']); ?></td><td <?php materials_check(floor($a_subunit['provlepomeni_dinami'] * $eksartiseos_row['quantity']), select_a_material_sum_ana_pirxia($eksartiseos_row['id'], 5)); ?>><?php echo floor(select_a_material_sum_ana_pirxia($eksartiseos_row['id'], 5)); ?></td>
		<td><?php $a_subunit = subunit(7); echo floor($a_subunit['provlepomeni_dinami'] * $eksartiseos_row['quantity']); ?></td><td <?php materials_check(floor($a_subunit['provlepomeni_dinami'] * $eksartiseos_row['quantity']), select_a_material_sum_ana_pirxia($eksartiseos_row['id'], 7)); ?>><?php echo floor(select_a_material_sum_ana_pirxia($eksartiseos_row['id'], 7)); ?></td>
		<td><?php $a_subunit = subunit(9); echo floor($a_subunit['provlepomeni_dinami'] * $eksartiseos_row['quantity']); ?></td><td <?php materials_check(floor($a_subunit['provlepomeni_dinami'] * $eksartiseos_row['quantity']), select_a_material_sum_ana_pirxia($eksartiseos_row['id'], 9)); ?>><?php echo floor(select_a_material_sum_ana_pirxia($eksartiseos_row['id'], 9)); ?></td>
		
		<td><?php echo all_pirines() * $eksartiseos_row['quantity']; ?></td><td <?php materials_check(all_pirines() * $eksartiseos_row['quantity'], select_a_material_sum_pirines($eksartiseos_row['id'])); ?>><?php echo select_a_material_sum_pirines($eksartiseos_row['id']); ?></td>
		
		<td><?php if($eksartiseos_row['efedroi'] == 1) { $anapl_subunit = subunit(11); $prov_sum_material = $anapl_subunit['provlepomeni_dinami']; echo $anapl_subunit['provlepomeni_dinami']; } else { $prov_sum_material = 0; echo "0"; } ?></td><td <?php if($eksartiseos_row['efedroi'] == 1) { materials_check($prov_sum_material, select_a_material_efedroi($eksartiseos_row['id'], 11)); } ?>><?php if($eksartiseos_row['efedroi'] == 1) { echo select_a_material_efedroi($eksartiseos_row['id'], 11); } else { echo "0";} ?></td>
		<td><?php echo $tmp_prov_total_sum = floor($prov_sum_material + $prov_material + $apomiwsi*$eksartiseos_row['quantity']); ?></td><td <?php materials_check($tmp_prov_total_sum, $tmp_total_sum); ?>><?php echo $tmp_sum; //count_sum_a_materials22($eksartiseos_row['id']); ?></td>
		<td>&nbsp;</td>	
	</tr>
	<?php } ?>