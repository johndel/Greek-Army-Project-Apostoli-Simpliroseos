<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $title = "Στοιχεία Περιοδικής Κατάστασης Υλικών Πίνακα Α";
?>

<?php
include("../partials/database-connect-old-nice-way.inc.php");
  if(isset($_POST['save'])) {
	$insert_config = "UPDATE configurations SET `value` = '".$_POST['pinakasaleft']."' WHERE id = 14; ";
	mysql_query($insert_config);
	$insert_config = "UPDATE configurations SET `value` = '".$_POST['pinakasaright']."' WHERE id = 15; ";
	mysql_query($insert_config);
	$insert_config = "UPDATE configurations SET `value` = '".$_POST['pinakasacenter']."' WHERE id = 19; ";
	mysql_query($insert_config);	

	
	$pinakasaleft = $_POST['pinakasaleft'];
	$pinakasaright = $_POST['pinakasaright'];
	$pinakasacenter = $_POST['pinakasacenter'];
  }
  else {
  $config_query = "SELECT * FROM configurations";
  $config = mysql_query($config_query);
	while($config_row = mysql_fetch_assoc($config)) {
		if($config_row['variable_name'] == "pinakasaleft") { $pinakasaleft = $config_row['value']; }
		if($config_row['variable_name'] == "pinakasaright") { $pinakasaright = $config_row['value']; }
		if($config_row['variable_name'] == "pinakasacenter") { $pinakasacenter = $config_row['value']; }
	}
  }
  
?>

<?php include("../partials/head.inc.php") ?>
<?php 
	include("../partials/menu.inc.php"); 
?>

<?php 
	if(isset($_POST['save'])) {
		echo "<div class='alert alert-info fade in'>Ανανεώθηκαν οι εγγραφές με επιτυχία.</div>";
	}
?>
<h4>Στοιχεία Περιοδικής Κατάστασης Υλικών Πίνακα Α</h4>

 
	<form id="pinakasa" class="form-inline" method="post" action="">
	<p>
	  <label for="pinakasaleft">Στοιχεία επάνω αριστερά:</label><br />
	  <textarea name="pinakasaleft" id="pinakasaleft" style="width: 450px; height: 150px;"><?php echo $pinakasaleft; ?></textarea>
	</p>
	<br />
	<p>
	  <label for="pinakasaright">Στοιχεία επάνω δεξιά:</label><br />
	  <textarea name="pinakasaright" id="pinakasaright" style="width: 450px; height: 150px;"><?php echo $pinakasaright; ?></textarea>
	</p>
	<br />
	<p>
	  <label for="pinakasacenter">Στοιχεία στη μέση:</label><br />
	  <textarea name="pinakasacenter" id="pinakasacenter" style="width: 450px; height: 150px;"><?php echo $pinakasacenter; ?></textarea>
	</p>
	
	<p>
	  <input name="save" id="send" class="btn btn-success" type="submit" value="Αποθήκευση">
	</p>
	</form>

<?php include("../partials/footer.inc.php") ?>