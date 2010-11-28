<?php
/**
 * add <br /> to line endings
 */
function smarty_modifier_addbrs($input) {
	return preg_replace('#\n#',"<br>\n",$input);
}

