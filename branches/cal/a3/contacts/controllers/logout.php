<?php
class Logout extends Controller {
	public function execute () {
		Login::logout();
		View::display('tools/login.tpl');
	}
}

