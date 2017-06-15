<?php
function sumFunding($funding_source){
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "select sum(cost) as 'total' from tracked where funding_source='$funding_source';";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    echo $row["total"];
    }