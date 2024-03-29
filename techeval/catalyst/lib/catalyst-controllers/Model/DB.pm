package catalyst::Model::DB;

use strict;
use base 'Catalyst::Model::DBIC::Schema';

# to use a test database put the dsn in a TESTCATDSN environment variable
# use it like this:
# $ cp myapp.db myappTEST.db
# $ CATALYST_DEBUG=0 MYAPP_DSN="dbi:SQLite:myappTEST.db" prove -vwl t/live_app01.t

my $dsn = $ENV{TESTCATDSN} ||= 'dbi:SQLite:/var/www/catalyst/books.db';

__PACKAGE__->config(
    schema_class => 'Catalyst::Schema',
    
    connect_info => {
        dsn => $dsn,
        user => '',
        password => '',
        on_connect_do => q{PRAGMA foreign_keys=ON},
    }
);

=head1 NAME

catalyst::Model::DB - Catalyst DBIC Schema Model

=head1 SYNOPSIS

See L<catalyst>

=head1 DESCRIPTION

L<Catalyst::Model::DBIC::Schema> Model using schema L<Catalyst::Schema>

=head1 GENERATED BY

Catalyst::Helper::Model::DBIC::Schema - 0.43

=head1 AUTHOR

group8

=head1 LICENSE

This library is free software, you can redistribute it and/or modify
it under the same terms as Perl itself.

=cut

1;
