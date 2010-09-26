<?php
print "<html><head><title>PHP test</title></head></body>\n";
print "<h3>PHP test</h3>\n";
foreach ($_SERVER as $name => $value) {
	print "$name = $value<br>\n";
}
print "</body></html>\n";
