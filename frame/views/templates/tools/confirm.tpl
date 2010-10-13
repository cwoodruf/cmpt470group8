{include file=tools/top.tpl}

<h3>{$confirm}<h3>

<form name="confirm" method="post">
{if $action}
<input type="hidden" name="action" value="{$action}">
<input type="submit" value="{$submit}">
{/if}
</form>

{include file=tools/bottom.tpl}
