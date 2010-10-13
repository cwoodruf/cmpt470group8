<?php /* Smarty version 2.6.26, created on 2010-10-12 18:25:59
         compiled from top.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'top.tpl', 3, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "xmljunk.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<head>
<title><?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->name)) ? $this->_run_mod_handler('default', true, $_tmp, 'example site') : smarty_modifier_default($_tmp, 'example site')); ?>
</title>
<?php echo $this->_tpl_vars['this']->css(); ?>

<?php echo $this->_tpl_vars['this']->js(); ?>

</head>
<body>

<div class="toplevel">
<h3>Example site</h3>

<?php if ($this->_tpl_vars['errors']): ?>
errors:
<h3 class="errors"><?php echo $this->_tpl_vars['errors']; ?>
</h3>
<?php endif; ?>

<?php if ($this->_tpl_vars['topmsg']): ?>
<h3 class="topmsg"><?php echo $this->_tpl_vars['topmsg']; ?>
</h3>
<?php endif; ?>
