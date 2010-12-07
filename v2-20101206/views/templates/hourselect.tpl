{if $select == ''}
	{assign var=select value=$name}
{/if}

<select name="{$name}">
<option></option>

{section name=opt start=1 loop=25}
{option value=$smarty.section.opt.index}
{/section}

</select>

