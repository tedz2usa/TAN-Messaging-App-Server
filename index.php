<?php


require_once('include.php');


// Check for DB Reset
if (isset($_GET['resetdb'])) {
	//$sql = 'DELETE FROM devices WHERE id>3';

}




// Get Devices.

$devices = raw_devices();


// Get Messages.

$messages = raw_messages('ORDER BY id DESC');

$dbpurges = raw_dbpurges('ORDER BY id DESC');

//o($devices);

?>
<!DOCTYPE html> 
<html>
	<head>
		<title>TAN Messaging App</title>

<style>

h1, h2, h3, h4, h5, h6 {
	font-family: Arial, Helvetica, sans-serif;
}

a, a:visited {
	color: blue;
}

a {
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}

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

		<!-- List all Devices. -->
		<h2><a href='/devices.php?pretty=true' target='_blank'>Devices</a></h2>
		<table>
			<tr>
				<th>Device ID</th>
				<th>Name</th>
				<th>Date Joined</th>
			</tr>
			<?php

			foreach ($devices as $device) {
				?>
				<tr>
					<td><?php echo $device['id']; ?></td>
					<td><?php echo $device['name']; ?></td>
					<td><?php echo gettime($device['date_joined']); ?></td>
				</tr>
				<?php
			}

			?>
		</table>

		<br>
		<a href='/resetdb.php'>Reset Database</a>
		<br>

		<!-- List all Messages. -->
		<h2><a href='/messages.php?pretty=true' target='_blank'>Messages</a></h2>
		<table>
			<tr>
				<th>Message ID</th>
				<th>Message Type</th>
				<th>Sender Device ID</th>
				<th>Recipient Device ID</th>
				<th>Data Text</th>
				<th>Data Voice</th>
				<th>Timestamp</th>
			</tr>
			<?php

			foreach ($messages as $message) {
				?>
				<tr>
					<td><?php echo $message['id']; ?></td>
					<td><?php echo $message['type']; ?></td>
					<td><?php echo $message['sender_device_id']; ?></td>
					<td><?php echo $message['recipient_device_id']; ?></td>
					<td><?php echo $message['data_text']; ?></td>
					<td><?php echo $message['data_voice']; ?></td>
					<td><?php echo gettime($message['timestamp']); ?></td>
				</tr>
				<?php
			}

			?>
		</table>

		<!-- List all Database Purges. -->
		<h2><a href='/dbpurges.php?pretty=true' target='_blank'>Database Purges</a></h2>
		<table>
			<tr>
				<th>Purge #</th>
				<th>Timestamp</th>
			</tr>
			<?php

			foreach ($dbpurges as $dbpurge) {
				?>
				<tr>
					<td><?php echo $dbpurge['id']; ?></td>
					<td><?php echo gettime($dbpurge['timestamp']); ?></td>
				</tr>
				<?php
			}

			?>
		</table>

	</body>


</html>
