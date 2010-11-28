<?php
class Home extends BaseController {
	public function execute() {
		View::wrap('home.tpl');
	}
}

