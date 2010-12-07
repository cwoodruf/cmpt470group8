{assign var=dom value=0}
{assign var=clickday value="click on a date to open the schedule for that day"}
<div class="calendar-title">{$month} {$year}</div>

<div class="calendar-form">
<form name="pickdate">
<input type="hidden" name="action" value="{$this->action}">
<input type="hidden" name="startdate">
Highlight date: {html_select_date start_year=2009 end_year=2011}
<input type="submit" value="Go">
&nbsp;&nbsp;
<a href="?action={$this->action}&startdate={$prevdate}">&lt; Previous Month</a> &nbsp;&nbsp;
<a href="?action={$this->action}&startdate={$nextdate}">Next Month &gt;</a>
</form>
</div>

<div class="calendar">
{foreach from=$weeks key=i item=week}
<div class="calendar month eow"></div>

{foreach from=$days key=dow item=day}

{if $firstdow == $dow}
	{if $dom == 0}
		{assign var=dom value=1}
	{/if}
{/if}

{if $dom > 0 and $dom <= $eom}
	{capture assign=date}{$year}-{$mon}-{$dom|string_format:"%02d"}{/capture}
	<div
	{if $dom == $startday}
		class="calendar month selected dom"
	{elseif $dow == 7 or $dow == 6}
		class="calendar month weekend dom"
	{else}
		class="calendar month dom" 
	{/if}
	title="{$clickday}">
		
		{$day|capitalize}<br /><a href="?action=schedule/{$date}">{$date}</a> &nbsp;
		{include file=daysummary.tpl}
	</div>
	{assign var=dom value=`$dom+1`}

{else}
	{* hack to put the correct date in days not in the month in question *}
	<div class="calendar month">
		{$day}
	</div>

{/if}

{/foreach}

{/foreach}
</div>
