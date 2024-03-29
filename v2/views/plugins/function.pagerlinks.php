<?php
/**
 * make the next, prev etc links for showing pages of data
 * this just makes an array of links it does not actually display 
 * anything 
 */
function smarty_function_pagerlinks($params,&$smarty) {
	if ($params['howmany'] > 0) $howmany = (int) $params['howmany'];
	else return;
	if ($params['offset'] >= 0) $offset = (int) $params['offset'];
	else return;
	if ($params['limit'] > 0) $limit = (int) $params['limit'];
	else return;
	if ($limit > $howmany) return;

	if ($offset - $limit > 0) $prev = $offset - $limit;
	else $prev = 0;
	if ($offset + $limit > $howmany) $next = $howmany - $limit;
	else $next = $offset + $limit;
	$last = $howmany - ($howmany % $limit);
	if ($last == $howmany) $last -= $limit;

	if ($params['action']) $action = $params['action'];
	else $action = $_REQUEST[ACTION];

	if (is_array($action)) $action = implode('/',$action);
	// you have to add the &amp;s to get the w3c validator to work
	$script = $_SERVER['PHP_SELF']."?action=$action&amp;limit=$limit&amp;";
	if ($params['pagerid']) $script .= "pagerid=".urlencode($params['pagerid']);

	if (strpos($params['options'],'pages') !== false) {
		$pages = array();
		for ($o = 0; $o <= $last; $o += $limit) {
			$pages[$o] = "$script&amp;offset=$o";
		}
	}

	$smarty->assign('pagerlinks', 
		array(
			'first' => "$script&amp;offset=0",
			'last' => "$script&amp;offset=$last",
			'next' => "$script&amp;offset=$next",
			'prev' => "$script&amp;offset=$prev",
			'pages' => $pages,
		)
	);
}

