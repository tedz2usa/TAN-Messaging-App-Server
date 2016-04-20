<?php

	echo 'Trying MySQL Connection...';

	$mysqli = new mysqli('mysql.tanapp.tedzhu.org', 'tanappdbusr', 'TLdPzX620F', 'tanappdb2');

	if ($mysqli->connect_errno) {
		echo 'Failed to connect to MySQL: ' . $mysqli->connect_error;
	}


	echo 'Success!';


	$devices = [];

	$res = $mysqli->query('SELECT * FROM devices');
	while ($row = $res->fetch_assoc()) {
		array_push($devices, $row);
	}

	o($devices);

?>
<br>
<h1>TAN Messaging App</h1>
<h2>Available Devices</h2>
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

<?php

function o($obj) {
	echo '<br><br><pre><code>';
	var_dump($obj);
	echo '<br><br><pre><code>';
}

?>