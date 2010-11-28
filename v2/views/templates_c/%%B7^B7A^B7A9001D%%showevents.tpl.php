<?php /* Smarty version 2.6.26, created on 2010-11-16 00:45:14
         compiled from tools/calendars/showevents.tpl */ ?>
<?php $_from = $this->_tpl_vars['events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['event']):
?>
<nobr>
<a href="?action=<?php echo $this->_tpl_vars['event']['_action_']; ?>
&<?php echo $this->_tpl_vars['event']['_id_']; ?>
=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['event']['email']; ?>
 <?php echo $this->_tpl_vars['id']; ?>
</a>
</nobr>
<br>
<?php endforeach; endif; unset($_from); ?>