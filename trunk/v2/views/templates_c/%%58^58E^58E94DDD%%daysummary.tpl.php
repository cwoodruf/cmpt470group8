<?php /* Smarty version 2.6.26, created on 2010-11-21 16:47:02
         compiled from daysummary.tpl */ ?>
<div class="schedule day">
<?php if ($this->_tpl_vars['events'][$this->_tpl_vars['date']] == 1): ?>
<b><?php echo $this->_tpl_vars['events'][$this->_tpl_vars['date']]; ?>
 job</b>
<?php elseif ($this->_tpl_vars['events'][$this->_tpl_vars['date']] > 1): ?>
<b><?php echo $this->_tpl_vars['events'][$this->_tpl_vars['date']]; ?>
 jobs</b>
<?php endif; ?>
</div>