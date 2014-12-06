<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>04.Primes In Range</title>
	<style>
		div {
			width: 500px;
			border: 2px solid black;
			padding: 5px;
			margin: 5px;
		}
		span {
			font-weight: bold;
		}
	</style>
</head>
<body>
	<form method="post">
		<label for="start">Starting Index:</label>
		<input type="text" name="start" required="required"/>
		<label for="end">End:</label>
		<input type="text" name="end" required="required"/>
		<input type="submit" value="Submit"/>
	</form>
	<?php
		function isPrime ($num) {
			//1 is not prime. See: http://en.wikipedia.org/wiki/Prime_number#Primality_of_one
			if ($num == 1) {
				return false;
			}
			//2 is prime (the only even number that is prime)
			if ($num == 2) {
				return true;
			}
			/*
			 * if the number is divisible by two, then it's not prime and it's no longer
			 * needed to check other even numbers
			 */
			if ($num % 2 == 0) {
				return false;
			}
			/*
			 * Checks the odd numbers. If any of them is a factor, then it returns false.
			 * The sqrt can be an approximation, hence just for the sake of
			 * security, one rounds it to the next highest integer value.
			 */
			for ($i = 3; $i <= ceil (sqrt ($num)); $i = $i + 2) {
				if ($num % $i == 0) {
					return false;
				}
			}
			return true;
		}
	?>
	<?php
		if (isset($_POST['start']) && isset($_POST['end']) && $_POST['end'] > $_POST['start']) :
	?>
	<div class="framework">
		<?php
			for ($i = $_POST['start']; $i <= $_POST['end']; $i ++) {
				if (isPrime ($i)) {
					echo "<span> $i </span>";
				} else {
					echo $i;
				}
				if ($i != $_POST['end']) {
					echo ", ";
				}
			}
		?>
	</div>
	<?php
		endif;
	?>
</body>
</html>