<?php $material_aa = 0; ?>

<table class="nice-table">
<?php include("sum-all-materials/print-all-table-head.php"); ?>
<?php while($row = mysql_fetch_assoc($material_result)) { ?>
<?php 
	include("../../partials/database-connect-old-nice-way.inc.php");
	include("sum-all-materials/prepare_mat_variables.php");
?>
	<?php 
	    $sizes_query = "SELECT * FROM b_sizes WHERE material_id=".$row['id']; 
		$sizes_result = mysql_query($sizes_query) or die(mysql_error());
	?>

	<tbody>
	
	<?php if($a_a == 10 || $a_a == 21) { ?>
	</tbody>
	</table>
	<div style="page-break-after: always"></div>
	<table class="nice-table">
	<tbody>

	<?php include("sum-all-materials/print-all-table-head.php"); ?>

	<?php } ?>	
	
	<?php $percentage = 0; ?>
	<?php while($size_row = mysql_fetch_assoc($sizes_result)) { ?>
	<?php $percentage = $percentage + $size_row['percentage']; ?>
	

	
	<tr>
	  <td><?php echo $a_a = $a_a + 1; ?></td>
	  <td><?php echo $row['name']; ?></td>
	  
	  <td>
        <?php if(sizeOf(explode(" ", $size_row['size_number']) > 3)) { ?>
		  <table border=0 class="size-number-table"><?php foreach(explode(" ", $size_row['size_number']) as $tmp_sizen) { ?><tr><td><?php echo $tmp_sizen; ?></td></tr><?php } ?></table>
	    <?php } ?>
	  </td>
	  
	  <td style="white-space: nowrap"><?php if(is_numeric($size_row['size_id'])) { $isnum = "No"; } else { $isnum = ""; } ?><?php echo $isnum." ".$size_row['size_id']; ?></td><td><?php echo $size_row['percentage']; ?>%</td><td><?php include("sum-all-materials/provlepomena.php"); ?></td><td><?php include("sum-all-materials/print-iparxonta.php"); ?></td><td><?php include("sum-all-materials/diafora.php"); ?></td><td>&nbsp;</td>
	</tr>
	<?php } ?>
<?php } ?>
	</tbody>
</table>
<div style="page-break-after: always"></div>
