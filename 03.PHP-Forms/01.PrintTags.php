<!DOCTYPE html>
<html>
<head>
	<title>Print Tags</title>
</head>
<body>
<form>
	<p>Enter Tags:</p>
	<input type="text" name="tags"/>
	<input type="submit" value="Submit"/>
</form>
<br>
<?php
	if (isset($_GET['tags'])) {
		$tags = explode (', ', $_GET['tags']);
		for ($i = 0; $i < count ($tags); $i ++) {
			echo "$i : $tags[$i] <br>";
		}
	}
?>
</body>
</html>
 