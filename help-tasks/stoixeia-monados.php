<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $title = "Στοιχεία Μονάδος - ΑΣ";
?>

<?php
include("../partials/database-connect-old-nice-way.inc.php");
  if(isset($_POST['monadasave'])) {
	$insert_config = "UPDATE configurations SET `value` = '".$_POST['monada']."' WHERE id = 1; ";
	mysql_query($insert_config);
	$insert_config = "UPDATE configurations SET `value` = '".$_POST['ea']."' WHERE id = 10; ";
	mysql_query($insert_config);
	$insert_config = "UPDATE configurations SET `value` = '".$_POST['em']."' WHERE id = 11; ";
	mysql_query($insert_config);
	
	$asnumber = $_POST['monada'];
	$ea = $_POST['ea'];
	$em = $_POST['em'];

  }
  
?>

<?php include("../partials/head.inc.php") ?>
<?php 
	include("../partials/menu.inc.php"); 
?>
  
<?php 
	if(isset($_POST['monadasave'])) {
		echo "<div class='alert alert-info fade in'>Ανανεώθηκε ο αριθμός μονάδας με επιτυχία.</div>";
	}
?>
	
	<h4>Στοιχεία Μονάδος - ΑΣ</h4>
	
	<form id="stoixeia-monados" class="form-inline" method="post" action="">
	<p>
	  <label for="monada">Μονάδα:</label>
	  <input name="monada" id="monada" style="margin-left: 5px; width: 300px;" type="text" value="<?php echo $asnumber; ?>" class="formbox">
	</p>
	
	<p>
	  <label for="ea">EA:</label>
	  <input name="ea" id="ea" style="margin-left: 33px;" type="text" value="<?php echo $ea; ?>" class="formbox">
	</p>
	
	<p>
	  <label for="em">ΕΜ ή ΑΣ:</label>
	  <input name="em" id="em" style="width: 300px;" type="text" value="<?php echo $em; ?>" class="formbox">
	</p>
	
	<p>
	  <input name="monadasave" id="send" class="btn btn-success" type="submit" value="Αποθήκευση">
	</p>
	</form>

<?php include("../partials/footer.inc.php") ?>