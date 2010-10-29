{foreach from=$notes->getall() id=i item=note}
{$note.notes|htmlentities}<p>
{/foreach}
