<?php
function listSoftwareByCategory($category){
    
    /*Get all software that belongs to a particular category*/
    require_once 'makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $search = filter_var($category, FILTER_SANITIZE_STRING);
    $sql = "SELECT software FROM tracked WHERE category='$search';";
    $result = $connection->query($sql);
    
    /*Write a list of software with links to their entry page*/
    if ($result->num_rows > 0){
        $dom = new DOMDocument;
        $div = $dom->createElement("div");
        $div->setAttribute("CLASS", "list-group");
        while ($row = $result->fetch_assoc()){
                $link = $dom->createElement("a");
                $linkvalue = "entrypage.php?entry=$row[software]";
                $link->setAttribute('href', $linkvalue);
                $link->setAttribute("CLASS", "list-group-item");
                $software = $row["software"];
                $text = $dom->createTextNode($software);
                $link->appendChild($text);
                $div->appendChild($link);
                }
        $dom->appendChild($div);
        echo $dom->saveHTML();
    }
    else {
        echo "No results found.";
    }
}
