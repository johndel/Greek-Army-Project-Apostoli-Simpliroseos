<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);
    
  $edit_mode = false;
  $title = "Προσθήκη Νέου Δέματος Οπλισμού";
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>

<?php 
    $subunit_id = "";		
	include("../partials/database-connect-old-nice-way.inc.php");
	if(isset($_POST['submit_package'])) {
	  $oplismou_p_query = "INSERT INTO oplismou_packages(`number`, `subunit_id`) VALUES('".$_POST['number']."', '".$_POST['subunits']."');";
	  $result_oplismou_p = mysql_query($oplismou_p_query) or die(mysql_error());
	  $flash_message = "Δημιουργήθηκε νέο δέμα οπλισμού";
	  $tmp_mat_query = "SELECT * FROM oplismou_packages ORDER BY id DESC LIMIT 1";
	  $tmp_mat_result = mysql_query($tmp_mat_query) or die(mysql_error());
	  while($tmp_row = mysql_fetch_assoc($tmp_mat_result)) {
	    $new_package_id = $tmp_row['id'];	    
	  }
	
        for($k = 0; $k < sizeof($_POST['oplismou_materials']); $k++) {
	  $insert = "INSERT INTO oplismou_materials_packages(`material_id`, `package_id`, `gun_number`, `quantity`, `comments`)
						      VALUES('".$_POST['oplismou_materials'][$k]."', '".$new_package_id."',
						      '".$_POST['gun_number'][$k]."', '".$_POST['quantity'][$k]."', '".$_POST['comments'][$k]."')";                                                              
	  $insert_result = mysql_query($insert);
	} 	
	}
?>


<?php include("form.inc.php"); ?>


<?php include("../partials/footer.inc.php") ?>
<script src="/js/oplismou-material.js"></script>