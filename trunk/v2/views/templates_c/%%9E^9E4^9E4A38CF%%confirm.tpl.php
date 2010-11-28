<?php /* Smarty version 2.6.26, created on 2010-11-16 02:38:47
         compiled from tools/confirm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'aryassign', 'tools/confirm.tpl', 1, false),array('modifier', 'htmlentities', 'tools/confirm.tpl', 2, false),array('modifier', 'default', 'tools/confirm.tpl', 8, false),)), $this); ?>
<?php echo smarty_function_aryassign(array('ary' => $this->_tpl_vars['this']->input,'keys' => 'confirm,what,action,submit'), $this);?>

<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['confirm'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
<h3>

<form name="confirm" method="post">
<?php if ($this->_tpl_vars['action']): ?>
<input type="hidden" name="what" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['what'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
">
<input type="hidden" name="action" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['action'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
">
<input type="submit" value="<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['submit'])) ? $this->_run_mod_handler('default', true, $_tmp, 'ok') : smarty_modifier_default($_tmp, 'ok')))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
">
<?php endif; ?>
</form>