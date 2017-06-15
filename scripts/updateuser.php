<?php
function updateUser () {
    require_once '/apps/softwaretracker/lib/password.php';
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    
    /*Make sure they selected a user*/
    if ($_POST["username"] === "Select a User"){
        exit("Please select a user to update");
    }
    
    /*Create the user*/
    $user = filter_var($_POST["username"]);
    if(isset($_POST["password"]) & $_POST["password"]!="") {
        $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password='$password' WHERE username='$user';";
        $result = $connection->query($sql);
        if ($result){
            echo "Password updated!";
        }
        else {
            echo "Could not update password. $result->error";
        }
    }
    
    /*Add their role*/
    if (isset($_POST["role"])){
        $roleclear = "UPDATE users SET role='' WHERE username='$user';";
        $connection->query($roleclear);

        $rolewrite = "UPDATE users SET role='$_POST[role]' WHERE username='$user';";
        $connection->query($rolewrite);
    }
    /*Clear and re-write groups*/
    if (isset($_POST["group"])){
        $groupclear = "DELETE FROM user_groups WHERE user_name='$user'";
        $connection->query($groupclear);

        foreach ($_POST["group"] as $groups){
            $groupwrite = "INSERT INTO user_groups (group_name,user_name) VALUES ('$groups','$user');";
            $connection->query($groupwrite);
        }
    }
}
