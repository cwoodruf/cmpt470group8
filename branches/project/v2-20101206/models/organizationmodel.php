<?php
/**
 * model for the Organization table
 */
class OrganizationModel extends OrganizationEntity {
	public function __construct() {
		parent::__construct();
		$this->schema['contact_name_first']['checker']['Check'] = 'notempty';
		$this->schema['contact_name_last']['checker']['Check'] = 'notempty';
		$this->schema['contact_phone']['checker']['Check'] = 'isphone';
		$this->schema['contact_email']['checker']['Check'] = 'isemail';

		$this->schema['name']['checker']['Check'] = 'notempty';
		$this->schema['address']['checker']['Check'] = 'notempty';
		$this->schema['description']['checker']['Check'] = 'notempty';
	}

        public function hide($tohide) {
                try {
                        $this->run(
                                "update Organization set visibility_status=''"
                        );
                        foreach ($tohide as $vid => $status) {
                                if (!$status) continue;
                                if (!$this->upd($vid, array('visibility_status' => $status)))
                                        throw new Exception("Error updating Organization $vid: ".$this->dberr());
                        }
                        return true;

                } catch (Exception $e) {
                        $this->err($e);
                        if (!QUIET) die($this->err().' '.$this-query());
                        return false;
                }
        }
}

