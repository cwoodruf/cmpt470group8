{capture assign=email}{$data.email|@htmlentities}{/capture}
<li>
{$email}
<a href="mailto://{$email}">send email</a> &nbsp;&nbsp;
<a href="?action=home/sharer/showcontacts&contact_email={$email}">view shared contacts</a>
</li>
