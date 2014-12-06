<?php
	function getSundays($y, $m)
	{
		return new DatePeriod(
			new DateTime("first sunday of $y-$m"),
			DateInterval::createFromDateString('7 days'),
			new DateTime("next month $y-$m-01")
		);
	}
	foreach (getSundays(2014, 11) as $sunday) {
		echo $sunday->format("jS F, Y").PHP_EOL;
	}
?>
 