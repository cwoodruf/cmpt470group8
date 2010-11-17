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
class Regorganization extends Controller {
	/**
	 * required function for controllers
	 */
	protected $o;
	public function execute() {
		$this->o = new Organization;
		$this->schema = $this->o->schema;		
		
		$this->doable(array(
                        'save' => 'saveOrgInfo',                        
                        'default' => 'scanurl',
                ));
                $this->doaction($this->actions[1]);
		
		//View::assign('list', $this->o->getall());		
		//View::assign('dumpall', View::fetch('tools/dumpall.tpl'));
		View::assign('errors', $_SESSION['regError']);
		unset($_SESSION['regError']);
		View::wrap('regorganization.tpl');
	}
	
	protected function saveOrgInfo(){
		$this->o->ins($_REQUEST);
			
		$newOrg = $this->o->getall('where contact_email = \'' . $_REQUEST['contact_email'] .'\'');
		$_SESSION['organizationID'] = $newOrg['0']['organizationID'];
		$user = new User;
		$user->ins(array(
				'email'=>$_SESSION['email'],
				'password'=>$_SESSION['password'], 
				'user_type'=>$_SESSION['type'],
				'external_key'=>$_SESSION['organizationID'],));
		
		unset($_SESSION['organizationID']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		unset($_SESSION['regError']);
		header("Location: index.php?action=home");
	}
	
	protected function scanurl(){
		View::assign('errors',htmlentities($this->actions[1]));
	}
}
