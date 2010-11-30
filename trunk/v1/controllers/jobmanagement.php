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
class Jobmanagement extends Controller {
	/**
	 * required function for controllers
	 */
	protected $j;
        public function execute() {
                $this->j = new Job;
                $this->schema = $this->j->schema;
               
		$this->doable(array(
                        'save' => 'saveEntry',
                        'new' => ' newEntry',
                        'edit' => 'editEntry',
                        'details' => 'detailView',
                        'delete' => 'confirmdel',
                        'really_delete' => 'deluser',
                        'default' => 'scanurl',
                ));
                $this->doaction($this->actions[1]);                
        }
        
        protected function saveEntry(){
        	$REQUEST['search_text'] = $REQUEST['title'] . " " . $REQUEST['description'] . " " . $REQUEST['requirements'] . " " . $REQUEST['city'];
        	
        	# add a new record to the users table
                if( $this->j->getone($_REQUEST['jobID'])) {
			$this->j->upd($_REQUEST['jobID'], $_REQUEST);
                } else{
			$this->j->ins($_REQUEST);
		}

                unset($_SESSION['job']);
                
                header("Location: index.php?action=jobmanagement/default");
        }
        
        protected function newEntry(){
                View::assign('header', View::fetch('jq_validation.tpl'));                
                View::wrap('job/jobentry.tpl');
        }
        
        protected function editEntry(){
        	/*url should have the jobID in the 3rd action
        	eg: index.php?action=jobmanagement/editEntry/{jobID} */
        	
        	$job = $this->j->getone($this->actions[2]);
                View::assign('name',$job['title']);
                $_SESSION['job'] = $job;
                
                View::assign('header', View::fetch('jq_validation.tpl'));                
                View::wrap('job/jobedit.tpl');
        }
        
        protected function detailView(){
        	$job = $this->j->getone($this->actions[2]);
        	View::assign('jobID', $job['jobID']);
        	View::assign('title', $job['title']);
        	View::assign('time', $job['time']);
        	View::assign('street_address', $job['street_address']);
        	View::assign('city', $job['city']);
        	View::assign('country', $job['country']);
        	View::assign('description', $job['description']);
        	View::assign('url', $job['url']);
        	View::assign('visibility_status', $job['visibility_status']);
        	View::assign('requirements', $job['requirements']);
        	View::assign('created', $job['created']);
        	
        	View::wrap('job/jobdetail.tpl');
        }
        
        protected function confirmdel(){
        	$jobID = $_REQUEST['formkey'];
                # this is input to the confirm.tpl template
                $this->input = array(
                        'confirm' => "Really delete $title?",
                        'action' => "home/really_delete",
                        'what' => $jobID,
                        'submit' => 'delete',
                );
                View::assign('topform',View::fetch('tools/confirm.tpl'));
                View::wrap('job/jobdelete.tpl');
        }
        
        protected function deluser(){
        	$jobID = $_REQUEST['what'];
                $this->j->del($jobID);
                View::assign('confirm',"Deleted $jobID");
                View::assign('topform',View::fetch('tools/confirm.tpl'));
                View::wrap('job/jobdelete.tpl');
        }
        
        protected function scanurl(){
        	View::assign('name',htmlentities($this->actions[1]));
                View::assign('question',htmlentities($this->actions[2]));
                
                # get every record and add it to an array $list used by the tools/dumpall.tpl template
                View::assign('list',$this->j->getall());

                # make a new template variable $dumpall with an html list of all users
                //View::assign('dumpall',View::fetch('tools/dumpall.tpl'));

                View::wrap('job/joblist.tpl');
                
        }
        
              
        
}
