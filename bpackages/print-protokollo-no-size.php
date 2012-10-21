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

	<tr><td class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $material_prov_power; ?></td><td><?php echo $sum_iparxon[0]; ?></td><td><?php if($elipon_sum < 0) { echo "0"; } else { echo $elipon_sum; } ?></td><td><?php if($pleonazon_sum < 0) { echo "0"; } else { echo $pleonazon_sum; } ?></td><td></td></tr>
	</tbody>
</table>

<?php } ?>