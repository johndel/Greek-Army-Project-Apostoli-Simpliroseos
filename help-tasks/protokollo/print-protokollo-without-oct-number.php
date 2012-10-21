<table class="nice-table">
<?php include("sum-all-materials/print-all-table-head.php"); ?>

<?php while($row = mysql_fetch_assoc($material_simple_result)) { ?>
<?php include("../../partials/database-connect-old-nice-way.inc.php"); ?>
<?php include("sum-all-materials/prepare_mat_variables.php"); ?>



	
	<?php 
	    $sizes_query = "SELECT * FROM b_sizes WHERE material_id=".$row['id']; 
		$sizes_result = mysql_query($sizes_query) or die(mysql_error());
	?>
	
	<tbody>
	<?php 
		$percentage = 0;
	?>
	<?php while($size_row = mysql_fetch_assoc($sizes_result)) { ?>
	<?php $percentage = $percentage + $size_row['percentage']; ?>	

	<?php if($a_a == 64) { ?>
				</tbody>
				</table>
				<div style="page-break-after: always"></div>
				<table class="nice-table">
				<tbody>
	<?php include("sum-all-materials/print-all-table-head.php"); ?>
	<?php } ?>
	
	<tr>
	  <td><?php echo ++$a_a; ?></td>
	  <td><?php echo $row['name']; ?></td>
	  <td><?php if($size_row['named_number'] != "") { echo $size_row['named_number']; } else { echo " - "; } ?><td style="white-space: nowrap"><?php if(is_numeric($size_row['size_id'])) { $isnum = "No"; } else { $isnum = ""; } ?> <?php echo $isnum." ".$size_row['size_id']; ?></td>
	  <td><?php echo $size_row['percentage']; ?>%</td>
	  <td><?php include("sum-all-materials/provlepomena.php"); ?></td>
	  <td><?php include("sum-all-materials/print-iparxonta.php"); ?></td>
	  <td><?php include("sum-all-materials/diafora.php"); ?></td>
	  <td></td>
	</tr>
	
	
	
	<?php } ?>
<?php } ?>
	</tbody>
</table>