<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Upcoming Renewals</title>
        <link rel='stylesheet' type='text/css' href='css/mainstyle.css'>
        <script src='js/downloadreport.js' type='text/javascript'></script>
        <?PHP require_once '/apps/softwaretracker/scripts/navbar.php';
        require_once '/apps/softwaretracker/scripts/tableupcomingrenewals.php';?>
    </head>
    <body>
        <?PHP navbar();?>
        <?php require_once '/apps/softwaretracker/scripts/renewalbar.php';?>
        
        <h1>Upcoming Renewals</h1>
        <p>The following software is up for renewal in the next 60 days.</p>
        <?PHP tableUpcomingRenewals("60");?>
        <button onclick="downloadUpcomingReport('60')">Download</button>
        <button onclick='location.href="/softwaretracker/printerfriendly.php?report=upcoming&days=60"'>Print</button>
        
        <h1>Near Future Renewals</h1>
        <p>The following software is up for renewal in the next 90 days.</p>
        <?PHP tableUpcomingRenewals("90");?>
        <button onclick="downloadUpcomingReport('90')">Download</button>
        <button onclick='location.href="/softwaretracker/printerfriendly.php?report=upcoming&days=90"'>Print</button>
    </body>
    <script src="js/sorttable.js" type="text/javascript"></script>
</html>
