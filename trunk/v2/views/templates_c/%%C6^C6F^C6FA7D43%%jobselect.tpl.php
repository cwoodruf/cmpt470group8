<?php /* Smarty version 2.6.26, created on 2010-11-16 21:44:13
         compiled from jobselect.tpl */ ?>
<?php if ($this->_tpl_vars['jobs']): ?>
<select name="jobID">
<?php $_from = $this->_tpl_vars['jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['job']):
?>
	<?php if ($this->_tpl_vars['job']['jobID'] == $this->_tpl_vars['jobID']): ?><?php $this->assign('selected', 'selected'); ?><?php else: ?><?php $this->assign('selected', ""); ?><?php endif; ?>
	<option value="<?php echo $this->_tpl_vars['job']['jobID']; ?>
" <?php echo $this->_tpl_vars['selected']; ?>
><?php echo $this->_tpl_vars['job']['title']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
<?php endif; ?>