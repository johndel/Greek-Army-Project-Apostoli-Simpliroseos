<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $title = "Στοιχεία Περιοδικής Κατάστασης Υλικών Πίνακα Β";
?>

<?php
include("../partials/database-connect-old-nice-way.inc.php");
  if(isset($_POST['save'])) {
	$insert_config = "UPDATE configurations SET `value` = '".$_POST['pinakasbright']."' WHERE id = 17; ";
	mysql_query($insert_config);
	$insert_config = "UPDATE configurations SET `value` = '".$_POST['pinakasbcenter']."' WHERE id = 20; ";
	mysql_query($insert_config);
	$insert_config = "UPDATE configurations SET `value` = '".$_POST['pinakasbleft']."' WHERE id = 16; ";
	mysql_query($insert_config);
	
	
	$pinakasbright = $_POST['pinakasbright'];
	$pinakasbcenter = $_POST['pinakasbcenter'];
	$pinakasbleft = $_POST['pinakasbleft'];

  }
  else {
  $config_query = "SELECT * FROM configurations";
  $config = mysql_query($config_query);
	while($config_row = mysql_fetch_assoc($config)) {
		if($config_row['variable_name'] == "pinakasbright") { $pinakasbright = $config_row['value']; }
		if($config_row['variable_name'] == "pinakasbcenter") { $pinakasbcenter = $config_row['value']; }
		if($config_row['variable_name'] == "pinakasbleft") { $pinakasbleft = $config_row['value']; }
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
<h4>Στοιχεία Περιοδικής Κατάστασης Υλικών Πίνακα Β</h4>

 
	<form id="pinakasb" class="form-inline" method="post" action="">
	<p>
	  <label for="pinakasbright">Στοιχεία επάνω αριστερά:</label><br />
	  <textarea name="pinakasbleft" id="pinakasbleft" style="width: 450px; height: 150px;"><?php echo $pinakasbleft; ?></textarea>
	</p>
	
	<br />
	<p>
	  <label for="pinakasbright">Στοιχεία επάνω δεξιά:</label><br />
	  <textarea name="pinakasbright" id="pinakasbright" style="width: 450px; height: 150px;"><?php echo $pinakasbright; ?></textarea>
	</p>
	
	<br />
	<p>
	  <label for="pinakasbcenter">Στοιχεία κέντρου:</label><br />
	  <textarea name="pinakasbcenter" id="pinakasbcenter" style="width: 450px; height: 150px;"><?php echo $pinakasbcenter; ?></textarea>
	</p>
	
	<p>
	  <input name="save" id="send" class="btn btn-success" type="submit" value="Αποθήκευση">
	</p>
	</form>

<?php include("../partials/footer.inc.php") ?>