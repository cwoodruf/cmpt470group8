<h2>Organization{if $ldata.user_type == 'organization'} Dashboard{else}s{/if}</h2>

{if $ldata.user_type == 'organization'}
<div class="organization login">

<h4>{$ldata.details.name}</h4>

{if $ldata.login == $ldata.details.contact_email}
<a href="?action=organization/edit">Organization Profile</a> &nbsp;
<a href="?action=organization/login">Logins</a> &nbsp;
{/if}

<a href="?action=organization/login/edit">Change password</a> &nbsp;
<a href="?action=jobs">Manage Jobs</a> &nbsp;
</div>

<div class="organization schedule">
<a name="calendar"></a>
{$calendar}
</div>
</div>

{else}
<div class="orglogin">
<a class="action" href="?action=organization/signup">Sign up today!</a>
</div>
<h1>How can non-profits benefit from VolunteerOne?</h1>
<p>
We specialize in providing you with the tools to attract and manage the
volunteers you need. Our scheduling and work management tools make it easy
to identify your volunteer needs. 
</p>
<p>
With <b>VolunteerOne:</b>
</p>
<ul>
<li>Advertise jobs instantly</li>
<li>Easily schedule and manage volunteer work</li>
</ul>
<p>
Our <b>features</b> can simplify your life and save you time:
</p>
<ul>
<li>Privacy controls: all volunteers must create a log in. Nobody sees your email addresses.</li>
<li>Intuitive calendar interface for managing schedules and tracking work done.</li>
<li>Its easy to add or delete job ads - you will never lose your historical data.</li>
<li>Create as many log ins as you need with our log in manager.</li>
</ul>
{/if}
