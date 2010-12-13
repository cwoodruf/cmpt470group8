<h2>Volunteer{if $ldata.user_type == 'volunteer'} Dashboard{else}s{/if}</h2>

{if $ldata.user_type == 'volunteer'}
<div class="volunteer login">

<h4>
{$ldata.details.name_first} {$ldata.details.name_last} ({$ldata.email|htmlentities})
</h4>
<span class="volmenu"><a href="?action=volunteer/edit">My Profile</a></span>
<span class="volmenu"><a href="#volsched">My Schedule</a></span>
<span class="volmenu"><a href="#volstats">My Stats</a></span>
{if $smarty.session.paged.jobsearch}<i><a href="?action=search">Back to search</a></i> &nbsp;&nbsp; {/if}
</div>

<div class="volunteer stats">
<a name="volsched"></a>
<h2>My Schedule</h2>
{include file=volsched.tpl}
</div>

<div class="volunteer stats">
<a name="volstats"></a>
<h2>My Stats</h2>
{include file=volstats.tpl}
</div>

{else}
<div class="vollogin">
<a class="action" href="?action=volunteer/signup">Sign up today!</a>
</div>
<h1>Benefits of Volunteering</h1>
<p>
Some of the reasons to <b>volunteer today:</b>
</p>
<ul>
<li>Get the skills and experience you need</li>
<li>Get involved in your community</li>
<li>Meet like-minded people</li>
<li>Support a cause that you believe in</li>
</ul>

<p>
Our innovative <b>features:</b>
</p>
<ul>
<li>Intuitive search helps you find jobs in your area quickly</li>
<li>Instantly contact local non-profits</li>
<li>Get up-to-the-minute schedule information</li>
<li>Completed work hours are all listed in one place</li>
</ul>

{/if}

