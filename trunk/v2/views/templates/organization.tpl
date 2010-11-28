<h1>Organization{if $ldata.user_type == 'organization'} Dashboard{else}s{/if}</h1>

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
<a href="?action=organization/signup">Sign up today!</a>
</div>
<h2>How can non-profits benefit from VolunteerOne?</h2>
<i>Blurb</i>
<ul>
<li>Advertize jobs instantly</li>
<li>Easily schedule and manage volunteer work</li>
</ul>
{/if}
