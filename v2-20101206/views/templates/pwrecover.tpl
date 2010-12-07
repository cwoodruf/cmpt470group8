<div class="password">
<h1>Recover password</h1>
<div class="password instructions">
Enter your email to receive a link to make a new password.
</div>
<form action="index.php" method="post">
<div class="password form">
{include file=tools/confirmform.tpl field=email}
</div>
<div class="password action">
<input type="hidden" name="action[]" value="password" />
<input type="hidden" name="action[]" value="recover" />
<input type="submit" name="action[]" value="send" />
</div>
</form>
</div>

