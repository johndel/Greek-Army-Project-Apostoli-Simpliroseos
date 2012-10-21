
<?php include("../partials/wrapper-functions.php") ?>
<?php include("../partials/database-connect-old-nice-way.inc.php"); ?>

<?php $tmp = mysql_query("SELECT *,'a' as package_letter FROM `a_packages` WHERE number = ".$_GET['start_id']);
if(mysql_num_rows($tmp) == 0) {
	$tmp = mysql_query("SELECT *,'b' as package_letter FROM `b_packages` WHERE number = ".$_GET['start_id']);
} ?>



<meta charset="utf-8">

<?php if(mysql_num_rows($tmp) == 0) { ?>
	<tbody>
		<tr>
			<td rowspan="8" style="font-weight: bold; border-bottom: 2pt solid #000000" width="65"><?php for($tmp_k = 0; $tmp_k < (4) - 1; $tmp_k++) { echo "&nbsp;<br />"; } echo $_GET['start_id']; ?></td>
			<td style="text-align: center;" width="230">&nbsp;</td>
			<td width="70">&nbsp;</td>
			<td width="80">&nbsp;</td>
			<td width="65" rowspan="8" style="border: 1px solid #000;border-bottom: 2pt solid #000"><?php //$subunit = find_subunit($_GET['start_id']); for($tmp_k = 0; $tmp_k < 3; $tmp_k++) { echo "&nbsp;<br />"; };  if($_GET['start_id'] < 101) { echo "ΠΥΡΗΝΕΣ"; } else { echo $subunit['subunits']; } ?></td>
			<td width="91" rowspan="8" style="border: 1px solid #000;border-bottom: 2pt solid #000"><?php for($tmp_k = 0; $tmp_k < 3; $tmp_k++) { echo "&nbsp;<br />"; } ?></td>
			<td width="91" rowspan="8" style="border: 1px solid #000;border-bottom: 2pt solid #000"><?php for($tmp_k = 0; $tmp_k < 3; $tmp_k++) { echo "&nbsp;<br />"; } ?></td>
		</tr>
		<tr>
			<td style="text-align: center;" width="230">&nbsp;</td>
			<td width="70">&nbsp;</td>
			<td width="80">&nbsp;</td>
		</tr>
		<tr>
			<td style="text-align: center;" width="230">&nbsp;</td>
			<td width="70">&nbsp;</td>
			<td width="80">&nbsp;</td>
		</tr>
		<tr>
			<td style="text-align: center;" width="230">&nbsp;</td>
			<td width="70">&nbsp;</td>
			<td width="80">&nbsp;</td>
		</tr>
		<tr>
			<td style="text-align: center;" width="230">&nbsp;</td>
			<td width="70">&nbsp;</td>
			<td width="80">&nbsp;</td>
		</tr>
		<tr>
			<td style="text-align: center;" width="230">&nbsp;</td>
			<td width="70">&nbsp;</td>
			<td width="80">&nbsp;</td>
		</tr>
		<tr>
			<td style="text-align: center;" width="230">&nbsp;</td>
			<td width="70">&nbsp;</td>
			<td width="80">&nbsp;</td>
		</tr>
		<tr>
			<td style="border: 1px solid #000;border-bottom: 2pt solid #000" width="230">&nbsp;</td>
			<td style="border: 1px solid #000;border-bottom: 2pt solid #000" width="70">&nbsp;</td>
			<td style="border: 1px solid #000;border-bottom: 2pt solid #000" width="80">&nbsp;</td>
		</tr>
	</tbody>












<?php } else { ?>
	<tbody>
		<?php 
			while($package_row = mysql_fetch_assoc($tmp)) { ?>
			<?php $materials_number = material_count($package_row['id'], $package_row['package_letter']); $all_materials_of_package = all_package_material($package_row['id'], $package_row['package_letter']); ?>
			<?php if($materials_number < 8) { $materials_number = 8; } ?>
		<tr>
			<td rowspan="<?php echo $materials_number; ?>" style="font-weight: bold; border: 1px solid #000; border-bottom: 2pt solid #000000" width="65"><?php for($tmp_k = 0; $tmp_k < ($materials_number/2) - 1; $tmp_k++) { echo "&nbsp;<br />"; } echo $package_row['number']; ?></td>
			<td style="text-align: center;" width="230"><?php if($package_row['package_letter'] == "a") { echo "ΥΛΙΚΑ ΠΙΝΑΚΑ Α"; } else { echo "ΥΛΙΚΑ ΠΙΝΑΚΑ Β";} ?></td>
			<td width="70">&nbsp;</td>
			<td width="80">&nbsp;</td>
			
			<td width="65" rowspan="<?php echo $materials_number; ?>" style="border: 1px solid #000;border-bottom: 2pt solid #000"><?php $subunit = select_record("subunits", $package_row['subunit_id']); for($tmp_k = 0; $tmp_k < ($materials_number/2) - 1; $tmp_k++) { echo "&nbsp;<br />"; };  echo $subunit[1]; ?></td>
			<td width="91" rowspan="<?php echo $materials_number; ?>" style="border: 1px solid #000;border-bottom: 2pt solid #000"><?php for($tmp_k = 0; $tmp_k < ($materials_number/2) - 1; $tmp_k++) { echo "&nbsp;<br />"; } ; $tmp_date = explode('-', fixdate($package_row['last_update'])); if($package_row['last_update'] != "0000-00-00") { echo $tmp_date[2]."/".$tmp_date[1]."/".$tmp_date[0]; } //echo date("d/m/Y", $package_row['last_update']); ?></td>
			<td width="91" rowspan="<?php echo $materials_number; ?>" style="border: 1px solid #000;border-bottom: 2pt solid #000"><?php for($tmp_k = 0; $tmp_k < ($materials_number/2) - 1; $tmp_k++) { echo "&nbsp;<br />"; } ; $tmp_date = explode('-', fixdate($package_row['next_update'])); if($package_row['next_update'] != "0000-00-00") { echo $tmp_date[2]."/".$tmp_date[1]."/".$tmp_date[0]; } //echo date("d/m/Y", $package_row['next_update']); ?></td>
		</tr>
		<?php for($tmp_i = 0; $tmp_i < $materials_number-1; $tmp_i++) { ?>
		<?php if($tmp_i == ($materials_number - 2)) { $tmp_style = 'border: 1px solid #000;border-bottom: 2pt solid #000000'; } else { $tmp_style = ""; } ?>
			<tr>
				<?php if(isset($all_materials_of_package[$tmp_i]['name'])) { ?>
					<td style="text-align: left <?php echo $tmp_style; ?>"><?php if(($package_row['package_letter'] == "a") && ($all_materials_of_package[$tmp_i]['material_id'] != 30 && $all_materials_of_package[$tmp_i]['material_id'] != 31)) { echo "ΠΛΗΝ "; } ?> <?php $string = (strlen($all_materials_of_package[$tmp_i]['name']) > 58 ? substr($all_materials_of_package[$tmp_i]['name'],0,56)."." : $all_materials_of_package[$tmp_i]['name']); echo $string; ?></td>
					<td style="<?php echo $tmp_style; ?>"><?php echo $all_materials_of_package[$tmp_i]['size']; ?></td>
					<td style="<?php echo $tmp_style; ?>"><?php echo $all_materials_of_package[$tmp_i]['quantity']; ?></td>
				<?php } else { ?>
					<td style="<?php echo $tmp_style; ?>">&nbsp;</td>
					<td style="<?php echo $tmp_style; ?>">&nbsp;</td>
					<td style="<?php echo $tmp_style; ?>">&nbsp;</td>
				<?php } ?>
			</tr>

		<?php } ?>
		<?php } ?>
	</tbody>
<?php } ?>