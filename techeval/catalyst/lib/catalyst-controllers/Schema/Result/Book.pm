package catalyst::Schema::Result::Book;

# Created by DBIx::Class::Schema::Loader
# DO NOT MODIFY THE FIRST PART OF THIS FILE

use strict;
use warnings;

use Moose;
use MooseX::NonMoose;
use namespace::autoclean;
extends 'DBIx::Class::Core';

__PACKAGE__->load_components("InflateColumn::DateTime", "TimeStamp");

=head1 NAME

catalyst::Schema::Result::Book

=cut

__PACKAGE__->table("book");

=head1 ACCESSORS

=head2 id

  data_type: 'integer'
  is_auto_increment: 1
  is_nullable: 0

=head2 title

  data_type: 'text'
  is_nullable: 1

=head2 rating

  data_type: 'integer'
  is_nullable: 1

=head2 created

  data_type: 'integer'
  is_nullable: 1

=head2 updated

  data_type: 'integer'
  is_nullable: 1

=cut

__PACKAGE__->add_columns(
  "id",
  { data_type => "integer", is_auto_increment => 1, is_nullable => 0 },
  "title",
  { data_type => "text", is_nullable => 1 },
  "rating",
  { data_type => "integer", is_nullable => 1 },
  "created",
  { data_type => "integer", is_nullable => 1 },
  "updated",
  { data_type => "integer", is_nullable => 1 },
);
__PACKAGE__->set_primary_key("id");

=head1 RELATIONS

=head2 book_authors

Type: has_many

Related object: L<catalyst::Schema::Result::BookAuthor>

=cut

__PACKAGE__->has_many(
  "book_authors",
  "catalyst::Schema::Result::BookAuthor",
  { "foreign.book_id" => "self.id" },
  { cascade_copy => 0, cascade_delete => 0 },
);


# Created by DBIx::Class::Schema::Loader v0.07002 @ 2010-10-04 03:14:03
# DO NOT MODIFY THIS OR ANYTHING ABOVE! md5sum:ugYiZJwoH4c6ioLbXXmpxg


# You can replace this text with custom content, and it will be preserved on regeneration
__PACKAGE__->many_to_many(authors => 'book_authors', 'author');
__PACKAGE__->add_columns(
	"created", {data_type => 'datetime', set_on_create => 1 },
	"updated", {data_type => 'datetime', set_on_create => 1, set_on_update => 1},
);
__PACKAGE__->meta->make_immutable;

sub author_count {
	my ($self) = @_;
	$self->authors->count;
}

sub author_list {
	my ($self) = @_;
	my @names;
	foreach my $author ($self->authors) {
		push (@names, $author->full_name);
	}
	join ', ', @names;
}


1;
