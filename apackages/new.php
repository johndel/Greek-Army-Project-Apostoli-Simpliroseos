<?php 
  $title = "Εισαγωγή δέματος Α"; 
  include("../partials/database-connect.inc.php");
  include("../partials/wrapper-functions.php");
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>


  <h2>Δημιουργία νέου Δέματος Α</h2>

  <?php 
    if(isset($_POST['submit_a_package'])) {
	//print_r($_POST);
    $stmt = $conn->stmt_init();
      $sql = 'INSERT INTO a_packages (number, subunit_id, last_update, next_update) VALUES(?, ?, ?, ?)';

      if ($stmt->prepare($sql)) {
	$stmt->bind_param('ssss', $_POST['number'], $_POST['subunits'], reverse_date($_POST['last_update']), reverse_date($_POST['next_update']) );
	$stmt->execute();
	if ($stmt->affected_rows > 0) {
		echo "Δημιουργήθηκε νέο Δέμα Α";
	}
	}
	
    $stmt2 = $conn->stmt_init();
	$select = "SELECT id FROM `a_packages` ORDER BY `a_packages`.`id` DESC LIMIT 1";
	$stmt2 = $conn->prepare($select);
	$stmt2->execute();
	$stmt2->bind_result($spackagea_id);
	while($stmt2->fetch()) { $spackagea_array_id[] = $spackagea_id; }  
	
	
	for($k = 0; $k < sizeof($_POST['a_materials']); $k++) {
	  $stmt3 = $conn->stmt_init();
	  $insert = 'INSERT INTO a_materials_packages(`material_id`, `package_id`, `size`, `quantity`) VALUES(?, ?, ?, ?)';
	  //if(isset($_POST['sizes'][$k])) { $tmp_size = $_POST['sizes'][$k]; } else { $tmp_size = 1; }
		//echo $insert;
		//echo "  --- ";
		//echo $_POST['a_materials'][$k].",".$spackagea_array_id[0].",".$tmp_size.",".$_POST['quantity'][$k];
		//print_r($_POST);
		if ($stmt3->prepare($insert)) {
			$stmt3->bind_param('sssi', $_POST['a_materials'][$k], $spackagea_array_id[0], $_POST['sizes'][$k], $_POST['quantity'][$k]);
			$stmt3->execute();
		}
	}
}
  ?>

  <?php include("form.inc.php") ?>

<?php include("../partials/footer.inc.php") ?>








