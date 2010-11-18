{$errors}

<form id="formgen" action="index.php" method="post"> 

<table cellspacing="0" cellpadding="5" border="0" width="70%"class="formgen"> 
	<tr class="formgen formbuttons"> 
		<td class="formgen formbuttons"> 
			<input type="reset" value="reset" /> 
		</td> 
		<td class="formgen formbuttons" align="right"> 		 
			<input type="hidden" name="action[]" value="regorganization" /> 		 
			<input type="submit" name="action[]" value="save" /> 		 
		</td> 
	</tr>
</table>	
	
<table cellspacing="0" cellpadding="5" border="0" class="formgen"> 	
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Organization name:</b></td> 
		<td class="formgen"> 	 
			<input name="name" size="60" value="" class="required" minlength="3" /> 	 
		</td> 
	</tr>
	
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Website url:</b></td> 
		<td class="formgen">
			<input name="url" size="60" value="" class="required url" minlength="2" /> 		 
		</td> 
	</tr>
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Address (optional):</b></td> 
		<td class="formgen"> 	 
			<textarea name="address" rows="5" cols="60"></textarea> 	 
		</td> 
	</tr>
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Visibility</b></td> 
		<td class="formgen"> 
			<input type="radio" name="visibility_status" value="Public" checked /> Public<br />
			<input type="radio" name="visibility_status" value="Private" /> Private 
		</td> 
	</tr> 
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Description (optional):</b></td> 
		<td class="formgen"> 
			<textarea name="description" rows="5" cols="60"></textarea>  
		</td> 
	</tr> 
	
</table> 

<br />

Contact information: 
<table cellspacing="0" cellpadding="5" border="0" class="formgen"> 
	<tr class="formgen" valign="top"> 
	<td class="formgen"><b>First name:</b></td> 
	<td class="formgen"> 
		<input name="contact_name_first" size="60" value="" class="required"/>	 
	</td> 
	</tr> 
	
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Last name (optional):</b></td> 
		<td class="formgen">		 
			<input name="contact_name_last" size="60" value="" /> 		 
		</td> 
	</tr>
	
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Phone:</b></td> 
		<td class="formgen">
			<input name="contact_phone" size="32" value="" class="required" /> 
		</td> 
	</tr> 
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Email:</b></td> 
		<td class="formgen">
			<input name="contact_email" size="60" value="" class="required email"/> 		 
		</td> 
	</tr> 
</table>

</form>	

{$dumpall}
