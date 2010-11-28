<?php
class BaseController extends Controller {
	public $ldata;
	public function __construct($actions=null) {
		parent::__construct($actions);
		$ldata = Login::check();
		View::assign('ldata',$ldata);
	}
}

