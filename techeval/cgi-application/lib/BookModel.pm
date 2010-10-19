package BookModel;
use Data::Dumper;
use strict;
our $DBFILE = "/var/www/cgi-application/books.db";
our $DSN = "dbi:SQLite:dbname=$DBFILE";

# very basic model package that builds a database handle from the CGI::Application controller
# I know that's a bit wonky but its late ... :)
sub new {
	my $package = shift;
	my ($ca) = @_;
	$ca->dbh_config($DSN);
	my $self = { dbh => $ca->dbh };
	bless $self, $package;
	$self;
}

sub destroy {
	my $self = shift;
	$self->{dbh}->disconnect;
}

sub list {
	my $self = shift;
	my $dbh = $self->{dbh};
	# get our book list
	my $getbooks = $dbh->prepare(
		"select book.id,book.title,book.rating,author.first_name,author.last_name ".
		"from book join book_author on (book.id=book_author.book_id) ".
			"join author on (book_author.author_id=author.id)".
		"order by book.title, author.last_name, author.first_name"
	);
	$getbooks->execute or croak $getbooks->errstr;
	my %books;
	while (my $row = $getbooks->fetchrow_hashref) {
		my $bid = $row->{id};
		if (defined $books{$bid}) {
		} else {
			$books{$bid} = {%$row};
		}
		push @{$books{$bid}{authors}}, $row->{first_name}.' '.$row->{last_name};
	}
	[values %books];
}

sub addbook {
	my $self = shift;
	my (%f) = @_;
	my $dbh = $self->{dbh};

	$self->{status} = "Did not add a book.";
	$self->{error} = undef;

	my $insbook = $dbh->prepare("insert into book (title,rating) values (?,?)");
	eval { $insbook->execute($f{title}, $f{rating}) or die $insbook->errstr; };
	$self->{error} = $@ and return $self 
		if $@;

	my $newbook = $dbh->selectrow_arrayref("select last_insert_rowid()");
	$self->{error} = "no insert id???" and return $self 
		unless $newbook->[0] =~ /\d/;

	my $insauth = $dbh->prepare("insert into book_author (book_id,author_id) values (?,?)");
	eval { $insauth->execute($newbook->[0], $f{author_id}) or die $insauth->errstr; };
	$self->{error} = $@ if $@;

	$self->{status} = "Added book." unless $self->{error};
	$self;
}

sub delbook {
	my $self = shift;
	my ($book_id) = @_;

	$self->{status} = 'Did not delete book.';
	my $dbh = $self->{dbh};

	if ($book_id =~ /^\d+$/) {
		my $r = $dbh->do(sprintf("delete from book where id=%u", $book_id));
		if ($r) {
			$self->{status} = 'Deleted book.';
		}
	} else {
		$self->{error} = 'Invalid book_id!';
	}
	$self;
}

1;

