<h1>Jobs</h1>

{if $ldata.user_type == 'organization'}
<div class="organization login">
<h4>{$ldata.details.name}</h4>
</div>

<div class="organization dashboard">
<div class="organization jobs">
<a href="?action=jobs/add">Add New Job</a> &nbsp;
<a href="?action=organization#calendar">Schedule work</a> &nbsp;
<a href="?action=jobs/list&showall=true">Show deleted jobs</a> &nbsp;

{include file=joblist.tpl}

</div>
</div>
{/if}
