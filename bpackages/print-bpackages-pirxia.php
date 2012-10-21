<?php
	include("../partials/database-connect-old-nice-way.inc.php");
	include("../partials/wrapper-functions.php");
?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
<script>
onload = function() {
	//window.print();
}
</script>







<?php
  $packet_query = "SELECT * FROM b_packages WHERE subunit_id = ".$_GET['subunit'];
  $packet_result = mysql_query($packet_query);
  
  $demata = select_all_records("b_packages", "subunit_id", $_GET['subunit']);
  $demata_count = sizeof($demata);
  
  $subunit = subunit($_GET['subunit']);
  $pirxia_power = $subunit['provlepomeni_dinami'];
	
  $title = "Συνολικός Πίνακας Υλικών";
  
  
  if($_GET['subunit'] == 11) { $efedroi_query = " AND efedroi = 1 "; } else { $efedroi_query = ""; }
  
  $materials = "SELECT * FROM b_materials WHERE (id = 13 OR id = 6 OR id = 11 OR id = 5 OR id = 4 OR id = 10) ".$efedroi_query." ORDER BY `b_materials`.`name`";
  $material_result = mysql_query($materials);
  
  $materials_simple_table = "SELECT * FROM b_materials WHERE (id = 1 OR id = 2 OR id = 3 OR id = 8 OR id = 9 OR id = 12) ".$efedroi_query." ORDER BY `b_materials`.`name`";
  $material_simple_result = mysql_query($materials_simple_table);
  
  $materials_no_table = "SELECT * FROM b_materials WHERE (id = 7) ".$efedroi_query." ORDER BY `b_materials`.`name`";
  $material_no_result = mysql_query($materials_no_table);
?>


  <meta name="description" content="<?php echo $title; ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="/css/general.css">
  <link rel="stylesheet" href="/css/my-general.css">

  <link rel="stylesheet" href="/css/demo_table.css">
  <link rel="stylesheet" href="/css/print-table.css"> 
 
 
 
<h2>Υπομονάδα: <?php echo $subunit['subunits']; ?></h2>
<h4>Σύνολο Δεμάτων Πίνακα Β: <?php echo $demata_count; ?> - Δύναμη: <?php echo $pirxia_power; ?></h4>

<?php $material_aa = 0; ?>
<?php while($row = mysql_fetch_assoc($material_result)) { ?>
<?php include("pirxia/prepare_mat_variables.php"); ?>
<h4 class="material-header" ><?php echo ++$material_aa." ".$row['name']; ?></h4>
<table class="nice-table">
	<thead>
	<tr>
		<th rowspan="2" style="white-space: nowrap">Α/Α</th><th rowspan="2">ΑΡΙΘΜΟΣ <br /> ΟΝΟΜΑΣΤΙΚΟΥ</th><th colspan="2">ΜΕΓΕΘΟΣ</th><th class="vertical" rowspan="2">ΠΟΣΟΣΤΟ(%)</th>
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
		include("pirxia/provlepomena.php");
	?>
	<?php while($size_row = mysql_fetch_assoc($sizes_result)) { 
	?>
	<?php $percentage = $percentage + $size_row['percentage']; ?>
	
	<tr>
	  <td><?php echo ++$a_a; ?></td><td><?php echo $size_row['named_number']; ?></td>
	  
	  <td>
        <?php if(sizeOf(explode(" ", $size_row['size_number']) > 3)) { ?>
		  <table border=0 class="size-number-table"><?php foreach(explode(" ", $size_row['size_number']) as $tmp_sizen) { ?><tr><td><?php echo $tmp_sizen; ?></td></tr><?php } ?></table>
	    <?php } ?>
	  </td>
	  
	  <td><?php if(is_numeric($size_row['size_id'])) { $isnum = "No"; } else { $isnum = ""; } ?><?php echo $isnum." ".$size_row['size_id']; ?></td><td><?php echo $size_row['percentage']; ?>%</td><td><?php echo $sizes[$a_a-1]; ?></td><td><?php include("pirxia/iparxonta-print.php"); ?></td><td><?php include("pirxia/eliponta.php"); ?></td><td><?php include("pirxia/pleonazonta.php"); ?></td><td></td>
	</tr>
	<?php } ?>
	<tr><td colspan="4" class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $percentage; ?>%</td><td><?php echo $material_prov_power; ?></td><td><?php echo $sum_iparxonta; ?></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
	</tbody>
</table>
<?php if($material_aa == 2 || $material_aa == 4 || $material_aa == 5) { ?>
<div style="page-break-after: always"></div>
<?php }} ?>








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
		include("pirxia/provlepomena.php");
	?>

	<tr><td class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $material_prov_power; ?></td><td><?php if(isset($sum_iparxon[0])) { echo $sum_iparxon[0]; } else { echo "0"; } ?></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
	</tbody>
</table>
<?php } ?>





<?php while($row = mysql_fetch_assoc($material_simple_result)) { ?>
<?php include("pirxia/prepare_mat_variables.php"); ?>

<h4 class="material-header"><?php echo ++$material_aa." ".$row['name']; ?></h4>
<table class="nice-table">
	<thead>
	<tr>
		<th style="white-space: nowrap">Α/Α</th><th>ΑΡΙΘΜΟΣ <br /> ΟΝΟΜΑΣΤΙΚΟΥ</th><th>ΜΕΓΕΘΟΣ</th><th class="vertical">ΠΟΣΟΣΤΟ(%)</th>
		<th class="vertical">ΠΡΟΒΛΕΠΟΜ.</th><th class="vertical">ΥΠΑΡΧΟΝΤΑ</th><th class="vertical">ΕΛΛΕΙΠΟΝΤΑ</th>
		<th class="vertical">ΠΛΕΟΝΑΖΟΝΤΑ</th><th class="vertical">ΠΑΡΑΤΗΡΗΣΕΙΣ</th>
	</tr>
	</thead>
	
	<?php 
	    $sizes_query = "SELECT * FROM b_sizes WHERE material_id=".$row['id']; 
		$sizes_result = mysql_query($sizes_query) or die(mysql_error());
		$count_sizes = mysql_num_rows($sizes_result);
	?>
	
	<tbody>
	<?php 
		$a_a = 0; 
		$percentage = 0;
		include("pirxia/provlepomena.php");
	?>
	
	<?php while($size_row = mysql_fetch_assoc($sizes_result)) { 
	?>
	<?php $percentage = $percentage + $size_row['percentage']; ?>	
	<tr>
		<td><?php echo ++$a_a; ?></td><td><?php echo $size_row['named_number']; ?></td>
	  <td><?php if(is_numeric($size_row['size_id'])) { $isnum = "No"; } else { $isnum = ""; } ?><?php echo $isnum." ".$size_row['size_id']; ?></td><td><?php echo $size_row['percentage']; ?>%</td><td><?php echo $sizes[$a_a-1]; ?></td><td><?php include("pirxia/iparxonta-print.php"); ?></td><td><?php include("pirxia/eliponta.php"); ?></td><td><?php include("pirxia/pleonazonta.php"); ?></td><td></td>
	</tr>
	<?php } ?>
	<tr><td colspan="3" class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $percentage; ?>%</td><td><?php echo $material_prov_power; ?></td><td><?php echo $sum_iparxonta; ?></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
	</tbody>
</table>

<?php if(($material_aa == 8 || $material_aa == 11)) { ?>
<div style="page-break-after: always"></div>
<?php }} ?>



<?php include("../partials/footer.inc.php") ?>


