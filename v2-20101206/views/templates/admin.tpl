<div class="admin">
<h1>Admin Dashboard</h1>
<b>{$ldata.email}</b> <i>{$ldata.details.permissions}</i> &nbsp;&nbsp;
{if $ldata.details.permissions == root}
<a href="?action=admin/admins">Admins</a> &nbsp;&nbsp;
{/if}
<a href="?action=admin/logins">Volunteer logins</a> &nbsp;&nbsp;
<a href="?action=admin/orgs">Organizations</a>
<br />

{if $logins}
	{include file=adminlogins.tpl}
{elseif $orgs}
	{include file=adminorgs.tpl}
{elseif $admins}
	{include file=adminadmins.tpl}
{else}
<ul>
{if $ldata.details.permissions == root}
<li><b>Admins:</b> manage site admins. You can add or change admin privileges here.</li>
{/if}
<li><b>Volunteer logins:</b> lists all volunteers on the site. You can hide (deactivate) volunteer logins here.</li>
<li><b>Organizations:</b> lists all organizations on the site with contact info. 
       You can hide (deactivate) organizations here.</li>
</ul>
<p>Note that organizations can add their own logins on the system. Any user can recover a password with the 
"Forgot password?" link on the login form.</p>
{/if}
</div>
