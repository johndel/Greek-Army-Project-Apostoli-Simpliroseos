<script>
onload = function() {
	//window.print();
}
</script>
<?php
	include("../partials/database-connect-old-nice-way.inc.php");
	include("../partials/wrapper-functions.php");
	
	$package = select_package_id($_GET['package_id']);
	$place = select_record("configurations", 12);
	$today_date = select_record("configurations", 8);
	$sigkrotisi_date = select_record("configurations", 9);
	
	$tmp_counter = 0;
	$quantity3 = 0;
	$quantity4 = 0;
	$g3a3 = false;
	$gea4 = false;
	$gun_numbers3 = "";
	$gun_numbers4 = "";
?>


<link rel="stylesheet" href="/css/general.css">
<link rel="stylesheet" href="/css/oplismou-print.css">

<div class="top-head">ΓΕΣ/ΔΕΣ/Υπόδ. Υ111/79</div>

<div class="bottom-head">
	<div class="left-bh">ΕΑ: 88 <span class="underlineme">ΜΕ</span></div> 
	<div class="right-bh">ΑΡ. ΔΕΜΑΤΟΣ............<span class="boldme"><?php echo $package['number']; ?></span>............</div>
</div>

<center>
<img src="/images/oplismou-logo.jpg" class="oplismou-logo" />
</center>

<div>ΕΜ ή ΑΣ: <span class="underlineme">33</span> / <?php 	echo $package['subunits']; ?></div>

<div class="deltio">
  <div>ΔΕΛΤΙΟ</div>
  <div>Συσκευασίας και Συντήρησης Υλικού</div>
</div>

<div style="text-indent: 10px">
<?php echo $place[2]; ?> σήμερα την <?php echo $today_date[2]; ?>, η υπογεγραμμένη επιτροπή η οποία συγκροτήθηκε με την <?php echo $sigkrotisi_date[2]; ?> Η.Δ. Μονάδας 
και αποτελούμενη από τους:
<br />
<table class="epitropi_table">
<tr><td>α. <?php $proedros_oplismou = select_record("configurations", 5); echo $proedros_oplismou[2]; ?></td><td>σαν Πρόεδρο</td></tr>
<tr><td>β. <?php $melosa_oplismou = select_record("configurations", 6); echo $melosa_oplismou[2]; ?></td><td>και</td></tr>
<tr><td>γ. <?php $melosb_oplismou = select_record("configurations", 7); echo $melosb_oplismou[2]; ?></td><td>σαν μέλη</td></tr>
</table>

<div class="proevi">ΠΡΟΕΒΗ</div>
Στην συντήρηση, αναλίπανση και συσκευασία του οπλισμού της ΑΣ και των παρελκόμενων αυτών όπως παρακάτω:
	<?php $test = select_all_records("oplismou_materials_packages", "package_id", $_GET['package_id']); ?>
	<br />

<center>
	<table class="temaxia">
	<?php 
	foreach($test as $value => $row) { ?>
	<?php if($row['material_id'] == 11) { ?>
	<?php 
	$g3a3 = true;
	$gun_numbers3 = $row['gun_number'].", ".$gun_numbers3; 
	if(is_numeric(trim($row['gun_number']))) {	
		$quantity3 = $quantity3 + 1;
	}
	?>
	<?php } elseif( $row['material_id'] == 7) { ?>
	<?php 
	$g3a4 = true;
	$gun_numbers4 = $row['gun_number'].", ".$gun_numbers4;
	if(is_numeric(trim($row['gun_number']))) {	
		$quantity4 = $quantity4 + 1;
	}
	?>
	<?php } else { ?>
		<tr>
			<td><?php echo $tmp_counter = $tmp_counter + 1; ?></td> 
			<td class="material_column"><?php $mat_name = select_record("oplismou_materials", $row['material_id']); echo $mat_name[1]; ?></td> 
			<td>Τεμ.</td>
			<td><?php echo $row['quantity']; ?></td>
		</tr>

	<?php }
	} if($g3a3) { ?>
		<tr>
			<td><?php echo $tmp_counter = $tmp_counter + 1; ?></td> 
			<td class="material_column">Τυφέκια G3A3 <?php if($quantity3 > 0) { ?> (Αρ. Τυφεκίων - <?php } ?> <?php echo substr_replace($gun_numbers3, "", -2); ?><?php if($quantity3 > 0) { ?>)<?php } ?></td> 
			<td>Τεμ.</td>
			<td><?php echo $quantity3; ?></td>
		</tr>
	<?php }
	if($g3a4) { ?>
		<tr>
			<td><?php echo $tmp_counter = $tmp_counter + 1; ?></td> 
			<td class="material_column">Τυφέκια G3A4 <?php if($quantity4 > 0) { ?> (Αρ. Τυφεκίων - <?php } ?> <?php echo substr_replace($gun_numbers4,"" , -2); ?><?php if($quantity4 > 0) { ?>)<?php } ?></td> 
			<td>Τεμ.</td>
			<td><?php echo $quantity4; ?></td>
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