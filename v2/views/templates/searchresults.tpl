{include file=tools/navcapture.tpl action=search/results}
{$smarty.capture.nav}

<h4>
Jobs
{if $region}
for region <i>{$region|htmlentities}</i>
{/if}

{if $search}
search <i>{$search|htmlentities}</i>
{/if}

{$howmany} jobs
</h4>

{foreach from=$jobs key=i item=job}
{include file=jobblurb.tpl}
<hr>
{foreachelse}
No jobs found
{/foreach}

{$smarty.capture.nav}

