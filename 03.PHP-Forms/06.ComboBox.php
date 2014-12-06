<!DOCTYPE html>
<html>
<head>
	<title>Combo Box</title>
	<style>
		select {
			width: 150px;
		}
	</style>
</head>
<body>
<form>
	<!--I use javascript to submit the form on change and php to save the last selected value-->
	<select name="continents" onchange="this.form.submit()">
		<option hidden <?php if (!isset($_GET['continents'])){echo 'selected';}?>></option>
		<option value="Europe" <?php if (isset($_GET['continents']) && $_GET['continents'] == 'Europe'){echo 'selected';}?>>Europe</option>
		<option value="Asia" <?php if (isset($_GET['continents']) && $_GET['continents'] == 'Asia'){echo 'selected';}?>>Asia</option>
		<option value="NorthAmerica" <?php if (isset($_GET['continents']) && $_GET['continents'] == 'NorthAmerica'){echo 'selected';}?>>North America</option>
		<option value="SouthAmerica" <?php if (isset($_GET['continents']) && $_GET['continents'] == 'SouthAmerica'){echo 'selected';}?>>South America</option>
		<option value="Australia" <?php if (isset($_GET['continents']) && $_GET['continents'] == 'Australia'){echo 'selected';}?>>Australia</option>
		<option value="Africa" <?php if (isset($_GET['continents']) && $_GET['continents'] == 'Africa'){echo 'selected';}?>>Africa</option>
	</select>
	<select>
		<option hidden selected></option>
		<?php
			if (isset($_GET['continents'])) {
				// I saved the array with all the countries in the 06-CountryList.php file
				require('06.CountryList.php');
				$currentCountries = $countryList[$_GET['continents']];
				foreach($currentCountries as $country) {
					echo "<option>$country</option>";
				}
			}
		?>
	</select>
</form>
</body>
</html>