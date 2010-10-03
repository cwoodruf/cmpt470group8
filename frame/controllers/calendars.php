<?php
/**
 * Display various calendars
 */
class Calendars extends Controller {
	public function execute() {
		$calendar = $this->actions[1];
		switch ($calendar) {
		case 'month':
			View::assign('eom', date('t'));
			View::assign('startdow', date('N',mktime(0,0,0,date('n'),1,date('Y'))));
			View::assign('month', date('F'));
			View::assign('year', date('Y'));
			View::assign('weeks', range(0,5));
			$dow == 0;
			foreach (array('Sun','Mon','Tue','Wed','Thu','Fri','Sat') as $d) {
				$days[$dow++] = $d;
			}
			View::assign('days', $days);
			break;
		default:
			View::assign('topmsg',"ERROR: don't know calendar &quot;".htmlentities($calendar)."&quot;!");
			View::display('home.tpl');
			exit;
		}
		View::assign('calendar',$calendar);
		View::display("calendar.tpl");
	}
}
