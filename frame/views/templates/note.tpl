{include file=top.tpl}
{include file=menu.tpl}

<h1>Note</h1>

{if $smarty.session.login.login == $note.email}
<a href="?action=restricted&numbered_id={$note.numbered_id}">edit</a>
<br>
<br>
{/if}

{include file=tools/dump.tpl data=$note class="bordered white"}

{include file=bottom.tpl}

