<?php 

  include("partials/database-connect-old-nice-way.inc.php");
  $config_query = "SELECT * FROM configurations";
  $config = mysql_query($config_query);
  while($config_row = mysql_fetch_assoc($config)) {
	if($config_row['variable_name'] == "stoixeia_monados") { $asnumber = $config_row['value']; }
	if($config_row['variable_name'] == "ea") { $ea = $config_row['value']; }
	if($config_row['variable_name'] == "em") { $em = $config_row['value']; }
	if($config_row['variable_name'] == "apomiwsi")   { $apomiwsi = $config_row['value']; }
  }
  mysql_close($conn);
  
  include("partials/database-connect.inc.php");
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
<a href="/" id="link-to-start"><div id="logo"></div></a> <div class="as-number"><?php echo $asnumber; ?></div>
<div style="clear: both"></div>