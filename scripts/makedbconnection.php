<?php
require 'dbcredentials.php';
function makeDBConnection($host, $username, $password, $dbname){
$connection = new mysqli($host, $username, $password, $dbname);
if ($connection->connect_error) {
	die("Connection Failed: " . $connection->connect_error);
}
else {
	return $connection;
}
}
?>