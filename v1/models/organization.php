<?php
class Organization extends OrganizationEntity{
	public function __construct() {
		parent::__construct();
		// the 'Check' key tells the model to look for a static method in the 'Check' class
		$this->schema['contact_email']['checker']['Check'] = 'isemail';
		
		
	    }
	
}
