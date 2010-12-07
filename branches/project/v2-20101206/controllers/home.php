<?php
/**
 * default controller when there is no action parameter
 * show the static home page for the site
 */
class Home extends BaseController {
	public function execute() {
		View::wrap('home.tpl');
	}
}

