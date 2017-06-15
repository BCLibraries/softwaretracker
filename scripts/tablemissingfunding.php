<?php
function tableMissingFunding(){
    
    /*Get all software that is missing a funding source*/
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT software FROM tracked WHERE funding_source='Unsorted' ORDER BY software ASC;";
    $result = $connection->query($sql);
    
    /*Write a table containing the list and set the styling to hide it by default*/
    $dom = new DOMDocument;
    
    $table = $dom->createElement("TABLE");
    $table->setAttribute("CLASS", "missingfunding hidden");
    $headingrow = $dom->createElement("TR");
    $heading = $dom->createElement("TD", "Software Missing Funding");
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
