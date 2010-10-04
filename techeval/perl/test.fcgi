#!/usr/bin/perl
use CGI::Fast qw/:standard/;
use strict;

while (new CGI::Fast) {
	print header,start_html("test of perl with Fast::CGI");
	print h3("Fast CGI");
	print join "<br>\n", map { "$_ = $ENV{$_}" } reverse sort keys %ENV;
	print end_html;
}

