<a name="volstats" ></a>
<table cellpadding="5" cellspacing="0" border="0">
{foreach from=$stats key=i item=job}
<tr>

{if $job.ystart == $job.yend}
<td>{$job.ystart}</td>
{else}
<td>{$job.ystart}-{$job.yend}</td>
{/if}

<td>
<a href="?action=organization/detail&organizationID={$job.organizationID}">{$job.name}</a>
</td>
<td>
<a href="?action=jobs/detail&jobID={$job.jobID}">{$job.title}</a>
</td>
<td>
{$job.worked} hours
</td>
</tr>

{foreachelse}
No hours found

{/foreach}
</table>

