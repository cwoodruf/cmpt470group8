<?php
/**
 * manage paging search results and processing the search form
 */
class Search extends BaseController {
	public function execute() {
                # use the remembered state to get the correct page
                if (!isset($_REQUEST['offset']))
                        $offset = Entity::getpageid('jobsearch','offset');
                else
                        $offset = $_REQUEST['offset'];

		if ($_REQUEST['newsearch'] or $this->actions[1] == 'clear') {
			$clean = true;
			Entity::delpageid('jobsearch');
			$offset = 0;
		}
		if ($this->actions[1] == 'clear') {
			unset($_SESSION['search']);
			unset($_SESSION['region']);
			unset($_REQUEST['search']);
			unset($_REQUEST['region']);
		}

		list($search,$region) = Run::me('JobModel','getsearch');
		View::assign('search',$search);
		View::assign('region',$region);
		
                # how to get a page of records from the db
                $page = Entity::getpage(
                        'jobsearch',
                        (new JobModel),
                        $offset,
                        8,
                        'searchjobs'
                );
		if ($clean) {
			$page['howmany'] = Entity::setpageidhowmany('jobsearch');
		}

                # these are needed by the pagerlinks plugin 
                View::assign('limit',$page['limit']);
                View::assign('howmany',$page['howmany']);
                View::assign('offset',$page['offset']);
                View::assign('jobs',$page['rows']);
		View::wrap('searchresults.tpl');
	}
}

