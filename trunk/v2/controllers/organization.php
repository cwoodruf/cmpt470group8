<?php
/**
 * manage organization info also 
 * hosts the controller code for managing organization specific logins (see the login method below)
 */
class Organization extends BaseController {
	public $o;
	protected $u;

	public function execute() {
		$this->o = new OrganizationModel;
		$this->u = new User;
		$this->doable(array(
			'signup' => 'signup',
			'save' => 'signup',
			'edit' => 'edit',
			'login' => 'login',
			'report' => 'report',
			'detail' => 'detail',
			'contact' => 'contact',
			'default' => 'mainpage',
		));
		$this->setcalendar();
		$this->doaction($this->actions[1]);

	}

        protected function contact() {
		$orgID = $_SESSION['organizationID'];
                $org = $this->o->getone($orgID);
                if (!$org) {
                        View::assign('error',"Can't make contact form: no organization info available!");
			$h = new Home($this->actions);
			$h->execute();
                        return;
                }
                if ($this->actions[2] == 'send') {
                        if (!Check::isemail($_REQUEST['email']))
                                $errors[] = "Invalid email";
                        if ($_REQUEST['email'] != $_REQUEST['confirm_email'])
                                $errors[] = "Emails don't match";
                        if (strlen($_REQUEST['message']) > Jobs::MAXMSGSIZE)
                                $errors[] = "Message too long";
                        if (strlen($_REQUEST['message']) == 0)
                                $errors[] = "Message too short";

                        if ($errors) {
                                View::assign('error',implode("<br>\n",$errors));
                        } else {
                                mail(
					$org['contact_email'],
					htmlentities($_REQUEST['subject']),
					htmlentities($_REQUEST['message']),
					"From: {$_REQUEST['email']}\r\nReply-to: {$_REQUEST['email']}\r\n"
				);
                                mail(
					$_REQUEST['email'],
					htmlentities("You sent: ".$_REQUEST['subject']),
					htmlentities($_REQUEST['message']),
					"From: {$_REQUEST['email']}\r\nReply-to: {$_REQUEST['email']}\r\n"
				);
                                View::assign('topmsg',"Email sent");
                                $this->detail($orgID);
                                return;
                        }
                }
                $this->input = $_REQUEST;
                View::assign('org',$org);
                View::assign('maxmsgsize',Jobs::MAXMSGSIZE);
                View::wrap('orgcontact.tpl');
        }

	protected function detail($orgID=null) {
		if (!$orgID) $orgID = $_REQUEST['organizationID'];
		$org = $this->o->getone($orgID);
		if (!$org or $org['visibility_status']) {
			View::assign('error',"Could not find organization details!");
			View::wrap('organization.tpl');
			return;
		} 
		$_SESSION['organizationID'] = $org['organizationID'];
		View::assign('org',$org);
		View::wrap('orgdetail.tpl');
	}

	protected function login() {
		$this->doable(array(
			'add' => 'loginadd',
			'edit' => 'loginedit',
			'delete' => 'logindel',
			'default' => 'loginlist',
		));
		$this->ldata = Login::check();
		$_REQUEST['user_type'] = 'organization';
		$_REQUEST['external_key'] = $this->ldata['details']['organizationID'];
		$this->dologinaction();
	}

	protected function dologinaction() {
		if ($this->isadmin()) 
			return $this->doaction($this->actions[2]);

		if (
			$this->actions[2] == 'edit' 
			and (
				empty($_REQUEST['email']) 
				or $_REQUEST['email'] == $this->ldata['login']
				or $_SESSION['login_to_edit'] == $this->ldata['login']
			)
		) {
			return $this->doaction('edit'); 
		}
		View::assign('error',"You must be the organization contact to edit logins!");
		$this->loginlist();
	}

	protected function isadmin() {
		if ($this->ldata['login'] == $this->ldata['details']['contact_email']) {
			return true;
		}
		return false;
	}

	protected function loginadd() {
		if ($this->actions[3] == 'save') {
			if (!Check::isemail($email = $_REQUEST['email'])) {
				View::assign('error',"Email $email is not valid!");
			} else {
				$user = $this->u->getone($email);
				if ($user) {
					View::assign('error',"A login for $email already exists!");
				} else {
					if ($_REQUEST['password'] != $_REQUEST['confirm_password']) {
						View::assign('error',"Passwords don't match!");
					} else {
						if (!$this->u->ins($_REQUEST)) {
							View::assign('error',"Error adding $email: ".$this->u->err());
						} else {
							View::assign('topmsg',"Saved login for $email");
							$this->loginlist();
							return;
						}
					}
					$this->input = $_REQUEST;
				}
			}
		}
		View::wrap('orglogin.tpl');
	}

