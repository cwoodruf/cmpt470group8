<?php /* Smarty version 2.6.26, created on 2010-11-16 02:20:27
         compiled from joblist.tpl */ ?>
<ul class="jobs">

<?php $_from = $this->_tpl_vars['jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['job']):
?>
<li class="jobs">
<?php echo $this->_tpl_vars['job']['jobID']; ?>
 <b><?php echo $this->_tpl_vars['job']['title']; ?>
</b>

<?php if ($this->_tpl_vars['ldata']['user_type'] == 'organization'): ?>
&nbsp;&nbsp;
<a href="?action=jobs/detail&jobID=<?php echo $this->_tpl_vars['job']['jobID']; ?>
">Details</a> &nbsp;
<a href="?action=jobs/edit&jobID=<?php echo $this->_tpl_vars['job']['jobID']; ?>
">Edit</a> &nbsp;
<a href="?action=jobs/confirmdel&jobID=<?php echo $this->_tpl_vars['job']['jobID']; ?>
">Delete</a> &nbsp;
<?php endif; ?>

</li>

<?php endforeach; endif; unset($_from); ?>
</ul>