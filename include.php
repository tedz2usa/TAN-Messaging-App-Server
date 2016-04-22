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

function raw_insert($tablename, $data) {
	global $mysqli;

	$insert_data_clause = data_to_insert_sql_clause($data);

	$sql = 'INSERT INTO ' . $tablename . ' ' . $insert_data_clause . ';';

	if ($mysqli->query($sql) === true) {
		// New record created successfully.
		$id = $mysqli->insert_id;
		return $id;

	} else {
		// Error.
		throw new Exception('Insertion failed. ' . $mysqli->error);
	}
}

function data_to_insert_sql_clause($data) {
	$keys = array_keys($data);
	$values = array_values($data);

	$joined_keys = join(', ', $keys);
	$joind_vales = join("', '", $values);

	$clause = '(' . $joined_keys . ") VALUES ('" . $joind_vales . "')";

	return $clause;
}

function raw_devices() {

	$devices = raw_select('devices');
	return $devices;

}

function raw_messages() {

	$messages = raw_select('messages');
	return $messages;

}

function raw_device($id) {
	$device = raw_select('devices', 'WHERE id=' . $id)[0];
	return $device;
}

function raw_message($id) {
	$message = raw_select('messages', 'WHERE id=' . $id)[0];
	return $message;
}

function insert_new_device($data) {
	$new_id = raw_insert('devices', $data);
	return raw_device($new_id);
}

function insert_new_message($data) {
	$new_id = raw_insert('messages', $data);
	return raw_message($new_id);
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

