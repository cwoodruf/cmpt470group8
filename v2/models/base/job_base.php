<?php
# automatically generated by makeclasses.php

class JobEntity extends Entity {
	function __construct() {
		parent::__construct(
			Myv1DB::$db, 
			# $this->schema: for building forms among other things
			array ( 
				'jobID' => array ( 'type' => 'int', 'size' => 11, 'key' => true, 'auto' => 1, ), 
				'organizationID' => array ( 'type' => 'int', 'size' => 11, ), 
				'search_text' => array ( 'type' => 'varchar', 'size' => 255, ), 
				'title' => array ( 'type' => 'varchar', 'size' => 64, ), 
				'time' => array ( 'type' => 'varchar', 'size' => 20, ), 
				'street_address' => array ( 'type' => 'varchar', 'size' => 255, ), 
				'city' => array ( 'type' => 'varchar', 'size' => 64, ), 
				'country' => array ( 'type' => 'varchar', 'size' => 32, ), 
				'description' => array ( 'type' => 'text', ), 
				'url' => array ( 'type' => 'varchar', 'size' => 128, ), 
				'visibility_status' => array ( 'type' => 'varchar', 'size' => 32, ), 
				'requirements' => array ( 'type' => 'text', ), 
				'created' => array ( 'type' => 'date', ), 
			),
			'Job'
		);
	}

}
