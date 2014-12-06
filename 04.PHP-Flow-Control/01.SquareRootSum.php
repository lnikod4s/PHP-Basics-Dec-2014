<!DOCTYPE html>
<html>
<head>
	<title>01.Square Root Sum</title>
	<meta charset="UTF-8">
	<style>
		table, th, td {
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<th>Number</th>
			<th>Square</th>
		</tr>
		<?php
			$total = 0;
			for ($i = 0; $i <= 100; $i += 2) {
				$root = round(sqrt($i), 2);
				echo "<tr><td>$i</td><td>$root</td></tr>";
				$total += $root;
			}
		?>
		<tr>
			<td><strong>Total:</strong></td>
			<td><?=$total?></td>
		</tr>
	</table>
</body>
</html>
 