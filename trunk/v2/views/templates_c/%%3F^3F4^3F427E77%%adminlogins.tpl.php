<?php /* Smarty version 2.6.26, created on 2010-11-25 05:17:19
         compiled from adminlogins.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlentities', 'adminlogins.tpl', 20, false),)), $this); ?>
<h2>Volunteer logins</h2>
<form action="index.php" method="get">
<table cellpadding="5" cellspacing="0" border="0">

<?php if ($this->_tpl_vars['logins']): ?>
<tr>
<td align="right">
<input type="hidden" name="action[]" value="admin" />
<input type="hidden" name="action[]" value="logins" />
<input type="submit" name="action[]" value="save" />
</td>
</tr>

<?php endif; ?>
<?php $_from = $this->_tpl_vars['logins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['login']):
?>
<tr>
<td>
<input type="checkbox" name="hide[<?php echo $this->_tpl_vars['login']['external_key']; ?>
]" value="hidden" 
 <?php if ($this->_tpl_vars['login']['visibility_status'] == 'hidden'): ?>checked<?php endif; ?> /> hide &nbsp;&nbsp;
<a href="mailto:<?php echo ((is_array($_tmp=$this->_tpl_vars['login']['email'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
"><?php echo $this->_tpl_vars['login']['email']; ?>
</a> &nbsp;
(type <?php echo $this->_tpl_vars['login']['user_type']; ?>
)

</td>
</tr>

<?php endforeach; else: ?>
<tr>
<td>
No logins
</td>
</tr>

<?php endif; unset($_from); ?>
</table>
</form>

