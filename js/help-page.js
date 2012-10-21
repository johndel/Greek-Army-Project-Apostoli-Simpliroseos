$(function(){
	$(".question").toggle(function() {
	$(this).next(".answer").slideDown();
        }, function(){
            $(this).next('.answer').slideUp();
	});
});