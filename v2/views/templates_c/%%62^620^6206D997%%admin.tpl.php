<?php /* Smarty version 2.6.26, created on 2010-11-24 04:06:44
         compiled from admin.tpl */ ?>
<div class="admin">
<h1>Admin Dashboard</h1>
<b><?php echo $this->_tpl_vars['ldata']['email']; ?>
</b> <i><?php echo $this->_tpl_vars['ldata']['details']['permissions']; ?>
</i> &nbsp;&nbsp;
<a href="?action=admin/admins">Admins</a> &nbsp;&nbsp;
<a href="?action=admin/logins">Volunteer logins</a> &nbsp;&nbsp;
<a href="?action=admin/orgs">Organizations</a>
<br>

<?php if ($this->_tpl_vars['logins']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adminlogins.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['orgs']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adminorgs.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['admins']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adminadmins.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
</div>