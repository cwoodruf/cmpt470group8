#!/usr/bin/perl
use CGI qw/:standard/;
use CGI::Carp qw/fatalsToBrowser/;
use HTML::Entities;
use strict;

print header,start_html('perl basic cgi demo'),<<HTML;
<h1>Basic perl cgi demo using the CGI module</h1>
<p>
This won't be XHTML compliant as its using the transitional syntax but
gives an idea of how a typical perl CGI script might look.
</p>
<a href="basic.cgi?source=1">print the source code</a>

HTML

if (param('source')) {
	print h4("Source of $0"),pre(&getme);
}
 
print end_html;

sub getme {
	open ME, $0 or croak "Can't open $0: $!";
	local $/; undef $/;
	my $src = <ME>;
	close ME;
	encode_entities($src);
}
