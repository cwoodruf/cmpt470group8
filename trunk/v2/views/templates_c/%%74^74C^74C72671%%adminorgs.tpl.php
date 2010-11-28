<?php /* Smarty version 2.6.26, created on 2010-11-25 05:24:49
         compiled from adminorgs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlentities', 'adminorgs.tpl', 25, false),)), $this); ?>
<h2>Manage organizations</h2>
<form action="index.php" method="get">
<table cellpadding="5" cellspacing="0" border="0">

<?php if ($this->_tpl_vars['orgs']): ?>
<tr>
<td>
<input type="hidden" name="action[]" value="admin" />
<input type="hidden" name="action[]" value="orgs" />
<input type="submit" name="action[]" value="save" />
</td>
</tr>

<?php endif; ?>
<?php $_from = $this->_tpl_vars['orgs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['org']):
?>
	<?php if ($this->_tpl_vars['org']['visibility_status'] == 'hidden'): ?>
		<?php $this->assign('checked', 'checked'); ?>
	<?php else: ?>
		<?php $this->assign('checked', ''); ?>
	<?php endif; ?>
<tr>
<td>
<input type="checkbox" name="hide[<?php echo $this->_tpl_vars['org']['organizationID']; ?>
]" value="hidden" <?php echo $this->_tpl_vars['checked']; ?>
> hide &nbsp;&nbsp;
<a href="?action=organization/detail&organizationID=<?php echo $this->_tpl_vars['org']['organizationID']; ?>
" target="_blank"><?php echo $this->_tpl_vars['org']['organizationID']; ?>
</a> 
<b><?php echo ((is_array($_tmp=$this->_tpl_vars['org']['name'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
</b>
<a href="mailto:<?php echo ((is_array($_tmp=$this->_tpl_vars['org']['contact_email'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
">email</a> &nbsp;
<?php echo ((is_array($_tmp=$this->_tpl_vars['org']['contact_phone'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>

</td>
</tr>

<?php endforeach; else: ?>
<tr>
<td>
No organizations
</td>
</tr>

<?php endif; unset($_from); ?>
</table>
</form>
