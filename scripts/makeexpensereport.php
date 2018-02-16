<?php
require_once 'authorize.php';
require_once 'config.php';
require_once 'makedbconnection.php';

/*Check the directory*/
$directory = DOC_DIR."/$_SESSION[username]";

if (!is_dir($directory)){
    mkdir($directory);
}
$reportlocation = "$directory/expensereport.csv";
$file = fopen($reportlocation, "w");


/*Write the title*/
$title = "Libraries Expense Report \n";
fwrite($file,$title);

/*Write the headings*/
$headings = "Software,Category,Environment,Platform,Requester,Approver,Primary User,Renewal,Purchase,Cost,Funding Source,Vendor \n";
fwrite($file,$headings);

/*Load Entries and Initialize Cost*/
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
$sql = "SELECT * FROM tracked ORDER BY software ASC;";
$entries = $connection->query($sql);
$totalcost = 0;

/*Loop through rows of data, then print total cost*/
while ($row = $entries->fetch_assoc()){
    $totalcost += $row["cost"];
    $data = "$row[software],$row[category],$row[environment],$row[platform],$row[requester],$row[approver],$row[primary_user],$row[renewal],$row[purchase],$row[cost],$row[funding_source],$row[vendor] \n";
    fwrite($file,$data);
}
fwrite($file, "Total Cost:,$totalcost");

fclose($file);
exit();