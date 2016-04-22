<?php

require_once('include.php');

// if (isset($_GET['pretty'])) {
// 	pre(json_encode(raw_devices(), JSON_PRETTY_PRINT));
// } else {
// 	echo json_encode(raw_devices(), JSON_PRETTY_PRINT);
// }


echo 'post data: ';
o($_POST);


$headers = getallheaders();

if ($headers['Content-Type'] == 'application/json') {
	o('detected json data.');

	$obj = parse_json_body();
	// o($body);
	o($obj);


}

echo json_encode(raw_devices(), JSON_PRETTY_PRINT);

