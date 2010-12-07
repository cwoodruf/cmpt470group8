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
<a href="{$org.url|fixurl}">{$org.url|fixurl}</a>
</td>
</tr>
{/if}

<tr valign="top">
<td>
<b>Jobs</b>
</td>
<td>
<a href="?action=search&amp;newsearch=true&amp;search={$org.name}&amp;region=">All jobs for {$org.name|strip_tags}</a>
</td>
</tr>

<tr valign="top">
<td>
<b>Mission Statement</b>
</td>
<td>
{$org.description|strip_tags|addbrs}
</td>
</tr>
{if $ldata.details.organizationID == $org.organizationID or $ldata.user_type == admin}
<tr><td>Address</td><td>{$org.address|strip_tags}</td></tr>
<tr><td>Contact Name</td><td>{$org.contact_name_first|strip_tags} {$org.contact_name_last|strip_tags}</td></tr>
<tr><td>Contact Phone</td><td>{$org.contact_phone|strip_tags}</td></tr>
<tr><td>Contact Email</td><td>{$org.contact_email|strip_tags}</td></tr>
<tr><td>Visibility</td><td>{$org.visibility_status|strip_tags}</td></tr>
{/if}
</table>
</div>

