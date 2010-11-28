<?php /* Smarty version 2.6.26, created on 2010-11-16 22:48:52
         compiled from jobs.tpl */ ?>
<h1>Jobs</h1>

<?php if ($this->_tpl_vars['ldata']['user_type'] == 'organization'): ?>
<div class="organization login">
<h4><?php echo $this->_tpl_vars['ldata']['details']['name']; ?>
</h4>
</div>

<div class="organization dashboard">
<div class="organization jobs">
<a href="?action=jobs/add">Add New Job</a> &nbsp;
<a href="?action=organization#calendar">Schedule work</a>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "joblist.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>
</div>
<?php endif; ?>