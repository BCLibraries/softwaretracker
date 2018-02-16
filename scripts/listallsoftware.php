<?php
function listAllSoftware(){
    require_once 'makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT software FROM tracked ORDER BY software ASC;";
    $getall = $connection->query($sql);
    
    $dom = new DOMDocument;
    $div = $dom->createElement("div");
    $div->setAttribute("CLASS", "list-group");
    while ($row = $getall->fetch_assoc()){
            $link = $dom->createElement("a");
            $linkvalue = "entrypage.php?entry=$row[software]";
            $link->setAttribute('href', $linkvalue);
            $link->setAttribute("class", "list-group-item");
            $software = $row["software"];
            $text = $dom->createTextNode($software);
            $link->appendChild($text);
            $div->appendChild($link);
            }
    $dom->appendChild($div);
    echo $dom->saveHTML();
}
