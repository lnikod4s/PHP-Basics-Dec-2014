<!DOCTYPE html>
<html>
<head>
	<title>Get Form Data</title>
</head>
<body>
<form>
	<input type="text" name="name" placeholder="Name.."/><br>
	<input type="text" name="age" placeholder="Age.."/><br>
	<input type="radio" name="gender" value="male"/>Male<br>
	<input type="radio" name="gender" value="female"/>Female<br>
	<input type="submit" value="Submit"/><br>
	<?php
		if (isset($_GET['name']) && isset($_GET['age']) && isset($_GET['gender'])) {
			$name = htmlentities ($_GET['name']);
			$age = htmlentities ($_GET['age']);
			$gender = htmlentities ($_GET['gender']);
			echo "My name is $name. I am $age years old. I am $gender.";
		}
	?>
</form>
</body>
</html>