<?php
	$input = array('Gosho', '0882-321-423', '24', 'Hadji Dimitar');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Information Table</title>
</head>
<body>
<table border="1">
	<tbody>
	<tr>
		<td>Name</td>
		<td><?= $input[0] ?></td>
	</tr>
	<tr>
		<td>Phone Number</td>
		<td><?= $input[1] ?></td>
	</tr>
	<tr>
		<td>Age</td>
		<td><?= $input[2] ?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td><?= $input[3] ?></td>
	</tr>
	</tbody>
</table>
</body>
</html>