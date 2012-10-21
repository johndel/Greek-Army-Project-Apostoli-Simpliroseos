<?php
	include("../partials/database-connect-old-nice-way.inc.php");
	include("../partials/wrapper-functions.php");
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
  
  <link rel="stylesheet" href="/css/my-general.css">
  <link rel="stylesheet" href="/css/pinakas-en-monada.css">
<script>
onload = function() {
	window.print();
}
</script>

<style>
	body {
	  font-family: arial;
	  font-size: 8px;
	}
	
	table.pinakas-en-monada {
		border-width: 0 0 1px 1px;
		border-spacing: 0;
		border-collapse: collapse;
		border-style: solid;
	}
	
	.pinakas-en-monada td, .pinakas-en-monada th {
		margin: 0;
		padding: 2px;
		border-width: 1px 1px 0 0;
		border-style: solid;
	}

	.text-left-header {
		width: 300px !important;
	}

	.header-center {
		text-align: center;
		vertical-align: middle;
		width: 90px !important;
	}
</style>

<?php //$_GET['subunit']; ?>
<?php include("ana-pirxia/print-before-table.inc.php"); ?>

<?php include("ana-pirxia/print-table-header.inc.php"); ?>	
	<?php include("ana-pirxia/print-oplismou-materials.inc.php"); ?>
</table>

<div style="page-break-after: always"></div>

<?php include("ana-pirxia/print-before-table.inc.php"); ?>
<?php include("ana-pirxia/print-table-header.inc.php"); ?>	
	<?php include("ana-pirxia/print-imatismou-materials.inc.php"); ?>
</table>
<div style="page-break-after: always"></div>

<?php include("ana-pirxia/print-before-table.inc.php"); ?>
<?php include("ana-pirxia/print-table-header.inc.php"); ?>
<?php $eksartiseos_counter = 0; ?>	
	<?php include("ana-pirxia/print-eksartiseos-materials.inc.php"); ?>
</table>

<?php include("../partials/footer.inc.php") ?>


