<?php 
  $title = "Διαχείριση Υλικών"; 
  include("../partials/database-connect.inc.php");
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>

<?php $sql = 'SELECT * FROM a_materials'; ?>
<?php $result = $conn->query($sql) or die(mysqli_error()); ?>
<h4>Υλικά Πίνακα Α</h4>
<h3>Σύνολο: <?php echo $result->num_rows; ?> υλικά</h3>
<a href="new.php" class="btn btn-success"><i class="icon-plus-sign"></i> Προσθήκη νέου υλικού - Πίνακα Α</a>

<table border=1 id="myTable" class="nice-table">
<thead>
	<tr><th>Α/Α</th><th>Όνομα Υλικού</th><th>Προβλεπόμενη Ποσότητα</th><th>Αναπλ.</th><th>Ενέργειες</th></tr>
</thead>
<tbody>
<?php
  while ($row = $result->fetch_assoc()) { ?>
    <tr>
	<td><?php if(isset($i)) { echo ++$i; } else { $i = 1; echo $i; } ?></td>
 	<td><?php echo $row['name']; ?></td><td style="text-align: center"><?php echo $row['quantity'] ?></td><td style="text-align: center;"><?php echo $row['efedroi']; ?></td><td><a class="btn" href="<?php echo "edit.php?material_id=".$row['id'] ?>"><i class="icon-pencil"></i> Επεξεργασία</a> <a href="delete.php?material_id=<?php echo $row['id'] ?>" onClick="return confirm('Σίγουρα να διαγραφεί το συγκεκριμένο υλικό;');" class="btn btn-danger"><i class="icon-trash"></i> Διαγραφή</a></td>
    </tr>
<?php } ?>
</tbody>
</table>


<?php include("../partials/footer.inc.php") ?>