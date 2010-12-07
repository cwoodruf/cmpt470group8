<?php
function smarty_function_regions($params,&$smarty) {
	$j = new JobModel;
	$ary = $j->searchjobs(
		'',
		array("lower(concat(city,',',country)) as region"),
		($dosearch = false) 
	);
	$regions = array();
	foreach ($ary as $row) {
		if ($row['region'] == ',') continue;
		$regions[] = $row['region'];
	}
	$smarty->assign('regions',$regions);
}
