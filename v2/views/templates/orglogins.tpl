{if $ldata.login == $ldata.details.contact_email}
<div class="organization login">
<h1>Logins</h1>
<h4>{$ldata.details.name}</h4>
</div>

<div class="organization dashboard">
<div class="organization jobs">
<a href="?action=organization/login/add">Add Login</a>
{include file=orgloginlist.tpl}
</div>
</div>

{else}
{include file=organization.tpl}
{/if}
