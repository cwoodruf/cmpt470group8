<?php
/**
 * mainly for showing static pages
 */
class Misc extends BaseController {
	public function execute() {
		$this->doable(array(
			'contactus' => 'contactus',
			'contact' => 'contactus',
		));
		$this->doaction($this->actions[1]);
	}
	public function contactus() {
		View::wrap('contactus.tpl');
	}
}

