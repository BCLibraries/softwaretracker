<?php
function countFunding ($funding_source){
    require_once 'makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    echo "$connection->error";
     /*Find start and end dates for the current fiscal year*/
     date_default_timezone_set("America/New_York");
    $date = new DateTime;
    $now = $date->format('m-d');
    $fiscalnewyear = "6-3";
    $diff = date_diff($now, $fiscalnewyear, false);
    if ($diff->invert === 0){
        $year = $date->format('Y');
    }
    else {
        $year = $date->format('Y')+1;
    }
    $startyear = $year-1;
    $enddate = "$year-6-2";
    $startdate = "$startyear-6-3";
    
    
    $sql = "SELECT count(software) AS count FROM tracked WHERE funding_source='$funding_source' AND renewal BETWEEN '$startdate' and '$enddate';";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    echo $row["count"];
}