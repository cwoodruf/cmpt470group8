<?php
class Volunteer extends BaseController {
	public $v;
	public function execute() {
		$this->ldata = Login::check();
		$this->v = new VolunteerModel;

		$this->doable(array(
			'signup' => 'signup',
			'save' => 'signup',
			'edit' => 'edit',
			'report' => 'report',
			'default' => 'mainpage',
		));
		$this->doaction($this->actions[1]);
	}
	
	protected function signup() {
		if ($this->actions[1] == 'signup') {
			View::wrap('volunteersignup.tpl');
			return;
		}
		$vol = $this->v->getall(array("where email='%s'",$_REQUEST['email']));
		if ($vol) {
			View::assign('error', "Volunteer {$_REQUEST['email']} already exists!");
			View::wrap('volunteersignup.tpl');
			return;
		}
		$this->input = $_REQUEST;
		if ($_REQUEST['password'] != $_REQUEST['confirm_password']) {
			View::assign('error', "Passwords don't match!");
			View::wrap('volunteersignup.tpl');
			return;
		}
		if ($this->v->ins($_REQUEST)) {
			$_REQUEST['external_key'] = $this->v->getid();
			$_REQUEST['user_type'] = 'volunteer';
		} else {
			View::assign('error', 'Error adding volunteer record: '.$this->v->err());
			View::wrap('volunteersignup.tpl');
			return;
		}
		$u = new User;
		if ($u->ins($_REQUEST)) {
			View::assign('topmsg',"Saved new volunteer {$_REQUEST['email']}");
			$this->mainpage();
			return;
		} else {
			View::assign('error', 'Error adding password: '.$u->err());
			View::wrap('volunteersignup.tpl');
			return;
		}
	}

	protected function edit() {
		if (!$this->ldata) die("you aren't logged in!");
		if ($this->ldata['user_type'] != 'volunteer') die("you aren't a volunteer!");

		View::assign('action','edit');

		if ($this->actions[2] == 'save') {
			if ($this->v->upd($this->ldata['external_key'],$_REQUEST)) {
				if ($_REQUEST['password'] or $this->ldata['email'] != $_REQUEST['email']) {
					$this->input = $_REQUEST;
					if ($_REQUEST['password'] != $_REQUEST['confirm_password']) {
						View::assign('error', "Passwords don't match!");
						View::wrap('volunteersignup.tpl');
						return;
					}
					if (!$_REQUEST['password']) unset($_REQUEST['password']);
					$u = new User;
					if (!$u->upd($this->ldata['email'],$_REQUEST)) {
						View::assign('error', 'Error adding password: '.$u->err());
						View::wrap('volunteersignup.tpl');
						return;
					}
				}
				View::assign('ldata',Login::refresh($_REQUEST['email']));
				$this->mainpage();
				return;
			} else {
				View::assign('error',"Profile update failed!");
			}
		}

		View::assign('action','edit');
		$this->input = $this->v->getone($this->ldata['external_key']);

		View::wrap('volunteersignup.tpl');
	}

	protected function report() {
		View::wrap('report.tpl');
	}

	protected function mainpage() {
		$volID = $this->ldata['details']['volunteerID'];
		if (Check::digits($volID)) {
			$s = new ScheduleModel;
			$stats = $s->getstats($volID);
			$sched = $s->getsched($volID);
			View::assign('stats',$stats);
			View::assign('sched',$sched);
		}
		View::wrap('volunteer.tpl');
	}
}

