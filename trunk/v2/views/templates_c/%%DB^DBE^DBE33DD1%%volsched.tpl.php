<?php /* Smarty version 2.6.26, created on 2010-11-28 02:56:19
         compiled from volsched.tpl */ ?>
<a name="volsched" ></a>
<table cellpadding="5" cellspacing="0" border="0">
<?php $_from = $this->_tpl_vars['sched']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['job']):
?>
<tr>
<td><?php echo $this->_tpl_vars['job']['start']; ?>
</td>
<td>
<?php if ($this->_tpl_vars['job']['hours']): ?>
Scheduled <?php echo $this->_tpl_vars['job']['hours']; ?>
 hours
<?php else: ?>
No scheduled hours
<?php endif; ?>
</td>
<td>
<a href="?action=organization/detail&organizationID=<?php echo $this->_tpl_vars['job']['organizationID']; ?>
"><?php echo $this->_tpl_vars['job']['name']; ?>
</a>
</td>
<td>
<a href="?action=jobs/detail&jobID=<?php echo $this->_tpl_vars['job']['jobID']; ?>
"><?php echo $this->_tpl_vars['job']['title']; ?>
</a>
</td>
</tr>

<?php endforeach; else: ?>
No scheduled jobs found

<?php endif; unset($_from); ?>
</table>
