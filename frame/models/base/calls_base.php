<?php
# automatically generated by makeclasses.php

class CallsRelation extends Relation {
	function __construct() {
		parent::__construct(
			LifelineDB::$db, 
			# $this->schema: for building forms among other things
			array ( 
				'PRIMARY KEY' => array ( 'box' => '', 'action' => '', 'status' => '', 'message' => '', ), 
				'box' => array ( 'type' => 'varchar', 'size' => 32, ), 
				'call_time' => array ( 'type' => 'datetime', 'size' => 20, ), 
				'action' => array ( 'type' => 'varchar', 'size' => 32, ), 
				'status' => array ( 'type' => 'varchar', 'size' => 32, ), 
				'message' => array ( 'type' => 'text', ), 
				'callerid' => array ( 'type' => 'varchar', 'size' => 64, ), 
				'vid' => array ( 'type' => 'int', 'size' => 11, ), 
				'host' => array ( 'type' => 'varchar', 'size' => 64, ), 
				'callstart' => array ( 'type' => 'double', ), 
			),
			'calls'
		);
	}

}
