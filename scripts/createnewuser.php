<?php
function createNewUser(){
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    require_once '/apps/softwaretracker/lib/password.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $name = filter_var($_POST["new_user"]);
    $password = password_hash(trim($_POST["new_pass"]), PASSWORD_DEFAULT);
    $role = filter_var($_POST["new_role"]);
    
    /*Check availability*/
    $sql = "SELECT username FROM users WHERE username='$name';";
    $check = $connection->query($sql);
    if ($check->num_rows>0) {
        exit("<p>Username already in use!</p>");
    }
    else {
    /*Create the new entry*/
    $sql2 = "INSERT INTO users (username,password,role)VALUES ('$name','$password','$role');";
    $result = $connection->query($sql2);
        if ($result){
            echo "<p>User Created!</p>";   
        }
        else {
            echo "Could not create user. $result->error";
        }
    }
/*Create the group entries*/
    if (isset($_POST["group"])){
        foreach ($_POST["group"] as $groups){
        $query = "INSERT INTO user_groups (group_name,user_name) VALUES ('$groups', '$name');";
        $setgroups = $connection->query($query); 
            if ($setgroups){
                echo "Added to $groups.";
            }
            else {
                echo "There was an error adding the user to the requested group.";
                echo $setgroups->error;
            }
        }
    }
}