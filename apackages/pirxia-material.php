<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>

<?php
	include("../partials/database-connect-old-nice-way.inc.php");
	include("../partials/wrapper-functions.php");
?>

<?php
	$demata = select_all_records("a_packages", "subunit_id", $_GET['subunit']);
	$demata_count = sizeof($demata);
	$subunit = subunit($_GET['subunit']);
	$pirxia_power = $subunit['provlepomeni_dinami'];
	
	$material_aa = 0;
	$materials_a_no_size = select_a_materials_no_size();
	$materials_a_size = select_a_materials_size();
?>


<link rel="stylesheet" href="/css/sum-all-materials-print.css" media="print">

<h2>Υπομονάδα: <?php echo $subunit['subunits']; ?></h2>
<h4>Σύνολο Δεμάτων Πίνακα Α: <?php echo $demata_count; ?> - Δύναμη: <?php echo $pirxia_power; ?></h4>
<a class="btn btn-primary" href="print-apackages-pirxia.php?subunit=<?php echo $_GET['subunit'] ?>"><i class="icon-print"></i> Εκτύπωση Πίνακα Α</a>

<?php while($row = mysql_fetch_assoc($materials_a_no_size)) { ?>
	<div style="display: none"><?php include("pirxia/prepare_variables.php"); ?></div>
	<h4 class="material-header"><?php echo ++$material_aa." ".$row['name']; ?></h4>
		<table class="nice-table">
			<thead>
				<tr>
					<th>&nbsp;</th><th>ΠΡΟΒΛΕΠΟΜ.</th><th>ΥΠΑΡΧΟΝΤΑ</th><th>ΕΛΛΕΙΠΟΝΤΑ</th>
					<th>ΠΛΕΟΝΑΖΟΝΤΑ</th><th>ΠΑΡΑΤΗΡΗΣΕΙΣ</th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo floor($material_prov_power); ?></td><td><?php echo count_subunit_a_materials($row['id'], $_GET['subunit']); ?> <a href="iparxonta-positions-no-size-pirxia.php?material=<?php echo $row['id']; ?>&subunit=<?php echo $_GET['subunit']; ?>"><?php //if(isset($sum_iparxon[0])) { echo "<br />Λείπουν ".$sum_iparxon[0]." από τα δέματα που έχουν περαστεί"; } ?></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo floor($elipon_sum); } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
			</tbody>
		</table>
<?php } ?>






<?php while($row = mysql_fetch_assoc($materials_a_size)) { ?>
<?php include("pirxia/prepare_variables_size.php"); ?>

	<h4 class="material-header"><?php echo ++$material_aa." ".$row['name']; ?></h4>
<table class="nice-table">
	<thead>
	<tr>
		<th>Α/Α</th><th>ΑΡΙΘΜΟΣ <br /> ΟΝΟΜΑΣΤΙΚΟΥ</th><th>ΜΕΓΕΘΟΣ</th><th class="vertical">ΠΟΣΟΣΤΟ(%)</th>
		<th class="vertical">ΠΡΟΒΛΕΠΟΜ.</th><th class="vertical">ΥΠΑΡΧΟΝΤΑ</th><th class="vertical">ΕΛΛΕΙΠΟΝΤΑ</th>
		<th class="vertical">ΠΛΕΟΝΑΖΟΝΤΑ</th><th class="vertical">ΠΑΡΑΤΗΡΗΣΕΙΣ</th>
	</tr>
	</thead>
	
	<?php 
	    $sizes_query = "SELECT * FROM a_sizes WHERE material_id=".$row['id']; 
		$sizes_result = mysql_query($sizes_query) or die(mysql_error());
		$count_sizes = mysql_num_rows($sizes_result);
	?>
	
	<tbody>
	<?php 
		$a_a = 0; 
		$percentage = 0;
		$tmp_size_count = 0;
	?>
	<?php while($size_row = mysql_fetch_assoc($sizes_result)) { 
	$tmp_size_count++;
	?>
	<?php $percentage = $percentage + $size_row['percentage']; ?>	
	<tr>
		<td><?php echo ++$a_a; ?></td><td><?php echo $size_row['named_number']; ?></td>
	  <td><?php if(is_numeric($size_row['size'])) { $isnum = "No"; } else { $isnum = ""; } ?><?php echo $isnum." ".$size_row['size']; ?></td><td><?php echo $size_row['percentage']; ?>%</td><td><?php include("pirxia/provlepomena.php"); ?></td><td><?php include("pirxia/iparxonta.php"); ?></td><td><?php include("pirxia/eliponta.php"); ?></td><td><?php include("pirxia/pleonazonta.php"); ?></td><td></td>
	</tr>
	
	
	<?php } ?>
	<tr><td colspan="3" class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $percentage; ?>%</td><td><?php echo $material_prov_power; ?></td><td><a href='iparxonta-positions-pirxia.php?material=<?php echo $row['id']; ?>&size=all&subunit=<?php echo $_GET['subunit']; ?>'><?php echo $sum_iparxonta; ?></a></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
	</tbody>
</table>
	
	
	
<?php } ?>

<?php include("../partials/footer.inc.php") ?>