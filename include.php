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
	echo '</code></pre><br><br>';
}

function pre($str) {
	echo '<pre><code>';
	echo $str;
	echo '</code></pre>';
}

function raw_select($tablename, $append_clause='') {
	global $mysqli;

	$collection = [];

	$res = $mysqli->query('SELECT * FROM ' . $tablename . ' ' . $append_clause);
	while ($row = $res->fetch_assoc()) {
		array_push($collection, $row);
	}

	return $collection;
}

function raw_devices() {

	$devices = raw_select('devices');
	return $devices;

}

function raw_messages() {

	$messages = raw_select('messages');
	return $messages;
	
}


function expand_device($device) {

}


function expand_message($messsage) {

}


// HTTP Helper methods
function parse_json_body($as_assoc=true) {
	$body = file_get_contents('php://input');
	$obj = json_decode($body, $as_assoc);
	return $obj;
}

