<?php
function assignLicense () {
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);
    $location = filter_input(INPUT_POST, "location", FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $hostname = filter_input(INPUT_POST, "hostname", FILTER_SANITIZE_STRING);
    $datedeployed = filter_input(INPUT_POST, "datedeployed", FILTER_SANITIZE_STRING);
    $software = filter_input(INPUT_POST, "software", FILTER_SANITIZE_STRING);
    
    $sql = "UPDATE licenses SET location='$location', username='$username', hostname='$hostname', datedeployed='$datedeployed' WHERE id='$id';";
    $update = $connection->query($sql);
}
