<?php
if (isset($_GET["jsid"])){
    revokeLicense($_GET["jsid"]);
}
function revokeLicense($id){
    require_once 'makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    
    $sql = "UPDATE licenses SET location='', username='', hostname='', datedeployed='' WHERE id='$id';";
    $result = $connection->query($sql);
    
    if ($result) {
        echo "<h2>License Unassigned</h2>";
    }
    else {
        echo "<h2>Could not unassign license.</h2>";
    }
}
