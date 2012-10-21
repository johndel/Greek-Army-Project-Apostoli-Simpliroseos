<?php 
      include("../partials/database-connect.inc.php");
	  include("../partials/wrapper-functions.php");
      $stmt = $conn->stmt_init();

      $sql = 'SELECT id, number, subunit_id, last_update, next_update FROM b_packages WHERE id=?';
      if (isset($_GET['package_id'])) {
      	if ($stmt->prepare($sql)) {
	  $stmt->bind_param('i', $_GET['package_id']);
	  $stmt->bind_result($package_id, $package_number, $subunit_id, $last_update, $next_update);
          $stmt->execute();
	  $stmt->fetch();
          $stmt->close();
	}
      }

      if($_POST) {
        $package_number = $_POST['number'];
	$package_subunit = $_POST['subunit_id'];
	$last_update = reverse_date($_POST['last_update']);
	$next_update = reverse_date($_POST['next_update']);
      }
  $title = "Επεξεργασία δέματος Β"; 
?>


<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>


  <h2>Ανανέωση Δέματος Β</h2>

  <?php 
    if(isset($_POST['submit_b_package'])) {
	// print_r($_POST['b_materials']); 
	// print_r($_POST['sizes']);      
	// print_r($_POST['quantity']);      

      $sql = 'UPDATE b_packages SET number = ?, subunit_id = ?, last_update = ?, next_update = ? WHERE id = ?';
	  $stmt = $conn->stmt_init();
		if ($stmt->prepare($sql)) {
			$stmt->bind_param('ssssi', $_POST['number'], $_POST['subunits'], reverse_date($_POST['last_update']), reverse_date($_POST['next_update']), $_GET['package_id']);
			$stmt->execute();
		}
		if ($stmt->affected_rows > 0) {
			echo "<div class='alert alert-info fade in'>Ανανέωση Δέματος - ".$_POST['number']."</div>";
		}


	  
	  $stmt2 = $conn->stmt_init();
	  $delete = 'DELETE FROM b_materials_packages WHERE package_id = ?';
		if ($stmt2->prepare($delete)) {
			$stmt2->bind_param('i', $_GET['package_id']);
			$stmt2->execute();
		}

	for($k = 0; $k < sizeof($_POST['b_materials']); $k++) {
	  $stmt3 = $conn->stmt_init();
	  $insert = 'INSERT INTO b_materials_packages(`material_id`, `package_id`, `size_id`, `quantity`) VALUES(?, ?, ?, ?)';
		if ($stmt3->prepare($insert)) {
			$stmt3->bind_param('sssi', $_POST['b_materials'][$k], $_GET['package_id'], $_POST['sizes'][$k], $_POST['quantity'][$k]);
			$stmt3->execute();
		}
	}

    }
?>


  <?php include("form.inc.php") ?>

<?php include("../partials/footer.inc.php") ?>








