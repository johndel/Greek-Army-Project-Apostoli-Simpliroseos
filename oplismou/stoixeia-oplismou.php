<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $title = "Στοιχεία Μονάδος - ΑΣ";
?>

<?php
include("../partials/database-connect-old-nice-way.inc.php");
  if(isset($_POST['stoixeiasave'])) {
	$insert_config1 = "UPDATE configurations SET `value` = '".$_POST['proedros']."' 		WHERE id = 5;";
	$insert_config2 = "UPDATE configurations   SET `value` = '".$_POST['melosa']."'   		WHERE id = 6";
	$insert_config3 = "UPDATE configurations   SET `value` = '".$_POST['melosb']."'   		WHERE id = 7";	
	$insert_config4 = "UPDATE configurations   SET `value` = '".$_POST['date']."'     		WHERE id = 8";
	$insert_config5 = "UPDATE configurations   SET `value` = '".$_POST['todaydate']."'   	WHERE id = 9; ";
	mysql_query($insert_config1);	mysql_query($insert_config2);	mysql_query($insert_config3);	mysql_query($insert_config4);	mysql_query($insert_config5);
	$proedros = $_POST['proedros'];
	$melosa = $_POST['melosa'];
	$melosb = $_POST['melosb'];
	$date = $_POST['date'];
	$todaydate = $_POST['todaydate'];  
  } else {
		$select_config = "SELECT * FROM configurations WHERE id > 4 AND id < 10";
		$select = mysql_query($select_config);
		while($tmp = mysql_fetch_assoc($select)) {
			if($tmp['id'] == 5) { $proedros = $tmp['value'];
			} elseif($tmp['id'] == 6) { $melosa = $tmp['value'];
			} elseif($tmp['id'] == 7) { $melosb = $tmp['value']; 
			} elseif($tmp['id'] == 8) { $date = $tmp['value'];
			} else { $todaydate = $tmp['value']; }
		}
	}
  
?>

<?php include("../partials/head.inc.php") ?>
<?php 
	include("../partials/menu.inc.php"); 
?>
  
<?php 
	if(isset($_POST['stoixeiasave'])) {
		echo "Ανανεώθηκε ο αριθμός μονάδας με επιτυχία.";
	}
?>
	
	<form id="stoixeia-ektipwsis" method="post" action="">
	<p>
	  <label for="proedros">Πρόεδρος:</label>
	  <input name="proedros" id="proedros" type="text" value="<?php echo $proedros; ?>" class="formbox">
	</p>
	
	<p>
	  <label for="melosa">Μέλος Α':</label>
	  <input name="melosa" id="melosa" type="text" value="<?php echo $melosa; ?>" class="formbox">
	</p>

	<p>
	  <label for="melosb">Μέλος Β':</label>
	  <input name="melosb" id="melosb" type="text" value="<?php echo $melosb; ?>" class="formbox">
	</p>

	<p>
	  <label for="date">Ημερομηνία Συγκρότησης Επιτροπή:</label>
	  <input name="date" id="date" type="text" value="<?php echo $date; ?>" class="choose-date2">
	</p>	

	<p>
	  <label for="todaydate">Σημερινή Ημερομηνία:</label>
	  <input name="todaydate" id="todaydate" type="text" value="<?php echo $todaydate; ?>" class="choose-date2">
	</p>
	
	<p>
	  <input name="stoixeiasave" id="send" type="submit" value="Αποθήκευση">
	</p>
	</form>

<?php include("../partials/footer.inc.php") ?>