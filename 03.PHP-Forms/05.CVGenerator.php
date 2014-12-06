<!DOCTYPE html>
<html>
<head>
	<title>Generate CV</title>
	<style>
		form {
			width: 34%;
			float: left;
			margin-right: 50px;
		}
		table, th, td {
			border: 1px solid black;
		}
		th, td {
			padding: 2px;
		}
	</style>
	<script src="05.AddRemoveLanguages.js" defer></script>
</head>
<body>
<form method="post">
	<fieldset>
		<legend>Personal Information</legend>
		<input type="text" name="fName" placeholder="First Name"/><br>
		<input type="text" name="lName" placeholder="Last Name"/><br>
		<input type="email" name="email" placeholder="Email"/><br>
		<input type="text" name="phone" placeholder="Phone Number"/><br>
		Female <input type="radio" name="sex" value="Female"/>
		Male <input type="radio" name="sex" value="Male"/><br>
		Birth Date<br>
		<input type="text" name="birthday" placeholder="dd-mm-yyyy"/><br>
		Nationality<br>
		<select name="nation">
			<option value="Bulgarian">Bulgarian</option>
			<option value="Indian">Indian</option>
			<option value="English">English</option>
			<option value="Chinese">Chinese</option>
		</select>
	</fieldset>
	<fieldset>
		<legend>Last Work Position</legend>
		Company Name
		<input type="text" name="lastCompany"/><br>
		From
		<input type="text" name="from" placeholder="dd-mm-yyyy"/><br>
		To
		<input type="text" name="to" placeholder="dd-mm-yyyy"/>
	</fieldset>
	<fieldset id="computerSkills">
		<legend>Computer Skills</legend>
		Programming Languages<br>
		<div>
			<input type="text" name="programLang[]"/>
			<select name="programLevel[]">
				<option value="Beginner">Beginner</option>
				<option value="Programmer">Programmer</option>
				<option value="Ninja">Ninja</option>
			</select>
		</div>
		<button id="removeProgramLang" type="button">Remove Language</button>
		<button id="addProgramLang" type="button">Add Language</button>
	</fieldset>
	<fieldset id="otherSkills">
		<legend>Other Skills</legend>
		Languages<br>
		<div>
			<input type="text" name="lang[]"/>
			<select name="comprehension[]">
				<option hidden selected>-Comprehension-</option>
				<option value="Beginner">Beginner</option>
				<option value="Intermediate">Intermediate</option>
				<option value="Advanced">Advanced</option>
			</select>
			<select name="reading[]">
				<option hidden selected>-Reading-</option>
				<option value="Beginner">Beginner</option>
				<option value="Intermediate">Intermediate</option>
				<option value="Advanced">Advanced</option>
			</select>
			<select name="writing[]">
				<option hidden selected>-Writing-</option>
				<option value="Beginner">Beginner</option>
				<option value="Intermediate">Intermediate</option>
				<option value="Advanced">Advanced</option>
			</select>
		</div>
		<button id="removeLang" type="button">Remove Language</button>
		<button id="addLang" type="button">Add Language</button><br>
		Driver's License<br>
		B<input type="checkbox" name="drivers[]" value="B"/>
		A<input type="checkbox" name="drivers[]" value="A"/>
		C<input type="checkbox" name="drivers[]" value="C"/>
	</fieldset>
	<input type="submit" value="Generate CV"/>
