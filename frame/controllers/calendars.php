<?php
/**
 * Display various calendars
 */
class Calendars extends Controller {
	public function execute() {
		$this->calendar = $this->actions[1];

		switch ($this->calendar) {
		# typical one page grid calendar layout
		case 'month':
			$this->setdates();
			View::assign('weeks', range(0,5));
			foreach (array('Mon','Tue','Wed','Thu','Fri','Sat','Sun') as $d) {
				$days[++$dow] = $d;
			}
			View::assign('days', $days);
			break;
		# list of days / events similar to a daytimer
		case 'list':
		default:
			View::assign('topmsg',"ERROR: don't know calendar &quot;".htmlentities($calendar)."&quot;!");
			View::display('home.tpl');
			exit;
		}
		View::assign('calendar',$this->calendar);
		View::display("calendar.tpl");
	}

	private function setdates() {
		$this->startdate = $this->startdate();
		$this->first = preg_replace('#-\d+$#','-01',$this->startdate);
		$this->firstepoch = strtotime($this->first);
		$this->startepoch = strtotime($this->startdate);
		$this->prevdate = date('Y-m-d',strtotime("{$this->startdate} - 1 month"));
		$this->nextdate = date('Y-m-d',strtotime("{$this->startdate} + 1 month"));
		View::assign('prevdate',$this->prevdate);
		View::assign('nextdate',$this->nextdate);
		View::assign('startday',date('j',$this->startepoch));
		View::assign('startdate',$this->startdate);
		View::assign('eom', ($eom = date('t',$this->startepoch)));
		View::assign('enddate', preg_replace('#-\d+$#',"-$eom",$this->startdate));
		View::assign('firstdow', date('N',$this->firstepoch));
		View::assign('mon', date('m',$this->startepoch));
		View::assign('month', date('F',$this->startepoch));
		View::assign('year', date('Y',$this->startepoch));
	}

	private function startdate() {
		$date = $_REQUEST['startdate'];
		if (!Check::isdate($date)) {
			$date = sprintf(
				'%04d-%02d-%02d',
				$_REQUEST['Date_Year'],
				$_REQUEST['Date_Month'],
				$_REQUEST['Date_Day']
			);
		}
		if (!Check::isdate($date)) $date = date('Y-m-d');
		return $date;
	}
}
