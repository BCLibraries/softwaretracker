<!DOCTYPE html>
<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search Results</title>
        <link rel="stylesheet" href="/softwaretracker/css/mainstyle.css">
        <?php 
        require_once '/apps/softwaretracker/scripts/navbar.php';
        require_once '/apps/softwaretracker/scripts/tableupcomingrenewals.php';
        require_once '/apps/softwaretracker/scripts/listsoftwaresearch.php';
        require_once '/apps/softwaretracker/scripts/listsoftwarebyvendor.php';
        require_once '/apps/softwaretracker/scripts/listsoftwarebycategory.php';
        require_once '/apps/softwaretracker/scripts/tablerenewalsbyrange.php';
        ?>     
    </head>
    <body>
        <?PHP navbar()?>
        <?PHP require_once '/apps/softwaretracker/scripts/homebar.php' ?>
        <br>
        <?php
        if (isset($_GET['software'])){listSoftwareSearch(filter_var($_GET["software"]));}
        elseif (isset($_GET["vendor"])){echo "<ul>".listSoftwareByVendor(filter_var($_GET["vendor"]))."</ul>";}
        elseif (isset($_GET["category"])){listSoftwareByCategory(filter_var($_GET["category"]));}
        elseif (isset($_GET["days"])){tableUpcomingRenewals(filter_var($_GET["days"]));}
        elseif (isset($_GET["date1"])){tableRenewalsByRange(filter_var($_GET["date1"]),filter_var($_GET['date2']));}?>
    </body>
</html>
