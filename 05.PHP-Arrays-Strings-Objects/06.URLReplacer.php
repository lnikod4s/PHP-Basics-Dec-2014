<!doctype html>
<html>
<head>
	<title>06.URL Replacer</title>
	<meta charset="UTF-8">
</head>
<body>
	<form method="post">
		<textarea name="text" rows="10" cols="18"></textarea><br>
		<input type="submit" value="Replace URLs"/>
	</form>
	<?php
		if (isset($_POST['text'])) {
			$text = ($_POST['text']);
			$text = str_replace('</a>', '[/URL]', $text);
			$text = preg_replace('/<a href="(.*?)">/', '[URL=\1]', $text);
			echo "<p>$text</p>";
		}
	?>
</body>
</html>