<?php
if (isset($_GET["jsuser"])){
    loadUserGroups($_GET["jsuser"]);
}
function loadUserGroups($user) {
    $groups = array('CTE', 'ITS', 'Library');
    $dom = new DOMDocument;
    foreach ($groups as $group){
        $checkbox = $dom->createElement("input");
        $checkbox->setAttribute('name', "group[]");
        $checkbox->setAttribute('value', $group);
        $checkbox->setAttribute('type', "checkbox");
        $checkbox->setAttribute('enctype', "multipart/form-data");
        $text = $dom->createTextNode($group);
        
        require_once '/apps/softwaretracker/scripts/makedbconnection.php';
        $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
        $sql = "SELECT group_name FROM user_groups WHERE user_name='$user' AND group_name='$group';";
        $query = $connection->query($sql);
        if ($query->num_rows === 1){
            $checkbox->setAttribute("checked", TRUE);
        }
        
        $dom->appendChild($checkbox);
        $dom->appendChild($text);
    }
    echo $dom->saveHTML();
}