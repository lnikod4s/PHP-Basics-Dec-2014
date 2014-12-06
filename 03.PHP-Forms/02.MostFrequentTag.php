<!DOCTYPE html>
<html>
<head>
	<title>Most Frequent Tag</title>
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
		$result = [];
		foreach ($tags as $tag) {
			if (isset($result[$tag])) {
				$result[$tag]++;
			} else {
				$result[$tag] = 1;
			}
		}
		arsort ($result);
		foreach ($result as $tag => $count) {
			echo "$tag : $count times <br>";
		}
		echo '<br>Most Frequent Tag is: ' . array_search (max ($result), $result);
	}
?>
</body>
</html>
 