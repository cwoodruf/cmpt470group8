<?php
/**
 * add http:// to the start of a url and other related touch ups
 */
function smarty_modifier_fixurl($url) {
	if (preg_match('#^https?://#',$url)) return htmlentities($url);
	return htmlentities("http://".$url);
}

