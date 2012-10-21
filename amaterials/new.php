<?php 
  $title = "Εισαγωγή υλικού για τα Δέματα Α"; 
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>


  <h2>Δημιουργία νέου υλικού - Δέματα Α</h2>

  <?php 
    if(isset($_POST['submit_a_material'])) {
      include("../partials/database-connect.inc.php");
      $stmt = $conn->stmt_init();
      $sql = 'INSERT INTO a_materials (name, quantity) VALUES(?, ?)';

      if ($stmt->prepare($sql)) {
	$stmt->bind_param('ss', $_POST['name'], $_POST['quantity']);
	$stmt->execute();
	if ($stmt->affected_rows > 0)
	  echo "<div class='alert alert-info fade in'><button class='close' data-dismiss='alert' type='button'>×</button>Δημιουργήθηκε νέο υλικό - Δέμα Α</div>";
	}
}
  ?>

  <?php include("form.inc.php") ?>

<?php include("../partials/footer.inc.php") ?>








