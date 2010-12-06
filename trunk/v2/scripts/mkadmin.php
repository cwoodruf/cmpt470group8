#!/usr/bin/php
<?php
$basepath = realpath(dirname(dirname(__FILE__)));
chdir($basepath);
set_include_path(get_include_path() . PATH_SEPARATOR . $basepath);
require_once('lib/init.php');
print "in ".getcwd()."\n";

$loginmodel = LOGINMODEL;
Check::$emptyok = false;

if (($stdin = fopen('php://stdin','r')) !== false) {
	while (!($valid=Check::isemail($email))) {
		if (isset($email) and !$valid) print "email $email not a valid email!\n";
		print "enter email for admin user: ";
		$email = fgets($stdin,255);
		$email = preg_replace('#[\n\r]#','',trim($email));
	}
	while (!($valid=Check::validpassword($password))) {
		if (isset($password) and !$valid) print "password $password not a valid password!\n";
		print "enter password for $email: ";
		$password = fgets($stdin,255);
		$password = preg_replace('#[\n\r]#','',trim($password));
	}

	print "make $email a root admin? [yes|no] ";
	$confirm = fgets($stdin,255);
	if (preg_match('#^yes$#',$confirm)) {
		$perms = 'root';
		print "$email will be a root admin\n";
	} else {
		$perms = '';
		print "$email will be a regular admin\n";
	}

	$u = new $loginmodel; 
	$a = new AdminModel;
	$login = $u->getone($email);
	if ($login) {
		if ($login['user_type'] != 'admin') 
			die("user $email is already user type '{$login['user_type']}'!\n");

		print "replace existing login for $email? [yes|no] ";
		$confirm = fgets($stdin,255);
		if (!preg_match('#^yes$#',$confirm)) {
			print "aborting\n";
			exit;
		}

		$key = $login['external_key'];
		if (($admin = $a->getone($key)) == false) 
			die("error finding admin record for $email! ".$a->err()."\n");
		print "perms were: {$admin['perms']}\n";

		if (!$a->upd($key, array('permissions' => $perms))) 
			die("error updating admin record for $email: ".$a->err()."\n");

		if (!$u->upd($email, array('password' => $password)))
			die("error updating password for $email: ".$u->err()."\n");

	} else {
		if ($a->ins(array('permissions' => $perms))) {
			$key = $a->getid();
		} else {
			die("error creating admin record for $email: ".$a->err()."\n");
		}

		$r = $u->ins(
			array(
				'email' => $email, 
				'password' => $password, 
				'user_type' => 'admin',
				'external_key' => $key
			)
		);
		if (!$r) die("error making login for $email: ".$u->err()."\n");
	}
	print "made login and admin record for $email (permissions: $perms)\n";

} else {
	die("couldn't attach to standard input!\n");
}

