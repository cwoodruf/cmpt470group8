<div class="jobs">
{if $ldata.user_type == 'organization'}
<a href="?action=jobs">Back to Job Manager</a>
{else}
<a href="?action=search">Back to search results</a>
{/if}
<h1>Job Detail</h1>
<table class="dump " border="0" cellpadding="5" cellspacing="0">
<tr valign="top">
<td>
<b>Title</b>
</td>
<td>
{$job.title|strip_tags}
<br />
<a href="?action=organization/detail&organizationID={$job.organizationID}&jobID={$job.jobID}">
More about {$job.orgname|default:'this employer'|strip_tags}</a>
<br />

{if $ldata}
<a href="?action=jobs/contact">Contact {$job.orgname|default:'this employer'|strip_tags}</a>
{else}
<a href="?action=volunteer">Sign up/Log in to contact this employer</a>
{/if}

</td>
</tr>

{if $job.url}
<tr valign="top">
<td>
<b>URL</b>
</td>
<td>
<a href="{$job.url|fixurl}" target="_blank">{$job.url|fixurl}</a>
</td>
</tr>
{/if}

<tr valign="top">
<td>
<b>Location</b>
</td>
<td>
{$job.city|strip_tags} {$job.country|strip_tags}
</td>
</tr>
<tr valign="top">
<td>
<b>Description</b>
</td>
<td>
{$job.description|strip_tags|addbrs}
</td>
</tr>
<tr valign="top">
<td>
<b>Requirements</b>
</td>
<td>
{$job.requirements|strip_tags|addbrs}
</td>
</tr>

{if $job.created}
<tr valign="top">
<td>
<b>Created on</b>
</td>
<td>{$job.created|strip_tags}</td>
</tr>
{/if}

</table>

</div>
