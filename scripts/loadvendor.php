<?php
function loadVendor($str){
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $name = filter_var($str);
    $sql = "select * from vendors where vendor_name='$name';";
    $result = $connection->query($sql);
    if (!$result){
        echo "Error connecting to database <br>";
        echo $result->error;
    }
    elseif ($result->num_rows > 0){
        return $result->fetch_assoc();
    }
}

