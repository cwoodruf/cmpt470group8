<table cellpadding="5" cellspacing="0" border="0">
{foreach from=$sched key=i item=job}
<tr>
<td>{$job.start}</td>
<td>
{if $job.hours}
Scheduled {$job.hours} hours
{else}
No scheduled hours
{/if}
</td>
<td>
<a href="?action=organization/detail&organizationID={$job.organizationID}">{$job.name}</a>
</td>
<td>
<a href="?action=jobs/detail&jobID={$job.jobID}">{$job.title}</a>
</td>
</tr>

{foreachelse}
No scheduled jobs found

{/foreach}
</table>

