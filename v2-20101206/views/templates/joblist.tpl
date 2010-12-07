<ul class="jobs">
{foreach from=$jobs key=i item=job}

{if $ldata.user_type == 'organization' or $job.visibility_status == ''}
{if $job.visibility_status == '' or $job.visibility_status == 'private' or $smarty.request.showall == true}
<li class="jobs">
{if $job.visibility_status == 'hidden'}
<span class="crossout">
{elseif $job.visibility_status == 'private'}
<span class="grayout">
{else}
<span>
{/if}
{$job.jobID} <b>{$job.title}</b> 
(status: {if $job.visibility_status}{$job.visibility_status}{else}public{/if})

{if $ldata.user_type == 'organization'}
&nbsp;&nbsp;
<a href="?action=jobs/detail&jobID={$job.jobID}">Details</a> &nbsp;
<a href="?action=jobs/edit&jobID={$job.jobID}">Edit</a> &nbsp;

{if $job.visibility_status == 'hidden'}
<a href="?action=jobs/undelete&jobID={$job.jobID}">Undelete</a> &nbsp;
{elseif $job.visibility_status == 'private'}
<a href="?action=jobs/confirmdel&jobID={$job.jobID}">Delete</a> &nbsp;
<a href="?action=jobs/undelete&jobID={$job.jobID}">Show in search</a> &nbsp;
{else}
<a href="?action=jobs/confirmdel&jobID={$job.jobID}">Delete</a> &nbsp;
<a href="?action=jobs/hide&jobID={$job.jobID}">Hide from search</a> &nbsp;
{/if}

{/if}
</span>
</li>
{/if}
{/if}
{/foreach}
</ul>
