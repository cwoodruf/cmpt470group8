<?php
/**
 * replaces the singleton idea for doing a one-off run of a function
 * saves the created objects for later reuse - though this can be turned off
 * can also cache the results of a function that is run often
 */
class Run {
	public static $o;
	public static $results;
	public static $error;
	/**
	 * if $refresh is set to true caching is turned off
	 */
	public static $refresh = false;
	/**
	 * singleton equivalent: cache the class unless refresh is set
	 * use Run::cache if you want to save the results for reuse
	 */
	public static function me($class,$func,$arg) {
		try {
			if (self::$refresh or !isset($o[$class])) 
				$o[$class] = new $class;
			if (!is_array($arg)) 
				return call_user_func_array(array($o[$class], $func,),array(&$arg));
			return call_user_func_array(array($o[$class], $func,),$arg);

		} catch (Exception $e) {
			self::err($e);
			if (!QUIET) die(self::err());
			return false;
		}
	}
	/**
	 * either run something or return a cached set of results
	 * uses sha1 to make the signature
	 */
	public static function cached($class,$func,$args) {
		$sig = sha1($class.$func.serialize($args));
		if (!self::$refresh and isset($results[$sig])) 
			return $results[$sig];
		$results[$sig] = self::me($class,$func,$args);
		return $results[$sig];
	}
	/**
	 * set or return the last error
	 */
	public static function err($e=null) {
		if (isset($e)) $error = $e->getMessage();
		else return $error;
	}
}

