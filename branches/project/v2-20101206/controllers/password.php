<?php
/**
 * class for password recovery
 */
class Password extends BaseController {

	public $adminemail = ADMINEMAIL;
	public $sitelink = SITELINK;

	public function execute() {
		$this->doable(array(
			'recover' => 'recoverform',
			'reenter' => 'reenterform',
			'confirm' => 'confirmpage',
			'default' => 'mainpage',
		));
		$this->doaction($this->actions[1]);
	}

	protected function recoverform() {
		if ($this->actions[2] == 'send') {
			if (!Check::isemail($_REQUEST['email'])) {
				$errors[] = "invalid email!";
			}
			if ($_REQUEST['email'] != $_REQUEST['confirm_email']) {
				$errors[] = "emails do not match!";
			}
			if (count($errors)) { 
				View::assign('error',implode("<br>\n", $errors));
			} else {
				$this->sendpwlink($_REQUEST['email']);
				$this->input = array(
					'confirm' => 'Please check your email for a link to create a new password'
				);
				View::wrap('tools/confirm.tpl');
				return;
			}
		}
		View::wrap('pwrecover.tpl');
	}

	protected function reenterform() {
		if ($this->actions[2] == 'save') {
			if (!Check::validpassword($_REQUEST['password'])) {
				$errors[] = "password should be at least 6 characters!";
			}
			if ($_REQUEST['password'] != $_REQUEST['confirm_password']) {
				$errors[] = "passwords do not match!";
			}
			if (count($errors)) { 
				View::assign('error',implode("<br>\n", $errors));
			} else {
				$u = new User;
				$login = $u->pwlogin($_REQUEST['key']);
				if (
					is_array($login) 
					and $_REQUEST['email'] 
					and $login['email'] == $_REQUEST['email']
				) {
					if ($u->upd($login['email'],array('password' => $_REQUEST['password']))) 
						$confirm = "Thank you. Your password has been saved.";
					else 
						$confirm = "Error saving password: ".$u->err();
					$u->upd($login['email'], array('confirmkey' => ''));
				} else {
					$confirm = "Error: could not find account associated with this key!";
				}
				$this->input = array( 'confirm' => $confirm );
				View::wrap('tools/confirm.tpl');
				return;
			}
		}
		View::wrap('pwreenter.tpl');
	}

	protected function confirmpage() {
		$u = new User;
		$login = $u->pwlogin($_REQUEST['key']);
		if (is_array($login)) {
			$u->confirm($login);
			$this->input = array(
				'confirm' => 'Thank you. Your account has been confirmed.',
			);
		} else {
			$this->input = array(
				'confirm' => 'Error: confirmation link invalid or expired.',
			);
		}
		View::wrap('tools/confirm.tpl');
	}

	protected function mainpage() {
		View::wrap('home.tpl');
	}

	// other functions
	/**
	 * send a new password link to the user
	 */
	protected function sendpwlink($email) {
		$u = new User;
		$pwkey = $u->pwkey($email);
		$msg = <<<TXT
Click on the following link to change your password:
{$this->sitelink}?action=password/reenter&key=$pwkey

Thank you

VolunteerOne

If you have received this message in error please contact:
{$this->adminemail}

TXT;
		$msg = preg_replace("#\n#","\r\n",$msg);
		return mail($email,"Message from VolunteerOne", $msg);
	}
}

