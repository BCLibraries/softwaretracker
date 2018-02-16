<?php
function deleteUser(){
    
require_once 'makedbconnection.php';
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
$user = filter_var($_POST["delete_user"]);

/*Delete the username*/
$sql = "DELETE FROM users WHERE username='$user';";
$deluser = $connection->query($sql);

/*Delete the user's permissions*/
$sql2 = "DELETE FROM user_groups WHERE user_name='$user';";
$delgroups = $connection->query($sql2);

    if ($deluser && $delgroups) {
        echo "User deleted.";
    }
    elseif (!deluser && !delgroups) {
        echo "The user and the user's permissions could not be deleted.";
        echo $deluser->error;
        echo $delgroups->error;
    }
    elseif (!$deluser) {
        echo "There was a problem deleting this user. ";
        echo $deluser->error;
    }
    elseif (!$delgroups){
        echo "There was a problem deleting this user's permissions.";
        echo "$delgroups->error";
    }
}