{if $jobs}
<select name="jobID">
{foreach from=$jobs key=i item=job}
	{if $job.jobID == $jobID}{assign var=selected value=selected}{else}{assign var=selected value=""}{/if}
	<option value="{$job.jobID}" {$selected}>{$job.title}</option>
{/foreach}
</select>
{/if}
