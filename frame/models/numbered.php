<?php
class Numbered extends NumberedEntity {
	public function __construct() {
		parent::__construct();
		# add any modifications to the schema in NumberedEntity here
		$this->schema['numbered_id']['alt'] = '#';
	}

	# get a chronologically grouped set of events relating to a login
	public function calendar($start,$email) {
		$rawevents = $this->getall(
			array(
				"where created between '%s' - interval 4 week ".
				"and '%s' + interval 4 week ".
				"and email = '%s'", 
				$start,$start,$email,
			)
		);
		$events = array();
		foreach ($rawevents as $event) {
			$edate = preg_replace('# .*#','',$event['created']);
			$id = $event['numbered_id'];
			$events[$edate][$id] = <<<HTML
<a href="?action=restricted&numbered_id=$id">{$event['email']} $id</a>
HTML;
		}
		return $events;
	}
}

