<?php include("../partials/head.inc.php"); ?>
<?php include("../partials/menu.inc.php"); ?>
<?php include("../partials/wrapper-functions.php"); ?>
<?php include("../partials/database-connect-old-nice-way.inc.php"); ?>

<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $base_name = "http://".$_SERVER['SERVER_NAME']."/";
  
  
  $title = "Επεξεργασία Υπομονάδων";
  $subunits = select_table("subunits");
?>
<h4>Υπομονάδες</h4>
<form id="subunits" method="post" action="">
	<table class="nice-table" id="subunitstable" border=1>
		<thead>
			<tr>
				<th>Όνομα</th><th>Προβλεπόμενη Δύναμη</th><th>Χρώμα</th><th>Πρώτο Πακέτο</th><th>Τελευταίο Πακέτο</th>
			</tr>
		</thead>
		<tbody>
			<?php while($subunits_row = mysql_fetch_assoc($subunits)) { $tmp_j = 1; ?>
			<tr>
				<td><span class="editable" id="<?php echo $subunits_row['id']."-subunits"; ?>"><?php echo $subunits_row['subunits']; ?></span></td>
				<td><span id="<?php echo $subunits_row['id']."-provlepomeni_dinami"; ?>" class="editable"><?php echo $subunits_row['provlepomeni_dinami']; ?></span></td>
				<td width="110px"><div style="float: left; border: 1px solid #000; width: 28px; height: 29px; background-color: #<?php echo $subunits_row['color']; ?>"></div><input style="float: left; display: block" type="text" id="<?php echo $subunits_row['id']."-color"; ?>" class="colorpickerhandle" value="<?php echo $subunits_row['color']; ?>"></td>
				<td><span id="<?php echo $subunits_row['id']."-start_package"; ?>" class="editable"><?php echo $subunits_row['start_package']; ?></span></td>
				<td><span id="<?php echo $subunits_row['id']."-end_package"; ?>" class="editable"><?php echo $subunits_row['end_package']; ?></span></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</form>


<?php include("../partials/footer.inc.php") ?>

<link rel="stylesheet" href="/css/colorpicker/colorpicker.css" type="text/css" />

<script src="/js/libs/jquery.jeditable.mini.js"></script>
<script src="/js/libs/colorpicker.js"></script>


<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
			$('.editable').editable("<?php echo $base_name; ?>subunits/edit.php", {
				//type: "textarea",
				cancel: "Άκυρο",
				placeholder: "Πατήστε για να το αλλάξετε",
				submit: "Αποθήκευση"
			});
			
			$(".colorpickerhandle").ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).val(hex);
						$(el).ColorPickerHide();
						data = $(el).attr("id");
						color_value = $(el).val();
						$.post("<?php echo $base_name; ?>subunits/edit.php", { value: color_value, id: data }, function(data) {
							$(el).prev().css("background-color", "#"+color_value);
						});
							
					},
					onBeforeShow: function () {
						$(this).ColorPickerSetColor(this.value);
					}
				})
				.bind('keyup', function(){
					$(this).ColorPickerSetColor(this.value);
				});
				
				/*$("#subunitstable").dataTable({
					"bJQueryUI": true,
					"bPaginate": false,
					"bInfo": false,
					"bFilter": false,
					"aoColumns": [
						null, 
						{"sType": "numeric"},
						null,
						{"sType": "string"},
						{"sType": "numeric"},
					]
				});*/
			
			});
</script>