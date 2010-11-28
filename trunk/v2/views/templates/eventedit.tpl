<form id="formgen" action="index.php" method="post">
<input type="hidden" name="eventid" value="{$eventid}" />
<table class="formgen" border="0" cellpadding="5" cellspacing="0">
<tbody><tr class="formgen formbuttons">
<td class="formgen formbuttons">
<input value="reset" type="reset">
</td>
<td class="formgen formbuttons" align="right">
<input name="action[]" value="schedule" type="hidden">
<input name="action[]" value="{$this->day}" type="hidden">
<input name="action[]" value="{$action}" type="hidden">
<input name="action[]" value="save" type="submit">
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>What (job)</b></td>
<td class="formgen">
{include file=jobselect.tpl jobID=$event.jobID}
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Who (email)</b></td>
<td class="formgen">
<input name="email" value="{$event.email}" /> 
<a href="?action=volunteer/signup" target="newvolunteer">new</a>
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>When (start)</b></td>
<td class="formgen">
{$this->day}
<input name="starttime" value="{$event.starttime}" size="5" /> HH:MM
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Hours required</b></td>
<td class="formgen">
{include file=hourselect.tpl name=hours select=$event.hours}
hours
</td>
</tr>
{if $action == 'editevent' and $this->day <= date('Y-m-d')}
<tr class="formgen" valign="top">
<td class="formgen"><b>Actual hours</b></td>
<td class="formgen">
{include file=hourselect.tpl name=hours_worked select=$event.hours_worked}
hours
</td>
</tr>
{/if}

</table>
</form>

