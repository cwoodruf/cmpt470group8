<h3>{$name|htmlentities}</h3>
{$errors}

<form id="formgen" action="index.php" method="post"> 
<table cellspacing="0" cellpadding="5" border="0" class="formgen"> 

	<tr class="formgen formbuttons"> 
		<td class="formgen formbuttons"> 
			<input type="hidden" name="action[]" value="jobmanagement" /> 	
			<input type="button" name="action[]" value="cancel" /> 
		</td> 
		<td class="formgen formbuttons" align="right">		 
			<input type="hidden" name="action[]" value="jobmanagement" /> 		 
			<input type="submit" name="action[]" value="save" /> 		 
		</td> 
	</tr>
	
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>title</b></td> 
		<td class="formgen"> 
			<input name="title" size="60" value="{php} echo $_SESSION['job']['title'];{/php}" class="required" /> 
		</td> 
	</tr>
	
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>time</b></td> 
		<td class="formgen"> 
			<input name="time" size="20" value="{php} echo $_SESSION['job']['time'];{/php}" class="required"/>
		</td> 
	</tr> 
	
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>street_address</b></td> 
		<td class="formgen"> 
			<input name="street_address" size="60" value="{php} echo $_SESSION['job']['street_address'];{/php}" /> 
		</td> 
	</tr> 
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>city</b></td> 
		<td class="formgen"> 
			<input name="city" size="60" value="{php} echo $_SESSION['job']['city'];{/php}" /> 
		</td> 
	</tr>
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>country</b></td> 
		<td class="formgen"> 
			<input name="country" size="32" value="{php} echo $_SESSION['job']['country'];{/php}" />
		</td> 
	</tr> 
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>description</b></td> 
		<td class="formgen"> 
			<textarea name="description" rows="5" cols="60">{php} echo $_SESSION['job']['description'];{/php}</textarea> 
		</td> 
	</tr> 
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>url</b></td> 
		<td class="formgen">
			<input name="url" size="60" value="{php} echo $_SESSION['job']['url'];{/php}" /> 
		</td> 
	</tr> 	 
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>visibility_status</b></td> 
		<td class="formgen">
			{php}
			if($_SESSION['job']['visibility_status'] == 'private'){
				echo '<input type="radio" name="visibility_status" value="public" /> Public<br />';
				echo '<input type="radio" name="visibility_status" value="private" checked /> Private';
			} else {
				echo '<input type="radio" name="visibility_status" value="public" checked /> Public<br />';
				echo '<input type="radio" name="visibility_status" value="private" /> Private';
			}
				
			{/php}
		</td>
	</tr> 	 
	 
	<tr class="formgen" valign="top">
		<td class="formgen"><b>requirements</b></td> 
		<td class="formgen"> 
			<textarea name="requirements" rows="5" cols="60">{php} echo $_SESSION['job']['requirements'];{/php}</textarea> 
		</td> 
	</tr> 
</table> 
</form>
