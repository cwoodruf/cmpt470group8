<?php
/**
 * root controller for all other controllers
 * does at least the job of setting the login data $ldata for use in templates
 */
class BaseController extends Controller {
	public $ldata;
	public function __construct($actions=null) {
		parent::__construct($actions);
		$ldata = Login::check();
		View::assign('ldata',$ldata);
	}
}

