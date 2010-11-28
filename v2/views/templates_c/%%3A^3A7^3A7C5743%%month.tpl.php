<?php /* Smarty version 2.6.26, created on 2010-11-16 00:45:14
         compiled from tools/calendars/month.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_select_date', 'tools/calendars/month.tpl', 12, false),array('modifier', 'string_format', 'tools/calendars/month.tpl', 33, false),array('modifier', 'capitalize', 'tools/calendars/month.tpl', 42, false),)), $this); ?>
<?php $this->assign('dom', 0); ?>
<?php if ($this->_tpl_vars['showevents'] == ''): ?>
	<?php $this->assign('showevents', "tools/calendars/showevents.tpl"); ?>
<?php endif; ?>

<div class="calendar-title"><?php echo $this->_tpl_vars['month']; ?>
 <?php echo $this->_tpl_vars['year']; ?>
</div>

<div class="calendar-form">
<form name="pickdate">
<input type="hidden" name="action" value="<?php echo $this->_tpl_vars['this']->action; ?>
">
<input type="hidden" name="startdate">
Highlight date: <?php echo smarty_function_html_select_date(array('start_year' => 2009,'end_year' => 2011), $this);?>

<input type="submit" value="Go">
&nbsp;&nbsp;
<a href="?action=<?php echo $this->_tpl_vars['this']->action; ?>
&startdate=<?php echo $this->_tpl_vars['prevdate']; ?>
">&lt; Previous Month</a> &nbsp;&nbsp;
<a href="?action=<?php echo $this->_tpl_vars['this']->action; ?>
&startdate=<?php echo $this->_tpl_vars['nextdate']; ?>
">Next Month &gt;</a>
</form>
</div>

<div class="calendar">
<?php $_from = $this->_tpl_vars['weeks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['week']):
?>
<div class="calendar month eow"></div>

<?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dow'] => $this->_tpl_vars['day']):
?>

<?php if ($this->_tpl_vars['firstdow'] == $this->_tpl_vars['dow']): ?>
	<?php if ($this->_tpl_vars['dom'] == 0): ?>
		<?php $this->assign('dom', 1); ?>
	<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['dom'] > 0 && $this->_tpl_vars['dom'] <= $this->_tpl_vars['eom']): ?>
	<?php ob_start(); ?><?php echo $this->_tpl_vars['year']; ?>
-<?php echo $this->_tpl_vars['mon']; ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['dom'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d")); ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('date', ob_get_contents());ob_end_clean(); ?>
	<?php if ($this->_tpl_vars['dom'] == $this->_tpl_vars['startday']): ?>
	<div class="calendar month selected dom">
	<?php elseif ($this->_tpl_vars['dow'] == 7 || $this->_tpl_vars['dow'] == 6): ?>
	<div class="calendar month weekend dom">
	<?php else: ?>
	<div class="calendar month dom">
	<?php endif; ?>
		
		<?php echo ((is_array($_tmp=$this->_tpl_vars['day'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
<br><?php echo $this->_tpl_vars['date']; ?>
 &nbsp;
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['showevents'], 'smarty_include_vars' => array('date' => $this->_tpl_vars['date'],'events' => $this->_tpl_vars['events'][$this->_tpl_vars['date']])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	<?php $this->assign('dom', ($this->_tpl_vars['dom']+1)); ?>

<?php else: ?>
		<div class="calendar month">
		<?php echo $this->_tpl_vars['day']; ?>
<br>
	<?php if ($this->_tpl_vars['dom'] == 0): ?>
		<?php 
		if (!$pre) $pre = $this->_tpl_vars['firstdow'] + 1;
		else $pre--;
		print date('Y-m-d',strtotime("{$this->_tpl_vars['startdate']} - $pre day"));
		 ?>
	<?php else: ?>
		<?php 
		if (!$post) $post = 1; else $post++;
		print date('Y-m-d',strtotime("{$this->_tpl_vars['enddate']} + $post day"));
		 ?>
	<?php endif; ?>
	</div>

<?php endif; ?>

<?php endforeach; endif; unset($_from); ?>

<?php endforeach; endif; unset($_from); ?>
</div>