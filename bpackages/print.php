<script>
onload = function() {
	window.print();
}
</script>
<?php
	include("../partials/database-connect-old-nice-way.inc.php");
	include("../partials/wrapper-functions.php");
	
	$package = select_btable_package_id($_GET['package_id']);
	
	$sigkrotisi_date = select_record("configurations", 8);
	$today_date = select_record("configurations", 9);
	$place = select_record("configurations", 12);
	$tmp_counter = 0;
?>


<link rel="stylesheet" href="/css/general.css">
<link rel="stylesheet" href="/css/pinakas-a-print.css">

<div class="top-heading">
	<div class="left-bh"><span class="underlineme">ΕΑ: 88 ΜΕ</span>
		<div><span class="underlineme">ΕΜ ή ΑΣ: 33 / <?php 	echo $package['subunits']; ?></span></div>
	</div>

	<div class="center-bh">
	<center>
	<img src="/images/oplismou-logo.jpg" class="oplismou-logo" />
	</center>
	</div>

	<div class="right-bh">
		<div class="top-head">
			ΓΕΣ/ΔΕΣ/Υπόδ. Υ111/79
		</div>
		<div style="clear: both"></div>
		<div class="package-info">ΑΡ. ΔΕΜΑΤΟΣ <?php echo $package['number']; ?>
			<span class="underlineme">TMHMA: <?php if(($package['subunit_id'] == 2) || ($package['subunit_id'] == 4) || ($package['subunit_id'] == 6) || ($package['subunit_id'] == 8) || ($package['subunit_id'] == 10)) { echo "ΠΥΡΗΝΕΣ"; } ?></span>
		</div>
	</div>
</div>



<div class="deltio">
  <div>ΔΕΛΤΙΟ</div>
  <div>Συσκευασίας και Συντήρησης Υλικού</div>
</div>

<div style="text-indent: 10px">
<?php echo $place[2]; ?>, σήμερα την <?php echo show_today_date($package['last_update'], $today_date[2]); ?>, η υπογεγραμμένη επιτροπή η οποία συγκροτήθηκε με την <?php echo $sigkrotisi_date[2]; ?> Η.Δ. Μονάδας 
και αποτελούμενη από τους:
<br />
<table class="epitropi_table">
<tr><td>α. <?php $proedros_oplismou = select_record("configurations", 5); echo $proedros_oplismou[2]; ?></td><td>σαν Πρόεδρο</td></tr>
<tr><td>β. <?php $melosa_oplismou = select_record("configurations", 6); echo $melosa_oplismou[2]; ?></td><td>και</td></tr>
<tr><td>γ. <?php $melosb_oplismou = select_record("configurations", 7); echo $melosb_oplismou[2]; ?></td><td>σαν μέλη</td></tr>
</table>

<div class="proevi">ΠΡΟΕΒΗ</div>
Στην συντήρηση και συσκευασία των κατωτέρω υλικών:
	<?php $test = select_all_records("b_materials_packages", "package_id", $_GET['package_id']); ?>
	<br />

<center>
	<table class="temaxia">
	<tr>
		<th>&nbsp;</th><th>ΕΙΔΟΣ ΥΛΙΚΟΥ</th><th>ΜΕΓΕΘΟΣ</th><th>ΠΟΣΟΤΗΤΑ</th>
	</tr>
	<?php 
	foreach($test as $value => $row) { ?>
		<tr>
			<td><?php echo $tmp_counter = $tmp_counter + 1; ?></td>
			<td class="material_column">
			<?php $mat_name = select_record("b_materials", $row['material_id']); ?>	
			<?php echo $mat_name[1]; ?></td><td style="text-align: center"><?php if(check_size("b", $row['material_id'])) { $size = select_record("b_sizes", $row['size_id']); echo $size[2]; } else { echo "-"; }?></td>
			<td style="text-align: center"><?php echo get_quantity_type("b", $mat_name[0]); ?>: <?php echo $row['quantity']; ?></td>
		</tr>

	<?php } ?>
	</table>
</center>

</div>

<div class="signature-start">Το παρόν συντάχθηκε σε τρία αντίτυπα και υπογράφεται:</div>
<div style="text-align: center">Η ΕΠΙΤΡΟΠΗ</div>
<br />
<div>
	<div class="sign-left">Ο ΠΡΟΕΔΡΟΣ</div>
	<div class="sign-right">
	<div style="">ΤΑ ΜΕΛΗ</div><br />
	α.<br /><br /><br /><br />
	β.<br />
	</div>
</div>