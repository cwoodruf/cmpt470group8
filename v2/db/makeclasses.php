<?php
/**
 * makeclasses.php - turn the output of mysql2schema.pl into a set of base classes for oop access to a db
 *
 * external variables: 
 * schemafile - name of file generated by mysql2schema.pl, 
 * modeldir - directory where class files go, 
 * thistable - set if you only want to rebuild one table
 * force - set only if you want to overwrite files
 *
 * one way to run it: php -r '$schemafile = "..."; $modeldir = "..."; require("makeclasses.php");'
 * or use it in a web script
 */

if (!isset($schemafile)) 
	die("you need to define \$schemafile!\n");
if (!isset($modeldir)) 
	die("you need to define \$modeldir!\n");

require($schemafile);

# comment out this file_exists check to overwrite files automatically
if (!$force and file_exists($modeldir)) die("models directory $modeldir exists - aborting!\n");

if (!is_dir($modeldir)) mkdir($modeldir,0777,true);

$dbclass = ucfirst($dbname).'DB';
$dbfile = "$modeldir/$dbname".'_db.php';
$generatedby = '# automatically generated by makeclasses.php';

# if we only want to rebuild one table we truncate schema
if (isset($thistable) and $thistable) {
	$schema = array( $thistable => $schema[$thistable], );

# otherwise make a stub for db login information
} else {
	print "writing $dbfile\n";
	if (($fh = fopen($dbfile,'w')) !== false) {
		$classdef = <<<PHP
<?php
$generatedby

class $dbclass {
	public static \$db = array(
		'db' => '$dbname',
		'host' => '$dbhost',
		'login' => '$myuser',
		'pw' => '$mypw',
	);
}

PHP;
		fwrite($fh,$classdef);
		fclose($fh);

	} else {
		die("can't open $dbfile!");
	}
}

# go through schema and make classes
foreach ($schema as $table => $fields) {
	$class = ucfirst($table);
	$tbschema = indent_var_export(var_export($schema[$table],true),($multiline=true));
	$baseattribs = <<<PHP
	function __construct() {
		parent::__construct(
			$dbclass::\$db, 
			# \$this->schema: for building forms among other things
			$tbschema,
			'$table'
		);
	}

PHP;
	if (isset($schema[$table]['PRIMARY KEY'])) {
		$primarykey = indent_var_export(var_export($schema[$table]['PRIMARY KEY'],true));
		$classdef = <<<PHP
<?php
$generatedby

class {$class}Relation extends Relation {
$baseattribs
}

PHP;
	} else {
		$classdef = <<<PHP
<?php
$generatedby

class {$class}Entity extends Entity {
$baseattribs
}

PHP;
	}
	$classfile = "$modeldir/".strtolower($table)."_base.php";
	print "writing $classfile\n";
	if (($fh = fopen($classfile,'w')) !== false) {
		fwrite($fh,$classdef);
		fclose($fh);
	} else {
		die("can't open $classfile to write!");
	}
}

function indent_var_export($php,$multiline=false) {
	$php = preg_replace("#\s+#m"," ",$php);
	if ($multiline) {
		$php = preg_replace("#('[\w ]+' => array)#","\n\t\t\t\t$1",$php);
		$php = preg_replace("#\)$#","\n\t\t\t)",$php);
	}
	return $php;
}
