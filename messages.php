<?php

require_once('include.php');


$headers = getallheaders();

$result = null;
if ($headers['Content-Type'] == 'application/json') {
	$data = parse_json_body();
	$result = insert_new_message($data);
} else {
	$result = raw_messages();
}


// Prepare output.
if (isset($_GET['pretty'])) {
	echo pre(json_encode($result, JSON_PRETTY_PRINT));
} else {
	echo json_encode($result, JSON_PRETTY_PRINT);
}

