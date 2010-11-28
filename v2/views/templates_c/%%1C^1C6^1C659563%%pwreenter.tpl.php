<?php /* Smarty version 2.6.26, created on 2010-11-28 05:25:48
         compiled from pwreenter.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlentities', 'pwreenter.tpl', 7, false),)), $this); ?>
<div class="password">
<h1>Make new password</h1>
<div class="password instructions">
Enter a new password.
</div>
<form action="index.php" method="post">
<input type="hidden" name="key" value="<?php echo ((is_array($_tmp=$_REQUEST['key'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
">
<div class="password form">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tools/confirmform.tpl", 'smarty_include_vars' => array('type' => 'password','field' => 'password','extra' => 'email')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div class="password action">
<input type="hidden" name="action[]" value="password" />
<input type="hidden" name="action[]" value="reenter" />
<input type="submit" name="action[]" value="save" />
</div>
</form>
</div>
