#!/usr/bin/perl

use CGI qw/:standard/;


print header;

print <<EOF;
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="en-us" xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Run Perl Script</title>
</head>

<body>
One of the best features of Perl is that there are multiple ways to do the same thing.
<br/>
Here I Will Show How to Print HTML Code from a Perl Script in Four Different Ways!
<br/>
Take a Look at The Code of the Perl Script and then See it in Action!
<pre>
EOF


$cgi = new CGI;



print "FIRST METHOD\n\n";


print "Content-Type: text/html\n\n";
print "<HTML>\n";
print "<HEAD>\n";
print "<TITLE>Multiple Ways to Do the Same THing</TITLE>\n";
print "</HEAD>\n";
print "<BODY>\n";
print "<H4>First Way to Print Multiple Lines of HTML</H4>\n";
print "<P>\n";
print "</BODY>\n";
print "</HTML>\n\n\n"; 




print "SECOND METHOD\n\n";
$html = "Content-Type: text/html

<HTML>
<HEAD>
<TITLE>Multiple Ways to Do the Same THing</TITLE>
</HEAD>
<BODY>

<H4>Second Way to Print Multiple Lines of HTML</H4>


</BODY>
</HTML>";

print $html;



print "\n\nThird METHOD\n\n";

$html = qq{Content-Type: text/html

<HTML>
<HEAD>
<TITLE>Multiple Ways to Do the Same THing</TITLE>

</HEAD>
<BODY>
<H4>Third Way to Print Multiple Lines of HTML</H4>


</BODY>
</HTML>};

print $html;

print "\n\nFourth METHOD\n\n";

print <<EOF;
Content-Type: text/html

<HTML>
<HEAD>
<TITLE>Multiple Ways to Do the Same THing</TITLE>
</HEAD>
<BODY>
<H4>Fourth Way to Print Multiple Lines of HTML</H4>


</BODY>
</HTML>
EOF
