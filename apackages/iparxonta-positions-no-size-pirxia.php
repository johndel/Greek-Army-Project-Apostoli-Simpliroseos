<?php
	include("../partials/database-connect-old-nice-way.inc.php");
	include("../partials/wrapper-functions.php");
	$iparxon = iparxonta_a_packages_no_size($_GET['material']);
	
	$material_name = select_record('a_materials', $_GET['material']);
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>
<link rel="stylesheet" href="/css/sum-all-materials-print.css" media="print">


<h3><?php echo $material_name[1]; ?></h3>
<table border=1>
<thead>
<th>Αριθμός Πακέτου</th><th>Πυρχία</th><th>Ποσότητα</th><th>Ενέργεια</th>
</thead>
<tbody>
	<?php 
	while($tmp = mysql_fetch_assoc($iparxon)) {
		echo "<tr><td>".$tmp['number']."</td><td>".$tmp['subunits']."</td><td>".$tmp['quantity']."</td><td><a href='/apackages/edit.php?package_id=".$tmp['id']."' class='btn'><i class='icon-pencil'></i> Επεξεργασία</a></td></tr>";
	} ?>
</tbody>
</table>
 
 
<?php include("../partials/footer.inc.php") ?>

