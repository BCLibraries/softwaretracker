<?php
function addLicense(){
    require_once 'makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    
    $software = FILTER_INPUT(INPUT_POST, "software", FILTER_SANITIZE_STRING);
    $licensekey = $_POST["licensekey"];
    $platform = $_POST["platform"];
    
    for ($i=0; $i < count($platform); $i++){
    $sql = "INSERT INTO licenses (software, licensekey, platform) VALUES ('$software','$licensekey[$i]','$platform[$i]');";
    $results = $connection->query($sql);
    }   
    if ($results){
        echo "License added.<br>";
        echo "<a href='https://libstaff.bc.edu/softwaretracker/licenseaddnew.php?entry=$software'>Add More Licenses</a><br>";
        echo "<a href='https://libstaff.bc.edu/softwaretracker/entrypage.php?entry=$software'>Back To $software</a>";
    }
    else {
        echo "Could not add license. $results->error";
    }
}