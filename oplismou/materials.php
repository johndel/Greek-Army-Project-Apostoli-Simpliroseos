<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $title = "Επεξεργασία Υλικών Οπλισμού";
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>

<?php 
	include("../partials/database-connect-old-nice-way.inc.php");
	$materials_query = "SELECT * FROM oplismou_materials"; 
	$materials_result = mysql_query($materials_query);
?>

<a href="/oplismou/new-material.php">Προσθήκη νέου υλικού οπλισμού</a>
<table class="nice-table">
	<thead>
		<tr>
			<th>Περιγραφή Υλικού</th><th>Μονάδα Μέτρησης</th><th>Παρατηρήσεις</th><th>Ενέργειες</th>
		</tr>
	</thead>
	<tbody>
	<?php while($materials_row = mysql_fetch_assoc($materials_result)) { ?>
		<tr>
			<td><?php echo $materials_row['yliko'] ?></td><td><?php echo $materials_row['monada_metrisis'] ?></td><td><?php echo $materials_row['comments'] ?></td><td><a href="edit-material.php?material_id=<?php echo $materials_row['id']; ?>">Επεξεργασία</a> <a href="delete-material.php?material_id=<?php echo $materials_row['id']; ?>">Διαγραφή</a></td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<?php include("../partials/footer.inc.php") ?>