<?php /* Smarty version 2.6.26, created on 2010-11-25 05:12:42
         compiled from adminadmins.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlentities', 'adminadmins.tpl', 51, false),)), $this); ?>
<h2>Admins</h2>
<form action="index.php" method="get">
<input type="hidden" name="action[]" value="admin" />
<input type="hidden" name="action[]" value="admins" />

<?php if ($this->_tpl_vars['ldata']['details']['permissions'] == 'root'): ?>
<table cellpadding="5" cellspacing="0" border="0">
<tr><td><b>Admin email:</b></td>
<td><input name="email" size="60" /></td>
</tr>
<tr><td><b>Admin password:</b></td>
<td><input name="password" type="password" size="60" /></td>
</tr>
<tr><td><b>Confirm password:</b></td>
<td><input name="confirm_password" type="password" size="60" /></td>
</tr>
<tr><td><b>Permissions:</b></td>
<td>
<select name="permissions">
<option value="">Regular admin</option>
<option value="root">Root admin</option>
</select>
<input type="submit" name="action[]" value="create" style="float: right" />
</td></tr>
</table>
<?php endif; ?>

<table cellpadding="5" cellspacing="0" border="0">

<?php if ($this->_tpl_vars['admins'] && $this->_tpl_vars['ldata']['details']['permissions'] == 'root'): ?>
<tr>
<td>
<input type="submit" name="action[]" value="save" 
	onclick="return confirm('Confirm admin update. Delete cannot be undone.');" />
</td>
</tr>
<?php endif; ?>

<?php $_from = $this->_tpl_vars['admins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['admin']):
?>
	<?php if ($this->_tpl_vars['admin']['permissions'] == 'root'): ?>
		<?php $this->assign('checked', 'checked'); ?>
	<?php else: ?>
		<?php $this->assign('checked', ''); ?>
	<?php endif; ?>
<tr>
<td>
<?php if ($this->_tpl_vars['ldata']['details']['permissions'] == 'root'): ?>
<input type="checkbox" name="delete[<?php echo $this->_tpl_vars['admin']['adminID']; ?>
]" value="delete"> delete &nbsp;&nbsp;
<input type="checkbox" name="perms[<?php echo $this->_tpl_vars['admin']['adminID']; ?>
]" value="root" <?php echo $this->_tpl_vars['checked']; ?>
> root &nbsp;&nbsp;
<?php endif; ?>
<a href="mailto:<?php echo ((is_array($_tmp=$this->_tpl_vars['admin']['email'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['admin']['email'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
</a> 

</td>
</tr>

<?php endforeach; else: ?>
<tr>
<td>
No admins
</td>
</tr>

<?php endif; unset($_from); ?>
</table>
</form>
