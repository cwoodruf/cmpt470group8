{regions}
region:
<select name="region" id="regioninput{$id}" >
<option value="">any</option>
{foreach from=$regions key=i item=region}
{option value=$region}
{/foreach}
</select>
