<?php /* Smarty version 2.6.26, created on 2010-11-28 02:56:19
         compiled from volstats.tpl */ ?>
<a name="volstats" ></a>
<table cellpadding="5" cellspacing="0" border="0">
<?php $_from = $this->_tpl_vars['stats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['job']):
?>
<tr>

<?php if ($this->_tpl_vars['job']['ystart'] == $this->_tpl_vars['job']['yend']): ?>
<td><?php echo $this->_tpl_vars['job']['ystart']; ?>
</td>
<?php else: ?>
<td><?php echo $this->_tpl_vars['job']['ystart']; ?>
-<?php echo $this->_tpl_vars['job']['yend']; ?>
</td>
<?php endif; ?>

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
<td>
<?php echo $this->_tpl_vars['job']['worked']; ?>
 hours
</td>
</tr>

<?php endforeach; else: ?>
No hours found

<?php endif; unset($_from); ?>
</table>
