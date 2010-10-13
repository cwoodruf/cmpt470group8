{include file=tools/xmljunk.tpl}
<head>
<title>{$this->name|default:"example site"}</title>
{$this->css()}
{$this->js()}
</head>
<body>

<div class="toplevel">
<h3>Example site</h3>

{if $errors}
<div class="errors">
{$errors}
</div>
{/if}

{if $topmsg}
<h3 class="topmsg">{$topmsg}</h3>
{/if}

