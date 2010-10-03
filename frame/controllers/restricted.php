<?php
/**
 * example of a page or set of pages that require login
 */
class Restricted extends Controller {
	public function execute() {

		# $ldata has the user record
		# you can use this info to fine tune the response logic
		# in this case we accept any valid login, if not we display the login form

		if ($ldata = Login::check()) {
			$id = $_REQUEST['numbered_id'];
			$n = new Numbered;
			switch($this->actions[1]) {
			case 'save':
				if (!$id) {
					$n->ins($_REQUEST);
					$id = $n->getid();
				} else {
					$n->upd($id,$_REQUEST);
				}
				if (!$n->err()) View::assign('topmsg',"saved $id");
				break;
			default:
				$this->input['email'] = $ldata['login'];
				$this->input['created'] = date('Y-m-d H:i:s');
			}
			if ($id) $this->input = $n->getone($id);
			View::assign('schema',$n->schema);
			View::display('restricted.tpl');

		} else {
			View::display('login.tpl');
		}
	}
}
