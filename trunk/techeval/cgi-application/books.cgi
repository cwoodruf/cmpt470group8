#!/usr/bin/perl
# clone of catalyst books application used from the catalyst tutorial
use lib qw{lib};
use Books;
use strict;

my $bl = Books->new();
$bl->run();

