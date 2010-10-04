use strict;
use warnings;
use Test::More;

BEGIN { use_ok 'Catalyst::Test', 'catalyst' }
BEGIN { use_ok 'catalyst::Controller::Library::Login' }

ok( request('/library/login')->is_success, 'Request should succeed' );
done_testing();
