<?php /* Smarty version 2.6.26, created on 2010-11-28 05:25:15
         compiled from tools/confirmform.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'tools/confirmform.tpl', 3, false),array('modifier', 'default', 'tools/confirmform.tpl', 4, false),)), $this); ?>
<table cellpadding="3" cellspacing="0" border="0" class="formgen">
<?php if ($this->_tpl_vars['extra']): ?>
<tr><td><?php echo ((is_array($_tmp=$this->_tpl_vars['extra'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
:</td>
<td><input size="<?php echo ((is_array($_tmp=@$this->_tpl_vars['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 60) : smarty_modifier_default($_tmp, 60)); ?>
" type="text" name="<?php echo $this->_tpl_vars['extra']; ?>
"></td></tr>
<?php endif; ?>
<tr><td><?php echo ((is_array($_tmp=$this->_tpl_vars['field'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
:</td>
<td><input size="<?php echo ((is_array($_tmp=@$this->_tpl_vars['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 60) : smarty_modifier_default($_tmp, 60)); ?>
" type="<?php echo ((is_array($_tmp=@$this->_tpl_vars['type'])) ? $this->_run_mod_handler('default', true, $_tmp, 'text') : smarty_modifier_default($_tmp, 'text')); ?>
" name="<?php echo $this->_tpl_vars['field']; ?>
"></td></tr>
<tr><td>Confirm <?php echo ((is_array($_tmp=$this->_tpl_vars['field'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
:</td>
<td><input size="<?php echo ((is_array($_tmp=@$this->_tpl_vars['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 60) : smarty_modifier_default($_tmp, 60)); ?>
" type="<?php echo ((is_array($_tmp=@$this->_tpl_vars['type'])) ? $this->_run_mod_handler('default', true, $_tmp, 'text') : smarty_modifier_default($_tmp, 'text')); ?>
" name="confirm_<?php echo $this->_tpl_vars['field']; ?>
"></td></tr>
</table>