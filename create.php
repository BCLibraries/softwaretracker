<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create an Entry</title>
        <?PHP require_once '/apps/softwaretracker/scripts/navbar.php'?>
        <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
    </head>
    <body>
        <?PHP navbar();?>
        <?PHP require_once '/apps/softwaretracker/scripts/homebar.php' ?>
        <div class="panel">
            <a class="panel" href="createentryform.php"><img class="panel" src="images/softwarepic.jpg"></a>
            <p class="panel">Create a Software Entry</p>
        </div>
        <div class="panel">
            <a class="panel" href="createvendorform.php"><img class="panel" src="images/vendorpic.jpg"></a>
            <p class="panel">Create a Vendor Entry</p>
        </div>
    </body>
</html>
