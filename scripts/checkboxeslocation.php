<?php
function checkboxesLocations (){
    
    /*get all the options for 'location'*/
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT entry FROM appdata WHERE field='location';";
    $result = $connection->query($sql);
    
    /*Make that list into checkboxes*/
    $dom = new DOMDocument;
    while ($row = $result->fetch_assoc()){
        $checkbox = $dom->createElement("input");
        $entry = $row["entry"];
        $checkbox->setAttribute('name', "location[]");
        $checkbox->setAttribute('value', $entry);
        $checkbox->setAttribute('type', "checkbox");
        $checkbox->setAttribute('enctype', "multipart/form-data");
        $text = $dom->createTextNode($entry);
        $dom->appendChild($checkbox);
        $dom->appendChild($text);
    }
    echo $dom->saveHTML();
}
