<?php
  if(basename($_SERVER['SCRIPT_FILENAME']) == "new.php") {
    $submit_text = "Εισαγωγή Νέου Υλικού";
    $material_name = "";
    $material_quantity = "";		
  } else {
    $submit_text = "Aνανέωση Υλικού";
  }



?>
<form id="a_materials" method="post" action="">
<p>
<label for="name">Υλικό:</label>
<input name="name" type="text" value="<?php echo $material_name ?>" id="material_name">
</p>
<p>
<label for="quantity">Προβλεπόμενη Ποσότητα:</label>
<input name="quantity" type="text" value="<?php echo $material_quantity ?>" id="material_quantity">
</p>
<p>
<label for="efedroi" class="checkbox inline" style="margin: 0; padding: 0;padding-top: 0">Διατίθεται στους ΑΝΑΠΛ:</label>
<input name="efedroi"  type="checkbox" <?php if($material_efedroi == 1 || isset($_POST['efedroi'])) { echo "checked"; } ?> id="material_efedroi">
</p>
<p>
<input class="btn btn-primary" type="submit" name="submit_a_material" value="<?php echo $submit_text; ?>" id="submit_material">
</p>
</form>
<br />
<a href="index.php" class="btn"><i class="icon-arrow-left"></i> Πίσω</a>