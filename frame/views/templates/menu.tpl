<div class="menu">

<div class="menuitem">
<a href="index.php">Home</a>
</div>

<div class="menuitem">
<a href="index.php?action=restricted">Restricted</a>
</div>

<div class="menuitem">
<a href="index.php?action=calendars/month">Calendar</a>
</div>

<div class="menuitem">

{if $smarty.session.login}
<nobr>
Welcome <b>{$smarty.session.login.login}</b>
<a href="index.php?action=logout">Log out</a>
</nobr>

{else}
<a href="index.php?action=loginform">Log in</a>
&nbsp;&nbsp;
<a href="index.php?action=register">Register</a>
{/if}

</div>

</div>

<div style="clear: both;"></div>
