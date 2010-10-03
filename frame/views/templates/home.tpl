{include file=top.tpl}
{include file=menu.tpl}

<h1>Notes:</h1>

{pagerlinks howmany=$howmany offset=$offset limit=$limit}
<div class="notenav">
{if $offset > 0}
<a href="{$pagerlinks.first}">&lt;&lt; start</a> &nbsp;&nbsp;
<a href="{$pagerlinks.prev}">&lt; prev</a> &nbsp;&nbsp;
{else}
&lt;&lt; start &nbsp;&nbsp;
&lt; prev &nbsp;&nbsp;
{/if}

{if $offset <= $howmany - $limit}
<a href="{$pagerlinks.next}">next &gt;</a> &nbsp;&nbsp;
<a href="{$pagerlinks.last}">last &gt;&gt;</a> &nbsp;&nbsp;
{else}
next &gt; &nbsp;&nbsp;
last &gt;&gt; &nbsp;&nbsp;
{/if}
</div>
{assign var=count value=$offset}

{foreach from=$notes key=i item=note}
{assign var=count value=$count+1}
{$count}
<blockquote>{$note.notes|@htmlentities}</blockquote>
<div class="byline">

{if $note.email==$smarty.session.login.login}
<a href="index.php?action=restricted&numbered_id={$note.numbered_id}">
edit</a>
{/if}

{$note.email|@htmlentities} - {$note.created|@htmlentities}

</div>
<hr>

{/foreach}

{include file=bottom.tpl}

