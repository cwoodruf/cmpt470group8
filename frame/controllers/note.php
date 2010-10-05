<?php
/**
 * basic note display
 */
class Note extends Controller {
	public function execute() {
		View::assign('note',Run::cached('Numbered','getone',$_REQUEST['numbered_id']));
		View::display('note.tpl');
	}
}

