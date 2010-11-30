<h3>{$name|htmlentities}</h3>
{$errors}


<table cellpadding="5" cellspacing="0" border="0" class="{$class}">

{foreach from=$list key=num item=job}
<tr>
	<td>
		<dl>
			<dt>
				<a href="index.php?action=jobmanagement/details/{$job.jobID}">{$job.title}</a>
			</dt>
			<dd>
				{$job.time}<br />{$job.description}
			<dd>
		</dl>
	</td>
</tr>
{foreachelse}
<tr><td>No records</td></tr>

{/foreach}

</table>


{$dumpall}
