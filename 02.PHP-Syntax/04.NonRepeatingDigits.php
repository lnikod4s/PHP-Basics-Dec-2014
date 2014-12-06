<?php
	function nonRepeatingDigits($input) {
		$result = array();
		if ($input <= 102) {
			echo 'no'.PHP_EOL;
			return;
		}
		for ($index = 100; $index <= $input; $index++) {
			if ($index > 999) {
				break;
			}
			$digits = array_map('intval', str_split($index));
			if (count($digits) !== count(array_unique($digits))) {
				continue;
			} else {
				array_push($result, $index);
			}
		}
		echo implode(', ', $result).PHP_EOL;
	}
	nonRepeatingDigits(1234);
	nonRepeatingDigits(145);
	nonRepeatingDigits(15);
	nonRepeatingDigits(247);
?>
