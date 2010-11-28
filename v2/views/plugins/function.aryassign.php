<?php
/**
 * assign a group of template vars from an array if it exists
 */
function smarty_function_aryassign($params,&$smarty) {
	$ary = $params['ary'];
	if (!is_array($ary)) return;
	foreach (explode(',', $params['keys']) as $key) {
		if (isset($ary[$key])) {
			$smarty->assign($key, $ary[$key]);
		}
	}
}

