<div class="organization detail">
<h2>{$org.name|strip_tags}</h2>
<table class="dump " border="0" cellpadding="5" cellspacing="0">
<tr valign="top">
<td>
<b>Contact</b>
</td>
<td>
{$org.contact_name_first} {$org.contact_name_last}
</td>
</tr>
<tr valign="top">
<td>
<b>Phone</b>
</td>
<td>
{$org.contact_phone}
</td>
</tr>
<tr valign="top">
<td>
<b>Email</b>
</td>
<td>

{if $ldata}
<a href="?action=organization/contact">Click here to send a message</a>
{else}
<a href="?action=volunteer">Sign up/Log in to contact this employer</a>
{/if}

</td>
</tr>

{if $org.url}
<tr valign="top">
<td>
<b>Website</b>
</td>
<td>
<a href="{$org.url|fixurl}" target="_blank">{$org.url|fixurl}</a>
</td>
</tr>
{/if}

<tr valign="top">
<td>
<b><nobr>Mission Statement</nobr></b>
</td>
<td>
{$org.description|strip_tags|addbrs}
</td>
</tr>
</table>
</div>

