<?php /* Smarty version 2.6.26, created on 2010-11-17 01:53:16
         compiled from regions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'regions', 'regions.tpl', 1, false),array('function', 'option', 'regions.tpl', 6, false),)), $this); ?>
<?php echo smarty_function_regions(array(), $this);?>

Region:
<select name="region" onchange="changed=true; if ($('#searchinput').val() == 'search') $('#searchinput').val('');" >
<option value="">any</option>
<?php $_from = $this->_tpl_vars['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['region']):
?>
<?php echo smarty_function_option(array('value' => $this->_tpl_vars['region']), $this);?>

<?php endforeach; endif; unset($_from); ?>
</select>