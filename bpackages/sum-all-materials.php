<?php
  include("../partials/database-connect-old-nice-way.inc.php");

  $packet_query = "SELECT * FROM b_packages";
  $packet_result = mysql_query($packet_query);
  
  $pirxia_query = "SELECT * FROM subunits";
  $pirxia_result = mysql_query($pirxia_query);
  
  $pirxia_power = 0;
  while($pirxia = mysql_fetch_assoc($pirxia_result)) {
	$pirxia_power = $pirxia_power + $pirxia['provlepomeni_dinami'];
  }
  $title = "Συνολικός Πίνακας Υλικών";
  
  
  $materials = "SELECT * FROM b_materials WHERE id = 13 OR id = 6 OR id = 11 OR id = 5 OR id = 4 OR id = 10 ORDER BY `b_materials`.`name`";
  $material_result = mysql_query($materials);
  
  $materials_simple_table = "SELECT * FROM b_materials WHERE id = 1 OR id = 2 OR id = 3 OR id = 8 OR id = 9 OR id = 12 ORDER BY `b_materials`.`name`";
  $material_simple_result = mysql_query($materials_simple_table);
  
  $materials_no_table = "SELECT * FROM b_materials WHERE id = 7 ORDER BY `b_materials`.`name`";
  $material_no_result = mysql_query($materials_no_table);
  ?>
<?php 
  include("../partials/wrapper-functions.php");
  $pirxia_efedroi = select_record("subunits", 11); 
?>
  
<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>


<link rel="stylesheet" href="/css/sum-all-materials-print.css" media="print">




	<h2>Σύνολο Δεμάτων Β: <?php echo mysql_num_rows($packet_result); ?> - Δύναμη: <?php echo $pirxia_power;?> + <?php echo $pirxia_efedroi[2]; ?> Αναπληρωματικοί</h2>
	<!--<a class="btn btn-primary" href="print-bpackages-pdf.php"><i class="icon-print"></i> Εκτύπωση Πίνακα Β</a>-->
	<a class="btn btn-primary" href="print-bpackages-all.php" target="_blank"><i class="icon-print"></i> Εκτύπωση Πίνακα Β</a>

	<?php $material_aa = 0; ?>
<?php while($row = mysql_fetch_assoc($material_result)) { ?>
<?php 
	include("../partials/database-connect-old-nice-way.inc.php");
	include("sum-all-materials/prepare_mat_variables.php"); 
?>
<h4 class="material-header"><?php echo ++$material_aa." ".$row['name']; ?></h4>
<table class="nice-table">
	<thead>
	<tr>
		<th rowspan="2">Α/Α</th><th rowspan="2">ΑΡΙΘΜΟΣ <br /> ΟΝΟΜΑΣΤΙΚΟΥ</th><th colspan="2">ΜΕΓΕΘΟΣ</th><th class="vertical" rowspan="2">ΠΟΣΟΣΤΟ(%)</th>
		<th class="vertical" rowspan="2">ΠΡΟΒΛΕΠΟΜ.</th><th class="vertical" rowspan="2">ΥΠΑΡΧΟΝΤΑ</th><th class="vertical" rowspan="2">ΕΛΛΕΙΠΟΝΤΑ</th>
		<th class="vertical" rowspan="2">ΠΛΕΟΝΑΖΟΝΤΑ</th><th class="vertical" rowspan="2">ΠΑΡΑΤΗΡΗΣΕΙΣ</th>
	</tr>
	<tr>
		<th>OKTΑΨΗΦΙΟΣ <br /> ΜΕΓΕΘΟΥΣ</th><th>ΕΝΔΕΙΞΗ</th>
	</tr>
	</thead>
	
	<?php 
	    $sizes_query = "SELECT * FROM b_sizes WHERE material_id=".$row['id']; 
		$sizes_result = mysql_query($sizes_query) or die(mysql_error());
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
	  
	  <td>
        <?php if(sizeOf(explode(" ", $size_row['size_number']) > 3)) { ?>
		  <table border=0 class="size-number-table"><?php foreach(explode(" ", $size_row['size_number']) as $tmp_sizen) { ?><tr><td><?php echo $tmp_sizen; ?></td></tr><?php } ?></table>
	    <?php } ?>
	  </td>
	  
	  <td><?php if(is_numeric($size_row['size_id'])) { $isnum = "No"; } else { $isnum = ""; } ?><?php echo $isnum." ".$size_row['size_id']; ?></td><td><?php echo $size_row['percentage']; ?>%</td><td><?php include("sum-all-materials/provlepomena.php"); ?></td><td><?php include("sum-all-materials/iparxonta.php"); ?></td><td><?php include("sum-all-materials/eliponta.php"); ?></td><td><?php include("sum-all-materials/pleonazonta.php"); ?></td><td></td>
	</tr>
	<?php } ?>
	<tr><td colspan="4" class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $percentage; ?>%</td><td><?php echo $material_prov_power; ?></td><td><?php echo $sum_iparxon; ?></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
	</tbody>
</table>
<?php } ?>









<?php while($row = mysql_fetch_assoc($material_simple_result)) { ?>
<?php include("sum-all-materials/prepare_mat_variables.php"); ?>

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
	    $sizes_query = "SELECT * FROM b_sizes WHERE material_id=".$row['id']; 
		$sizes_result = mysql_query($sizes_query) or die(mysql_error());
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
	  <td><?php if(is_numeric($size_row['size_id'])) { $isnum = "No"; } else { $isnum = ""; } ?><?php echo $isnum." ".$size_row['size_id']; ?></td><td><?php echo $size_row['percentage']; ?>%</td><td><?php include("sum-all-materials/provlepomena.php"); ?></td><td><?php include("sum-all-materials/iparxonta.php"); ?></td><td><?php include("sum-all-materials/eliponta.php"); ?></td><td><?php include("sum-all-materials/pleonazonta.php"); ?></td><td></td>
	</tr>
	
	
	
	<?php } ?>
	<tr><td colspan="3" class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $percentage; ?>%</td><td><?php echo $material_prov_power; ?></td><td><?php echo $sum_iparxon; ?></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
	</tbody>
</table>

<?php } ?>






<?php while($row = mysql_fetch_assoc($material_no_result)) { ?>
<?php include("sum-all-materials/prepare_mat_variables_no_result.php"); ?>

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

	<tr><td class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $material_prov_power; ?></td><td><a href="iparxonta-positions-no-size.php?material=<?php echo $row['id']; ?>"><?php echo $sum_iparxon[0]; ?></a></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
	</tbody>
</table>

<?php } ?>

<?php include("../partials/footer.inc.php") ?>

