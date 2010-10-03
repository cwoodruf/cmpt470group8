<?php
/**
 * basic login creation form - test of formgen scaffold
 */
class Register extends Controller {
	public function execute() {
		$r = new User;
		View::assign('schema',$r->schema);

		switch ($this->actions[1]) {
		case 'save':
			$_REQUEST['password'] = Login::encode($_REQUEST['password']);
			$r->ins($_REQUEST);
			$this->input = $r->getone($_REQUEST['email']);
			$this->input['password'] = '';
			View::assign('topmsg',"saved ".htmlentities($_REQUEST['email']));
			View::display('register.tpl');
			break;
		default:
			View::display('register.tpl');
		}
	}
}

