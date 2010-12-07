{if $ldata.user_type == 'volunteer' or $ldata.user_type == 'organization' or $ldata.user_type == 'admin'}
	{assign var=editor value=true}
{/if}

<div class="menu">
<div class="menuitem">
<a href="index.php?action=home/clear">Home</a>
</div>
{if $editor}
<div class="menuitem">
<a href="?action={$ldata.user_type}">{$ldata.email} - {$ldata.details.name|default:$ldata.user_type}</a>
</div>
{else}
<div class="menuitem">
<a href="?action=organization">Organizations</a>
</div>
<div class="menuitem">
<a href="?action=volunteer">Volunteers</a>
</div>
{/if}

<div class="menuitem">
{if $ldata}
<a href="?action=logout">Log out</a>
{else}
<a href="?action=loginform">Log in</a>
{/if}
</div>

{if !$editor or $ldata.user_type == 'volunteer'}
<div class="menuitem">
{include file=searchform.tpl}
</div>
{/if}

</div>
<div class="menuend"></div>
