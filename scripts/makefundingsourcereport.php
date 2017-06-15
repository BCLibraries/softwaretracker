<?php
require_once '/apps/softwaretracker/scripts/authorize.php';
require_once '/apps/softwaretracker/scripts/config.php';
require_once '/apps/softwaretracker/scripts/makedbconnection.php';

/*Decide where to put the file, then make it*/
$fs = filter_var($_GET["q"]);
$directory = DOC_DIR."/$_SESSION[username]";
$reportlocation = "$directory/".$fs.".csv";

if (is_dir($directory)){
    $file = fopen($reportlocation, "w");

}
else {
    mkdir($directory);
    $file = fopen($reportlocation, "w");
}

/*Write the title*/
$title = "$fs Expense Report \n";
fwrite($file,$title);

/*Write the headings*/
$headings = "Software,Category,Environment,Platform,Requester,Approver,Primary User,Renewal,Purchase,Cost,Vendor \n";
fwrite($file,$headings);

/*Initialize Cost*/
$totalcost = 0;

/*Get the data*/
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
$sql = "SELECT * FROM tracked WHERE funding_source='$fs';";
$entries = $connection->query($sql);

/*Loop through rows of data, then print total cost*/
while ($row = $entries->fetch_assoc()){
    $totalcost += $row["cost"];
    $data = "$row[software],$row[category],$row[environment],$row[platform],$row[requester],$row[approver],$row[primary_user],$row[renewal],$row[purchase],$row[cost],$row[vendor] \n";
    fwrite($file,$data);
}
fwrite($file, "Total Cost:,$totalcost");
fclose($file);
exit();