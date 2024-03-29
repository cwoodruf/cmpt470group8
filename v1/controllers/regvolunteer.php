<?php
/**
 * default controller - customize it
 *
 * you can use the $this->actions array to select which action you want to do
 * use $this->doable(array( ...map of action to callback funcs...));
 * and $this->doaction($this->actions[1]);
 * to handle sub actions such as home/someaction
 *
 * you can display templates with the default smarty view code 
 * View::assign - to assign template variables
 * View::display - display the template
 * View::wrap - display template in a wrapper 
 */
class Regvolunteer extends Controller {
	/**
	 * required function for controllers
	 */
	protected $v;
	public function execute() {
		$this->v = new Volunteer;		
		$this->schema = $this->v->schema;
		
		$this->doable(array(
                        'save' => 'saveVolInfo',                        
                        'default' => 'scanurl',
                ));
                $this->doaction($this->actions[1]);
                
                View::assign('header', View::fetch('jq_validation.tpl'));
		
		//View::assign('list', $this->v->getall());		
		//View::assign('dumpall', View::fetch('tools/dumpall.tpl'));		
		View::assign('errors', $_SESSION['regError']);
		unset($_SESSION['regError']);
		View::wrap('regvolunteer.tpl');	
	}
	
	protected function saveVolInfo(){
		$_REQUEST['email'] = $_SESSION['email'];		
		$this->v->ins($_REQUEST);
			
		$newVolunteer = $this->v->getall('WHERE email = \'' . $_REQUEST['email'] .'\'');
		$_SESSION['volunteerID'] = $newVolunteer['0']['volunteerID'];
		$user = new User;
		$user->ins(array(
				'email'=>$_SESSION['email'],
				'password'=>$_SESSION['password'], 
				'user_type'=>$_SESSION['type'],
				'external_key'=>$_SESSION['volunteerID'],));
		
		unset($_SESSION['volunteerID']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);	
		header("Location: index.php?action=home");		
	}
	
	protected function scanurl(){
		View::assign('errors',htmlentities($this->actions[1]));
	}
}
