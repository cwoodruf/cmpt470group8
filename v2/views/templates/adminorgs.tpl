<h2>Manage organizations</h2>
<form action="index.php" method="get">
<table cellpadding="5" cellspacing="0" border="0">

{if $orgs}
<tr>
<td>
<input type="hidden" name="action[]" value="admin" />
<input type="hidden" name="action[]" value="orgs" />
<input type="submit" name="action[]" value="save" />
</td>
</tr>

{/if}
{foreach from=$orgs key=i item=org}
	{if $org.visibility_status == 'hidden'}
		{assign var=checked value=checked}
	{else}
		{assign var=checked value=''}
	{/if}
<tr>
<td>
<input type="checkbox" name="hide[{$org.organizationID}]" value="hidden" {$checked}> hide &nbsp;&nbsp;
<a href="?action=organization/detail&organizationID={$org.organizationID}" target="_blank">{$org.organizationID}</a> 
<b>{$org.name|htmlentities}</b>
<a href="mailto:{$org.contact_email|htmlentities}">email</a> &nbsp;
{$org.contact_phone|htmlentities}
</td>
</tr>

{foreachelse}
<tr>
<td>
No organizations
</td>
</tr>

{/foreach}
</table>
</form>

