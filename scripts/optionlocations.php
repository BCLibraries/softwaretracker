<?php
function optionLocations (){
    /*get all the options for 'location'*/
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT entry FROM appdata WHERE field='location';";
    $result = $connection->query($sql);
    
    /*Make that list into HTML options*/
    $dom = new DOMDocument;
    while ($row = $result->fetch_assoc()){
        $option = $dom->createElement("OPTION");
        $entry = $row["entry"];
        $option->setAttribute('value', $entry);
        $option->setAttribute('enctype', "multipart/form-data");
        $text = $dom->createTextNode($entry);
        $option->appendChild($text);
        $dom->appendChild($option);
    }
    echo $dom->saveHTML();
}
