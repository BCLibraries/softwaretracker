<?php
function tableRequestedBy($person){
    
    /*Get all software that has no cost and that isn't listed as open source*/
    require_once 'makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT software FROM tracked WHERE requester='$person' ORDER BY software ASC;";
    $result = $connection->query($sql);
    
    /*Write a table containing all the software and style it to be hidden by default*/
    $dom = new DOMDocument;
    
    $table = $dom->createElement("TABLE");
    $table->setAttribute("CLASS", "table table-hover");
    $headrow = $dom->createElement("TR");
    $heading = $dom->createElement("TD", "Software Requested by $person");
    $headrow->appendChild($heading);
    $thead = $dom->createElement("THEAD");
    $thead->appendChild($headrow);
    $table->appendChild($thead);
    $dom->appendChild($table);
    
    /*Create the table body*/
    $tbody = $dom->createElement("TBODY");
    $table->appendChild($tbody);
    
    if ($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            $datarow = $dom->createElement("TR");
            $software = $dom->createElement("TD");
            $softwarelink = $dom->createElement("A", "$row[software]");
            $softwarelink->setAttribute("HREF", "entrypage.php?entry=$row[software]");
            $software->appendChild($softwarelink);
            $datarow->appendChild($software);
            $tbody->appendChild($datarow);
        }
    }
    else {
        $datarow = $dom->createElement("TR");
        $nonefound = $dom->createElement("TD", "No Entries Found");
        $datarow->appendChild($nonefound);
        $tbody->appendChild($datarow);
    }
    echo $dom->saveHTML();
}
