<?php /* Smarty version 2.6.26, created on 2010-10-12 19:49:32
         compiled from tools/passwordform.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'regex_replace', 'tools/passwordform.tpl', 2, false),array('modifier', 'htmlentities', 'tools/passwordform.tpl', 3, false),)), $this); ?>
<form class="formgen" method="get">
<input type="hidden" name="action" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['this']->action)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '#(/save)+$#', '') : smarty_modifier_regex_replace($_tmp, '#(/save)+$#', '')); ?>
/save">
<h3>Change password for <?php echo htmlentities($_SESSION['login']['login']); ?>
</h3>
<table cellpadding="3" cellspacing="0" border="0" class="formgen">
<tr><td>Old Password:</td><td><input size="60" type="password" name="old_password"></td></tr>
<tr><td>New Password:</td><td><input size="60" type="password" name="new_password"></td></tr>
<tr><td>Repeat New Password:</td><td><input size="60" type="password" name="confirm_password"></td></tr>
<tr>
<td align="left"><input type="reset" value="Reset"></td>
<td align="right"><input type="submit" value="Save Password"></td>
</tr>
</table>
</form>