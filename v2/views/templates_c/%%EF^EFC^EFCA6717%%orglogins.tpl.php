<?php /* Smarty version 2.6.26, created on 2010-11-28 02:12:59
         compiled from orglogins.tpl */ ?>
<?php if ($this->_tpl_vars['ldata']['login'] == $this->_tpl_vars['ldata']['details']['contact_email']): ?>
<div class="organization login">
<h1>Logins</h1>
<h4><?php echo $this->_tpl_vars['ldata']['details']['name']; ?>
</h4>
</div>

<div class="organization dashboard">
<div class="organization jobs">
<a href="?action=organization/login/add">Add Login</a>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "orgloginlist.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</div>

<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "organization.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>