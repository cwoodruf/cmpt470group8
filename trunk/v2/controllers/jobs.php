<?php
class Jobs extends BaseController {
	public $j;
	public $oid;
	const MAXMSGSIZE = 2000;

	public function execute() {
		$this->ldata = Login::check();

		if ( 
			!preg_match('#^(?:contact|detail|)$#',$this->actions[1]) 
			and $this->ldata['user_type'] != 'organization'
		) { 
			die("you cannot schedule jobs");
		}

		$this->oid = $this->ldata['details']['organizationID'];
		$this->j = new JobModel;

		$this->doable(array(
			'add' => 'add',
			'save' => 'save',
			'edit' => 'edit',
			'detail' => 'detail',
			'contact' => 'contactform',
			'confirmdel' => 'confirmdel',
			'delete' => 'del',
			'default' => 'mainpage',
		));
		$this->doaction($this->actions[1]);
	}

	protected function contactform() {
		$job = $this->j->jobdetail($_SESSION['jobID']);
		if (!$job) {
			View::assign('error',"Can't make contact form: no job info available!");
			$s = new Search($this->actions);
			$s->execute();
			return;
		} 
		if ($this->actions[2] == 'send') {
			if (!Check::isemail($_REQUEST['email'])) 
				$errors[] = "Invalid email";
			if ($_REQUEST['email'] != $_REQUEST['confirm_email']) 
				$errors[] = "Emails don't match";
			if (strlen($_REQUEST['message']) > self::MAXMSGSIZE) 
				$errors[] = "Message too long";
			if (strlen($_REQUEST['message']) == 0) 
				$errors[] = "Message too short";

			if ($errors) {
				View::assign('error',implode("<br>\n",$errors));
			} else {
				// normally we'd actually send something at this point
				View::assign('topmsg',"Sent email");
				$this->detail($job);
				return;
			}
		}
		$this->input = $_REQUEST;
		View::assign('job',$job);
		View::assign('maxmsgsize',self::MAXMSGSIZE);
		View::wrap('jobcontact.tpl');
	}

	protected function add() {
		View::assign('this',$this);
		View::wrap('job.tpl');
	}

	protected function save() {
		$oid = $this->ldata['details']['organizationID'];
		if (!Check::digits($oid)) die("invalid organization id");

		$_REQUEST['organizationID'] = $oid;
		$_REQUEST['created'] = date('Y-m-d');
		if (!$this->j->ins($_REQUEST)) {
			View::assign('error',"error adding job: ".$this->j->err());
			$this->input = $_REQUEST;
			View::wrap('job.tpl');
			return;
		}
		$this->showjobs();
	}

	protected function edit() {
		$jid = $_REQUEST['jobID'];
		$job = $this->j->getone($jid);
		if ($job['organizationID'] != $this->ldata['details']['organizationID']) 
			die("you are not allowed to edit this job!");

		$this->hidden['action[]'] = 'edit';

		if ($this->actions['2'] == 'save') {
			if (!$this->j->upd($jid, $_REQUEST)) 
				die("error updating job: ".$this->j->err().' '.$this->j->query());
			View::assign('job',$this->j->getone($jid));
			View::wrap('jobdetail.tpl');
			return;
		} 

		$this->input = $job;
		$this->setschema();
		View::assign('action','edit');
		View::assign('this',$this);
		View::wrap('job.tpl');
	}

	protected function detail($job=null) {
		if (!$job) $job = $this->j->jobdetail($_REQUEST['jobID']);
		if ($job) {
			$_SESSION['jobID'] = $job['jobID'];
			View::assign('job',$job);
			View::wrap('jobdetail.tpl');
		} else {
			View::assign('error','Job details not found!');
			$s = new Search($this->actions);
			$s->execute();
		}
	}

	protected function confirmdel() {
		$this->input = array(
			'confirm' => "Really delete this job?",
			'action' => "jobs/delete",
			'what' => $_REQUEST['jobID'],
			'submit' => 'delete',
		);
		View::wrap('tools/confirm.tpl');
	}

	protected function del() {
		$this->j->upd($_REQUEST['jobID'],array('visibility_status'=>'hidden'));
		View::assign('topmsg','Job deleted');
		$this->showjobs();
	}

	protected function mainpage() {
		$this->showjobs();
	}

	# other funcs
	protected function setschema() {
		$this->schema = $this->j->schema;
		$this->schema['organizationID']['hide'] = true;
		$this->schema['search_text']['hide'] = true;
		$this->schema['visibility_status']['hide'] = true;
	}

	protected function showjobs() {
		View::assign('jobs',$this->j->ourjobs($this->oid));
		View::wrap('jobs.tpl');
	}

}

