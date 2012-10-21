<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>
<?php include("../partials/wrapper-functions.php") ?>
<?php include("../partials/database-connect-old-nice-way.inc.php"); ?>
<?php // $a_materials_result = select_ordered_table("a_materials", "name"); ?>
<?php // $b_materials_result = select_ordered_table("b_materials", "name"); ?>
<?php $materials_result = apografi_ylikwn(); ?>


<h4>Κατάσταση Απογραφής Υλικών ΑΣ (με Μερίδα Υλικού)</h4>
<!-- <a class="btn btn-primary" href="print-apackages-pdf.php"><i class="icon-print"></i> Εκτύπωση Πίνακα Α</a>-->

<?php $base_name = "http://".$_SERVER['SERVER_NAME']."/"; ?>

<table border=1 style="text-align: center;">
	<tr style="text-align: center;">
		<th>Α/Α</th>
		<th style="padding: 0 5px;">ΑΡΙΘΜΟΣ ΜΕΡΙΔΑΣ</th>
		<th style="padding: 0 10px;">ΑΡΙΘΜΟΣ ΟΝΟΜΑΣΤΙΚΟΥ</th>
		<th>ΠΕΡΙΓΡΑΦΗ ΥΛΙΚΟΥ</th>
		<th>ΜΟΝΑΔΑ ΜΕΤΡΗΣΗΣ</th>
		<th style="padding: 0 10px;">ΛΟΓΙΣΤΙΚΟ ΥΠΟΛΟΙΠΟ</th>
		<th style="padding: 0 10px;">ΥΠΟΛΟΙΠΟ ΑΠΟΘΗΚΗΣ ΑΣ</th>
		<th style="padding: 0 10px;">ΔΙΑΦΟΡΑ</th>
	</tr>

	<?php //while($material = mysql_fetch_assoc($a_materials_result)) { ?>	
	<?php //$tmp_table = "a"; include("ylika.php"); ?>
	<?php //} ?>
	
	<?php while($material = mysql_fetch_assoc($materials_result)) { ?>	
	<?php include("ylika.php"); ?>
	<?php } ?>
</table>


<?php include("../partials/footer.inc.php"); ?>

<script src="/js/libs/jquery.jeditable.mini.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('.editable').editable("<?php echo $base_name ?>general/ajax-update.php", {
			//type: "textarea",
			cancel: "X",
			placeholder: "------------",
			submit: "&#8730;",
			onblur: "submit",
			callback: function(value, settings) {
				calculate_difference($(this));
			}
		});	
	
		$(".logistiko").each(function() {
			calculate_difference($(this));
		});
			
	});

	function calculate_difference(logistiko) {
		if(logistiko.attr("id").substr(0, 2) == "ly") {
			logistiko_value = parseInt(logistiko.parent().next().html()) - parseInt(logistiko.text());	
			if(isNaN(logistiko_value)) {
				logistiko.parent().next().next().text("");
			} else {
				logistiko.parent().next().next().text(logistiko_value);
			}
		}
	}
	
</script>

