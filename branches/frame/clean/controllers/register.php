<?php
/**
 * basic login creation form - customize this to work with your own logins
 */
class Register extends Controller {
	private static $LOGINMODEL = LOGINMODEL;

	// change these to match the appropriate fields in your logins table
	private static $USERNAME = 'email';
	private static $OLDUSERNAME = 'oldemail'; // for changing a user name
	private static $PASSWORD = 'password';
	// see below for customizable checker functions

	public function execute() {
		$r = new self::$LOGINMODEL;

		$this->schema = $r->schema;
		$username = $_REQUEST[self::$USERNAME];

		switch ($this->actions[1]) {
		case 'save':
			if (!($this->userchecker($username))) {
				View::assign('errors',"Invalid email entered!");
				$this->input = $_REQUEST;
				break;
			}
			if (!($this->pwchecker($_REQUEST[self::$PASSWORD]))) {
				View::assign('errors',"Invalid password entered!");
				$this->input = $_REQUEST;
				break;
			}
			$_REQUEST[self::$PASSWORD] = Login::encode($_REQUEST[self::$PASSWORD]);
			if ($_REQUEST[self::$OLDUSERNAME]) {
				$r->upd($_REQUEST[self::$OLDUSERNAME], $_REQUEST);
			} else {
				$r->ins($_REQUEST);
			}
			$this->input = $r->getone($username);
			$this->input[self::$PASSWORD] = '';
			View::assign('topmsg',"saved ".htmlentities($username));
			break;
		case 'edit':
			$ldata = Login::check();
			if ($ldata['login'] == $username) {
				$this->input = Run::me(self::$LOGINMODEL,'getone',$ldata['login']);
				$this->input[self::$PASSWORD] = '';
				$this->hidden[self::$OLDUSERNAME] = $ldata['login'];
			}
		default:
		}
		View::display('tools/register.tpl');
	}

	// modify these to work with your specific login requirements 
	public  userchecker($username) {
		return Check::isemail($username);
	}

	public pwchecker($password) {
		return Check::validpassword($password);
	}
}

