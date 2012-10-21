	<?php $material_aa = 0; ?>
<?php while($row = mysql_fetch_assoc($material_result)) { ?>
<?php 
	include("../partials/database-connect-old-nice-way.inc.php");
	include("sum-all-materials/prepare_mat_variables.php"); 
?>

<?php if($material_aa == 2 || $material_aa == 4 || $material_aa == 5) { ?>
<?php include("print-bpackages-footer.php"); ?>
<div style="page-break-after: always"></div>
<div style="text-align: center;">Γ - <?php echo 1 + $page_number++; ?></div>
<table>
	<tr>
		<td style="text-decoration: underline; font-weight: bold; float: left; width: 455pt;">ΑΠΟΡΡΗΤΟ-ΕΠΣ</td>
	</tr>
</table>
<?php } ?>



<h4 class="material-header" style="text-align: center;"><span style="font-weight: normal;"><?php echo "ΠΙΝΑΚΑΣ ".++$material_aa."<br />"; ?></span> <?php echo $row['name']."<br />"; ?></h4>
<br />
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
	  
	  <td><?php if(is_numeric($size_row['size_id'])) { $isnum = "No"; } else { $isnum = ""; } ?><?php echo $isnum." ".$size_row['size_id']; ?></td><td><?php echo $size_row['percentage']; ?>%</td><td><?php include("sum-all-materials/provlepomena.php"); ?></td><td><?php include("sum-all-materials/print-iparxonta.php"); ?></td><td><?php include("sum-all-materials/eliponta.php"); ?></td><td><?php include("sum-all-materials/pleonazonta.php"); ?></td><td></td>
	</tr>
	<?php } ?>
	<tr><td colspan="4" class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $percentage; ?>%</td><td><?php echo $material_prov_power; ?></td><td><?php echo $sum_iparxon; ?></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
	</tbody>
</table>
<?php } ?>
