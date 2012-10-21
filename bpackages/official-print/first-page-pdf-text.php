<?php
	include("../../partials/database-connect-old-nice-way.inc.php");
	include("../../partials/wrapper-functions.php");
?>

<head>
	<meta charset="utf-8">
</head>

<table>
	<tr>
		<td style="text-decoration: underline; font-weight: bold; float: left; width: 455pt;">ΑΠΟΡΡΗΤΟ-ΕΠΣ</td>
		<td>
			<div style="font-weight: bold;">ΑΕΑ: 4&nbsp; &nbsp; &nbsp; ΑΑΑ:</div>
			101 ΜΠΜΠ<br />
			ΓΕΝ. ΔΙΑΧ/ΣΗ ΥΛΙΚΟΥ<br />
			<?php echo date("d/m/Y"); ?>
		</td>
	</tr>
	<tr>
		<td style="text-decoration: underline;">ΠΑΡΑΡΤΗΜΑ "Γ" ΣΤΗ <br /> ΑΠ. ΕΠΣ Φ.600/1/50030/Σ.15</td>
		<td>&nbsp;</td>
	</tr>
</table>

<br />

<div style="text-align: center; text-decoration: underline; font-weight: bold">ΠΙΝΑΚΕΣ <br /> ΚΑΤΑ ΕΙΔΟΣ - ΜΕΓΕΘΟΣ ΚΑΙ ΠΟΣΟΤΗΤΑ ΥΛΙΚΩΝ ΤΗΣ 9233 ΑΣ</div>

<?php $subunits = all_subunits(); $pirines = all_pirines(); $anapliromatikoi = anapliromatikoi(); ?> 
<div style="text-align: center;">ΔΥΝΑΜΗ ΑΠΟ Μ/Γ ΚΑΤΑΣΤΑΣΕΙΣ: <?php echo $subunits; ?> + <?php echo $pirines; ?> = <?php echo $subunits + $pirines; ?> + ΑΝΑΠΛΗΡΩΜΑΤΙΚΟΙ: <?php echo $anapliromatikoi['provlepomeni_dinami']; ?></div>
