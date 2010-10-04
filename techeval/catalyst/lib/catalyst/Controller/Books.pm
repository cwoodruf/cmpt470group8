package catalyst::Controller::Books;
use Moose;
use namespace::autoclean;

BEGIN {extends 'Catalyst::Controller'; }

=head1 NAME

catalyst::Controller::Books - Catalyst Controller

=head1 DESCRIPTION

Catalyst Controller.

=head1 METHODS

=cut


=head2 index

=cut

sub index :Path :Args(0) {
    my ( $self, $c ) = @_;

    $c->response->body('Matched catalyst::Controller::Books in Books.');
}

sub list :Local {
	my ($self, $c) = @_;
	$c->stash(books => [$c->model('DB::Book')->all]);
	$c->stash(template => 'books/list.tt');
}

sub base :Chained('/') :PathPart('books') :CaptureArgs(0) {
	my ($self, $c) = @_;
	$c->stash(resultset => $c->model('DB::Book'));
	$c->log->debug('*** books base method ***');
}

sub url_create :Chained('base') :PathPart('url_create') :Args(3) {
	my ($self, $c, $title, $rating, $author_id) = @_;
	my $book = $c->model('DB::Book')->create({
		title => $title,
		rating => $rating,
	});
	$book->add_to_book_authors({author_id => $author_id});
	$c->stash(book => $book, template => 'books/create_done.tt');
}

sub form_create :Chained('base') :PathPart('form_create') :Args(0) {
	my ($self, $c) = @_;
	$c->stash(template => 'books/form_create.tt');
}

sub form_create_do :Chained('base') :PathPart('form_create_do') :Args(0) {
	my ($self, $c) = @_;
	my $title = $c->request->params->{title} || 'no title';
	my $rating = $c->request->params->{rating} || 'no rating';
	my $author_id = $c->request->params->{author_id} || '1';
	my $book = $c->model('DB::Book')->create({
		title => $title,
		rating => $rating,
	});
	$book->add_to_book_authors({author_id => $author_id});
	$Data::Dumper::Useperl = 1;
	$c->stash(book => $book, template => 'books/create_done.tt');
}

sub object :Chained('base') :PathPart('id') :CaptureArgs(1) {
	my ($self, $c, $id) = @_;
	$c->stash(object => $c->stash->{resultset}->find($id));
	# basically the equivalent for "die" if we can't find the book
	$c->detach('/error_404') if !$c->stash->{object};
	$c->log->debug("*** books object method: id $id ***");
}

sub delete :Chained('object') :PathPart('delete') :Args(0) {
	my ($self, $c) = @_;
	$c->stash->{object}->delete;
	$c->response->redirect($c->uri_for($self->action_for('list'), {status_msg => "Book deleted."}));
}

sub list_recent :Chained('base') :PathPart('list_recent') :Args(1) {
	my ($self, $c, $mins) = @_;
	$c->stash(books => [$c->model('DB::Book')->created_after(
				DateTime->now->subtract(minutes => $mins))]);
	$c->stash(template => 'books/list.tt');
}

sub list_recent_tcp :Chained('base') :PathPart('list_recent_tcp') :Args(1) {
	my ($self, $c, $mins) = @_;
	$c->stash(books => [$c->model('DB::Book')
				->created_after(DateTime->now->subtract(minutes => $mins))
				->title_like('TCP')
			]);
	$c->stash(template => 'books/list.tt');
}

=head1 AUTHOR

root

=head1 LICENSE

This library is free software. You can redistribute it and/or modify
it under the same terms as Perl itself.

=cut

__PACKAGE__->meta->make_immutable;

1;
