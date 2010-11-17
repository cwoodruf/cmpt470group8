{$errors}

<form id="formgen" action="index.php" method="post"> 
<table cellspacing="0" cellpadding="5" border="0" class="formgen"> 
	<tr class="formgen formbuttons"> 
	<td class="formgen formbuttons"> 
	<input type="reset" value="reset" /> 
	</td> 
	<td class="formgen formbuttons" align="right"> 
	 
	<input type="hidden" name="action[]" value="home" /> 
	 
	<input type="submit" name="action[]" value="save" /> 
	 
	</td> 
	</tr> 
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>First name:</b></td> 
		<td class="formgen"> 
			<input name="name_first" size="60" value="" /> 
		</td> 
	</tr> 
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Last name:</b></td> 
		<td class="formgen"> 
			<input name="name_last" size="60" value="" /> 
		</td> 
	</tr> 
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Phone (optional):</b></td> 
		<td class="formgen"> 
			<input name="phone" size="32" value="" /> 
		</td> 
	</tr>

</table>
{$dumpall}

