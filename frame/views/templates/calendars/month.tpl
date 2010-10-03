{assign var=dom value=0}
<div class="calendar">
{foreach from=$weeks key=i item=week}
<div class="calendar month eow"></div>

{foreach from=$days key=dow item=day}
{if $startdow == $dow}
{if $dom == 0}
{assign var=dom value=1}
{/if}
{/if}

{if $dom > 0 and $dom <= $eom}
	{if $dow == 0 or $dow == 6}
	<div class="calendar month weekend dom">
	{else}
	<div class="calendar month dom">
	{/if}
		{$day}, {$month} {$dom}, {$year} &nbsp;
	</div>
	{assign var=dom value=`$dom+1`}
{else}
	<div class="calendar month">
		<i>({$day})</i>&nbsp;
	</div>

{/if}

{/foreach}

{/foreach}
</div>
