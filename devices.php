<?php

require_once('include.php');

// if (isset($_GET['pretty'])) {
// 	pre(json_encode(raw_devices(), JSON_PRETTY_PRINT));
// } else {
// 	echo json_encode(raw_devices(), JSON_PRETTY_PRINT);
// }


echo json_encode(raw_devices(), JSON_PRETTY_PRINT);

