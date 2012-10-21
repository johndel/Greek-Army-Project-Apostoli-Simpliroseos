<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $title = "Εκτύπωση Δελτίου Συσκευασίας";
?>


<?php include("../partials/head.inc.php") ?>
<link rel="stylesheet" href="/css/oplismou-print.css" media="print">
<?php include("../partials/menu.inc.php") ?>
<a href="javascript:window.print();">Εκτύπωση</a>
<?php include("../partials/footer.inc.php") ?>