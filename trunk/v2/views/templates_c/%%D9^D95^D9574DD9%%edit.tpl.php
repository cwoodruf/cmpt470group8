<?php /* Smarty version 2.6.26, created on 2010-11-16 01:03:35
         compiled from edit.tpl */ ?>
<?php if (! $this->_tpl_vars['input'] && $this->_tpl_vars['ldata']['details']): ?>
<?php $this->assign('input', $this->_tpl_vars['ldata']['details']); ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tools/formgen.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>