<?php /* Smarty version 2.6.26, created on 2010-10-12 21:05:38
         compiled from tools/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'login_params', 'tools/login.tpl', 25, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div>
<?php echo '
<form name="form_login" action="index.php" method="get"
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
			window.location = \'index.php?action=loginform/ajaxcheck\';
		} else {
			alert(\'Login failed. \'+data);
		}
	}
); return false;"
">
'; ?>

<?php echo smarty_function_login_params(array(), $this);?>

<table cellpadding="3" cellspacing="0" border="0">
<tr><td><b>Login:</b></td>
    <td><input name="login" size="64" maxlength="64" value="<?php echo $this->_tpl_vars['login']; ?>
">
    <script>document.form_login.login.focus()</script></td></tr>
<tr><td><b>Password:</b></td>
    <td><input type="password" name="password" size="64" maxlength="64"></td></tr>
<tr><td><input type="reset" value='Reset'></td>
    <td align="right"><input type="submit" value="Log In"></td></tr>
</table>
</form>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "bottom.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>