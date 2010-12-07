<?php
/**
 * manage admin stuff
 * you can create admins via the command line with scripts/mkadmin.sh
 * there are two levels: regular and root 
 * root can change other admins
 * admins are limited to hiding organizations
 */
class Admin extends BaseController {
	public function execute() {
		$this->ldata = Login::check();
		if (!$this->ldata['user_type'] == 'admin') 
			die("You must log in as an admin to access this area");

		$this->doable(array(
			'logins' => 'logins',
			'orgs' => 'orgs',
			'admins' => 'admins',
			'default' => 'mainpage'
		));
		$this->doaction($this->actions[1]);
	}
	
	protected function logins() {
		$v = new VolunteerModel;
		if ($this->actions[2] == 'save') {
			$v->hide($_REQUEST['hide']);
		}
		$logins = $v->logins();
		View::assign('logins',$logins);
		$this->mainpage();
	}

	protected function orgs() {
		$o = new OrganizationModel;
		if ($this->actions[2] == 'save') {
			$o->hide($_REQUEST['hide']);
		}
		$orgs = $o->getall("order by organizationID desc");
		View::assign('orgs',$orgs);
		$this->mainpage();
	}

	protected function admins() {
		$a = new AdminModel;
		if ($this->actions[2] == 'save') {
			if (!$this->ldata['details']['permissions'] == 'root') 
				die("you do not have sufficient access to edit admin data");

			if (!$a->setperms($_REQUEST['perms'])) {
				View::assign('error',$a->err());
			} else {
				if (!$a->delmany($_REQUEST['delete'],$this->ldata['external_key'])) {
					View::assign('error',$a->err());
				}
			}

		} else if ($this->actions[2] == 'create') {
			if (Check::isemail($_REQUEST['email'])) {

				if (!Check::validpassword($_REQUEST['password'])) 
					$errors[] = 'invalid password!';

				if ($_REQUEST['password'] != $_REQUEST['confirm_password'])
					$errors[] = 'passwords do not match';

				if (count($errors)) {
					View::assign('error',implode("<br>\n", $errors));
				} else {
					if (!$a->ins($_REQUEST)) {
						View::assign('error',$a->err());
					} else {
						$aid = $a->getid();
						if (!Check::digits($aid)) {
							View::assign('error', "could not get id for new admin!");
						} else {
							$_REQUEST['external_key'] = $aid;
							$_REQUEST['user_type'] = 'admin';
							$u = new User;
							if (!$u->ins($_REQUEST)) 
								View::assign('error',$u->err());
						}
					}
				}
			} else if ($_REQUEST['email']) {
				View::assign('error', "invalid email!");
			}
		}
		$admins = $a->logins(); 
		View::assign('admins',$admins);
		$this->mainpage();
	}

	protected function mainpage() {
		View::assign('ldata',$this->ldata);
		View::wrap('admin.tpl');
	}
}

