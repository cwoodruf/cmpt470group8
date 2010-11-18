<?php
class User extends LoginEntity{
	public function __construct() {
		parent::__construct();
		// the 'Check' key tells the model to look for a static method in the 'Check' class
		$this->schema['email']['checker']['Check'] = 'isemail';
		
	    }	
}
