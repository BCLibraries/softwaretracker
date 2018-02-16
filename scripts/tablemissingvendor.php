<?php
function tableMissingVendor(){
    
    /*Load all software missing a vendor listing*/
    require_once 'makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT software FROM tracked WHERE vendor='' ORDER BY software ASC;";
    $result = $connection->query($sql);
    
    /*Write the table*/
    $dom = new DOMDocument;
    
    $table = $dom->createElement("TABLE");
    $table->setAttribute("CLASS", "table table-hover");
    $headrow = $dom->createElement("TR");
    $heading = $dom->createElement("TD", "Software Missing Vendor");
    $headrow->appendChild($heading);
    $table->appendChild($headrow);
    $thead = $dom->createElement("THEAD");
    $thead->appendChild($headrow);
    $table->appendChild($thead);
    
    /*Create the table body*/
    $tbody = $dom->createElement("TBODY");
    $table->appendChild($tbody);
    
    if ($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            $datarow = $dom->createElement("TD");
            $software = $dom->createElement("TD");
            $softwarelink = $dom->createElement("A", "$row[software]");
            $softwarelink->setAttribute("HREF", "entrypage.php?entry=$row[software]");
            $software->appendChild($softwarelink);
            $datarow->appendChild($software);
            $tbody->appendChild($datarow);
        }
    }
    else {
        $datarow = $dom->createElement("TD");
        $nonefound = $dom->createElement("TD", "No Entries Found");
        $datarow->appendChild($nonefound);
        $tbody->appendChild($datarow);
    }
    echo $dom->saveHTML();
}
