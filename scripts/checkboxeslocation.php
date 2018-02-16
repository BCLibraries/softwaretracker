<?php
function checkboxesLocations ($checked){
    
    /*get all the options for 'location'*/
    require_once 'makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT entry FROM appdata WHERE field='location';";
    $result = $connection->query($sql);
    
    /*Make that list of options into HTML options for use with a 'select' tag*/
    $dom = new DOMDocument;
    while ($row = $result->fetch_assoc()){
        $entry = $row["entry"];
        
        $label = $dom->createElement("LABEL");        
        $checkbox = $dom->createElement("input");
        $label->appendChild($checkbox);
        $label->appendChild($dom->createTextNode($entry));
        $label->setAttribute("CLASS", "checkbox-inline");
        
        $checkbox->setAttribute('name', "location[]");
        $checkbox->setAttribute('value', $entry);
        $checkbox->setAttribute('type', "checkbox");
        $checkbox->setAttribute('enctype', "multipart/form-data");
        if ($checked === "checked"){
            $checkbox->setAttribute("checked", true);
        }
        $dom->appendChild($label);

    }
    echo $dom->saveHTML();
}
