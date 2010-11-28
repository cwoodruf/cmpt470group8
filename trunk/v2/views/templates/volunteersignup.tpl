<div class="login wizard">
<div class="login wizard step">
<h1>VolunteerOne Volunteer {$action|default:Signup|capitalize}</h1>
</div>
<div class="login wizard form">
<form id="formgen" action="index.php" method="post">
<table class="formgen" border="0" cellpadding="5" cellspacing="0">
<tr class="formgen" valign="top">
<td class="formgen"><b>First Name</b></td>
<td class="formgen">
<input name="name_first" size="60" value="{$this->input('name_first')}" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Last Name</b></td>
<td class="formgen">
<input name="name_last" size="60" value="{$this->input('name_last')}" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Phone</b></td>
<td class="formgen">
<input name="phone" size="32" value="{$this->input('phone')}" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Email</b></td>
<td class="formgen">
<input name="email" size="60" value="{$this->input('email')}" /> 
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
{if $action}
<input name="action[]" value="{$action}" type="hidden" />
{/if}
<input name="action[]" value="save" type="hidden" />
<input name="submit" value="save" type="submit" />
</td>
</tr>
</table>
</form>
</div>
</div>
