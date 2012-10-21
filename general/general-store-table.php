<?php 
  $title = "Πίνακας Εναποθηκευμένου Υλικού Κατά Υπομονάδας";  
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>
<?php include("../partials/wrapper-functions.php") ?>
<?php include("../partials/database-connect-old-nice-way.inc.php"); ?>
<?php  ?>

  <link rel="stylesheet" href="/css/pinakas-en-monada.css">
<!--
<table border="1" color="#000">


<tr><td>ΑΠΟΡΡΗΤΟ ΕΠΙΣΤΡΑΤΕΥΣΕΩΣ</td><td rowspan="3">(1)</td><td class="table_center">ΠΙΝΑΚΑΣ</td><td rowspan="3"><img src="/images/poiein_a_kelevei_patris.png" width="50" style="margin: 10px" /></td></tr>
<tr><td>ΕΑ: 88 ΜΕ</td><td class="table_center">ΕΝΑΠΟΘΗΚΕΥΜΕΝΟΥ ΥΛΙΚΟΥ ΕΠΙΣΤΡΑΤΕΥΣΕΩΣ (ΕΜ-ΑΣ) ΚΑΙ ΥΠΟΜΟΝΑΔΑΣ</td></tr>
<tr><td>ΑΣ: 9233</td><td></td></tr>

<tr><td colspan="3">ΕΙΔΗ ΥΛΙΚΟΥ</td><td rowspan="19">ΟΛΙΚΗ ΠΟΣΟΤΗΤΑ ΚΑΤΑ ΥΠΟΜΟΝΑΔΑ</td><td colspan="3">ΗΜΕΡΟΜΗΝΙΑ ΤΕΛΕΥΤΑΙΑΣ ΕΝΗΜΕΡΩΣΕΩΣ</td></tr>
<tr><td>ΠΡΟΒΛΕΠΟΜΕΝΗ</td><td colspan="3">Αποθήκες στις οποίες ευρίσκονται</td><td rowspan="2">(2) Α/Π</td><td rowspan="2">(2) Β/Π</td><td rowspan="2">(2) Γ/Π</td><td rowspan="2">(2) Δ/Π</td><td rowspan="2">(2) Π/Δ</td><td rowspan="2">ΠΥΡΗΝΕΣ</td><td rowspan="2">(2) ΑΝΑΠΛ</td><td rowspan="2">ΣΥΝΟΛΟ</td></tr>

<tr><td>Από Π.Ο.Υ.</td><td>Από μείωση 15%</td><td>Σύνολο</td><td>Υπάρχοντα</td>
<td rowspan="16">Προβλεπόμενα</td>
</tr>

</table>
-->
<?php $all_subunits = select_table("subunits"); ?>

<h4>Πίνακας Εναποθηκευμένου Υλικού</h4>


<a class="btn btn-primary" href="print-general-store-table.php"><i class="icon-print"></i> Εκτύπωση Πίνακα Εναποθηκευμένου Υλικού</a> <br /><br />
<a class="btn btn-primary" href="print-general-store-table-1.php?subunit=1"><i class="icon-print"></i> Εκτύπωση για την <?php $a_subunit = select_record("subunits", 1); echo $a_subunit[1]; ?></a> -
<a class="btn btn-primary" href="print-general-store-table-1.php?subunit=3"><i class="icon-print"></i> Εκτύπωση για την <?php $a_subunit = select_record("subunits", 3); echo $a_subunit[1]; ?></a> -
<a class="btn btn-primary" href="print-general-store-table-1.php?subunit=5"><i class="icon-print"></i> Εκτύπωση για την <?php $a_subunit = select_record("subunits", 5); echo $a_subunit[1]; ?></a> -
<a class="btn btn-primary" href="print-general-store-table-1.php?subunit=7"><i class="icon-print"></i> Εκτύπωση για την <?php $a_subunit = select_record("subunits", 7); echo $a_subunit[1]; ?></a> -
<a class="btn btn-primary" href="print-general-store-table-1.php?subunit=9"><i class="icon-print"></i> Εκτύπωση για την <?php $a_subunit = select_record("subunits", 9); echo $a_subunit[1]; ?></a><br /><br />
<a class="btn btn-primary" href="print-general-store-table-1.php?subunit=p"><i class="icon-print"></i> Εκτύπωση για τους πυρήνες</a> -
<a class="btn btn-primary" href="print-general-store-table-1.php?subunit=e"><i class="icon-print"></i> Εκτύπωση για τους αναπληρωματικούς έφεδρους</a><br />





