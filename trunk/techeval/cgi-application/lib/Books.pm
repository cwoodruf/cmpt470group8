package Books;
use lib qw{lib};
# this line must be above the use lines or the other modules won't know what type of module we are
use base qw{CGI::Application CGI::Application::Plugin::DBH CGI::Application::Plugin::TT}; 
use CGI::Application;
use CGI::Application::Plugin::DBH;
use CGI::Application::Plugin::TT;
use CGI::Carp qw/fatalsToBrowser/;
use BookModel;
use Data::Dumper;
use strict;

our $BASEDIR = 'root';
our $BOOKSDIR = "$BASEDIR/books/";

sub setup {
	my $self = shift;
	$self->start_mode('model');
	$self->run_modes(
		create => 'showform',
		list => 'showlist',
		del => 'showdel',
		save => 'savebook',
	);
	$self->start_mode('list');
	$self->mode_param('action');
	$self->{model} = BookModel->new($self);
}

sub teardown {
	my $self = shift;
	$self->{model}->destroy;
}

sub showform {
	my $self = shift;
	my $q = $self->query;
	return $self->fetch(
		'form_create.tt',
		{ 'title' => 'Create a new book' }
	);
}

sub showlist {
	my $self = shift;
	return $self->fetchlist("Book list");
}

sub savebook {
	my $self = shift;
	my $q = $self->query;
	$self->{model}->addbook(
		'author_id' => $q->param('author_id'),
		'title' => $q->param('title'),
		'rating' => $q->param('rating'),
	);
	return $self->fetchlist("Save a book");
}

sub showdel {
	my $self = shift;
	my $q = $self->query;
	$self->{model}->delbook($q->param('book_id'));
	return $self->fetchlist("Delete a book");
}
 
sub fetchlist {
	my $self = shift;
	my ($title) = @_;
	my %params = (
		'title' => $title,
		'books' => $self->{model}->list,
		'status' => $self->{model}->{status},
		'error' => $self->{model}->{error},
	);
	return $self->fetch('list.tt',\%params);
}

sub fetch {
	my $self = shift;
	my ($tpl,$params) = @_;
	$params->{content} = ${$self->tt_process($BOOKSDIR.$tpl,$params)};
	return $self->tt_process($BASEDIR.'/wrapper.tt', $params);
}

1;

