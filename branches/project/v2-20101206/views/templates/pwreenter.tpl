<div class="password">
<h1>Make new password</h1>
<div class="password instructions">
Enter a new password.
</div>
<form action="index.php" method="post">
<input type="hidden" name="key" value="{$smarty.request.key|htmlentities}">
<div class="password form">
{include file=tools/confirmform.tpl type=password field=password extra=email}
</div>
<div class="password action">
<input type="hidden" name="action[]" value="password" />
<input type="hidden" name="action[]" value="reenter" />
<input type="submit" name="action[]" value="save" />
</div>
</form>
</div>

