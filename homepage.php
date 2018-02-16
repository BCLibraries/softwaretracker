<?PHP require_once 'scripts/authorize.php';?>
<html>
    <head>
       <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <title>Software Tracker</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
       <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
       <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
       <script src ="js/getautocomplete.js" type="text/javascript"></script>
       <?PHP require_once 'scripts/navbar.php';
       require_once 'scripts/listallvendors.php';
       require_once 'scripts/listallsoftware.php';
       require_once 'scripts/renewalalert.php';
       require_once 'scripts/tablealllocations.php';
       ?>
    </head>
    <body>
        <?PHP navbar();?>
        <div class="container">
        <?PHP renewalAlert();?>
        <h1>Software Locations</h1>
        <?PHP tableAllLocations();?>
        </div>
    </body>
    
    <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type='text/javascript' class='init'>
    $(document).ready(function() {$('#table-all-locations').DataTable();} );
    </script>
</html>