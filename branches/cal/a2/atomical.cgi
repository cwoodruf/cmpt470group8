#!/usr/bin/perl
# home grown feed reader for Atom feeds
# author Cal Woodruff cwoodruf@sfu.ca
use LWP::Simple;
use Data::Dumper;
use Date::Parse;
use Date::Format;
use HTML::Entities;
use CGI qw/header pre param end_html/;
use CGI::Carp qw/fatalsToBrowser/;
use strict;
my (@content);

# handlers: map a tag to a function to handle tag contents
# handlers for parsing metadata
my %metahandlers = (
	title => \&html,
	subtitle => \&text,
	link => \&get_href,
	updated => \&date,
	author => \&author,
	id => \&text,
);
# handlers for parsing articles
my %entryhandlers = (
	 title => \&html,
	 author => \&text,
	 id => \&url,
	 updated => \&date,
	 link => \&get_href,
	 content => \&content,
	 summary => \&text,
);

print &html_head;

my ($entries, $meta);

# grab the url: if it doesn't exist we won't get anything
my $feed = get(param('url'));

# sometimes the content is flattened, unflatten it w/o adding extra whitespace
$feed =~ s#(</[^>]*>|<[^>]*/>)#$1\n#g; 
$feed =~ s#<entry#\n<entry#ig;

# now process the feed
# I am deliberately not worrying if the feed "conforms" to an arbitrary 'standard"
# if the content is there the parser will find it, if not, that's ok
foreach (split "\n", $feed) {

	# this will find chunks with entries 
	if (m#<entry>#i...m#</entry>#) {
		# looking for an entry
		$entries .= "$_\n";

	# now outside of an entry
	} else {
		# if we have an entry save it
		if (defined $entries) {
			push @content, readme($entries,\%entryhandlers);
			$entries = undef;

		# anything else is considered metadata
		} else {
			# looking at some thing in the main part of the document
			$meta .= "$_\n";
		}
	}
}

my $meta = readme($meta,\%metahandlers);

# presentation section
my $encodedurl = encode_entities(param('url'));

print <<HTML;
<div class="top">
<h1>Atom Reader</h1>
<i>Author Cal Woodruff (cwoodruf sfu ca)</i>
</div>

<div class="urlform">
<form method="get" action="">
<p>
Enter a url here for an atom feed:
<input name="url" size="60" value="$encodedurl" /> &nbsp;&nbsp;
<input type="submit" value="Read me" />
</p>
</form>
</div>

HTML

# if we don't have any articles beat it
print end_html and exit unless $feed;

# print the meta data for the feed
print <<HTML;
<div class="meta">
<h3>Feed: $meta->{title}</h3>
<p>
<b>$meta->{subtitle}</b>
</p>
<a href="$meta->{link}">link</a> 
$meta->{author}->{name} <a href="mailto:$meta->{author}->{email}">email</a>
last updated $meta->{updated}->{str}
</div>

HTML

# print each article
foreach my $entry (@content) {
	print <<HTML;
<div class="entry">
<div class="entry-meta">
<h4>$entry->{title}</h4>
<b>$entry->{author} Last updated $entry->{updated}->{str}</b>
<a href="$entry->{link}">link</a>
</div>

<div class="entry-content">
<blockquote>
$entry->{summary}
</blockquote>
<p>
$entry->{content}
</p>
</div>
</div>

HTML
}

print end_html;

# subs
# readme does basic parsing for a subsection of a document using given handlers
# because we specify the tags we are interested in ahead of time we can ignore 
# extraneous junk quite easily
sub readme {
	my ($raw,$handlers) = @_;
	my %entry;
	$entry{__raw__} => $raw;
	foreach my $tag (keys %$handlers) {
		if ($raw =~ m#<$tag(| [^>]*)>(.*?)</$tag>#is or $raw =~ m#<$tag ([^>]*) />#is) {
			my ($attr,$body) = ($1,$2);
			$entry{$tag} = &{$handlers->{$tag}}($attr,$body);
		}
	}
	\%entry;
}

# these are all handler routines for grabbing and processing specific document pieces 
sub author {
	return readme($_[1],{name=>\&text,email=>\&url});
}

# the content handler makes displayable content from the article body
# what it does depends on the type attribute in the content node
sub content {
	my ($attrs,$text) = @_;
	my $type;
	if ($attrs =~ m#type\s*=\s*"([^"]*)"#) {
		$type = $1;
	}
	# delete CDATA and PCDATA tags
	$text =~ s#<\[P?CDATA##g;
	$text =~ s#\]\]>##g;

	# process content based on type
	# for html in a real deployment removing scripts would be an idea
	if ($type eq 'xhtml') {
		# remove the namespaces in the html
		$text =~ s#(</?)\w+:#$1#g;
		$text =~ s#(<[^>]*)xmlns="[^"]*"([^>]*>)#$1$2#g;

	} elsif ($type eq 'html') {

		$text = decode_entities($text);
	} else {
		# this would be the default behavior for plain text
		$text = encode_entities($text);
	}
	$text;
}

# generic handler that doesn't really change anything
sub text {
	my ($attrs,$text) = @_;
	$text;
}

sub html {
	my ($attrs,$text) = @_;
	decode_entities($text);
}

# may want to process urls differently (eg encode)
sub url {
	my ($attrs,$text) = @_;
	encode_entities($text);
}

# get the href attribute from a tag
sub get_href {
	my ($attr) = @_;
	if ($attr =~ /href\s*=\s*"([^"]*)"/) {
		return $1;
	}	
}

# make a formatable date
sub date {
	my $epoch = str2time(&text(@_));
	{epoch => $epoch, str => time2str("%Y-%m-%d %H:%M", $epoch)}
}

# make the html content-type and head section
sub html_head {
	return <<HTML;
Content-Type: text/html; charset=utf-8

<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-us" xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Atom Reader</title>
<link rel="stylesheet" type="text/css" href="atomical.css" />
</head>
<body>

HTML
}

