{include file=xmljunk.tpl}
<head>
<title>VolunteerOne - Helping You Help the World: {$this->title()}</title>
{$this->js()}
<script type="text/javascript" src="views/js/ready.js"></script>
{$this->css()}
<link rel="stylesheet" type="text/css" href="views/css/v1.css" />
<link type="text/css" rel="stylesheet" href="views/css/calendar.css" />
<!--[if IE]><link type="text/css" rel="stylesheet" href="views/css/ie.css" /><![endif]-->
</head>
<body class="bod">
<div class="header">
<div class="companyname">
<a href="?"><img src="images/v1logo.jpg"  alt="home" title="home" /></a>
</div>
    <div class="login_input">
{include file=menu.tpl}
    </div>
</div>

<div class="content">
<div class="messages">
<h3 class="topmsg">{$topmsg}</h3>
<h3 class="error">{$error}</h3>
</div>
<div class="contentinsert">
{$content}
</div>
</div>

{include file=footer.tpl}
</body>
</html>

