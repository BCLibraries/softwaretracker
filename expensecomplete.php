<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Complete Report</title>
        <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
        <script type="text/javascript" src="js/downloadreport.js"></script>
        <?PHP require_once '/apps/softwaretracker/scripts/navbar.php';
        require_once '/apps/softwaretracker/scripts/tablealldata.php';
        ?>
    </head>
    <body>
        <?PHP navbar();?>
        <?PHP require_once '/apps/softwaretracker/scripts/expensebar.php'?>
        <h1>Table of Expenses</h1>
        <?PHP tableAllData();?>
        <button onclick="downloadExpenseReport()">Download</button><button onclick='location.href="/softwaretracker/printerfriendly.php?report=full";'>Print</button>
    </body>
    <script src="js/sorttable.js" type="text/javascript"></script>
</html>
