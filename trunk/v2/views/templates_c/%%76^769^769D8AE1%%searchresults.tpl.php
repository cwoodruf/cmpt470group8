<?php /* Smarty version 2.6.26, created on 2010-11-28 01:13:58
         compiled from searchresults.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlentities', 'searchresults.tpl', 7, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tools/navcapture.tpl", 'smarty_include_vars' => array('action' => "search/results")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo $this->_smarty_vars['capture']['nav']; ?>


<h4>
Jobs
<?php if ($this->_tpl_vars['region']): ?>
for region <i><?php echo ((is_array($_tmp=$this->_tpl_vars['region'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
</i>
<?php endif; ?>

<?php if ($this->_tpl_vars['search']): ?>
search <i><?php echo ((is_array($_tmp=$this->_tpl_vars['search'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
</i>
<?php endif; ?>

<?php echo $this->_tpl_vars['howmany']; ?>
 jobs
</h4>

<?php $_from = $this->_tpl_vars['jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['job']):
?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "jobblurb.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<hr>
<?php endforeach; else: ?>
No jobs found
<?php endif; unset($_from); ?>

<?php echo $this->_smarty_vars['capture']['nav']; ?>

