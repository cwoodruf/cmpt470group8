{literal}
$.get(
	'index.php', 
	{ 
		action: 'logout/ajax', 
	},
	function (data) {
		window.location = 'index.php';
	}
); return true;"
{/literal}
