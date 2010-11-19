package catalyst::Schema::ResultSet::Book;
use strict;
use warnings;
use base 'DBIx::Class::ResultSet';

sub created_after {
	my ($self, $datetime) = @_;
	my $date_str = $self->result_source->schema->storage->datetime_parser->format_datetime($datetime);
	return $self->search({created => { '>' => $date_str } });
}

sub title_like {
	my ($self, $title) = @_;
	return $self->search({title => { like => "%$title%" }});
}

1;
