<table cellpadding="5" cellspacing="0" border="0" class="dump {$class}">

{foreach from=$data key=field item=value}

<tr valign="top">
<td>
<b>{$field|@htmlentities}</b>
</td>
<td>
<pre>{$value|@htmlentities}</pre>
</td>
</tr>

{/foreach}

</table>

{if $form}{include file=$form}{/if}
