<?php
function listAllVendors(){
    
    require_once 'makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT vendor_name FROM vendors ORDER BY vendor_name ASC;";
    $result = $connection->query($sql);
    
    $dom = new DOMDocument;
    $div = $dom->createElement("div");
    $div->setAttribute("CLASS", "list-group");
    while ($row = $result->fetch_assoc()){
        if ($row["vendor_name"]!=''){
        $link = $dom->createElement('a');
        $linkvalue = "vendorpage.php?vendor=$row[vendor_name]";
        $link->setAttribute('href', $linkvalue);
        $link->setAttribute("CLASS", "list-group-item");
        $textvalue = $row["vendor_name"];
        $text = $dom->createTextNode($textvalue);
        $link->appendChild($text);
        $div->appendChild($link);
        }
    }
    $dom->appendChild($div);
    echo $dom->saveHTML();
}
