<?php


require_once('include.php');

$sql = 'DELETE FROM devices where id>0; ';
$mysqli->query($sql);

$sql = 'ALTER TABLE devices AUTO_INCREMENT = 1';
$mysqli->query($sql);


$sql = 'DELETE FROM messages where id>0; ';
$mysqli->query($sql);

$sql = 'ALTER TABLE messages AUTO_INCREMENT = 1';
$mysqli->query($sql);

insert_new_dbpurge();


header('Location: /');

