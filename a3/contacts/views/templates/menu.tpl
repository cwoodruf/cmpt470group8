<div class="menu">

<div class="menuitem">
<a href="index.php">Home</a>
</div>

<div class="menuitem">

{if $smarty.session.login}
<nobr>
Welcome
<b>{$smarty.session.login.login}</b>
&nbsp;
<a href="index.php?action=logout">Log out</a>
</nobr>

{else}
<a href="index.php?action=register">Create a log in</a>
{/if}

</div>

<div class="menuitem">
<a href="/group8wiki/index.php/Framework_Docs" target="docs">Framework docs</a>
</div>

</div>

<div style="clear: both;"></div>
