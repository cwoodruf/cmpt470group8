{capture assign=email}{$data.contact_email|@htmlentities}{/capture}
<li>
{$email}
<a href="mailto://{$email}">send email</a> &nbsp;&nbsp;
<a href="?action=home/contact/confirmdelete&contact_email={$email}">delete</a> &nbsp;&nbsp;
<a href="?action=home/contact/show&contact_email={$email}">view</a>
</li>
