<?php
/**
 * Display various calendars
 */
class Calendars extends BaseController {
	public function execute() {
		$this->calendar = $this->actions[1];

		switch ($this->calendar) {
		# typical one page grid calendar layout
		case 'month':
			$start = Calendar::startdate();
			$events = Run::me('numbered','calendar',$start,'note');
			View::assign('events',$events);
			# this will check for date input independently
			Calendar::showmonth();
			break;
		# list of days / events similar to a daytimer
		case 'list':
		default:
			View::assign('confirm',
				"ERROR: don't know calendar &quot;".htmlentities($this->calendar)."&quot;!");
			View::display('tools/confirm.tpl');
			exit;
		}
	}

}
