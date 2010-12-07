<div class="login wizard">
<div class="login wizard step">
{if $ldata.user_type == 'organization'}
<a href="?action=organization/login">Logins</a>
<h1>{$action|default:Add|capitalize} Login</h1>
<h4>{$ldata.details.name}</h4>
</div>
<div class="login wizard form">
<form id="formgen" action="index.php" method="post">
<table class="formgen" border="0" cellpadding="5" cellspacing="0">
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
<input name="action[]" value="organization" type="hidden" />
<input name="action[]" value="login" type="hidden" />
{if $action}
<input name="action[]" value="{$action}" type="hidden" />
{else}
<input name="action[]" value="add" type="hidden" />
{/if}
<input name="action[]" value="save" type="hidden" />
<input name="submit" value="save" type="submit" />
</td>
</tr>
</table>
</form>
{else}
<h4>You must log in to use this form.</h4>
{/if}
</div>
</div>
