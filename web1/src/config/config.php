<?php

$configDB = array();
$configDB["host"] = getenv('DB_HOST') ? getenv('DB_HOST') : 'mysql';
$configDB["database"] = getenv('DB_NAME') ? getenv('DB_NAME') : 'computer_store';
$configDB["username"] = getenv('DB_USER') ? getenv('DB_USER') : 'root';
$configDB["password"] = getenv('DB_PASS') ? getenv('DB_PASS') : 'root';

define("HOST", $configDB["host"]);
define("DB_NAME", $configDB["database"]);
define("DB_USER", $configDB["username"]);
define("DB_PASS", $configDB["password"]);

define("BASE_URL", getenv('BASE_URL') ? getenv('BASE_URL') : 'http://web1.ncdinh');
// Define ROOT so other includes can use absolute paths (points to src folder)
if (!defined('ROOT')) {
	define('ROOT', dirname(__DIR__));
}
