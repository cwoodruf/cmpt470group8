<?php /* Smarty version 2.6.26, created on 2010-11-28 00:53:19
         compiled from tools/loginajaxform.tpl */ ?>
<?php echo '
<form id="form_login" action="index.php" method="get"
      onsubmit="
$.get(
	\'index.php\', 
	{ 
		action: \'loginform/ajaxcheck\', 
		login: login.value, 
		password: password.value 
	},
	function (data) {
		if (data == \'OK\') {
			window.location = \'index.php?action=loginform\';
		} else {
			alert(\'Login failed. \'+data);
		}
	}
); return false;"
>
'; ?>
