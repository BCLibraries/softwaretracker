<?php
function updateEntry(){
    
require_once '/apps/softwaretracker/scripts/makedbconnection.php';

/*Set the variables*/
$date = date_create();
$stamp = date_format($date, 'Y-m-d H:i:s');
$software = filter_input(INPUT_POST, "software", FILTER_SANITIZE_STRING);
$category = filter_input(INPUT_POST, "category", FILTER_SANITIZE_STRING);
$environment = filter_input(INPUT_POST, "environment", FILTER_SANITIZE_STRING);
$platform = filter_input(INPUT_POST, "platform", FILTER_SANITIZE_STRING);
$requester = filter_input(INPUT_POST, "requester", FILTER_SANITIZE_STRING);
$approver = filter_input(INPUT_POST, "approver", FILTER_SANITIZE_STRING);
$funding = filter_input(INPUT_POST, "funding", FILTER_SANITIZE_STRING);
$primary = filter_input(INPUT_POST, "primary", FILTER_SANITIZE_STRING);
$vendor = filter_input(INPUT_POST, "vendor", FILTER_SANITIZE_STRING);
$renewal = filter_input(INPUT_POST, "renewal", FILTER_SANITIZE_STRING);
$purchase = filter_input(INPUT_POST, "purchase", FILTER_SANITIZE_STRING);
$cost = filter_input(INPUT_POST, "cost", FILTER_SANITIZE_NUMBER_INT);
$notes = filter_input(INPUT_POST, "notes", FILTER_SANITIZE_STRING);
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);

/*update Category */
if (!empty($category)){
    $sql = "UPDATE tracked SET category='$category' WHERE software='$software'";
    $action = $connection->query($sql);
    if ($action){
    echo "<p>Category updated. </p>";
    }
    else {
        echo "<p>Could not update Category </p>";
    }
}

/*update Environment */
if (!empty($environment)){
    $sql = "UPDATE tracked SET environment='$environment' where software='$software'";
    $action = $connection->query($sql);
    if ($action){
    echo "<p>Environment updated. </p>";
    }
    else {
        echo "<p>Could not update Environment </p>";
    }
}

/*update Platform*/
if (!empty($platform)){
    $sql = "UPDATE tracked SET platform='$platform' where software='$software'";
    $action = $connection->query($sql);
    if ($action){
    echo "<p>Platform updated. </p>";
    }
    else {
        echo "<p>Could not update Platform </p>";
    }
}

/*update Requested By */
if (!empty($requester)){
    $sql = "UPDATE tracked SET requester='$requester' where software='$software'";
    $action = $connection->query($sql);
    if ($action){
    echo "<p>Requested By updated. </p>";
    }
    else {
        echo "<p>Could not update Requested By </p>";
    }
}

/*update Approved By */
if (!empty($approver)){
    $sql = "UPDATE tracked set approver='$approver' where software='$software'";
    $action = $connection->query($sql);
    if ($action){
    echo "<p>Approved By updated </p>";
    }
    else {
        echo "<p>Could not update Approved By</p>";
    }
}

/*update Funding Source*/
if (!empty($funding)){
    $sql = "UPDATE tracked set funding_source='$funding' where software='$software'";
    $action = $connection->query($sql);
    if ($action){
        echo "<p>Funding Source updated.</p>";
        }
        else {
            echo "<p>Could not update Funding Source</p>";
        }
}

/*Update Primary User*/
if (!empty($primary)){
    $sql = "UPDATE tracked set primary_user='$primary' where software='$software'";
    $action = $connection->query($sql);
    if ($action){
        echo "<p>Primary User updated.</p>";
        }
        else {
            echo "<p>Could not update Primary User</p>";
        }
}

/*Update Vendor*/
if (!empty($vendor)){
    $sql = "UPDATE tracked set vendor='$vendor' where software='$software'";
    $action = $connection->query($sql);
    if ($action){
        echo "<p>Vendor updated.</p>";
        }
        else {
            echo "<p>Could not update Vendor</p>";
        }
}

/*Update Cost*/
if (!empty($cost)){
    $sql = "UPDATE tracked set cost='$cost' where software='$software'";
    $action = $connection->query($sql);
    if ($action){
        echo "<p>Cost updated.</p>";
        }
        else {
            echo "<p>Could not update Cost</p>";
        }
}

/*Update Renewal*/
if (!empty($renewal)){
    $sql = "UPDATE tracked set renewal='$renewal' where software='$software'";
    $action = $connection->query($sql);
    if ($action){
        echo "<p>Renewal updated.</p>";
        }
        else {
            echo "<p>Could not update Renewal</p>";
        }
}

/*Update Purchase*/
if (!empty($purchase)){
    $sql = "UPDATE tracked set purchase='$purchase' where software='$software'";
    $action = $connection->query($sql);
    if ($action){
        echo "<p>Purchase updated.</p>";
        }
        else {
            echo "<p>Could not update Purchase</p>";
        }
}

/*Update Notes*/
$sql="SELECT notes FROM tracked WHERE software='$software';";
$fetch = $connection->query($sql);
$old = $fetch->fetch_assoc();
$sql = "UPDATE tracked set notes='$notes updated on:$stamp by:$_SESSION[username] $old[notes]' where software='$software'";
$action = $connection->query($sql);
if ($action){
    echo "<p>Notes updated.</p>";
}
else{
    echo "<p>Could not update Notes</p>";
    }

/*Add Groups*/
if (!empty($_POST["group"])){
    foreach ($_POST['group'] as $groups){
        $testsql = "SELECT * FROM software_groups WHERE software_name='$software' AND group_name='$groups;";
        $test = $connection->query($testsql);
        if ($test->num_rows > 0){
            echo "$software is already a member of $groups";
        }
        else {
        $sql = "INSERT INTO software_groups (group_name, software_name) VALUES ('$groups', '$software');";
        $groupresult = $adminconnection->query($sql);
            if ($groupresult){
                echo "<p>Added to $groups</p>";
            }
            else{
                echo "There was a problem adding this program to $groups.";
                echo $groupresult->error;
            }
        }
    }
}
/*Remove Groups*/
if (!empty($_POST["removegroup"])){
    foreach ($_POST['removegroup'] as $remove){
        $sql = "DELETE FROM software_groups WHERE software_name='$software' AND group_name='$remove';";
        $groupresult = $connection->query($sql);
        if ($groupresult){
            echo "<p>Removed from $remove</p>";
        }
        else{
            echo "There was an error removing the software from $groups";
            echo "$groupresult->error";
        }
    }
}

/*Update Locations*/
$locations = $_POST["location"];
$deletesql = "DELETE FROM locations WHERE software='$software';";
$connection->query($deletesql);
foreach ($locations as $location){
    $locationsql = "INSERT INTO locations (software, location) VALUES ('$software', '$location');";
    $connection->query($locationsql);
}


echo "<p><a href='/softwaretracker/entrypage.php?entry=$software'>Return to Software Page</a></p>";
}    
?>
