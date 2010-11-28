<form id="search" action="index.php" method="get" onsubmit="return changed;">
<div>
Jobs: 
{include file=regions.tpl select=$region} &nbsp;

<input size="20" name="search" value="{$search}" id="searchinput{$id}" />

<input type="hidden" name="action[]" value="search" />
<input type="hidden" name="newsearch" value="true" />
<input type="submit" name="action[]" value="search" />
<a href="?action=search&amp;search=&amp;region=&amp;newsearch=true">Browse</a> 
</div>

</form>
