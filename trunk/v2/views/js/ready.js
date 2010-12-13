recentjobs = null;
firstjob = 0;
numjobs = 1;

$(document).ready(function () {
	if ($('#searchinput').val() == 'search') changed = false;
	else changed = true;

	$('#login_form').hide();
	$('#login_link').click(function(e) {
		if (e.which != 1) return;
		$('#login_form').show();
		e.stopPropagation();
	});
        $(document).click(function(e) {
		if (e.which == 1) $('#login_form').hide();
        });
	$('#login_form').click(function(e) {
		if (e.which == 1) e.stopPropagation();
        });
	fill_recentjobs();
	setInterval('rotate_recentjobs()', 5000);
	setInterval('fill_recentjobs()', 30000);
});

function rotate_recentjobs() {
	if (!recentjobs) return;
	$('#recentjobs').hide().html('');
	var detailurl = 'index.php?action=jobs/detail&amp;return=home&amp;jobID=';
	for (i=firstjob,j=0; j<numjobs; i++,j++) {
		if (i >= recentjobs.length) i = 0;
		$('#recentjobs').append(
			"<i>"+recentjobs[i]['city']+", "+recentjobs[i]['country']+"</i> &nbsp; "+
			recentjobs[i].created+" <b>"+recentjobs[i]['title']+"</b> "+recentjobs[i]['name']+ 
			' (<a href="'+detailurl+recentjobs[i]['jobID']+'">more</a>)<br />'
		).show('slow');
	}
	firstjob = i;
}

function fill_recentjobs() {
	$.getJSON(
		'index.php?action=jobs/recentjobs',
		function(data) {
			recentjobs = data;
			rotate_recentjobs();
		}
	);
}
