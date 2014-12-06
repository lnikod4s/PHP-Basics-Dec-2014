<!DOCTYPE html>
<html>
<head>
	<title>06.String Modifier</title>
	<meta charset="UTF-8">
</head>
<body>
	<form method="post">
		<input type="text" name="input"/>
		<input type="radio" name="function" value="isPal"/> Check Palindrome
		<input type="radio" name="function" value="reverse"/> Reverse String
		<input type="radio" name="function" value="split"/> Split
		<input type="radio" name="function" value="hash"/> Hash String
		<input type="radio" name="function" value="shuffle"/> Shuffle String
		<input type="submit" value="Submit"/>
	</form>
	<?php
		if (isset($_POST['input']) && isset($_POST['function'])) {
			$input = $_POST['input'];
			switch ($_POST['function']) {
				case 'isPal':
					if (strtolower (strrev ($input)) == strtolower ($input)) {
						echo "$input is a palindrome";
					} else {
						echo "$input is not a palindrome";
					}
					break;
				case 'reverse':
					echo strrev ($input);
					break;
				case 'split':
					echo implode (str_split ($input), ' ');
					break;
				case 'hash':
					echo hash ('haval256,5',$input);
					break;
				case 'shuffle':
					echo str_shuffle ($input);
					break;
			}
		}
	?>
</body>
</html>