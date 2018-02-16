<?php
if (isset($_GET["jsuser"])){
    loadUserRoles($_GET["jsuser"]);
}
function loadUserRoles($user) {
    $roles = array('User', 'Admin');
    $dom = new DOMDocument;
    foreach ($roles as $role){
        $label = $dom->createElement("LABEL");
        $radial = $dom->createElement("input");
        $label->appendChild($radial);
        $label->appendChild($dom->createTextNode($role));
        $label->setAttribute("CLASS", "radio-inline");
        
        $radial->setAttribute('name', "role");
        $radial->setAttribute('value', $role);
        $radial->setAttribute('type', "radio");
        
        require_once 'makedbconnection.php';
        $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
        $sql = "SELECT role FROM users WHERE username='$user';";
        $query = $connection->query($sql);
        if ($query->num_rows === 1){
            $radial->setAttribute("checked", TRUE);
        }
        
        $dom->appendChild($label);
    }
    echo $dom->saveHTML();
}