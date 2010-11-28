<?php /* Smarty version 2.6.26, created on 2010-11-15 23:09:54
         compiled from signup.tpl */ ?>
<h1><?php echo $this->_tpl_vars['who']; ?>
 sign up</h1>

<div class="login wizard">
<div class="login wizard step">
Step <?php echo $this->_tpl_vars['step']; ?>
: <?php echo $this->_tpl_vars['description']; ?>

</div>

<div class="login wizard form">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tools/formgen.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<div class="login wizard help">
<?php if ($this->_tpl_vars['step'] < $this->_tpl_vars['laststep']): ?>
Click save to go to the next step...
<?php else: ?>
Click save to save your application.
<?php endif; ?>
</div>

</div>