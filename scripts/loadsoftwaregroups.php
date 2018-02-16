<?php
if (isset($_GET["jssoftware"])){
    loadUserGroups($_GET["jssoftware"]);
}
function loadSoftwareGroups($software) {
    $groups = array('CTE', 'ITS', 'Library');
    $dom = new DOMDocument;
    foreach ($groups as $group){
        $checkbox = $dom->createElement("input");
        $checkbox->setAttribute('name', "group[]");
        $checkbox->setAttribute('value', $group);
        $checkbox->setAttribute('type', "checkbox");
        $checkbox->setAttribute('enctype', "multipart/form-data");
        $text = $dom->createTextNode($group);
        
        require_once 'makedbconnection.php';
        $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
        $sql = "SELECT group_name FROM software_groups WHERE software_name='$software' AND group_name='$group';";
        $query = $connection->query($sql);
        if ($query->num_rows === 1){
            $checkbox->setAttribute("checked", TRUE);
        }
        
        $dom->appendChild($checkbox);
        $dom->appendChild($text);
    }
    echo $dom->saveHTML();
}
