<p>
<i>{$job.city}, {$job.country}</i> &nbsp;
{$job.created}
<b>{$job.title}</b>
{$job.orgname} 
<br />
{$job.blurb|strip_tags|utf8_encode} ... 

(<a href="?action=jobs/detail&amp;jobID={$job.jobID}">more</a>)
</p>
