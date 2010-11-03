package Catalyst::Schema::Result::BookAuthor;

# Created by DBIx::Class::Schema::Loader
# DO NOT MODIFY THE FIRST PART OF THIS FILE

use strict;
use warnings;

use Moose;
use MooseX::NonMoose;
use namespace::autoclean;
extends 'DBIx::Class::Core';

__PACKAGE__->load_components("InflateColumn::DateTime", "TimeStamp", "EncodedColumn");

=head1 NAME

Catalyst::Schema::Result::BookAuthor

=cut

__PACKAGE__->table("book_author");

=head1 ACCESSORS

=head2 book_id

  data_type: 'integer'
  is_foreign_key: 1
  is_nullable: 0

=head2 author_id

  data_type: 'integer'
  is_foreign_key: 1
  is_nullable: 0

=cut

__PACKAGE__->add_columns(
  "book_id",
  { data_type => "integer", is_foreign_key => 1, is_nullable => 0 },
  "author_id",
  { data_type => "integer", is_foreign_key => 1, is_nullable => 0 },
);
__PACKAGE__->set_primary_key("book_id", "author_id");

=head1 RELATIONS

=head2 author

Type: belongs_to

Related object: L<Catalyst::Schema::Result::Author>

=cut

__PACKAGE__->belongs_to(
  "author",
  "Catalyst::Schema::Result::Author",
  { id => "author_id" },
  { is_deferrable => 1, on_delete => "CASCADE", on_update => "CASCADE" },
);

=head2 book

Type: belongs_to

Related object: L<Catalyst::Schema::Result::Book>

=cut

__PACKAGE__->belongs_to(
  "book",
  "Catalyst::Schema::Result::Book",
  { id => "book_id" },
  { is_deferrable => 1, on_delete => "CASCADE", on_update => "CASCADE" },
);


# Created by DBIx::Class::Schema::Loader v0.07002 @ 2010-10-17 11:56:11
# DO NOT MODIFY THIS OR ANYTHING ABOVE! md5sum:3XIp4lzJkH5ahGauDmxM1w


# You can replace this text with custom content, and it will be preserved on regeneration
__PACKAGE__->meta->make_immutable;
1;
