<?php 
  $title = "Συγκεντρωτικός Πίνακας Υλικών - Πίνακας Β"; 
  include("../partials/database-connect-old-nice-way.inc.php");

  $subunits = "SELECT * FROM subunits;";
  $result = mysql_query($subunits) or die(mysqli_error());
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>


<table class="nice-table">
	<tr><th>Πίνακας ανά Πυρ/χία</th><th>Δέματα Β</th></tr>
	 <?php while ($row = mysql_fetch_assoc($result)) { ?>
	<tr><td>
		<a href="sum-materials.php?subunit_id=<?php echo $row['id'] ?>"><?php echo $row['subunits'] ?></a>
	</td>
	<td>
	<?php
	$select = "SELECT * FROM b_packages WHERE subunit_id=".$row['id'];
	$result2 = mysql_query($select);
	?>
	<?php echo mysql_num_rows($result2); ?>
	</td>
	</tr>
	<?php } ?>
	<tr>
	  <td><a href="sum-materials.php?subunit_id=0">Σύνολο για ΠΥΡΗΝΕΣ</a></td>
	  <td>
	  	<?php
			$select = "SELECT * FROM b_packages WHERE subunit_id=2 OR subunit_id=4 OR subunit_id=6 OR subunit_id=8 OR subunit_id=10";
			$result2 = mysql_query($select);
		?>
		<?php echo mysql_num_rows($result2); ?>  
	  </td>
	</tr>
	<tr>
	  <td><a href="sum-materials.php">Σύνολο για όλες τις Πυρχίες</a></td>
	  <td>
	  	<?php
			$select = "SELECT * FROM b_packages";
			$result2 = mysql_query($select);
		?>
		<?php echo mysql_num_rows($result2); ?>
	  </td>
	</tr>
</table>

<?php include("../partials/footer.inc.php") ?>