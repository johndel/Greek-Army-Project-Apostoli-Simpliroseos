<?php
  include("../partials/database-connect-old-nice-way.inc.php");

function fixname($name) {
	if(strlen($name) > 40) {
		$fixed_name = explode(" ", $name);

		for($i = 0; sizeof($fixed_name) > $i; $i++ ) {
			if(strlen($fixed_name[$i]) > 14) {
				$fixed_name[$i] = substr($fixed_name[$i], 0, 12).".";
			}
		}

		return implode(" ", $fixed_name);
	}
	else { return $name; }
}
 
  $packet_query = "SELECT * FROM b_packages";
  $packet_result = mysql_query($packet_query);
  
  $pirxia_query = "SELECT * FROM subunits";
  $pirxia_result = mysql_query($pirxia_query);
  
  $pirxia_power = 0;
  while($pirxia = mysql_fetch_assoc($pirxia_result)) {
	$pirxia_power = $pirxia_power + $pirxia['provlepomeni_dinami'];
  }
  $title = "Συνολικός Πίνακας Υλικών";
  
  
  $materials = "SELECT * FROM b_materials WHERE id = 13 OR id = 6 OR id = 11 OR id = 5 OR id = 4 OR id = 10 ORDER BY `b_materials`.`name`";
  $material_result = mysql_query($materials);
  
  $materials_simple_table = "SELECT * FROM b_materials WHERE id = 1 OR id = 2 OR id = 3 OR id = 8 OR id = 9 OR id = 12 ORDER BY `b_materials`.`name`";
  $material_simple_result = mysql_query($materials_simple_table);
  
  $materials_no_table = "SELECT * FROM b_materials WHERE id = 7 ORDER BY `b_materials`.`name`";
  $material_no_result = mysql_query($materials_no_table);
  ?>
<?php 

  $config_query = "SELECT * FROM configurations";
  $config = mysql_query($config_query);
  while($config_row = mysql_fetch_assoc($config)) {
	if($config_row['variable_name'] == "stoixeia_monados") { $asnumber = $config_row['value']; }
	if($config_row['variable_name'] == "ea") { $ea = $config_row['value']; }
	if($config_row['variable_name'] == "em") { $em = $config_row['value']; }
	if($config_row['variable_name'] == "apomiwsi")   { $apomiwsi = $config_row['value']; }
	if($config_row['variable_name'] == "pinakasbleft") { $pinakasbleft = $config_row['value']; }
	if($config_row['variable_name'] == "pinakasbright") { $pinakasbright = $config_row['value']; }
	if($config_row['variable_name'] == "pinakasbcenter") { $pinakasbcenter = $config_row['value']; }  
  }
  mysql_close($conn);
  
  ?>

<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>
	<?php if (isset($title)) { 
		echo $title; } else {
		echo "Αποστολή Συμπληρώσεως ΑΠΟΘΗΚΗ"; } 
	?>
  </title>  
  
  <meta name="description" content="<?php echo $title; ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="/css/general.css">
  <link rel="stylesheet" href="/css/south-street/jquery-ui-1.8.21.custom.css">
  <?php if($_SERVER["REQUEST_URI"] != "/subunits/") { ?><link rel="stylesheet" href="/css/bootstrap.min.css"><?php } ?>
  <link rel="stylesheet" href="/css/my-general.css">
  <link rel="stylesheet" href="/css/menu.css">
  <link rel="stylesheet" href="/css/forms.css">
  <link rel="stylesheet" href="/css/demo_table.css">
  <link rel="stylesheet" href="/css/print-table.css">
  <script src="/js/libs/modernizr-2.5.3.min.js"></script>
  <script src="/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div style="clear: both"></div>
<link rel="stylesheet" href="/css/sum-all-materials-print.css" media="print">

<table width="100%">
	<tr>
		<td style="width: 75%; text-decoration: underline;"></td>
   		<td style="width: 25%;">
			<?php echo $pinakasbright; ?>
		</td>
	</tr>
</table>

<div style="margin: 0 auto; text-align: center; font-size: 20px;">
	<?php echo $pinakasbcenter; ?>
</div>


<?php include("print-protokollo-with-oct-number.php"); ?>
<?php include("print-protokollo-without-oct-number.php"); ?>
<?php include("print-protokollo-no-size.php"); ?>


<?php include("../partials/footer.inc.php") ?>

