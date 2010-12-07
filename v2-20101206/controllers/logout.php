<?php
/**
 * clears login data on log out and returns to the home page
 */
class Logout extends Controller {
	public function execute() {
		Login::logout();
		if ($this->actions[1] == 'ajax') return;
		$c = new Home(array('home'));
		$c->execute();
	}
}
