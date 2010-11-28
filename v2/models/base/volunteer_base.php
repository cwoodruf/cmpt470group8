<?php
# automatically generated by makeclasses.php

class VolunteerEntity extends Entity {
	function __construct() {
		parent::__construct(
			Myv1DB::$db, 
			# $this->schema: for building forms among other things
			array ( 
				'volunteerID' => array ( 'type' => 'int', 'size' => 11, 'key' => true, 'auto' => 1, ), 
				'name_first' => array ( 'type' => 'varchar', 'size' => 64, ), 
				'name_last' => array ( 'type' => 'varchar', 'size' => 63, ), 
				'phone' => array ( 'type' => 'varchar', 'size' => 32, ), 
				'email' => array ( 'type' => 'varchar', 'size' => 128, ), 
				'visibility_status' => array ( 'type' => 'varchar', 'size' => 32, ), 
			),
			'Volunteer'
		);
	}

}
