<?php /* Smarty version 2.6.26, created on 2010-11-28 04:11:02
         compiled from pwrecover.tpl */ ?>
<div class="password">
<h1>Recover password</h1>
<div class="password instructions">
Enter your email to receive a link to make a new password.
</div>
<form action="index.php" method="post">
<div class="password form">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tools/confirmform.tpl", 'smarty_include_vars' => array('field' => 'email')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div class="password action">
<input type="hidden" name="action[]" value="password" />
<input type="hidden" name="action[]" value="recover" />
<input type="submit" name="action[]" value="send" />
</div>
</form>
</div>
