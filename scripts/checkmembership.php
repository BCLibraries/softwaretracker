<?php
function checkMembership($entry) {
    
    require_once 'makedbconnection.php';
    require_once 'dbcredentials.php';
    
    /*Select rows where the user's group matches the software's group*/
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT * FROM user_groups JOIN software_groups WHERE user_groups.user_name='$_SESSION[username]' AND software_groups.software_name='$entry' AND software_groups.group_name=user_groups.group_name;";
    $result = $connection->query($sql);
    
    /*If there's at least one row or if the user has the role 'admin,' then return 'true.' Note that this just checks. It doesn't do anything on its own.*/
    if ($result->num_rows>0){
        return true;
    }
    elseif ($_SESSION["role"]==="admin"){
        return true;
    }
    else {
        return false;
    }
}