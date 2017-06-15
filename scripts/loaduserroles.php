<?php
if (isset($_GET["jsuser"])){
    loadUserRoles($_GET["jsuser"]);
}
function loadUserRoles($user) {
    $roles = array('User', 'Admin');
    $dom = new DOMDocument;
    foreach ($roles as $role){
        $radial = $dom->createElement("input");
        $radial->setAttribute('name', "role");
        $radial->setAttribute('value', $role);
        $radial->setAttribute('type', "radio");
        $text = $dom->createTextNode($role);
        
        require_once '/apps/softwaretracker/scripts/makedbconnection.php';
        $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
        $sql = "SELECT role FROM users WHERE username='$user';";
        $query = $connection->query($sql);
        if ($query->num_rows === 1){
            $radial->setAttribute("checked", TRUE);
        }
        
        $dom->appendChild($radial);
        $dom->appendChild($text);
    }
    echo $dom->saveHTML();
}