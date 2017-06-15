<!DOCTYPE html>
<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmation Page</title>
        <link rel="stylesheet" href="css/mainstyle.css">
        <?php require '/apps/softwaretracker/scripts/navbar.php';
        require_once '/apps/softwaretracker/scripts/createnewentry.php';
        require_once '/apps/softwaretracker/scripts/createnewvendor.php';
        require_once '/apps/softwaretracker/scripts/updateuser.php';
        require_once '/apps/softwaretracker/scripts/createnewuser.php';
        require_once '/apps/softwaretracker/scripts/deleteuser.php';
        require_once '/apps/softwaretracker/scripts/updatevendor.php';
        require_once '/apps/softwaretracker/scripts/updateentry.php';
        require_once '/apps/softwaretracker/scripts/addlicense.php';
        ?>
    </head>
    <body>
        <?PHP navbar(); ?>
        <h1>Request Received</h1>
        <?php
        /*The if and first elseif are checking to see if the user created just a software entry or both software and vendor entries.*/
        if (($_POST["src"]=== "newsoftware") && !($_POST["optionalvendor"]==='')){
            $_POST["vendor"] = $_POST["optionalvendor"];
            createNewEntry();
            createNewVendor();
        }
        elseif ($_POST["src"] === "newsoftware"){
            createNewEntry();
        }
        elseif ($_POST["src"] === "newvendor") {
            createNewVendor();
        }
        elseif ($_POST["src"] === "updateentry"){
            updateEntry();
        }
        elseif ($_POST["src"] === "updatevendor"){
            updateVendor();
        }
        elseif ($_POST["src"] === "createuser"){
            createNewUser();
        }
        elseif ($_POST["src"] === "deleteuser"){
            deleteUser();
        } 
        elseif ($_POST["src"] === "updateuser"){
           updateUser();
        }
        elseif ($_POST["src"] === "addlicense"){
            addLicense();
        }
        else {
        echo "Error. Could not create entry.";
        }
        ?>
    </body>
</html>
