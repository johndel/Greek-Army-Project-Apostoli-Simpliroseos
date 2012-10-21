<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>

<?php
	include("../partials/database-connect-old-nice-way.inc.php");
	include("../partials/wrapper-functions.php");
?>

  
<script>
//onload = function() {
//	window.print();
//}
</script>
<?php
  $packet_query = "SELECT * FROM a_packages WHERE subunit_id = ".$_GET['subunit'];
  $packet_result = mysql_query($packet_query);
  
  $demata = select_all_records("a_packages", "subunit_id", $_GET['subunit']);
  $demata_count = sizeof($demata);
  
  $subunit = subunit($_GET['subunit']);
  $pirxia_power = $subunit['provlepomeni_dinami'];
	
  $title = "Συνολικός Πίνακας Υλικών";
  
  
  $materials_simple_table = "SELECT * FROM `a_materials` WHERE id = 30 OR id = 31 AND efedroi = 1 ORDER BY `a_materials`.`name` ";
  $material_simple_result = mysql_query($materials_simple_table);
  
  $materials_no_table = "SELECT * FROM `a_materials` WHERE id != 30 AND id != 31 AND efedroi = 1 ORDER BY `a_materials`.`name`";
  $material_no_result = mysql_query($materials_no_table);
?>



 
  <h2>Υπομονάδα: <?php echo $subunit['subunits']; ?></h2>
<h4>Σύνολο Δεμάτων Πίνακα A: <?php echo $demata_count; ?> - Δύναμη: <?php echo $pirxia_power; ?></h4>
<a class="btn btn-primary" href="print-apackages-pirxia-anapl.php?subunit=<?php echo $_GET['subunit'] ?>"><i class="icon-print"></i> Εκτύπωση Πίνακα Α</a>


<?php $material_aa = 0; ?>


<?php while($row = mysql_fetch_assoc($material_no_result)) { ?>
<?php include("pirxia/prepare_mat_variables_no_result.php"); ?>

<h4 class="material-header"><?php echo ++$material_aa." ".$row['name']; ?></h4>
<table class="nice-table">
	<thead>
	<tr>
		<th>&nbsp;</th><th>ΠΡΟΒΛΕΠΟΜ.</th><th>ΥΠΑΡΧΟΝΤΑ</th><th>ΕΛΛΕΙΠΟΝΤΑ</th>
		<th>ΠΛΕΟΝΑΖΟΝΤΑ</th><th>ΠΑΡΑΤΗΡΗΣΕΙΣ</th>
	</tr>
	</thead>
	
	<tbody>
	<?php 
		$a_a = 0; 
		$percentage = 0;
	?>

	<tr><td class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $material_prov_power; ?></td><td><a href="iparxonta-positions-no-size.php?material=<?php echo $row['id']; ?>&subunit=<?php echo $_GET['subunit']; ?>"><?php if(isset($sum_iparxon[0])) { echo $sum_iparxon[0]; } else { echo "0"; } ?></a></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
	</tbody>
</table>

<?php } ?>



<?php while($row = mysql_fetch_assoc($material_simple_result)) { ?>
<?php include("pirxia/prepare_mat_variables.php"); ?>

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
	?>
	
	<?php while($size_row = mysql_fetch_assoc($sizes_result)) { ?>
	<?php $percentage = $percentage + $size_row['percentage']; ?>	
	
	<tr>
		<td><?php echo ++$a_a; ?></td><td><?php echo $size_row['named_number']; ?></td>
	  <td><?php if(is_numeric($size_row['size'])) { $isnum = "No"; } else { $isnum = ""; } ?><?php echo $isnum." ".$size_row['size']; ?></td><td><?php echo $size_row['percentage']; ?>%</td><td><?php include("pirxia/provlepomena.php"); ?></td><td><?php include("pirxia/print-iparxonta-anapl.php"); ?></td><td><?php include("pirxia/eliponta.php"); ?></td><td><?php include("pirxia/pleonazonta.php"); ?></td><td></td>
	</tr>
	
	
	
	<?php } ?>
	<tr><td colspan="3" class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $percentage; ?>%</td><td><?php echo $material_prov_power; ?></td><td><?php echo $sum_iparxonta; ?></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
	</tbody>
</table>

<?php } ?>


<?php include("../partials/footer.inc.php") ?>

