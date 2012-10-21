<?php 
  $conn = mysql_connect("localhost", "root", "") or die ("Cannot open database");
  mysql_select_db("diaxeirisi", $conn);
  mysql_set_charset('utf8', $conn);
?>
