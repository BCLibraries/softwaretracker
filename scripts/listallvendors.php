<?php
function listAllVendors(){
    
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT vendor_name FROM vendors ORDER BY vendor_name ASC;";
    $result = $connection->query($sql);
    
    $dom = new DOMDocument;
    
    while ($row = $result->fetch_assoc()){
        if ($row["vendor_name"]!=''){
        $item = $dom->createElement('li');
        $link = $dom->createElement('a');
        $linkvalue = "/softwaretracker/vendorpage.php?vendor=$row[vendor_name]";
        $link->setAttribute('href', $linkvalue);
        $textvalue = $row["vendor_name"];
        $text = $dom->createTextNode($textvalue);
        $link->appendChild($text);
        $item->appendChild($link);
        $dom->appendChild($item);
        }
    }
    
    echo $dom->saveHTML();
}
