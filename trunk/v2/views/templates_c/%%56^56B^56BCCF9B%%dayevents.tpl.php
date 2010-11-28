<?php /* Smarty version 2.6.26, created on 2010-11-28 06:19:48
         compiled from dayevents.tpl */ ?>
<div class="schedule day">
<a href="?action=organization#calendar">Back to calendar</a>
<h1>Schedule for <?php echo $this->_tpl_vars['this']->day; ?>
</h1>

<div class="schedule add">
<h4><?php if ($this->_tpl_vars['action'] == 'editevent'): ?>Update<?php else: ?>Add to<?php endif; ?> Schedule</h4>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "eventedit.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<div class="schedule list">
<h4>Already Scheduled</h4>
<p>
<a href="?action=schedule/<?php echo $this->_tpl_vars['this']->day; ?>
">Add schedule</a>
</p>
<?php $_from = $this->_tpl_vars['events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['e']):
?>
	<?php $_from = $this->_tpl_vars['e']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['j'] => $this->_tpl_vars['event']):
?>
<?php $this->assign('eventid', "what:".($this->_tpl_vars['event']['jobID']).",who:".($this->_tpl_vars['event']['volunteerID']).",when:".($this->_tpl_vars['event']['start'])); ?>
<p>
<b><?php echo $this->_tpl_vars['event']['email']; ?>
</b> <?php echo $this->_tpl_vars['event']['title']; ?>
<br />
<?php echo $this->_tpl_vars['event']['start']; ?>
 <?php echo $this->_tpl_vars['event']['hours']; ?>
 hr (actual <?php echo $this->_tpl_vars['event']['hours_worked']; ?>
 hr)
<?php if (! $this->_tpl_vars['event']['hours_worked']): ?>
<a href="?action=schedule/<?php echo $this->_tpl_vars['this']->day; ?>
/delevent&eventid=<?php echo $this->_tpl_vars['eventid']; ?>
"
   onclick="return confirm('really delete this event?');" >Delete</a> &nbsp;
<?php endif; ?>
<a href="?action=schedule/<?php echo $this->_tpl_vars['this']->day; ?>
/editevent&eventid=<?php echo $this->_tpl_vars['eventid']; ?>
">Edit</a> &nbsp;
</p>
	<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
</div>

<div class="menuend"></div>

</div>