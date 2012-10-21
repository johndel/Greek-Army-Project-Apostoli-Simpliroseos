<?php include("../partials/wrapper-functions.php") ?>
<?php include("../partials/database-connect-old-nice-way.inc.php"); ?>
<?php $base = $_SERVER['HTTP_HOST']; //. $_SERVER['REQUEST_URI']; ?>

<?php 
//print_r($_FILES);
?>
<?php

$query = "DROP DATABASE diaxeirisi;";
mysql_query($query);

$query = "CREATE DATABASE diaxeirisi;";
mysql_query($query);

include("../partials/database-connect-old-nice-way.inc.php");

exec("C:\wamp\bin\mysql\mysql5.0.51b\bin\mysql -u root diaxeirisi < ".$_FILES['datafile']['tmp_name']);
/*
$sql = explode(";",file_get_contents($_FILES['datafile']['tmp_name']));

foreach($sql as $query)
 mysql_query($query);
*/
 ?>

<?php header("Location: http://".$base); ?>

