<?php /* Smarty version 2.6.26, created on 2010-11-21 23:41:20
         compiled from organizationsignup.tpl */ ?>
<h1>Organization sign up</h1>
<div class="login wizard form">
<i>All fields are required</i>
<br>
<form id="formgen" action="index.php" method="post">
<table class="formgen" border="0" cellpadding="5" cellspacing="0" width="100%">
<tr class="formgen" valign="top">
<td class="formgen"><b>Contact first name</b></td>
<td class="formgen">
<input name="contact_name_first" size="60" value="<?php echo $this->_tpl_vars['this']->input('contact_name_first'); ?>
" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Contact last name</b></td>
<td class="formgen">
<input name="contact_name_last" size="60" value="<?php echo $this->_tpl_vars['this']->input('contact_name_last'); ?>
" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Contact phone</b></td>
<td class="formgen">
<input name="contact_phone" size="32" value="<?php echo $this->_tpl_vars['this']->input('contact_phone'); ?>
" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Contact email</b></td>
<td class="formgen">
<input name="contact_email" size="60" value="<?php echo $this->_tpl_vars['this']->input('contact_email'); ?>
" /> 
</td>
</tr>
<?php if ($this->_tpl_vars['action'] == ''): ?>
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
<?php endif; ?>
<tr><td colspan="2"><hr></td></tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Organization name</b></td>
<td class="formgen">
<input name="name" size="60" value="<?php echo $this->_tpl_vars['this']->input('name'); ?>
" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>URL</b></td>
<td class="formgen">
<input name="url" size="60" value="<?php echo $this->_tpl_vars['this']->input('url'); ?>
" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>What does your organization do?</b></td>
<td class="formgen">
<textarea name="description" rows="5" cols="60"><?php echo $this->_tpl_vars['this']->input('description'); ?>
</textarea>
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Organization address</b></td>
<td class="formgen">
<textarea name="address" rows="5" cols="60"><?php echo $this->_tpl_vars['this']->input('address'); ?>
</textarea>
</td>
</tr>
<tr class="formgen formbuttons">
<td class="formgen formbuttons">
<input value="reset" type="reset">
</td>
<td class="formgen formbuttons" align="right">
<input name="action[]" value="organization" type="hidden" />
<?php if ($this->_tpl_vars['action']): ?>
<input name="action[]" value="<?php echo $this->_tpl_vars['action']; ?>
" type="hidden" />
<?php endif; ?>
<input name="action[]" value="save" type="hidden" />
<input name="submit" value="save" type="submit" />
</td>
</tr>
</table>
</form></div>
</div>