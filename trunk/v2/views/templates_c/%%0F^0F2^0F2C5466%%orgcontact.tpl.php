<?php /* Smarty version 2.6.26, created on 2010-11-21 23:10:45
         compiled from orgcontact.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'orgcontact.tpl', 30, false),)), $this); ?>
<div class="job contact">
<?php if ($this->_tpl_vars['ldata']['user_type'] == 'volunteer'): ?>
<?php $this->assign('subject', "From VolunteerOne - general enquiry"); ?>

<form action="index.php" method="post"
      onsubmit="
if ($('#email').val().length == 0) {
	alert('missing email');
	return false;
}
if ($('#email').val() != $('#confirm_email').val()) {
	alert('emails do not match');
	return false;
}
l=$('#msgtext').val().length; 
if (l > <?php echo $this->_tpl_vars['maxmsgsize']; ?>
) {
   alert('Message is '+ l +' characters. Should be no more than <?php echo $this->_tpl_vars['maxmsgsize']; ?>
 characters.');
   return false;
} else if (l == 0) {
   alert('No message!');
   return false;
} else return true;
   
">

<input type="hidden" name="subject" value="<?php echo $this->_tpl_vars['subject']; ?>
">
<h4>Subject: <?php echo $this->_tpl_vars['subject']; ?>
</h4>
<table cellpadding="5" cellspacing="0" border="0">
<tr><td><b>Email:</b></td>
<td><input id="email" name="email" size="60" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->input('email'))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['ldata']['login']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['ldata']['login'])); ?>
" /></td></tr>
<tr>
<td><b>Confirm email:</b></td>
<td><input id="confirm_email" name="confirm_email" size="60" value="<?php echo $this->_tpl_vars['this']->input('confirm_email'); ?>
" /></td></tr>
<tr valign="top"><td><b>Message:</b></td>
<td>
<i>maximum size: <?php echo $this->_tpl_vars['maxmsgsize']; ?>
 characters</i>
<br>
<textarea wrap="off" name="message" rows="20" cols="60" id="msgtext"><?php echo $this->_tpl_vars['this']->input('message'); ?>
</textarea>
</td>
</tr>
<tr>
<td align="right" colspan="2">
<input type="hidden" name="action[]" value="organization" />
<input type="hidden" name="action[]" value="contact" />
<input type="submit" name="action[]" value="send" />
</td>
</tr>
</table>
</form>

<?php else: ?>
<div class="volunteer login">
<h3>Please log in or sign up as a volunteer</h3>
<a href="?action=volunteer/signup">Sign up</a> &nbsp;&nbsp;
<a href="?action=loginform">Log in</a>
</div>

<?php endif; ?>
</div>