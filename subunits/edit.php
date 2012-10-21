<?php include("../partials/wrapper-functions.php"); ?>
<?php include("../partials/database-connect-old-nice-way.inc.php"); ?>
<?php 
	//return "TeSSTT";
	//print_r($_POST);
	//echo "Ok :D ΠΑιζει";
	//return "test";
	list($id, $column) = explode("-", $_POST['id']);
	echo update_specific_subunit_value($id, $column, $_POST['value']);
?>