$(document).ready(function () {
	if ($('#searchinput').val() == 'search') changed = false;
	else changed = true;

	$('#login_form').hide();
	$('#login_link').click(function(e) {
	    $('#login_form').show();
            e.stopPropagation();
	});
        $(document).click(function() {
            $('#login_form').hide();
        });
	$('#login_form').click(function(e) {
            e.stopPropagation();
        });

});
