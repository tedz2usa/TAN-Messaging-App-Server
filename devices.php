<?php

require_once('include.php');

// if (isset($_GET['pretty'])) {
// 	pre(json_encode(raw_devices(), JSON_PRETTY_PRINT));
// } else {
// 	echo json_encode(raw_devices(), JSON_PRETTY_PRINT);
// }


//echo 'post data: ';
//o($_POST);


$headers = getallheaders();


// Set result for output.
$result = null;
if ($headers['Content-Type'] == 'application/json') {
	$data = parse_json_body();
	$result = insert_new_device($data);
} else {
	$result = raw_devices();
}


// Prepare output.
if (isset($_GET['pretty'])) {
	echo pre(json_encode($result, JSON_PRETTY_PRINT));
} else {
	echo json_encode($result, JSON_PRETTY_PRINT);
}


