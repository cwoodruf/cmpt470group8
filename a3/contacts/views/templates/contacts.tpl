{include file=top.tpl}
{include file=menu.tpl}
<div class="user">
<b>My info</b>
<a href="index.php?action=home/user/confirmdelete">delete</a>
<div class="formgen">
{include file=tools/formgen.tpl this=$this schema=$this->schema}
</div>
</div>

<div class="contacts">
<b>My contacts</b>
<a href="index.php?action=home/contact/add">add</a>
<ul class="contacts">
{include file=tools/dumpall.tpl list=$contacts dumptpl=contactlinks.tpl}
</ul>
</div>
{include file=bottom.tpl}
