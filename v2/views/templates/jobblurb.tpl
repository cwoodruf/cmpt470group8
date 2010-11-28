<p>
{$job.created}
<b>{$job.title}</b>
{$job.orgname} &nbsp;
<i>{$job.city}, {$job.country}</i>
<br />
{$job.blurb|strip_tags|htmlentities}</b> ... 

(<a href="?action=jobs/detail&jobID={$job.jobID}">more</a>)

</p>
