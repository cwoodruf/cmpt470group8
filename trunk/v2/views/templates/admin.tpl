<div class="admin">
<h1>Admin Dashboard</h1>
<b>{$ldata.email}</b> <i>{$ldata.details.permissions}</i> &nbsp;&nbsp;
<a href="?action=admin/admins">Admins</a> &nbsp;&nbsp;
<a href="?action=admin/logins">Volunteer logins</a> &nbsp;&nbsp;
<a href="?action=admin/orgs">Organizations</a>
<br />

{if $logins}
	{include file=adminlogins.tpl}
{elseif $orgs}
	{include file=adminorgs.tpl}
{elseif $admins}
	{include file=adminadmins.tpl}
{/if}
</div>
