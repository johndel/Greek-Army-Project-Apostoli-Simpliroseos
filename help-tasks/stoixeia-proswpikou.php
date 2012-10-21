<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $title = "Στοιχεία Δκτή - ΠΕΔ - ΓΔΥ";
?>

<?php
include("../partials/database-connect-old-nice-way.inc.php");
  if(isset($_POST['stuffsave'])) {
	$insert_config = "UPDATE configurations SET `value` = '".$_POST['dkti']."' WHERE id = 2; ";
	mysql_query($insert_config);
	$insert_config = "UPDATE configurations SET `value` = '".$_POST['ped']."' WHERE id = 3; ";
	mysql_query($insert_config);
	$insert_config = "UPDATE configurations SET `value` = '".$_POST['gdy']."' WHERE id = 4; ";
	mysql_query($insert_config);
	
	$dkti = $_POST['dkti'];
	$ped = $_POST['ped'];
	$gdy = $_POST['gdy'];
  }
  else {
  $config_query = "SELECT * FROM configurations";
  $config = mysql_query($config_query);
  while($config_row = mysql_fetch_assoc($config)) {
	if($config_row['variable_name'] == "dkti") { $dkti = $config_row['value']; }
	if($config_row['variable_name'] == "ped") { $ped = $config_row['value']; }
	if($config_row['variable_name'] == "gdy") { $gdy = $config_row['value']; }

  }
  }
  
?>

<?php include("../partials/head.inc.php") ?>
<?php 
	include("../partials/menu.inc.php"); 
?>

<?php 
	if(isset($_POST['stuffsave'])) {
		echo "<div class='alert alert-info fade in'>Ανανεώθηκαν οι εγγραφές με επιτυχία.</div>";
	}
?>
<h4>Στοιχεία Δκτή - ΠΕΔ - ΓΔΥ</h4>

 
	<form id="stoixeia-monados" class="form-inline" method="post" action="">
	<p>
	  <label for="dkti">Δκτή:</label>
	  <input name="dkti" id="dkti" style="width: 250px;" type="text" value="<?php echo $dkti; ?>" class="formbox">
	</p>
	<p>
	  <label for="ped">ΠΕΔ:</label>
	  <input name="ped" id="ped" type="text" style="width: 252px;" value="<?php echo $ped; ?>" class="formbox">
	</p>
	<p>
	  <label for="gdy">ΓΔΥ:</label>
	  <input name="gdy" id="gdy" type="text" style="width: 254px;" value="<?php echo $gdy; ?>" class="formbox">
	</p>
	<p>
	  <input name="stuffsave" id="send" class="btn btn-success" type="submit" value="Αποθήκευση">
	</p>
	</form>

<?php include("../partials/footer.inc.php") ?>