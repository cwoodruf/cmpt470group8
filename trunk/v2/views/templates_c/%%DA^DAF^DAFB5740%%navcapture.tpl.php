<?php /* Smarty version 2.6.26, created on 2010-11-21 22:28:19
         compiled from tools/navcapture.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pagerlinks', 'tools/navcapture.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_pagerlinks(array('howmany' => $this->_tpl_vars['howmany'],'offset' => $this->_tpl_vars['offset'],'limit' => $this->_tpl_vars['limit'],'options' => 'pages','action' => $this->_tpl_vars['action']), $this);?>


<?php ob_start(); ?>
<div class="notenav">
<?php if ($this->_tpl_vars['offset'] > 0): ?>
<a href="<?php echo $this->_tpl_vars['pagerlinks']['first']; ?>
">&lt;&lt; start</a> &nbsp;&nbsp;
<a href="<?php echo $this->_tpl_vars['pagerlinks']['prev']; ?>
">&lt; prev</a> 
<?php else: ?>
&lt;&lt; start &nbsp;&nbsp;
&lt; prev 
<?php endif; ?>
&nbsp;

<?php $this->assign('sidelinks', 3); ?>
<?php $_from = $this->_tpl_vars['pagerlinks']['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o'] => $this->_tpl_vars['link']):
?>
	<?php if ($this->_tpl_vars['o'] < $this->_tpl_vars['offset'] - $this->_tpl_vars['sidelinks'] * $this->_tpl_vars['limit'] || $this->_tpl_vars['o'] > $this->_tpl_vars['offset'] + $this->_tpl_vars['sidelinks'] * $this->_tpl_vars['limit']): ?><?php continue; ?><?php endif; ?>
	<?php if ($this->_tpl_vars['o']+$this->_tpl_vars['limit'] > $this->_tpl_vars['howmany']): ?><?php $this->assign('eo', $this->_tpl_vars['howmany']); ?><?php else: ?><?php $this->assign('eo', ($this->_tpl_vars['o']+$this->_tpl_vars['limit'])); ?><?php endif; ?>
	<?php if ($this->_tpl_vars['offset'] >= $this->_tpl_vars['o'] && $this->_tpl_vars['offset'] < $this->_tpl_vars['eo']): ?>
[<?php echo $this->_tpl_vars['o']+1; ?>
-<?php echo $this->_tpl_vars['eo']; ?>
]
	<?php else: ?>
<a href="<?php echo $this->_tpl_vars['link']; ?>
">[<?php echo $this->_tpl_vars['o']+1; ?>
-<?php echo $this->_tpl_vars['eo']; ?>
]</a>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
&nbsp;

<?php if ($this->_tpl_vars['offset'] < $this->_tpl_vars['howmany'] - $this->_tpl_vars['limit']): ?>
<a href="<?php echo $this->_tpl_vars['pagerlinks']['next']; ?>
">next &gt;</a> &nbsp;&nbsp;
<a href="<?php echo $this->_tpl_vars['pagerlinks']['last']; ?>
">last &gt;&gt;</a> 
<?php else: ?>
next &gt; &nbsp;&nbsp;
last &gt;&gt; 
<?php endif; ?>
</div>
<?php $this->_smarty_vars['capture']['nav'] = ob_get_contents(); ob_end_clean(); ?>
