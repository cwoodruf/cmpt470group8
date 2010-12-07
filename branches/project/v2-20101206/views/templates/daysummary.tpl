<div class="schedule day">
{if $events[$date] ==1}
<b>{$events[$date]} job</b>
{elseif $events[$date] > 1}
<b>{$events[$date]} jobs</b>
{/if}
</div>
