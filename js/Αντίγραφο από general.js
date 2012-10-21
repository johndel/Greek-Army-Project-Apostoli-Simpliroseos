// Pinakas B - Add Material

$(function(){
	$(".b_materials").each(function() {
		if($(".edit_mode").length > 0) {
		if($("#package_number").val()) {
			PACKAGE_NUMBER_PAGE = $("#package_number").val();	
		}
			tmp = $(this).val();
			size_edit_appear(tmp, $(this));	
		} else {
			PACKAGE_NUMBER_PAGE = "new";
			tmp = $(this).val();
			size_appear(tmp, $(this));
		}
		
	});
	
    $("#myTable").dataTable({
		"bJQueryUI": true,
		"bPaginate": false,
		"bInfo": false,
		//"bAutoWidth": true,
		"oLanguage": {
			"sSearch": "Αναζήτηση",
        }
	});
	check_uniqueness_a();
	check_uniqueness_b();
});


$(".b_materials").live("change", function() {
	tmp = $(this).val();
	//alert(tmp);
	size_appear(tmp, $(this));
	//console.log(tmp);
});

$(".add-material").click(function() {
  aa = parseInt($(".nice-table tr:last td:first").text()) + 1;
  $.get("/bpackages/material.inc.php", function(data) {
	$(".nice-table").append(data); // $(data).hide().appendTo(".nice-table").fadeIn();
	 size_appear($(".b_materials:last").val(), $(".b_materials:last"));
	$(".nice-table tr:last td:first").text(aa);
  });
});

$(".add-material-a").click(function() {
  aa = parseInt($(".nice-table tr:last td:first").text()) + 1;
  $.get("/apackages/material.inc.php", function(data) {
	$(".nice-table").append(data); // $(data).hide().appendTo(".nice-table").fadeIn();
	 size_appear($(".b_materials:last").val(), $(".b_materials:last"));
	$(".nice-table tr:last td:first").text(aa);
  });
});

$(".remove-material-row").live("click", function() {
	$(this).parent().parent().remove();
	aa_count = 1;	
	$(".count_aa").each(function() {
		$(this).text(aa_count);
		aa_count++;
	});
});

function size_appear(material_id, obj) {
	i = 0;
	obj.parent().next().children().children().each(function() {
		//console.log($(this));
		// console.log($(this).data("materialsize") != tmp);
		if($(this).data("materialsize") != material_id) {
			$(this).removeClass("appear");
			$(this).removeClass("disappear");
			$(this).addClass("disappear");
			$(this).removeAttr("selected");
		}
		else {  $(this).removeClass("disappear"); $(this).removeClass("appear"); $(this).addClass("appear"); if(i == 0) { i = 1; $(this).attr("selected", "selected"); }}
	});
	if(obj.parent().next().children().next().find(".appear").length == 0) { obj.parent().next().find(".no-size-text").css("display", "block"); obj.parent().next().find(".b_sizes").css("display", "none"); } 
	else { obj.parent().next().find(".no-size-text").css("display", "none"); obj.parent().next().find(".b_sizes").css("display", "block"); }
}

function size_edit_appear(material_id, obj) {
	i = 0;
	obj.parent().next().children().children().each(function() {
		//console.log($(this));
		// console.log($(this).data("materialsize") != tmp);
		if($(this).data("materialsize") != material_id) {
			$(this).removeClass("appear");
			$(this).removeClass("disappear");
			$(this).addClass("disappear");
		}
		else {  $(this).removeClass("disappear"); $(this).removeClass("appear"); $(this).addClass("appear"); if(i == 0) { i = 1; }}
	});
	if(obj.parent().next().children().next().find(".appear").length == 0) { obj.parent().next().find(".no-size-text").css("display", "block"); obj.parent().next().find(".b_sizes").css("display", "none"); } 
	else { obj.parent().next().find(".no-size-text").css("display", "none"); obj.parent().next().find(".b_sizes").css("display", "block"); }
}


function check_uniqueness_a() {
	$("#a_packages #package_number").blur(function() {
		check_package_number_a_val();
	});
}


function check_uniqueness_b() {
	$("#b_packages #package_number").blur(function() {
		check_package_number_b_val();
	});
}

function check_package_number_a_val() {
		if($("#package_number").val()) {
			var package_number = $("#package_number").val();
			$.post("/partials/check-unique-number-a.inc.php", {d : package_number}, function(data) {
					//$("#notice").html("xmxm" + data + "mxmx");
				if((PACKAGE_NUMBER_PAGE == "new" && data) || (data && PACKAGE_NUMBER_PAGE != "new" && PACKAGE_NUMBER_PAGE != $("#package_number").val())) {	
						$("#notice").html("<span style='color: #dd0000'>Υπάρχει ήδη δέμα με αυτό τον αριθμό! <a href='/"+data.substr(data.length-1)+"packages/edit.php?package_id="+data.match(/[0-9]+/)+"'>Επεξεργασία δέματος</a></span>");
						$("#submit_package").attr("disabled", "disabled");
				} else {
					$("#notice").html("");
					$("#submit_package").removeAttr("disabled");
				}
			});
		}
}


function check_package_number_b_val() {
		if($("#package_number").val()) {
			var package_number = $("#package_number").val();
			$.post("/partials/check-unique-number-b.inc.php", {d : package_number}, function(data) {
					//$("#notice").html(data);
				if((PACKAGE_NUMBER_PAGE == "new" && data) || (data && PACKAGE_NUMBER_PAGE != $("#package_number").val())) {	
					$("#notice").html("<span style='color: #dd0000'>Υπάρχει ήδη δέμα με αυτό τον αριθμό! <a href='/"+data.substr(data.length-1)+"packages/edit.php?package_id="+data.match(/[0-9]+/)+"'>Επεξεργασία δέματος</a></span>");
					$("#submit_package").attr("disabled", "disabled");
				} else {
					$("#notice").html("");
					$("#submit_package").removeAttr("disabled");
				}
			});
		}
}


$("#myTable tr").hover(function() {
	$(this).toggleClass("highlight");
});

	//$(this).toggleClass("highlight");
/*	$(this).css("background-color","red").css("border", "1px solid #000");
},
function() {
	$(this).css("border", "0px");
	*/
