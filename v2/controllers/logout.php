<?php
class Logout extends Controller {
	public function execute() {
		Login::logout();
		$h = new Home($this->actions);
		$h->execute();
	}
}
