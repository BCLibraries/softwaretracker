<?php
require_once '/apps/softwaretracker/scripts/makedbconnection.php';

$software = filter_input(INPUT_GET,'entry',FILTER_SANITIZE_STRING);
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);

/*Delete the program's entry*/
$sql = "DELETE FROM tracked WHERE software='$software';";
$action = $connection->query($sql);

/*Delete the program's permissions*/
$sql2 = "DELETE FROM software_groups WHERE software_name='$software';";
$action2 = $connection->query($sql2);
