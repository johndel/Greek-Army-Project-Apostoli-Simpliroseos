<?php 

  include("../partials/database-connect.inc.php");
      $stmt = $conn->stmt_init();
      $sql1 = 'DELETE FROM a_materials WHERE id = ?';
      $sql2 = 'DELETE FROM a_materials_packages WHERE material_id = ?';

      if (isset($_GET['material_id'])) {
      	if ($stmt->prepare($sql1)) {
	  $stmt->bind_param('i', $_GET['material_id']);
	  $stmt->execute();
	}
      	if ($stmt->prepare($sql2)) {
	  $stmt->bind_param('i', $_GET['material_id']);
	  $stmt->execute();
	}
      }
  header("Location: index.php");
?>


