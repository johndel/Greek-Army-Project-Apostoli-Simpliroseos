<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $title = "Διαχείριση Υλικών Οπλισμού";
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>

<?php 
	include("../partials/database-connect-old-nice-way.inc.php");
	$packages_query = "SELECT * FROM oplismou_packages"; 
	$packages_result = mysql_query($packages_query);
?>

<h4>Βιβλίο Δεμάτων Οπλισμού</h4>

<a href="/oplismou/new-package.php" class="btn btn-success" style="color: #fff;"><i class="icon-plus-sign"></i> Προσθήκη νέου Δέματος Οπλισμού</a>
<table class="nice-table" id="myTable">
	<thead>
		<tr>
			<th>Αριθμός Δέματος</th><th>Πυρ/χία</th><th>Ενέργειες</th>
		</tr>
	</thead>
	<tbody>
	<?php while($packages = mysql_fetch_assoc($packages_result)) { ?>
		<tr>
			<td><?php echo $packages['number'] ?></td>
			<td>
			<?php
			$subunits_query = 'SELECT * FROM subunits ORDER BY subunits ASC';
			$subunits_result = mysql_query($subunits_query) or die(mysli_error());
			while($sub = mysql_fetch_assoc($subunits_result)) {
				if($sub['id'] == $packages['subunit_id']) { echo $sub['subunits']; }
			} ?>
</td>
			</td>
			<td><a class="btn" href="edit-package.php?package_id=<?php echo $packages['id']; ?>"><i class="icon-pencil"></i> Επεξεργασία</a> <a class="btn btn-primary" href="print-one.php?package_id=<?php echo $packages['id'] ?>" target="_blank"><i class="icon-print"></i> Εκτύπωση</a> <a class="btn btn-danger" href="delete-package.php?package_id=<?php echo $packages['id']; ?>" onClick="return confirm('Σίγουρα να διαγραφεί το συγκεκριμένο δέμα;');"><i class="icon-trash"></i> Διαγραφή</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>


<?php include("../partials/footer.inc.php") ?>