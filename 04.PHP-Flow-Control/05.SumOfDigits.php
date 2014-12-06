<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>05.Sum Of Digits</title>
	<style>
		table {
			margin: 5px 5px 5px 83px;
		}
		.sum {
			width: 120px;
		}
	</style>
</head>
<body>
	<form method="post">
		<label for="input">Input string:</label>
		<input type="text" name="input" required="required"/>
		<input type="submit" value="Submit"/>
	</form>
	<?php
		if (isset($_POST['input'])) :
			$input = explode(", ", $_POST['input']);
			foreach ($input as $item) :
				$sumOfDigits[$item] = array_sum(str_split($item));
	?>
				<table border="1">
					<?php
						if (!is_numeric($item)) {
							echo "<tr><td>$item</td><td class='sum'>I cannot sum that</td></tr>";
						} else {
							echo "<tr><td>$item</td><td class='sum'>$sumOfDigits[$item]</td></tr>";
						}
					?>
				</table>
			<?php
				endforeach;
			?>
		<?php
			endif;
		?>
</body>
</html>