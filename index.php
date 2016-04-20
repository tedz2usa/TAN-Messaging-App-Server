<?php

	require_once('constants.php');

	echo 'Trying MySQL Connection...';

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		echo 'Failed to connect to MySQL: ' . $mysqli->connect_error;
	}


	echo 'Success!';


	$devices = [];

	$res = $mysqli->query('SELECT * FROM devices');
	while ($row = $res->fetch_assoc()) {
		array_push($devices, $row);
	}

	//o($devices);

?>
<!DOCTYPE html> 
<html>
	<head>
		<title>TAN Messaging App</title>

<style>

table {
	border-collapse: collapse;
}

table, tr, td, th {
	border: 1px solid #000;
}

th, td {
	text-align: left;
	padding: 5px;
	padding-right: 15px;
}



</style>

	</head>
	<body>
		<h1>TAN Messaging App</h1>
		<h2>Devices</h2>
		<table>
			<tr>
				<th>Device ID</th>
				<th>Name</th>
				<th>MAC Address</th>
			</tr>
			<?php

			foreach ($devices as $device) {
				?>
				<tr>
					<td><?php echo $device['id']; ?></td>
					<td><?php echo $device['name']; ?></td>
					<td><?php echo $device['mac_address']; ?></td>
				</tr>
				<?php
			}

			?>
		</table>
	</body>


</html>

<?php

function o($obj) {
	echo '<br><br><pre><code>';
	var_dump($obj);
	echo '<br><br><pre><code>';
}

?>