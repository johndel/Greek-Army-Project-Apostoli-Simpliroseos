<?php include("../partials/wrapper-functions.php") ?>
<?php include("../partials/database-connect-old-nice-way.inc.php"); ?>
<?php $base = $_SERVER['HTTP_HOST']; //. $_SERVER['REQUEST_URI']; ?>

<?php 
//$name = backup_tables('localhost','root','','diaxeirisi');
exec("C:\wamp\bin\mysql\mysql5.0.51b\bin\mysqldump -u root diaxeirisi > C:\wamp\www\database\last_backup.sql");

header("Content-disposition: attachment; filename=last_backup.sql"); //Tell the filename to the browser
header('Content-type: application/octet-stream'); //Stream as a binary file! So it would force browser to download
readfile("http://".$base."/database/last_backup.sql");
?>
