<?php
function tableMissingRenewal(){
    
    /*Get all software with a renewal date set to the default value of January 1st, 1970*/
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT software FROM tracked WHERE renewal='1970-01-01' ORDER BY software ASC;";
    $result = $connection->query($sql);
    
    /*Write a table with the list and style it to be hidden by default*/
    $dom = new DOMDocument;
    
    $table = $dom->createElement("TABLE");
    $table->setAttribute("CLASS", "missingrenewal hidden");
    $headingrow = $dom->createElement("TR");
    $heading = $dom->createElement("TD", "Software Missing Renewal");
    $headingrow->appendChild($heading);
    $table->appendChild($headingrow);
    $dom->appendChild($table);
    
    if ($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            $datarow = $dom->createElement("TR");
            $software = $dom->createElement("TD");
            $softwarelink = $dom->createElement("A", "$row[software]");
            $softwarelink->setAttribute("HREF", "/softwaretracker/entrypage.php?entry=$row[software]");
            $software->appendChild($softwarelink);
            $datarow->appendChild($software);
            $table->appendChild($datarow);
        }
    }
    else {
        $datarow = $dom->createElement("TR");
        $nonefound = $dom->createElement("TD", "No Entries Found");
        $datarow->appendChild($nonefound);
        $table->appendChild($datarow);
    }
    echo $dom->saveHTML();
}
