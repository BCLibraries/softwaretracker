<?php
function renewalAlert(){
require_once '/apps/softwaretracker/scripts/makedbconnection.php';

$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
$sql = "SELECT software, renewal FROM tracked WHERE renewal BETWEEN now() and now() + INTERVAL 90 day ORDER BY renewal ASC;";
$result = $connection->query($sql);

    if ($result->num_rows>0){
    echo "<h2 class='alert'>Renewal Alert</h2>";
        while ($row = $result->fetch_assoc()){
            echo "<p class='alert'><a href='/softwaretracker/entrypage.php?entry=$row[software]'>$row[software]</a> renews on $row[renewal]</p>";
        }
    }
}