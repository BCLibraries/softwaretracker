<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Printer Friendly</title>
        <link rel="stylesheet" text="text/css" href="css/printerfriendly.css">
        <?PHP require_once '/apps/softwaretracker/scripts/tablealldata.php';
        require_once '/apps/softwaretracker/scripts/tablebyfundingsource.php';
        require_once '/apps/softwaretracker/scripts/tableupcomingrenewals.php';
        ?>
    </head>
    <body>
        <?php
        if (!isset($_GET["report"])){
            echo "Sorry, no report found.";
        }
        else {
        if ($_GET["report"]==="full") {
            tableAllData();
        }
        elseif ($_GET["report"]==="funding_source") {
            $area = filter_var($_GET["area"]);
            tableByFundingSource($area,'show');
        }
        elseif ($_GET["report"]==="renewal"){
            $days = filter_var($_GET["days"]);
            rowRenewalsByDays($days);
        }
        elseif ($_GET["report"]==="upcoming"){
            tableUpcomingRenewals(filter_input(INPUT_GET, "days", FILTER_SANITIZE_NUMBER_INT));
        }
        }
        ?>
        <?PHP echo "<p>Report generated on ".date("d-M-Y")."</p>"; ?>
    </body>
    <script src="js/sorttable.js" type="text/javascript"></script>
</html>
