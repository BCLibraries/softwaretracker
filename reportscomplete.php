<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Complete Report</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
        <script type="text/javascript" src="js/downloadreport.js"></script>
        <?PHP require_once 'scripts/navbar.php';
        require_once 'scripts/tablealldata.php';
        ?>
    </head>
    <body>
        <?PHP navbar();?>
        <div class="container">
        <?PHP require_once 'scripts/reportbar.php'?>
        <h1>Complete Records of Tracked Software</h1>
        <?PHP tableAllData();?>
        <button class='btn btn-default' onclick="downloadExpenseReport()">Download</button><button class='btn btn-default' onclick='location.href="/softwaretracker/printerfriendly.php?report=full";'>Print</button>
        </div>
    </body>
    <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type='text/javascript' class='init'>
    $(document).ready(function() {$('#table-all-data').DataTable();} );
    </script>
</html>
