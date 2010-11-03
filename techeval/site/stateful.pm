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
	if (param('action') eq 'Clear') {
		$entered = '';
	} else {
		$entered .= '<br />'.encode_entities(param("entered"));	
	}
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
<a href="/techeval/">Home</a>
<h1>Mod perl demo</h1>
<h4>The following will add text to text you previously input.</h4>
<form action="/stateful" method="post">
Enter some text:
<input id="entered" name="entered" size="40" />
<input type="submit" name="action" value="Add Text" /> &nbsp;&nbsp;
<input type="submit" name="action" value="Clear" />
<p>
$entered
</p>
</form>
<hr />
<p>
For this module to work we need to register the module <br />
with our instance of Apache. The configuration<br />
section looks something like this:<br />
</p>
<pre>
$config
</pre>
<p>
One big danger with mod_perl is not cleaning up variables you want <br />
refreshed on every request vs those such as database handles you'd like <br />
to keep persistent. The "use strict" in the source with this as it forces<br />
us to identify the package that a variable came from. The "package stateful"<br />
line means our package name is "stateful". We then can use either "my" or "our"<br />
to identify variables. The "our" variable will be persistent but the "my"<br />
variables won't be as they are local to the "handler" method.<br />
</p>
<p>
Another drawback is that you have to restart the server whenever you change the module.<br />
</p>
<p>
<a href="/techeval/stateful.pm.txt">View source</a><br />
Apache expects our module to have a "handler" method as an entry point to processing the 
request.<br />
Note the "\$r" variable in the source. This is the equivalent to the C data structure<br />
representing the request which is provided by Apache to an Apache C module. We use the "\$r" <br />
object to communicate with Apache. Note also that we can use existing modules <br />
such as CGI in this module.<br />
</p>

HTML
	$html .= end_html;
	$r->print($html);
	return OK;
}

1;

