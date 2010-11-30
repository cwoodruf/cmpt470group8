<h3>{$name|htmlentities}</h3>
{$errors}

{$topform}


<form id="formgen" action="index.php" method="post"> 
<table cellspacing="0" cellpadding="5" border="0" class="formgen"> 

	<tr class="formgen formbuttons"> 
		<td class="formgen formbuttons"> 				
			<input type="reset" value="reset" /> 
		</td> 
		<td class="formgen formbuttons" align="right">		 
			<input type="hidden" name="action[]" value="jobmanagement" /> 		 
			<input type="submit" name="action[]" value="save" /> 		 
		</td> 
	</tr>
	
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>title</b></td> 
		<td class="formgen"> 
			<input name="title" size="60" value="" class="required" /> 
		</td> 
	</tr>
	
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>time</b></td> 
		<td class="formgen"> 
			<input name="time" size="20" value="" class="required"/>
		</td> 
	</tr> 
	
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>street_address</b></td> 
		<td class="formgen"> 
			<input name="street_address" size="60" value="" /> 
		</td> 
	</tr> 
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>city</b></td> 
		<td class="formgen"> 
			<input name="city" size="60" value="" /> 
		</td> 
	</tr>
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>country</b></td> 
		<td class="formgen"> 
			<input name="country" size="32" value="" />
		</td> 
	</tr> 
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>description</b></td> 
		<td class="formgen"> 
			<textarea name="description" rows="5" cols="60"></textarea> 
		</td> 
	</tr> 
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>url</b></td> 
		<td class="formgen">
			<input name="url" size="60" value="" /> 
		</td> 
	</tr> 	 
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>visibility_status</b></td> 
		<td class="formgen">
			<input type="radio" name="visibility_status" value="public" checked /> Public<br />
			<input type="radio" name="visibility_status" value="private" /> Private			
		</td>
	</tr> 	 
	 
	<tr class="formgen" valign="top">
		<td class="formgen"><b>requirements</b></td> 
		<td class="formgen"> 
			<textarea name="requirements" rows="5" cols="60"></textarea> 
		</td> 
	</tr> 
</table> 
</form>


{$dumpall}