</form>
<?php
	// checking for missing fields
	if (count($_POST) == 0) {
		echo 'Please fill the form.';
		die('</body></html>');
	}
	foreach($_POST as $key => $value) {
		if(empty($value)) {
			echo 'You must fill all the form fields.';
			die('</body></html>');
		}
	}
	$dataIsValid = true;
	// escaping all html tags and trimming the input
	// then I check every field for the required pattern
	$firstName = htmlentities(trim($_POST['fName']));
	if (!preg_match('/^[a-zA-Z]{2,20}$/', $firstName)) {
		echo 'Please enter a valid first name. <br>';
		$dataIsValid = false;
	}
	$lastName = htmlentities(trim($_POST['lName']));
	if (!preg_match('/^[a-zA-Z]{2,20}$/', $lastName)) {
		echo 'Please enter a valid last name. <br>';
		$dataIsValid = false;
	}
	$lastCompany = htmlentities(trim($_POST['lastCompany']));
	if (!preg_match('/^[a-zA-Z0-9]{2,20}$/', $lastCompany)) {
		echo 'Please enter a valid company name. <br>';
		$dataIsValid = false;
	}
	$email = htmlentities(trim($_POST['email']));
	if (!preg_match('/^\S+@\S+\.\S+$/', $email)) {
		echo 'Please enter a valid email adress. <br>';
		$dataIsValid = false;
	}
	$phone = htmlentities(trim($_POST['phone']));
	if (!preg_match('/^[0-9+ \-]{4,}$/', $phone)) {
		echo 'Please enter a valid phone number. <br>';
		$dataIsValid = false;
	}
	$languages = array_map('trim', $_POST['lang']);
	$languages = array_map('htmlentities', $languages);
	foreach ($languages as $lang) {
		if (!preg_match('/^[a-zA-Z]{2,20}$/', $lang)) {
			echo 'One or more of the entered languages is invalid. <br>';
			$dataIsValid = false;
			break;
		}
	}
	// stop execution if one or more of the fields don't match it's pattern
	if (!$dataIsValid) {
		die('</body></html>');
	}
	// if all patterns are matched, continue with the remaining fields
	$comprehension = array_map('trim', $_POST['comprehension']);
	$comprehension = array_map('htmlentities', $comprehension);
	$reading = array_map('trim', $_POST['reading']);
	$reading = array_map('htmlentities', $reading);
	$writing = array_map('trim', $_POST['writing']);
	$writing = array_map('htmlentities', $writing);
	$programLang = array_map('trim', $_POST['programLang']);
	$programLang = array_map('htmlentities', $programLang);
	$programLangLevels = array_map('trim', $_POST['programLevel']);
	$programLangLevels = array_map('htmlentities', $programLangLevels);
	$driverLicence = array_map('htmlentities', $_POST['drivers']);
	$sex = htmlentities($_POST['sex']);
	$nation = htmlentities($_POST['nation']);
	$birthday = date('Y-m-d', strtotime(trim($_POST['birthday'])));
	$fromDate = date('Y-m-d', strtotime(trim($_POST['from'])));
	$toDate = date('Y-m-d', strtotime(trim($_POST['to'])));
?>
<section>
	<h1>CV</h1>
	<table>
		<tr>
			<th colspan="2">Personal Information</th>
		</tr>
		<tr>
			<td>First Name</td>
			<td><?=$firstName?></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><?=$lastName?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?=$email?></td>
		</tr>
		<tr>
			<td>Phone Number</td>
			<td><?=$phone?></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td><?=$sex?></td>
		</tr>
		<tr>
			<td>Birth Date</td>
			<td><?=$birthday?></td>
		</tr>
		<tr>
			<td>Nationality</td>
			<td><?=$nation?></td>
		</tr>
	</table>
	<br>
	<table>
		<tr>
			<th colspan="2">Last Work Position</th>
		</tr>
		<tr>
			<td>Company Name</td>
			<td><?=$lastCompany?></td>
		</tr>
		<tr>
			<td>From</td>
			<td><?=$fromDate?></td>
		</tr>
		<tr>
			<td>To</td>
			<td><?=$toDate?></td>
		</tr>
	</table>
	<br>
	<table>
		<tr>
			<th colspan="3">Computer Skills</th>
		</tr>
		<tr>
			<td rowspan="<?=count($programLang) + 1?>">Programming Languages</td>
			<th>Language</th>
			<th>Skill Level</th>
		</tr>
		<?php
			for ($i = 0; $i < count($programLang); $i++) {
				echo "<tr><td>$programLang[$i]</td><td>$programLangLevels[$i]</td></tr>";
			}
		?>
	</table>
	<br>
	<table>
		<tr>
			<th colspan="5">Other Skills</th>
		</tr>
		<tr>
			<td rowspan="<?=count($languages) + 1?>">Languages</td>
			<th>Language</th>
			<th>Comprehension</th>
			<th>Reading</th>
			<th>Writing</th>
		</tr>
		<?php
			for ($i = 0; $i < count($languages); $i++) {
				echo "<tr><td>$languages[$i]</td><td>$comprehension[$i]</td>";
				echo "<td>$reading[$i]</td><td>$writing[$i]</td></tr>";
			}
		?>
		<tr>
			<td>Driver's licence</td>
			<td colspan="4"><?=implode(', ' , $driverLicence)?></td>
		</tr>
	</table>
</section>
</body>
</html>
 