<?php 
  $title = "Εισαγωγή δέματος Β"; 
  include("../partials/database-connect.inc.php");
  include("../partials/wrapper-functions.php");
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>


  <h2>Δημιουργία νέου Δέματος B</h2>

  <?php 
    if(isset($_POST['submit_b_package'])) {
    $stmt = $conn->stmt_init();
      $sql = 'INSERT INTO b_packages (number, subunit_id, last_update, next_update) VALUES(?, ?, ?, ?)';

      if ($stmt->prepare($sql)) {
	$stmt->bind_param('ssss', $_POST['number'], $_POST['subunits'], reverse_date($_POST['last_update']), reverse_date($_POST['next_update']) );
	$stmt->execute();
	if ($stmt->affected_rows > 0)
	  echo "<div class='alert alert-info fade in'>Δημιουργήθηκε νέο Δέμα Β</div>";
	}
	
    $stmt2 = $conn->stmt_init();
	$select = "SELECT id FROM `b_packages` ORDER BY `b_packages`.`id` DESC LIMIT 1";
	$stmt2 = $conn->prepare($select);
	$stmt2->execute();
	$stmt2->bind_result($spackageb_id);
	while($stmt2->fetch()) { $spackageb_array_id[] = $spackageb_id; }  
	
	
	for($k = 0; $k < sizeof($_POST['b_materials']); $k++) {
	  $stmt3 = $conn->stmt_init();
	  $insert = 'INSERT INTO b_materials_packages(`material_id`, `package_id`, `size_id`, `quantity`) VALUES(?, ?, ?, ?)';
		if ($stmt3->prepare($insert)) {
			$stmt3->bind_param('sssi', $_POST['b_materials'][$k], $spackageb_array_id[0], $_POST['sizes'][$k], $_POST['quantity'][$k]);
			$stmt3->execute();
		}
	} 
}
  ?>

  <?php include("form.inc.php") ?>

<?php include("../partials/footer.inc.php") ?>








