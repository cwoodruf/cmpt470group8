#!/usr/bin/perl
use CGI qw/:standard/;
our $count++;
print header,start_html("test of perl $count"),h3("Perl CGI $count");
print join "<br>\n", map { "$_ = $ENV{$_}" } reverse sort keys %ENV;
print end_html;
