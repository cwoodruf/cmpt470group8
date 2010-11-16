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
class Regmain extends Controller {
	/**
	 * required function for controllers
	 */
	
	public function execute() {
				
		$this->doable(array(   
			'next' => 'regRedirect',                   
                        'default' => 'scanurl',
                ));
                $this->doaction($this->actions[1]);
		
		View::assign('name', $_SESSION['email'] . $_SESSION['password'] . $_SESSION['type']);
		
		View::wrap('regmain.tpl');
	}
	
	protected function regRedirect(){
		$_SESSION['email'] = $_REQUEST['email'];
		$_SESSION['password'] = $_REQUEST['password'];
		$_SESSION['type'] = $_REQUEST['type'];
		if($_SESSION['type'] == 'Volunteer'){
			header("Location: index.php?action=regvolunteer");
			return;
		}
		elseif($_SESSION['type'] == 'Organization'){
			header("Location: index.php?action=regorganization");
                        return;
		}else{
			return;
		}
		
				
	}
	
	protected function scanurl(){
		View::assign('name',htmlentities($this->actions[1]));
		View::assign('question',htmlentities($this->actions[2]));
	}
	
	
	
}

