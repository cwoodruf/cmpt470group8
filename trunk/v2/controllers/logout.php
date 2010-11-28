<?php
class Logout extends Controller {
	public function execute() {
		Login::logout();
		if ($this->actions[1] == 'ajax') return;
		$c = new Home(array('home'));
		$c->execute;
	}
}
