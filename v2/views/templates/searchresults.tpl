{include file=tools/navcapture.tpl action=search/results}
{$smarty.capture.nav}

<h4>
Jobs
{if $region}
for region <span class="regionterm">{$region|htmlentities}</span>
{/if}

{if $search}
search <span class="searchterm">{$search|htmlentities}</span>
{/if}

{$howmany}
</h4>

{foreach from=$jobs key=i item=job}
<div class="jobblurb">
{include file=jobblurb.tpl}
</div>
{foreachelse}
No jobs found
{/foreach}

{$smarty.capture.nav}

