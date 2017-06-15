<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';
require_once '/apps/softwaretracker/scripts/authorizeadmin.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manage Users</title>
        <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
        <script src='js/checkpassword.js' type='text/javascript'></script>
        <script src='js/displayuser.js' type='text/javascript'></script>
        <?PHP 
        require_once '/apps/softwaretracker/scripts/navbar.php';
        require_once '/apps/softwaretracker/scripts/optionallusers.php';
        ?>
    </head>
    <body>
        <?PHP navbar(); ?>
            <h1>Update Existing User</h1>
            <form class='updateuser' action="confirm.php" method="POST">
                <fieldset>
                    <input type="hidden" name="src" value="updateuser">
                    <select id='userselect' name="username" onchange="displayUser('userselect')">
                        <option>Select a User</option>
                        <?PHP optionAllUsers();?>
                    </select>
                    <!Updates on selection of user to display data>
                    <p>User's Groups:</p>
                    <div id='usergroup'></div>
                    <p>User's Role:</p>
                    <div id='userrole'></div>
                </fieldset>
                <fieldset>
                    <input id='updateuser-pass1' type="password" name="password" placeholder="New Password"><br>
                    <input id='updateuser-pass2' name="confirmpassword" type="password" placeholder="Confirm Password">
                </fieldset>
                <button type='button' onclick='checkPassword("updateuser")'>Update User</button>
            </form>
            <p class="error-messages" id="updateuser-error"></p>
            
            <h1>Create New User</h1>
            <form class='createnew' action="confirm.php" method="POST"">
                <fieldset>
                    <input type="hidden" name="src" value="createuser">
                    <input name="new_user" type="text" placeholder="New Username"><br>
                    <select name="new_role">
                        <option>New Role</option>
                        <option value="user">User</option>
                        <option value="admin">Administrator</option>
                    </select><br>
                    <label for="group[]">Add to Group:</label>
                    <input enctype="multipart/form-data" name="group[]" type="checkbox" value="Library">Library
                    <input enctype="multipart/form-data" name="group[]" type="checkbox" value="ITS">ITS
                    <input enctype="multipart/form-data" name="group[]" type="checkbox" value="CTE">CTE<br>
                    <input id= 'createnew-pass1' name="new_pass" type="password" placeholder="New Password"><br>
                    <input id='createnew-pass2' name='confirm' type='password' placeholder='Confirm Password'>
                </fieldset>
                <button type='button' onclick='checkPassword("createnew")'>Create User</button>
            </form>
            <p class='error-messages' id='createnew-error'></p>
            
            <h1>Delete User</h1>
            <form action='confirm.php' method='POST'>
                <input type="hidden" name="src" value="deleteuser">
                <select name="delete_user">
                    <option>Select a User</option>
                    <?PHP optionAllUsers();?>
                </select>
                <input type='submit' value='Delete'>
            </form>
    </body>
</html>
