<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $edit_mode = true;
  $title = "Επεξεργασία Δέματος Οπλισμού";
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php");
    $subunit_id = "";		
	include("../partials/database-connect-old-nice-way.inc.php");
	
	if(isset($_POST['submit_package'])) {
		$oplismou_p_query = "UPDATE `diaxeirisi`.`oplismou_packages` SET `number` = '".$_POST['number']."', `subunit_id` ='".$_POST['subunits']."' WHERE `oplismou_packages`.`id` ='".$_GET['package_id']."'";
		$result_oplismou_p = mysql_query($oplismou_p_query) or die(mysql_error());
		$flash_message = "Ανανεώθηκε το δέμα οπλισμού";

	
	$delete_query = "DELETE FROM `diaxeirisi`.`oplismou_materials_packages` WHERE `oplismou_materials_packages`.`package_id` = '".$_GET['package_id']."'";
	$delete_result = mysql_query($delete_query) or die(mysql_error());
	
        for($k = 0; $k < sizeof($_POST['oplismou_materials']); $k++) {
	  $insert = "INSERT INTO oplismou_materials_packages(`material_id`, `package_id`, `gun_number`, `quantity`, `comments`)
						      VALUES('".$_POST['oplismou_materials'][$k]."', '".$_GET['package_id']."',
						      '".$_POST['gun_number'][$k]."', '".$_POST['quantity'][$k]."', '".$_POST['comments'][$k]."')";                                                              
	  $insert_result = mysql_query($insert);
	}
      	}
 ?>
 
<input type="hidden" id="edit-mode"></input>

<?php include("form.inc.php"); ?>

<?php include("../partials/footer.inc.php") ?>
<script src="/js/oplismou-material.js"></script>