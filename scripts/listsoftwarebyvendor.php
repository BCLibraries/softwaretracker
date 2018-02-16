<?php
function listSoftwareByVendor($vendor){

/*Load a list of all software from a given vendor*/
require_once 'makedbconnection.php';
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
$search = filter_var($vendor, FILTER_SANITIZE_STRING);
$sql = "SELECT software FROM tracked WHERE vendor LIKE '%$search%';";
$result = $connection->query($sql);

/*Write a list of software with links to their software page*/
if ($result->num_rows > 0) {
    $dom = new DOMDocument;
    $div = $dom->createElement("div");
    $div->setAttribute("CLASS", "list-group");
    while ($row = $result->fetch_assoc()){
            $link = $dom->createElement("a");
            $linkvalue = "entrypage.php?entry=$row[software]";
            $link->setAttribute('href', $linkvalue);
            $link->setAttribute("CLASS", "list-group-item");
            $software = $row["software"];
            $text = $dom->createTextNode($software);
            $link->appendChild($text);
            $div->appendChild($link);
            }
    $dom->appendChild($div);
    echo $dom->saveHTML();  
}
else {
    echo "No results found.";
}
}
