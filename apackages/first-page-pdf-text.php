<?php
	include("../partials/database-connect-old-nice-way.inc.php");
	include("../partials/wrapper-functions.php");
  
  $config_query = "SELECT * FROM configurations";
  $config = mysql_query($config_query);
	while($config_row = mysql_fetch_assoc($config)) {
		if($config_row['variable_name'] == "pinakasaleft") { $pinakasaleft = $config_row['value']; }
		if($config_row['variable_name'] == "pinakasaright") { $pinakasaright = $config_row['value']; }
		if($config_row['variable_name'] == "pinakasacenter") { $pinakasacenter = $config_row['value']; }
	}
?>

<head>
	<meta charset="utf-8">
</head>
<table>
	<tr>
		<td style="text-decoration: underline; font-weight: bold; float: left; width: 455pt;">ΑΠΟΡΡΗΤΟ-ΕΠΣ</td>
		<td>
			<?php echo $pinakasaright; ?>

			<?php echo date("d/m/Y"); ?>
		</td>
	</tr>
	<tr>
		<td style="text-decoration: underline;">
				<?php echo $pinakasaleft; ?>
		</td>
		<td>&nbsp;</td>
	</tr>
</table>

<br />

<div style="text-align: center; text-decoration: underline; font-weight: bold"><?php echo $pinakasacenter; ?></div>

<?php $subunits = all_subunits(); $pirines = all_pirines(); $anapliromatikoi = anapliromatikoi(); ?> 
<div style="text-align: center;">ΔΥΝΑΜΗ ΑΠΟ Μ/Γ ΚΑΤΑΣΤΑΣΕΙΣ: <?php echo $subunits; ?> + <?php echo $pirines; ?> = <?php echo $subunits + $pirines; ?> + ΑΝΑΠΛΗΡΩΜΑΤΙΚΟΙ: <?php echo $anapliromatikoi['provlepomeni_dinami']; ?></div>
