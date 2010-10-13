<?php
class Contacts extends ContactsRelation {
	/**
	 * get a list of contacts for a specific user
	 */
	public function getcontacts($id) {
		return $this->getall(
			array("where email='%s' order by contact_email",$id),
			array("contact_email","shared")
		);
	}
	/**
	 * get a list of "friends" who have shared contact details
	 */
	public function getsharers($id) {
		return $this->getall(
			array("where contact_email='%s' and shared=1",$id),
			array("email")
		);
	}
	/**
	 * get a list of a friends friends but only if they've let you
	 */
	public function sharedcontacts($sharer,$id) {
		$share = $this->getone(array('email'=>$sharer,'contact_email'=>$id));
		if ($share['shared']) {
			try {
				$this->run(
					"select users.email,users.name,users.notes ".
					"from users join contacts on (users.email=contacts.contact_email) ".
					"where contacts.email='%s' ".
					"and users.email in (".
						"select email from contacts ".
						"where contact_email='%s' ".
						"and shared=1".
					") ".
					"order by users.email ",
					$sharer, $id
				);
				return $this->resultarray();

			} catch (Exception $e) {
				$this->errmsg($e);
				if (!QUIET) {
					die("query error: ".$this->err()."<br>\n".$this->query());
				}
				return false;
			}
		} 
	}
}

