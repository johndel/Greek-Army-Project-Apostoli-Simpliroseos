$(function() {
  $(".choose-date").datepicker( {dateFormat: "dd-mm-yy"} );
  // $(".choose-date").datepicker( {dateFormat: "yy-mm-dd"} );
  // $(".choose-date2").datepicker($.datepicker.regional["fr"]);
});

$(document).ready(function() {
  $("input").keypress(function (evt) {
	var charCode = evt.charCode || evt.keyCode;
	if(charCode == 13) { return false; }
  });
});

	//{ dateFormat: "dd MM yy"}, 
	//{ monthNames: ["Ιανουαρίου", "Φεβρουαρίου", "Μαρτίου", "Απριλίου", "Μαϊου", "Ιουνίου", "Ιουλίου", "Αυγούστου", "Σεπτεμβρίου", "Οκτωβρίου", "Νοεμβρίου", "Δεκεμβρίου"] }