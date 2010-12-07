<?php
/**
 * model for the Job table
 */
class JobModel extends JobEntity {
	public function __construct() {
		parent::__construct();
		$this->schema['title']['checker']['Check'] = 'notempty';
		$this->schema['description']['checker']['Check'] = 'notempty';
		$this->schema['city']['checker']['Check'] = 'notempty';
	}

	public function jobdetail($jobID) {
		try {
			$this->run(
				"select Job.*,Organization.name as orgname ".
				"from Job join Organization on (Job.organizationID=Organization.organizationID) ".
				"where jobID='%u'",
				$jobID
			);
			$job = $this->getnext();
			$this->free();
			return $job;

		} catch (Exception $e) {
			$this->err($e);
			if (!QUIET) die($this->err().' '.$this->query());
		}
	}

	public function searchjobs($limit,$fields,$dosearch=true) {
		if ($dosearch) list($search,$region) = $this->getsearch();
		if (is_array($fields)) {
			$fieldstr = implode(',',$fields);
		} else {
			$fieldstr = "jobID,Job.title,Organization.name as orgname,created,".
				"substring(Job.description,1,255) as blurb,city,country ";
		}
		$where = "where (Job.visibility_status not in ('hidden','private') or Job.visibility_status is null) ".
			"and (Organization.visibility_status <> 'hidden' or Organization.visibility_status is null) ";
		$query = "select distinct $fieldstr ".
			"from Job join Organization on (Job.organizationID=Organization.organizationID) ".
			$where;
		$orderby = "order by created desc, city, country, Organization.name, title $limit ";
		try {
			if ($search or $region) {
				if ($search) {
					$search = strtolower($search);
					$searchpat = $search; # or is confusing: # preg_replace('#\s+#','|',$search);
				}
				else $searchpat = ".";

				if ($region) $region = strtolower("%$region%");
				else $region = "%%";

				$this->run(
					$query.
					"and (lower(concat(title,Job.description,Organization.name)) regexp '%s') ".
				        "and (lower(concat(city,',',country)) like '%s') ".
					$orderby,
					$searchpat, $region
				);
			} else {
				$this->run($query.$orderby);
			}
			return $this->resultarray();

		} catch (Exception $e) {
			$this->err($e);
			return false;
		}
	}

	public function getsearch() {
		@session_start();
		if (!isset($_REQUEST['search'])) {
			$search = $_SESSION['search'];
		} else {
			$search = $_REQUEST['search'];
		}
		if (!isset($_REQUEST['region'])) {
			$region = $_SESSION['region'];
		} else {
			$region = $_REQUEST['region'];
		}
		if (isset($search)) $_SESSION['search'] = $search;
		if (isset($region)) $_SESSION['region'] = $region;
		return array($search,$region);
	}

	/*
	 * jobs for an organization
	 */
	public function ourjobs($oid) {
		return $this->getall(
			array(
				"where organizationID=%u order by jobID desc", $oid
			),
			array('jobID','title','visibility_status')
		);
	}

	/*
	 * jobs for a volunteer
	 */
	public function myjobs($vid) {
	}
}

