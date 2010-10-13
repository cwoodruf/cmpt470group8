<?php
$schema = array();

$dbhost = 'localhost';
$dbname = 'a3_cal';

$schema['contacts'] = array(
	'PRIMARY KEY' => array('email' => '', 'contact_email' => '', ),
	'email' => array( 'type' => 'varchar', 'size' => 128, ),
	'contact_email' => array( 'type' => 'varchar', 'size' => 128, ),
);

$schema['users'] = array(
	'email' => array( 'type' => 'varchar', 'size' => 128, 'key' => true, ),
	'name' => array( 'type' => 'varchar', 'size' => 64, ),
	'notes' => array( 'type' => 'text', ),
);

