<h2>Admins</h2>
<div class="orginstructions">
Use this form to make new admins or change the permissions / delete existing admins.<br />
The "root" admins can add and change other admins. There must be at least one root admin.<br />
Deleting an admin is permanent. You cannot delete yourself.<br />
You can also create admins from the command line with the <b>scripts/mkadmin.sh</b> script
</div>
<form action="index.php" method="get">
<input type="hidden" name="action[]" value="admin" />
<input type="hidden" name="action[]" value="admins" />

{if $ldata.details.permissions == 'root'}
<table cellpadding="5" cellspacing="0" border="0">
<tr><td><b>Admin email:</b></td>
<td><input name="email" size="60" /></td>
</tr>
<tr><td><b>Admin password:</b></td>
<td><input name="password" type="password" size="60" /></td>
</tr>
<tr><td><b>Confirm password:</b></td>
<td><input name="confirm_password" type="password" size="60" /></td>
</tr>
<tr><td><b>Permissions:</b></td>
<td>
<select name="permissions">
<option value="">Regular admin</option>
<option value="root">Root admin</option>
</select>
<input type="submit" name="action[]" value="create" style="float: right" />
</td></tr>
</table>
{/if}

<table cellpadding="5" cellspacing="0" border="0">

{if $admins and $ldata.details.permissions == 'root'}
<tr>
<td>
<input type="submit" name="action[]" value="save" 
	onclick="return confirm('Confirm admin update. Delete cannot be undone.');" />
</td>
</tr>
{/if}

{foreach from=$admins key=i item=admin}
	{if $admin.permissions == 'root'}
		{assign var=checked value=checked}
	{else}
		{assign var=checked value=''}
	{/if}
<tr>
<td>
{if $ldata.details.permissions == 'root'}
<input type="checkbox" name="delete[{$admin.adminID}]" value="delete"> delete &nbsp;&nbsp;
<input type="checkbox" name="perms[{$admin.adminID}]" value="root" {$checked}> root &nbsp;&nbsp;
{/if}
<a href="mailto:{$admin.email|htmlentities}">{$admin.email|htmlentities}</a> 

</td>
</tr>

{foreachelse}
<tr>
<td>
No admins
</td>
</tr>

{/foreach}
</table>
</form>

