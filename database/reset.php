<?php include("../partials/wrapper-functions.php") ?>
<?php include("../partials/database-connect-old-nice-way.inc.php"); ?>
<?php $base = $_SERVER['HTTP_HOST']; //. $_SERVER['REQUEST_URI']; ?>

<?php
/*
$query = "TRUNCATE TABLE a_materials_packages;";
mysql_query($query);

$query = "TRUNCATE TABLE b_materials_packages;";
mysql_query($query);

$query = "TRUNCATE TABLE oplismou_materials_packages;";
mysql_query($query);

$query = "TRUNCATE TABLE a_packages;";
mysql_query($query);

$query = "TRUNCATE TABLE b_packages;";
mysql_query($query);

$query = "TRUNCATE TABLE oplismou_packages;";
mysql_query($query);

$query = "TRUNCATE TABLE dinami_oplismou;";
mysql_query($query);

$query = "UPDATE subunits ;";
mysql_query($query);
*/
$query = "DROP DATABASE diaxeirisi;";
mysql_query($query);

$query = "CREATE DATABASE diaxeirisi;";
mysql_query($query);


include("../partials/database-connect-old-nice-way.inc.php");

$sql = explode(";",file_get_contents("http://".$base."/database/blank.sql"));

foreach($sql as $query)
 mysql_query($query);
?>

<?php header("Location: http://".$base); ?>


