<?php
require_once '/apps/softwaretracker/scripts/makedbconnection.php';
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);

/*Select all entries that begin with the string, but then just pull the first result row*/
$input = filter_var($_GET["str"], FILTER_SANITIZE_STRING);
$sql = "SELECT software FROM tracked WHERE software LIKE '$input%' ORDER BY software ASC;";
$result = $connection->query($sql);
$autocomplete = $result->fetch_row();

/*If there is a result, echo it*/
if (isset($autocomplete)){
    echo $autocomplete[0];
}
?>