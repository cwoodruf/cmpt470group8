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
			View::display('restricted.tpl');
		} else {
			View::display('login.tpl');
		}
	}
}

