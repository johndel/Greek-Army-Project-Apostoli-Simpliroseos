<?php 
  if(basename($_SERVER['SCRIPT_FILENAME']) == "edit-package.php") {
    $submit_text = "Ανανέωση Δέματος";
  } else {
    $submit_text = "Αποθήκευση Νέου Δέματος";
  }

	$subunits_query = 'SELECT * FROM subunits;';
	$subunits_result = mysql_query($subunits_query) or die(mysql_error());
	
	if(isset($_GET['package_id'])) {
		$current_package_query = 'SELECT * FROM oplismou_packages WHERE id='.$_GET['package_id'].';';
		$current_package_result = mysql_query($current_package_query) or die(mysql_error());
		while($current_package = mysql_fetch_assoc($current_package_result)) {
			$package_number = $current_package['number'];
			$subunit_id = $current_package['subunit_id'];
		}
	}
?>

<?php if(isset($flash_message)) { echo $flash_message; } ?>

<form id="oplismou_packages" method="post" action="">
<p>
  <label for="number">Αριθμός Δέματος:</label>
  <input name="number" type="text" value="<?php if(isset($package_number)) { echo $package_number; } ?>" id="package_number" />
</p>

<p>
  <label for="subunit">Υπομονάδα:</label>
  <select name="subunits" id="subunits">
    <?php while ($subunit = mysql_fetch_assoc($subunits_result)) { ?>
      <option value="<?php echo $subunit['id']; ?>"
        <?php if($_POST) { 
		if ($_POST['subunits'] == $subunit['id']) { echo 'selected'; }
	      } else {if ($subunit_id == $subunit['id']) { echo 'selected'; }} ?>>
        <?php echo $subunit['subunits']; ?>
      </option>    
    <?php } ?>
  </select>
</p>

<a href="javascript:;" class="add-oplismou-material btn btn-success"><i class="icon-plus"></i> Προσθήκη Υλικού</a>
<br /><br />
<table class="nice-table no-border">
<tr>
  <th>Α/Α</th>
  <th>Όνομα Υλικού</th>
  <th>Ποσότητα</th>
  <th>Αριθμός Όπλου</th>
  <th>Παρατήρήσεις</th>
</tr>
<?php if($edit_mode) { ?>
<?php  
  $select_materials = "SELECT * FROM oplismou_materials_packages WHERE package_id = '".$_GET['package_id']."' ORDER BY material_id, gun_number, quantity, comments";
  $select_materials_result = mysql_query($select_materials);
  // $materials_num_rows = mysql_num_rows($select_materials_result);
?>

<?php if(isset($select_materials)) {
	while($material_row = mysql_fetch_assoc($select_materials_result)) { //for($i_tmp = 0; $i_tmp < $materials_num_rows; $i_tmp++) { ?>
		<?php include("material.inc.php"); ?>
<?php   } 
      }                             
}
else {
	include("material.inc.php");
}
?>
</table>

<br />
  <input class="btn btn-primary" type="submit" name="submit_package" value="<?php echo $submit_text; ?>" id="submit_package"></input>
</p>
</form>