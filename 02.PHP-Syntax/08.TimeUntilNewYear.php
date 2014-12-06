<?php
	function getTimeUntilNewYear ($input) {
		$start = new DateTime($input);
		$end = new DateTime('2015-01-01 00:00:00');
		$interval = $end->diff($start);
		$days = $interval->days;
		$hours = $days * 24 + $interval->h;
		$minutes = $hours * 60 + $interval->i;
		$seconds = $minutes * 60 + $interval->s - 1;
		echo 'Hours until new year: ' . $hours.PHP_EOL;
		echo 'Minutes until new year: ' . $minutes.PHP_EOL;
		echo 'Seconds until new year: ' . $seconds.PHP_EOL;
		echo 'Days:Hours:Minutes:Seconds ' . $days . ':' . $interval->h . ':' . $interval->i . ':' . ($interval->s - 1)
				.PHP_EOL;
	}
	getTimeUntilNewYear('12-08-2014 13:07:09');
	getTimeUntilNewYear('12-08-2014 11:08:47');
?>
 