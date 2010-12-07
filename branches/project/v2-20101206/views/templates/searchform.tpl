<form id="search" action="index.php" method="get" 
      onsubmit="
if (
    $('#searchinput{$id}').val() == '' 
    && $('#regioninput{$id}').val() == ''
) {ldelim}
	alert('please select a region or enter a search term');
	return false;
{rdelim}
return true;
">
<div class="searchform">
<span class="searchtitle">Find jobs</span>
&nbsp;
{include file=regions.tpl select=$region}

<input size="20" name="search" value="{$search}" id="searchinput{$id}" />

<input type="hidden" name="action[]" value="search" />
<input type="hidden" name="newsearch" value="true" />
<input type="submit" name="submit" value="search" />
<a href="javascript: void(0);" 
   onclick="
      $('#searchinput{$id}').val('');
      r = document.getElementById('regioninput');
      r.options[r.selectedIndex].selected = false; 
      r.options[0].selected = true;
">clear</a> &nbsp;
<a href="?action=search&amp;newsearch=true&amp;search=&amp;region=">browse</a>
</div>

</form>