	protected function loginedit() {
		if (!Check::isemail($email = $_REQUEST['email'])) 
			$email = $this->ldata['login'];

		View::assign('action','edit');
		if ($this->actions['3'] == 'save') {
			// if we are changing the email make sure it doesn't already exist in system
			if ($_SESSION['login_to_edit'] != $email) {
				if ($this->u->getone($email)) {
					View::assign('error',"A login for $email exists. Please choose another.");
					$this->input = $_REQUEST;
					View::wrap('orglogin.tpl');
					return;
				}
			}
			// if we are changing the main contact make sure to update the organization record
			if (	
				$this->isadmin() 
				and !$this->o->upd(
					$this->ldata['details']['organizationID'], 
					array('contact_email'=>$email))
			) {
				View::assign('error',"Error updating contact email:".$this->o->err());
				$this->loginlist();
				return;
			}
			if ($_REQUEST['password'] != $_REQUEST['confirm_password']) {
				View::assign('error',"Passwords don't match!");
			} else {
				// login_to_edit is the original email for this user
				if ($this->u->upd($_SESSION['login_to_edit'],$_REQUEST)) {
					View::assign('topmsg',"Saved login for $email");

					// if we are changing ourselves make sure to update the login on the page
					if ($_SESSION['login_to_edit'] == $this->ldata['login']) {
						View::assign('ldata', ($this->ldata=Login::refresh($email)) );
					}
					unset($_SESSION['login_to_edit']);
					$this->loginlist();
					return;
				} else {
					View::assign('error',"Error updating login for $email: ".$this->u->err());
				}
			}
		} else {
			// if we are setting up the form remember who we logged in as 
			$_SESSION['login_to_edit'] = $email;
		}
		$this->input = $this->u->getone($email);
		View::wrap('orglogin.tpl');
	}

	protected function logindelete() {
		if ($_REQUEST['email'] == $this->ldata['login']) {
			View::assign('error',"Sorry, you cannot delete yourself.");
		} else {
			if (!$this->u->del($_REQUEST['email'])) {
				View::assign('error',"Error deleting login {$_REQUEST['email']}!");
			} else {
				View::assign('topmsg',"Login {$_REQUEST['email']} deleted");
			}
		}
		$this->loginlist();
	}

	protected function loginlist() {
		$orglogins = $this->u->getall(array(
			"where user_type='organization' and external_key='%u' order by email",
			$this->ldata['details']['organizationID']
		));
		View::assign('orglogins', $orglogins);
		View::wrap('orglogins.tpl');
	}

	protected function edit() {
		$ldata = Login::check();
		if (!$ldata) 
			$error = "you must be logged in to edit an organization";
		else if ($ldata['user_type'] != 'organization') 
			$error = "you are not allowed to edit organization data!";
		else if ($ldata['login'] != $ldata['details']['contact_email'])
			$error = "only the organization contact can edit organization data.";

		if ($error) {
			View::assign('error',$error);
			View::wrap('organization.tpl');
			return;
		}

                if ($this->actions[2] == 'save') {
			if (!$this->u->getone($_REQUEST['contact_email'])) {
				View::assign('error',
					"No login for {$_REQUEST['contact_email']}. ".
					"Make login before updating contact."
				);
			} else if (!$this->o->upd($ldata['external_key'],$_REQUEST)) {
                                View::assign('error',"Profile update failed: ".$this->o->err());
                        }
                }

                View::assign('action','edit');
		View::assign('ldata',Login::refresh($_REQUEST['contact_email']));
                $this->input = $this->o->getone($ldata['external_key']);
                View::wrap('organizationsignup.tpl');

	}

	protected function signup() {
                if ($this->actions[1] == 'signup') {
                        View::wrap('organizationsignup.tpl');
                        return;
                }
		$orgs = $this->o->getall(array("where name='%s'", $_REQUEST['name']));
		if ($orgs) {
                        View::assign('error', "An organization named {$_REQUEST['name']} already exists!");
                        View::wrap('organizationsignup.tpl');
                        return;
		}
                $this->input = $_REQUEST;
                if ($_REQUEST['password'] != $_REQUEST['confirm_password']) {
                        View::assign('error', "Passwords don't match!");
                        View::wrap('organizationsignup.tpl');
                        return;
                }
                if ($this->o->ins($_REQUEST)) {
                        $_REQUEST['external_key'] = $this->o->getid();
                        $_REQUEST['user_type'] = 'organization';
			$_REQUEST['email'] = $_REQUEST['contact_email'];
                } else {
                        View::assign('error', 'Error adding organization record: '.$this->o->err());
                        View::wrap('organizationsignup.tpl');
                        return;
                }
                if ($this->u->ins($_REQUEST)) {
			View::assign(
				'topmsg',
				'Thank you for signing up. We will contact you shortly with your account activation.'
			);
                        View::wrap('organization.tpl');
                        return;
                } else {
                        View::assign('error', 'Error adding password: '.$this->u->err());
                        View::wrap('organizationsignup.tpl');
                        return;
                }
	}

	protected function mainpage() {
		View::wrap('organization.tpl');
	}

	# other methods
	public function setcalendar() {
		$start = Calendar::startdate();
		$s = new ScheduleModel;
		$ldata = Login::check();
		View::assign('events', $s->calendar($start,$ldata['details']['organizationID']));
		View::assign('calendar', Calendar::fetchmonth('schedule.tpl'));
	}
}

