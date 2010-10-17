package catalyst::Controller::Login;
use Moose;
use namespace::autoclean;

BEGIN {extends 'Catalyst::Controller'; }

=head1 NAME

catalyst::Controller::Login - Catalyst Controller

=head1 DESCRIPTION

Catalyst Controller.

=head1 METHODS

=cut


=head2 index

=cut

sub index :Path :Args(0) {
	my ( $self, $c ) = @_;

	my $username = $c->request->params->{username};
	my $password = $c->request->params->{password};

	if ($username && $password) {
		if ($c->authenticate({ username => $username, password => $password })) {
			$c->response->redirect($c->uri_for(
				$c->controller('Books')->action_for('list')));
			return;
		} else {
			$c->stash(error_msg => "Bad username or password.");
		}
	} else {
		$c->stash(error_msg => "User name and password required!");
	}
	$c->stash(template => 'books/login.tt');
}


=head1 AUTHOR

group8,,,

=head1 LICENSE

This library is free software. You can redistribute it and/or modify
it under the same terms as Perl itself.

=cut

__PACKAGE__->meta->make_immutable;

1;
