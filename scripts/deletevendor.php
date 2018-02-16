<?php
require_once 'makedbconnection.php';

$vendor = filter_var($_GET["vendor"]);
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);

/*Delete the vendor's entry*/
$sql = "DELETE FROM vendors WHERE vendor_name='$vendor';";
$action = $connection->query($sql);

/*Scrub the vendor name from software entries*/
$sql2 = "UPDATE tracked SET vendor='None Listed' WHERE vendor='$vendor';";
$action2 = $connection->query($sql2);