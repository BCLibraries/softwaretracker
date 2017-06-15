<!DOCTYPE html>
<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<html>
    <head>
       <meta charset="UTF-8">
       <title>Software Tracker</title>
       <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
       <script src ="js/getautocomplete.js" type="text/javascript"></script>
       <?PHP require_once 'scripts/navbar.php';
       require_once '/apps/softwaretracker/scripts/listallvendors.php';
       require_once '/apps/softwaretracker/scripts/listallsoftware.php';
       require_once '/apps/softwaretracker/scripts/renewalalert.php';
       require_once '/apps/softwaretracker/scripts/tablealllocations.php';
       ?>
    </head>
    <body>
        <?PHP navbar();?>
        <?PHP renewalAlert();?>
        <?PHP require_once '/apps/softwaretracker/scripts/homebar.php' ?>
        
        <h1 class="labtable">Software Locations</h1>
        <?PHP tableAllLocations();?>
    </body>
    <script src="js/sorttable.js" type="text/javascript"></script>
</html>