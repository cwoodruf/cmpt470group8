<?php
class Schedule extends BaseController {
	public $s;
	public $v;
	public $j;
	public $o;
	public $day;
	public $editaction;

	public function execute() {
		$this->ldata = Login::check();
		if (!$this->ldata) die("you are not logged in!");
		if ($this->ldata['user_type'] != 'organization')
			die("you do not have permission to edit schedules!");

		$this->day = $this->actions[1];
		if (!Check::isdate($this->day)) unset($this->day);

		$this->s = new ScheduleModel;
		$this->u = new User;
		$this->v = new VolunteerModel;
		$this->o = new OrganizationModel;
		$this->j = new JobModel;

		$this->doable(array(
			'dayevents' => 'dayevents',
			'editevent' => 'editevent',
			'addevent' => 'addevent',
			'delevent' => 'delevent',
			'default' => 'dayevents',
		));
		$this->doaction($this->actions['2']);
	}

	protected function editevent() {
		list($event,$key,$eventid) = $this->getevent();
		if ($this->actions['3'] == 'save') {
			if (is_array($event)) {
				$job = $this->j->getone($_REQUEST['jobID']);
				if (!$job) 
					$errors[] = "error finding job for {$_REQUEST['jobID']}!";
				if ($job['organizationID'] != $this->ldata['details']['organizationID'])
					$errors[] = "this job belongs to another organization!";
				$event['jobID'] = $job['jobID'];

				$vol = $this->u->getone($_REQUEST['email']);
				if (!$vol) 
					$errors[] = "can't find volunteer for {$_REQUEST['email']}!";
				if ($vol['user_type'] != 'volunteer') 
					$errors[] = "{$_REQUEST['email']} is not a volunteer!";

				$event['volunteerID'] = $vol['external_key'];
				$event['job_date'] = $this->day;
				$event['start'] = $this->mkstart($_REQUEST['starttime']);

				$event['hours'] = $this->gethours($_REQUEST['hours']);
				$event['hours_worked'] = $this->gethours($_REQUEST['hours_worked']);

				$eventid = $this->mkeventid($event);

				if (count($errors)) {
					View::assign('error', implode("<br>",$errors));
				} else if ($this->s->upd($key,$event)) {
					View::assign('topmsg',"Updated event");
				} else {
					View::assign('error',"Error updating");
				}
			} else {
				View::assign('error',"Could not find event $eventid to update - aborting!");
			}
		}
		$vol = $this->v->getone($event['volunteerID']);
		$event['email'] = $vol['email'];
		$event['starttime'] = preg_replace('#.* (\d\d:\d\d).*#', "$1", $event['start']);
		View::assign('eventid',$eventid);
		View::assign('event',$event);
		$this->editaction = 'editevent';
		$this->dayevents();
	}

	protected function addevent() {
		if (!Check::isdate($this->day)) die("missing date!");

		$job = $this->j->getone($_REQUEST['jobID']);
		if (!$job) 
			$errors[] = "Could not find job!";
		
		if ($job['organizationID'] != $this->ldata['details']['organizationID'])
			die("you are not allowed to schedule this job!");
			

		$vol = $this->v->live($_REQUEST['email']);
		if (!$vol) 
			$errors[] = "No volunteer found";
		if ($vol['user_type'] != 'volunteer') 
			$errors[] = "{$_REQUEST['email']} is not a volunteer";
		if (!Check::digits($vol['external_key'])) 
			$errors[] = "{$_REQUEST['email']} missing volunteer id #";

		if (is_array($errors)) {
			View::assign('error',join("<br>\n", $errors));
		} else {

			$hours = $this->gethours($_REQUEST['hours']);
			$start = $this->mkstart($_REQUEST['starttime']);

			$ok = $this->s->ins(array(
				'volunteerID' => $vol['external_key'],
				'jobID' => $job['jobID'],
				'job_date' => $this->day,
				'start' => $start,
				'hours' => $hours,
			));
			if (!$ok) die("error saving event: ".$this->s->err().' '.$this->s->query());
		}
		$this->editaction = 'addevent';
		$this->dayevents();
	}

	protected function delevent() {
		list($event,$key,$eventid) = $this->getevent();

		if (!$event) 
			$error = "no event to delete!";
		else if ($event['hours_worked'] > 0) 
			$error = "can't delete an event with recorded hours";

		if ($error) {
			View::assign('error',$error);
		} else {
			$this->s->del($key);
		}

		$this->dayevents();
	}

	protected function dayevents() {
		View::assign(
			'events',
			$this->s->dayevents(
				$this->day,
				$this->ldata['details']['organizationID']
			)
		);

		View::assign(
			'jobs',
			$this->j->ourjobs($this->ldata['details']['organizationID'])
		);

		if ($this->editaction) View::assign('action',$this->editaction);
		else View::assign('action','addevent');

		View::wrap('dayevents.tpl');
	}

	# other functions
	protected function getevent() {
		if (!preg_match(
			'#what:(\d+),who:(\d+),when:(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})#',
			$_REQUEST['eventid'],$m)
		) return;
		$key = array(
			'jobID' => $m[1],
			'volunteerID' => $m[2],
			'start' => $m[3],
		);
		$event = $this->s->getone($key);
		$vol = $this->v->getone($event['volunteerID']);
		$event['email'] = $vol['email'];
		return array($event,$key,$_REQUEST['eventid']);
	}

	protected function mkeventid($e) {
		return "what:{$e['jobID']},who:{$e['volunteerID']},when:{$e['start']}";
	}

	protected function mkstart($time) {
		if (preg_match('#(\d{1,2})(:\d{1,2}|)#',$time,$t)) 
			return $this->day.' '.sprintf('%02d:%02d:00',$t[1],$t[2]);
		return $this->day;
	}

	protected function gethours($hours) {
		if ($hours > 0 and $hours < 25) 
			return (int) $hours;
		return 0;
	}

}

