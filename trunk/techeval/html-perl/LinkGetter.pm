package LinkGetter;
use Apache2::RequestRec ();
use Apache2::RequestIO ();
use Apache2::Const qw/OK/;
use Data::Dumper;
use CGI;
use HTML::TreeBuilder;
use LWP::Simple;
use warnings;
use strict;

sub handler {
	my $r = shift;
	my $cgi = new CGI;
	my $url = $cgi->param("url");
	my $html = get $url;
	my $tree = HTML::TreeBuilder->new->parse($html);
	$r->content_type('text/html');
	$r->print('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">', "\n");
	$r->print('<html xmlns="http://www.w3.org/1999/xhtml">', "\n");
	$r->print('<head>', "\n");
	$r->print('<title>HTML Parsing Example</title>', "\n");
	$r->print('<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />', "\n");
	$r->print('</head>', "\n");
	$r->print('<body>', "\n");
	$r->print('<h1>Link Retriever</h1>', "\n");
	$r->print('<p>The following example will retrieve all links on an html page provided as input. This example attempts to show how parsing somewhat similar to that required of assignment 2 could be accomplished in perl. This example also uses the mod_perl configuration as demonstrated in the previous example.</p>', "\n");
	$r->print('<form name="url" method="get">', "\n");
	$r->print('<label for ="url">URL:</label>', "\n");
	$r->print('<input type="text" id="url" name="url" size="64"/>', "\n");
	$r->print('<input type="submit" value="send">', "\n");
	$r->print('</form>', "\n");
	for my $img ($tree->find('img')) {
		$r->print('<p>', "image: ", $img->attr('src'), '</p>', "\n");
	}
	for my $link ($tree->find('a')) {
		$r->print('<p>', "link: ", $link->attr('href'), '</p>', "\n");
	}
	$r->print('</body>', "\n");
	$r->print('</html>');
	return OK;
}

1;

