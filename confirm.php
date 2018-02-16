<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Confirmation Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <?php require 'scripts/navbar.php';
        require_once 'scripts/createnewentry.php';
        require_once 'scripts/createnewvendor.php';
        require_once 'scripts/updateuser.php';
        require_once 'scripts/createnewuser.php';
        require_once 'scripts/deleteuser.php';
        require_once 'scripts/updatevendor.php';
        require_once 'scripts/updateentry.php';
        require_once 'scripts/addlicense.php';
        ?>
    </head>
    <body>
        <?PHP navbar(); ?>
        <div class='container'>
        <?php
        /*The if and first elseif are checking to see if the user created just a software entry or both software and vendor entries.*/
        if ((isset($_POST["newsoftware"])) && !($_POST["optionalvendor"]==='')){
            $_POST["vendor"] = $_POST["optionalvendor"];
            createNewEntry();
            createNewVendor();
        }
        elseif (isset($_POST["newsoftware"])){
            createNewEntry();
        }
        elseif (isset($_POST["newvendor"])) {
            createNewVendor();
        }
        elseif (isset($_POST["updateentry"])){
            updateEntry();
        }
        elseif (isset($_POST["updatevendor"])){
            updateVendor();
        }
        elseif (isset($_POST["createnew"])){
            createNewUser();
        }
        elseif (isset($_POST["deleteuser"])){
            deleteUser();
        } 
        elseif (isset($_POST['selfupdate'])){
           updateUser();
        }
        elseif (isset($_POST["addlicense"])){
            addLicense();
        }
        else {
        echo "Error. Could not create entry.";
        }
        ?>
        </div>
        <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    </body>
</html>
