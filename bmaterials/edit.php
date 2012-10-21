<?php 
  include("../partials/database-connect.inc.php");
      $stmt = $conn->stmt_init();
      
	$sql = 'SELECT id, name, quantity, efedroi FROM b_materials WHERE id=?';
      if (isset($_GET['material_id'])) {
      	if ($stmt->prepare($sql)) {
	  $stmt->bind_param('i', $_GET['material_id']);
	  $stmt->bind_result($material_id, $material_name, $material_quantity, $material_efedroi);
	  $stmt->execute();
	  $stmt->fetch();
	  // $result = $conn->query($sql);
	}
      }

      if($_POST) {
        $material_name = $_POST['name'];
		$material_quantity = $_POST['quantity'];
		$material_efedroi = $_POST['efedroi'];
      }

  $title = "Ανανέωση υλικού - ".$material_name; 
?>




<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>


  <h2>Ανανέωση υλικού - Δέματα Β</h2>

  <?php 
    if(isset($_POST['submit_a_material'])) {
      $stmt = $conn->stmt_init();
      $sql = 'UPDATE b_materials SET name = ?, quantity = ?, efedroi = ? WHERE id = ?';
	  if(isset($_POST['efedroi'])) { $on_efedroi = 1; } else { $on_efedroi = 0; }
      if ($stmt->prepare($sql)) {
	$stmt->bind_param('sssi', $_POST['name'], $_POST['quantity'], $on_efedroi, $_GET['material_id']);
	$stmt->execute();
	if ($stmt->affected_rows > 0)
	  echo "<div class='alert alert-info fade in'><button class='close' data-dismiss='alert' type='button'>×</button>Ανανεώθηκε το υλικό ".$material_name." - Δέμα Β</div>";
	}
}
  ?>

  <?php include("form.inc.php") ?>

<?php include("../partials/footer.inc.php") ?>








