<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>01.Word Mapping</title>
</head>
<body>
	<form method="post">
		<textarea name="text" cols="50" rows="3"></textarea><br/>
		<input type="submit" value="Count words"/>
	</form>
	<?php
		if (isset ($_POST['text'])) :
			$words = preg_split('/\W+/', strtolower($_POST['text']), -1, PREG_SPLIT_NO_EMPTY);
			$wordMap = [];
			foreach ($words as $word) {
				if (!empty($wordMap[$word])) {
					$wordMap[$word]++;
				} else {
					$wordMap[$word] = 1;
				}
			}
			arsort($wordMap);
	?>
			<table border="1">
				<?php foreach ($wordMap as $word => $count) : ?>
					<tr>
						<td><?=$word?></td>
						<td><?=$count?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php endif; ?>
</body>
</html>