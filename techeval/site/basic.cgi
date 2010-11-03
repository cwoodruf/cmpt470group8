#!/usr/bin/perl
# this module handles processing the CGI input
use CGI qw/:standard/; 

# this is an additional module for managing errors
use CGI::Carp qw/fatalsToBrowser/;

# module that allows us to encode <> etc to the equivalent html entity
use HTML::Entities;
use strict;

my ($source,$printme,$printverb);
if (param('source')) {
	$source = h4("Source of $0").pre(&getme).hr;
	$printme = 0;
	$printverb = "Hide";
} else {
	$printme = 1;
	$printverb = "Print";
}

my $config = encode_entities(<<APACHE);
<VirtualHost *:80>
...
	# normally cgi scripts are run in a specific directory
	# the ScriptAlias directive lets us put the directory anywhere we'd like
	ScriptAlias /cgi-bin/ /usr/lib/cgi-bin/

	# this section sets the configuration parameters for the cgi directory
	<Directory "/usr/lib/cgi-bin">

		# don't let anyone change these settings with an .htaccess file
		AllowOverride None

		# +ExecCGI is the most important option here it forces all requests to:
		# look for a script or program with that file name and run it
		Options +ExecCGI -MultiViews +SymLinksIfOwnerMatch

		# these two lines determine who is allowed to make requests into this directory
		# in this case anyone can run scripts
		Order allow,deny
		Allow from all
	</Directory>

	# you can also set specific file names to be run as CGI programs
	# in this case any file ending in ".cgi" will be treated as a CGI program
	<Files ~ "\.cgi$">
		# this basically has the same effect as the ScriptAlias directive above
		SetHandler cgi-script
		Options +ExecCGI
	</Files>
...
</VirtualHost>
APACHE

print header,start_html('perl basic cgi demo'),<<HTML,end_html;
<h1>Basic perl cgi demo using the CGI module</h1>
<p>
This is a typical perl CGI program. 
</p>
<p>
The big advantage of a CGI program, particularly a script, is that it is<br />
very easy to modify and maintain them relative to an equivalent compiled program<br />
or mod_perl module.<br />
</p>
<p>
The main down side is that they are relatively slow. This script<br />
will be about 10-20x slower than the mod_perl example provided.<br />
</p>
<a href="basic.cgi?source=$printme">$printverb the source code</a>
$source
<p>
The configuration in apache that lets us run CGI programs looks like this:
</p>
<pre>$config</pre>
HTML

sub getme {
	open ME, $0 or croak "Can't open $0: $!";
	local $/; undef $/;
	my $src = <ME>;
	close ME;
	encode_entities($src);
}
