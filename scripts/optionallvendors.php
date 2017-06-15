<?php
function optionAllVendors(){
    
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT vendor_name FROM vendors ORDER BY vendor_name ASC;";
    $result = $connection->query($sql);
    
    $dom = new DOMDocument;
    while ($row = $result->fetch_assoc()){
        $option = $dom->createElement("option");
        $entry = $row["vendor_name"];
        $option->setAttribute('value', $entry);
        $text = $dom->createTextNode($entry);
        $option->appendChild($text);
        $dom->appendChild($option);
    }
    echo $dom->saveHTML();
}