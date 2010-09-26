#!/usr/bin/perl
use CGI qw/header start_html end_html/;
use strict;

print header,start_html("test of perl");
print join "<br>\n", map { "$ENV{$_} = $_" } sort keys %ENV;
print end_html;

