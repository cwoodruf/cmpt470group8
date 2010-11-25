{* wrapper template for the View::wrap method add - content is defined with the output of a template usually *}
<html>
<head>
<title>example</title>
{$this->js()}
{$this->css()}
{$header}
</head>
<body>
<a href="index.php">Home</a>

{if ($login == false)}
<a href="?action=regmain">Register</a>
<a href="?action=loginform">Login</a>
{/if}

{if $login}
<a href="?action=logout">Log out</a>
{/if}




<h3 class="topmsg">{$topmsg}</h3>
<h3 class="error">{$error}</h3>
{$content}
</body>
</html>

