<!DOCTYPE html>
<html>
<head>
	<title>Student Sorting</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="07.StudentSorting.css"/>
	<script src="07.AddRemoveStudent.js" defer></script>
</head>
<body>
	<form method="post" class="input-form">
		<table>
			<thead>
			<tr>
				<th>First name:</th>
				<th>Second name:</th>
				<th>Email:</th>
				<th>Exam score:</th>
			</tr>
			</thead>
			<tbody id="inputs-parent"></tbody>
		</table>
		<button type="button" id="addButton">+</button>
		<label for="sort">Sort by: </label>
		<select name="sort" id="sort">
			<option value="fName">First name</option>
			<option value="lName">Last name</option>
			<option value="email">Email</option>
			<option value="score">Exam score</option>
		</select>
		<label for="order">Sort by: </label>
		<select name="order" id="order">
			<option value="asc">Ascending</option>
			<option value="desc">Descending</option>
		</select>
		<button type="submit">Submit</button>
	</form>
	<?php if (isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['email'])
		&& isset($_POST['score']) && isset($_POST['sort']) && isset($_POST['order'])) :
		// creating student class
		class Student {
			public $fName;
			public $lName;
			public $email;
			public $score;
			public function __construct($fName, $lName, $email, $score) {
				$this->fName = $fName;
				$this->lName = $lName;
				$this->email = $email;
				$this->score = $score;
			}
		}
		// putting all the input into array of objects
		$students = [];
		for ($i = 0; $i < count($_POST['fName']); $i++) {
			$students[] = new Student($_POST['fName'][$i], $_POST['lName'][$i],
				$_POST['email'][$i], $_POST['score'][$i]);
		}
		// sorting the students array by selected value in ascending order
		usort($students, function($a, $b) {
			switch ($_POST['sort']) {
				case ('fName'): return strcmp($a->fName, $b->fName);
				case ('lName'): return strcmp($a->lName, $b->lName);
				case ('email'): return strcmp($a->email, $b->email);
				case ('score'): return $a->score - $b->score;
				default: return 0;
			}
		});
		// reversing the array if the order must be descending
		if ($_POST['order'] == 'desc') {
			$students = array_reverse($students);
		}
		// get the average exam score
		$average = round(array_sum($_POST['score']) / count($_POST['score']));
	?>
		<table class="results-table">
			<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
				<th>Exam score</th>
			</tr>
			</thead>
			<tbody>
			<?php
				foreach ($students as $student) :
			?>
				<tr>
					<td><?=$student->fName?></td>
					<td><?=$student->lName?></td>
					<td><?=$student->email?></td>
					<td class="score"><?=$student->score?></td>
				</tr>
			<?php
				endforeach;
			?>
			<tr class="average">
				<td colspan="3">Average Score:</td>
				<td class="score"><?=$average?></td>
			</tr>
			</tbody>
		</table>
	<?php
		endif;
	?>
</body>
</html>