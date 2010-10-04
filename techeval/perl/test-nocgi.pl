#!/usr/bin/perl
our $count++;
print <<HTML;
<html><head><title>test of perl - no cgi - $count</title></head><body>
HTML
print join "<br>\n", map { "$_ = $ENV{$_}" } reverse sort keys %ENV;
print <<HTML;
</body></html>
HTML

__END__
use CGI qw/header start_html h3 end_html/;
our $count++;
print header,start_html("test of perl $count"),h3("Perl CGI $count");
print join "<br>\n", map { "$_ = $ENV{$_}" } reverse sort keys %ENV;
print end_html;
