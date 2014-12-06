<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>03.Annual Expenses</title>
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
		<label for="years">Enter number of years</label>
		<input type="text" name="years" required="required"/>
		<input type="submit" value="Show costs"/>
	</form>
	<?php
		if (isset($_POST['years'])) :
	?>
	<table>
		<tr>
			<th>Year</th>
			<?php // Create the table header with a for-loop
				for ($i = 1; $i <= 12; $i++) :
					$month = date('F', mktime(0, 0, 0, $i, 1, 2014));
			?>
			<th><?=$month?></th>
			<?php
				endfor;
			?>
			<th>Total</th>
		</tr>
		<?php // Create the first column (YEAR) of the table with a for-loop
			for ($i = date("Y"); $i > date("Y") - $_POST['years']; $i--) :
				$total = 0;
		?>
		<tr>
			<td><?=$i?></td>
			<?php // Put a random data in the columns 2-12 and adding it to the variable $total
				for ($j = 1; $j <= 12; $j++) :
					$current = mt_rand(0, 999);
					$total += $current;
			?>
				<td><?=$current?></td>
			<?php
				endfor;
			?>
			<td><?=$total?></td>
		</tr>
		<?php
			endfor;
		?>
	</table>
	<?php
		endif;
	?>
</body>
</html>
 