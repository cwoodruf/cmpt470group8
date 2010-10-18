use strict;
use warnings;
use Test::More;

BEGIN { use_ok 'Catalyst::Test', 'catalyst' }
BEGIN { use_ok 'catalyst::Controller::Books' }

ok( request('/books')->is_redirect, 'Request should succeed' );
done_testing();
