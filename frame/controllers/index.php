<?php
class Index extends Controller {
	const PAGESIZE = 11;

	public function execute() {

		if (!isset($_REQUEST['offset'])) 
			$offset = Entity::getpageid('numbered','offset');
		else 
			$offset = $_REQUEST['offset'];

		$page = Entity::getpage(
			'numbered',
			(new Numbered),
			$offset,
			self::PAGESIZE,
			'order by created desc'
		);

		View::assign('limit',$page['limit']);
		View::assign('howmany',$page['howmany']);
		View::assign('offset',$page['offset']);
		View::assign('notes',$page['rows']);
		View::display('home.tpl');
	}
}

