<div class="schedule day">
<a href="?action=organization#calendar">Back to calendar</a>
<h1>Schedule for {$this->day}</h1>

<div class="schedule add">
<h4>{if $action == 'editevent'}Update{else}Add to{/if} Schedule</h4>
{include file=eventedit.tpl}
</div>

<div class="schedule list">
<h4>Already Scheduled</h4>
<p>
<a href="?action=schedule/{$this->day}">Add schedule</a>
</p>
{foreach from=$events key=i item=e}
	{foreach from=$e key=j item=event}
{assign var=eventid value="what:`$event.jobID`,who:`$event.volunteerID`,when:`$event.start`"}
<p>
<b>{$event.email}</b> {$event.title}<br />
{$event.start} {$event.hours} hr (actual {$event.hours_worked} hr)
{if !$event.hours_worked}
<a href="?action=schedule/{$this->day}/delevent&eventid={$eventid}"
   onclick="return confirm('really delete this event?');" >Delete</a> &nbsp;
{/if}
<a href="?action=schedule/{$this->day}/editevent&eventid={$eventid}">Edit</a> &nbsp;
</p>
	{/foreach}
{/foreach}
</div>

<div class="menuend"></div>

</div>
