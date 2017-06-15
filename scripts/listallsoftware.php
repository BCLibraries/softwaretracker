<?php
function listAllSoftware(){
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT software FROM tracked ORDER BY software ASC;";
    $getall = $connection->query($sql);
    
    $dom = new DOMDocument;
    
    while ($row = $getall->fetch_assoc()){
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
