<?php
class Numbered extends NumberedEntity {
	public function __construct() {
		parent::__construct();
		# add any modifications to the schema in NumberedEntity here
		$this->schema['numbered_id']['alt'] = '#';
	}
}

