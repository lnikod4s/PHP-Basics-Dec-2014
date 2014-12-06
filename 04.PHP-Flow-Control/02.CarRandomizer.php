<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>02.Car Randomizer</title>
	<style>
		table, th, td {
			border: 1px solid black;
			margin: 10px 0 0 50px;
		}

		th, td {
			padding: 6px;
			text-align: center;
		}
	</style>
</head>
<body>
	<form method="post">
		<label for="cars">Enter cars</label>
		<input type="text" name="cars" required="required"/>
		<input type="submit" value="Show results"/>
	</form>
	<?php
		if (isset($_POST['cars'])) :
			$cars = explode (', ', $_POST['cars']);
			$colors = ['red', 'green', 'blue', 'pink', 'orange', 'yellow', 'black'];
	?>
	<table>
		<tr>
			<th>Car</th>
			<th>Color</th>
			<th>Count</th>
		</tr>
		<?php
			foreach ($cars as $car) :
				$quantity = mt_rand (1, 5);
				$color = $colors[array_rand ($colors)];
		?>
		<tr>
			<td><?= $car ?></td>
			<td><?= $color ?></td>
			<td><?= $quantity ?></td>
		</tr>
		<?php
			endforeach;
		?>
	</table>
	<?php
		endif;
	?>
</body>
</html>
 