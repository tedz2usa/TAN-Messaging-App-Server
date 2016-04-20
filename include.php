<?php

require_once('constants.php');

//echo 'Trying MySQL Connection...';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($mysqli->connect_errno) {
	echo 'Failed to connect to MySQL: ' . $mysqli->connect_error;
}


function o($obj) {
	echo '<br><br><pre><code>';
	var_dump($obj);
	echo '<br><br><pre><code>';
}



function raw_devices() {
	global $mysqli;

	$devices = [];

	$res = $mysqli->query('SELECT * FROM devices');
	while ($row = $res->fetch_assoc()) {
		array_push($devices, $row);
	}

	return $devices;

}

function raw_messages() {
	global $mysqli;

	$messages = [];

	$res = $mysqli->query('SELECT * FROM messages');
	while ($row = $res->fetch_assoc()) {
		array_push($messages, $row);
	}

	return $messages;

}

