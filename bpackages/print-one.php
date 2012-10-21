<?php
	include("../partials/database-connect-old-nice-way.inc.php");
	include("../partials/wrapper-functions.php");
	

	$base_name = "http://".$_SERVER['SERVER_NAME']."/";
	
	
	$package = select_btable_package_id($_GET['package_id']);
	$today_date = select_record("configurations", 9);
	$sigkrotisi_date = select_record("configurations", 8);
	$tmp_counter = 0;
	
	$config_query = "SELECT * FROM configurations";
	$config = mysql_query($config_query);
	while($config_row = mysql_fetch_assoc($config)) {
		if($config_row['variable_name'] == "stoixeia_monados") { $asnumber = $config_row['value']; }
		if($config_row['variable_name'] == "ea") { $ea = $config_row['value']; }
		if($config_row['variable_name'] == "em") { $em = $config_row['value']; }
	}

	$im = imagecreatefrompng($base_name.'images/print/deltio-eswterikwn-endeiksewn.png');

	$white = imagecolorallocate($im, 255, 255, 255);
	$grey = imagecolorallocate($im, 128, 128, 128);
	$black = imagecolorallocate($im, 0, 0, 0);
	$red = imagecolorallocate($im, 255, 0, 0);
	$green = imagecolorallocate($im, 0, 255, 0);
	$blue = imagecolorallocate($im, 0, 0, 255);
	$brown = imagecolorallocate($im, 0x99, 0x66, 0x00);

	$width = imagesx($im);
	$height = imagesy($im);

	/* EA */
	imagettftext($im, 28, 0, 625, 34, $black, "arial.ttf", $ea);
	/* EM */
	imagettftext($im, 28, 0, 790, 79, $black, "arial.ttf", $em);
	

	$subunit_package = explode(" ", $package['subunits']);

	if(isset($subunit_package[2])) {
		$subunit_package[0] = "ΠΔ'";
		$subunit_package[1] = $subunit_package[2];
	}
	if($subunit_package[0] == "ΠΥΡΧΙΑ") {
		$subunit_package[0] = "ΠΔ'";
		$subunit_package[1] = null;
	}
	
	
	imagettftext($im, 28, 0, 830, 79, $black, "arial.ttf", "/ ".str_replace("/", "",$subunit_package[0]));
	/* Αριθμός και υπομονάδα */
	imagettftext($im, 36, 0, 1410, 79, $black, "arial.ttf", $package['number']);
	if(isset($subunit_package[1])) {
		imageline($im, 1280, 145, 1505, 145, $black);
		imageline($im, 1280, 146, 1505, 146, $black);

		if($subunit_package[1] == "ΠΥΡΗΝΕΣ") {
			imagettftext($im, 36, 0, 1280, 140, $black, "arial.ttf", "ΠΥΡΗΝΑΣ");
		} else {
			imagettftext($im, 36, 0, 1280, 140, $black, "arial.ttf", $subunit_package[2]);
		}
	}

	$top_td = 291;
	$left_td = 588;

	// imagettftext($im, 14, 0, $left_td + 102, $top_td, $black, "arial.ttf", "ΥΛΙΚΑ ΠΙΝΑΚΑ \"Α\""); 

	
	/* Εκτύπωση των υλικών του πακέτου */
	$test = select_all_records_a_order("b_materials_packages", "package_id", $_GET['package_id']);	
	foreach($test as $value => $row) {
		$tmp_counter = $tmp_counter + 1;
		$top_td = $top_td + 34;
		
		imagettftext($im, 14, 0, $left_td+6, $top_td+2, $black, "arial.ttf", $tmp_counter);
			$mat_name = select_record("b_materials", $row['material_id']); 
			
			$quantitytype = get_quantity_type("b", $mat_name[0]);

			imagettftext($im, 10, 0, $left_td + 63, $top_td, $black, "arial.ttf", $mat_name[1]);
			imagettftext($im, 12, 0, $left_td + 360, $top_td, $black, "arial.ttf", $quantitytype.": ".$row['quantity']);

			if(check_size("b", $row['material_id'])) { 
				$size = select_record("b_sizes", $row['size_id']);  
				$tmp_size_print = $size[2]; 
			} 
			else { $tmp_size_print = "-"; }

			imagettftext($im, 12, 0, $left_td + 516, $top_td, $black, "arial.ttf", $tmp_size_print);
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			/* Ημερομηνίες */
			if($package['last_update'] != "0000-00-00") { imagettftext($im, 12, 0, $left_td + 600, $top_td, $black, "arial.ttf", detailed_date(fixdate(reverse_date($package['last_update'])))); }
			else { imagettftext($im, 12, 0, $left_td + 600, $top_td, $black, "arial.ttf", $today_date[2]); }
			
			if($package['last_update'] != "0000-00-00") { imagettftext($im, 12, 0, $left_td + 775, $top_td, $black, "arial.ttf", fixdate(reverse_date($package['next_update']))); }
			// else { imagettftext($im, 12, 0, $left_td + 775, $top_td, $black, "arial.ttf", $today_date[2]); }
	}
	/* Εκτύπωση των υλικών του πακέτου - END */
	
	/* Εκτύπωση χρωματικού κύκλου */
	$first_c = hexdec($package['color'][0].$package['color'][1]);
	$second_c = hexdec($package['color'][2].$package['color'][3]);
	$third_c = hexdec($package['color'][4].$package['color'][5]);
	$color = imagecolorallocate($im, $first_c, $second_c, $third_c);
	imagefilledellipse($im, 437, 545, 234, 234, $color);
	/* Εκτύπωση χρωματικού κύκλου - END */

	
	header('content-type: image/png');
	imagepng($im);
	imagedestroy($im);
?>
