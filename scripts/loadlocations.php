<?php
function loadLocations() {
    require_once 'makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    
    $software = filter_input(INPUT_GET,"entry", FILTER_SANITIZE_STRING);
    
    /*Load the locations*/
    $sql = "SELECT entry FROM appdata WHERE field='location';";
    $result = $connection->query($sql);
    
    $dom = new DOMDocument;
    $div = $dom->createElement("DIV");
    $div->setAttribute("CLASS", "form-check");
    $dom->appendChild($div);
    
    while ($row = $result->fetch_assoc()){
        $entry = $row["entry"];
        
        $checkbox = $dom->createElement("input");
        $label = $dom->createELement("label");
        $label->appendChild($checkbox);
        $label->appendChild($dom->createTextNode($entry));
        $label->setAttribute("CLASS", "checkbox-inline");
        $div->appendChild($label);
        
        $checkbox->setAttribute('name', "location[]");
        $checkbox->setAttribute('value', $entry);
        $checkbox->setAttribute('type', "checkbox");
        $checkbox->setAttribute('enctype', "multipart/form-data");
        
        
        /*Check if program is in location*/
        $test = "SELECT location FROM locations WHERE software='$software' and location='$entry';";
        $testresult = $connection->query($test);
        if($testresult->num_rows === 1){
           $checkbox->setAttribute("checked", TRUE);
        }
    }
    echo $dom->saveHTML();
}
