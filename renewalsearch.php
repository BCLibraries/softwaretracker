<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<html>
<head>
    <meta charset="UTF-8">
    <link href='css/mainstyle.css' type='text/css' rel='stylesheet'>
    <?PHP require_once '/apps/softwaretracker/scripts/navbar.php';?>
    <title>Search Renewals</title>
</head>
<body>
<?PHP navbar(); ?>
<?PHP require_once '/apps/softwaretracker/scripts/renewalbar.php';?>
<h1>Search for Upcoming Renewals</h1>
    <form action='/softwaretracker/searchresults.php'>
        Show software with renewals in the next<input type='number' name="days">day(s).
        <input type='submit' value="Search">
    </form>
<h1>Check a Range of Dates for Renewal</h1>
    <form action='/softwaretracker/searchresults.php'>
        Show software with renewals between <input type="date" name="date1" placeholder="year-month-day"> and <input type="date" name="date2" placeholder="year-month-day">
        <input type='submit' value='Search'>
    </form>
</body>
</html>
