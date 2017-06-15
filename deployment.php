<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Deployment Report</title>
        <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
        <?PHP require_once 'scripts/navbar.php';
        require_once 'scripts/tabledeploymentdata.php';
        require_once '/apps/softwaretracker/scripts/assignlicense.php';?>
        <script src="js/revokelicense.js"></script>
    </head>
    <body>
        <?PHP navbar();?>
        <?PHP require_once 'scripts/softwarebar.php';?>
        <?PHP if (isset($_POST["username"])){
            assignLicense();
        }?>
        <h1>Deployment Record for <?PHP echo filter_input(INPUT_GET, "entry", FILTER_SANITIZE_STRING);?></h1>
        <?PHP tableDeploymentData(filter_input(INPUT_GET, "entry", FILTER_SANITIZE_STRING));?>
    </body>
</html>