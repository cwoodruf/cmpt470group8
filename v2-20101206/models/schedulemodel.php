<?php
/**
 * model for the Schedule table
 * Schedule is only meaningful joined to Organization and Job 
 */
class ScheduleModel extends ScheduleRelation {

	/**
	 * get the schedule for a volunteer - only gets the future schedule
	 * this is displayed on the volunteer dashboard
	 */
	public function getsched($volID) {
		try {
			if (!Check::digits($volID)) 
				throw new Exception("Invalid volunteer id!");

			$fields = 'Organization.organizationID,Organization.name,Job.jobID,Job.title,start,hours';

			$this->run(
				"select $fields ".
				"from Organization join Job on (Job.organizationID=Organization.organizationID) ".
				"join Schedule on (Job.jobID = Schedule.jobID) ".
				"where Schedule.volunteerID='%u' ".
				"and start > now() ".
				"order by start ",
				$volID
			);
			return $this->resultarray();

		} catch (Exception $e) {
			$this->err($e);
			if (!QUIET) die($this->err().' '.$this->query());
			return false;
		}
	}

	/**
	 * get the stats for past work done 
	 * similar to schedule except that it only gets data from the past 
	 * where there is a record of work done
	 */
	public function getstats($volID) {
		try {
			if (!Check::digits($volID)) 
				throw new Exception("Invalid volunteer id!");

			$fields = 'Organization.organizationID,Organization.name,Job.jobID,Job.title';

			$this->run(
				"select $fields, ".
				"sum(hours_worked) as worked,min(year(start)) as ystart, max(year(start)) yend ".
				"from Organization join Job on (Job.organizationID=Organization.organizationID) ".
				"join Schedule on (Job.jobID = Schedule.jobID) ".
				"where Schedule.volunteerID='%u' ".
				"group by $fields having worked > 0 ".
				"order by Organization.name,Job.title ",
				$volID
			);
			return $this->resultarray();

		} catch (Exception $e) {
			$this->err($e);
			if (!QUIET) die($this->err().' '.$this->query());
			return false;
		}
	}
	/**
	 * get the events for a given date
	 * used by the schedule detail page
	 */
	public function dayevents($startdate,$oid) {
		return $this->calendar($startdate,$oid,$details=true,$range='day');
	}

	/**
	 * get data to be embedded in the calendar on the Organization Dashboard
	 */
	public function calendar($startdate,$oid,$details=false,$range='month') {
		if (!preg_match('#^(\d{4})-(\d{2})(?:-\d\d|)#',$startdate,$m)) return;
		if ($details) {
			$fields = "date(Schedule.start) as day, Job.title,Volunteer.email,Schedule.*";
		} else {
			$fields = "date(Schedule.start) as day, count(*) as numevents";
			$groupby = "group by day ";
		}
		if ($range == 'month') {
			$year = $m[1];
			$month = $m[2];
			$dates = "and month(start) = '$month' and year(start) = '$year' ";
		} else {
			$dates = "and date(start) = '{$m[0]}' ";
		}
		try {
			$this->run(
				"select $fields ".
				"from Schedule join Job on (Schedule.jobID=Job.jobID) ".
				"join Volunteer on (Volunteer.volunteerID=Schedule.volunteerID) ".
				"join Organization on (Job.organizationID=Organization.organizationID) ".
				"where (hours_worked is null or hours_worked <> -1) ".
				"and Organization.organizationID=%u ".
				$dates.
				$groupby.
				"order by Schedule.start ",
				$oid
			);
			$events = array();
			while ($row = $this->getnext()) {
				if ($details) $events[$row['day']][] = $row;
				else $events[$row['day']] += $row['numevents'];
			}
			$this->free();
			return $events;

		} catch (Exception $e) {
			$this->err($e);
			return false;
		}
	}
}

