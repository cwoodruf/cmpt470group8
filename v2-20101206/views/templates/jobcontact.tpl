<div class="job contact">
{if $ldata}
{assign var=subject value="From VolunteerOne - `$job.title`"|strip_tags}

<form action="index.php" method="post"
      onsubmit="
if ($('#email').val().length == 0) {ldelim}
	alert('missing email');
	return false;
{rdelim}
if ($('#email').val() != $('#confirm_email').val()) {ldelim}
	alert('emails do not match');
	return false;
{rdelim}
l=$('#msgtext').val().length; 
if (l > {$maxmsgsize}) {ldelim}
   alert('Message is '+ l +' characters. Should be no more than {$maxmsgsize} characters.');
   return false;
{rdelim} else if (l == 0) {ldelim}
   alert('No message!');
   return false;
{rdelim} else return true;
   
">

<input type="hidden" name="subject" value="{$subject}">
<h4>Subject: {$subject}</h4>
<table cellpadding="5" cellspacing="0" border="0">
<tr><td><b>Email:</b></td>
<td><input id="email" name="email" size="60" value="{$this->input('email')|default:$ldata.login}" /></td></tr>
<tr>
<td><b>Confirm email:</b></td>
<td><input id="confirm_email" name="confirm_email" size="60" value="{$this->input('confirm_email')}" /></td></tr>
<tr valign="top"><td><b>Message:</b></td>
<td>
<i>maximum size: {$maxmsgsize} characters</i>
<br />
<textarea wrap="off" name="message" rows="20" cols="60" id="msgtext">{$this->input('message')}</textarea>
</td>
</tr>
<tr>
<td align="right" colspan="2">
<input type="hidden" name="action[]" value="jobs" />
<input type="hidden" name="action[]" value="contact" />
<input type="submit" name="action[]" value="send" />
</td>
</tr>
</table>
</form>

{else}
<div class="volunteer login">
<h3>Please log in or sign up as a volunteer</h3>
<a href="?action=volunteer/signup">Sign up</a> &nbsp;&nbsp;
<a href="?action=loginform">Log in</a>
</div>

{/if}
</div>
