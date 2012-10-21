<?php
$base_name = "http://".$_SERVER['SERVER_NAME']."/";
//ob_start();
$test = file_get_contents($base_name."general/print-book-output.php");
//echo $test;
//ob_end_clean();
?>
