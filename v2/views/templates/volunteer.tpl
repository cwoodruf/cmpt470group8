<h2>Volunteer{if $ldata.user_type == 'volunteer'} Dashboard{else}s{/if}</h2>

{if $ldata.user_type == 'volunteer'}
<div class="volunteer login">

<span class="volmenu">{$ldata.details.name_first} {$ldata.email|htmlentities}</span>
<span class="volmenu"><a href="?action=volunteer/edit">My Profile</a></span>
<span class="volmenu"><a href="#volsched">My Schedule</a></span>
<span class="volmenu"><a href="#volstats">My Stats</a></span>
{if $smarty.session.paged.jobsearch}<i><a href="?action=search">Back to search</a></i> &nbsp;&nbsp; {/if}
</div>

<div class="volunteer stats">
<h2>My Schedule</h2>
{include file=volsched.tpl}
</div>

<div class="volunteer stats">
<h2>My Stats</h2>
{include file=volstats.tpl}
</div>

{else}
<div class="vollogin">
<a class="action" href="?action=volunteer/signup">Sign up today!</a>
</div>
<h1>Benefits of Volunteering</h1>
<p>
Some of the reasons to volunteer today:
<ul>
<li>Get the skills and experience you need</li>
<li>Get involved in your community</li>
<li>Meet like-minded people</li>
<li>Support a cause that you believe in</li>
</ul>
</p>

<p>
Our innovative features:
<ul>
<li>Intuitive search helps you find jobs in your area quickly</li>
<li>Instantly contact local non-profits</li>
<li>Get your up-to-the-minute schedule and listing of work done to date</li>
</ul>
</p>

{/if}

