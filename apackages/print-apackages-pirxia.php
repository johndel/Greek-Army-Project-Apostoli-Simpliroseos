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
	window.print();
}
</script>

  <title>
	<?php if (isset($title)) { 
		echo $title; } else {
		echo "Αποστολή Συμπληρώσεως ΑΠΟΘΗΚΗ"; } 
	?>
  </title>  
  

  <meta name="description" content="<?php echo $title; ?>">
  <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/css/general.css">
  <link rel="stylesheet" href="/css/my-general.css">

  <link rel="stylesheet" href="/css/demo_table.css">
  <link rel="stylesheet" href="/css/print-table.css"> 
 
  
<?php
	$demata = select_all_records("a_packages", "subunit_id", $_GET['subunit']);
	$demata_count = sizeof($demata);
	$subunit = subunit($_GET['subunit']);
	$pirxia_power = $subunit['provlepomeni_dinami'];
	
	$material_aa = 0;
	$materials_a_no_size = select_a_materials_no_size();
	$materials_a_size = select_a_materials_size();
	$aa_break = 0;
?>

<h2>Υπομονάδα: <?php echo $subunit['subunits']; ?></h2>
<h4>Σύνολο Δεμάτων Πίνακα Α: <?php echo $demata_count; ?> - Δύναμη: <?php echo $pirxia_power; ?></h4>
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
				<tr><td class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $material_prov_power; ?></td><td><?php echo count_subunit_a_materials($row['id'], $_GET['subunit']); ?></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
			</tbody>
		</table>
<?php 
$aa_break++;
if(($aa_break % 9) == 0) { ?>
<div style="page-break-after: always"></div>
<?php } ?>
<?php } ?>







<div style="page-break-after: always"></div>

<?php while($row = mysql_fetch_assoc($materials_a_size)) { ?>
<?php include("pirxia/prepare_variables_size.php"); ?>

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
	  <td><?php if(is_numeric($size_row['size'])) { $isnum = "No"; } else { $isnum = ""; } ?><?php echo $isnum." ".$size_row['size']; ?></td><td><?php echo $size_row['percentage']; ?>%</td><td><?php include("pirxia/provlepomena.php"); ?></td><td><?php include("pirxia/iparxonta-simple-print.php"); ?></td><td><?php include("pirxia/eliponta.php"); ?></td><td><?php include("pirxia/pleonazonta.php"); ?></td><td></td>
	</tr>
	
	
	<?php } ?>
	<tr><td colspan="3" class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $percentage; ?>%</td><td><?php echo $material_prov_power; ?></td><td><?php echo $sum_iparxonta; ?></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
	</tbody>
</table>
	
	
	
<?php } ?>

<?php include("../partials/footer.inc.php") ?>