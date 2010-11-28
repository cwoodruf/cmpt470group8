<?php
class VolunteerModel extends VolunteerEntity {
	public function __construct() {
		parent::__construct();
		$this->schema['name_first']['checker']['Check'] = 'notempty';
		$this->schema['name_last']['checker']['Check'] = 'notempty';
		$this->schema['email']['checker']['Check'] = 'isemail';
	}

	public function live($id) {
		if (!preg_match('#^\d+$#',$id)) {
			$u = new User;
			$login = $u->getone($id);
			unset($login['password']);
			if (!$login) return false;
			$email = $id;
			$id = $login['external_key'];
		}
		$vol = $this->getone($id);
		if (!$vol) return false;
		if ($vol['visibility_status'] != '') return false;
		return array_merge($login,$vol);
	}

	public function hide($tohide) {
		try {
			$this->run(
				"update Volunteer set visibility_status=''"
			);
			foreach ($tohide as $vid => $status) {
				if (!$status) continue;
				if (!$this->upd($vid, array('visibility_status' => $status))) 
					throw new Exception("Error updating Volunteer $vid: ".$this->dberr());
			}
			return true;

		} catch (Exception $e) {
			$this->err($e);
			if (!QUIET) die($this->err().' '.$this-query());
			return false;
		}
	}

	public function logins() {
		return $this->getall(
			"join Login on (Login.external_key=Volunteer.volunteerID) ".
			"where user_type = 'volunteer' ".
			"order by user_type, Login.email"
		);
	}
}

