<?php
require_once '/apps/softwaretracker/scripts/makedbconnection.php';

function listSoftwareSearch($software){

/*Find all software where the name contains the search string*/

$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
$search = filter_var($software);
$sql = "SELECT software from tracked where software like '%$search%' order by software asc;";
$result = $connection->query($sql);

/*Write the results into a list*/
if ($result->num_rows>0){
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
    echo "<li>No results found.</li>";
}
}
