<?php
$schema = array();

$dbhost = 'localhost';
$dbname = 'myv1';

$schema['Admin'] = array(
	'adminID' => array( 'type' => 'int', 'size' => 11, 'key' => true, 'auto' => 1, ),
	'permissions' => array( 'type' => 'varchar', 'size' => 32, ),
);

$schema['Job'] = array(
	'jobID' => array( 'type' => 'int', 'size' => 11, 'key' => true, 'auto' => 1, ),
	'organizationID' => array( 'type' => 'int', 'size' => 11, ),
	'search_text' => array( 'type' => 'varchar', 'size' => 255, ),
	'title' => array( 'type' => 'varchar', 'size' => 64, ),
	'time' => array( 'type' => 'varchar', 'size' => 20, ),
	'street_address' => array( 'type' => 'varchar', 'size' => 255, ),
	'city' => array( 'type' => 'varchar', 'size' => 64, ),
	'country' => array( 'type' => 'varchar', 'size' => 32, ),
	'description' => array( 'type' => 'text', ),
	'url' => array( 'type' => 'varchar', 'size' => 128, ),
	'visibility_status' => array( 'type' => 'varchar', 'size' => 32, ),
	'requirements' => array( 'type' => 'text', ),
	'created' => array( 'type' => 'date', ),
);

$schema['Login'] = array(
	'email' => array( 'type' => 'varchar', 'size' => 128, 'key' => true, ),
	'password' => array( 'type' => 'varchar', 'size' => 64, ),
	'user_type' => array( 'type' => 'varchar', 'size' => 64, ),
	'external_key' => array( 'type' => 'int', 'size' => 11, ),
	'confirmkey' => array( 'type' => 'varchar', 'size' => 128, ),
);

$schema['Organization'] = array(
	'organizationID' => array( 'type' => 'int', 'size' => 11, 'key' => true, 'auto' => 1, ),
	'name' => array( 'type' => 'varchar', 'size' => 128, ),
	'address' => array( 'type' => 'text', ),
	'contact_name' => array( 'type' => 'varchar', 'size' => 128, ),
	'contact_name_first' => array( 'type' => 'varchar', 'size' => 64, ),
	'contact_name_last' => array( 'type' => 'varchar', 'size' => 64, ),
	'contact_phone' => array( 'type' => 'varchar', 'size' => 32, ),
	'contact_email' => array( 'type' => 'varchar', 'size' => 128, ),
	'url' => array( 'type' => 'varchar', 'size' => 128, ),
	'visibility_status' => array( 'type' => 'varchar', 'size' => 32, ),
	'description' => array( 'type' => 'text', ),
);

$schema['Organization_20101117'] = array(
	'organizationID' => array( 'type' => 'int', 'size' => 11, 'key' => true, 'auto' => 1, ),
	'name' => array( 'type' => 'varchar', 'size' => 128, ),
	'address' => array( 'type' => 'text', ),
	'contact_name' => array( 'type' => 'varchar', 'size' => 128, ),
	'contact_name_first' => array( 'type' => 'varchar', 'size' => 64, ),
	'contact_name_last' => array( 'type' => 'varchar', 'size' => 64, ),
	'contact_phone' => array( 'type' => 'varchar', 'size' => 32, ),
	'contact_email' => array( 'type' => 'varchar', 'size' => 128, ),
	'url' => array( 'type' => 'varchar', 'size' => 128, ),
	'visibility_status' => array( 'type' => 'varchar', 'size' => 32, ),
	'description' => array( 'type' => 'text', ),
	'city' => array( 'type' => 'varchar', 'size' => 32, ),
);

$schema['Schedule'] = array(
	'PRIMARY KEY' => array('jobID' => '', 'volunteerID' => '', 'start' => '', ),
	'jobID' => array( 'type' => 'int', 'size' => 11, ),
	'volunteerID' => array( 'type' => 'int', 'size' => 11, ),
	'job_date' => array( 'type' => 'datetime', 'size' => 20, ),
	'start' => array( 'type' => 'datetime', ),
	'hours' => array( 'type' => 'int', 'size' => 11, ),
	'hours_worked' => array( 'type' => 'int', 'size' => 11, ),
);

$schema['Volunteer'] = array(
	'volunteerID' => array( 'type' => 'int', 'size' => 11, 'key' => true, 'auto' => 1, ),
	'name_first' => array( 'type' => 'varchar', 'size' => 64, ),
	'name_last' => array( 'type' => 'varchar', 'size' => 63, ),
	'phone' => array( 'type' => 'varchar', 'size' => 32, ),
	'email' => array( 'type' => 'varchar', 'size' => 128, ),
	'visibility_status' => array( 'type' => 'varchar', 'size' => 32, ),
);

$schema['pointless'] = array(
	'i' => array( 'type' => 'int', 'size' => 11, 'key' => true, 'auto' => 1, ),
);

