<h1>Volunteer{if $ldata.user_type == 'volunteer'} Dashboard{else}s{/if}</h1>

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
<a href="?action=volunteer/signup">Sign up today!</a>
</div>
<h2>Benefits of Volunteering</h2>
<i>Blurb</i>

{/if}

