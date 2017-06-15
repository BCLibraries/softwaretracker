<!DOCTYPE html>
<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<html>
     <head>
        <meta charset="UTF-8">
        <title>User Panel</title>
        <?PHP
        require_once '/apps/softwaretracker/scripts/navbar.php';
        require_once '/apps/softwaretracker/scripts/listusergroups.php';
        require_once '/apps/softwaretracker/scripts/loadusergroups.php'?>
        <link type="text/css" rel="stylesheet" href="css/mainstyle.css">
        <script src='js/checkpassword.js' type='text/javascript'></script>
    </head>
    <body>
        <?PHP navbar();?> 
            <h1>User Control Panel</h1>
            <h1>Current Groups and Roles</h1>
            <p>Role: <?PHP echo ucfirst($_SESSION["role"]);?></p>
            <p>Groups:</p>
            <?PHP loadUserGroups($_SESSION["username"]);?>
            <form id='selfupdate' action='confirm.php' method='POST'>
                <p>Update the password for <?PHP echo $_SESSION['username'];?>.</p>
                <fieldset>
                    <input name='username' type='hidden' value='<?PHP echo $_SESSION['username'];?>'>
                    <input id='selfupdate-pass1' name='password' type='password' placeholder="New Password">
                    <input id='selfupdate-pass2' name='confirm' type='password'placeholder="Confirm Password">
                </fieldset>
                <button type='button' onclick="checkPassword('selfupdate')">Update!</button>
            </form>
            <p class='error-messages' id='selfupdate-error'></p>   
    </body>
</html>
