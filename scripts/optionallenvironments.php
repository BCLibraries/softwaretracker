<?php
function optionAllEnvironments (){
    
    require_once 'makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT entry FROM appdata WHERE field='environment';";
    $result = $connection->query($sql);
    
    $dom = new DOMDocument;
    while ($row = $result->fetch_assoc()){
        $option = $dom->createElement("option");
        $entry = $row["entry"];
        $option->setAttribute('value', $entry);
        $text = $dom->createTextNode($entry);
        $option->appendChild($text);
        $dom->appendChild($option);
    }
    echo $dom->saveHTML();
}

