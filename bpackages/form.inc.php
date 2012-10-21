<?php
  if(basename($_SERVER['SCRIPT_FILENAME']) == "new.php") {
    $submit_text = "Αποθήκευση Νέου Δέματος";
    $package_number = "";
    $subunit_id = "";		
  } else {
    $edit_mode = true;
    $submit_text = "Ανανέωση Δέματος";
  }
$stmt = $conn->stmt_init();
  
$subunits_query = 'SELECT * FROM subunits';
$subunits_result = $conn->query($subunits_query) or die(mysqli_error());
?>

<form id="b_packages" method="post" action="">
<div id="notice"></div>
<p>
  <label for="number">Αριθμός Δέματος:</label>
  <input name="number" type="text" value="<?php echo $package_number ?>" id="package_number">
</p>
<p>
  <label for="subunit">Υπομονάδα:</label> 
  <select name="subunits" id="subunits">
    <?php while ($row = $subunits_result->fetch_assoc()) { ?>
      <option value="<?php echo $row['id']; ?>"
        <?php if($_POST) { 
		if ($_POST['subunits'] == $row['id']) { echo 'selected'; }
	      } else {if ($subunit_id == $row['id']) { echo 'selected'; }} ?>>
        <?php echo $row['subunits']; ?>
      </option>    
    <?php } ?>
  </select>
</p>
<p>
  <label for="last_update">Τελευταία Ενημέρωση:</label>
  <input name="last_update" type="text" value="<?php echo fixdate(reverse_date($last_update)); ?>" class="choose-date" id="last_update">
</p>
<p>
  <label for="next_update">Επόμενη Ενημέρωση:</label>
  <input name="next_update" type="text" value="<?php echo fixdate(reverse_date($next_update)); ?>" class="choose-date" id="next_update">
</p>

<a href="javascript:;" class="add-material btn btn-success"><i class="icon-plus"></i> Προσθήκη Υλικών:</a><br /> 
<table class="nice-table no-border">
<tr>
  <th>Α/Α</th>
  <th>Όνομα Υλικού</th>
  <th>Νούμερο</th>
  <th>Ποσότητα</th>
</tr>

<?php if($edit_mode) { ?>
<?php  
	$select_materials = 'SELECT * FROM b_materials_packages WHERE package_id = ? ORDER BY material_id, size_id, quantity';
    if ($stmt->prepare($select_materials)) {
	  $stmt->bind_param('i', $_GET['package_id']);
	  $results = $stmt->execute();
	  $stmt->store_result();
	  $stmt->bind_result($assoc_id, $mate_id, $pack_id, $size_id, $quantity);
	  $row_number = $stmt->num_rows;
	}
?>
<?php // echo $row_number ?>
  <?php while ($stmt->fetch()) { //for ($i = 1; $i <= $row_number; $i++) { //  ?>

<?php //echo $mate_id ?> <?php //echo $pack_id ?> <?php //echo $size_id ?> <?php //echo $quantity ?>

  <?php include("edit_material.inc.php") ?>
  <?php } ?>
<?php } else { ?>
  <?php include("material.inc.php") ?>
<?php } ?>

</table>

<br />
<p>
  <input class="btn btn-primary" type="submit" name="submit_b_package" value="<?php echo $submit_text; ?>" id="submit_package">
</p>
</form>
<br />
<a href="index.php" class="btn"><i class="icon-arrow-left"></i> Πίσω</a>
