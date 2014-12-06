<!doctype html>
<html>
<head>
	<title>05.Sentence Extractor</title>
	<meta charset="UTF-8">
</head>
<body>
	<form method="post">
		<textarea name="text" cols="18" rows="10"></textarea><br>
		<input type="text" name="word"/><br><br/>
		<input type="submit" value="Extract Sentences"/>
	</form>
	<?php
		if (isset($_POST['text']) && isset($_POST['word'])) {
			$sentences = preg_split("/(?<=[.?!])\s*/", $_POST['text'], -1, PREG_SPLIT_NO_EMPTY);
			$sentences = array_map('trim', $sentences);
			$word = $_POST['word'];
			foreach ($sentences as $sentence) {
				if (preg_match("/\b$word\b.*[.?!]+$/", $sentence)) {
					echo "<p>$sentence</p>";
				}
			}
		}
	?>
</body>
</html>