<?php
function listSoftwareByVendor($vendor){

/*Load a list of all software from a given vendor*/
require_once '/apps/softwaretracker/scripts/makedbconnection.php';
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
$search = filter_var($vendor, FILTER_SANITIZE_STRING);
$sql = "SELECT software FROM tracked WHERE vendor LIKE '%$search%';";
$result = $connection->query($sql);

/*Write a list of software with links to their software page*/
if ($result->num_rows > 0) {
    $dom = new DOMDocument;
    while ($row = $result->fetch_assoc()){
            $item = $dom->createElement("li");
            $link = $dom->createElement("a");
            $linkvalue = "/softwaretracker/entrypage.php?entry=$row[software]";
            $link->setAttribute('href', $linkvalue);
            $software = $row["software"];
            $text = $dom->createTextNode($software);
            $link->appendChild($text);
            $item->appendChild($link);
            $dom->appendChild($item);
            }
    echo $dom->saveHTML();  
}
else {
    echo "No results found.";
}
}
