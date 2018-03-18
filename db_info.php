<?php
// get credentials from outside of root directory
$config = parse_ini_file(__DIR__ . '/../private_html/db_config.ini');

// open db
$db = new PDO('mysql:host=' . $config['servername'] . ';dbname=' . $config['dbname'], 
	$config['username'], 
	$config['password']);

$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>

