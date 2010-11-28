{regions}
Region:
<select name="region" onchange="changed=true; if ($('#searchinput').val() == 'search') $('#searchinput').val('');" >
<option value="">any</option>
{foreach from=$regions key=i item=region}
{option value=$region}
{/foreach}
</select>
