<?php
	$tags = ['a','abbr','acronym','address','applet','area','article','aside','audio','b','base','basefont','bdo','big','blockquote',
		'body','br','button','canvas','caption','center','cite','code','col','colgroup','command','datalist','dd','del','details',
		'dialog','dfn','dir','div','dl','dt','em','embed','fieldset','figure','font','footer','form','frame','frameset','h1','h2',
		'h3','h4','h5','h6','head','header','hgroup','hr','html','i','iframe','img','input','ins','keygen','kbd','label','legend',
		'li','link','map','mark','menu','meta','meter','nav','noframes','noscript','object','ol','optgroup','option','output','p',
		'param','pre','progress','q','rp','rt','ruby','s','samp','script','section','select','small','source','span','strike','strong',
		'style','sub','sup','table','tbody','td','textarea','tfoot','th','thead','time','title','tr','tt','u','ul','var','video','xmp'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>HTML Tags Counter</title>
</head>
<body>
<form>
	<p>Enter HTML Tags:</p>
	<input type="text" name="tag"/>
	<input type="submit" value="Submit"/>
	<?php
		session_start();
		if (!isset($_SESSION['count'])) {
			$_SESSION['count'] = 0;
		}
		if (!isset($_SESSION['enteredTags'])) {
			$_SESSION['enteredTags'] = [];
		}
		if (isset($_GET['tag'])) {
			if (in_array($_GET['tag'], $tags)) {
				if (!in_array($_GET['tag'], $_SESSION['enteredTags'])) {
					$_SESSION['count']++;
					$_SESSION['enteredTags'][] = $_GET['tag'];
					$count = $_SESSION['count'];
					echo "<p><strong>Valid HTML tag!<br>Score: $count</strong></p>";
				} else {
					$count = $_SESSION['count'];
					echo "<p><strong>Tag already entered.<br>Score: $count</strong></p>";
				}
			} else {
				$count = $_SESSION['count'];
				echo "<p><strong>Invalid HTML tag!<br>Final Score: $count</strong></p>";
				$_SESSION['enteredTags'] = [];
				$_SESSION['count'] = 0;
			}
		}
	?>
</form>
</body>
</html>