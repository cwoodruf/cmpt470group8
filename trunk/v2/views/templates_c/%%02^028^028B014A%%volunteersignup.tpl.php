<?php /* Smarty version 2.6.26, created on 2010-11-21 15:39:08
         compiled from volunteersignup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'volunteersignup.tpl', 3, false),array('modifier', 'capitalize', 'volunteersignup.tpl', 3, false),)), $this); ?>
<div class="login wizard">
<div class="login wizard step">
<h1>VolunteerOne Volunteer <?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['action'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Signup') : smarty_modifier_default($_tmp, 'Signup')))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</h1>
</div>
<div class="login wizard form">
<form id="formgen" action="index.php" method="post">
<table class="formgen" border="0" cellpadding="5" cellspacing="0">
<tr class="formgen" valign="top">
<td class="formgen"><b>First Name</b></td>
<td class="formgen">
<input name="name_first" size="60" value="<?php echo $this->_tpl_vars['this']->input('name_first'); ?>
" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Last Name</b></td>
<td class="formgen">
<input name="name_last" size="60" value="<?php echo $this->_tpl_vars['this']->input('name_last'); ?>
" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Phone</b></td>
<td class="formgen">
<input name="phone" size="32" value="<?php echo $this->_tpl_vars['this']->input('phone'); ?>
" /> 
</td>
</tr>
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
<input name="action[]" value="volunteer" type="hidden" />
<?php if ($this->_tpl_vars['action']): ?>
<input name="action[]" value="<?php echo $this->_tpl_vars['action']; ?>
" type="hidden" />
<?php endif; ?>
<input name="action[]" value="save" type="hidden" />
<input name="submit" value="save" type="submit" />
</td>
</tr>
</table>
</form>
</div>
</div>