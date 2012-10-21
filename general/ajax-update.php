<?php include("../partials/wrapper-functions.php"); ?>
<?php include("../partials/database-connect-old-nice-way.inc.php"); ?>
<?php 
	list($datatype, $id, $pinakas_type, $size) = explode("-", $_POST['id']);
	update_apografi($datatype, $id, $pinakas_type, $_POST['value'], $size);
	echo $_POST['value'];
?>