<?php
function loadLocations() {
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    
    $software = filter_input(INPUT_GET,"entry", FILTER_SANITIZE_STRING);
    
    /*Load the locations*/
    $sql = "SELECT entry FROM appdata WHERE field='location';";
    $result = $connection->query($sql);
    
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
        /*Check if program is in location*/
        $test = "SELECT location FROM locations WHERE software='$software' and location='$entry';";
        $testresult = $connection->query($test);
        if($testresult->num_rows === 1){
           $checkbox->setAttribute("checked", TRUE);
        }
    }
    echo $dom->saveHTML();
}
