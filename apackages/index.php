<?php 
  $title = "Διαχείριση Δεμάτων"; 
  include("../partials/database-connect.inc.php");
  include("../partials/wrapper-functions.php");
?>




<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>

<?php $sql = 'SELECT * FROM a_packages ORDER BY number ASC'; ?>
<?php $result = $conn->query($sql) or die(mysqli_error()); ?>
<h4>Επεξεργασία - Προσθήκη - Διαγραφή Υλικών Πίνακα Α</h4>
<h3>Σύνολο: <?php echo $result->num_rows; ?> δέματα</h3>
<a href="new.php" class="btn btn-success"><i class="icon-plus-sign"></i> Προσθήκη νέου δέματος - Πίνακα A</a>

<table id="myTable" class="tablesorter" border="1">
<thead><tr><th>Α/Α</th><th>Αριθμός Δέματος</th><th>Υπομονάδα</th><th>Τελευταία Συντήρηση</th><th>Επόμενη Συντήρηση</th><th>Ενέργειες</th></tr></thead>
<?php
  while ($row = $result->fetch_assoc()) { ?>
    <tr>
	<td><?php if(isset($i)) { echo ++$i; } else { $i = 1; echo $i; } ?></td>
 	<td><?php echo $row['number']; ?></td>
<td>
<?php
  $subunits_query = 'SELECT * FROM subunits ORDER BY subunits ASC';
  $subunits_result = $conn->query($subunits_query) or die(mysli_error());
while($sub = $subunits_result->fetch_assoc()) {
    if($sub['id'] == $row['subunit_id']) { if($row['subunit_id'] != 10) { echo $sub['subunits']; } else { echo "Π/Δ ΠΥΡΗΝΕΣ";} }
  } ?>
</td>

<td><?php echo reverse_date($row['last_update']); ?></td>
<td><?php echo reverse_date($row['next_update']); ?></td><td><a class="btn" href="<?php echo "edit.php?package_id=".$row['id'] ?>"><i class="icon-pencil"></i> Επεξεργασία</a> <a class="btn btn-primary" href="print.php?package_id=<?php echo $row['id']; ?>" target="_blank"><i class="icon-print"></i> Εκτύπωση 1</a> <a href="print-one.php?package_id=<?php echo $row['id']; ?>" target="_blank" class="btn btn-warning"><i class="icon-print"></i> Εκτύπωση 2</a> <a class="btn btn-danger" href="delete.php?package_id=<?php echo $row['id'] ?>" onClick="return confirm('Σίγουρα να διαγραφεί το συγκεκριμένο δέμα;');"><i class="icon-trash"></i> Διαγραφή</a></td>
    </tr>
<?php } ?>
</table>


<?php include("../partials/footer.inc.php") ?>