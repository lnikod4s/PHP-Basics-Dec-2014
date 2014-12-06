<?php
	$input = ["hello", 15, 1.234, array(1,2,3), (object)[2,34]];
	foreach ($input as $item) {
		if (is_numeric($item)) {
			var_dump($item).PHP_EOL;
		} else {
			echo gettype($item).PHP_EOL;
		}
}
?>
 