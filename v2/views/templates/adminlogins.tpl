<h2>Volunteer logins</h2>
<form action="index.php" method="get">
<table cellpadding="5" cellspacing="0" border="0">

{if $logins}
<tr>
<td align="right">
<input type="hidden" name="action[]" value="admin" />
<input type="hidden" name="action[]" value="logins" />
<input type="submit" name="action[]" value="save" />
</td>
</tr>

{/if}
{foreach from=$logins key=i item=login}
<tr>
<td>
<input type="checkbox" name="hide[{$login.external_key}]" value="hidden" 
 {if $login.visibility_status == 'hidden'}checked{/if} /> hide &nbsp;&nbsp;
<a href="mailto:{$login.email|htmlentities}">{$login.email}</a> &nbsp;
(type {$login.user_type})

</td>
</tr>

{foreachelse}
<tr>
<td>
No logins
</td>
</tr>

{/foreach}
</table>
</form>


