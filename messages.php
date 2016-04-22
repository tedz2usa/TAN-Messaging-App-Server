<?php

require_once('include.php');


$headers = getallheaders();

if ($headers['Content-Type'] == 'application/json') {
	$data = parse_json_body();
	$new_message = insert_new_message($data);
	echo json_encode($new_message, JSON_PRETTY_PRINT);
} else {
	echo json_encode(raw_messages(), JSON_PRETTY_PRINT);
}
