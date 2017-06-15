<?php
function sumEnvironment($environment){
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "select sum(cost) as cost from tracked where environment='$environment';";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    
    echo $row["cost"];
}