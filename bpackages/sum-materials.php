<?php
  include("../partials/database-connect-old-nice-way.inc.php");
  $pirxia_query = "SELECT * FROM subunits WHERE id =".$_GET['subunit_id'];
  $pirxia_result = mysql_query($pirxia_query);
  
  $packet_query = "SELECT * FROM b_packages WHERE subunit_id=".$_GET['subunit_id'];
  $packet_result = mysql_query($packet_query);
  
  while($pirxia = mysql_fetch_assoc($pirxia_result)) {
	$pirxia_power = $pirxia['provlepomeni_dinami'];
	$pirxia_name = $pirxia['subunits'];
  }
  // $title = "Πίνακας Υλικών για την Πυρ/χία ".$pirxia_name;
  
  
  $materials = "SELECT * FROM b_materials";
  $result = mysql_query($materials);
  ?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>

<?php  ?>
	<h2>Πυρχία: <?php echo $pirxia_name; ?> - Σύνολο Δεμάτων Β: <?php echo mysql_num_rows($packet_result); ?> - Προβλεπόμενη Δύναμη: <?php echo $pirxia_power; ?></h2>
<?php  ?>
	
<?php while($row = mysql_fetch_assoc($result)) { ?>
<h4 class="material-header"><?php echo $row['id']." ".$row['name']; ?></h2>
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
		$sizes_result = mysql_query($sizes_query);
	?>
	
	<tbody>
	<?php 
		$a_a = 0; 
		$percentage = 0;
	?>
	<?php while($size_row = mysql_fetch_assoc($sizes_result)) { ?>
		<?php $percentage = $percentage + $size_row['percentage']; ?>
	<tr>
	  <td><?php echo ++$a_a; ?></td><td><?php echo $size_row['named_number']; ?></td><td></td><td><?php echo $size_row['size_id']; ?></td><td><?php echo $size_row['percentage']; ?>%</td><td></td><td></td><td></td><td></td><td></td>
	</tr>
	<?php } ?>
	<tr><td colspan="4" class="general_sum">ΓΕΝΙΚΟ ΣΥΝΟΛΟ</td><td><?php echo $percentage; ?>%</td><td></td><td></td><td></td><td></td><td></td></tr>
	</tbody>
</table>
<?php } ?>
<?php include("../partials/footer.inc.php") ?>