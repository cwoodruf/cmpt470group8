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
			$start = Calendar::startdate();
			// optionally add data for the calendar
			// $events = some data keyed by date that can be inserted into a calendar
			// View::assign('events',$events);
			# this will check for date input independently
			Calendar::showmonth();
			break;
		# list of days / events similar to a daytimer
		case 'list':
		default:
			View::assign('topmsg',"ERROR: don't know calendar &quot;".htmlentities($calendar)."&quot;!");
			View::display(HOMETPL);
			exit;
		}
	}

}
