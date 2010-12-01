<?php
class AdminModel extends AdminEntity {

	public function delmany($admins,$exception) {
		if (!is_array($admins)) return;
		foreach ($admins as $aid => $delete) {
			if (!$delete) continue;
			if ($aid == $exception) continue;
			$u = new User;
			$u->del_external_key('admin',$aid);
		}
	}

	public function setperms($perms) {
		try {
			foreach ($perms as $aid => $perm) {
				if ($perm == 'root') $count++;
			}
			if (!$count) throw new Exception("Need at least one root admin!");

			$this->run(
				"update Admin set permissions = ''"
			);
			foreach ($perms as $aid => $perm) {
				if (!$perm) continue;
				if (!$this->upd($aid,array('permissions' => $perm))) {
					throw new Exception(
						"Unable to update Admin permissions for $aid: ".
						$this->dberr()
					);
				}
			}
			return true;

		} catch (Exception $e) {
			$this->err($e);
			if (!QUIET) die($this->err().' '.$this->query());
			return false;
		}
	}

	public function logins() {
		return $this->getall(
			"join Login on (Login.external_key=Admin.adminID and Login.user_type='admin') ".
			"order by Admin.permissions desc, Login.email"
		);
	}
}

