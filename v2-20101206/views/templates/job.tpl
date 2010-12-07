<div class="job">
<h1>{$action|default:Add|capitalize} a Job</h1>
<form id="formgen" action="index.php" method="post">
<input type="hidden" name="jobID" value="{$this->input('jobID')}" />
<table class="formgen" border="0" cellpadding="5" cellspacing="0">
<tr class="formgen" valign="top">
<tr class="formgen" valign="top">
<td class="formgen"><b>Job title</b></td>
<td class="formgen">
<input name="title" size="60" value="{$this->input('title')}" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>URL</b></td>
<td class="formgen">
<input name="url" size="60" value="{$this->input('url')}" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>City</b></td>
<td class="formgen">
<input name="city" size="60" value="{$this->input('city')}" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Province</b></td>
<td class="formgen">
<input name="country" size="32" value="{$this->input('country')}" /> 
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Description</b></td>
<td class="formgen">
<textarea name="description" rows="5" cols="60">{$this->input('description')}</textarea>
</td>
</tr>
<tr class="formgen" valign="top">
<td class="formgen"><b>Requirements</b></td>
<td class="formgen">
<textarea name="requirements" rows="5" cols="60">{$this->input('requirements')}</textarea>
</td>
</tr>
<tr class="formgen formbuttons">
<td class="formgen formbuttons">
<input value="reset" type="reset">
</td>
<td class="formgen formbuttons" align="right">
<input name="action[]" value="jobs" type="hidden" />
{if $action}
<input name="action[]" value="{$action}" type="hidden" />
{/if}
<input name="action[]" value="save" type="submit" />
</td>
</tr>
</table>
</form>
</div>

