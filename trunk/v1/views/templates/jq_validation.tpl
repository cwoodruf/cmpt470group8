{literal}
<script type="text/javascript" src="http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.js"></script>

<style type="text/css">	
	label { width: 10em; float: left; }
	label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
	p { clear: both; }
	.submit { margin-left: 12em; }
	em { font-weight: bold; padding-right: 1em; vertical-align: top; }
</style>
<script>
	$(document).ready(function(){
	$("#formgen").validate();
	});
</script>
{/literal}
