<?php /* Smarty version 2.6.26, created on 2010-10-12 18:33:21
         compiled from tools/dump.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlentities', 'tools/dump.tpl', 7, false),)), $this); ?>
<table cellpadding=5 cellspacing=0 border=0 class="<?php echo $this->_tpl_vars['class']; ?>
">

<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['value']):
?>

<tr>
<td>
<b><?php echo htmlentities($this->_tpl_vars['field']); ?>
</b>
</td>
<td>
<?php echo htmlentities($this->_tpl_vars['value']); ?>

</td>
</tr>

<?php endforeach; endif; unset($_from); ?>

</table>
