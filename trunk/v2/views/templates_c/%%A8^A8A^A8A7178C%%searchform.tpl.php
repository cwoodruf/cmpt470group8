<?php /* Smarty version 2.6.26, created on 2010-11-28 06:04:05
         compiled from searchform.tpl */ ?>
<form id="search" action="index.php" method="get" onsubmit="return changed;">
<div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "regions.tpl", 'smarty_include_vars' => array('select' => $this->_tpl_vars['region'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> &nbsp;

<input size="20" name="search" value="<?php echo $this->_tpl_vars['search']; ?>
" id="searchinput<?php echo $this->_tpl_vars['id']; ?>
" />

<input type="hidden" name="action[]" value="search" />
<input type="hidden" name="newsearch" value="true" />
<input type="submit" name="action[]" value="search" />
<a href="?action=search&amp;search=&amp;region=&amp;newsearch=true">Browse</a> 
</div>

</form>