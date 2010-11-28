<ul class="jobs">

{foreach from=$jobs key=i item=job}
<li class="jobs">
{$job.jobID} <b>{$job.title}</b>

{if $ldata.user_type == 'organization'}
&nbsp;&nbsp;
<a href="?action=jobs/detail&jobID={$job.jobID}">Details</a> &nbsp;
<a href="?action=jobs/edit&jobID={$job.jobID}">Edit</a> &nbsp;
<a href="?action=jobs/confirmdel&jobID={$job.jobID}">Delete</a> &nbsp;
{/if}

</li>

{/foreach}
</ul>
