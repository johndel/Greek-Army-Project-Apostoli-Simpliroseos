<?php 
  $title = "Βιβλίο Δεμάτων";
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>
<?php include("../partials/wrapper-functions.php") ?>
<?php include("../partials/database-connect-old-nice-way.inc.php"); ?>

<h4>Βιβλίο Δεμάτων</h4>

<a class="btn btn-primary" href="print-book2.php" target="_blank"><i class="icon-print"></i> Εκτύπωση Βιβλίου Δεμάτων χωρίς ημερομηνία επόμενης συντήρησης</a> 
-
<a class="btn btn-primary" href="print-book.php" target="_blank"><i class="icon-print"></i> Εκτύπωση Βιβλίου Δεμάτων</a> <i>(Χρειάζεται 2-3 λεπτά)</i><br /><br />

<table border="1">
	<thead>
		<tr>
			<th colspan="7" style="font-size: 20px">ΒΙΒΛΙΟ ΔΕΜΑΤΩΝ</th>
		</tr>
		<tr>
			<th>ΑΡ. ΔΕΜ.</th><th>ΕΙΔΟΣ ΥΛΙΚΟΥ</th><th>ΜΕΓΕΘΟΣ</th><th>ΠΟΣΟΤΗΤΑ</th><th>ΤΜΗΜΑ</th><th>ΤΕΛ. ΣΥΝΤ.</th><th>ΕΠΟΜ. ΣΥΝΤ.</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$tmp = select_all_packages();
			while($package_row = mysql_fetch_assoc($tmp)) { ?>
			<?php $materials_number = material_count($package_row['id'], $package_row['package_letter']); $all_materials_of_package = all_package_material($package_row['id'], $package_row['package_letter']); ?>
			<?php if($materials_number < 8) { $materials_number = 8; } ?>
		<tr>
			<td rowspan="<?php echo $materials_number; ?>" class="td-vertical-align"><?php echo $package_row['number']; ?></td>
			<td style="text-align: center;"><?php if($package_row['package_letter'] == "a") { echo "ΥΛΙΚΑ ΠΙΝΑΚΑ Α"; } else { echo "ΥΛΙΚΑ ΠΙΝΑΚΑ Β";} ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			
			<td rowspan="<?php echo $materials_number; ?>" class="td-vertical-align"><?php $subunit = select_record("subunits", $package_row['subunit_id']); echo $subunit[1]; ?></td>
			<td rowspan="<?php echo $materials_number; ?>" class="td-vertical-align"><?php echo show_today_date(fixdate(($package_row['last_update'])), $today_date[2]); ?></td>
			<td rowspan="<?php echo $materials_number; ?>" class="td-vertical-align"><?php echo show_today_date(fixdate(($package_row['next_update'])), $today_date[2]); ?></td>
		</tr>
		<?php for($tmp_i = 0; $tmp_i < $materials_number-1; $tmp_i++) { ?>
			<tr <?php if($tmp_i == ($materials_number-2)) { ?>class="last_row"<?php } ?>>
				<?php if(isset($all_materials_of_package[$tmp_i]['name'])) { ?>
					<td><?php if(($package_row['package_letter'] == "a") && ($all_materials_of_package[$tmp_i]['material_id'] != 30 && $all_materials_of_package[$tmp_i]['material_id'] != 31)) { echo "ΠΛΗΝ "; } ?> <?php echo $all_materials_of_package[$tmp_i]['name']; ?></td>
					<td style="text-align: center;"><?php echo $all_materials_of_package[$tmp_i]['size']; ?></td>
					<td style="text-align: center;"><?php echo $all_materials_of_package[$tmp_i]['quantity']; ?></td>
				<?php } else { ?>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				<?php } ?>
			</tr>
		<?php } ?>
		<?php } ?>
	</tbody>
</table>

<?php include("../partials/footer.inc.php") ?>