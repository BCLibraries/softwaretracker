<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Full List</title>
        <link rel='stylesheet' type='text/css' href='css/mainstyle.css'>
        <?PHP require_once "/apps/softwaretracker/scripts/listallsoftware.php";
        require_once '/apps/softwaretracker/scripts/listallvendors.php';
        require_once '/apps/softwaretracker/scripts/navbar.php';?>
    </head>
    <body>
        <?PHP navbar();?>
        <?PHP require_once '/apps/softwaretracker/scripts/homebar.php' ?>
        <div class='leftfloatingpanel'>
            <h1>Software</h1>
            <ul>
            <?PHP listAllSoftware();?>
            </ul>
        </div>
        <div class='leftfloatingpanel'>
            <h1>Vendors</h1>
            <ul>
            <?PHP listAllVendors();?>
            </ul>
        </div>
    </body>
</html>
