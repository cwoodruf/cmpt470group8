{if $login}
<a href="index.php">Home</a>
<a href="?action=jobs">View Jobs</a>
<a href="?action=history">View History</a>
<a href="?action=logout">Log Out</a>

<h3>Hello! You are logged in as {$username}</h3>
{/if}

{if ($login == false)}
<a href="index.php">Home</a>
<a href="?action=jobs">View Jobs</a>
<a href="?action=register">Register</a>
<a href="?action=loginform">Log In</a>

<h3>Welcome! You are not logged in.</h3>
{/if}

<p> This paragraph is the same whether you are logged in or not.</p>
<p> Sample Login - Email: test@sfu.ca Password: password </p>
