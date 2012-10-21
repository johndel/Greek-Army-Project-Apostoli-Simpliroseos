<?php
$database = "diaxeirisi";

$conn = mysql_connect("localhost", "root", "");
mysql_query("CREATE DATABASE $database");
mysql_select_db($database, $conn);
mysql_set_charset('utf8', $conn);
exec("C:\wamp\bin\mysql\mysql5.0.51b\bin\mysql -u root $database < C:\wamp\www\database\blank.sql");
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

 Δημιουργήθηκε η εφαρμογή. Πατήστε <a href="http://localhost">εδώ</a> για να μεταφερθείτε.