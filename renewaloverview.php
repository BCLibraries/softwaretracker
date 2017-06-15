<!DOCTYPE html>
<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<html>
<head>
    <meta charset="UTF-8">
    <link href='css/mainstyle.css' type='text/css' rel='stylesheet'>
    <?PHP require_once '/apps/softwaretracker/scripts/navbar.php';
    require_once '/apps/softwaretracker/scripts/tablealldata.php';?>
    <title>Renewals</title>
</head>
<body>
<?PHP navbar(); ?>
<?PHP require_once '/apps/softwaretracker/scripts/renewalbar.php';?>
<h1>All Renewals</h1>    
    <?PHP tableAllData();?>
    <button onclick="downloadExpenseReport()">Download</button><button onclick='location.href="/softwaretracker/printerfriendly.php?report=full"'>Print</button>
</body>
<script src="js/sorttable.js" type="text/javascript"></script>
</html>
