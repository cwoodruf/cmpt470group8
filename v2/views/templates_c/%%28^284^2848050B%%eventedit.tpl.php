<?php /* Smarty version 2.6.26, created on 2010-11-16 22:51:55
         compiled from eventedit.tpl */ ?>
<form id="formgen" action="index.php" method="post">
<input type="hidden" name="eventid" value="<?php echo $this->_tpl_vars['eventid']; ?>
" />
<table class="formgen" border="0" cellpadding="5" cellspacing="0">
<tbody><tr class="formgen formbuttons">
<td class="formgen formbuttons">
<input value="reset" type="reset">
</td>
<td class="formgen formbuttons" align="right">
<input name="action[]" value="schedule" type="hidden">
<input name="action[]" value="<?php echo $this->_tpl_vars['this']->day; ?>
" type="hidden">
<input name="action[]" value="<?php echo $this->_tpl_vars['action']; ?>
" type="hidden">
<input name="action[]" value="save" type="submit">
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>What (job)</b></td>
<td class="formgen">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "jobselect.tpl", 'smarty_include_vars' => array('jobID' => $this->_tpl_vars['event']['jobID'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Who (email)</b></td>
<td class="formgen">
<input name="email" value="<?php echo $this->_tpl_vars['event']['email']; ?>
" /> 
<a href="?action=volunteer/signup" target="newvolunteer">new</a>
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>When (start)</b></td>
<td class="formgen">
<?php echo $this->_tpl_vars['this']->day; ?>

<input name="starttime" value="<?php echo $this->_tpl_vars['event']['starttime']; ?>
" size="5" /> HH:MM
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Hours required</b></td>
<td class="formgen">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "hourselect.tpl", 'smarty_include_vars' => array('name' => 'hours','select' => $this->_tpl_vars['event']['hours'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
hours
</td>
</tr>
<?php if ($this->_tpl_vars['action'] == 'editevent' && $this->_tpl_vars['this']->day <= date ( 'Y-m-d' )): ?>
<tr class="formgen" valign="top">
<td class="formgen"><b>Actual hours</b></td>
<td class="formgen">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "hourselect.tpl", 'smarty_include_vars' => array('name' => 'hours_worked','select' => $this->_tpl_vars['event']['hours_worked'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
hours
</td>
</tr>
<?php endif; ?>

</table>
</form>
