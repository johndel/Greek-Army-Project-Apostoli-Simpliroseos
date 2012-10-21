<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $title = "Στοιχεία Μονάδος - ΑΣ";
?>

<?php
include("../partials/database-connect-old-nice-way.inc.php");
  if(isset($_POST['stoixeiasave'])) {
	$insert_config7 = "UPDATE configurations   SET `value` = '".$_POST['apomiwsi']."' WHERE id = 13; ";
    mysql_query($insert_config7);
	$apomiwsi = $_POST['apomiwsi'];
	
  } else {
		$select_config = "SELECT * FROM configurations";
		$select = mysql_query($select_config);
		while($tmp = mysql_fetch_assoc($select)) {
			if($tmp['id'] == 13) { $apomiwsi = $tmp['value']; }
		}
	}
  
?>

<?php include("../partials/head.inc.php") ?>
<?php 
	include("../partials/menu.inc.php"); 
?>
  
<?php 
	if(isset($_POST['stoixeiasave'])) {
		echo "<div class='alert alert-info fade in'>Ανανεώθηκε η από μείωση επιτυχία.</div>";
	}
?>

<h4>Αλλαγή Απομείωσης</h4>

	<form id="stoixeia-ektipwsis" class="form-inline" method="post" action="">
	<p>
	  <label for="apomiwsi">Απομείωση:</label>
	  <input name="apomiwsi" class="input-small" style="width: 280px;" id="apomiwsi" type="text" value="<?php echo $apomiwsi; ?>" class="choose-date2">
	</p>
	
	<p>
	  <input name="stoixeiasave" class="btn btn-success" id="send" type="submit" value="Αποθήκευση">
	</p>
	</form>

<?php include("../partials/footer.inc.php") ?>