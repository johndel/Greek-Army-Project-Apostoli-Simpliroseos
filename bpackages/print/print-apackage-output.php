<?php
	include("../partials/database-connect-old-nice-way.inc.php");
	include("../partials/wrapper-functions.php");
?>


<?php
	$pirxia_result = select_one_table("subunits");
	while($pirxia = mysql_fetch_assoc($pirxia_result)) {
		$pirxia_power = $pirxia_power + $pirxia['provlepomeni_dinami'];
	}

	$function_query = "SELECT * FROM `a_materials` WHERE id=".$_GET['material_id'];
	$row_query = mysql_query($function_query) or die("test");
	$row = mysql_fetch_assoc($row_query) or die(mysql_error());
	$has_sizes = check_material_sizes($_GET['material_id'], 'a');
?>

<?php if($has_sizes == "false") { ?>
	<div style="display: none"><?php include("prepare_variables.php"); ?></div>
		
		<?php if(($_GET['pinakas'] % 6) != 0 && ($_GET['pinakas'] != 1)) { ?>
			<br /><br /><br />
		<?php } ?>
	
		<div style="text-align: center;text-decoration: underline; font-size: 10pt;">
			ΠΙΝΑΚΑΣ <?php echo $_GET['pinakas']; ?>
			<div style="font-weight: bold;"><?php echo $row['name']; ?></div>
		</div>
		<table border="1" style="text-align: center;">
				<tr style="font-weight: bold;">
					<td style="width: 100pt">&nbsp;</td>
					<td style="width: 95pt;">ΠΡΟΒΛΕΠΟΜΕΝΑ</td>
					<td>ΥΠΑΡΧΟΝΤΑ</td>
					<td>ΕΛΛΕΙΠΟΝΤΑ</td>
					<td>ΠΛΕΟΝΑΖΟΝΤΑ</td>
					<td>ΠΑΡΑΤΗΡΗΣΕΙΣ</td>
				</tr>
				<tr>
					<td style="font-weight: bold; width: 100pt">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td>
					<td><?php echo $material_prov_power; ?></td>
					<td><?php count_sum_a_materials($row['id']); ?></td>
					<td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td>
					<td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td>
					<td>&nbsp;</td>
				</tr>
		</table>
		
<?php } else { ?>
<?php include("prepare_variables_size.php"); ?>
	<div style="text-align: center;text-decoration: underline; font-size: 10pt;">
		ΠΙΝΑΚΑΣ <?php echo $_GET['pinakas']; ?><br />
		<div>
			ΠΟΣΟΣΤΙΑΙΑ ΑΝΑΛΟΓΙΑ ΜΕΓΕΘΩΝ
			<div style="font-weight: bold;"><?php echo $row['name']; ?> ΕΦΕΔΡΩΝ</div>
		</div>
	</div>
	<table border="1" style="text-align: center;">
		<tr style="font-weight: bold">
			<td style="width: 25pt">&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />Α/Α</td><td style="width: 85pt">&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />ΑΡΙΘΜΟΣ <br /> ΟΝΟΜΑΣΤΙΚΟΥ</td><td>&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />ΜΕΓΕΘΟΣ</td><td>&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />ΠΟΣΟΣΤΟ<br />(%)</td>
			<td style="width: 25pt">&nbsp;<br /><img src="/images/print/provlepomena.png" />&nbsp;<br /></td>
			<td style="width: 25pt">&nbsp;<br /><img src="/images/print/iparxonta.png" />&nbsp;<br /></td>
			<td style="width: 25pt">&nbsp;<br /><img src="/images/print/eliponta.png" />&nbsp;<br /></td>
			<td style="width: 25pt">&nbsp;<br /><img src="/images/print/pleonazonta.png" />&nbsp;<br /></td>
			<td style="width: 221pt">&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />ΠΑΡΑΤΗΡΗΣΕΙΣ</td>
		</tr>
		<?php 
			$sizes_query = "SELECT * FROM a_sizes WHERE material_id=".$row['id']; 
			$sizes_result = mysql_query($sizes_query) or die(mysql_error());
		?>
		
		<?php 
			$a_a = 0; 
			$percentage = 0;
		?>
		<?php while($size_row = mysql_fetch_assoc($sizes_result)) { ?>
		<?php $percentage = $percentage + $size_row['percentage']; ?>	
		<tr>
			<td style="width: 25pt"><?php echo ++$a_a; ?></td><td style="width: 85pt"><?php echo $size_row['named_number']; ?></td>
			<td><?php if(is_numeric($size_row['size'])) { $isnum = "No"; } else { $isnum = ""; } ?><?php echo $isnum." ".$size_row['size']; ?></td><td><?php echo $size_row['percentage']; ?>%</td><td style="width: 25pt"><?php include("sum-all-materials/provlepomena.php"); ?></td><td style="width: 25pt"><?php include("sum-all-materials/iparxonta-print.php"); ?></td><td style="width: 25pt"><?php include("sum-all-materials/eliponta.php"); ?></td><td style="width: 25pt"><?php include("sum-all-materials/pleonazonta.php"); ?></td><td>&nbsp;</td>
		</tr>
		
		
		<?php } ?>
		<tr><td colspan="3" style="font-weight: bold;">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $percentage; ?>%</td><td><?php echo $material_prov_power; ?></td><td><?php echo $sum_iparxonta; ?></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td style="width: 221pt">&nbsp;</td></tr>
	</table>
<?php } ?>