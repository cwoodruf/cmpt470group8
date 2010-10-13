{include file=top.tpl}
{include file=menu.tpl}
<h3>Shared contacts from {$sharer} to {$smarty.session.login.login}</h3>
{include file=tools/dumpall.tpl list=$sharedcontacts}
{include file=bottom.tpl}
