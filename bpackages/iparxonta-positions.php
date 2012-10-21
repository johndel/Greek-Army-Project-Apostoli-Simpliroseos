<?php
	include("../partials/database-connect-old-nice-way.inc.php");
	include("../partials/wrapper-functions.php");
	
	if(!isset($_GET['subunit'])) {
		$iparxon = iparxonta_b_packages($_GET['material'], $_GET['size']);
	} else {
		$iparxon = iparxonta_b_packages_subunit($_GET['material'], $_GET['size'], $_GET['subunit']);
	}
		$material_name = select_record('b_materials', $_GET['material']);
		$size_name = select_record('b_sizes', $_GET['size']);
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>
<link rel="stylesheet" href="/css/sum-all-materials-print.css" media="print">


<h3><?php echo $material_name[1]; ?> - Μέγεθος: <?php echo $size_name[2]; ?></h3>
<table border=1>
<thead>
<th>Αριθμός Πακέτου</th><th>Πυρχία</th><th>Ποσότητα</th><th>Ενέργεια</th>
</thead>
<tbody>
	<?php 
	while($tmp = mysql_fetch_assoc($iparxon)) {
		echo "<tr><td>".$tmp['number']."</td><td>".$tmp['subunits']."</td><td>".$tmp['quantity']."</td><td><a class='btn' href='/bpackages/edit.php?package_id=".$tmp['id']."'><i class='icon-pencil'></i> Επεξεργασία</a></td></tr>";
	} ?>
</tbody>
</table>
 
 
<?php include("../partials/footer.inc.php") ?>

