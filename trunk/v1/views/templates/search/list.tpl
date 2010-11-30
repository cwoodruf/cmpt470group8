<h3>{$name|htmlentities}</h3>
{$errors}


<form id="formgen" action="index.php" method="post"> 

<table cellspacing="0" cellpadding="5" border="0" class="formgen">  
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Search:</b></td> 
		<td class="formgen"> 
			<input name="query" size="60" value="" />  
		</td> 
		<td>
			<input type="hidden" name="action[]" value="search" />		 
			<input type="submit" name="action[]" value="go" />
		</td>
	</tr> 
</table>
</form>




<table cellpadding="5" cellspacing="0" border="0" class="{$class}">

{foreach from=$list key=num item=job}
<tr>
	<td>
		<dl>
			<dt>
				<a href="index.php?action=search/details/{$job.jobID}">{$job.title}</a>
			</dt>
			<dd>
				{$job.city}<br />{$job.name}
			<dd>
		</dl>
	</td>
</tr>
{foreachelse}
<tr><td>No records</td></tr>

{/foreach}

</table>


{$dumpall}
