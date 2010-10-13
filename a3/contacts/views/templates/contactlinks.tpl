{capture assign=email}{$data.contact_email|@htmlentities}{/capture}
<li>
{if $data.shared}
	<a href="?action=home/sharer/unshare&contact_email={$email}" class="unshare">unshare</a>
{else}
	<a href="?action=home/sharer/share&contact_email={$email}" class="share">share</a>
{/if}
&nbsp;&nbsp;
{$email}
&nbsp;&nbsp;
<a href="mailto://{$email}">send email</a> &nbsp;&nbsp;
<a href="?action=home/contact/confirmdelete&contact_email={$email}">delete</a> &nbsp;&nbsp;
<a href="?action=home/contact/show&contact_email={$email}">view</a>
</li>
