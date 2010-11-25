
{if $login}
<h3>{$usertype} {$username}, hello and welcome!</h3>
{/if}

{if ($login == false)}
<h3>Login or Register</h3>
{/if}
