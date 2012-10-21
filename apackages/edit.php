<?php 
  include("../partials/database-connect.inc.php");
  include("../partials/wrapper-functions.php");

      $stmt = $conn->stmt_init();
      
	$sql = 'SELECT id, number, subunit_id, last_update, next_update FROM a_packages WHERE id=?';
      if (isset($_GET['package_id'])) {
      	if ($stmt->prepare($sql)) {
	  $stmt->bind_param('i', $_GET['package_id']);
	  $stmt->bind_result($package_id, $package_number, $subunit_id, $last_update, $next_update);
          $stmt->execute();
	  $stmt->fetch();
	}
      }

    if($_POST) {
        $package_number = $_POST['number'];
		$package_subunit = $_POST['subunit_id'];
		$last_update = reverse_date($_POST['last_update']);
		$next_update = reverse_date($_POST['next_update']);
    }
  $title = "Ανανέωση Δέματος - ".$package_number; 
?>


<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>


  <h2>Ανανέωση Δέματος Α</h2>

  <?php 
    if(isset($_POST['submit_a_package'])) {
	//print_r($_POST);
	  $stmt = $conn->stmt_init();
      $sql = 'UPDATE a_packages SET number = ?, subunit_id = ?, last_update = ?, next_update = ? WHERE id = ?';

      if ($stmt->prepare($sql)) {
	$stmt->bind_param('ssssi', $_POST['number'], $_POST['subunits'], reverse_date($_POST['last_update']), reverse_date($_POST['next_update']), $_GET['package_id']);
	$stmt->execute();
	if ($stmt->affected_rows > 0)
	  echo "<div class='alert alert-info fade in'><button class='close' data-dismiss='alert' type='button'>×</button>Ανανεώθηκε το δέμα με αριθμό ".$package_number."</div>";
	}
	
      $sql = 'UPDATE a_packages SET number = ?, subunit_id = ?, last_update = ?, next_update = ? WHERE id = ?';
	  $stmt = $conn->stmt_init();
		if ($stmt->prepare($sql)) {
			$stmt->bind_param('ssssi', $_POST['number'], $_POST['subunits'], reverse_date($_POST['last_update']), reverse_date($_POST['next_update']), $_GET['package_id']);
			$stmt->execute();
		}


	  
	  $stmt2 = $conn->stmt_init();
	  $delete = 'DELETE FROM a_materials_packages WHERE package_id = ?';
		if ($stmt2->prepare($delete)) {
			$stmt2->bind_param('i', $_GET['package_id']);
			$stmt2->execute();
		}

	for($k = 0; $k < sizeof($_POST['a_materials']); $k++) {
	  $stmt3 = $conn->stmt_init();
	  $insert = 'INSERT INTO a_materials_packages(`material_id`, `package_id`, `size`, `quantity`) VALUES(?, ?, ?, ?)';
      //if(isset($_POST['sizes'][$k])) { $tmp_size = $_POST['sizes'][$k]; } else { $tmp_size = 1; }
		// echo "tteesstt: ". $tmp_size."<br />";
		if ($stmt3->prepare($insert)) {
			$stmt3->bind_param('sssi', $_POST['a_materials'][$k], $_GET['package_id'], $_POST['sizes'][$k], $_POST['quantity'][$k]);
			$stmt3->execute();
		}
	}
}
  ?>

  <?php include("form.inc.php") ?>
<?php include("../partials/footer.inc.php") ?>








