{include file=top.tpl}
{include file=menu.tpl}

<h3>{$confirm}<h3>

<form name="confirm" method="post">
{if $action}
<input type="hidden" name="action" value="{$action}">
<input type="submit" value="{$submit}">
{/if}
</form>

{include file=bottom.tpl}
