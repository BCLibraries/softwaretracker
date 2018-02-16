<?PHP require_once 'scripts/authorize.php';
require_once 'scripts/authorizeadmin.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Manage Users</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <script src='js/checkpassword.js' type='text/javascript'></script>
        <script src='js/displayuser.js' type='text/javascript'></script>
        <?PHP 
        require_once 'scripts/navbar.php';
        require_once 'scripts/optionallusers.php';
        ?>
    </head>
    <body>
        <?PHP navbar(); ?>
        <div class="container">
            <h1>Update Existing User</h1>
            <form name="updateuser" action="confirm.php" method="POST">
                <div class="form-group">
                    <select class="form-control" id='userselect' name="username" onchange="displayUser('userselect')">
                        <option>Select a User</option>
                        <?PHP optionAllUsers();?>
                    </select>
                </div>
                    <!Updates on selection of user to display data>
                    <p>User's Groups:</p>
                    <div id='usergroup' class="form-group"></div>
                    <p>User's Role:</p>
                    <div id='userrole' class="form-group"></div>
                    <div class="form-group">
                        <input class="form-control" id='updateuser-pass1' type="password" name="password" placeholder="New Password"><br>
                        <input class="form-control" id='updateuser-pass2' name="confirmpassword" type="password" placeholder="Confirm Password">
                    </div>
                <button class="btn btn-default" name="updateuser" type='button' onclick='checkPassword("updateuser")'>Update User</button>
            </form>
            <p class="error-messages" id="updateuser-error"></p>
            
            <h1>Create New User</h1>
            <form name="createnew" action="confirm.php" method="POST">
                    <input class="form-control" name="new_user" type="text" placeholder="New Username"><br>
                    <select class="form-control" name="new_role">
                        <option>New Role</option>
                        <option value="user">User</option>
                        <option value="admin">Administrator</option>
                    </select><br>
                    <div class="form-group">
                        <label for="group[]">Add to Group:</label>
                        <label class="checkbox-inline"><input enctype="multipart/form-data" name="group[]" type="checkbox" value="Library">Library</label>
                        <label class="checkbox-inline"><input enctype="multipart/form-data" name="group[]" type="checkbox" value="ITS">ITS</label>
                        <label class="checkbox-inline"><input enctype="multipart/form-data" name="group[]" type="checkbox" value="CTE">CTE</label>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id='createnew-pass1' name="new_pass" type="password" placeholder="New Password"><br>
                        <input class="form-control" id='createnew-pass2' name='confirm' type='password' placeholder='Confirm Password'>
                    </div>
                <button class="btn btn-default" name="createnew" type='submit' onclick='checkPassword("createnew")'>Create User</button>
            </form>
            <p class='error-messages' id='createnew-error'></p>
            
            <h1>Delete User</h1>
            <form action='confirm.php' method='POST'>
                <div class="form-group">
                <select class="form-control" name="delete_user">
                    <option>Select a User</option>
                    <?PHP optionAllUsers();?>
                </select>
                </div>
                <button class="btn btn-default" name="deleteuser" type='submit'>Delete</button>
                
            </form>
        </div>
        <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    </body>
</html>
