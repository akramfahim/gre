<?php

ini_set('error_reporting', E_ALL);

date_default_timezone_set('Asia/Dhaka');

$dbhost = 'localhost';

$dbname = 'gre';

$dbuser = 'root';

$dbpass = '';

define("BASE_URL", "");

define("MOD_REWRITE", "Off");



try {
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $ex ) {
    echo "Connection error :" . $ex->getMessage();
}