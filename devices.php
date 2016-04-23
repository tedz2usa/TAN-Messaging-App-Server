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

if ($headers['Content-Type'] == 'application/json') {
	$data = parse_json_body();
	$new_device = insert_new_device($data);
	echo json_encode($new_device, JSON_PRETTY_PRINT);
} else {
	echo json_encode(raw_devices(), JSON_PRETTY_PRINT);// 'ORDER BY id DESC')
}



