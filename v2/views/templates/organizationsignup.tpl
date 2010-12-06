<h1>Organization sign up</h1>
<div class="login wizard form">
<div class="orginstructions">
Enter your contact information and your organization details.<br />
We will contact your shortly to confirm your sign up.<br />
All fields are required.
</div>
<div class="orginstructions">
</div>
<form id="formgen" action="index.php" method="post">
<table class="formgen" border="0" cellpadding="5" cellspacing="0" width="100%">
<tr class="formgen" valign="top">
<td class="formgen" colspan="2">
<hr />
<div class="orginstructions">
Your contact details.
</div>
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Contact first name</b></td>
<td class="formgen">
<input name="contact_name_first" size="60" value="{$this->input('contact_name_first')}" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Contact last name</b></td>
<td class="formgen">
<input name="contact_name_last" size="60" value="{$this->input('contact_name_last')}" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Contact phone</b></td>
<td class="formgen">
<input name="contact_phone" size="32" value="{$this->input('contact_phone')}" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Contact email</b></td>
<td class="formgen">
<input name="contact_email" size="60" value="{$this->input('contact_email')}" /> 
</td>
</tr>
{if $action == ''}
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
{/if}
<tr><td colspan="2">
<hr />
<div class="orginstructions">
Organization information
</div>
</td></tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Organization name</b></td>
<td class="formgen">
<input name="name" size="60" value="{$this->input('name')}" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>URL</b></td>
<td class="formgen">
<input name="url" size="60" value="{$this->input('url')}" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>What does your organization do?</b></td>
<td class="formgen">
<textarea name="description" rows="5" cols="60">{$this->input('description')}</textarea>
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Organization address</b></td>
<td class="formgen">
<textarea name="address" rows="5" cols="60">{$this->input('address')}</textarea>
</td>
</tr>
<tr class="formgen formbuttons">
<td class="formgen formbuttons">
<input value="reset" type="reset">
</td>
<td class="formgen formbuttons" align="right">
<input name="action[]" value="organization" type="hidden" />
{if $action}
<input name="action[]" value="{$action}" type="hidden" />
{/if}
<input name="action[]" value="save" type="hidden" />
<input name="submit" value="save" type="submit" />
</td>
</tr>
</table>
</form></div>
</div>
