<?PHP
function createNewVendor(){
    
require_once '/apps/softwaretracker/scripts/makedbconnection.php';
/*Set the Variables*/
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
$name = filter_var($_POST["vendor"], FILTER_SANITIZE_STRING);
$first = filter_var($_POST["contact_first"], FILTER_SANITIZE_STRING);
$last = filter_var($_POST["contact_last"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$notes = filter_var($_POST["vendornotes"], FILTER_SANITIZE_STRING);
$contact_phone = filter_var($_POST["contact_phone"], FILTER_SANITIZE_STRING);
$general_phone = filter_var($_POST["general_phone"], FILTER_SANITIZE_STRING);

/*Test availability*/
$test = "select vendor_name from vendors where vendor_name='".$name."';";
$testresult = $connection->query($test);
if ($testresult->num_rows > 0){
    echo "Sorry, this vendor name is already in use, please try again.<br>";
    echo "<a href='/softwaretracker/'>Return to homepage</a><br>";
    echo "<a href='/softwaretracker/newevendorpage.php'>Create a new vendor entry</a>";
}
else {
$sql = "INSERT INTO vendors (vendor_name, contact_first, contact_last, contact_phone email, general_phone, notes) VALUES ('$name','$first','$last', '$contact_phone', $email', '$general_phone', '$notes');";
$result = $connection->query($sql);
if ($result) {
    echo "<a href='/softwaretracker/vendorpage.php?vendor=$name'>Go to Vendor Page</a><br>";
    echo "<a href='/softwaretracker/'>Return to homepage</a>";
}
else {
    echo "Sorry, there was an error and this vendor entry could not be inserted into the database.<br>";
    echo $connection->error;
}
}
}
?>
