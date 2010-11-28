<table cellpadding="3" cellspacing="0" border="0" class="formgen">
{if $extra}
<tr><td>{$extra|capitalize}:</td>
<td><input size="{$size|default:60}" type="text" name="{$extra}"></td></tr>
{/if}
<tr><td>{$field|capitalize}:</td>
<td><input size="{$size|default:60}" type="{$type|default:text}" name="{$field}"></td></tr>
<tr><td>Confirm {$field|capitalize}:</td>
<td><input size="{$size|default:60}" type="{$type|default:text}" name="confirm_{$field}"></td></tr>
</table>
