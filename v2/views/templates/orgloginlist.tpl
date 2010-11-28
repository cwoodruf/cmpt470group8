<ul class="organization login">

{foreach from=$orglogins key=i item=login}
<li class="organization login">
{$login.email}

{if $ldata.login == $ldata.details.contact_email }
&nbsp;&nbsp;
<a href="?action=organization/login/edit&email={$login.email}">Edit</a> &nbsp;

{if $login.email != $ldata.login}
<a href="?action=organization/login/confirmdel&email={$login.email}">Delete</a> &nbsp;
{/if}

{/if}
</li>

{/foreach}
</ul>