<table border="1" class="pinakas-en-monada">
	<tr>
		<td rowspan="3" class="bold header-center">
			ΕΙΔΗ ΥΛΙΚΟΥ
		</td>
		<td colspan="21" class="bold text-center" style="font-size: 16px;">ΟΛΙΚΗ  ΠΟΣΟΤΗΤΑ KATA ΥΠΟΜΟΝΑΔΑ</td>
		<td rowspan="3" class="bold header-center ">
			ΗΜΕΡΟΜΗΝΙΑ ΤΕΛΕΥΤΑΙΑΣ ΕΝΗΜΕΡΩΣΕΩΣ
		</td>
	</tr>
	<tr>
		<td colspan="4" class="bold text-center">ΠΡΟΒΛΕΠΟΜΕΝΗ</td><td rowspan="2" class="bold header-center">Αποθήκες στις οποίες ευρίσκονται</td>
		<td colspan="2" class="bold text-center"><?php $subunit = select_record("subunits", 1); echo $subunit[1]; ?></td>
		<td colspan="2" class="bold text-center"><?php $subunit = select_record("subunits", 3); echo $subunit[1]; ?></td>
		<td colspan="2" class="bold text-center"><?php $subunit = select_record("subunits", 5); echo $subunit[1]; ?></td>
		<td colspan="2" class="bold text-center"><?php $subunit = select_record("subunits", 7); echo $subunit[1]; ?></td>
		<td colspan="2" class="bold text-center"><?php $subunit = select_record("subunits", 9); if($subunit[1] == "ΠΥΡΧΙΑ ΔΚΣΕΩΣ") { echo "Π/Δ"; } else { echo $subunit[1]; } ?></td>
		<td colspan="2" class="bold text-center">ΠΥΡΗΝΕΣ</td>
		<td colspan="2" class="bold text-center"><?php $subunit = select_record("subunits", 11); echo $subunit[1]; ?></td>
		<td colspan="2" class="bold text-center">ΣΥΝΟΛΟ</td>
	</tr>
	<tr>
		<td class="vertical-text bold apopoy apopoy-image"><!--<img src="/images/png-letters/apopoy.png" />--></td>
		<td class="vertical-text bold apomiwsi apomiwsi-image"><!--<img src="/images/png-letters/apomiwsi.png" />--></td>
		<td class="red-text bold vertical-text sinolo sinolo-image"><!--<img src="/images/png-letters/sinolo.png" />--></td>
		<td class="vertical-text bold iparxousa iparxousa-image"><!--<img src="/images/png-letters/iparxousa.png" />--></td>
		<td class="red-text bold vertical-text provlepomena provlepomena-image"><!--<img src="/images/png-letters/provlepomena.png" />--></td>
		<td class="vertical-text bold iparxousa iparxousa-image"><!--<img src="/images/png-letters/iparxousa.png" />--></td>
		<td class="red-text bold vertical-text provlepomena provlepomena-image"><!--<img src="/images/png-letters/provlepomena.png" />--></td>
		<td class="vertical-text bold iparxousa iparxousa-image"><!--<img src="/images/png-letters/iparxousa.png" />--></td>
		<td class="red-text vertical-text bold provlepomena provlepomena-image"><!--<img src="/images/png-letters/provlepomena.png" />--></td>
		<td class="vertical-text bold iparxousa iparxousa-image"><!--<img src="/images/png-letters/iparxousa.png" />--></td>
		<td class="red-text vertical-text bold provlepomena provlepomena-image"><!--<img src="/images/png-letters/provlepomena.png" />--></td>
		<td class="vertical-text bold iparxousa iparxousa-image"><!--<img src="/images/png-letters/iparxousa.png" />--></td>
		<td class="red-text vertical-text bold provlepomena provlepomena-image"><!--<img src="/images/png-letters/provlepomena.png" />--></td>
		<td class="vertical-text bold iparxousa iparxousa-image"><!--<img src="/images/png-letters/iparxousa.png" />--></td>
		<td class="red-text vertical-text bold provlepomena provlepomena-image"><!--<img src="/images/png-letters/provlepomena.png" />--></td>
		<td class="vertical-text bold iparxousa iparxousa-image"><!--<img src="/images/png-letters/iparxousa.png" />--></td>
		<td class="red-text vertical-text bold provlepomena provlepomena-image"><!--<img src="/images/png-letters/provlepomena.png" />--></td>
		<td class="vertical-text bold iparxousa iparxousa-image"><!--<img src="/images/png-letters/iparxousa.png" />--></td>
		<td class="red-text vertical-text bold provlepomena provlepomena-image"><!--<img src="/images/png-letters/provlepomena.png" />--></td>
		<td class="vertical-text bold iparxousa iparxousa-image"><!--<img src="/images/png-letters/iparxousa.png" />--></td>
	</tr>
	
	<tr>
		<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
		<td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td>
	</tr>
	
	<?php include("oplismou-materials.inc.php"); ?>
	<?php include("imatismou-materials.inc.php"); ?>
	<?php include("eksartiseos-materials.inc.php"); ?>

</table>

<?php include("../partials/footer.inc.php") ?>