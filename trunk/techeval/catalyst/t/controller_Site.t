use strict;
use warnings;
use Test::More;

BEGIN { use_ok 'Catalyst::Test', 'catalyst' }
BEGIN { use_ok 'catalyst::Controller::Site' }

ok( request('/site')->is_success, 'Request should succeed' );
done_testing();
