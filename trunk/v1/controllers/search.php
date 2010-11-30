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
class Search extends Controller {
	/**
	 * required function for controllers
	 */
	protected $j;
        public function execute() {
                $this->j = new Job;
                $this->schema = $this->j->schema;
               
		$this->doable(array(                       
                        'details' => 'detailView',
                        'default' => 'scanurl',
                ));
                $this->doaction($this->actions[1]);                
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
        	
        	View::wrap('search/jobdetail.tpl');        
        }
        
        protected function scanurl(){
        	$loggedIn = false;
        	$hasSearch = false;
        	$searchParam;
        	
        	if($_REQUEST['query']){
        		$hasSearch = true;
        		$searchParam = $_REQUEST['query'];
        	}
        	
        	//change coditions for variable holding login boolean
        	if(true){
        		$loggedIn = true;
        	}
        	
        	$searchString = 'SELECT o.name,j.jobID, j.title, j.city, j.created ';        		
        	$searchString .= 'FROM Job j, Organization o ';
        	$searchString .= 'WHERE j.organizationID = o.organizationID AND DATEDIFF(NOW(), j.created)<= 180 ';
        	$searchOrderBy = 'ORDER BY j.created ';
        	        	
        	if($loggedIn){
        		$searchString .= 'AND ( j.visibility_status LIKE \'public\' OR j.visibility_status LIKE \'private\') ';
        		if($hasSearch){
        			$searchString .= 'AND j.search_text LIKE \'%%%s%%\' ';
        			
        			$searchString .= $searchOrderBy;
				$this->j->run($searchString, $searchParam); 
        		}else{        			
        			$searchString .= $searchOrderBy;
        			$this->j->run($searchString);
        		}
        	}else{
        		$searchString .= ' AND j.visibility_status LIKE \'public\' ';
        		if(hasSearch){     
        			$searchString .= 'AND j.search_text LIKE \'%' . $searchParam .'%\'';
        			$searchString .= $searchOrderBy;
        			$this->j->run($searchString, $searchParam);
        		}else{
        			$searchString .= $searchOrderBy;
        			$this->j->run($searchString);
        		}        	
        	}
        	
              		
        	View::assign('list',$this->j->resultarray());	
        	
        	View::assign('name', htmlentities($this->actions[1]));
                View::assign('question',htmlentities($this->actions[2]));
                
                
                View::wrap('search/list.tpl');
                
        }
        
              
        
}
