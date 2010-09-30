<?php
# base controller class
class Controller {
	public $actions; # array with first action removed
	public $controller; # string 
	public $input;

	public function __construct($actions=null) {
		View::assign('this',$this);
		$this->controller = strtolower(get_class($this));
		$this->actions = $actions;
	}
	
	# figure out which controller you want to run
	public static function init() {

		if (is_array($_REQUEST['action'])) {
			$actions = $_REQUEST['action'];
		} else {
			$actions = explode("/", $_REQUEST['action']);
		}
		$controller = $actions[0];

		if (!Check::isvar($controller,false)) $controller = DEFCONTROLLER;

		# avoid situations where we repeatedly go back to log in form when we are already logged in
		if ($_SESSION['login'] and !strcasecmp($controller,LOGINCONTROLLER)) {
			$controller = DEFCONTROLLER;
		}

		return array($controller,$actions);
	}

	# restore saved request
	public static function redo() {
		$_REQUEST = $_SESSION['request'];
		include('index.php');
		exit;
	}

	# find a controller - should probably make a path making function
	public function path($controller) {
		return CONTROLLERSDIR."/".strtolower($controller).".php";
	}

	# check for and set up login
	public function login() {
		$ldata = Login::check();
		if (is_array($ldata)) return;

		# this will force a login
		$this->flag('login',true);
		include('index.php');
		exit;
	}

	# flags are a way to provide stateful interprocess communications
	public function flag($flag,$value=null) {
		@session_start();
		if (isset($value)) $_SESSION['flags'][$flag] = $value;
		return $_SESSION['flags'][$flag];
	}

	public function delflag($flag) {
		@session_start();
		$value = $_SESSION['flags'][$flag];
		unset($_SESSION['flags'][$flag]);
		return $value;
	}

	public function delflags() {
		@session_start();
		$flags = $_SESSION['flags'];
		unset($_SESSION['flags']);
		return $flags;
	}

	public function input($field=null) {
		if (!is_array($this->input)) return;
		if (isset($this->input[$field])) return $this->input[$field];
		return $this->input;
	}

	public function css() {
		return View::$css;
	}

	public function js() {
		return View::$js;
	}
	
	public function title($title=null) {
		if (!empty($title)) $this->title = $title;
		if (!isset($this->title)) return get_class($this);
		return $this->title;
	}
}

