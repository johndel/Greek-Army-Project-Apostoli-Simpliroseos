//add-oplismou-material

$(function() {
	$(".remove-material-row").live("click", function() {
	$(this).parent().parent().remove();
	aa_count = 1;	
		$(".count_aa").each(function() {
			$(this).text(aa_count);
			aa_count++;
		});
	});
});

$(".add-oplismou-material").click(function() {
  aa = parseInt($(".nice-table tr:last td:first").text()) + 1;
  $.get("/oplismou/material.inc.php", function(data) {
	$(".nice-table").append(data); // $(data).hide().appendTo(".nice-table").fadeIn();
	$(".nice-table tr:last td:first").text(aa);
  });
});