<?php
function loadEntry($program){
require_once 'makedbconnection.php';
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
$search = filter_var($program);
$sql = "select * from tracked where software='$search'";
$result = $connection->query($sql);
return $result->fetch_assoc();
}