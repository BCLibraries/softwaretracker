<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
     <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>User Panel</title>
        <?PHP
        require_once '/apps/softwaretracker/scripts/navbar.php';
        require_once '/apps/softwaretracker/scripts/loadusergroups.php'; ?>
        <link type="text/css" rel="stylesheet" href="css/mainstyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src='js/checkpassword.js' type='text/javascript'></script>
    </head>
    <body>
        <?PHP navbar();?> 
        <div class="container">
            <h1>User Control Panel</h1>
            <p>Your Groups:</p>
            <?PHP loadUserGroups($_SESSION["username"]);?>
            <form action='confirm.php' method='POST'>
                <p>Update the password for <?PHP echo $_SESSION['username'];?>.</p>
                    <input class="form-control" name='username' type='hidden' value='<?PHP echo $_SESSION['username'];?>'>                 
                    <input class="form-control" id='selfupdate-pass1' name='password' type='password' placeholder="New Password">
                    <input class="form-control" id='selfupdate-pass2' name='confirm' type='password'placeholder="Confirm Password">
                <button name="selfupdate" class="btn btn-default" type='button' onclick="checkPassword('selfupdate')">Update!</button>
            </form>
            <p class='error-messages' id='selfupdate-error'></p>
        </div>
        <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>
