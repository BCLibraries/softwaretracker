<?php
function createNewEntry(){
require_once 'makedbconnection.php';

/*Set the variables*/
$date = date_create();
$stamp = date_format($date, 'Y-m-d');
$software = filter_input(INPUT_POST,"software", FILTER_SANITIZE_STRING);
$category = filter_input(INPUT_POST,"category", FILTER_SANITIZE_STRING);
$environment = filter_input(INPUT_POST,"environment", FILTER_SANITIZE_STRING);
$platform = filter_input(INPUT_POST,"platform", FILTER_SANITIZE_STRING);
$requester = filter_input(INPUT_POST,"requester", FILTER_SANITIZE_STRING);
$approver = filter_input(INPUT_POST,"approver", FILTER_SANITIZE_STRING);
$funding = filter_input(INPUT_POST,"funding",FILTER_SANITIZE_STRING);
if ($funding == null){
    $funding = "Unsorted";
}
$primary = filter_input(INPUT_POST,"primary", FILTER_SANITIZE_STRING);
$vendor = filter_input(INPUT_POST,"vendor", FILTER_SANITIZE_STRING);
$invoice = filter_input(INPUT_POST,"invoice", FILTER_SANITIZE_STRING);
$voucher = filter_input(INPUT_POST,"voucher", FILTER_SANITIZE_STRING);
$cost = filter_input(INPUT_POST,"cost", FILTER_SANITIZE_STRING);
if ($cost==null){
    $cost=0;
}
$renewal = filter_input(INPUT_POST,"renewal", FILTER_SANITIZE_STRING);
if ($renewal==null){
    $renewal='1970-01-01';
}
$purchase = filter_input(INPUT_POST,"purchase", FILTER_SANITIZE_STRING);
$notes = filter_input(INPUT_POST,"notes", FILTER_SANITIZE_STRING)." created on:".$stamp;

/*Open the connection and test if name is taken*/
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
$test = "SELECT software FROM tracked WHERE software='$software';";
$testresult = $connection->query($test);

if ($testresult->num_rows>0){
    echo "<p>Cannot create this entry. The software name already in use.</p>";
    echo "<p><a href='./'>Return to homepage</a></p>";
    echo "<p><a href='newentrypage.php'>Create a new entry</p>";
    exit;
}
else {
$sql = "INSERT INTO tracked (software, category, environment, platform, requester, approver, funding_source, primary_user, vendor, invoice, voucher, cost, renewal, purchase, notes) VALUES ('$software', '$category', '$environment', '$platform', '$requester', '$approver', '$funding', '$primary', '$vendor', '$invoice', '$voucher', '$cost', '$renewal', '$purchase', '$notes');";
$result = $connection->query($sql);
    if ($result) {
        echo "<p><a href='entrypage.php?entry=$software'>Go to Entry Page</a></p>";
        echo "<p><a href='./'>Return to homepage</p>";
    }
    else {
        echo "The record could not be entered into the database, because of a database error.<br>";
        echo $connection->error;
    }
}

/*Add Location Entries*/
if (!empty($_POST["location"])){
    foreach($_POST["location"] as $locations) {
        $sql = "INSERT INTO locations (software, location) VALUES ('$software','$locations');";
        $locationresults = $connection->query($sql);
    }
}

/*Make the group settings*/
if (!empty($_POST["group"])){
    foreach ($_POST['group'] as $groups){
        $sql = "INSERT INTO software_groups (group_name, software_name) VALUES ('$groups', '$software');";
        $groupresult = $connection->query($sql);
    }
    if ($groupresult){
        echo "<p>Added to $groups</p>";
    }
    else{
        echo "<p>There was a problem adding this user to the group requested.</p>";
        echo $groupresult->error;
    }
}
}
?>