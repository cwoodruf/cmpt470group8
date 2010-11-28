<?php /* Smarty version 2.6.26, created on 2010-11-28 05:34:24
         compiled from orglogin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'orglogin.tpl', 5, false),array('modifier', 'capitalize', 'orglogin.tpl', 5, false),)), $this); ?>
<div class="login wizard">
<div class="login wizard step">
<?php if ($this->_tpl_vars['ldata']['user_type'] == 'organization'): ?>
<a href="?action=organization/login">Logins</a>
<h1><?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['action'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Add') : smarty_modifier_default($_tmp, 'Add')))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 Login</h1>
<h4><?php echo $this->_tpl_vars['ldata']['details']['name']; ?>
</h4>
</div>
<div class="login wizard form">
<form id="formgen" action="index.php" method="post">
<table class="formgen" border="0" cellpadding="5" cellspacing="0">
<tr class="formgen" valign="top">
<td class="formgen"><b>Email</b></td>
<td class="formgen">
<input name="email" size="60" value="<?php echo $this->_tpl_vars['this']->input('email'); ?>
" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Password</b></td>
<td class="formgen">
<input name="password" type="password" size="60" value="" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Repeat password</b></td>
<td class="formgen">
<input name="confirm_password" type="password" size="60" value="" /> 
</td>
</tr>
<tr class="formgen formbuttons">
<td class="formgen formbuttons">
<input value="reset" type="reset">
</td>
<td class="formgen formbuttons" align="right">
<input name="action[]" value="organization" type="hidden" />
<input name="action[]" value="login" type="hidden" />
<?php if ($this->_tpl_vars['action']): ?>
<input name="action[]" value="<?php echo $this->_tpl_vars['action']; ?>
" type="hidden" />
<?php else: ?>
<input name="action[]" value="add" type="hidden" />
<?php endif; ?>
<input name="action[]" value="save" type="hidden" />
<input name="submit" value="save" type="submit" />
</td>
</tr>
</table>
</form>
<?php else: ?>
<h4>You must log in to use this form.</h4>
<?php endif; ?>
</div>
</div>