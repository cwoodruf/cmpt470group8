<?php
/**
 * manages processing the login form
 * this login form is not in use right now
 * an embedded form is used instead
 */
class Loginform extends Controller {
	public function execute () {
		$ldata = Login::check();
		# ajaxcheck is the quick check done in the background from the login form
		if ($this->actions[1] == 'ajaxcheck') {
			if (is_array($ldata)) {
				print 'OK';
				exit;
			} else {
				if (!QUIET) print ' Not found / bad password. '; 
				exit;
			}
		}
		if (is_array($ldata)) {
			if ($_SESSION['action']) {
				$_REQUEST['action'] = $_SESSION['action'];
			} else {
				$_REQUEST['action'] = $ldata['user_type'];
			}
			require('index.php');
			return;
		}

		View::wrap('tools/login.tpl');
	}
}

