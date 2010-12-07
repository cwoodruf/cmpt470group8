{include file=xmljunk.tpl}
<html>
<head>
<title>{$this->title()}</title>
{$this->js()}
<script type="text/javascript" src="/cmpt470/myv1/views/js/ready.js"></script>
{$this->css()}
<link rel="stylesheet" type="text/css" href="/cmpt470/myv1/views/css/v1.css">
</head>
<body>
<i style="font-size: small">proof of concept</i><br />
{include file=menu.tpl}

<div class="messages">
<h3 class="topmsg">{$topmsg}</h3>
<h3 class="error">{$error}</h3>
</div>

<div class="content">
{$content}
</div>

{include file=footer.tpl}
</body>
</html>

