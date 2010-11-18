{$errors}

<form id="formgen" action="index.php" method="post"> 

<table cellspacing="0" cellpadding="5" border="0" width="70%"class="formgen"> 
	<tr class="formgen formbuttons"> 
		<td class="formgen formbuttons"> 
			<input type="reset" value="reset" /> 
		</td> 
		<td class="formgen formbuttons" align="right"> 	 
			<input type="hidden" name="action[]" value="regmain" />		 
			<input type="submit" name="action[]" value="next" /> 		 
		</td>
	</tr> 
</table>

<table cellspacing="0" cellpadding="5" border="0" class="formgen"> 
 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Registering for:</b></td> 
		<td class="formgen"> 		 
			<input type="radio" name="type" value="Volunteer" checked /> Volunteer<br />
			<input type="radio" name="type" value="Organization" /> Organization
		</td> 
	</tr>  
	 
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Email:</b></td> 
		<td class="formgen"> 
			<input name="email" size="60" value="" class="required email" />  
		</td> 
	</tr> 
	
	<tr class="formgen" valign="top"> 
		<td class="formgen"><b>Password:</b></td> 
		<td class="formgen"> 
			<input name="password" type="password" size="60" value="" class="required" minlength="6" />  
		</td> 
	</tr> 
</table>
</form>
{$dumpall}
