package stateful;
use Apache2::RequestRec ();
use Apache2::RequestIO ();
use Apache2::Const qw/OK/;
use CGI qw/:standard/;
use HTML::Entities;
use warnings;
use strict;
our $entered;

sub handler {
	my $r = shift;
	
	$r->content_type('text/html');
	$entered .= '<br>'.encode_entities(param("entered"));	
	my $config = encode_entities(<<APACHE);
<VirtualHost *:80>
	# needed by the CGI module
	PerlOptions +GlobalRequest
	
	# will make apache compile this module on start
	PerlModule stateful

	# this block tells Apache to use our module to process the virtual url "/stateful"
	<Location /stateful>
		SetHandler modperl
		PerlResponseHandler stateful
	</Location>
...
</VirtualHost>
APACHE
	my $html = start_html("Somewhat stateful mod_perl example");
	$html .= <<HTML;
<h1>Mod perl example</h1>
<p>
To make this module work we need to register the module <br>
with our instance of the Apache web server. The configuration<br>
section looks something like this:<br>
</p>
<pre>
$config
</pre>
<p>
The text you enter will be appended to any previous text you entered here.<br>
One big danger with mod_perl is to maintain control over variables you want <br>
refreshed on every request and those, such as database handles, that you'd like <br>
to keep persistent.<br>
</p>
<p>
Another drawback is that you have to restart the server whenever you change the module.<br>
</p>
<p>
<a href="/techeval/stateful.pm.txt">View source</a>
</p>

<form action="/stateful" method="get">
Enter some text:
<input name="entered" size="40" />
<input type="submit" name="action" value="Add Text">
</form>
<p>
$entered
</p>
HTML
	$html .= end_html;
	$r->print($html);
	return OK;
}

1;

