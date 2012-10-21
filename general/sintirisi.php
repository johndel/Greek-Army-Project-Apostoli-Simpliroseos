<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $title = "Στοιχεία Μονάδος - ΑΣ";
?>

<?php
include("../partials/database-connect-old-nice-way.inc.php");
  if(isset($_POST['stoixeiasave'])) {
	$insert_config1 = "UPDATE configurations   SET `value` = '".$_POST['proedros']."' 		WHERE id = 5;";
	$insert_config2 = "UPDATE configurations   SET `value` = '".$_POST['melosa']."'   		WHERE id = 6";
	$insert_config3 = "UPDATE configurations   SET `value` = '".$_POST['melosb']."'   		WHERE id = 7";	
	$insert_config4 = "UPDATE configurations   SET `value` = '".$_POST['date']."'     		WHERE id = 8";
	$insert_config5 = "UPDATE configurations   SET `value` = '".$_POST['todaydate']."'   	WHERE id = 9; ";
	$insert_config6 = "UPDATE configurations   SET `value` = '".$_POST['place']."'      	WHERE id = 12; ";

	
	mysql_query($insert_config1);	mysql_query($insert_config2);	mysql_query($insert_config3);	mysql_query($insert_config4);	mysql_query($insert_config5);  mysql_query($insert_config6);
	$proedros = $_POST['proedros'];
	$melosa = $_POST['melosa'];
	$melosb = $_POST['melosb'];
	$date = $_POST['date'];
	$todaydate = $_POST['todaydate'];
	$place = $_POST['place'];
	
  } else {
		$select_config = "SELECT * FROM configurations";
		$select = mysql_query($select_config);
		while($tmp = mysql_fetch_assoc($select)) {
			if($tmp['id'] == 5) { $proedros = $tmp['value'];
			} elseif($tmp['id'] == 6) { $melosa = $tmp['value'];
			} elseif($tmp['id'] == 7) { $melosb = $tmp['value']; 
			} elseif($tmp['id'] == 8) { $date = $tmp['value'];
			} elseif($tmp['id'] == 12){ $place = $tmp['value'];
			} elseif($tmp['id'] == 9) { $todaydate = $tmp['value']; }
		}
	}
  
?>

<?php include("../partials/head.inc.php") ?>
<?php 
	include("../partials/menu.inc.php"); 
?>
  
<?php 
	if(isset($_POST['stoixeiasave'])) {
		echo "<div class='alert alert-info fade in'>Ανανεώθηκαν τα στοιχεία με επιτυχία.</div>";
	}
?>

<h4>Στοιχεία Επιτροπής Συντηρήσεως και Συσκευασίας</h4>

	<form id="stoixeia-ektipwsis" class="form-inline" method="post" action="">
	<p>
	  <label for="proedros">Πρόεδρος:</label>
	  <input name="proedros" class="input-min" style="width: 297px;" id="proedros" type="text" value="<?php echo $proedros; ?>" class="formbox">
	</p>
	
	<p>
	  <label for="melosa">Μέλος Α':</label>
	  <input name="melosa" class="input-small" id="melosa" type="text" value="<?php echo $melosa; ?>" class="formbox">
	</p>

	<p>
	  <label for="melosb">Μέλος Β':</label>
	  <input name="melosb" class="input-small" id="melosb" type="text" value="<?php echo $melosb; ?>" class="formbox">
	</p>

	<p>
	  <label for="date">Ημερομηνία Συγκρότησης Επιτροπή:</label>
	  <input name="date" class="input-small" style="width: 146px" id="date" type="text" value="<?php echo $date; ?>" class="choose-date2">
	</p>	

	<p>
	  <label for="todaydate">Σημερινή Ημερομηνία:</label>
	  <input name="todaydate" class="input-small" style="width: 232px;" id="todaydate" type="text" value="<?php echo $todaydate; ?>" class="choose-date2">
	</p>

	<p>
	  <label for="place">Μέρος:</label>
	  <input name="place" class="input-small" style="width: 315px;" id="place" type="text" value="<?php echo $place; ?>" class="choose-date2">
	</p>
	
	<p>
	  <input name="stoixeiasave" class="btn btn-success" id="send" type="submit" value="Αποθήκευση">
	</p>
	</form>

<?php include("../partials/footer.inc.php") ?>