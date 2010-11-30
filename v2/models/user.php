<?php
class User extends LoginEntity implements PW {
	private static $user_types = array(
		'volunteer' => true,
		'organization' => true,
		'admin' => true,
	);

	public function __construct() {
		parent::__construct();
		$this->schema['password']['checker']['Check'] = 'validpassword';
		$this->schema['user_type']['checker']['User'] = 'validtype';
		$this->schema['external_key']['checker']['Check'] = 'digits';
		$this->schema['password']['modifier']['Login'] = 'encode';
	}

	public static function validtype($s) {
		if (self::$user_types[$s]) return true;
		return false;
	}

	// password recovery functions see constructors/password.php for how this is used
	public function pwkey($email) {
		if (!Check::isemail($email)) return false;
		$key = sha1(mt_rand()+time);
		if ($this->upd($email,array('confirmkey' => $key))) return $key;
		return false;
	}

	public function pwlogin($key) {
		$login = $this->getall(array("where confirmkey='%s' limit 1",$key));
		if (is_array($login)) return $login[0];
		return false;
	}

	// ------------------------ PW interface 
	public function valid_login($login) {
		return strlen($login) >= 4 and strlen($login) <= 64;
	}
	public function valid_pw($pw) {
		return Check::validpassword($pw);
	}
	public function encode_pw($pw) {
		return Login::encode($pw);
	}
	public function get_login($id) {
		$me =  $this->getone($id);

		if (!Check::digits($me['external_key'],false)) return $me;

		switch($me['user_type']) {
		case 'volunteer': 
			$me['details'] = Run::me('VolunteerModel','getone',$me['external_key']);
			if ($me['details']['visibility_status'] != '') return;
		break;
		case 'organization':
			$me['details'] = Run::me('OrganizationModel','getone',$me['external_key']);
			if ($me['details']['visibility_status'] != '') return;
		break;
		case 'admin':
			$me['details'] = Run::me('AdminModel','getone',$me['external_key']);
		break;
		}

		return $me;
	}
}

