<?php
function updateVendor(){
    
require_once '/apps/softwaretracker/scripts/makedbconnection.php';
require_once '/apps/softwaretracker/scripts/dbcredentials.php';

/*Set the variables*/
$date = date_create();
$stamp = date_format($date, 'Y-m-d H:i:s');
$vendor = filter_var($_POST["vendor_name"], FILTER_SANITIZE_STRING);
$first = filter_var($_POST["contact_first"], FILTER_SANITIZE_STRING);
$last = filter_var($_POST["contact_last"], FILTER_SANITIZE_STRING);
$contact_phone = filter_var($_POST["contact_phone"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$general_phone = filter_var($_POST["general_phone"], FILTER_SANITIZE_STRING);
$notes = filter_var($_POST["notes"], FILTER_SANITIZE_STRING);
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);

/*update Contact First Name */
if (!empty($first)){
    $sql = "UPDATE vendors SET contact_first='$first' WHERE vendor_name='$vendor';";
    $action = $connection->query($sql);
    if ($action){
    echo "Contact First Name updated. <br>";
    }
    else {
        echo "Could not update Contact First Name <br>";
        echo $action->error;
    }
}

/*update Contact Last Name */
if (!empty($last)){
    $sql = "UPDATE vendors SET contact_last='$last' where vendor_name='$vendor';";
    $action = $connection->query($sql);
    if ($action){
    echo "Contact Last Name updated. <br>";
    }
    else {
        echo "Could not update Contact Last Name <br>";
        echo $action->error;
    }
}

/*update Contact Phone */
if (!empty($last)){
    $sql = "UPDATE vendors SET contact_phone='$contact_phone' where vendor_name='$vendor';";
    $action = $connection->query($sql);
    if ($action){
    echo "Contact Phone updated. <br>";
    }
    else {
        echo "Could not update Contact Phone <br>";
        echo $action->error;
    }
}
/*update Email */
if (!empty($email)){
    $sql = "UPDATE vendors SET email='$email' where vendor_name='$vendor';";
    $action = $connection->query($sql);
    if ($action){
    echo "Email By updated. <br>";
    }
    else {
        echo "Could not update Email By <br>";
        echo $action->error;
    }
}

/*update General Phone */
if (!empty($last)){
    $sql = "UPDATE vendors SET general_phone='$general_phone' where vendor_name='$vendor';";
    $action = $connection->query($sql);
    if ($action){
    echo "General Phone updated. <br>";
    }
    else {
        echo "Could not update General Phone <br>";
        echo $action->error;
    }
}

/*Update Notes*/
if (!empty($notes)){
    $sql="SELECT notes from vendors where vendor_name='$vendor';";
    $fetch = $connection->query($sql);
    $old = $fetch->fetch_assoc();
    $sql = "UPDATE vendors set notes='$notes updated on:$stamp $old[notes]' where vendor_name='$vendor';";
    $action = $connection->query($sql);
    if ($action){
        echo "Notes updated.<br>";
        }
        else {
            echo "Could not update Notes<br>";
            echo $action->error;
        }
}

echo "<br><a href='/softwaretracker/vendorpage.php?vendor=$vendor'>Return to Vendor Page</a>";
}
?>
