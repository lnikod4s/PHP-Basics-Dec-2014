<!DOCTYPE html>
<html>
<head>
	<title>07.Seminar Generator</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="07.SeminarGenerator.css">
	<script src="07.SeminarGenerator.js" defer></script>
</head>
<body>
	<form method="post">
		<textarea name="input"></textarea><br>
		<label for="sort">Sort by:</label>
		<select name="sort" id="sort">
			<option value="name">Name</option>
			<option value="date">Date</option>
		</select>
		<label for="order">Order by:</label>
		<select name="order" id="order">
			<option value="asc">Ascending</option>
			<option value="desc">Descending</option>
		</select>
		<input type="submit" value="Submit"/>
	</form>
	<?php if (isset($_POST['input']) && isset($_POST['order']) && isset($_POST['sort'])) :
		// create the seminar class
		class Seminar {
			public $name;
			public $lecturer;
			public $date;
			public $info;
			public function __construct($name, $lecturer, $date, $info) {
				$this->name = $name;
				$this->lecturer = $lecturer;
				$this->date = $date;
				$this->info = $info;
			}
		}
		// split the input into rows
		$input = explode(PHP_EOL, ($_POST['input']));
		// all the seminars will be stored here as objects
		$seminars = [];
		foreach ($input as $row) {
			if (empty($row)) {
				continue;
			}
			// stores the name in the first index, the lecturer in the second index
			// and everything else in the last index
			$seminarData = explode('-', $row, 3);
			// stores the date in the first index, the time in the second index
			// and the seminar info in the last index
			$dateAndInfo = preg_split('/(?<=\d) /', $seminarData[2], -1, PREG_SPLIT_NO_EMPTY);
			$date = explode('-', $dateAndInfo[0]);
			$time = explode(':', $dateAndInfo[1]);
			// converting the date and time to timestamp for easier sorting
			$dateTime = mktime($time[0], $time[1], 0, $date[1], $date[0], $date[2]);
			// add the current seminar object to the seminars array
			$seminars[] = new Seminar($seminarData[0], $seminarData[1], $dateTime, $dateAndInfo[2]);
		}
		// sort the array by timestamp or name
		usort($seminars, function($a, $b) {
			if ($_POST['sort'] == 'name') {
				return strcmp($a->name, $b->name);
			} else if ($_POST['sort'] == 'date') {
				return $a->date - $b->date;
			} else {
				return 0;
			}
		});
		// reverse the array if the order must be descending
		if ($_POST['order'] == 'desc') {
			$seminars = array_reverse($seminars);
		}
		?>
		<table>
			<tr>
				<th>Seminar name</th>
				<th>Date</th>
				<th>Participate</th>
			</tr>
			<?php foreach ($seminars as $index => $seminar) : ?>
				<tr>
					<td><a href="#" id="link<?=$index?>"><?=$seminar->name?></a></td>
					<td><?=date('d-m-Y H:i' , $seminar->date)?></td>
					<td><button>Sign Up</button></td>
					<td>
						<div id="div<?=$index?>">
							<span>Lecturer:</span> <?=$seminar->lecturer?>
							<br><span>Details:</span> <?=$seminar->info?>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</body>
</html>